<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogFilterRequest;
use App\Models\Post;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(BlogFilterRequest $request): View
    {   
       
        $posts = Post::paginate(1);

        // return the view with the paginated posts
        return view('blog.index', [
            'posts' => $posts,
        ]);
    }

    public function show(Post $post): RedirectResponse|View
    {
         return view('blog.show', [
            'post' => $post,
        ]);
    }
}
