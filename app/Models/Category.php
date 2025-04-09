<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'name', // The name of the category
    ];

    // Define the relationship with Song
    public function songs()
    {
        return $this->hasMany(Song::class);
    }
}
