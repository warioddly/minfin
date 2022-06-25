<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppealOfCitizens extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'appeal_of_citizens';
    protected $guarded = false;

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function attachmentFiles(){
        return $this->hasMany(Document::class, 'appeal_of_citizens_id');
    }

}
