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
        @slot('title') History - Attendance & Learning Plans @endslot
        @slot('title_li') Welcome to {{ Auth::user()->name }} @endslot
    @endcomponent

    <a href="{{ route('atten.index') }}" class="badge badge-secondary mb-2 p-2">Go Back</a>

    @foreach ($attendanceHistory as $attendance)
        
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-dark">  
                    <span class="text-white font-size-15">{{ $attendance->date_created }}</span>
                </div>
                <div class="card-body">
                    <ul>
                        {{-- <li>id: {{ $attendance->id }}</li> --}}
                        <li>Student Name: <span class="text-primary">{{ $attendance->student_name }}</span></li>
                        <li>Date Created: <span class="text-primary">{{ $attendance->date_created }}</span></li>
                        <li>Time : <span class="text-primary">{{ $attendance->time }}</span></li>
                        <li>Term: <span class="text-primary">{{ $attendance->term }}</span></li>
                        <li>Lesson: <span class="text-primary">{{ $attendance->lesson }}</span></li>
                        <li>Tutor Name: <span class="text-primary">{{ $attendance->tutor_name }}</span></li>
                        <li>Tutor Evaluation: <span class="text-primary">{{ $attendance->tutor_evaluation }}</span></li>
                        <li>Student Self: <span class="text-primary">{{ $attendance->student_self }}</span></li>
                        <li>Student Attendance: <span class="text-primary">{{ $attendance->student_attendance }}</span></li>
                        <li>Homework Completed: <span class="text-primary">{{ $attendance->homework_completed }}</span></li>
                        <li>Weekly Lesson: <span class="text-primary">{{ $attendance->weekly_lesson }}</span></li>
                        <li>Homework Assignment: <span class="text-primary">{{ $attendance->homework_assignment }}</span></li>
                        <li>Email School: <span class="text-primary">{{ $attendance->email_school }}</span></li>
                        <li>Comment: <span class="text-primary">{!! $attendance->comment !!}</span></li>
                        <li>Comment Private: <span class="text-primary">{!! $attendance->commentPrivate !!}</span></li>
                    </ul>
                    <span>Learning Plans </span>
                    <br>
                    <br>
                    <ul>
                        <li>Subject: <span class="text-primary">{{ $attendance->subject_name }}</span></li>
                        <li>Concept: <span class="text-primary">{{ $attendance->concept_name }}</span></li>
                        <li>Concept Detail: <span class="text-primary">{{ $attendance->conceptDetail }}</span></li>
                        <li>Learning Activity: <span class="text-primary">{{ $attendance->learningActivity }}</span></li>
                    </ul>
                    <br>
                    @foreach ($attendance->learningPlans as $learning)
                    <ul>
                        <li>Subject: <span class="text-primary">{{ $learning->subject_name }}</span></li>
                        <li>Concept: <span class="text-primary">{{ $learning->concept_name }}</span></li>
                        <li>Concept Detail: <span class="text-primary">{{ $learning->conceptDetail }}</span></li>
                        <li>Learning Activity: <span class="text-primary">{{ $learning->learningActivity }}</span></li>
                    </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <a href="{{ route('atten.index') }}" class="badge badge-secondary mb-2 p-2">Go Back</a>


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


   
@endsection