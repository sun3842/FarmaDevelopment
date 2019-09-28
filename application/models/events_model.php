<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : ANWAR HOSSAIN
EMAIL ADDRESS: anwar.hossain.suman@gmail.com
*/

class Events_Model extends CI_Model
{
	
	
	public function __construct()
	{
	
		$this->load->database(); 
	}
	
	
	
	
	
	
	
	function get_all_ongling_upcoming_events_list($limit,$per_page)
	{
		
		$pharmacy_id=$this->session->userdata('pharmacy_id');
		
		$limit--;
		$limit=$limit<0?0:$limit;
		$limit*=$per_page;
		
		if($pharmacy_id==NULL)
		{
			$sql=" SELECT *,TIMESTAMP(CURDATE(),CURTIME()) as current_date_time,
		TIMESTAMP(events_start_date,events_start_time) as events_starting_date_time,
		TIMESTAMP(events_end_date,events_end_time) as events_ending_date_time ,
        IF(TIMESTAMP(events_start_date,events_start_time)<=TIMESTAMP(CURDATE(),CURTIME()) AND TIMESTAMP(events_end_date,events_end_time)>=TIMESTAMP(CURDATE(),CURTIME()), 1, 0) as ongoing ,
        IF(TIMESTAMP(events_start_date,events_start_time)>TIMESTAMP(CURDATE(),CURTIME()) AND TIMESTAMP(events_end_date,events_end_time)>TIMESTAMP(CURDATE(),CURTIME()), 1, 0) as upcoming 
		FROM events 
		WHERE  
		  events_active=1 AND ref_events_pharmacy_id IS NULL
		order by  events_id DESC  limit ".$limit.",$per_page";
		}
		else
		{
			$sql=" SELECT *,TIMESTAMP(CURDATE(),CURTIME()) as current_date_time,
		TIMESTAMP(events_start_date,events_start_time) as events_starting_date_time,
		TIMESTAMP(events_end_date,events_end_time) as events_ending_date_time ,
        IF(TIMESTAMP(events_start_date,events_start_time)<=TIMESTAMP(CURDATE(),CURTIME()) AND TIMESTAMP(events_end_date,events_end_time)>=TIMESTAMP(CURDATE(),CURTIME()), 1, 0) as ongoing ,
        IF(TIMESTAMP(events_start_date,events_start_time)>TIMESTAMP(CURDATE(),CURTIME()) AND TIMESTAMP(events_end_date,events_end_time)>TIMESTAMP(CURDATE(),CURTIME()), 1, 0) as upcoming 
		FROM events 
		WHERE  
		  events_active=1 AND ref_events_pharmacy_id=$pharmacy_id
		order by  events_id DESC  limit ".$limit.",$per_page";
		}
		
		
		$query=$this->db->query($sql);
		
		return $query->result_array();
	}
	
	public function no_of_row_ongoing_upcoming_event_list()
	{
		
	/*$sql=" SELECT *,TIMESTAMP(CURDATE(),CURTIME()) as current_date_time,
		TIMESTAMP(events_start_date,events_start_time) as events_starting_date_time,
		TIMESTAMP(events_end_date,events_end_time) as events_ending_date_time ,
        IF(TIMESTAMP(events_start_date,events_start_time)<=TIMESTAMP(CURDATE(),CURTIME()) AND TIMESTAMP(events_end_date,events_end_time)>=TIMESTAMP(CURDATE(),CURTIME()), 1, 0) as ongoing ,
        IF(TIMESTAMP(events_start_date,events_start_time)>TIMESTAMP(CURDATE(),CURTIME()) AND TIMESTAMP(events_end_date,events_end_time)>TIMESTAMP(CURDATE(),CURTIME()), 1, 0) as upcoming 
		FROM events 
		WHERE (TIMESTAMP(events_start_date,events_start_time)<=TIMESTAMP(CURDATE(),CURTIME())
		 AND TIMESTAMP(events_end_date,events_end_time)>=TIMESTAMP(CURDATE(),CURTIME())) OR 
         (TIMESTAMP(events_start_date,events_start_time)>TIMESTAMP(CURDATE(),CURTIME())
		 AND TIMESTAMP(events_end_date,events_end_time)>TIMESTAMP(CURDATE(),CURTIME()))
		 AND events_active=1
		order by  events_id DESC ";*/
		
		
		$sql=" SELECT *
		FROM events 
		WHERE  TIMESTAMP(events_end_date,events_end_time)>TIMESTAMP(CURDATE(),CURTIME())
		 AND events_active=1
		order by  events_id DESC ";
		$query=$this->db->query($sql);
		return $query->num_rows;
	}
	
	
	
	/*
	FUNCTION NAME : event_insert($data)
	it will insert a event deatails 
	*/
	function event_insert($data)
	{
		$this->db->trans_start();
		
		$this->db->insert('events', $data);
		
		$inserted_event_id=$this->db->insert_id();
		
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)//It will work when $db['default']['db_debug'] = FALSE;if you want to see db error then put true from Config/database.php $db['default']['db_debug'] = TRUE;
		{
			return 0;
		}
		else
		{
			return $inserted_event_id;
		}
	}
	
	
	/*
	FUNCTION NAME : event_update($data,$id)
	it will update a event deatails 
	*/
	function event_update($data,$id)
	{
		$this->db->trans_start();
		
		$this->db->where('events_id', $id);
		$this->db->update('events', $data);
		
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
	FUNCTION NAME : status_update($data,$id)
	it will update a event deatails after check it is active or inactive
	*/
	function status_update($id,$data)
	{
	$this->db->where('events_id', $id);
	
	$this->db->update('events', $data);
	}
	
	
	/*
	FUNCTION NAME : get_all_event_type()
	it will retun all  event type*/
	public function get_all_event_type()
	{
		$query = $this->db->get('event_type');
		return $query;
	}
	
	/*
	FUNCTION NAME : get_event_type()
	it will retun a  event type for combobox in edit event */
	public function get_event_type($id)
	{
		$sql="SELECT * FROM event_type ORDER BY (`event_type_id` = $id) DESC";
		$query=$this->db->query($sql);
		return $query->result_object();

	}
	
	/*
	FUNCTION NAME : get_event_by_id()
	it will a event by event id */
	public function get_event_by_id($id)
	{
		$query = $this->db->get_where('events', array('events_id' => $id));
		return $query;
	}
	
	/*
	FUNCTION NAME : delete_event_by_id()
	it will delete the event by event id */
	public function delete_event_by_id($id)
	{
		
		$this->db->trans_start();
		
		$this->db->where('events_id', $id);
		$this->db->delete('events');
		
		//Insert deleting events id into database for removing data from local database
		$data=array('events_table_deleting_id'=>$id);
		$this->db->insert('events_table_deleting', $data);
		
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
	FUNCTION NAME : custom_pager()
	it will return the paination accordingly to the query */	
/* 	public function custom_pager($url,$per_page,$total_rows)
	{
		
		$this->load->library('pagination');
		$config['base_url'] = $url;
		$config['total_rows'] =$total_rows;
		$config['per_page'] = $per_page;
		$config['use_page_numbers'] = TRUE;
		$config['first_url'] = $url.'1'; 
		$config['first_link'] = 'First';
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$this->pagination->initialize($config);
		return $this->pagination;
	} */
	
	/*
	public function get_event_by_id_for_push($id)
	{
		$query = $this->db->get_where('events', array('events_id' => $id));
		return $query->row_array();
	}
	*/
}
	