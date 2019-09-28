<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {
	

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('account_model');
		$this->load->model('common_model');
		$this->load->library('form_validation');
		$this->load->library('session');
		
		if($this->session->userdata('login')!=1)
		{
			redirect(base_url());
		}
		if($this->session->userdata('language'))
		{
			if($this->session->userdata('language')==LANG_EN)
			{
				$this->lang->load('account_en','english');
				$this->lang->load('menu_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('account_it','italian');
				$this->lang->load('menu_it','italian');
			}
			else
			{
				$this->lang->load('account_it','italian');
				$this->lang->load('menu_it','italian');
			}
		}
		else
		{
			$this->lang->load('account_it','italian');
			$this->lang->load('menu_it','italian');
		}
	}
	
	public function index()
	{	
	}
	
	public function create_account()
	{
		/* $data['content'] = 'account/add_account_form';
		$data['title'] = ' Create Account';
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('ref_user_details_user_type_id', $this->ref_user_details_user_type_id_label, 'trim|required|xss_clean');
		$this->form_validation->set_rules('user_details_first_name', $this->user_details_first_name_label, 'trim|required|xss_clean');
		$this->form_validation->set_rules('user_details_last_name', $this->user_details_last_name_label, 'trim|required|xss_clean');
		$this->form_validation->set_rules('user_details_user_name', $this->user_details_user_name_label, 'trim|required|xss_clean');
		$this->form_validation->set_rules('user_details_password_hash_value', $this->user_details_password_hash_value_label, 'trim|required|xss_clean');
		$this->form_validation->set_rules('user_details_sex', $this->user_details_sex_label, 'trim|xss_clean');
		$this->form_validation->set_rules('user_details_email', $this->user_details_email_label, 'trim|xss_clean');
		$this->form_validation->set_rules('user_details_cell_phone', $this->user_details_cell_phone_label, 'trim|xss_clean');
		$this->form_validation->set_rules('user_details_created_by_user_details_id', $this->user_details_created_by_user_details_id_label, 'trim|required|xss_clean');
		$this->form_validation->set_rules('user_details_created_date_time', $this->user_details_created_date_time_label, 'trim|required|xss_clean');
		$this->form_validation->set_rules('user_details_edited_by_user_details_id', $this->user_details_edited_by_user_details_id_label, 'trim|xss_clean');
		$this->form_validation->set_rules('user_details_edited_date_time', $this->user_details_edited_date_time_label, 'trim|required|xss_clean');
		$this->form_validation->set_rules('user_details_active', $this->user_details_active_label, 'trim|xss_clean');
		
		
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->vars($data);
			$this->load->view('layout/switchy_main');
		} 
		else 
		{
			
		$query_data=array(
			'ref_user_details_user_type_id' =>$this->input->post('ref_user_details_user_type_id'),
			'user_details_first_name' =>$this->input->post('user_details_first_name'),
			'user_details_last_name' =>$this->input->post('user_details_last_name'),
			'user_details_user_name' =>$this->input->post('user_details_user_name'),
			'user_details_password_hash_value' =>$this->input->post('user_details_password_hash_value'),
			'user_details_sex' =>$this->input->post('user_details_sex'),
			'user_details_email' =>$this->input->post('user_details_email'),
			'user_details_cell_phone' =>$this->input->post('user_details_cell_phone'),
			'user_details_created_by_user_details_id' =>$this->input->post('user_details_created_by_user_details_id'),
			'user_details_created_date_time' =>$this->input->post('user_details_created_date_time'),
			'user_details_edited_by_user_details_id' =>$this->input->post('user_details_edited_by_user_details_id'),
			'user_details_edited_date_time' =>$this->input->post('user_details_edited_date_time'),
			'user_details_active' =>$this->input->post('user_details_active'),
				);
			
			//Transfering data to Model
			$this->account_model->account_insert($query_data);
			$data['message'] = 'Data Inserted Successfully';
			
			$this->load->vars($data);
			$this->load->view('layout/switchy_main');
		}
		 */
		
	}
		

	public function admin_account($limit=null)
	{
		$data['content'] = 'account/all_account_view';
		$data['title'] = $this->lang->line('account'); 

		$per_page=5;
		$limit=$this->uri->segment(3, 1);
		$data['query_result']=$this->account_model->get_all_account_list($limit,$per_page);	/* for view all data to admin */
		$total_rows=$this->account_model->no_of_rows_account_list();	/* get the total rows from the query */
		$url=base_url()."account/page/";
		$data['paging']=$this->common_model->custom_pager($url,$per_page,$total_rows);

		$this->load->vars($data);
		$this->load->view('layout/switchy_main');
	}
			
	public function edit_account($id)
	{
	
		$data['content'] = 'account/all_account_view';;
		
		$this->form_validation->set_rules('ref_user_details_user_type_id', $this->ref_user_details_user_type_id_label, 'trim|required|xss_clean');
		$this->form_validation->set_rules('user_details_first_name', $this->user_details_first_name_label, 'trim|required|xss_clean');
		$this->form_validation->set_rules('user_details_last_name', $this->user_details_last_name_label, 'trim|required|xss_clean');
		//$this->form_validation->set_rules('user_details_user_name', $this->user_details_user_name_label, 'trim|required|xss_clean');
		$this->form_validation->set_rules('user_details_password_hash_value', $this->user_details_password_hash_value_label, 'trim|required|xss_clean');
		$this->form_validation->set_rules('user_details_sex', $this->user_details_sex_label, 'trim|xss_clean');
		$this->form_validation->set_rules('user_details_email', $this->user_details_email_label, 'trim|xss_clean');
		$this->form_validation->set_rules('user_details_cell_phone', $this->user_details_cell_phone_label, 'trim|xss_clean');
		$this->form_validation->set_rules('user_details_created_by_user_details_id', $this->user_details_created_by_user_details_id_label, 'trim|required|xss_clean');
		$this->form_validation->set_rules('user_details_created_date_time', $this->user_details_created_date_time_label, 'trim|required|xss_clean');
		$this->form_validation->set_rules('user_details_edited_by_user_details_id', $this->user_details_edited_by_user_details_id_label, 'trim|xss_clean');
		$this->form_validation->set_rules('user_details_edited_date_time', $this->user_details_edited_date_time_label, 'trim|required|xss_clean');
		$this->form_validation->set_rules('user_details_active', $this->user_details_active_label, 'trim|xss_clean');
		
		
		/* 	$edit_query_result=$this->account_model->get_account_by_id($id);
			$edit_query_result= $edit_query_result->result();
			$data['edit_query_result'] = $edit_query_result[0]; */
			
		
		if ($this->form_validation->run() == FALSE) 
		{
		
			$this->load->vars($data);
			$this->load->view('layout/switchy_main');
		} 
		else 
		{

			$pass_value=$this->common_model->create_hash($this->input->post('user_details_password_hash_value'));
			$query_data=array(
			'ref_user_details_user_type_id' =>$this->input->post('ref_user_details_user_type_id'),
			'user_details_first_name' =>$this->input->post('user_details_first_name'),
			'user_details_last_name' =>$this->input->post('user_details_last_name'),
			//'user_details_user_name' =>$this->input->post('user_details_user_name'),
			'user_details_password_hash_value' =>$pass_value,
			'user_details_sex' =>$this->input->post('user_details_sex'),
			'user_details_email' =>$this->input->post('user_details_email'),
			'user_details_cell_phone' =>$this->input->post('user_details_cell_phone'),
			'user_details_created_by_user_details_id' =>$this->input->post('user_details_created_by_user_details_id'),
			'user_details_created_date_time' =>$this->input->post('user_details_created_date_time'),
			'user_details_edited_date_time' =>$this->input->post('user_details_edited_date_time'),
			'user_details_active' =>1,
				);
			
		
			//Transfering data to Model
			$this->account_model->account_update($query_data,$id);
		
			//$msg = 'Data Edited Successfully';
			$msg="";
			$this->session->set_flashdata('msg', $msg);
			redirect("account/");
		}
		
	}
	
	public function view_account($id)
	{
	
		$data['content'] = 'account/single_account_view';
		$data['title'] = 'View Account';
		$query_result=$this->account_model->get_account_by_id($id);
		$query_result= $query_result->result();
		$data['query_result'] = $query_result[0];
		$this->load->vars($data);
		$this->load->view('layout/switchy_main');
	}
	
/* 	public function delete_account($id,$url)
	{
		$result=$this->account_model->delete_account_by_id($id);
		$msg=$result>0?"Account deleted":"Account not delete";
		$this->session->set_flashdata('msg', $msg);
		redirect($url);
			
	}
	
	public function change_status($id,$status,$url)
	{
	$status=$status==0?1:0;	
	$data = array(
			'user_details_id' => $status,
			);
	$this->account_model->status_update($id,$data);
	$status=$status==0?"Inactive":"Active";
	$msg = "Id #$id is now $status";
	$this->session->set_flashdata('msg', $msg);
	redirect($url);
	}	
  */

	
}
	
	

	
	
	