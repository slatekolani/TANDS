<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    use HasFactory;

    protected $fillable = ['image_path', 'title', 'caption', 'is_featured_home', 'sort_order'];

    protected $casts = [
        'is_featured_home' => 'boolean',
    ];
}
