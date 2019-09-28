<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : ANWAR HOSSAIN
EMAIL ADDRESS: anwar.hossain.suman@gmail.com
*/

class Appuser_Model extends CI_Model
{
	
	
	public function __construct()
	{
		$this->load->database(); 

	}
	
	public function get_app_user_language_value()
	{
		$language_array=array();
		if(true)
		{
			$language_array['required']=FORM_REQUIRED_EN;
			
		}
		else
		{
			$language_array['required']=FORM_REQUIRED_IT;
			
		}
		
		return $language_array;
	}
	
	public function get_all_app_user_list($limit,$per_page)
	{
		$limit--;
		$limit=$limit<0?0:$limit;
		$limit*=$per_page;
		$sql="select * from app_user
		LEFT JOIN app_user_details ON (app_user_id=ref_app_user_details_app_user_id)
		LEFT JOIN app_user_pharmacy ON (ref_app_user_pharmacy_app_user_id=app_user_id)
		LEFT JOIN pharmacy ON (pharmacy_id=	ref_app_user_pharmacy_pharmacy_id)
			order by  app_user_id  limit ".$limit.",$per_page";
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	
	public function get_search_app_user_by_id($app_user_id)
	{
		
		$sql="select * from app_user
		LEFT JOIN app_user_details ON (app_user_id=ref_app_user_details_app_user_id)
		LEFT JOIN app_user_pharmacy ON (ref_app_user_pharmacy_app_user_id=app_user_id)
		LEFT JOIN pharmacy ON (pharmacy_id=	ref_app_user_pharmacy_pharmacy_id)
		WHERE app_user_id=$app_user_id";
			
		$query=$this->db->query($sql);
		return $query->row_array();
	}
	
	public function no_of_rows_app_user_list()
	{
		$sql="select * from app_user LEFT JOIN app_user_details ON (app_user_id=ref_app_user_details_app_user_id)";
		$query=$this->db->query($sql);
		
		return $query->num_rows();
	}
}
	