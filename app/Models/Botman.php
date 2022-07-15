<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Botman extends Model
{
    use HasFactory;
    protected $table = 'botmen';
    protected $fillable = [
        'message',
        'parent_message_id',
        'is_answer'
    ];

    public function getChilds()
    {
        return $this->hasMany(Botman::class, 'parent_message_id');
    }
}
