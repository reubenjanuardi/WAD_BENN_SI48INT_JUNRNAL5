<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dvd extends Model
{
    use HasFactory;

    // Table name (optional if it matches plural of model)
    protected $table = 'dvds';

    // Mass assignable fields
    protected $fillable = [
        'title',
        'genre',
        'release_year',
        'rating',
    ];
}
