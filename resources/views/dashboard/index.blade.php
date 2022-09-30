@extends('layouts.master')

@section('title') Dashboard @endsection
@section('css')

<!-- DataTables -->
{{-- <link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" /> --}}
{{-- <link href="{{ URL::asset('/css/educate.css')}}" rel="stylesheet" type="text/css" /> --}}
{{-- <link rel="stylesheet" href="{{ URL::asset('libs/ion-rangeslider/ion-rangeslider.min.css') }}"> --}}

<link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{URL::asset('frontEnrolment/select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('frontEnrolment/theme.css')}}">
<link rel="stylesheet" href="{{asset('libs/toastr/css/main.css')}}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/educate.css') }}">
<link rel="stylesheet" href="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('libs/bootstrap-touchspin/bootstrap-touchspin.min.css') }}">

@endsection


@section('content')

@component('common-components.breadcrumb')
    @slot('title') Dashboard -  {{ Auth::user()->roles()->first()->description }}  @endslot
    @slot('title_li') Welcome to {{ Auth::user()->name }} @endslot
@endcomponent

@if ($errors->any())
    <ul>
        @foreach ($errors as $error)
            <li>{{ $error }}</li>    
        @endforeach
    </ul>
@endif


@if (Auth::user()->roles()->first()->description != "Super Admin")
    
@can('dashboardStudentsHeader')
<div class="row">
    <div class="col-3">
        <div class="card card-fluid bg-primary">
            <div class="card-body">
                <div class="font-size-25 text-white text-center pt-2">{{$date}}</div>
                <div class="font-size-15 text-white text-center pb-2">{{$year}}</div>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="card bg-primary card-fluid">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="text-white-50">
                            <h6 class="text-uppercase text-white mb-2">Tutor Message</h6>
                            <div>
                                <button data-toggle="modal" data-target="#messagesTutorsModal" class="btn btn-outline-warning " style="font-size: 10px;">Send Message</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 pb-1">
                        <img src="images/widget-img.png" alt="" width="120" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card illustration flex-fill">
            <div class="card-body p-0 d-flex flex-fill">
                <div class="row no-gutters w-100 pb-2">
                    <div class="col-6">
                        <div class="illustration-text p-3 m-1">
                            <p class="mb-0">{{ $inspire }}</p>
                        </div>
                    </div>
                    <div class="col-6 align-self-end text-right">
                        <img src="{{ URL::asset('images/student-tuto.png')}}" width="150" alt="Customer Support" class="img-fluid illustration-img">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endcan
    
@endif


<div class="row">
    @can('dashboard.index.payments')
        <div class="col-3">
            <div class="card card-fluid">
                <a href="https://login.microsoftonline.com/common/oauth2/authorize?client_id=4345a7b9-9a63-4910-a426-35363201d503&redirect_uri=https%3A%2F%2Fwww.office.com%2Flanding&response_type=code%20id_token&scope=openid%20profile&response_mode=form_post&nonce=637462715787415858.NjIzZWQ3ODMtZjJiNy00ODBjLWFiMGUtMGJkMDJjYjZiNGYzMGNiMGMzYTMtNDdkYy00MGE3LWIxNGYtZmQ0YjhkOGJmMDkw&ui_locales=en-AU&mkt=en-AU&client-request-id=e288146f-dafd-44e9-96a6-eb6464a2edb8&state=Bqp4Mpv-VrYGys0CZdO0VA8LJqX1d9SWCK9Mdh__cwwY-DajK8_JkhpeajQpewpM8rJ_Ce4xWgl6aPwfue7okX4nrcncT4GqEecPk4ZJZrtlxn8cQyDGwBjQdA_w8WKG71a9Qygs_AWXWP0q6HMY0_RjcDJ-H-TjEWMbnlUZaDHFF36JUTQdjRo4AIi9BqcsJWpOj5lJnolgyYpdYOMbj7QarxCtZYqUHotE_r17OvCc7XkRaMeICaE4myjv49pv-RSmb9GJ4jN3VGVWhSc_2Q&x-client-SKU=ID_NETSTANDARD2_0&x-client-ver=6.8.0.0" target="_blank"  class="btn">
                    <div class="card-body">
                        <img src="{{ URL::asset('images/office.png') }}"  width="140" >  
                    </div>    
                </a>
            </div>
        </div>
        <div class="col-3">
            <div class="card card-fluid">
                <a href="https://console.integrapay.com.au/Login.aspx" target="_blank"  class="btn">
                    <div class="card-body">
                        <img src="{{ URL::asset('images/integrapay.png') }}"  width="140" >  
                    </div>    
                </a>
            </div>
        </div>
        <div class="col-3">
            <div class="card card-fluid">
                <a href="https://go.xero.com/Dashboard/" target="_blank"  class="btn">
                    <div class="card-body">
                        <img src="{{ URL::asset('images/xero.jpg') }}"  width="140" >  
                    </div>    
                </a>
            </div>
        </div>
        <div class="col-3">
            <div class="card card-fluid bg-primary">
                <div class="card-body">
                    <div class="font-size-25 text-white text-center pt-2">{{$date}}</div>
                    <div class="font-size-15 text-white text-center pb-2">{{$year}}</div>
                </div>
            </div>
        </div>
    @endcan
</div>

<div class="row"> 
    <div class="col-12">
        @can('dashboardStatistics')
        <div class="row">
            <div class="col-3">
                <div class="card card-fluid">
                    <div class="card-body bg-primary rounded">
                        <div class="row aling-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-white mb-2">
                                    Current<br>Enrolment
                                </h6>
                                <span class="h2 mb-0 text-white">{{$totalEnrolment}}</span>
                            </div>
                            <div class="col-auto py-2">
                                <span class="rounded bg-white py-4 px-1 ">
                                    <img src="{{URL::asset('images/boys.svg')}}" alt="" width="50">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>								
            </div>
            <div class="col-3">
                <div class="card card-fluid">
                    <div class="card-body bg-primary rounded">
                        <div class="row aling-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-white mb-2">
                                    Current<br>Tutors
                                </h6>
                                <span class="h2 mb-0 text-white">{{$employeesTutor}}</span>
                            </div>
                            <div class="col-auto py-2">
                                <span class="py-4 px-1 rounded bg-white">
                                    <img src="{{URL::asset('images/teach.svg')}}" alt="" width="50">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>								
            </div>
            <div class="col-3">
                <div class="card card-fluid">
                    <div class="card-body bg-primary rounded">
                        <div class="row aling-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-white mb-2">
                                    Current<br>Lessons
                                </h6>
                                {{-- <span class="h2 mb-0 text-white">{{ $classTotal }}</span> --}}
                                <span class="h2 mb-0 text-white">150</span>
                            </div>
                            <div class="col-auto py-2">
                                <span class="py-4 px-1 rounded bg-white">
                                    <img src="{{URL::asset('images/libro.svg')}}" alt="" width="50">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>								
            </div>
            <div class="col-3">
                <div class="card bg-primary card-fluid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="text-white-50">
                                    <h6 class="text-uppercase text-white mb-2">Tutor Message</h6>
                                    <div>
                                        <button data-toggle="modal" data-target="#messagesTutorsModal" class="btn btn-outline-warning btn-sm" style="font-size: 10px;">Send Message</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 pb-1">
                                <img src="images/widget-img.png" alt="" width="120" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan
        @include('parts.slider')
    </div> 
</div>
<div class="row">
    @can('DashboardRecentEnquiry')        
    <div class="col-6">
        <div class="card card-fluid">
            <div class="card-header bg-primary rounded-top pt-3">
                <h4 class="card-title text-white">Recent Enquiry</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped text-end">
                        <tbody class="">
                            @foreach ($preenrolment as $item)
                            <tr role="row text-center" >
                                <td class="table-column-pl-0 pt-1 py-2">
                                  <a class="media align-items-center" href="{{route('preenrollment.show',['preenrolment' => $item->id ])}}">
                                    <div class="mr-2">
                                      <img class="avatar rounded-circle avatar-xs" src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&rounded=true&format=svg&name={{$item->first_name.' '.$item->last_name}}">
                                    </div>
                                    <div class="media-body pl-2">
                                      <span class="">{{$item->first_name.' '.$item->last_name}}</span>
                                    </div>
                                    @if ($item->check === 'Not reviewed')
                                        <div class="media-body pl-2 ">
                                            <span class="badge badge-pill badge-soft-danger px-2 py-1" style="float:right">{{$item->check}}</span>
                                        </div>
                                    @else
                                        <div class="media-body pl-2">
                                            <span class="badge badge-pill badge-soft-success px-2 py-1" style="float:right">{{$item->check}}</span>
                                        </div>
                                    @endif

                                  </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-center mb-4 mt-3">
                    {{-- <a href="{{route('preenrollment.list')}}" class="btn btn-primary btn-sm">View All <i class="mdi mdi-arrow-right ml-1"></i></a> --}}
                    <a href="#" class="btn btn-primary btn-sm">View All <i class="mdi mdi-arrow-right ml-1"></i></a>
                </div>
            </div>
        </div>
    </div>
    @endcan
    @can('DashboardWebsiteEnquiry')  
    <div class="col-6">
        <div class="card card-fluid">
            <div class="card-header bg-primary rounded-top pt-3">
                <h4 class="card-title text-white">Website Enquiry</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped text-end">
                        <tbody class="">
                            @foreach ($enquiryPage as $item)
                            <tr role="row text-center" >
                                <td class="table-column-pl-0 pt-1 py-2">
                                  <a class="media align-items-center" href="{{route('enquiry.page')}}">
                                    <div class="mr-2">
                                      <img class="avatar rounded-circle avatar-xs" src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&rounded=true&format=svg&name={{$item->name}}">
                                    </div>
                                    <div class="media-body pl-2">
                                      <span class="">{{$item->name}}</span>
                                    </div>
                                  </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-center mb-4 mt-3">
                    {{-- <a href="{{route('enquiry.page')}}" class="btn btn-primary btn-sm">View All <i class="mdi mdi-arrow-right ml-1"></i></a> --}}
                    <a href="#" class="btn btn-primary btn-sm">View All <i class="mdi mdi-arrow-right ml-1"></i></a>
                </div>
            </div>
        </div>
    </div>
    @endcan
</div>
<div class="row">
    @can('DashboardPreenrolment')  
    <div class="col-6">
        <div class="card card-fluid">
            <div class="card-header bg-primary rounded-top pt-3">
                <h4 class="card-title text-white">Recent Pre-enrolment</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped text-end">
                        <tbody class="">
                            @foreach ($enquiryLast as $item)
                            <tr role="row text-center" >
                                <td class="table-column-pl-0 pt-1 py-2">
                                  <a class="media align-items-center" href="{{route('enquiry.show',['enquiry' => $item->id])}}">
                                    <div class="mr-2">
                                      <img class="avatar rounded-circle avatar-xs" src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&rounded=true&format=svg&name={{$item->first_name.' '.$item->last_name}}">
                                    </div>
                                    <div class="media-body pl-2">
                                      <span class="">{{$item->first_name.' '.$item->last_name}}</span>
                                    </div>
                                    @if ($item->enrolment_process < 100)
                                        <div class="media-body pl-2 ">
                                            <span class="badge badge-pill badge-soft-danger px-2 py-1" style="float:right">{{$item->enrolment_process.'%'}}</span>
                                        </div>
                                    @else
                                        <div class="media-body pl-2">
                                            <span class="badge badge-pill badge-soft-success px-2 py-1" style="float:right">{{$item->enrolment_process.'%'}}</span>
                                        </div>
                                    @endif
                                  </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-center mb-4 mt-3">
                    {{-- <a href="{{route('enquiry.index')}}" class="btn btn-primary btn-sm">View All <i class="mdi mdi-arrow-right ml-1"></i></a> --}}
                    <a href="#" class="btn btn-primary btn-sm">View All <i class="mdi mdi-arrow-right ml-1"></i></a>
                </div>
            </div>
        </div>
    </div>
    @endcan
    @can('DashboardEnrolment')  
    <div class="col-6">
        <div class="card card-fluid">
            <div class="card-header bg-primary rounded-top pt-3">
                <h4 class="card-title text-white">Recent Enrolment</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped text-end">
                        <tbody class="">
                            @foreach ($enrolmentLast as $item)
                            <tr role="row text-center" >
                                <td class="table-column-pl-0 pt-1 py-2">
                                  <a class="media align-items-center" href="{{route('enrolment.show',['enrolment' => $item->id])}}">
                                    <div class="mr-2">
                                      <img class="avatar rounded-circle avatar-xs" src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&rounded=true&format=svg&name={{$item->first_name.' '.$item->last_name}}">
                                    </div>
                                    <div class="media-body pl-2">
                                      <span class="">{{$item->first_name.' '.$item->last_name}}</span>
                                    </div>
                                    @if ($item->enquiry->enrolment_process < 100)
                                        <div class="media-body pl-2 ">
                                            <span class="badge badge-pill badge-soft-danger px-2 py-1" style="float:right">{{$item->enquiry->enrolment_process.'%'}}</span>
                                        </div>
                                    @else
                                        <div class="media-body pl-2">
                                            <span class="badge badge-pill badge-soft-success px-2 py-1" style="float:right">{{$item->enquiry->enrolment_process.'%'}}</span>
                                        </div>
                                    @endif

                                  </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-center mb-4 mt-3">
                    {{-- <a href="{{route('enrolment.index')}}" class="btn btn-primary btn-sm">View All <i class="mdi mdi-arrow-right ml-1"></i></a> --}}
                    <a href="#" class="btn btn-primary btn-sm">View All <i class="mdi mdi-arrow-right ml-1"></i></a>
                </div>
            </div>
        </div>
    </div>
    @endcan
</div>
@can('tasks.index')
    <div class="row">
        <div class="col-12">
            <div class="card card-fluid">
                <div class="card-header bg-primary text-white rounded-top">
                    <span>My Tasks</span>
                    <span class="badge badge-pill badge-warning float-right d-inline">{{$mytasks->count()}}</span>
                </div>
                <div class="card-body">
                    @include('parts.taskList')
                    
                    <div class="text-center">
                        {{-- <a href="{{route('tasks.index')}}" class="btn btn-primary btn-sm">View more <i class="mdi mdi-arrow-right ml-1"></i></a> --}}
                        <a href="{{route('tasks.index')}}" class="btn btn-primary btn-sm">View more <i class="mdi mdi-arrow-right ml-1"></i></a>
                    </div>
                </div>
            </div>
        </div> 
    </div> 
@endcan

<div class="row">
    <div class="col-12">
        <div class="card illustration flex-fill">
            <div class="card-body p-0 d-flex flex-fill">
                <div class="row no-gutters w-100">
                    <div class="col-6">
                        <div class="illustration-text p-3 m-1">
                            <p class="mb-0">{{ $inspire }}</p>
                            
                        </div>
                    </div>
                    <div class="col-6 align-self-end text-right">
                        <img src="{{ URL::asset('images/student-tuto.png')}}" width="150" alt="Customer Support" class="img-fluid illustration-img">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection

@section('script')
<!-- Required datatable js -->
<script src="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
<script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ URL::asset('/libs/bootstrap-touchspin/bootstrap-touchspin.min.js')}}"></script>

<!-- Datatable init js -->
<script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>
<script src="{{ URL::asset('js/enrolment2/jquery-migrate.min.js')}}"></script>
<script src="{{ URL::asset('js/enrolment2/hs-toggle-state.min.js')}}"></script>
<script src="{{ URL::asset('js/enrolment2/select2.full.min.js')}}"></script>
<script src="{{ URL::asset('js/enrolment2/hs-file-attach.js')}}"></script>
<script src="{{ URL::asset('js/enrolment2/jquery.mask.min.js')}}"></script>
<script src="{{ URL::asset('js/enrolment2/toastr.min.js')}}"></script>
<script src="{{ URL::asset('js/enrolment2/hs.core.js')}}"></script>
<script src="{{ URL::asset('js/enrolment2/hs.validation.js')}}"></script>
<script src="{{ URL::asset('js/enrolment2/hs.select2.js')}}"></script>
<script src="{{ URL::asset('js/enrolment2/hs.mask.js')}}"></script>

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


@if(session()->has('success'))
    <script> 
        toastr.success("{{session('success')}}")
    </script>      
    @endif
    @if(session()->has('error'))
    <script> 
        toastr.error("{{session('error')}}")
    </script>      
@endif

@endsection