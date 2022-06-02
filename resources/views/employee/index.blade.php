@extends('layouts/app')
@section('content')
<div class="card">
      <div class="card-body">
        <a href="{{route('employee.create')}}" class="btn btn-primary btn-sm">Add new employee</a>
      </div>
</div>
    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Company</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
          @if(count($employees)>0)
          @foreach($employees as $employee)
            <tr>
            <th scope="row">{{$employee->id}}</th>
            <td>{{$employee->first_name}}</td>
            <td>{{$employee->last_name}}</td>
            <td>{{$employee->email}}</td>
            <td>{{$employee->phone}}</td>
            <td><a class="btn btn-info" href="{{route('company.show', $employee->company->id)}}">{{$employee->company->name}}</a></td>
            <td><a class="btn btn-success btn-sm" href="{{route('employee.edit', $employee->id)}}">Edit</a></td>
            <th scope="col"><form action="{{route('employee.destroy', [$employee->id])}}" method="POST">@csrf <input type="hidden" name="_method" value="DELETE"><button class="btn btn-danger btn-sm" type="submit">Delete</button></form></th>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        <!-- a Tag for previous page -->
        <a class="btn btn-dark" href="{{$employees->previousPageUrl()}}">
          Previous
      </a>
      @for($i=1;$i<=$employees->lastPage();$i++)
          <!-- a Tag for another page -->
          <a class="btn btn-dark" href="{{$employees->url($i)}}">{{$i}}</a>
      @endfor
      <!-- a Tag for next page -->
      <a class="btn btn-dark" href="{{$employees->nextPageUrl()}}">
          Next
      </a>
    </div>
@endsection