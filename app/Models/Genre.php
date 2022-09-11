<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $table = 'genres';

    protected $fillable = ['title'];

    /* Relations */
    public function movies()
    {
        return $this->belongsToMany(
            Movie::class,
            'movie_genres',
            'movie_id',
            'genre_id'
        );
    }
}
