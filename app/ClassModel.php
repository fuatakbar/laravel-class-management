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
        $this->hasOne(Teacher::class, 'id', 'teacher_id');
    }

    // class can has more than one student (many)
    public function student(){
        $this->hasMany(Student::class, 'class_id', 'id');
    }
}
