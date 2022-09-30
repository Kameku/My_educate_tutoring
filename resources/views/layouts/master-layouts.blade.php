<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | Educate Tutoring</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Educate Tutoring" name="Educate Tutoring" />
    <meta content="Educate Tutoring" name="Kameku Creative" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('images/favicon.ico')}}">
    @include('layouts.head')
</head>

@yield('body')
@show
<body data-layout="horizontal" data-topbar="dark">
<!-- Begin page -->
<div class="container-fluid">
    <div id="layout-wrapper">
        @include('layouts.hor-menu')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                @yield('content')
            </div>
            @include('layouts.footer')
        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->
</div>
<!-- Right Sidebar -->

@if (Auth::user()->roles()->first()->name == 'admin')
    @include('layouts.right-sidebar')
@elseif (Auth::user()->roles()->first()->name == 'tutor')
    @include('layouts.right-sidebar_tutor')
@else
    nada que mostrar
@endif



<!-- END Right Sidebar -->

@include('layouts.footer-script')
</body>

</html>