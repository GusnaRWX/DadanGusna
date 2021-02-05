@extends('layouts.global')

@section('title')Students Data @endsection

@section('content')

<div class="container">
    <div class="rows">
        <div class="col-md-10">
            <h3>Stundent Data</h3>
           

            <a href="/create" class="btn btn-primary mb-3">Create New Data</a>
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>     
            @endif
            <hr>
            <table class="table">
                <thead class="table-dark">
                 <tr>
                     <th>#</th>
                     <th>Name</th>
                     <th>Npm</th>
                     <th>Gender</th>
                     <th>Address</th>
                     <th>Email</th>
                     <th>Major</th>
                     <th>Action</th>
                 </tr>
                </thead>
                <tbody>
                  @foreach ($students as $student)
                  <tr>
                      <td scope="row">{{ $loop->iteration }}</td>
                      <td>{{ $student->name }}</td>
                      <td>{{ $student->npm }}</td>
                      <td>{{ $student->gender }}</td>
                      <td>{{ $student->address }}</td>
                      <td>{{ $student->email }}</td>
                      <td>{{ $student->major }}</td>
                      <td>
                          <a href="{{ $student->id }}/edit" class="btn btn-primary">Edit</a>
                          <form action="{{ $student->id }}" class="d-inline" method="POST">
                              @method('delete')
                              @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                      </td>
                  </tr>
                      
                  @endforeach
                </tbody>
              </table> 

        </div>
    </div>
</div>
    
@endsection