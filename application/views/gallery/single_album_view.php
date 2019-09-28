

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
					<td class="col-lg-3">Album Name</td>
					<td class="col-lg-9"><?php echo $query_result->image_album_name;  ?></td>
				 </tr>
				 <tr>
					<td class="col-lg-3">Album Description</td>
					<td class="col-lg-9"><?php echo $query_result->image_album_description;  ?></td>
				 </tr>
			
				
		
			  </tbody>
		   </table>
		</div>  	
	</div>
</div>

