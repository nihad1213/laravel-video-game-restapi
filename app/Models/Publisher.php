<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $fillable = [
        'name',
        'website',
        'founded_year',
    ];

    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
