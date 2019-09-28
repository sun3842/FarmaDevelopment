	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo $title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_feedback');
				echo form_open("edit_feedback/$edit_query_result->feedback_id", $attributes);
				?>
					
					<h1 class="text-center text-success"><?php echo $this->session->flashdata('msg'); ?></h1>

					<div class='form-group'>
						<label><?php echo $this->ref_feedback_app_user_id_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->ref_feedback_app_user_id; ?>'  name='ref_feedback_app_user_id' placeholder='ref_feedback_app_user_id' >
						<span class='text-danger'><?php  echo form_error('ref_feedback_app_user_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->feedback_rating_score_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->feedback_rating_score; ?>'  name='feedback_rating_score' placeholder='feedback_rating_score' >
						<span class='text-danger'><?php  echo form_error('feedback_rating_score'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->feedback_note_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->feedback_note; ?>'  name='feedback_note' placeholder='feedback_note' >
						<span class='text-danger'><?php  echo form_error('feedback_note'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->feedback_giving_date_time_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->feedback_giving_date_time; ?>'  name='feedback_giving_date_time' placeholder='feedback_giving_date_time' >
						<span class='text-danger'><?php  echo form_error('feedback_giving_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->feedback_is_approved_by_admin_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->feedback_is_approved_by_admin; ?>'  name='feedback_is_approved_by_admin' placeholder='feedback_is_approved_by_admin' >
						<span class='text-danger'><?php  echo form_error('feedback_is_approved_by_admin'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->feedback_auto_approved_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->feedback_auto_approved; ?>'  name='feedback_auto_approved' placeholder='feedback_auto_approved' >
						<span class='text-danger'><?php  echo form_error('feedback_auto_approved'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->feedback_is_approved_by_user_id_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->feedback_is_approved_by_user_id; ?>'  name='feedback_is_approved_by_user_id' placeholder='feedback_is_approved_by_user_id' >
						<span class='text-danger'><?php  echo form_error('feedback_is_approved_by_user_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->feedback_replied_message_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->feedback_replied_message; ?>'  name='feedback_replied_message' placeholder='feedback_replied_message' >
						<span class='text-danger'><?php  echo form_error('feedback_replied_message'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->feedback_is_public_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->feedback_is_public; ?>'  name='feedback_is_public' placeholder='feedback_is_public' >
						<span class='text-danger'><?php  echo form_error('feedback_is_public'); ?></span>
					</div>

				
				
				
					<button type="submit" class="btn btn-primary btn-block">Submit</button>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
