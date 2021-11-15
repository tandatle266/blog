@extends('layouts.home')
@section('content')

<!-- Start top-section Area -->

<!-- End top-section Area -->
<div class="post-wrapper pt-100">
    <!-- Start post Area -->
    <section class="post-area">
      <div class="container">
        @if (Session::has('error'))
            
        <div class="alert alert-success" style="margin:0 20%  0 ">
            <strong>{{ Session::get('error') }}</strong>
        </div>
        @endif
        <br>
        <div class="row justify-content-center d-flex">
          <div class="col-lg-8">
            <div class="top-posts pt-50">
              <div class="container">
                <div class="row justify-content-center">
                
                 @foreach ($data as $post)
                 <div class="single-posts col-lg-6 col-sm-6">
                    <a href="{{ route('site.post.detail', ['slug'=> $post->slug])}}">
                   <img class="img-fluid" src="{{asset('public/uploads') }}/{{ $post->thumbnail }}" sytle="width: 200px!important;height : 100px !important;" />
                   <div class="">{{$post->created_at->diffForHumans()}}</div>
                   <div class="detail">
                    <h4 class="pb-20">
                        {{$post->title}}
                       </h4>
                     <p>
                       {!! Str::limit($post->content, 400) !!}
                     </p>
                     <p class="footer pt-20">
                      
                       <i 
                       @php 
                       if(Auth::user()->likedPosts()->where('post_id', $post->id)->count() > 0)
                         
                          {
                            echo 'class="fa fa-heart" style="color:red" ';
                          }
                       else {echo 'class="fa fa-heart-o" ';}
                       @endphp
                       
                        aria-hidden="true"></i>
                       
                       <a href="#">{{ $post->likedUser->count() }} Likes</a>
                       <i
                         class="ml-20 fa fa-comment-o"
                         aria-hidden="true"
                       ></i>
                       <a href="#"> Comments</a>
                     </p>
                   </div>
                </a>
                     
                 </div>
                 
                 @endforeach
                  <div class="justify-content-center d-flex mt-5">
                    {{ $data->links()}}
                </div>
                </div>
              </div>
            </div>
          </div>
         
        </div>
      </div>
    </section>
    <!-- End post Area -->
  </div>
@endsection
