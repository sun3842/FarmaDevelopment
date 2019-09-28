<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bootstrap-fileupload/bootstrap-fileupload.css" />
<style type="text/css">
    .datepicker-dropdown{
        position:absolute !important;

    }
    #group_lawyer_name_text_field
    {
        width:300px;
        border:solid 1px orange;
        padding:5px;
        font-size:14px;
    }
    #result #result_personal_client #result_company_client
    {
        position:relative;
        width:auto;
        display:none;
        margin-top:-1px;
        border-top:0px;
        overflow:hidden;
        border:1px #4fc0e9 solid;
        background-color: white;
        border-top: 0;

    }
    .show
    {
        padding:10px;

        font-size:15px;
        height:auto;
    }
    .show:hover
    {
        background:#4fc0e9;
        color:#FFF;
        cursor:pointer;
    }
    .show span{
        padding: 15px 0;
    }
    .error{
        color:#F00 !important;
    }
</style>
<div class="row">
    <div class="col-lg-12">

        <div class="tab-content">

            <div class="panel panel-default tab-pane active"   role="tabpanel"  id="panel-3">

                <div class="panel-heading">
                    <?php echo $this->lang->line('free_text_product');?>

                </div>

                <div class="panel-body">
                    <div class=" col-sm-12 col-xs-12">
                        <?php
                        $attributes = array('method' => 'POST', 'id' => 'free_text_product');
                        echo form_open_multipart("free_text_product_edit_page/".$product['product_free_text_id'], $attributes);
                        ?>

                        <?php if (isset($message)) : ?>
                            <h1 class="text-center text-success"><?php echo $message;?></h1>	<br/>
                        <?php endif; ?>

                        <div class="form-group">
                            <label for=""><?php echo $this->lang->line('display_image');?></label>
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="<?php if($product['product_free_text_image_storage_path']!=NULL) echo base_url($product['product_free_text_image_storage_path']) ; else echo 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"'?>" width="250" height="150"/>
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                                </div>
                                <div>
										   <span class="btn btn-default btn-file">
										   <span class="fileupload-new"><i class="fa fa-paper-clip"></i>Browse</span>
										   <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
										   <input type="file" class="default" name="userfile" id="imageFreeText" />
										   </span>
                                    <span class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i>Remove</span>
                                </div>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label><?php echo $this->lang->line('product_title');?></label><span class='text-danger'>*</span>
                            <input type='text' class='form-control app_user_name_class'  value="<?php echo $product['product_free_text_name']?>"  name="product_title" id="product_title_text_field"   >

                            <span class='text-danger'></span>
                        </div>

                        <div class='form-group'>
                            <label> <?php echo $this->lang->line('product_description');?> </label><span class='text-danger'>*</span>
                            <textarea class='form-control'   name='product_description' id="product_description"><?php echo $product['product_free_text_description']?></textarea>
                            <span class='text-danger'></span>
                        </div>








                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for=""><?php echo $this->lang->line('normal_price');?></label><span class='text-danger'>*</span>
                                    <input type="text" class="form-control" id="product_normal_price" value="<?php echo $product['product_free_text_price']?>" name="product_normal_price">
                                    <span class='text-danger'><?php  echo form_error('product_normal_price'); ?></span>
                                </div>
                                <!--                                <div class="col-sm-6">-->
                                <!--                                    <label for="">Product Offer Price </label><span class='text-danger'>*</span>-->
                                <!--                                    <input type="text" class="form-control" id="product_offer_price" name="product_offer_price">-->
                                <!--                                    <span class='text-danger'>--><?php // echo form_error('product_offer_price'); ?><!--</span>-->
                                <!--                                </div>-->
                            </div>
                        </div>










                        <center class="">
                            <button class="btn-send">
                                <?php echo $this->lang->line('save');?><i class="fa fa-send fa-spacing-left"></i>
                            </button>
                        </center>

                        <?php echo form_close(); ?>




                    </div>

                </div>

            </div>


        </div>
    </div>
</div>
