<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>World Watch Trade Admin</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/admin_package/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin_package/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('home')}}" class="nav-link">Home</a>
            </li>
            <li>
                <a href="{{route('admin.logout')}}" class="nav-link">Logout</a>
            </li>
        </ul>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('admin.dashboard')}}" class="brand-link">
            {{--<img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>--}}
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                {{--<div class="image">
                  <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                  <a href="#" class="d-block">Alexander Pierce</a>
                </div>--}}
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="{{route('admin.show_users')}}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>????????????????????????</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.moderation_adverts')}}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>?????????????????? ????????????????????</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.banner_control')}}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>???????????????????? ??????????????????</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.manage_picture')}}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>???????????????????? ????????????????????</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.slider')}}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>???????????????????? ??????????????????</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.manage_makers')}}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>?????????? ????????????????????????????</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.footer_index')}}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>????????????</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.data_index')}}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>?????????????? ????????????????????</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.show_pay')}}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>??????????????</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    @section('content-header')
    @show

    <!-- Main content -->
        <div class="content">
            @section('content')
            @show
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
{{--<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
  <div class="p-3">
    <h5>Title</h5>
    <p>Sidebar content</p>
  </div>
</aside>--}}
<!-- /.control-sidebar -->

    <!-- Main Footer -->
{{--    <footer class="main-footer">--}}
{{--        <!-- To the right -->--}}
{{--        <div class="float-right d-none d-sm-inline">--}}
{{--            Anything you want--}}
{{--        </div>--}}
{{--        <!-- Default to the left -->--}}
{{--        <strong>Copyright &copy; 2020-2020 <a href="#">World Watch Traid</a>.</strong> All rights reserved.--}}
{{--    </footer>--}}
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/admin_package/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/admin_package/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/admin_package/dist/js/adminlte.min.js"></script>
@section('scripts')
@show
</body>
</html>
