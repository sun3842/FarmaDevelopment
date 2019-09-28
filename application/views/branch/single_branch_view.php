
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<?php echo $this->lang->line('branch_details');?>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-6">
						<div class="view_branch">
							<h3><?php echo $this->lang->line('branch_name_label');?></h3>
							<p><?php echo $branch_details['branch_name'];?></p>
						</div>	
						
						<div class="view_branch">
							<h3><?php echo $this->lang->line('branch_address_label');?></h3>
							<p><?php echo $branch_details['branch_address'];?></p>
						</div>	
						<div class="view_branch">
							<h3><?php echo $this->lang->line('branch_city_label');?></h3>
							<p><?php echo $branch_details['branch_city'];?></p>
						</div>	
						<div class="view_branch">
							<h3><?php echo $this->lang->line('branch_post_code_label');?></h3>
							<p><?php echo $branch_details['branch_post_code'];?></p>
						</div>
						<div class="view_branch">
							<h3><?php echo $this->lang->line('branch_region_label');?></h3>
							<p><?php echo $branch_details['branch_region'];?></p>
						</div>
						<div class="view_branch">
							<h3><?php echo $this->lang->line('branch_country_label');?></h3>
							<p><?php echo $branch_details['branch_country'];?></p>
						</div>
						
					</div>
					<div class="col-sm-6">
						<div class="view_branch">
							<h3><?php echo $this->lang->line('branch_type_label');?></h3>
							<p><?php echo $branch_details['is_main_branch']==1?$this->lang->line('branch_head_branch_label'):$this->lang->line('branch_office_branch_label');?></p>
						</div>	
						<div class="view_branch">
							<h3><?php echo $this->lang->line('branch_web_site_label');?></h3>
							<p><?php echo $branch_details['branch_web_site_link'];?></p>
						</div>
						<div class="view_branch">
							<h3><?php echo $this->lang->line('branch_about_us_label');?></h3>
							<p><?php echo $branch_details['branch_about_us'];?></p>
						</div>
						<div class="view_branch">
							<h3><?php echo $this->lang->line('branch_facebook_page_label');?></h3>
							<p><?php echo $branch_details['branch_customer_care_facebook_page'];?></p>
						</div>
                        <div class="view_branch">
							<h3><?php echo $this->lang->line('branch_contact_number_label');?></h3>
							<p><?php echo $branch_details['branch_customer_care_call_us_number'];?></p>
						</div>
						
						<div class="view_branch">
							<h3><?php echo $this->lang->line('branch_email_label');?></h3>
							<p><?php echo $branch_details['branch_customer_care_email_address'];?></p>
						</div>
					</div>
                    
                    <div class="col-sm-12">
						<div class="view_branch" align="center">
							<h3><?php echo $this->lang->line('branch_sat_label');?></h3>
							<p><?php echo $branch_details['sat_is_open']==1?$branch_details['sat_morning_time']."  ".$branch_details['sat_afternoon_time']:$this->lang->line('branch_closed_label');?></p>
						</div>	
						<div class="view_branch" align="center">
							<h3><?php echo $this->lang->line('branch_sun_label');?></h3>
							<p><?php echo $branch_details['sun_is_open']==1?$branch_details['sun_morning_time']."  ".$branch_details['sun_afternoon_time']:$this->lang->line('branch_closed_label');?></p>
						</div>
						<div class="view_branch" align="center">
							<h3><?php echo $this->lang->line('branch_mon_label');?></h3>
							<p><?php echo $branch_details['mon_is_open']==1?$branch_details['mon_morning_time']."  ".$branch_details['mon_afternoon_time']:$this->lang->line('branch_closed_label');?></p>
						</div>
						<div class="view_branch" align="center">
							<h3><?php echo $this->lang->line('branch_tues_label');?></h3>
							<p><?php echo $branch_details['tues_is_open']==1?$branch_details['tues_morning_time']."  ".$branch_details['tues_afternoon_time']:$this->lang->line('branch_closed_label');?></p>
						</div>
                        <div class="view_branch" align="center">
							<h3><?php echo $this->lang->line('branch_wed_label');?></h3>
							<p><?php echo $branch_details['wed_is_open']==1?$branch_details['wed_morning_time']."  ".$branch_details['wed_afternoon_time']:$this->lang->line('branch_closed_label');?></p>
						</div>
						
						<div class="view_branch" align="center">
							<h3><?php echo $this->lang->line('branch_thurs_label');?></h3>
							<p><?php echo $branch_details['thurs_is_open']==1?$branch_details['thurs_morning_time']."  ".$branch_details['thurs_afternoon_time']:$this->lang->line('branch_closed_label');?></p>
						</div>
                        <div class="view_branch" align="center">
							<h3><?php echo $this->lang->line('branch_fri_label');?></h3>
							<p><?php echo $branch_details['fri_is_open']==1?$branch_details['fri_morning_time']."  ".$branch_details['fri_afternoon_time']:$this->lang->line('branch_closed_label');?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

