@extends('layouts.master')

@section('title') Tasks @endsection
@section('css')

<!-- DataTables -->
<link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{URL::asset('frontEnrolment/select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('frontEnrolment/theme.css')}}">
<link rel="stylesheet" href="{{asset('libs/toastr/css/main.css')}}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/educate.css') }}">
<link rel="stylesheet" href="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('libs/dropzone/dropzone.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('libs/ion-rangeslider/ion-rangeslider.min.css') }}">


@endsection


@section('content')

@component('common-components.breadcrumb')
@slot('title') Task List @endslot
@slot('title_li') Welcome to {{ Auth::user()->name }} @endslot

@endcomponent

<div class="row">
    @if (session('created'))

    <div class="col-4">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('created') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    </div>

@endif

@if (session('updated'))

    <div class="col-4">
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('updated') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    </div>

@endif
@if (session('deleted'))

    <div class="col-4">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('deleted') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    </div>

@endif
    <div class="col-auto mr-auto"></div>
    <div class="col-auto">
        <a href="{{URL::previous()}}" class="badge badge-secondary mb-2 p-2">Go Back</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <button class="btn btn-lg btn-primary px-8 mr-3" data-toggle="modal" data-target="#taskModal">Create Task</button>
    </div>
</div>

    <div class="row mt-3">
        <div class="col-12 mb-3">
          
            <div class="card">
                <div class="card-body ">
                    
                    <div class="mb-2">
                        <h4 class="card-title mb-4 text-primary font-size-20 d-inline">Created by {{ Auth::user()->name}}</h4>
                        <span class="badge badge-pill badge-warning float-right d-inline">{{$createdbyme->count()}}</span>

                    </div>
                    <div class="table-responsive">
                        <table class="table table-nowrap table-centered mb-0">
                            <tbody class="border-none">
                                <tr>
                                    <th>Priority</th>
                                    <th>To</th>
                                    <th>Group</th>
                                    <th>Title</th>
                                    <th>Progress</th>
                                    <th>Actions</th>
                                </tr>
                                @foreach ($createdbyme as $task)
                                <tr>
                                    <td>
                                        @if ( $task->priority === 'Low' )
                                            <span class="badge badge-info py-1 px-3 ">{{$task->priority}}</span>
                                        @endif
                                        @if ( $task->priority === 'Medium' )
                                            <span class="badge badge-warning py-1 px-3 ">{{$task->priority}}</span>
                                        @endif
                                        @if ( $task->priority === 'High' )
                                            <span class="badge badge-danger py-1 px-3 ">{{$task->priority}}</span>
                                        @endif
                                    </td>
                                    <td>{{$task->user->name}}</td>
                                    <td>{{$task->group}}</td>
                                    <td>{{$task->title}}</td>
                                    <td>
                                        @if ($task->status < 50)
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width:{{$task->status}}%" aria-valuenow="100" aria-valuemin="2" aria-valuemax="100"></div>
                                            </div>
                                        @endif
                                        @if ($task->status > 50 && $task->status < 100 )
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width:{{$task->status}}%" aria-valuenow="100" aria-valuemin="2" aria-valuemax="100"></div>
                                            </div>
                                        @endif
                                        @if ($task->status == 100)
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width:{{$task->status}}%" aria-valuenow="100" aria-valuemin="2" aria-valuemax="100"></div>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-sm float-left" data-toggle="modal" data-target="#modal{{$task->id}}"><i class='bx bxs-check-circle font-size-25 text-success'></i></button>
                                        <form action="{{route('tasks.delete', $task)}}" method="POST">
                                            @csrf
                                            @method('DELETE')   
                                            <button class="btn btn-sm float-left" type="submit"><i class='bx bxs-trash-alt font-size-25 text-danger'></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @include('tasks.taskViewModal')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                   
                </div>
            </div> 
           
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-body ">
                    <div class="mb-2">
                        <h4 class="card-title mb-4 text-primary font-size-20 d-inline">Assigned to {{ Auth::user()->name}}</h4>
                        <span class="badge badge-pill badge-warning float-right d-inline">{{$mytasks->count()}}</span>

                    </div>
                    <div class="table-responsive">
                        <table class="table table-nowrap table-centered mb-0">
                            <tbody class="border-none">
                                <tr>
                                    <th>Priority</th>
                                    <th>From</th>
                                    <th>Group</th>
                                    <th>Title</th>
                                    <th>Progress</th>
                                    <th>Actions</th>
                                </tr>
                                @foreach ($mytasks as $task)
                                <tr>
                                    <td>
                                        @if ( $task->priority === 'Low' )
                                            <span class="badge badge-info py-1 px-3 ">{{$task->priority}}</span>
                                        @endif
                                        @if ( $task->priority === 'Medium' )
                                            <span class="badge badge-warning py-1 px-3 ">{{$task->priority}}</span>
                                        @endif
                                        @if ( $task->priority === 'High' )
                                            <span class="badge badge-danger py-1 px-3 ">{{$task->priority}}</span>
                                        @endif
                                    </td>
                                    <td>{{$task->from}}</td>
                                    <td>{{$task->group}}</td>
                                    <td>{{$task->title}}</td>
                                    <td>
                                        @if ($task->status < 50)
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width:{{$task->status}}%" aria-valuenow="100" aria-valuemin="2" aria-valuemax="100"></div>
                                            </div>
                                        @endif
                                        @if ($task->status > 50 && $task->status < 100 )
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width:{{$task->status}}%" aria-valuenow="100" aria-valuemin="2" aria-valuemax="100"></div>
                                            </div>
                                        @endif
                                        @if ($task->status == 100)
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width:{{$task->status}}%" aria-valuenow="100" aria-valuemin="2" aria-valuemax="100"></div>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-sm float-left" data-toggle="modal" data-target="#modal{{$task->id}}"><i class='bx bxs-check-circle font-size-25 text-success'></i></button>
                                        {{-- <form action="{{route('tasks.delete', $task)}}" method="POST">
                                            @csrf
                                            @method('DELETE')   
                                            <button class="btn btn-sm float-left" type="submit"><i class='bx bxs-trash-alt font-size-25 text-danger'></i></button>
                                        </form> --}}
                                    </td>
                                </tr>
                                @include('tasks.taskViewModal')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>     
        </div>
    </div>
    



@include('tasks.taskModal')




@endsection

@section('script')

<!-- Required datatable js -->
<script src="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
<script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ URL::asset('/libs/dropzone/dropzone.min.js')}}"></script>
<script src="{{ URL::asset('/libs/ion-rangeslider/ion-rangeslider.min.js')}}"></script>
<script src="{{ URL::asset('/js/pages/range-sliders.init.js')}}"></script>




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

    {{-- @if($errors->any())
    <script>
        $('#createEmployee').modal('show');
    </script>
    @endif --}}


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

    @if($errors->any())
    <script>
        $('#taskModal').modal('show');
    </script>
    @endif
  
   
@endsection