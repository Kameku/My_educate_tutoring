
document.addEventListener('DOMContentLoaded', function() {

    let formCreateEvent = document.querySelector('#formCreateEventEnrolment');

    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {

        schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives', //Elimina el mensaje de licencia
        initialView: 'dayGridMonth',
        themeSystem: 'bootstrap',
        timeZone: 'local',

        events: @JSON($evenTutor),

        // eventSources:{
        //     url: eventsURL+'/events.tutor',
        //     method:'POST',
        //     extraParams:{
        //       _token: formCreateEvent._token.value,
        //     },
        // },

        headerToolbar:{
            left:'today',
            center: 'title',
            right:'prev,next'
        },
        
        dayMaxEventRows: true, // for all non-TimeGrid views
        views: {
            timeGrid: {
            dayMaxEventRows: 6 // adjust to 6 only for timeGridWeek/timeGridDay
            }
        },

        dateClick:function(info){
            formCreateEvent.reset();
            $('#createEventModalEnrolment').modal('show');
          },


    });

    
    calendar.render();

    document.getElementById('btn_save').addEventListener('click', function(){
        sendDataForm("/events.add");
      });

    
    function sendDataForm(url){
        const dataCreateEvent = new FormData(formCreateEvent);
  
        const endURL  = 'http://edu.test'+url;
  
        axios.post( endURL , dataCreateEvent).
        then(
          (respo) => {
            calendar.refetchEvents();
            $("#createEventModalEnrolment").modal("hide");
          }
          ).catch(error => {if(error.response){console.log(error.response.data);}})
      }


});