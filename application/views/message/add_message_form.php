<style type="text/css">
	.datepicker-dropdown{
		position:absolute !important;
		
		}
	#group_lawyer_name_text_field
	{
		width:300px;
		border:solid 1px orange;
		padding:5px;
		font-size:14px;
	}
	#result #result_personal_client #result_company_client
	{
		position:relative;
		width:auto;
		display:none;
		margin-top:-1px;
		border-top:0px;
		overflow:hidden;
		border:1px #4fc0e9 solid;
		background-color: white;
		border-top: 0;
		
	}
	.show
	{
		padding:10px; 
		
		font-size:15px; 
		height:auto;
	}
	.show:hover
	{
		background:#4fc0e9;
		color:#FFF;
		cursor:pointer;
	}
	.show span{
		padding: 15px 0;
	}
	.error{
		color:#F00 !important;
	}
</style>	
<div class="row">

	<div class="col-lg-12">
    
    
    

     <div class="tab-content">
     
		<div class="panel panel-default tab-pane <?php echo $general_active_tab;?>"  role="tabpanel"  id="panel-1">
        
			<div class="panel-heading">
				<?php echo $this->lang->line('general_message');?>
                
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_message');
				echo form_open("add_new_message", $attributes);
				?>
					<?php if (isset($message)) : ?>
						<h1 class="text-center text-success"><?php echo $message;?></h1>	<br/>
					<?php endif; ?>

					<div class='form-group'>
						<label><?php echo $this->lang->line('title');?></label><span class='text-danger'>*</span>
						<input type='text' class='form-control'   name='message_title' placeholder='<?php echo $this->lang->line('title');?>' >
						<span class='text-danger'><?php  echo form_error('message_title'); ?></span>
					</div><div class='form-group'>
						<label><?php echo $this->lang->line('details');?></label><span class='text-danger'>*</span>
						<textarea class='form-control'   name='message_details' placeholder='<?php echo $this->lang->line('details');?>' > </textarea>
						<span class='text-danger'><?php  echo form_error('message_details'); ?></span>
					</div>
                    
					<div class='form-group'>
						<label><?php echo $this->lang->line('is_push');?></label><span class='text-danger'>*</span>
						<?php echo  form_dropdown('message_is_push_message', array('1'=>$this->lang->line('yes'),'0'=>$this->lang->line('no')),1,'class="form-control" id=""');?>
						<span class='text-danger'><?php  echo form_error('message_is_push_message'); ?></span>
					</div>
				<!--
					<div class='form-group'>
						<label><?php echo $this->lang->line('send_now');?></label><span class='text-danger'>*</span>
						<?php echo  form_dropdown('message_send_now', array('1'=>$this->lang->line('yes'),'0'=>$this->lang->line('no')),1,'class="form-control" id="message_send_now_common"');?>
						<span class='text-danger'><?php  echo form_error('message_send_now'); ?></span>
					</div>
                    -->
                    <!--
                    <div class='form-group'>
						<label><?php echo $this->lang->line('send_now');?></label><span class='text-danger'>*</span>
						<?php echo  form_dropdown('message_send_now', array('1'=>$this->lang->line('yes')),1,'class="form-control" id="message_send_now_common"');?>
						<span class='text-danger'><?php  echo form_error('message_send_now'); ?></span>
					</div>
                    
                    <div id="message_send_later_date_time_common_div" class="col-md-offset-1 col-lg-offset-1 col-sm-offset-1" style="display:none;">
					<div class='form-group'>
						<label><?php echo $this->lang->line('send_later_date_time');?></label><span class='text-danger'>*</span>
						<input type='text' class='form-control'   name='message_send_later_date_time' placeholder='<?php echo $this->lang->line('send_later_date_time');?>' >
						<span class='text-danger'><?php  echo form_error('message_send_later_date_time'); ?></span>
					</div>
                    </div>
                    -->
				
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
</div>
