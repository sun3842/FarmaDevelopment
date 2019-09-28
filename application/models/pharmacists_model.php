<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pharmacists_Model extends CI_Model{

    public function pharmacist_insert($data){
        $this->db->trans_start();

        $this->db->insert('farmacisti', $data);

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

    public function get_all_pharmacists(){
		$pharmacy_id=$this->session->userdata('pharmacy_id');
        $sql='SELECT * FROM farmacisti WHERE ref_farmacisti_pharmacy_id= '.$pharmacy_id.' and farmacisti_active=1';
        $result=$this->db->query($sql);
        return $result->result_array();
    }

    public function delete_pharmacist_by_id($id){
		
		$this->db->trans_start();
		
		$pharmacy_id=$this->session->userdata('pharmacy_id');
		
        $sql='DELETE FROM farmacisti WHERE ref_farmacisti_pharmacy_id= '.$pharmacy_id.' and farmacisti_id='.$id;
		
        $this->db->query($sql);
		
		$this->db->trans_complete();
    }

    public function get_pharmacist_by_id($id){
		$pharmacy_id=$this->session->userdata('pharmacy_id');
		
        $sql='SELECT * FROM farmacisti WHERE ref_farmacisti_pharmacy_id= '.$pharmacy_id.' and farmacisti_id='.$id;
        $result=$this->db->query($sql);
		
        return $result->row_array();
    }

    public function update_pharmacist_by_id($data,$id){
        $this->db->where('farmacisti_id',$id);
        return $this->db->update('farmacisti',$data);
    }
}