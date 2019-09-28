	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bootstrap-fileupload/bootstrap-fileupload.css" />

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo $this->lang->line('add_new_arrival');?>
			</div>
			<div class="panel-body">
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_new_arrival');
				echo form_open_multipart("edit_new_arrival/".$new_arrival['new_arrival_id'], $attributes);
				?>
					<?php if (isset($message)) : ?>
						<h1 class="text-center text-success"><?php echo $message;?></h1>	<br/>
					<?php endif; ?>
                    <input type="hidden" name="hidden_new_arrival_id" value="<?php echo $new_arrival['new_arrival_id'];?>" />
					<div class='form-group'>
						<label><?php echo $this->lang->line('title');?></label><span class='text-danger'>*</span>
						<input type='text' class='form-control'   name='new_arrival_product_name_title' placeholder='<?php echo $this->lang->line('title');?>' value="<?php echo $new_arrival['new_arrival_product_name_title'];?>" >
						<span class='text-danger'><?php  echo form_error('new_arrival_product_name_title'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('description');?></label><span class='text-danger'>*</span>
                        <textarea class='form-control'    name='new_arrival_product_description'  ><?php echo $new_arrival['new_arrival_product_description'];?> </textarea>
						<span class='text-danger'><?php  echo form_error('new_arrival_product_description'); ?></span>
					</div>
                    <?php
					$index_value=$new_arrival['new_arrival_product_is_in_stock']==1?1:($new_arrival['new_arrival_product_is_upcoming']==1?2:0);
					?>
					<div class='form-group'>
						<label><?php echo $this->lang->line('status');?></label>
                        <?php echo  form_dropdown('new_arrival_product_is_in_stock', $this->new_arrival_status_array,$index_value,'class="form-control" id=""');?>
						<span class='text-danger'><?php  echo form_error('new_arrival_product_is_in_stock'); ?></span>
					</div>
                    <?php
					$index_price=$new_arrival['new_arrival_product_price']!=0?1:($new_arrival['new_arrival_product_price_has_range']==1?2:0)
					?>
					<div class='form-group'>
						<label><?php echo $this->lang->line('price');?></label>
                         <?php echo  form_dropdown('new_arrival_product_price', $this->new_arrival_price_array,$index_price,'class="form-control" id="new_arrival_product_price_id"');?>
					</div>
                    <div id="new_arrival_fixed_price_div" class="col-md-offset-1 col-lg-offset-1 col-sm-offset-1" <?php echo $index_price==1?"":'style="display:none;"';?>>
					<div class="form-group">
						<label for=""><?php echo $this->lang->line('fixed_price');?></label>
						<input   type="number" step="0.01" class="form-control" name="fixed_price" id="" placeholder="<?php echo $this->lang->line('fixed_price');?>" onkeydown="return ( event.ctrlKey || event.altKey 
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )" value="<?php echo $new_arrival['new_arrival_product_price'];?>">
					</div>
                    </div>
                    
                    <div id="new_arrival_range_price_div" class="col-md-offset-1 col-lg-offset-1 col-sm-offset-1" <?php echo $index_price==2?"":'style="display:none;"';?>>
					<div class="form-group form-inline">
						<?php echo $this->lang->line('price_range');?> <input type="number" step="0.01" class="form-control" name="price_starting_from" id="" placeholder="<?php echo $this->lang->line('from');?>" onkeydown="return ( event.ctrlKey || event.altKey 
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )" value="<?php echo $new_arrival['new_arrival_product_price_starting_range'];?>" > - 
						<input type="number" step="0.01" class="form-control" name="price_starting_to" id="" placeholder="<?php echo $this->lang->line("to");?>" onkeydown="return ( event.ctrlKey || event.altKey 
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )" value="<?php echo $new_arrival['new_arrival_product_price_ending_range'];?>">
					</div>
                    </div>
					<div class='form-group'>
						<label><?php echo $this->lang->line('currency');?></label>
                        <?php echo  form_dropdown('new_arrival_ref_currency_id', $this->new_arrival_currency_array,$new_arrival['new_arrival_ref_currency_id'],'class="form-control" id=""');?>
						<span class='text-danger'><?php  echo form_error('new_arrival_ref_currency_id'); ?></span>
					</div>
					<div class='form-group'>
						<label><?php echo $this->lang->line('available_until');?></label>
						<input type='text' class='form-control'   name='new_arrival_ending_validation_date' id="new_arrival_ending_validation_date" value="<?php echo $new_arrival['new_arrival_ending_validation_date'];?>">
						<span class='text-danger'><?php  echo form_error('new_arrival_ending_validation_date'); ?></span>
					</div>
					
                    <!--
					<div class="form-group">
						<label for="">Upload Other Image</label>
						<input id="display-other-image" type="file" class="file" data-preview-file-type="text" multiple=true>
					</div>
					<div class="form-group form-inline form-attr">
						<label for="Currency">Add Attributes for product</label><br/>
						<input type="text" class="form-control" name="" id="" placeholder="Attribute name">
						<input type="text" class="form-control" name="" id="" placeholder="Attribute value">
					</div>
					<span id="add-more-attr">Add More</span><br/><br/>
                    -->
                    
                    <div class="form-group avater">
									<h4><?php echo $this->lang->line('display_image');?></h4>
									<div class="fileupload fileupload-new" data-provides="fileupload">
										<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                        <?php if ($new_arrival['new_arrival_image_name_as_saved']==NULL)
										{
											?>
											<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                            <?php
										}
										else
										{
											?>
                                            <img src="<?php echo base_url();?>all_images/image_new/original_image/<?php echo $new_arrival['new_arrival_image_name_as_saved'];?>" alt="" />
                                            <?php
										}
										?>
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
                        
                        <!--
                        <div class="form-group ">
									<label class="col-sm-3 control-label"><h4>Upload Documents  <span class="req"> * </span></h4> </label>
									<div class="fileupload fileupload-new col-sm-5" data-provides="fileupload">
										
										<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
										</div>
										<div>
										   <span class="btn btn-white btn-file">
										   <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select Files</span>
										   <span class="fileupload-exists"><i class="fa fa-undo"></i> Change Files</span>
										   <input type="file" class="default required" name="documents_name_0" id="documents_name"/>
                                           
										   </span>
											<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i>Remove Files</a>
                                            <span id="documents_name_error"></span>
										</div>
									</div>
												
			</div>    
            
            -->    
                    
					<center>
								<button class="btn-send">
								<?php echo $this->lang->line('update');;?><i class="fa fa-send fa-spacing-left"></i>
                                </button>
							</center>
				<?php echo form_close(); ?>
			</div>
		</div>	
	</div>
</div>	

