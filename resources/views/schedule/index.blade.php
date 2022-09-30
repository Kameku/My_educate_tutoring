@extends('layouts.master')

@section('title')
    Dashboard
@endsection
@section('css')
    <link href="{{ URL::asset('/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('frontEnrolment/select2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('frontEnrolment/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/toastr/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/educate.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('libs/dropzone/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('libs/ion-rangeslider/ion-rangeslider.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    
    <style>
        .days_select{
    
            border:none;
            background:#377dff;
            color:#fff;
            width:100%;
            padding:15px;
            text-align-last: center;
            cursor:pointer;
            font-size:25px;
            border-radius: 1px;
            appearance: none;
            transition: all .8s;
        }

        .days_select:hover{
            color:#fff;
            background:#2655ad52;
            transition: all .2s;
            font-size: 30px;
            margin: 10px 0px;
            border-radius: 10px;
            box-shadow: #011c4e6b 5px 5px 5px;
        }
    </style>
    
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('title')
            Schedule
        @endslot
        @slot('title_li')
            Welcome to {{ Auth::user()->name }}
        @endslot
    @endcomponent

    

    <div class="row mb-3">
        <div class="col-md-4">
            
        </div>
        <div class="col-md-4 offset-md-4 ">
            <a href="{{ route('dashboard.index') }}" class="badge badge-secondary mb-2 p-2" style="float:right;">Go
                Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <button type="button" class="btn btn-info mb-3 btn-block py-3 font-size-18" data-toggle="modal"
                data-target="#createSchedule">Create Schedule </button>
        </div>
        <div class="col-md-4 offset-md-4 ">
            <div class="btn-group mr-1 btn-block">
                <button type="button" class="btn btn-info mb-3 py-3 font-size-18 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Statistics</button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('schedule.classSummary')}}">Class Summary</a>
                    {{-- <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @livewire('schedule.index-schedule')
    </div>

    @include('schedule.scheduleModal')
@endsection



@section('script')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('/libs/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ URL::asset('/libs/ion-rangeslider/ion-rangeslider.min.js') }}"></script>
    <script src="{{ URL::asset('/js/pages/range-sliders.init.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>




    <!-- Datatable init js -->
    {{-- <script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script> --}}
    <script src="{{ URL::asset('js/enrolment2/jquery-migrate.min.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/hs-toggle-state.min.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/hs-file-attach.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/jquery.mask.min.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/toastr.min.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/hs.core.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/hs.validation.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/hs.select2.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/hs.mask.js') }}"></script>

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

    <script>
        flatpickr(".timepicker", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i"
        });
    </script>

    @if ($errors->any())
        <script>
            $('#createSchedule').modal('show');
        </script>
    @endif


    @if (session()->has('success'))
        <script>
            toastr.success("{{ session('success') }}")
        </script>
    @endif
    @if (session()->has('error'))
        <script>
            toastr.error("{{ session('error') }}")
        </script>
    @endif
@endsection
