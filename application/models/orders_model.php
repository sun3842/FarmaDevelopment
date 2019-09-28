<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');

class orders_model extends CI_Model{

    public function get_all_orders(){

        //for super admin
        $sql='SELECT uo.*,uop.*,fp.*,p.*,np.*,pf.*,appu.*,appup.*,appud.*,phar.* FROM user_orders AS uo
INNER JOIN user_orders_product AS uop ON uop.ref_user_orders_product_user_orders_id=uo.user_orders_id
INNER JOIN final_product AS fp ON uop.ref_user_orders_product_final_product_id=fp.final_product_id
LEFT JOIN product AS p ON p.product_id=fp.ref_final_product_product_id
LEFT JOIN product_new AS np ON fp.ref_final_product_product_new_id=np.product_new_id
LEFT JOIN product_free_text AS pf ON fp.ref_final_product_product_free_text_id=pf.product_free_text_id
INNER JOIN app_user AS appu ON appu.app_user_id=uo.ref_user_orders_app_user_id
INNER JOIN app_user_pharmacy AS appup ON appu.app_user_id=appup.ref_app_user_pharmacy_app_user_id
INNER JOIN app_user_details AS appud ON appu.app_user_id=appud.ref_app_user_details_app_user_id
INNER JOIN pharmacy as phar ON phar.pharmacy_id=appup.ref_app_user_pharmacy_app_user_id
WHERE (p.product_added_by_super_admin=0 AND np.product_new_ref_pharmacy_id IS NULL OR pf.product_free_text_from_farma=1) GROUP BY uo.user_orders_id
ORDER BY uo.user_orders_is_delivered ,uo.user_orders_date_time';
        if($this->session->userdata('pharmacy_id')!=NULL){
            //for pharmacy admin
            $sql='SELECT uo.*,uop.*,fp.*,p.*,np.*,pf.*,appu.*,appup.*,appud.* FROM user_orders AS uo
INNER JOIN user_orders_product AS uop ON uop.ref_user_orders_product_user_orders_id=uo.user_orders_id
INNER JOIN final_product AS fp ON uop.ref_user_orders_product_final_product_id=fp.final_product_id
LEFT JOIN product AS p ON p.product_id=fp.ref_final_product_product_id
LEFT JOIN product_new AS np ON fp.ref_final_product_product_new_id=np.product_new_id
LEFT JOIN product_free_text AS pf ON fp.ref_final_product_product_free_text_id=pf.product_free_text_id
INNER JOIN app_user AS appu ON appu.app_user_id=uo.ref_user_orders_app_user_id
INNER JOIN app_user_pharmacy AS appup ON appu.app_user_id=appup.ref_app_user_pharmacy_app_user_id
INNER JOIN app_user_details AS appud ON appu.app_user_id=appud.ref_app_user_details_app_user_id
WHERE appup.ref_app_user_pharmacy_pharmacy_id='.$this->session->userdata('pharmacy_id').' GROUP BY uo.user_orders_id
ORDER BY uo.user_orders_is_delivered ,uo.user_orders_date_time';
        }
        $result=$this->db->query($sql);
        return $result->result_array();
    }

    public function get_all_pending_orders(){

        //for super admin
        $sql='SELECT uo.*,uop.*,fp.*,p.*,np.*,pf.*,appu.*,appup.*,appud.* FROM user_orders AS uo
INNER JOIN user_orders_product AS uop ON uop.ref_user_orders_product_user_orders_id=uo.user_orders_id
INNER JOIN final_product AS fp ON uop.ref_user_orders_product_final_product_id=fp.final_product_id
LEFT JOIN product AS p ON p.product_id=fp.ref_final_product_product_id
LEFT JOIN product_new AS np ON fp.ref_final_product_product_new_id=np.product_new_id
LEFT JOIN product_free_text AS pf ON fp.ref_final_product_product_free_text_id=pf.product_free_text_id
INNER JOIN app_user AS appu ON appu.app_user_id=uo.ref_user_orders_app_user_id
INNER JOIN app_user_pharmacy AS appup ON appu.app_user_id=appup.ref_app_user_pharmacy_app_user_id
INNER JOIN app_user_details AS appud ON appu.app_user_id=appud.ref_app_user_details_app_user_id
WHERE uo.user_orders_is_delivered=0 AND (p.product_added_by_super_admin=0 AND np.product_new_ref_pharmacy_id IS NULL OR pf.product_free_text_from_farma=1) GROUP BY uo.user_orders_id';
        if($this->session->userdata('pharmacy_id')!=NULL){
            //for pharmacy admin
            $sql='SELECT uo.*,uop.*,fp.*,p.*,np.*,pf.*,appu.*,appup.*,appud.* FROM user_orders AS uo
INNER JOIN user_orders_product AS uop ON uop.ref_user_orders_product_user_orders_id=uo.user_orders_id
INNER JOIN final_product AS fp ON uop.ref_user_orders_product_final_product_id=fp.final_product_id
LEFT JOIN product AS p ON p.product_id=fp.ref_final_product_product_id
LEFT JOIN product_new AS np ON fp.ref_final_product_product_new_id=np.product_new_id
LEFT JOIN product_free_text AS pf ON fp.ref_final_product_product_free_text_id=pf.product_free_text_id
INNER JOIN app_user AS appu ON appu.app_user_id=uo.ref_user_orders_app_user_id
INNER JOIN app_user_pharmacy AS appup ON appu.app_user_id=appup.ref_app_user_pharmacy_app_user_id
INNER JOIN app_user_details AS appud ON appu.app_user_id=appud.ref_app_user_details_app_user_id
WHERE uo.user_orders_is_delivered=0 AND appup.ref_app_user_pharmacy_pharmacy_id='.$this->session->userdata('pharmacy_id').' GROUP BY uo.user_orders_id';
        }
        $result=$this->db->query($sql);
        return $result->result_array();
    }

    public function get_order_products_by_order_id($order_id){
            $sql='SELECT uop.*,fp.*,p.*,np.*,pf.* FROM user_orders_product AS uop
INNER JOIN final_product AS fp ON uop.ref_user_orders_product_final_product_id=fp.final_product_id
LEFT JOIN product AS p ON p.product_id=fp.ref_final_product_product_id
LEFT JOIN product_new AS np ON fp.ref_final_product_product_new_id=np.product_new_id
LEFT JOIN product_free_text AS pf ON fp.ref_final_product_product_free_text_id=pf.product_free_text_id
WHERE uop.ref_user_orders_product_user_orders_id='.$order_id;
            $result=$this->db->query($sql);
            return $result->result_array();
    }


    public function get_app_user_by_order_id($order_id){
            $sql='SELECT uo.*,appu.*,appup.*,appud.* FROM user_orders AS uo
INNER JOIN app_user AS appu ON appu.app_user_id=uo.ref_user_orders_app_user_id
INNER JOIN app_user_pharmacy AS appup ON appu.app_user_id=appup.ref_app_user_pharmacy_app_user_id
INNER JOIN app_user_details AS appud ON appu.app_user_id=appud.ref_app_user_details_app_user_id
WHERE uo.user_orders_id='.$order_id;
        $result=$this->db->query($sql);
        return $result->row_array();
    }

    public function update_order_by_id($params,$order_id){
        $this->db->where('user_orders_id',$order_id);
        return $this->db->update('user_orders',$params);
    }

}
