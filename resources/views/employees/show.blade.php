@extends('layouts.master')

@section('title') Dashboard @endsection
@section('css')

    <!-- DataTables -->
    <link href="{{ URL::asset('/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('libs/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('frontEnrolment/select2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('frontEnrolment/theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/educate.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/toastr/css/main.css') }}">

@endsection


@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Profile @endslot
        @slot('title_li') Welcome to {{ Auth::user()->name }} @endslot

    @endcomponent

    <div class="row">
        <div class="col-auto mr-auto"></div>
        <div class="col-auto">
            <a href="{{ URL::previous() }}" class="badge badge-secondary mb-2 p-2">Go Back</a>
        </div>
    </div>
    
    @can('profileEmployees')
    <div class="row">
        <div class="col-4">
            <div class="card text-center">
                <div class="card-body">
                    @if (strpos($user->profile_photo, 'users') == false)
                        <img src="{{$user->profile_photo}}"
                            class="rounded-circle img-responsive mt-2" width="100" height="100" style="object-fit: cover; object-position: center;">
                            
                    @else
                        <img src="https://ui-avatars.com/api/?background=random&rounded=true&format=svg&name={{ $user->name . ' ' . $user->last_name }}"
                            alt="" class="rounded-circle img-responsive mt-2" width="128" height="128">
                    @endif
                    <h4 class="mb-0 mt-2">{{ $user->name . ' ' . $user->last_name }}</h4>
                    
                    @foreach ($user->getRoleNames() as $roles)
                        @if ($roles == 'dissabled')
                            <span class="badge badge-danger p-1 mt-1" style="text-transform: capitalize">{{ $roles }}</span>
                        @else
                            <span class="badge badge-success p-1 mt-1" style="text-transform: capitalize">{{ $roles }}</span>
                        
                        @endif
                    @endforeach
                    <div class="mb-3">
                        @foreach ($user->asignatures as $asignature)
                            <span class="badge badge-primary p-1 mt-1">{{$asignature->name}}</span>
                        @endforeach   
                    </div>
                    @if ($user->email === Auth::user()->email)
                        <a href="{{route('employees.edit', $user)}}"
                            class="btn btn-info btn-sm mb-2">Edit Profile</a>
                    @endif
                    <button data-toggle="modal" data-target="#messagesModal" class="btn btn-info btn-sm mb-2">
                        Send Message
                    </button>
                    <div class="text-left mt-3">
                        <div class=" bg-white rounded">
                            <span class=" text-primary">Full Name</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span
                                class="text-dark font-size-15">{{ $user->name . ' ' . $user->last_name }}</span>
                        </div>

                        <div class=" bg-white rounded mt-1">
                            <span class=" text-primary">Age</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$age . ' years old' }}</span>
                        </div>

                        <div class=" bg-white rounded mt-1">
                            <span class=" text-primary">Mobile</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{ $user->phone_number }}</span>
                        </div>

                        <div class=" bg-white rounded mt-1">
                            <span class=" text-primary">Email</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{ $user->email }}</span>
                        </div>

                        <div class=" bg-white rounded mt-1">
                            <span class=" text-primary">Date of Birth</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{ $user->date_of_birth }}</span>
                        </div>

                        <div class=" bg-white rounded mt-1">
                            <span class=" text-primary">Address</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span
                                class="text-dark font-size-15">{{ $user->unit . ' ' . $user->street . ' ' . $user->streetName . ' ' . $user->suburb }}</span>
                        </div>

                        <div class=" bg-white rounded mt-1">
                            <span class=" text-primary">Post Code</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{ $user->postCode }}</span>
                        </div>
                    </div>
                </div> <!-- end card-body -->
            </div>
        </div>
        <div class="col-8">
            @if (session('dissabled'))
                <div class="col-4">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('dissabled') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                </div>
            @endif
            @if (session('activate'))

                <div class="col-4">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('activate') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                </div>

            @endif
                {{-- Desactivar y borrar perfil --}}
                @can('employees.deactivate')
                    <div class="card">
                        <div class="row p-3">
                            <div class="col-12">
                                @if ($user->hasRole('dissabled'))
                                    <a class="btn btn-success btn-block font-size-15 "
                                        href="{{route('employees.activate', $user)}}"><i
                                        class='bx bx-user-check pr-1 font-size-18 align-middle'></i> <span
                                        class="align-middle">Activate Profile</span>
                                    </a>
                                @else
                                    <a class="btn btn-warning btn-block font-size-15 "
                                        href="{{route('employees.deactivate', $user)}}">
                                        <i class='dripicons-warning pr-1 font-size-18 align-middle'></i> 
                                        <span
                                            class="align-middle">Deactivate Profile</span>
                                        </a>
                                    
                                @endif
                            </div>
                            {{-- <div class="col-4">
                                <a class="btn btn-danger btn-block align-middle font-size-15" href="#" data-toggle="modal"
                                    data-target="#deleteModal{{ $user->id }}"><i
                                        class='bx bxs-trash-alt pr-1 font-size-18 align-middle'></i><span
                                        class="align-middle">Delete Profile</span></a>
                            </div> --}}
                        </div>
                    </div>
                @endcan
            @if ($user->id === Auth::user()->id)
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted mb-2">
                                    Profile Completed
                                </h6>
                                <div class="row align-items-center no-gutters">
                                    <div class="col-auto">
                                        <!-- Heading -->
                                        <span class="h4 mr-2 mb-0">
                                            {{ $totalNullPorcent . '%' }}
                                        </span>
                                    </div>
                                    <div class="col">

                                        <!-- Progress -->
                                        @if ($totalNullPorcent < 70)
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar"
                                                    style="width:{{ $totalNullPorcent }}%" aria-valuenow="100"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        @else @if ($totalNullPorcent < 100)
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-striped bg-warning"
                                                        role="progressbar" style="width:{{ $totalNullPorcent }}%"
                                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            @else
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-striped bg-success"
                                                        role="progressbar" style="width:{{ $totalNullPorcent }}%"
                                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            @endif

                                        @endif
                                    </div>
                                    <a href="{{route('employees.edit', $user)}}"
                                        class="btn btn-primary mt-1 mb-1">
                                        <i class="fe fe-sliders"></i> Complete Profile
                                    </a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <!-- Icon -->
                                <span class="h2 fe fe-clipboard text-muted mb-0"></span>
                            </div>
                        </div> <!-- / .row -->
                    </div>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="col-12">
                        <h4 class="font-10">Biography:</h4>
                        <p class="text-muted font-13 mb-3 text-justify">{{ $user->bio }}</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">User profile Information</h4>
                    <p class="card-title-desc">In this section you can view all the information of the user's profile</p>
                    <div id="accordion">
                        <div class="card mb-1 shadow-none">
                            <a href="#collapseFour" class="text-white collapsed" data-toggle="collapse"
                                aria-expanded="false" aria-controls="collapseOne">
                                <div class="card-header bg-primary text-white" id="headingOne">
                                    <i class='bx bx-user align-middle font-size-25'></i><span
                                        class="align-middle font-size-15">Personal Information</span>
                                </div>
                            </a>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingOne"
                                data-parent="#accordion" style="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Tax file number (TFN)</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span class="text-dark font-size-15">{{ $user->tax }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Date of employment</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span
                                                    class="text-dark font-size-15">{{ $user->date_employment }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Employment Status</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span
                                                    class="text-dark font-size-15">{{ $user->employment_status }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Employment Time</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span
                                                    class="text-dark font-size-15">{{ $user->employment_time }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Ordinary hours of work per fortnight</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span
                                                    class="text-dark font-size-15">{{ $user->ordinary_work }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-1 shadow-none">
                            <a href="#collapseSeven" class="text-white collapsed" data-toggle="collapse"
                                aria-expanded="false" aria-controls="collapseOne">
                                <div class="card-header bg-primary text-white" id="headingOne">
                                    <i class='bx bx-time align-middle font-size-25'></i><span
                                        class="align-middle font-size-15">Available Administration Time</span>
                                </div>
                            </a>
                            <div id="collapseSeven" class="collapse" aria-labelledby="headingOne"
                                data-parent="#accordion" style="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Monday</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span class="text-dark font-size-15"> From
                                                    {{ $user->starTime_monday_admin }} To
                                                    {{ $user->finalHour_monday_admin }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Tuesday</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span class="text-dark font-size-15"> From
                                                    {{ $user->starTime_tuesday_admin }} To
                                                    {{ $user->finalHour_tuesday_admin }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Wednesday</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span class="text-dark font-size-15"> From
                                                    {{ $user->starTime_wednesday_admin }} To
                                                    {{ $user->finalHour_wednesday_admin }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Thursday</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span class="text-dark font-size-15"> From
                                                    {{ $user->finalHour_thursday_admin }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Friday</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span class="text-dark font-size-15"> From
                                                    {{ $user->starTime_friday_admin }} To
                                                    {{ $user->finalHour_friday_admin }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Saturday</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span class="text-dark font-size-15"> From
                                                    {{ $user->starTime_saturday_admin }} To
                                                    {{ $user->finalHour_saturday_admin }}</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card mb-1 shadow-none">
                            <a href="#collapseSix" class="text-white collapsed" data-toggle="collapse"
                                aria-expanded="false" aria-controls="collapseOne">
                                <div class="card-header bg-primary text-white" id="headingOne">
                                    <i class='bx bx-time align-middle font-size-25'></i><span
                                        class="align-middle font-size-15">Available Tutoring Time</span>
                                </div>
                            </a>
                            <div id="collapseSix" class="collapse" aria-labelledby="headingOne"
                                data-parent="#accordion" style="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Monday</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span class="text-dark font-size-15"> From
                                                    {{ $user->starTime_monday }} To
                                                    {{ $user->finalHour_monday }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Tuesday</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span class="text-dark font-size-15"> From
                                                    {{ $user->starTime_tuesday }} To
                                                    {{ $user->finalHour_tuesday }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Wednesday</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span class="text-dark font-size-15"> From
                                                    {{ $user->starTime_wednesday }} To
                                                    {{ $user->finalHour_wednesday }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Thursday</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span class="text-dark font-size-15"> From
                                                    {{ $user->starTime_thursday }} To
                                                    {{ $user->finalHour_thursday }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Friday</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span class="text-dark font-size-15"> From
                                                    {{ $user->starTime_friday }} To
                                                    {{ $user->finalHour_friday }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Saturday</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span class="text-dark font-size-15"> From
                                                    {{ $user->starTime_saturday }} To
                                                    {{ $user->finalHour_saturday }}</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card mb-1 shadow-none">
                            <a href="#collapseFive" class="text-white collapsed" data-toggle="collapse"
                                aria-expanded="false" aria-controls="collapseOne">
                                <div class="card-header bg-primary text-white" id="headingOne">
                                    <i class='bx bx-home align-middle font-size-25'></i><span
                                        class="align-middle font-size-15">Emergency Contact Details</span>
                                </div>
                            </a>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingOne"
                                data-parent="#accordion" style="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Name Contact</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span
                                                    class="text-dark font-size-15">{{ $user->emergency_name1 }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Relationship</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span
                                                    class="text-dark font-size-15">{{ $user->emergency_relationship1 }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Phone Number</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span
                                                    class="text-dark font-size-15">{{ $user->emergency_number1 }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @if (!empty($user->emergency_name2))
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class=" bg-white rounded mt-1">
                                                    <span class=" text-primary">Name Contact</span>
                                                </div>
                                                <div class="bg-white border-bottom border-primary pb-1 ">
                                                    <span
                                                        class="text-dark font-size-15">{{ $user->emergency_name2 }}</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class=" bg-white rounded mt-1">
                                                    <span class=" text-primary">Relationship</span>
                                                </div>
                                                <div class="bg-white border-bottom border-primary pb-1 ">
                                                    <span
                                                        class="text-dark font-size-15">{{ $user->emergency_relationship2 }}</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class=" bg-white rounded mt-1">
                                                    <span class=" text-primary">Phone Number</span>
                                                </div>
                                                <div class="bg-white border-bottom border-primary pb-1 ">
                                                    <span
                                                        class="text-dark font-size-15">{{ $user->emergency_number2 }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if (!empty($user->emergency_name3))
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class=" bg-white rounded mt-1">
                                                    <span class=" text-primary">Name Contact</span>
                                                </div>
                                                <div class="bg-white border-bottom border-primary pb-1 ">
                                                    <span
                                                        class="text-dark font-size-15">{{ $user->emergency_name3 }}</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class=" bg-white rounded mt-1">
                                                    <span class=" text-primary">Relationship</span>
                                                </div>
                                                <div class="bg-white border-bottom border-primary pb-1 ">
                                                    <span
                                                        class="text-dark font-size-15">{{ $user->emergency_relationship3 }}</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class=" bg-white rounded mt-1">
                                                    <span class=" text-primary">Phone Number</span>
                                                </div>
                                                <div class="bg-white border-bottom border-primary pb-1 ">
                                                    <span
                                                        class="text-dark font-size-15">{{ $user->emergency_number3 }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if (!empty($user->emergency_name4))
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class=" bg-white rounded mt-1">
                                                    <span class=" text-primary">Name Contact</span>
                                                </div>
                                                <div class="bg-white border-bottom border-primary pb-1 ">
                                                    <span
                                                        class="text-dark font-size-15">{{ $user->emergency_name4 }}</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class=" bg-white rounded mt-1">
                                                    <span class=" text-primary">Relationship</span>
                                                </div>
                                                <div class="bg-white border-bottom border-primary pb-1 ">
                                                    <span
                                                        class="text-dark font-size-15">{{ $user->emergency_relationship4 }}</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class=" bg-white rounded mt-1">
                                                    <span class=" text-primary">Phone Number</span>
                                                </div>
                                                <div class="bg-white border-bottom border-primary pb-1 ">
                                                    <span
                                                        class="text-dark font-size-15">{{ $user->emergency_number4 }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>


                        
                                
                                
                                {{-- {{Auth::user()->hasRole('superadmin')}} --}}
                                @if (Auth::user()->id == $user->id)
                                    <div class="card mb-1 shadow-none">
                                        <a href="#collapseOne" class="text-white collapsed" data-toggle="collapse"
                                            aria-expanded="false" aria-controls="collapseOne">
                                            <div class="card-header bg-primary text-white" id="headingOne">
                                                <i class='bx bx-money align-middle font-size-25'></i><span
                                                    class="align-middle font-size-15">Bank Account Details</span>
                                            </div>
                                        </a>
            
                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                            data-parent="#accordion" style="">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class=" bg-white rounded mt-1">
                                                            <span class=" text-primary">Bank</span>
                                                        </div>
                                                        <div class="bg-white border-bottom border-primary pb-1 ">
                                                            <span class="text-dark font-size-15">{{ $user->bank }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class=" bg-white rounded mt-1">
                                                            <span class=" text-primary">Account Name</span>
                                                        </div>
                                                        <div class="bg-white border-bottom border-primary pb-1 ">
                                                            <span
                                                                class="text-dark font-size-15">{{ $user->account_name }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class=" bg-white rounded mt-1">
                                                            <span class=" text-primary">BSB</span>
                                                        </div>
                                                        <div class="bg-white border-bottom border-primary pb-1 ">
                                                            <span class="text-dark font-size-15">{{ $user->bsb }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class=" bg-white rounded mt-1">
                                                            <span class=" text-primary">Account Number</span>
                                                        </div>
                                                        <div class="bg-white border-bottom border-primary pb-1 ">
                                                            <span
                                                                class="text-dark font-size-15">{{ $user->account_number }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class=" bg-white rounded mt-1">
                                                            <span class=" text-primary">Method of pay</span>
                                                        </div>
                                                        <div class="bg-white border-bottom border-primary pb-1 ">
                                                            <span
                                                                class="text-dark font-size-15">{{ $user->agreed_method_pay }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class=" bg-white rounded mt-1">
                                                            <span class=" text-primary">Pay period</span>
                                                        </div>
                                                        <div class="bg-white border-bottom border-primary pb-1 ">
                                                            <span
                                                                class="text-dark font-size-15">{{ $user->agreed_period_pay }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class=" bg-white rounded mt-1">
                                                            <span class=" text-primary">Pay day</span>
                                                        </div>
                                                        <div class="bg-white border-bottom border-primary pb-1 ">
                                                            <span
                                                                class="text-dark font-size-15">{{ $user->agreed_day_pay }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                    
                                @else
                                 @can('BankAccountDetails')
                                    <div class="card mb-1 shadow-none">
                                        <a href="#collapseOne" class="text-white collapsed" data-toggle="collapse"
                                            aria-expanded="false" aria-controls="collapseOne">
                                            <div class="card-header bg-primary text-white" id="headingOne">
                                                <i class='bx bx-money align-middle font-size-25'></i><span
                                                    class="align-middle font-size-15">Bank Account Details</span>
                                            </div>
                                        </a>
            
                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                            data-parent="#accordion" style="">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class=" bg-white rounded mt-1">
                                                            <span class=" text-primary">Bank</span>
                                                        </div>
                                                        <div class="bg-white border-bottom border-primary pb-1 ">
                                                            <span class="text-dark font-size-15">{{ $user->bank }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class=" bg-white rounded mt-1">
                                                            <span class=" text-primary">Account Name</span>
                                                        </div>
                                                        <div class="bg-white border-bottom border-primary pb-1 ">
                                                            <span
                                                                class="text-dark font-size-15">{{ $user->account_name }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class=" bg-white rounded mt-1">
                                                            <span class=" text-primary">BSB</span>
                                                        </div>
                                                        <div class="bg-white border-bottom border-primary pb-1 ">
                                                            <span class="text-dark font-size-15">{{ $user->bsb }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class=" bg-white rounded mt-1">
                                                            <span class=" text-primary">Account Number</span>
                                                        </div>
                                                        <div class="bg-white border-bottom border-primary pb-1 ">
                                                            <span
                                                                class="text-dark font-size-15">{{ $user->account_number }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class=" bg-white rounded mt-1">
                                                            <span class=" text-primary">Method of pay</span>
                                                        </div>
                                                        <div class="bg-white border-bottom border-primary pb-1 ">
                                                            <span
                                                                class="text-dark font-size-15">{{ $user->agreed_method_pay }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class=" bg-white rounded mt-1">
                                                            <span class=" text-primary">Pay period</span>
                                                        </div>
                                                        <div class="bg-white border-bottom border-primary pb-1 ">
                                                            <span
                                                                class="text-dark font-size-15">{{ $user->agreed_period_pay }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class=" bg-white rounded mt-1">
                                                            <span class=" text-primary">Pay day</span>
                                                        </div>
                                                        <div class="bg-white border-bottom border-primary pb-1 ">
                                                            <span
                                                                class="text-dark font-size-15">{{ $user->agreed_day_pay }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 @endcan
                                    
                                @endif
                                
                                    
                              
                         
                        <div class="card mb-1 shadow-none">
                            <a href="#collapseTwo" class="text-white collapsed" data-toggle="collapse"
                                aria-expanded="false" aria-controls="collapseOne">
                                <div class="card-header bg-primary text-white" id="headingOne">
                                    <i class='bx bx-file align-middle font-size-25'></i><span
                                        class="align-middle font-size-15">Terms of Employment</span>
                                </div>
                            </a>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordion" style="">
                                <div class="card-body">
                                    <div class="card-header bg-info text-white">
                                        <span>Engagement</span>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Position</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span
                                                    class="text-dark font-size-15">{{ $user->position }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Award/Agreement</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span
                                                    class="text-dark font-size-15">{{ $user->AwardAgreement }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Level</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span class="text-dark font-size-15">{{ $user->level }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Year</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span class="text-dark font-size-15">{{ $user->year }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Age</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span class="text-dark font-size-15">{{ $user->Age }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Wage per hour</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span class="text-dark font-size-15">{{ $user->Wage }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Fortnightly payment</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span
                                                    class="text-dark font-size-15">{{ $user->Fortnightly }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Salary per annum</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span
                                                    class="text-dark font-size-15">{{ $user->Salary }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="card-header bg-info text-white">
                                        <span>Termination</span>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Separation type</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span
                                                    class="text-dark font-size-15">{{ $user->separation }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Name of employee terminating employment</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span
                                                    class="text-dark font-size-15">{{ $user->name_temployment }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Date of notice</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span
                                                    class="text-dark font-size-15">{{ $user->date_notice }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Date of last working day</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span
                                                    class="text-dark font-size-15">{{ $user->date_working }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Method of termination</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span
                                                    class="text-dark font-size-15">{{ $user->method_termination }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Reason(s) given</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <span
                                                    class="text-dark font-size-15">{{ $user->reason }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-0 shadow-none">
                            <a href="#collapseThree" class="text-white collapsed" data-toggle="collapse"
                                aria-expanded="false" aria-controls="collapseOne">
                                <div class="card-header bg-primary text-white" id="headingOne">
                                    <i class='bx bxs-cloud-download align-middle font-size-25'></i><span
                                        class="align-middle font-size-15">Documentation</span>
                                </div>
                            </a>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordion" style="">
                                <div class="card-body">
                                    <div class="row">
                                        @if ($user->cv_resumen)
                                            <div class="col-sm-12">
                                                <div class=" bg-white rounded mt-1">
                                                    <span class=" text-primary">CV/Resume</span>
                                                </div>
                                                <div class="bg-white border-bottom border-primary pb-1 ">
                                                    <a href="{{Storage::url($user->cv_resumen )}}"
                                                        target="_blank">
                                                        <i class="fas fa-download mr-2 mt-1 font-size-20"></i>
                                                        <span
                                                            class="text-dark font-size-15">{{ $user->cv_resumen }}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($user->statement_practice)
                                            <div class="col-sm-12">
                                                <div class=" bg-white rounded mt-1">
                                                    <span class=" text-primary">Statement of Teaching Practice</span>
                                                </div>
                                                <div class="bg-white border-bottom border-primary pb-1 ">
                                                    <a href="{{Storage::url($user->statement_practice)}}"
                                                        target="_blank">
                                                        <i class="fas fa-download mr-2 mt-1 font-size-20"></i>
                                                        <span
                                                            class="text-dark font-size-15">{{ $user->statement_practice }}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($user->qualification)
                                            <div class="col-sm-12">
                                                <div class=" bg-white rounded mt-1">
                                                    <span class=" text-primary">Qualification(s)</span>
                                                </div>
                                                <div class="bg-white border-bottom border-primary pb-1 ">
                                                    <a href="{{Storage::url($user->qualification)}}"
                                                        target="_blank">
                                                        <i class="fas fa-download mr-2 mt-1 font-size-20"></i>
                                                        <span
                                                            class="text-dark font-size-15">{{ $user->qualification }}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($user->teacher_registration)
                                            <div class="col-sm-12">
                                                <div class=" bg-white rounded mt-1">
                                                    <span class=" text-primary">Teachers Registration</span>
                                                </div>
                                                <div class="bg-white border-bottom border-primary pb-1 ">
                                                    <a href="{{Storage::url($user->teacher_registration)}}"
                                                        target="_blank">
                                                        <i class="fas fa-download mr-2 mt-1 font-size-20"></i>
                                                        <span
                                                            class="text-dark font-size-15">{{ $user->teacher_registration }}</span>
                                                    </a>
                                                </div>
                                        @endif
                                    </div>
                                    @if ($user->registration_people)
                                        <div class="col-sm-12">
                                            <div class=" bg-white rounded mt-1">
                                                <span class=" text-primary">Registration To Work With Vulnerable
                                                    People</span>
                                            </div>
                                            <div class="bg-white border-bottom border-primary pb-1 ">
                                                <a href="{{Storage::url($user->registration_people)}}"
                                                    target="_blank">
                                                    <i class="fas fa-download mr-2 mt-1 font-size-20"></i>
                                                    <span
                                                        class="text-dark font-size-15">{{ $user->registration_people }}</span>
                                                </a>
                                    @endif
                                </div>
                            </div>
                            @if ($user->ata_acreditation)
                                <div class="col-sm-12">
                                    <div class=" bg-white rounded mt-1">
                                        <span class=" text-primary">ATA Accreditation</span>
                                    </div>
                                    <div class="bg-white border-bottom border-primary pb-1 ">
                                        <a href="{{Storage::url($user->ata_acreditation)}}"
                                            target="_blank">
                                            <i class="fas fa-download mr-2 mt-1 font-size-20"></i>
                                            <span
                                                class="text-dark font-size-15">{{ $user->ata_acreditation }}</span>
                                        </a>
                                    </div>
                                </div>
                            @endif
                            @if ($user->subject_specialized)
                                <div class="col-sm-12">
                                    <div class=" bg-white rounded mt-1">
                                        <span class=" text-primary">Additional Qualification(s)</span>
                                    </div>
                                    <div class="bg-white border-bottom border-primary pb-1 ">
                                        <a href="{{Storage::url($user->subject_specialized)}}"
                                            target="_blank">
                                            <i class="fas fa-download mr-2 mt-1 font-size-20"></i>
                                            <span
                                                class="text-dark font-size-15">{{ $user->subject_specialized }}</span>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan

    @if (Auth::user()->roles()->first()->description != "Super Admin")
    @can('profileStudents')
        @include('students.profile')
    @endcan
    @endif

    @if (Auth::user()->roles()->first()->description != "Super Admin")
    @can('profileParent')
    <div class="row">
        @include('students.parentProfile')
    </div>
    @endcan
    @endif

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
    <script src="{{ URL::asset('js/enrolment2/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/hs-file-attach.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/jquery.mask.min.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/toastr.min.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/hs.core.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/hs.validation.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/hs.select2.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/hs.mask.js') }}"></script>




@endsection
