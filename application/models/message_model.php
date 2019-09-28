<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

class Message_Model extends CI_Model
{
	
	
	public function __construct()
	{
	
		$this->load->database(); 
	}
	
	
	/*
	FUNCTION NAME : get_all_message_list($limit,$per_page)
	it will retun all  message list*/
	public function get_all_group_message_list($limit,$per_page)
	{
		$limit--;
		$limit=$limit<0?0:$limit;
		$limit*=$per_page;
		
		
		$sql="select message.*, message_type.message_type_name from message,message_type where 
			message.ref_message_message_type_id = message_type.message_type_id and ref_message_message_type_id=3 and message_active=1 
			order by  message_id DESC limit ".$limit.",$per_page";
		$query=$this->db->query($sql);
		return $query->result_object();
	}
	
	
		/*
	FUNCTION NAME : no_of_rows_message_list()
	it will retun total no of row of message list	*/
	public function no_of_rows_group_message_list()
	{
		
		$sql="select message.*, message_type.message_type_name from message,message_type where 
			message.ref_message_message_type_id = message_type.message_type_id and ref_message_message_type_id=3 and message_active=1 
			order by  message_id DESC ";
		$query=$this->db->query($sql);
		return $query->num_rows;
	}

		
	/*
	FUNCTION NAME : get_all_message_list($limit,$per_page)
	it will retun all  message list*/
	public function get_all_message_list($limit,$per_page)
	{
		$limit--;
		$limit=$limit<0?0:$limit;
		$limit*=$per_page;
		/*$sql="select message.*, message_type.message_type_name from message,message_type where 
			message.ref_message_message_type_id = message_type.message_type_id  and message_active=1 
			order by  message_id DESC limit ".$limit.",$per_page";*/
			
		$pharmacy_id=$this->session->userdata('pharmacy_id');
		//echo $pharmacy_id;exit();
		if($pharmacy_id==NULL)
		{
			$sql="select * from message where message_active=1 and ref_message_pharmacy_id IS NULL order by  message_id DESC limit ".$limit.",$per_page";
		}
		else
		{
			$sql="select * from message where message_active=1 and ref_message_pharmacy_id=$pharmacy_id order by  message_id DESC limit ".$limit.",$per_page";
			
		}
	    //$sql="select * from message where message_active=1 order by  message_id DESC limit ".$limit.",$per_page";
		$query=$this->db->query($sql);
		return $query->result_object();
	}
	
	
		/*
	FUNCTION NAME : no_of_rows_message_list()
	it will retun total no of row of message list	*/
	public function no_of_rows_message_list()
	{
		
		$pharmacy_id=$this->session->userdata('pharmacy_id');
		//echo $pharmacy_id;exit();
		if($pharmacy_id==NULL)
		{
			$sql="select * from message where message_active=1 and ref_message_pharmacy_id IS NULL order by  message_id DESC ";
		}
		else
		{
			$sql="select * from message where message_active=1 and ref_message_pharmacy_id=$pharmacy_id order by  message_id DESC ";
			
		}
		$query=$this->db->query($sql);
		return $query->num_rows;
	}

	
        
	/*
	FUNCTION NAME : get_all_message_type()
	it will retun all  _message type*/
	public function get_all_message_type()
	{
		$query = $this->db->get('message_type');
		return $query;
	}
	
        
	/*
	FUNCTION NAME : message_insert($data)
	it will insert a message details 
	*/
	function message_insert($data)
	{
		$this->db->trans_start();
		
		$this->db->insert('message', $data);
		
		$inserted_message_id=$this->db->insert_id();
		
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)//It will work when $db['default']['db_debug'] = FALSE;if you want to see db error then put true from Config/database.php $db['default']['db_debug'] = TRUE;
		{
			return 0;
		}
		else
		{
			return $inserted_message_id;
		}
	}
	
	/*
	FUNCTION NAME : group_message_insert($data)
	it will insert a group message details 
	*/
	function group_message_insert($data)
	{
		$this->db->trans_start();
		
		$this->db->insert('group_message', $data);
		
		$inserted_message_id=$this->db->insert_id();
		
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)//It will work when $db['default']['db_debug'] = FALSE;if you want to see db error then put true from Config/database.php $db['default']['db_debug'] = TRUE;
		{
			return 0;
		}
		else
		{
			return $inserted_message_id;
		}
	}
	
	/*
	FUNCTION NAME : personal_message_insert($data)
	it will insert a personal message details 
	*/
	function personal_message_insert($data)
	{
		$this->db->trans_start();
		
		$this->db->insert('personal_message', $data);
		
		$inserted_message_id=$this->db->insert_id();
		
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)//It will work when $db['default']['db_debug'] = FALSE;if you want to see db error then put true from Config/database.php $db['default']['db_debug'] = TRUE;
		{
			return 0;
		}
		else
		{
			return $inserted_message_id;
		}
	}
	
	/*
	FUNCTION NAME : message_update($data,$id)
	it will update a message deatails 
	*/
	function message_update($data,$id)
	{
	$this->db->where('message_id', $id);
	$this->db->update('message', $data);
	}
	

	
	/*
	FUNCTION NAME : get_message_by_id()
	it will get a message by message id */
	public function get_message_by_id($id)
	{
		$query = $this->db->get_where('message', array('message_id' => $id));
		return $query;
	}
	
    /*
	FUNCTION NAME : get_message_details_view_page_by_id()
	it will get a message by message id */
	public function get_message_details_view_page_by_id($id)
	{
		$sql="select * from message 
		LEFT JOIN group_message ON (message_id=ref_group_message_message_id) 
		LEFT JOIN (select * from app_user_details JOIN personal_message ON(ref_personal_message_app_user_id=ref_app_user_details_app_user_id) where ref_personal_message_message_id=$id) as personal_app_user_message ON (message.message_id=personal_app_user_message.ref_personal_message_message_id)
		where message_id=$id ";
		
		$query=$this->db->query($sql);
		
		return $query->row_array();
	}
	   
        
        /*
	FUNCTION NAME : get_message_type()
	it will retun a  message type for combobox in edit message */
	public function get_message_type($id)
	{
		$sql="SELECT * FROM message_type ORDER BY (`message_type_id` = $id) DESC";
		$query=$this->db->query($sql);
		return $query->result_object();

	}
	
        
        
	/*
	FUNCTION NAME : delete_message_by_id()
	it will delete the message by message id */
	public function delete_message_by_id($id)
	{
		
		$this->db->where('message_id', $id);
		$this->db->delete('message');
		return $this->db->affected_rows();
		
	
	}
	
	
	/*
	FUNCTION NAME :get_app_user_id_for_group_message($group_message_id)
	it will return app user id array.*/
	public function get_app_user_id_for_group_message($group_message_id)
	{
		$return_array=array();
		$i=0;
		
		$query=$this->db->get_where('app_user',array('ref_app_user_device_type_id'=>ANDROID_DEVICE_TYPE_ID,'app_user_activation'=>1));
		$app_user_id_array=$query->result_array();
		foreach($app_user_id_array as $app_user_id_1)
		{
			$app_user_id=$app_user_id_1['app_user_id'];
		$sql_group_message_or_gate="SELECT * FROM (SELECT group_message_id FROM group_message  where group_message_id=$group_message_id and is_condition_or_gate=1 AND (
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
		$sql_group_message_and_gate="SELECT group_message_id FROM (SELECT * FROM group_message where group_message_id=$group_message_id and is_condition_and_gate=1 AND 
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
		 
		 ) as final_message
		WHERE final_message.message_active=1 ";
		$query=$this->db->query($sql_final);
		if($query->num_rows()==1)
		{
			$return_array[$i]=$app_user_id_1['app_user_device_id'];;
			$i++;
		}
		}
		return $return_array;

	}
	
	
	
	
	
	
	/*
	FUNCTION NAME :get_app_user_id_for_ios_group_message($group_message_id)
	it will return app user id array.*/
	public function get_app_user_id_for_ios_group_message($group_message_id)
	{
		$return_array=array();
		$i=0;
		
		$sql="SELECT * FROM app_user  JOIN app_user_ios ON (app_user.app_user_id=app_user_ios.ref_app_user_ios_app_user_id) where app_user.ref_app_user_device_type_id=".IOS_DEVICE_TYPE_ID." and app_user_activation=1 ";
		$query=$this->db->query($sql);
		$app_user_id_array=$query->result_array();
		foreach($app_user_id_array as $app_user_id_1)
		{
			$app_user_id=$app_user_id_1['app_user_id'];
		$sql_group_message_or_gate="SELECT * FROM (SELECT group_message_id FROM group_message  where group_message_id=$group_message_id and is_condition_or_gate=1 AND (
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
		$sql_group_message_and_gate="SELECT group_message_id FROM (SELECT * FROM group_message where group_message_id=$group_message_id and is_condition_and_gate=1 AND 
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
		 
		 ) as final_message
		WHERE final_message.message_active=1 ";
		$query=$this->db->query($sql_final);
		if($query->num_rows()==1)
		{
			$return_array[$i]=$app_user_id_1['ios_device_token'];
			$i++;
		}
		}
		return $return_array;

	}
	
	
	
	

	
}
	