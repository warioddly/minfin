<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    use HasFactory;
    protected $table = 'logs';
    protected $guarded = false;

    public function getUserName($id){
        $user = User::find($id)['name'] ?? "guest";
        return $user;
    }
}
