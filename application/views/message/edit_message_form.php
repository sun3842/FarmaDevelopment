	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo $title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_message');
				echo form_open("edit_message/$edit_query_result->message_id", $attributes);
				?>
					
						<h1 class="text-center text-success"><?php echo $this->session->flashdata('msg'); ?></h1>
					

					<div class='form-group'>
						<label><?php echo $this->ref_message_message_type_id_label ?></label>
						<select name="ref_message_message_type_id" class="form-control">
							
							<?php foreach($message_type_query as $row): ?>
							<option value="<?php echo $row->message_type_id; ?>"><?php echo $row->message_type_name; ?></option>
							<?php endforeach; ?>
						</select>
                                                <span class='text-danger'><?php  echo form_error('ref_message_message_type_id'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->message_title_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->message_title; ?>'  name='message_title' placeholder='message_title' >
						<span class='text-danger'><?php  echo form_error('message_title'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->message_details_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->message_details; ?>'  name='message_details' placeholder='message_details' >
						<span class='text-danger'><?php  echo form_error('message_details'); ?></span>
					</div>
					<div class='form-group'>
						<label><?php echo $this->message_any_ending_date_label ?></label>
						<?php echo  form_dropdown('message_any_ending_date', array('1'=>'Yes','0'=>'No'),$edit_query_result->message_any_ending_date,'class="form-control" id=""');?>
						<span class='text-danger'><?php  echo form_error('message_any_ending_date'); ?></span>
					</div>
					
					<div class='form-group'>
						<label><?php echo $this->message_ending_date_label ?></label>
						<input type='text' class='form-control' id="date"  value='<?php echo $edit_query_result->message_ending_date; ?>'  name='message_ending_date' placeholder='message_ending_date' >
						<span class='text-danger'><?php  echo form_error('message_ending_date'); ?></span>
					</div>
					<div class='form-group'>
						<label><?php echo $this->message_ending_time_label ?></label>
						<input type='text' class='form-control' id="time"  value='<?php echo $edit_query_result->message_ending_time; ?>'  name='message_ending_time' placeholder='message_ending_time' >
						<span class='text-danger'><?php  echo form_error('message_ending_time'); ?></span>
					</div>
					
					
					<div class='form-group'>
						<label><?php echo $this->message_is_push_message_label ?></label>
						<?php echo  form_dropdown('message_is_push_message', array('1'=>'Yes','0'=>'No'),$edit_query_result->message_is_push_message,'class="form-control" id=""');?>
						<span class='text-danger'><?php  echo form_error('message_is_push_message'); ?></span>
					</div>
					<div class='form-group'>
						<label><?php echo $this->message_send_now_label ?></label>
						<?php echo  form_dropdown('message_send_now', array('1'=>'Yes','0'=>'No'),$edit_query_result->message_send_now,'class="form-control" id=""');?>
						<span class='text-danger'><?php  echo form_error('message_send_now'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->message_send_later_label ?></label>
						<?php echo  form_dropdown('message_send_later', array('1'=>'Yes','0'=>'No'),$edit_query_result->message_send_later,'class="form-control" id=""');?>
						<span class='text-danger'><?php  echo form_error('message_send_later'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->message_send_later_date_time_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->message_send_later_date_time; ?>'  name='message_send_later_date_time' placeholder='message_send_later_date_time' >
						<span class='text-danger'><?php  echo form_error('message_send_later_date_time'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->message_is_already_sent_label ?></label>
						<?php echo  form_dropdown('message_is_already_sent', array('1'=>'Yes','0'=>'No'),$edit_query_result->message_is_already_sent,'class="form-control" id=""');?>
						<span class='text-danger'><?php  echo form_error('message_is_already_sent'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->message_sending_date_time_label ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->message_sending_date_time; ?>'  name='message_sending_date_time' placeholder='message_sending_date_time' >
						<span class='text-danger'><?php  echo form_error('message_sending_date_time'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->message_any_attached_file_label ?></label>
						<?php echo  form_dropdown('message_any_attached_file', array('1'=>'Yes','0'=>'No'),$edit_query_result->message_any_attached_file,'class="form-control" id=""');?>
						<span class='text-danger'><?php  echo form_error('message_any_attached_file'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->message_active_label ?></label>
						<?php echo  form_dropdown('message_active', array('1'=>'Yes','0'=>'No'), $edit_query_result->message_active,'class="form-control" id=""');?>
						<span class='text-danger'><?php  echo form_error('message_active'); ?></span>
					</div>
				
				
				
					<button type="submit" class="btn btn-primary btn-block">Submit</button>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
