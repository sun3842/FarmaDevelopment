<script>



 $(document).ready(function () {

 $('#form_about_us').validate({ // initialize the plugin
        rules: {
           
			
			about_us_details: {
                required: true,
				                                               
				minlength:20
            },
			 
        },
		messages: {
			
  }
    });
 });

</script>