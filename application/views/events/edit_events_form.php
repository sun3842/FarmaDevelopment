
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo $this->lang->line('modify_info');?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'Event_form');
				echo form_open("edit_events/$edit_query_result->events_id", $attributes);
				?>
					
						<h1 class="text-center text-success"><?php echo $this->session->flashdata('msg'); ?></h1>	<br/>
				
					<div class="form-group">
						<label for=""> <?php echo $this->lang->line('title');?></label>
						<input type="text" class="form-control" value="<?php echo $edit_query_result->events_name; ?>"  name="events_name" placeholder=" <?php echo $this->lang->line('title');?>" >
						<span class="text-danger"><?php  echo form_error('events_name'); ?></span>
					</div>
					<div class="form-group">
						<label for=""> <?php echo $this->lang->line('description');?></label>
						<textarea class="form-control" rows="3" name="events_description" placeholder=" <?php echo $this->lang->line('description');?>"><?php echo $edit_query_result->events_description; ?>
						</textarea>
						<span class="text-danger"><?php  echo form_error('events_description'); ?></span>
					</div>
                    <!--
					<div class="form-group">
						<label for=""> <?php echo $this->lang->line('type');?></label>

						<select name="ref_events_event_type_id" class="form-control">
							
							<?php foreach($event_type_query as $row): ?>
							<option value="<?php echo $row->event_type_id; ?>"><?php echo $row->event_type_name; ?></option>
							<?php endforeach; ?>
						</select>
						<span class="text-danger"><?php  echo form_error('ref_events_event_type_id'); ?></span>
					</div>
                    -->
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label for=""> <?php echo $this->lang->line('starting_date');?></label>
								<input type="text" class="form-control" value="<?php echo $edit_query_result->events_start_date; ?>" name="events_start_date" id="events_start_date" placeholder=" <?php echo $this->lang->line('starting_date');?>">
								<span class="text-danger"><?php  echo form_error('events_start_date'); ?></span>
							</div>
							<div class="col-sm-6">
								<label for=""> <?php echo $this->lang->line('starting_time');?></label>
								<input type="text" class="form-control" value="<?php echo $edit_query_result->events_start_time; ?>" name="events_start_time" id="events_start_time" placeholder=" <?php echo $this->lang->line('starting_time');?>">
								<span class="text-danger"><?php  echo form_error('events_start_time'); ?></span>

							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label for=""> <?php echo $this->lang->line('ending_date');?></label>
								<input type="text" class="form-control" value="<?php echo $edit_query_result->events_end_date; ?>" name="events_end_date" id="events_end_date" placeholder=" <?php echo $this->lang->line('ending_date');?>">
								<span class="text-danger"><?php  echo form_error('events_end_date'); ?></span>
							</div>
							<div class="col-sm-6">
								<label for=""> <?php echo $this->lang->line('ending_time');?></label>
								<input type="text" class="form-control" value="<?php echo $edit_query_result->events_end_time; ?>" name="events_end_time"  id="events_end_time" placeholder=" <?php echo $this->lang->line('ending_time');?>">
								<span class="text-danger"><?php  echo form_error('events_end_time'); ?></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for=""> <?php echo $this->lang->line('web_link');?></label>
						<input type="text" class="form-control" value="<?php echo $edit_query_result->event_other_web_link; ?>" name="event_other_web_link" id="" placeholder=" <?php echo $this->lang->line('web_link');?>">
					</div>
					<center>
								<button class="btn-send">
								 <?php echo $this->lang->line('update');?><i class="fa fa-send fa-spacing-left"></i>
                                </button>
					</center>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
