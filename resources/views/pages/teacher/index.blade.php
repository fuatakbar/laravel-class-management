@extends('layouts.app')

@section('title')
    Class Management
@endsection

@section('content')
    <div class="container-fluid teacher-area my-5">
        <div class="row mx-3">
            <div class="col-12 col-lg-3 mb-4">
                {{-- sidebar menu --}}
                @include('includes.sidebar')
            </div>
            <div class="col-12 col-lg-9 mb-4">
                {{-- class table --}}
                <div class="card table-data">
                    <div class="card-header bg-primary">
                        <div class="row d-flex align-items-center">
                            <div class="col-6">
                                Teacher Table
                            </div>
                            <div class="col-6 text-right">
                                <a href="#" data-toggle="modal" data-target="#addNewTeacherModal">
                                    <button class="btn btn-primary">
                                        Add New Teacher
                                    </button>
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
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Age</th>
                                                <th>Gender</th>
                                                <th>Adress</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Ali Muhammad</td>
                                                <td>25</td>
                                                <td>Male</td>
                                                <td>Jl. Tanjung Barat Lama</td>
                                                <td>
                                                    {{-- edit button --}}
                                                    <a href="{{route('teacher.edit', [1])}}" class="pr-1">
                                                        <button class="btn btn-secondary py-1 px-2"><i class="fas fa-cog"></i></button>
                                                    </a>
                                                    {{-- delete button --}}
                                                    <a href="#" onclick="return confirm('Are you sure to delete this class?')">
                                                        <button class="btn btn-danger py-1 px-2"><i class="fas fa-trash-alt"></i></button>
                                                    </a>
                                                </td>
                                            </tr>
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
    <div class="modal fade" id="addNewTeacherModal" tabindex="-1" role="dialog" aria-labelledby="addNewTeacherModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Teacher</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
                </div>

                <form action="#" method="post">
                @csrf
                @method('POST')
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="name">Teacher's Name</label>
                            <input class="form-control" type="text" name="name" id="name" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="address">Address</label>
                            <input class="form-control" type="text" name="address" id="address" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="age">Age</label>
                            <input class="form-control" type="number" name="age" id="age" required min="18" max="50">
                        </div>

                        <div class="form-group mb-3">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="gender" id="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
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