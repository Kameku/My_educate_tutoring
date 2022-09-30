@extends('layouts.master')

@section('title') Dashboard @endsection
@section('css')

<!-- DataTables -->
<link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{URL::asset('frontEnrolment/select2.css')}}">
<!-- <link rel="stylesheet" type="text/css" href="{{URL::asset('frontEnrolment/theme.css')}}"> -->

@endsection
@section('content')

@component('common-components.breadcrumb')
@slot('title') Enquiry - {{$enquiry->first_name}} @endslot
@slot('title_li') Welcome to {{ Auth::user()->name }} @endslot


@endcomponent
<!-- boton que envia a la vista de lista -->
<div class="row">
    <div class="col-auto mr-auto"></div>
    <div class="col-auto">
        <a href="{{route('enquiry.index')}}" class="badge badge-secondary mb-2 p-2">Go Back</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="">
            <div class="card-body">
                <div class="card-header bg-trama text-white rounded">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link active" data-toggle="tab" href="#enrolmentProcess" role="tab" aria-selected="false">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">Enrolment Process</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-toggle="tab" href="#enrolmentInformation" role="tab" aria-selected="false">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">Enquiry Information</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-toggle="tab" href="#notes" role="tab" aria-selected="false">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">Notes</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Tab panes -->
                <div class="tab-content p-3 text-muted">
                    <div class="tab-pane active" id="enrolmentProcess" role="tabpanel">
                        @include('enquiry.enrolmentProcess')
                    </div>
                    <div class="tab-pane" id="enrolmentInformation" role="tabpanel">
                        @include('enquiry.enquiryInformation')
                    </div>
                    <div class="tab-pane" id="notes" role="tabpanel">
                        @include('enquiry.notes')
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end col -->
</div>

<!-- Modal Edit Studen-->
<form data-parsley-validate novalidate action="{{route('enquiry.update', ['enquiry' => $enquiry->id])}}" method="POST">
    <div class="modal fade " id="enquiryStudenEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg  ">
            <div class="modal-content border-primary p-3 rounded shadow-primary">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Edit Student Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="">Student First Name</label>
                            <input type="text" name="first_name" class="form-control mb-3" value="{{$enquiry->first_name}}" required>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="">Student Last Name</label>
                            <input type="text" name="last_name" class="form-control mb-3" value="{{$enquiry->last_name}}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <label for="">Student Phone Home</label>
                            <input type="text" name="home_phone" class="form-control mb-3" value="{{$enquiry->home_phone}}" required>
                        </div>
                        <div class="col-12 col-sm-4">
                            <label for="">Student Address</label>
                            <input type="text" name="adress" class="form-control mb-3" value="{{$enquiry->adress}}" required>
                        </div>
                        <div class="col-12 col-sm-4">
                            <label for="">Student Suburb</label>
                            <input type="text" name="suburb" class="form-control mb-3" value="{{$enquiry->suburb}}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <label for="">Student Post Code</label>
                            <input type="text" name="post_code" class="form-control mb-3" value="{{$enquiry->post_code}}" required>
                        </div>
                        <div class="col-12 col-sm-4">
                            <label for="">Student Date Of Birth</label>
                            <input type="text" id="datepicker" name="date_of_birth" class="form-control mb-3 " value="{{$enquiry->date_of_birth}}" required>
                        </div>
                        <div class="col-12 col-sm-4">
                            <label for="">Student Laguage Home</label>
                            <input type="text" name="language_home" class="form-control mb-3" value="{{$enquiry->language_home}}" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Modal Edit Studen END-->

<!-- Modal Edit PARENT-->
<form data-parsley-validate novalidate action="{{route('enquiry.update', ['enquiry' => $enquiry->id])}}" method="POST">
    <div class="modal fade " id="enquiryParentEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg  ">
            <div class="modal-content border-primary p-3 rounded shadow-primary">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Edit Parent Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <label for="">Parent Name</label>
                            <input type="text" name="parent_name" class="form-control mb-3" value="{{$enquiry->parent_name}}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <label for="">Parent Mobile</label>
                            <input type="text" name="parent_mobile" class="form-control mb-3" value="{{$enquiry->parent_mobile}}" required>
                        </div>
                        <div class="col-12 col-sm-4">
                            <label for="">Parent Email</label>
                            <input type="text" name="parent_email" class="form-control mb-3" value="{{$enquiry->parent_email}}" required>
                        </div>
                        <div class="col-12 col-sm-4">
                            <label for="">Parent Adress</label>
                            <input type="text" name="parent_adress" class="form-control mb-3" value="{{$enquiry->parent_adress}}" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Modal Edit PARENT END-->




@endsection


@section('script')


<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>


<!-- Required datatable js -->
<script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
<script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>

<!-- Datatable init js -->
<script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>

<script src="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ URL::asset('js/pages/form-validation.init.js')}}"></script>
<script src="{{ URL::asset('js/pages/form-advanced.init.js')}}"></script>
<!-- script de funcionamiento de los select -->
<script src="{{ URL::asset('js/enrolment2/jquery-migrate.min.js')}}"></script>
<script src="{{ URL::asset('js/enrolment2/hs-toggle-state.min.js')}}"></script>
<script src="{{ URL::asset('js/enrolment2/select2.full.min.js')}}"></script>
<script src="{{ URL::asset('js/enrolment2/hs-file-attach.js')}}"></script>
<script src="{{ URL::asset('js/enrolment2/jquery.mask.min.js')}}"></script>
<script src="{{ URL::asset('js/enrolment2/toastr.min.js')}}"></script>
<script src="{{ URL::asset('js/enrolment2/hs.core.js')}}"></script>
<script src="{{ URL::asset('js/enrolment2/hs.validation.js')}}"></script>
<script src="{{ URL::asset('js/enrolment2/hs.select2.js')}}"></script>

<script>
    for (var item = 1; item <= 14; item++) {
        var statusEnrolmentProcess = document.getElementById('statusEnrolmentProcess-' + item).innerText;
        if (statusEnrolmentProcess == 'Complete') {
            var itemEnrolmentProcess = document.getElementById('itemEnrolmentProcess-' + item);
            itemEnrolmentProcess.classList.add('enrolmentProcess-mark');
        };
    }

    var atachE1 = document.getElementById('e1').firstElementChild.innerText;

    if (atachE1 === "Not available") {

    } else {
        var atachment = document.getElementById('e1');
        atachment.classList.remove('hideAtach');

    }
    var atachE2 = document.getElementById('e2').firstElementChild.innerText;

    if (atachE2 === "Not available") {

    } else {
        var atachment = document.getElementById('e2');
        atachment.classList.remove('hideAtach');
        
    }
    var atachE3 = document.getElementById('e3').firstElementChild.innerText;

    if (atachE3 === "Not available") {

    } else {
        var atachment = document.getElementById('e3');
        atachment.classList.remove('hideAtach');

    }
</script>

<script>
    $(document).on('ready', function() {
        // initialization of select2
        $('.js-custom-select').each(function() {
            var select2 = $.HSCore.components.HSSelect2.init($(this));
        });

        // initialization of custom file
        $('.js-file-attach').each(function() {
            var customFile = new HSFileAttach($(this)).init();
        });
    });
</script>
@endsection