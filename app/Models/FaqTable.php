<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqTable extends Model
{
    protected $fillable = [
        'question',
        'answer',
    ];
}
