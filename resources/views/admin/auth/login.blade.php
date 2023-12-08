<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('')}}admin-panel/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('')}}admin-panel/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('')}}admin-panel/assets/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html">
{{--            <img src="{{asset('frontend/assets/imgs/LogoTransparent.png')}}">--}}
            <img src="{{asset('frontend/assets/imgs/Tutunji Realty White.svg')}}" alt="tutunji-logo" height="140px" width="100%"/>
        </a>
    </div>
    <!-- /.login-logo -->
    <div class="card card-outline card-primary" style="border-color: #1ED65f">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="{{url('/login')}}" method="post">
            @csrf
            <!-- flash-message -->
                @include('flash-message')
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('email')
                <p style="color: red;">{{$message}}</p>
                @enderror
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password')
                <p style="color: red;">{{$message}}</p>
                @enderror
                <div class="row">
                {{--                    <div class="col-8">--}}
                {{--                        <div class="icheck-primary">--}}
                {{--                            <input type="checkbox" id="remember">--}}
                {{--                            <label for="remember">--}}
                {{--                                Remember Me--}}
                {{--                            </label>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block" style="background-color: #1ED65F;border-color: #1ED65F;"><i class="fa fa-sign-in-alt"></i>&nbsp;Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        {{--            <div class="social-auth-links text-center mb-3">--}}
        {{--                <p>- OR -</p>--}}
        {{--                <a href="#" class="btn btn-block btn-primary">--}}
        {{--                    <i class="fab fa-facebook mr-2"></i> Sign in using Facebook--}}
        {{--                </a>--}}
        {{--                <a href="#" class="btn btn-block btn-danger">--}}
        {{--                    <i class="fab fa-google-plus mr-2"></i> Sign in using Google+--}}
        {{--                </a>--}}
        {{--            </div>--}}
        <!-- /.social-auth-links -->

            {{--            <p class="mb-1">--}}
            {{--                <a href="forgot-password.html">I forgot my password</a>--}}
            {{--            </p>--}}
            {{--            <p class="mb-0">--}}
            {{--                <a href="register.html" class="text-center">Register a new membership</a>--}}
            {{--            </p>--}}
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
<!-- jQuery -->
<script src="{{asset('')}}admin-panel/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('')}}bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('')}}admin-panel/assets/dist/js/adminlte.min.js"></script>
</body>
</html>
