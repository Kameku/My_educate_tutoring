<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title') | Educate Tutoring</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Educate Tutoring" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('images/faviedu.png')}}">
    @include('layouts.head')
    @livewireStyles 
</head>

@section('body')
@show
<body data-layout="detached" data-topbar="colored" class="">
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner-chase">
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
            </div>
        </div>
    </div>
    <!-- Begin page -->
    <div class="container-fluid">
        <div id="layout-wrapper">
            @include('layouts.topbar')
            @include('layouts.sidebar')
            {{-- @if (Auth::user()->roles()->first()->name == 'admin')
                @include('layouts.sidebar')
            @elseif (Auth::user()->roles()->first()->name == 'tutor')
                @include('layouts.sidebar_tutor')
            @elseif (Auth::user()->roles()->first()->name == 'student')
                @include('layouts.sidebar_student')
            @elseif (Auth::user()->roles()->first()->name == 'parent')
                @include('layouts.sidebar_parent')
            @endif --}}
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <div class="page-content">
                    @yield('content')
                    {{-- @include('messages.messageModal') --}}
                </div>
                <!-- End Page-content -->
                @include('layouts.footer')
                
            </div>
            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->
    </div>
    <!-- END container-fluid -->

    <!-- JAVASCRIPT -->
    
    @include('layouts.footer-script')
    @livewireScripts
    @if($errors->any())
        @if ( $errors->first()  === 'The message subject field is required.' OR $errors->first()  === 'The message field is required.' )
            <script>
                $('#messagesModal').modal('show');
            </script>
        @endif
    @endif
</body>

</html>