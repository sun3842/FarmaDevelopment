<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		
		
		
		
	}
	
	public function logout_function()
	{	$this->session->userdata = array();
        $this->session->sess_destroy();
        redirect(base_url());
	}
}

