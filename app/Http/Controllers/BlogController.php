<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogFilterRequest;
use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {   
       
        $posts = Post::paginate(1);

        // return the view with the paginated posts
        return view('blog.index', [
            'posts' => $posts,
        ]);
    }

    public function show(String $slug, Post $post): RedirectResponse|View
    {
        if($post->slug != $slug){
            return redirect()->route('blog.show', [
                'slug' => $post->slug,
                'id' => $post->id
            ]);   
        }

        return view('blog.show', [
            'post' => $post,
        ]);
    }

    public function create(): View
    {
        // methode pour récupérer les données de la session
        // dd(session()->all());
        return view('blog.create');
    }

    public function store(CreatePostRequest $request): RedirectResponse
    {
        $post = Post::create($request->validated());

        // $post = Post::create($validated);

        return redirect()->route('blog.show', [
            'slug' => $post->slug,
            'post' => $post->id
        ])->with('success', 'L\'article a été créé avec succès.');
    }
}