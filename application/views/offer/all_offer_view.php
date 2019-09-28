<div class="row">
    <div class="col-lg-11">


        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item active">
                <a class="nav-link " id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><?php echo $this->lang->line("offers_pdf"); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><?php echo $this->lang->line("all_offer"); ?></a>
            </li>

        </ul>
        <br>

        <div class="tab-content active" id="pills-tabContent">
            <div class="panel panel-default tab-pane  active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                    <div class="panel-heading">

                        <?php echo $this->lang->line("offers_pdf"); ?>
                        <a href="<?php echo site_url('add_new_offer'); ?>">
                            <button class="btn btn-primary btn-spacing-left btn-circular-small pull-right btn-margin-negative"
                                    aria-label="Left Align" type="button"> +
                            </button>
                        </a>

                    </div>
                    <div class="panel-body">

                        <h1 id="msg" class="text-center text-success"></h1>

                        <div class="table-responsive">
                            <table class="table-striped table-hover table-clickable full-width" id="myTable">
                                <thead>
                                <th>  <?php echo $this->lang->line("id"); ?></th>
                                <th> <?php echo $this->lang->line("offer_type"); ?></th>
                                <th><?php echo $this->lang->line('offer_from')?></th>
                                <th> <?php echo $this->lang->line("offer_title"); ?></th>
                                <th>  <?php echo $this->lang->line("starting_date"); ?></th>
                                <th>  <?php echo $this->lang->line("ending_date"); ?></th>

                                <th> <?php echo $this->lang->line("action"); ?></th>

                                </thead>
                                <tbody>
                                <?php foreach ($query_result as $o): ?>
                                    <tr>
                                        <td><?php echo $o['offer_pdf_id']; ?></td>

                                        <td>
                                            <a href='<?php echo base_url() ?>view_single_pdf_offer/<?php echo $o['offer_pdf_id']; ?>'>
                                            <?php

                                            $oType = 1;

                                            if ($oType == 1) {
                                                echo "OFFER PDF";
                                            } elseif ($oType == 2) {
                                                echo "Free Text Product";
                                            } else {
                                                echo "Network Product";
                                            }

                                            ?>
                                            </a>
                                        </td>
                                        <td><?php if($o['ragione_sociale']!='') echo $o['ragione_sociale']; else echo "Farma";?></td>
                                        <td>
                                            <?php echo $o['offer_pdf_title']; ?>

                                        </td>
                                        <!--                            <td>-->
                                        <?php //echo $o['ref_offer_products_pharmacy_id']; ?><!--</td>-->
                                        <td><?php $sd = $o['offer_pdf_starting_date_time'];
                                            echo date_format(new DateTime($sd), 'd M Y'); ?></td>
                                        <td>
                                            <?php $ed = $o['offer_pdf_ending_date_time'];
                                            echo date_format(new DateTime($ed), 'd M Y'); ?></td>

                                        <td width="10%" style="text-align:center !important;">

                                            <a href='<?php echo base_url() ?>view_single_pdf_offer/<?php echo $o['offer_pdf_id']; ?>'
                                               class="btn btn-primary btn-sm" title='View'><span
                                                        class='glyphicon glyphicon-search'></span></a>
                                            <a href="#" onclick="delete_model2(<?php echo $o['offer_pdf_id']; ?>)"
                                               class="btn btn-danger btn-sm"><span class='glyphicon glyphicon-trash'></span></a>&nbsp;

                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>


                    </div>




            </div>
            <div class="panel panel-default tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                    <div class="panel-heading">
                        <?php echo $this->lang->line("all_offer"); ?>
                        <!--                <a href="-->
                        <?php //echo site_url('add_new_offer');?><!--"><button class="btn btn-primary btn-spacing-left btn-circular-small pull-right btn-margin-negative" aria-label="Left Align" type="button"> + </button></a>-->

                        <a href="<?php echo site_url('add_new_offer'); ?>">
                            <button class="btn btn-primary btn-spacing-left btn-circular-small pull-right btn-margin-negative"
                                    aria-label="Left Align" type="button"> +
                            </button>
                        </a>
                    </div>
                    <div class="panel-body">

                        <div class="table-responsive">
                            <table class="table-striped table-hover table-clickable full-width" id="myTable2">
                                <thead>


                                <th>  <?php echo $this->lang->line("id"); ?></th>
                                <th> <?php echo $this->lang->line("offer_type"); ?></th>
                                <th><?php echo $this->lang->line('offer_from')?></th>
                                <th> <?php echo $this->lang->line("product_title"); ?></th>
                                <th> <?php echo $this->lang->line("image"); ?></th>
                                <th class="text-center">  <?php echo $this->lang->line("starting_date"); ?></th>
                                <th class="text-center">  <?php echo $this->lang->line("ending_date"); ?></th>
                                <th class="text-center">  <?php echo $this->lang->line("normal_price"); ?></th>
                                <th class="text-center">  <?php echo $this->lang->line("product_offer_price"); ?></th>
                                <th class="text-center"> <?php echo $this->lang->line("action"); ?></th>

                                </thead>
                                <?php  $finalProductObj=new offer_model(); ?>
                                <tbody>
                                <?php foreach ($all_offer as $n): ?>
                                    <tr>
                                        <td><?php echo $n['offer_products_id']; ?></td>
                                        <td>
                                            <a href='<?php echo base_url() ?>view_offer/<?php echo $n['offer_products_id']; ?>'>
                                            <?php
                                            if ($n['ref_offer_products_offerr_pdf_id']!=null && $n['ref_offer_products_final_product_id']!=null)
                                            {
                                                echo "Offer Product With Pdf Offer";
                                            }
                                            else
                                            {
                                                $finalProductId=$n['ref_offer_products_final_product_id'];

                                                $finalProductInfo=$finalProductObj->get_final_product($finalProductId);
                                                if ($finalProductInfo['ref_final_product_product_id']!=null)
                                                {
                                                    echo "From Network";
                                                }
                                                elseif ($finalProductInfo['ref_final_product_product_new_id']!=null)
                                                {
                                                    echo "From New Product";
                                                }
                                                elseif ($finalProductInfo['ref_final_product_product_free_text_id']!=null)
                                                {
                                                    echo "Free Text";
                                                }
                                                else
                                                {
                                                    echo "Unknown";
                                                }


                                            }

                                            ?>
                                            </a>
                                        </td>
                                        <td><?php if($o['ragione_sociale']!='') echo $o['ragione_sociale']; else echo "Farma";?></td>
                                        <td>
                                            <?php
                                            $finalProductId=$n['ref_offer_products_final_product_id'];
                                            $finalProduct=$finalProductObj->get_final_product($finalProductId);

                                            if ($finalProduct['ref_final_product_product_id']!=null)
                                            {
                                                $productObj= new products_model();
                                                $productTitle=$productObj->get_product_details($finalProduct['ref_final_product_product_id']);
                                                echo $productTitle['descrizione_h1'];
                                            }
                                            elseif ($finalProduct['ref_final_product_product_new_id']!=null)
                                            {
                                                $newProductObj=new products_model();
                                                $newProduct=$newProductObj->get_new_product($finalProduct['ref_final_product_product_new_id']);
                                                echo $newProduct['product_new_descrizione_h1'];


                                            }
                                            elseif ($finalProduct['ref_final_product_product_free_text_id']!=null)
                                            {
                                                $freetextObj = new products_model();
                                                $freetextInfo = $freetextObj->get_product_free_text($finalProduct['ref_final_product_product_free_text_id']);
                                                echo $freetextInfo['product_free_text_name'];
                                            }
                                            else
                                            {
                                                echo "Unknown";
                                            }


                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $finalProductId=$n['ref_offer_products_final_product_id'];
                                            $finalProduct=$finalProductObj->get_final_product($finalProductId);

                                            if ($finalProduct['ref_final_product_product_id']!=null)
                                            {
                                                $productObj= new products_model();
                                                $productTitle=$productObj->get_product_details($finalProduct['ref_final_product_product_id']);


                                                ?>
                                                <img src="<?php echo $productTitle['linkImmagineProdotto'] ?>" height="50" width="50">
                                            <?php  }
                                            elseif ($finalProduct['ref_final_product_product_new_id']!=null)
                                            {
                                                $newProductObj=new products_model();
                                                $newProduct=$newProductObj->get_new_product($finalProduct['ref_final_product_product_new_id']);


                                                ?>
                                                <img src="<?php echo $newProduct['product_new_linkImmagineProdotto'] ?>" height="50" width="50">
                                            <?php  }
                                            elseif ($finalProduct['ref_final_product_product_free_text_id']!=null)
                                            {
                                                $freetextObj = new products_model();
                                                $freetextInfo = $freetextObj->get_product_free_text($finalProduct['ref_final_product_product_free_text_id']);

                                                ?>
                                                <img src="<?php echo base_url().$freetextInfo['product_free_text_image_storage_path'] ?>" height="50" width="50">
                                            <?php  }
                                            else
                                            { ?>
                                                <img src="'http://www.placehold.it/50x50/EFEFEF/AAAAAA&amp;text=no+image'" height="50" width="50">
                                                <?php
                                            }


                                            ?>
                                        </td>


                                        <td class="text-center"><?php $sd = $n['offer_products_starting_date_time'];
                                            echo date_format(new DateTime($sd), 'd M Y'); ?></td>
                                        <td class="text-center"><?php $ed = $n['offer_products_ending_date_time'];
                                            echo date_format(new DateTime($ed), 'd M Y'); ?></td>
                                        <td class="text-center"><?php echo $n['offer_products_normal_price']; ?></td>
                                        <td class="text-center"><?php echo $n['offer_products_offer_price']; ?></td>
                                        <td width="10%" style="text-align:center !important;">

                                            <a href='<?php echo base_url() ?>view_offer/<?php echo $n['offer_products_id']; ?>'
                                               class="btn btn-primary btn-sm" title='View'><span
                                                        class='glyphicon glyphicon-search'></span></a>
                                            <a href="#" onclick="delete_model(<?php echo $n['offer_products_id']; ?>)"
                                               class="btn btn-danger btn-sm"><span class='glyphicon glyphicon-trash'></span></a>&nbsp;

                                        </td>

                                    </tr>
                                <?php endforeach; ?>

                                </tbody>
                            </table>
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><?php echo $this->lang->line('want_to_delete_it'); ?></p>
            </div>
            <div class="modal-footer">
                <a href="#" id="delete_link" class="btn btn-danger"><?php echo $this->lang->line('delete'); ?></a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


