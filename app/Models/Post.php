<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'posts';
    protected $guarded = false;

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function publisher(){
        return $this->belongsTo(Category::class, 'publisher_id');
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

    public function InPage(){
        return $this->belongsTo(Page::class, 'page_id');
    }

    public function scopeFilter($query, $filters)
    {
        if ($month = $filters['month']) {
            $query->whereMonth('created_at', \Carbon\Carbon::parse($month)->month);
        }
        if ($year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }
    }

    public static function archives()
    {
        $archives = static::selectRaw('year(created_at) year, monthname(created_at) month,
            monthname(created_at) monthRU, count(*) number')
            ->groupBy('year', 'month', 'monthRU')
            ->orderByRaw('min(created_at)')
            ->get();
        return $archives;
    }

    public function getMonthRUAttribute($month)
    {
        switch ($month) {
            case "January":
                return "Январь";
            case "February":
                return "Февраль";
            case "March":
                return "Март";
            case "April":
                return "Апрель";
            case "May":
                return "Май";
            case "June":
                return "Июнь";
            case "July":
                return "Июль";
            case "August":
                return "Август";
            case "September":
                return "Сентябрь";
            case "October":
                return "Октябрь";
            case "November":
                return "Ноябрь";
            case "December":
                return "Декабрь";
        }
    }
}
