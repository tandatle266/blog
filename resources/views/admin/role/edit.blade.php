@extends('layouts.admin')
@section('title')
  <h1>Edit Role : {{ $data->name }}</h1>
@stop


@section('main')

<div class="container">
 
    <form action="{{ route('role.update', $data->id) }}" method="POST" style="width: 100%" >
      @csrf @method('PUT')
      <div class="row">
        <div class="col-md-9">
          <div class="form-group" >
            <label for="exampleInputEmail1">Name</label>
            <br>
            <input type="hidden" class="form-control"  id="disabledTextInput" name="user" value="{{ $data->id }}" aria-describedby="emailHelp" placeholder="Type something.." >
            <input type="text" class="form-control"  id="disabledTextInput"  value="{{ $data->name }}" aria-describedby="emailHelp" placeholder="Type something.." disabled>
          </div>
    
         @foreach ($model as $m)
         <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="name[]" value="{{ $m->id }}">
          <label class="form-check-label" for="inlineCheckbox1" >{{ $m->permission }}</label>
        </div>
         @endforeach
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