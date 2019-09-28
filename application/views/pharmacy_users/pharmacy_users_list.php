
<div class="row">
	<div class="col-lg-11">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo $this->lang->line('users');?>

			</div>
			<div class="panel-body">
            <table class="table-standard table-clickable full-width" id="myTable">
                  <thead>  
          <tr>  
              
            <th><?php echo $this->lang->line('business_name');?></th>
            <th><?php echo $this->lang->line('piva');?></th>
            <th><?php echo $this->lang->line('user_name');?> </th>
            <th><?php echo $this->lang->line('phone');?></th>
          </tr>  
        </thead>  
        <tbody>  
        <?php 
		foreach($user_list as $user)
		{
			?>
            <tr>  
              <td><a style="text-decoration : none; color : #000;" href="<?php echo site_url('pharmacy_user_details/'.$user['admin_user_id']);?>" ><?php echo $user['ragione_sociale'];?></a></td>
              <td><a style="text-decoration : none; color : #000;"  href="<?php echo site_url('pharmacy_user_details/'.$user['admin_user_id']);?>" ><?php echo $user['piva'];?></a></td>  
              <td><a style="text-decoration : none; color : #000;"  href="<?php echo site_url('pharmacy_user_details/'.$user['admin_user_id']);?>" ><?php echo $user['admin_user_name'];?></a></td>  
              <td><a style="text-decoration : none; color : #000;"  href="<?php echo site_url('pharmacy_user_details/'.$user['admin_user_id']);?>" ><?php echo $user['telefono'];?></a></td>  
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
       