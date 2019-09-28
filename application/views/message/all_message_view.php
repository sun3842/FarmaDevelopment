	

		

<div class="row">
	<div class="col-lg-11">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo $this->lang->line('messages');?>
                <a href="<?php echo site_url('add_new_message');?>"><button class="btn btn-primary btn-spacing-left btn-circular-small pull-right btn-margin-negative" aria-label="Left Align" type="button"> + </button></a>
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
						<!--<th>Details</th>-->
						<th style="text-align:center !important;"><?php echo $this->lang->line('type');?></th>
						<th style="text-align:center !important;"><?php echo $this->lang->line('sending_time');?></th>
						<th style="text-align:center !important;"><?php echo $this->lang->line('status');?></th>
						<th style="text-align:center !important;"><?php echo $this->lang->line('action');?></th>
					</thead>
					<tbody>
						<?php foreach ($query_result as $row): ?>
						<tr >
							<td width="40%" style="text-align:center !important;"><?php echo $row->message_title;  ?> </td>
							<!--<td width="35%"><?php echo $row->message_details;  ?></td>-->
							<td width="5%" style="text-align:center !important;"><?php echo $row->ref_message_message_type_id==MSG_TYPE_NORMAL_ID?$this->lang->line('general'):($row->ref_message_message_type_id==MSG_TYPE_PERSONAL_ID?$this->lang->line('personal'):$this->lang->line('group'));  ?></td>
							<td width="25%" style="text-align:center !important;"> <?php echo $row->message_sending_date_time;  ?></td>
							<td width="15%" style="text-align:center !important;"><?php echo $row->message_is_already_sent==1?$this->lang->line('sent_status'):$this->lang->line('pending_status');  ?></td>
							<td width="15%" style="text-align:center !important;">
								<!--<a href="edit_group_message.php" title="edit"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;-->
								<a href="<?php echo base_url() ?>view_message/<?php echo $row->message_id;  ?>" title="View"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp;
								<!--<a href="#" title="delete" data-toggle="modal" data-target="#message_delete"><span class="glyphicon glyphicon-trash"></span></a>-->
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
        <button type="button" class="btn btn-danger"><?php echo $this->lang->line('delete');?></button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
