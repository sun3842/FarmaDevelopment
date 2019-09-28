


		<br/><br/>
					<?php if (isset($message)) : ?>
								<h1 class="text-center text-success"><?php  echo $message; ?></h1>	<br/>
					<?php endif; ?>
					<form id="fileupload222" action="<?php echo base_url() ?>add_new_gallery" method="POST" enctype="multipart/form-data"   >
								<div class="form-group">
								<label for=""><?php echo  $this->lang->line('image_caption'); ?></label>
								<input type="text" name="image_name" class="form-control" id="name" placeholder="<?php echo  $this->lang->line('image_caption'); ?>">
								<span id="image_name" class='text-danger'><?php  echo form_error('image_name'); ?></span>
							</div>
							<div class="form-group">
								<label for=""><?php echo  $this->lang->line('image_desc'); ?></label>
								<textarea name="image_description" class="form-control"	id="desc" rows="3" placeholder="<?php echo  $this->lang->line('image_desc'); ?>"></textarea>
								<span id="image_description" class='text-danger'><?php  echo form_error('image_description'); ?></span>
							</div>

						<div id="image_id">	
						<input type="hidden" value="" name="image_id" id="img_id">
						<span id="image_id_error" class="text-danger"><?php  echo form_error('image_id'); ?></span>
						</div>


						

							
   
									 <div id="fileuploader">	</div>
									 <div class="form-group">
										<div class="row fileupload-buttonbar">
											<div class="col-lg-7">
												<button id="photo_submit" type="submit" class="btn btn-green start">
												<i class="glyphicon glyphicon-upload"></i>
												<span><?php echo  $this->lang->line('upload_photo_title'); ?></span>
												</button>										
											</div>
										</div>
									</div>

									  <script>
									$(document).ready(function()
									{

	
										
										$("#fileuploader").uploadFile({
											url:"<?php echo base_url() ?>gallery/do_upload",
											multiple:false,
											dragDrop:false,
											maxFileCount:1,
											fileName: "myfile",
											formData: {"album_id":"2","type":"gallery"},	
											returnType: "json",
											showDelete: true,
											showDone: false,
											uploadStr:"<?php echo  $this->lang->line('browse_button'); ?>",
											statusBarWidth:600,

										onSuccess:function(files,data,xhr,pd)
										{

											$("#image_id").html(data.arr_data);
											
										},
									 /* 	afterUploadAll:function(obj)
										{
											$("#image_id").html($("#image_id").html()+"<br/>Photo Uploaded Successfully");
											

										}, */ 
											//dragdropWidth:600,
											deleteCallback: function (data, pd) {
												
												
												var img_id=$("input[name=image_id]").val();
												var file_name=$("input[name=file_name]").val();
												
													$.post("<?php echo base_url() ?>gallery/do_delete", {op: "delete",name: file_name,id: img_id},
														function (resp,textStatus, jqXHR) {
															//Show Message	
															//alert("File Deleted");
														});
												
												pd.statusbar.hide(); //You choice.

											},
											downloadCallback:function(filename,pd)
												{
													location.href="<?php echo base_url() ?>gallery/do_download?filename="+filename;
												}
											}); 
										
										
									});
									</script>
											
										

						</form>