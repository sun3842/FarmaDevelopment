<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

class News_Model extends CI_Model
{
	
	
	public function __construct()
	{
	
		$this->load->database(); 
	}
	
	
	
	
public function get_all_news_without_limit()
{
	$query=$this->db->get_where('news',array('news_active'=>1));
	
	return $query->result_array();
}
		
	/*
	FUNCTION NAME : get_all_message_list($limit,$per_page)
	it will retun all  message list*/
	public function get_all_news_list($limit,$per_page)
	{
		$limit--;
		$limit=$limit<0?0:$limit;
		$limit*=$per_page;
		/*$sql="select message.*, message_type.message_type_name from message,message_type where 
			message.ref_message_message_type_id = message_type.message_type_id  and message_active=1 
			order by  message_id DESC limit ".$limit.",$per_page";*/
			
	    $sql="select * from news where news_active=1 order by  news_id DESC limit ".$limit.",$per_page";
		
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	
	
		/*
	FUNCTION NAME : no_of_rows_news_list()
	it will retun total no of row of message list	*/
	public function no_of_rows_news_list()
	{
		
		$sql="select * from news news_active=1";
		$query=$this->db->query($sql);
		return $query->num_rows;
	}

	
        
	
	/*
	FUNCTION NAME : news_insert($data)
	it will insert a message details 
	*/
	function news_insert($data)
	{
		$this->db->trans_start();
		
		$this->db->insert('news', $data);
		
		$inserted_news_id=$this->db->insert_id();
		
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)//It will work when $db['default']['db_debug'] = FALSE;if you want to see db error then put true from Config/database.php $db['default']['db_debug'] = TRUE;
		{
			return 0;
		}
		else
		{
			return $inserted_news_id;
		}
	}
	
	
	/*
	FUNCTION NAME : news_update($data,$id)
	it will update a message deatails 
	*/
	function news_update($data,$id)
	{
		$this->db->trans_start();
	
		$this->db->where('news_id', $id);
	
		$this->db->update('news', $data);
		
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
	FUNCTION NAME : get_news_by_id()
	it will get a message by message id */
	public function get_news_by_id($id)
	{
		$query = $this->db->get_where('news', array('news_id' => $id,'news_active'=>1));
		return $query->row_array();
	}
	
    /*
	FUNCTION NAME : get_message_details_view_page_by_id()
	it will get a message by message id */
	public function get_news_details_by_id($id)
	{
		$query=$this->db->get_where('news',array('news_active'=>1));
				
		return $query->row_array();
	}
	   
        
     
        
	/*
	FUNCTION NAME : delete_news_by_id()
	it will delete the message by message id */
	public function delete_news_by_id($id)
	{
		
		$this->db->where('news_id', $id);
		$this->db->delete('news');
		return $this->db->affected_rows();
		
	
	}
	
	
	
	
	

	
}
	