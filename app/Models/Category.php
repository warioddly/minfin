<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $guarded = false;

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function TotalPostViews(){
        return $this->hasMany(Post::class)->sum('views');
    }

    public function getUserName($id){
        $user = User::find($id)['name'] ?? "noname";
        return $user;
    }
}
