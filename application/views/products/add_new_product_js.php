<script src="<?php echo base_url() ?>assets/jquery-migrate/jquery-migrate-1.2.1.js"></script>

<script type="text/javascript" src="<?php echo base_url() ?>assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>

<script>


    $(document).ready(function () {
        
        
        $('#tree_label').change(function () {
            $('#tree_id_label').val($(this).find(':selected').attr('role'));
        });

        $( "#add_product" ).validate({
            rules: {
                linkImmagineProdotto: {
                    required: false,
                    url: true
                },
                linkPaginaProdotto: {
                    required: false,
                    url: true
                },
                prezzo_web_netto:{
                    number: true
                },
                prezzo_web_lordo:{
                    number: true
                },
                sconto_web:{
                    number: true
                },
                iva:{
                    number: true
                },
                tree_id_label:{
                    required: true,
                    number: true
                }
            }
        });

        $( "#free_text_product" ).validate({
            rules: {
                product_title: {
                    required: true,
                },
                product_description: {
                    required: true,
                },
                product_normal_price:{
                    required: true,
                    number: true
                }
            }
        });
    });


</script>


