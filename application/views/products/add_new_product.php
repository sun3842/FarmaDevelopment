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

        <ul class="nav nav-tabs" role="tablist">

            <li role="presentation" class="active"><a href="#panel-2" aria-controls="panel-2" role="tab" data-toggle="tab"><?php echo $this->lang->line('add_product_with_all_info');?></a></li>
            <li role="presentation" class=""><a href="#panel-3" aria-controls="panel-3" role="tab" data-toggle="tab"><?php echo $this->lang->line('free_text_product');?></a></li>
        </ul>
        <div class="tab-content">

            <div class="panel panel-default tab-pane active" role="tabpanel" id="panel-2">
                <div class="panel-heading">
                    <?php echo $this->lang->line('add_product_with_all_info');?>
                </div>
                <?php
                $attributes = array('method' => 'POST', 'id' => 'add_product');
                echo form_open_multipart("add_new_product", $attributes);
                ?>
                <div class="panel-body">

                    <div class=" col-sm-12 col-xs-12">
                        <?php if (isset($message)) : ?>
                            <h1 class="text-center text-success"><?php echo $message;?></h1>	<br/>
                        <?php endif; ?>



                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="codice_catena" class="" control-label"><?php echo $this->lang->line('chain_code');?></label>
                                <input type="text" name="codice_catena" class="form-control" id="codice_catena" value="<?php echo $this->input->post('codice_catena'); ?>"/>

                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="codice_sito" class="" control-label"><?php echo $this->lang->line('site_code');?></label>

                                <input type="text" name="codice_sito" class="form-control" id="codice_sito" value="<?php echo $this->input->post('codice_sito'); ?>">

                            </div>
                        </div>


                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="codinterno" class="" control-label"><?php echo $this->lang->line('internal_code');?></label>

                                <input type="text" name="codinterno" class="form-control" id="codinterno" value="<?php echo $this->input->post('codinterno'); ?>">

                            </div>
                        </div>


                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="codminsan" class="" control-label"><?php echo $this->lang->line('codminsan');?></label>

                                <input type="text" name="codminsan" class="form-control" id="codminsan" value="<?php echo $this->input->post('codminsan'); ?>">

                            </div>
                        </div>


                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="codean" class="" control-label"><?php echo $this->lang->line('codean');?></label>

                                <input type="text" name="codean" class="form-control" id="codean" value="<?php echo $this->input->post('codean'); ?>">

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="descrizione_ricerca" class="" control-label"><?php echo $this->lang->line('search_description');?></label>

                                <textarea name="descrizione_ricerca" class="form-control" id="descrizione_ricerca"><?php echo $this->input->post('descrizione_ricerca'); ?></textarea>

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="descrizione_ecommerce" class="" control-label"><?php echo $this->lang->line('ecommerce_description');?></label>

                                <textarea name="descrizione_ecommerce" class="form-control" id="descrizione_ecommerce"><?php echo $this->input->post('descrizione_ecommerce'); ?></textarea>

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="descrizione_h1" class="" control-label"><?php echo $this->lang->line('description_h1');?></label>

                                <input type="text" name="descrizione_h1" class="form-control" id="descrizione_h1" value="<?php echo $this->input->post('descrizione_h1'); ?>">

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="descrizione_h2" class="" control-label"><?php echo $this->lang->line('description_h2');?></label>

                                <input type="text" name="descrizione_h2" class="form-control" id="descrizione_h2" value="<?php echo $this->input->post('descrizione_h2'); ?>">

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="descrizione_ditta" class="" control-label"><?php echo $this->lang->line('company_description');?></label>

                                <textarea name="descrizione_ditta" class="form-control" id="descrizione_ditta"><?php echo $this->input->post('descrizione_ditta'); ?></textarea>

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="prezzo_web_netto" class="" control-label"><?php echo $this->lang->line('net_web_price');?></label>

                                <input type="text" name="prezzo_web_netto" class="form-control" id="prezzo_web_netto" value="<?php echo $this->input->post('prezzo_web_netto'); ?>">

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="prezzo_web_lordo" class="" control-label"><?php echo $this->lang->line('gross_web_price');?></label>

                                <input type="text" name="prezzo_web_lordo" class="form-control" id="prezzo_web_lordo" value="<?php echo $this->input->post('prezzo_web_lordo'); ?>">

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="sconto_web" class="" control-label"><?php echo $this->lang->line('web_discount');?></label>

                                <input type="text" name="sconto_web" class="form-control" id="sconto_web" value="<?php echo $this->input->post('sconto_web'); ?>">

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="iva" class="" control-label"><?php echo $this->lang->line('vat');?></label>

                                <input type="text" name="iva" class="form-control" id="iva" value="<?php echo $this->input->post('iva'); ?>">

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="visualizzazione_home_page" class="" control-label"><?php echo $this->lang->line('viewing_home_page');?></label>

                                <input type="text" name="visualizzazione_home_page" class="form-control" id="visualizzazione_home_page" value="<?php echo $this->input->post('visualizzazione_home_page'); ?>">

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="visualizzazione_civetta" class="" control-label"><?php echo $this->lang->line('view_owl');?></label>

                                <input type="text" name="visualizzazione_civetta" class="form-control" id="visualizzazione_civetta" value="<?php echo $this->input->post('visualizzazione_civetta'); ?>">

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="codice_monografia" class="" control-label"><?php echo $this->lang->line('monograph_code');?></label>

                                <input type="text" name="codice_monografia" class="form-control" id="codice_monografia" value="<?php echo $this->input->post('codice_monografia'); ?>">

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="codice_testo_immagine" class="" control-label"><?php echo $this->lang->line('text_image_code');?></label>

                                <input type="text" name="codice_testo_immagine" class="form-control" id="codice_testo_immagine" value="<?php echo $this->input->post('codice_testo_immagine'); ?>">

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="linkImmagineProdotto" class="" control-label"><?php echo $this->lang->line('product_image_link');?></label>

                                <input type="text" name="linkImmagineProdotto" class="form-control" id="linkImmagineProdotto" value="<?php echo $this->input->post('linkImmagineProdotto'); ?>">

                            </div>
                        </div>


                        <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="tree_id_label" class="" control-label"><?php echo $this->lang->line('tree_label_id');?></label>

                                <input type="text" name="tree_id_label" value="<?php echo $this->input->post('tree_id_label'); ?>" class="form-control" id="tree_id_label" readonly/>

                        </div>
                        </div>

                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="tree_label" class="" control-label"><?php echo $this->lang->line('tree_label');?></label>
                                <select  name="tree_label" id="tree_label" class="form-control">
                                    <option value="0">None</option>
                                    <?php foreach ($categories AS $category){?>
                                        <option value="<?php echo $category['descrizione']?>" role="<?php echo $category['codice_categoria'] ?>"><?php echo $category['descrizione']?></option>
                                    <?php }?>

                                </select>
<!--                                <input type="text" name="tree_label" class="form-control" id="tree_label" value="--><?php //echo $this->input->post('tree_label'); ?><!--">-->

                            </div>
                        </div>



                        <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="linkPaginaProdotto" class="" control-label"><?php echo $this->lang->line('product_page_link');?></label>

                                <input type="text" name="linkPaginaProdotto" class="form-control" id="linkPaginaProdotto" value="<?php echo $this->input->post('linkPaginaProdotto'); ?>">

                        </div>
                        </div>









                    </div>


                </div>

                <center class="pull-right">
                    <button class="btn-send" name="save_product" type="submit">
                        <?php echo $this->lang->line('save');?><i class="fa fa-send fa-spacing-left"></i>
                    </button>
                </center>

                <?php echo form_close(); ?>
            </div>


            <div class="panel panel-default tab-pane "  role="tabpanel"  id="panel-3">

                <div class="panel-heading">
                    <?php echo $this->lang->line('free_text_product');?>

                </div>

                <div class="panel-body">
                    <div class=" col-sm-12 col-xs-12">
                        <?php
                        $attributes = array('method' => 'POST', 'id' => 'free_text_product');
                        echo form_open_multipart("add_new_product", $attributes);
                        ?>

                        <?php if (isset($message)) : ?>
                            <h1 class="text-center text-success"><?php echo $message;?></h1>	<br/>
                        <?php endif; ?>

                        <div class="form-group">
                            <label for=""> <?php echo $this->lang->line('display_image');?></label>
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""  />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                                </div>
                                <div>
										   <span class="btn btn-default btn-file">
										   <span class="fileupload-new"><i class="fa fa-paper-clip"></i> <?php echo $this->lang->line('browse');?></span>
										   <span class="fileupload-exists"><i class="fa fa-undo"></i> <?php echo $this->lang->line('change');?></span>
										   <input type="file" class="default" name="userfile" id="imageFreeText" />
										   </span>
                                    <span class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i><?php echo $this->lang->line('remove');?></span>
                                </div>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label><?php echo $this->lang->line('product_title');?></label><span class='text-danger'>*</span>
                            <input type='text' class='form-control app_user_name_class'   name="product_title" id="product_title_text_field"   >

                            <span class='text-danger'></span>
                        </div>

                        <div class='form-group'>
                            <label><?php echo $this->lang->line('product_description');?> </label><span class='text-danger'>*</span>
                            <textarea class='form-control'   name='product_description' id="product_description"></textarea>
                            <span class='text-danger'></span>
                        </div>








                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for=""><?php echo $this->lang->line('normal_price');?></label><span class='text-danger'>*</span>
                                    <input type="text" class="form-control" id="product_normal_price" name="product_normal_price">
                                    <span class='text-danger'><?php  echo form_error('product_normal_price'); ?></span>
                                </div>
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
