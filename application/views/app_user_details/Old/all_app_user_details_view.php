	


<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo $title;  ?>
			</div>
				<h1 class="text-center text-success"><?php echo $this->session->flashdata('msg'); ?></h1>	
			<div class="panel-body">
				<div class="table-responsive">
  					<table class="table table-hover">
    						<thead>
    							<tr>
   								<th><?php echo $this->app_user_first_name_label ?></th>
   								<th><?php echo $this->app_user_last_name_label ?></th>
   								<th><?php echo $this->app_user_birth_date_label ?></th>
   								<th><?php echo $this->app_user_sex_label ?></th>
   								<th><?php echo $this->app_user_address_label ?></th>
   								<th><?php echo $this->app_user_city_label ?></th>
    							<!--	<th><?php echo $this->app_user_post_code_label ?></th>	-->
    							<!--	<th><?php echo $this->app_user_country_label ?></th>	-->
    							<!--	<th><?php echo $this->app_user_email_label ?></th>	-->
    							<!--	<th><?php echo $this->app_user_cell_phone_label ?></th>	-->
    							<!--	<th><?php echo $this->app_user_registration_date_time_label ?></th>	-->
    							<!--	<th><?php echo $this->app_user_registration_editing_date_time_label ?></th>	-->

								<th></th>
    							</tr>
    						</thead>
    						<tbody>
								<tr>
    								<td><input type="text" class="form-control" placeholder="Search by Title"/></td>
    								<td><input type="hidden" class="form-control"/></td>
    								<td><input type="hidden" class="form-control"/></td>
    								<td><input type="hidden" class="form-control"/></td>
    								<td><input type="hidden" class="form-control"/></td>
    								<td>
    								</td>
    							</tr>
								<?php foreach ($query_result as $row): ?>
    							<tr>
									<td class='col-md-3 col-lg-3'>  <?php echo $row->app_user_first_name;  ?></td>
									<td class='col-md-3 col-lg-3'>  <?php echo $row->app_user_last_name;  ?></td>
									<td class='col-md-3 col-lg-3'>  <?php echo $row->app_user_birth_date;  ?></td>
									<td class='col-md-3 col-lg-3'>  <?php echo $row->app_user_sex;  ?></td>
									<td class='col-md-3 col-lg-3'>  <?php echo $row->app_user_address;  ?></td>
									<td class='col-md-3 col-lg-3'>  <?php echo $row->app_user_city;  ?></td>
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->app_user_post_code;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->app_user_country;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->app_user_email;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->app_user_cell_phone;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->app_user_registration_date_time;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->app_user_registration_editing_date_time;  ?></td>	-->

    							
    								<td class='col-md-2 col-lg-2'>
    									<a href='<?php echo base_url() ?>AppUserDetails/edit_app_user_details/<?php echo $row->ref_app_user_details_app_user_id;  ?>' title='edit'><span class='glyphicon glyphicon-edit'></span></a>&nbsp;
    									<a href='<?php echo base_url() ?>AppUserDetails/delete_app_user_details/<?php echo $row->ref_app_user_details_app_user_id;  ?>/<?php echo $controller ?>/<?php echo $method ?>' title='delete' ><span class='glyphicon glyphicon-trash'></span></a>&nbsp;
										<a href='<?php echo base_url() ?>AppUserDetails/view_app_user_details/<?php echo $row->ref_app_user_details_app_user_id;  ?>' title='View'><span class='glyphicon glyphicon-eye-open'></span></a>
    								</td>
    							</tr>
		
								<?php endforeach;	?>
								
							
								
    						</tbody>
  					</table>
				</div>
			</div>
			
			<div class="panel-footer"><?php echo $paging->create_links(); ?>	</div>
		</div>
		
		
		
	</div>
</div>		





