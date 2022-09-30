@extends('layouts.master')

@section('title') Dashboard @endsection
@section('css')

<!-- DataTables -->
{{-- <link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" /> --}}
{{-- <link href="{{ URL::asset('/css/educate.css')}}" rel="stylesheet" type="text/css" /> --}}
{{-- <link rel="stylesheet" href="{{ URL::asset('libs/ion-rangeslider/ion-rangeslider.min.css') }}"> --}}

<link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{URL::asset('frontEnrolment/select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('frontEnrolment/theme.css')}}">
<link rel="stylesheet" href="{{asset('libs/toastr/css/main.css')}}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/educate.css') }}">
<link rel="stylesheet" href="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('libs/bootstrap-touchspin/bootstrap-touchspin.min.css') }}">

@endsection


@section('content')

@component('common-components.breadcrumb')
    @slot('title') Dashboard -  {{ Auth::user()->roles()->first()->description }}  @endslot
    @slot('title_li') Welcome to {{ Auth::user()->name }} @endslot
@endcomponent

@if ($errors->any())
    <ul>
        @foreach ($errors as $error)
            <li>{{ $error }}</li>    
        @endforeach
    </ul>
@endif

{{-- listado de usuarios --}}
@livewire('role-admin-index')




@endsection

@section('script')
<!-- Required datatable js -->
<script src="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
<script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ URL::asset('/libs/bootstrap-touchspin/bootstrap-touchspin.min.js')}}"></script>

<!-- Datatable init js -->
<script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>
<script src="{{ URL::asset('js/enrolment2/jquery-migrate.min.js')}}"></script>
<script src="{{ URL::asset('js/enrolment2/hs-toggle-state.min.js')}}"></script>
<script src="{{ URL::asset('js/enrolment2/select2.full.min.js')}}"></script>
<script src="{{ URL::asset('js/enrolment2/hs-file-attach.js')}}"></script>
<script src="{{ URL::asset('js/enrolment2/jquery.mask.min.js')}}"></script>
<script src="{{ URL::asset('js/enrolment2/toastr.min.js')}}"></script>
<script src="{{ URL::asset('js/enrolment2/hs.core.js')}}"></script>
<script src="{{ URL::asset('js/enrolment2/hs.validation.js')}}"></script>
<script src="{{ URL::asset('js/enrolment2/hs.select2.js')}}"></script>
<script src="{{ URL::asset('js/enrolment2/hs.mask.js')}}"></script>

<script>
    $(document).on('ready', function() {

        $('.js-custom-select').each(function() {
                var select2 = $.HSCore.components.HSSelect2.init($(this));
            });
            
        $('.js-file-attach').each(function() {
            var customFile = new HSFileAttach($(this)).init();
        });
    }); 
    toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "500",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
                };
    
</script>


@if(session()->has('success'))
    <script> 
        toastr.success("{{session('success')}}")
    </script>      
    @endif
    @if(session()->has('error'))
    <script> 
        toastr.error("{{session('error')}}")
    </script>      
@endif

@endsection