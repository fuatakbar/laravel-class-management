<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\ClassModel;
use App\Teacher;
use App\Student;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // define data statistic
        $total_class = ClassModel::count();
        $total_teacher = Teacher::count();
        $total_student = Student::count();

        return view('pages.index', compact('total_class', 'total_teacher', 'total_student'));
    }
}
