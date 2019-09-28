

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo $this->lang->line('branch_add_page_title');?>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<div class="row">
                        <?php 
						$attributes = array('method' => 'POST', 'id' => 'form_add_new_branch');
						echo form_open("edit_branch/".$branch_details['branch_id'], $attributes);
						?>
							<div class="col-sm-5">
								
                        <?php if (isset($message)) : ?>
						  <h1 class="text-center text-success"><?php echo $message;?></h1>	<br/>
					   <?php endif; ?>
									<div style="border:1px solid #f0f0f0;padding:10px;">
									<div class="form-group">
										<label for="exampleInputEmail1"><?php echo $this->lang->line('branch_name_label');?></label><span class='text-danger'>*</span>
										<input class="form-control" type="text" name="branch_name" value="<?php echo $branch_details['branch_name'];?>" />
                                        <span class='text-danger'><?php  echo form_error('branch_name'); ?></span>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1"><?php echo $this->lang->line('branch_type_label');?></label><span class='text-danger'>*</span>
						  <?php echo  form_dropdown('branch_type', $this->branch_type_array,NULL,'class="form-control" id=""');?>

                                        <span class='text-danger'><?php  echo form_error('branch_type'); ?></span>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1"><?php echo $this->lang->line('branch_address_label');?></label><span class='text-danger'>*</span>
										<textarea class="form-control" name="branch_address" id="" cols="30" rows="2" ><?php echo $branch_details['branch_address'];?></textarea>
                                        <span class='text-danger'><?php  echo form_error('branch_address'); ?></span>
									</div>
									<div class="form-group">
										<label for="City"><?php echo $this->lang->line('branch_city_label');?></label><span class='text-danger'>*</span>
										<input class="form-control" type="text" name="branch_city" value="<?php echo $branch_details['branch_city'];?>"/>
                                        <span class='text-danger'><?php  echo form_error('branch_city'); ?></span>
									</div>
									<div class="form-group">
										<label for=""><?php echo $this->lang->line('branch_post_code_label');?></label><span class='text-danger'>*</span>
										<input class="form-control" type="text" name="branch_post_code" value="<?php echo $branch_details['branch_post_code'];?>"/>
                                        <span class='text-danger'><?php  echo form_error('branch_post_code'); ?></span>
									</div>
									<div class="form-group">
										<label for=""><?php echo $this->lang->line('branch_region_label');?></label>
										<input class="form-control" name="branch_region" type="text" value="<?php echo $branch_details['branch_region'];?>"/>
									</div>
									<div class="form-group">
										<label for=""><?php echo $this->lang->line('branch_country_label');?></label>
									<?php echo  form_dropdown('branch_country', $this->branch_country_array,0,'class="form-control" id=""');?>
									</div>
									
                                    
									</div>
									
									
									
							</div>
							<div class="col-sm-7">
								
                                
                                <div style="border:1px solid #f0f0f0;padding:10px;">
                                        <div class="form-group">
											<label for=""><?php echo $this->lang->line('branch_web_site_label');?></label>
											<input class="form-control" type="text" name="branch_web_site" value="<?php echo $branch_details['branch_web_site_link'];?>"/>
										</div>
										<div class="form-group">
											<label for=""><?php echo $this->lang->line('branch_facebook_page_label');?></label>
											<input class="form-control" type="text" name="branch_facebook_page" value="<?php echo $branch_details['branch_customer_care_facebook_page']; ?>"/>
										</div>
										<div class="form-group">
											<label for=""><?php echo $this->lang->line('branch_about_us_label');?></label>
											<textarea class="form-control" name="branch_about_us" id="" cols="30" rows="10" value=""><?php echo $branch_details['branch_about_us'];?></textarea>
										</div>
										
										<div class="form-group">
											<label for=""><?php echo $this->lang->line('branch_contact_number_label');?></label>
											<input class="form-control" type="text" name="branch_contact_number" value="<?php echo $branch_details['branch_customer_care_call_us_number'];?>"/>
										</div>
										
										<div class="form-group">
											<label for=""><?php echo $this->lang->line('branch_email_label');?></label>
											<input class="form-control" type="email" name="branch_email_address" value="<?php echo $branch_details['branch_customer_care_email_address'];?>"/>
										</div>
									</div>
							</div>
                            
                            <div style="border:1px solid #f0f0f0;padding:10px;">
                                 <div class="panel-heading" align="center">
				                         <b><?php echo $this->lang->line('branch_time_table_label');?></b>
			                      </div>
                            <table width="100%">
									<thead>
										<th><?php echo $this->lang->line('branch_days_label');?></th>
										<th><?php echo $this->lang->line('branch_closed_label');?></th>
										<th ><?php echo $this->lang->line('branch_opening_hour_label');?></th>
										<th ><?php echo $this->lang->line('branch_opening_minute_label');?></th>
                                        <th ><?php echo $this->lang->line('branch_ending_hour_label');?></th>
										<th ><?php echo $this->lang->line('branch_ending_minute_label');?></th>
									</thead>
									<tbody>
                                    
                                       <tr>
											<td width="20%"><?php echo $this->lang->line('branch_mon_label')." ".$this->lang->line('branch_morning_label');?></td>
											<td width="10%">
												<input type="checkbox" name="mon_closed" value="1" id="some_name" <?php echo $branch_details['mon_is_open']==0?'checked="checked"':'';?>/>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="mon_morning_starting_hour" id="">
													<?php
												   for($hr=0;$hr<=23;$hr++)
												   {
													   if($hr==$mon_morning_starting_hour)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   
													   ?>
                                                       <option value="<?php echo $hr;?>" <?php echo $selected;?>><?php echo $hr>9?$hr:"0".$hr;?></option>
                                                       <?php
												   }
												   ?>
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="mon_morning_starting_minute" id="">
                                                   <?php
												   for($min=0;$min<=59;$min++)
												   {
													   if($min==$mon_morning_starting_minute)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $min;?>" <?php echo $selected;?>><?php echo $min>9?$min:"0".$min;?></option>
                                                       <?php
												   }
												   ?>
													
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="mon_morning_ending_hour" id="">
													<?php
												   for($hr=0;$hr<=23;$hr++)
												   {
													   if($hr==$mon_morning_ending_hour)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $hr;?>" <?php echo $selected;?>><?php echo $hr>9?$hr:"0".$hr;?></option>
                                                       <?php
												   }
												   ?>
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="mon_morning_ending_minute" id="">
                                                   <?php
												   for($min=0;$min<=59;$min++)
												   {
													   if($min==$mon_morning_ending_minute)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $min;?>" <?php echo $selected;?>><?php echo $min>9?$min:"0".$min;?></option>
                                                       <?php
												   }
												   ?>
													
												</select>
											</td>
										</tr>
                                        
                                        <tr>
											<td width="20%"><?php echo $this->lang->line('branch_mon_label')." ".$this->lang->line('branch_afternoon_label');?></td>
											<td width="10%">
												
											</td>
											<td width="15%">
												<select class="full-width form-control" name="mon_afternoon_starting_hour" id="">
													<?php
												   for($hr=0;$hr<=23;$hr++)
												   {
													    if($hr==$mon_afternoon_starting_hour)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $hr;?>" <?php echo $selected;?>><?php echo $hr>9?$hr:"0".$hr;?></option>
                                                       <?php
												   }
												   ?>
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="mon_afternoon_starting_minute" id="">
                                                   <?php
												   for($min=0;$min<=59;$min++)
												   {
													   if($min==$mon_afternoon_starting_minute)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $min;?>" <?php echo $selected;?>><?php echo $min>9?$min:"0".$min;?></option>
                                                       <?php
												   }
												   ?>
													
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="mon_afternoon_ending_hour" id="">
													<?php
												   for($hr=0;$hr<=23;$hr++)
												   {
													   if($hr==$mon_afternoon_ending_hour)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $hr;?>" <?php echo $selected;?>><?php echo $hr>9?$hr:"0".$hr;?></option>
                                                       <?php
												   }
												   ?>
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="mon_afternoon_ending_minute" id="">
                                                   <?php
												   for($min=0;$min<=59;$min++)
												   {
													   if($min==$mon_afternoon_ending_minute)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $min;?>" <?php echo $selected;?>><?php echo $min>9?$min:"0".$min;?></option>
                                                       <?php
												   }
												   ?>
													
												</select>
											</td>
										</tr>
                                        
                                        
                                        <tr>
											<td width="20%"><?php echo $this->lang->line('branch_tues_label')." ".$this->lang->line('branch_morning_label');?></td>
											<td width="10%">
												<input type="checkbox" name="tues_closed" value="1" id="some_name" <?php echo $branch_details['tues_is_open']==0?'checked="checked"':'';?>/>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="tues_morning_starting_hour" id="">
													<?php
												   for($hr=0;$hr<=23;$hr++)
												   {
													   if($hr==$tues_morning_starting_hour)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   
													   ?>
                                                       <option value="<?php echo $hr;?>" <?php echo $selected;?>><?php echo $hr>9?$hr:"0".$hr;?></option>
                                                       <?php
												   }
												   ?>
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="tues_morning_starting_minute" id="">
                                                   <?php
												   for($min=0;$min<=59;$min++)
												   {
													   if($min==$tues_morning_starting_minute)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $min;?>" <?php echo $selected;?>><?php echo $min>9?$min:"0".$min;?></option>
                                                       <?php
												   }
												   ?>
													
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="tues_morning_ending_hour" id="">
													<?php
												   for($hr=0;$hr<=23;$hr++)
												   {
													   if($hr==$tues_morning_ending_hour)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $hr;?>" <?php echo $selected;?>><?php echo $hr>9?$hr:"0".$hr;?></option>
                                                       <?php
												   }
												   ?>
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="tues_morning_ending_minute" id="">
                                                   <?php
												   for($min=0;$min<=59;$min++)
												   {
													   if($min==$tues_morning_ending_minute)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $min;?>" <?php echo $selected;?>><?php echo $min>9?$min:"0".$min;?></option>
                                                       <?php
												   }
												   ?>
													
												</select>
											</td>
										</tr>
                                        <tr>
											<td width="20%"><?php echo $this->lang->line('branch_tues_label')." ".$this->lang->line('branch_afternoon_label');?></td>
											<td width="10%">
												
											</td>
											<td width="15%">
												<select class="full-width form-control" name="tues_afternoon_starting_hour" id="">
													<?php
												   for($hr=0;$hr<=23;$hr++)
												   {
													    if($hr==$tues_afternoon_starting_hour)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $hr;?>" <?php echo $selected;?>><?php echo $hr>9?$hr:"0".$hr;?></option>
                                                       <?php
												   }
												   ?>
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="tues_afternoon_starting_minute" id="">
                                                   <?php
												   for($min=0;$min<=59;$min++)
												   {
													   if($min==$tues_afternoon_starting_minute)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $min;?>" <?php echo $selected;?>><?php echo $min>9?$min:"0".$min;?></option>
                                                       <?php
												   }
												   ?>
													
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="tues_afternoon_ending_hour" id="">
													<?php
												   for($hr=0;$hr<=23;$hr++)
												   {
													   if($hr==$tues_afternoon_ending_hour)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $hr;?>" <?php echo $selected;?>><?php echo $hr>9?$hr:"0".$hr;?></option>
                                                       <?php
												   }
												   ?>
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="tues_afternoon_ending_minute" id="">
                                                   <?php
												   for($min=0;$min<=59;$min++)
												   {
													   if($min==$tues_afternoon_ending_minute)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $min;?>" <?php echo $selected;?>><?php echo $min>9?$min:"0".$min;?></option>
                                                       <?php
												   }
												   ?>
													
												</select>
											</td>
										</tr>
                                        <tr>
											<td width="20%"><?php echo $this->lang->line('branch_wed_label')." ".$this->lang->line('branch_morning_label');?></td>
											<td width="10%">
												<input type="checkbox" name="wed_closed" value="1" id="some_name" <?php echo $branch_details['wed_is_open']==0?'checked="checked"':'';?>/>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="wed_morning_starting_hour" id="">
													<?php
												   for($hr=0;$hr<=23;$hr++)
												   {
													   if($hr==$wed_morning_starting_hour)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   
													   ?>
                                                       <option value="<?php echo $hr;?>" <?php echo $selected;?>><?php echo $hr>9?$hr:"0".$hr;?></option>
                                                       <?php
												   }
												   ?>
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="wed_morning_starting_minute" id="">
                                                   <?php
												   for($min=0;$min<=59;$min++)
												   {
													   if($min==$wed_morning_starting_minute)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $min;?>" <?php echo $selected;?>><?php echo $min>9?$min:"0".$min;?></option>
                                                       <?php
												   }
												   ?>
													
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="wed_morning_ending_hour" id="">
													<?php
												   for($hr=0;$hr<=23;$hr++)
												   {
													   if($hr==$wed_morning_ending_hour)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $hr;?>" <?php echo $selected;?>><?php echo $hr>9?$hr:"0".$hr;?></option>
                                                       <?php
												   }
												   ?>
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="wed_morning_ending_minute" id="">
                                                   <?php
												   for($min=0;$min<=59;$min++)
												   {
													   if($min==$wed_morning_ending_minute)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $min;?>" <?php echo $selected;?>><?php echo $min>9?$min:"0".$min;?></option>
                                                       <?php
												   }
												   ?>
													
												</select>
											</td>
										</tr>
                                        <tr>
											<td width="20%"><?php echo $this->lang->line('branch_wed_label')." ".$this->lang->line('branch_afternoon_label');?></td>
											<td width="10%">
												
											</td>
											<td width="15%">
												<select class="full-width form-control" name="wed_afternoon_starting_hour" id="">
													<?php
												   for($hr=0;$hr<=23;$hr++)
												   {
													    if($hr==$wed_afternoon_starting_hour)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $hr;?>" <?php echo $selected;?>><?php echo $hr>9?$hr:"0".$hr;?></option>
                                                       <?php
												   }
												   ?>
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="wed_afternoon_starting_minute" id="">
                                                   <?php
												   for($min=0;$min<=59;$min++)
												   {
													   if($min==$wed_afternoon_starting_minute)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $min;?>" <?php echo $selected;?>><?php echo $min>9?$min:"0".$min;?></option>
                                                       <?php
												   }
												   ?>
													
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="wed_afternoon_ending_hour" id="">
													<?php
												   for($hr=0;$hr<=23;$hr++)
												   {
													   if($hr==$wed_afternoon_ending_hour)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $hr;?>" <?php echo $selected;?>><?php echo $hr>9?$hr:"0".$hr;?></option>
                                                       <?php
												   }
												   ?>
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="wed_afternoon_ending_minute" id="">
                                                   <?php
												   for($min=0;$min<=59;$min++)
												   {
													   if($min==$wed_afternoon_ending_minute)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $min;?>" <?php echo $selected;?>><?php echo $min>9?$min:"0".$min;?></option>
                                                       <?php
												   }
												   ?>
													
												</select>
											</td>
										</tr>
                                        
                                        <tr>
											<td width="20%"><?php echo $this->lang->line('branch_thurs_label')." ".$this->lang->line('branch_morning_label');?></td>
											<td width="10%">
												<input type="checkbox" name="thurs_closed" value="1" id="some_name" <?php echo $branch_details['thurs_is_open']==0?'checked="checked"':'';?>/>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="thurs_morning_starting_hour" id="">
													<?php
												   for($hr=0;$hr<=23;$hr++)
												   {
													   if($hr==$thurs_morning_starting_hour)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   
													   ?>
                                                       <option value="<?php echo $hr;?>" <?php echo $selected;?>><?php echo $hr>9?$hr:"0".$hr;?></option>
                                                       <?php
												   }
												   ?>
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="thurs_morning_starting_minute" id="">
                                                   <?php
												   for($min=0;$min<=59;$min++)
												   {
													   if($min==$thurs_morning_starting_minute)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $min;?>" <?php echo $selected;?>><?php echo $min>9?$min:"0".$min;?></option>
                                                       <?php
												   }
												   ?>
													
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="thurs_morning_ending_hour" id="">
													<?php
												   for($hr=0;$hr<=23;$hr++)
												   {
													   if($hr==$thurs_morning_ending_hour)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $hr;?>" <?php echo $selected;?>><?php echo $hr>9?$hr:"0".$hr;?></option>
                                                       <?php
												   }
												   ?>
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="thurs_morning_ending_minute" id="">
                                                   <?php
												   for($min=0;$min<=59;$min++)
												   {
													   if($min==$thurs_morning_ending_minute)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $min;?>" <?php echo $selected;?>><?php echo $min>9?$min:"0".$min;?></option>
                                                       <?php
												   }
												   ?>
													
												</select>
											</td>
										</tr>
                                        <tr>
											<td width="20%"><?php echo $this->lang->line('branch_thurs_label')." ".$this->lang->line('branch_afternoon_label');?></td>
											<td width="10%">
												
											</td>
											<td width="15%">
												<select class="full-width form-control" name="thurs_afternoon_starting_hour" id="">
													<?php
												   for($hr=0;$hr<=23;$hr++)
												   {
													    if($hr==$thurs_afternoon_starting_hour)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $hr;?>" <?php echo $selected;?>><?php echo $hr>9?$hr:"0".$hr;?></option>
                                                       <?php
												   }
												   ?>
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="thurs_afternoon_starting_minute" id="">
                                                   <?php
												   for($min=0;$min<=59;$min++)
												   {
													   if($min==$thurs_afternoon_starting_minute)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $min;?>" <?php echo $selected;?>><?php echo $min>9?$min:"0".$min;?></option>
                                                       <?php
												   }
												   ?>
													
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="thurs_afternoon_ending_hour" id="">
													<?php
												   for($hr=0;$hr<=23;$hr++)
												   {
													   if($hr==$thurs_afternoon_ending_hour)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $hr;?>" <?php echo $selected;?>><?php echo $hr>9?$hr:"0".$hr;?></option>
                                                       <?php
												   }
												   ?>
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="thurs_afternoon_ending_minute" id="">
                                                   <?php
												   for($min=0;$min<=59;$min++)
												   {
													   if($min==$thurs_afternoon_ending_minute)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $min;?>" <?php echo $selected;?>><?php echo $min>9?$min:"0".$min;?></option>
                                                       <?php
												   }
												   ?>
													
												</select>
											</td>
										</tr>
                                        <tr>
											<td width="20%"><?php echo $this->lang->line('branch_fri_label')." ".$this->lang->line('branch_morning_label');?></td>
											<td width="10%">
												<input type="checkbox" name="fri_closed" value="1" id="some_name" <?php echo $branch_details['fri_is_open']==0?'checked="checked"':'';?>/>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="fri_morning_starting_hour" id="">
													<?php
												   for($hr=0;$hr<=23;$hr++)
												   {
													   if($hr==$fri_morning_starting_hour)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   
													   ?>
                                                       <option value="<?php echo $hr;?>" <?php echo $selected;?>><?php echo $hr>9?$hr:"0".$hr;?></option>
                                                       <?php
												   }
												   ?>
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="fri_morning_starting_minute" id="">
                                                   <?php
												   for($min=0;$min<=59;$min++)
												   {
													   if($min==$fri_morning_starting_minute)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $min;?>" <?php echo $selected;?>><?php echo $min>9?$min:"0".$min;?></option>
                                                       <?php
												   }
												   ?>
													
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="fri_morning_ending_hour" id="">
													<?php
												   for($hr=0;$hr<=23;$hr++)
												   {
													   if($hr==$fri_morning_ending_hour)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $hr;?>" <?php echo $selected;?>><?php echo $hr>9?$hr:"0".$hr;?></option>
                                                       <?php
												   }
												   ?>
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="fri_morning_ending_minute" id="">
                                                   <?php
												   for($min=0;$min<=59;$min++)
												   {
													   if($min==$fri_morning_ending_minute)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $min;?>" <?php echo $selected;?>><?php echo $min>9?$min:"0".$min;?></option>
                                                       <?php
												   }
												   ?>
													
												</select>
											</td>
										</tr>
                                        <tr>
											<td width="20%"><?php echo $this->lang->line('branch_fri_label')." ".$this->lang->line('branch_afternoon_label');?></td>
											<td width="10%">
												
											</td>
											<td width="15%">
												<select class="full-width form-control" name="fri_afternoon_starting_hour" id="">
													<?php
												   for($hr=0;$hr<=23;$hr++)
												   {
													    if($hr==$fri_afternoon_starting_hour)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $hr;?>" <?php echo $selected;?>><?php echo $hr>9?$hr:"0".$hr;?></option>
                                                       <?php
												   }
												   ?>
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="fri_afternoon_starting_minute" id="">
                                                   <?php
												   for($min=0;$min<=59;$min++)
												   {
													   if($min==$fri_afternoon_starting_minute)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $min;?>" <?php echo $selected;?>><?php echo $min>9?$min:"0".$min;?></option>
                                                       <?php
												   }
												   ?>
													
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="fri_afternoon_ending_hour" id="">
													<?php
												   for($hr=0;$hr<=23;$hr++)
												   {
													   if($hr==$fri_afternoon_ending_hour)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $hr;?>" <?php echo $selected;?>><?php echo $hr>9?$hr:"0".$hr;?></option>
                                                       <?php
												   }
												   ?>
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="fri_afternoon_ending_minute" id="">
                                                   <?php
												   for($min=0;$min<=59;$min++)
												   {
													   if($min==$fri_afternoon_ending_minute)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $min;?>" <?php echo $selected;?>><?php echo $min>9?$min:"0".$min;?></option>
                                                       <?php
												   }
												   ?>
													
												</select>
											</td>
										</tr>
                                        <tr>
											<td width="20%"><?php echo $this->lang->line('branch_sat_label')." ".$this->lang->line('branch_morning_label');?></td>
											<td width="10%">
												<input type="checkbox" name="sat_closed" value="1" id="some_name" <?php echo $branch_details['sat_is_open']==0?'checked="checked"':'';?>/>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="sat_morning_starting_hour" id="">
													<?php
												   for($hr=0;$hr<=23;$hr++)
												   {
													   if($hr==$sat_morning_starting_hour)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   
													   ?>
                                                       <option value="<?php echo $hr;?>" <?php echo $selected;?>><?php echo $hr>9?$hr:"0".$hr;?></option>
                                                       <?php
												   }
												   ?>
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="sat_morning_starting_minute" id="">
                                                   <?php
												   for($min=0;$min<=59;$min++)
												   {
													   if($min==$sat_morning_starting_minute)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $min;?>" <?php echo $selected;?>><?php echo $min>9?$min:"0".$min;?></option>
                                                       <?php
												   }
												   ?>
													
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="sat_morning_ending_hour" id="">
													<?php
												   for($hr=0;$hr<=23;$hr++)
												   {
													   if($hr==$sat_morning_ending_hour)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $hr;?>" <?php echo $selected;?>><?php echo $hr>9?$hr:"0".$hr;?></option>
                                                       <?php
												   }
												   ?>
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="sat_morning_ending_minute" id="">
                                                   <?php
												   for($min=0;$min<=59;$min++)
												   {
													   if($min==$sat_morning_ending_minute)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $min;?>" <?php echo $selected;?>><?php echo $min>9?$min:"0".$min;?></option>
                                                       <?php
												   }
												   ?>
													
												</select>
											</td>
										</tr>
                                        <tr>
											<td width="20%"><?php echo $this->lang->line('branch_sat_label')." ".$this->lang->line('branch_afternoon_label');?></td>
											<td width="10%">
												
											</td>
											<td width="15%">
												<select class="full-width form-control" name="sat_afternoon_starting_hour" id="">
													<?php
												   for($hr=0;$hr<=23;$hr++)
												   {
													    if($hr==$sat_afternoon_starting_hour)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $hr;?>" <?php echo $selected;?>><?php echo $hr>9?$hr:"0".$hr;?></option>
                                                       <?php
												   }
												   ?>
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="sat_afternoon_starting_minute" id="">
                                                   <?php
												   for($min=0;$min<=59;$min++)
												   {
													   if($min==$sat_afternoon_starting_minute)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $min;?>" <?php echo $selected;?>><?php echo $min>9?$min:"0".$min;?></option>
                                                       <?php
												   }
												   ?>
													
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="sat_afternoon_ending_hour" id="">
													<?php
												   for($hr=0;$hr<=23;$hr++)
												   {
													   if($hr==$sat_afternoon_ending_hour)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $hr;?>" <?php echo $selected;?>><?php echo $hr>9?$hr:"0".$hr;?></option>
                                                       <?php
												   }
												   ?>
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="sat_afternoon_ending_minute" id="">
                                                   <?php
												   for($min=0;$min<=59;$min++)
												   {
													   if($min==$sat_afternoon_ending_minute)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $min;?>" <?php echo $selected;?>><?php echo $min>9?$min:"0".$min;?></option>
                                                       <?php
												   }
												   ?>
													
												</select>
											</td>
										</tr>
                                        <tr>
											<td width="20%"><?php echo $this->lang->line('branch_sun_label')." ".$this->lang->line('branch_morning_label');?></td>
											<td width="10%">
												<input type="checkbox" name="sun_closed" value="1" id="some_name" <?php echo $branch_details['sun_is_open']==0?'checked="checked"':'';?>/>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="sun_morning_starting_hour" id="">
													<?php
												   for($hr=0;$hr<=23;$hr++)
												   {
													   if($hr==$sun_morning_starting_hour)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   
													   ?>
                                                       <option value="<?php echo $hr;?>" <?php echo $selected;?>><?php echo $hr>9?$hr:"0".$hr;?></option>
                                                       <?php
												   }
												   ?>
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="sun_morning_starting_minute" id="">
                                                   <?php
												   for($min=0;$min<=59;$min++)
												   {
													   if($min==$sun_morning_starting_minute)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $min;?>" <?php echo $selected;?>><?php echo $min>9?$min:"0".$min;?></option>
                                                       <?php
												   }
												   ?>
													
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="sun_morning_ending_hour" id="">
													<?php
												   for($hr=0;$hr<=23;$hr++)
												   {
													   if($hr==$sun_morning_ending_hour)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $hr;?>" <?php echo $selected;?>><?php echo $hr>9?$hr:"0".$hr;?></option>
                                                       <?php
												   }
												   ?>
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="sun_morning_ending_minute" id="">
                                                   <?php
												   for($min=0;$min<=59;$min++)
												   {
													   if($min==$sun_morning_ending_minute)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $min;?>" <?php echo $selected;?>><?php echo $min>9?$min:"0".$min;?></option>
                                                       <?php
												   }
												   ?>
													
												</select>
											</td>
										</tr>
                                        <tr>
											<td width="20%"><?php echo $this->lang->line('branch_sun_label')." ".$this->lang->line('branch_afternoon_label');?></td>
											<td width="10%">
												
											</td>
											<td width="15%">
												<select class="full-width form-control" name="sun_afternoon_starting_hour" id="">
													<?php
												   for($hr=0;$hr<=23;$hr++)
												   {
													    if($hr==$sun_afternoon_starting_hour)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $hr;?>" <?php echo $selected;?>><?php echo $hr>9?$hr:"0".$hr;?></option>
                                                       <?php
												   }
												   ?>
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="sun_afternoon_starting_minute" id="">
                                                   <?php
												   for($min=0;$min<=59;$min++)
												   {
													   if($min==$sun_afternoon_starting_minute)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $min;?>" <?php echo $selected;?>><?php echo $min>9?$min:"0".$min;?></option>
                                                       <?php
												   }
												   ?>
													
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="sun_afternoon_ending_hour" id="">
													<?php
												   for($hr=0;$hr<=23;$hr++)
												   {
													   if($hr==$sun_afternoon_ending_hour)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $hr;?>" <?php echo $selected;?>><?php echo $hr>9?$hr:"0".$hr;?></option>
                                                       <?php
												   }
												   ?>
												</select>
											</td>
											<td width="15%">
												<select class="full-width form-control" name="sun_afternoon_ending_minute" id="">
                                                   <?php
												   for($min=0;$min<=59;$min++)
												   {
													   if($min==$sun_afternoon_ending_minute)
													   {
														   $selected="selected='selected'";
													   }
													   else
													   {
														   $selected="";
													   }
													   ?>
                                                       <option value="<?php echo $min;?>" <?php echo $selected;?>><?php echo $min>9?$min:"0".$min;?></option>
                                                       <?php
												   }
												   ?>
													
												</select>
											</td>
										</tr>
                                        
                                        
                                        
										
                                        
                                        
										
										
                                        
                                        
										
										
                                        
                                        
										
										
                                        
                                        
									</tbody>
								</table>
                            </div>
                            
							</div>
							<div style="margin-top:10px;">
                            <input type="hidden" name="hidden_branch_id" value="<?php echo $branch_details['branch_id'];?>"  />
								<center>
									<button class="btn-send"><?php echo $this->lang->line('branch_update_branch_label');?></button>	
								</center>
							</div>
						</div>
                       <?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

