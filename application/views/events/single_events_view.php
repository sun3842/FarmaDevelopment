<?php if (count($query_result)==0) redirect('events');?>


<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			  <?php echo $this->lang->line('event_details');?>
			</div>
			<div class="panel-body">
				<div class="form-horizontal label-right">
				  <div class="form-group">
					<label for="" class="col-sm-2"> <?php echo $this->lang->line('title');?></label>
					<div class="col-sm-10">
						<?php echo $query_result->events_name;  ?>
					</div>
				  </div>
				  <div class="form-group">
					<label for="" class="col-sm-2"> <?php echo $this->lang->line('description');?></label>
					<div class="col-sm-10">
                    <?php echo $query_result->events_description;  ?>
					</div>
				  </div>
                  <!--
				  <div class="form-group">
					<label for="" class="col-sm-2"> <?php echo $this->lang->line('type');?></label>
					<div class="col-sm-10">
					</div>
				  </div>
                  -->
				  <div class="form-group">
					<label for="" class="col-sm-2"> <?php echo $this->lang->line('duration');?></label>
					<div class="col-sm-10">
						<?php echo $query_result->events_start_date. " ".$query_result->events_start_time;  ?> - <?php echo $query_result->events_end_date. " ".$query_result->events_end_time;  ?>
					</div>
				  </div>
				  <div class="form-group">
					<label for="" class="col-sm-2"> <?php echo $this->lang->line('web_link');?></label>
					<div class="col-sm-10">
						<?php echo $query_result->event_other_web_link;  ?>
					</div>
				  </div>
				  
				  <div class="form-group">
					<label for="" class="col-sm-2"> <?php echo $this->lang->line('facebook');?></label>
					<div class="col-sm-10">
						<?php echo $query_result->event_facebook_address;  ?>
					</div>
				  </div>
				  
				  <div class="form-group">
						<label for=""><?php echo $this->lang->line('display_image');?></label>
						<div class="row">
						  <div class="col-lg-3 col-sm-4 col-6"><a href="#" title="Image 1" data-toggle="modal" data-target="#arrival-image"><img src="<?php echo base_url().$query_result->events_image_location;?>" class="thumbnail img-responsive"></a></div>
						</div>
					</div>
                   
				  <div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					  <a href="<?php echo site_url('events');?>" class="btn btn-primary btn-xs"> <?php echo $this->lang->line('back');?></a>
					</div>
				  </div>
				</div>
			</div>
		</div>
	</div>
</div>

