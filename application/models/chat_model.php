<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

class Chat_Model extends CI_Model
{
	
	
	public function __construct()
	{
	
		$this->load->database(); 
	}
	
	/*
	FUNCTION NAME : get_all_app_user_list()
	it will retun all	app_user_list*/
	public function get_all_app_user_list()
	{
		
		/*$sql=" select chat_table.*,app_user_details.app_user_first_name ,app_user_details.app_user_last_name ,app_user_details.app_user_sex
		 from (select * from chat GROUP BY `ref_chat_app_user_id` desc ) AS chat_table ,app_user_details
		 WHERE `chat_from_app_user` =1  and 
		 chat_table.ref_chat_app_user_id=app_user_details.ref_app_user_details_app_user_id  
		 ORDER BY `chat_message_sending_edited_date_time` DESC";*/
		 
		 /*
		 $sql="select chat_table.*,app_user_details.app_user_first_name ,app_user_details.app_user_last_name ,app_user_details.app_user_sex 
		 from (select * from chat GROUP BY ref_chat_app_user_id desc ) AS chat_table , app_user_details 
		 WHERE chat_table.ref_chat_app_user_id=app_user_details.ref_app_user_details_app_user_id ORDER BY chat_message_sending_edited_date_time DESC ";
		 
		 */
		 /*
		 $sql="select chat_table.* ,app_user_details_table.*
		 from (select * from chat GROUP BY ref_chat_app_user_id desc limit $starting_limit,".CHAT_USER_LIMIT." ) AS chat_table , 
         (select app_user_id, IFNULL(CONCAT(app_user_first_name,' ', app_user_last_name),'NOT REGISTERED') as app_user_full_name from app_user_details right join app_user on (app_user_id=ref_app_user_details_app_user_id)) as app_user_details_table 
		 WHERE chat_table.ref_chat_app_user_id=app_user_details_table.app_user_id ORDER BY chat_message_sending_edited_date_time DESC";
		 */
		  $sql="select chat_table.* ,app_user_details_table.*
		 from (select * from chat GROUP BY ref_chat_app_user_id desc ) AS chat_table , 
         (select app_user_id, IFNULL(CONCAT(app_user_first_name,' ', app_user_last_name),'NOT REGISTERED') as app_user_full_name from app_user_details 
			right join app_user on (app_user_id=ref_app_user_details_app_user_id)) as app_user_details_table 
		 WHERE chat_table.ref_chat_app_user_id=app_user_details_table.app_user_id ORDER BY chat_message_sending_edited_date_time DESC";
		$query=$this->db->query($sql);
		return $query->result_object();
	}
	
	/*
	FUNCTION NAME : get_all_chat_details_for_sound()
	it will retun that how many notification are remain */
	public function get_all_chat_details_for_sound($id)
	{
		 $this->db->where('ref_chat_app_user_id', $id);
		 $this->db->where('chat_is_seen', 0);
	     $query=$this->db->get('chat');
		 return $query->num_rows;
		 
	}
	
		/*
	FUNCTION NAME : get_all_chat_details()
	it will retun all	chat details*/
	public function get_all_chat_details($id)
	{
		
		/* $sql=" select chat.*,app_user_details.app_user_first_name,app_user_details.app_user_last_name,app_user_details.app_user_sex
		 from chat,app_user_details 
		 WHERE chat.ref_chat_app_user_id=$id  and chat.chat_from_app_user=0  and chat.chat_from_admin=1   and
		 chat.ref_chat_app_user_id=app_user_details.ref_app_user_details_app_user_id  
		 ORDER BY chat_message_sending_edited_date_time DESC";*/
		 $this->db->trans_start();
		 
		 $data=array("chat_is_seen"=>1);
		 $this->db->where('ref_chat_app_user_id', $id);
	     $this->db->update('chat', $data);
		 
		 $sql="SELECT * FROM ( select * from chat 
		 LEFT JOIN app_user_details 
		 ON (ref_chat_app_user_id=app_user_details.ref_app_user_details_app_user_id) 
		 WHERE chat.ref_chat_app_user_id=$id ORDER BY chat_message_sending_edited_date_time  ) sub ORDER BY chat_message_sending_edited_date_time";
		$query=$this->db->query($sql);
		
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)//It will work when $db['default']['db_debug'] = FALSE;if you want to see db error then put true from Config/database.php $db['default']['db_debug'] = TRUE;
		{
			return $query->result_object();
		}
		else
		{
			return $query->result_object();
		}
		 
	}
	
	
		/*
	FUNCTION NAME : no_of_rows_chat_list()
	it will retun total no of row of chat list	*/
	public function no_of_rows_chat_list()
	{
		
		$sql="select * from chat	  order by  chat_id DESC";
		$query=$this->db->query($sql);
		return $query->num_rows;
	}

	
	/*
	FUNCTION NAME : chat_insert($data)
	it will insert a chat details 
	*/
	function chat_insert($data)
	{
	$this->db->insert('chat', $data);
	}
	
	
	/*
	FUNCTION NAME : chat_update($data,$id)
	it will update a chat deatails 
	*/
	function chat_update($data,$id)
	{
	$this->db->where('chat_id', $id);
	$this->db->update('chat', $data);
	}
	

		
	/*
	FUNCTION NAME : status_update($data,$id)
	it will update a chat activity after check it is active or inactive
	*/
	function status_update($id,$data)
	{
	$this->db->where('chat_id', $id);
	
	$this->db->update('chat', $data);
	}
	
	
	
	/*
	FUNCTION NAME : get_chat_by_id()
	it will get a chat by chat id */
	public function get_chat_by_id($id)
	{
		$query = $this->db->get_where('chat', array('chat_id' => $id));
		return $query;
	}
	
	/*
	FUNCTION NAME : delete_chat_by_id()
	it will delete the chat by chat id */
	public function delete_chat_by_id($id)
	{
		
		$this->db->where('chat_id', $id);
		$this->db->delete('chat');
		return $this->db->affected_rows();
	}
	
public function insert_chat_message($app_user_id,$msg)
{
	$this->db->trans_start();
	
	$data_chat=array('ref_chat_app_user_id'=>$app_user_id,
	'chat_from_app_user'=>0,
	'chat_from_admin'=>1,
	'ref_chat_from_admin_user_id'=>1,
	'chat_message'=>$msg);
	$this->db->insert('chat',$data_chat);
	
	$inserted_id=$this->db->insert_id();
	
	$this->db->trans_complete();
		
	if ($this->db->trans_status() === FALSE)//It will work when $db['default']['db_debug'] = FALSE;if you want to see db error then put true from Config/database.php $db['default']['db_debug'] = TRUE;
	{
			return 0;
	}
	else
	{
			return $inserted_id;
	}
}


public function get_chat_row($chat_id)
{
	$query = $this->db->get_where('chat', array('chat_id' => $chat_id));
	
	return $query->row_array();
}
	
}
	