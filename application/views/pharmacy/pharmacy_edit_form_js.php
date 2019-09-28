<script type="text/javascript" src="<?php echo base_url() ?>assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>


<script>
    $("#form_pharmacy").validate({
        rules: {
            pharmacy_facebook_url: {
                required: true,
                url: true
            }

        }
    });
</script>