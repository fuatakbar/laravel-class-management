<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// models
use App\Student;
use App\ClassModel;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::orderBy('name', 'asc')->with('class')->paginate(8);
        $classes = ClassModel::orderBy('name', 'asc')->get();
        return view('pages.student.index', compact('students', 'classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // define data to store
        $data = [
            'name' => $request->name,
            'class_id' => $request->class_id,
            'age' => $request->age,
            'gender' => $request->gender
        ];

        $store = Student::create($data);

        if ($store) {
            return redirect()->back()->with(['message' => 'Student Added SUCCESSFULLY']);
        } else {
            return redirect()->back()->with(['message' => 'FAILED to Add Student']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::where('id', $id)->firstOrFail();
        $classes = ClassModel::orderBy('name', 'asc')->get();
        return view('pages.student.edit', compact('student', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'age' => 'required'
        ]);

        $student = Student::where('id', $id)->firstOrFail();
        $student->name = $request->name;
        $student->gender = $request->gender;
        $student->age = $request->age;
        $student->class_id = $request->class_id;
        $update = $student->save();
 
        if ($update) {
            return redirect()->route('student.index')->with(['message' => 'Student Changed SUCCESSFULLY']);
        } else {
            return redirect()->route('student.index')->with(['message' => 'Failed to Change Student Data']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::where('id', $id)->firstOrFail();
        $delete = $student->delete();

        if ($delete) {
            return redirect()->route('student.index')->with(['message' => 'Student Deleted SUCCESSFULLY']);
        } else {
            return redirect()->route('student.index')->with(['message' => 'FAILED to Delete This Student']);
        }
    }
}
