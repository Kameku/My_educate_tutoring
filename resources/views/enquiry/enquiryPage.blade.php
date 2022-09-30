@extends('layouts.master')

@section('title') Dashboard @endsection
@section('css')

<!-- DataTables -->
<link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="{{asset('libs/toastr/css/main.css')}}">

@endsection
@section('content')

@component('common-components.breadcrumb')
@slot('title') Enquiry - Request From Website @endslot
@slot('title_li') Welcome to {{ Auth::user()->name }} @endslot

@endcomponent

<div class="col-12">
    <a href="#" class="btn btn-danger mb-2" id="deleteAll">Delete Selected</a>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable-buttons_info">
                        <thead>
                            <tr role="row">
                                <th><input type="checkbox" id="checkAll" value=""></th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Created</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $enquiryPage as $enquiry )
                            <tr role="row" class="odd" id="sid{{$enquiry->id}}">
                                <td><input type="checkbox" class="checkBoxClass" name="ids" value="{{ $enquiry->id }}"></td>
                                <td>{{ $enquiry->name}}</td>
                                <td>{{ $enquiry->email}}</td>
                                <td>{{ $enquiry->message}}</td>
                                <td>{{ $enquiry->created_at}}</td>
                                @if ($enquiry->status == 'Not reviewed')
                                <td><a href="{{route('enquiry.pageStatus',['enquiry' => $enquiry->id])}}" class="badge bg-danger text-white py-2 px-3" >{{ $enquiry->status}}</a></td> 
                                @else
                                <td><span class="badge bg-success text-white py-2 px-3">{{ $enquiry->status}}</span></td> 
                                @endif
                                <td style="width: 10px">
                                    <a class="btn btn-sm btn-danger btn-block" href="#" data-toggle="modal" data-target="#deleteModal{{$enquiry -> id}}">Delete</a>
                                    <div class="modal fade" id="deleteModal{{$enquiry -> id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <form method="POST" action="{{route('enquiry.pageDelete',['enquiry' => $enquiry->id])}}">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                                <div class="modal-content red-danger border-red-danger">
                                                    <div class="modal-body border-danger text-white text-center">
                                                        <i class='bx bxs-error font-size-100 text-white'></i><br>
                                                        <span class="h2 text-white mb-2">Are you sure?</span><br>
                                                        you want to delete {{ $enquiry -> name}} <br>this process cannot be reversed<br>
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

@endsection



@section('script')
<!-- plugin js -->
{{-- <script src="{{ URL::asset('libs/apexcharts/apexcharts.min.js')}}"></script> --}}

<!-- jquery.vectormap map -->
{{-- <script src="{{ URL::asset('libs/jquery-vectormap/jquery-vectormap.min.js')}}"></script> --}}

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

<script>
    $(function(e){
        $('#checkAll').click(function(){
            $('.checkBoxClass').prop('checked', $(this).prop('checked'));
        });

        $('#deleteAll').click(function(e){
        e.preventDefault();
        var allids = [];

        $('input:checkbox[name=ids]:checked').each(function(){
            allids.push($(this).val());
        });

        $.ajax({
            url:"{{ route('enquiry.pageCheckDeleted') }}",
            type:"DELETE",
            data:{
                _token:$("input[name=_token]").val(),
                ids:allids
            },
            success:function(response){
                $.each(allids,function(key, val){
                    $("#sid"+val).remove();
                })
            }
            });
        })
    });

    

</script>


@endsection