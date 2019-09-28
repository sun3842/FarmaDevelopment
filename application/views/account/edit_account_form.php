	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo $title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_account');
				echo form_open("edit_account/$edit_query_result->user_details_id", $attributes);
				?>
					
					<h1 class="text-center text-success"><?php echo $this->session->flashdata('msg'); ?></h1>

					<div class='form-group'>
						<label><?php echo $this->ref_user_details_user_type_id_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->ref_user_details_user_type_id; ?>'  name='ref_user_details_user_type_id' placeholder='ref_user_details_user_type_id' >
						<span class='text-danger'><?php  echo form_error('ref_user_details_user_type_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->user_details_first_name_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->user_details_first_name; ?>'  name='user_details_first_name' placeholder='user_details_first_name' >
						<span class='text-danger'><?php  echo form_error('user_details_first_name'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->user_details_last_name_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->user_details_last_name; ?>'  name='user_details_last_name' placeholder='user_details_last_name' >
						<span class='text-danger'><?php  echo form_error('user_details_last_name'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->user_details_user_name_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->user_details_user_name; ?>'  name='user_details_user_name' placeholder='user_details_user_name' >
						<span class='text-danger'><?php  echo form_error('user_details_user_name'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->user_details_password_hash_value_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->user_details_password_hash_value; ?>'  name='user_details_password_hash_value' placeholder='user_details_password_hash_value' >
						<span class='text-danger'><?php  echo form_error('user_details_password_hash_value'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->user_details_sex_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->user_details_sex; ?>'  name='user_details_sex' placeholder='user_details_sex' >
						<span class='text-danger'><?php  echo form_error('user_details_sex'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->user_details_email_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->user_details_email; ?>'  name='user_details_email' placeholder='user_details_email' >
						<span class='text-danger'><?php  echo form_error('user_details_email'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->user_details_cell_phone_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->user_details_cell_phone; ?>'  name='user_details_cell_phone' placeholder='user_details_cell_phone' >
						<span class='text-danger'><?php  echo form_error('user_details_cell_phone'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->user_details_created_by_user_details_id_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->user_details_created_by_user_details_id; ?>'  name='user_details_created_by_user_details_id' placeholder='user_details_created_by_user_details_id' >
						<span class='text-danger'><?php  echo form_error('user_details_created_by_user_details_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->user_details_created_date_time_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->user_details_created_date_time; ?>'  name='user_details_created_date_time' placeholder='user_details_created_date_time' >
						<span class='text-danger'><?php  echo form_error('user_details_created_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->user_details_edited_by_user_details_id_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->user_details_edited_by_user_details_id; ?>'  name='user_details_edited_by_user_details_id' placeholder='user_details_edited_by_user_details_id' >
						<span class='text-danger'><?php  echo form_error('user_details_edited_by_user_details_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->user_details_edited_date_time_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->user_details_edited_date_time; ?>'  name='user_details_edited_date_time' placeholder='user_details_edited_date_time' >
						<span class='text-danger'><?php  echo form_error('user_details_edited_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->user_details_active_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->user_details_active; ?>'  name='user_details_active' placeholder='user_details_active' >
						<span class='text-danger'><?php  echo form_error('user_details_active'); ?></span>
					</div>

				
				
				
					<button type="submit" class="btn btn-primary btn-block">Submit</button>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
