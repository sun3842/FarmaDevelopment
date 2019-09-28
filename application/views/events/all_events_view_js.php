<script>

function delete_model(events_id)
{ 
	$('#message_delete').modal('show');
	$('#delete_link').attr('href', '<?php echo base_url();?>delete_events/'+events_id);
}


</script>