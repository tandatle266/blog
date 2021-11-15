@extends('layouts.admin')
@section('title')
  <h1>Post </h1>
@stop
@section('css')
<link rel="stylesheet" href="{{ asset('public/ad123/dashboard') }}/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{{ asset('public/ad123/dashboard') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('public/ad123/dashboard') }}/plugins/summernote/summernote-bs4.min.css">
@stop

@section('main')

<div class="container">
 
    
  <div class="blog" >
    <div>
        <h1 class="text-center">{{ $data->title }}</h1>
        <div >
            <span><i class="fas fa-calendar-alt"></i>Posted {{ $data->created_at }}</span>
        </div>
        <br>
        @php
            echo $data->content;
        @endphp
        <span style=" float: right"><i class="fas fa-user"></i> {{ $data->authorable->name }}</span> 
    </div>
    
    </div> 
   
</div>
  
</div>
 <br>
@stop
@section('js')
  <script src="{{ asset('public/ad123/dashboard') }}/js/slug.js"></script>
  <script src="{{ asset('public/ad123/dashboard') }}/plugins/select2/js/select2.full.min.js"></script>
  <script src="{{ asset('public/ad123/dashboard') }}/plugins/summernote/summernote-bs4.min.js"></script>
  
  
  
@stop