	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo $title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_chat');
				echo form_open("edit_chat/$edit_query_result->chat_id", $attributes);
				?>
					
					<h1 class="text-center text-success"><?php echo $this->session->flashdata('msg'); ?></h1>

					<div class='form-group'>
						<label><?php echo $this->ref_chat_app_user_id_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->ref_chat_app_user_id; ?>'  name='ref_chat_app_user_id' placeholder='ref_chat_app_user_id' >
						<span class='text-danger'><?php  echo form_error('ref_chat_app_user_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->chat_from_app_user_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->chat_from_app_user; ?>'  name='chat_from_app_user' placeholder='chat_from_app_user' >
						<span class='text-danger'><?php  echo form_error('chat_from_app_user'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->chat_from_admin_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->chat_from_admin; ?>'  name='chat_from_admin' placeholder='chat_from_admin' >
						<span class='text-danger'><?php  echo form_error('chat_from_admin'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->ref_chat_from_admin_user_id_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->ref_chat_from_admin_user_id; ?>'  name='ref_chat_from_admin_user_id' placeholder='ref_chat_from_admin_user_id' >
						<span class='text-danger'><?php  echo form_error('ref_chat_from_admin_user_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->chat_message_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->chat_message; ?>'  name='chat_message' placeholder='chat_message' >
						<span class='text-danger'><?php  echo form_error('chat_message'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->chat_is_edited_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->chat_is_edited; ?>'  name='chat_is_edited' placeholder='chat_is_edited' >
						<span class='text-danger'><?php  echo form_error('chat_is_edited'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->chat_message_sending_edited_date_time_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->chat_message_sending_edited_date_time; ?>'  name='chat_message_sending_edited_date_time' placeholder='chat_message_sending_edited_date_time' >
						<span class='text-danger'><?php  echo form_error('chat_message_sending_edited_date_time'); ?></span>
					</div>

				
				
				
					<button type="submit" class="btn btn-primary btn-block">Submit</button>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
