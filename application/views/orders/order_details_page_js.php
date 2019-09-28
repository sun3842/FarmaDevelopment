<script>
    function deliver_order(order_id)
    {
        $('#order_deliver_modal').modal('show');
        $('#delete_link').attr('action', '<?php echo base_url();?>deliver_order_by_id/'+order_id);
    }

    function return_order(order_id)
    {
        $('#order_return_modal').modal('show');
        $('#return_link').attr('href', '<?php echo base_url();?>return_order_by_id/'+order_id);
    }
</script>
