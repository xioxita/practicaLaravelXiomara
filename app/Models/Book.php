<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // Esto permite que el Seeder pueda insertar datos en estos campos
    protected $fillable = ['title', 'author', 'image', 'is_available'];

}
