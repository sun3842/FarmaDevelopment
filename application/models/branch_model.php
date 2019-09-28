<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : ANWAR HOSSAIN
EMAIL ADDRESS: anwar.hossain.suman@gmail.com
*/

class Branch_Model extends CI_Model
{
	
	
	public function __construct()
	{
	
		$this->load->database(); 
	}
	
	/*
	FUNCTION NAME:get_all_branch_list()
	it will return all branch list
	*/
	public function get_all_branch_list()
	{
		$query=$this->db->get('branch');
		return $query->result_array();
	}
	
	/*
	function name : get_single_branch_by_id($branch_id)
	it will return single branch details*/
	public function get_single_branch_by_id($branch_id)
	{
		$sql="SELECT * from branch 
		LEFT JOIN branch_customer_care ON(branch.branch_id=branch_customer_care.ref_branch_customer_care_branch_id)
		LEFT JOIN branch_timetable ON(branch.branch_id=branch_timetable.ref_branch_timetable_branch_id)
		where branch.branch_id=$branch_id";
		
		$query=$this->db->query($sql);
		
		return $query->row_array();
	}
	
	/*
	FUNCTION NAME :has_it_main_branch()
	it is checking it has any main branch,if no then return 0;*/
	public function has_it_main_branch()
	{
		$query=$this->db->get_where('branch',array('is_main_branch'=>1));
		return $query->num_rows();
	}
	
	/*
	FUNCTION NAME : branch_insert($data)
	it is inserting new branch information*/
	public function branch_insert($data)
	{
		$this->db->trans_start();
		
		$this->db->insert('branch', $data);
		
		$inserted_branch_id=$this->db->insert_id();
		
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)//It will work when $db['default']['db_debug'] = FALSE;if you want to see db error then put true from Config/database.php $db['default']['db_debug'] = TRUE;
		{
			return 0;
		}
		else
		{
			return $inserted_branch_id;
		}
	}
	
	/*
	FUNCTION NAME : branch_customer_care_insert($data)
	it is inserting new branch_customer_care_insert information*/
	public function branch_customer_care_insert($data)
	{
		$this->db->trans_start();
		
		$this->db->insert('branch_customer_care', $data);
		
		$inserted_branch_customer_care_id=$this->db->insert_id();
		
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)//It will work when $db['default']['db_debug'] = FALSE;if you want to see db error then put true from Config/database.php $db['default']['db_debug'] = TRUE;
		{
			return 0;
		}
		else
		{
			return $inserted_branch_customer_care_id;
		}
	}
	
	/*
	FUNCTION NAME :branch_timetable_insert($data)
	it is inserting new branch_timetable_insert information*/
	public function branch_timetable_insert($data)
	{
		$this->db->trans_start();
		
		$this->db->insert('branch_timetable', $data);
		
		$inserted_branch_timetable_id=$this->db->insert_id();
		
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)//It will work when $db['default']['db_debug'] = FALSE;if you want to see db error then put true from Config/database.php $db['default']['db_debug'] = TRUE;
		{
			return 0;
		}
		else
		{
			return $inserted_branch_timetable_id;
		}
	}
	
	/*
	FUNCTION NAME : update_all_table_branch($query_branch_data,$query_branch_customer_care,$query_branch_timetable,$branch_id)
	it will update all branch related table*/
	public function update_all_table_branch($query_branch_data,$query_branch_customer_care_data, $query_branch_timetable_data,$branch_id)
	{
		$this->db->trans_start();
		//Table :Branch
		$where_branch="branch_id=$branch_id";
		$str_branch = $this->db->update_string('branch', $query_branch_data, $where_branch); 
		$this->db->query($str_branch);
		
		//Table:branch_customer_care
		
		$query_branch_customer_care=$this->db->get_where('branch_customer_care',array('ref_branch_customer_care_branch_id'=>$branch_id));
		if($query_branch_customer_care->num_rows()==1)
		{
			//Update
			$where_branch_customer_care="ref_branch_customer_care_branch_id=$branch_id";
			$str_branch_customer_care = $this->db->update_string('branch_customer_care', $query_branch_customer_care_data, $where_branch_customer_care); 
			$this->db->query($str_branch_customer_care);
		}
		else
		{
			//Insert
			$this->db->insert('branch_customer_care', $query_branch_customer_care_data);
		}
		
		//Table branch_timetable
		$query_branch_timetable=$this->db->get_where('branch_timetable',array('ref_branch_timetable_branch_id'=>$branch_id));
		if($query_branch_timetable->num_rows()==1)
		{
			//Update
			$where_branch_timetable="ref_branch_timetable_branch_id=$branch_id";
			$str_branch_timetable = $this->db->update_string('branch_timetable', $query_branch_timetable_data, $where_branch_timetable); 
			$this->db->query($str_branch_timetable);
		}
		else
		{
			//Inseert
			$this->db->insert('branch_timetable',  $query_branch_timetable_data);
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
	FUNCTION NAME : delete_branch_by_id($branch_id);
	it will delete branch by branch id*/
	public function delete_branch_by_id($branch_id)
	{
		$this->db->trans_start();
		//branch_timetable
		$this->db->delete('branch_timetable', array('ref_branch_timetable_branch_id' => $branch_id)); 
		//branch_customer_care
		$this->db->delete('branch_customer_care', array('ref_branch_customer_care_branch_id' => $branch_id));
		//branch
		$this->db->delete('branch', array('branch_id' => $branch_id));
		
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
}
	