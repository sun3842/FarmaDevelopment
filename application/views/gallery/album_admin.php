

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
    								<th>SN</th>
    								<th>Album Name</th>
    								<th>Album Description</th>
    								<th>Status</th>
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
								<?php	$i=1; foreach ($query_result as $row): ?>
    							<tr>
									<td class="col-md-4 col-lg-4"><?php echo $i++;  ?></td>
    								<td class="col-md-3 col-lg-3">  <?php echo $row->image_album_name;  ?></td>
    								<td class="col-md-2 col-lg-2"><?php echo $row->image_album_description;  ?></td>
    								<td class="col-md-1 col-lg-1"><?php echo $row->image_album_active;  ?></td>
    							
    								<td class="col-md-2 col-lg-2">
    									<a href="edit_album/<?php echo $row->image_album_id;  ?>" title="edit"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;
    									<a onclick="return confirm('Are you sure you want to delete this item?');" href="delete_album/<?php echo $row->image_album_id;  ?>/<?php echo $this->uri->segment(1, 0) ?>" title="delete" ><span class="glyphicon glyphicon-trash"></span></a>&nbsp;
										<a href="view_album/<?php echo $row->image_album_id;  ?>" title="View"><span class="glyphicon glyphicon-eye-open"></span></a>
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




