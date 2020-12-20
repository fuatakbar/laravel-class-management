<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $table = 'classes';

    protected $fillable = [
        'name', 'teacher_id'
    ];

    // class has one teacher
    public function teacher(){
        return $this->hasOne(Teacher::class, 'id', 'teacher_id')->select('name', 'id');
    }

    // class can has more than one student (many)
    public function student(){
        return $this->hasMany(Student::class, 'class_id', 'id');
    }
}
