@extends('layouts.master')

@section('title') Enrollment @endsection
@section('css')

<!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('libs/summernote/summernote.min.css') }}">
    <link href="{{ URL::asset('/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('frontEnrolment/select2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('frontEnrolment/theme.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/educate.css') }}">
    
    {{-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('libs/tinymce/skins/ui/oxide/skin.min.css') }}"> --}}

@endsection
@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Enrolment - {{ $enrolments->first_name }} @endslot
        @slot('title_li') Welcome to {{ Auth::user()->name }} @endslot


    @endcomponent
    <!-- boton que envia a la vista de lista -->
    <div class="row">
        <div class="col-auto mr-auto"></div>
        <div class="col-auto">
            <a href="{{ route('enrolment.index') }}" class="badge badge-secondary mb-2 p-2">Go Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="">
                <div class="card-body">
                    <div class="p-3 bg-trama text-white rounded">
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills nav-justified" role="tablist">
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link active" data-toggle="tab" href="#enrolmentProcess" role="tab"
                                    aria-selected="false">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">Enrolment Process</span>
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-toggle="tab" href="#enrolmentInformation" role="tab"
                                    aria-selected="false">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">Personal Information</span>
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-toggle="tab" href="#enrolmentDetails" role="tab"
                                    aria-selected="true">
                                    <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                    <span class="d-none d-sm-block">Enrolment Details</span>
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-toggle="tab" href="#history" role="tab" aria-selected="false">
                                    <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                    <span class="d-none d-sm-block">Comments</span>
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
                            @include('enrolment.enrolmentInformation')
                        </div>
                        <div class="tab-pane" id="enrolmentDetails" role="tabpanel">
                            @include('enrolment.enrolmentDetails')
                        </div>
                        
                        <div class="tab-pane" id="history" role="tabpanel">
                            @include('enrolment.comments')
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- end col -->
    </div>

    <!-- Modal Edit Studen-->
    <form data-parsley-validate novalidate action="{{ route('enrolment.update', ['enrolment' => $enrolments->id]) }}"
        method="POST">
        <div class="modal fade " id="enquiryStudenEdit" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
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
                                <input type="text" name="first_name" class="form-control mb-3"
                                    value="{{ $enrolments->first_name }}" required>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="">Student Last Name</label>
                                <input type="text" name="last_name" class="form-control mb-3"
                                    value="{{ $enrolments->last_name }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <label for="">Student Phone Home</label>
                                <input type="text" name="home_phone" class="form-control mb-3"
                                    value="{{ $enrolments->home_phone }}" required>
                            </div>
                            <div class="col-12 col-sm-4">
                                <label for="">Student Address</label>
                                <input type="text" name="adress" class="form-control mb-3" value="{{ $enrolments->adress }}"
                                    required>
                            </div>
                            <div class="col-12 col-sm-4">
                                <label for="">Student Suburb</label>
                                <input type="text" name="suburb" class="form-control mb-3" value="{{ $enrolments->suburb }}"
                                    required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <label for="">Student Post Code</label>
                                <input type="number" name="post_code" class="form-control mb-3"
                                    value="{{ $enrolments->post_code }}" required>
                            </div>
                            <div class="col-12 col-sm-4">
                                <label for="">Student Date Of Birth</label>
                                <input type="text" id="datepicker" data-provide="datepicker" data-date-format="dd-mm-yyyy" name="date_of_birth" class="form-control mb-3 "
                                    value="{{ $enrolments->date_of_birth }}" required>
                            </div>
                            <div class="col-12 col-sm-4">
                                <label for="">Studen Language Home</label>
                                <input type="text" name="language_home" class="form-control mb-3"
                                    value="{{ $enrolments->language_home }}" required>
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
    <form data-parsley-validate novalidate action="{{ route('enrolment.update', ['enrolment' => $enrolments->id]) }}"
        method="POST">
        <div class="modal fade " id="enquiryParentEdit" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
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
                                <input type="text" name="parent_name" class="form-control mb-3"
                                    value="{{ $enrolments->parent_name }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <label for="">Parent Mobile</label>
                                <input type="text" name="parent_mobile" class="form-control mb-3"
                                    value="{{ $enrolments->parent_mobile }}" required>
                            </div>
                            <div class="col-12 col-sm-4">
                                <label for="">Parent Email</label>
                                <input type="text" name="parent_email" class="form-control mb-3"
                                    value="{{ $enrolments->parent_email }}" required>
                            </div>
                            <div class="col-12 col-sm-4">
                                <label for="">Parent Address</label>
                                <input type="text" name="parent_adress" class="form-control mb-3"
                                    value="{{ $enrolments->parent_adress }}" required>
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

    <!-- Modal Edit School Information-->
    <form data-parsley-validate novalidate action="{{ route('enrolment.update', ['enrolment' => $enrolments->id]) }}"
        method="POST">
        <div class="modal fade " id="enrolmentDetailsEdit" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg  ">
                <div class="modal-content border-primary p-3 rounded shadow-primary">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="exampleModalLabel">School Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12 col-sm-5">
                                <!-- Select School Attending start -->
                                <select name="school" class="js-custom-select" data-hs-select2-options='{
                                                            "placeholder": "Select School Attending"
                                                             }' required>
                                    @foreach ($schools as $school)
                                        <option {{ $enrolments->school == $school->name_school ? 'selected' : '' }}
                                            value="{{ $school->name_school }}">{{ $school->name_school }}</option>
                                    @endforeach
                                </select>
                                <!-- End Select Select School Attending end -->
                            </div>
                            <div class="col-12 col-sm-3">
                                <!-- Select grade -->
                                <input name="grade" type="text" class="form-control" placeholder="Grade"
                                    value="{{ $enrolments->grade }}" required>
                                <!-- End Select grade end-->
                            </div>
                            <div class="col-12 col-sm-4">
                                <input name="teacher_name" type="text" class="form-control" placeholder="Teacher Name"
                                    value="{{ $enrolments->teacher_name }}" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 col-sm-8">
                                <label for="">I am happy for my child´s school teacher to contact or be contacted by
                                    Educate: </label>
                            </div>
                            <div class="col-12 col-sm-4">
                                <!-- Select -->
                                <select name="teacher_contact" id="select" class="js-custom-select"
                                    value="{{ $enrolments->teacher_contact }}" data-hs-select2-options='{                                       
                                                            "minimumResultsForSearch": "Infinity",
                                                            "dropdownAutoWidth": true                                       
                                                                }' required>
                                    <option {{ $enrolments->teacher_contact == 'yes' ? 'selected' : '' }} value="yes">Yes
                                    </option>
                                    <option {{ $enrolments->teacher_contact == 'no' ? 'selected' : '' }} value="no">No
                                    </option>
                                </select>
                                <!-- End Select -->
                            </div>
                            <!--Campo si aparece -->
                            <div class="col-md-12 pt-3 cel-teacher">
                                <div class="form-group mb-5">
                                    <input type="text" id="name" name="teacher_mobile" class="form-control"
                                        value="{{ $enrolments->teacher_mobile }}" placeholder="Teacher Contact Details">
                                </div>
                            </div>
                            <!--End-->
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
    <!-- Modal Edit School Information END-->

    <!-- Modal Edit Case of Emergency-->
    <form data-parsley-validate novalidate action="{{ route('enrolment.update', ['enrolment' => $enrolments->id]) }}"
        method="POST">
        <div class="modal fade " id="enrolmentEmergencyEdit" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg  ">
                <div class="modal-content border-primary p-3 rounded shadow-primary">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Case of Emergency</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div class="row ">
                            <div class="col-12 col-sm-6">
                                <input name="emergency_name" type="text" class="form-control"
                                    value="{{ $enrolments->emergency_name }}" placeholder="Name" required>
                            </div>
                            <div class="col-12 col-sm-6">
                                <!-- Select relationship to student -->
                                <select name="emergency_relation" class="js-custom-select" data-hs-select2-options='{
                                    "minimumResultsForSearch": "Infinity",
                                    "placeholder": "<span class=\"d-flex align-items-center\"><i class=\"far fa-user icon-text mr-2\"></i> Relationship to student</span>"
                                    }' required>
                                    <option {{ $enrolments->emergency_relation == 'Parent' ? 'selected' : '' }}
                                        value="Parent">Parent</option>
                                    <option {{ $enrolments->emergency_relation == 'Grandparent' ? 'selected' : '' }}
                                        value="Grandparent">Grandparent</option>
                                    <option {{ $enrolments->emergency_relation == 'Carer' ? 'selected' : '' }}
                                        value="Carer">Carer</option>
                                    <option {{ $enrolments->emergency_relation == 'Aunt' ? 'selected' : '' }} value="Aunt">
                                        Aunt</option>
                                    <option {{ $enrolments->emergency_relation == 'Uncle' ? 'selected' : '' }}
                                        value="Uncle">Uncle</option>
                                    <option {{ $enrolments->emergency_relation == 'Family Friend' ? 'selected' : '' }}
                                        value="Family Friend">Family Friend</option>
                                    <option {{ $enrolments->emergency_relation == 'Neighbour' ? 'selected' : '' }}
                                        value="Neighbour">Neighbour</option>
                                    <option {{ $enrolments->emergency_relation == 'Other' ? 'selected' : '' }}
                                        value="Other">Other</option>
                                </select>
                                <!-- End Select relationship to student -->
                            </div>
                        </div>
                        <div class="row mt-3">

                            <div class="col-12 col-sm-6">
                                <!-- Phone Number -->
                                <div class="form-group">
                                    <input name="emergency_mobile" type="text" value="{{ $enrolments->emergency_mobile }}"
                                        class="form-control" placeholder="Phone number" required>
                                </div>
                                <!-- End Phone Number -->
                            </div>
                            <div class="col-12 col-sm-6">
                                <input name="emergency_phone" type="text" value="{{ $enrolments->emergency_phone }}"
                                    class="form-control" placeholder="Home Phone" required>
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
    <!-- Modal Edit Case of Emergency END-->


    <!-- Modal Edit Additional Information-->
    <form data-parsley-validate novalidate action="{{ route('enrolment.update', ['enrolment' => $enrolments->id]) }}"
        method="POST">
        <div class="modal fade " id="enrolmentAdditional" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg  ">
                <div class="modal-content border-primary p-3 rounded shadow-primary">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Details Enrolment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <!--E4 Are there any legal issus regarding child custody? -->
                        <hr class="my-3">
                        <div class="row ">
                            <div class="col-2">
                                <!-- Select -->
                                <select name="interventions_e4" id="selectE4" class="js-custom-select"
                                    data-hs-select2-options='{
                                                                            "minimumResultsForSearch": "Infinity",
                                                                            "customClass": "custom-select custom-select-sm",
                                                                            "dropdownAutoWidth": true
                                                                            }' required>
                                    <option {{ $enrolments->interventions_e4 == 'yes' ? 'selected' : ''}}
                                    value="yes"data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-success mr-2"></span>Yes</span>'>Yes</option>
                                    <option {{ $enrolments->interventions_e4 == 'no' ? 'selected' : ''}}
                                    value="no" data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-danger mr-2"></span>No</span>'>No</option>
                                </select>
                                <!-- End Select -->
                            </div>
                            <div class="col-10">
                                <span class="d-block">Are there any legal issues regarding child custody that Educate Tutoring should be aware of?</span>
                                {{-- <small class="d-block text-muted">E4</small> --}}
                            </div>
                            <!--Campo si aparece -->
                            <div class="col-md-12 pt-3 file_e4">
                                <div class="form-group">
                                    <input type="text" id="name" name="interventions_details_e4" class="form-control"
                                        placeholder="Please provide details" value="{{$enrolments->interventions_details_e4}}">
                                </div>
                            </div>
                            <!--End-->
                        </div>
                        <!--End E4-->
                        <!--E5 Do you give consent for you child to have their photo taken, and for to be used for media related purposes? -->
                        <hr class="my-3">
                        <div class="row ">
                            <div class="col-2">
                                <!-- Select -->
                                <select name="interventions_e5" class="js-custom-select" data-hs-select2-options='{
                                                                            "minimumResultsForSearch": "Infinity",
                                                                            "customClass": "custom-select custom-select-sm",
                                                                            "dropdownAutoWidth": true
                                                                            }' required>
                                    <option {{ $enrolments->interventions_e5 == 'yes' ? 'selected' : ''}} value="yes"
                                        data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-success mr-2"></span>Yes</span>'>
                                        Yes</option>
                                    <option {{ $enrolments->interventions_e5 == 'no' ? 'selected' : ''}} value="no"
                                        data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-danger mr-2"></span>No</span>'>
                                        No</option>
                                </select>
                                <!-- End Select -->
                            </div>
                            <div class="col-10">
                                <span class="d-block">Do you give consent for you child to have their photo taken for internal purposes?</span>
                                {{-- <small class="d-block text-muted">E5</small> --}}
                            </div>
                        </div>
                        <!--End E5-->


                        <!--E10 Do you give consent for you child to have their photo taken, and for to be used for media related purposes? -->
                        <hr class="my-3">
                        <div class="row ">
                            <div class="col-2">
                                <!-- Select -->
                                <select name="interventions_e10" class="js-custom-select" data-hs-select2-options='{
                                                                            "minimumResultsForSearch": "Infinity",
                                                                            "customClass": "custom-select custom-select-sm",
                                                                            "dropdownAutoWidth": true
                                                                            }' required>
                                    <option {{ $enrolments->interventions_e10 == 'yes' ? 'selected' : ''}} value="yes"
                                        data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-success mr-2"></span>Yes</span>'>
                                        Yes</option>
                                    <option {{ $enrolments->interventions_e10 == 'no' ? 'selected' : ''}} value="no"
                                        data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-danger mr-2"></span>No</span>'>
                                        No</option>
                                </select>
                                <!-- End Select -->
                            </div>
                            <div class="col-10">
                                <span class="d-block">Do you give consent for these images to be used for media related purposes?</span>
                                {{-- <small class="d-block text-muted">E5</small> --}}
                            </div>
                        </div>
                        <!--End E10-->


                        <!--E6 Do your child have any allergies?-->
                        <hr class="my-3">
                        <div class="row ">
                            <div class="col-2">
                                <!-- Select -->
                                <select name="interventions_e6" id="selectE6" class="js-custom-select"
                                    data-hs-select2-options='{
                                                                             "minimumResultsForSearch": "Infinity",
                                                                             "customClass": "custom-select custom-select-sm",
                                                                             "dropdownAutoWidth": true
                                                                             }' required>
                                    <option {{ $enrolments->interventions_e6 == 'yes' ? 'selected' : ''}} value="yes"
                                        data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-success mr-2"></span>Yes</span>'>
                                        Yes</option>
                                    <option {{ $enrolments->interventions_e6 == 'no' ? 'selected' : ''}} value="no" 
                                        data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-danger mr-2"></span>No</span>'>
                                        No</option>
                                </select>
                                <!-- End Select -->
                            </div>
                            <div class="col-10">
                                <span class="d-block">Do your child have any allergies?</span>
                                {{-- <small class="d-block text-muted">E6</small> --}}
                            </div>
                            <!--Campo si aparece -->
                            <div class="col-md-12 pt-3 file_e6">
                                <div class="form-group">
                                    <input type="text" id="name" name="interventions_details_e6" class="form-control"
                                        placeholder="Please provide details" value="{{$enrolments->interventions_details_e6}}">
                                </div>
                            </div>
                            <!--End-->
                        </div>
                        <!--End E6-->
                        <!--E7 Do you give consent for your child to be given occasional chocolate/sweets?-->
                        <hr class="my-3">
                        <div class="row ">
                            <div class="col-2">
                                <!-- Select -->
                                <select name="interventions_e7" class="js-custom-select" data-hs-select2-options='{
                                                                             "minimumResultsForSearch": "Infinity",
                                                                             "customClass": "custom-select custom-select-sm",
                                                                             "dropdownAutoWidth": true
                                                                             }' required>
                                    <option {{ $enrolments->interventions_e7 == 'yes' ? 'selected' : ''}} value="yes" 
                                        data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-success mr-2"></span>Yes</span>'>
                                        Yes</option>
                                    <option {{ $enrolments->interventions_e7 == 'no' ? 'selected' : ''}} value="no"
                                        data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-danger mr-2"></span>No</span>'>
                                        No</option>
                                </select>
                                <div class="invalid-feedback margin-top-validate">This field is required</div>
                                <div class="valid-feedback margin-top-validate">Looks good!</div>
                                <!-- End Select -->
                            </div>
                            <div class="col-10">
                                <span class="d-block">Do you give consent for your child to be given occasional
                                    chocolate/sweets?</span>
                                {{-- <small class="d-block text-muted">E7</small> --}}
                            </div>
                        </div>
                        <!--End E7-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Modal Edit Additional Information END-->




@endsection


@section('script')



    <!-- Required datatable js -->
    <script src="{{ URL::asset('/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('/libs/summernote/summernote.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('/js/pages/datatables.init.js') }}"></script>
    <script src="{{ URL::asset('/js/pages/form-editor.init.js') }}"></script>

    <script src="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('js/pages/form-advanced.init.js') }}"></script>
    <!-- script de funcionamiento de los select -->
    <script src="{{ URL::asset('js/enrolment2/jquery-migrate.min.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/hs-toggle-state.min.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/hs-file-attach.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/jquery.mask.min.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/toastr.min.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/hs.core.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/hs.validation.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/hs.select2.js') }}"></script>




    <!-- include codemirror (codemirror.css, codemirror.js, xml.js, formatting.js) -->

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.js"></script>


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
