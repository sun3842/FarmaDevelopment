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
		<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />

		<link rel="stylesheet" href="assets/fontawesome/css/font-awesome.min.css">
		<link href="assets/css/font.css" rel="stylesheet">
		<link href="assets/css/style.css" rel="stylesheet">
		<link href="assets/css/login.css" rel="stylesheet">
		<link href="assets/css/simplesidebar.css" rel="stylesheet">
		<link href="assets/css/mybootstrap.css" rel="stylesheet">
		<link href="assets/css/myfontawsome.css" rel="stylesheet">
		<link href="assets/css/mysimplesidebar.css" rel="stylesheet">

	</head>

<body class="login">

	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4" style="margin-top:50px;">
				    <div class="page-header-all">
							<ul class="header-notifications">
								<li>
<!--									<a href="--><?php //echo site_url('set_login_language/en');?><!--">EN</a>-->
<!--                                    <a href="--><?php //echo site_url('set_login_language/it');?><!--">IT</a>-->
                                    <a title="English" href="<?php echo site_url('set_login_language/en');?>"><img src="<?php echo base_url('assets/img/en.png')?>" ></a>
                                    <a title="Italian" href="<?php echo site_url('set_login_language/it');?>"><img src="<?php echo base_url('assets/img/it.png')?>"></a>
								</li>
                                </ul>
                                </div>


				
                <form action="<?php echo site_url('login_check');?>" method="post">
                
				<div class="login-box">
                <div class="login-logo">
                    <img src="<?php echo base_url('assets/img/logo.png') ?>" alt="LOGO"  class="" />
				</div>
					<div class="panel panel-default">
						<div class="panel-body no-border">
							<div class="form-group custom">
								<label class="control-label"><?php echo $this->lang->line('username');?></label>
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
									<input type="text"  name="username" class="form-control" placeholder="<?php echo $this->lang->line('username');?>" aria-describedby="basic-addon1">
								</div>
							</div>
							<div class="form-group custom">
								<label class="control-label"><?php echo $this->lang->line('password');?></label>
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock"></i></span>
									<input type="password" name="password" class="form-control" placeholder="<?php echo $this->lang->line('password');?>" aria-describedby="basic-addon1">
								</div>
							</div>
							<div class="login-buttons">
								<label for="cbxRemember">
									<span class="remember-checkbox-text" style="color:#F00 !important;"><?php echo $this->lang->line('wrong_username_password');?></span> </label>
								<button type="submit" class="btn btn-primary btn-login pull-right"> <?php echo $this->lang->line('login');?> </button>
							</div>

						</div>
					</div>
				</div>
                
                </form>

				<div class="login-forgot">
					<a data-toggle="modal" href="#myModal"><?php echo $this->lang->line('forgot_my_password');?></a>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
    
    
     <!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                  <form action="" method="post">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title"><?php  echo $this->lang->line('forgot_my_password');?></h4>
                      </div>
                      <div class="modal-body">
                          <input type="text" name="email" placeholder="<?php echo $this->lang->line('email');?>" autocomplete="off" class="form-control placeholder-no-fix">

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button"><?php  echo $this->lang->line('cancel');?></button>
                          <button  type="submit" class="btn btn-success" ><?php  echo $this->lang->line('submit');?></button> 
                      </div>
                   </form>
                  </div>
              </div>
          </div>
          <!-- modal -->

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="assets/bootstrap/js/bootstrap.min.js"></script>

	</body>
</html>