
<br/><br/>

<div class="row">
		<div class="table-responsive">
			<table id="load_data" class="table">
			<tr>
				<td class="text-center col-lg-3 col-md-4 col-xs-6 thumb"	style="vertical-align: middle;">
                <a class="thumbnail" style="padding: 47px 0;text-decoration:none;border:dashed;"  href="<?php echo base_url() ?>add_album_image/<?php if(isset($album_id)) echo $album_id ?>">
					
					<div style="font-size:47px!important;color:#ADB3BB" class="glyphicon glyphicon-plus"></div>
					<span style="font-size:60px!important;color:#ADB3BB">/</span> 
					<div style="font-size:40px!important;color:#ADB3BB" class="glyphicon glyphicon-pencil"></div>
					<h4>Add Images / Modify Images</h4>
                   
					
                </a>
            </td>
			<?php 
			$i=1;
			foreach($query_result as $row): ?>
			<?php 
			
			$url=base_url().$row->image_storage_base_path_android."/xxxhdpi/".$row->image_name_as_saved;

			?>
            <td class="col-lg-3 col-md-4 col-xs-6 thumb">
                <span class="thumbnail" >
					 <a  href="<?php echo base_url() ?>gallery/do_delete_by_url?page=photo&op=delete&name=<?php echo $row->image_name_as_saved ?>&id=<?php echo $row->image_id ?>">
						<i id="rmv" style="display:none;" class="glyphicon glyphicon-remove"></i>
					 </a>
					 <a href="" data-toggle="modal" data-target="#popup_<?php echo $row->image_id ?>">
					 <img  src="<?php echo base_url() ?>assets/timthumb.php?src=<?php echo $url ?>&q=100&w=240&h=180" alt="">
					 </a>
              
					
                </span>
				<input type="hidden" id="h_album_id"  name="album_id" value="<?php echo $row->ref_image_image_album_id ?>">
            </td>
			
			
			<div class="modal fade" id="popup_<?php echo $row->image_id ?>">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  </div>
				  <div class="modal-body">
					<p>	<?php echo  $this->lang->line('album'); ?>:<?php echo $row->image_album_name ?></p>
					<figure>
					   <img src="<?php echo base_url() ?>all_images/image_gallery/original_image/<?php echo $row->image_name_as_saved ?>" class="img-responsive" alt=""> 
					  <figcaption><?php echo $row->image_name ?></figcaption>
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
			
			
			<?php		
			$i++;
			
			if($i%4===0)
				echo "</tr><tr>";
			endforeach; ?>
			</tr>
			</table>
			<div id="loadmoreajaxloader" class="text-center" style="display:none;">
				<img src="<?php echo base_url() ?>assets/img/loading-icon.gif" height="80">
			</div>
       
        </div>
</div>		
