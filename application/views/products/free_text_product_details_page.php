




<div class="row">
    <div class="col-lg-11">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $this->lang->line('free_text_product');?>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <img src="<?php if($product['product_free_text_image_storage_path']!='') echo base_url($product['product_free_text_image_storage_path']);else echo 'http://www.placehold.it/250x250/EFEFEF/AAAAAA&amp;text=no+image'?>" height="250px" width="250px">
                    </div>
                    <div class="col-xs-12">
                        <h3 class="strong"><?php echo $product['product_free_text_name']?></h3>
                    </div>
                    <div class="col-xs-12">
                       <?php echo $this->lang->line('price');?>: <?php echo $product['product_free_text_price']?>
                    </div>
                    <div class="col-xs-12">
                        <i style="opacity: .8"><?php echo $product['product_free_text_description']?></i>
                    </div>
                </div>
                <div class="form-group" style="margin: 5% 0">
                    <center><a class="btn-send" href="<?php echo site_url('products');?>"><?php echo $this->lang->line('back');?></a></center>
                </div>
            </div>
        </div>
    </div>
</div>
