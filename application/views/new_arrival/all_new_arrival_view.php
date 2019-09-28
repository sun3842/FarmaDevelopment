	


		


	

<div class="row">
	<div class="col-lg-11">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo $this->lang->line('all_new_arrival_list');?>
               <a href="<?php echo site_url('add_new_arrival');?>"><button class="btn btn-primary btn-spacing-left btn-circular-small pull-right btn-margin-negative" aria-label="Left Align" type="button"> + </button></a>

			</div>
			<div class="panel-body">
            <!--
				<div class="row row-padding-small">
					<div class="col-sm-4">
						<div class="form-group">
							<input class="form-control" type="text" placeholder="Title"/>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<input class="form-control" type="date" placeholder="Date"/>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group">
							<button class="btn btn-success btn-block myBtn">Search</button>
						</div>
					</div>
                   
				</div>
             -->
				<div class="table-responsive">
				<table class="table-standard table-clickable full-width">
					<thead>
						<th style="text-align:center !important"><?php echo $this->lang->line('title');?></th>
						<th style="text-align:center !important;"><?php echo $this->lang->line('status');?></th>
						<th style="text-align:center !important;"><?php echo $this->lang->line('available_until');?></th>
						<th style="text-align:center !important;">Action</th>
					</thead>
					<tbody>
						<?php foreach ($query_result as $row): ?>
						<tr >
							<td width="30%" style="text-align:center !important;"><?php echo $row->new_arrival_product_name_title;  ?> </td>
							<td width="30%" style="text-align:center !important;"><?php echo $row->new_arrival_product_is_in_stock==1?$this->lang->line('in_stock'):($row->new_arrival_product_is_upcoming==1?$this->lang->line('upcoming'):"");  ?></td>
							<td width="20%%" style="text-align:center !important;"> <?php echo $row->new_arrival_ending_validation_date;  ?></td>
							<td width="10%" style="text-align:center !important;">
								
                               <a href='<?php echo base_url() ?>edit_new_arrival/<?php echo $row->new_arrival_id;  ?>' title='edit'><span class='glyphicon glyphicon-edit'></span></a>&nbsp;
    									<a href="#" onclick="delete_model(<?php echo $row->new_arrival_id;?>)"><span class='glyphicon glyphicon-trash'></span></a>&nbsp;
										<a href='<?php echo base_url() ?>view_new_arrival/<?php echo $row->new_arrival_id;  ?>' title='View'><span class='glyphicon glyphicon-eye-open'></span></a>
										
							</td>
						</tr>
                        <?php endforeach;	?>
						
					</tbody>
				</table>
				</div>
               
                <?php echo $paging->create_links(); ?>	
               
                
				
			</div>
		</div>
	</div>
</div>




<div class="modal fade" id="message_delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <p><?php echo $this->lang->line('want_to_delete_it');?></p>
      </div>
      <div class="modal-footer">
      <a href="#" id="delete_link" class="btn btn-danger" > <?php echo $this->lang->line('delete');?> </a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->






