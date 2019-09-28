<script>
function delete_model(offer_id)
{ 
	$('#message_delete').modal('show');
	$('#delete_link').attr('href', '<?php echo base_url();?>delete_offer/'+offer_id);
}

function delete_model2(offer_id)
{
    $('#message_delete').modal('show');
    $('#delete_link').attr('href', '<?php echo base_url();?>delete_offer_pdf/'+offer_id);
}


</script>

<script>
    $(document).ready(function(){
        $('#myTable').dataTable();
    });

    $(document).ready(function(){
        $('#myTable2').dataTable();
    });

    $(document).ready(function(){
        $('#myTable3').dataTable();
    });
</script>