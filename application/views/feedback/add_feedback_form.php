	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo $title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_feedback');
				echo form_open("Feedback/create_feedback", $attributes);
				?>
					<?php if (isset($message)) : ?>
						<h1 class="text-center text-success">Data Inserted successfully</h1>	<br/>
					<?php endif; ?>

					<div class='form-group'>
						<label><?php echo $this->ref_feedback_app_user_id_label ?></label>
						<input type='text' class='form-control'   name='ref_feedback_app_user_id' placeholder='<?php echo $this->ref_feedback_app_user_id_label ?>' >
						<span class='text-danger'><?php  echo form_error('ref_feedback_app_user_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->feedback_rating_score_label ?></label>
						<input type='text' class='form-control'   name='feedback_rating_score' placeholder='<?php echo $this->feedback_rating_score_label ?>' >
						<span class='text-danger'><?php  echo form_error('feedback_rating_score'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->feedback_note_label ?></label>
						<input type='text' class='form-control'   name='feedback_note' placeholder='<?php echo $this->feedback_note_label ?>' >
						<span class='text-danger'><?php  echo form_error('feedback_note'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->feedback_giving_date_time_label ?></label>
						<input type='text' class='form-control'   name='feedback_giving_date_time' placeholder='<?php echo $this->feedback_giving_date_time_label ?>' >
						<span class='text-danger'><?php  echo form_error('feedback_giving_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->feedback_is_approved_by_admin_label ?></label>
						<input type='text' class='form-control'   name='feedback_is_approved_by_admin' placeholder='<?php echo $this->feedback_is_approved_by_admin_label ?>' >
						<span class='text-danger'><?php  echo form_error('feedback_is_approved_by_admin'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->feedback_auto_approved_label ?></label>
						<input type='text' class='form-control'   name='feedback_auto_approved' placeholder='<?php echo $this->feedback_auto_approved_label ?>' >
						<span class='text-danger'><?php  echo form_error('feedback_auto_approved'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->feedback_is_approved_by_user_id_label ?></label>
						<input type='text' class='form-control'   name='feedback_is_approved_by_user_id' placeholder='<?php echo $this->feedback_is_approved_by_user_id_label ?>' >
						<span class='text-danger'><?php  echo form_error('feedback_is_approved_by_user_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->feedback_replied_message_label ?></label>
						<input type='text' class='form-control'   name='feedback_replied_message' placeholder='<?php echo $this->feedback_replied_message_label ?>' >
						<span class='text-danger'><?php  echo form_error('feedback_replied_message'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->feedback_is_public_label ?></label>
						<input type='text' class='form-control'   name='feedback_is_public' placeholder='<?php echo $this->feedback_is_public_label ?>' >
						<span class='text-danger'><?php  echo form_error('feedback_is_public'); ?></span>
					</div>

				
				
				
					<button type="submit" class="btn btn-primary btn-block">Submit</button>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
