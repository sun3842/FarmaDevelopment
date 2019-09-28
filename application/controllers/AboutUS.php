<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AboutUs extends CI_Controller {
	

	


	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('aboutus_model');
		$this->load->model('common_model');
		$this->load->model('pharmacy_model');
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
				$this->lang->load('about_us_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('about_us_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('about_us_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
				$this->lang->load('about_us_it','italian');
		}
		
		
	}
	
	public function index()
	{	
	}
	
	
	public function about_us_page()
	{
		$data['content'] = 'about_us/about_us_page';
		
		
		
		$this->form_validation->set_message('required', $this->lang->line('required'));
	
		$this->form_validation->set_rules('about_us_details', 'about_us_details', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE) 
		{
			
		} 
		else
		{
			$about_us_data=array('about_us_details'=>$this->input->post('about_us_details'));
			$this->aboutus_model->insert_update($about_us_data);
		}
		
		$data['row']=$this->aboutus_model->get_about_us_details();
		$this->load->vars($data);
		$this->load->view('layout/switchy_main');
		$this->load->view('about_us/about_us_page_js');
		
	}


	
	
	
	public function create_news()
	{
		$data['content'] = 'news/add_news';
		
                
		$this->form_validation->set_message('required', $this->lang->line('required'));
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('news_title', 'news_title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('news_description', 'news_description', 'trim|required|xss_clean');
		
		
		//$this->form_validation->set_rules('message_send_now', 'message_send_now', 'trim|xss_clean');
		
		
		

		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->vars($data);
			$this->load->view('layout/switchy_main');
			$this->load->view('news/add_news_js');
		} 
		else 
		{
			
			$image_details=$this->save_image();
			$has_image=0;
			if($image_details['status']==1)
				{
					$image_info=$image_details['image_data'];
					$has_image=1;
				}
		$query_data=array(
			'ref_message_message_type_id' =>MSG_TYPE_NORMAL_ID,
			'ref_message_message_from_id' =>$ref_message_message_from_id,
			'ref_message_pharmacy_id'=>$ref_message_message_from_id==USER_TYPE_SUPER_ADMIN?NULL:$pharmacy_id,
			'news_title	' =>$this->input->post('news_title	'),
			'news_description' =>$this->input->post('news_description'),
			'news_image_location' =>0,
			
				);
			
			//Transfering data to Model
			$message_id=$this->message_model->message_insert($query_data);
			if($message_id>0)
			{
				$data['message'] = SUCCESSFULLY_DONE;
				if($this->input->post('message_is_push_message')==1 && $this->input->post('message_send_now')==1)
				{
					$this->push_common_message_to_android_users($message_id);
					$this->push_common_message_to_ios_users($message_id);
				}
                $this->session->set_flashdata('message', 'SAVED');
				redirect('view_message/'.$message_id);
				
			}
			else
			{
				$data['message'] = SUCCESSFULLY_NOT_DONE;
				$this->load->vars($data);
			    $this->load->view('layout/switchy_main');
			    $this->load->view('news/add_news_js');
			}
			
			
			
		}
		
		
	}
	
	
	public function save_image()
	{
		
		$return_array=array();
		
		
		$config =  array(
                  'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"]).'/all_images/image_news/original_image/',
                  'upload_url'      => base_url()."files/",
                  'allowed_types'   => "gif|jpg|jpeg|png",
				  
                   
                );
	    $this->load->library('upload', $config);
		
		$uploading_file_info=array();
		
		
		
		if ($this->upload->do_upload())
				{
					$data = $this->upload->data();
					
					$return_array['image_data']=$data;
					$return_array['status']=1;
					$target_fileName_with_folder="all_images/image_news/original_image/".$data['file_name'];
					$rename_fileName=$data['file_name'];
				}
				else
				{
							$errors = $this->upload->display_errors();
							$return_array['status']=0;
							
				}
		
		
		return $return_array;
	}

	
	public function admin_message($limit=null)
	{
		$data['content'] = 'message/all_message_view';
		//$data['title'] = 'Message';
		$data['controller']=$this->router->fetch_class(); 	// class = controller
		$data['method']=$this->router->fetch_method();		// method
		$per_page=POST_PER_PAGE;
		$limit=$this->uri->segment(3, 1);
		$data['query_result']=$this->message_model->get_all_message_list($limit,$per_page);	/* for view all data to admin */
		$total_rows=$this->message_model->no_of_rows_message_list();	/* get the total rows from the query */
		$url=base_url()."message/page/";
		$data['paging']=$this->common_model->custom_pager($url,$per_page,$total_rows);

		$this->load->vars($data);
		$this->load->view('layout/switchy_main');
	}
	
	
	
	
	
	
	
			
	public function edit_message($id)
	{
	
		$data['content'] = 'message/edit_message_form';
		$data['title'] = "Edit Message";
		
		$this->form_validation->set_rules('ref_message_message_type_id', 'ref_message_message_type_id', 'trim|required|xss_clean');
		$this->form_validation->set_rules('message_title', 'message_title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('message_details', 'message_details', 'trim|required|xss_clean');
		$this->form_validation->set_rules('message_any_ending_date', 'message_any_ending_date', 'trim|xss_clean');
		$this->form_validation->set_rules('message_ending_date', 'message_ending_date', 'trim|xss_clean');
		$this->form_validation->set_rules('message_ending_time', 'message_ending_time', 'trim|xss_clean');
		$this->form_validation->set_rules('message_is_push_message', 'message_is_push_message', 'trim|xss_clean');
		/* $this->form_validation->set_rules('message_created_by_user_id', 'message_created_by_user_id', 'trim|required|xss_clean');
		$this->form_validation->set_rules('message_created_date_time', 'message_created_date_time', 'trim|required|xss_clean');
		$this->form_validation->set_rules('message_edited_by_user_id', 'message_edited_by_user_id', 'trim|xss_clean');
		$this->form_validation->set_rules('message_edited_date_time', 'message_edited_date_time', 'trim|required|xss_clean'); */
		$this->form_validation->set_rules('message_send_now', 'message_send_now', 'trim|xss_clean');
		$this->form_validation->set_rules('message_send_later', 'message_send_later', 'trim|xss_clean');
		$this->form_validation->set_rules('message_send_later_date_time', 'message_send_later_date_time', 'trim|xss_clean');
		$this->form_validation->set_rules('message_is_already_sent', 'message_is_already_sent', 'trim|xss_clean');
		$this->form_validation->set_rules('message_sending_date_time', 'message_sending_date_time', 'trim|xss_clean');
		$this->form_validation->set_rules('message_any_attached_file', 'message_any_attached_file', 'trim|xss_clean');
		$this->form_validation->set_rules('message_active', 'message_active', 'trim|xss_clean');
		
		$message_edited_by_user_id= $this->common_model->get_login_user_id();
		$message_edited_date_time  = date("Y-m-d H:i:s");
		
			$edit_query_result=$this->message_model->get_message_by_id($id);
			$edit_query_result= $edit_query_result->result();
			$data['edit_query_result'] = $edit_query_result[0];
			$data['message_type_query']=$this->message_model->get_message_type($data['edit_query_result']->ref_message_message_type_id);
			
		
		if ($this->form_validation->run() == FALSE) 
		{
		
			$this->load->vars($data);
			$this->load->view('layout/switchy_main');
		} 
		else 
		{
			$query_data=array(
			'ref_message_message_type_id' =>$this->input->post('ref_message_message_type_id'),
			'message_title' =>$this->input->post('message_title'),
			'message_details' =>$this->input->post('message_details'),
			'message_any_ending_date' =>$this->input->post('message_any_ending_date'),
			'message_ending_date' =>$this->input->post('message_ending_date'),
			'message_ending_time' =>$this->input->post('message_ending_time'),
			'message_is_push_message' =>$this->input->post('message_is_push_message'),
			'message_edited_by_user_id' =>$message_edited_by_user_id,
			'message_edited_date_time' =>$message_edited_date_time ,
			'message_send_now' =>$this->input->post('message_send_now'),
			'message_send_later' =>$this->input->post('message_send_later'),
			'message_send_later_date_time' =>$this->input->post('message_send_later_date_time'),
			'message_is_already_sent' =>$this->input->post('message_is_already_sent'),
			'message_sending_date_time' =>$this->input->post('message_sending_date_time'),
			'message_any_attached_file' =>$this->input->post('message_any_attached_file'),
			'message_active' =>$this->input->post('message_active'),
				);
			
		
			//Transfering data to Model
			$this->message_model->message_update($query_data,$id);

            $this->session->set_flashdata('message', 'Data Edited Successfully');
			redirect("edit_message/".$id);
		}
		
	}
	
	public function view_message($id=0)
	{
	
		$data['content'] = 'message/single_message_view';
		//$data['title'] = 'View Message';
		//$query_result=$this->message_model->get_message_by_id($id);
		//$query_result= $query_result->result();
		//$data['query_result'] = $query_result[0];
		
		$data['msg_details']=$this->message_model->get_message_details_view_page_by_id($id);
		$this->load->vars($data);
		$this->load->view('layout/switchy_main');
	}
	
	public function delete_message($id,$url)
	{
		
		$result=$this->message_model->delete_message_by_id($id);
		$msg=$result>0?"Message deleted":"Message not deleted";
		$this->session->set_flashdata('error', $msg);
		redirect($url);
			
	}
	
	
	function ajax_find_app_user()
	{
		if(isset($_POST['search']))
		{
			$q=$_POST['search'];
		}
		
		if (!$q) return;
		
		$app_users=$this->common_model->get_all_app_user_list_by_name_keyword($q);
		
		foreach($app_users as $app_user)
		{
		?>
        <div class="show" align="left">
            <span class="name"><?php echo $app_user['app_user_first_name']." ".$app_user['app_user_last_name']; ?></span>&nbsp;<br/><?php echo $this->lang->line('birth_date');?> :<?php echo $app_user['app_user_birth_date']; ?><br/><?php echo $this->lang->line('city');?> :<?php echo $app_user['app_user_city']; ?><span class="client_id" style="display:none;"><?php echo $app_user['ref_app_user_details_app_user_id'];?></span>
            </div>
        <?php
		}
	}
	
	/*
	FUNCTION NAME : push_common_message_to_android_users($message_id)
	it will send push message to all anddroid user for normal message*/
	public function push_common_message_to_android_users($message_id)
	{
		$push_notification=$this->common_model->get_android_ios_push_information();
		
		$message_details=$this->message_model->get_message_by_id($message_id)->row_array();
		
		$message_details['push_type']=PUSH_MESSAGE_TYPE;
		$message_details['push_message_normal']=1;
		$message_details['push_message_group']=0;
		 
		// Message to be sent
		$gcm_api_key=trim($push_notification['push_information_android_gcm_api_key']);
			
		//Get All GCM Registration_ID
		$gcm_reg_ids=$this->common_model->get_all_gcm_device_registration_ids();
			
		$it =  new RecursiveIteratorIterator(new RecursiveArrayIterator($gcm_reg_ids));
		$l = iterator_to_array($it, false);
		//var_dump($l); // one Dimensional 
		
		// Set POST variables
		$url = trim($push_notification['push_information_android_server_url']);
		$fields = array(
                'registration_ids'  => $l,
                'data'              => $message_details,
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
 
	
/*
	FUNCTION NAME : push_group_message_to_android_users($message_id)
	it will send push message to all anddroid user for normal message*/
	public function push_group_message_to_android_users($group_message_id,$message_id)
	{
		
		$push_notification=$this->common_model->get_android_ios_push_information();
		
		$message_details=$this->message_model->get_message_by_id($message_id)->row_array();
		   
		$message_details['push_type']=PUSH_MESSAGE_TYPE;
		$message_details['push_message_normal']=0;
		$message_details['push_message_group']=1;
		   
		   
		
		// Message to be sent
		$gcm_api_key=trim($push_notification['push_information_android_gcm_api_key']);
			
		//Get All GCM Registration_ID
		$gcm_reg_ids=$this->message_model->get_app_user_id_for_group_message($group_message_id);
		
		$it =  new RecursiveIteratorIterator(new RecursiveArrayIterator($gcm_reg_ids));
		$l = iterator_to_array($it, false);
		
		// Set POST variables
		$url = trim($push_notification['push_information_android_server_url']);
		$fields = array(
                'registration_ids'  => $l,
                'data'              => $message_details,
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
 
 
 /*
	FUNCTION NAME :push_personal_message_to_android_users($app_user_id,$message_id)
	it will send push message to android device for a fixed user*/
	public function push_personal_message_to_android_users($app_user_id,$message_id)
	{
		$push_notification=$this->common_model->get_android_ios_push_information();
		
		$message_details=$this->message_model->get_message_by_id($message_id)->row_array();
		$message_details['push_type']=PUSH_MESSAGE_TYPE;
		$message_details['push_message_normal']=0;
		$message_details['push_message_group']=1;
		   
		   
		
		// Message to be sent
		$gcm_api_key=trim($push_notification['push_information_android_gcm_api_key']);
			
		//Get All GCM Registration_ID
		$gcm_reg_ids=$this->common_model->get_android_device_id_by_app_user_id($app_user_id);
		$it =  new RecursiveIteratorIterator(new RecursiveArrayIterator($gcm_reg_ids));
		$l = iterator_to_array($it, false);
		
		// Set POST variables
		$url = trim($push_notification['push_information_android_server_url']);
		$fields = array(
                'registration_ids'  => $l,
                'data'              => $message_details,
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
 
	
	/*
	FUNCTION NAME : push_common_message_to_ios_users($message_id)
	It will send common messages to all ios users.
	*/
	
	
	public function push_common_message_to_ios_users($message_id)
	{
		$push_notification=$this->common_model->get_android_ios_push_information();
		
		$deviceToken_array=$this->common_model->get_all_ios_device_registration_ids();
		$passphrase = trim($push_notification['push_information_ios_passphrase']);
		
		// Put your alert message here:
		
		$message_details=$this->message_model->get_message_by_id($message_id)->row_array();
		$message_details['push_type']=PUSH_MESSAGE_TYPE;
		$message_details['push_message_normal']=1;
		$message_details['push_message_group']=0;
		$message_details['alert']=$this->lang->line('message_push_title');
		$message_details['sound']='default';
		
		$ck_pem_path="ios_push/".trim($push_notification['push_information_ios_local_cert_pem_file_name']);
		
		$ctx = stream_context_create();
		stream_context_set_option($ctx, 'ssl', 'local_cert', $ck_pem_path);
		stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
		
		// Open a connection to the APNS server
		$fp = stream_socket_client(
		trim($push_notification['push_information_ios_current_gateway_ssl']), $err,
		$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
/*
     if (!$fp)
	 {
		 //exit("Failed to connect: $err $errstr" . PHP_EOL);
	 }
	 else
	 {
		// echo 'Connected to APNS' . PHP_EOL;
	 }
	 
*/
     

       // Create the payload body
       $body['aps'] =  $message_details;
       
     

      // Encode the payload as JSON
      $payload = json_encode($body);

      foreach($deviceToken_array as $deviceToken)
	  {
       // Build the binary notification
      $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken['ios_device_token']) . pack('n', strlen($payload)) . $payload;

     // $msg = chr(0) . pack('n', 32) . pack('H*', '35f53ebe9570f3b821b2ce45108475d41ac380a5aa261cc0912ddfca90dc3ec5') . pack('n', strlen($payload)) . $payload;
      // Send it to the server
      $result = fwrite($fp, $msg, strlen($msg));
	  
	  /*
      if (!$result)
	  {
	    //echo 'Message not delivered' . PHP_EOL;
	  }
      else
	  {
	  
	    //echo 'Message successfully delivered' . PHP_EOL;
	  }
	  */

    }
	// Close the connection to the server
    fclose($fp);
  }
  
  
  
  /*
	FUNCTION NAME : push_group_message_to_ios_users($group_message_id,$message_id)
	It will send group messages to all ios users.
	*/
	
	
	public function push_group_message_to_ios_users($group_message_id,$message_id)
	{
		$push_notification=$this->common_model->get_android_ios_push_information();
		
		$deviceToken_array=$this->message_model->get_app_user_id_for_ios_group_message($group_message_id);
		$passphrase = trim($push_notification['push_information_ios_passphrase']);
		
		// Put your alert message here:
		
		$message_details=$this->message_model->get_message_by_id($message_id)->row_array();
		   
		
		
		$message_details=$this->message_model->get_message_by_id($message_id)->row_array();
		$message_details['push_type']=PUSH_MESSAGE_TYPE;
		$message_details['push_message_normal']=0;
		$message_details['push_message_group']=1;
		$message_details['alert']=$this->lang->line('message_push_title');
		$message_details['sound']='default';
		
		$ck_pem_path="ios_push/".trim($push_notification['push_information_ios_local_cert_pem_file_name']);
		
		$ctx = stream_context_create();
		stream_context_set_option($ctx, 'ssl', 'local_cert', $ck_pem_path);
		stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
		
		// Open a connection to the APNS server
		$fp = stream_socket_client(
		trim($push_notification['push_information_ios_current_gateway_ssl']), $err,
		$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
/*
     if (!$fp)
	 {
		 //exit("Failed to connect: $err $errstr" . PHP_EOL);
	 }
	 else
	 {
		// echo 'Connected to APNS' . PHP_EOL;
	 }
	 
*/
     

       // Create the payload body
       $body['aps'] =  $message_details;
       
     

      // Encode the payload as JSON
      $payload = json_encode($body);

      foreach($deviceToken_array as $deviceToken)
	  {
       // Build the binary notification
       $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

     // $msg = chr(0) . pack('n', 32) . pack('H*', '35f53ebe9570f3b821b2ce45108475d41ac380a5aa261cc0912ddfca90dc3ec5') . pack('n', strlen($payload)) . $payload;
      // Send it to the server
      $result = fwrite($fp, $msg, strlen($msg));
	  
	  /*
      if (!$result)
	  {
	    echo 'Message not delivered' . PHP_EOL;
	  }
      else
	  {
	  
	    echo 'Message successfully delivered' . PHP_EOL;
	  }*/

    }
	// Close the connection to the server
    fclose($fp);
  }
	
	
	
	
	/*
	FUNCTION NAME : push_personal_message_to_ios_users($app_user_id,$message_id)
	It will send group messages to all ios users.
	*/
	
	
	public function push_personal_message_to_ios_users($app_user_id,$message_id)
	{
		$push_notification=$this->common_model->get_android_ios_push_information();
		
		$deviceToken=$this->common_model->get_ios_device_id_by_app_user_id($app_user_id);
		$passphrase = trim($push_notification['push_information_ios_passphrase']);
		
		// Put your alert message here:
		
		$message_details=$this->message_model->get_message_by_id($message_id)->row_array();
		   
		
		
		$message_details=$this->message_model->get_message_by_id($message_id)->row_array();
		$message_details['push_type']=PUSH_MESSAGE_TYPE;
		$message_details['push_message_normal']=0;
		$message_details['push_message_group']=1;
		$message_details['alert']=$this->lang->line('message_push_title');
		$message_details['sound']='default';
		
		$ck_pem_path="ios_push/".trim($push_notification['push_information_ios_local_cert_pem_file_name']);
		
		$ctx = stream_context_create();
		stream_context_set_option($ctx, 'ssl', 'local_cert', $ck_pem_path);
		stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
		
		// Open a connection to the APNS server
		$fp = stream_socket_client(
		trim($push_notification['push_information_ios_current_gateway_ssl']), $err,
		$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
/*
     if (!$fp)
	 {
		 //exit("Failed to connect: $err $errstr" . PHP_EOL);
	 }
	 else
	 {
		// echo 'Connected to APNS' . PHP_EOL;
	 }
	 
*/
     

       // Create the payload body
       $body['aps'] =  $message_details;
       
     

      // Encode the payload as JSON
      $payload = json_encode($body);
       // Build the binary notification
      $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

     
      $result = fwrite($fp, $msg, strlen($msg));
	  
	  /*
      if (!$result)
	  {
	    //echo 'Message not delivered' . PHP_EOL;
	  }
      else
	  {
	  
	    //echo 'Message successfully delivered' . PHP_EOL;
	  }
	  */

	// Close the connection to the server
    fclose($fp);
  }
	
	
	
}
	
	

	
	
	