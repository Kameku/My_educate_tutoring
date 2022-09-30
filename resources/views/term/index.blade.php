@extends('layouts.master')

@section('title') Term Dates @endsection
@section('css')

<!-- DataTables -->
<link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{URL::asset('frontEnrolment/select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('frontEnrolment/theme.css')}}">
<link rel="stylesheet" href="{{asset('libs/toastr/css/main.css')}}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/educate.css') }}">
<link rel="stylesheet" href="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('libs/dropzone/dropzone.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('libs/ion-rangeslider/ion-rangeslider.min.css') }}">


@endsection


@section('content')

@component('common-components.breadcrumb')
@slot('title') Term Dates @endslot
@slot('title_li') Welcome to {{ Auth::user()->name }} @endslot

@endcomponent

<div class="row">
    <div class="col-auto mr-auto"></div>
    <div class="col-auto">
        <a href="{{ route('dashboard.index') }}" class="badge badge-secondary mb-2 p-2">Go Back</a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <p class="alert alert-warning">
            Define the range of school periods, it is important to note that these ranges will be used to create attendance
        </p>
    </div>
</div>

<form action="{{ route('term.store') }}" class="needs-validation" novalidate="" method="POST">
    @csrf
    <div class="row mt-3">
        <div class="col-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <span>Term 1</span>
                </div>
                <div class="card-body">
                    
                    <label for="">Start of range</label>
                    <input name="term1start" type="text" class="form-control" data-provide="datepicker" data-date-format="dd-mm-yyyy" value="{{ $term->term1start }}" required>
                    <label for="" class="mt-4">End of range</label>
                    <input name="term1end" type="text" class="form-control" data-provide="datepicker" data-date-format="dd-mm-yyyy" value="{{ $term->term1end }}" required>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <span>Term 2</span>
                </div>
                <div class="card-body">
                    
                    <label for="">Start of range</label>
                    <input name="term2start" type="text" class="form-control" data-provide="datepicker" data-date-format="dd-mm-yyyy" value="{{ $term->term2start }}" required>
                    <label for="" class="mt-4">End of range</label>
                    <input name="term2end" type="text" class="form-control" data-provide="datepicker" data-date-format="dd-mm-yyyy" value="{{ $term->term2end }}" required>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <span>Term 3</span>
                </div>
                <div class="card-body">
                    
                    <label for="">Start of range</label>
                    <input name="term3start" type="text" class="form-control" data-provide="datepicker" data-date-format="dd-mm-yyyy" value="{{ $term->term3start }}" required>
                    <label for="" class="mt-4">End of range</label>
                    <input name="term3end" type="text" class="form-control" data-provide="datepicker" data-date-format="dd-mm-yyyy" value="{{ $term->term3end }}" required>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <span>Term 4</span>
                </div>
                <div class="card-body">
                    
                    <label for="">Start of range</label>
                    <input name="term4start" type="text" class="form-control" data-provide="datepicker" data-date-format="dd-mm-yyyy" value="{{ $term->term4start }}" required>
                    <label for="" class="mt-4">End of range</label>
                    <input name="term4end" type="text" class="form-control" data-provide="datepicker" data-date-format="dd-mm-yyyy" value="{{ $term->term4end }}" required>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <span>Spring</span>
                </div>
                <div class="card-body">
                    
                    <label for="">Start of range</label>
                    <input name="springStart" type="text" class="form-control" data-provide="datepicker" data-date-format="dd-mm-yyyy" value="{{ $term->springStart }}" required>
                    <label for="" class="mt-4">End of range</label>
                    <input name="springEnd" type="text" class="form-control" data-provide="datepicker" data-date-format="dd-mm-yyyy" value="{{ $term->springEnd }}" required>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <span>Summer</span>
                </div>
                <div class="card-body">
                    
                    <label for="">Start of range</label>
                    <input name="summerStart" type="text" class="form-control" data-provide="datepicker" data-date-format="dd-mm-yyyy" value="{{ $term->summerStart }}" required>
                    <label for="" class="mt-4">End of range</label>
                    <input name="summerEnd" type="text" class="form-control" data-provide="datepicker" data-date-format="dd-mm-yyyy" value="{{ $term->summerEnd }}" required>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <span>Autumn</span>
                </div>
                <div class="card-body">
                    
                    <label for="">Start of range</label>
                    <input name="autumnStart" type="text" class="form-control" data-provide="datepicker" data-date-format="dd-mm-yyyy" value="{{ $term->autumnStart }}" required>
                    <label for="" class="mt-4">End of range</label>
                    <input name="autumnEnd" type="text" class="form-control" data-provide="datepicker" data-date-format="dd-mm-yyyy" value="{{ $term->autumnEnd }}" required>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <span>Winter</span>
                </div>
                <div class="card-body">
                    
                    <label for="">Start of range</label>
                    <input name="winterStart" type="text" class="form-control" data-provide="datepicker" data-date-format="dd-mm-yyyy" value="{{ $term->winterStart }}" required>
                    <label for="" class="mt-4">End of range</label>
                    <input name="winterEnd" type="text" class="form-control" data-provide="datepicker" data-date-format="dd-mm-yyyy" value="{{ $term->winterEnd }}" required>
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-success btn-block btn-lg mb-4">Save Term Dates</button>
</form>


@endsection

@section('script')

<!-- Required datatable js -->
<script src="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
<script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ URL::asset('/libs/dropzone/dropzone.min.js')}}"></script>
<script src="{{ URL::asset('/libs/ion-rangeslider/ion-rangeslider.min.js')}}"></script>
<script src="{{ URL::asset('/js/pages/range-sliders.init.js')}}"></script>




<!-- Datatable init js -->
    {{-- <script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script> --}}
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
        $('#assignModal').modal('show');
    </script>
    @endif


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


    {{-- Definicion de la tabla y las caracteristica que posee, con busquedas y visualizacion --}}
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                "columnDefs": [{ 
                    'targets':[3,4],
                    "searchable": false 
                }]
            });
        });
    </script>
  
   
@endsection