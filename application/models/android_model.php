<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : ANWAR HOSSAIN
EMAIL ADDRESS: anwar.hossain.suman@gmail.com
*/

class Android_Model extends CI_Model
{
	
	
	public function __construct()
	{
	
		$this->load->database(); 
	}
	
	
	
	public function store_android_device_id_token_into_database($device_unique_id,$device_push_token)
	{
		
		$this->db->trans_start(); 
		
		$return_app_user_id=0;
		$return_array=array();
		
		//Step 1:This ID is already stored into db or not
		
		$query=$this->db->get_where('app_user',array('app_user_device_unique_id'=>$device_unique_id,'ref_app_user_device_type_id'=>ANDROID_DEVICE_TYPE_ID));
		
		if($query->num_rows()==0)
		{
			//That means ->this device id is not stored into database
			
			//Insert device id into database
			
			$data_app_user=array('ref_app_user_device_type_id'=>ANDROID_DEVICE_TYPE_ID,
			'app_user_device_unique_id'=>$device_unique_id);
			
			$this->db->insert('app_user',$data_app_user);
			$return_app_user_id=$this->db->insert_id();
			
			
			
			
		}
		else if($query->num_rows()==1)
		{
			/*That means ->It is already stored into device*/
			
			/*****
			If it not active then we will change active value.
			We will do it later.
			*****/
			
			//Return app_user_id
			
			$row=$query->row_array();
			$return_app_user_id=$row['app_user_id'];
			
			
			
		}
		else
		{
			//There is some problem
			//It means device id is duplicated ,then delete all rows and insert again
			/***
			WE will do it later.
			******/
			
			$return_app_user_id=0;
		}
		
		if($return_app_user_id>0)
		{
			//Insert Device Push Token
			$query_app_user_android=$this->db->get_where('app_user_android',array("ref_app_user_android_app_user_id"=>$return_app_user_id));
			
			if($query_app_user_android->num_rows()==0)
			{
				//Insert Push Token ID
				
				$data_app_user_android=array('ref_app_user_android_app_user_id'=>$return_app_user_id,'android_device_push_token'=>$device_push_token=="123"?NULL:$device_push_token);
				$this->db->insert('app_user_android',$data_app_user_android);
			
				
			}
			else
			{
				//Update
				$data_app_user_android=array('ref_app_user_android_app_user_id'=>$return_app_user_id,'android_device_push_token'=>$device_push_token=="123"?NULL:$device_push_token);
				$where_app_user_android="ref_app_user_android_app_user_id =$return_app_user_id";
			    $str_app_user_android = $this->db->update_string('app_user_android', $data_app_user_android, $where_app_user_android); 
			    $this->db->query($str_app_user_android);	
			
			}
			
			//Check App_user_pharmacy
			
			$query_app_user_pharmacy=$this->db->get_where('app_user_pharmacy',array('ref_app_user_pharmacy_app_user_id'=>$return_app_user_id));
			
			if($query_app_user_pharmacy->num_rows()==0)
			{
				$data_app_user_pharmacy=array('ref_app_user_pharmacy_app_user_id'=>$return_app_user_id,'ref_app_user_pharmacy_pharmacy_id'=>NULL);
				$this->db->insert('app_user_pharmacy',$data_app_user_pharmacy);
			}
			
				
			//
			$sql="Select * from app_user 
			left join app_user_android ON (app_user_id=ref_app_user_android_app_user_id and app_user_id=$return_app_user_id) 
			left join app_user_pharmacy ON (app_user_id=ref_app_user_pharmacy_app_user_id and app_user_id=$return_app_user_id)
			WHERE app_user_active=1 and app_user_id=$return_app_user_id";
			
			$query_final=$this->db->query($sql);
			$return_array=$query_final->row_array();
		}
		
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)//It will work when $db['default']['db_debug'] = FALSE;if you want to see db error then put true from Config/database.php $db['default']['db_debug'] = TRUE;
		{ 
			return 0;
		}
		else
		{
			return $return_array;
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	///////////////////////OLD CODE
	public function store_android_device_id_into_database($device_id)
	{
		
		$this->db->trans_start(); 
		
		$return_app_user_id=0;
		
		//Step 1:This ID is already stored into db or not
		
		$query=$this->db->get_where('app_user',array('app_user_device_id'=>$device_id,'ref_app_user_device_type_id'=>ANDROID_DEVICE_TYPE_ID));
		if($query->num_rows()==0)
		{
			//That means ->this device id is not stored into database
			
			//Insert device id into database
			
			$data_app_user=array('ref_app_user_device_type_id'=>ANDROID_DEVICE_TYPE_ID,
			'app_user_device_id'=>$device_id,
			'app_user_installing_location_has_value'=>0);
			
			$this->db->insert('app_user',$data_app_user);
			$return_app_user_id=$this->db->insert_id();
			
			
			
			
		}
		else if($query->num_rows()==1)
		{
			/*That means ->It is already stored into device*/
			
			/*****
			If it not active then we will change active value.
			We will do it later.
			*****/
			
			//Return app_user_id
			
			$row=$query->row_array();
			$return_app_user_id=$row['app_user_id'];
			
			
			
		}
		else
		{
			//There is some problem
			//It means device id is duplicated ,then delete all rows and insert again
			/***
			WE will do it later.
			******/
			
			$return_app_user_id=0;
		}
		
		
		
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)//It will work when $db['default']['db_debug'] = FALSE;if you want to see db error then put true from Config/database.php $db['default']['db_debug'] = TRUE;
		{ 
			return 0;
		}
		else
		{
			return $return_app_user_id;
		}
	}
	
	/*
	FUNCTION NAME : check_user_is_registered($app_user_id)
	it will check app_user_id is registered by user information or not.
	If not then return 0;
	If yes then return 1;
	*/
	
	public function check_user_is_registered($app_user_id)
	{
		$query=$this->db->get_where('app_user_details',array('ref_app_user_details_app_user_id'=>$app_user_id));
		
		if($query->num_rows()==1)
		{
			//It is already registered
			return 1;
		}
		else
		{
			//It is not registered
			return 0;
		}
		
		return 0;//unexpected;Never happend
	}
	
	/*
	FUNCTION NAME :check_app_user_id_is_exist($app_user_id)
	it will check app user id .
	if it is not exist then it will send 0;
	Other wise it will send 1.*/
	public function check_app_user_id_is_exist($app_user_id)
	{
		$query=$this->db->get_where('app_user',array('app_user_id'=>$app_user_id));
		if($query->num_rows()==1)
		{
			return 1;//Means app user id is exist
		}
		else
		{
			return 0;//Means not exist
		}
		
		return 0;//unexpected;Never happend
	
	}
	
	/*
	FUNCTION NAME : get_app_user_details_information_by_app_user_id($app_user_id)
	it will return app user details using app user id
	*/
	public function get_app_user_details_information_by_app_user_id($app_user_id)
	{
		$query=$this->db->get_where('app_user_details',array('ref_app_user_details_app_user_id'=>$app_user_id));
		
		$return_array=array();
		$return_array['total_rows']=$query->num_rows();
		
		if($query->num_rows()==1)
		{
			$row=$query->row_array();
			
			$return_array['ref_app_user_details_app_user_id']=$row['ref_app_user_details_app_user_id'];
			$return_array['app_user_first_name']=$row['app_user_first_name']==NULL ? "":$row['app_user_first_name'];
			$return_array['app_user_last_name']=$row['app_user_last_name']==NULL ? "": $row['app_user_last_name'];
			$return_array['app_user_birth_date']=$row['app_user_birth_date']==NULL ?"":date('d-m-Y', strtotime($row['app_user_birth_date']));
			$return_array['app_user_sex']=$row['app_user_sex'];
			$return_array['app_user_address']=$row['app_user_address']==NULL ? "": $row['app_user_address'];
			$return_array['app_user_city']=$row['app_user_city']==NULL ? "": $row['app_user_city'];
			$return_array['app_user_post_code']=$row['app_user_post_code']==NULL ? "": $row['app_user_post_code'];
			$return_array['app_user_country']=$row['app_user_country']==NULL ? "": $row['app_user_country'];
			$return_array['app_user_email']=$row['app_user_email']==NULL ? "": $row['app_user_email'];
			$return_array['app_user_cell_phone']=$row['app_user_cell_phone']==NULL ? "": $row['app_user_cell_phone'];
		}
		
		return $return_array;
		
	}
	
	
	public function save_app_user_registration_data_into_database()
	{
		$this->db->trans_start(); 
		
		$data_app_user_details=array(
		'ref_app_user_details_app_user_id'=>$_REQUEST['ref_app_user_details_app_user_id'],
		'app_user_first_name'=>$_REQUEST['app_user_first_name'],
		'app_user_last_name'=>$_REQUEST['app_user_last_name'],
		'app_user_birth_date'=>date('Y-m-d', strtotime($_REQUEST['app_user_birth_date'])),
		'app_user_sex'=>$_REQUEST['app_user_sex'],
		'app_user_post_code'=>$_REQUEST['app_user_post_code'],
		'app_user_email'=>$_REQUEST['app_user_email'],
		'app_user_address'=>$_REQUEST['app_user_address'],
		'app_user_city'=>$_REQUEST['app_user_city'],
		'app_user_country'=>$_REQUEST['app_user_country'],
		'app_user_cell_phone'=>$_REQUEST['app_user_cell_phone']);
		
		//Step 1: we will check this user is already registered or not
		//If yes then update information
		//If not then insert
		
		$query=$this->db->get_where('app_user_details',array('ref_app_user_details_app_user_id'=>$_REQUEST['ref_app_user_details_app_user_id']));
		
		if($query->num_rows()==0)
		{
		    $this->db->insert('app_user_details',$data_app_user_details);
		}
		else
		{
			//Update table
			
			$where_app_user_details="ref_app_user_details_app_user_id =".$_REQUEST['ref_app_user_details_app_user_id'];
			$str_app_user_details = $this->db->update_string('app_user_details', $data_app_user_details, $where_app_user_details); 
			$this->db->query($str_app_user_details);	
			
		}
		
		
		
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)//It will work when $db['default']['db_debug'] = FALSE;if you want to see db error then put true from Config/database.php $db['default']['db_debug'] = TRUE;
		{ 
			return 0;
		}
		else
		{
			return 1;
		}
	}
	
	/*
	FUNCTION NAME . get_footer_details()
	it will return main branch details for using as footer into mobile application
	*/
	public function get_footer_details()
	{
		$return_array=array();
		$sql="select * from branch 
		where is_main_branch=1 
		AND branch_edited_date_time=(select max(branch_edited_date_time) from branch where is_main_branch=1)";
		
		$query=$this->db->query($sql);
		
		$return_array['total_rows']=$query->num_rows();
		if($query->num_rows()==1)
		{
			$row=$query->row_array();
			$return_array['branch_id']=$row['branch_id'];
			$return_array['branch_name']=$row['branch_name'];
			$return_array['branch_full_address']=$row['branch_full_address'];
			$return_array['branch_web_site_link']=$row['branch_web_site_link'];
		}

		
		return $return_array;
		
	}
	/*
	FUNCTION NAME : get_head_branch_details()
	it will return all information for head branch or main branch.
	 if there are so many branches,yhen we will return last edited or inserted main branch.	
	*/
	public function get_head_branch_details()
	{
		$return_array=array();
		
		/*Here we can write a simple query for getting main branch details,
		but we did a simply complex query cause we don't want to take any risk if there are rows more than one main branch.
		It will be never happend,Because we will put a filtering for admin panel.
		But we don't want to take any risk.maybe i am wrong.In Final version, we will look after this.*/
		$sql="SELECT * FROM branch 
		LEFT JOIN branch_customer_care ON (branch.branch_id=branch_customer_care.ref_branch_customer_care_branch_id) 
		LEFT JOIN branch_timetable ON (branch.branch_id=branch_timetable.ref_branch_timetable_branch_id) 
		WHERE branch.is_main_branch=1 
		AND branch.branch_id =(select branch_id from branch where is_main_branch=1 AND branch_edited_date_time=(select max(branch_edited_date_time) from branch where is_main_branch=1))";
		
		$query=$this->db->query($sql);
		
		
		$return_array['total_rows']=$query->num_rows();
		$return_array['rows']=$query->row_array();
		
		return $return_array;
	}
	
	
	
	/*
	FUNCTION NAME : get_normal_message_by_limit($startingLimit)
	it will retrive normal message using limit.
	*/
	public function get_normal_message_by_limit($startingLimit)
	{
		$sql="SELECT * FROM message where ref_message_message_type_id=".MSG_TYPE_NORMAL_ID." and message_active=1 order by  message_sending_date_time DESC limit $startingLimit,".MSG_LIMIT;

		$query=$this->db->query($sql);
		return $query->result();
	}
	/*
	FUNCTION NAME :get_personal_msg_with_group_condition()
	it will return all personal messages and also group personal message if condition is full filled for this app user id using app_user id*/
	public function get_personal_msg_with_group_condition($app_user_id,$startingLimit)
	{
		$sql_group_message_or_gate="SELECT * FROM (SELECT group_message_id FROM group_message where is_condition_or_gate=1 AND (
        CASE WHEN is_condition_birth_year=1 then condition_birth_year=(SELECT YEAR(app_user_birth_date) FROM app_user_details WHERE ref_app_user_details_app_user_id=$app_user_id) 
        ELSE FALSE
        END 
        OR
        CASE WHEN is_condition_birth_month=1 then condition_birth_month=(SELECT MONTH(app_user_birth_date) FROM app_user_details WHERE ref_app_user_details_app_user_id=$app_user_id)
        ELSE FALSE
        END 
        OR
        CASE WHEN is_condition_age_range=1 then (SELECT FLOOR(DATEDIFF (CURRENT_DATE, `app_user_birth_date`)/365) AS age FROM app_user_details  WHERE ref_app_user_details_app_user_id=$app_user_id) BETWEEN condition_age_starting_range AND condition_age_ending_range
        ELSE FALSE
        END 
        OR
        CASE WHEN is_condition_sex=1 then condition_sex=(SELECT app_user_sex FROM app_user_details WHERE ref_app_user_details_app_user_id=$app_user_id)
        ELSE FALSE
        END 
        OR
        CASE WHEN is_condition_city=1 then LOWER(condition_city_name) LIKE (SELECT LOWER(app_user_city) FROM app_user_details WHERE ref_app_user_details_app_user_id=$app_user_id)
        ELSE FALSE
        END 
        OR
        CASE WHEN is_condition_post_code=1 then condition_post_code=(SELECT app_user_post_code FROM app_user_details WHERE ref_app_user_details_app_user_id=$app_user_id)
        ELSE FALSE
        END 
        )
        ) as group_message_or_gate ";
		$sql_group_message_and_gate="SELECT group_message_id FROM (SELECT * FROM group_message where is_condition_and_gate=1 AND 
		CASE WHEN is_condition_birth_year=1 then condition_birth_year=(SELECT YEAR(app_user_birth_date) FROM app_user_details WHERE ref_app_user_details_app_user_id=$app_user_id) 
		ELSE TRUE 
		END  
		AND 
		CASE WHEN is_condition_birth_month=1 then condition_birth_month=(SELECT MONTH(app_user_birth_date) FROM app_user_details WHERE ref_app_user_details_app_user_id=$app_user_id) 
		ELSE TRUE 
		END 
		AND 
		CASE WHEN is_condition_age_range=1 then (SELECT FLOOR(DATEDIFF (CURRENT_DATE, `app_user_birth_date`)/365) AS age FROM app_user_details  WHERE ref_app_user_details_app_user_id=$app_user_id) BETWEEN condition_age_starting_range AND condition_age_ending_range 
		ELSE TRUE 
		END 
		AND 
		CASE WHEN is_condition_sex=1 then condition_sex=(SELECT app_user_sex FROM app_user_details WHERE ref_app_user_details_app_user_id=$app_user_id) 
		ELSE TRUE 
		END  
		AND 
		CASE WHEN is_condition_city=1 then LOWER(condition_city_name) LIKE (SELECT LOWER(app_user_city) FROM app_user_details WHERE ref_app_user_details_app_user_id=$app_user_id) 
		ELSE TRUE 
		END  
		AND 
		CASE WHEN is_condition_post_code=1 then condition_post_code=(SELECT app_user_post_code FROM app_user_details WHERE ref_app_user_details_app_user_id=$app_user_id) 
		ELSE TRUE 
		END  
		) as group_message_and_gate";
		
		$sql_final="SELECT * FROM (SELECT * FROM message JOIN  
		(SELECT * FROM group_message where group_message_id in( ".$sql_group_message_or_gate." 
		UNION  ".$sql_group_message_and_gate." 
		)) as group_message_or_and ON (message.message_id=group_message_or_and.ref_group_message_message_id)  
		LEFT JOIN personal_message ON (personal_message_id is NULL) 
		UNION 
		(select * from message 
		JOIN personal_message 
		ON(personal_message.ref_personal_message_message_id=message.message_id AND personal_message.ref_personal_message_app_user_id=$app_user_id) 
		Left Join group_message ON(group_message_id is null)) ) as final_message
		WHERE final_message.message_active=1 order by  final_message.message_sending_date_time DESC limit $startingLimit,".MSG_LIMIT;
		$query=$this->db->query($sql_final);
		return $query->result_array();

	}
	/*
	get_chat_messages($app_user_id,$startingLimit)
	it will return chat messages for this app user from database using limit and app user id
	*/
	public function get_chat_messages($app_user_id,$startingLimit)
	{
		$sql="SELECT * FROM (SELECT * FROM chat WHERE ref_chat_app_user_id=$app_user_id order by chat_id DESC limit $startingLimit,".CHAT_LIMIT.") as new_chat ORDER BY chat_id ASC";
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	
	public function insert_chat_messages_for_app_user()
	{
		$this->db->trans_start(); 
		
		$app_user_id=$_REQUEST['app_user_id'];
		$chat_msg=$_REQUEST['chat_message'];
		
		$return_array=array();
		
		if($this->check_app_user_id_is_exist($app_user_id)==1)
		{
			$data_chat=array(
			'ref_chat_app_user_id'=>$app_user_id,
			'chat_from_app_user'=>1,
			'chat_from_admin'=>0,
			'chat_message'=>$chat_msg);
			$this->db->insert('chat',$data_chat);
			$inserted_chat_id=$this->db->insert_id();
			
			$query=$this->db->get_where('chat',array('chat_id'=>$inserted_chat_id));
			$return_array=$query->row_array();
			$return_array['sucess']=1;
		}
		else
		{
			$return_array['sucess']=0;
		}
		
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)//It will work when $db['default']['db_debug'] = FALSE;if you want to see db error then put true from Config/database.php $db['default']['db_debug'] = TRUE;
		{ 
		    $return_array['sucess']=0;
			return $return_array;
		}
		else
		{
			
			return $return_array;
		}
	}
		
	/*
	FUNCTION NAME : get_new_arrival_product_list_from_db($startingLimit)
	it will return new arrival product list
	*/
	public function get_new_arrival_product_list_from_db($startingLimit)
	{
		$sql="SELECT * FROM new_arrival 
		LEFT JOIN new_arrival_image ON (new_arrival_id=ref_new_arrival_image_new_arrival_id AND new_arrival_image_is_display_image=1 AND new_arrival_image_active=1 )
		LEFT JOIN currency ON (new_arrival_ref_currency_id=currency_id AND currency_active=1) 
		WHERE 
		CASE 
		WHEN new_arrival_ending_validation_date IS NOT NULL
		THEN new_arrival_ending_validation_date >= CURDATE() 
		ELSE 
		TRUE 
		END 
		AND new_arrival_active=1 ORDER BY new_arrival_id DESC LIMIT $startingLimit,".NEW_ARRIVAL_LIMIT;
		
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	
	/*
	FUNCTION NAME : public function get_normal_offer_list_from_db($startingLimit)
	it will return common offer list*/
	public function get_normal_offer_list_from_db($startingLimit)
	{
		$sql="SELECT * FROM offer
		LEFT JOIN offer_image ON (offer.offer_id=offer_image.ref_offer_image_offer_id AND offer_image.offer_image_is_display_image=1 and offer_image.offer_image_active=1) 
		WHERE offer_active=1 AND ref_offer_offer_type_id=".OFFER_TYPE_NORMAL_ID." AND 
		(CASE WHEN offer.offer_ending_date IS NOT NULL THEN offer.offer_ending_date >= CURDATE() ELSE TRUE END)
		ORDER BY offer_id DESC LIMIT $startingLimit,".OFFER_LIMIT;
		
		$query=$this->db->query($sql);
		return $query->result_array();
		
	}
	
	/*
	FUNCTION NAME : public function get_group_personal_offer_list_from_db($startingLimit)
	it will return personal and group  offer list*/
	public function get_group_personal_offer_list_from_db_with_group_condition($app_user_id,$startingLimit)
	{
		$sql_group_offer_or_gate="SELECT * FROM (SELECT group_offer_id FROM group_offer where is_condition_or_gate=1 AND (
        CASE WHEN is_condition_birth_year=1 then condition_birth_year=(SELECT YEAR(app_user_birth_date) FROM app_user_details WHERE ref_app_user_details_app_user_id=$app_user_id) 
        ELSE FALSE
        END 
        OR
        CASE WHEN is_condition_birth_month=1 then condition_birth_month=(SELECT MONTH(app_user_birth_date) FROM app_user_details WHERE ref_app_user_details_app_user_id=$app_user_id)
        ELSE FALSE
        END 
        OR
        CASE WHEN is_condition_age_range=1 then (SELECT FLOOR(DATEDIFF (CURRENT_DATE, `app_user_birth_date`)/365) AS age FROM app_user_details  WHERE ref_app_user_details_app_user_id=$app_user_id) BETWEEN condition_age_starting_range AND condition_age_ending_range
        ELSE FALSE
        END 
        OR
        CASE WHEN is_condition_sex=1 then condition_sex=(SELECT app_user_sex FROM app_user_details WHERE ref_app_user_details_app_user_id=$app_user_id)
        ELSE FALSE
        END 
        OR
        CASE WHEN is_condition_city=1 then LOWER(condition_city_name) LIKE (SELECT LOWER(app_user_city) FROM app_user_details WHERE ref_app_user_details_app_user_id=$app_user_id)
        ELSE FALSE
        END 
        OR
        CASE WHEN is_condition_post_code=1 then condition_post_code=(SELECT app_user_post_code FROM app_user_details WHERE ref_app_user_details_app_user_id=$app_user_id)
        ELSE FALSE
        END 
        )
        ) as group_offer_or_gate ";
		$sql_group_offer_and_gate="SELECT group_offer_id FROM (SELECT * FROM group_offer where is_condition_and_gate=1 AND 
		CASE WHEN is_condition_birth_year=1 then condition_birth_year=(SELECT YEAR(app_user_birth_date) FROM app_user_details WHERE ref_app_user_details_app_user_id=$app_user_id) 
		ELSE TRUE 
		END  
		AND 
		CASE WHEN is_condition_birth_month=1 then condition_birth_month=(SELECT MONTH(app_user_birth_date) FROM app_user_details WHERE ref_app_user_details_app_user_id=$app_user_id) 
		ELSE TRUE 
		END 
		AND 
		CASE WHEN is_condition_age_range=1 then (SELECT FLOOR(DATEDIFF (CURRENT_DATE, `app_user_birth_date`)/365) AS age FROM app_user_details  WHERE ref_app_user_details_app_user_id=$app_user_id) BETWEEN condition_age_starting_range AND condition_age_ending_range 
		ELSE TRUE 
		END 
		AND 
		CASE WHEN is_condition_sex=1 then condition_sex=(SELECT app_user_sex FROM app_user_details WHERE ref_app_user_details_app_user_id=$app_user_id) 
		ELSE TRUE 
		END  
		AND 
		CASE WHEN is_condition_city=1 then LOWER(condition_city_name) LIKE (SELECT LOWER(app_user_city) FROM app_user_details WHERE ref_app_user_details_app_user_id=$app_user_id) 
		ELSE TRUE 
		END  
		AND 
		CASE WHEN is_condition_post_code=1 then condition_post_code=(SELECT app_user_post_code FROM app_user_details WHERE ref_app_user_details_app_user_id=$app_user_id) 
		ELSE TRUE 
		END  
		) as group_offer_and_gate";
		
		$sql_final="SELECT * FROM (SELECT * FROM offer JOIN  
		(SELECT * FROM group_offer where group_offer_id in( ".$sql_group_offer_or_gate." 
		UNION  ".$sql_group_offer_and_gate." 
		)) as group_offer_or_and ON (offer.offer_id=group_offer_or_and.ref_group_offer_offer_id)  
		LEFT JOIN personal_offer ON (personal_offer_id is NULL) 
		UNION 
		(select * from offer 
		JOIN personal_offer
		ON(personal_offer.ref_personal_offer_offer_id=offer.offer_id AND personal_offer.ref_personal_offer_app_user_id=$app_user_id) 
		Left Join group_offer ON(group_offer_id is null)) ) as final_offer
		LEFT JOIN offer_image ON (final_offer.offer_id=offer_image.ref_offer_image_offer_id AND offer_image.offer_image_is_display_image=1 and offer_image.offer_image_active=1) 
		WHERE final_offer.offer_active=1 AND 
		(CASE WHEN final_offer.offer_ending_date IS NOT NULL THEN final_offer.offer_ending_date >= CURDATE() ELSE TRUE END)
		 order by  final_offer.offer_id DESC limit $startingLimit,".OFFER_LIMIT;
		
		$query=$this->db->query($sql_final);
		return $query->result_array();
		
	}
	/*
	FUNCTION NAME : get_all_ongoing_event_list()
	it will retun all ongoing event list*/
	public function get_all_ongoing_event_list($startingLimit)
	{
		/*
		$sql="SELECT *,TIMESTAMP(CURDATE(),CURTIME()) as current_date_time,
		TIMESTAMP(events_start_date,events_start_time) as events_starting_date_time,
		TIMESTAMP(events_end_date,events_end_time) as events_ending_date_time, 
		FLOOR(HOUR(TIMEDIFF(TIMESTAMP(events_end_date,events_end_time), TIMESTAMP(CURDATE(),CURTIME()))) / 24) as events_counting_days ,
		MOD(HOUR(TIMEDIFF(TIMESTAMP(events_end_date,events_end_time), TIMESTAMP(CURDATE(),CURTIME()))), 24)as events_counting_hours, 
		MINUTE(TIMEDIFF(TIMESTAMP(events_end_date,events_end_time), TIMESTAMP(CURDATE(),CURTIME()))) as events_counting_minutes FROM events 
		WHERE TIMESTAMP(events_start_date,events_start_time)<=TIMESTAMP(CURDATE(),CURTIME())
		 AND TIMESTAMP(events_end_date,events_end_time)>=TIMESTAMP(CURDATE(),CURTIME())
		 AND events_active=1
		order by  events_id DESC limit $startingLimit,".EVENTS_LIMIT;
		*/
		
		/*$sql="SELECT *,
		TIMESTAMP(events_start_date,events_start_time) as events_starting_date_time,
		TIMESTAMP(events_end_date,events_end_time) as events_ending_date_time, 
		FLOOR((DATEDIFF(TIMESTAMP(events_end_date,events_end_time), TIMESTAMP(CURDATE(),CURTIME())) * 24 + EXTRACT(HOUR FROM TIMESTAMP(events_end_date,events_end_time)) - EXTRACT(HOUR FROM  TIMESTAMP(CURDATE(),CURTIME())))/24) as events_counting_days ,
		MOD(HOUR(TIMEDIFF(TIMESTAMP(events_end_date,events_end_time), TIMESTAMP(CURDATE(),CURTIME()))), 24)as events_counting_hours, 
		MINUTE(TIMEDIFF(TIMESTAMP(events_end_date,events_end_time), TIMESTAMP(CURDATE(),CURTIME()))) as events_counting_minutes FROM events 
		WHERE TIMESTAMP(events_start_date,events_start_time)<=TIMESTAMP(CURDATE(),CURTIME())
		 AND TIMESTAMP(events_end_date,events_end_time)>=TIMESTAMP(CURDATE(),CURTIME())
		 AND events_active=1
		order by  events_id DESC limit $startingLimit,".EVENTS_LIMIT;*/
		
		
		$sql="SELECT *,TIMESTAMP(CURDATE(),CURTIME()) as current_date_time,
		TIMESTAMP(events_start_date,events_start_time) as events_starting_date_time,
		TIMESTAMP(events_end_date,events_end_time) as events_ending_date_time 
		 FROM events 
		WHERE TIMESTAMP(events_start_date,events_start_time)<=TIMESTAMP(CURDATE(),CURTIME())
		 AND TIMESTAMP(events_end_date,events_end_time)>=TIMESTAMP(CURDATE(),CURTIME())
		 AND events_active=1
		order by  events_id DESC limit $startingLimit,".EVENTS_LIMIT;
		
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	
	/*
	FUNCTION NAME : get_all_upcoming_event_list($startingLimit)
	it will retun all upcoming event list*/
	public function get_all_upcoming_event_list($startingLimit)
	{
		/*$sql="SELECT *,TIMESTAMP(CURDATE(),CURTIME()) as current_date_time,
		TIMESTAMP(events_start_date,events_start_time) as events_starting_date_time,
		TIMESTAMP(events_end_date,events_end_time) as events_ending_date_time, 
		FLOOR(HOUR(TIMEDIFF(TIMESTAMP(events_start_date,events_start_time), TIMESTAMP(CURDATE(),CURTIME()))) / 24) as events_counting_days ,
		MOD(HOUR(TIMEDIFF(TIMESTAMP(events_start_date,events_start_time), TIMESTAMP(CURDATE(),CURTIME()))), 24)as events_counting_hours, 
		MINUTE(TIMEDIFF(TIMESTAMP(events_start_date,events_start_time), TIMESTAMP(CURDATE(),CURTIME()))) as events_counting_minutes FROM events 
		WHERE TIMESTAMP(events_start_date,events_start_time)>TIMESTAMP(CURDATE(),CURTIME())
		 AND TIMESTAMP(events_end_date,events_end_time)>TIMESTAMP(CURDATE(),CURTIME())
		 AND events_active=1
		order by  events_id DESC limit $startingLimit,".EVENTS_LIMIT;*/
		
		
		$sql="SELECT *,TIMESTAMP(CURDATE(),CURTIME()) as current_date_time,
		TIMESTAMP(events_start_date,events_start_time) as events_starting_date_time,
		TIMESTAMP(events_end_date,events_end_time) as events_ending_date_time
		FROM events 
		WHERE TIMESTAMP(events_start_date,events_start_time)>TIMESTAMP(CURDATE(),CURTIME())
		 AND TIMESTAMP(events_end_date,events_end_time)>TIMESTAMP(CURDATE(),CURTIME())
		 AND events_active=1
		order by  events_id DESC limit $startingLimit,".EVENTS_LIMIT;
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	
	public function gat_all_images_with_album_name($startingLimit)
	{
		$sql_1="SELECT * from image_album 
		JOIN (select count(*) as total_album_images,ref_image_image_album_id from image where image_active=1 group by ref_image_image_album_id) as sub_image 
		ON (image_album.image_album_id=sub_image.ref_image_image_album_id) 
		where image_album_active=1 and image_album_id <>2 limit $startingLimit,".GALLERY_ALBUM_LIMIT;
		
		$query=$this->db->query($sql_1);
		
		 $total_images=0;
		 if($query->num_rows()>0)
		 {
			 $results=$query->result_array();
			 $i=0;
			 $album_ids=array();
			 foreach($results as $row)
			 {
				 $total_images=$total_images+$row['total_album_images'];
				 $album_ids[$i]=$row['image_album_id'];
				 $i++;
			 }
			 $ids = join(',',$album_ids);  
			 $sql="Select * from 
		((SELECT * from image_album where  image_album_id in ($ids)) as sub_image_album 
		 JOIN (select count(*) as total_album_images,ref_image_image_album_id from image where image_active=1 group by ref_image_image_album_id) as sub_image 
		ON (sub_image_album.image_album_id=sub_image.ref_image_image_album_id) 
		 JOIN image ON (image.ref_image_image_album_id=sub_image_album.image_album_id))";
		 
		 
		$query=$this->db->query($sql);
		return $query->result_array();
		 }
		 else
		 {
			 return array();
		 }
		 
		
		
		
		
		//$sql="SELECT image_album_id from image_album where image_album_active=1 and image_album_id <>2 limit $startingLimit,".GALLERY_ALBUM_LIMIT;
		
		
	}
	
	/*
	FUNCTION NAME :get_all_public_feedbacks($startingLimit)
	it will return all common feedbacks.*/
	
	public function get_all_public_feedbacks($startingLimit)
	{
		$sql="Select * from ((SELECT * from feedback where feedback_is_public=1 order by feedback_id desc limit $startingLimit,".FEEDBACK_LIMIT.") as sub_feedback 
		LEFT JOIN (select count(*) as total_replying_msg,ref_feedback_reply_feedback_id from feedback_reply  group by ref_feedback_reply_feedback_id) as sub_feedback_reply 
		ON (sub_feedback.feedback_id=sub_feedback_reply.ref_feedback_reply_feedback_id) 
		LEFT JOIN feedback_reply ON (feedback_reply.ref_feedback_reply_feedback_id=sub_feedback.feedback_id)),(SELECT avg(feedback_rating_score)as total_avg_ratings FROM feedback ) as avg_rating_table";
		
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	/*
	FUNCTION NAME : get_all_personal_feedbacks($app_user_id,$startingLimit)
	it will return personal feedbacks depends on app user id.*/
	public function get_all_personal_feedbacks($app_user_id,$startingLimit)
	{
		$sql="Select * from ((SELECT * from feedback where ref_feedback_app_user_id=$app_user_id and feedback_is_public=1 order by feedback_id desc limit $startingLimit,".FEEDBACK_LIMIT.") as sub_feedback 
		LEFT JOIN (select count(*) as total_replying_msg,ref_feedback_reply_feedback_id from feedback_reply  group by ref_feedback_reply_feedback_id) as sub_feedback_reply 
		ON (sub_feedback.feedback_id=sub_feedback_reply.ref_feedback_reply_feedback_id) 
		LEFT JOIN feedback_reply ON (feedback_reply.ref_feedback_reply_feedback_id=sub_feedback.feedback_id)),(SELECT avg(feedback_rating_score)as total_avg_ratings FROM feedback ) as avg_rating_table";
		
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	/*
	FUNCTION NAME : get_all_personal_feedbacks_without_limit($app_user_id)
	it will return personal feedbacks depends on app user id.*/
	public function get_all_personal_feedbacks_without_limit($app_user_id)
	{
		$sql="Select * from ((SELECT * from feedback where ref_feedback_app_user_id=$app_user_id and feedback_is_public=1 order by feedback_id desc ) as sub_feedback 
		LEFT JOIN (select count(*) as total_replying_msg,ref_feedback_reply_feedback_id from feedback_reply  group by ref_feedback_reply_feedback_id) as sub_feedback_reply 
		ON (sub_feedback.feedback_id=sub_feedback_reply.ref_feedback_reply_feedback_id) 
		LEFT JOIN feedback_reply ON (feedback_reply.ref_feedback_reply_feedback_id=sub_feedback.feedback_id)),(SELECT avg(feedback_rating_score)as total_avg_ratings FROM feedback ) as avg_rating_table";
		
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	/*
	FUNCTION NAME: insert_feedback_details_for_app_user()
	it will insert feedback for app user and return full row*/
	public function insert_feedback_details_for_app_user()
	{
		$this->db->trans_start(); 
		
		$app_user_id=$_REQUEST['app_user_id'];
		$feedback_rating_score=$_REQUEST['feedback_rating_score'];
		$feedback_message=$_REQUEST['feedback_message'];
		
		$return_array=array();
		
		if($this->check_app_user_id_is_exist($app_user_id)==1)
		{
			$data_feedback=array(
			'ref_feedback_app_user_id'=>$app_user_id,
			'feedback_rating_score'=>$feedback_rating_score,
			'feedback_message'=>$feedback_message,
			'feedback_is_public'=>1);
			$this->db->insert('feedback',$data_feedback);
			$inserted_feedback_id=$this->db->insert_id();
			
			$query=$this->db->get_where('feedback',array('feedback_id'=>$inserted_feedback_id));
			$return_array=$query->row_array();
			$return_array['sucess']=1;
		}
		else
		{
			$return_array['sucess']=0;
		}
		
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)//It will work when $db['default']['db_debug'] = FALSE;if you want to see db error then put true from Config/database.php $db['default']['db_debug'] = TRUE;
		{ 
		    $return_array['sucess']=0;
			return $return_array;
		}
		else
		{
			
			return $return_array;
		}
	}
		
	/*
	FUNCTION NAME: update_feedback_details_for_app_user()
	it will insert feedback for app user and return full row*/
	public function update_feedback_details_for_app_user()
	{
		$this->db->trans_start(); 
		
		$app_user_id=$_REQUEST['app_user_id'];
		$feedback_rating_score=$_REQUEST['feedback_rating_score'];
		$feedback_message=$_REQUEST['feedback_message'];
		$feedback_id=$_REQUEST['feedback_id'];
		
		$return_array=array();
		
		if($this->check_app_user_id_is_exist($app_user_id)==1 && $this->check_feedback_id_is_exist($feedback_id)==1)
		{
			$data_feedback=array(
			'ref_feedback_app_user_id'=>$app_user_id,
			'feedback_rating_score'=>$feedback_rating_score,
			'feedback_message'=>$feedback_message,
			'feedback_is_public'=>1);
			
			$where_feedback="feedback_id =$feedback_id ";
			$str_feedback = $this->db->update_string('feedback', $data_feedback, $where_feedback); 
			$this->db->query($str_feedback);	
			
			$query=$this->db->get_where('feedback',array('feedback_id'=>$feedback_id));
			$return_array=$query->row_array();
			$return_array['sucess']=1;
		}
		else
		{
			$return_array['sucess']=0;
		}
		
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)//It will work when $db['default']['db_debug'] = FALSE;if you want to see db error then put true from Config/database.php $db['default']['db_debug'] = TRUE;
		{ 
		    $return_array['sucess']=0;
			return $return_array;
		}
		else
		{
			
			return $return_array;
		}
	}
	/*
	FUNCTION NAME :check_feedback_id_is_exist($feedback_id)
	it will check feedback id .
	if it is not exist then it will send 0;
	Other wise it will send 1.*/
	public function check_feedback_id_is_exist($feedback_id)
	{
		$query=$this->db->get_where('feedback',array('feedback_id'=>$feedback_id));
		if($query->num_rows()==1)
		{
			return 1;//Means app user id is exist
		}
		else
		{
			return 0;//Means not exist
		}
		
		return 0;//unexpected;Never happend
	
	}
	
	/*
	FUNCTION NAME: insert_feedback_replying_details_for_app_user()
	it will insert feedback replying for app user and return full row*/
	public function insert_feedback_replying_details_for_app_user()
	{
		$this->db->trans_start(); 
		
		$app_user_id=$_REQUEST['app_user_id'];
		$feedback_id=$_REQUEST['feedback_id'];
		$feedback_replied_message=$_REQUEST['feedback_replied_message'];
		
		$return_array=array();
		
		if($this->check_app_user_id_is_exist($app_user_id)==1 && $this->check_feedback_id_is_exist($feedback_id)==1)
		{
			$data_feedback_reply=array(
			'ref_feedback_reply_feedback_id'=>$feedback_id,
			'feedback_replied_message'=>$feedback_replied_message,
			'feedback_replied_message_app_user_id'=>$app_user_id,
			'feedback_replied_from_app_user'=>1,
			'feedback_replied_from_admin'=>0);
			
			$this->db->insert('feedback_reply',$data_feedback_reply);
			$inserted_feedback_reply_id=$this->db->insert_id();
			
			$query=$this->db->get_where('feedback_reply',array('feedback_reply_id'=>$inserted_feedback_reply_id));
			$return_array=$query->row_array();
			$return_array['sucess']=1;
		}
		else
		{
			$return_array['sucess']=0;
		}
		
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)//It will work when $db['default']['db_debug'] = FALSE;if you want to see db error then put true from Config/database.php $db['default']['db_debug'] = TRUE;
		{ 
		    $return_array['sucess']=0;
			return $return_array;
		}
		else
		{
			
			return $return_array;
		}
	}
		
	/*
	FUNCTION NAME :get_image_from_gallery() 
	it will return all active image from image gallery
	*/
   public function get_all_images_from_gallery($limit, $offset)
	{ 
		$query=  $this->db->get_where('image',array('image_active'=>1), $limit, $offset);
		$return_array=array();
		$total_rows=$query->num_rows();
		
		if($query->num_rows() > 0)
		{	 
		   foreach ($query->result() as $row)
		   {
			//$return_array.push($row);
			array_push($return_array,$row);
		   }
			 
		
		}
		 	$gallery[] = array(
					'status' => 'OK',
					'total_rows' => $total_rows,				
					'data' => $return_array
					);
		 
		 return $gallery ;
	
	}
		
	/*
	FUNCTION NAME :get_incoming_event_model() 
	it will return all incoming event from event table
	*/
   public function get_upcoming_event_model()
	{ 
		//SELECT * FROM `events` WHERE `events_start_date` > CURDATE() ORDER BY `events_start_date` DESC
		$this->db->where('events_start_date > CURDATE()');
        $query = $this->db->get('events');
		$return_array=array();
		$total_rows=$query->num_rows();
		
		if($query->num_rows() > 0)
		{	 
		   foreach ($query->result() as $row)
		   {
			//$return_array.push($row);
			$row=$this->convertDateTime($row,"upcoming");
			array_push($return_array,$row);
		   }
			 
		
		}
		 /* 	$gallery[] = array(
					'status' => 'OK',
					'total_rows' => $total_rows,				
					'data' => $return_array
					); */
					
		 $obj = new stdClass();
		 $obj->data = $return_array;			
		 return $obj ;
	
	}
	
		
	/*
	FUNCTION NAME :get_ongoing_event_model() 
	it will return all ongoing event from event table
	*/
   public function get_ongoing_event_model()
	{ 
		//SELECT * FROM `events` WHERE `events_start_date` <= CURDATE() and `events_end_date` >= CURDATE() ORDER BY `events_start_date` DESC 
      
		//$this->db->select("DATE_FORMAT(events_start_date, '%d-%b-%Y') AS created_at", FALSE);
		$this->db->where('events_start_date <= CURDATE() ');
        $this->db->where('events_end_date >= CURDATE()');
        $query = $this->db->get('events');
		$return_array=array();
		$total_rows=$query->num_rows();
		
		if($query->num_rows() > 0)
		{	 
		   foreach ($query->result() as $row)
		   {
			
			//$return_array.push($row);
			//echo "daffdsf";die();
			$row=$this->convertDateTime($row,"ongoing");
			array_push($return_array,$row);
		   }
			 
		
		}
		 /* 	$gallery[] = array(
					'status' => 'OK',
					'total_rows' => $total_rows,				
					'data' => $return_array
					); */
					
		 $obj = new stdClass();
		 $obj->data = $return_array;			
		 return $obj ;
	
	}
	
	
	
 	
	public function convertDateTime($row,$event)
	{
	 if($event=="upcoming")	
		{	
		$start = new DateTime("$row->events_start_date $row->events_start_time");
		$end   = new DateTime(date("Y-m-d H:i:s"));
		}
	 if($event=="ongoing")	
		{	
		$start = new DateTime(date("Y-m-d H:i:s"));
		$end = new DateTime("$row->events_end_date $row->events_end_time");
		}
	
	
	
	$interval = $end->diff($start);
	$row->events_start_date= date("d F Y", strtotime($row->events_start_date));
	$row->events_start_time= date("g:i a", strtotime($row->events_start_time));
	$row->events_end_date= date("d F Y", strtotime($row->events_end_date));
	$row->events_end_time= date("g:i a", strtotime($row->events_end_time));
	$row->count_day= $interval->format('%a');
	$row->count_hour= $interval->format('%H');
	$row->count_min= $interval->format('%I');
	
	return $row;
			
	} 

	
	
	public function get_map_info()
	{
		$sql="SELECT * FROM branch 
		LEFT JOIN branch_customer_care ON (branch.branch_id=branch_customer_care.ref_branch_customer_care_branch_id) 
		LEFT JOIN branch_timetable ON (branch.branch_id=branch_timetable.ref_branch_timetable_branch_id) 
		WHERE branch.is_main_branch=1 
		AND branch.branch_id =(select branch_id from branch where is_main_branch=1 AND branch_edited_date_time=(select max(branch_edited_date_time) from branch where is_main_branch=1))";
		
		$query=$this->db->query($sql);
		
		return $query->row_array();
		
		
	}
	
	
	
	
	public function get_all_offer_deleting_id()
	{
		
		$sql="select offer_table_deleting_id as offer_id from offer_table_deleting";
		$query=$this->db->query($sql);
		
		
		
		return $query->result_array();
		
		
		
	}
	
	public function get_all_new_arrival_deleting_id()
	{
		//$query=$this->db->get('offer_table_deleting');
		
		$sql="select new_arrival_table_deleting_id as new_arrival_id from new_arrival_table_deleting";
		$query=$this->db->query($sql);                  
		
		return $query->result_array();
	}
	
	public function get_all_events_deleting_id()
	{
		//$query=$this->db->get('offer_table_deleting');
		
		$sql="select events_table_deleting_id as events_id from events_table_deleting";
		$query=$this->db->query($sql);
		
		return $query->result_array();
	}
	
	public function get_all_image_album_deleting_id()
	{
		//$query=$this->db->get('offer_table_deleting');
		
		$sql="select image_album_table_deleting_id as image_album_id from image_album_table_deleting";
		$query=$this->db->query($sql);
		
		return $query->result_array();
	}
	
	public function get_all_image_deleting_id()
	{
		//$query=$this->db->get('offer_table_deleting');
		
		$sql="select image_table_deleting_id as image_id from image_table_deleting";
		$query=$this->db->query($sql);
		
		return $query->result_array();
	}
	
	public function get_all_message_deleting_id()
	{
		//$query=$this->db->get('offer_table_deleting');
		
		$sql="select message_table_deleting_id as message_id from message_table_deleting";
		$query=$this->db->query($sql);
		
		return $query->result_array();
	}
	
	public function get_all_table_deleting_id()
	{
	  $return_array=array();
	  
	  //Offer
	  $sql_offer="select offer_table_deleting_id as offer_id from offer_table_deleting";
	  $query_offer=$this->db->query($sql_offer);
	  if($query_offer->num_rows()>0)
	  {
	     $result=$query_offer->result_array();
	     $it =  new RecursiveIteratorIterator(new RecursiveArrayIterator($result));
		 $l = iterator_to_array($it, false);
		 $comma_separated = implode(",", $l);
		 
		 $return_array['all_offer_id']=$comma_separated;
	  }
	  else
	  {
	     $return_array['all_offer_id']="0,0";
	  }
		
	  
	  //Album
	  
	  $sql_album="select image_album_table_deleting_id as image_album_id from image_album_table_deleting";
	  $query_album=$this->db->query($sql_album);
	  if($query_album->num_rows()>0)
	  {
	     $result=$query_album->result_array();
	     $it =  new RecursiveIteratorIterator(new RecursiveArrayIterator($result));
		 $l = iterator_to_array($it, false);
		 $comma_separated = implode(",", $l);
		 
		 $return_array['all_album_id']=$comma_separated;
	  }
	  else
	  {
	     $return_array['all_album_id']="0,0";
	  }
	  
	  //Image
	  
	  $sql_image="select image_table_deleting_id as image_id from image_table_deleting";
	  $query_image=$this->db->query($sql_image);
	  if($query_image->num_rows()>0)
	  {
	     $result=$query_image->result_array();
	     $it =  new RecursiveIteratorIterator(new RecursiveArrayIterator($result));
		 $l = iterator_to_array($it, false);
		 $comma_separated = implode(",", $l);
		 
		 $return_array['all_image_id']=$comma_separated;
	  }
	  else
	  {
	     $return_array['all_image_id']="0,0";
	  }
	  
	  //Events
	  
	  $sql_events="select events_table_deleting_id as events_id from events_table_deleting";
	  $query_events=$this->db->query($sql_events);
	  if($query_events->num_rows()>0)
	  {
	     $result=$query_events->result_array();
	     $it =  new RecursiveIteratorIterator(new RecursiveArrayIterator($result));
		 $l = iterator_to_array($it, false);
		 $comma_separated = implode(",", $l);
		 
		 $return_array['all_events_id']=$comma_separated;
	  }
	  else
	  {
	     $return_array['all_events_id']="0,0";
	  }
	  
	  //New Arrival
	  
	  $sql_new_arrival="select new_arrival_table_deleting_id as new_arrival_id from new_arrival_table_deleting";
	  $query_new_arrival=$this->db->query($sql_new_arrival);
	  if($query_new_arrival->num_rows()>0)
	  {
	     $result=$query_new_arrival->result_array();
	     $it =  new RecursiveIteratorIterator(new RecursiveArrayIterator($result));
		 $l = iterator_to_array($it, false);
		 $comma_separated = implode(",", $l);
		 
		 $return_array['all_new_arrival_id']=$comma_separated;
	  }
	  else
	  {
	     $return_array['all_new_arrival_id']="0,0";
	  }
	  
	  
	  //Messages
	  
	  $sql_message="select message_table_deleting_id as message_id from message_table_deleting";
	  $query_message=$this->db->query($sql_message);
	  if($query_message->num_rows()>0)
	  {
	     $result=$query_message->result_array();
	     $it =  new RecursiveIteratorIterator(new RecursiveArrayIterator($result));
		 $l = iterator_to_array($it, false);
		 $comma_separated = implode(",", $l);
		 
		 $return_array['all_message_id']=$comma_separated;
	  }
	  else
	  {
	     $return_array['all_message_id']="0,0";
	  }
	  
	  //feedback
	  
	  $sql_feedback="select feedback_table_deleting_id as feedback_id from feedback_table_deleting";
	  $query_feedback=$this->db->query($sql_feedback);
	  if($query_feedback->num_rows()>0)
	  {
	     $result=$query_feedback->result_array();
	     $it =  new RecursiveIteratorIterator(new RecursiveArrayIterator($result));
		 $l = iterator_to_array($it, false);
		 $comma_separated = implode(",", $l);
		 
		 $return_array['all_feedback_id']=$comma_separated;
	  }
	  else
	  {
	     $return_array['all_feedback_id']="0,0";
	  }
	  return $return_array;
	}
}
	
	
	
	
	
	
	
	
	
