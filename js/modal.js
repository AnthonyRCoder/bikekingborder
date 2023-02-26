$(document).ready(function(){
	//Fade effect starts here


	       $("#fade-modal").fadeIn('slow/400/fast', function() {
	       		$("#fade-modal").css("display", "block");
	       });


    $("#fade-close").click( function()
        {
        	$("#fade-modal").fadeOut('slow/400/fast', function() {
	       		$("#fade-modal").css("display", "none");
	       });
        }
    );

 });