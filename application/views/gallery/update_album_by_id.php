

<br/><br/>
<h1 id="msg" class="text-center text-success"></h1>
	<form id="fileupload" action="#" method="POST" enctype="multipart/form-data"   >
						<div class="form-group">
								<label for=""><?php echo  $this->lang->line('album_name'); ?></label>
								<input type="text" class="form-control" name="image_album_name" value="<?php echo $edit_query_result->image_album_name; ?>" id="album_name" placeholder="<?php echo  $this->lang->line('album_name'); ?>">
								<span id="album_name_error" class="text-danger"><?php  echo form_error('image_album_name'); ?></span>
							</div>
							<input type="hidden" name="album_id" value="<?php echo $edit_query_result->image_album_id;  ?>">
							<div class="form-group">
								<label for=""><?php echo  $this->lang->line('album_desc'); ?></label>
								<textarea class="form-control" rows="3" name="image_album_description"  id="album_description" placeholder="<?php echo  $this->lang->line('album_desc'); ?>"><?php echo $edit_query_result->image_album_description;?>
								</textarea>
								<span	id="album_description_error" class="text-danger"><?php  echo form_error('image_album_description'); ?></span>
							</div>

						<div id="image_id2">	</div>



   
	 <div id="fileuploader2"></div>
	 
							<div class="form-group">
								<div class="row fileupload-buttonbar">
									<div class="col-lg-7">
										<button type="submit" class="btn btn-primary start">
										<i class="glyphicon glyphicon-upload"></i>
										<span><?php echo  $this->lang->line('edit_album'); ?></span>
										</button>										
									</div>
								</div>
							</div>

	  <script>
	$(document).ready(function()
	{

		
		/*	ajax form validation and submit		*/
		
			$("#fileupload").submit(function() {
				
				
				if(	$("#album_name").val()=="")
				{
					$("#album_name_error").html("<?php echo  $this->lang->line('album_name_error_msg'); ?>");
					return false;
				}
				if(	$("#album_description").val()=="")
				{
					$("#album_description_error").html("<?php echo  $this->lang->line('album_desc_error_msg'); ?>");
					return false;
				}
				

				var url = "<?php echo base_url() ?>gallery/edit_album_ajax"; // the script where you handle the form input.
				
				$.ajax({
					   type: "POST",
					   url: url,
					   data: $("#fileupload").serialize(), // serializes the form's elements.
					   success: function(data)
					   {
						 //  alert(data); // show response from the php script.
						 $("#msg").html("<?php echo  $this->lang->line('album_edited_success'); ?>");
						 $(".ajax-file-upload-container").css("display","none");
						 $(".ajax-file-upload-container").css("display","none");
						// $("#album_description").val("");
						// $("#album_name").val("");
						 
						   
						   
					   }
					 });

				return false; // avoid to execute the actual submit of the form.
			});
		
		/*		ajax form validation and submit		*/
		
		
		
		$("#fileuploader2").uploadFile({
			url:"<?php echo base_url() ?>gallery/do_upload",
			dragDrop: true,
			fileName: "myfile",
			formData: {"album_id":"2","type":"album"},				
			showDone: false,
			uploadStr:"<?php echo  $this->lang->line('browse_button'); ?>",						
			returnType: "json",
			showDelete: true,
			//showDownload:true,
			statusBarWidth:600,
			dragdropWidth:600,
			
			onSuccess:function(files,data,xhr,pd)
										{

											$("#image_id2").html($("#image_id2").html()+data.arr_data);
											
											
										},
			
			deleteCallback: function (data, pd) {
				
			
					
					$.post("<?php echo base_url() ?>gallery/do_delete", {op: "delete",name: data.f_name,id: data.f_id},
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
