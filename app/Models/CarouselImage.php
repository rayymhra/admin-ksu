<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarouselImage extends Model
{
    protected $fillable = [
        'carousel_slide_id',
        'platform',
        'image',
    ];

    public function slide(): BelongsTo
    {
        return $this->belongsTo(CarouselSlide::class);
    }
}
