	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo $title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_chat');
				echo form_open("Chat/create_chat", $attributes);
				?>
					<?php if (isset($message)) : ?>
						<h1 class="text-center text-success">Data Inserted successfully</h1>	<br/>
					<?php endif; ?>

					<div class='form-group'>
						<label><?php echo $this->ref_chat_app_user_id_label ?></label>
						<input type='text' class='form-control'   name='ref_chat_app_user_id' placeholder='<?php echo $this->ref_chat_app_user_id_label ?>' >
						<span class='text-danger'><?php  echo form_error('ref_chat_app_user_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->chat_from_app_user_label ?></label>
						<input type='text' class='form-control'   name='chat_from_app_user' placeholder='<?php echo $this->chat_from_app_user_label ?>' >
						<span class='text-danger'><?php  echo form_error('chat_from_app_user'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->chat_from_admin_label ?></label>
						<input type='text' class='form-control'   name='chat_from_admin' placeholder='<?php echo $this->chat_from_admin_label ?>' >
						<span class='text-danger'><?php  echo form_error('chat_from_admin'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->ref_chat_from_admin_user_id_label ?></label>
						<input type='text' class='form-control'   name='ref_chat_from_admin_user_id' placeholder='<?php echo $this->ref_chat_from_admin_user_id_label ?>' >
						<span class='text-danger'><?php  echo form_error('ref_chat_from_admin_user_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->chat_message_label ?></label>
						<input type='text' class='form-control'   name='chat_message' placeholder='<?php echo $this->chat_message_label ?>' >
						<span class='text-danger'><?php  echo form_error('chat_message'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->chat_is_edited_label ?></label>
						<input type='text' class='form-control'   name='chat_is_edited' placeholder='<?php echo $this->chat_is_edited_label ?>' >
						<span class='text-danger'><?php  echo form_error('chat_is_edited'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->chat_message_sending_edited_date_time_label ?></label>
						<input type='text' class='form-control'   name='chat_message_sending_edited_date_time' placeholder='<?php echo $this->chat_message_sending_edited_date_time_label ?>' >
						<span class='text-danger'><?php  echo form_error('chat_message_sending_edited_date_time'); ?></span>
					</div>

				
				
				
					<button type="submit" class="btn btn-primary btn-block">Submit</button>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
