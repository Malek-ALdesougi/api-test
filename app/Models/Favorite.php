<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'readyInMinutes',
        'summary',
        'vegetarian',
        'instructions',
        'sourceUrl',
        'image'
    ];
}
