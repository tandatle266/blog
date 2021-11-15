@extends('layouts.home')


@section('content')

<!-- Start top-section Area -->

<!-- End top-section Area -->
<div class="container " >
    <div class="row">
        <div class="col-md-5" >
            <section class="comment-sec-area pt-80 pb-80" >
                <div class="container" >
                    <div class="row flex-column">   
                        <h5 class="text-uppercase pb-80">Comment</h5>                
                        @foreach ($comment as $cmt)
                            <div class="comment" style="border-right: double;">
                                <div class="comment-list">
                                    <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="{{asset('public/frontend/img/asset/user.png')}}"  width="50px"/>
                                            </div>
                                            <div class="">                              
                                                <p class="date" style="margin-bottom:0 !important">{{$cmt->created_at->diffForHumans() }}</p>
                                                    @php
                                                        echo $cmt->body;
                                                    @endphp
                                            </div>
                                        </div>                            
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
        
        <div class="col-md-7" >
            <section class="comment-sec-area pt-80 pb-80" style="margin-left:10%;border-bottom: none;">
                <div class="container">
                    <div class="row flex-column">
                        <h5 class="text-uppercase pb-80">Thông Báo</h5>
                        @foreach ($data as $notis)
                            @foreach ($notis->likedUser as $noti )
                                <div class="comment">
                                    <div class="comment-list">
                                        <div class="single-comment justify-content-between d-flex">
                                            <div class="user justify-content-between d-flex">
                                                <div class="thumb">
                                                    <img src="{{asset('public/frontend/img/asset/user.png')}}"  width="50px"/>
                                                </div>
                                                <div class="">
                                                    <p class="date" style="margin-bottom:0 !important">{{$noti->pivot->created_at->diffForHumans() }}</p>
                                                    <p class="comment">{{$noti->name}} đã thích bài viết của bạn!!</p>
                                                </div>
                                            </div>                                           
                                        </div>              
                                        <hr>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
