@extends('layouts.master-without-nav')

@section('title') Welcome @endsection

@section('css')

  <link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('libs/select2/select2.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{URL::asset('frontEnrolment/select2.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::asset('frontEnrolment/theme.css')}}">
  <link rel="stylesheet" href="{{asset('libs/toastr/css/main.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/educate.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('libs/dropzone/dropzone.min.css') }}">

  <link href='{{ asset('fullcalendar/main.css')}}' rel='stylesheet' />
  <script src='{{ asset('fullcalendar/main.js')}}'></script>

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  <script>
    var eventsURL = {!! json_encode(url('/'))!!}
  </script>

<style>
  .fc-event,
  .fc-event-dot {
      background-color: #1665c585 !important;
      color: #070066 !important;
      border-radius: 5px !important;
      
  }

  .fc-day-today{
      background-color: #1665c537 !important;
      padding: 6px !important;
  }

  .fc-scroller-harness {
      background-color: #d5d9eb2d !important;

  }
 
  .fc-col-header-cell .fc-day .fc-day-sun {
      background-color: #ff0000 !important;
  }


  .fc-today {
    background: #000000 !important;
  }

  .fc-event-title{
    color:#fff !important;
    font-weight: normal !important;
  }

  .fc-past {
      background-color: #fff9f9 !important;
  }

  .fc-future {
      background-color: #f3f9ff !important;
  }

  .fc th.fc-widget-header {
      background-color: #081d35 !important;
      color: #f5ecec !important;
  }

  a.fc-more {
      font-weight: 900 !important;
      color: #032a25 !important;

  }

  .fc-day-number {
      color: #0d0522 !important;
      font-size: 13px;
      font-weight: 600;

  }

  .fc-day-top {
      background-color: #012def2d !important;
  }

  /* .fc .fc-row {
          border-color: #1d3552b7 !important;
      } */

</style>




@endsection


@section('body')

<body>
    @if (session()->has('success'))
    <div class="row mt-3 ml-2" >
        <div class="col-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="mdi mdi-check-all mr-2"></i> {{ session()->get('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        </div>
    </div>
    @endif

    @section('content')
    <section class="my-5 pt-sm-5">
        <div class="container">
            <div class="row">
                <div class="col-12 ">
                    <img src="https://myeducatetutoring.com/images/educate.png" class="mx-auto d-block" alt="" width="180">
                </div>
            </div>

            <div class="row mt-4 pt-4">
                <div class="col-1"></div>
                <div class="col-10">
                    <h3 class="py-2 text-primary text-center rounded font-size-25">Thank you for submitting your enrolment details.</h3>
                </div>
                <div class="col-1"></div>
            </div>

            <div class="card">
                <div class="card-header bg-primary">
                    <span class="text-white">Preferred Availabilities</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('events.tutor') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-4"> 
                                <div class="form-group">
                                <label for="">Subject</label>
                                <input type="text" name="subject" id="subject" class="form-control " placeholder="" readonly aria-describedby="helpId" value="{{ $subject }}">
                                {{-- <small id="helpId" class="text-muted">Subject</small> --}}
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                <label for="">Tutor</label>
                                <select class="form-control js-custom-select " name="tutor" id="tutor">
                                    <option value="2">Any</option>
                                    @foreach ($tutors as $tutor)
                                        <option class="" value="{{ $tutor->id }}">{{ $tutor->first_name }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <button class="btn btn-success btn-block font-size-18 ">Schedule Class</button>
                            </div>
                            <div class="col-4">
                                <a href="{{ route('welcome.thanks') }}" class="btn btn-warning btn-block font-size-18 ">Submit and Continue Later</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            

            {{-- <div class="row">
                <div class="col-12 text-center">
                    <div class="home-wrapper">
                        <h5>
                            {{ $subject }}
                        </h5>
                        <div class="card p-3">
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
    @endsection


@section('script')

{{-- <script src="{{ asset('js/calendar-enrolment.js') }}"></script>  --}}
  <!-- validacion de formularios -->
<script src="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ URL::asset('libs/select2/select2.min.js')}}"></script>
<script src="{{ URL::asset('js/pages/form-validation.init.js')}}"></script>
<script src="{{ URL::asset('js/pages/form-advanced.init.js')}}"></script>
<!-- script de funcionamiento de los select -->
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

<script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>
<script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
<script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>

<script>
  $(document).on('ready', function() {
      // initialization of select2
      $('.js-custom-select').each(function() {
          var select2 = $.HSCore.components.HSSelect2.init($(this));
      });
  });

  $('.date_custom').datepicker({
    todayBtn: "linked",
    todayHighlight : true,
    orientation: "left",
    autoclose: true
  });
</script>

{{-- <script>

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {

        schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives', //Elimina el mensaje de licencia
        initialView: 'dayGridMonth',
        themeSystem: 'bootstrap',
        timeZone: 'local',

        events: {{ $evenTutor }},

        // eventSources:{
        //     url: eventsURL+'/events.tutor',
        //     method:'POST',
        //     extraParams:{
        //       _token: formCreateEvent._token.value,
        //     },
        // }    
    });

    
    calendar.render();
});

</script> --}}






@endsection