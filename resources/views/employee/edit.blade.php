@extends('layouts/app')
@section('information')
<div class="card">
  <div class="card-body">
    Edit - {{$employee->first_name}} {{$employee->last_name}}  - personal information
  </div>
</div>
@endsection
@section('content')
<form action="{{route('employee.update', $employee->id)}}" method="POST" enctype="multipart/form-data">
  @csrf
  {{ method_field('PUT') }}
  <div class="mb-3">
    <label for="first_name" class="form-label">First Name</label>
    <input type="text" class="form-control" id="first_name" name="first_name" value="{{$employee->first_name}}">
  </div>
  <div class="mb-3">
    <label for="last_name" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="last_name" name="last_name" value="{{$employee->last_name}}">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="{{$employee->email}}">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Telephone</label>
    <input type="text" class="form-control" id="phone" name="phone" value="{{$employee->phone}}">
  </div>
  <div class="mb-3">
    <label for="company" class="form-label">Select Company</label>
    <select class="form-select" aria-label="Default select example" id="company" name="company_id">
      @foreach($companies as $company)
      <option @if($company->id == $employee->company->id) selected @endif value="{{$company->id}}">{{$company->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <button type="submit" class="btn btn-info btn-sm">Proceed to create</button>
  </div>
</form>
@endsection