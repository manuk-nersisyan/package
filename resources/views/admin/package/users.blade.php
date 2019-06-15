@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Select User {{$users->total()}}
                    </div>
                    <div class="card-body">
                        @foreach($users as $user)
                            <div class="col-md-12">
                                <a href="{{route('admin-user-packages',['id'=>$user->id])}}" class="list-group-item list-group-item-action">
                                    {{$user->name}}
                                </a>
                            </div>
                            <br/>
                        @endforeach
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
