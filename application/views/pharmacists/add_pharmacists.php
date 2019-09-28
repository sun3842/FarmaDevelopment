<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bootstrap-fileupload/bootstrap-fileupload.css" />
<style>
    .error{color:red;}
</style>
<div class="row">

    <div class="col-lg-12">




        <div class="panel panel-default">

            <div class="panel-heading">
                <?php echo $this->lang->line('menu_add_new_pharmacist')?>

            </div>
            <div class="panel-body">

                <?php

                $attributes = array('method' => 'POST', 'id' => 'form_pharmacist');
                echo form_open_multipart("add_new_pharmacist", $attributes);
                ?>
                <?php if (isset($message)) : ?>
                    <h1 class="text-center text-success"><?php echo $message;?></h1>	<br/>
                <?php endif; ?>

                <div class='form-group'>
                    <label><?php echo $this->lang->line('first_name')?></label><span class='text-danger'>*</span>
                    <input type='text' class='form-control'   name='first_name' placeholder='<?php echo $this->lang->line('first_name')?>' >
                    <span class='text-danger'><?php  echo form_error('first_name'); ?></span>
                </div>
                <div class='form-group'>
                    <label><?php echo $this->lang->line('last_name')?></label><span class='text-danger'>*</span>
                    <input type='text' class='form-control'   name='last_name' placeholder='<?php echo $this->lang->line('last_name')?>' >
                    <span class='text-danger'><?php  echo form_error('last_name'); ?></span>
                </div>
                <div class='form-group'>
                    <label><?php echo $this->lang->line('job_position')?></label>
                    <input type='text' class='form-control'   name='job_position' placeholder='<?php echo $this->lang->line('job_position')?>' >
                </div>

                <div class="form-group avater">
                    <h4><?php echo $this->lang->line('upload_a_photo')?></h4>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                        </div>
                        <div>
										   <span class="btn btn-white btn-file">
										   <span class="fileupload-new"><i class="fa fa-paper-clip"></i><?php echo $this->lang->line('browse');?></span>
										   <span class="fileupload-exists"><i class="fa fa-undo"></i> <?php echo $this->lang->line('change');?></span>
										   <input type="file" class="default" name="userfile" />
										   </span>
                            <span class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i><?php echo $this->lang->line('remove');?></span>
                        </div>
                    </div>

                </div>


                <center>
                    <button class="btn-send">
                        <?php echo $this->lang->line('save')?><i class="fa fa-save fa-spacing-left"></i>
                    </button>
                </center>
                <?php echo form_close(); ?>

            </div>

        </div>









    </div>
</div>
