@extends('layouts.master')

@section('title') Noticeboard @endsection
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
@slot('title') Noticeboard @endslot
@slot('title_li') Welcome to {{ Auth::user()->name }} @endslot

@endcomponent

<div class="row" id="cerrar">
    <div class="col-12">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="mdi mdi-alert-outline mr-2"></i> The size of the upload pictures needs to be below 1280x500px!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="cerrar()">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    </div>
</div>
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
@if ($news->count())
    <div class="row mb-3">
        <div class="col-auto mr-auto">
        
        </div>
        <div class="col-auto">
            <button class="btn btn-primary px-8" data-toggle="modal" data-target="#createNotice">Create Advertisement</button>
        </div>
    </div>
    
@endif

<div class="row">
    <div class="col-12">
    {{-- slider --}}
        <div class="card card-fluid">
    <div class="card-header bg-primary text-white rounded-top" >
        <span>Noticeboard</span>
    </div>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" data-interval="7000">
            <div class="carousel-inner" role="listbox">
                @foreach ($news as $new)
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="{{Storage::url($new->image)}}" >
                    </div>
                @endforeach
                <div class="carousel-item active">
                    <img class="d-block img-fluid" src="{{ asset('/images/noticeboard/welcome.jpg') }}" >
                </div>
                <a class="carousel-control-prev" href="#carouselExampleSlidesOnly" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleSlidesOnly" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>
        </div> 
    </div>
    {{-- end slider  --}}
    </div>
</div>
@if ($news->count())
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    List News
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-nowrap table-centered mb-0">
                            <tbody class="border-none">
                                @foreach ($news as $new)
                                <tr>
                                    <td style="width: 70px;">
                                        <img src="{{ Storage::url($new->image)}}" width="140px" alt="">
                                    </td>
                                    <td>
                                        {{-- <h5 class="font-size-14 m-0 float-left">{{$new->image}}</h5> --}}
                                        <a href="{{Storage::url($new->image)}}" class="m-0" style="font-size: 12px; font-weight: lighter;" target="_blank">{{$new->image}}</a>
                                    </td>
                                    <td style="width: 70px;">
                                        <span class="badge badge-soft-primary capita px-2 py-1">{{$new->creator}}</span>
                                    </td>
                                    <td style="width: 70px;">
                                        @if ( $new->studen_notice == 'Yes')
                                            <span class="badge badge-soft-info capita px-2 py-1">Student</span>
                                        @else
                                            <span class="badge badge-soft-primary capita px-2 py-1">Employees</span>
                                        @endif
                                    </td>
                                    <td style="width: 70px;">
                                        <form action="{{route('notice.destroy', $new)}}" method="POST">
                                            @method('DELETE') 
                                            @csrf 
                                            <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                        </form>
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
@else
    <div class="row mb-3">
        <div class="col-auto mr-auto">
        
        </div>
        <div class="col-auto">
            <button class="btn btn-primary px-8" data-toggle="modal" data-target="#createNotice">Create Advertisement</button>
        </div>
    </div>
@endif

@include('notice.modalCreate')
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
        $('#createNotice').modal('show');
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
  
   
@endsection