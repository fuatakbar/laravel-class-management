<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// models
use App\ClassModel;
use App\Teacher;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = ClassModel::orderBy('name', 'asc')->with('teacher')->paginate(8);
        $teachers = Teacher::orderBy('name', 'asc')->get();
        return view('pages.class.index', compact('classes', 'teachers'));
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
            'teacher_id' => $request->teacher_id
        ];

        $store = ClassModel::create($data);

        if ($store) {
            return redirect()->back()->with(['message' => 'Class Created SUCCESSFULLY']);
        } else {
            return redirect()->back()->with(['message' => 'FAILED to Create Class']);
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
        $class = ClassModel::where('id', $id)->with('teacher')->firstOrFail();
        $teachers = Teacher::orderBy('name', 'asc')->get();
        return view('pages.class.edit', compact('class', 'teachers'));
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
            'teacher_id' => 'required'
        ]);

        $class = ClassModel::where('id', $id)->firstOrFail();
        $class->name = $request->name;
        $class->teacher_id = $request->teacher_id;
        $update = $class->save();
 
        if ($update) {
            return redirect()->route('class.index')->with(['message' => 'Class Changed SUCCESSFULLY']);
        } else {
            return redirect()->route('class.index')->with(['message' => 'Failed to Change Class Data']);
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
        $class = ClassModel::where('id', $id)->firstOrFail();
        $delete = $class->delete();

        if ($delete) {
            return redirect()->route('class.index')->with(['message' => 'Class Deleted SUCCESSFULLY']);
        } else {
            return redirect()->route('class.index')->with(['message' => 'FAILED to Delete This Class']);
        }
    }
}
