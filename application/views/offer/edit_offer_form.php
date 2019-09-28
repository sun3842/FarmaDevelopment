	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo $title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_offer');
				echo form_open("edit_offer/$edit_query_result->offer_id", $attributes);
				?>
					
					<h1 class="text-center text-success"><?php echo $this->session->flashdata('msg'); ?></h1>

					<div class='form-group'>
						<label><?php echo $this->ref_offer_offer_type_id_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->ref_offer_offer_type_id; ?>'  name='ref_offer_offer_type_id' placeholder='ref_offer_offer_type_id' >
						<span class='text-danger'><?php  echo form_error('ref_offer_offer_type_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->offer_title_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_title; ?>'  name='offer_title' placeholder='offer_title' >
						<span class='text-danger'><?php  echo form_error('offer_title'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->offer_message_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_message; ?>'  name='offer_message' placeholder='offer_message' >
						<span class='text-danger'><?php  echo form_error('offer_message'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->offer_any_ending_date_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_any_ending_date; ?>'  name='offer_any_ending_date' placeholder='offer_any_ending_date' >
						<span class='text-danger'><?php  echo form_error('offer_any_ending_date'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->offer_starting_date_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_starting_date; ?>'  name='offer_starting_date' placeholder='offer_starting_date' >
						<span class='text-danger'><?php  echo form_error('offer_starting_date'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->offer_starting_time_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_starting_time; ?>'  name='offer_starting_time' placeholder='offer_starting_time' >
						<span class='text-danger'><?php  echo form_error('offer_starting_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->offer_ending_date_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_ending_date; ?>'  name='offer_ending_date' placeholder='offer_ending_date' >
						<span class='text-danger'><?php  echo form_error('offer_ending_date'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->offer_ending_time_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_ending_time; ?>'  name='offer_ending_time' placeholder='offer_ending_time' >
						<span class='text-danger'><?php  echo form_error('offer_ending_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->offer_is_push_message_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_is_push_message; ?>'  name='offer_is_push_message' placeholder='offer_is_push_message' >
						<span class='text-danger'><?php  echo form_error('offer_is_push_message'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->offer_created_by_user_id_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_created_by_user_id; ?>'  name='offer_created_by_user_id' placeholder='offer_created_by_user_id' >
						<span class='text-danger'><?php  echo form_error('offer_created_by_user_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->offer_created_date_time_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_created_date_time; ?>'  name='offer_created_date_time' placeholder='offer_created_date_time' >
						<span class='text-danger'><?php  echo form_error('offer_created_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->offer_edited_by_user_id_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_edited_by_user_id; ?>'  name='offer_edited_by_user_id' placeholder='offer_edited_by_user_id' >
						<span class='text-danger'><?php  echo form_error('offer_edited_by_user_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->offer_edited_date_time_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_edited_date_time; ?>'  name='offer_edited_date_time' placeholder='offer_edited_date_time' >
						<span class='text-danger'><?php  echo form_error('offer_edited_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->offer_send_now_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_send_now; ?>'  name='offer_send_now' placeholder='offer_send_now' >
						<span class='text-danger'><?php  echo form_error('offer_send_now'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->offer_send_later_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_send_later; ?>'  name='offer_send_later' placeholder='offer_send_later' >
						<span class='text-danger'><?php  echo form_error('offer_send_later'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->offer_send_later_date_time_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_send_later_date_time; ?>'  name='offer_send_later_date_time' placeholder='offer_send_later_date_time' >
						<span class='text-danger'><?php  echo form_error('offer_send_later_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->offer_is_already_sent_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_is_already_sent; ?>'  name='offer_is_already_sent' placeholder='offer_is_already_sent' >
						<span class='text-danger'><?php  echo form_error('offer_is_already_sent'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->offer_sending_date_time_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_sending_date_time; ?>'  name='offer_sending_date_time' placeholder='offer_sending_date_time' >
						<span class='text-danger'><?php  echo form_error('offer_sending_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->offer_active_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_active; ?>'  name='offer_active' placeholder='offer_active' >
						<span class='text-danger'><?php  echo form_error('offer_active'); ?></span>
					</div>

				
				
				
					<button type="submit" class="btn btn-primary btn-block">Submit</button>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
