<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
                    
                    @if (Session::has('message'))
                    <div class="alert alert-primary">
                        <strong>{{ Session::get('message') }}</strong>
                    </div>
                    @endif
                    
                    <h3 class="form-title" >Reset Password</h3>
                    <form method="POST" action="{{ route('admin.reset_pass') }}" method="POST" class="register-form" id="login-form">
                        @csrf 
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-email"></i></label>
                            <input type="text" name="email" id="your_name" placeholder="Your Email.."/>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Sent Email.."/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>
</body>
</html>