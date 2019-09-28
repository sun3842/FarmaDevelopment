<script src="<?php echo base_url() ?>assets/jquery-migrate/jquery-migrate-1.2.1.js"></script>

<script type="text/javascript" src="<?php echo base_url() ?>assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>


<script>



    $(document).ready(function () {

        $('#form_pharmacist').validate({ // initialize the plugin
            rules: {


                first_name: {
                    required: true,

                },

                last_name: {
                    required: true,
                },

            },
            messages: {

            }
        });
    });

</script>