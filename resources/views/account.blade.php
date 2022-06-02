@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Account</div>
                <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{auth()->user()->name}}</li>
                    <li class="list-group-item">{{auth()->user()->email}}</li>
                    <li class="list-group-item"> @if(auth()->user()->role == 1)Administrator @else User @endif</li>
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
