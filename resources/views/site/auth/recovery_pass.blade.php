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
                </div>
                
                <div class="signin-form">
                    <form method="POST" action="{{ route('admin.recovery_pass') }}" method="POST" class="register-form" id="login-form">
                        @csrf 
                        <div class="form-group">
                            <input type="hidden" name="email" value="{{ $data['email'] }}"/>
                            <input type="hidden" name="token" value="{{ $data['email'] }}"/>
                        </div>
                        <h3 class="form-title" style="text-align: center">{{ $data['email'] }}</h3>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="your_pass" placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="conf_password" id="your_pass" placeholder="Confirm Password"/>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Reset Password"/>
                        </div>    
                    </form>
                   
                </div>
            </div>
        </div>
    </section>

</div>
</body>
</html>