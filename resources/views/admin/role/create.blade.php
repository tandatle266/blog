@extends('layouts.admin')
@section('title')
  <h1>New Post</h1>
@stop
@section('css')
<link rel="stylesheet" href="{{ asset('public/ad123/dashboard') }}/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{{ asset('public/ad123/dashboard') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('public/ad123/dashboard') }}/plugins/summernote/summernote-bs4.min.css">
@stop

@section('main')

<div class="container">
 
    
    <form action="{{ route('admin.rule') }}" method="POST" style="width: 100%" >
      @csrf
      <div class="row">
        <div class="col-md-9">
          <div class="form-group" >
            <label for="exampleInputEmail1">Name</label>
            <br>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Type something.." >
            @error('name')
                <small class="help-block">{{ $message }}</small>
            @enderror
          </div>

          <div class="form-group" >
            <label for="exampleInputEmail1">Email</label>
            <br>
            <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Type something.." >
            @error('email')
                <small class="help-block">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group" >
            <label for="exampleInputEmail1">Password</label>
            <br>
            <input type="text" class="form-control" name="password" id="password" aria-describedby="emailHelp" placeholder="Type something.." >
            @error('password')
                <small class="help-block">{{ $message }}</small>
            @enderror
          </div>

        
      </div>
    </div>
      <br>
      
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  
</div>
 <br>
@stop
@section('js')
  
@stop