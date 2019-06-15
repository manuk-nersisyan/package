@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Admin
                        <a href="{{route('admin-select-package-user')}}" class="btn btn-primary float-right" > Create Package </a>
                    </div>
                    <div class="card-body">
                        <div class="float-md-right">
                            <a href="{{route('admin-packages')}}" class="btn btn-primary " >
                                Packages
                            </a>
                            <a href="{{route('admin-users')}}" class="btn btn-primary" >
                                Users
                            </a>
                            <a href="{{route('home')}}" class="btn btn-primary" >
                                User page
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

