<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo $this->lang->line('feedbacks');?>
			</div>
			<div class="panel-body">
				<ul class="media-list">
				  <li class="media">
					<div class="media-left">
					  <a href="#">
						<img style="max-width:40px;max-height:40px;" class="media-object" src="<?php echo base_url();?>assets/img/profile_0.jpg" alt="">
					  </a>
					</div>
					<div class="media-body feedback-section">
					  <h5 class="media-heading"><?php  echo $feedback[0]['ref_app_user_details_app_user_id']==NULL?$this->lang->line('not_registered'):$feedback[0]['app_user_first_name']." ".$feedback[0]['app_user_last_name'];?></h5>
                      <p><?php echo $feedback[0]['feedback_message'];?> </p>
                      <?php
					  foreach($feedback as $feed)
					  {
						  if($feed['feedback_reply_id']!=NULL)
						  {
						  ?>
                          <p style="margin-left:25px;"><?php echo $feed['feedback_replied_message']; ?></p>
                          <p style="margin-left:35px; "><b><?php echo $feed['feedback_replied_from_app_user']==1?$this->lang->line('from_user'):$this->lang->line('from_admin'); ?></b></p>
                          <?php
						  }
					  }
					  ?>
					  
                      <p> <br/><a href="#" class="reply"><?php echo $this->lang->line('reply');?></a></p>
						<ul class="media-list feedback-reply">
							<li class="media">
								<div class="media-left">
								<a href="#">
								<img style="max-width:32px;max-height:32px;" class="media-object" src="<?php echo base_url();?>assets/img/profile_0.jpg" alt="">
								</a>
								</div>
								<div class="media-body">
									<div style="position:relative;">
                                    <form name="reply_form" id="reply_form_id" action="<?php echo site_url('feedback_reply/'.$feedback[0]['feedback_id']);?>" method="post">
										<input type="text" class="form-control reply-input" id="" name="reply_msg" placeholder="<?php echo $this->lang->line('write_a_reply');?>">
                                        <input type="hidden" name="hidden_feedback_id" value="<?php echo $feedback[0]['feedback_id'];?>" />
										<span id="reply-send-btn">
                                        <button type="submit">
											<i class="glyphicon glyphicon-send"></i>
                                            </button>
										</span>
                                        </form>
									</div>
								</div>
							</li>
						</ul>
					</div>
				  </li>
				</ul>
			</div>
		</div>
	</div>
</div>