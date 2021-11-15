@extends('layouts.admin')
@section('title')
  <h1>Edit Tag : {{ $data->name }}</h1>
@stop
@section('main')

<div class="container" >
  <form action="{{ route('image.update', $data->id) }}" method="POST" style="width: 100%" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="row">
      <div class="col-md-9">
        
        <div class="form-group" >
          <label for="exampleInputEmail1">Content</label>
          <br>
          <textarea class="form-control" name="content" id="creditor"  aria-describedby="emailHelp" placeholder="Type something.." >{{ $data->body }}</textarea>
        </div>
        <div class="form-group" >
          <label for="my-select">Post</label>
          <select id="my-select" class="form-control" name="post_id">
            
            <option value="{{ $model->replyable->id }}" selected>{{ $model->replyable->title }}</option>
           
          </select>
        </div>
        
      </div>
    
      <div class="col-md-3" >  
        <div class="form-group" >
          <label for="my-select">Author</label>
          <select id="my-select" class="form-control" name="created_id">
            <option value="{{ $data->authorable_id }}">{{ $data->authorable_type }}</option>
          </select>
        </div>

        <div class="form-group" >
          <label for="exampleInputEmail1">Image</label>
          <br>
          <input type="file" class="form-control" name="file_upload" id="img" aria-describedby="emailHelp" placeholder="Type something.." >          
        </div>
        <img id="blah" src="{{asset('public/uploads') }}/{{ $data->image }}" style="width: 100%" />
      </div>
    </div>
    <br>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <br>
</div>
 
@stop
@section('js')
  <script src="{{ asset('public/frontend/ckeditor') }}/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('creditor',{
      filebrowserBrowseUrl: '/thread2/public/frontend/ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl: '/thread2/public/frontend/ckfinder/ckfinder.html?Type=Images',
      filebrowserUploadUrl: '/thread2/public/frontend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl: '/thread2/public/frontend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
      filebrowserWindowWidth : '1000',
      filebrowserWindowHeight : '700'
    });
  </script>
  
  
@stop