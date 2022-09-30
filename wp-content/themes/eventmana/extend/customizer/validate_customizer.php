<?php 

function logo_js(){

	ob_start(); ?>

		<script>
			(function($){
		    
				$(window).load(function(){

			        $("#customize-control-cus_logo_text").addClass("child_ova_option logo_option_logo_text");
			        $("#customize-control-cus_logo_image").addClass("child_ova_option logo_option_logo_image");

			        var customize_control    = $("#customize-control-cus_logo_option");

			   
				    customize_control.bind("toggle_children", function() {

				        $this = $(this);

				        if($this.css("display") == "none") {
				            $(".child_ova_option").css("display", "none").trigger("toggle_children");
				            return;
				        }

				        var checkedElement = $this.find("input:checked");
				        $(".child_ova_option:not(.logo_option_"+checkedElement.val()+")").css("display", "none").trigger("toggle_children");
				        
				        $(".logo_option_" + checkedElement.val()).css( "display", "block" ).trigger("toggle_children");
				            
				    });

				    customize_control.trigger("toggle_children");

				    
				    customize_control.find("input").click( function() {
				    	
				        customize_control.trigger("toggle_children");
				    });

				    
				    
			    });

			        
			})(jQuery);
		</script>


	<?php
	echo ob_get_clean();
}



function fix_img(){

	ob_start(); ?>

		<script>
			(function($){
		    
				$(window).load(function(){ 

				    $("#customize-controls img").css("width","auto");
				    $("#accordion-section-themes").css("display","none");
				    
			    });

			        
			})(jQuery);
		</script>


	<?php
	echo ob_get_clean();
}