@extends('layouts/app')
@section('information')
<div class="card">
  <div class="card-body">
    {{$company->name}}
  </div>
</div>
@endsection
@section('content')
<div class="card" style="margin-bottom:1%">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">{{$company->name}}</li>
    <li class="list-group-item">{{$company->email}}</li>
    <li class="list-group-item">{{$company->website}}</li>
    <li class="list-group-item"><img src="{{URL::asset('/storage/logos/'.$company->logo.'')}}" width="100" height="100" alt=""></li>
  </ul>
</div>

<div class="card">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">{{$company->name}}'s Employees</li>
    @if(count($company->employees)>0)
    @foreach($company->employees as $employee)
    <li class="list-group-item"><a href="{{route('employee.show', $employee->id)}}" class="btn btn-info">{{$employee->first_name}} {{$employee->last_name}} </a> </li>
    @endforeach
    @else
    <li class="list-group-item"> <span class="badge text-bg-danger">No person has been registered to {{$company->name}} </span> </a> </li>
    @endif

  </ul>
</div>

@endsection