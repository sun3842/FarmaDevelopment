<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public $views_folder_name;

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('common_model');
		$this->load->model('home_model');
		$this->load->library('session');
		
		if($this->session->userdata('login')!=1)
		{
			redirect(base_url());
		}
		
		if($this->session->userdata('language'))
		{
			if($this->session->userdata('language')==LANG_EN)
			{
				$this->lang->load('menu_en','english');
				
				$this->lang->load('home_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				
				$this->lang->load('home_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				
				$this->lang->load('home_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
				
			$this->lang->load('home_it','italian');
		}
	}
	
	public function index()
	{
		$data['content'] = 'home';
		
		//$data['images']=$this->common_model->get_randomly_gallery_images();
		
		//$data['branch_details']=$this->common_model->get_head_branch_details();
		
		$this->load->vars($data);
		$this->load->view('layout/switchy_main');
		$this->load->view('home_js');
	}
	
	
}
	
	