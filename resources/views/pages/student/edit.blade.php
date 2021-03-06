@extends('layouts.app')

@section('title')
    Class Management
@endsection

@section('content')
    <div class="container-fluid student-area my-5">
        <div class="row mx-3">
            <div class="col-12 col-lg-3 mb-4">
                {{-- sidebar menu --}}
                @include('includes.sidebar')
            </div>
            <div class="col-12 col-lg-9 mb-4">
                {{-- class table --}}
                <div class="card table-data">
                    <div class="card-header bg-primary">
                        <div class="row d-flex align-items-center justify-content-between">
                            <div class="col-12 col-lg-6">
                                Edit Student
                            </div>
                            <div class="col-12 col-lg-6 text-right back-button">
                                <a href="{{url()->previous()}}">
                                    <i class="fas fa-arrow-left pr-2"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content center">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Full Name</th>
                                                <th>Age</th>
                                                <th>Gender</th>
                                                <th>Selected Class</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form action="{{route('student.update', [$student->id])}}" method="post">
                                                @csrf
                                                @method('PUT')

                                                <tr class="text-center">
                                                    <td>
                                                        <input class="form-control" type="text" name="name" id="name" required value="{{$student->name}}">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="number" name="age" id="age" required min="18" max="50" value="{{$student->age}}">
                                                    </td>
                                                    <td>
                                                        <select class="form-control" name="gender" id="gender">
                                                            <option value="Male" {{$student->gender == 'Male' ? 'selected' : ''}}>Male</option>
                                                            <option value="Female" {{$student->gender == 'Female' ? 'selected' : ''}}>Female</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="form-control" name="class_id" id="class_id">
                                                            @if ($student->class == null)
                                                                <option value="" selected>Unselected</option>
                                                            @endif
                                                            @if (isset($classes))
                                                                @foreach ($classes as $c)
                                                                    <option value="{{$c->id}}" {{$c->id == $student->class_id ? 'selected' : ''}}>{{$c->name}}</option>
                                                                @endforeach
                                                            @else
                                                                <option value="">Empty Class</option>
                                                            @endif
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-block btn-secondary" type="submit">
                                                            Save
                                                        </button>
                                                    </td>
                                                </tr>
                                            </form>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Add New Class Modal -->
    <div class="modal fade" id="addClassModal" tabindex="-1" role="dialog" aria-labelledby="addClassModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>

                <form action="#" method="post">
                @csrf
                @method('POST')
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="name">Class Name</label>
                            <input class="form-control" type="text" name="name" id="name" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="teacher_id">Choose Teacher</label>
                            <select class="form-control" name="teacher_id" id="teacher_id">
                                <option value="id">Teacher Name</option>
                            </select>
                        </div>
                    </div>
                </form>

                <div class="modal-footer">
                <button type="button" class="btn btn-grey" data-dismiss="modal">
                    Close</button>
                <button type="submit" class="btn btn-secondary">Save changes</button>
            </div>
        </div>
        </div>
    </div>
@endsection