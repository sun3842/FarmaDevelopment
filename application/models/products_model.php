<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : Anwar Hossain
EMAIL ADDRESS: anwar.hossain.suman@gmail.com
*/

class Products_Model extends CI_Model
{
	public function __construct()
	{
		$this->load->database(); 
	}
	/*******************LOGIN RELATED******************************/
	
	public function get_products_list()
	{
		
		$query=$this->db->get('product');
		
		return $query->result_array();
	}
		
	public function get_product_details($product_id)
	{
		$query=$this->db->get_where('product', array('product_id'=>$product_id));
		return $query->row_array();
	}
//	public function get_new_product($product_id)
//	{
//		$query=$this->db->get_where('product_new', array('product_new_id'=>$product_id));
//		return $query->row_array();
//	}
//
	function get_password_reset_link($user_id,$email)
	{
		$this->db->trans_start();
		
		$valid_chars="AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz1234567890";
		$length=100;
		$random_String=$this->get_random_string($valid_chars, $length);
		
		$data=array(
		'ref_forgot_password_data_user_details_id'=>$user_id,
		'forgot_password_data_random_string'=>$random_String);
		
		$this->db->insert('forgot_password_data',$data);
		
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)
		{
			return 0;
		}
		else
		{
			//SEND EMAIL To User email Address
			$this->send_email($random_String,$email);
			return 1;
		}
	}
	
	function send_email($random_String,$email)
	{
			//<p><a href=$password_link>CLICK HERE</a></p>

		$mailacc = "anwar.hossain.suman@gmail.com";//$email;
		$password_link=base_url()."/".$random_String;
		$subject = "SWITCHY PASSWORD";
		$message = "
		<html>
		<head>
		<title>Password</title>
		</head>
		<body>
		</body>
		</html>
		";
		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: Noreply <noreply@switchyapp.com>' . "\r\n";
		
		$mail = mail($mailacc, $subject, $message, $headers);
	}




    function get_product_details_on_autocomplete($param)
    {
        $query = $this->db->query("SELECT *
                                    FROM final_product 
                                    LEFT JOIN product ON 
                                    final_product.ref_final_product_product_id=product.product_id                                    
                                    WHERE 
                                     (product_id  Like '%$param%') OR 
                                     (codice_catena  Like '%$param%') OR
                                     (codice_sito   Like '%$param%') OR
                                     (codinterno  Like '%$param%') OR
                                     (codminsan  Like '%$param%') OR
                                     (codean  Like '%$param%') OR
                                     (descrizione_h1 Like '%$param%') OR
                                     (descrizione_h2 Like '%$param%') OR
                                     (descrizione_ditta Like '%$param%') OR
                                     (prezzo_web_netto Like '%$param%') OR
                                     (prezzo_web_lordo Like '%$param%') OR
                                     (sconto_web Like '%$param%') 
                                     
                                     ");


        return $query->result_array();
//        return $this->db->last_query();
    }


function get_new_product($id)
{
    $this->db->order_by('product_new_id', 'desc');
    return $this->db->get_where('product_new',array('product_new_id'=>$id))->row_array();
}



    function add_product_with_all_info($params)
    {
        $this->db->insert('product_new',$params);
        return $this->db->insert_id();
    }
    function add_product_free_text($params){
        $this->db->insert('product_free_text',$params);
        return $this->db->insert_id();
    }
    function get_all_category(){
        $sql="SELECT * FROM category";
        $result=$this->db->query($sql);
        return $result->result_array();
    }

    function get_product_free_text($product_free_text_id)
    {
        return $this->db->get_where('product_free_text',array('product_free_text_id'=>$product_free_text_id))->row_array();
    }



    function get_new_products_list(){
        $sql='SELECT * FROM product_new 
LEFT JOIN pharmacy ON pharmacy_id=product_new_ref_pharmacy_id
WHERE product_new_active=1 AND product_new_ref_pharmacy_id='.$this->session->userdata('pharmacy_id').' OR product_new_ref_pharmacy_id IS NULL';
        if($this->session->userdata('pharmacy_id')==NULL){
            $sql='SELECT * FROM product_new
LEFT JOIN pharmacy ON pharmacy_id=product_new_ref_pharmacy_id
 WHERE product_new_active=1 AND product_new_ref_pharmacy_id IS NULL';
        }
        $result=$this->db->query($sql);
        return $result->result_array();

    }

    function get_free_products_list(){
        $sql='SELECT * FROM product_free_text
LEFT JOIN pharmacy ON pharmacy_id=ref_product_free_text_pharmacy_id
WHERE product_free_text_active=1 AND ref_product_free_text_pharmacy_id='.$this->session->userdata('pharmacy_id').' OR ref_product_free_text_pharmacy_id IS NULL';
        if($this->session->userdata('pharmacy_id')==NULL){
            $sql='SELECT * FROM product_free_text 
LEFT JOIN pharmacy ON pharmacy_id=ref_product_free_text_pharmacy_id 
WHERE product_free_text_active=1 AND ref_product_free_text_pharmacy_id IS NULL';
        }
        $result=$this->db->query($sql);
        return $result->result_array();
    }

    public function get_new_product_details($new_product_id){
        $sql='SELECT * FROM product_new WHERE product_new_id='.$new_product_id.' AND product_new_ref_pharmacy_id='.$this->session->userdata('pharmacy_id').' OR product_new_ref_pharmacy_id IS NULL';
        if($this->session->userdata('pharmacy_id')==NULL){
            $sql='SELECT * FROM product_new WHERE product_new_id='.$new_product_id;
        }
        $result=$this->db->query($sql);
        return $result->row_array();
    }

    public function update_product_with_all_info($params,$new_product_id){
        $this->db->where('product_new_id',$new_product_id);
        return $this->db->update('product_new',$params);
    }

    public function get_free_text_product_by_id($id){
        $sql='SELECT * FROM product_free_text WHERE product_free_text_id='.$id.' AND ref_product_free_text_pharmacy_id='.$this->session->userdata('pharmacy_id').' OR ref_product_free_text_pharmacy_id IS NULL';
        if($this->session->userdata('pharmacy_id')==NULL){
            $sql='SELECT * FROM product_free_text WHERE product_free_text_id='.$id;
        }
        $result=$this->db->query($sql);
        return $result->row_array();
    }

    public function update_product_free_text($params,$product_id){
        $this->db->where('product_free_text_id',$product_id);
        return $this->db->update('product_free_text',$params);
    }

    public function add_final_product($params){
        $this->db->insert('final_product',$params);
        return $this->db->insert_id();
    }

    public function get_order_by_free_text_product_id($id){
        $sql='SELECT fp.*,uop.*,uo.* FROM final_product AS fp
LEFT JOIN user_orders_product AS uop ON fp.final_product_id=uop.ref_user_orders_product_final_product_id
LEFT JOIN user_orders AS uo ON uop.ref_user_orders_product_user_orders_id=uo.user_orders_id
WHERE fp.ref_final_product_product_free_text_id='.$id.' AND uo.user_orders_is_delivered=0';
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function get_order_by_new_product_id($id){
        $sql='SELECT fp.*,uop.*,uo.* FROM final_product AS fp
LEFT JOIN user_orders_product AS uop ON fp.final_product_id=uop.ref_user_orders_product_final_product_id
LEFT JOIN user_orders AS uo ON uop.ref_user_orders_product_user_orders_id=uo.user_orders_id
WHERE fp.ref_final_product_product_new_id='.$id.' AND uo.user_orders_is_delivered=0';
        $result=$this->db->query($sql);
        return $result->result_array();
    }

    public function delete_new_product_by_id($params,$id){
        $this->db->where('product_new_id',$id);
        return $this->db->update('product_new',$params);
    }
    public function delete_final_product_by_new_product_id($params,$id){
        $this->db->where('ref_final_product_product_new_id',$id);
        return $this->db->update('final_product',$params);
    }

    public function delete_free_text_product_by_id($params,$id){
        $this->db->where('product_free_text_id',$id);
        return $this->db->update('product_free_text',$params);
    }
    public function delete_final_product_by_free_text_product_id($params,$id){
        $this->db->where('ref_final_product_product_free_text_id',$id);
        return $this->db->update('final_product',$params);
    }

}
	
	