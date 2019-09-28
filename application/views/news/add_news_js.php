<script src="<?php echo base_url() ?>assets/jquery-migrate/jquery-migrate-1.2.1.js"></script>

<script type="text/javascript" src="<?php echo base_url() ?>assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>


<script>



 $(document).ready(function () {

 $('#form_news').validate({ // initialize the plugin
        rules: {
           
			
			news_title: {
                required: true,
				
            },
			
			news_description: {
                required: true,
				minlength:10
				
            },
			 
        },
		messages: {
			
  }
    });
 });

</script>