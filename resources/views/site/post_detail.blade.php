@extends('layouts.home')

@section('content')
<!-- Start top-section Area -->
<section class="top-section-area section-gap">
  <div class="container">
    <div class="row justify-content-between align-items-center d-flex">
      <div class="col-lg-8 top-left">
        <h1 class="text-white mb-20">Post Details</h1>
      </div>
    </div>
  </div>
</section>
<!-- End top-section Area -->

<!-- Start post Area -->
<div class="post-wrapper pt-100">
  @if (Session::has('error'))
            
        <div class="alert alert-success" style="margin:0 20%  0 ">
            <strong>{{ Session::get('error') }}</strong>
        </div>
        @endif
        <br>
  <!-- Start post Area -->
  <section class="post-area">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="single-page-post">
            <img class="img-fluid" src="{{asset('public/uploads') }}/{{ $post->thumbnail }}"  alt="{{$post->thumbnail}}" />
            <div class="top-wrapper">
              <div class="row d-flex justify-content-between">
                <h2 class="col-lg-8 col-md-12 text-uppercase">
               {{$post->title}}
                </h2>
                <div
                  class="col-lg-4 col-md-12 right-side d-flex justify-content-end"
                >
                  <div class="desc">
                    <h2>{{$post->authorable->name}}</h2>
                    <h3>{{$post->created_at->diffForHumans()}}</h3>
                  </div>
                  <div class="user-img">
                    <img src=""   width="50px"/>
                  </div>
                </div>
              </div>
              
            </div>
            
            <div class="single-post-content">
             {!! $post->content !!}
            </div>
            <div class="bottom-wrapper">
              <div class="row">
                <div class="col-lg-4 single-b-wrap col-md-12">
                        <a href="#" onclick="document.getElementById('like-form-{{ $post->id }}').submit();">
                          <i 
                          @php 
                          if(Auth::user()->likedPosts()->where('post_id', $post->id)->count() > 0)
                            
                             {
                               echo 'class="fa fa-heart" style="color:red" ';
                             }
                          else {echo 'class="fa fa-heart-o" ';}
                          @endphp
                          
                           aria-hidden="true"></i>
                        </a>
                         {{$post->likedUser->count()}} people like this
                     
                         <form action="{{route('site.like',$post->id)}}" method="POST" style="display: none" id="like-form-{{$post->id}}">
                         @csrf
                         </form>
                   </div>
                   <div class="col-lg-4 single-b-wrap col-md-12">                   
                   </div>
                <div class="col-lg-4 single-b-wrap col-md-12">
                  <i class="fa fa-comment-o" aria-hidden="true"></i>                   
                  comments
                </div>
                </div>
              </div>
            </div>

            <!-- Start comment-sec Area -->
            <section class="comment-sec-area pt-80 pb-80">
                <div class="container">
                  <div class="row flex-column">
                    <h5 class="text-uppercase pb-80">
                      All Comments</h5>
                    <br />
                  @foreach ($post->replys as $rep)
                  <div class="comment">
                        <div class="comment-list">
                          <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                              <div class="thumb">
                                <img src="{{asset('public/frontend/img/asset/user.png')}}"  width="50px"/>
                              </div>
                              <div class="desc">
                                <h5><a href="#">{{$rep->comment->authorable->name}}</a></h5>
                                <p class="date">{{$rep->created_at->diffForHumans()}}</p>
                                <p class="comment">
                                    @php
                                        echo $rep->comment->body;
                                    @endphp
                                </p>
                              </div>
                            </div>
                            <div class="">
                              <button class="btn-reply text-uppercase" id="reply-btn"
                                onclick="showReplyForm('{{$rep->comment->id}}','{{  $rep->comment->authorable->name  }}')">reply
                            </button>
                            </div>
                          </div>
                        </div>
                      @if($rep->comment->replys->count() > 0)
                        @foreach ($rep->comment->replys as $cmt_rep)
                        <div class="comment-list left-padding">
                          <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                              <div class="thumb">
                                <img src="{{asset('public/frontend/img/asset/user.png')}}"  width="50px"/>
                              </div>
                              <div class="desc">
                                <h5><a href="#">{{  $rep->comment->authorable->name  }}</a></h5>
                                <p class="date">{{ $cmt_rep->comment->created_at->format('D, d M Y H:i')  }}</p>
                                <p class="comment">
                                    @php
                                    echo $cmt_rep->comment->body;
                                    @endphp
                                </p>
                              </div>
                            </div>
                            <div class="">
                                <button class="btn-reply text-uppercase" id="reply-btn"
                                onclick="showReplyForm('{{  $rep->comment->id }}','{{  $rep->comment->authorable->name  }}')">reply
                            </button>
                            </div>
                          </div>
                        </div>
                        @endforeach
                        @else
                        @endif
                     {{-- When user login show reply fourm --}}
                     <div class="comment-list left-padding" id="reply-form-{{$rep->cmt_id}}" style="display: none">
                       <div
                         class="single-comment justify-content-between d-flex"
                       >
                         <div class="user justify-content-between d-flex">
                           <div class="thumb">
                            <img src="{{asset('public/frontend/img/asset/user.png')}}"  width="50px"/>
                           </div>
                           <div class="desc">
                             <h5><a href="#">{{Auth::user()->name}}</a></h5>
                             <p class="date">{{date('D, d M Y H:i')}}</p>
                             <div class="row flex-row d-flex">
                             <form action="{{route('site.comment.store')}}" method="POST">
                             @csrf @method('PUT')
                                  <input type="hidden"  value="{{ $rep->cmt_id }}" name="reply_id">
                               <div class="col-lg-12">
                                 <textarea
                                   id="reply-form-{{$rep->cmt_id}}-text"
                                   cols="60"
                                   rows="2"
                                   class="form-control mb-10"
                                   name="body"
                                   placeholder="Messege"
                                   onfocus="this.placeholder = ''"
                                   onblur="this.placeholder = 'Messege'"
                                   required=""
                                 ></textarea>
                               </div>
                               <button type="submit" class="btn-reply text-uppercase ml-3">Comment</button>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
           @endforeach
          </div>
        </div>
      </section>
              <!-- End comment-sec Area -->

            <!-- Start commentform Area -->
            <section class="commentform-area pb-120 pt-80 mb-100">
                   
                    <div class="container">
                      <h5 class="text-uppercas pb-50">Leave a Comment</h5>
                      <div class="row flex-row d-flex">
                          <div class="col-lg-12">
                              <form action="{{route('site.comment.store')}}" method="POST">
                                  @csrf @method('PUT')
                                  <input type="hidden"  value="{{ $post->id }}" name="post_id">
                              <textarea
                                class="form-control mb-10"
                                id="creditor"
                                name="body"
                                placeholder="Messege"
                                onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Messege'"
                                required=""
                              ></textarea>
                              <button type="submit" class="primary-btn mt-20" href="#">Comment</button>
                          </form>
                          </div>
                      </div>
                    </div>
                </section>
            <!-- End commentform Area -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End post Area -->
</div>
<!-- End post Area -->
@endsection
@push('footer')
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
    <script type="text/javascript">
    function showReplyForm(commentId,user) {
      var x = document.getElementById(`reply-form-${commentId}`);
      var input = document.getElementById(`reply-form-${commentId}-text`);

      if (x.style.display === "none") {
        x.style.display = "block";
        input.innerText=`@${user} `;

      } else {
        x.style.display = "none";
      }
    }
   
    
    </script>
@endpush
