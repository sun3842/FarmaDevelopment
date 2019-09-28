	<link href="<?php echo base_url() ?>assets/css/uploadfile.css" rel="stylesheet">
	<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/jquery.uploadfile.js"></script>


<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			<?php echo	$title; ?>
			</div>
			<div class="panel-body">
			
			<div id="our_gallery">
					
					<ul id="myTab" class="nav nav-tabs">
					   <li class="active">
						  <a href="#upload_photo" data-toggle="tab"><?php echo  $this->lang->line('upload_photo'); ?> </a>
					   </li>
					   <!--<li><a href="#create_album" data-toggle="tab"><?php echo  $this->lang->line('create_album'); ?>  </a></li>-->
					
					</ul>
					<div id="myTabContent" class="tab-content">
					   <div class="tab-pane fade in active" id="upload_photo">
						
							<?php echo $this->load->view($this->views_folder_name.'/gallery/add_new_gallery_form'); ?>
						
					   </div>
					   <div class="tab-pane fade" id="create_album">
						
							<?php echo $this->load->view($this->views_folder_name.'/gallery/add_image_form'); ?>
						
					   </div>
					  
					</div>
					

			</div>
			</div>
		</div>	
	</div>
</div>	