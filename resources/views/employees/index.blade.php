@extends('layouts.master')

@section('title') Dashboard @endsection
@section('css')

<!-- DataTables -->
<link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{URL::asset('frontEnrolment/select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('frontEnrolment/theme.css')}}">
<link rel="stylesheet" href="{{asset('libs/toastr/css/main.css')}}">


@endsection


@section('content')

@component('common-components.breadcrumb')
@slot('title') Employees @endslot
@slot('title_li') Welcome to {{ Auth::user()->name }} @endslot

@endcomponent
@can('employees.create')
    
    <div class="row">
        <div class="col-auto mr-auto"></div>
        <div class="col-auto">
            <button class="btn btn-primary" data-toggle="modal" data-target="#createEmployee">Create Employees</button>
        </div>
    </div>
@endcan

@livewire('employees-list')

{{-- Modal for creation of employee --}}
@include('employees.create')

@endsection

@section('script')

<!-- Required datatable js -->
<script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
<script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>

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
    @if($errors->any())
    <script>
        $('#createEmployee').modal('show');
    </script>
    @endif


    @if(session()->has('success'))
        <script> 
            toastr.success("{{session('success')}}")
        </script>      
    @endif
  
   
@endsection