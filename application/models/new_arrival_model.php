<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

class New_arrival_Model extends CI_Model
{
	
	
	public function __construct()
	{
	
		$this->load->database(); 
	}
	
	/*
	FUNCTION NAME : get_all_new_arrival_list($limit,$per_page)
	it will retun all  new_arrival list*/
	public function get_all_new_arrival_list($limit,$per_page)
	{
		$limit--;
		$limit=$limit<0?0:$limit;
		$limit*=$per_page;
		$sql="select *  from new_arrival 	 order by  new_arrival_id DESC limit ".$limit.",$per_page";
		$query=$this->db->query($sql);
		return $query->result_object();
	}
	
	
		/*
	FUNCTION NAME : no_of_rows_new_arrival_list()
	it will retun total no of row of new_arrival list	*/
	public function no_of_rows_new_arrival_list()
	{
		
		$sql="select * from new_arrival	  order by  new_arrival_id DESC";
		$query=$this->db->query($sql);
		return $query->num_rows;
	}

	
	/*
	FUNCTION NAME : new_arrival_insert($data)
	it will insert a new_arrival details 
	*/
	function new_arrival_insert($data)
	{
		$this->db->trans_start();
		
		$this->db->insert('new_arrival', $data);
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
	/*
	FUNCTION NAME : new_arrival_image_insert($data)
	it will insert a new_arrival image details 
	*/
	function new_arrival_image_insert($data)
	{
		$this->db->trans_start();
		
		$this->db->insert('new_arrival_image', $data);
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
	
	function new_arrival_image_update($data,$id)
	{
		$this->db->trans_start();
		
		$query=$this->db->get_where('new_arrival_image',array('ref_new_arrival_image_new_arrival_id'=>$id));
		if($query->num_rows()==0)
		{
			$this->db->insert('new_arrival_image', $data);
			$inserted_id=$this->db->insert_id();
		}
		else
		{
			$this->db->where('ref_new_arrival_image_new_arrival_id', $id);
			$this->db->update('new_arrival_image', $data);
			$inserted_id==$id;
		}
		
		
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
	
	/*
	FUNCTION NAME : new_arrival_update($data,$id)
	it will update a new_arrival deatails 
	*/
	function new_arrival_update($data,$id)
	{
		$this->db->trans_start();
		
		$this->db->where('new_arrival_id', $id);
		$this->db->update('new_arrival', $data);
		
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)//It will work when $db['default']['db_debug'] = FALSE;if you want to see db error then put true from Config/database.php $db['default']['db_debug'] = TRUE;
		{
			return 0;
		}
		else
		{
			return $id;
		}
	}
	

		
	/*
	FUNCTION NAME : status_update($data,$id)
	it will update a new_arrival activity after check it is active or inactive
	*/
	function status_update($id,$data)
	{
		
		
		$this->db->where('new_arrival_id', $id);
		$this->db->update('new_arrival', $data);
	}
	
	
	
	/*
	FUNCTION NAME : get_new_arrival_by_id()
	it will get a new_arrival by new_arrival id */
	public function get_new_arrival_by_id($id)
	{
		$sql="SELECT * from new_arrival 
		LEFT JOIN new_arrival_image ON( new_arrival_id=ref_new_arrival_image_new_arrival_id) 
		LEFT JOIN currency ON (new_arrival_ref_currency_id=currency_id)
		where new_arrival_id=$id";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	
	/*
	FUNCTION NAME : delete_new_arrival_by_id()
	it will delete the new_arrival by new_arrival id */
	public function delete_new_arrival_by_id($id)
	{
		$this->db->trans_start();
		
		
		$this->db->where('ref_new_arrival_image_new_arrival_id', $id);
		$this->db->delete('new_arrival_image');
		
		$this->db->where('new_arrival_id', $id);
		$this->db->delete('new_arrival');
		
		
		//Insert new arrival deleted id into database for removing data from local database into devices
		$data=array('new_arrival_table_deleting_id'=>$id);
		$this->db->insert('new_arrival_table_deleting', $data);
		
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
	FUNCTION NAME : get_currency()
	it will return curency id as index and currency name and symbol together as value.*/
	public function get_currency()
	{
		$query=$this->db->get_where('currency',array('currency_active'=>1));
		$cur_array=$query->result_array();
		$c_array=array();
		foreach($cur_array as $cur)
		{
			$c_array[$cur['currency_id']]=$cur['currency_name']." (".$cur['currency_symbol'].")";
		}
		
		return $c_array;
	}
	
	
	/*
	FUNCTION NAME : get_new_arrival_with_image_by_id($id)
	it will get a new_arrival by new_arrival id */
	public function get_new_arrival_with_image_by_id($id)
	{
		$sql="SELECT * from new_arrival 
		LEFT JOIN currency ON (new_arrival.new_arrival_ref_currency_id=currency.currency_id)
		LEFT JOIN new_arrival_image ON ( new_arrival.new_arrival_id=new_arrival_image.ref_new_arrival_image_new_arrival_id and new_arrival_image.new_arrival_image_is_display_image=1)
		where new_arrival.new_arrival_id=$id";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	
}
	