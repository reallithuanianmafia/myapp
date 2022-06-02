@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                
                @if(Session::has('message'))
                <div class="alert alert-danger" role="alert">
                    {{ Session('message') }}
                </div>
                @endif
                <div class="card-body">
                    <h5 class="card-title">Companies</h5>
                    <a href="{{route('company.index')}}" class="btn btn-info form-control">Explore companies</a>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Employees</h5>
                    <a href="{{route('employee.index')}}" class="btn btn-info form-control">Explore employees</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
