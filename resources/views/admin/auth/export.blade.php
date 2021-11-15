@extends('layouts.admin')
@section('title')
  <h1>Import/Export</h1>
@stop

@section('main')

<div class="container">
    <br>
    <form action="{{ route('admin.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group " >
            <div class="custom-file text-left">
                <input type="file" name="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
        </div>
        <button class="btn btn-primary">Import data</button>       
    </form>
    <br>
    <hr>
    <form action="{{ route('admin.import') }}" method="POST">
        
        <div class="form-group" >
            <label for="my-select">Model</label>
                <select id="my-select" class="form-control" name="model">
                <option value="user" >User </option>
                <option value="post" >Post </option>
                </select>
          </div> 
          <button class="btn btn-primary">Export data</button>        
    </form>
    
</div>
@stop