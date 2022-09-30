@extends('layouts.master')

@section('title') Staff Appraisals @endsection
@section('css')

<!-- DataTables -->
<link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ URL::asset('libs/select2/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('frontEnrolment/select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('frontEnrolment/theme.css')}}">
<link rel="stylesheet" href="{{asset('libs/toastr/css/main.css')}}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/educate.css') }}">
<link rel="stylesheet" href="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('libs/dropzone/dropzone.min.css') }}">


@endsection


@section('content')

@component('common-components.breadcrumb')
@slot('title') Staff Appraisals @endslot
@slot('title_li') Welcome to {{ Auth::user()->name }} @endslot

@endcomponent


{{-- esta seccion es la que se muestra en mis appraisals permite responder los appraisals generados --}}
<div class="row">
    @error('appraisal_answer')
        <div class="col-4">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{$message}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        </div>
    @enderror 

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
        <a href="{{URL::previous()}}" class="badge badge-secondary mb-2 p-2">Go Back</a>
    </div>
</div>
<div class="row">
    <div class="col-12 mb-3">
        <div class="card">
            <div class="card-body ">
                <h4 class="card-title mb-4 text-primary font-size-20">{{$user->name."'s appraisal list"}}</h4>
                <div class="table-responsive">
                    <table class="table table-nowrap table-centered mb-0">
                        <tbody class="border-none">
                            <tr>
                                <th>Name</th>
                                <th>Observations</th>
                                <th>Delivery</th>
                                <th>Status</th>
                                <th>Download</th>
                                <th>Load Answer <br>
                                    @error('appraisal_answer')
                                        <span class="small text-danger">{{$message}}</span>
                                    @enderror 
                                </th>
                            </tr>
                            @foreach ($appraisals as $appraisal)
                            <span class="hideAtach">{{$item = rand(0,100)}}</span> 
                            <tr>
                                <td>                                      
                                    {{-- <h5 class="font-size-14 m-0">{{$appraisal->appraisal_name}}</h5> --}}
                                    <p class="m-0" style="font-size: 12px; font-weight: lighter;">{{$appraisal->appraisal_name}}</p>
                                    {{-- <a href="{{Storage::url($appraisal->appraisal_name)}}" target="_blank" rel="noopener noreferrer">{{$appraisal->appraisal_name}}</a> --}}

                                </td>
                                <td >
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#observationModal{{$item}}">
                                        View more
                                    </button>
                                </td>
                                <td >
                                    {{-- <h5 class="font-size-14 m-0">{{$appraisal->delivery_date}}</h5> --}}
                                    <span class="badge badge-soft-success capita px-2 py-1">{{$appraisal->delivery_date}}</span>
                                </td>
                                <td >
                                    @if ($appraisal->appraisal_answer)
                                        <span class="badge badge-soft-success capita px-2 py-1">Completed</span>
                                    @else
                                        <span class="badge badge-soft-warning capita px-2 py-1">{{$appraisal->status}}</span>
                                    @endif
                                    
                                </td>
                                <td >
                                    @if ($appraisal->appraisal_answer)
                                        <span class="btn btn-sm btn-secondary">Download</span>
                                    @else
                                         <a href="{{Storage::url($appraisal->appraisal_name)}}" class="btn btn-sm btn-primary" target="_blank">Download</a>     
                                    @endif
                                </td>
                                <td >
                                    @if ($appraisal->appraisal_answer)
                                        <span class="btn btn-sm btn-secondary">Completed</span>
                                    @else
                                        <form action="{{route('appraisal.update', $appraisal)}}" method="POST" enctype="multipart/form-data">
                                            @method('PUT') 
                                            @csrf 
                                            <div class="btn btn-primary btn-sm file-attachment-btn">Load Answer
                                                <input name="appraisal_answer" type="file" class="js-file-attach file-attachment-btn-label" data-hs-file-attach-options='{
                                                    "textTarget": "#fileE1{{$item}}",
                                                    "maxFileSize": "Infinity"
                                                }' multiple>
                                            </div>
                                            <span class="font-size-15" id="fileE1{{$item}}">No files uploaded</span>
                                            <input type="hidden" name="assigned" value="{{$appraisal->assigned}}">
                                            
                                            <button type="submit" class="btn btn-primary btn-sm file-attachment-btn">
                                                <i class="mdi mdi-send-outline"></i>
                                            </button>
                                        </form>
                                    @endif
                                    
                                    {{-- <a href="{{URL::asset('appraisalAppraisals/'.$appraisal->assigned.'/'.$appraisal->appraisal_name)}}" class="btn btn-sm btn-primary" target="_blank">Load Answer</a> --}}
                                </td>
                                <div class="modal fade"  id="observationModal{{$item}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg  ">
                                        <div class="modal-content border-primary p-3 rounded shadow-primary">
                                            <div class="modal-header bg-primary">
                                                <h5 class="modal-title text-white" id="exampleModalLabel">Observations</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true" class="text-white">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    {{$appraisal->observations}}
                                                </p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>     
    </div>
</div>
{{-- FINAL esta seccion es la que se muestra en mis appraisals permite responder los appraisals generados --}}





{{-- @include('appraisal.modalCreate') --}}



@endsection

@section('script')

<!-- Required datatable js -->
<script src="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
<script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ URL::asset('/libs/dropzone/dropzone.min.js')}}"></script>

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
    @if($errors->any())
    <script>
        $('#createEmployee').modal('show');
    </script>
    @endif


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