$(document).ready(function() {

	


	
	
	jQuery.scrollSpeed(100, 1000);


	$("#button_search").click(function() {
        var theArray = new Array();


        $.each($('h2'), function(i){
            $a = parseInt($(this).attr('id'));
            theArray[i] = $a;
        });

        var goal = $("#area_search").val();
        var closest = null;

        $.each(theArray, function(){
            if (closest == null || Math.abs(this - goal) < Math.abs(closest - goal)) {
                closest = this;
            }
        });

        
        $st = $('*[id*='+closest+']').parent().parent().offset().top;
        $('html, body').animate({ scrollTop: $st }, 500);
    });



    $("#area_search").keypress(function(e){
               if(e.keyCode==13){
                
var theArray = new Array();


        $.each($('h2'), function(i){
            $a = parseInt($(this).attr('id'));
            theArray[i] = $a;
        });

        var goal = $("#area_search").val();
        var closest = null;

        $.each(theArray, function(){
            if (closest == null || Math.abs(this - goal) < Math.abs(closest - goal)) {
                closest = this;
            }
        });

        
        $st = $('*[id*='+closest+']').parent().parent().offset().top;
        $('html, body').animate({ scrollTop: $st }, 500);



               }
             });


	   
    var overlay = $('#overlay');
    var open_modal = $('.open_modal'); 
    var close = $('.modal_close, #overlay');
    var modal = $('.modal_div');

     open_modal.click( function(event){
         event.preventDefault();
         var div = $(this).attr('href'); 
         overlay.fadeIn(400, 
             function(){
                 $(div) 
                     .css('display', 'block') 
                     .animate({opacity: 1, top: '50%'}, 200); // плaвнo пoкaзывaем
         });
     });

     close.click( function(){ 
            modal 
             .animate({opacity: 0, top: '45%'}, 200, 
                 function(){ 
                     $(this).css('display', 'none');
                     overlay.fadeOut(400); 
                 }
             );
     });

	
});

$(document).ready(function(){
    $("[id ^= form_]").submit(function() { 
    	event.preventDefault();

            var form_data = $(this).serialize(); 
            $.ajax({
            type: "POST", 
            url: "../send.php",
            data: form_data,
            success: function(){
                   alert("Спасибо! Мы свяжемся с Вами в ближайшее время.");
            }
    });
});
});

$(document).ready(function() {

	


	
	// $fn.scrollSpeed(step, speed, easing);
	jQuery.scrollSpeed(100, 1000);


	$("#button_search").click(function() {
		var theArray = new Array();


		$.each($('h2'), function(i){
  			$a = parseInt($(this).attr('id'));
  			theArray[i] = $a;
		});

		var goal = $("#area_search").val();
		var closest = null;

		$.each(theArray, function(){
  			if (closest == null || Math.abs(this - goal) < Math.abs(closest - goal)) {
    			closest = this;
  			}
		});

		
		$st = $('*[id*='+closest+']').parent().parent().offset().top;
		$('html, body').animate({ scrollTop: $st }, 500);
	});

	
	$("#scroll_to_map").click(function(event){       
        event.preventDefault();
        $('html,body').animate({scrollTop:$("#map_container").offset().top}, 1200);
    });

    $(document).ready(function() {
		$(".fancybox").fancybox({
			openEffect	: 'none',
			closeEffect	: 'none'
		});
	});

	
});