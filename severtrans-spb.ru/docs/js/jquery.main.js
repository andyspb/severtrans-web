$(function(){
    //original field values
    var field_values = {
            //id        :  value
            'punkt_naznacheniya'  : 'punkt_naznacheniya',
            'ves'  : 'ves',
            'obyem' : 'obyem',
            'otpravitely'  : 'otpravitely',
            'Adres_1'  : 'Adres_1',
            'kontakt_2'  : 'kontakt_2'
    };


    //inputfocus
    $('input#punkt_naznacheniya').inputfocus({ value: field_values['punkt_naznacheniya'] });
    $('input#ves').inputfocus({ value: field_values['ves'] });
    $('input#obyem').inputfocus({ value: field_values['obyem'] }); 
    $('input#otpravitely').inputfocus({ value: field_values['otpravitely'] });
    $('input#Adres_1').inputfocus({ value: field_values['Adres_1'] });
    $('input#kontakt_2').inputfocus({ value: field_values['kontakt_2'] }); 




    //reset progress bar
    $('#progress').css('width','0');
    $('#progress_text').html('0% Complete');

    //first_step
    $('form').submit(function(){ return false; });
    $('#submit_first').click(function(){
        //remove classes
        $('#first_step input').removeClass('error').removeClass('valid');

        //ckeck if inputs aren't empty
        var fields = $('#first_step input[type=text], #first_step input[type=text]');
        var error = 0;
        fields.each(function(){
            var value = $(this).val();
            if( value.length<4 || value==field_values[$(this).attr('id')] ) {
                $(this).addClass('error');
                $(this).effect("shake", { times:3 }, 50);
                
                error++;
            } 
			else {
                $(this).addClass('valid');
            }
        });        
        
        if(!error) {
                //update progress bar
                $('#progress_text').html('33% Complete');
                $('#progress').css('width','126px');
                
                //slide steps
                $('#first_step').slideUp();
                $('#second_step').slideDown();     
        } else return false;

    });



    $('#submit_second').click(function(){
        //remove classes
        $('#second_step input').removeClass('error').removeClass('valid');

        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;  
        var fields = $('#second_step input[type=text]');
        var error = 0;
        fields.each(function(){
            var value = $(this).val();
            if( value.length<1 || value==field_values[$(this).attr('id')] || ( $(this).attr('id')=='email' && !emailPattern.test(value) ) ) {
                $(this).addClass('error');
                $(this).effect("shake", { times:3 }, 50);
                
                error++;
            } else {
                $(this).addClass('valid');
            }
        });

        if(!error) {
                //update progress bar
                $('#progress_text').html('66% Complete');
                $('#progress').css('width','226px');
                
                //slide steps
                $('#second_step').slideUp();
                $('#third_step').slideDown();     
        } else return false;

    });


    $('#submit_third').click(function(){
        //update progress bar
        $('#progress_text').html('100% Complete');
        $('#progress').css('width','339px');

        
                
        //slide steps
        $('#third_step').slideUp();
        $('#fourth_step').slideDown();            
    });

 $('#submit_fourth').click(function(){
       $(".formError").hide();

	});

	var use_ajax=true;
	$.validationEngine.settings={};

	$("#contact-form").validationEngine({
		inlineValidation: false,
		promptPosition: "centerRight",
		success :  function(){use_ajax=true},
		failure : function(){use_ajax=false;}
	 })

	$("#contact-form").submit(function(e){

			
			
			
			if(use_ajax)
			{
				$('#loading').css('visibility','visible');
				$.post('mail.php',$(this).serialize()+'&ajax=1',
				
					function(data){
						if(parseInt(data)==-1)
							$.validationEngine.buildPrompt("#captcha","*Введено неверное значение!","error");
							
						else
						{
							$("#contact-form").hide('slow').after('<h1>Спасибо!</h1>');
						}
						
						$('#loading').css('visibility','hidden');
					}
				
				);
			}
			e.preventDefault();
	})

  

});