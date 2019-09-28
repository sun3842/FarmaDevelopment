<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserType extends CI_Controller {
	
	public $user_type_id_label='User Type Id ';
	public $user_type_name_label='User Type Name ';
	public $user_type_description_label='User Type Description ';
	public $user_type_active_label='User Type Active ';


	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('user_type_model');
		$this->load->model('common_model');
		$this->load->library('form_validation');
		$this->load->library('session');
		
		if($this->session->userdata('login')!=1)
		{
			redirect(base_url());
		}
	}
	
	public function index()
	{	
	}
	
	public function create_user_type()
	{
		$data['content'] = 'user_type/add_user_type_form';
		$data['title'] = ' Create User_type';
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('user_type_name', 'user_type_name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('user_type_description', 'user_type_description', 'trim|xss_clean');
		$this->form_validation->set_rules('user_type_active', 'user_type_active', 'trim|required|xss_clean');
		
		
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->vars($data);
			$this->load->view('layout/switchy_main');
		} 
		else 
		{
			
		$query_data=array(
			'user_type_name' =>$this->input->post('user_type_name'),
			'user_type_description' =>$this->input->post('user_type_description'),
			'user_type_active' =>$this->input->post('user_type_active'),
				);
			
			//Transfering data to Model
			$this->user_type_model->user_type_insert($query_data);
			$data['message'] = 'Data Inserted Successfully';
			
			$this->load->vars($data);
			$this->load->view('layout/switchy_main');
		}
		
		
	}
		

	public function admin_user_type($limit=null)
	{
		$data['content'] = 'user_type/all_user_type_view';
		$data['title'] = 'User_type';
		$data['controller']=$this->router->fetch_class(); 	// class = controller
		$data['method']=$this->router->fetch_method();		// method
		$per_page=5;
		$limit=$this->uri->segment(4, 1);
		$data['query_result']=$this->user_type_model->get_all_user_type_list($limit,$per_page);	/* for view all data to admin */
		$total_rows=$this->user_type_model->no_of_rows_user_type_list();	/* get the total rows from the query */
		$url=base_url()."UserType/admin_user_type/page/";
		$data['paging']=$this->common_model->custom_pager($url,$per_page,$total_rows);

		$this->load->vars($data);
		$this->load->view('layout/switchy_main');
	}
			
	public function edit_user_type($id)
	{
	
		$data['content'] = 'user_type/edit_user_type_form';
		$data['title'] = "Edit User_type";
		
		$this->form_validation->set_rules('user_type_name', 'user_type_name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('user_type_description', 'user_type_description', 'trim|xss_clean');
		$this->form_validation->set_rules('user_type_active', 'user_type_active', 'trim|required|xss_clean');
		
		
			$edit_query_result=$this->user_type_model->get_user_type_by_id($id);
			$edit_query_result= $edit_query_result->result();
			$data['edit_query_result'] = $edit_query_result[0];
			
		
		if ($this->form_validation->run() == FALSE) 
		{
		
			$this->load->vars($data);
			$this->load->view('layout/switchy_main');
		} 
		else 
		{
			$query_data=array(
			'user_type_name' =>$this->input->post('user_type_name'),
			'user_type_description' =>$this->input->post('user_type_description'),
			'user_type_active' =>$this->input->post('user_type_active'),
				);
			
		
			//Transfering data to Model
			$this->user_type_model->user_type_update($query_data,$id);
			$data['message'] = 'Data Updated Successfully';
			
			$this->load->vars($data);
			$this->load->view('layout/switchy_main');
		}
		
	}
	
	public function view_user_type($id)
	{
	
		$data['content'] = 'user_type/single_user_type_view';
		$data['title'] = 'View User_type';
		$query_result=$this->user_type_model->get_user_type_by_id($id);
		$query_result= $query_result->result();
		$data['query_result'] = $query_result[0];
		$this->load->vars($data);
		$this->load->view('layout/switchy_main');
	}
	
	public function delete_app_user_details($id,$controller,$method)
	{
		$url=$controller."/".$method;
		$result=$this->app_user_details_model->delete_app_user_details_by_id($id);
		$msg=$result>0?"App_user_details deleted":"App_user_details not delete";
		$this->session->set_flashdata('msg', $msg);
		redirect($url);
			
	}
	

	
}
	
	

	
	
	