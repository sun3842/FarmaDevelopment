
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
    $('#newProductTable').dataTable();
    $('#freeTextProduct').dataTable();
});
</script>

<script>
    function delete_model(product_id)
    {
        $('#message_delete').modal('show');
        $('#delete_link').attr('href', '<?php echo base_url();?>delete_new_product/'+product_id);
    }

    function delete_model2(product_id)
    {
        $('#message_delete').modal('show');
        $('#delete_link').attr('href', '<?php echo base_url();?>delete_free_text_product/'+product_id);
    }


</script>