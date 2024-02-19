<?php

namespace App\Models;

use App\Enums\DefaultStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use App\Supports\Eloquent\Sluggable;

class Category extends Model
{
    use HasFactory, NodeTrait, Sluggable;

    protected $table = 'categories';

    protected $guarded = [];
    
    protected $casts = [
        'status' => DefaultStatus::class
    ];

    public function posts(){
        return $this->belongsToMany(Post::class, 'categories_posts', 'category_id', 'post_id');
    }

    public function scopePublished($query){
        return $query->where('status', DefaultStatus::Published);
    }
}
