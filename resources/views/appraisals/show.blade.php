@extends('layouts.master')

@section('title') Staff Appraisals @endsection
@section('css')

<!-- DataTables -->
<link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
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



    <div class="row">
        <div class="col-auto mr-auto"></div>
        <div class="col-auto">
            <a href="{{URL::previous()}}" class="badge badge-secondary mb-2 p-2">Go Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="row">
                <div class="col-6 mb-3">
                    <a href="#" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#createAppraisals">Create Appraisal</a> 
                </div>
                

                @if (session('created'))
                    <div class="col-6">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('created') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    </div>

                @endif

                @if (session('deleted'))

                    <div class="col-6">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('deleted') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    </div>

                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-3">
            <div class="card">
                @if ($appraisals->count())
                    <div class="card-body ">
                        <h4 class="card-title mb-4 text-primary font-size-20"></h4>
                        <h4 class="card-title mb-4 text-primary font-size-20">{{$user->name."'s appraisal list"}}</h4>
                        <div class="table-responsive">
                            <table class="table table-nowrap table-centered mb-0">
                                <tbody class="border-none">
                                    <tr>
                                        <th>File Name</th>
                                        <th>Delivery</th>
                                        <th>Status</th>
                                        <th>Download</th>
                                        <th>Delete</th>
                                    </tr>

                                    @foreach ($appraisals as $appraisal)
                                        <tr>
                                            <td>                                      
                                                <p class="m-0" style="font-size: 12px; font-weight: lighter;">{{$appraisal->appraisal_name}}</p>
                                                {{-- <a href="{{Storage::url($appraisal->appraisal_name)}}" target="_blank" rel="noopener noreferrer">{{$appraisal->appraisal_name}}</a> --}}
                                            </td>
                                            <td style="width: 20px;">
                                                {{-- <h5 class="m-0" style="font-size: 10px">{{$appraisal->delivery_date}}</h5> --}}
                                                <span class="badge badge-soft-success capita px-2 py-1">{{$appraisal->delivery_date}}</span>
                                            </td>
                                            <td style="width: 20px;">
                                                @if ($appraisal->appraisal_answer)
                                                    <span class="badge badge-soft-success capita px-2 py-1">Completed</span>
                                                @else
                                                    <span class="badge badge-soft-warning capita px-2 py-1">{{$appraisal->status}}</span>
                                                @endif
                                            </td>
                                            <td style="width: 20px;">
                                                @if ($appraisal->appraisal_answer) 
                                                    <a href="{{Storage::url($appraisal->appraisal_answer)}}" class="btn btn-sm btn-primary" target="_blank">Download</a>  
                                                @else
                                                    <span class="btn btn-sm btn-secondary" disabled style="cursor: not-allowed;">Download</span>
                                                @endif
                                            
                                            </td>
                                            <td style="width: 10px;">
                                                <form action="{{route('appraisal.delete', $appraisal)}}" method="POST">
                                                @method('DELETE') 
                                                @csrf 
                                                <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                                <input type="hidden" name="assigned" value="{{$appraisal->assigned}}">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>     
        </div>
    </div>





@include('appraisals.modalCreate')



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

    @if($errors->any())
    <script>
        $('#createAppraisals').modal('show');
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