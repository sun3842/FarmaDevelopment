<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PharmacyUsers extends CI_Controller {
	
	public $views_folder_name;

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('common_model');
		$this->load->model('pharmacyusers_model');
		$this->load->library('session');
		/*
		if($this->session->userdata('login')!=1 && $this->session->userdata('user_type')!=USER_TYPE_SUPER_ADMIN)
		{
			redirect(base_url());
		}
		*/
		if($this->session->userdata('login')!=1)
		{
			redirect(base_url());
		}
		
		if($this->session->userdata('language'))
		{
			if($this->session->userdata('language')==LANG_EN)
			{
				$this->lang->load('menu_en','english');
				
				$this->lang->load('pharmacyusers_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				
				$this->lang->load('pharmacyusers_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				
				$this->lang->load('pharmacyusers_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
				
			$this->lang->load('pharmacyusers_it','italian');
		}
	}
	
	public function pharmacy_user_list_page()
	{
		
		
		$data['content'] = 'pharmacy_users/pharmacy_users_list';
		
		$data['user_list']=$this->pharmacyusers_model->get_user_list();
		$this->load->vars($data);
		$this->load->view('layout/switchy_main');
		$this->load->view('pharmacy_users/pharmacy_users_list_js');
	}
	
	
	
	public function pharmacy_user_details_page($admin_user_id=0)
	{
		if($admin_user_id==0 && !ctype_digit($admin_user_id))
		{
			redirect(base_url());
		}
		
		$data['content'] = 'pharmacy_users/pharmacy_user_details';
		
		$data['pharmacy_user']=$this->pharmacyusers_model->get_user_details_by_user_id($admin_user_id);
		$this->load->vars($data);
		$this->load->view('layout/switchy_main');
		$this->load->view('pharmacy_users/pharmacy_user_details_js');
	}
	
	
}
	
	