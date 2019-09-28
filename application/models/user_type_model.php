<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

class User_type_Model extends CI_Model
{
	
	
	public function __construct()
	{
	
		$this->load->database(); 
	}
	
	/*
	FUNCTION NAME : get_all_user_type_list($limit,$per_page)
	it will retun all  user_type list*/
	public function get_all_user_type_list($limit,$per_page)
	{
		$limit--;
		$limit=$limit<0?0:$limit;
		$limit*=$per_page;
		$sql="select *  from user_type	 order by  user_type_id DESC limit ".$limit.",$per_page";
		$query=$this->db->query($sql);
		return $query->result_object();
	}
	
	
		/*
	FUNCTION NAME : no_of_rows_user_type_list()
	it will retun total no of row of user_type list	*/
	public function no_of_rows_user_type_list()
	{
		
		$sql="select * from user_type	  order by  user_type_id DESC";
		$query=$this->db->query($sql);
		return $query->num_rows;
	}

	
	/*
	FUNCTION NAME : user_type_insert($data)
	it will insert a user_type details 
	*/
	function user_type_insert($data)
	{
	$this->db->insert('user_type', $data);
	}
	
	
	/*
	FUNCTION NAME : user_type_update($data,$id)
	it will update a user_type deatails 
	*/
	function user_type_update($data,$id)
	{
	$this->db->where('user_type_id', $id);
	$this->db->update('user_type', $data);
	}
	

	
	/*
	FUNCTION NAME : get_user_type_by_id()
	it will get a user_type by user_type id */
	public function get_user_type_by_id($id)
	{
		$query = $this->db->get_where('user_type', array('user_type_id' => $id));
		return $query;
	}
	
	/*
	FUNCTION NAME : delete_user_type_by_id()
	it will delete the user_type by user_type id */
	public function delete_user_type_by_id($id)
	{
		
		$this->db->where('user_type_id', $id);
		$this->db->delete('user_type');
		return $this->db->affected_rows();
	}
	

	
}
	