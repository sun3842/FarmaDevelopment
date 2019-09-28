
<div class="row">
	<div class="col-lg-11">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item active">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><?php echo $this->lang->line('products');?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><?php echo $this->lang->line('new_products');?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><?php echo $this->lang->line('free_text_product');?></a>
            </li>
        </ul>
        <br>
        <div class="tab-content" id="pills-tabContent">

            <div class="tab-pane panel panel-default active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="panel-heading">
                    <?php echo $this->lang->line('products');?>

                </div>
                <div class="panel-body">
                    <table class="table-standard table-clickable full-width" id="myTable">
                        <thead>
                        <tr>

                            <th><?php echo $this->lang->line('image');?></th>
                            <th><?php echo $this->lang->line('categories');?></th>
                            <th><?php echo $this->lang->line('synthetic_product_description');?></th>
                            <th><?php echo $this->lang->line('product_page_link');?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($products_list as $product)
                        {
                            ?>
                            <tr>
                                <td><a style="text-decoration : none; color : #000;"  href="<?php echo site_url('products_details/'.$product['product_id']);?>"><img src="<?php if($product['linkImmagineProdotto']!='')echo $product['linkImmagineProdotto'];else echo "http://www.placehold.it/50x50/EFEFEF/AAAAAA&amp;text=no+image"?>" width="50px" height="50px" /></a></td>
                                <td><a style="text-decoration : none; color : #000;" href="<?php echo site_url('products_details/'.$product['product_id']);?>"><?php echo $product['tree_label'];?></a></td>
                                <td><a style="text-decoration : none; color : #000;"  href="<?php echo site_url('products_details/'.$product['product_id']);?>"><?php echo $product['descrizione_h1'];?></a></td>
                                <td><a style="text-decoration : none; color : #000;"  href="<?php echo $product['linkPaginaProdotto'];?>" target="_blank">pagina</a></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="tab-pane panel panel-default " id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="panel-heading">
                    <?php echo $this->lang->line('new_products');?>

                </div>
                <div class="panel-body">
                    <table class="table-standard table-clickable full-width" id="newProductTable">
                        <thead>
                        <tr>

                            <th><?php echo $this->lang->line('image');?></th>
                            <th><?php echo $this->lang->line('product_from')?></th>
                            <th><?php echo $this->lang->line('categories');?></th>
                            <th><?php echo $this->lang->line('synthetic_product_description');?></th>
                            <th><?php echo $this->lang->line('product_page_link');?></th>
                            <th><?php echo $this->lang->line('option');?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($new_product_list as $product)
                        {
                            ?>
                            <tr>
                                <td><a style="text-decoration : none; color : #000;"  href="<?php echo site_url('new_products_details/'.$product['product_new_id']);?>"><img src="<?php if($product['product_new_linkImmagineProdotto']!='')echo $product['product_new_linkImmagineProdotto'];else echo "http://www.placehold.it/50x50/EFEFEF/AAAAAA&amp;text=no+image"?>" width="50px" height="50px" /></a></td>
                                <td><?php if($product['ragione_sociale']!='') echo $product['ragione_sociale']; else echo "Farma";?></td>
                                <td><a style="text-decoration : none; color : #000;" href="<?php echo site_url('new_products_details/'.$product['product_new_id']);?>"><?php echo $product['product_new_tree_label'];?></a></td>
                                <td width="43%"><a style="text-decoration : none; color : #000;"  href="<?php echo site_url('new_products_details/'.$product['product_new_id']);?>"><?php echo $product['product_new_descrizione_h1'];?></a></td>
                                <td><a style="text-decoration : none; color : #000;"  href="<?php echo $product['product_new_linkPaginaProdotto'];?>" target="_blank">pagina</a></td>
                                <td>
                                    <?php if(($this->session->userdata('pharmacy_id')!=NULL&&$product['product_new_ref_pharmacy_id']!=NULL) || $this->session->userdata('pharmacy_id')==NULL){?>
                                    <a href="<?php echo base_url('edit_new_product/'.$product['product_new_id']) ?>" data-placement="top" data-toggle="tooltip"
                                       title="<?php echo $this->lang->line('edit')?>"><span class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                                                                              aria-hidden="true"></i> </span></a>
                                    <a href="#"  onclick="delete_model(<?php echo $product['product_new_id']; ?>)" class="deletebutton" data-placement="top"
                                       data-toggle="tooltip" title="<?php echo $this->lang->line('delete')?>"><span class="btn btn-danger btn-sm"><i class="fa fa-trash-o"
                                                                                                                                                     aria-hidden="true"></i> </span></a>
                                    <?php }?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="tab-pane panel panel-default " id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="panel-heading">
                    <?php echo $this->lang->line('free_text_product');?>

                </div>
                <div class="panel-body">
                    <table class="table-standard table-clickable full-width" id="freeTextProduct">
                        <thead>
                        <tr>

                            <th><?php echo $this->lang->line('image');?></th>
                            <th><?php echo $this->lang->line('product_from')?></th>
                            <th><?php echo $this->lang->line('title');?></th>
                            <th><?php echo $this->lang->line('product_details');?></th>


                            <th><?php echo $this->lang->line('normal_price');?></th>
                            <th><?php echo $this->lang->line('option');?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($free_product_list as $product)
                        {
                            ?>
                            <tr>
                                <td><a style="text-decoration : none; color : #000;"  href="<?php echo site_url('free_text_product_details_page/'.$product['product_free_text_id']);?>"><img src="<?php if($product['product_free_text_image_storage_path']!='')echo $product['product_free_text_image_storage_path'];else echo "http://www.placehold.it/50x50/EFEFEF/AAAAAA&amp;text=no+image"?>" width="50px" height="50px" /></a></td>
                                <td><?php if($product['ragione_sociale']!='') echo $product['ragione_sociale']; else echo "Farma";?></td>
                                <td><a style="text-decoration : none; color : #000;" href="<?php echo site_url('free_text_product_details_page/'.$product['product_free_text_id']);?>"><?php echo $product['product_free_text_name'];?></a></td>
                                <td width="35%"><a style="text-decoration : none; color : #000;"  href="<?php echo site_url('free_text_product_details_page/'.$product['product_free_text_id']);?>"><?php echo $product['product_free_text_description'];?></a></td>
                                <td><?php echo $product['product_free_text_price']?></a></td>
                                <td>
                                    <?php if(($this->session->userdata('pharmacy_id')!=NULL&&$product['ref_product_free_text_pharmacy_id']!=NULL) || $this->session->userdata('pharmacy_id')==NULL){?>
                                    <a href="<?php echo base_url('free_text_product_edit_page/'.$product['product_free_text_id']) ?>" data-placement="top" data-toggle="tooltip"
                                       title="<?php echo $this->lang->line('edit')?>"><span class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                                                                              aria-hidden="true"></i> </span></a>
                                    <a href="#" onclick="delete_model2(<?php echo $product['product_free_text_id']; ?>)" class="deletebutton" data-placement="top"
                                       data-toggle="tooltip" title="<?php echo $this->lang->line('delete')?>"><span class="btn btn-danger btn-sm"><i class="fa fa-trash-o"
                                                                                                                                                           aria-hidden="true"></i> </span></a>
                                    <?php }?>
                                </td>
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
