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


@endsection


@section('content')

@component('common-components.breadcrumb')
@slot('title') Staff Appraisals @endslot
@slot('title_li') Welcome to {{ Auth::user()->name }} @endslot

@endcomponent


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                List Employees
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-nowrap table-centered mb-0">
                        <tbody class="border-none">
                            @foreach ($employees as $employee)
                            <tr>
                                <td style="width: 60px;">
                                    <div class="team float-right">
                                        
                                        @if (strpos($employee->profile_photo, 'users') !== false )
                                        <img src="{{ Storage::url($employee->profile_photo)}}" class="rounded-circle" style="object-fit: cover; object-position: center; " width="35" height="35">
                                        @else
                                            <img src="{{$employee->profile_photo}}" class="rounded-circle" style="object-fit: cover; object-position: center; " width="35" height="35"> 
                                        @endif  
                                    </div>
                                </td>
                                <td>
                                    <h5 class="font-size-14 m-0 float-left">{{$employee->name." ".$employee->last_name}}</h5>
                                </td>
                                <td style="width: 70px;">

                                    @foreach ($employee->getRoleNames() as $roles)
                                        <span class="badge badge-success py-1 px-3 mt-1" style="text-transform: capitalize">{{ $roles}}</span>
                                    @endforeach
                                    
                                    
                                </td>
                                <td style="width: 70px;">
                                    <a href="{{route('appraisal.show', $employee)}}" class="btn btn-primary btn-sm">View Appraisal</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
        $('#createAppraisals').modal('show');
    </script>
    @endif


    @if(session()->has('success'))
        <script> 
            toastr.success("{{session('success')}}")
        </script>      
    @endif
  
   
@endsection