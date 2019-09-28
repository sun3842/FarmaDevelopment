	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo $title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_app_user_details');
				echo form_open("AppUserDetails/create_app_user_details", $attributes);
				?>
					<?php if (isset($message)) : ?>
						<h1 class="text-center text-success">Data Inserted successfully</h1>	<br/>
					<?php endif; ?>

					<div class='form-group'>
						<label><?php echo $this->app_user_first_name_label ?></label>
						<input type='text' class='form-control'   name='app_user_first_name' placeholder='<?php echo $this->app_user_first_name_label ?>' >
						<span class='text-danger'><?php  echo form_error('app_user_first_name'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->app_user_last_name_label ?></label>
						<input type='text' class='form-control'   name='app_user_last_name' placeholder='<?php echo $this->app_user_last_name_label ?>' >
						<span class='text-danger'><?php  echo form_error('app_user_last_name'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->app_user_birth_date_label ?></label>
						<input type='text' class='form-control'   name='app_user_birth_date' placeholder='<?php echo $this->app_user_birth_date_label ?>' >
						<span class='text-danger'><?php  echo form_error('app_user_birth_date'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->app_user_sex_label ?></label>
						<input type='text' class='form-control'   name='app_user_sex' placeholder='<?php echo $this->app_user_sex_label ?>' >
						<span class='text-danger'><?php  echo form_error('app_user_sex'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->app_user_address_label ?></label>
						<input type='text' class='form-control'   name='app_user_address' placeholder='<?php echo $this->app_user_address_label ?>' >
						<span class='text-danger'><?php  echo form_error('app_user_address'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->app_user_city_label ?></label>
						<input type='text' class='form-control'   name='app_user_city' placeholder='<?php echo $this->app_user_city_label ?>' >
						<span class='text-danger'><?php  echo form_error('app_user_city'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->app_user_post_code_label ?></label>
						<input type='text' class='form-control'   name='app_user_post_code' placeholder='<?php echo $this->app_user_post_code_label ?>' >
						<span class='text-danger'><?php  echo form_error('app_user_post_code'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->app_user_country_label ?></label>
						<input type='text' class='form-control'   name='app_user_country' placeholder='<?php echo $this->app_user_country_label ?>' >
						<span class='text-danger'><?php  echo form_error('app_user_country'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->app_user_email_label ?></label>
						<input type='text' class='form-control'   name='app_user_email' placeholder='<?php echo $this->app_user_email_label ?>' >
						<span class='text-danger'><?php  echo form_error('app_user_email'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->app_user_cell_phone_label ?></label>
						<input type='text' class='form-control'   name='app_user_cell_phone' placeholder='<?php echo $this->app_user_cell_phone_label ?>' >
						<span class='text-danger'><?php  echo form_error('app_user_cell_phone'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->app_user_registration_date_time_label ?></label>
						<input type='text' class='form-control'   name='app_user_registration_date_time' placeholder='<?php echo $this->app_user_registration_date_time_label ?>' >
						<span class='text-danger'><?php  echo form_error('app_user_registration_date_time'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->app_user_registration_editing_date_time_label ?></label>
						<input type='text' class='form-control'   name='app_user_registration_editing_date_time' placeholder='<?php echo $this->app_user_registration_editing_date_time_label ?>' >
						<span class='text-danger'><?php  echo form_error('app_user_registration_editing_date_time'); ?></span>
					</div>
				
				
				
					<button type="submit" class="btn btn-primary btn-block">Submit</button>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
