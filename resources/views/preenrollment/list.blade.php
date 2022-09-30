@extends('layouts.master')

@section('title') Pre Enrollments @endsection
@section('css')

    <!-- DataTables -->
    <link href="{{ URL::asset('/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('frontEnrolment/select2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('frontEnrolment/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/toastr/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/educate.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('libs/dropzone/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('libs/ion-rangeslider/ion-rangeslider.min.css') }}">


@endsection


@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Manual Enquiry List @endslot
        @slot('title_li') Welcome to {{ Auth::user()->name }} @endslot

    @endcomponent

    <div class="row">
        {{-- @if (Session::has('message'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                {{ Session::get('message') }}
            </div>
        @endif --}}

        {{-- Mensaje de Sesion --}}
        <div class="flash-message ml-3">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
              @if(Session::has('alert-' . $msg))
              <p class="alert alert-{{ $msg }} alert-dismissible" role="alert">{{ Session::get('alert-' . $msg) }} <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">&times;</span></button> </p>
              @endif
            @endforeach
          </div>
          {{-- Mensaje de Sesion --}}


        <div class="col-auto mr-auto"></div>
        <div class="col-auto">
            <a href="{{ route('preenrollment.index') }}" data-toggle="modal" data-target="#preenrolmentModalCreate" class="btn btn-success mb-2 p-2">New Enquiry</a>
            {{-- <a class="badge badge-danger mb-2 p-2" href="#all-delete" data-toggle="modal" data-target="#alldeleteModal">All Delete</a> --}}
            <div class="modal fade" id="alldeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <form method="POST" action="{{ route('preenrollment.all-delete') }}">
                    @csrf

                    <div class="modal-dialog modal-sm modal-dialog-centered">
                        <div class="modal-content red-danger border-red-danger">
                            <div class="modal-body border-danger text-white text-center">
                                <i class='bx bxs-error font-size-100 text-white'></i><br>
                                <span class="h2 text-white mb-2">Are you sure?</span><br>
                                you want to all delete<br>this process cannot be reversed<br>
                                <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger mt-3">Yes, All Delete</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <div class="card">

                <div class="card-body">

                    <div class="row mt-3">
                        <div class="col-sm-12">


                            <table id="datatable"
                                class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                                style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                aria-describedby="datatable-buttons_info">
                                <thead>
                                    <tr role="row">
                                        {{-- <th>ID</th> --}}
                                        <th>Student's Name</th>
                                        <th>School Name</th>
                                        <th>School Year</th>
                                        <th>Parent Name</th>
                                        <th>Parent Mobile</th>
                                        <th>Status</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($preenrolments as $preenrolment)
                                        <tr>
                                            {{-- <td>{{ $preenrolment->id }}</td> --}}
                                            <td>
                                                <a class="media align-items-center" href="{{route('preenrollment.show',['preenrolment' => $preenrolment->id ])}}">
                                                    {{ $preenrolment->first_name.' '. $preenrolment->last_name}}
                                                </a>    
                                            </td>
                                            <td>{{ $preenrolment->school_name }}</td>
                                            <td>{{ $preenrolment->school_year }}</td>

                                            <td>{{ $preenrolment->parent_name }}</td>
                                            <td>{{ $preenrolment->parent_mobile }}</td>
                                            @if ($preenrolment->check === 'Not reviewed')
                                                <td class="text-danger">{{ $preenrolment->check }}</td> 
                                            @endif
                                            @if ($preenrolment->check === 'Reviewed')
                                                <td class="text-success">{{ $preenrolment->check }}</td> 
                                            @endif
                                            <td style="width: 50px">

                                                <a class="btn btn-primary btn-sm btn-block text-white" data-toggle="modal"
                                                    data-target="#preenrolmentModalEdit{{ $preenrolment->id }}">
                                                    Edit
                                                </a>
                                                <div class="">
                                                    @include('preenrollment.preenrolmentEditModal')
                                                </div>
                                            </td>

                                            <td style="width: 50px">
                                                <a class="btn btn-danger btn-sm btn-block" href="#" data-toggle="modal"
                                                    data-target="#deleteModal{{ $preenrolment->id }}">Delete</a>
                                                <div class="modal fade" id="deleteModal{{ $preenrolment->id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <form method="POST"
                                                        action="{{ route('preenrollment.delete', ['preenrolment' => $preenrolment->id]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-dialog modal-sm modal-dialog-centered">
                                                            <div class="modal-content red-danger border-red-danger">
                                                                <div
                                                                    class="modal-body border-danger text-white text-center">
                                                                    <i
                                                                        class='bx bxs-error font-size-100 text-white'></i><br>
                                                                    <span class="h2 text-white mb-2">Are you
                                                                        sure?</span><br>
                                                                    you want to delete<br>this process cannot be
                                                                    reversed<br>
                                                                    <button type="button" class="btn btn-secondary mt-3"
                                                                        data-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn btn-danger mt-3">Yes,
                                                                        Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                            </td>
                                            
                                        </tr>
                                    @empty
                                        <td>There are no records.</td>
                                    @endforelse
                                </tbody>
                            </table>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- @include('preenrollment.preenrolmentEditModal') --}}
    {{-- @include('assign.assignModal') --}}
    {{-- @include('assign.assignEditModal') --}}
  @include('preenrollment.preenrolmentCreateModal')
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

    @if($errors->any())
    <script>
        $('#preenrolmentModalCreate').modal('show');
    </script>
    @endif

    {{-- @if ($errors->any())
    <script>
        $('#preenrolmentModal').modal('show');
    </script>
    @endif


    @if (session()->has('success'))
        <script> 
            toastr.success("{{session('success')}}")
        </script>      
    @endif
    @if (session()->has('error'))
        <script> 
            toastr.error("{{session('error')}}")
        </script>      
    @endif --}}


    {{-- Definicion de la tabla y las caracteristica que posee, con busquedas y visualizacion --}}
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                "columnDefs": [{
                    'targets': [4],
                    "searchable": false
                }]
            });
        });
    </script>


@endsection
