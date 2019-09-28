					</div>
				</div>
			</div>
			
			<div id="fixed-footer" >

				<div class="" align="center">Powered by: <a href="#">ReadyApp S.R.L</a> , Developed by: <a target="_blank" href="http://www.whatsupitec.com">Whatsupitec Limited</a></div>
				<div class="clearfix"></div>
			</div>
			

			
			<!-- /#page-content-wrapper -->
		</div>

		
		
					<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	
		<?php if( $this->router->fetch_method() =="add_images" || $this->router->fetch_method() =="update_album" || $this->router->fetch_method() =="create_album" || $this->router->fetch_method() =="create_gallery"): ?>
			<!--for time picker-->
			<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.timepicker.js"></script>
			<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.simple-dtpicker.js"></script>
		<?php else: ?>
			<script src="<?php echo base_url() ?>assets/js/jquery-1.10.2.js"></script>
			<script src="<?php echo base_url() ?>assets/js/jquery-ui.js"></script>
			<!--for time picker-->
			<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.timepicker.js"></script>
			<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.simple-dtpicker.js"></script>
		<?php endif; ?>
	
		
	

		<script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>

		<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
		
		
		<script src="<?php echo base_url();?>assets/jquery-validation-1.15.0/dist/jquery.validate.min.js"></script>
    <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
    <script src="<?php echo base_url();?>assets/jquery-validation-1.15.0/dist/localization/messages_it.js"></script>
    <script src="<?php echo base_url();?>assets/jquery-validation-1.15.0/dist/localization/messages_it.min.js"></script>


		<!-- Menu Toggle Script -->
		<script>
			$("#menu-toggle").click(function(e) {
				e.preventDefault();
				$("#wrapper").toggleClass("toggled-by-menu");
			});
			
			$('.reply').click(function(){
  $('.feedback-reply').show();
 });
	$(function() {
	
	
	
	$( "#date" ).datepicker({ dateFormat: "yy-mm-dd" });
	
	
	

	
	
	$('#time').timepicker({
		'minTime': '12:00am',
		'maxTime': '11:59pm',
		'showDuration': true
	});
	
	
	
	
		
		
		
	
	
	
	});	
	
	
	
		</script>
       <!--
        <script>

$(window).scroll(function () {
   if ($(window).scrollTop() >= ($(document).height() - $(window).height() - 10)) {
     // $(".load_more").trigger('click'); 
	 alert("QWWQWQ");
   }
});
</script>
-->
	
	</body>
</html>