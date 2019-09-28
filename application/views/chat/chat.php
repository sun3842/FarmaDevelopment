<style>
#app_user_table tr:hover
{
	background-color:#eaeaea;
}

</style>

<div class="container-fluid">
	
	<div id="page-content">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default panel-chat">
					<div class="panel-heading">
						<?php echo $this->lang->line('chat');?>
						<span id="chat_lobby" class="pull-right"></span>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-5 chat-list">
								<table id="app_user_table">
									<div id="loading" class="text-center" style="display:none">
									<br/><br/><br/><img src="<?php echo base_url() ?>assets/img/loading.gif" width="100">
									</div>
								</table>
							</div>
							<div class="col-xs-12 col-sm-7 chat-messages-wrapper">
								<div class="chat-messages table-responsive">
                                <input type="hidden" name="appUserId" id="appUserId" />
									<table	id="chat_details_table">
									
										<div id="loading2" class="text-center" style="display:block">
										
										<br/><br/><br/><img src="<?php echo base_url() ?>assets/img/loading.gif" width="100">
										</div>
										
										
										
									</table>
								</div>
								<div class="chat-send">
									<div class="input-group">
										<input type="text" class="form-control message-send" placeholder="<?php echo $this->lang->line('type_msg');?>" id="chat_message">
										<span class="input-group-btn">
											<button class="btn btn-message-send" type="button" id="insert_chat">
												<i class="fa fa-arrow-right"></i>
											</button> </span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>



<script>
var current_selected_user_id=0;
$(document).ready(function()
{
	$("#loading").css("display", "block");
	setInterval(function(){
	$("#loading").css("display", "none");
	$("#app_user_table").load('Chat/get_chat_user_by_ajax')
	}, 2000);

});


$(document).ready(function()
{	



	$(document).ajaxStart(function(){
		//$("#loading2").css("display", "block");
	}); 

	
	$( "#app_user_table" ).on( "click", "tr", function() 
	{

		$( "#chat_details_table" ).empty();
		var id= $( this ).attr('id') ;
		current_selected_user_id=id;
		$("#appUserId").val(id);
		$("#loading2").css("display", "block");
		$("#chat_details_table").load('Chat/get_chat_details_by_ajax/'+id);
		
	});
	
	$(document).ajaxStop(function(){
		$("#loading2").css("display", "none");
	}); 
	
	
	
setInterval(function(){
		
		if(current_selected_user_id>0)
		{	

			//$( "#chat_details_table" ).empty();
			id=current_selected_user_id;
			$("#appUserId").val(id);
		    //$("#loading2").css("display", "none");
		   $("#chat_details_table").load('Chat/get_chat_details_by_ajax/'+id);
		}
		
	}, 2000);
	
});		

	$(document).ready(function()
{	

	$(document).ajaxStart(function(){
		//$("#loading2").css("display", "block");
	}); 

	
	$( "#insert_chat" ).on( "click", function() 
	{
		//$( "#chat_details_table" ).empty();
		var id= $(appUserId ).val() ;
		var msg=$(chat_message).val();
		$("#loading2").css("display", "block");
		//alert('Chat/insert_chat_details_by_ajax/'+id+'/'+msg);
		//$("#chat_details_table").load('Chat/insert_chat_details_by_ajax/'+id+'/'+msg);
		$(chat_message).val("");
		
		$.ajax({
  url: 'Chat/insert_chat_details_by_ajax/'+id,
  type: 'POST',
  data: 'msg='+msg,
  success: function(data) {
	//called when successful
	$('#chat_details_table').html(data);
  },
  error: function(e) {
	//called when there is an error
	//console.log(e.message);
  }
});
		
	});
	
	$(document).ajaxStop(function(){
		$("#loading2").css("display", "none");
	}); 
	
	
	
/* 	var bbb=$( "#app_user_table tr" ).first().attr('id');
	alert(bbb); */
	
});		
	


</script>

