	

<div class="row">
	<div class="col-lg-11">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo $this->lang->line("all_events");?>
               <a href="<?php echo site_url('add_new_events');?>"><button class="btn btn-primary btn-spacing-left btn-circular-small pull-right btn-margin-negative" aria-label="Left Align" type="button"> + </button></a>

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
						<th style="text-align:center !important;"><?php echo $this->lang->line('duration');?></th>
						<th style="text-align:center !important;"><?php echo $this->lang->line('status');?></th>
						<th style="text-align:center !important;"><?php echo $this->lang->line('action');?></th>
					</thead>
					<tbody>
						<?php foreach ($all_events as $event): ?>
						<tr >
							<td width="30%" style="text-align:center !important;"><?php echo $event['events_name'];  ?> </td>
							<td width="30%" style="text-align:center !important;"><?php echo $event['events_starting_date_time']. " - ".$event['events_ending_date_time'];  ?></td>
							<td width="20%%" style="text-align:center !important;"> <?php echo $event['ongoing']==1?$this->lang->line('ongoing'):($event['upcoming']==1?$this->lang->line('upcoming'):"");?></td>
							<td width="10%" style="text-align:center !important;">
								
                                <a href="<?php echo base_url() ?>edit_events/<?php echo $event['events_id'];?>" title="edit"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;
    							<!--<a href="#" onclick="delete_model(<?php echo $event['events_id'];?>)"><span class="glyphicon glyphicon-trash"></span></a>&nbsp;-->
								<a href="<?php echo base_url() ?>view_events/<?php echo $event['events_id'];  ?>" title="View"><span class="glyphicon glyphicon-eye-open"></span></a>
    									<!--
										<?php if ($row->events_active==1): ?>
											<a style="text-decoration:none;" href="<?php echo base_url() ?>change_status/<?php echo $row->events_id;  ?>/<?php echo $row->events_active;  ?>/<?php echo $this->uri->segment(1, 0) ?>" title="active"><span class="label label-success">Active</span></a>
										<?php else: ?>
											<a style="text-decoration:none;" href="<?php echo base_url() ?>change_status/<?php echo $row->events_id;  ?>/<?php echo $row->events_active;  ?>/<?php echo $this->uri->segment(1, 0) ?>" title="inactive"><span class="label label-danger">Inactive</span></a>
										<?php endif; ?>
                                        -->
                                
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
        <a href="#" id="delete_link" class="btn btn-danger"><?php echo $this->lang->line('delete');?></a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



