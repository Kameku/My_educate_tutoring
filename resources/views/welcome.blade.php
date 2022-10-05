@extends('layouts.master-without-nav')

@section('title') Welcome @endsection

@section('body')

    <body style="background-color: #fff4ec">
      
        {{-- {{$linkEnrolment}} --}}
        @if (session()->has('success'))
            <div class="row mt-3 ml-2">
                <div class="col-10">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-check-all mr-2"></i> {{ session()->get('success') }}

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                </div>
            </div>
        @endif
    @endsection


    @section('content')
        <div class="home-btn d-none d-sm-block">
            <a href="login" class="btn btn-info waves-effect waves-light">
                <i class='bx bxs-layout font-size-15 align-middle mr-2'></i>
                <span> Already enrolled? Login here! </span>
            </a>
        </div>
        <section class="my-5 pt-sm-5">
            <div class="container">
                <div class="row">

                    <div class="col-12 text-center">
                        <div class="home-wrapper">

                            <div class="mb-5">
                                <img src="{{ URL::asset('images/educate.png') }}" alt="logo" height="55" />

                            </div>

                            <div class="row justify-content-center">
                                <div class="col-sm-4">
                                    <div class="maintenance-img">
                                        <img src="/images/widget-img.png" alt="" class="img-fluid mx-auto d-block">
                                    </div>
                                </div>
                            </div>
                            <h3 class="mt-5">An Active & Engaging Learning Experience</h3>
                            <p>Premium educational support tailored to meet the individual needs of our students</p>
                            <a href="{{route('enquiry.create')}}" class="btn btn-primary btn-lg btn-block">Create Enquiry</a>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card mt-4 maintenance-box">
                                        <div class="card-body">
                                            <h5 class="font-size-15 text-uppercase">MORE THAN JUST A LESSON</h5>
                                            <p class="text-muted mb-0">Our teachers offer tailored support in English, Maths
                                                and Science for students in K-12.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mt-4 maintenance-box">
                                        <div class="card-body">
                                            <h5 class="font-size-15 text-uppercase">
                                                CATCH UP OR GET AHEAD</h5>
                                            <p class="text-muted mb-0">For students who are feeling left behind, or want to
                                                extend their achievements.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mt-4 maintenance-box">
                                        <div class="card-body">
                                            <h5 class="font-size-15 text-uppercase">
                                                RELIABLE SKILLS</h5>
                                            <p class="text-muted mb-0">We help students grasp the foundation skills needed
                                                for reading, writing and maths.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
