<script src="<?php echo base_url() ?>assets/jquery-migrate/jquery-migrate-1.2.1.js"></script>

<script type="text/javascript" src="<?php echo base_url() ?>assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script>
$("body").on('focus', '.offer_ending_date', function() {
$(this).datepicker({ dateFormat: "yy-mm-dd" });
});
$("body").on('focus', '.offer_starting_date', function() {
$(this).datepicker({ dateFormat: "yy-mm-dd" });
});



$( "#editOffer" ).validate({
});

$( "#pdfoffer" ).validate({
});




</script>
<style>
    .error
    {
        color: red;
    }
</style>