<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $table = 'pages';
    protected $fillable = [
        'title',
        'icon',
        'type',
        'description',
        'parent_id',
        'content',
        'level',
        'icon_type'
    ];

    public function ChildPages()
    {
        return $this->hasMany(Page::class, 'parent_id');
    }

    public function ParentPage()
    {
        return $this->belongsTo(Page::class, 'parent_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'page_id');
    }
}
