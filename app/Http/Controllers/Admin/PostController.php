<?php

namespace App\Http\Controllers\Admin;

use DOMDocument;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.admin.posts.index', [
            'posts' => Post::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Image Processing
        $description = $request->description;

        // DOM in HTML elements
        $dom = new DOMDocument;
        $dom->loadHTML($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        // Get all tag Image
        $images = $dom->getElementsByTagName('img');

        // If there is an image, save it to storage and reset the src
        foreach ($images as $key => $img) {
            // Get Original Name
            $dataFileName = $img->getAttribute('data-filename');
            $dataName = explode('.', $dataFileName);
            $removeExstension = array_pop($dataName);
            $originalName = implode('.', $dataName);

            // $data mewakili biner dari gambarnya
            $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
            $image_name = "images/post-images/" . time() . $originalName . uniqid() . '.png';
            Storage::put($image_name, $data);

            // Reset src Attribute
            $img->removeAttribute('src');
            $img->setAttribute('src', asset("storage/{$image_name}"));
        }

        // Save as HTML
        $description = $dom->saveHTML();

        Post::create([
            'title' => $request->title,
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'description' => $description
        ]);

        return redirect(route('posts.index'))->with('success', "Data Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.admin.posts.show', [
            "post" => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.admin.posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        // Get Data from Post Model
        $post = Post::where('slug', $slug)->first();

        // Validasi
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        // Check if the post has a description
        if ($post->description) {
            // DOM in HTML elements
            $dom = new DOMDocument;

            // Check if the HTML is well-formed before loading
            libxml_use_internal_errors(true);
            $dom->loadHTML($post->description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            libxml_clear_errors();

            // Get all tag Image
            $images = $dom->getElementsByTagName('img');

            // If there is an image, delete it from storage
            foreach ($images as $img) {
                $imagePath = public_path($img->getAttribute('src'));
                $imageName = pathinfo($imagePath, PATHINFO_BASENAME);

                if (Storage::exists("post-images/{$imageName}")) {
                    Storage::delete("post-images/{$imageName}");
                }
            }
        }

        if ($request->description != null) {
            // Image Processing
            $description = $request->description;

            // DOM in HTML elements
            $dom = new DOMDocument;
            libxml_use_internal_errors(true);
            $dom->loadHTML($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            libxml_clear_errors();

            // Get all tag Image
            $images = $dom->getElementsByTagName('img');

            // If there is an image, save it to storage and reset the src
            foreach ($images as $key => $img) {
                $srcAttribute = $img->getAttribute('src');
                $dataParts = explode(';', $srcAttribute);

                // Check if array key 1 exists before accessing it
                $data = isset($dataParts[1]) ? base64_decode(explode(',', $dataParts[1])[1]) : null;

                if ($data !== null) {
                    $image_name = "post-images/" . time() . uniqid() . $key . '.png';

                    Storage::put($image_name, $data);

                    $img->removeAttribute('src');
                    $img->setAttribute('src', asset("storage/{$image_name}"));
                }
            }

            // Save as HTML
            $description = $dom->saveHTML();
        }

        $post->update([
            'title' => $request->title,
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'description' => $description,
        ]);

        return redirect(route('posts.index'))->with('success', "Data Berhasil Diperbarui");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug)->first();

        $dom = new DOMDocument;
        $dom->loadHTML($post->description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            // Access image attributes
            $src = $img->getAttribute('src');
            $alt = $img->getAttribute('alt');
            $srcImg = basename($src);
            // Print or dump the attributes
            // echo "Image $key: src=". basename($src).", alt=$alt\n\n\n";

            
            if (Storage::exists("images/post-images/{$srcImg}")) {
                Storage::delete("images/post-images/{$srcImg}");
            }
        }
        
        
        $post->delete();

        return redirect(route('posts.index'))->with('success', "Data Berhasil Dihapus");
        // foreach ($images as $key => $img) {
        //     $src = $img->getAttribute('src');
        //     // $path = Str::of($src)->after('/');
        //     $srcImg = basename($src);
        //     dd($src);

        //     // if (Storage::exists("images/post-images/{$srcImg}")) {
        //     //     Storage::delete("images/post-images/{$srcImg}");
        //     // }
        // }

        // $post->delete();

        // return redirect(route('posts.index'))->with('success', "Data Berhasil Dihapus");
    }
}