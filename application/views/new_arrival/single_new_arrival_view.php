<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo $this->lang->line('new_arrival_details');?>
			</div>
			<div class="panel-body">
				<form action="" method="">
					<div class="form-group">
						<label for="Title"><?php echo $this->lang->line('title');?></label><br/>
						<b><?php echo $new_arrival['new_arrival_product_name_title'];?></b>
					</div>
					<div class="form-group">
						<label for="Description"><?php echo $this->lang->line('description');?></label><br/>
                        <?php echo $new_arrival['new_arrival_product_description'];?>
					</div>
					<div class="form-group">
						<label for="Description"><b><?php echo $this->lang->line('status');?> :</b></label>
						<label class="radio-inline"><?php echo $new_arrival['new_arrival_product_is_in_stock']==1?$this->lang->line('in_stock'):($new_arrival['new_arrival_product_is_upcoming']==1?$this->lang->line('upcoming'):"");?></label>
					</div>
					<div class="form-group">
						<label for="Description"><b><?php echo $this->lang->line('price');?> :</b></label>
						<label class="radio-inline"><?php echo ($new_arrival['new_arrival_product_price']!=0? $new_arrival['new_arrival_product_price']:( $new_arrival['new_arrival_product_price_has_range']==1?$new_arrival['new_arrival_product_price_starting_range']." - ".$new_arrival['new_arrival_product_price_ending_range']:""))."  ".$new_arrival['currency_symbol'];?></label>
					</div>
					
					<div class="form-group">
						<label for="Currency"><b><?php echo $this->lang->line('available_until');?> :</b></label>
						<label class="radio-inline"><?php echo $new_arrival['new_arrival_ending_validation_date'];?></label>
					</div>
                    <?php if($new_arrival['new_arrival_image_name_as_saved']!=NULL)
					{?>
					<div class="form-group">
						<label for=""><?php echo $this->lang->line('display_image');?></label>
						<div class="row">
						  <div class="col-lg-3 col-sm-4 col-6"><a href="#" title="Image 1" data-toggle="modal" data-target="#arrival-image"><img src="<?php echo base_url();?>all_images/image_new/original_image/<?php echo $new_arrival['new_arrival_image_name_as_saved'];?>" class="thumbnail img-responsive"></a></div>
						</div>
					</div>
                    <?php
					}
					?>
                    
                    <!--
					<div class="form-group">
						<label for="">Other Images</label>
						<div class="row">
						  <div class="col-lg-3 col-sm-4 col-6"><a href="#" title="Image 1" data-toggle="modal" data-target="#arrival-image"><img src="assets/img/new_demo.png" class="thumbnail img-responsive"></a></div>
						  <div class="col-lg-3 col-sm-4 col-6"><a href="#" title="Image 1" data-toggle="modal" data-target="#arrival-image"><img src="assets/img/new_demo.png" class="thumbnail img-responsive"></a></div>
						  <div class="col-lg-3 col-sm-4 col-6"><a href="#" title="Image 1" data-toggle="modal" data-target="#arrival-image"><img src="assets/img/new_demo.png" class="thumbnail img-responsive"></a></div>
						  <div class="col-lg-3 col-sm-4 col-6"><a href="#" title="Image 1" data-toggle="modal" data-target="#arrival-image"><img src="assets/img/new_demo.png" class="thumbnail img-responsive"></a></div>
						  <div class="col-lg-3 col-sm-4 col-6"><a href="#" title="Image 1" data-toggle="modal" data-target="#arrival-image"><img src="assets/img/new_demo.png" class="thumbnail img-responsive"></a></div>
						  <div class="col-lg-3 col-sm-4 col-6"><a href="#" title="Image 1" data-toggle="modal" data-target="#arrival-image"><img src="assets/img/new_demo.png" class="thumbnail img-responsive"></a></div>
						</div>
					</div>
					<div class="form-group form-inline form-attr">
						<label for="Currency">Attributes for product</label><br/>
						<span>Attribute name </span> <span>Attribute value </span>
					</div>
					<div class="form-group form-inline form-attr">
						<label for="Currency">Attributes for product</label><br/>
						<span>Attribute name </span> <span>Attribute value </span>
					</div>
                    -->
					<div class="form-group form-inline form-attr">
                    <a href="<?php echo site_url('new_arrival');?>" class="btn btn-primary btn-xs"><?php echo $this->lang->line('back');?></a>
					</div>
				</form>
			</div>
		</div>	
	</div>
</div>