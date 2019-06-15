@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Package
                    </div>
                    <div class="card-body">
                        <div class="col-md-6 offset-md-3">
                            @if($package->isPending())
                                <div class="alert alert-primary" role="alert">
                                    <h3>name: {{$package->name}}</h3>
                                    <h3>status: {{$package->status}}</h3>
                                </div>
                            @elseif($package->isConfirmed())
                                <div class="alert alert-warning" role="alert">
                                    <h3>name: {{$package->name}}</h3>
                                    <h3>status: {{$package->status}}</h3>
                                </div>
                            @elseif($package->isDelivered())
                                <div class="alert alert-danger" role="alert">
                                    <h3>name: {{$package->name}}</h3>
                                    <h3>status: {{$package->status}}</h3>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6 offset-md-3">
                            <a href="{{route('admin-edit-package',['id'=>$package->id])}}"  class="delete_post btn btn-primary">
                                Change
                            </a>
                            <a href="{{route('admin-delete-package',['id'=>$package->id])}}" data-method="DELETE"  class="delete_post btn btn-danger">
                                Delete
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection