@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Packages {{$packages->total()}}
                        <div class="float-md-right">
                            <a href="{{route('create-package')}}" class="btn btn-primary " > Create Package </a>
                            @if(Auth::user()->role === 1)
                                <a href="{{route('admin-home')}}" class="btn btn-primary " >Admin</a>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-8">
                            @include('_forms.user.package-filter')
                        </div>
                        @foreach($packages as $package)
                            <div class="col-md-12">
                                    <a href="{{route('show-package',['id'=>$package->id])}}" class="list-group-item list-group-item-action">
                                         {{$package->name}}
                                    </a>
                                    <a href="{{route('edit-package',['id'=>$package->id])}}"  class="delete_post btn btn-primary">
                                            Change
                                    </a>
                                @if(!$package->isPending())
                                    <a href="{{route('delete-package',['id'=>$package->id])}}" data-method="DELETE"  class="delete_post btn btn-danger">
                                            Delete
                                    </a>
                                @endif
                            </div>
                            <br/>
                        @endforeach
                        @if($status)
                            {{$packages->appends(['status' => $status])->links()}}
                        @else
                            {{$packages->links()}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
