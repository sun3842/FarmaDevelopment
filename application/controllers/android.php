<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Android extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('android_model');
	}
	
	
	
	public function store_android_device_id_tokens()
	{
		$device_unique_id=$_REQUEST['device_unique_id'];
		$device_push_token=$_REQUEST['device_push_token'];
		
		$flag=0;
		
		$flag=$this->android_model->store_android_device_id_token_into_database($device_unique_id,$device_push_token);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($flag));
	
	}
	
	public function store_android_device_id()
	{
		$device_id=$_REQUEST['device_id'];
		
		$flag['code']=0;
		
		$flag['code']=$this->android_model->store_android_device_id_into_database($device_id);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($flag));
	
	}
	
	public function user_is_registered_by_app_user_id($app_user_id=0)
	{
		$flag['code']=0;
		/*0 means not registere
		 *1 means already registerd
		 *-1 means app_user_id is not perfect
		 */
		
		if($app_user_id>0)
		{
			if($this->android_model->check_app_user_id_is_exist($app_user_id)==1)
			{
				$flag['code']=$this->android_model->check_user_is_registered($app_user_id);
			}
			else
			{
				$flag['code']=-1;
			}
		}
		else
		{
			$flag['code']=-1;
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
	public function set_app_user_registration_data_by_app_user_id($app_user_id=0)
	{
		if($app_user_id==0 || $_REQUEST['ref_app_user_details_app_user_id']==0 || $_REQUEST['ref_app_user_details_app_user_id']!=$app_user_id)
		{
			$flag['code']=0;
		}
		else
		{
			//Save data into database
			$flag['code']=$this->android_model->save_app_user_registration_data_into_database();
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
	FUNCTION NAME : get_normal_messages($startingLimit=0)
	It will return json message data which messages are normal type*/
	public function get_normal_messages($startingLimit=0)
	{
		$data= $this->android_model->get_normal_message_by_limit($startingLimit);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($data));
	}
	
	/*
	FUNCTION NAME : get_get_personal_messages($app_user_id=0,$startingLimit=0)
	It will return json message data which messages are personal messages for this appuser and fullfill group condition*/
	public function get_personal_messages($app_user_id=0,$startingLimit=0)
	{
		
		
		$data= $this->android_model->get_personal_msg_with_group_condition($app_user_id,$startingLimit);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($data));
	}
	
	/*
	FUNCTION NAME : get_chat_messages($app_user_id=0,$startingLimit=0)
	It will return json json chat messages values
	*/

	public function get_chat_messages($app_user_id=0,$startingLimit=0)
	{
		
		
		$data= $this->android_model->get_chat_messages($app_user_id,$startingLimit);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($data));
	}
	/*
	FUNCTION NAME: function save_app_user_chat_message()
	it will save chat message values into database against of app user id.
	And it will return a json array value which is already saved*/
	public function save_app_user_chat_message()
	{
		
		$data= $this->android_model->insert_chat_messages_for_app_user();
		
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
	
	public function get_image_gallery($startingLimit=0)
	{
		$data= $this->android_model->gat_all_images_with_album_name($startingLimit);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($data));
	}
	
	/*
	FUNCTION NAME : get_all_feedbacks($startingLimit=0)
	it will returns general feedbacks of all users which is public mode.*/
	public function get_all_feedbacks($startingLimit=0)
	{
		$data= $this->android_model->get_all_public_feedbacks($startingLimit);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($data));
	}
	
	/*
	FUNCTION NAME : get_personal_feedbacks($app_user_id=0,$startingLimit=0)
	it will returns personal feedbacks for users.*/
	public function get_personal_feedbacks($app_user_id=0,$startingLimit=0)
	{
		$data= $this->android_model->get_all_personal_feedbacks($app_user_id,$startingLimit);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($data));
	}
	
	/*
	FUNCTION NAME : get_personal_all_feedbacks($app_user_id=0,$startingLimit=0)
	it will returns personal feedbacks for users.*/
	public function get_personal_all_feedbacks($app_user_id=0,$startingLimit=0)
	{
		$data= $this->android_model->get_all_personal_feedbacks_without_limit($app_user_id);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($data));
	}
	
	/*
	FUNCTION NAME: save_app_user_feedback()
	it will save feedback values into database against of app user id.
	And it will return a json array value which is already saved*/
	public function save_app_user_feedback()
	{
		
		$data= $this->android_model->insert_feedback_details_for_app_user();
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($data));
	}
	/*
	FUNCTION NAME: update_app_user_feedback()
	it will save feedback values into database against of app user id.
	And it will return a json array value which is already saved*/
	public function update_app_user_feedback()
	{
		
		$data= $this->android_model->update_feedback_details_for_app_user();
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($data));
	}
	/*
	FUNCTION NAME: save_app_user_feedback_replying_msg()
	it will save feedback replying values into database against of app user id.
	And it will return a json array value which is already saved*/
	public function save_app_user_feedback_replying_msg()
	{
		
		$data= $this->android_model->insert_feedback_replying_details_for_app_user();
		
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
	
	
	public function show_map_webview()
	{
		$data['branch_info']=$this->android_model->get_map_info();
		
		$this->load->view("web_view/map_page",$data);
	}
	
	
	
	
	public function all_offer_deleting_id()
	{
		
		$data= $this->android_model->get_all_offer_deleting_id();
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($data));
	}
	
	public function all_new_arrival_deleting_id()
	{
		
		$data= $this->android_model->get_all_new_arrival_deleting_id();
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($data));
	}
	
	public function all_events_deleting_id()
	{
		
		$data= $this->android_model->get_all_events_deleting_id();
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($data));
	}
	
	public function all_image_album_deleting_id()
	{
		
		$data= $this->android_model->get_all_image_album_deleting_id();
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($data));
	}
	
	
	public function all_image_deleting_id()
	{
		
		$data= $this->android_model->get_all_image_deleting_id();
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($data));
	}
	
	public function all_message_deleting_id()
	{
		
		$data= $this->android_model->get_all_message_deleting_id();
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($data));
	}
	
	public function all_table_deleting_id()
	{
		
		$data= $this->android_model->get_all_table_deleting_id();
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($data));
	}
	
	
	
}