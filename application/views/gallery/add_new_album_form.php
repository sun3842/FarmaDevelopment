<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			<?php echo $title; ?>
			</div>
			<div class="panel-body">
				<div id="our_gallery">
					<div role="tabpanel" class="tab-pane" id="create_album">
						<form style="padding:15px 0px;" id="fileupload1" action="" method="POST"  >
								<?php if (isset($message)) : ?>
								<h1 class="text-center text-success"><?php  echo $message; ?></h1>	<br/>
								<?php endif; ?>
							<div class="form-group">
								<label for="">Album name</label>
								<input type="text" class="form-control" name="image_album_name" id="" placeholder="Album name">
								<span class="text-danger"><?php  echo form_error('image_album_name'); ?></span>
							</div>
							<div class="form-group">
								<label for="">Adbum description</label>
								<textarea class="form-control" rows="3" name="image_album_description" placeholder="Adbum Description"></textarea>
								<span class="text-danger"><?php  echo form_error('image_album_description'); ?></span>
							</div>
							<div class="form-group">
								<div class="row fileupload-buttonbar">
									<div class="col-lg-7">
										<button type="submit" class="btn btn-primary start">
										<i class="glyphicon glyphicon-upload"></i>
										<span>Create Album</span>
										</button>										
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>	