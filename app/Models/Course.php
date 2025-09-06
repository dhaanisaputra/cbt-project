<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id',
    ];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    } // func for getting category relation

    public function question() {
        return $this->hasMany(CourseQuestion::class, 'course_id', 'id');
    }  // func for course has many question relation
}
