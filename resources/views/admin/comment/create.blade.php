@extends('layouts.admin')
@section('title')
  <h1>Create Comment</h1>
@stop
@section('css')
<link rel="stylesheet" href="{{ asset('public/ad123/dashboard') }}/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{{ asset('public/ad123/dashboard') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('public/ad123/dashboard') }}/plugins/summernote/summernote-bs4.min.css">
@stop

@section('main')

<div class="container" >
  <form action="{{ route('comment.store') }}" method="POST" style="width: 100%" enctype="multipart/form-data">
    @csrf 
    <div class="row">
      <div class="col-md-9">
        
        <div class="form-group" >
          <label for="exampleInputEmail1">Content</label>
          <br>
          <textarea class="form-control" name="content" id="creditor" aria-describedby="emailHelp" placeholder="Type something.." ></textarea>
        </div>
        <div class="form-group" >
          <label for="my-select">Reply</label>
          <select id="my-select-choose" class="form-control" onchange="myFunction()">
            <option value="" >---Select one---</option>
           
            <option value="cmt">Post</option>
            <option value="post">Comment</option>
           
          </select>
        </div>
        <div class="form-group" id="post" style="display:none">
          <label for="my-select">Post</label>
          <select  class="form-control" name="post_id">
            <option value="0" >---Select one---</option>
            @foreach ($data as $d)
            <option id="my-select-post" value="{{ $d->id }}">{{ $d->title }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group" id="cmt"style="display:none">
          <label for="my-select">Reply Comment</label>
          <select  class="form-control" name="cmt_id">
            <option value="0" >---Select one---</option>
            @foreach ($cmt as $c)
            <option value="{{ $c->id }}" id="my-select-cmt" >
              {{ strip_tags($c->body) }}
            </option>
            @endforeach
          </select>
        </div>
        
      </div>
    
      <div class="col-md-3" >  
        <div class="form-group" >
          <label for="my-select">Author</label>
          <select id="my-select" class="form-control" name="created_id">
            <option value="{{ Auth::guard('admin')->user()->id  }}">  {{ Auth::guard('admin')->user()->name }}</option>
          </select>
        </div>

        <div class="form-group" >
          <label for="exampleInputEmail1">Image</label>
          <br>
          <input type="file" class="form-control" name="file_upload" id="img" aria-describedby="emailHelp" placeholder="Type something.." >          
        </div>
        <img id="blah" src="" style="width: 100%" />
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
  <script >
  function myFunction() {
    var x = document.getElementById("my-select-choose").value;
    if(x=="cmt"){
      document.getElementById("post").style.display = "block";  
      document.getElementById(x).style.display = "none";  
    }
    else{
      document.getElementById("cmt").style.display = "block";  
      document.getElementById(x).style.display = "none";  
    }
    
  }
  </script>
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