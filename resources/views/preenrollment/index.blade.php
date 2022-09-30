@extends('layouts.master')

@section('title') Welcome @endsection

@section('css')
<!-- Plugin css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="{{URL::asset('frontEnrolment/iofrm-theme23w.css')}}">
<link rel="stylesheet" href="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('libs/bootstrap-touchspin/bootstrap-touchspin.min.css') }}">

@endsection


    @section('body')

    <body>
     @endsection

        @section('content')
        
       
        <h1>Prueba de vista show </h1>

        @endsection
        @section('script')
            <script src="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
            <script src="{{ URL::asset('js/pages/form-validation.init.js')}}"></script>
            <script src="{{ URL::asset('js/pages/form-advanced.init.js')}}"></script>
            <script src="{{ URL::asset('/libs/bootstrap-touchspin/bootstrap-touchspin.min.js')}}"></script>
        @endsection