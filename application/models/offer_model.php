<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');


class Offer_Model extends CI_Model
{
	
	
	public function __construct()
	{
	
		$this->load->database(); 
	}

    /*
        * Get offer_product by offer_products_id
        */
    function get_offer_product($offer_products_id)
    {
        return $this->db->get_where('offer_products',array('offer_products_id'=>$offer_products_id))->row_array();
    }

    /*
     * Get all offer_products
     */
    function get_all_offer_pdf_products()
    {
        $this->db->order_by('offer_products_id', 'desc');
        return $this->db->get_where('offer_products',array('offer_products_type'=>1,'offer_products_active'=>1))->result_array();
    }

//    function get_all_offer_pdf()
//    {
//        $this->db->order_by('offer_pdf_id', 'desc');
//        return $this->db->get_where('offer_pdf',array('offer_pdf_active'=>1))->result_array();
//    }

    function get_all_final_products_pdf()
    {
        $this->db->order_by('offer_products_id', 'desc');
        return $this->db->get_where('offer_products',array('offer_products_type'=>1,'offer_products_active'=>1))->result_array();
    }


    function get_all_offer_products()
    {


        $sessionId=$this->session->userdata('pharmacy_id');
        $sql="SELECT * FROM offer_products
LEFT JOIN pharmacy ON pharmacy_id=ref_offer_products_pharmacy_id
 WHERE ref_offer_products_offerr_pdf_id IS NULL AND ref_offer_products_pharmacy_id =$sessionId AND offer_products_active=1";
        if($this->session->userdata('pharmacy_id')==NULL){
            $sql="SELECT * FROM offer_products
LEFT JOIN pharmacy ON pharmacy_id=ref_offer_products_pharmacy_id
 WHERE ref_offer_products_offerr_pdf_id IS NULL AND  ref_offer_products_pharmacy_id IS NULL AND offer_products_active=1";
        }
        $result=$this->db->query($sql);
        return $result->result_array();

    }


    function get_all_pdf_offer_products($id)
    {


        $sessionId=$this->session->userdata('pharmacy_id');
        $sql="SELECT * FROM offer_products WHERE ref_offer_products_offerr_pdf_id =$id AND ref_offer_products_pharmacy_id =$sessionId  ";
        if($this->session->userdata('pharmacy_id')==NULL){
            $sql="SELECT * FROM offer_products WHERE ref_offer_products_offerr_pdf_id =$id AND  ref_offer_products_pharmacy_id IS NULL ";
        }
        $result=$this->db->query($sql);
        return $result->result_array();

    }


    function get_offer_of_the_product($id)
    {


        $sql="SELECT * FROM offer_products WHERE ref_offer_products_final_product_id = $id AND CURRENT_DATE BETWEEN offer_products_starting_date_time AND offer_products_ending_date_time ";
        $result=$this->db->query($sql);
        return $result->result_array();


    }


    function get_final_product($id)
    {
        $this->db->order_by('final_product_id', 'desc');
        return $this->db->get_where('final_product',array('final_product_id'=>$id))->row_array();
    }

    function get_all_offer_free_text_products()
    {
        $this->db->order_by('offer_products_id', 'desc');
        return $this->db->get_where('offer_products',array('offer_products_type'=>2,'offer_products_active'=>1))->result_array();
    }

    function get_all_offer_from_network()
    {
        $this->db->order_by('offer_products_id', 'desc');
        return $this->db->get_where('offer_products',array('offer_products_type'=>0,'offer_products_active'=>1))->result_array();
    }

    /*
     * function to add new offer_product
     */
    function add_offer_product($params)
    {
        $this->db->insert('offer_products',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update offer_product
     */
    function update_offer_product($offer_products_id,$params)
    {
        $this->db->where('offer_products_id',$offer_products_id);
        return $this->db->update('offer_products',$params);
    }

    /*
     * function to delete offer_product
     */
    function delete_offer_product($offer_products_id)
    {
        return $this->db->delete('offer_products',array('offer_products_id'=>$offer_products_id));
    }

    function get_offer_pdf($offer_pdf_id)
    {
        return $this->db->get_where('offer_pdf',array('offer_pdf_id'=>$offer_pdf_id))->row_array();
    }

    /*
     * Get all offer_pdf
     */
    function get_all_offer_pdf()
    {
        $sessionId=$this->session->userdata('pharmacy_id');
        $sql="SELECT * FROM offer_pdf
LEFT JOIN pharmacy ON pharmacy_id=ref_offer_pdf_pharmacy_id
 WHERE  ref_offer_pdf_pharmacy_id =$sessionId AND offer_pdf_active=1";
        if($this->session->userdata('pharmacy_id')==NULL){
            $sql="SELECT * FROM offer_pdf
LEFT JOIN pharmacy ON pharmacy_id=ref_offer_pdf_pharmacy_id
 WHERE ref_offer_pdf_pharmacy_id IS NULL AND offer_pdf_active=1";
        }
        $result=$this->db->query($sql);
        return $result->result_array();


    }

    /*
     * function to add new offer_pdf
     */
    function add_offer_pdf($params)
    {
        $this->db->insert('offer_pdf',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update offer_pdf
     */
    function update_offer_pdf($offer_pdf_id,$params)
    {
        $this->db->where('offer_pdf_id',$offer_pdf_id);
        return $this->db->update('offer_pdf',$params);
    }

    /*
     * function to delete offer_pdf
     */
    function delete_offer_pdf($offer_pdf_id)
    {
        return $this->db->delete('offer_pdf',array('offer_pdf_id'=>$offer_pdf_id));
    }
	
	
}
	