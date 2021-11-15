<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('public/ad123/login') }}/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('public/ad123/login') }}/css/style.css">
</head>
<body>

<div class="main">
    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="{{ asset('public/ad123/login') }}/images/signin-image.jpg" alt="sing up image"></figure>
                    <a href="{{ route('admin.register') }}" class="signup-image-link">Create an account</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" action="{{ route('admin.login') }}" method="POST" class="register-form" id="login-form">
                        @csrf 
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-email"></i></label>
                            <input type="text" name="email" id="your_name" placeholder="Your Email"/>
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="your_pass" placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                        </div>    
                        <div class="form-group" style="text-align: right !important">
                            <label for="agree-term" class="label-agree-term" >
                                <a  href="{{ route('admin.reset_pass') }}" class="term-service">Forgot password ??</a></label>
                        </div>                  
                    </form>
                    
                </div>
            </div>
        </div>
    </section>

</div>
</body>
</html>