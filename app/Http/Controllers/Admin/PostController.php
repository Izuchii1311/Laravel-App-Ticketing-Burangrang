<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $checkPost = Post::where('title', $request->title)->first();
        if ($checkPost) {
            return redirect(route('posts.create'))
                    ->with('warning',
                        "Postingan dengan judul " . "'" . "<span class='fw-bold'>" . $request->title . "</span>" . "'" . " sudah ada, " . "<span class='fst-italic'>pastikan judul tidak sama.</span>"
                    );
        }

        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'description' => 'required'
        ]);

        $validatedData['slug'] = SlugService::createSlug(Post::class, 'slug', $request->title);

        Post::create($validatedData);

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
    public function update(Request $request, Post $post)
    {
        $checkPost = Post::where('title', $request->title)->first();
        if ($checkPost && $checkPost->id !== $post->id) {
            return redirect(route('posts.edit', ['post' => $post->slug]))
                    ->with('warning',
                        "Postingan dengan judul " . "'" . "<span class='fw-bold'>" . $request->title . "</span>" . "'" . " sudah ada, " . "<span class='fst-italic'>pastikan judul tidak sama.</span>"
                    );
        }

        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'description' => 'required'
        ]);

        if ($post->title !== $request->title) {
            $validatedData['slug'] = SlugService::createSlug(Post::class, 'slug', $request->title);
        }

        Post::where('slug', $post->slug)->update($validatedData);

        return redirect(route('posts.index'))->with('success', "Data Berhasil Ditambahkan");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        Post::where('slug', $slug)->delete();
        return redirect(route('posts.index'))->with('success', "Data Berhasil Dihapus");
    }
}
