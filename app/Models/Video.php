<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'song_id',   // Foreign key to Song
        'url',       // URL of the video or file path
    ];

    // Define the relationship with Song
    public function song()
    {
        return $this->belongsTo(Song::class);
    }
}
