<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Sermon extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the Sermon
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    /**
     * Get all of the sermonMeassage for the Sermon
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sermonMessages()
    {
        return $this->hasMany(SermonMessage::class);
    }
}
