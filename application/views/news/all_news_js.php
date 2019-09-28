

<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>

<script>

function delete_model(news_id)
{ 
	$('#message_delete').modal('show');
	$('#delete_link').attr('href', '<?php echo base_url();?>delete_news/'+news_id);
}


</script>