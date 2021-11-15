@extends('layouts.admin')
@section('title')
  <h1>Edit Blog : {{ $data->title }}</h1>
@stop
@section('css')
<link rel="stylesheet" href="{{ asset('public/ad123/dashboard') }}/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{{ asset('public/ad123/dashboard') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('public/ad123/dashboard') }}/plugins/summernote/summernote-bs4.min.css">
@stop

@section('main')

<div class="container">
 
    <form action="{{ route('post.update', $data->id) }}" method="POST" style="width: 100%" enctype="multipart/form-data">
      @csrf @method('PUT')
      <div class="row">
        <div class="col-md-9">
          <div class="form-group" >
            <label for="exampleInputEmail1">Title</label>
            <br>
            <input type="text" class="form-control" name="title" id="name" value="{{ $data->title }}" aria-describedby="emailHelp" placeholder="Type something.." >
            @error('name')
                <small class="help-block">{{ $message }}</small>
            @enderror
          </div>
    
          <div class="form-group" style="width: 30%;"> 
            <input type="hidden" class="form-control" name="slug" id="slug" value="{{ $data->slug }}"  aria-describedby="emailHelp" placeholder="Type something.." >
          </div>


          <div class="form-group" >
            <label for="exampleInputEmail1">Content</label>
            <br>
            <textarea class="form-control" name="content"    id="creditor" aria-describedby="emailHelp" placeholder="Type something.." >{{ $data->content }}</textarea>
          </div>
        </div>
      
        <div class="col-md-3" >  
                   
          
          <div class="form-group" >
            <label for="exampleInputEmail1">Thumbnail</label>
            <br>
            <input type="file" class="form-control" name="file_upload"  id="img" aria-describedby="emailHelp"  >          
          </div>
          <img id="blah" src="{{asset('public/uploads') }}/{{ $data->thumbnail }}" style="width: 100%" />
        </div>
      </div>
      <br>
      
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  
</div>
 <br>
@stop
@section('js')
  <script src="{{ asset('public/ad123/dashboard') }}/js/slug.js"></script>
  <script src="{{ asset('public/ad123/dashboard') }}/plugins/select2/js/select2.full.min.js"></script>
  <script src="{{ asset('public/ad123/dashboard') }}/plugins/summernote/summernote-bs4.min.js"></script>
  <script>
     $(function () {
       
      img.onchange = evt => {
      const [file] = img.files
      if (file) {
        blah.src = asset.createObjectasset(file)
      }
    };
    })


  </script>
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