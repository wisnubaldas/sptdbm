<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>TPS Online</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{asset('/assets/css/vendor.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/assets/css/default/app.min.css')}}" rel="stylesheet" />
    @stack('css')
</head>

<body>

    <div id="loader" class="app-loader">
        <span class="spinner"></span>
    </div>


    <div id="app" class="app app-header-fixed app-sidebar-fixed app-gradient-enabled app-content-full-height">
        @include('template.header')
        @include('template.sidebar')

        <div class="app-sidebar-bg"></div>
        <div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a></div>

        <div id="content" class="app-content">
            
            @yield('content')

        </div>

        <!-- panelnya -->

        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>

    </div>


    <script src="{{asset('/assets/js/vendor.min.js')}}"></script>
    <script src="{{asset('/assets/js/app.min.js')}}"></script>
    <script src="{{asset('/assets/js/theme/default.min.js')}}"></script>
    <script src="{{asset('/assets/js/custom.js')}}"></script>
    <script>
        //set active menunya ngga usah ribet
        $(document).ready(function(){
            $('.menu-link').click(function(){
                Cookies.set('active-menu',$(this)[0].id);
            })
            let activeMenu = Cookies.get('active-menu')
            if(activeMenu){
                $('#'+activeMenu).parent().addClass('active').parent().parent().addClass('active')
            }
        })
    </script>
    @stack('js')
</body>

</html>