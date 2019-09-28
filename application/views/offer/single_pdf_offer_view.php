
<div class="row">
    <div class="col-lg-11">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span><?php echo $this->lang->line('offer_details');?></span>
            </div>


            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12" id="gm_details">




<button class="pull-right btn btn-warning" data-toggle="modal" data-target="#myModal3" style="margin-bottom: 2%">EDIT</button>



<div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">






        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo $this->lang->line('edit'); ?></h4>
            </div>
            <?php echo form_open_multipart('edit_offer/'.$offer['offer_pdf_id'],array("id"=>"pdfoffer")); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for=""><?php echo $this->lang->line('change_pdf');?></label>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <!--                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">-->
                        <!--                                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=Add+Pdf" alt="" />-->
                        <!--                                                        <input type="hidden" name="offer_type" value="1">-->
                        <!--                                                    </div>-->
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=Change+Pdf" alt="" />

                        </div>
                        <div>
										   <span class="btn btn-white btn-file">
										   <span class="fileupload-new btn btn-green"><i class="fa fa-paper-clip"></i><?php echo $this->lang->line('browse');?></span>
                                               <br>
										   <span style="margin: 5% 0" class="fileupload-exists btn btn-warning"><i class="fa fa-undo"></i> <?php echo $this->lang->line('change');?></span>

										   <input type="file" class="default" name="filepdf" />
										   </span><br>
                            <span style="margin-left: 15px" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> <?php echo $this->lang->line('remove');?></span>
                        </div>
                    </div>
                </div>

                <div class='form-group'>
                    <div class="row">
                        <div class="col-sm-12">
                            <label><?php echo $this->lang->line('offer_title');?></label><span class='text-danger'>*</span>
                            <input type='text' class='form-control'   name='offer_pdf_title' value="<?php echo ($this->input->post('offer_pdf_title') ? $this->input->post('offer_pdf_title') : $offer['offer_pdf_title']); ?>"  required>
                            <span class='text-danger'><?php  echo form_error('	offer_pdf_title'); ?></span>
                            <input type="hidden" name="edit_offer_type" value="1">
                            <input type="hidden" name="offer_pdf" value="<?php echo $offer['offer_pdf_storage'] ?>">
                            <input type="hidden" name="offer_pdf_id" value="<?php echo $offer['offer_pdf_id'] ?>">
                        </div>


                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for=""><?php echo $this->lang->line('starting_date');?> </label>
                            <input type="text" class="form-control offer_starting_date" id="offer_starting_date" name="offer_starting_date" value="<?php echo ($this->input->post('offer_starting_date') ? $this->input->post('offer_starting_date') : $offer['offer_pdf_starting_date_time']); ?>" required>
                            <span class='text-danger'><?php  echo form_error('offer_starting_date'); ?></span>
                        </div>
                        <div class="col-sm-6">
                            <label for=""><?php echo $this->lang->line('ending_date');?> </label>
                            <input type="text" class="form-control offer_ending_date" id="offer_ending_date" name="offer_ending_date" value="<?php echo ($this->input->post('offer_ending_date') ? $this->input->post('offer_ending_date') : $offer['offer_pdf_ending_date_time']); ?>" required>
                            <span class='text-danger'><?php  echo form_error('offer_ending_date_pdf'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('close'); ?></button>
                <button type="submit" class="btn btn-green" ><?php echo $this->lang->line('edit'); ?></button>
            </div>
            <?php echo form_close(); ?>
        </div>

    </div>
</div>





<div class="form-group" align="center">
    <object width="100%" height="600" data="<?php echo base_url().$offer['offer_pdf_storage']; ?>">
    </object>

</div>

<br>
<br>


<div class="form-group">
    <label for="exampleInputEmail1"><?php echo $this->lang->line('offer_title'); ?></label>
    <p><?php echo $offer['offer_pdf_title'];?></p>
</div>
<div class="form-group">
    <label for="exampleInputEmail1"><?php echo $this->lang->line('starting_time'); ?></label>
    <p><?php $sd= $offer['offer_pdf_starting_date_time']; echo date_format( new DateTime($sd), 'd M Y' );?></p>
</div>
<div class="form-group">
    <label for="exampleInputEmail1"><?php echo $this->lang->line('ending_time'); ?></label>
    <p><?php $ed= $offer['offer_pdf_ending_date_time']; echo date_format( new DateTime($ed), 'd M Y' );?></p>
</div>

<?php
$offerObj=new offer_model();
$all_offer=$offerObj->get_all_pdf_offer_products($offer['offer_pdf_id']);


?>

<hr>

                        <div class="table-responsive" style="margin: 5% 0">
                            <table class="table table-striped table-hover table-clickable full-width" id="myTable2">
                                <thead>


                                <th>  <?php echo $this->lang->line("id"); ?></th>
                                <th> <?php echo $this->lang->line("offer_type"); ?></th>
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
                                            <?php
                                            if ($n['ref_offer_products_offerr_pdf_id']!=null && $n['ref_offer_products_final_product_id']!=null)
                                            {
                                                echo "Pdf Offer";
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

                                        </td>
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





























<div class="col-md-6 col-sm-12 col-xs-12" style="margin: 5% 0">
    <a class="btn-send" href="<?php echo site_url('offer');?>"><?php echo $this->lang->line('back'); ?></a>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
