<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Movie extends Model
{
    protected $fillable = [
        'title',
        'description',
        'release_year',
        'rating',
        'image',
    ];
    public function watchlists(): HasMany
    {
        return $this->hasMany(Watchlist::class);
    }
}