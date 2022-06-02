@extends('layouts/app')
@section('content')
<div class="card">
      <div class="card-body">
        <a href="{{route('company.create')}}" class="btn btn-primary btn-sm">Add new company</a>
      </div>
</div>
    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Website</th>
            <th scope="col">Employees</th>
            <th scope="col">Logo</th>
            <th scope="col">View Members</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
          @if(count($companies)>0)
          @foreach($companies as $company)
            <tr>
            <th scope="row">{{$company->id}}</th>
            <td>{{$company->name}}</td>
            <td>{{$company->email}}</td>
            <td>{{$company->website}}</td>
            <td>{{count($company->employees)}}</td>
            <td><img src="{{URL::asset('/storage/logos/'.$company->logo.'')}}" width="100" height="100" alt=""></td>
            <th scope="col"><a href="{{route('company.show', $company->id)}}" class="btn btn-primary btn-sm" type="button">View</a></th>
            <th scope="col"><a href="{{route('company.edit', $company->id)}}" class="btn btn-success btn-sm" type="button">Edit</a></th>
            <th scope="col"><form action="{{route('company.destroy', [$company->id])}}" method="POST">@csrf <input type="hidden" name="_method" value="DELETE"><button class="btn btn-danger btn-sm" type="submit">Delete</button></form></th>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>


    <div class="d-flex justify-content-center">
        <!-- a Tag for previous page -->
        <a class="btn btn-dark" href="{{$companies->previousPageUrl()}}">
          Previous
      </a>
      @for($i=1;$i<=$companies->lastPage();$i++)
          <!-- a Tag for another page -->
          <a class="btn btn-dark" href="{{$companies->url($i)}}">{{$i}}</a>
      @endfor
      <!-- a Tag for next page -->
      <a class="btn btn-dark" href="{{$companies->nextPageUrl()}}">
          Next
      </a>
    </div>


      

@endsection