<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        // Validator::make(request()->all(), [
        //     'page' => 'integer|min:1',
        // ])->validate();

        $Validator = Validator::make([
            'slug' => '', 
        ], [ 'slug' => Rule::unique('posts') ]);

    // dd($Validator->fails());
    // dd($Validator->errors()); 
     dd($Validator->validated()); 
        
        
        $posts = Post::paginate(1);

        // return the view with the paginated posts
        return view('blog.index', [
            'posts' => $posts,
        ]);
    }

    public function show(string $slug, int $id): RedirectResponse|View
    {
        $post = Post::findOrFail($id);

        if ($post->slug != $slug) {
            return redirect()->route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
        }

        // return the view with the post
         return view('blog.show', [
            'post' => $post,
        ]);
    }
}
