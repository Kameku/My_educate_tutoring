@extends('layouts.master')

@section('title') Dashboard @endsection
@section('css')

<!-- DataTables -->
<link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{asset('libs/toastr/css/main.css')}}">

@endsection
@section('content')

@component('common-components.breadcrumb')
@slot('title')Students List @endslot
@slot('title_li') Welcome to {{ Auth::user()->name }} @endslot

@endcomponent

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <table id="datatable-buttons" 
                    class="table table-striped table-bordered dt-responsive dataTable no-footer dtr-inline" 
                    style="border-collapse: collapse; border-spacing: 0px; width: 100%;" 
                    role="grid" 
                    aria-describedby="datatable-buttons_info">
                        <thead>
                            <tr role="row">
                                <th>Autentication</th>
                                <th>Student Name</th>
                                <th>Parent Name</th>
                                <th>Parent Email</th>
                                <th>Activation Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $students as $student )
                            <tr role="row" class="odd">
                                <td>{{$student->user->code_id}}</td>
                                <td>{{$student->enrolment->first_name.' '.$student->enrolment->last_name }}</td>
                                <td>{{$student->enrolment->parent_name}}</td>
                                <td>{{$student->enrolment->parent_email}}</td>
                                <td>{{$student->created_at->format('Y-m-d')}}</td>
                                <td>{{$student->enrolment->status}}</td>
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
<!-- plugin js -->
<script src="{{ URL::asset('libs/apexcharts/apexcharts.min.js')}}"></script>

<!-- jquery.vectormap map -->
<script src="{{ URL::asset('libs/jquery-vectormap/jquery-vectormap.min.js')}}"></script>

<!-- Calendar init -->
<script src="{{ URL::asset('js/pages/dashboard.init.js')}}"></script>

<!-- Required datatable js -->
<script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
<script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>

<!-- Datatable init js -->
<script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>
<script src="{{ URL::asset('js/enrolment2/toastr.min.js')}}"></script>



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
        $(document).ready(function() {
        $('#datatable').DataTable();
    
        //Buttons examples
        var table = $('#datatable-buttons').DataTable({
            lengthChange: true,
            buttons: ['excel', 'pdf', 'colvis']
        });
    
        table.buttons().container()
            .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    } );
    </script>


@endsection