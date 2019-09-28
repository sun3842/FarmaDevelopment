
<div class="row">
	<div class="col-lg-11">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo $this->lang->line('menu_news');?>

			</div>
			<div class="panel-body">
            <table class="table-standard table-clickable full-width" id="myTable">
                  <thead>  
          <tr>  
              
            <th><?php echo $this->lang->line('news_title');?></th>  
            <th><?php echo $this->lang->line('news_details');?></th>
            <th><?php echo $this->lang->line('creating_date_time');?></th>  
            <th><?php echo $this->lang->line('action');?></th>  
          </tr>  
        </thead>  
        <tbody>  
        <?php 
		foreach($all_news as $news)
		{
			?>
            <tr>  
              <td><?php echo $news['news_title'];?></td>  
              <td><?php echo $news['news_description'];?></td>  
              <td><?php echo $news['news_created_edited_date_time'];?></td>  
              <td><a href="<?php echo base_url() ?>view_news/<?php echo $news['news_id'];?>" title="View"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp;<a href="#" onclick="delete_model(<?php echo $news['news_id'];?>)"><span class='glyphicon glyphicon-trash'></span></a>&nbsp;</td>  
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




       