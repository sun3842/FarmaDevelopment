<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feedback extends CI_Controller {
	
	


	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('feedback_model');
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
				$this->lang->load('menu_en','english');
				$this->lang->load('feedback_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('feedback_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('feedback_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
			$this->lang->load('feedback_it','italian');
		}
		
	}
	
	public function index()
	{	
	}
	
	/*
	public function create_feedback()
	{
		$data['content'] = 'feedback/add_feedback_form';
		$data['title'] = ' Create Feedback';
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('ref_feedback_app_user_id', $this->ref_feedback_app_user_id_label, 'trim|required|xss_clean');
		$this->form_validation->set_rules('feedback_rating_score', $this->feedback_rating_score_label, 'trim|required|xss_clean');
		$this->form_validation->set_rules('feedback_note', $this->feedback_note_label, 'trim|required|xss_clean');
		$this->form_validation->set_rules('feedback_giving_date_time', $this->feedback_giving_date_time_label, 'trim|required|xss_clean');
		$this->form_validation->set_rules('feedback_is_approved_by_admin', $this->feedback_is_approved_by_admin_label, 'trim|xss_clean');
		$this->form_validation->set_rules('feedback_auto_approved', $this->feedback_auto_approved_label, 'trim|xss_clean');
		$this->form_validation->set_rules('feedback_is_approved_by_user_id', $this->feedback_is_approved_by_user_id_label, 'trim|xss_clean');
		$this->form_validation->set_rules('feedback_replied_message', $this->feedback_replied_message_label, 'trim|xss_clean');
		$this->form_validation->set_rules('feedback_is_public', $this->feedback_is_public_label, 'trim|xss_clean');
		
		
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->vars($data);
			$this->load->view('layout/switchy_main');
		} 
		else 
		{
			
		$query_data=array(
			'ref_feedback_app_user_id' =>$this->input->post('ref_feedback_app_user_id'),
			'feedback_rating_score' =>$this->input->post('feedback_rating_score'),
			'feedback_note' =>$this->input->post('feedback_note'),
			'feedback_giving_date_time' =>$this->input->post('feedback_giving_date_time'),
			'feedback_is_approved_by_admin' =>$this->input->post('feedback_is_approved_by_admin'),
			'feedback_auto_approved' =>$this->input->post('feedback_auto_approved'),
			'feedback_is_approved_by_user_id' =>$this->input->post('feedback_is_approved_by_user_id'),
			'feedback_replied_message' =>$this->input->post('feedback_replied_message'),
			'feedback_is_public' =>$this->input->post('feedback_is_public'),
				);
			
			//Transfering data to Model
			$this->feedback_model->feedback_insert($query_data);
			$data['message'] = 'Data Inserted Successfully';
			
			$this->load->vars($data);
			$this->load->view('layout/switchy_main');
		}
		
		
	}
	*/	

	public function admin_feedback($limit=null)
	{
		$data['content'] = 'feedback/all_feedback_view';
		$data['title'] = 'Feedback';

		$per_page=5;
		$limit=$this->uri->segment(3, 1);
		$data['query_result']=$this->feedback_model->get_all_feedback_list($limit,$per_page);	/* for view all data to admin */
		$total_rows=$this->feedback_model->no_of_rows_feedback_list();	/* get the total rows from the query */
		$url=base_url()."feedback/page/";
		$data['paging']=$this->common_model->custom_pager($url,$per_page,$total_rows);

		$this->load->vars($data);
		$this->load->view('layout/switchy_main');
	}
	/*
			
	public function edit_feedback($id)
	{
	
		$data['content'] = 'feedback/edit_feedback_form';
		$data['title'] = "Edit Feedback";
		
		$this->form_validation->set_rules('ref_feedback_app_user_id', $this->ref_feedback_app_user_id_label, 'trim|required|xss_clean');
		$this->form_validation->set_rules('feedback_rating_score', $this->feedback_rating_score_label, 'trim|required|xss_clean');
		$this->form_validation->set_rules('feedback_note', $this->feedback_note_label, 'trim|required|xss_clean');
		$this->form_validation->set_rules('feedback_giving_date_time', $this->feedback_giving_date_time_label, 'trim|required|xss_clean');
		$this->form_validation->set_rules('feedback_is_approved_by_admin', $this->feedback_is_approved_by_admin_label, 'trim|xss_clean');
		$this->form_validation->set_rules('feedback_auto_approved', $this->feedback_auto_approved_label, 'trim|xss_clean');
		$this->form_validation->set_rules('feedback_is_approved_by_user_id', $this->feedback_is_approved_by_user_id_label, 'trim|xss_clean');
		$this->form_validation->set_rules('feedback_replied_message', $this->feedback_replied_message_label, 'trim|xss_clean');
		$this->form_validation->set_rules('feedback_is_public', $this->feedback_is_public_label, 'trim|xss_clean');
		
		
			$edit_query_result=$this->feedback_model->get_feedback_by_id($id);
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
			'ref_feedback_app_user_id' =>$this->input->post('ref_feedback_app_user_id'),
			'feedback_rating_score' =>$this->input->post('feedback_rating_score'),
			'feedback_note' =>$this->input->post('feedback_note'),
			'feedback_giving_date_time' =>$this->input->post('feedback_giving_date_time'),
			'feedback_is_approved_by_admin' =>$this->input->post('feedback_is_approved_by_admin'),
			'feedback_auto_approved' =>$this->input->post('feedback_auto_approved'),
			'feedback_is_approved_by_user_id' =>$this->input->post('feedback_is_approved_by_user_id'),
			'feedback_replied_message' =>$this->input->post('feedback_replied_message'),
			'feedback_is_public' =>$this->input->post('feedback_is_public'),
				);
			
		
			//Transfering data to Model
			$this->feedback_model->feedback_update($query_data,$id);
		
			$msg = 'Data Edited Successfully';
			$this->session->set_flashdata('msg', $msg);
			redirect("edit_feedback/".$id);
		}
		
	}
	*/
	public function view_feedback($id)
	{
	
		$data['content'] = 'feedback/single_feedback_view';
		/*
		$query_result=$this->feedback_model->get_feedback_by_id($id);
		$query_result= $query_result->result();*/
		$data['feedback'] = $this->feedback_model->get_feedback_by_id($id);;
		$this->load->vars($data);
		$this->load->view('layout/switchy_main');
	}
	
	/*
	public function delete_feedback($id,$url)
	{
		$result=$this->feedback_model->delete_feedback_by_id($id);
		$msg=$result>0?"Feedback deleted":"Feedback not delete";
		$this->session->set_flashdata('msg', $msg);
		redirect($url);
			
	}
	*/
	
	/*
	public function change_status($id,$status,$url)
	{
	$status=$status==0?1:0;	
	$data = array(
			'feedback_id' => $status,
			);
	$this->feedback_model->status_update($id,$data);
	$status=$status==0?"Inactive":"Active";
	$msg = "Id #$id is now $status";
	$this->session->set_flashdata('msg', $msg);
	redirect($url);
	}	
 */

	public function reply_feedback($id=0)
	{
		if($id!=0 && $id==trim($this->input->post('hidden_feedback_id')))
		{
			$reply_message=trim($this->input->post('reply_msg'));
			
			$data=array(
			'ref_feedback_reply_feedback_id'=>$id,
			'feedback_replied_message'=>$reply_message,
			'feedback_replied_message_user_id'=>$this->common_model->get_login_user_id(),
			'feedback_replied_from_admin'=>1);
			
			$this->feedback_model->insert_reply_feedback_message($data);
			$this->view_feedback($id);
		}
		else
		{
			redirect(base_url());
		}
	}
}
	
	

	
	
	