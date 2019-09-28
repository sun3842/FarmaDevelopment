
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<?php echo $this->lang->line('branch_list_title');?>
				
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th><?php echo $this->lang->line('branch_name_label');?></th>
										<th><?php echo $this->lang->line('branch_type_label');?></th>
										<th><?php echo $this->lang->line('branch_address_label');?></th>
										<th><?php echo $this->lang->line('branch_city_label');?></th>
										<th></th>
									</tr>
								</thead>
								<tbody>
                                <?php
								foreach($all_branch_list as $branch)
								{
									?>
                                    <tr>
										<td><?php echo $branch['branch_name'];?></td>
										<td><?php echo $branch['is_main_branch']==1?$this->lang->line('branch_head_branch_label'):$this->lang->line('branch_office_branch_label');?></td>
										<td><?php echo $branch['branch_address'];?></td>
										<td><?php echo $branch['branch_city'];?></td>
										<td>
											<a href="<?php echo site_url("edit_branch/".$branch['branch_id']);?>" title="edit"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;
											<a href="<?php echo site_url("view_branch/".$branch['branch_id']);?>" title="View"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp;
                                            <?php
											if($branch['is_main_branch']==1)
											{
											}
											else
											{?>
											<a href="#" title="delete" data-toggle="modal" data-target="#brance_delete" onclick="document.getElementById('delete_branch_id').value=<?php echo $branch['branch_id'];?>;"><span class="glyphicon glyphicon-trash"></span></a>
										<?php } ?>
                                        </td>
									</tr>
                                    
                                    <?php
								}
								
								?>
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="brance_delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form name="branch_delete_form" method="post" action="<?php echo site_url('delete_branch');?>">
      <div class="modal-body">
        <p><?php echo $this->lang->line('branch_want_delete');?></p>
        <input type="hidden" name="delete_branch_id" id="delete_branch_id" />
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger"><?php echo $this->lang->line('branch_delete_label');?></button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->