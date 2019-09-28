<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head;
		any other head content must come *after* these tags -->
		<title id="main_title"><?php echo $this->lang->line('menu_title');?></title>

		<!-- Bootstrap -->
		
		<link href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<link rel="icon" type="image/x-icon" href="<?php echo base_url() ?>assets/img/favicon.ico" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/ionicons/css/ionicons.min.css">
		<link href="<?php echo base_url() ?>assets/css/font.css" rel="stylesheet">
		<link href="<?php echo base_url() ?>assets/css/simplesidebar.css" rel="stylesheet">
		<link href="<?php echo base_url() ?>assets/css/myionicons.css" rel="stylesheet">
		<link href="<?php echo base_url() ?>assets/css/mybootstrap.css" rel="stylesheet">
		<link href="<?php echo base_url() ?>assets/css/myfontawsome.css" rel="stylesheet">
		<link href="<?php echo base_url() ?>assets/css/mysimplesidebar.css" rel="stylesheet">
		<link href="<?php echo base_url() ?>assets/css/jquery.fileupload.css" rel="stylesheet">
		<link href="<?php echo base_url() ?>assets/css/jquery.fileupload-ui.css" rel="stylesheet">
		<link href="<?php echo base_url() ?>assets/css/jquery-ui.css" rel="stylesheet">
		
		<link href="<?php echo base_url() ?>assets/css/jquery.jscrollpane.min.css" rel="stylesheet">
		<link href="<?php echo base_url() ?>assets/css/fileinput.min.css" rel="stylesheet">
		<link href="<?php echo base_url() ?>assets/css/build.css" rel="stylesheet">
		<link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
		
		<!--for time picker-->
		<link href="<?php echo base_url() ?>assets/css/jquery.timepicker.css" rel="stylesheet">
		<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.8.1/jquery.timepicker.min.css" rel="stylesheet">-->
		<link type="text/css" href="<?php echo base_url() ?>assets/css/jquery.simple-dtpicker.css" rel="stylesheet" />
		
		
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-2.1.1.min.js"></script>
		
		<!--for notification-->

		<script src="<?php echo base_url() ?>assets/notify/bootstrap-notify.min.js"></script>
		<script src="<?php echo base_url() ?>assets/notify/bootstrap-notify.js"></script>
		<!--for notification-->
		<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>

		
	


	<style>
.notification-dropdown {
    background: #fff none repeat scroll 0 0;
    box-shadow: 0 2px 5px 0 rgba(176, 167, 176, 1);
    display: none;
    font-size: 12px;
    padding: 5px;
    position: absolute;
    right: -5px;
    top: 15px;
    width: 400px;
    z-index: 2147483647;
}
.notification-dropdown a {
    background: #f8faff none repeat scroll 0 0;
    color: #000;
    display: block;
    margin-bottom: 5px;
}

.topbar-img {
    max-height: 35px;
    max-width: 35px;
}
.notification-dropdown ul {
    list-style: outside none none;
    margin: 0;
    padding: 0;
    text-align: left;
}
.notification-dropdown ul li {
    display: inline-block;
    vertical-align: top;
}
.notification-dropdown ul li ol {
    list-style: outside none none;
    margin: 0 0 0 5px;
    padding: 0;
    text-align: left;
}
.notification-dropdown ul li ol li {
    display: block;
    vertical-align: top;
}
	</style>

	</head>
	<body>
	


		<div id="wrapper">
			<!-- Sidebar -->
			
			<?php echo $this->load->view('layout/side_menu'); ?>

			<!-- /#sidemenu-wrapper -->

			<!-- Page Content -->
			
			<div id="page-content-wrapper">

				<div class="container-fluid">
					<header class="page-header">
						<div class="page-header-left">
							<button id="menu-toggle"><i class="fa fa-bars"></i></button>
							<h1><i class="fa fa-tachometer fa-spacing"></i><?php echo $this->lang->line('menu_dashboard');?></h1>
                           
						</div>
						<div class="page-header-right">
							<ul class="header-notifications">
								<li>
                                <?php $url=uri_string()==""?"home":uri_string();?>
<!--									<a href="--><?php //echo site_url('set_language/en/'.$url);?><!--">EN</a>-->
<!--                                    <a href="--><?php //echo site_url('set_language/it/'.$url);?><!--">IT</a>-->
                                    <a title="English" href="<?php echo site_url('set_language/en/'.$url);?>"><img src="<?php echo base_url('assets/img/en.png')?>" ></a>
                                    <a title="Italian" href="<?php echo site_url('set_language/it/'.$url);?>"><img src="<?php echo base_url('assets/img/it.png')?>"></a>
								</li>
								
								<li >
									<a href="#" id="notificationLink"><i class="fa fa-comment"></i>
									<span id="unseen"  class="bullet"></span></a>	
									<div id="notificationContainer" class="notification-dropdown">
								
									</div>
									
								</li>
								
                                
                                
							</ul>
						</div>
					</header>
					
					<div id="page-content">
					
					
	<script>
var current_selected_user_id=0;
$(document).ready(function()
{
	var count=0;
	
	setInterval(function(){
	$("#unseen").load('<?php echo base_url() ?>Chat/get_unseen_chat_no_by_ajax')
	$("#notificationContainer").load('<?php echo base_url() ?>Chat/get_unseen_chat_user_info_by_ajax')
	
	  $.get( "<?php echo base_url() ?>Chat/get_unseen_chat_no_for_sound?count="+count, function( data ) 
		{
			/* var row=data.split('_#$_');
			var no=row[0];
			var user=row[1]; */
			for(var i=0;i<data;i++)
			{
				//count++;
				$('<audio id="chatAudio"> <source src="notify.ogg" type="audio/ogg"><source src="<?php echo base_url() ?>assets/served.mp3" type="audio/mpeg"></audio>').appendTo('body');
				$('#chatAudio')[0].play();
	

			}

			
		});
	
	}, 4000);
	
	
	$("#notificationLink").click(function()
{
$("#notificationContainer").fadeToggle(300);
return false;
});

//Document Click hiding the popup 
$(document).click(function()
{
$("#notificationContainer").hide();
});
	
	

});

			
				/*  notification--*/

			/* 		 $.notify({
						// options
						icon: 'glyphicon glyphicon-warning-sign',
						title: 'User Notification',
						message: ' just posted a msg to you',
						url: 'https://github.com/mouse0270/bootstrap-notify',
						target: '_blank'
					},{
						// settings
						element: 'body',
						position: null,
						type: "info",
						placement: {
							from: "bottom",
							align: "left"
						},
						offset: 20,
						spacing: 10,
						z_index: 1031,
						delay: 5000,
						timer: 1000,
						url_target: '_blank',
						mouse_over: null,
						animate: {
							enter: 'animated fadeInDown',
							exit: 'animated fadeOutUp'
						},

					});
					  */

					/*  notification--*/


</script>		

		