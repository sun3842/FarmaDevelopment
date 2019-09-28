<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head;
		any other head content must come *after* these tags -->
		<title><?php echo $this->lang->line('admin_panel');?></title>

		<!-- Bootstrap -->
		<link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<link rel="icon" type="image/x-icon" href="<?php echo base_url();?>assets/img/favicon.ico" />

		<link rel="stylesheet" href="<?php echo base_url();?>assets/fontawesome/css/font-awesome.min.css">
		<link href="<?php echo base_url();?>assets/css/font.css" rel="stylesheet">
		<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
		<link href="<?php echo base_url();?>assets/css/login.css" rel="stylesheet">
		<link href="<?php echo base_url();?>assets/css/simplesidebar.css" rel="stylesheet">
		<link href="<?php echo base_url();?>assets/css/mybootstrap.css" rel="stylesheet">
		<link href="<?php echo base_url();?>assets/css/myfontawsome.css" rel="stylesheet">
		<link href="<?php echo base_url();?>assets/css/mysimplesidebar.css" rel="stylesheet">

	</head>

<body class="login">

	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4" style="margin-top:50px;">
				            <div class="page-header-right">
							<ul class="header-notifications">
								<li>
									<a href="<?php echo site_url('set_login_language/en');?>">EN</a>
                                    <a href="<?php echo site_url('set_login_language/it');?>">IT</a>
								</li>
                                </ul>
                                </div>

				<div class="login-logo">
					<img src="<?php echo base_url();?>assets/img/logo_original.png" alt="" />
				</div>
                <form action="<?php echo site_url('login_check');?>" method="post">
                
				<div class="login-box">
					<div class="panel panel-default">
						<div class="panel-body no-border">
							<div class="form-group custom">
								<label class="control-label"><?php echo $this->lang->line('new_password');?></label>
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock"></i></span>
									<input type="text"  name="new_password" class="form-control" placeholder="<?php echo $this->lang->line('new_password');?>" aria-describedby="basic-addon1" required oninvalid="this.setCustomValidity('Required')">
								</div>
							</div>
							<div class="form-group custom">
								<label class="control-label"><?php echo $this->lang->line('re_password');?></label>
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock"></i></span>
									<input type="password" name="re_password" class="form-control" placeholder="<?php echo $this->lang->line('re_password');?>" aria-describedby="basic-addon1" required  oninvalid="this.setCustomValidity('Required')">
								</div>
							</div>
							<div class="login-buttons">
                            <!--
								<label for="cbxRemember">
									<input type="checkbox" value="forever" id="cbxRemember" name="cbxRemember">
									<span class="remember-checkbox-text">Ricordami</span> 
                                    </label>
                              -->
								<input type="submit" name="save_new_pasword" class="btn btn-primary btn-login pull-right" value="<?php echo $this->lang->line('confirm');?>">  
							</div>

						</div>
					</div>
				</div>
                
                </form>

				
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
    
     <!-- Modal -->
          
          
          <!-- modal -->

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>

	</body>
</html>