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
        <li role="presentation" class="<?php echo $add_pdf;?>"><a href="#panel-1" aria-controls="panel-1" role="tab" data-toggle="tab"><?php echo $this->lang->line('upload_pdf_file');?></a></li>
        <li role="presentation" class="<?php echo $add_product_from_network;?>"><a href="#panel-2" aria-controls="panel-2" role="tab" data-toggle="tab"><?php echo $this->lang->line('only_product_from_network');?></a></li>
        <li role="presentation" class="<?php echo $free_text;?>"><a href="#panel-3" aria-controls="panel-3" role="tab" data-toggle="tab"><?php echo $this->lang->line('free_text_product');?></a></li>
     </ul>
     <div class="tab-content">

		<div class="panel panel-default tab-pane <?php echo $add_pdf;?>"  role="tabpanel"  id="panel-1">
			<div class="panel-heading">
                <?php echo $this->lang->line('upload_pdf_file');?>
			</div>

            <?php
            $attributes = array('method' => 'POST', 'id' => 'form_offer');
            echo form_open_multipart("add_new_offer", $attributes);
            ?>


			<div class="panel-body">

                <div class="col-md-6 col-sm-12 col-xs-12">
					<?php if (isset($message)) : ?>
						<h1 class="text-center text-success"><?php echo $message;?></h1>	<br/>
					<?php endif; ?>




                <div class="form-group">
                    <label for=""><?php echo $this->lang->line('add_pdf');?></label>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=Add+Pdf" alt="" />
                            <input type="hidden" name="offer_type" value="1" >
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                        </div>
                        <div>
										   <span class="btn btn-white btn-file">
										   <span class="fileupload-new"><i class="fa fa-paper-clip"></i><?php echo $this->lang->line('browse');?></span>
										   <span class="fileupload-exists"><i class="fa fa-undo"></i> <?php echo $this->lang->line('change');?></span>
										   <input type="file" class="default" name="filepdf" required="true"/>
										   </span>
                            <span class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i><?php echo $this->lang->line('remove');?></span>
                        </div>
                    </div>
                </div>

                    <div class='form-group'>
                        <div class="row">
                            <div class="col-sm-12">
                                <label><?php echo $this->lang->line('offer_title');?></label><span class='text-danger'>*</span>
                                <input type='text' class='form-control'   name='offer_pdf_title' required="required" >
                                <span class='text-danger'><?php  echo form_error('	offer_pdf_title'); ?></span>
                            </div>


                    </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for=""><?php echo $this->lang->line('starting_date');?> </label>
                                <input type="text" class="form-control" id="offer_starting_date" name="offer_starting_date_pdf" >
                                <span class='text-danger'><?php  echo form_error('offer_starting_date_pdf'); ?></span>
                            </div>
                            <div class="col-sm-6">
                                <label for=""><?php echo $this->lang->line('ending_date');?> </label>
                                <input type="text" class="form-control" id="offer_ending_date" name="offer_ending_date_pdf" >
                                <span class='text-danger'><?php  echo form_error('offer_ending_date_pdf'); ?></span>
                            </div>
                        </div>
                    </div>




<hr>
                    <h2><?php echo $this->lang->line('select_from_products');?></h2>

                    <div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label for=""><?php echo $this->lang->line('select_product');?></label><span class='text-danger'>*</span>
								<input type="text" class="form-control" id="select_product" name="select_product">
                                <span class='text-danger'></span>
							</div>

						</div>
					</div>

<hr>


                    <button type="button" class="btn btn-green" data-toggle="modal" data-target="#myModal" style="margin: 4% 0"><strong><?php echo $this->lang->line('add_product_without_network');?></strong></button>




                    <!-- Modal -->

                    


				


				
			</div>

            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="panel-body1">


                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped" id="productTable">
                                <thead>
                                <tr>
                                    <th><?php echo $this->lang->line('id');?></th>
                                    <th><?php echo $this->lang->line('image');?></th>
                                    <th><?php echo $this->lang->line('description_h1');?></th>
                                    <th><?php echo $this->lang->line('net_price');?></th>
                                    <th><?php echo $this->lang->line('offer_price');?></th>
                                    <th><?php echo $this->lang->line('starting_date');?></th>
                                    <th><?php echo $this->lang->line('ending_date');?></th>
                                    <th><?php echo $this->lang->line('action');?></th>

                                </tr>
                                </thead>
                                <tbody>



                                </tbody>
                            </table>

                            <div class="error">
                            <?php echo validation_errors(); ?>
                            </div>

                        </div>

                </div>

                </div>
            </div>



            					<center class="pull-right">
            								<button class="btn-send" type="submit">
                                                <?php echo $this->lang->line('save');?><i class="fa fa-send fa-spacing-left"></i>
                                            </button>
            					</center>

            <?php echo form_close(); ?>

        </div>


<?php //print_r($this->session->all_userdata()); ?>


         <div id="myModal" class="modal fade" role="dialog">
             <div class="modal-dialog">

                 <!-- Modal content-->
                 <div class="modal-content">
                     <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                         <h4 class="modal-title"><?php echo $this->lang->line('add_product_without_network');?></h4>
                     </div>
                     <form id="form32" name="form32" method="post" action="">
                     <div class="modal-body" id="modalBody">
                         <div class='form-group'>
                             <label><?php echo $this->lang->line('product_title');?></label><span class='text-danger'>*</span>
                             <input type='text' class='form-control app_user_name_class' name="product_title" id="product_title_text_field_add_pdf">

                             <span class='text-danger'></span>
                         </div>

                         <div class='form-group'>
                             <label><?php echo $this->lang->line('product_description');?> </label><span class='text-danger'>*</span>
                             <textarea class='form-control'   name='product_description' id="product_description_add_pdf" ></textarea>
                             <span class='text-danger'></span>
                         </div>





                         <div class="form-group">
                             <label for=""><?php echo $this->lang->line('display_image');?></label>
                             <div class="fileupload fileupload-new" data-provides="fileupload">
                                 <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                     <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""  />
                                 </div>
                                 <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                                 </div>
                                 <div>
										   <span class="btn btn-white btn-file">
										   <span class="fileupload-new"><i class="fa fa-paper-clip"></i><?php echo $this->lang->line('browse');?></span>
										   <span class="fileupload-exists"><i class="fa fa-undo"></i> <?php echo $this->lang->line('change');?></span>
										   <input type="file" class="default" name="userfile" id="image_add_pdf" />
										   </span>
                                     <span class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i><?php echo $this->lang->line('remove');?></span>
                                 </div>
                             </div>
                         </div>



                         <div class="form-group">
                             <div class="row">
                                 <div class="col-sm-6">
                                     <label for=""><?php echo $this->lang->line('normal_price');?></label><span class='text-danger'>*</span>
                                     <input type="number" class="form-control" id="product_normal_price_add_pdf" name="product_normal_price">
                                     <span class='text-danger'><?php  echo form_error('product_normal_price_add_pdf'); ?></span>
                                 </div>
                                 <div class="col-sm-6">
                                     <label for=""><?php echo $this->lang->line('product_offer_price');?> </label><span class='text-danger'>*</span>
                                     <input type="number" class="form-control" id="product_offer_price_add_pdf" name="product_offer_price">
                                     <span class='text-danger'><?php  echo form_error('product_offer_price_add_pdf'); ?></span>
                                 </div>
                             </div>
                         </div>


                         <div class="form-group">
                             <div class="row">
                                 <div class="col-sm-6">
                                     <label for=""><?php echo $this->lang->line('starting_date');?> </label>
                                     <input type="text" class="form-control" id="offer_starting_date_personal" name="offer_starting_date">
                                     <span class='text-danger'><?php  echo form_error('offer_starting_date'); ?></span>
                                 </div>
                                 <div class="col-sm-6">
                                     <label for=""><?php echo $this->lang->line('ending_date');?> </label>
                                     <input type="text" class="form-control" id="offer_ending_date_personal" name="offer_ending_date">
                                     <span class='text-danger'><?php  echo form_error('offer_ending_date'); ?></span>
                                 </div>
                             </div>
                         </div>

                     </div>
                     </form>

                     <div class="errorMessage"></div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('close');?></button>
                         <button type="submit" class="btn btn-green" id="AddProductWithoutNetwork"><?php echo $this->lang->line('add');?> <i class="fa fa-send fa-spacing-left"></i></button>
                     </div>

                 </div>

             </div>
         </div>
        
        
        <div class="panel panel-default tab-pane <?php echo $add_product_from_network;?>" role="tabpanel" id="panel-2">


            <div class="panel-heading">
                <?php echo $this->lang->line('only_product_from_network');?>
			</div>
            <?php
            $attributes = array('method' => 'POST', 'id' => 'add_product_from_network');
            echo form_open_multipart("add_new_offer", $attributes);
            ?>
            <div class="panel-body">

                <div class="col-md-6 col-sm-12 col-xs-12">
                    <?php if (isset($message)) : ?>
                        <h1 class="text-center text-success"><?php echo $message;?></h1>	<br/>
                    <?php endif; ?>








                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for=""><?php echo $this->lang->line('select_product');?></label><span class='text-danger'>*</span>
                                <input type="text" class="form-control" id="select_product2" name="select_product2">
                                <input type="hidden" name="offer_type" value="3">
                                <span class='text-danger'></span>
                            </div>

                        </div>
                    </div>







                </div>

                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="panel-body1">


                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped" id="productTable2">
                                <thead>
                                <tr>
                                    <th><?php echo $this->lang->line('id');?></th>
                                    <th><?php echo $this->lang->line('image');?></th>
                                    <th><?php echo $this->lang->line('description_h1');?></th>
                                    <th><?php echo $this->lang->line('net_price');?></th>
                                    <th><?php echo $this->lang->line('offer_price');?></th>
                                    <th><?php echo $this->lang->line('starting_date');?></th>
                                    <th><?php echo $this->lang->line('ending_date');?></th>
                                    <th><?php echo $this->lang->line('action');?></th>

                                </tr>
                                </thead>
                                <tbody>



                                </tbody>
                            </table>

                        </div>

                    </div>








                </div>
            </div>

            <center class="pull-right">
                <button type="submit" class="btn-send">
                    <?php echo $this->lang->line('save');?><i class="fa fa-send fa-spacing-left"></i>
                </button>
            </center>

            <?php echo form_close(); ?>
		</div>


        <div class="panel panel-default tab-pane <?php echo $free_text;?>"  role="tabpanel"  id="panel-3">

			<div class="panel-heading">
                <?php echo $this->lang->line('free_text_product');?>

			</div>

			<div class="panel-body">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <form id="form" name="form" method="post" action="">

					<?php if (isset($message)) : ?>
						<h1 class="text-center text-success"><?php echo $message;?></h1>	<br/>
					<?php endif; ?>

                    <div class='form-group'>
						<label><?php echo $this->lang->line('product_title');?></label><span class='text-danger'>*</span>
						<input type='text' class='form-control app_user_name_class'   name="product_title" id="product_title_text_field"   >


                        <span class='text-danger'></span>
                      </div>

                <div class='form-group'>
                    <label><?php echo $this->lang->line('product_description');?> </label><span class='text-danger'>*</span>
                    <textarea class='form-control'   name='product_description' id="product_description" > </textarea>
                    <span class='text-danger'></span>
                </div>





                <div class="form-group">
                    <label for=""><?php echo $this->lang->line('display_image');?></label>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""  />
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                        </div>
                        <div>
										   <span class="btn btn-white btn-file">
										   <span class="fileupload-new"><i class="fa fa-paper-clip"></i><?php echo $this->lang->line('browse');?></span>
										   <span class="fileupload-exists"><i class="fa fa-undo"></i> <?php echo $this->lang->line('change');?></span>
										   <input type="file" class="default" name="userfile" id="imageFreeText" />
										   </span>
                            <span class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i><?php echo $this->lang->line('remove');?></span>
                        </div>
                    </div>
                </div>



                    <div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label for=""><?php echo $this->lang->line('normal_price');?></label><span class='text-danger'>*</span>
								<input type="text" class="form-control" id="normal_price" name="product_normal_price">
                                <span class='text-danger'><?php  echo form_error('product_normal_price'); ?></span>
							</div>
							<div class="col-sm-6">
								<label for=""><?php echo $this->lang->line('product_offer_price');?> </label><span class='text-danger'>*</span>
								<input type="text" class="form-control" id="product_offer_price" name="product_offer_price">
                                <span class='text-danger'><?php  echo form_error('product_offer_price'); ?></span>
							</div>
						</div>
					</div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for=""><?php echo $this->lang->line('starting_date');?> </label>
                                <input type="text" class="form-control offer_starting_date_autocomplete" id="offer_starting_date_freeText" name="offer_starting_date">
                                <span class='text-danger'><?php  echo form_error('offer_starting_date'); ?></span>
                            </div>
                            <div class="col-sm-6">
                                <label for=""><?php echo $this->lang->line('ending_date');?> </label>
                                <input type="text" class="form-control offer_ending_date_autocomplete" id="offer_ending_date_FreeText" name="offer_ending_date">
                                <span class='text-danger'><?php  echo form_error('offer_ending_date'); ?></span>
                            </div>
                        </div>
                    </div>





                    <center>
								<button type="button" class="btn btn-green" id="freeTextproductButton">
								<?php echo $this->lang->line('send');?><i class="fa fa-send fa-spacing-left"></i>
                                </button>
					</center>
                    </form>

                </div>
                <?php
                $attributes = array('method' => 'POST', 'id' => 'form_message');
                echo form_open_multipart("add_new_offer", $attributes);
                ?>

                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="panel-body1">
                        <input type="hidden" name="offer_type" value="2">

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped" id="freetextTable">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th> <?php echo $this->lang->line('image');?></th>
                                    <th><?php echo $this->lang->line('product_title');?></th>
                                    <th><?php echo $this->lang->line('product_description');?></th>
                                    <th><?php echo $this->lang->line('net_price');?></th>
                                    <th><?php echo $this->lang->line('product_offer_price');?></th>
                                    <th><?php echo $this->lang->line('starting_date');?></th>
                                    <th><?php echo $this->lang->line('ending_date');?></th>
                                    <th><?php echo $this->lang->line('action');?></th>

                                </tr>
                                </thead>
                                <tbody>



                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
                <center class="pull-right">
                    <button class="btn-send" type="submit">
                        <?php echo $this->lang->line('save');?><i class="fa fa-send fa-spacing-left"></i>
                    </button>
                </center>

                <?php echo form_close(); ?>






			</div>

		</div>
        
        
     </div>
   </div>
</div>
