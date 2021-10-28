<!DOCTYPE html>
<html lang="en">

<head>
    <title>تسجيل الدخول</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />


    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('assets/images/logo.png')}}" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome/css/fontawesome-all.min.css')}}">


    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/newstyle.css')}}">
</head>

<body>
<div class="auth-wrapper">
    <div class="auth-content">
        <div class="auth-bg">
            <span class="r"></span>
            <span class="r s"></span>
            <span class="r s"></span>
            <span class="r"></span>
        </div>
        <div class="card">
            <div class="card-body text-center">
                <div class="mb-4">
                    <i class="feather icon-unlock auth-icon"></i>
                </div>
                <h3 class="mb-4">تسجيل الدخول</h3>
                <form action="{{route('admin.login')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input  name="user_name" type="text" class="form-control" placeholder="حساب الادمن" required>
                        @error('user_name')
                           <div class="alert alert-danger error_mes">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-4">
                        <input name="password" type="password" class="form-control" placeholder="كلمة المرور" required>
                        @error('password')
                            <div class="alert alert-danger error_mes">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group text-right">
                        <div class="checkbox checkbox-fill d-inline">
                            <input type="checkbox" name="remember_me" id="checkbox-fill-a1" checked="">
                            <label for="checkbox-fill-a1" class="cr"> تذكرني</label>
                        </div>
                    </div>
                    <button class="btn btn-primary shadow-2 mb-4">دخول</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Required Js -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>-->

<script src="{{asset('assets/js/vendor-all.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/pcoded.min.js')}}"></script>

@include('sweetalert::alert')
</body>
</html>
