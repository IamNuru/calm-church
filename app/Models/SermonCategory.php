<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sermon;

class SermonCategory extends Model
{
    use HasFactory;
    /**
     * Get all of the sermons for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sermons()
    {
        return $this->hasMany(Sermon::class, 'sermon_category_id', 'id');
    }
}
