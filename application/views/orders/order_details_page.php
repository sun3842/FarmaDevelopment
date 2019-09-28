<div class="row">
    <div class="col-lg-11">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $this->lang->line('user_details')?>
            </div>
            <div class="panel-body">
                <div class="row">

                    <div class="col-xs-12">
                        <h2 class="strong"><?php echo $user['app_user_first_name'].' '.$user['app_user_last_name']?></h2>
                    </div>
                    <div class="col-xs-12">
                        <p><?php echo $user['app_user_email']?> </p>
                        <p><?php echo $user['app_user_cell_phone']?> </p>
                        <p><?php echo $user['app_user_address']?> </p>
                    </div>
                </div>
            </div>

            <div class="panel-heading">
                <?php echo $this->lang->line('orders')?>
            </div>
            <div class="panel-body table-responsive">
                <table class="table table-standard table-clickable full-width" id="myTable">
                    <thead>
                    <tr>
                        <th><?php echo $this->lang->line('photo')?></th>
                        <th><?php echo $this->lang->line('product_details')?></th>
                        <th><?php echo $this->lang->line('product_type')?></th>
                        <th><?php echo $this->lang->line('quantity')?></th>
                        <th><?php echo $this->lang->line('unit_price')?></th>
                        <th><?php echo $this->lang->line('total_price')?></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php  $total_price=0; foreach ($products AS $product) { ?>
                        <tr>
                            <td><img height="50px" width="50px"
                                     src="<?php if ($product['linkImmagineProdotto'] != '') echo $product['linkImmagineProdotto']; else if ($product['product_new_linkImmagineProdotto'] != '') echo $product['product_new_linkImmagineProdotto']; else if ($product['product_free_text_image_storage_path'] != '') echo base_url().$product['product_free_text_image_storage_path']; else echo 'http://www.placehold.it/50x50/EFEFEF/AAAAAA&amp;text=no+image' ?>">
                            </td>
                            <td width="30%"><?php if ($product['descrizione_h1'] != '') echo $product['descrizione_h1']; else if ($product['product_new_descrizione_h1'] != '') echo $product['product_new_descrizione_h1']; else  echo $product['product_free_text_description'] ?></td>
                            <td><?php if($product['ref_final_product_product_id'] != '') echo "Pharma"; else if ($product['product_new_ref_pharmacy_id'] != '') echo 'Pharmacy'; else if($product['product_free_text_from_farma'] !=1) echo 'Pharmacy'; else echo 'Pharma'; ?></td>
                            <td><?php echo $product['user_orders_product_quantity'] ?></td>
                            <td><?php echo $product['user_orders_product_per_price'] ?></td>
                            <td><?php echo $product['user_orders_product_quantity'] * $product['user_orders_product_per_price'] ?></td>
                        </tr>
                    <?php $total_price=$total_price+($product['user_orders_product_quantity'] * $product['user_orders_product_per_price']); } ?>
                    </tbody>
                    <tfoot>
                    <td ><b><?php echo $this->lang->line('total_price')?></b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><b><?php echo $total_price?></b></td>
                    </tfoot>
                </table>
            </div>
            <?php if($this->session->userdata('pharmacy_id')!=NULL){?>
            <div class="panel-body">
                <?php if($user['user_orders_is_delivered']==0){?>
                <button onclick="deliver_order(<?php echo $user['user_orders_id']?>)" class="btn btn-green pull-right"><i class="fa fa-truck" style="font-size: xx-large"> <?php echo $this->lang->line('deliver')?></i></button>
                <?php } else {?>
                    <a href="#" onclick="return_order(<?php echo $user['user_orders_id']?>)" class="btn btn-green pull-right"><i class="fa fa-mail-reply-all" style="font-size: xx-large"> <?php echo $this->lang->line('return_order')?></i></a>
                <?php }?>
            </div>
            <?php }?>
        </div>
    </div>
</div>

<div class="modal fade" id="order_deliver_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><?php echo $this->lang->line('delivery_message')?></p>
                <form method="post" action="" id="delete_link">
                <textarea id="delivery_message" name="delivery_message" class="form-control" rows="5" cols="75"></textarea>

            </div>
            <div class="modal-footer">
                <button type="submit" id="delete" class="btn btn-danger"><?php echo $this->lang->line('deliver')?></button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


<div class="modal fade" id="order_return_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><?php echo $this->lang->line('are_you_sure_to_return_order')?></p>

            </div>
            <div class="modal-footer">
                <a href="" id="return_link" class="btn btn-danger"><?php echo $this->lang->line('return')?></a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>