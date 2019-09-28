<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NewArrival extends CI_Controller {
	

	
	public $new_arrival_status_array=array();
	public $new_arrival_price_array=array();
	public $new_arrival_currency_array=array();
	
	


	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('image_lib');
		$this->load->model('new_arrival_model');
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
				$this->lang->load('new_arrival_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('new_arrival_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('new_arrival_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
			$this->lang->load('new_arrival_it','italian');
		}
		
		$this->new_arrival_status_array=array('0'=>$this->lang->line('select_product_status'),'1'=>$this->lang->line('in_stock'),'2'=>$this->lang->line('upcoming'),'3'=>$this->lang->line('not_applicable'));
		$this->new_arrival_price_array=array('0'=>$this->lang->line('select_price_type'),'1'=>$this->lang->line('fixed_price'),'2'=>$this->lang->line('price_range'));
	}
	
	public function index()
	{	
	}
	
	public function create_new_arrival()
	{
		$data['content'] = 'new_arrival/add_new_arrival_form';
		
		$this->new_arrival_currency_array=$this->new_arrival_model->get_currency();
		
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('new_arrival_product_name_title', "", 'trim|xss_clean|required');
		$this->form_validation->set_rules('new_arrival_product_description', "", 'trim|xss_clean|required');
		$this->form_validation->set_rules('new_arrival_product_is_in_stock', "", 'trim|xss_clean|required');
		
		
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->vars($data);
			$this->load->view('layout/switchy_main');
			$this->load->view('new_arrival/add_new_arrival_form_js');
		} 
		else 
		{
			$created_by_user_id= $this->common_model->get_login_user_id();
		    $created_date_time = date("Y-m-d H:i:s");
		    $edited_date_time  = date("Y-m-d H:i:s");
			
			$image_details=$this->save_image();
			
		$query_data=array(
			'new_arrival_product_name_title' =>$this->input->post('new_arrival_product_name_title'),
			'new_arrival_product_description' =>$this->input->post('new_arrival_product_description'),
			'new_arrival_product_is_in_stock' =>$this->input->post('new_arrival_product_is_in_stock')==1?1:0,
			'new_arrival_product_is_upcoming' =>$this->input->post('new_arrival_product_is_in_stock')==2?1:0,
			'new_arrival_product_price' =>$this->input->post('new_arrival_product_price')==1?trim($this->input->post('fixed_price')):0,
			'new_arrival_product_price_has_range' =>$this->input->post('new_arrival_product_price')==2?1:0,
			'new_arrival_product_price_starting_range' =>$this->input->post('new_arrival_product_price')==2?trim($this->input->post('price_starting_from')):0,
			'new_arrival_product_price_ending_range' =>$this->input->post('new_arrival_product_price')==2?trim($this->input->post('price_starting_to')):0,
			'new_arrival_ref_currency_id' =>$this->input->post('new_arrival_ref_currency_id'),
			//'new_arrival_is_only_image' =>$this->input->post('new_arrival_is_only_image'),
			'new_arrival_has_image' =>$image_details['status'],
			'new_arrival_any_validation_date' =>trim($this->input->post('new_arrival_ending_validation_date'))!=""?1:0,
			'new_arrival_ending_validation_date' =>trim($this->input->post('new_arrival_ending_validation_date'))!=""?trim($this->input->post('new_arrival_ending_validation_date')):NULL,
			'new_arrival_created_user_id' =>$created_by_user_id,
			//'new_arrival_edited_user_id' =>$this->input->post('new_arrival_edited_user_id'),
			'new_arrival_created_date_time' =>$created_date_time,
			//'new_arrival_edited_date_time' =>$this->input->post('new_arrival_edited_date_time'),
			//'new_arrival_active' =>$this->input->post('new_arrival_active'),
				);
			
			//Transfering data to Model
			$new_arrival_id=$this->new_arrival_model->new_arrival_insert($query_data);
			if($new_arrival_id>0)
			{
				if($image_details['status']==1)
				{
					$image_info=$image_details['image_data'];
					
					$query_new_arrival_image=array(
					'ref_new_arrival_image_new_arrival_id'=>$new_arrival_id,
					'new_arrival_image_extension'=>$image_info['file_ext'],
					'new_arrival_image_storage_base_path_android'=>NEW_ARRIVAL_ANDROID_BASE_PATH,
					'new_arrival_image_storage_base_path_ios'=>NEW_ARRIVAL_IOS_BASE_PATH,
					'new_arrival_image_name_as_saved'=>$image_info['file_name'],
					'new_arrival_image_is_display_image'=>1,
					);
					
					$new_arrival_image_id=$this->new_arrival_model->new_arrival_image_insert($query_new_arrival_image);
				}
				$this->push_new_arrival_to_android_users($new_arrival_id);
			    $this->push_new_arrival_to_ios_users($new_arrival_id);
				redirect('view_new_arrival/'.$new_arrival_id);
			}
			else
			{
				$data['message'] = $this->lang->line('successfully_not_stored');
				$this->load->vars($data);
				$this->load->view('layout/switchy_main');
			}
			
			
			
			
		}
		
		
	}
		

	public function admin_new_arrival($limit=null)
	{
		$data['content'] = 'new_arrival/all_new_arrival_view';
		$data['title'] = 'New_arrival';

		$per_page=POST_PER_PAGE;
		$limit=$this->uri->segment(3, 1);
		$data['query_result']=$this->new_arrival_model->get_all_new_arrival_list($limit,$per_page);	/* for view all data to admin */
		$total_rows=$this->new_arrival_model->no_of_rows_new_arrival_list();	/* get the total rows from the query */
		$url=base_url()."new_arrival/page/";
		$data['paging']=$this->common_model->custom_pager($url,$per_page,$total_rows);

		$this->load->vars($data);
		$this->load->view('layout/switchy_main');
		$this->load->view('new_arrival/all_new_arrival_view_js');
	}
			
	public function edit_new_arrival($id)
	{
	
		$data['content'] = 'new_arrival/edit_new_arrival_form';
		
		$this->new_arrival_currency_array=$this->new_arrival_model->get_currency();
		
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('new_arrival_product_name_title', "", 'trim|xss_clean|required');
		$this->form_validation->set_rules('new_arrival_product_description', "", 'trim|xss_clean|required');
		$this->form_validation->set_rules('new_arrival_product_is_in_stock', "", 'trim|xss_clean|required');
		
		
		
		
		$data['new_arrival']=$this->new_arrival_model->get_new_arrival_by_id($id);
			
		
		if ($this->form_validation->run() == FALSE && $id!=$this->input->post('hidden_new_arrival_id')) 
		{
		
			$this->load->vars($data);
			$this->load->view('layout/switchy_main');
			$this->load->view('new_arrival/edit_new_arrival_form_js');
		} 
		else 
		{
			
			$created_by_user_id= $this->common_model->get_login_user_id();
		    $created_date_time = date("Y-m-d H:i:s");
		    $edited_date_time  = date("Y-m-d H:i:s");
			
			$image_details=$this->save_image();
			
		$query_data=array(
			'new_arrival_product_name_title' =>$this->input->post('new_arrival_product_name_title'),
			'new_arrival_product_description' =>$this->input->post('new_arrival_product_description'),
			'new_arrival_product_is_in_stock' =>$this->input->post('new_arrival_product_is_in_stock')==1?1:0,
			'new_arrival_product_is_upcoming' =>$this->input->post('new_arrival_product_is_in_stock')==2?1:0,
			'new_arrival_product_price' =>$this->input->post('new_arrival_product_price')==1?trim($this->input->post('fixed_price')):0,
			'new_arrival_product_price_has_range' =>$this->input->post('new_arrival_product_price')==2?1:0,
			'new_arrival_product_price_starting_range' =>$this->input->post('new_arrival_product_price')==2?trim($this->input->post('price_starting_from')):0,
			'new_arrival_product_price_ending_range' =>$this->input->post('new_arrival_product_price')==2?trim($this->input->post('price_starting_to')):0,
			'new_arrival_ref_currency_id' =>$this->input->post('new_arrival_ref_currency_id'),
			//'new_arrival_is_only_image' =>$this->input->post('new_arrival_is_only_image'),
			'new_arrival_has_image' =>$image_details['status'],
			'new_arrival_any_validation_date' =>trim($this->input->post('new_arrival_ending_validation_date'))!=""?1:0,
			'new_arrival_ending_validation_date' =>trim($this->input->post('new_arrival_ending_validation_date'))!=""?trim($this->input->post('new_arrival_ending_validation_date')):NULL,
			'new_arrival_created_user_id' =>$created_by_user_id,
			//'new_arrival_edited_user_id' =>$this->input->post('new_arrival_edited_user_id'),
			'new_arrival_created_date_time' =>$created_date_time,
			//'new_arrival_edited_date_time' =>$this->input->post('new_arrival_edited_date_time'),
			//'new_arrival_active' =>$this->input->post('new_arrival_active'),
				);
			
			//Transfering data to Model
			$new_arrival_id=$this->new_arrival_model->new_arrival_update($query_data,$id);
			if($new_arrival_id>0)
			{
				if($image_details['status']==1)
				{
					$image_info=$image_details['image_data'];
					
					$query_new_arrival_image=array(
					'ref_new_arrival_image_new_arrival_id'=>$new_arrival_id,
					'new_arrival_image_extension'=>$image_info['file_ext'],
					'new_arrival_image_storage_base_path_android'=>NEW_ARRIVAL_ANDROID_BASE_PATH,
					'new_arrival_image_storage_base_path_ios'=>NEW_ARRIVAL_IOS_BASE_PATH,
					'new_arrival_image_name_as_saved'=>$image_info['file_name'],
					'new_arrival_image_is_display_image'=>1,
					);
					
					$new_arrival_image_id=$this->new_arrival_model->new_arrival_image_update($query_new_arrival_image,$id);
				}
				$this->push_new_arrival_to_android_users($new_arrival_id);
				$this->push_new_arrival_to_ios_users($new_arrival_id);
				redirect('view_new_arrival/'.$new_arrival_id);
			}
			else
			{
				$data['message'] = $this->lang->line('successfully_not_stored');
				$this->load->vars($data);
				$this->load->view('layout/switchy_main');
				$this->load->view('new_arrival/edit_new_arrival_form_js');
			}
			
			
		
			
			
		}
		
	}
	
	public function view_new_arrival($id)
	{
	
		$data['content'] = 'new_arrival/single_new_arrival_view';
		
		$data['new_arrival'] = $this->new_arrival_model->get_new_arrival_by_id($id);
		$this->load->vars($data);
		$this->load->view('layout/switchy_main');
	}
	
	public function delete_new_arrival($id)
	{
		$result=$this->new_arrival_model->delete_new_arrival_by_id($id);
		
		if($result==1)
		{
			$this->push_delete_new_arrival_to_android_users($id);
			$this->push_delete_new_arrival_to_ios_users($id);
		}
		redirect(site_url('new_arrival'));
			
	}
	
	public function change_status($id,$status,$url)
	{
	$status=$status==0?1:0;	
	$data = array(
			'new_arrival_active' => $status,
			);
	$this->new_arrival_model->status_update($id,$data);
	$status=$status==0?"Inactive":"Active";
	$msg = "Id #$id is now $status";
	$this->session->set_flashdata('msg', $msg);
	redirect($url);
	}	
 

  
  public function save_image()
	{
		
		$return_array=array();
		
		
		$config =  array(
                  'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"]).'/all_images/image_new/original_image/',
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
					
					
					$target_fileName_with_folder="all_images/image_new/original_image/".$data['file_name'];
					$rename_fileName=$data['file_name'];
					$this->resize_image($target_fileName_with_folder,$rename_fileName );
				}
				else
				{
							$errors = $this->upload->display_errors();
							$return_array['status']=0;
							
				}
		
		
		return $return_array;
	}
	
	public function resize_image($target_fileName_with_folder,$rename_fileName )
	{
	$path_android="all_images/image_new/android/";
	//$data = getimagesize($target_fileName_with_folder);
	$width = 220;//(int)$data[0];
	$height = 220;//(int)$data[1];
	$xxxhdpi_width=$width;
	$mdpi_width=(int)($xxxhdpi_width/4);
	$ldpi_width=(int)($mdpi_width * .75);
	$hdpi_width=(int)($mdpi_width * 1.5);
	$xhdpi_width=(int)($mdpi_width * 2);
	$xxhdpi_width=(int)($mdpi_width * 3);
	
	$xxxhdpi_height=$height;
	$mdpi_height=(int)($xxxhdpi_height/4);
	$ldpi_height=(int)($mdpi_height * .75);
	$hdpi_height=(int)($mdpi_height * 1.5);
	$xhdpi_height=(int)($mdpi_height * 2);
	$xxhdpi_height=(int)($mdpi_height * 3);
	

	$this->resizeImgByDevice($target_fileName_with_folder,$path_android.'ldpi/'.$rename_fileName,$ldpi_width,$ldpi_height);
	$this->resizeImgByDevice($target_fileName_with_folder,$path_android.'mdpi/'.$rename_fileName,$mdpi_width,$mdpi_height);
	$this->resizeImgByDevice($target_fileName_with_folder,$path_android.'hdpi/'.$rename_fileName,$hdpi_width,$hdpi_height);
	$this->resizeImgByDevice($target_fileName_with_folder,$path_android.'xhdpi/'.$rename_fileName,$xhdpi_width,$xhdpi_height);
	$this->resizeImgByDevice($target_fileName_with_folder,$path_android.'xxhdpi/'.$rename_fileName,$xxhdpi_width,$xxhdpi_height);
	$this->resizeImgByDevice($target_fileName_with_folder,$path_android.'xxxhdpi/'.$rename_fileName,$xxxhdpi_width,$xxxhdpi_height);
	
	}
	
	
	
   function resizeImgByDevice($source,$target,$width,$height)
   {
   
   //$source_image = base_url().'pic2.jpg';
   $source_image = $source;
   $config['image_library'] = 'gd2';
   $config['source_image']  = $source_image;
   $config['new_image'] = $target;
   $config['maintain_ratio'] = true;
   $config['width']  = $width;
   $config['height']  = $height;
   
  
   $this->image_lib->clear();
   $this->image_lib->initialize($config);
   $this->image_lib->resize();
   }
	
	
	/*
	FUNCTION NAME : push_new_arrival_to_android_users($id)
	it will send push new arrival to all android users.*/
	public function push_new_arrival_to_android_users($id)
	{
		
		$push_notification=$this->common_model->get_android_ios_push_information();
		
		$new_details=$this->new_arrival_model->get_new_arrival_with_image_by_id($id);
		   
		$new_details['push_type']=PUSH_NEW_ARRIVAL_TYPE;
		$new_details['push_operation']=PUSH_OPERATION_NEW;
		  
		   
		   //print_r($events_details);
		
		// Message to be sent
			$gcm_api_key=trim($push_notification['push_information_android_gcm_api_key']);
			
			//Get All GCM Registration_ID
			$gcm_reg_ids=$this->common_model->get_all_gcm_device_registration_ids();
			//echo "<br/>";
		    $it =  new RecursiveIteratorIterator(new RecursiveArrayIterator($gcm_reg_ids));
		    $l = iterator_to_array($it, false);
		    //var_dump($l); // one Dimensional 
		
		// Set POST variables
		   $url = trim($push_notification['push_information_android_server_url']);
		   $fields = array(
                'registration_ids'  => $l,
                'data'              => $new_details,
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
 
 
   public function push_delete_new_arrival_to_android_users($id)
	{
		$push_notification=$this->common_model->get_android_ios_push_information();
		
		
		$new_details['new_arrival_id']=$id;
		   
		$new_details['push_type']=PUSH_NEW_ARRIVAL_TYPE;
		   
		  
		   
		$new_details['push_operation']=PUSH_OPERATION_DELETE;
		   
		  
		
		// Message to be sent
			$gcm_api_key=trim($push_notification['push_information_android_gcm_api_key']);
			
			//Get All GCM Registration_ID
			$gcm_reg_ids=$this->common_model->get_all_gcm_device_registration_ids();
			//echo "<br/>";
		    $it =  new RecursiveIteratorIterator(new RecursiveArrayIterator($gcm_reg_ids));
		    $l = iterator_to_array($it, false);
		    //var_dump($l); // one Dimensional 
		
		// Set POST variables
		   $url = trim($push_notification['push_information_android_server_url']);
		   $fields = array(
                'registration_ids'  => $l,
                'data'              => $new_details,
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
	
	public function  push_new_arrival_to_ios_users($id)
	{
	  $push_notification=$this->common_model->get_android_ios_push_information();
	  
	  $deviceToken_array=$this->common_model->get_all_ios_device_registration_ids();
      
      $passphrase = trim($push_notification['push_information_ios_passphrase']);
      // Put your alert message here:
		   
	   $new_details=$this->new_arrival_model->get_new_arrival_with_image_by_id($id);
	
	   $new_details['alert']=$this->lang->line('new_arrival_push_title');   
	   $new_details['push_type']=PUSH_NEW_ARRIVAL_TYPE;
	   $new_details['push_operation']=PUSH_OPERATION_NEW;
	   $new_details['sound']='default';
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
/*
     if (!$fp)
	 {
		 exit("Failed to connect: $err $errstr" . PHP_EOL);
	 }
	 else
	 {
		 echo 'Connected to APNS' . PHP_EOL;
	 }
	 
*/
     

     // Create the payload body
     $body['aps'] =  $new_details;
     
     

    // Encode the payload as JSON
    $payload = json_encode($body);

    foreach($deviceToken_array as $deviceToken)
    {
       // Build the binary notification
	   $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken['ios_device_token']) . pack('n', strlen($payload)) . $payload;

      //$msg = chr(0) . pack('n', 32) . pack('H*', '35f53ebe9570f3b821b2ce45108475d41ac380a5aa261cc0912ddfca90dc3ec5') . pack('n', strlen($payload)) . $payload;
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
	
	
	public function  push_delete_new_arrival_to_ios_users($id)
	{
	  $push_notification=$this->common_model->get_android_ios_push_information();
	  
	  $deviceToken_array=$this->common_model->get_all_ios_device_registration_ids();
      
      $passphrase = trim($push_notification['push_information_ios_passphrase']);
      // Put your alert message here:
		   
	   
	   $new_details['new_arrival_id']=$id;
	   $new_details['push_type']=PUSH_NEW_ARRIVAL_TYPE;
	   $new_details['push_operation']=PUSH_OPERATION_DELETE;
	   $new_details['sound']='';
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
/*
     if (!$fp)
	 {
		 exit("Failed to connect: $err $errstr" . PHP_EOL);
	 }
	 else
	 {
		 echo 'Connected to APNS' . PHP_EOL;
	 }
	 
*/
     

     // Create the payload body
     $body['aps'] =  $new_details;
     
     

    // Encode the payload as JSON
    $payload = json_encode($body);

    foreach($deviceToken_array as $deviceToken)
    {
       // Build the binary notification
	   $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken['ios_device_token']) . pack('n', strlen($payload)) . $payload;

      //$msg = chr(0) . pack('n', 32) . pack('H*', '35f53ebe9570f3b821b2ce45108475d41ac380a5aa261cc0912ddfca90dc3ec5') . pack('n', strlen($payload)) . $payload;
      // Send it to the server
      $result = fwrite($fp, $msg, strlen($msg));
      
	  if (!$result)
	  {
	    echo 'Message not delivered' . PHP_EOL;
	  }
      else
	  {
	  
	    echo 'Message successfully delivered' . PHP_EOL;
	  }
	  

    }
    
    // Close the connection to the server
    fclose($fp);
	}
	

	
}
	
	

	
	
	