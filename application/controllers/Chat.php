<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chat extends CI_Controller {
	
	


	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('chat_model');
		$this->load->model('common_model');
		$this->load->library('form_validation');
		$this->load->library('session');
		
		if($this->session->userdata('login')!=1)
		{
			redirect(base_url());
		}
		
		if($this->session->userdata('language'))
		{
			if($this->session->userdata('language')==LANG_EN)
			{
				$this->lang->load('menu_en','english');
				$this->lang->load('chat_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('chat_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('chat_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
			$this->lang->load('chat_it','italian');
		}
		
	}
	
	public function index()
	{	
	}
	
	public function create_chat()
	{
		$data['content'] = 'chat/add_chat_form';
		$data['title'] = ' Create Chat';
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('ref_chat_app_user_id', $this->ref_chat_app_user_id_label, 'trim|required|xss_clean');
		$this->form_validation->set_rules('chat_from_app_user', $this->chat_from_app_user_label, 'trim|xss_clean');
		$this->form_validation->set_rules('chat_from_admin', $this->chat_from_admin_label, 'trim|xss_clean');
		$this->form_validation->set_rules('ref_chat_from_admin_user_id', $this->ref_chat_from_admin_user_id_label, 'trim|xss_clean');
		$this->form_validation->set_rules('chat_message', $this->chat_message_label, 'trim|required|xss_clean');
		$this->form_validation->set_rules('chat_is_edited', $this->chat_is_edited_label, 'trim|xss_clean');
		$this->form_validation->set_rules('chat_message_sending_edited_date_time', $this->chat_message_sending_edited_date_time_label, 'trim|required|xss_clean');
		
		
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->vars($data);
			$this->load->view('layout/switchy_main');
		} 
		else 
		{
			
		$query_data=array(
			'ref_chat_app_user_id' =>$this->input->post('ref_chat_app_user_id'),
			'chat_from_app_user' =>$this->input->post('chat_from_app_user'),
			'chat_from_admin' =>$this->input->post('chat_from_admin'),
			'ref_chat_from_admin_user_id' =>$this->input->post('ref_chat_from_admin_user_id'),
			'chat_message' =>$this->input->post('chat_message'),
			'chat_is_edited' =>$this->input->post('chat_is_edited'),
			'chat_message_sending_edited_date_time' =>$this->input->post('chat_message_sending_edited_date_time'),
				);
			
			//Transfering data to Model
			$this->chat_model->chat_insert($query_data);
			$data['message'] = 'Data Inserted Successfully';
			
			$this->load->vars($data);
			$this->load->view('layout/switchy_main');
		}
		
		
	}
		

	public function admin_chat()
	{
		$data['content'] = 'chat/chat';
		$data['title'] = 'Chat';
		//$data['query_result']=$this->chat_model->get_chat_user_by_ajax();

		$this->load->vars($data);
		$this->load->view('layout/switchy_main');
	}
	
	
		/*
	FUNCTION NAME : notification_script()
	this is only the javascrtipt code for notification.
	*/
	public function notification_script()
	{
	?>
	<script>
	/*  notification--*/

	 		 		 $.notify({
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
					  

					/*  notification--*/
		</script>
	
	<?php
	}
	
	
		/*
	FUNCTION NAME : get_unseen_chat_no_for_sound()
	it will calculate for notification sound.
	*/
	public function get_unseen_chat_no_for_sound()
	{
	     $no=$this->common_model->get_unseen_chat_info();
		 if($this->session->userdata('notification_no')<$no)
		 {
		// $this->notification_script();	 
		 $this->session->set_userdata('notification_no', $no);
		 echo $this->session->userdata('notification_no');
		 }
		 //$count=$_GET["count"];
		 	
	}
	
	
	/*
	FUNCTION NAME : get_unseen_chat_no_by_ajax()
	it will return no of chat which is unseen.
	*/
	public function get_unseen_chat_no_by_ajax()
	{
	     $no=$this->common_model->get_unseen_chat_info();
		 echo $no;
	}
	
	public function get_unseen_chat_user_info_by_ajax()
	{
		
	 $user_info=$this->common_model->get_unseen_chat_user_info();
	 $str="";
	 foreach($user_info as $row):
	 $url=base_url()."chat#".$row->ref_chat_app_user_id;
	 $time_left=$this->remainingTimeCalculate($row->chat_message_sending_edited_date_time);
	 
	 $posted_new_message=$this->lang->line('posted_new_msg');
	 $str.=<<<EOF
		
			<a href="$url">
					<ul>
						<li><img class="topbar-img" src="assets/img/profile_0.jpg" alt="test"/></li>
						<li>
							<ol>
								<li>$row->full_name $posted_new_message</li>
								<li><small>$time_left  </small></li>
							</ol>
						</li>
					</ul>
			</a>
EOF;

	endforeach;
	echo $str;	
	}
	
		/*
	FUNCTION NAME : remainingTimeCalculate()
	it will return the ramaining time in hour minute second and by day.
	*/
	 function remainingTimeCalculate($from_time)
	{
		 $current_time = strtotime(date('Y-m-d H:i:s'));
		 $from_time = strtotime($from_time);
		 //$time_left="";
		 $time=round(abs($current_time - $from_time) / 60);
		 if($time<=1 )
		 $time_left=" ".$this->lang->line('just_now');
		 if($time>1 && $time<60 )
		 $time_left=$time." ".$this->lang->line('min_ago');
		 if($time>59 && $time<1440 ) 
		 {
		 $hour= round(abs($time / 60));
		 $time_left=$hour." ".$this->lang->line('hours_ago');
		 }
		 if($time>1439 )
		 {
		 $day= round(abs($time / 1440));
		 $time_left=$day." ".$this->lang->line('days_ago');
		 }
		 
		 return $time_left;
	
	}
	
	
	/*
	FUNCTION NAME: get_chat_user_by_ajax()
	it will load all chat user
	
	*/
	public function get_chat_user_by_ajax()
	{
	
	
		
		$query_result=$this->chat_model->get_all_app_user_list();
		$str="";
	 	$assets_url=base_url()."assets";
		
	 	foreach ($query_result as $row):
		
		if($row->app_user_full_name=="NOT REGISTERED")
		{
			$full_name=$this->lang->line('not_registered');
		}
		else
		{
			$full_name=$row->app_user_full_name;
		}
		
		$chat_msg= $row->chat_is_seen==0 ? "<b >".$row->chat_message."</b>": $row->chat_message;
		$user_full_name= $row->chat_is_seen==0 ? "<b style=\"color:blue\">".$full_name.":</b>": $full_name.":";
		$str.=<<<EOF
			<tr id="$row->ref_chat_app_user_id">
			
				<td><img src="$assets_url/img/profile_0.jpg" alt="" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td >
				<div>
				<a name="$row->ref_chat_app_user_id"></a>
				<span class="user">$user_full_name</span><i class="fa fa-check fa-spacing message-status"></i>
				<span class="message">$chat_msg</span>
				</div>	
				</td>
				<td><span class="time">$row->chat_message_sending_edited_date_time</span></td>
			
			</tr>
EOF;
		endforeach; 
		echo $str;
	}
	
	function manageNotification($id)
	{
	 $query_session_for_sound=$this->chat_model->get_all_chat_details_for_sound($id);
	$no=$this->session->userdata('notification_no');
	$after_read=$no-$query_session_for_sound;
	$this->session->set_userdata('notification_no',$after_read);
	}
	
	/*
	FUNCTION NAME:get_chat_details_by_ajax($id)
	it will load chat message for onclick users.*/
	public function get_chat_details_by_ajax($id)
	{
		$appUserId=0;
		$str="";
		$this->manageNotification($id);   /// manage notification sound
		$query_result=$this->chat_model->get_all_chat_details($id);
		$assets_url=base_url()."assets";
	 	foreach ($query_result as $row):
		$chat_msg= $row->chat_is_seen==0 ? "<b >".$row->chat_message."</b>": $row->chat_message;
		$appUserId=$row->ref_chat_app_user_id;
		$from=$row->chat_from_admin==1?$this->lang->line('admin'):$this->lang->line('user');
		if($row->chat_from_admin==1)
		{
			$str.=<<<EOF
		
			<tr id="$row->ref_chat_app_user_id">
				<td><img class="img-responsive" src="$assets_url/img/profile_0.jpg" alt="" /></td>
				<td><span class="name">{$this->lang->line('admin')}:</span>
				<span class="message">$chat_msg</span>
				<span class="time">$row->chat_message_sending_edited_date_time</span>
				</td>
			</tr>
EOF;
		}
		else
		{
			if($row->app_user_first_name==NULL)
			{
				$full_name=$this->lang->line('not_registered');
			}
			else
			{
				$full_name=$row->app_user_first_name." ".$row->app_user_last_name;
			}
		$str.=<<<EOF
		
			<tr id="$row->ref_chat_app_user_id">
				<td><img class="img-responsive" src="$assets_url/img/profile_0.jpg" alt="" /></td>
				<td><span class="name" style='color:blue'>$full_name:</span>
				
				<span class="message" style='color:blue'>$chat_msg</span>
				<span class="time">$row->chat_message_sending_edited_date_time</span>
				</td>
			</tr>
EOF;
		}
  

		endforeach; 
		echo $str;
		
		
	}
	
	public function insert_chat_details_by_ajax($id)
	{
		$msg=$_POST['msg'];
		$appUserId=0;
		$str="";
		$inserted_id=$this->chat_model->insert_chat_message($id,$msg);
		
		$query_result=$this->chat_model->get_all_chat_details($id);
		
		$assets_url=base_url()."assets";
	 	foreach ($query_result as $row):
		$chat_msg= $row->chat_is_seen==0 ? "<b>".$row->chat_message."</b>": $row->chat_message;
		$appUserId=$row->ref_chat_app_user_id;
		$str.=<<<EOF
		
			<tr id="$row->ref_chat_app_user_id">
				<td><img class="img-responsive" src="$assets_url/img/profile_0.jpg" alt="" /></td>
				<td><span class="name">$row->app_user_first_name $row->app_user_last_name:</span>
				<span class="time">$row->chat_message_sending_edited_date_time</span>
				<span class="message">$chat_msg</span></td>
			</tr>
EOF;
  

		endforeach; 
		echo $str;
		if($inserted_id>0)
		{
		    $device_type_id=$this->common_model->get_user_device_type($id);
		    if($device_type_id==ANDROID_DEVICE_TYPE_ID)
		    {
		       $this->push_personal_chat_to_android_users($id,$inserted_id);
		    }
		    else if($device_type_id==IOS_DEVICE_TYPE_ID)
		    {
		       $this->push_personal_chat_to_ios_users($id,$inserted_id);
		    }
			
		}
		
		
		
	}
			
			
	public function edit_chat($id)
	{
	
		$data['content'] = 'chat/edit_chat_form';
		$data['title'] = "Edit Chat";
		
		$this->form_validation->set_rules('ref_chat_app_user_id', $this->ref_chat_app_user_id_label, 'trim|required|xss_clean');
		$this->form_validation->set_rules('chat_from_app_user', $this->chat_from_app_user_label, 'trim|xss_clean');
		$this->form_validation->set_rules('chat_from_admin', $this->chat_from_admin_label, 'trim|xss_clean');
		$this->form_validation->set_rules('ref_chat_from_admin_user_id', $this->ref_chat_from_admin_user_id_label, 'trim|xss_clean');
		$this->form_validation->set_rules('chat_message', $this->chat_message_label, 'trim|required|xss_clean');
		$this->form_validation->set_rules('chat_is_edited', $this->chat_is_edited_label, 'trim|xss_clean');
		$this->form_validation->set_rules('chat_message_sending_edited_date_time', $this->chat_message_sending_edited_date_time_label, 'trim|required|xss_clean');
		
		
			$edit_query_result=$this->chat_model->get_chat_by_id($id);
			$edit_query_result= $edit_query_result->result();
			$data['edit_query_result'] = $edit_query_result[0];
			
		
		if ($this->form_validation->run() == FALSE) 
		{
		
			$this->load->vars($data);
			$this->load->view('layout/switchy_main');
		} 
		else 
		{
			$query_data=array(
			'ref_chat_app_user_id' =>$this->input->post('ref_chat_app_user_id'),
			'chat_from_app_user' =>$this->input->post('chat_from_app_user'),
			'chat_from_admin' =>$this->input->post('chat_from_admin'),
			'ref_chat_from_admin_user_id' =>$this->input->post('ref_chat_from_admin_user_id'),
			'chat_message' =>$this->input->post('chat_message'),
			'chat_is_edited' =>$this->input->post('chat_is_edited'),
			'chat_message_sending_edited_date_time' =>$this->input->post('chat_message_sending_edited_date_time'),
				);
			
		
			//Transfering data to Model
			$this->chat_model->chat_update($query_data,$id);
		
			$msg = 'Data Edited Successfully';
			$this->session->set_flashdata('msg', $msg);
			redirect("edit_chat/".$id);
		}
		
	}
	
	public function view_chat($id)
	{
	
		$data['content'] = 'chat/single_chat_view';
		$data['title'] = 'View Chat';
		$query_result=$this->chat_model->get_chat_by_id($id);
		$query_result= $query_result->result();
		$data['query_result'] = $query_result[0];
		$this->load->vars($data);
		$this->load->view('layout/switchy_main');
	}
	
	public function delete_chat($id,$url)
	{
		$result=$this->chat_model->delete_chat_by_id($id);
		$msg=$result>0?"Chat deleted":"Chat not delete";
		$this->session->set_flashdata('msg', $msg);
		redirect($url);
			
	}
	
	public function change_status($id,$status,$url)
	{
	$status=$status==0?1:0;	
	$data = array(
			'chat_id' => $status,
			);
	$this->chat_model->status_update($id,$data);
	$status=$status==0?"Inactive":"Active";
	$msg = "Id #$id is now $status";
	$this->session->set_flashdata('msg', $msg);
	redirect($url);
	}	
 

	/*
	FUNCTION NAME :push_personal_message_to_android_users($app_user_id,$message_id)
	it will send push message to android device for a fixed user*/
	public function push_personal_chat_to_android_users($app_user_id,$chat_id)
	{
		$push_notification=$this->common_model->get_android_ios_push_information();
		
		    $chat_details=$this->chat_model->get_chat_row($chat_id);
		  
		   
		    $chat_details['push_type']=PUSH_CHAT_TYPE;
		   
		    $chat_details['push_operation']=PUSH_OPERATION_NEW;
		   
		   //print_r($events_details);
		
		// Message to be sent
			$gcm_api_key=trim($push_notification['push_information_android_gcm_api_key']);
			
			//Get All GCM Registration_ID
			$gcm_reg_ids=$this->common_model->get_android_device_id_by_app_user_id($app_user_id);
			//echo "<br/>";
		    $it =  new RecursiveIteratorIterator(new RecursiveArrayIterator($gcm_reg_ids));
		    $l = iterator_to_array($it, false);
		    //var_dump($l); // one Dimensional 
		
		// Set POST variables
		   $url = trim($push_notification['push_information_android_server_url']);
		   $fields = array(
                'registration_ids'  => $l,
                'data'              => $chat_details,
                );
				//print_r($fields);
				
		$headers = array( 
                    'Authorization: key=' . $gcm_api_key,
                    'Content-Type: application/json'
                );
				// Open connection
				$ch = curl_init();
				
				// Set the url, number of POST vars, POST data
				curl_setopt( $ch, CURLOPT_URL, $url );
				
				curl_setopt( $ch, CURLOPT_POST, true );
				curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
				curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
				curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );
				
				// Execute post
				$result = curl_exec($ch);
				// Close connection
				curl_close($ch);
				
				
	}
	
	public function push_personal_chat_to_ios_users($app_user_id,$chat_id)
	{
		$push_notification=$this->common_model->get_android_ios_push_information();
		
	  //$deviceToken="eebc7b75921c121a2a035246438a5aa92e67919d3ae8ed3c6c1dff9c554523fd";
	  $deviceToken=$this->common_model->get_ios_device_id_by_app_user_id($app_user_id);
      //$passphrase = 'pushMessageNuovo123456';
      //$passphrase = 'computerlab';
      $passphrase = trim($push_notification['push_information_ios_passphrase']);
      // Put your alert message here:
       $chat_details=$this->chat_model->get_chat_row($chat_id);
		  
		   
	   $chat_details['push_type']=PUSH_CHAT_TYPE;
		   
	   $chat_details['push_operation']=PUSH_OPERATION_NEW;
		   
	   $chat_details['alert']=$this->lang->line('chat_push_title');
	   $chat_details['sound']='default';
      ////////////////////////////////////////////////////////////////////////////////
      //$ck_pem_path="ios_push/ckNuovo.pem";
      //$ck_pem_path="ios_push/computerLabck.pem";
      $ck_pem_path="ios_push/".trim($push_notification['push_information_ios_local_cert_pem_file_name']);
      $ctx = stream_context_create();
      stream_context_set_option($ctx, 'ssl', 'local_cert', $ck_pem_path);
      stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

     // Open a connection to the APNS server
     $fp = stream_socket_client(
	  trim($push_notification['push_information_ios_current_gateway_ssl']), $err,
	   $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

     

     // Create the payload body
     $body['aps'] =  $chat_details;
     
     

    // Encode the payload as JSON
    $payload = json_encode($body);

       // Build the binary notification

      $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
      // Send it to the server
      $result = fwrite($fp, $msg, strlen($msg));
      

    
    // Close the connection to the server
    fclose($fp);
	}
	

	
	

	
	
	
}
	
	

	
	
	