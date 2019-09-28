
<script>

    function delete_model(pharmasist_id)
    {
        $('#message_delete').modal('show');
        $('#delete_link').attr('href', '<?php echo base_url();?>delete_pharmacist/'+pharmasist_id);
    }


</script>