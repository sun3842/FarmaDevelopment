
<br/><br/>

<div class="row">
		<div class="table-responsive">
			<table id="load_data" class="table">
			<tr>
			<?php 
			$i=0;
			foreach($query_result as $row): ?>
			<?php 
			if($i%4==0)
				echo "</tr><tr>";
			$url=base_url().$row->gallery_image_storage_path;
				

			?>
            <td class="col-lg-3 col-md-4 col-xs-6 thumb">
                <span class="thumbnail" >
					 <a  href="<?php echo base_url() ?>gallery/do_delete_by_url?page=photo&op=delete&name=<?php echo $row->gallery_image_storage_path ?>&id=<?php echo $row->gallery_image_id ?>">
						<i id="rmv" style="display:none;" class="glyphicon glyphicon-remove"></i>
					 </a>
					 <a href="" data-toggle="modal" data-target="#popup_<?php echo $row->gallery_image_id ?>">
					 <img  src="<?php echo base_url() ?>assets/timthumb.php?src=<?php echo $url ?>&q=100&w=240&h=180" alt="">
					 </a>
              
					
                </span>
				<input type="hidden" id="h_album_id"  name="album_id" value="<?php echo $row->gallery_image_id ?>">
            </td>
			
			
			<div class="modal fade" id="popup_<?php echo $row->gallery_image_id ?>">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  </div>
				  <div class="modal-body">
					<p>	<?php echo  $this->lang->line('album'); ?>:<?php echo $row->gallery_image_title ?></p>
					<figure>
					   <img src="<?php echo base_url() ?><?php echo $row->gallery_image_storage_path ?>" class="img-responsive" alt=""> 
					  <figcaption><?php echo $row->gallery_image_title ?></figcaption>
					</figure>
					<p><?php //echo $row->image_description ?>	</p>

				  </div>
				  <div class="modal-footer">
					<button type = "button" class = "btn btn-danger" data-dismiss = "modal">
					   <?php echo  $this->lang->line('close_button'); ?>
					</button>
					
				  </div>
				</div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			
			
			<?php	++$i; endforeach; ?>
			</tr>
			</table>
			<div id="loadmoreajaxloader" class="text-center" style="display:none;">
				<img src="<?php echo base_url() ?>assets/img/loading-icon.gif" height="80">
			</div>
       
        </div>
</div>		
