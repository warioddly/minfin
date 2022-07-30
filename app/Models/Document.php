<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = false;
    protected $table = 'documents';

    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id')->withTrashed();
    }

}
