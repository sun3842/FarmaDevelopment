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
			
				$attributes = array('method' => 'POST', 'id' => 'form_about_us');
				echo form_open_multipart("about_us_page", $attributes);
				?>
					<?php if (isset($message)) : ?>
						<h1 class="text-center text-success"><?php echo $message;?></h1>	<br/>
					<?php endif; ?>

					<div class='form-group'>
						<label><?php echo $this->lang->line('about_us_details');?></label><span class='text-danger'>*</span>
						<textarea class='form-control'   name='about_us_details' placeholder='<?php echo $this->lang->line('about_us_details');?>' rows="10" ><?php echo array_key_exists('about_us_details',$row)?$row['about_us_details']:"";?> </textarea>
						<span class='text-danger'><?php  echo form_error('about_us_details'); ?></span>
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
