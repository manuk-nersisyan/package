@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Create Package
                    </div>
                    <div class="card-body">
                        @include('_forms.admin.package-edit-admin-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection