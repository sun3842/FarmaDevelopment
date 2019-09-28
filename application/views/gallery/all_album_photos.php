
<br/><br/>

<div class="row">
		<div class="table-responsive">
			<table class="table">
			<tr>
			<td class="text-center col-lg-3 col-md-4 col-xs-6 thumb"	style="vertical-align: middle;">
                <a class="thumbnail" style="padding: 47px 0;text-decoration:none;border:dashed;"  href="<?php echo base_url() ?>add_new_album">
					
					<div	style="font-size:50px!important;color:#ADB3BB" class="glyphicon glyphicon-plus"></div>
					<h4>Create Album</h4>
                   
					
                </a>
            </td>
			<?php 
			$i=1;
			foreach($query_album as $row): ?>
			<?php 

			$url=base_url().$row->image_storage_base_path_android."/xxxhdpi/".$row->image_name_as_saved;

			
			?>
             <td class="col-lg-3 col-md-4 col-xs-6 thumb">
                <span class="thumbnail" >
                <a  href="<?php echo base_url() ?>gallery/album_delete_by_url?id=<?php echo $row->image_album_id ?>">
						<i id="rmv" style="display:none;" class="glyphicon glyphicon-remove"></i>
				 </a>
					<a href="<?php echo base_url() ?>get_album_photo/<?php echo  $row->image_album_id ?>"><img  src="<?php echo base_url() ?>assets/timthumb.php?src=<?php echo $url ?>&q=100&w=240&h=180" alt=""></a>
					<div class="caption">
                    <h4>
						<a href="<?php echo base_url() ?>get_album_photo/<?php echo  $row->image_album_id ?>">	
						Album:	<?php echo $row->image_album_name ?>
						</a>
					</h4>
                    <p>Caption:	<?php echo $row->image_name ?></p>
					</div>
					
                </span>
            </td>
			
			
			
			
			<?php	
			$i++;
			
			if($i%4===0)
				echo "</tr><tr>";

			endforeach; ?>
			</tr>
			</table>
       
        </div>
</div>		
