<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Color Admin | Login v2</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="../assets/css/vendor.min.css" rel="stylesheet" />
    <link href="../assets/css/default/app.min.css" rel="stylesheet" />

</head>

<body class='pace-top'>

    <div id="loader" class="app-loader">
        <span class="spinner"></span>
    </div>


    <div id="app" class="app">

        <div class="login login-v2 fw-bold">

            <div class="login-cover">
                <div class="login-cover-img" style="background-image: url(../assets/img/login-bg/login-bg-17.jpg)"
                    data-id="login-cover-image"></div>
                <div class="login-cover-bg"></div>
            </div>


            <div class="login-container">

                <div class="login-header">
                    <div class="brand">
                        <div class="d-flex align-items-center">
                            <img class="image" src="{{asset('assets/img/cen_full.png')}}"  style="width:350px;height:120px;padding:2px;">
                        </div>
                    </div>
                </div>


                <div class="login-content">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-20px">
                            <input type="text" class="form-control fs-13px h-45px border-0 @error('email') is-invalid @enderror"
                                placeholder="Email Address" id="emailAddress" value="{{ old('email') }}" autocomplete="email" required name="email"/>
                                @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            <label for="emailAddress" class="d-flex align-items-center text-gray-600 fs-13px">Email
                                Address</label>
                        </div>
                        <div class="form-floating mb-20px">
                            <input type="password" class="form-control fs-13px h-45px border-0 @error('password') is-invalid @enderror"
                                placeholder="Password" required autocomplete="current-password" name="password"/>
                                @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            <label for="emailAddress"
                                class="d-flex align-items-center text-gray-600 fs-13px">Password</label>
                        </div>
                        <div class="form-check mb-20px">
                            <input class="form-check-input border-0" name="remember" type="checkbox" value="1" id="remember" {{ old('remember') ? 'checked' : '' }}/>
                            <label class="form-check-label fs-13px text-gray-500" for="remember">
                                Remember Me
                            </label>
                        </div>
                        <div class="mb-20px">
                            <button type="submit" class="btn btn-success d-block w-100 h-45px btn-lg">Sign me
                                in</button>
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                        <div class="text-gray-500">
                            Not a member yet? Click <a href="javascript:;" class="text-white">here</a> to register.
                        </div>
                    </form>
                </div>

            </div>

        </div>


        <div class="login-bg-list clearfix">
            <div class="login-bg-list-item active"><a href="javascript:;" class="login-bg-list-link"
                    data-toggle="login-change-bg" data-img="../assets/img/login-bg/login-bg-17.jpg"
                    style="background-image: url(../assets/img/login-bg/login-bg-17.jpg)"></a></div>
            <div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link"
                    data-toggle="login-change-bg" data-img="../assets/img/login-bg/login-bg-16.jpg"
                    style="background-image: url(../assets/img/login-bg/login-bg-16.jpg)"></a></div>
            <div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link"
                    data-toggle="login-change-bg" data-img="../assets/img/login-bg/login-bg-15.jpg"
                    style="background-image: url(../assets/img/login-bg/login-bg-15.jpg)"></a></div>
            <div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link"
                    data-toggle="login-change-bg" data-img="../assets/img/login-bg/login-bg-14.jpg"
                    style="background-image: url(../assets/img/login-bg/login-bg-14.jpg)"></a></div>
            <div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link"
                    data-toggle="login-change-bg" data-img="../assets/img/login-bg/login-bg-13.jpg"
                    style="background-image: url(../assets/img/login-bg/login-bg-13.jpg)"></a></div>
            <div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link"
                    data-toggle="login-change-bg" data-img="../assets/img/login-bg/login-bg-12.jpg"
                    style="background-image: url(../assets/img/login-bg/login-bg-12.jpg)"></a></div>
        </div>


        


        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top"
            data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>

    </div>


    <script src="../assets/js/vendor.min.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/js/theme/default.min.js"></script>


    <script src="../assets/js/demo/login-v2.demo.js"></script>


</body>

</html>
