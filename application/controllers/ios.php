<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('ios_model');
	}
	
	
	
	
	
	
	
	
	public function store_ios_device_id_tokens()
	{
		$device_unique_id=$_REQUEST['device_unique_id'];
		$device_push_token=$_REQUEST['device_push_token'];
		
	//	$device_unique_id="ttttttttttt";
		//$device_push_token="12121212";
		
	//	$flag['device_unique_id']=$device_unique_id;
	//	$flag['device_push_token']=$device_push_token;
		
		$flag=0;
		
		$flag=$this->ios_model->store_ios_device_id_token_into_database($device_unique_id,$device_push_token);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($flag));
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function store_ios_device_id()
	{
		$device_id=$_REQUEST['device_id'];
		
		$flag['appUserID']=0;
		
		$flag['appUserID']=$this->ios_model->store_ios_device_id_into_database($device_id);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($flag));
	
	}
	
	public function store_ios_device_token($app_user_id=0)
	{
		$flag['code']=0;//Means not inserted...1means inserted
	    if($this->input->post('theToken') && $app_user_id!=0)
	    {
	       $device_token_id=$this->input->post('theToken');
	       $flag['code']=$this->ios_model->store_ios_device_token($app_user_id,$device_token_id);
	    }
	    else
	    {
	          $flag['code']=-1;//Not getting device id through post method
	    }
	
	
		 header('Access-Control-Allow-Origin: *');
         header("Content-Type: application/json");
		print(json_encode($flag));
	}
	
	public function ios_user_is_registered_by_app_user_id($app_user_id=0)
	{
		$flag['userRegistrationStatus']=0;
		/*0 means not registered
		 *1 means already registerd
		 *-1 means app_user_id is not perfect
		 */
		
		if($app_user_id>0)
		{
			if($this->ios_model->check_app_user_id_is_exist($app_user_id)==1)
			{
				$flag['userRegistrationStatus']=$this->ios_model->check_user_is_registered($app_user_id);
			}
			else
			{
				$flag['userRegistrationStatus']=-1;
			}
		}
		else
		{
			$flag['userRegistrationStatus']=-1;
		}
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($flag));
	}
	
	/*
	FUNCTION NAME : get_app_user_details_by_app_user_id($app_user_id=0)
	It will return app user details
	*/
	public function get_app_user_details_by_app_user_id($app_user_id=0)
	{
		$flag=$this->android_model->get_app_user_details_information_by_app_user_id($app_user_id);
		
			
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($flag));
	}
	
	
	/*
	FUNCTION NAME :set_app_user_registration_data_by_app_user_id($app_user_id=0)
	it will save data into app_user_details table
	if sucessfully stored then it will return 1
	otherwise it will return 0
	*/
	public function ios_set_app_user_registration_data_by_app_user_id($app_user_id=0)
	{
		if($app_user_id==0 || $_REQUEST['ref_app_user_details_app_user_id']==0 || $_REQUEST['ref_app_user_details_app_user_id']!=$app_user_id)
		{
			$flag['status']=0;
		}
		else
		{
			//Save data into database
			$flag['status']=$this->ios_model->save_app_user_registration_data_into_database();
		}
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($flag));
	}
	
	/*
	FUNCTION NAME : get_app_foooter_details()
	It will return footer details information
	*/
	
	public function get_app_foooter_details()
	{
		$flag=$this->android_model->get_footer_details();
		
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($flag));
	}
	
	/*
	FUNCTION NAME :get_head_or_main_branch_details()
	It will return json value for Main shop like time table,address,customer care details
	*/
	public function get_head_or_main_branch_details()
	{
		$branch_info=$this->android_model->get_head_branch_details();
		
		$flag=$branch_info['rows'];
		//This statement will be always after $flag=$branch_info['rows']; 
		$flag['total_rows']=$branch_info['total_rows'];
		
		//This if condition is not important but for making over sure ,Nothing else

		if (!array_key_exists('total_rows', $flag)) 
		{
			$flag['total_rows']=$branch_info['total_rows'];
		}
    
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($flag));
	}
	
	/*
	FUNCTION NAME : ios_get_normal_messages($startingLimit=0)
	It will return json message data which messages are normal type*/
	public function ios_get_normal_messages($startingLimit=0)
	{
		$data= $this->ios_model->get_normal_message_by_limit($startingLimit);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($data));
	}
	
	/*
	FUNCTION NAME : get_get_personal_messages($app_user_id=0,$startingLimit=0)
	It will return json message data which messages are personal messages for this appuser and fullfill group condition*/
	public function ios_get_personal_messages($app_user_id=0,$startingLimit=0)
	{
		
		
		$data= $this->ios_model->get_personal_msg_with_group_condition($app_user_id,$startingLimit);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($data));
	}
	
	/*
	FUNCTION NAME : ios_get_chat_messages($app_user_id=0,$startingLimit=0)
	It will return json json chat messages values
	*/

	public function ios_get_chat_messages($app_user_id=0,$startingLimit=0)
	{
		
		
		$data= $this->ios_model->get_chat_messages($app_user_id,$startingLimit);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($data));
	}
	/*
	FUNCTION NAME: function ios_save_app_user_chat_message()
	it will save chat message values into database against of app user id.
	And it will return a json array value which is already saved*/
	public function ios_save_app_user_chat_message()
	{
		
		$data= $this->ios_model->insert_chat_messages_for_app_user(); 
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($data));
	}
	
	/*
	FUNCTION NAME : function get_new_arrival_product_list()
	it will return all new arrival details list with display image
	*/
	public function get_new_arrival_product_list($startingLimit=0)
	{
		$data= $this->android_model->get_new_arrival_product_list_from_db($startingLimit);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($data));
	}
	
	/*
	FUNCTION NAME : get_normal_offer($startingLimit=0)
	It will return json normal offer data which offers types are normal */
	public function get_normal_offer($startingLimit=0)
	{
		$data= $this->android_model->get_normal_offer_list_from_db($startingLimit);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($data));
	}
	
	/*
	FUNCTION NAME : get_personal_offer($app_user_id=0,$startingLimit=0)
	It will return json offer data which offers are personal offers for this appuser and fullfill group condition*/
	public function get_personal_offer($app_user_id=0,$startingLimit=0)
	{
		
		
		$data= $this->android_model->get_group_personal_offer_list_from_db_with_group_condition($app_user_id,$startingLimit);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($data));
	}
	
	
	public function get_ongoing_events($startingLimit=0)
	{
		$data= $this->android_model->get_all_ongoing_event_list($startingLimit);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($data));
	}
	
	public function get_upcoming_events($startingLimit=0)
	{
		$data= $this->android_model->get_all_upcoming_event_list($startingLimit);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($data));
	}
	
		/*
	FUNCTION NAME :get_image_from_gallery() 
	it will return all active image from image gallery
	*/
	public function get_image_from_gallery()
	{
	   $offset = $this->uri->segment(3, 0);
       $limit  = $this->uri->segment(4, 0);
         
 
		$images=$this->android_model->get_all_images_from_gallery($limit, $offset);	
		
		$imageJson=json_encode($images);
	    $imageJson=str_replace("\/","/",$imageJson);

		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		
		print($imageJson);
	}
	
	
	
	
    /*
	FUNCTION NAME :get_incoming_event() 
	it will return all incoming event from event table
	*/
	public function get_ongoing_event()
	{
	   
		$incoming_event=$this->android_model->get_ongoing_event_model();	
		
		$incoming_event_json=json_encode($incoming_event);
	    $incoming_event_json=str_replace("\/","/",$incoming_event_json);

		 
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		
		print($incoming_event_json);
	}
	
    /*
	FUNCTION NAME :get_ongoing_event() 
	it will return all  ongoing event from event table
	*/
	public function get_upcoming_event()
	{
	   
		$ongoing_event=$this->android_model->get_upcoming_event_model();	
		
		$ongoing_event_json=json_encode($ongoing_event);
	    $ongoing_event_json=str_replace("\/","/",$ongoing_event_json);

		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		
		print($ongoing_event_json);
	}
	
	
}