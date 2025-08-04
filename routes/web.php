<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return view('welcome');
});

// regrouper les routes du blog (pour changer facilement le préfixe)
Route::prefix('/blog')->name('blog.')->group(function () {

    Route::get('/', function (Request $request) {

        $post = new Post();

        $post->title = 'Mon troisieme article';
        $post->slug = 'mon-troisième-article';
        $post->content = 'Contenu de mon troisiem article';

        $post->save();

        return $post;

    })->name('index'); // donner un nom à la route

    // rajouter les paramètres dans l'URL
    Route::get('/{slug}/{id}', function (string $slug, int $id, Request $request) {
        return [
            "slug" => $slug,
            "id" => $id,
        ];
    })->where([
        'slug' => '[a-zA-Z0-9\-]+',
        'id' => '[0-9]+'
    ])->name('show'); // ajouter les conditions sur les paramètres
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
