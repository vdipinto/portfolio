// Add SlickNav Mobile Menu
jQuery(function(){
  jQuery('#primary-menu').slicknav();
  });









var $j = jQuery.noConflict();

	$j(function(){

	    if ($j('.navright').length && $j('.navleft').length) {
		   // alert("Hello! I am an alert box!!");
		    $j('.navigation').css("display", "flex").css("flex-direction", "row").css("justify-content", "space-between");
		} else if ($j('.navright').length && $j('.navleft').length === 0) {
			 $j('.navigation').css("display", "flex").css("flex-direction", "row").css("justify-content", "flex-end");
		} else if ($j('.navleft').length && $j('.navright').length === 0) {
			$j('.navigation').css("display", "flex").css("flex-direction", "row").css("justify-content", "flex-start");
		}


	    $j(".card").click(function() {
	  	window.location = $j(this).find(".card-permalink").attr("href");
	  	return false;

	  	

	  	
       



	});


	   
        
    


});




  