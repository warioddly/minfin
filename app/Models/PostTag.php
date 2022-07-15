<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostTag extends Model
{
    use HasFactory;
    protected $fillable = ['tag_id', 'post_id'];
    protected $table = 'post_tags';
}
