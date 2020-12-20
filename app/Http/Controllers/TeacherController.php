<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// models
use App\Teacher;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::orderBy('name', 'asc')->paginate(8);
        return view('pages.teacher.index', compact('teachers'));
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
            'address' => $request->address,
            'age' => $request->age,
            'gender' => $request->gender
        ];

        $store = Teacher::create($data);

        if ($store) {
            return redirect()->back()->with(['message' => 'Teacher Added SUCCESSFULLY']);
        } else {
            return redirect()->back()->with(['message' => 'FAILED to Add Teacher']);
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
        $teacher = Teacher::where('id', $id)->firstOrFail();
        return view('pages.teacher.edit', compact('teacher'));
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
            'address' => 'required',
            'gender' => 'required',
            'age' => 'required'
        ]);

        $teacher = Teacher::where('id', $id)->firstOrFail();
        $teacher->name = $request->name;
        $teacher->address = $request->address;
        $teacher->gender = $request->gender;
        $teacher->age = $request->age;
        $update = $teacher->save();
 
        if ($update) {
            return redirect()->route('teacher.index')->with(['message' => 'Teacher Changed SUCCESSFULLY']);
        } else {
            return redirect()->route('teacher.index')->with(['message' => 'Failed to Change Teacher Data']);
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
        $teacher = Teacher::where('id', $id)->firstOrFail();
        $delete = $teacher->delete();

        if ($delete) {
            return redirect()->route('teacher.index')->with(['message' => 'Teacher Deleted SUCCESSFULLY']);
        } else {
            return redirect()->route('teacher.index')->with(['message' => 'FAILED to Delete This Teacher']);
        }
    }
}
