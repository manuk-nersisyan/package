@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                       Packages {{$packages->total()}}
                        <div class="col-md-8">
                            @include('_forms.admin.package-filter-admin-form')
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach($packages as $package)
                            <div class="col-md-12">
                                <a href="{{route('admin-show-package',['id'=>$package->id])}}" class="list-group-item list-group-item-action">
                                    {{$package->name}}
                                </a>
                                <a href="{{route('admin-edit-package',['id'=>$package->id])}}"  class="delete_post btn btn-primary">
                                    Change
                                </a>
                                <a href="{{route('admin-delete-package',['id'=>$package->id])}}" data-method="DELETE"  class="delete_post btn btn-danger">
                                    Delete
                                </a>
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
