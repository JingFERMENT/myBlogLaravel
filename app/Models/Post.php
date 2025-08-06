<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperPost
 */
class Post extends Model
{
    // Spécifiez les attributs qui peuvent être remplis en masse
    protected $fillable =
    [
        'title',
        'content',
        'slug'
    ];

    protected $guarded = [];

    

    // Si vous avez besoin de définir des règles de validation ou des relations, vous pouvez les ajouter ici.
    // Par exemple, si un post appartient à un utilisateur :
    // public function user() {
    //     return $this->belongsTo(User::class);
    // }
}
