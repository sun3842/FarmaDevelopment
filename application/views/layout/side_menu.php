			<!-- Sidebar -->
			<div id="sidebar-wrapper">
				<ul class="sidebar-nav">
					<li class="sidebar-brand">
						<div>
							<a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/img/logo.png" alt="" /></a>
						</div>
					</li>
					<li>
						<a href="<?php echo base_url();?>"><i class="fa fa-tachometer fa-fix-width fa-spacing"></i><?php echo $this->lang->line('menu_dashboard');?></a>
					</li>
                    <!--
					<li>
						<div class="panel panel-default">
							<div class="panel-heading">
								<a href="#collapse_settigs" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle"><i class="fa fa-cog fa-spacing fa-fix-width"></i>Impostazioni<span class="arrow-menu"><i class="fa fa-angle-down"></i></span></a>
							</div>
							<div class="panel-collapse collapse" id="collapse_settigs">
								<div class="panel-body">
									
								</div>
							</div>
						</div>
					</li>
                    
                    -->
					<li class="sidebar-separetor"></li>
                    <?php if($this->session->userdata('user_type')==USER_TYPE_SUPER_ADMIN)
					{?>
                   <li>
						<a href="<?php echo base_url() ?>about_us_page"><i class="glyphicon glyphicon-th-list fa-spacing fa-fix-width"></i><?php echo $this->lang->line('menu_about_us');?></a>
					</li>
                    <li>
						<a href="<?php echo base_url() ?>pharmacy"><i class="glyphicon glyphicon-th-list fa-spacing fa-fix-width"></i><?php echo $this->lang->line('menu_pharmacy');?></a>
					</li>
                     <li>
						<a href="<?php echo base_url() ?>pharmacy_user_list_page"><i class="glyphicon glyphicon-user fa-spacing fa-fix-width"></i><?php echo $this->lang->line('menu_users');?></a>
					</li>
                   
                   <li>
						<div class="panel panel-default">
							<div class="panel-heading">
								<a href="#collapse_news" data-toggle="collapse" class="accordion-toggle"><i class="fa fa-send fa-spacing fa-fix-width"></i><?php echo $this->lang->line('menu_news');?><span class="arrow-menu"><i class="fa fa-angle-down"></i></span></a>
							</div>
							<div class="panel-collapse collapse" id="collapse_news">
								<div class="panel-body">
									<ul>
										<li>
											<a href="<?php echo base_url() ?>all_news"><?php echo $this->lang->line('menu_news');?></a>
										</li>
										<li>
											<a href="<?php echo base_url() ?>add_new_news"><?php echo $this->lang->line('menu_new_news');?></a>
										</li>
                                       
									</ul>
								</div>
							</div>
						</div>
					</li>
                    <?php } ?>

                    <?php   if( $this->session->userdata('user_type')==USER_TYPE_PHARMACY)
                    {?>

                    <li>
                        <a href="<?php echo base_url('about_pharmacy')."/".$this->session->userdata('pharmacy_id') ?>"><i class="glyphicon glyphicon-th-list fa-spacing fa-fix-width"></i><?php echo $this->lang->line('menu_about_pharmacy');?></a>
                    </li>
                    <?php } ?>
                    <li>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a href="#collapse_product" data-toggle="collapse" class="accordion-toggle"><i class="fa fa-tags fa-spacing fa-fix-width"></i><?php echo $this->lang->line('product')?><span class="arrow-menu"><i class="fa fa-angle-down"></i></span></a>
                            </div>
                            <div class="panel-collapse collapse" id="collapse_product">
                                <div class="panel-body">
                                    <ul>

                                        <li><a href="<?php echo base_url() ?>add_new_product"><?php echo $this->lang->line('add_product')?></a></li>
                                        <li><a href="<?php echo base_url() ?>products"> <?php echo $this->lang->line('products')?></a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>





					<li>
						<div class="panel panel-default">
							<div class="panel-heading">
								<a href="#collapse_gallery" data-toggle="collapse" class="accordion-toggle"><i class="fa fa-picture-o fa-spacing fa-fix-width"></i><?php echo $this->lang->line('menu_gallery');?><span class="arrow-menu"><i class="fa fa-angle-down"></i></span></a>
							</div>
							<div class="panel-collapse collapse" id="collapse_gallery">
								<div class="panel-body">
									<ul>
										
										<li><a href="<?php echo base_url() ?>add_new_gallery"><?php echo $this->lang->line('menu_upload_photos');?></a></li>
										<li><a href="<?php echo base_url() ?>gallery"> <?php echo $this->lang->line('menu_photos');?></a></li>
										
									</ul>
								</div>
							</div>
						</div>
					</li>
                    
					<li>
						<div class="panel panel-default">
							<div class="panel-heading">
								<a href="#collapse_events" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle"><i class="fa fa-calendar fa-spacing fa-fix-width"></i><?php echo $this->lang->line('menu_events');?><span class="arrow-menu"><i class="fa fa-angle-down"></i></span></a>
							</div>
							<div class="panel-collapse collapse" id="collapse_events">
								<div class="panel-body">
									<ul>
                                        <li>
											<a href="<?php echo site_url('events');?>"><?php echo $this->lang->line('menu_events');?></a>
										</li>
										<li>
											<a href="<?php echo base_url() ?>add_new_events"><?php echo $this->lang->line('menu_add_new_events');?></a>
										</li>
										
									</ul>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="panel panel-default">
							<div class="panel-heading">
								<a href="#collapse_messages" data-toggle="collapse" class="accordion-toggle"><i class="fa fa-send fa-spacing fa-fix-width"></i><?php echo $this->lang->line('menu_messages');?><span class="arrow-menu"><i class="fa fa-angle-down"></i></span></a>
							</div>
							<div class="panel-collapse collapse" id="collapse_messages">
								<div class="panel-body">
									<ul>
										<li>
											<a href="<?php echo base_url() ?>message"><?php echo $this->lang->line('menu_messages');?></a>
										</li>
										<li>
											<a href="<?php echo base_url() ?>add_new_message"><?php echo $this->lang->line('menu_new_message');?></a>
										</li>
                                       
									</ul>
								</div>
							</div>
						</div>
					</li>

                    <li>
                        <?php
                        $this->load->model('orders_model');
                        $order=new orders_model();
                        $orders=$order->get_all_pending_orders();
                        $pending_orders=sizeof($orders);
                        $seen_orders=0;
                        if($this->session->userdata('pharmacy_id')!=NULL) {
                            foreach ($orders AS $order){
                                if($order['user_orders_is_seen_pharmacy_admin']==0){
                                    $seen_orders=$seen_orders+1;
                                }
                            }
                        }else{
                            foreach ($orders AS $order){
                                if($order['user_orders_is_seen_super_admin']==0){
                                    $seen_orders=$seen_orders+1;
                                }
                            }
                        }
                        ?>
                        <a href="<?php echo base_url() ?>view_all_orders"><i class="fa fa-cart-plus fa-spacing fa-fix-width"></i><?php echo $this->lang->line('orders')?> (<?php echo $seen_orders.'/'.$pending_orders?>)</a>
                    </li>
					
					<li>
						<div class="panel panel-default">
							<div class="panel-heading">
								<a href="#collapse_offerts" data-toggle="collapse" class="accordion-toggle"><i class="fa fa-bullhorn fa-spacing fa-fix-width"></i><?php echo $this->lang->line('menu_offer');?><span class="arrow-menu"><i class="fa fa-angle-down"></i></span></a>
							</div>
							<div class="panel-collapse collapse" id="collapse_offerts">
								<div class="panel-body">
									<ul>
										<li>
											<a href="<?php echo base_url() ?>add_new_offer"> <?php echo $this->lang->line('menu_new_offer');?></a>
										</li>
										
										<li>
											<a href="<?php echo base_url() ?>offer"><?php echo $this->lang->line('menu_all_offer');?></a>
										</li>
									</ul>

								</div>
							</div>
						</div>
					</li>
                   
                    <?php if($this->session->userdata('user_type')==USER_TYPE_PHARMACY)
					{?>
                        <li>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a href="#collapse_pharmacists" data-toggle="collapse" class="accordion-toggle"><i class="fa fa-medkit fa-spacing fa-fix-width"></i><?php echo $this->lang->line('menu_pharmacists')?><span class="arrow-menu"><i class="fa fa-angle-down"></i></span></a>
                                </div>
                                <div class="panel-collapse collapse" id="collapse_pharmacists">
                                    <div class="panel-body">
                                        <ul>
                                            <li>
                                                <a href="<?php echo base_url('all_pharmacists') ?>"><?php echo $this->lang->line('menu_all_pharmacists')?></a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('add_new_pharmacist') ?>"><?php echo $this->lang->line('menu_add_new_pharmacist')?></a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    
                    <?php
					}
					?>
					
                    <li>
						<a href="<?php echo base_url() ?>app_user_list"><i class="glyphicon glyphicon-user fa-spacing fa-fix-width"></i><?php echo $this->lang->line('menu_app_users');?></a>
					</li>
					
					
                    
                   
					<li class="sidebar-separetor"></li>
					<li>
						<a href="#" onclick="alert('UNDER CONSTRUCTION');"><i class="fa fa-user fa-spacing fa-fix-width"></i><?php echo $this->lang->line('menu_account');?></a>
					</li>
					<li>
						<a href="<?php echo site_url('logout');?>"><i class="fa fa-sign-out fa-spacing fa-fix-width"></i><?php echo $this->lang->line('menu_logut');?></a>
					</li>
				</ul>
			</div>
			<!-- /#sidemenu-wrapper -->