<script src="<?php echo base_url() ?>assets/jquery-migrate/jquery-migrate-1.2.1.js"></script>

<script type="text/javascript" src="<?php echo base_url() ?>assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>

<script>
	$( "#new_arrival_ending_validation_date" ).datepicker({ dateFormat: "yy-mm-dd" });
	
	
	$( "#new_arrival_product_price_id" ).change(function() {
			var val=$( this ).val() ;
		    if(val==0)
			{
				$("#new_arrival_fixed_price_div").css( "display", "none" );
				$("#new_arrival_range_price_div").css( "display", "none" );
			}
			else if(val==1)
			{
				$("#new_arrival_fixed_price_div").css( "display", "block" );
				$("#new_arrival_range_price_div").css( "display", "none" );
			}
			else if(val==2)
			{
				$("#new_arrival_fixed_price_div").css( "display", "none" );
				$("#new_arrival_range_price_div").css( "display", "block" );
			}
			else
			{
				$("#new_arrival_fixed_price_div").css( "display", "none" );
				$("#new_arrival_range_price_div").css( "display", "none" );
			}
		});	
		

</script>

