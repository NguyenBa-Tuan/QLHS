<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterCourse extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'user_id',
    ];

    // public function user()
    // {
    //     return $this->belongsToMany(User::class,'users', 'id', 'user_id');
    // }

    // public function course()
    // {
    //     return $this->belongsToMany(Course::class,'courses', 'id', 'course_id');
    // }
}
