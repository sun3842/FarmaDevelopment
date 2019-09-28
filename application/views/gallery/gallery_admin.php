<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>


<style>

.thumbnail {
    position:relative;
    overflow:hidden;
}

.thumbnail .caption {
    padding: 2px;
}
 
.caption a
{
color:#fff;	
text-decoration:none;
}
	
	
	.caption {
    position:absolute;
    bottom:5px;
    right:5px;
	left:5px;	
    background:rgba(66, 139, 202, 0.75);
	width:calc(100%-5px);
    display: none;
    text-align:center;
    color:#fff !important;
    z-index:2;
}
.thumbnail i
{
	color: rgba(76,76,76,1);
color: -moz-linear-gradient(left, rgba(76,76,76,1) 0%, rgba(89,89,89,1) 12%, rgba(43,43,43,1) 23%, rgba(71,71,71,1) 39%, rgba(44,44,44,1) 42%, rgba(0,0,0,1) 51%, rgba(17,17,17,1) 60%, rgba(102,102,102,1) 72%, rgba(28,28,28,1) 91%, rgba(19,19,19,1) 100%);
color: -webkit-gradient(left top, right top, color-stop(0%, rgba(76,76,76,1)), color-stop(12%, rgba(89,89,89,1)), color-stop(23%, rgba(43,43,43,1)), color-stop(39%, rgba(71,71,71,1)), color-stop(42%, rgba(44,44,44,1)), color-stop(51%, rgba(0,0,0,1)), color-stop(60%, rgba(17,17,17,1)), color-stop(72%, rgba(102,102,102,1)), color-stop(91%, rgba(28,28,28,1)), color-stop(100%, rgba(19,19,19,1)));
color: -webkit-linear-gradient(left, rgba(76,76,76,1) 0%, rgba(89,89,89,1) 12%, rgba(43,43,43,1) 23%, rgba(71,71,71,1) 39%, rgba(44,44,44,1) 42%, rgba(0,0,0,1) 51%, rgba(17,17,17,1) 60%, rgba(102,102,102,1) 72%, rgba(28,28,28,1) 91%, rgba(19,19,19,1) 100%);
color: -o-linear-gradient(left, rgba(76,76,76,1) 0%, rgba(89,89,89,1) 12%, rgba(43,43,43,1) 23%, rgba(71,71,71,1) 39%, rgba(44,44,44,1) 42%, rgba(0,0,0,1) 51%, rgba(17,17,17,1) 60%, rgba(102,102,102,1) 72%, rgba(28,28,28,1) 91%, rgba(19,19,19,1) 100%);
color: -ms-linear-gradient(left, rgba(76,76,76,1) 0%, rgba(89,89,89,1) 12%, rgba(43,43,43,1) 23%, rgba(71,71,71,1) 39%, rgba(44,44,44,1) 42%, rgba(0,0,0,1) 51%, rgba(17,17,17,1) 60%, rgba(102,102,102,1) 72%, rgba(28,28,28,1) 91%, rgba(19,19,19,1) 100%);
color: linear-gradient(to right, rgba(76,76,76,1) 0%, rgba(89,89,89,1) 12%, rgba(43,43,43,1) 23%, rgba(71,71,71,1) 39%, rgba(44,44,44,1) 42%, rgba(0,0,0,1) 51%, rgba(17,17,17,1) 60%, rgba(102,102,102,1) 72%, rgba(28,28,28,1) 91%, rgba(19,19,19,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4c4c4c', endColorstr='#131313', GradientType=1 );
}


</style>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				 <?php echo $title ?> 
              <a href="<?php echo site_url('add_new_gallery');?>"><button class="btn btn-primary btn-spacing-left btn-circular-small pull-right btn-margin-negative" aria-label="Left Align" type="button"> + </button></a>

			</div>
			<div class="panel-body">
			
			<div id="our_gallery">
					
					<ul id="myTab" class="nav nav-tabs">
					   <li class="active">
						  <a href="#photos" data-toggle="tab"> <?php echo  $this->lang->line('photo_title'); ?> </a>
					   </li>
					  <!-- <li><a href="#album_photos" data-toggle="tab"> <?php echo  $this->lang->line('album_photos'); ?></a></li>-->
					
					</ul>
                    
					<div id="myTabContent" class="tab-content">
					   <div class="tab-pane fade in active" id="photos">
						
							<?php echo $this->load->view($this->views_folder_name.'/gallery/all_photos'); ?>
						
					   </div>
					   <div class="tab-pane fade" id="album_photos">
						
							<?php echo $this->load->view($this->views_folder_name.'/gallery/all_album_photos'); ?>
						
					   </div>
					  
					</div>
					

			</div>
			</div>
		</div>	
	</div>
</div>	



<script>
	$(document).ready(function()
	{
		
		
	/*-----		for lazy load of image gallery	-----*/
	
		var i=0;
         $(window).scroll(function(){
            
				i+=8;
                $('div#loadmoreajaxloader').show();
                $.ajax({
					 type: "GET",
                       url: "<?php echo base_url() ?>gallery/all_photos_by_lazy_load/?offset="+i+"&album_id=0",
                    success: function(html)
					{
						//alert("loadmore.php");
                        if(html)
						{
                            $("table#load_data").append(html);
                            $('div#loadmoreajaxloader').hide();
                        }else{
                            $('div#loadmoreajaxloader').html('<center><?php echo  $this->lang->line('no_more_photo'); ?></center>');
                        }
                    }
                });
            
        });
	
	/*-----		end lazy load of image gallery	-----*/	
		

	/*-----		for  image mouse hover	-----*/
	
	 $("span.thumbnail").hover(function()
	 {
		 
        $(this).children("a").children("i").css({"display":"block","font-size":"20px","left":"5px","position":"absolute","top":"5px"});
		$(this).children('div.caption').slideDown(250); //.fadeIn(250)
     }, 
	 function()
	{
	$(this).children("a").children("i").css("display","none");
	$(this).children('div.caption').slideUp(250); //.fadeOut(205)
	});
	
	/*-----		end  image mouse hover	-----*/



	$("#photos").click(function()
	{
		$("#album_photos").empty();
		
	}); 
	
	$("#album_photos").click(function()
	{
		$("#photos").empty();
	}); 
	
	
	
	
	
	
	
	
	});
	</script>
			

