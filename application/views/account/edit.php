	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo $title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
				$form_id='form_account'.$edit_query_result->user_details_id;
				$attributes = array('method' => 'POST', 'id' =>$form_id);
				echo form_open("edit_account/$edit_query_result->user_details_id", $attributes);
				?>
					
					<h1 class="text-center text-success"><?php echo $this->session->flashdata('msg'); ?></h1>

				<div class="form-group">
					<label for="" class="col-sm-3 control-label"><?php echo $this->lang->line('first_name');?></label>
					<div class="col-sm-9">
					 <input type='text' class='form-control' value='<?php echo $edit_query_result->user_details_first_name; ?>'  name='user_details_first_name'  id='<?php echo $form_id ?>_user_details_first_name' placeholder='<?php echo $this->lang->line('first_name');?>' >
						<span class='text-danger' id="<?php echo $form_id ?>_error_user_details_first_name"><?php  echo form_error('user_details_first_name'); ?></span>
					</div>
				</div>
				
				<div class="form-group">
					<label for="" class="col-sm-3 control-label"><?php echo $this->lang->line('last_name');?></label>
					<div class="col-sm-9">
					 <input type='text' class='form-control' value='<?php echo $edit_query_result->user_details_last_name; ?>'  name='user_details_last_name'  id='<?php echo $form_id ?>_user_details_last_name'  placeholder='<?php echo $this->lang->line('last_name');?>' >
						<span class='text-danger' id="<?php echo $form_id ?>_error_user_details_last_name"><?php  echo form_error('user_details_last_name'); ?></span>
					</div>
				</div>
					
				<div class="form-group">
					<label for="" class="col-sm-3 control-label"><?php echo $this->lang->line('user_name');?></label>
					<div class="col-sm-9">
					 <input type='text' class='form-control' value='<?php echo $edit_query_result->user_details_user_name; ?>'  name='user_details_user_name'  id='<?php echo $form_id ?>_user_details_user_name'  placeholder='<?php echo $this->lang->line('user_name');?>' disabled="disabled" >
						<span class='text-danger' id="<?php echo $form_id ?>_error_user_details_user_name"><?php  echo form_error('user_details_user_name'); ?></span>
					</div>
				</div>
					
				<div class="form-group">
					<label for="" class="col-sm-3 control-label"><?php echo $this->lang->line('email');?></label>
					<div class="col-sm-9">
					 <input type='text' class='form-control' value='<?php echo $edit_query_result->user_details_email; ?>'  name='user_details_email'  id='<?php echo $form_id ?>_user_details_email'  placeholder='<?php echo $this->lang->line('email');?>' >
						<span class='text-danger' id="<?php echo $form_id ?>_error_user_details_email"><?php  echo form_error('user_details_email'); ?></span>
					</div>
				</div>
					
				<div class="form-group">
					<label for="" class="col-sm-3 control-label"><?php echo $this->lang->line('password');?></label>
					<div class="col-sm-9">
					 <input type='password' class='form-control' value='<?php //echo $edit_query_result->user_details_password_hash_value; ?>'  name='user_details_password_hash_value'   id='<?php echo $form_id ?>_user_details_password_hash_value' placeholder='<?php echo $this->lang->line('password');?>' >
						<span class='text-danger' id="<?php echo $form_id ?>_error_user_details_password"><?php  echo form_error('user_details_password_hash_value'); ?></span>
					</div>
				</div>
						
				<div class="form-group">
					<label for="" class="col-sm-3 control-label"><?php echo $this->lang->line('re_password');?></label>
					<div class="col-sm-9">
					 <input type='password' class='form-control' value='<?php //echo $edit_query_result->user_details_password_hash_value; ?>'  name='user_details_retype_password_hash_value'  id='<?php echo $form_id ?>_user_details_retype_password_hash_value'  placeholder='<?php echo $this->lang->line('re_password');?>' >
						<span class='text-danger' id="<?php echo $form_id ?>_error_user_details_retype_password"><?php  echo form_error('user_details_retype_password_hash_value'); ?></span>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<button type="submit" class="btn btn-danger"><?php echo $this->lang->line('update');?></button>
					</div>
				</div>
				
				<input type='hidden' value='<?php echo $edit_query_result->ref_user_details_user_type_id; ?>'  name='ref_user_details_user_type_id'>
				<input type='hidden' value='<?php echo $edit_query_result->user_details_created_by_user_details_id; ?>'  name='user_details_created_by_user_details_id'>
				<input type='hidden' value='<?php echo $edit_query_result->user_details_created_date_time; ?>'  name='user_details_created_date_time'>
				<input type='hidden' value='<?php echo $edit_query_result->user_details_edited_date_time; ?>'  name='user_details_edited_date_time'>
				
				
				
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>

	  <script>
	  
	function validateEmail(sEmail) 
	{
	    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	    if (filter.test(sEmail)) {
	        return true;
	    }
	    else {
	        return false;

	    }

	}  
	  
	$(document).ready(function()
	{

		
		/*	ajax form validation and submit		*/
		
			$("#<?php echo $form_id ?>").submit(function() {
				
				
				if(	$( "#<?php echo $form_id ?>_user_details_first_name").val()=="")
				{
					$("#<?php echo $form_id ?>_error_user_details_first_name").html("<?php echo $this->lang->line('first_name_error_msg');?>");
					return false;
				}
				
				if(	$( "#<?php echo $form_id ?>_user_details_last_name").val()=="")
				{
					$("#<?php echo $form_id ?>_error_user_details_last_name").html("<?php echo $this->lang->line('last_name_error_msg');?>");
					return false;
				}
				
				
				if(	$( "#<?php echo $form_id ?>_user_details_user_name").val()=="")
				{
					$("#<?php echo $form_id ?>_error_user_details_user_name").html("<?php echo $this->lang->line('user_name_error_msg');?>");
					return false;
				}
				sEmail=$( "#<?php echo $form_id ?>_user_details_email").val();
				if(	sEmail=="")
				{
					$("#<?php echo $form_id ?>_error_user_details_email").html("<?php echo $this->lang->line('email_error_msg');?>");
					return false;
				}
				if (!validateEmail(sEmail)) 
				{
	            $("#<?php echo $form_id ?>_error_user_details_email").html("<?php echo $this->lang->line('invalid_email_error_msg');?>");
					return false;
				}				
				
				if(	$( "#<?php echo $form_id ?>_user_details_password_hash_value").val()=="")
				{
					$("#<?php echo $form_id ?>_error_user_details_password").html("<?php echo $this->lang->line('password_error_msg');?>");
					return false;
				}
				
				if(	$( "#<?php echo $form_id ?>_user_details_retype_password_hash_value").val()=="")
				{
					$("#<?php echo $form_id ?>_error_user_details_retype_password").html("<?php echo $this->lang->line('re_password_error_msg');?>");
					return false;
				}
				
				
				
				if(	$( "#<?php echo $form_id ?>_user_details_password_hash_value").val()!=$( "#<?php echo $form_id ?>_user_details_retype_password_hash_value").val())
				{
					$("#<?php echo $form_id ?>_error_user_details_retype_password").html("<?php echo $this->lang->line('re_password_mismatch_error_msg');?>");
					return false;
				}
				
				

			});
		
		
		
	
		
	});
	</script>
			
		