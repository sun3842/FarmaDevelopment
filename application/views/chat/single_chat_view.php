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
					<td class='col-lg-3'><?php echo $this->ref_chat_app_user_id_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->ref_chat_app_user_id;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->chat_from_app_user_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->chat_from_app_user;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->chat_from_admin_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->chat_from_admin;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->ref_chat_from_admin_user_id_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->ref_chat_from_admin_user_id;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->chat_message_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->chat_message;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->chat_is_edited_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->chat_is_edited;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->chat_message_sending_edited_date_time_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->chat_message_sending_edited_date_time;  ?></td>
				 </tr>
				
		
			  </tbody>
		   </table>
		</div>  	
	</div>
</div>

	