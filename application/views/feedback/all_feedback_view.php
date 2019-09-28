	


		



<div class="row">
	<div class="col-lg-11">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo $this->lang->line('all_feedbacks');?>
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
						<th style="text-align:center !important"><?php echo $this->lang->line('client_name');?></th>
						<th style="text-align:center !important;"><?php echo $this->lang->line('rating_score');?></th>
						<th style="text-align:center !important;"><?php echo $this->lang->line('opinion');?></th>
                        <th style="text-align:center !important;"><?php echo $this->lang->line('date');?></th>
						<th style="text-align:center !important;"><?php echo $this->lang->line('action');?></th>
					</thead>
					<tbody>
						<?php foreach ($query_result as $row): ?>
						<tr >
							<td width="20%" style="text-align:center !important;"> <?php echo $row->ref_app_user_details_app_user_id==NULL ?$this->lang->line('not_registered'):$row->app_user_first_name." ".$row->app_user_last_name;  ?> </td>
							<td width="10%" style="text-align:center !important;"><?php echo $row->feedback_rating_score;  ?></td>
							<td width="20%%" style="text-align:center !important;"> <?php echo $row->feedback_message;  ?></td>
                            <td width="40%%" style="text-align:center !important;"> <?php echo $row->feedback_giving_date_time;  ?></td>
							<td width="10%" style="text-align:center !important;">
								
                                
                                  <a href='<?php echo base_url() ?>view_feedback/<?php echo $row->feedback_id;  ?>' title='View'><span class='glyphicon glyphicon-eye-open'></span></a>
    								
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


