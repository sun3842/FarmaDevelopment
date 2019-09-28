<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Language extends CI_Controller {
	
	


	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		
		$this->load->model('common_model');
		$this->load->library('session');
		$this->load->library('image_lib');
		
		if($this->session->userdata('login')!=1)
		{
			redirect(base_url());
		}
		
	}
	
	function set_language($language_name,$url=NULL,$others=NULL)
	{
		$this->session->set_userdata('language',$language_name);
		
		if($url==NULL)$url=base_url();
		if($others!=NULL)$url=$url."/".$others;
		redirect($url);
	}
	
}