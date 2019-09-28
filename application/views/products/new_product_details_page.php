




<div class="row">
    <div class="col-lg-11">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $this->lang->line('product_details')?>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12" id="gm_details">
                        <div class="form-group" align="center">
                            <img src="<?php echo $product['product_new_linkImmagineProdotto'];?>" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('chain_code');?></label>
                            <p><?php echo $product['product_new_codice_catena'];?></p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('site_code');?></label>
                            <p><?php echo $product['product_new_codice_sito'];?></p>
                        </div>
                        <div class="form-group">
                            <div class="row row-padding-small">
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('internal_code');?></label>
                                    <p><?php echo $product['product_new_codinterno'];?></p>
                                </div>
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('codminsan');?></label>
                                    <p><?php echo $product['product_new_codminsan'];?></p>
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="row row-padding-small">
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('codean');?></label>
                                    <p><?php echo $product['product_new_codean'];?></p>
                                </div>
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('company_description');?></label>
                                    <p><?php echo $product['product_new_descrizione_ditta'];?></p>
                                </div>
                            </div>
                        </div>




                        <div class="form-group">

                            <div class="col-sm-12">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('search_description');?></label>
                                <p><?php echo $product['product_new_descrizione_ricerca'];?></p>
                            </div>


                        </div>




                        <div class="form-group">
                            <div class="row row-padding-small">
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('ecommerce_description');?></label>
                                    <p><?php echo $product['product_new_descrizione_ecommerce'];?></p>
                                </div>
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('synthetic_product_description');?></label>
                                    <p><?php echo $product['product_new_descrizione_h1'];?></p>
                                </div>
                            </div>
                        </div>




                        <div class="form-group">
                            <div class="row row-padding-small">
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('description_h2');?></label>
                                    <p><?php echo $product['product_new_descrizione_h2'];?></p>
                                </div>
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('net_web_price');?></label>
                                    <p><?php echo $product['product_new_prezzo_web_netto'];?></p>
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="row row-padding-small">
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('gross_web_price');?></label>
                                    <p><?php echo $product['product_new_prezzo_web_lordo'];?></p>
                                </div>
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('web_discount');?></label>
                                    <p><?php echo $product['product_new_sconto_web'];?></p>
                                </div>
                            </div>
                        </div>




                        <div class="form-group">
                            <div class="row row-padding-small">
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('vat');?></label>
                                    <p><?php echo $product['product_new_iva'];?></p>
                                </div>
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('viewing_home_page');?></label>
                                    <p><?php echo $product['product_new_visualizzazione_home_page'];?></p>
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="row row-padding-small">
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1"<?php echo $this->lang->line('view_owl');?></label>
                                    <p><?php echo $product['product_new_visualizzazione_civetta'];?></p>
                                </div>
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('monograph_code');?></label>
                                    <p><?php echo $product['product_new_codice_monografia'];?></p>
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="row row-padding-small">
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('text_image_code');?></label>
                                    <p><?php echo $product['product_new_codice_testo_immagine'];?></p>
                                </div>
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('product_image_link');?></label>
                                    <p><a href="<?php echo $product['product_new_linkPaginaProdotto'];?>" target="_blank">Pagina</a></p>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="row row-padding-small">
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('categorie');?></label>
                                    <p><?php echo $product['product_new_tree_label'];?></p>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <center><a class="btn-send" href="<?php echo site_url('products');?>"><?php echo $this->lang->line('back');?></a></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
