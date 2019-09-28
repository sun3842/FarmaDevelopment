	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo $title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_new_arrival');
				echo form_open("edit_new_arrival/$edit_query_result->new_arrival_id", $attributes);
				?>
					
					<h1 class="text-center text-success"><?php echo $this->session->flashdata('msg'); ?></h1>

					<div class='form-group'>
						<label><?php echo $this->new_arrival_product_name_title_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->new_arrival_product_name_title; ?>'  name='new_arrival_product_name_title' placeholder='new_arrival_product_name_title' >
						<span class='text-danger'><?php  echo form_error('new_arrival_product_name_title'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->new_arrival_product_description_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->new_arrival_product_description; ?>'  name='new_arrival_product_description' placeholder='new_arrival_product_description' >
						<span class='text-danger'><?php  echo form_error('new_arrival_product_description'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->new_arrival_product_is_in_stock_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->new_arrival_product_is_in_stock; ?>'  name='new_arrival_product_is_in_stock' placeholder='new_arrival_product_is_in_stock' >
						<span class='text-danger'><?php  echo form_error('new_arrival_product_is_in_stock'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->new_arrival_product_is_upcoming_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->new_arrival_product_is_upcoming; ?>'  name='new_arrival_product_is_upcoming' placeholder='new_arrival_product_is_upcoming' >
						<span class='text-danger'><?php  echo form_error('new_arrival_product_is_upcoming'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->new_arrival_product_price_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->new_arrival_product_price; ?>'  name='new_arrival_product_price' placeholder='new_arrival_product_price' >
						<span class='text-danger'><?php  echo form_error('new_arrival_product_price'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->new_arrival_product_price_has_range_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->new_arrival_product_price_has_range; ?>'  name='new_arrival_product_price_has_range' placeholder='new_arrival_product_price_has_range' >
						<span class='text-danger'><?php  echo form_error('new_arrival_product_price_has_range'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->new_arrival_product_price_starting_range_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->new_arrival_product_price_starting_range; ?>'  name='new_arrival_product_price_starting_range' placeholder='new_arrival_product_price_starting_range' >
						<span class='text-danger'><?php  echo form_error('new_arrival_product_price_starting_range'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->new_arrival_product_price_ending_range_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->new_arrival_product_price_ending_range; ?>'  name='new_arrival_product_price_ending_range' placeholder='new_arrival_product_price_ending_range' >
						<span class='text-danger'><?php  echo form_error('new_arrival_product_price_ending_range'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->new_arrival_ref_currency_id_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->new_arrival_ref_currency_id; ?>'  name='new_arrival_ref_currency_id' placeholder='new_arrival_ref_currency_id' >
						<span class='text-danger'><?php  echo form_error('new_arrival_ref_currency_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->new_arrival_is_only_image_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->new_arrival_is_only_image; ?>'  name='new_arrival_is_only_image' placeholder='new_arrival_is_only_image' >
						<span class='text-danger'><?php  echo form_error('new_arrival_is_only_image'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->new_arrival_has_image_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->new_arrival_has_image; ?>'  name='new_arrival_has_image' placeholder='new_arrival_has_image' >
						<span class='text-danger'><?php  echo form_error('new_arrival_has_image'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->new_arrival_any_validation_date_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->new_arrival_any_validation_date; ?>'  name='new_arrival_any_validation_date' placeholder='new_arrival_any_validation_date' >
						<span class='text-danger'><?php  echo form_error('new_arrival_any_validation_date'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->new_arrival_ending_validation_date_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->new_arrival_ending_validation_date; ?>'  name='new_arrival_ending_validation_date' placeholder='new_arrival_ending_validation_date' >
						<span class='text-danger'><?php  echo form_error('new_arrival_ending_validation_date'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->new_arrival_created_user_id_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->new_arrival_created_user_id; ?>'  name='new_arrival_created_user_id' placeholder='new_arrival_created_user_id' >
						<span class='text-danger'><?php  echo form_error('new_arrival_created_user_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->new_arrival_edited_user_id_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->new_arrival_edited_user_id; ?>'  name='new_arrival_edited_user_id' placeholder='new_arrival_edited_user_id' >
						<span class='text-danger'><?php  echo form_error('new_arrival_edited_user_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->new_arrival_created_date_time_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->new_arrival_created_date_time; ?>'  name='new_arrival_created_date_time' placeholder='new_arrival_created_date_time' >
						<span class='text-danger'><?php  echo form_error('new_arrival_created_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->new_arrival_edited_date_time_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->new_arrival_edited_date_time; ?>'  name='new_arrival_edited_date_time' placeholder='new_arrival_edited_date_time' >
						<span class='text-danger'><?php  echo form_error('new_arrival_edited_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->new_arrival_active_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->new_arrival_active; ?>'  name='new_arrival_active' placeholder='new_arrival_active' >
						<span class='text-danger'><?php  echo form_error('new_arrival_active'); ?></span>
					</div>

				
				
				
					<button type="submit" class="btn btn-primary btn-block">Submit</button>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
