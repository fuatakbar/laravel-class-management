<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name', 'gender', 'age', 'class_id'
    ];

    public function class(){
        return $this->belongsTo('App\Class');
    }
}
