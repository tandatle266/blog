<!DOCTYPE html>
<html lang="zxx" class="no-js">
  <head>
    <!-- Mobile Specific Meta -->
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png" />
    <!-- Author Meta -->
    <meta name="author" content="colorlib" />
    <!-- Meta Description -->
    <meta name="description" content="" />
    <!-- Meta Keyword -->
    <meta name="keywords" content="" />
    <!-- meta character set -->
    <meta charset="UTF-8" />
    <!-- Site Title -->
    <title>Blogger</title>

    <link
      href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700"
      rel="stylesheet"
    />
    <!--
			CSS
			============================================= -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/linearicons.css')}}" />
    <link rel="stylesheet" href="{{asset('public/frontend/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('public/frontend/css/owl.carousel.css')}}" />
    <link rel="stylesheet" href="{{asset('public/frontend/css/main.css')}}" />
    @yield('css')
    <style>
      

    @media only screen and (min-width: 790px) {
        .menu1{
            /* border: 1px solid #333; */
            margin-left: -5rem;
            }
        }
      .c1{
        color: #007bff;
      }
    </style>
    {{-- Fix Drop Down menu --}}
    <script>
        function dropMenu(){
        var dropmenu = document.getElementById('dropMenu');
            if (dropmenu.style.display === "none") {
                dropmenu.style.display = "block";
            } else {
                dropmenu.style.display = "none";
            }
            }
    </script>
  </head>
  <body>
    <!-- Start Header Area -->
    @include('layouts.navbar')
    <!-- End Header Area -->
    @yield('content')
    <!-- start footer Area -->
    <footer class="footer-area section-gap">
      <div class="container">
        <div class="row footer-bottom d-flex justify-content-between">
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          <p class="col-lg-8 col-sm-12 footer-text">
            Copyright &copy;
            <script>
              document.write(new Date().getFullYear());
            </script>
            All rights reserved | This template is made with
            <i class="fa fa-heart-o" aria-hidden="true"></i> by
            <a href="https://colorlib.com" target="_blank">Colorlib</a>
          </p>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          <div class="col-lg-4 col-sm-12 footer-social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-dribbble"></i></a>
            <a href="#"><i class="fa fa-behance"></i></a>
          </div>
        </div>
      </div>
    </footer>
    <!-- End footer Area -->

    <script src="{{asset('public/frontend/js/vendor/jquery-2.2.4.min.js')}}"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
      integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
      crossorigin="anonymous"
    ></script>
    <script src="{{asset('public/frontend/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/parallax.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.sticky.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
    @yield('js')
    @stack('footer')
  </body>
</html>
