<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AppUserDetails extends CI_Controller {
	
	public $ref_app_user_details_app_user_id_label='Ref App User Details App User Id ';
	public $app_user_first_name_label='App User First Name ';
	public $app_user_last_name_label='App User Last Name ';
	public $app_user_birth_date_label='App User Birth Date ';
	public $app_user_sex_label='App User Sex ';
	public $app_user_address_label='App User Address ';
	public $app_user_city_label='App User City ';
	public $app_user_post_code_label='App User Post Code ';
	public $app_user_country_label='App User Country ';
	public $app_user_email_label='App User Email ';
	public $app_user_cell_phone_label='App User Cell Phone ';
	public $app_user_registration_date_time_label='App User Registration Date Time ';
	public $app_user_registration_editing_date_time_label='App User Registration Editing Date Time ';
	
	public $views_folder_name;


	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('app_user_details_model');
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
	
	public function create_app_user_details()
	{
		$data['content'] = 'app_user_details/add_app_user_details_form';
		$data['title'] = ' Create App_user_details';
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('app_user_first_name', 'app_user_first_name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('app_user_last_name', 'app_user_last_name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('app_user_birth_date', 'app_user_birth_date', 'trim|xss_clean');
		$this->form_validation->set_rules('app_user_sex', 'app_user_sex', 'trim|xss_clean');
		$this->form_validation->set_rules('app_user_address', 'app_user_address', 'trim|xss_clean');
		$this->form_validation->set_rules('app_user_city', 'app_user_city', 'trim|xss_clean');
		$this->form_validation->set_rules('app_user_post_code', 'app_user_post_code', 'trim|xss_clean');
		$this->form_validation->set_rules('app_user_country', 'app_user_country', 'trim|xss_clean');
		$this->form_validation->set_rules('app_user_email', 'app_user_email', 'trim|xss_clean');
		$this->form_validation->set_rules('app_user_cell_phone', 'app_user_cell_phone', 'trim|xss_clean');
		$this->form_validation->set_rules('app_user_registration_date_time', 'app_user_registration_date_time', 'trim|required|xss_clean');
		$this->form_validation->set_rules('app_user_registration_editing_date_time', 'app_user_registration_editing_date_time', 'trim|required|xss_clean');
		
		
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->vars($data);
			$this->load->view('layout/switchy_main');
		} 
		else 
		{
			
		$query_data=array(
			'app_user_first_name' =>$this->input->post('app_user_first_name'),
			'app_user_last_name' =>$this->input->post('app_user_last_name'),
			'app_user_birth_date' =>$this->input->post('app_user_birth_date'),
			'app_user_sex' =>$this->input->post('app_user_sex'),
			'app_user_address' =>$this->input->post('app_user_address'),
			'app_user_city' =>$this->input->post('app_user_city'),
			'app_user_post_code' =>$this->input->post('app_user_post_code'),
			'app_user_country' =>$this->input->post('app_user_country'),
			'app_user_email' =>$this->input->post('app_user_email'),
			'app_user_cell_phone' =>$this->input->post('app_user_cell_phone'),
			'app_user_registration_date_time' =>$this->input->post('app_user_registration_date_time'),
			'app_user_registration_editing_date_time' =>$this->input->post('app_user_registration_editing_date_time'),
				);
			
			//Transfering data to Model
			$this->app_user_details_model->app_user_details_insert($query_data);
			$data['message'] = 'Data Inserted Successfully';
			
			$this->load->vars($data);
			$this->load->view('layout/switchy_main');
		}
		
		
	}
		

	public function admin_app_user_details($limit=null)
	{
		$data['content'] = 'app_user_details/all_app_user_details_view';
		$data['title'] = 'App_user_details';
		$data['controller']=$this->router->fetch_class(); 	// class = controller
		$data['method']=$this->router->fetch_method();		// method
		$per_page=5;
		$limit=$this->uri->segment(4, 1);
		$data['query_result']=$this->app_user_details_model->get_all_app_user_details_list($limit,$per_page);	/* for view all data to admin */
		$total_rows=$this->app_user_details_model->no_of_rows_app_user_details_list();	/* get the total rows from the query */
		$url=base_url()."AppUserDetails/admin_app_user_details/page/";
		$data['paging']=$this->common_model->custom_pager($url,$per_page,$total_rows);

		$this->load->vars($data);
		$this->load->view('layout/switchy_main');
	}
			
	public function edit_app_user_details($id)
	{
	
		$data['content'] = 'app_user_details/edit_app_user_details_form';
		$data['title'] = "Edit App_user_details";
		
		$this->form_validation->set_rules('app_user_first_name', 'app_user_first_name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('app_user_last_name', 'app_user_last_name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('app_user_birth_date', 'app_user_birth_date', 'trim|xss_clean');
		$this->form_validation->set_rules('app_user_sex', 'app_user_sex', 'trim|xss_clean');
		$this->form_validation->set_rules('app_user_address', 'app_user_address', 'trim|xss_clean');
		$this->form_validation->set_rules('app_user_city', 'app_user_city', 'trim|xss_clean');
		$this->form_validation->set_rules('app_user_post_code', 'app_user_post_code', 'trim|xss_clean');
		$this->form_validation->set_rules('app_user_country', 'app_user_country', 'trim|xss_clean');
		$this->form_validation->set_rules('app_user_email', 'app_user_email', 'trim|xss_clean');
		$this->form_validation->set_rules('app_user_cell_phone', 'app_user_cell_phone', 'trim|xss_clean');
		$this->form_validation->set_rules('app_user_registration_date_time', 'app_user_registration_date_time', 'trim|required|xss_clean');
		$this->form_validation->set_rules('app_user_registration_editing_date_time', 'app_user_registration_editing_date_time', 'trim|required|xss_clean');
		
		
			$edit_query_result=$this->app_user_details_model->get_app_user_details_by_id($id);
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
			'app_user_first_name' =>$this->input->post('app_user_first_name'),
			'app_user_last_name' =>$this->input->post('app_user_last_name'),
			'app_user_birth_date' =>$this->input->post('app_user_birth_date'),
			'app_user_sex' =>$this->input->post('app_user_sex'),
			'app_user_address' =>$this->input->post('app_user_address'),
			'app_user_city' =>$this->input->post('app_user_city'),
			'app_user_post_code' =>$this->input->post('app_user_post_code'),
			'app_user_country' =>$this->input->post('app_user_country'),
			'app_user_email' =>$this->input->post('app_user_email'),
			'app_user_cell_phone' =>$this->input->post('app_user_cell_phone'),
			'app_user_registration_date_time' =>$this->input->post('app_user_registration_date_time'),
			'app_user_registration_editing_date_time' =>$this->input->post('app_user_registration_editing_date_time'),
				);
			
		
			//Transfering data to Model
			$this->app_user_details_model->app_user_details_update($query_data,$id);
			$data['message'] = 'Data Updated Successfully';
			
			$this->load->vars($data);
			$this->load->view('layout/switchy_main');
		}
		
	}
	
	public function view_app_user_details($id)
	{
	
		$data['content'] = 'app_user_details/single_app_user_details_view';
		$data['title'] = 'View App_user_details';
		$query_result=$this->app_user_details_model->get_app_user_details_by_id($id);
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
	
	

	
	
	