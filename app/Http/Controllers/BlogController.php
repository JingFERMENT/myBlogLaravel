<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\RedirectResponse;

class BlogController extends Controller
{
    public function index():Paginator
    {
        $posts = Post::paginate(1);

        return $posts;
    }

    public function show(string $slug, int $id):RedirectResponse|Post
    {
        $post = Post::findOrFail($id);
        
        if($post->slug != $slug){
            return redirect()->route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
        }

        return $post;
    }
}
