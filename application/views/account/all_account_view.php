<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>	
<style>
.glyphicon-edit::before 
{
    cursor: pointer;
}
</style>

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
								<th><?php echo $this->lang->line('name');?> </th>
								<th><?php echo $this->lang->line('user_name');?> </th>
								<th><?php echo $this->lang->line('user_type');?> </th>
								<th><?php echo $this->lang->line('email');?> </th>
   						
    							

								<th></th>
    							</tr>
    						</thead>
    						<tbody>
							
								<?php foreach ($query_result as $row): ?>
    							<tr>
									
									<td class='col-md-3 col-lg-3'>  <?php echo $row->user_details_first_name." ".$row->user_details_last_name;  ?></td>									
									<td class='col-md-2 col-lg-2'>  <?php echo $row->user_details_user_name;  ?></td>
									<td class='col-md-3 col-lg-3'>  <?php echo $row->user_type_name;  ?></td>
									<td class='col-md-2 col-lg-2'>  <?php echo $row->user_details_email;  ?></td>
						
    							
    								<td class='col-md-2 col-lg-2'>
    									<a data-toggle="modal" data-target="#edit_acc_user_<?php echo $row->user_details_id;  ?>" class="modal_click" title='<?php echo $row->user_details_id;  ?>'><span class='glyphicon glyphicon-edit'></span></a>&nbsp;
    									
									</td>
    							</tr>
								
							
																
																
								<div class="modal fade" id="edit_acc_user_<?php echo $row->user_details_id;  ?>">
								  <div class="modal-dialog">
									<div class="modal-content">
									  <div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									  </div>
									  <div class="modal-body">

											<?php 
											$edit_query_result=$this->account_model->get_account_by_id($row->user_details_id);
											$edit_query_result= $edit_query_result->result();
											$data['edit_query_result'] = $edit_query_result[0];
											$this->load->vars($data);
											$this->load->view('account/edit');?>
										
									  </div>
									</div><!-- /.modal-content -->
								  </div><!-- /.modal-dialog -->
								</div><!-- /.modal -->	



		
								<?php endforeach;	?>
								
							
								
    						</tbody>
  					</table>
				</div>
			</div>
			
			<div class="panel-footer"><?php echo $paging->create_links(); ?>	</div>
		</div>
		
		
		
	</div>
</div>	



