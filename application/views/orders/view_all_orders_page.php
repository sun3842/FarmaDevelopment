<div class="row">
    <div class="col-lg-11">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $this->lang->line('orders'); ?>

            </div>
            <div class="panel-body table-responsive">
                <table class="table table-standard table-clickable full-width" id="myTable">
                    <thead>
                    <tr>

                        <th><?php echo $this->lang->line('order_id'); ?></th>
                        <?php if($this->session->userdata('pharmacy_id')== NULL){?>
                            <th><?php echo $this->lang->line('pharmacy_name'); ?></th>
                        <?php }?>
                        <th><?php echo $this->lang->line('user_name'); ?></th>
                        <th><?php echo $this->lang->line('email'); ?></th>
                        <th><?php echo $this->lang->line('phone'); ?></th>
                        <th><?php echo $this->lang->line('total_price'); ?></th>
                        <th><?php echo $this->lang->line('total_item'); ?></th>
                        <th><?php echo $this->lang->line('order_status'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;
                    foreach ($orders as $order) { ?>

                        <?php
                        $order_products=new orders_model();
                        $products=$order_products->get_order_products_by_order_id($order['user_orders_id']);
                        $total_price=0;
                        foreach ($products AS $product){
                            $total_price=$total_price+($product['user_orders_product_quantity']*$product['user_orders_product_per_price']);
                        }
                        ?>

                        <tr>
                            <td><a href="<?php echo base_url('order_details_page/'.$order['user_orders_id'])?>"><?php echo $i ?></a></td>
                            <?php if($this->session->userdata('pharmacy_id')== NULL){?>

                                <td><a href="<?php echo base_url('order_details_page/'.$order['user_orders_id'])?>"><?php echo $order['ragione_sociale']?></a></td>
                            <?php }?>
                            <td><a href="<?php echo base_url('order_details_page/'.$order['user_orders_id'])?>"><?php echo $order['app_user_first_name'].' '.$order['app_user_last_name']; ?></a></td>
                            <td><a href="<?php echo base_url('order_details_page/'.$order['user_orders_id'])?>"><?php echo $order['app_user_email']?></a></td>
                            <td><a href="<?php echo base_url('order_details_page/'.$order['user_orders_id'])?>"><?php echo $order['app_user_cell_phone']?></a></td>
                            <td><a href="<?php echo base_url('order_details_page/'.$order['user_orders_id'])?>"><?php echo $total_price ?></a></td>
                            <td><a href="<?php echo base_url('order_details_page/'.$order['user_orders_id'])?>"><?php echo sizeof($products)?></a></td>
                            <td><a href="<?php echo base_url('order_details_page/'.$order['user_orders_id'])?>"><?php if($order['user_orders_is_delivered']==0) {if(($order['user_orders_is_seen_super_admin']==1&&$this->session->userdata('pharmacy_id')==NULL)||($order['user_orders_is_seen_pharmacy_admin']==1&&$this->session->userdata('pharmacy_id')!=NULL)) echo "<b style='color: blue'>".$this->lang->line('pending')."</b>"; else echo "<b style='color: red'>".$this->lang->line('pending')."</b>";}else echo  "<b style='color: green'>".$this->lang->line('delivered')."</b>";?></a></td>
                        </tr>
                    <?php $i++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>