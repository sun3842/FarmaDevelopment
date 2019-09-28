
<div class="row">
	<div class="col-lg-11">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo $this->lang->line('user_details');?>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-6" id="gm_details">
                           <div class="form-group" align="center">
                                
								<p style="font-size:larger; font-style:italic;"><b><?php echo $pharmacy_user['ragione_sociale'];?></b></p>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1"><?php echo $this->lang->line('address');?></label>
								<p><?php echo $pharmacy_user['indirizzo'];?></p>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1"><?php echo $this->lang->line('city');?></label>
								<p><?php echo $pharmacy_user['citta'];?></p>
							</div>
                            <div class="form-group">
								<label for="exampleInputEmail1"><?php echo $this->lang->line('piva');?></label>
								<p><?php echo $pharmacy_user['piva'];?></p>
							</div>
                            <div class="form-group">
								<label for="exampleInputEmail1"><?php echo $this->lang->line('email');?></label>
								<p><?php echo $pharmacy_user['email'];?></p>
							</div>
                            <div class="form-group">
								<label for="exampleInputEmail1"><?php echo $this->lang->line('phone');?></label>
								<p><?php echo $pharmacy_user['telefono'];?></p>
							</div>
                           
                            
                            
						<div class="form-group">
								<center><a class="btn-send" href="<?php echo site_url('pharmacy_user_list_page');?>"><?php echo $this->lang->line('back');?></a></center>
							</div>
					</div>
                    
                    <div class="col-sm-6">
                     <div class="form-group">
								<label for="exampleInputEmail1"><?php echo $this->lang->line('user_name');?></label>
								<p><?php echo $pharmacy_user['admin_user_name'];?></p>
							</div>
                            
                            <div class="form-group">
								<button class="btn-send" onclick="change_password();"><?php echo $this->lang->line('change_password');?></button>
							</div>
                            
                    </div>
				</div>
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
       <form>
        <div class="form-group" align="center">
        <p style="color:#F00;font-weight:900;"> IT IS DISABLED FOR DEVELOPING PURPOSE.</p>
        </div>
                        <div class="form-group">
								<label for="exampleInputEmail1"><?php echo $this->lang->line('new_password');?></label>
								<input type='text' class='form-control'   name='new_password'  >
							</div>
                            <div class="form-group">
								<label for="exampleInputEmail1"><?php echo $this->lang->line('confirm_password');?></label>
								<input type='text' class='form-control'   name='confirm_password'  >
							</div>
                            <div class="form-group">
                            <input type="submit" align="middle" class="btn-send" name="submit_new_password" value="<?php echo $this->lang->line('save');?>" disabled="disabled" />
                            </div>
       </form>
      </div>
      <div class="modal-footer">
        <a href="#" id="delete_link" class="btn btn-danger"><?php echo $this->lang->line('delete');?></a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.moda