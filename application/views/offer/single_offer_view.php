<div class="row">
    <div class="col-lg-11">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span><?php echo $this->lang->line('offer_details');?></span>
            </div>


            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12" id="gm_details">
                        <?php

                            $finalProductId=$offer['ref_offer_products_final_product_id'];
                            $finalProductObj=new offer_model();
                            $finalProduct=$finalProductObj->get_final_product($finalProductId);
                        if ($finalProduct['ref_final_product_product_id']!=null) {

                            $productObj = new products_model();
                            $product = $productObj->get_product_details($finalProduct['ref_final_product_product_id']);



                            ?>
                            <button class="pull-right btn btn-warning" data-toggle="modal"
                                    data-target="#myModal"><?php echo $this->lang->line('edit'); ?></button>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"><?php echo $this->lang->line('edit'); ?></h4>
                                        </div>
                                        <?php echo form_open('edit_offer/' . $offer['offer_products_id'], array("id" => "editOffer")); ?>
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <label><?php echo $this->lang->line('offer_price'); ?></label><span
                                                                class='text-danger'>*</span>
                                                        <input type='number' class='form-control' name='offer_price'
                                                               value="<?php echo($this->input->post('offer_price') ? $this->input->post('offer_price') : $offer['offer_products_offer_price']); ?>"
                                                               required>
                                                        <span class='text-danger'><?php echo form_error('offer_price'); ?></span>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label for=""><?php echo $this->lang->line('starting_date'); ?> </label>
                                                        <input type="text" class="form-control offer_starting_date"
                                                               id="offer_starting_date" name="offer_starting_date"
                                                               value="<?php echo($this->input->post('offer_starting_date') ? $this->input->post('offer_starting_date') : $offer['offer_products_starting_date_time']); ?>"
                                                               required>
                                                        <span class='text-danger'><?php echo form_error('offer_starting_date'); ?></span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for=""><?php echo $this->lang->line('ending_date'); ?> </label>
                                                        <input type="text" class="form-control offer_starting_date"
                                                               id="offer_ending_date" name="offer_ending_date"
                                                               value="<?php echo($this->input->post('offer_ending_date') ? $this->input->post('offer_ending_date') : $offer['offer_products_ending_date_time']); ?>"
                                                               required>
                                                        <span class='text-danger'><?php echo form_error('offer_ending_date'); ?></span>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                    data-dismiss="modal"><?php echo $this->lang->line('close'); ?></button>
                                            <button type="submit"
                                                    class="btn btn-green"><?php echo $this->lang->line('edit'); ?></button>

                                        </div>
                                        <?php echo form_close(); ?>
                                    </div>

                                </div>
                            </div>


                            <div class="form-group" align="center">
                                <img src="<?php echo $product['linkImmagineProdotto']; ?>"/>
                            </div>


                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <h2 class="text-success"><?php echo $this->lang->line('normal_price'); ?>
                                    : <?php echo $product['prezzo_web_netto']; ?> </h2>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <h2 class="text-info"> <?php echo $this->lang->line('offer_price'); ?>
                                    : <?php echo $offer['offer_products_offer_price']; ?> </h2>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12" style="margin-bottom: 5%">
                                <h4 class="text-warning"><?php echo $this->lang->line('starting_date'); ?>:
                                    <strong> <?php $sd = $offer['offer_products_starting_date_time'];
                                        echo date_format(new DateTime($sd), 'd M Y'); ?></strong></h4>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12" style="margin-bottom: 5%">
                                <h4 class="text-danger"><?php echo $this->lang->line('ending_date'); ?>:
                                    <strong><?php $ed = $offer['offer_products_ending_date_time'];
                                        echo date_format(new DateTime($ed), 'd M Y'); ?></strong></h4>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('chain_code'); ?></label>
                                <p><?php echo $product['codice_catena']; ?></p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('site_code'); ?></label>
                                <p><?php echo $product['codice_sito']; ?></p>
                            </div>
                            <div class="form-group">
                                <div class="row row-padding-small">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('codinterno'); ?></label>
                                        <p><?php echo $product['codinterno']; ?></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('codminsan'); ?></label>
                                        <p><?php echo $product['codminsan']; ?></p>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row row-padding-small">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('codean'); ?></label>
                                        <p><?php echo $product['codean']; ?></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('company_description'); ?></label>
                                        <p><?php echo $product['descrizione_ditta']; ?></p>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">

                                <div class="col-sm-12">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('search_description'); ?></label>
                                    <p><?php echo $product['descrizione_ricerca']; ?></p>
                                </div>


                            </div>


                            <div class="form-group">
                                <div class="row row-padding-small">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('ecommerce_description'); ?></label>
                                        <p><?php echo $product['descrizione_ecommerce']; ?></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('description_h1'); ?></label>
                                        <p><?php echo $product['descrizione_h1']; ?></p>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row row-padding-small">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('description_h2'); ?></label>
                                        <p><?php echo $product['descrizione_h2']; ?></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('net_web_price'); ?></label>
                                        <p><?php echo $product['prezzo_web_netto']; ?></p>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row row-padding-small">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('gross_web_price'); ?></label>
                                        <p><?php echo $product['prezzo_web_lordo']; ?></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('web_discount'); ?></label>
                                        <p><?php echo $product['sconto_web']; ?></p>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row row-padding-small">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('vat'); ?></label>
                                        <p><?php echo $product['iva']; ?></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('viewing_home_page'); ?></label>
                                        <p><?php echo $product['visualizzazione_home_page']; ?></p>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row row-padding-small">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('view_owl'); ?></label>
                                        <p><?php echo $product['visualizzazione_civetta']; ?></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('monograph_code'); ?></label>
                                        <p><?php echo $product['codice_monografia']; ?></p>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row row-padding-small">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('image_text_code'); ?></label>
                                        <p><?php echo $product['codice_testo_immagine']; ?></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('product_page_link'); ?></label>
                                        <p><a href="<?php echo $product['linkPaginaProdotto']; ?>" target="_blank">Pagina</a>
                                        </p>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row row-padding-small">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('categories'); ?></label>
                                        <p><?php echo $product['tree_label']; ?></p>
                                    </div>

                                </div>
                            </div>
                            <?php
                        }
                        $finalProductId=$offer['ref_offer_products_final_product_id'];
                        $finalProductObj=new offer_model();
                        $finalProduct=$finalProductObj->get_final_product($finalProductId);

                            if ($finalProduct['ref_final_product_product_new_id']!=null)
                            {

                            $productObj= new products_model();
                            $productNew=$productObj->get_new_product_details($finalProduct['ref_final_product_product_new_id']);


                            ?>


                                <button class="pull-right btn btn-warning" data-toggle="modal"
                                        data-target="#myModalnew"><?php echo $this->lang->line('edit'); ?></button>

                                <!-- Modal -->
                                <div class="modal fade" id="myModalnew" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"><?php echo $this->lang->line('edit'); ?></h4>
                                            </div>
                                            <?php echo form_open('edit_offer/' . $offer['offer_products_id'], array("class" => "")); ?>
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('offer_price'); ?></label><span
                                                                    class='text-danger'>*</span>
                                                            <input type='text' class='form-control' name='offer_price'
                                                                   value="<?php echo($this->input->post('offer_price') ? $this->input->post('offer_price') : $offer['offer_products_offer_price']); ?>"
                                                                   required>
                                                            <span class='text-danger'><?php echo form_error('offer_price'); ?></span>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <label for=""><?php echo $this->lang->line('starting_date'); ?> </label>
                                                            <input type="text" class="form-control offer_starting_date"
                                                                   id="offer_starting_date" name="offer_starting_date"
                                                                   value="<?php echo($this->input->post('offer_starting_date') ? $this->input->post('offer_starting_date') : $offer['offer_products_starting_date_time']); ?>"
                                                                   required>
                                                            <span class='text-danger'><?php echo form_error('offer_starting_date'); ?></span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label for=""><?php echo $this->lang->line('ending_date'); ?> </label>
                                                            <input type="text" class="form-control offer_starting_date"
                                                                   id="offer_ending_date" name="offer_ending_date"
                                                                   value="<?php echo($this->input->post('offer_ending_date') ? $this->input->post('offer_ending_date') : $offer['offer_products_ending_date_time']); ?>"
                                                                   required>
                                                            <span class='text-danger'><?php echo form_error('offer_ending_date'); ?></span>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                        data-dismiss="modal"><?php echo $this->lang->line('close'); ?></button>
                                                <button type="submit"
                                                        class="btn btn-green"><?php echo $this->lang->line('edit'); ?></button>

                                            </div>
                                            <?php echo form_close(); ?>
                                        </div>

                                    </div>
                                </div>


                                <div class="form-group" align="center">
                                    <img src="<?php echo $productNew['product_new_linkImmagineProdotto']; ?>"/>
                                </div>


                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <h2 class="text-success"><?php echo $this->lang->line('normal_price'); ?>
                                        : <?php echo $productNew['product_new_prezzo_web_netto']; ?> </h2>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <h2 class="text-info"> <?php echo $this->lang->line('offer_price'); ?>
                                        : <?php echo $offer['offer_products_offer_price']; ?> </h2>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12" style="margin-bottom: 5%">
                                    <h4 class="text-warning"><?php echo $this->lang->line('starting_date'); ?>:
                                        <strong> <?php $sd = $offer['offer_products_starting_date_time'];
                                            echo date_format(new DateTime($sd), 'd M Y'); ?></strong></h4>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12" style="margin-bottom: 5%">
                                    <h4 class="text-danger"><?php echo $this->lang->line('ending_date'); ?>:
                                        <strong><?php $ed = $offer['offer_products_ending_date_time'];
                                            echo date_format(new DateTime($ed), 'd M Y'); ?></strong></h4>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('chain_code'); ?></label>
                                    <p><?php echo $productNew['product_new_codice_catena']; ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('site_code'); ?></label>
                                    <p><?php echo $productNew['product_new_codice_sito']; ?></p>
                                </div>
                                <div class="form-group">
                                    <div class="row row-padding-small">
                                        <div class="col-sm-6">
                                            <label for="exampleInputEmail1"><?php echo $this->lang->line('codinterno'); ?></label>
                                            <p><?php echo $productNew['product_new_codinterno']; ?></p>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="exampleInputEmail1"><?php echo $this->lang->line('codminsan'); ?></label>
                                            <p><?php echo $productNew['product_new_codminsan']; ?></p>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row row-padding-small">
                                        <div class="col-sm-6">
                                            <label for="exampleInputEmail1"><?php echo $this->lang->line('codean'); ?></label>
                                            <p><?php echo $productNew['product_new_codean']; ?></p>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="exampleInputEmail1"><?php echo $this->lang->line('company_description'); ?></label>
                                            <p><?php echo $productNew['product_new_descrizione_ditta']; ?></p>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">

                                    <div class="col-sm-12">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('search_description'); ?></label>
                                        <p><?php echo $productNew['product_new_descrizione_ricerca']; ?></p>
                                    </div>


                                </div>


                                <div class="form-group">
                                    <div class="row row-padding-small">
                                        <div class="col-sm-6">
                                            <label for="exampleInputEmail1"><?php echo $this->lang->line('ecommerce_description'); ?></label>
                                            <p><?php echo $productNew['product_new_descrizione_ecommerce']; ?></p>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="exampleInputEmail1"><?php echo $this->lang->line('description_h1'); ?></label>
                                            <p><?php echo $productNew['product_new_descrizione_h1']; ?></p>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row row-padding-small">
                                        <div class="col-sm-6">
                                            <label for="exampleInputEmail1"><?php echo $this->lang->line('description_h2'); ?></label>
                                            <p><?php echo $productNew['product_new_descrizione_h2']; ?></p>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="exampleInputEmail1"><?php echo $this->lang->line('net_web_price'); ?></label>
                                            <p><?php echo $productNew['product_new_prezzo_web_netto']; ?></p>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row row-padding-small">
                                        <div class="col-sm-6">
                                            <label for="exampleInputEmail1"><?php echo $this->lang->line('gross_web_price'); ?></label>
                                            <p><?php echo $productNew['product_new_prezzo_web_lordo']; ?></p>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="exampleInputEmail1"><?php echo $this->lang->line('web_discount'); ?></label>
                                            <p><?php echo $productNew['product_new_sconto_web']; ?></p>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row row-padding-small">
                                        <div class="col-sm-6">
                                            <label for="exampleInputEmail1"><?php echo $this->lang->line('vat'); ?></label>
                                            <p><?php echo $productNew['product_new_iva']; ?></p>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="exampleInputEmail1"><?php echo $this->lang->line('viewing_home_page'); ?></label>
                                            <p><?php echo $productNew['product_new_visualizzazione_home_page']; ?></p>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row row-padding-small">
                                        <div class="col-sm-6">
                                            <label for="exampleInputEmail1"><?php echo $this->lang->line('view_owl'); ?></label>
                                            <p><?php echo $productNew['product_new_visualizzazione_civetta']; ?></p>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="exampleInputEmail1"><?php echo $this->lang->line('monograph_code'); ?></label>
                                            <p><?php echo $productNew['product_new_codice_monografia']; ?></p>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row row-padding-small">
                                        <div class="col-sm-6">
                                            <label for="exampleInputEmail1"><?php echo $this->lang->line('image_text_code'); ?></label>
                                            <p><?php echo $productNew['product_new_codice_testo_immagine']; ?></p>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="exampleInputEmail1"><?php echo $this->lang->line('product_page_link'); ?></label>
                                            <p><a href="<?php echo $productNew['product_new_linkPaginaProdotto']; ?>" target="_blank">Pagina</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row row-padding-small">
                                        <div class="col-sm-6">
                                            <label for="exampleInputEmail1"><?php echo $this->lang->line('categories'); ?></label>
                                            <p><?php echo $productNew['product_new_tree_label']; ?></p>
                                        </div>

                                    </div>
                                </div>


                        <?php


                        }

                        if ($finalProduct['ref_final_product_product_free_text_id']!=null)
                        {

                            $productObj=new products_model();
                        $freetext=$productObj->get_product_free_text($finalProduct['ref_final_product_product_free_text_id'])


                        ?>

                            <button class="pull-right btn btn-warning" data-toggle="modal" data-target="#myModal2"><?php echo $this->lang->line('edit');?></button>



                            <div class="modal fade" id="myModal2" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"><?php echo $this->lang->line('edit');?></h4>
                                        </div>
                                        <?php echo form_open('edit_offer/'.$offer['offer_products_id'],array("class"=>"")); ?>
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <label><?php echo $this->lang->line('offer_price'); ?></label><span
                                                                class='text-danger'>*</span>
                                                        <input type='text' class='form-control' name='offer_price' value="<?php echo ($this->input->post('offer_price') ? $this->input->post('offer_price') : $offer['offer_products_offer_price']); ?>" required>
                                                        <span class='text-danger'><?php echo form_error('offer_price'); ?></span>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label for=""><?php echo $this->lang->line('starting_date');?> </label>
                                                        <input type="text" class="form-control offer_starting_date" id="offer_starting_date" name="offer_starting_date" value="<?php echo ($this->input->post('offer_starting_date') ? $this->input->post('offer_starting_date') : $offer['offer_products_starting_date_time']); ?>" required>
                                                        <span class='text-danger'><?php  echo form_error('offer_starting_date'); ?></span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for=""><?php echo $this->lang->line('ending_date');?> </label>
                                                        <input type="text" class="form-control offer_starting_date" id="offer_ending_date" name="offer_ending_date" value="<?php echo ($this->input->post('offer_ending_date') ? $this->input->post('offer_ending_date') : $offer['offer_products_ending_date_time']); ?>" required>
                                                        <span class='text-danger'><?php  echo form_error('offer_ending_date'); ?></span>
                                                    </div>
                                                </div>
                                            </div>




                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('close');?></button>
                                            <button type="submit" class="btn btn-green" ><?php echo $this->lang->line('edit');?></button>

                                        </div>
                                        <?php echo  form_close(); ?>
                                    </div>

                                </div>
                            </div>






                        <div class="form-group" align="center">
                            <img src="<?php echo base_url()."/".$freetext['product_free_text_image_storage_path'];?>" width="40%" />
                        </div>

                         <div class="col-md-6 col-sm-12 col-xs-12">
                             <h2 class="text-success"><?php echo $this->lang->line('normal_price');?>:  <?php echo $freetext['product_free_text_price'];?> </h2>
                         </div>
                         <div class="col-md-6 col-sm-12 col-xs-12">
                             <h2 class="text-info"> <?php echo $this->lang->line('offer_price');?>:  <?php echo $offer['offer_products_offer_price'];?> </h2>
                         </div>
                         <div class="col-md-6 col-sm-12 col-xs-12" style="margin-bottom: 5%">
                             <h4 class="text-warning"><?php echo $this->lang->line('starting_date');?>:  <strong> <?php $sd= $offer['offer_products_starting_date_time']; echo date_format( new DateTime($sd), 'd M Y' );?></strong></h4>
                         </div>
                         <div class="col-md-6 col-sm-12 col-xs-12" style="margin-bottom: 5%">
                             <h4 class="text-danger"><?php echo $this->lang->line('ending_date');?>:   <strong><?php $ed= $offer['offer_products_ending_date_time']; echo date_format( new DateTime($ed), 'd M Y' );?></strong> </h4>
                         </div>





                        <div class="form-group">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('product_name');?></label>
                            <p><?php echo $freetext['product_free_text_name'];?></p>
                        </div>
                        <div class="form-group ">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('product_description');?></label>
                            <p style="overflow: auto"><?php echo $freetext['product_free_text_description'];?></p>
                        </div>





                        <?php } ?>


                        <div class="col-md-6 col-sm-12 col-xs-12" style="margin: 5% 0">
                            <a class="btn-send" href="<?php echo site_url('offer');?>"><?php echo $this->lang->line('back'); ?></a>
                        </div>

                    </div>
                </div>
            </div>
          </div>
    </div>
</div>
	