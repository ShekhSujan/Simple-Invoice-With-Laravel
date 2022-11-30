<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'title',
        'slug',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'image',
        'position',
        'status',
    ];
    // public function scopeActive($query)
    // {
    //     $query->where('status', 1);
    // }
}
