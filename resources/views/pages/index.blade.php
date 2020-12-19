@extends('layouts.app')

@section('title')
    Class Management
@endsection

@section('content')
    <div class="container-fluid user-dashboard my-5">
        <div class="row mx-3">
            <div class="col-3">
                {{-- sidebar menu --}}
                <div class="card sidebar">
                    <div class="card-header bg-primary">
                        Main Menu
                    </div>
                    <div class="card-body mx-3">
                        <ul>
                            <li class="active">
                                <a href="http://"><i class="fas fa-angle-double-right"></i> Classes</a>
                            </li>
                            <li>
                                <a href="http://"><i class="fas fa-angle-double-right"></i> Teachers</a>
                            </li>
                            <li>
                                <a href="http://"><i class="fas fa-angle-double-right"></i> Students</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-6">
                {{-- class table --}}
                <div class="card table-data">
                    <div class="card-header bg-primary">
                        Classes Table
                    </div>
                    <div class="card-body">
                        <div class="row d-flex align-items-center justify-content-between mb-3">
                            <div class="col-6">
                                {{-- search form --}}
                            </div>
                            <div class="col-6 text-right">
                                <a href="#">
                                    <button class="btn btn-primary">
                                        Add New Class
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="row justify-content center">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Class Name</th>
                                                <th>Teacher Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Algoritma & Pemrograman</td>
                                                <td>Fuat Akbar</td>
                                                <td>
                                                    {{-- edit button --}}
                                                    <a href="#">
                                                        <button class="btn btn-secondary py-1 px-2"><i class="fas fa-cog"></i></button>
                                                    </a>
                                                    {{-- delete button --}}
                                                    <a href="#">
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
            <div class="col-3">
                {{-- profile action: edit name, change password --}}
                <div class="card profile-setting">
                    <div class="card-header bg-primary">
                        Profile Setting
                    </div>
                    <div class="card-body mx-3">
                        <ul>
                            <li>
                                <a href="http://"><i class="fas fa-angle-double-right"></i> Name Setting</a>
                            </li>
                            <li>
                                <a href="http://"><i class="fas fa-angle-double-right"></i> Change Password</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection