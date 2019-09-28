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
					<td class='col-lg-3'><?php echo $this->ref_user_details_user_type_id_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->ref_user_details_user_type_id;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->user_details_first_name_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->user_details_first_name;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->user_details_last_name_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->user_details_last_name;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->user_details_user_name_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->user_details_user_name;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->user_details_password_hash_value_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->user_details_password_hash_value;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->user_details_sex_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->user_details_sex;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->user_details_email_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->user_details_email;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->user_details_cell_phone_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->user_details_cell_phone;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->user_details_created_by_user_details_id_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->user_details_created_by_user_details_id;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->user_details_created_date_time_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->user_details_created_date_time;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->user_details_edited_by_user_details_id_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->user_details_edited_by_user_details_id;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->user_details_edited_date_time_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->user_details_edited_date_time;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->user_details_active_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->user_details_active;  ?></td>
				 </tr>
				
		
			  </tbody>
		   </table>
		</div>  	
	</div>
</div>

	