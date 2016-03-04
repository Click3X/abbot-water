    jQuery(document).ready(function($) {
			// jQuery Validation				
			jQuery("input:text").change(function() {
			    var value = jQuery("input:text").val();			   
			
			jQuery("#signup").validate({
				// if valid, post data via AJAX
				submitHandler: function(form) {
					jQuery.ajax(
				        {

				            type: "POST",

				            url: ArrivaUrl.ajaxurl,

				            data: {

				                action: 'func_themestudio_subscribe_form',
				                email:value,
				            },
				            success: function(data) {				                   
				                    jQuery('.formmessage ').html(data);				                   

				             },
				             error: function(errorThrown) {				             	
				            }
				             
				        });
				},
				// all fields are required	
				rules: {					
					email_subscribe: {
						required: true,
						email: true,
					}
				}			
			});
			});
	});
