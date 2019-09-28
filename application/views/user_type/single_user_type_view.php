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
					<td class='col-lg-3'><?php echo $this->user_type_name_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->user_type_name;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->user_type_description_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->user_type_description;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->user_type_active_label ?></td>
					<td class='col-lg-9'><?php echo $query_result->user_type_active;  ?></td>
				 </tr>
				
		
			  </tbody>
		   </table>
		</div>  	
	</div>
</div>

	