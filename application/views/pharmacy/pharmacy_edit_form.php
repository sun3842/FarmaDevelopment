<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bootstrap-fileupload/bootstrap-fileupload.css" />
<style>
    .error{color:red;}
</style>
<div class="row">

    <div class="col-lg-12">




        <div class="panel panel-default">

            <div class="panel-heading">
                <?php echo $this->lang->line('edit_pharmacy')?>

            </div>
            <div class="panel-body">
                <?php

                $attributes = array('method' => 'POST', 'id' => 'form_pharmacy');
                echo form_open_multipart("edit_pharmacy/".$pharmacy['pharmacy_id'], $attributes);
                ?>





                <div class="form-group avater">
                    <h4><?php echo $this->lang->line('update_logo')?></h4>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                            <img src="<?php if($pharmacy['pharmacy_logo_storage_path']!='')echo base_url('').$pharmacy['pharmacy_logo_storage_path'];else echo 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image'?>" alt="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" />
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

                <div class='form-group'>
                    <label><?php echo $this->lang->line('pharmacy_facebook_url')?></label><span class='text-danger'></span>
                    <input type='text' class='form-control'  value="<?php echo $pharmacy['pharmacy_facebook_url']?>"  name='pharmacy_facebook_url' placeholder='<?php echo $this->lang->line('pharmacy_facebook_url')?>' >
                    <span class='text-danger'><?php  echo form_error('pharmacy_facebook_url'); ?></span>
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
