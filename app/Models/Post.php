<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $guarded = false;

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getUserName($id){
        $user = User::find($id)['name'] ?? "noname";
        return $user;
    }

    public function getUser(){
        $user = User::find($this->user_id);
        return $user;
    }

    public function attachmentFiles(){
        return $this->hasMany(Document::class, 'post_id');
    }
}
