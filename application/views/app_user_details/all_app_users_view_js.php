<script>

function show_user_details_model(app_user,male,female,others)
{
    $('#td_pharmacy').text("");
	$('#td_name').text("");
	$('#td_adress').text("");
	$('#td_city').text("");
	$('#td_post_code').text("");
	$('#td_birth_date').text("");
	$('#td_country').text("");
	$('#td_email').text("");
	$('#td_telephone').text("");
	$('#td_sex').text("");
	$('#td_member_since').text("");

	var app_user_pharmacy='';
	var app_user_full_name="";
	var app_user_city="";
	var app_user_address="";
	var app_user_birth_date="";
	var app_user_sex=-1;
	var app_user_post_code="";
	var app_user_country="";
	var app_user_email="";
	var app_user_cell_phone="";
	var app_user_installation_date_time="";
	
	var sex_type="";
	if(app_user['ragione_sociale']==null){
        app_user_pharmacy='Not Associated';
    }
    else{
        app_user_pharmacy=app_user['ragione_sociale'];
    }
	if(app_user['ref_app_user_details_app_user_id']==null)
	{
		app_user_full_name="";
		app_user_city="";
		app_user_address="";
		app_user_birth_date="";
		app_user_sex=-1;
		app_user_post_code="";
		app_user_country="";
		app_user_email="";
		app_user_cell_phone="";
		app_user_installation_date_time=app_user['app_user_installation_date_time'];
	}
	else
	{

		app_user_full_name=app_user['app_user_first_name']+" "+app_user['app_user_last_name'];
		app_user_city=app_user['app_user_city']==null?"":app_user['app_user_city'];
		app_user_address=app_user['app_user_address']==null?"":app_user['app_user_address'];
		app_user_birth_date=app_user['app_user_birth_date']==null?"":app_user['app_user_birth_date'];
		app_user_sex=app_user['app_user_sex']==null?"":app_user['app_user_sex'];
		app_user_post_code=app_user['app_user_post_code']==null?"":app_user['app_user_post_code'];
		app_user_country=app_user['app_user_country']==null?"":app_user['app_user_country'];
		app_user_email=app_user['app_user_email']==null?"":app_user['app_user_email'];
		app_user_cell_phone=app_user['app_user_cell_phone']==null?"":app_user['app_user_cell_phone'];
		app_user_installation_date_time=app_user['app_user_installation_date_time'];
	}
	
	if(app_user_sex!=-1)
	{
		sex_type=app_user_sex==0?female:(app_user_sex==1?male:others);
	}
	$('#td_pharmacy').text(app_user_pharmacy);
	$('#td_name').text(app_user_full_name);
	$('#td_address').text(app_user_address);
	$('#td_city').text(app_user_city);
	$('#td_post_code').text(app_user_post_code);
	$('#td_birth_date').text(app_user_birth_date);
	$('#td_country').text(app_user_country);
	$('#td_email').text(app_user_email);
	$('#td_telephone').text(app_user_cell_phone);
	$('#td_sex').text(sex_type);
	$('#td_member_since').text(app_user_installation_date_time);
	
	$('#modal-user-detail').modal('show');
}

function show_send_message_form(app_user_id)
{
	$('#hidden_app_user_id').val(app_user_id),
	$('#send_msg_form').attr('action', '<?php echo base_url();?>app_user_send_message/'+app_user_id);
	$('#modal-user-send').modal('show');
}

$('#send_msg_form').submit(function() {
  return true;
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