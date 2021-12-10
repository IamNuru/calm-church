<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Models\SongCategory;

class Song extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    /**
     * Get the category that owns the Song
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(SongCategory::class, 'song_category_id', 'id');
    }

     
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
