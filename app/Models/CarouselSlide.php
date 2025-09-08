<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CarouselSlide extends Model
{
    protected $fillable = [
        'order',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(CarouselImage::class);
    }
}
