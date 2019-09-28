	


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
   								<th><?php echo $this->ref_chat_app_user_id_label ?></th>
   								<th><?php echo $this->chat_from_app_user_label ?></th>
   								<th><?php echo $this->chat_from_admin_label ?></th>
   								<th><?php echo $this->ref_chat_from_admin_user_id_label ?></th>
    							<th><?php echo $this->chat_message_label ?></th>	
    							<!--	<th><?php echo $this->chat_is_edited_label ?></th>	-->
    							<!--	<th><?php echo $this->chat_message_sending_edited_date_time_label ?></th>	-->

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
									<td class='col-md-2 col-lg-2'>  <?php echo $row->ref_chat_app_user_id;  ?></td>
									<td class='col-md-2 col-lg-2'>  <?php echo $row->chat_from_app_user;  ?></td>
									<td class='col-md-2 col-lg-2'>  <?php echo $row->chat_from_admin;  ?></td>
									<td class='col-md-2 col-lg-2'>  <?php echo $row->ref_chat_from_admin_user_id;  ?></td>
									<td class='col-md-2 col-lg-2'>  <?php echo $row->chat_message;  ?></td>	
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->chat_is_edited;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->chat_message_sending_edited_date_time;  ?></td>	-->

    							
    								<td class='col-md-2 col-lg-2'>
    									<a href='<?php echo base_url() ?>edit_chat/<?php echo $row->chat_id;  ?>' title='edit'><span class='glyphicon glyphicon-edit'></span></a>&nbsp;
    									<a href='<?php echo base_url() ?>delete_chat/<?php echo $row->chat_id;  ?>/<?php echo $this->uri->segment(1, 0) ?>' title='delete' ><span class='glyphicon glyphicon-trash'></span></a>&nbsp;
										<a href='<?php echo base_url() ?>view_chat/<?php echo $row->chat_id;  ?>' title='View'><span class='glyphicon glyphicon-eye-open'></span></a>
									
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





