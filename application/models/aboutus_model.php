<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

class Aboutus_Model extends CI_Model
{
	
	
	public function __construct()
	{
	
		$this->load->database(); 
	}
	
	
	function get_about_us_details()
	{
		$query=$this->db->get('about_us');
		
		return $query->row_array();
	
	}
	
	function insert_update($data)
	{
		$this->db->trans_start();
		
		$query=$this->db->get('about_us');
		
		if($query->num_rows()==1)
		{
			//Update
			$this->db->update('about_us', $data); 

		}
		else if($query->num_rows()==0)
		{
			//insert
			$this->db->insert('about_us',$data);
		}
		
		else
		{
			//Delete And Insert
			
			$this->db->delete('about_us');
			$this->db->insert('about_us',$data);
			
			
		}
		
		$this->db->trans_complete();
	}
	

		
	
	
	

	
}
	