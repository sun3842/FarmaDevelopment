<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

class Feedback_Model extends CI_Model
{
	
	
	public function __construct()
	{
	
		$this->load->database(); 
	}
	
	/*
	FUNCTION NAME : get_all_feedback_list($limit,$per_page)
	it will retun all  feedback list*/
	public function get_all_feedback_list($limit,$per_page)
	{
		$limit--;
		$limit=$limit<0?0:$limit;
		$limit*=$per_page;
		$sql="select *  from feedback 
		LEFT JOIN (select * from app_user LEFT JOIN app_user_details ON (app_user_id=ref_app_user_details_app_user_id)) as all_users ON (all_users.app_user_id=feedback.ref_feedback_app_user_id)	 
		order by  feedback_id DESC limit ".$limit.",$per_page";
		$query=$this->db->query($sql);
		return $query->result_object();
	}
	
	
		/*
	FUNCTION NAME : no_of_rows_feedback_list()
	it will retun total no of row of feedback list	*/
	public function no_of_rows_feedback_list()
	{
		
		$sql="select * from feedback	  order by  feedback_id DESC";
		$query=$this->db->query($sql);
		return $query->num_rows;
	}

	
	/*
	FUNCTION NAME : feedback_insert($data)
	it will insert a feedback details 
	*/
	function feedback_insert($data)
	{
	$this->db->insert('feedback', $data);
	}
	
	
	/*
	FUNCTION NAME : feedback_update($data,$id)
	it will update a feedback deatails 
	*/
	function feedback_update($data,$id)
	{
	$this->db->where('feedback_id', $id);
	$this->db->update('feedback', $data);
	}
	

		
	/*
	FUNCTION NAME : status_update($data,$id)
	it will update a feedback activity after check it is active or inactive
	*/
	function status_update($id,$data)
	{
	$this->db->where('feedback_id', $id);
	
	$this->db->update('feedback', $data);
	}
	
	
	
	/*
	FUNCTION NAME : get_feedback_by_id()
	it will get a feedback by feedback id */
	public function get_feedback_by_id($id)
	{
		/*
		$query = $this->db->get_where('feedback', array('feedback_id' => $id));
		return $query;
		*/
		$sql="select * from feedback LEFT JOIN feedback_reply ON (feedback.feedback_id=feedback_reply.ref_feedback_reply_feedback_id)
		LEFT JOIN (select * from app_user LEFT JOIN app_user_details ON (app_user_id=ref_app_user_details_app_user_id)) as all_users ON (all_users.app_user_id=feedback.ref_feedback_app_user_id)
		 where feedback_id=$id";
		
		$query=$this->db->query($sql);
		
		return $query->result_array();
	}
	
	/*
	FUNCTION NAME : delete_feedback_by_id()
	it will delete the feedback by feedback id */
	public function delete_feedback_by_id($id)
	{
		
		$this->db->where('feedback_id', $id);
		$this->db->delete('feedback');
		return $this->db->affected_rows();
	}
	
	public function insert_reply_feedback_message($data)
	{
		$this->db->trans_start();
		
		$this->db->insert('feedback_reply', $data);
		
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
	

	
}
	