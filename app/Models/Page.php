<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'pages';
    protected $fillable = [
        'title',
        'icon',
        'type',
        'description',
        'parent_id',
        'content',
        'level',
        'icon_type',
        'visible_on_main_page'
    ];

    public function ChildPages()
    {
        return $this->hasMany(Page::class, 'parent_id');
    }

    public function ParentPage()
    {
        return $this->belongsTo(Page::class, 'parent_id')->withTrashed();
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'page_id');
    }
}
