<?php

namespace App\Http\Controllers\Admin;

use DOMDocument;
use App\Models\Post;
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
            'title' => 'required|unique:posts,title',
            'description' => 'required',
        ]);

        // Check if the post already exists
        $checkPost = Post::where('title', $request->title)->first();
        if ($checkPost) {
            return redirect(route('posts.create'))
                ->with('warning',
                    "Postingan dengan judul " . "'" . "<span class='fw-bold'>" . $request->title . "</span>" . "'" . " sudah ada, " . "<span class='fst-italic'>pastikan judul tidak sama.</span>"
                );
        }

        // Image Processing
        $description = $request->description;

        // DOM in HTML elements
        $dom = new DOMDocument;
        $dom->loadHTML($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        // Get all tag Image
        $images = $dom->getElementsByTagName('img');

        // If there is an image, save it to storage and reset the src
        foreach ($images as $key => $img) {
            $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
            $image_name = "post-images/" . time() . $key . '.png';

            // Save the image in a public directory using Storage::put
            Storage::put($image_name, $data);

            // Reset src Attribute
            $img->removeAttribute('src');
            $img->setAttribute('src', asset($image_name));
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
        $post = Post::where('slug', $slug)->first();

        // Validasi
        $request->validate([
            'title' => 'required|unique:posts,title',
            'description' => 'required',
        ]);

        $description = $request->description;
        $dom = new DOMDocument;
        $dom->loadHTML($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    
        $images = $dom->getElementsByTagName('img');
    
        foreach ($images as $key => $img) {
            // Check if the image is a new one
            if (strpos($img->getAttribute('src'), 'data:image/') === 0) {
                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                $image_name = "post-images/" . time() . $key . '.png';

                // Save the image in a public directory using Storage::put
                Storage::put($image_name, $data);

                // Hapus gambar sebelumnya jika ada
                if ($post->image_path) {
                    Storage::delete($post->image_path);
                }

                // Set Ulang Attribute src
                $img->removeAttribute('src');
                $img->setAttribute('src', asset($image_name));
    
                // Update path gambar di database
                $post->update(['image_path' => $image_name]);
            }
        }
    
        $description = $dom->saveHTML();
    
        $post->update([
            'title' => $request->title,
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'description' => $description
        ]);
    
        return redirect(route('posts.index'))->with('success', "Data Berhasil Diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug)->first();

        // DOM in HTML elements
        $dom = new DOMDocument;
        $dom->loadHTML($post->description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        // Get all tag Image
        $images = $dom->getElementsByTagName('img');

        // If there is an image, save it to storage and reset the src
        foreach ($images as $img) {
            $imagePath = public_path($img->getAttribute('src'));

            // Retrieve only the file name from the full path
            $imageName = pathinfo($imagePath, PATHINFO_BASENAME);

            // Delete the image from storage if there is one
            if (Storage::exists("post-images/{$imageName}")) {
                Storage::delete("post-images/{$imageName}");
            }
        }

        $post->delete();

        return redirect(route('posts.index'))->with('success', "Data Berhasil Dihapus");
    }
}