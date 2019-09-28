<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('orders_model');
        $this->load->model('common_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('image_lib');
        $this->load->library('upload');

        if($this->session->userdata('login')!=1)
        {
            redirect(base_url());
        }



        if($this->session->userdata('language'))
        {
            if($this->session->userdata('language')==LANG_EN)
            {
                $this->lang->load('menu_en','english');
                $this->lang->load('orders_en','english');

            }
            else if($this->session->userdata('language')==LANG_IT)
            {
                $this->lang->load('menu_it','italian');
                $this->lang->load('orders_it','italian');

            }
            else
            {
                $this->lang->load('menu_it','italian');
                $this->lang->load('orders_it','italian');

            }
        }
        else
        {
            $this->lang->load('menu_it','italian');
            $this->lang->load('orders_it','italian');

        }
    }
    public function index(){

    }
    public function view_all_orders(){
        $data['orders']=$this->orders_model->get_all_orders();
        $data['content']='orders/view_all_orders_page';
        $this->load->vars($data);
        $this->load->view('layout/switchy_main');
    }


    public function order_details_page($order_id){
        if($this->session->userdata('pharmacy_id')!=NULL){
            $params=array(
                'user_orders_is_seen_pharmacy_admin'=>1
            );
            $this->orders_model->update_order_by_id($params,$order_id);
        }
        else{
            $params=array(
                'user_orders_is_seen_super_admin'=>1
            );
            $this->orders_model->update_order_by_id($params,$order_id);
        }
        $data['products']=$this->orders_model->get_order_products_by_order_id($order_id);
        $data['user']=$this->orders_model->get_app_user_by_order_id($order_id);
        $data['content']='orders/order_details_page';
        $this->load->vars($data);
        $this->load->view('layout/switchy_main');
        $this->load->view('orders/order_details_page_js');
    }

    public function deliver_order_by_id($order_id){
        $current_date=date('Y-m-d h:i:sa');
        $params=array(
            'user_orders_is_delivered'=>1,
            'user_orders_delivery_date_time'=>$current_date,
            'user_orders_delivery_text'=>$this->input->post('delivery_message')
        );
        $this->orders_model->update_order_by_id($params,$order_id);

        redirect(base_url('view_all_orders'));
    }
    public function return_order_by_id($id){
        $params=array(
            'user_orders_is_delivered'=>0,
            'user_orders_delivery_date_time'=>NULL,
            'user_orders_delivery_text'=>''
        );
        $this->orders_model->update_order_by_id($params,$id);

        redirect(base_url('view_all_orders'));
    }
}