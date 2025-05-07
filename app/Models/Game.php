<?php

namespace App\Models;

use App\Models\Publisher;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'name',
        'description',
        'release_date',
        'publisher_id',
        'genre_id',
    ];

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
