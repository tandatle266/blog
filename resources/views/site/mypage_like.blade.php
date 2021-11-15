@extends('layouts.home')


@section('content')

<!-- Start top-section Area -->

<!-- End top-section Area -->
<div class="container thumbnail" >
    <br>
    @foreach ($data as $d )
    
    <div class="blog" style="margin:0 auto ;margin-top:5%;width:70%" >
        <a href="{{ route('site.post.detail', ['slug'=> $d->slug])}}">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ url('public/uploads') }}/{{ $d->thumbnail }}" style="width: 200px; height:200px;">
            </div>
           <div class="col-md-8">
            <div>
                <h2>{{ $d->title }}</h2>
                <div class="desc">
                    <br>
                    <h5>Posted {{ $d->created_at->diffForHumans() }}</h5>
                    <br>
                    <i style="position:absolute;bottom: 5%;color: red" class="fa fa-heart" aria-hidden="true" ></i>
                    <h4 style=" float: right">{{ $d->authorable->name}}</h4>
                </div>
            </div>
            <button  type="button" style="position:absolute;right:5%;bottom: 5%;"class="btn-sm btn-danger">Read More..</button> 
           </div>
            
        </div>
           
        </a>
        
    </div>
    <hr>
    @endforeach  
             
</div>
@endsection
