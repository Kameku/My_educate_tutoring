@extends('layouts.master')

@section('title') Dashboard @endsection
@section('css')


    <link href="{{ URL::asset('/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('libs/select2/select2.min.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('frontEnrolment/select2.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{asset('frontEnrolment/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/toastr/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/educate.css') }}">
    <link rel="stylesheet" href="{{asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{asset('libs/dropzone/dropzone.min.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
    


@endsection


@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Profile Edit @endslot
        @slot('title_li') Welcome to {{ Auth::user()->name }} @endslot

    @endcomponent

    <div class="row">
        @if (session('updated'))

        <div class="col-4">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('updated') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        </div>

    @endif
        <div class="col-auto mr-auto"></div>
        <div class="col-auto">
            <a href="{{ url()->previous() }}" class="badge badge-secondary mb-2 p-2">Go
                Back</a>
        </div>
    </div>


    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Edit Profile - {{ $user->name . ' ' . $user->last_name }}</h1>
        <div class="row">
            {{-- panel izquierdo que actua como menu --}}
            <div class="col-md-3 col-xl-3">
                <div class="card">
                    <div class="list-group list-group-flush" role="tablist">
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#information"
                            role="tab">
                            Personal Information
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#bankDate" role="tab">
                            Bank Account Details
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#terms" role="tab">
                            Terms of Employment
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#documentation"
                            role="tab">
                            Documentation
                        </a>
                    </div>
                </div>
            </div>
           
            {{-- Secciones he información interna de cada menu con formulario --}}
            <div class="col-md-9 col-xl-9">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="information" role="tabpanel">
                        {!! Form::model($user, ['route' => ['employees.update', $user], 'method' => 'put', 'files' => true]) !!}
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputFirstName">First name</label>
                                                    {!! Form::text('name', $user->name, ['class' => ' form-control']) !!}
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputLastName">Last name</label>
                                                {!! Form::text('last_name', $user->last_name, ['class' => ' form-control']) !!}

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputUsername">Biography</label>
                                                {!! Form::textarea('bio', $user->bio , ['class' => 'form-control', 'placeholder' => 'Tell something about yourself']) !!}
                                        </div>
                                       
                                        <div class="form-group">
                                            
                                            
                                            <div class="form-group">
                                                <label for="subject">Subjects/Competencies</label><br>
                                                <select name="subjects[]" class="js-example-basic-multiple form-control" multiple="multiple" data-placeholder="Choose subject ......">
                                                  
{{-- 
                                                    @forelse ($subjects as $subject)
                                                        @foreach ($user->asignatures as $asignatures)
                                                            <option {{  $asignatures->name == $subject->name ? 'selected' : '' }} value="{{$subject->id}}">{{$subject->name}}</option>
                                                            
                                                        @endforeach
                                                    @empty
                                                        @foreach ($subjects as $subject)
                                                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                                                        @endforeach
                                                    @endforelse --}}


                                                    @forelse ($user->asignatures as $asignatures)
                                                        @foreach ($subjects as $subject)
                                                            <option {{  $asignatures->name == $subject->name ? 'selected' : '' }} value="{{$subject->id}}">{{$subject->name}}</option>
                                                            
                                                        @endforeach
                                                    @empty
                                                        @foreach ($subjects as $subject)
                                                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                                                        @endforeach
                                                    @endforelse


                                                    
                                                </select>
                                            </div>
                                         
                                            {{-- {{ Form::select('subjects[]', $subjects, null, ['class' => 'select2 form-control select2-multiple','multiple' => 'multiple']) }}  --}}
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-center mt-5">
                                            @if (strpos($user->profile_photo, 'users') !== false)
                                                <img src="{{Storage::url($user->profile_photo)}}"
                                                class="rounded-circle" style="object-fit: cover; object-position: center; " width="128" height="128">
                                            @else
                                                <img src="{{ $user->profile_photo }}"
                                                class="rounded-circle" style="object-fit: cover; object-position: center; " width="128" height="128">
                                            @endif
                                            <div class="mt-2">
                                                <div class="btn btn-primary file-attachment-btn mt-3">Profile Picture
                                                    <input name="profile_photo" type="file"
                                                        class="js-file-attach file-attachment-btn-label"
                                                        data-hs-file-attach-options='{
                                                                        "textTarget": "#profile_photo",
                                                                        "maxFileSize": "Infinity"
                                                                     }'>
                                                 {{-- {!! Form::file('profile_photo', ['class' => 'form-control-file']) !!}                     --}}
                                                </div>
                                                <span id="profile_photo"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input name="email" type="email" class="form-control"
                                            value="{{ $user->email }}" disabled readonly >
                                    </div>

                                    
                                    
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="phoneNumber">Phone number</label>
                                        <input name="phone_number" type="text" class="form-control"
                                            placeholder="Phone number" value="{{ $user->phone_number }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="dateOfBirth">Date of birth</label>
                                        <input name="date_of_birth" type="text" data-provide="datepicker"
                                            data-date-format="dd-mm-yyyy" class="form-control" id="inputAddress2"
                                            placeholder="Date of birth" value="{{ $user->date_of_birth }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-1">
                                        <label for="unit">Unit</label>
                                        <input name="unit" type="text" class="form-control" id="unit" placeholder="1"
                                            value="{{ $user->unit }}">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label for="street">Street</label>
                                        <input name="street" type="text" class="form-control" id="street" placeholder="1"
                                            value="{{ $user->street }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="streetName">Street Name</label>
                                        <input name="streetName" type="text" class="form-control" id="streetName"
                                            placeholder="Main St" value="{{ $user->streetName }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="suburb">Suburb</label>
                                        <input name="suburb" type="text" class="form-control" id="suburb"
                                            placeholder="Main St" value="{{ $user->suburb }}">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="postCode">Post Code</label>
                                        <input name="postCode" type="text" class="form-control" id="postCode"
                                            placeholder="1237" value="{{ $user->postCode }}">
                                    </div>

                                </div>
                                <br>
                            </div>
                        </div>

                        <div id="accordion" class="mb-4">
                            <div class="card mb-1 shadow-none">
                                <a href="#collapseOne" class=" bg-primary collapsed rounded" data-toggle="collapse"
                                    aria-expanded="false" aria-controls="collapseOne">
                                    <div class="card-header bg-primary" id="headingOne">
                                        <h6 class="m-0 text-white">
                                            Available Tutoring Time
                                        </h6>
                                    </div>
                                </a>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                    data-parent="#accordion" style="">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="card border border-secondary">
                                                    <div class="card-header bg-secondary">
                                                        <span class="text-white">Monday</span>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="col-12">
                                                            <label for="">From</label>
                                                            <input type="time" name="starTime_monday" class="form-control"
                                                                value="{{ $user->starTime_monday }}">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="">To</label>
                                                            <input type="time" name="finalHour_monday"
                                                                class="form-control"
                                                                value="{{ $user->finalHour_monday }}">
                                                        </div>
                                                        <br>
                                                        <div class="col-12">
                                                            <label for="">From</label>
                                                            <input type="time" name="starTime_monday1"
                                                                class="form-control"
                                                                value="{{ $user->starTime_monday1 }}">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="">To</label>
                                                            <input type="time" name="finalHour_monday1"
                                                                class="form-control"
                                                                value="{{ $user->finalHour_monday1 }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="card border border-secondary">
                                                    <div class="card-header bg-secondary">
                                                        <span class="text-white">Tuesday</span>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="col-12">
                                                            <label for="">From</label>
                                                            <input type="time" name="starTime_tuesday"
                                                                class="form-control"
                                                                value="{{ $user->starTime_tuesday }}">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="">To</label>
                                                            <input type="time" name="finalHour_tuesday"
                                                                class="form-control"
                                                                value="{{ $user->finalHour_tuesday }}">
                                                        </div>
                                                        <br>
                                                        <div class="col-12">
                                                            <label for="">From</label>
                                                            <input type="time" name="starTime_tuesday1"
                                                                class="form-control"
                                                                value="{{ $user->starTime_tuesday1 }}">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="">To</label>
                                                            <input type="time" name="finalHour_tuesday1"
                                                                class="form-control"
                                                                value="{{ $user->finalHour_tuesday1 }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="card border border-secondary">
                                                    <div class="card-header bg-secondary">
                                                        <span class="text-white">Wednesday</span>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="col-12">
                                                            <label for="">From</label>
                                                            <input type="time" name="starTime_wednesday"
                                                                class="form-control"
                                                                value="{{ $user->starTime_wednesday }}">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="">To</label>
                                                            <input type="time" name="finalHour_wednesday"
                                                                class="form-control"
                                                                value="{{ $user->finalHour_wednesday }}">
                                                        </div>
                                                        <br>
                                                        <div class="col-12">
                                                            <label for="">From</label>
                                                            <input type="time" name="starTime_wednesday1"
                                                                class="form-control"
                                                                value="{{ $user->starTime_wednesday1 }}">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="">To</label>
                                                            <input type="time" name="finalHour_wednesday1"
                                                                class="form-control"
                                                                value="{{ $user->finalHour_wednesday1 }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="card border border-secondary">
                                                    <div class="card-header bg-secondary">
                                                        <span class="text-white">Thursday</span>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="col-12">
                                                            <label for="">From</label>
                                                            <input type="time" name="starTime_thursday"
                                                                class="form-control"
                                                                value="{{ $user->starTime_thursday }}">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="">To</label>
                                                            <input type="time" name="finalHour_thursday"
                                                                class="form-control"
                                                                value="{{ $user->finalHour_thursday }}">
                                                        </div>
                                                        <br>
                                                        <div class="col-12">
                                                            <label for="">From</label>
                                                            <input type="time" name="starTime_thursday1"
                                                                class="form-control"
                                                                value="{{ $user->starTime_thursday1 }}">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="">To</label>
                                                            <input type="time" name="finalHour_thursday1"
                                                                class="form-control"
                                                                value="{{ $user->finalHour_thursday1 }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="card border border-secondary">
                                                    <div class="card-header bg-secondary">
                                                        <span class="text-white">Friday</span>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="col-12">
                                                            <label for="">From</label>
                                                            <input type="time" name="starTime_friday"
                                                                class="form-control"
                                                                value="{{ $user->starTime_friday }}">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="">To</label>
                                                            <input type="time" name="finalHour_friday"
                                                                class="form-control"
                                                                value="{{ $user->finalHour_friday }}">
                                                        </div>
                                                        <br>
                                                        <div class="col-12">
                                                            <label for="">From</label>
                                                            <input type="time" name="starTime_friday1"
                                                                class="form-control"
                                                                value="{{ $user->starTime_friday1 }}">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="">To</label>
                                                            <input type="time" name="finalHour_friday1"
                                                                class="form-control"
                                                                value="{{ $user->finalHour_friday1 }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="card border border-secondary">
                                                    <div class="card-header bg-secondary">
                                                        <span class="text-white">Saturday</span>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="col-12">
                                                            <label for="">From</label>
                                                            <input type="time" name="starTime_saturday"
                                                                class="form-control"
                                                                value="{{ $user->starTime_saturday }}">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="">To</label>
                                                            <input type="time" name="finalHour_saturday"
                                                                class="form-control"
                                                                value="{{ $user->finalHour_saturday }}">
                                                        </div>
                                                        <br>
                                                        <div class="col-12">
                                                            <label for="">From</label>
                                                            <input type="time" name="starTime_saturday1"
                                                                class="form-control"
                                                                value="{{ $user->starTime_saturday1 }}">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="">To</label>
                                                            <input type="time" name="finalHour_saturday1"
                                                                class="form-control"
                                                                value="{{ $user->finalHour_saturday1 }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-1 shadow-none">
                                <a href="#collapseTwo" class="bg-primary collapsed rounded" data-toggle="collapse"
                                    aria-expanded="false" aria-controls="collapseTwo">
                                    <div class="card-header bg-primary" id="headingTwo">
                                        <h6 class="m-0 text-white">
                                            Available Administration Time
                                        </h6>
                                    </div>
                                </a>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="card border border-secondary">
                                                    <div class="card-header bg-secondary">
                                                        <span class="text-white">Monday</span>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="col-12">
                                                            <label for="">From</label>
                                                            <input type="time" name="starTime_monday_admin"
                                                                class="form-control"
                                                                value="{{ $user->starTime_monday_admin }}">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="">To</label>
                                                            <input type="time" name="finalHour_monday_admin"
                                                                class="form-control"
                                                                value="{{ $user->finalHour_monday_admin }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="card border border-secondary">
                                                    <div class="card-header bg-secondary">
                                                        <span class="text-white">Tuesday</span>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="col-12">
                                                            <label for="">From</label>
                                                            <input type="time" name="starTime_tuesday_admin"
                                                                class="form-control"
                                                                value="{{ $user->starTime_tuesday_admin }}">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="">To</label>
                                                            <input type="time" name="finalHour_tuesday_admin"
                                                                class="form-control"
                                                                value="{{ $user->finalHour_tuesday_admin }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="card border border-secondary">
                                                    <div class="card-header bg-secondary">
                                                        <span class="text-white">Wednesday</span>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="col-12">
                                                            <label for="">From</label>
                                                            <input type="time" name="starTime_wednesday_admin"
                                                                class="form-control"
                                                                value="{{ $user->starTime_wednesday_admin }}">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="">To</label>
                                                            <input type="time" name="finalHour_wednesday_admin"
                                                                class="form-control"
                                                                value="{{ $user->finalHour_wednesday_admin }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="card border border-secondary">
                                                    <div class="card-header bg-secondary">
                                                        <span class="text-white">Thursday</span>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="col-12">
                                                            <label for="">From</label>
                                                            <input type="time" name="starTime_thursday_admin"
                                                                class="form-control"
                                                                value="{{ $user->starTime_thursday_admin }}">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="">To</label>
                                                            <input type="time" name="finalHour_thursday_admin"
                                                                class="form-control"
                                                                value="{{ $user->finalHour_thursday_admin }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="card border border-secondary">
                                                    <div class="card-header bg-secondary">
                                                        <span class="text-white">Friday</span>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="col-12">
                                                            <label for="">From</label>
                                                            <input type="time" name="starTime_friday_admin"
                                                                class="form-control"
                                                                value="{{ $user->starTime_friday_admin }}">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="">To</label>
                                                            <input type="time" name="finalHour_friday_admin"
                                                                class="form-control"
                                                                value="{{ $user->finalHour_friday_admin }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="card border border-secondary">
                                                    <div class="card-header bg-secondary">
                                                        <span class="text-white">Saturday</span>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="col-12">
                                                            <label for="">From</label>
                                                            <input type="time" name="starTime_saturday_admin"
                                                                class="form-control"
                                                                value="{{ $user->starTime_saturday_admin }}">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="">To</label>
                                                            <input type="time" name="finalHour_saturday_admin"
                                                                class="form-control"
                                                                value="{{ $user->finalHour_saturday_admin }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="tax">Tax file number (TFN)</label>
                                        <input name="tax" type="text" class="form-control" id="tax"
                                            placeholder="Tax file number" value="{{ $user->tax }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="dateOfEmployment">Date of employment</label>
                                        <input name="date_employment" data-provide="datepicker"
                                            data-date-format="dd-mm-yyyy" type="text" class="form-control"
                                            id="dateOfEmployment" placeholder="Date of employment"
                                            value="{{ $user->date_employment }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="tax">Employment Status</label>
                                        <select name="employment_status" class=" form-control"
                                            data-placeholder="Status ......">
                                            <option value="" disabled>Select..</option>
                                            <option {{ $user->employment_status == 'Ongoing' ? 'selected' : '' }}
                                                value="Ongoing">Ongoing</option>
                                            <option {{ $user->employment_status == 'Temporary' ? 'selected' : '' }}
                                                value="Temporary">Temporary</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tax">Employment Time</label>
                                        <select name="employment_time" class=" form-control"
                                            data-placeholder="Status ......">
                                            <option value="" disabled>Select..</option>
                                            <option {{ $user->employment_time == 'Full-time' ? 'selected' : '' }}
                                                value="Full-time">Full-time</option>
                                            <option {{ $user->employment_time == 'Part-time' ? 'selected' : '' }}
                                                value="Part-time">Part-time</option>
                                            <option {{ $user->employment_time == 'Casual' ? 'selected' : '' }}
                                                value="Casual">Casual</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ordinaryWork">Ordinary hours of work per fortnight</label>
                                    <input type="text" class="form-control" name="ordinary_work" id="ordinary_work"
                                        placeholder="For part-time or full-time employee: e.g 38 hours"
                                        value="{{ $user->ordinary_work }}">
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <span>Emergency contact details</span>
                            </div>
                            <div class="card-body">
                                <div class="form-row" id="emergency1">
                                    <div class="form-group col-md-4">
                                        <label for="tax">Name emergency contact</label>
                                        <input name="emergency_name1" type="text" class="form-control" id="tax"
                                            placeholder="Name emergency contact" value="{{ $user->emergency_name1 }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="dateOfEmployment">Relationship</label>
                                        <select name="emergency_relationship1" class=" form-control"
                                            data-placeholder="Status ......">
                                            <option value="" disabled>Select..</option>
                                            <option {{ $user->emergency_relationship1 == 'Parent' ? 'selected' : '' }}
                                                value="Parent">Parent</option>
                                            <option {{ $user->emergency_relationship1 == 'Guardian' ? 'selected' : '' }}
                                                value="Guardian">Guardian</option>
                                            <option {{ $user->emergency_relationship1 == 'Carer' ? 'selected' : '' }}
                                                value="Carer">Carer</option>
                                            <option {{ $user->emergency_relationship1 == 'Partner' ? 'selected' : '' }}
                                                value="Partner">Partner</option>
                                            <option {{ $user->emergency_relationship1 == 'Sibling' ? 'selected' : '' }}
                                                value="Sibling">Sibling</option>
                                            <option
                                                {{ $user->emergency_relationship1 == 'Grandparent' ? 'selected' : '' }}
                                                value="Grandparent">Grandparent</option>
                                            <option {{ $user->emergency_relationship1 == 'Friend' ? 'selected' : '' }}
                                                value="Friend">Friend</option>
                                            <option {{ $user->emergency_relationship1 == 'Other' ? 'selected' : '' }}
                                                value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="dateOfEmployment">Phone number</label>
                                        <input name="emergency_number1" type="text" class="form-control"
                                            id="emergency_number1" placeholder="Phone number"
                                            value="{{ $user->emergency_number1 }}">
                                    </div>
                                </div>
                                <div class="form-row hideAtach" id="emergency2">
                                    <div class="form-group col-md-4">
                                        <label for="tax">Name emergency contact</label>
                                        <input id="emergency_name2" name="emergency_name2" type="text"
                                            class="form-control" id="tax" placeholder="Name emergency contact"
                                            value="{{ $user->emergency_name2 }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="dateOfEmployment">Relationship</label>
                                        <select name="emergency_relationship2" class=" form-control"
                                            data-placeholder="Status ......">
                                            <option value="" disabled>Select..</option>
                                            <option {{ $user->emergency_relationship2 == 'Parent' ? 'selected' : '' }}
                                                value="Parent">Parent</option>
                                            <option {{ $user->emergency_relationship2 == 'Guardian' ? 'selected' : '' }}
                                                value="Guardian">Guardian</option>
                                            <option {{ $user->emergency_relationship2 == 'Carer' ? 'selected' : '' }}
                                                value="Carer">Carer</option>
                                            <option {{ $user->emergency_relationship2 == 'Partner' ? 'selected' : '' }}
                                                value="Partner">Partner</option>
                                            <option {{ $user->emergency_relationship2 == 'Sibling' ? 'selected' : '' }}
                                                value="Sibling">Sibling</option>
                                            <option
                                                {{ $user->emergency_relationship2 == 'Grandparent' ? 'selected' : '' }}
                                                value="Grandparent">Grandparent</option>
                                            <option {{ $user->emergency_relationship2 == 'Friend' ? 'selected' : '' }}
                                                value="Friend">Friend</option>
                                            <option {{ $user->emergency_relationship2 == 'Other' ? 'selected' : '' }}
                                                value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="dateOfEmployment">Phone number</label>
                                        <input name="emergency_number2" type="text" class="form-control"
                                            id="emergency_number1" placeholder="Phone number"
                                            value="{{ $user->emergency_number2 }}">
                                    </div>
                                </div>
                                <div class="form-row hideAtach" id="emergency3">
                                    <div class="form-group col-md-4">
                                        <label for="tax">Name emergency contact</label>
                                        <input id="emergency_name3" name="emergency_name3" type="text"
                                            class="form-control" id="tax" placeholder="Name emergency contact"
                                            value="{{ $user->emergency_name2 }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="dateOfEmployment">Relationship</label>
                                        <select name="emergency_relationship3" class=" form-control"
                                            data-placeholder="Status ......">
                                            <option value="" disabled>Select..</option>
                                            <option {{ $user->emergency_relationship3 == 'Parent' ? 'selected' : '' }}
                                                value="Parent">Parent</option>
                                            <option {{ $user->emergency_relationship3 == 'Guardian' ? 'selected' : '' }}
                                                value="Guardian">Guardian</option>
                                            <option {{ $user->emergency_relationship3 == 'Carer' ? 'selected' : '' }}
                                                value="Carer">Carer</option>
                                            <option {{ $user->emergency_relationship3 == 'Partner' ? 'selected' : '' }}
                                                value="Partner">Partner</option>
                                            <option {{ $user->emergency_relationship3 == 'Sibling' ? 'selected' : '' }}
                                                value="Sibling">Sibling</option>
                                            <option
                                                {{ $user->emergency_relationship3 == 'Grandparent' ? 'selected' : '' }}
                                                value="Grandparent">Grandparent</option>
                                            <option {{ $user->emergency_relationship3 == 'Friend' ? 'selected' : '' }}
                                                value="Friend">Friend</option>
                                            <option {{ $user->emergency_relationship3 == 'Other' ? 'selected' : '' }}
                                                value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="dateOfEmployment">Phone number</label>
                                        <input name="emergency_number3" type="text" class="form-control"
                                            id="emergency_number1" placeholder="Phone number"
                                            value="{{ $user->emergency_number3 }}">
                                    </div>
                                </div>
                                <div class="form-row hideAtach" id="emergency4">
                                    <div class="form-group col-md-4">
                                        <label for="tax">Name emergency contact</label>
                                        <input id="emergency_name4" name="emergency_name4" type="text"
                                            class="form-control" id="tax" placeholder="Name emergency contact"
                                            value="{{ $user->emergency_name4 }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="dateOfEmployment">Relationship</label>
                                        <select name="emergency_relationship4" class=" form-control"
                                            data-placeholder="Status ......">
                                            <option value="" disabled>Select..</option>
                                            <option {{ $user->emergency_relationship4 == 'Parent' ? 'selected' : '' }}
                                                value="Parent">Parent</option>
                                            <option {{ $user->emergency_relationship4 == 'Guardian' ? 'selected' : '' }}
                                                value="Guardian">Guardian</option>
                                            <option {{ $user->emergency_relationship4 == 'Carer' ? 'selected' : '' }}
                                                value="Carer">Carer</option>
                                            <option {{ $user->emergency_relationship4 == 'Partner' ? 'selected' : '' }}
                                                value="Partner">Partner</option>
                                            <option {{ $user->emergency_relationship4 == 'Sibling' ? 'selected' : '' }}
                                                value="Sibling">Sibling</option>
                                            <option
                                                {{ $user->emergency_relationship4 == 'Grandparent' ? 'selected' : '' }}
                                                value="Grandparent">Grandparent</option>
                                            <option {{ $user->emergency_relationship4 == 'Friend' ? 'selected' : '' }}
                                                value="Friend">Friend</option>
                                            <option {{ $user->emergency_relationship4 == 'Other' ? 'selected' : '' }}
                                                value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="dateOfEmployment">Phone number</label>
                                        <input name="emergency_number4" type="text" class="form-control"
                                            id="emergency_number1" placeholder="Phone number"
                                            value="{{ $user->emergency_number4 }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <button type="button" class="btn btn-primary align-middle media-body"
                                            onclick="emergency()">Add new</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        {!! Form::submit('Save changes', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                    <div class="tab-pane fade" id="bankDate" role="tabpanel">
                        
                            {!! Form::model($user, ['route' => ['employees.update', $user], 'method' => 'put']) !!}
                            
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="bank">Bank</label>
                                            <input name="bank" type="text" class="form-control" id="bank"
                                                placeholder="Bank" value="{{ $user->bank }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="accountName">Account Name</label>
                                            <input name="account_name" type="text" class="form-control" id="account_name"
                                                placeholder="Account Name" value="{{ $user->account_name }}">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="bsb">BSB</label>
                                            <input name="bsb" type="text" class="form-control" id="bsb" placeholder="BSB"
                                                value="{{ $user->bsb }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="accountNumber">Account Number</label>
                                            <input name="account_number" type="text" class="form-control"
                                                id="accountNumber" placeholder="Account Number"
                                                value="{{ $user->account_number }}">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="tax">Method of pay</label>
                                            <select name="agreed_method_pay" class=" form-control"
                                                data-placeholder="Status ......">
                                                <option
                                                    {{ $user->agreed_method_pay == 'EFT' ? 'selected' : '' }}
                                                    value="EFT">EFT</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="tax">Pay period</label>
                                            <select name="agreed_period_pay" class=" form-control"
                                                data-placeholder="Status ......">
                                                <option
                                                    {{ $user->agreed_period_pay == 'Fortnightly' ? 'selected' : '' }}
                                                    value="Fortnightly">Fortnightly</option>
                                                <option
                                                    {{ $user->agreed_period_pay == 'Monthly' ? 'selected' : '' }}
                                                    value="Monthly">Monthly</option>
                                                <option
                                                    {{ $user->agreed_period_pay == 'Weekly' ? 'selected' : '' }}
                                                    value="Weekly">Weekly</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="tax">Pay day</label>
                                            <select name="agreed_day_pay" class=" form-control"
                                                data-placeholder="Status ......">
                                                <option
                                                    {{ $user->agreed_day_pay == 'Thursday' ? 'selected' : '' }}
                                                    value="Thursday">Thursday</option>
                                                <option
                                                    {{ $user->agreed_day_pay == 'Monday' ? 'selected' : '' }}
                                                    value="Monday">Monday</option>
                                                <option
                                                    {{ $user->agreed_day_pay == 'Tuesday' ? 'selected' : '' }}
                                                    value="Tuesday">Tuesday</option>
                                                <option
                                                    {{ $user->agreed_day_pay == 'Wednesday' ? 'selected' : '' }}
                                                    value="Wednesday">Wednesday</option>
                                                <option
                                                    {{ $user->agreed_day_pay == 'Friday' ? 'selected' : '' }}
                                                    value="Friday">Friday</option>
                                                <option
                                                    {{ $user->agreed_day_pay == 'Saturday' ? 'selected' : '' }}
                                                    value="Saturday">Saturday</option>
                                                <option
                                                    {{ $user->agreed_day_pay == 'Sunday' ? 'selected' : '' }}
                                                    value="Sunday">Sunday</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            {!! Form::submit('Save changes', ['class' => 'btn btn-primary']) !!}
                       {!! Form::close() !!}
                    </div>
                    <div class="tab-pane fade" id="terms" role="tabpanel">
                        {!! Form::model($user, ['route' => ['employees.update', $user], 'method' => 'put']) !!}
                        
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <span>Engagement</span>
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="position">Position</label>
                                            <select name="position" class=" form-control"
                                                data-placeholder="Status ......">
                                                <option value="" selected disabled>Select..</option>
                                                <option
                                                    {{ $user->position == 'Marketing Manager' ? 'selected' : '' }}
                                                    value="Marketing Manager">Marketing Manager</option>
                                                <option
                                                    {{ $user->position == 'Finance Manager' ? 'selected' : '' }}
                                                    value="Finance Manager">Finance Manager</option>
                                                <option
                                                    {{ $user->position == 'Human Resources Manager' ? 'selected' : '' }}
                                                    value="Human Resources Manager">Human Resources Manager</option>
                                                <option
                                                    {{ $user->position == 'Project Manager' ? 'selected' : '' }}
                                                    value="Project Manager">Project Manager</option>
                                                <option
                                                    {{ $user->position == 'Operations Manager' ? 'selected' : '' }}
                                                    value="Operations Manager">Operations Manager</option>
                                                <option
                                                    {{ $user->position == 'Strategic Business Manager' ? 'selected' : '' }}
                                                    value="Strategic Business Manager">Strategic Business Manager</option>
                                                <option {{ $user->position == 'Tutor' ? 'selected' : '' }}
                                                    value="Tutor">Tutor</option>
                                                <option {{ $user->position == 'Director' ? 'selected' : '' }}
                                                    value="Director">Director</option>
                                                <option
                                                    {{ $user->position == 'Academic Service Manger' ? 'selected' : '' }}
                                                    value="Academic Service Manger">Academic Service Manger</option>
                                                <option
                                                    {{ $user->position == 'Regional Manager' ? 'selected' : '' }}
                                                    value="Regional Manager">Regional Manager</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="Award/Agreement">Award/Agreement</label>
                                            <select name="AwardAgreement" class=" form-control"
                                                data-placeholder="Status ......">
                                                <option value="" selected disabled>Select..</option>
                                                <option
                                                    {{ $user->AwardAgreement == 'Clerks - Private Sector Award' ? 'selected' : '' }}
                                                    value="Clerks - Private Sector Award">Clerks - Private Sector Award
                                                </option>
                                                <option
                                                    {{ $user->AwardAgreement == 'Miscellaneous Award' ? 'selected' : '' }}
                                                    value="Miscellaneous Award">Miscellaneous Award</option>
                                                <option
                                                    {{ $user->AwardAgreement == 'Cleaning Services Award' ? 'selected' : '' }}
                                                    value="Cleaning Services Award">Cleaning Services Award</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="level">Level</label>
                                            <select name="level" class=" form-control" data-placeholder="Status ......">
                                                <option value="" selected disabled>Select..</option>
                                                <option {{ $user->level == 'Level I' ? 'selected' : '' }}
                                                    value="Level I">Level I</option>
                                                <option {{ $user->level == 'Level II' ? 'selected' : '' }}
                                                    value="Level II">Level II</option>
                                                <option {{ $user->level == 'Level III' ? 'selected' : '' }}
                                                    value="Level III">Level III</option>
                                                <option {{ $user->level == 'Level IV' ? 'selected' : '' }}
                                                    value="Level IV">Level IV</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="year">Year</label>
                                            <select name="year" class=" form-control" data-placeholder="Status ......">
                                                <option value="" selected disabled>Select..</option>
                                                <option {{ $user->year == 'I' ? 'selected' : '' }} value="I">I
                                                </option>
                                                <option {{ $user->year == 'II' ? 'selected' : '' }} value="II">
                                                    II</option>
                                                <option {{ $user->year == 'III' ? 'selected' : '' }}
                                                    value="III">III</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="age">Age</label>
                                            <input name="Age" type="text" class="form-control" id="age"
                                                value="{{ $age .' Years Old' }}"> 
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="Wage">Wage per hour</label>
                                            <input name="Wage" type="text" class="form-control" id="Wage"
                                                value="{{ $user->Wage }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="Fortnightly">Fortnightly payment</label>
                                            <input name="Fortnightly" type="text" class="form-control" id="Fortnightly"
                                                value="{{ $user->Fortnightly }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="Salary">Salary per annum</label>
                                            <input name="Salary" type="text" class="form-control" id="Fortnightly"
                                                value="{{ $user->Salary }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <span>Termination</span>
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="separation">Separation type</label>
                                            <select name="separation" class=" form-control"
                                                data-placeholder="Status ......">
                                                <option value="" selected disabled>Select..</option>
                                                <option
                                                    {{ $user->separation == 'Resignation' ? 'selected' : '' }}
                                                    value="Resignation">Resignation</option>
                                                <option
                                                    {{ $user->separation == 'Relocation' ? 'selected' : '' }}
                                                    value="Relocation">Relocation</option>
                                                <option
                                                    {{ $user->separation == 'Voluntary' ? 'selected' : '' }}
                                                    value="Voluntary">Voluntary</option>
                                                <option
                                                    {{ $user->separation == 'Redundancy' ? 'selected' : '' }}
                                                    value="Redundancy">Redundancy</option>
                                                <option
                                                    {{ $user->separation == 'Retirement' ? 'selected' : '' }}
                                                    value="Retirement">Retirement</option>
                                                <option
                                                    {{ $user->separation == 'Contract Expiry or Dismissal' ? 'selected' : '' }}
                                                    value="Contract Expiry or Dismissal">Contract Expiry or Dismissal
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="name_temployment">Name of employee terminating employment</label>
                                            <select name="name_temployment" class=" form-control"
                                                data-placeholder="Status ......">
                                                <option value="" selected disabled>Select..</option>
                                                {{-- @dump($employesAdmin) --}}
                                                @foreach ($employesAdmin as $employeAdmin)
                                                    <option
                                                        {{ $user->name_temployment == $employeAdmin->name . ' ' . $employeAdmin->last_name ? 'selected' : '' }}
                                                        value="{{ $employeAdmin->name . ' ' . $employeAdmin->last_name }}">
                                                        {{ $employeAdmin->name . ' ' . $employeAdmin->last_name }}
                                                    </option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="date_notice">Date of notice</label>
                                            <input name="date_notice" type="text" data-provide="datepicker"
                                                data-date-format="dd-mm-yyyy" class="form-control" id="date_notice"
                                                value="{{ $user->date_notice }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="date_working">Date of last working day</label>
                                            <input type="text" name="date_working" class="form-control" id="date_working"
                                                data-provide="datepicker" data-date-format="dd-mm-yyyy"
                                                value="{{ $user->date_working }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="method_termination">Method of termination</label>
                                            <select name="method_termination" class=" form-control"
                                                data-placeholder="Status ......">
                                                <option value="" selected disabled>Select..</option>
                                                <option
                                                    {{ $user->method_termination == 'Phone' ? 'selected' : '' }}
                                                    value="Phone">Phone</option>
                                                <option
                                                    {{ $user->method_termination == 'Email' ? 'selected' : '' }}
                                                    value="Email">Email</option>
                                                <option
                                                    {{ $user->method_termination == 'Text' ? 'selected' : '' }}
                                                    value="Text">Text</option>
                                                <option
                                                    {{ $user->method_termination == 'Business letter' ? 'selected' : '' }}
                                                    value="Business letter">Business letter</option>
                                                <option
                                                    {{ $user->method_termination == 'In-person conversation' ? 'selected' : '' }}
                                                    value="In-person conversation">In-person conversation</option>
                                                <option
                                                    {{ $user->method_termination == 'In-person meeting' ? 'selected' : '' }}
                                                    value="In-person meeting">In-person meeting</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="reason">Reason(s) given</label>
                                            <textarea rows="5" type="text" name="reason" class="form-control" id="reason"
                                                maxlength="700">{{ $user->reason }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            {!! Form::submit('Save changes', ['class' => 'btn btn-primary']) !!}
                       
                        {!! Form::close() !!}
                    </div>
                    <div class="tab-pane fade" id="documentation" role="tabpanel">
                        @include('employees.document')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
@endsection

@section('script')



    <!-- validacion de formularios -->
    <script src="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('js/pages/form-advanced.init.js') }}"></script>
    <!-- script de funcionamiento de los select -->
    <script src="{{ URL::asset('js/enrolment2/jquery-migrate.min.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/hs-toggle-state.min.js') }}"></script>
    {{-- <script src="{{ URL::asset('js/enrolment2/select2.full.min.js') }}"></script> --}}
    <script src="{{ URL::asset('js/enrolment2/hs-file-attach.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/jquery.mask.min.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/toastr.min.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/hs.core.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/hs.validation.js') }}"></script>
    {{-- <script src="{{ URL::asset('js/enrolment2/hs.select2.js') }}"></script> --}}
    <script src="{{ URL::asset('js/enrolment2/hs.mask.js') }}"></script>

    <script src="{{ URL::asset('/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/js/pages/datatables.init.js') }}"></script>
    <script src="{{ URL::asset('/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).on('ready', function() {

            // $('.js-custom-select').each(function() {
            //     var select2 = $.HSCore.components.HSSelect2.init($(this));
            // });
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
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
        window.onload = prueba;

        function prueba() {
            var emergency_name2 = document.getElementById('emergency_name2');
            var emergency_name3 = document.getElementById('emergency_name3');
            var emergency_name4 = document.getElementById('emergency_name4');

            if (emergency_name2.value) {
                var emergency2 = document.getElementById('emergency2');
                emergency2.classList.remove('hideAtach');
            }
            if (emergency_name3.value) {
                var emergency3 = document.getElementById('emergency3');
                emergency3.classList.remove('hideAtach');
            }
            if (emergency_name4.value) {
                var emergency4 = document.getElementById('emergency4');
                emergency4.classList.remove('hideAtach');
            }

        }

        function emergency() {

            var emergency2 = document.getElementById('emergency2');
            var emergency3 = document.getElementById('emergency3');
            var emergency4 = document.getElementById('emergency4');



            if (emergency2.classList.contains('hideAtach')) {
                emergency2.classList.remove('hideAtach');
            } else if (emergency3.classList.contains('hideAtach')) {
                emergency3.classList.remove('hideAtach');
            } else {
                emergency4.classList.remove('hideAtach');
            }
        }
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
