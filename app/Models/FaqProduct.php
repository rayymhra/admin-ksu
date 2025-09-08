<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqProduct extends Model
{
    protected $fillable = [
        'question',
        'answer',
    ];
}
