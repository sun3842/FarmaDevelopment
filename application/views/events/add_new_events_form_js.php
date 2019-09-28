<script src="<?php echo base_url() ?>assets/jquery-migrate/jquery-migrate-1.2.1.js"></script>

<script type="text/javascript" src="<?php echo base_url() ?>assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>


<script>
$( "#events_start_date" ).datepicker({ dateFormat: "yy-mm-dd" });
$( "#events_end_date" ).datepicker({ dateFormat: "yy-mm-dd" });

$('#events_start_time').timepicker({
    'minTime': '12:00am',
    'maxTime': '11:59pm',
	'timeFormat': 'H:i:s',
	 'step':'10',
   // 'showDuration': true
	});	
	
	$('#events_end_time').timepicker({
		'minTime': '12:00am',
		'maxTime': '11:59pm',
		'timeFormat': 'H:i:s',
		'step':'10',
		//'showDuration': true
	});

</script>


<script>



 $(document).ready(function () {

 $('#Event_form').validate({ // initialize the plugin
        rules: {
           
			
			events_name: {
                required: true,
				
            },
			
			events_description: {
                required: true,
				minlength:10
				
            },
			events_start_date: {
                required: true,
				
            },
			
			events_start_time: {
                required: true,
				
            },
			
			events_end_date: {
                required: true,
				
            },
			events_end_time: {
                required: true,
				
            },
			
			 
        },
		messages: {
			
  }
    });
 });

</script>