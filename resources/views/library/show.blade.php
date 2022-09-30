@extends('layouts.master')

@section('title') Library @endsection
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
        @slot('title') Library @endslot
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

    <div class="row">
        <div class="col-auto ml-auto"></div>
        <div class="col-auto">
            <a href="{{ route('library.index') }}" class="badge badge-secondary mb-2 p-2">Go Back</a>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-auto mr-auto"></div>
        <div class="col-auto">
            <button class="btn btn-primary px-8" data-toggle="modal" data-target="#createConcept">Create Concept</button>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12">
            <span class="alert alert-primary">{{$subject->name_sub}}</span>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white font-size-18" style="text-transform:uppercase;">
                    Concept list
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="datatable" 
                            class="table table-striped table-bordered dt-responsive dataTable no-footer dtr-inline" 
                            style="border-collapse: collapse; border-spacing: 0px; width: 100%;" 
                            role="grid" 
                            aria-describedby="datatable-buttons_info">
                                <thead>
                                    <tr role="row">
                                        <th>Concepts Name</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($concepts as $concept)
                                    <tr>
                                        <td>
                                            <span class="text-dark" style="text-transform:uppercase;">{{$concept->concept_name}}</span>
                                        </td>
                                        <td style="width: 50px">
                                            <a href="{{route('concept.show', ['concept' => $concept->id])}}" class="btn btn-sm btn-info btn-block">View</a>
                                        </td>
                                        <td style="width: 50px">
                                            <a class="btn btn-primary btn-sm text-white btn-block" data-toggle="modal" data-target="#ConceptEdit{{$concept->id}}">Edit</a> 
                                            @include('library.conceptEditModal') 
                                        </td>
                                        <td style="width: 50px">
                                            
                                            @if (count($concept->conceptsDetails) > 0)
                                                    <span class="btn btn-sm btn-secondary btn-block" disabled>Delete</span>
                                                @else
                                                    <form action="{{route('concept.destroy', ['concept' => $concept->id])}}" method="POST">
                                                        @method('DELETE') 
                                                        @csrf 
                                                        <button class="btn btn-sm btn-danger btn-block" type="submit">Delete</button>
                                                    </form>
                                                @endif
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
    </div>
    

    @include('library.subjectModal')
    @include('library.conceptModal')

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

<script>
    function cerrar() {
    var x = document.getElementById("cerrar");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>

@if($errors->any())
    <script>
        $('#createConcept').modal('show');
    </script>
@endif


<script>
    $(document).ready(function() {
    $('#datatable').DataTable();

    //Buttons examples
    // var table = $('#datatable-buttons').DataTable({
    //     lengthChange: true,
    //     buttons: ['excel', 'pdf', 'colvis']
    // });

    // table.buttons().container()
    //     .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
} );
</script>
  
  
   
@endsection