<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Appuser extends CI_Controller {
	
	public $views_folder_name;

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('common_model');
		$this->load->model('appuser_model');
		
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
				$this->lang->load('app_user_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('app_user_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('app_user_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
				$this->lang->load('app_user_it','italian');
		}
	}
	
	public function all_app_user_list($limit=null)
	{
		
		$data['content'] ='app_user_details/all_app_users_view';
		$data['controller']=$this->router->fetch_class(); 	// class = controller
		$data['method']=$this->router->fetch_method();		// method
		$per_page=POST_PER_PAGE;
		$limit=$this->uri->segment(3, 1);
		
		/****Search App User List Data******/
		
		$data['search_result']=0;
		
		if(($this->input->post('search_user_submit')))
		{
			if(ctype_digit(trim($this->input->post('app_user_hidden_id'))))
			{
				$data['search_user_details']=$this->appuser_model->get_search_app_user_by_id(trim($this->input->post('app_user_hidden_id')));
				
				if(count($data['search_user_details'])>0)
				{
					$data['search_result']=1;
				}
			}
		}
		
		/****Search App User List Data******/
		$data['all_app_users']=$this->appuser_model->get_all_app_user_list($limit,$per_page);	/* for view all data to admin */
		$total_rows=$this->appuser_model->no_of_rows_app_user_list();	/* get the total rows from the query */
		$url=base_url()."app_user_list/page/";
		$data['paging']=$this->common_model->custom_pager($url,$per_page,$total_rows);

		$this->load->vars($data);
		$this->load->view('layout/switchy_main');
		$this->load->view('app_user_details/all_app_users_view_js');
	
	}
	
	
	public function app_user_send_message($app_user_id=0)
	{
		if($app_user_id>0 && $app_user_id==$this->input->post('hidden_app_user_id'))
		{
			$this->load->model('message_model');
			
			$message_created_by_user_id= $this->common_model->get_login_user_id();
			$message_created_date_time = date("Y-m-d H:i:s");
			$message_edited_date_time  = date("Y-m-d H:i:s");
			
			$message_title=trim($this->input->post('message_title'));
			$message_details=trim($this->input->post('message_details'));
			
			$query_data=array(
			'ref_message_message_type_id' =>MSG_TYPE_PERSONAL_ID,
			'message_title' =>$message_title,
			'message_details' =>$message_details,
			'message_any_ending_date' =>0,//0 means no
			'message_is_push_message' =>1,
			'message_created_by_user_id'=> $message_created_by_user_id,
			'message_created_date_time' =>$message_created_date_time,
			'message_edited_date_time' =>$message_edited_date_time,
			'message_send_now' =>1,
			'message_send_later' =>0,
			'message_is_already_sent' =>1,
			'message_sending_date_time' =>$message_created_date_time);
			
			//Transfering data to Model
			$message_id=$this->message_model->message_insert($query_data);
			if($message_id>0)
			{
				$data_query_personal_message=array(
			     'ref_personal_message_message_id'=>$message_id,
				 'ref_personal_message_app_user_id' =>$app_user_id);
				 $personal_message_id=$this->message_model->personal_message_insert($data_query_personal_message);
				 if($personal_message_id>0)
				 {
					$this->push_personal_message_to_android_users($app_user_id,$message_id);
					$this->push_personal_message_to_ios_users($app_user_id,$message_id);
					redirect('view_message/'.$message_id);
				 }
				 else
				 {
					 $data['message'] = SUCCESSFULLY_NOT_DONE;
					 $this->load->vars($data);
					 $this->load->view('layout/switchy_main');
					 $this->load->view('message/add_message_form_js');
				 }
			
			}
			else
			{
				$data['message'] = SUCCESSFULLY_NOT_DONE;
				
				$this->load->vars($data);
				$this->load->view('layout/switchy_main');
				$this->load->view('message/add_message_form_js');
			}
		}
		else
		{
		}
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
	
	