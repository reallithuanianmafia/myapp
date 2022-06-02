@extends('layouts/app')
@section('information')
<div class="card">
  <div class="card-body">
    New Company
  </div>
</div>
@endsection
@section('content')
<form action="{{route('company.store')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="mb-3">
    <label for="website" class="form-label">Website</label>
    <input type="text" class="form-control" id="website" name="website">
  </div>
  <div class="mb-3">
    <label for="logo" class="form-label">Logo</label>
    <input class="form-control" type="file" id="logo" name="logo">
  </div>
  <div class="mb-3">
    <button type="submit" class="btn btn-info btn-sm">Proceed to create</button>
  </div>
</form>
@endsection