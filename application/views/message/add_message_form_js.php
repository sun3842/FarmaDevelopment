

<script>
    //$('*[name=message_edited_date_time]').appendDtpicker();
	//$('*[name=message_created_date_time]').appendDtpicker();
	$('*[name=message_send_later_date_time]').appendDtpicker();
	$('*[name=message_sending_date_time]').appendDtpicker();
	
	
	
	
		//For normal/general message
		
		$( "#message_send_now_common" ).change(function() {
			var val=$( this ).val() ;
		    if(val==0)
			{
				$("#message_send_later_date_time_common_div").css( "display", "block" );
			}
			else
			{
				$("#message_send_later_date_time_common_div").css( "display", "none" );
			}
		});	
		
		//For group message
		$( "#message_send_now_group" ).change(function() {
			var val=$( this ).val() ;
		    if(val==0)
			{
				$("#message_send_later_date_time_group_div").css( "display", "block" );
			}
			else
			{
				$("#message_send_later_date_time_group_div").css( "display", "none" );
			}
		});	
		
		//For personal message
		
		$( "#message_send_now_personal" ).change(function() {
			var val=$( this ).val() ;
		    if(val==0)
			{
				$("#message_send_later_date_time_personal_div").css( "display", "block" );
			}
			else
			{
				$("#message_send_later_date_time_personal_div").css( "display", "none" );
			}
		});	
		
		
		//Send by Birth year
			$('input:checkbox[name="send_by_birth_year"]').click(function(){
				 if ($(this).is(':checked'))
				 {
					$('#message_send_by_birth_year_id').removeAttr('disabled');
					 //$('#message_send_by_birth_year_id').setAttribute('disabled', false);//= false;
				 }
				 else
				 {
					 $('#message_send_by_birth_year_id').attr('disabled','disabled');
				 }
			 });
			 
	 //Send by Birth Month
			$('input:checkbox[name="send_by_birth_month"]').click(function(){
				 if ($(this).is(':checked'))
				 {
					$('#message_send_by_birth_month_id').removeAttr('disabled');
				 }
				 else
				 {
					 $('#message_send_by_birth_month_id').attr('disabled','disabled');
				 }
			 });
	//Send by Birth Age Limit
			$('input:checkbox[name="send_by_age_limit"]').click(function(){
				 if ($(this).is(':checked'))
				 {
					$('#age_from').removeAttr('disabled');
					$('#age_to').removeAttr('disabled');
				 }
				 else
				 {
					$('#age_from').attr('disabled','disabled');
					$('#age_to').attr('disabled','disabled');
				 }
			 });
			 
	 //Send by city
			$('input:checkbox[name="send_by_city"]').click(function(){
				 if ($(this).is(':checked'))
				 {
					$('#message_send_city_name').removeAttr('disabled');
				 }
				 else
				 {
					 $('#message_send_city_name').attr('disabled','disabled');
				 }
			 });
			 
	  //Send by region
			$('input:checkbox[name="send_by_region"]').click(function(){
				 if ($(this).is(':checked'))
				 {
					$('#message_send_region_name').removeAttr('disabled');
				 }
				 else
				 {
					 $('#message_send_region_name').attr('disabled','disabled');
				 }
			 });
			 
		//Send by Post Code
			$('input:checkbox[name="send_by_post_code"]').click(function(){
				 if ($(this).is(':checked'))
				 {
					$('#message_send_post_code').removeAttr('disabled');
				 }
				 else
				 {
					 $('#message_send_post_code').attr('disabled','disabled');
				 }
			 });
		
		
	
	$(document).on('keyup','.app_user_name_class', function() {
		var search_keywords = $(this).val();
		var dataString = 'search='+ search_keywords;
		if(search_keywords!='')
		{
			$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>Message/ajax_find_app_user",
				data: dataString,
				cache: false,
				success: function(html)
				{
					$("#result_personal_client").html(html).show();
				}
				
			});
		}
		return false;    
	});
	
	
		
	jQuery("#result_personal_client").on("click",function(e)
	{ 
	
	   var $clicked = $(e.target);
	   var $name = $clicked.find('.name').html();
	   var $app_user_id = $clicked.find('.client_id').html();
	
	   $('#app_user_hidden_id').val($app_user_id);
	   
	
	   var decoded = $("<div/>").html($name).text();
	   
	
	   $('#app_user_name_text_field').val(decoded);
    });
   jQuery(document).on("click", function(e){ 
         var $clicked = $(e.target);
		 if (! $clicked.hasClass("app_user_name_class"))
		 {
			 jQuery("#result_personal_client").fadeOut(); 
		 }
	});
	$('#app_user_name_text_field').click(function(){
		 jQuery("#result_personal_client").fadeIn();
		});
		
			
		
		
</script>