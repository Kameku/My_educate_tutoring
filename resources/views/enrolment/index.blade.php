@extends('layouts.master')

@section('title') Dashboard @endsection
@section('css')

<!-- DataTables -->
<link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{asset('libs/toastr/css/main.css')}}">

@endsection
@section('content')

@component('common-components.breadcrumb')
@slot('title') Enrolment - Students List @endslot
@slot('title_li') Welcome to {{ Auth::user()->name }} @endslot

@endcomponent

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <table id="datatable-buttons" 
                    class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" 
                    style="border-collapse: collapse; border-spacing: 0px; width: 100%;" 
                    role="grid" 
                    aria-describedby="datatable-buttons_info">
                        <thead>
                            <tr role="row">
                                <th>Student Name</th>
                                <th>Parent Name</th>
                                <th>Parent Email</th>
                                <th>Enrolment Process</th>
                                <th>Parent Mobile</th>
                                <th>Creation Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $enrolments as $enrolment )
                            <tr role="row" class="odd">
                                <td><a href="{{route('enrolment.show',['enrolment' => $enrolment->id])}}" data-toggle="tooltip" data-original-title="Show Enrolment Process">{{ $enrolment->first_name.' '.$enrolment->last_name }}</a></td>
                                <td>{{ $enrolment->parent_name}}</td>
                                <td>{{ $enrolment->parent_email}}</td>
                                <td>
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-auto">
                                          <span class="mr-2">
                                            {{ $enrolment->enquiry->enrolment_process.'%' }}
                                          </span>
                                        </div>
                                        <div class="col">
                                            @if ($enrolment->enquiry->enrolment_process < 60)
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width:{{$enrolment->enquiry->enrolment_process}}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            @elseif ($enrolment->enquiry->enrolment_process > 60 && $enrolment->enquiry->enrolment_process < 100 )
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width:{{$enrolment->enquiry->enrolment_process}}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            @else
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width:{{$enrolment->enquiry->enrolment_process}}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            @endif
                                        </div>  
                                    </div>   
                                </td>
                                <td>{{ $enrolment->parent_mobile}}</td>
                                
                                
                                <td>{{ $enrolment->created_at}}</td>
                                <td>{{ $enrolment->status }}</td>
                                <td>
                                    @if ($enrolment->enquiry->enrolment_process >= 100  &&  $enrolment->status === 'Inactive')
                                        @include('enrolment.activateStudet')
                                    @else
                                        <span class="btn btn-sm btn-block btn-secondary pe-none">Activate Student</span>
                                        {{-- @include('enrolment.activateStudet') --}}
                                    @endif
                                    <br>
                                </td>
                                <td>
                                    <form action="{{ route('enrolment.delete',['enrolment' => $enrolment->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-block btn-primary">Delete</button>
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

@endsection



@section('script')

<!-- Calendar init -->
<script src="{{ URL::asset('js/pages/dashboard.init.js')}}"></script>

<!-- Required datatable js -->
<script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
<script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>

<!-- Datatable init js -->
{{-- <script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script> --}}
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