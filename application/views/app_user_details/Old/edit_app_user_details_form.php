	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo $title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_app_user_details');
				echo form_open("AppUserDetails/edit_app_user_details/$edit_query_result->ref_app_user_details_app_user_id", $attributes);
				?>
					<?php if (isset($message)) : ?>
						<h1 class="text-center text-success">Data Edited successfully</h1>	<br/>
					<?php endif; ?>

					<div class='form-group'>
						<label><?php echo $this->app_user_first_name_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->app_user_first_name; ?>'  name='app_user_first_name' placeholder='app_user_first_name' >
						<span class='text-danger'><?php  echo form_error('app_user_first_name'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->app_user_last_name_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->app_user_last_name; ?>'  name='app_user_last_name' placeholder='app_user_last_name' >
						<span class='text-danger'><?php  echo form_error('app_user_last_name'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->app_user_birth_date_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->app_user_birth_date; ?>'  name='app_user_birth_date' placeholder='app_user_birth_date' >
						<span class='text-danger'><?php  echo form_error('app_user_birth_date'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->app_user_sex_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->app_user_sex; ?>'  name='app_user_sex' placeholder='app_user_sex' >
						<span class='text-danger'><?php  echo form_error('app_user_sex'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->app_user_address_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->app_user_address; ?>'  name='app_user_address' placeholder='app_user_address' >
						<span class='text-danger'><?php  echo form_error('app_user_address'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->app_user_city_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->app_user_city; ?>'  name='app_user_city' placeholder='app_user_city' >
						<span class='text-danger'><?php  echo form_error('app_user_city'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->app_user_post_code_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->app_user_post_code; ?>'  name='app_user_post_code' placeholder='app_user_post_code' >
						<span class='text-danger'><?php  echo form_error('app_user_post_code'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->app_user_country_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->app_user_country; ?>'  name='app_user_country' placeholder='app_user_country' >
						<span class='text-danger'><?php  echo form_error('app_user_country'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->app_user_email_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->app_user_email; ?>'  name='app_user_email' placeholder='app_user_email' >
						<span class='text-danger'><?php  echo form_error('app_user_email'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->app_user_cell_phone_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->app_user_cell_phone; ?>'  name='app_user_cell_phone' placeholder='app_user_cell_phone' >
						<span class='text-danger'><?php  echo form_error('app_user_cell_phone'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->app_user_registration_date_time_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->app_user_registration_date_time; ?>'  name='app_user_registration_date_time' placeholder='app_user_registration_date_time' >
						<span class='text-danger'><?php  echo form_error('app_user_registration_date_time'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->app_user_registration_editing_date_time_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->app_user_registration_editing_date_time; ?>'  name='app_user_registration_editing_date_time' placeholder='app_user_registration_editing_date_time' >
						<span class='text-danger'><?php  echo form_error('app_user_registration_editing_date_time'); ?></span>
					</div>
				
				
				
					<button type="submit" class="btn btn-primary btn-block">Submit</button>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
