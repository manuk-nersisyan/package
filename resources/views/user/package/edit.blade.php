@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Edit Package
                    </div>
                    <div class="card-body">
                        @include('_forms.user.package-edit-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
