@extends('layouts.app')

@section('title')
    Class Management
@endsection

@section('content')
    <div class="container-fluid user-dashboard my-5">
        <div class="row mx-3">
            <div class="col-12 col-lg-3 mb-4">
                {{-- sidebar menu --}}
                @include('includes.sidebar')
            </div>
            <div class="col-12 col-lg-6 mb-4">
                {{-- class table --}}
                <div class="card statistic">
                    <div class="card-header bg-primary">
                        Statistics
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-4 text-center">
                                <div class="card bg">
                                    <div class="card-header bg-secondary">
                                        Total Class
                                    </div>
                                    <div class="card-body total">
                                        123
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4 text-center">
                                <div class="card bg">
                                    <div class="card-header bg-secondary">
                                        Total Teacher
                                    </div>
                                    <div class="card-body total">
                                        123
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4 text-center">
                                <div class="card bg">
                                    <div class="card-header bg-secondary">
                                        Total Student
                                    </div>
                                    <div class="card-body total">
                                        123
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3 mb-4">
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