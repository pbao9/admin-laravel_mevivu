<?php

namespace App\Models;

use App\Supports\Eloquent\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory, Sluggable;
    
    protected $table = 'pages';

    protected $columnSlug = 'title';

    protected $guarded = [];
}
