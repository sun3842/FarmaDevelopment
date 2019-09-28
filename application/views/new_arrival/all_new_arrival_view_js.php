<script>

function delete_model(new_arrival_id)
{ 
	$('#message_delete').modal('show');
	$('#delete_link').attr('href', '<?php echo base_url();?>delete_new_arrival/'+new_arrival_id);
}


</script>