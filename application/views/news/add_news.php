	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bootstrap-fileupload/bootstrap-fileupload.css" />
	<style>
.error{color:red;}
</style>
<div class="row">

	<div class="col-lg-12">
    
    
    

     <div class="panel panel-default">
        
			<div class="panel-heading">
				<?php echo $this->lang->line('menu_new_news');?>
                
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_news');
				echo form_open_multipart("add_new_news", $attributes);
				?>
					<?php if (isset($message)) : ?>
						<h1 class="text-center text-success"><?php echo $message;?></h1>	<br/>
					<?php endif; ?>

					<div class='form-group'>
						<label><?php echo $this->lang->line('news_title');?></label><span class='text-danger'>*</span>
						<input type='text' class='form-control'   name='news_title' placeholder='<?php echo $this->lang->line('news_title');?>' >
						<span class='text-danger'><?php  echo form_error('news_title'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->lang->line('news_details');?></label><span class='text-danger'>*</span>
						<textarea class='form-control'   name='news_description' placeholder='<?php echo $this->lang->line('news_details');?>' rows="10" > </textarea>
						<span class='text-danger'><?php  echo form_error('news_description'); ?></span>
					</div>
                    
				<div class="form-group avater">
									<h4><?php echo $this->lang->line('display_image');?></h4>
									<div class="fileupload fileupload-new" data-provides="fileupload">
										<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
											<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
										</div>
										<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
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
								<?php echo $this->lang->line('send');?><i class="fa fa-send fa-spacing-left"></i>
                                </button>
					</center>
				<?php echo form_close(); ?>
				
			</div>
       
		</div>
        
        
        
        
        
        
    
        
       
	</div>
</div>
