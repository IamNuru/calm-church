<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sermon;
use App\Models\User;

class SermonMessage extends Model
{
    use HasFactory;

    /**
     * Get the Sermon that owns the SermonMessage
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Sermon()
    {
        return $this->belongsTo(Sermon::class, 'sermon_id');
    }


    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
