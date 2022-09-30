
  document.addEventListener('DOMContentLoaded', function() {

    //recolectar datos del formulario de creacion
    let formCreateEvent = document.querySelector('#formCreateEventSimple');
    let formCreateEventRecurren = document.querySelector('#formCreateEventRecurren');

    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives', //Elimina el mensaje de licencia
      initialView: 'dayGridMonth',
      themeSystem: 'bootstrap',
      timeZone: 'local',

      customButtons: {
        scheduleLesson: {
          text: 'Schedule Lesson',
          click: function() {
            formCreateEventRecurren.reset();
            $('#createEventRecurrenModal').modal('show');
          }
        },
        createEvent: {
          text: 'Create Event',
          click: function() {
            formCreateEvent.reset();
            $('#createEventModal').modal('show');
          }
        }
      },

      headerToolbar:{
        left:'scheduleLesson createEvent',
        center: 'title',
        right:'today dayGridMonth,timeGridWeek,listWeek prev,next'
      },

      // hiddenDays: [0], 

      dayMaxEventRows: true, // for all non-TimeGrid views
      views: {
        timeGrid: {
          dayMaxEventRows: 6 // adjust to 6 only for timeGridWeek/timeGridDay
        }
      },

      // events: [
      //   {
      //     title: 'Event1',
      //     start: '2021-09-03'
      //   },
      //   {
      //     title: 'Event2',
      //     start: '2021-09-04',
      //     color: '#8fce00',
          
      //   },
        
        
      // ],

      eventSources:{
        url: eventsURL+'/events.show',
        method:'POST',
        extraParams:{
          _token: formCreateEvent._token.value,
        },
        
        
      },
      eventDisplay:'block',

      
      // dateClick:function(info){
      //   formCreateEvent.reset();
      //   $('#createEventModal').modal('show');
      // },
      eventClick:function(info){
        var eventCal = info.event;
        console.log(eventCal);

          axios.post(eventsURL+"/events.edit/"+info.event.id).
        then(
          (respo) => {
            console.log(respo);
            if(respo.data[11] === 'notRecurrent' ){
              formCreateEvent.title.value = respo.data[0];
              formCreateEvent.description.value = respo.data[1];
              formCreateEvent.typeEvent.value = respo.data[2];
              formCreateEvent.color.value = respo.data[3];
              formCreateEvent.state.value = respo.data[4];
              formCreateEvent.start.value = respo.data[5];
              // formCreateEvent.end.value = respo.data[6];
              formCreateEvent.startTime.value = respo.data[6];  
              // formCreateEvent.endTime.value = respo.data[8];
              formCreateEvent.employee.value = respo.data[7];
              // formCreateEvent.tutor.value = respo.data[8];
              formCreateEvent.student.value = respo.data[8];
              formCreateEvent.room.value = respo.data[9];
              formCreateEvent.id.value = respo.data[10];

              $("#createEventModal").modal("show");

            }
            else{

              formCreateEventRecurren.id.value = respo.data.id;
              formCreateEventRecurren.typeEvent.value = respo.data.typeEvent;
              formCreateEventRecurren.color.value = respo.data.color;
              formCreateEventRecurren.state.value = respo.data.state;
              formCreateEventRecurren.startRecur.value = respo.data.startRecur;
              formCreateEventRecurren.endRecur.value = respo.data.endRecur;
              formCreateEventRecurren.startTime.value = respo.data.startTime;
              formCreateEventRecurren.endTime.value = respo.data.endTime;
              formCreateEventRecurren.employee.value = respo.data.employee;
              formCreateEventRecurren.tutor.value = respo.data.tutor;
              formCreateEventRecurren.student.value = respo.data.student;
              formCreateEventRecurren.room.value = respo.data.room;
              formCreateEventRecurren.subject.value = respo.data.subject;
              formCreateEventRecurren.daysOfWeek.options = respo.data.daysOfWeek;

              // console.log(respo.data.daysOfWeek);


              $("#createEventRecurrenModal").modal("show");

            }
            
          }
          ).catch(
            error => {
              if(error.response){
                console.log(error.response.data);
                // var title = document.getElementById("error_title");
                // title.innerHTML = error.response.data.title[0];
                // title.classList.remove("d-none");
              }
            }
          )
          
        
        
        }


    });


    calendar.render();

    // Formulario de creacion de eventos recurrentes
    document.getElementById('btn_save_recurence').addEventListener('click', function(){
        sendDataFormRecur('/events.add');
    });
    document.getElementById('btn_delete_recurence').addEventListener('click', function(){
        sendDataFormRecur("/events.delete/"+formCreateEventRecurren.id.value);
        formCreateEventRecurren.reset();
    });



    // Formulario de creacion de eventos simple
    document.getElementById('btn_save').addEventListener('click', function(){
      sendDataForm("/events.add");
    });

    document.getElementById('btn_update').addEventListener('click', function(){
      sendDataForm("/events.update/"+formCreateEvent.id.value);
    });

    document.getElementById('btn_delete').addEventListener('click', function(){
      sendDataForm("/events.delete/"+formCreateEvent.id.value);
      
    });




    function sendDataForm(url){
      const dataCreateEvent = new FormData(formCreateEvent);

      const endURL  = eventsURL+url;

      axios.post( endURL , dataCreateEvent).
      then(
        (respo) => {
          calendar.refetchEvents();
          $("#createEventModal").modal("hide");
        }
        ).catch(error => {if(error.response){
          console.log(error.response.data);
          alert('All fields are required');
        }})
    }



    function sendDataFormRecur(url){

      const endURL  = eventsURL+url;

      const dataCreateEventRecurren = new FormData(formCreateEventRecurren);

      axios.post( endURL , dataCreateEventRecurren).
      then(
        (respo) => {
          calendar.refetchEvents();
          $("#createEventRecurrenModal").modal("hide");
        }
        ).catch(error => {if(error.response){
          console.log(error.response.data);
          alert('All fields are required');
        }})
    }
    

  });
