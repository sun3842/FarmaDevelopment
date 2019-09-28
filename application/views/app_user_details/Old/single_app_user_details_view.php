<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo $title;  ?>
			</div>
			
			
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
		   <table class="table">
			 
			  <thead>
				 <tr>
					<th>Column</th>
					<th>Value</th>
				 </tr>
			  </thead>
			  <tbody>
				 <tr>
					<td class='col-lg-3'><?php echo $this->app_user_first_name_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->app_user_first_name;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->app_user_last_name_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->app_user_last_name;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->app_user_birth_date_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->app_user_birth_date;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->app_user_sex_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->app_user_sex;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->app_user_address_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->app_user_address;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->app_user_city_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->app_user_city;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->app_user_post_code_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->app_user_post_code;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->app_user_country_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->app_user_country;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->app_user_email_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->app_user_email;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->app_user_cell_phone_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->app_user_cell_phone;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->app_user_registration_date_time_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->app_user_registration_date_time;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->app_user_registration_editing_date_time_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->app_user_registration_editing_date_time;  ?></td>
				 </tr>
				
		
			  </tbody>
		   </table>
		</div>  	
	</div>
</div>

	