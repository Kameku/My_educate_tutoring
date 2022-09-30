@extends('layouts.master')

@section('title') Attendance @endsection
@section('css')

<!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('libs/summernote/summernote.min.css') }}">
    <link href="{{ URL::asset('/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('libs/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('frontEnrolment/select2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('frontEnrolment/theme.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/educate.css') }}">

    


@endsection
@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Attendance - {{ $atten->student_name }} @endslot
        @slot('title_li') Welcome to {{ Auth::user()->name }} @endslot


    @endcomponent
    <!-- boton que envia a la vista de lista -->
    <div class="row">
        <div class="col-auto mr-auto"></div>
        <div class="col-auto">
            @can('AttendanceHistory')
            <a href="{{ route('atten.history',['atten' => $atten->id]) }}" class="badge badge-warning mb-2 p-2 text-white">Attendance History</a>
            <a href="{{ route('atten.pdf',['atten' => $atten->id]) }}" class="badge badge-info mb-2 p-2 text-white">Download History</a>
            @endcan
            <a href="{{ route('atten.index') }}" class="badge badge-secondary mb-2 p-2">Go Back</a>
        </div>
    </div>
    


    <div class="row">
        <div class="col-12">
            
            <div class="">
                <div class="card-body">

                {{-- fragmento que permite visualizar los errores que devuelve el backend --}}
                    @if ($errors->count()>0)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif
                {{-- Fin del fragmento errores--}}
            
                    <div class="tab-pane active" id="attendance" role="tabpanel">
                        @include('atten.studentAttendance')
                        {{-- <div class="row">
                            <div class="col-6">
                            </div>
                        </div> --}}
                        @include('atten.notesAttendance')
                        @include('atten.learningPlans')

                        @if ($addLearningPlans)
                            @include('atten.addLearningPlansCard')
                        @endif
                        
                        @can('CreateHomeworkAttendance')
                        <a data-toggle="modal" data-target="#homeworkModal" class="btn btn-secondary btn-block btn-lg text-white">Create Homework</a>
                        @endcan
                    
                        @can('AttendanceCommentsParent')
                            @include('atten.comments')
                        @endcan
                        
                        @can('AttendanceCommentsTutoring')
                            @include('atten.attenCommentPrivate') 
                        @endcan
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
   
    @include('atten.learningPlanModal')
    @include('atten.updateStudentAttendance')
    {{-- @include('atten.formlist') --}}
    @include('atten.commentsModal')
    @include('atten.attenCommentPrivateModal')
    @include('atten.pdfModal')
    @include('atten.homeworkModal')
    @include('atten.addLearningPlans')

    

@endsection


@section('script')




    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>

    <!-- Required datatable js -->
    <script src="{{ URL::asset('/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('/libs/summernote/summernote.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('/js/pages/datatables.init.js') }}"></script>
    <script src="{{ URL::asset('/js/pages/form-editor.init.js') }}"></script>

    <script src="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('js/pages/form-advanced.init.js') }}"></script>
    <!-- script de funcionamiento de los select -->
    <script src="{{ URL::asset('js/enrolment2/jquery-migrate.min.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/hs-toggle-state.min.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/hs-file-attach.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/jquery.mask.min.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/toastr.min.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/hs.core.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/hs.validation.js') }}"></script>
    <script src="{{ URL::asset('js/enrolment2/hs.select2.js') }}"></script>


    <script>
        for (var item = 1; item <= 14; item++) {
            var statusEnrolmentProcess = document.getElementById('statusEnrolmentProcess-' + item).innerText;
            if (statusEnrolmentProcess == 'Complete') {
                var itemEnrolmentProcess = document.getElementById('itemEnrolmentProcess-' + item);
                itemEnrolmentProcess.classList.add('enrolmentProcess-mark');
            };
        }

        var atachE1 = document.getElementById('e1').firstElementChild.innerText;

        if (atachE1 === "Not available") {

        } else {
            var atachment = document.getElementById('e1');
            atachment.classList.remove('hideAtach');

        }
        var atachE2 = document.getElementById('e2').firstElementChild.innerText;

        if (atachE2 === "Not available") {

        } else {
            var atachment = document.getElementById('e2');
            atachment.classList.remove('hideAtach');

        }
        var atachE3 = document.getElementById('e3').firstElementChild.innerText;

        if (atachE3 === "Not available") {

        } else {
            var atachment = document.getElementById('e3');
            atachment.classList.remove('hideAtach');

        }

    </script>

    <script>
        $(document).on('ready', function() {
            // initialization of select2
            $('.js-custom-select').each(function() {
                var select2 = $.HSCore.components.HSSelect2.init($(this));
            });

            // initialization of custom file
            $('.js-file-attach').each(function() {
                var customFile = new HSFileAttach($(this)).init();
            });
        });

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
        @if ( $errors->first()  === 'The delivery field is required.' OR $errors->first()  === 'The observations field is required.' )
            <script>
                $('#homeworkModal').modal('show');
            </script>
        @endif
    @endif
           



@endsection
