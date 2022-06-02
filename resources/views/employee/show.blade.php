@extends('layouts/app')
@section('information')
<div class="card">
  <div class="card-body">
    Personal: {{$employee->name}}
  </div>
</div>
@endsection
@section('content')
<div class="card" style="margin-bottom:1%">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">{{$employee->first_name}}</li>
    <li class="list-group-item">{{$employee->last_name}}</li>
    <li class="list-group-item">{{$employee->email}}</li>
    <li class="list-group-item">{{$employee->phone}}</li>
    <li class="list-group-item"><a href="{{route('company.show', $employee->company->id)}}" class="btn btn-info">{{$employee->company->name}}</a> </li>
  </ul>
</div>
@endsection