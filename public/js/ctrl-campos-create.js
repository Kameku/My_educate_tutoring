
        
        $(document).on('ready', function() {
        // initialization of select2
        $('.js-custom-select').each(function() {
            var select2 = $.HSCore.components.HSSelect2.init($(this));
        });
         // initialization of nice
        $('select').niceSelect();   
          
        $('.nameTypeEvent').show(); 
        $('.recurrence').show();
        $('.daysOfWeek').show();
        $('.startRecur').show(); 
        $('.endRecur').show();    
        $('.startTime').show();    
        $('.endTime').show();    
        $('.start').show();    
        $('.end').show();    
        $('.title').show(); 
        $('.txtState').show(); 
        $('.color').show(); 
        $('.descripcion').show(); 
        $('.nameRoom').show(); 
        $('.nameTutor').show(); 
        $('.nameStudent').show(); 

        $('.selectType').on('change', function() {
                    var selectValor = $(this).val();
                    if (selectValor == 'Admin' || selectValor == 'Humans Resources') {
                        
                        $('.nameTutor').hide();
                        $('.nameStudent').hide();

                    } else if (selectValor == 'Class') {
                        
                        $('.nameTutor').show();
                        $('.nameStudent').show();
                        
                    } else if(selectValor == " ") {
                        
                        $('.nameTutor').show();
                        $('.nameStudent').show();
                    }
                }); 


                $('.selectRecurrecie').on('change', function() {
                    var selectValor = $(this).val();
                    if (selectValor == 'Yes') {
                        
                        $('.daysOfWeek').show();
                        $('.startRecur').show(); 
                        $('.endRecur').show();    
                        $('.startTime').show();    
                        $('.endTime').show();

                        $('#start').val("");
                        $('#end').val("");

                        $('.start').hide();    
                        $('.end').hide(); 

                    } else if (selectValor == 'No') {

                        $('daysOfWeek').val("[]");
                        $('#startRecur').val(""); 
                        $('#endRecur').val("");    
                        $('#startTime').val("");    
                        $('#endTime').val("");
                        
                        $('.daysOfWeek').hide();
                        $('.startRecur').hide(); 
                        $('.endRecur').hide();    
                        $('.startTime').hide();    
                        $('.endTime').hide();

                        $('.start').show();    
                        $('.end').show(); 
                    } else if(selectValor == " ") {
                        
                        $('.daysOfWeek').show();
                        $('.startRecur').show(); 
                        $('.endRecur').show();    
                        $('.startTime').show();    
                        $('.endTime').show();    
                        $('.start').show();    
                        $('.end').show();
                    }
                });         
        
    });  
    