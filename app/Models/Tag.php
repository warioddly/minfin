<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['title', 'user_id'];
    protected $table = 'tags';

    public function getUserName($id){
        $user = User::find($id)['name'] ?? "noname";
        return $user;
    }

    public function posts(){
        return $this->hasMany(PostTag::class, 'post_id');
    }

    public function TotalPostViews(){
        return $this->hasMany(Post::class)->sum('views');
    }

}
