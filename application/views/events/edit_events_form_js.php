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