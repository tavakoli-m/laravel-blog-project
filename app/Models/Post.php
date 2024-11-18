<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'body',
        'status',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    protected function casts(){
        return [
            'image' => 'array'
        ];
    }
}
