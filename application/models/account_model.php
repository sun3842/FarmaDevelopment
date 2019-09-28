<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

class Account_Model extends CI_Model
{
	
	
	public function __construct()
	{
	
		$this->load->database(); 
	}
	
	/*
	FUNCTION NAME : get_all_account_list($limit,$per_page)
	it will retun all  user_details list*/
	public function get_all_account_list($limit,$per_page)
	{
		$limit--;
		$limit=$limit<0?0:$limit;
		$limit*=$per_page;
		$sql="select  user_details.*,user_type.user_type_name from user_details,user_type 
		WHERE user_details.ref_user_details_user_type_id = user_type.user_type_id
		order by  user_details_id DESC limit ".$limit.",$per_page";
		$query=$this->db->query($sql);
		return $query->result_object();
	}
	
/* 	$sql="select image.*, image_album.image_album_name,image_album.image_album_description
			from image,image_album  
			WHERE image.ref_image_image_album_id = image_album.image_album_id and
			 image.ref_image_image_album_id != 2
			order by  image_id DESC limit ".$limit.",$per_page"; */
		/*
	FUNCTION NAME : no_of_rows_account_list()
	it will retun total no of row of user_details list	*/
	public function no_of_rows_account_list()
	{
		
		$sql="select * from user_details	  order by  user_details_id DESC";
		$query=$this->db->query($sql);
		return $query->num_rows;
	}

	
	/*
	FUNCTION NAME : account_insert($data)
	it will insert a user_details details 
	*/
	function account_insert($data)
	{
	$this->db->insert('user_details', $data);
	}
	
	
	/*
	FUNCTION NAME : account_update($data,$id)
	it will update a user_details deatails 
	*/
	function account_update($data,$id)
	{
	$this->db->where('user_details_id', $id);
	$this->db->update('user_details', $data);
	}
	

		
	/*
	FUNCTION NAME : status_update($data,$id)
	it will update a account activity after check it is active or inactive
	*/
	function status_update($id,$data)
	{
	$this->db->where('user_details_id', $id);
	
	$this->db->update('user_details', $data);
	}
	
	
	
	/*
	FUNCTION NAME : get_account_by_id()
	it will get a account by account id */
	public function get_account_by_id($id)
	{
		$query = $this->db->get_where('user_details', array('user_details_id' => $id));
		return $query;
	}
	
	/*
	FUNCTION NAME : delete_account_by_id()
	it will delete the account by account id */
	public function delete_account_by_id($id)
	{
		
		$this->db->where('user_details_id', $id);
		$this->db->delete('user_details');
		return $this->db->affected_rows();
	}
	

	
}
	