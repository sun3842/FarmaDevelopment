<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events extends CI_Controller {
	
	public $views_folder_name;
	public $lang_array=array();

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('common_model');
		$this->load->model('events_model');
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
				$this->lang->load('events_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('events_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('events_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
			$this->lang->load('events_it','italian');
		}
		
	}
	
	
	public function create_events()
	{

		$data['content'] = 'events/add_new_events_form';
		$data['event_type_query']=$this->events_model->get_all_event_type();
		
		
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_message('required', $this->lang->line('required'));
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('events_name', 'Events Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('events_description', 'Events Description', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('ref_events_event_type_id', 'Events Type', 'trim|required|xss_clean');
		$this->form_validation->set_rules('events_start_date', 'Events Start Date', 'trim|required|xss_clean');
		$this->form_validation->set_rules('events_start_time', 'Events Start Time', 'trim|required|xss_clean');
		$this->form_validation->set_rules('events_end_date', 'Events End Date', 'trim|required|xss_clean');
		$this->form_validation->set_rules('events_end_time', 'Events End Time', 'trim|required|xss_clean');
	//	$this->form_validation->set_rules('event_web_link_details', 'Events Web Link', 'trim|required|xss_clean');
		
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->vars($data);
			$this->load->view('layout/switchy_main');
			$this->load->view('events/add_new_events_form_js');
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
			
			$ref_events_event_type_id =1;//	$this->input->post('ref_events_event_type_id');
			
			$events_name = $this->input->post('events_name');
			$events_description = $this->input->post('events_description');
			$events_start_date = $this->input->post('events_start_date');
			$events_start_date = strtotime($events_start_date);
			$events_start_date = date("Y-m-d", $events_start_date);
			$events_start_time = $this->input->post('events_start_time');
			$events_end_date = $this->input->post('events_end_date');
		 	$events_end_date = strtotime($events_end_date);
			$events_end_date = date("Y-m-d", $events_end_date);
			$events_end_time = $this->input->post('events_end_time');
			$event_web_link_details = $this->input->post('event_other_web_link');
			$events_any_ending_date = empty($event_end_date) ? 0 : 1 ;
			$events_edited_date_time =	date("Y-m-d H:i:s");
			$events_active = 1;
			$pharmacy_id=$this->session->userdata('pharmacy_id');
			if (empty($pharmacy_id))
            {
                $pharmacy_id=NULL;
            }
			$query_data = array(
			'ref_events_event_type_id' => $ref_events_event_type_id,
			'ref_events_pharmacy_id'   =>$pharmacy_id,
			'events_name' => $events_name,
			'events_description' => $events_description,
			'event_facebook_address'=>$this->input->post('event_facebook_address'),
			'event_other_web_link' => $event_web_link_details,
			'events_start_date' => $events_start_date,
			'events_start_time' => $events_start_time,
			'events_any_ending_date' => $events_any_ending_date,
			'events_end_date' => $events_end_date,
			'events_end_time' => $events_end_time,
			'events_image_location'=>$has_image==1?"all_images/image_events/original_image/".$image_info['file_name']:NULL,
			'events_active' => $events_active,
			
			);
//print_r($query_data);die();
			//Transfering data to Model
			$events_id=$this->events_model->event_insert($query_data);
			if($events_id>0)
			{
				$data['message'] = $this->lang->line('done_status');
				//$this->push_events_to_android_users($events_id);
				//$this->push_events_to_ios_users($events_id);
				
				redirect('view_events/'.$events_id);
			}
			else
			{
				$data['message'] =  $this->lang->line('not_done_status');
				
				$this->load->vars($data);
				$this->load->view('layout/switchy_main');
				$this->load->view('events/add_new_events_form_js');
			}
			
			
			
			
			
		}
		
		
	}
	/*
	FUNCTION NAME: admin_events($limit=null)
	It will show all events list
	*/
	public function admin_events($limit=null)
	{
	
		$data['content'] = 'events/all_events_view';
		$per_page=POST_PER_PAGE;
		$limit=$this->uri->segment(3, 1);
		$data['all_events']=$this->events_model->get_all_ongling_upcoming_events_list($limit,$per_page);	/* for view all data to admin */
		$total_rows=$this->events_model->no_of_row_ongoing_upcoming_event_list();	/* get the total rows from the query */
		$url=base_url()."events/page/";
		$data['paging']=$this->common_model->custom_pager($url,$per_page,$total_rows);

		$this->load->vars($data);
		$this->load->view('layout/switchy_main');
		$this->load->view('events/all_events_view_js');
	}
		

	public function save_image()
	{
		
		$return_array=array();
		
		
		$config =  array(
                  'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"]).'/all_images/image_events/original_image/',
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
							echo $errors;
				}
		
		
		return $return_array;
	}

	
	public function edit_events($id)
	{
	
		$data['content'] = 'events/edit_events_form';
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_message('required', $this->lang->line('required'));
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('events_name', 'Events Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('events_description', 'Events Description', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('ref_events_event_type_id', 'Events Type', 'trim|required|xss_clean');
		$this->form_validation->set_rules('events_start_date', 'Events Start Date', 'trim|required|xss_clean');
		$this->form_validation->set_rules('events_start_time', 'Events Start Time', 'trim|required|xss_clean');
		$this->form_validation->set_rules('events_end_date', 'Events End Date', 'trim|required|xss_clean');
		$this->form_validation->set_rules('events_end_time', 'Events End Time', 'trim|required|xss_clean');
	//	$this->form_validation->set_rules('event_web_link_details', 'Events Web Link', 'trim|required|xss_clean');
		
			$edit_query_result=$this->events_model->get_event_by_id($id);
			$edit_query_result= $edit_query_result->result();
			$data['edit_query_result'] = $edit_query_result[0];
			$data['event_type_query']=$this->events_model->get_event_type($data['edit_query_result']->ref_events_event_type_id);
		
		if ($this->form_validation->run() == FALSE) 
		{
		
			$this->load->vars($data);
			$this->load->view('layout/switchy_main');
			$this->load->view('events/edit_events_form_js');
		} 
		else 
		{
			
			$ref_events_event_type_id =	1;//$this->input->post('ref_events_event_type_id');
			$events_name = $this->input->post('events_name');
			$events_description = $this->input->post('events_description');
			$events_start_date = $this->input->post('events_start_date');
			$events_start_date = strtotime($events_start_date);
			$events_start_date = date("Y-m-d", $events_start_date);
			$events_start_time = $this->input->post('events_start_time');
			$events_end_date = $this->input->post('events_end_date');
		 	$events_end_date = strtotime($events_end_date);
			$events_end_date = date("Y-m-d", $events_end_date);
			$events_end_time = $this->input->post('events_end_time');
			$event_web_link_details = $this->input->post('event_web_link_details');
			$event_any_web_link = empty($event_web_link_details) ? 0 : 1 ;
			$events_any_ending_date = empty($event_end_date) ? 0 : 1 ;
//			$events_created_user_id = $this->common_model->get_login_user_id();
			$events_edited_date_time =	date("Y-m-d H:i:s");
			$events_active = 1;
			
			$query_data = array(
			'ref_events_event_type_id' => $ref_events_event_type_id,
			'events_name' => $events_name,
			'events_description' => $events_description,
			'event_other_web_link' => $event_any_web_link,
//			'event_web_link_details' => $event_web_link_details,
			'events_start_date' => $events_start_date,
			'events_start_time' => $events_start_time,
			'events_any_ending_date' => $events_any_ending_date,
			'events_end_date' => $events_end_date,
			'events_end_time' => $events_end_time,
//			'events_created_user_id' => $events_created_user_id,
			'events_edited_date_time' => $events_edited_date_time,
			'events_active' => $events_active,
			
			);
			//Transfering data to Model
			$status=$this->events_model->event_update($query_data,$id);
			/*
			$msg = 'Data Edited Successfully';
			$this->session->set_flashdata('msg', $msg);
			redirect("edit_events/".$id);
			*/
			
//			if($status=1)
//			{
//				$data['message'] = $this->lang->line('done_status');
//				$this->push_events_to_android_users($id);
//				$this->push_events_to_ios_users($id);
//
//				redirect('view_events/'.$id);
//			}
//			else
//			{
//				$data['message'] =  $this->lang->line('not_done_status');
//
//				$this->load->vars($data);
//				$this->load->view('layout/switchy_main');
//				$this->load->view('events/edit_events_form_js');
//			}
            redirect('view_events/'.$id);
		}
		
	}
	
	public function view_events($id)
	{
	
		$data['content'] = 'events/single_events_view';
		$data['title'] = 'View Events';
		$query_result=$this->events_model->get_event_by_id($id);
		$query_result= $query_result->result();
		$data['query_result'] = $query_result[0];
		$this->load->vars($data);
		$this->load->view('layout/switchy_main');
	}
	
	public function delete_events($id=0)
	{
		$result=$this->events_model->delete_event_by_id($id);
		if($result==1)
		{
			//Send a push message to all device for deleting 
			$this->push_delete_event_to_android_users($id);
			$this->push_delete_event_to_ios_users($id);
		}
		redirect(site_url('events'));
			
	}
	
 	public function change_status($id,$status,$url)
	{
	$status=$status==0?1:0;	
	$data = array(
			'events_active' => $status,
			);	
	$this->events_model->status_update($id,$data);
	$status=$status==0?"Inactive":"Active";
	$msg = "Id #$id is now $status";
	$this->session->set_flashdata('msg', $msg);
	redirect($url);
	}	
	
	
	
//	public function push_events_to_android_users($events_id)
//	{
//		$push_notification=$this->common_model->get_android_ios_push_information();
//
//		   $events_details=$this->events_model->get_event_by_id($events_id)->row_array();
//
//		   $events_details['push_type']=PUSH_EVENT_TYPE;
//		   $events_details['push_operation']=PUSH_OPERATION_NEW;
//		   //print_r($events_details);
//
//		// Message to be sent
//			$gcm_api_key=trim($push_notification['push_information_android_gcm_api_key']);
//
//			//Get All GCM Registration_ID
//			$gcm_reg_ids=$this->common_model->get_all_gcm_device_registration_ids();
//			//echo "<br/>";
//		    $it =  new RecursiveIteratorIterator(new RecursiveArrayIterator($gcm_reg_ids));
//		    $l = iterator_to_array($it, false);
//		    //var_dump($l); // one Dimensional
//
//		// Set POST variables
//		   $url = trim($push_notification['push_information_android_server_url']);
//		   $fields = array(
//                'registration_ids'  => $l,
//                'data'              => $events_details,
//                );
//				//print_r($fields);
//
//		$headers = array(
//                    'Authorization: key=' . $gcm_api_key,
//                    'Content-Type: application/json'
//                );
//				// Open connection
//				$ch = curl_init();
//
//				// Set the url, number of POST vars, POST data
//				curl_setopt( $ch, CURLOPT_URL, $url );
//
//				curl_setopt( $ch, CURLOPT_POST, true );
//				curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
//				curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
//				curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );
//
//				// Execute post
//				$result = curl_exec($ch);
//				// Close connection
//				curl_close($ch);
//
//
//	}
	
	
//	public function push_delete_event_to_android_users($id)
//	{
//		$push_notification=$this->common_model->get_android_ios_push_information();
//
//		   $events_details['events_id']=$id;
//
//
//		    $events_details['push_type']=PUSH_EVENT_TYPE;
//
//
//
//		    $events_details['push_operation']=PUSH_OPERATION_DELETE;
//
//		   //print_r($events_details);
//
//		// Message to be sent
//			$gcm_api_key=trim($push_notification['push_information_android_gcm_api_key']);
//
//			//Get All GCM Registration_ID
//			$gcm_reg_ids=$this->common_model->get_all_gcm_device_registration_ids();
//			//echo "<br/>";
//		    $it =  new RecursiveIteratorIterator(new RecursiveArrayIterator($gcm_reg_ids));
//		    $l = iterator_to_array($it, false);
//		    //var_dump($l); // one Dimensional
//
//		// Set POST variables
//		   $url = trim($push_notification['push_information_android_server_url']);
//		   $fields = array(
//                'registration_ids'  => $l,
//                'data'              => $events_details,
//                );
//				//print_r($fields);
//
//		$headers = array(
//                    'Authorization: key=' . $gcm_api_key,
//                    'Content-Type: application/json'
//                );
//				// Open connection
//				$ch = curl_init();
//
//				// Set the url, number of POST vars, POST data
//				curl_setopt( $ch, CURLOPT_URL, $url );
//
//				curl_setopt( $ch, CURLOPT_POST, true );
//				curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
//				curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
//				curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );
//
//				// Execute post
//				$result = curl_exec($ch);
//				// Close connection
//				curl_close($ch);
//
//
//	}
	
	/*
	FUNCTION NAME : push_events_to_ios_users($events_id)
	It will send push notification to ios users for events*/
	
//	public function  push_events_to_ios_users($events_id)
//	{
//		$push_notification=$this->common_model->get_android_ios_push_information();
//
//
//	  //$deviceToken="eebc7b75921c121a2a035246438a5aa92e67919d3ae8ed3c6c1dff9c554523fd";
//	  $deviceToken_array=$this->common_model->get_all_ios_device_registration_ids();
//
//      $passphrase = trim($push_notification['push_information_ios_passphrase']);
//      // Put your alert message here:
//
//	   $events_details=$this->events_model->get_event_by_id($events_id)->row_array();
//
//       $events_details['push_type']=PUSH_EVENT_TYPE;
//	   $events_details['push_operation']=PUSH_OPERATION_NEW;
//
//	   $events_details['alert']=$this->lang->line('event_push_title');
//	   $events_details['sound']='default';
//      ////////////////////////////////////////////////////////////////////////////////
//      //$ck_pem_path="ios_push/ckNuovo.pem";
//      //$ck_pem_path="ios_push/computerLabck.pem";
//      $ck_pem_path="ios_push/".trim($push_notification['push_information_ios_local_cert_pem_file_name']);
//      $ctx = stream_context_create();
//      stream_context_set_option($ctx, 'ssl', 'local_cert', $ck_pem_path);
//      stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
//
//     // Open a connection to the APNS server
//     $fp = stream_socket_client(
//	  trim($push_notification['push_information_ios_current_gateway_ssl']), $err,
//	   $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
//
//     // Create the payload body
//     $body['aps'] =  $events_details;
//
//
//
//    // Encode the payload as JSON
//    $payload = json_encode($body);
//
//    foreach($deviceToken_array as $deviceToken)
//    {
//       // Build the binary notification
//	   $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken['ios_device_token']) . pack('n', strlen($payload)) . $payload;
//
//      //$msg = chr(0) . pack('n', 32) . pack('H*', '35f53ebe9570f3b821b2ce45108475d41ac380a5aa261cc0912ddfca90dc3ec5') . pack('n', strlen($payload)) . $payload;
//      // Send it to the server
//      $result = fwrite($fp, $msg, strlen($msg));
//
//
//
//    }
//
//    // Close the connection to the server
//    fclose($fp);
//	}
	
 
	
		/*
	FUNCTION NAME : push_delete_event_to_ios_users($id)
	It will send push notification to ios users for events*/
	
//	public function  push_delete_event_to_ios_users($id)
//	{
//		$push_notification=$this->common_model->get_android_ios_push_information();
//
//
//	  //$deviceToken="eebc7b75921c121a2a035246438a5aa92e67919d3ae8ed3c6c1dff9c554523fd";
//	  $deviceToken_array=$this->common_model->get_all_ios_device_registration_ids();
//
//      $passphrase = trim($push_notification['push_information_ios_passphrase']);
//      // Put your alert message here:
//
//	   $events_details['events_id']=$id;
//	   $events_details['push_type']=PUSH_EVENT_TYPE;
//       $events_details['push_operation']=PUSH_OPERATION_DELETE;
//
//	   $events_details['sound']='';
//
//
//      ////////////////////////////////////////////////////////////////////////////////
//      //$ck_pem_path="ios_push/ckNuovo.pem";
//      //$ck_pem_path="ios_push/computerLabck.pem";
//      $ck_pem_path="ios_push/".trim($push_notification['push_information_ios_local_cert_pem_file_name']);
//      $ctx = stream_context_create();
//      stream_context_set_option($ctx, 'ssl', 'local_cert', $ck_pem_path);
//      stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
//
//     // Open a connection to the APNS server
//     $fp = stream_socket_client(
//	  trim($push_notification['push_information_ios_current_gateway_ssl']), $err,
//	   $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
//
//     // Create the payload body
//     $body['aps'] =  $events_details;
//
//
//
//    // Encode the payload as JSON
//    $payload = json_encode($body);
//
//    foreach($deviceToken_array as $deviceToken)
//    {
//       // Build the binary notification
//	   $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken['ios_device_token']) . pack('n', strlen($payload)) . $payload;
//
//      //$msg = chr(0) . pack('n', 32) . pack('H*', '35f53ebe9570f3b821b2ce45108475d41ac380a5aa261cc0912ddfca90dc3ec5') . pack('n', strlen($payload)) . $payload;
//      // Send it to the server
//      $result = fwrite($fp, $msg, strlen($msg));
//
//
//
//    }
//
//    // Close the connection to the server
//    fclose($fp);
//	}
	


}
	
	