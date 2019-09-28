<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo  $news_details['news_title'];?>
			</div>
			<div class="panel-body">
				<form action="" method="">
					<div class="form-group">
						<label for="Title"><?php echo $this->lang->line('news_title');?></label><br/>
						<b><?php echo $news_details['news_title'];?></b>
					</div>
					<div class="form-group">
						<label for="Description"><?php echo $this->lang->line('news_details');?></label><br/>
                        <?php echo $news_details['news_description'];?>
					</div>
					
					
					<div class="form-group">
						<label for="Currency"><b><?php echo $this->lang->line('creating_date_time');?> :</b></label>
						<label class="radio-inline"><?php echo $news_details['news_created_edited_date_time'];?></label>
					</div>
              
					<div class="form-group">
						<label for=""><?php echo $this->lang->line('display_image');?></label>
						<div class="row">
						  <div class="col-lg-3 col-sm-4 col-6"><a href="#" title="Image 1" data-toggle="modal" data-target="#arrival-image"><img src="<?php echo base_url().$news_details['news_image_location'];?>" class="thumbnail img-responsive"></a></div>
						</div>
					</div>
                   
                    
                   
					<div class="form-group form-inline form-attr">
                    <a href="<?php echo site_url('all_news');?>" class="btn btn-primary btn-xs"><?php echo $this->lang->line('back');?></a>
					</div>
				</form>
			</div>
		</div>	
	</div>
</div> 