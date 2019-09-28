<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			<?php echo $title; ?>
			</div>
			<div class="panel-body">
				<div id="our_gallery">
					<div role="tabpanel" class="tab-pane" id="create_album">
						<?php 
							$attributes = array('method' => 'POST', 'id' => 'Event_form');
							echo form_open("edit_album/$edit_query_result->image_album_id ", $attributes);
							?>
								<?php if (isset($message)) : ?>
								<h1 class="text-center text-success"><?php  echo $message; ?></h1>	<br/>
								<?php endif; ?>
							<div class="form-group">
								<label for=""><?php echo  $this->lang->line('album_name'); ?></label>
								<input type="text" class="form-control" name="image_album_name" value="<?php echo $edit_query_result->image_album_name; ?>" id="" placeholder="<?php echo  $this->lang->line('album_name'); ?>">
								<span class="text-danger"><?php  echo form_error('image_album_name'); ?></span>
							</div>
							<div class="form-group">
								<label for=""><?php echo  $this->lang->line('album_desc'); ?></label>
								<textarea class="form-control" rows="3" name="image_album_description"   placeholder="<?php echo  $this->lang->line('album_desc'); ?>"><?php echo $edit_query_result->image_album_description; ?></textarea>
								<span class="text-danger"><?php  echo form_error('image_album_description'); ?></span>
							</div>
							<div class="form-group">
								<div class="row fileupload-buttonbar">
									<div class="col-lg-7">
										<button type="submit" class="btn btn-primary start">
										<i class="glyphicon glyphicon-upload"></i>
										<span><?php echo  $this->lang->line('edit_album'); ?></span>
										</button>										
									</div>
								</div>
							</div>
							<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>	