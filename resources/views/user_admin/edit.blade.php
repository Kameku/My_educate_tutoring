@extends('layouts.master')

@section('title') Dashboard @endsection
@section('css')

    <!-- DataTables -->
    {{-- <link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" /> --}}
    {{-- <link href="{{ URL::asset('/css/educate.css')}}" rel="stylesheet" type="text/css" /> --}}
    {{-- <link rel="stylesheet" href="{{ URL::asset('libs/ion-rangeslider/ion-rangeslider.min.css') }}"> --}}

    <link href="{{ URL::asset('/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('frontEnrolment/select2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('frontEnrolment/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/toastr/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/educate.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('libs/bootstrap-touchspin/bootstrap-touchspin.min.css') }}">

@endsection


@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Dashboard - {{ Auth::user()->roles()->first()->description }} @endslot
        @slot('title_li') Welcome to {{ Auth::user()->name }} @endslot
    @endcomponent

    @if ($errors->any())
        <ul>
            @foreach ($errors as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif


    <div class="card">
        <div class="card-body">
            <div class="col-12">
                <h4 class="font-10">User</h4>
                <p class="text-muted font-13 mb-3 text-justify">{{ $user->name }} {{ $user->last_name }}</p>
            </div>
        </div>
    </div>
    {!! Form::model($user, ['route' => ['administrator.users.update', $user], 'method' => 'put']) !!}
    @foreach ($roles as $role)

        <label class="card-header bg-warning text-white rounded mt-2 pr-6" style="cursor: pointer">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172"
                style=" fill:#000000;">
                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                    stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                    font-family="none" font-weight="none" font-size="none" text-anchor="none"
                    style="mix-blend-mode: normal">
                    <path d="M0,172v-172h172v172z" fill="none"></path>
                    <g fill="#ffffff">
                        <circle cx="12" cy="7" transform="scale(7.16667,7.16667)" r="5" opacity="0.35"></circle>
                        <path
                            d="M129,107.5h-86c-11.87517,0 -21.5,9.62483 -21.5,21.5c0,11.87517 9.62483,21.5 21.5,21.5h86c11.87517,0 21.5,-9.62483 21.5,-21.5c0,-11.87517 -9.62483,-21.5 -21.5,-21.5z"
                            opacity="0.35"></path>
                        <path
                            d="M121.83333,129h-14.33333c-3.956,0 -7.16667,3.21067 -7.16667,7.16667v14.33333h28.66667v-14.33333c0,-3.956 -3.21067,-7.16667 -7.16667,-7.16667z">
                        </path>
                    </g>
                </g>
            </svg>
            <span class="form-check">
                {{ $role->description }}
                {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'form-check-input ml-1']) !!}
            </span>
        </label>

    @endforeach
    <div class="col-12 mt-3">
        {!! Form::submit('Save', ['class' => 'btn btn-success waves-effect waves-light px-10 float-right']) !!}


    </div>
    <div>
        @if (session('update'))

            <div class="col-4">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('update') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>

        @endif
    </div>

    {!! Form::close() !!}










@endsection

@section('script')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('/libs/bootstrap-touchspin/bootstrap-touchspin.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('/js/pages/datatables.init.js') }}"></script>
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
