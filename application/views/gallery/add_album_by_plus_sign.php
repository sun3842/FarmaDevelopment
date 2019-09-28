	<link href="<?php echo base_url() ?>assets/css/uploadfile.css" rel="stylesheet">
	<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/jquery.uploadfile.js"></script>


<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo  $this->lang->line('create_album'); ?> 
			</div>
			<div class="panel-body">
			
			<div id="our_gallery">
					
				
				
							<?php echo $this->load->view($this->views_folder_name.'/gallery/add_image_form'); ?>
						
					
					  
					
					

			</div>
			</div>
		</div>	
	</div>
</div>	