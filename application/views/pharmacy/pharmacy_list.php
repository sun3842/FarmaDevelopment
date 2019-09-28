
<div class="row">
	<div class="col-lg-11">
		<div class="panel panel-default">
			<div class="panel-heading">
                <?php echo $this->lang->line('pharmacy'); ?>

			</div>
			<div class="panel-body">
            <table class="table-standard table-clickable full-width" id="myTable">
                  <thead>  
          <tr>  
              
            <th><?php echo $this->lang->line('business_name'); ?></th>
            <th><?php echo $this->lang->line('piva'); ?></th>
            <th><?php echo $this->lang->line('city'); ?></th>
            <th><?php echo $this->lang->line('phone'); ?></th>
          </tr>  
        </thead>  
        <tbody>  
        <?php 
		foreach($pharmacy_list as $pharmacy)
		{
			?>
            <tr>  
              <td><?php echo $pharmacy['ragione_sociale'];?></td>  
              <td><?php echo $pharmacy['piva'];?></td>  
              <td><?php echo $pharmacy['citta'];?></td>  
              <td><?php echo $pharmacy['telefono'];?></td>  
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
       