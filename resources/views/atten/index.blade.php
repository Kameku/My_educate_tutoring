@extends('layouts.master')

@section('title') Attendances & Learning @endsection
@section('css')

<!-- DataTables -->
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
        @slot('title') Attendance & Learning Plans @endslot
        @slot('title_li') Welcome to {{ Auth::user()->name }} @endslot
    @endcomponent

    {{-- <div class="row" id="cerrar">
        <div class="col-12">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <i class="mdi mdi-alert-outline mr-2"></i> The size of the upload pictures needs to be below 1280x500px!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="cerrar()">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        </div>
    </div> --}}

    @can('buttomNewAttendance')
    <div class="row mb-3">
        <div class="col-auto mr-auto"></div>
        <div class="col-auto">
            <button class="btn btn-lg btn-primary px-8 mr-3" data-toggle="modal" data-target="#attenModal">New Attendance</button>
        </div>
    </div>
    @endcan

    @can('attensRole')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="datatable" 
                        class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" 
                        style="border-collapse: collapse; border-spacing: 0px; width: 100%;" 
                        role="grid" 
                        aria-describedby="datatable-buttons_info">
                            <thead>
                                <tr role="row">
                                    <th>Student Name</th>
                                    <th>Date Created</th>
                                    <th>Tutor</th>
                                    <th>Term</th>
                                    <th>Lesson</th>
                                    <th></th>
                                    <th></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attens as $atten)
                                <tr>
                                    <td>{{ $atten->student_name }}</td>
                                    <td style="width: 60px;">{{ $atten->date_created }}</td>
                                    <td style="">{{ $atten->tutor_name }}</td>
                                    <td style="width: 40px;">{{ $atten->term }}</td>
                                    <td style="width: 40px;">{{ $atten->lesson }}</td>
                                    <td style="width: 20px;">
                                        @if ($atten->concept_name != '' or count($atten->learningPlans) != 0 )
                                            <a href="{{route('atten.show', ['atten' => $atten->id])}}" class="btn btn-sm btn-primary btn-block float-left mr-3">View</a>
                                        @else
                                            <a href="{{route('atten.show', ['atten' => $atten->id])}}" class="btn btn-sm btn-warning btn-block float-left mr-3">View</a>
                                        @endif
                                    </td>
                                    <td style="width: 20px;">
                                        <a class="btn btn-danger btn-sm btn-block" href="#" data-toggle="modal" data-target="#deleteModal{{$atten->id}}">Delete</a>
                                        <div class="modal fade" id="deleteModal{{$atten->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <form method="POST" action="{{route('atten.destroy',['atten' => $atten->id])}}">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-dialog modal-sm modal-dialog-centered">
                                                    <div class="modal-content red-danger border-red-danger">
                                                        <div class="modal-body border-danger text-white text-center">
                                                            <i class='bx bxs-error font-size-100 text-white'></i><br>
                                                            <span class="h2 text-white mb-2">Are you sure?</span><br>
                                                            you want to delete<br>this process cannot be reversed<br>
                                                            <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger mt-3">Yes, Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
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
    @endcan

    @if (Auth::user()->roles()->first()->description != "Super Admin")
    @can('attenForStudent')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="datatable" 
                        class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" 
                        style="border-collapse: collapse; border-spacing: 0px; width: 100%;" 
                        role="grid" 
                        aria-describedby="datatable-buttons_info">
                            <thead>
                                <tr role="row">
                                    <th>Student Name</th>
                                    <th>Date Created</th>
                                    <th>Tutor</th>
                                    <th>Term</th>
                                    <th>Lesson</th>
                                    <th></th>
                                    <th></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attenStudent as $atten)
                                <tr>
                                    <td>{{ $atten->student_name }}</td>
                                    <td style="width: 60px;">{{ $atten->date_created }}</td>
                                    <td style="">{{ $atten->tutor_name }}</td>
                                    <td style="width: 40px;">{{ $atten->term }}</td>
                                    <td style="width: 40px;">{{ $atten->lesson }}</td>
                                    <td style="width: 20px;">
                                        @if ($atten->concept_name != '' or count($atten->learningPlans) != 0 )
                                            <a href="{{route('atten.show', ['atten' => $atten->id])}}" class="btn btn-sm btn-primary btn-block float-left mr-3">View</a>
                                        @else
                                            <a href="{{route('atten.show', ['atten' => $atten->id])}}" class="btn btn-sm btn-warning btn-block float-left mr-3">View</a>
                                        @endif
                                    </td>
                                    <td style="width: 20px;">
                                        <a class="btn btn-danger btn-sm btn-block" href="#" data-toggle="modal" data-target="#deleteModal{{$atten->id}}">Delete</a>
                                        <div class="modal fade" id="deleteModal{{$atten->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <form method="POST" action="{{route('atten.destroy',['atten' => $atten->id])}}">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-dialog modal-sm modal-dialog-centered">
                                                    <div class="modal-content red-danger border-red-danger">
                                                        <div class="modal-body border-danger text-white text-center">
                                                            <i class='bx bxs-error font-size-100 text-white'></i><br>
                                                            <span class="h2 text-white mb-2">Are you sure?</span><br>
                                                            you want to delete<br>this process cannot be reversed<br>
                                                            <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger mt-3">Yes, Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
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
    @endcan
    @endif

    @if (Auth::user()->roles()->first()->description != "Super Admin")
    @can('attenForParent')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="datatable" 
                        class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" 
                        style="border-collapse: collapse; border-spacing: 0px; width: 100%;" 
                        role="grid" 
                        aria-describedby="datatable-buttons_info">
                            <thead>
                                <tr role="row">
                                    <th>Student Name</th>
                                    <th>Date Created</th>
                                    <th>Tutor</th>
                                    <th>Term</th>
                                    <th>Lesson</th>
                                    <th></th>
                                    <th></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attenStudent as $atten)
                                <tr>
                                    <td>{{ $atten->student_name }}</td>
                                    <td style="width: 60px;">{{ $atten->date_created }}</td>
                                    <td style="">{{ $atten->tutor_name }}</td>
                                    <td style="width: 40px;">{{ $atten->term }}</td>
                                    <td style="width: 40px;">{{ $atten->lesson }}</td>
                                    <td style="width: 20px;">
                                        @if ($atten->concept_name != '' or count($atten->learningPlans) != 0 )
                                            <a href="{{route('atten.show', ['atten' => $atten->id])}}" class="btn btn-sm btn-primary btn-block float-left mr-3">View</a>
                                        @else
                                            <a href="{{route('atten.show', ['atten' => $atten->id])}}" class="btn btn-sm btn-warning btn-block float-left mr-3">View</a>
                                        @endif
                                    </td>
                                    <td style="width: 20px;">
                                        <a class="btn btn-danger btn-sm btn-block" href="#" data-toggle="modal" data-target="#deleteModal{{$atten->id}}">Delete</a>
                                        <div class="modal fade" id="deleteModal{{$atten->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <form method="POST" action="{{route('atten.destroy',['atten' => $atten->id])}}">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-dialog modal-sm modal-dialog-centered">
                                                    <div class="modal-content red-danger border-red-danger">
                                                        <div class="modal-body border-danger text-white text-center">
                                                            <i class='bx bxs-error font-size-100 text-white'></i><br>
                                                            <span class="h2 text-white mb-2">Are you sure?</span><br>
                                                            you want to delete<br>this process cannot be reversed<br>
                                                            <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger mt-3">Yes, Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
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
    @endcan
    @endif


    @include('atten.attenModal')


  

@endsection

@section('script')

<!-- Required datatable js -->
    <script src="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/bootstrap-touchspin/bootstrap-touchspin.min.js')}}"></script>

<!-- Datatable init js -->
    {{-- <script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script> --}}
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

    @if($errors->any())
    <script>
        $('#attenModal').modal('show');
    </script>
    @endif

        {{-- Definicion de la tabla y las caracteristica que posee, con busquedas y visualizacion --}}
        <script>
            $(document).ready(function() {
                $('#datatable').DataTable({
                    "columnDefs": [{ 
                        'targets':[5],
                        "searchable": false 
                    }]
                });
            });
        </script>
   
@endsection