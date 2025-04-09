<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'title', 
        'cover_image', 
        'lyrics', 
        'public', 
        'category_id', 
        'user_id'
    ];

    // Relationship: A song belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relationship: A song is uploaded by a user (admin)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship: A song has many videos (one or more videos associated with each song)
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
