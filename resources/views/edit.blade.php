@extends('layouts.global')
@section('title')Update Data  
@endsection
 @section('content')

 <div class="container">
     <div class="row">
         <div class="col-md-8">
             <form action="/{{$student->id}}" method="post" enctype="multipart/form-data">
                
                @csrf
               @method('patch')
                <h3>Update data</h3>
                
                @csrf
                <div class="mb-3 form-group">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="name" placeholder="input your name" name="name" value="{{$student->name}}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="mb-3 form-group">
                    <label for="npm" class="form-label">Npm</label>
                    <input type="text" class="form-control @error('npm') is-invalid @enderror" id="npm" placeholder="input your npm" name="npm" value="{{$student->npm}}">
                    @error('npm')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                
                    <label for="">Gender</label>
                    <div class="form-check">
                        <input type="checkbox" {{in_array("MALE", json_decode($student->gender)) ? "checked" : ""}} name="gender[]" id="MALE" value="MALE" 
                        class="form-check-input @error('gender') is-invalid @enderror" >
                        <label for="MALE">MALE</label>
                     </div>
                     <div class="form-check">
                    <input type="checkbox" {{in_array("FEMALE", json_decode($student->gender)) ? "checked" : ""}} name="gender[]" id="FEMALE" value="FEMALE" 
                    class="form-check-input @error('gender') is-invalid @enderror" >
                    <label for="FEMALE">FEMALE</label>
                     </div>
                    @error('gender')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                        
                    @enderror

                
                    <br>

                <div class="mb-3 form-group">
                    <label for="addresss" class="form-label">Address</label>
                    <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror">{{old('address') ? old('address') : $student->address}}</textarea>
                    @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}

                    </div>    
                    @enderror
                </div>

                <div class="mb-3 form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="input your email" name="email" value="{{$student->email}}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3 form-group">
                    <label for="major" class="form-label">Major</label>
                    <input type="text" class="form-control @error('major') is-invalid @enderror" id="major" placeholder="input your major" name="major" value="{{$student->major}}">
                    @error('major')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary" value="Save">Save</button>

            
            </form>
         </div>
     </div>
 </div>
     
 @endsection