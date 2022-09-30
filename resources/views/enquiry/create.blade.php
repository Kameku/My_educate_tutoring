@extends('layouts.master-without-nav')

@section('title') Welcome @endsection

@section('css')
<!-- Plugin css -->
<link rel="stylesheet" type="text/css" href="{{URL::asset('frontEnrolment/iofrm-theme23w.css')}}">
<link rel="stylesheet" href="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('libs/bootstrap-touchspin/bootstrap-touchspin.min.css') }}">

@endsection


    @section('body')

    <body>
     @endsection

        @section('content')
        <div class="form-body on-top-mobile">
            <div class="website-logo">
                <a href="/">
                    <div class="logo">
                        <img class="logo-size" src="{{URL::asset('images/site-icon.png')}}" alt="">
                    </div>
                </a>
            </div>
            <div class="row">
                <div class="img-holder">
                    <div class="bg"></div>
                    <div class="info-holder simple-info">
                        <div><img src="{{URL::asset('images/enquiry.svg')}}" alt=""></div>
                        <div>
                            <h3>Welcome to Educate Tutoring!</h3>
                        </div>
                        <div>
                            <p>Please leave your details and we will <br> make contact as soon as possible</p>
                        </div>
                    </div>
                </div>
                <div class="form-holder">
                    <div class="form-content">
                        <div class="form-items">
                            @if (isset($errors) && $errors->any())
                                @foreach ($errors->all() as $error)
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <i class="mdi mdi-block-helper mr-2"></i> {{ $error }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                            <form class="needs-validation" data-parsley-validate novalidate action="{{route('enquiry.store')}}" method="POST" >
                            @csrf
                                <div class="row">
                                    <div class="col-12 title-form p-2">
                                        <h2>Student Information</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <input type="text" name="first_name" value="{{ old('first_name')}}" class="form-control" placeholder="Student first name" required>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="text" name="last_name" value="{{ old('last_name')}}"  class="form-control" placeholder="Student last name" required >
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- <div class="col-12 col-sm-4">
                                        <input type="text" name="home_phone" value="{{ old('home_phone')}}"  class="form-control" placeholder="Home Phone">
                                    </div> --}}
                                    <div class="col-12 col-sm-6">
                                        <input type="text" name="adress" value="{{ old('adress')}}"  class="form-control" placeholder="Address" required>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="text" name="suburb" value="{{ old('suburb')}}"  class="form-control" placeholder="Suburb" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <input type="number" name="post_code" value="{{ old('post_code')}}"  class="form-control" placeholder="P/Code" required>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <input type="text" data-provide="datepicker" data-date-format="dd-mm-yyyy" value="{{ old('date_of_birth')}}"  name="date_of_birth" class="form-control " placeholder="Date of Birth" required>
                                    </div>
                                    
                                    <div class="col-12 col-sm-4">
                                        <input type="text" name="language_home" value="{{ old('language_home')}}"  class="form-control" placeholder="Language Spoken at Home" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 title-form p-2 mt-5" >
                                        <h2>Parent/Guardian information</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-12">
                                        <input type="text" name="parent_name" value="{{ old('parent_name')}}"  class="form-control" placeholder="Parent/Guardian Full Name" required>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <input type="text" name="parent_mobile" value="{{ old('parent_mobile')}}"  class="form-control" placeholder="Mobile Phone" required>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="email" name="parent_email" value="{{ old('parent_email')}}"  class="form-control" placeholder="Email" required>
                                    </div>
                                    {{-- <div class="col-12 col-sm-6">
                                        <input type="text" name="parent_adress" value="{{ old('parent_adress')}}"  class="form-control" placeholder="Address">
                                    </div> --}}
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <textarea name="questions" id="" class="form-control" cols="5" rows="5" placeholder="Questions?"></textarea>
                                    </div>
                                </div>
                                
                                <input type="hidden" name="status" value="disable" >

                                {{-- @if (Auth::user()->roles->first()->name === 'parent')  --}}
                                @if (Auth::user()) 
                                    <div class="row ml-2 alert alert-warning px-4 pt-3 pb-4">
                                        <div class="col-3 ">
                                            <label class="alert-link pb-1">
                                                Send email to parent
                                            </label>
                                        </div>
                                        <div class="col-9">
                                            <select name="confirmation_email" id="" class="form-control" required>
                                                <option value="" selected >Select Option</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="col-12">
                                        <style>
                                            #loading_oculto{
                                            z-index:999;
                                            position:absolute;
                                            top:50%;
                                            left:50%;
                                            margin-left:-117px;
                                            margin-top:-117px;
                                            visibility:hidden;
                                            }
                                            
                                            </style>
                                        <div class="form-button">
                                            <button id="submit" type="submit" class="btn btn-primary btn-lg btn-block pt-2 pb-2" >
                                                <span class="font-size-18">Submit Enquiry</span>
                                            </button>
                                        </div>

                                        {{-- <div class="form-button">
                                            <button id="submit" type="submit" class="btn btn-primary btn-lg btn-block pt-2 pb-2 form-control" onclick="document.getElementById('loading_oculto').style.visibility='visible';">
                                                <span class="font-size-18">Submit Enquiry</span>
                                            </button>
                                        </div> --}}
                                        {{-- Loader sending Pendiente por generar enviando  --}}

                                        <div id="loading_oculto">
                                            <button type="button" class="btn btn-primary waves-effect waves-light">
                                                <i class="bx bx-loader bx-spin font-size-16 align-middle mr-2"></i> Sending your data.
                                            </button>
                                            
                                            <div class="spinner-chase mt-2">                                                
                                                <div class="chase-dot"></div>
                                                <div class="chase-dot"></div>
                                                <div class="chase-dot"></div>
                                                <div class="chase-dot"></div>
                                                <div class="chase-dot"></div>
                                                <div class="chase-dot"></div>
                                            </div>
                                                                                 
                                        </div> {{-- End Loader sending --}}
                                    </div>
                                    
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div >
            
            {{-- <img src="{{ URL::asset('/images/enviando.gif')}}" /> --}}
        </div>
        <div class="home-btn d-none d-sm-block">
            <a href="{{ URL::previous() }}" class="text-dark"><i class='bx bxs-left-arrow-square h1' style="color:#366db1"></i></a>
        </div>

        @endsection
        @section('script')
            <script src="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
            <script src="{{ URL::asset('js/pages/form-validation.init.js')}}"></script>
            <script src="{{ URL::asset('js/pages/form-advanced.init.js')}}"></script>
            <script src="{{ URL::asset('/libs/bootstrap-touchspin/bootstrap-touchspin.min.js')}}"></script>
        @endsection