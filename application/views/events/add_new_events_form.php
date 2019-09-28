	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bootstrap-fileupload/bootstrap-fileupload.css" />
	<style>
.error{color:red;}
</style>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo $this->lang->line("add_new_event");?>
			</div>
			<div class="panel-body">
			
				<?php 
				$attributes = array('method' => 'POST', 'id' => 'Event_form');
				echo form_open_multipart('add_new_events', $attributes);
				?>
					<?php if (isset($message)) : ?>
						<h1 class="text-center text-success"><?php echo $message;?></h1></CENTER>	<br/>
					<?php endif; ?>
					<div class="form-group">
						<label for=""><?php echo $this->lang->line('title');?></label>
						<input type="text" class="form-control"  name="events_name" placeholder="<?php echo $this->lang->line('title');?>" >
						<span class="text-danger"><?php  echo form_error('events_name'); ?></span>
					</div>
					<div class="form-group">
						<label for=""><?php echo $this->lang->line('description');?></label>
						<textarea class="form-control" rows="3" name="events_description" placeholder="<?php echo $this->lang->line('description');?>"></textarea>
						<span class="text-danger"><?php  echo form_error('events_description'); ?></span>
					</div>
                   <div class="form-group">
						<label for=""><?php echo $this->lang->line('place');?></label>
						<input type="text" class="form-control" name="events_place" id="" placeholder="<?php echo $this->lang->line('place');?>">
					</div>
                    <!--
					<div class="form-group">
						<label for=""><?php echo $this->lang->line('type');?></label>

						<select name="ref_events_event_type_id" class="form-control">
							<option value=""><?php echo $this->lang->line('select_event_type');?></option>
							<?php foreach($event_type_query->result() as $row): ?>
							<option value="<?php echo $row->event_type_id; ?>"><?php echo $row->event_type_name; ?></option>
							<?php endforeach; ?>
						</select>
						<span class="text-danger"><?php  echo form_error('ref_events_event_type_id'); ?></span>
					</div>
                    -->
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label for=""><?php echo $this->lang->line('starting_date');?></label>
								<input type="text" class="form-control" name="events_start_date" id="events_start_date" placeholder="<?php echo $this->lang->line('starting_date');?>">
								<span class="text-danger"><?php  echo form_error('events_start_date'); ?></span>
							</div>
							<div class="col-sm-6">
								<label for=""><?php echo $this->lang->line('starting_time');?></label>
								<input type="text" class="form-control" name="events_start_time" id="events_start_time" placeholder="<?php echo $this->lang->line('starting_time');?>">
								<span class="text-danger"><?php  echo form_error('events_start_time'); ?></span>

							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label for=""><?php echo $this->lang->line('ending_date');?></label>
								<input type="text" class="form-control" name="events_end_date" id="events_end_date" placeholder="<?php echo $this->lang->line('ending_date');?>">
								<span class="text-danger"><?php  echo form_error('events_end_date'); ?></span>
							</div>
							<div class="col-sm-6">
								<label for=""><?php echo $this->lang->line('ending_time');?></label>
								<input type="text" class="form-control" name="events_end_time"  id="events_end_time" placeholder="<?php echo $this->lang->line('ending_time');?>">
								<span class="text-danger"><?php  echo form_error('events_end_time'); ?></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for=""><?php echo $this->lang->line('web_link');?></label>
						<input type="text" class="form-control" name="event_other_web_link" id="" placeholder="<?php echo $this->lang->line('web_link');?>">
					</div>
					<div class="form-group">
						<label for=""><?php echo $this->lang->line('facebook');?></label>
						<input type="text" class="form-control" name="event_facebook_address" id="" placeholder="<?php echo $this->lang->line('facebook');?>">
					</div>
					
					<div class="form-group avater" align="center">
									<h4><?php echo $this->lang->line('display_image');?></h4>
									<div class="fileupload fileupload-new" data-provides="fileupload">
										<div class="fileupload-new thumbnail" style="width: 400px; height: 300px;">
											<img src="http://www.placehold.it/400x300/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
										</div>
										<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 400px; max-height: 300px; line-height: 20px;">
										</div>
										<div>
										   <span class="btn btn-white btn-file">
										   <span class="fileupload-new"><i class="fa fa-paper-clip"></i><?php echo $this->lang->line('browse');?></span>
										   <span class="fileupload-exists"><i class="fa fa-undo"></i> <?php echo $this->lang->line('change');?></span>
										   <input type="file" class="default" name="userfile" />
										   </span>
											<span class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i><?php echo $this->lang->line('remove');?></span>
										</div>
									</div>
														
								</div>
					<center>
								<button class="btn-send">
								<?php echo $this->lang->line('save');?><i class="fa fa-send fa-spacing-left"></i>
                                </button>
					</center>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
