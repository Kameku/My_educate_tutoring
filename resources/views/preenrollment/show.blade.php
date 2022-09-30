@extends('layouts.master')

@section('title') Welcome @endsection

@section('css')
<!-- Plugin css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="{{URL::asset('frontEnrolment/iofrm-theme23w.css')}}">
<link rel="stylesheet" href="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('libs/bootstrap-touchspin/bootstrap-touchspin.min.css') }}">

            


@endsection


    @section('body')

    <body>
     @endsection

        @section('content')

        @component('common-components.breadcrumb')

            @slot('title') Enquiry {{ $preenrolment->first_name.' '.$preenrolment->last_name}} @endslot
            @slot('title_li') Welcome to {{ Auth::user()->name }} @endslot

        @endcomponent

        <div class="row">
            <div class="col-auto mr-auto"></div>
            <div class="col-auto">
                <a href="{{ route('preenrollment.list') }}" class="badge badge-secondary mb-2 p-2">Go Back</a>
            </div>
        </div>

        <div class="row">
            <div class="col-2 mb-3">
                <a href="{{route('preenrollment.check',['preenrolment' => $preenrolment->id ])}}" class="btn btn-success btn-block btn-sm">Reviewed</a>
            </div>
        </div>
        
        {{-- informacion del estudiante --}}
        <div class="row">
            <div class="col-12">
                <div class="card border shadow">
                    <div class="card-header bg-primary rounded-top">
                        <div class="col-9">
                            <h5 class="card-title mb-3 mt-3 text-white font-size-18">Student Information</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row my-3">
                            <div class="col-3">
                                <div class=" rounded mb-1">
                                    <span class="text-primary">Student Name</span>
                                </div>
                                <div class="bg-white border-bottom border-primary pb-1">
                                    {{$preenrolment->first_name.' '.$preenrolment->last_name }}
                                </div>
                            </div>
                            <div class="col-3">
                                <div class=" rounded mb-1">
                                    <span class="text-primary">Date of Birth</span>
                                </div>
                                <div class="bg-white border-bottom border-primary pb-1">
                                    {{$preenrolment->date_of_birth }}
                                </div>
                            </div>
                            <div class="col-3">
                                <div class=" rounded mb-1">
                                    <span class="text-primary">School Year</span>
                                </div>
                                <div class="bg-white border-bottom border-primary pb-1">
                                    {{$preenrolment->school_year}}
                                </div>
                            </div>
                            <div class="col-3">
                                <div class=" rounded mb-1">
                                    <span class="text-primary">School Name</span>
                                </div>
                                <div class="bg-white border-bottom border-primary pb-1">
                                    {{$preenrolment->school_name }}
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>

        {{-- informacion de parent guardian  --}}
        <div class="row">
            <div class="col-12">
                <div class="card border shadow">
                    <div class="card-header bg-primary rounded-top">
                        <div class="col-9">
                            <h5 class="card-title mb-3 mt-3 text-white font-size-18">Parent/Guardian Information</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row my-3">
                            <div class="col-4">
                                <div class=" rounded mb-1">
                                    <span class="text-primary">Parent/Guardian Name</span>
                                </div>
                                <div class="bg-white border-bottom border-primary pb-1">
                                    {{$preenrolment->parent_name}}
                                </div>
                            </div>
                            <div class="col-4">
                                <div class=" rounded mb-1">
                                    <span class="text-primary">Mobile Phone</span>
                                </div>
                                <div class="bg-white border-bottom border-primary pb-1">
                                    {{$preenrolment->parent_mobile }}
                                </div>
                            </div>
                            <div class="col-4">
                                <div class=" rounded mb-1">
                                    <span class="text-primary">Email</span>
                                </div>
                                <div class="bg-white border-bottom border-primary pb-1">
                                    {{$preenrolment->parent_email}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class=" rounded mb-1">
                                    <span class="text-primary">Questions?</span>
                                </div>
                                <div class="bg-white border-bottom border-primary pb-1">
                                    {{$preenrolment->questions }}
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>

        {{-- comentarios del enquiry  --}} 
        <div class="row">
            <div class="col-12">
                <div class="card border shadow">
                    <div class="card-header bg-primary rounded-top">
                        <div class="row">
                            <div class="col-9">
                                <h5 class="card-title mb-3 mt-3 text-white font-size-18">Comments</h5>
                            </div>
                            <div class="col-3 align-self-center">
                                <a data-toggle="modal" data-target="#commentsModal" class="btn btn-light btn-sm d-flex justify-content-center">Create Comments</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="row my-3">
                            <div class="col-12">
                                <div class="bg-white pb-1">
                                    @if (!empty($comentEmpty))
                                        <ul class="inbox-wid list-unstyled">
                                        @foreach ($commenPreenrolment as $comment)
                                            <li class="inbox-list-item my-3 px-3 py-3 bg-light rounded shadow-sm">
                                                <div class="media">
                                                    <div class="media-body overflow-hidden">
                                                        <div class="d-flex bd-highlight mb-3">
                                                            <div class="p-2 bd-highlight">
                                                                <img src="{{ URL::asset($comment->user->profile_photo) }}" alt="" class="avatar rounded-circle avatar-xs"> 
                                                            </div>   
                                                            <div class="p-2 bd-highlight align-self-center mt-1">
                                                                <h5 class="font-size-18 mb-1 ">{{$comment->user->name}}</h5>
                                                            </div>
                                                        </div>
                                                        <p class="">{!!$comment->comment!!}</p>
                                                    </div>
                                                    <div class="font-size-12 ml-2">
                                                        {{$comment->created_at->diffForHumans()}}
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                        </ul>
                                        @else
                                            <p class="font-size-15 text-center mt-3"> ¡ There are no comments available !</p>
                                        @endif
                                        {{-- <nav aria-label="Page navigation example">
                                            <ul class="pagination justify-content-end">
                                                {{ $commenPreenrolment->links() }}
                                            </ul>
                                        </nav> --}}
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>

       

        
        @include('preenrollment.comments')
        @endsection
        @section('script')

            <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
            <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>

            <script src="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
            <script src="{{ URL::asset('js/pages/form-validation.init.js')}}"></script>
            <script src="{{ URL::asset('js/pages/form-advanced.init.js')}}"></script>
            <script src="{{ URL::asset('/libs/bootstrap-touchspin/bootstrap-touchspin.min.js')}}"></script>

        @endsection