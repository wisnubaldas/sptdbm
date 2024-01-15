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


        <div class="theme-panel">
            <a href="javascript:;" data-toggle="theme-panel-expand" class="theme-collapse-btn"><i
                    class="fa fa-cog"></i></a>
            <div class="theme-panel-content" data-scrollbar="true" data-height="100%">
                <h5>App Settings</h5>

                <div class="theme-list">
                    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-red"
                            data-theme="red" data-theme-file="../assets/css/default/theme/red.min.css"
                            data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                            data-bs-container="body" data-bs-title="Red">&nbsp;</a></div>
                    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-pink"
                            data-theme="pink" data-theme-file="../assets/css/default/theme/pink.min.css"
                            data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                            data-bs-container="body" data-bs-title="Pink">&nbsp;</a></div>
                    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-orange"
                            data-theme="orange" data-theme-file="../assets/css/default/theme/orange.min.css"
                            data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                            data-bs-container="body" data-bs-title="Orange">&nbsp;</a></div>
                    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-yellow"
                            data-theme="yellow" data-theme-file="../assets/css/default/theme/yellow.min.css"
                            data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                            data-bs-container="body" data-bs-title="Yellow">&nbsp;</a></div>
                    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-lime"
                            data-theme="lime" data-theme-file="../assets/css/default/theme/lime.min.css"
                            data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                            data-bs-container="body" data-bs-title="Lime">&nbsp;</a></div>
                    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-green"
                            data-theme="green" data-theme-file="../assets/css/default/theme/green.min.css"
                            data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                            data-bs-container="body" data-bs-title="Green">&nbsp;</a></div>
                    <div class="theme-list-item active"><a href="javascript:;" class="theme-list-link bg-teal"
                            data-theme="default" data-theme-file="" data-toggle="theme-selector"
                            data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body"
                            data-bs-title="Default">&nbsp;</a></div>
                    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-cyan"
                            data-theme="cyan" data-theme-file="../assets/css/default/theme/cyan.min.css"
                            data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                            data-bs-container="body" data-bs-title="Cyan">&nbsp;</a></div>
                    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-blue"
                            data-theme="blue" data-theme-file="../assets/css/default/theme/blue.min.css"
                            data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                            data-bs-container="body" data-bs-title="Blue">&nbsp;</a></div>
                    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-purple"
                            data-theme="purple" data-theme-file="../assets/css/default/theme/purple.min.css"
                            data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                            data-bs-container="body" data-bs-title="Purple">&nbsp;</a></div>
                    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-indigo"
                            data-theme="indigo" data-theme-file="../assets/css/default/theme/indigo.min.css"
                            data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                            data-bs-container="body" data-bs-title="Indigo">&nbsp;</a></div>
                    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-black"
                            data-theme="black" data-theme-file="../assets/css/default/theme/black.min.css"
                            data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                            data-bs-container="body" data-bs-title="Black">&nbsp;</a></div>
                </div>

                <div class="theme-panel-divider"></div>

                <div class="row mt-10px align-items-center">
                    <div class="col-8 control-label text-inverse fw-bold">Header Fixed</div>
                    <div class="col-4 d-flex">
                        <div class="form-check form-switch ms-auto mb-0">
                            <input type="checkbox" class="form-check-input" name="app-header-fixed"
                                id="appHeaderFixed" value="1" checked />
                            <label class="form-check-label" for="appHeaderFixed">&nbsp;</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-10px align-items-center">
                    <div class="col-8 control-label text-inverse fw-bold">Header Inverse</div>
                    <div class="col-4 d-flex">
                        <div class="form-check form-switch ms-auto mb-0">
                            <input type="checkbox" class="form-check-input" name="app-header-inverse"
                                id="appHeaderInverse" value="1" />
                            <label class="form-check-label" for="appHeaderInverse">&nbsp;</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-10px align-items-center">
                    <div class="col-8 control-label text-inverse fw-bold">Sidebar Fixed</div>
                    <div class="col-4 d-flex">
                        <div class="form-check form-switch ms-auto mb-0">
                            <input type="checkbox" class="form-check-input" name="app-sidebar-fixed"
                                id="appSidebarFixed" value="1" checked />
                            <label class="form-check-label" for="appSidebarFixed">&nbsp;</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-10px align-items-center">
                    <div class="col-8 control-label text-inverse fw-bold">Sidebar Grid</div>
                    <div class="col-4 d-flex">
                        <div class="form-check form-switch ms-auto mb-0">
                            <input type="checkbox" class="form-check-input" name="app-sidebar-grid"
                                id="appSidebarGrid" value="1" />
                            <label class="form-check-label" for="appSidebarGrid">&nbsp;</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-10px align-items-center">
                    <div class="col-md-8 control-label text-inverse fw-bold">Gradient Enabled</div>
                    <div class="col-md-4 d-flex">
                        <div class="form-check form-switch ms-auto mb-0">
                            <input type="checkbox" class="form-check-input" name="app-gradient-enabled"
                                id="appGradientEnabled" value="1" />
                            <label class="form-check-label" for="appGradientEnabled">&nbsp;</label>
                        </div>
                    </div>
                </div>

                <div class="theme-panel-divider"></div>
                <h5>Admin Design (5)</h5>

                <div class="theme-version">
                    <div class="theme-version-item">
                        <a href="../html/index_v2.html" class="theme-version-link active">
                            <span style="background-image: url(../assets/img/theme/default.jpg);"
                                class="theme-version-cover"></span>
                        </a>
                    </div>
                    <div class="theme-version-item">
                        <a href="../transparent/index_v2.html" class="theme-version-link">
                            <span style="background-image: url(../assets/img/theme/transparent.jpg);"
                                class="theme-version-cover"></span>
                        </a>
                    </div>
                    <div class="theme-version-item">
                        <a href="../apple/index_v2.html" class="theme-version-link">
                            <span style="background-image: url(../assets/img/theme/apple.jpg);"
                                class="theme-version-cover"></span>
                        </a>
                    </div>
                    <div class="theme-version-item">
                        <a href="../material/index_v2.html" class="theme-version-link">
                            <span style="background-image: url(../assets/img/theme/material.jpg);"
                                class="theme-version-cover"></span>
                        </a>
                    </div>
                    <div class="theme-version-item">
                        <a href="../facebook/index_v2.html" class="theme-version-link">
                            <span style="background-image: url(../assets/img/theme/facebook.jpg);"
                                class="theme-version-cover"></span>
                        </a>
                    </div>
                    <div class="theme-version-item">
                        <a href="../google/index_v2.html" class="theme-version-link">
                            <span style="background-image: url(../assets/img/theme/google.jpg);"
                                class="theme-version-cover"></span>
                        </a>
                    </div>
                </div>

                <div class="theme-panel-divider"></div>
                <h5>Language Version (7)</h5>

                <div class="theme-version">
                    <div class="theme-version-item">
                        <a href="../html/index.html" class="theme-version-link active">
                            <span style="background-image: url(../assets/img/version/html.jpg);"
                                class="theme-version-cover"></span>
                        </a>
                    </div>
                    <div class="theme-version-item">
                        <a href="../ajax/index.html" class="theme-version-link">
                            <span style="background-image: url(../assets/img/version/ajax.jpg);"
                                class="theme-version-cover"></span>
                        </a>
                    </div>
                    <div class="theme-version-item">
                        <a href="../angularjs/index.html" class="theme-version-link">
                            <span style="background-image: url(../assets/img/version/angular1x.jpg);"
                                class="theme-version-cover"></span>
                        </a>
                    </div>
                    <div class="theme-version-item">
                        <a href="../angularjs11/index.html" class="theme-version-link">
                            <span style="background-image: url(../assets/img/version/angular10x.jpg);"
                                class="theme-version-cover"></span>
                        </a>
                    </div>
                    <div class="theme-version-item">
                        <a href="javascript:alert('Laravel Version only available in downloaded version.');"
                            class="theme-version-link">
                            <span style="background-image: url(../assets/img/version/laravel.jpg);"
                                class="theme-version-cover"></span>
                        </a>
                    </div>
                    <div class="theme-version-item">
                        <a href="../vuejs/index.html" class="theme-version-link">
                            <span style="background-image: url(../assets/img/version/vuejs.jpg);"
                                class="theme-version-cover"></span>
                        </a>
                    </div>
                    <div class="theme-version-item">
                        <a href="../reactjs/index.html" class="theme-version-link">
                            <span style="background-image: url(../assets/img/version/reactjs.jpg);"
                                class="theme-version-cover"></span>
                        </a>
                    </div>
                    <div class="theme-version-item">
                        <a href="javascript:alert('.NET Core 5.0 MVC Version only available in downloaded version.');"
                            class="theme-version-link">
                            <span style="background-image: url(../assets/img/version/dotnet.jpg);"
                                class="theme-version-cover"></span>
                        </a>
                    </div>
                </div>

                <div class="theme-panel-divider"></div>
                <h5>Frontend Design (5)</h5>

                <div class="theme-version">
                    <div class="theme-version-item">
                        <a href="../../frontend/one-page-parallax/index.html" target="_blank"
                            class="theme-version-link">
                            <span style="background-image: url(../assets/img/theme/one-page-parallax.jpg);"
                                class="theme-version-cover"></span>
                        </a>
                    </div>
                    <div class="theme-version-item">
                        <a href="../../frontend/e-commerce/index.html" target="_blank" class="theme-version-link">
                            <span style="background-image: url(../assets/img/theme/e-commerce.jpg);"
                                class="theme-version-cover"></span>
                        </a>
                    </div>
                    <div class="theme-version-item">
                        <a href="../../frontend/blog/index.html" target="_blank" class="theme-version-link">
                            <span style="background-image: url(../assets/img/theme/blog.jpg);"
                                class="theme-version-cover"></span>
                        </a>
                    </div>
                    <div class="theme-version-item">
                        <a href="../../frontend/forum/index.html" target="_blank" class="theme-version-link">
                            <span style="background-image: url(../assets/img/theme/forum.jpg);"
                                class="theme-version-cover"></span>
                        </a>
                    </div>
                    <div class="theme-version-item">
                        <a href="../../frontend/corporate/index.html" target="_blank" class="theme-version-link">
                            <span style="background-image: url(../assets/img/theme/corporate.jpg);"
                                class="theme-version-cover"></span>
                        </a>
                    </div>
                </div>

                <div class="theme-panel-divider"></div>
                <a href="https://seantheme.com/color-admin/documentation/"
                    class="btn btn-inverse d-block w-100 rounded-pill mb-10px"
                    target="_blank"><b>Documentation</b></a>
                <a href="javascript:;" class="btn btn-default d-block w-100 rounded-pill"
                    data-toggle="reset-local-storage"><b>Reset Local Storage</b></a>
            </div>
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
