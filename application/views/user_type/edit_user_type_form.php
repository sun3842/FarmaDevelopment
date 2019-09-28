	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo $title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_user_type');
				echo form_open("UserType/edit_user_type/$edit_query_result->user_type_id", $attributes);
				?>
					<?php if (isset($message)) : ?>
						<h1 class="text-center text-success">Data Edited successfully</h1>	<br/>
					<?php endif; ?>

					<div class='form-group'>
						<label><?php echo $this->user_type_name_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->user_type_name; ?>'  name='user_type_name' placeholder='user_type_name' >
						<span class='text-danger'><?php  echo form_error('user_type_name'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->user_type_description_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->user_type_description; ?>'  name='user_type_description' placeholder='user_type_description' >
						<span class='text-danger'><?php  echo form_error('user_type_description'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->user_type_active_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->user_type_active; ?>'  name='user_type_active' placeholder='user_type_active' >
						<span class='text-danger'><?php  echo form_error('user_type_active'); ?></span>
					</div>
				
				
				
					<button type="submit" class="btn btn-primary btn-block">Submit</button>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
