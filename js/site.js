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

		$j('.slicknav_menu').prepend('<a href="http://localhost:8888/portfolio/"><img class="vitodipintome_brand" src="http://localhost:8888/portfolio/wp-content/uploads/2019/06/vitodipinto.logo_-1.svg" alt="vitodipinto.me Logo" /></a>');


		$j('.search-icon').on('click', function() {
			$j('.search-form').slideToggle();
		});
	


		$j(document).keyup(function(e) {

			// Close search if esc key pressed
			if (e.key == "Escape") {
				$j(".search-form").hide();
			}
		});



	    $j(".card").click(function() {
	  	window.location = $j(this).find(".card-permalink").attr("href");
		  return false;


		
		  

	  	

	  	
       



	});


	   
        
    


});




  