<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title> @yield('title') | Educate Tutoring App</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Educate Tutoring" name="description" />
        <meta content="kameku" name="Michael Angel" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ URL::asset('images/faviedu.png')}}">

        <link rel="stylesheet" type="text/css" href="{{URL::asset('frontlogin/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('frontlogin/fontawesome-all.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('frontlogin/iofrm-style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('frontlogin/iofrm-theme22.css')}}">
        


        @include('layouts.head')
  </head>
    @yield('body')

    @yield('content')

    @include('layouts.footer-script')
    </body>
</html>