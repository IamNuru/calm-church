<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Tag extends Model
{
    use HasFactory;


    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }


    public function songs()
    {
        return $this->morphedByMany(Song::class, 'taggable');
    }
}
