<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Supports\Eloquent\Sluggable;
use App\Enums\DefaultStatus;

class Tag extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'tags';

    protected $guarded = [];
    
    protected $casts = [
        'status' => DefaultStatus::class,
    ];

    public function isPublished(){
        return $this->status == DefaultStatus::Published;
    }

    public function scopePublished($query){
        return $query->where('status', DefaultStatus::Published);
    }
}
