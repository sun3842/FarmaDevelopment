<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('common_model');
		
		if($this->session->userdata('login')==1)
		{
			redirect(site_url('home'));
		}
		
		if($this->session->userdata('language'))
		{
			if($this->session->userdata('language')==LANG_EN)
			{
				$this->lang->load('login_en','english');
				$this->lang->load('login_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('login_it','italian');
				$this->lang->load('login_it','italian');
			}
			else
			{
				$this->lang->load('login_en','english');
				$this->lang->load('login_en','english');
			}
		}
		else
		{
			$this->lang->load('login_it','italian');
		    $this->lang->load('login_it','italian');
		}
		
			
	}
	
	public function index()
	{
		$data['content'] = 'login';
		$this->load->view('login');
	}
	
	public function login_check()
	{
		
		$status=$this->common_model->db_login_authentication();
		
		if($status==1)
		{
			redirect(site_url('home'));
		}
		else
		{
			$this->load->view('login_auth');
		}
	}
	function set_language($language_name)
	{
		$this->session->set_userdata('language',$language_name);
		
		
		redirect(base_url());
	}
	
	function get_reset_password_link()
	{
		$this->load->helper('email');
		
		if($this->input->post('email'))
		{
			if (valid_email($this->input->post('email')))
			{
				//Check this email address is already exist or not
				$status=$this->common_model->check_user_email_address_for_sending_reset_password_link(trim($this->input->post('email')));
			}
			else
			{
				//Please Input valid email Address
				echo 'email is not valid';
			}
		}
		else
		{
			//Please Input valid email Address
			//redirect(base_url());
		}
		


	}
	
	public function reset_password($random_string="")
	{
		if(!empty($random_string))
		{
			if($this->input->post('save_new_pasword'))
			{
				
			}
			else
			{
				$this->load->view('reset_password_form');
			}
		}
		else
		{
			redirect(base_url());
		}
	}
	
}
	
	