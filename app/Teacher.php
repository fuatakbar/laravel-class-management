<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name', 'address', 'age', 'gender'
    ];

    public function class(){
        $this->hasMany('App\Class');
    }
}
