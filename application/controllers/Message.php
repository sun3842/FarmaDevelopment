<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends CI_Controller {
	

	


	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('message_model');
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
				$this->lang->load('message_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('message_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('message_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
				$this->lang->load('message_it','italian');
		}
		
		
	}
	
	public function index()
	{	
	}
	
	public function create_message()
	{
		$data['content'] = 'message/add_message_form';
		$data['general_active_tab'] = ' active ';
		$data['group_active_tab'] = '  ';
		$data['personal_active_tab'] = '  ';
                
		$this->form_validation->set_message('required', $this->lang->line('required'));
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('message_title', 'message_title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('message_details', 'message_details', 'trim|required|xss_clean');
		
		$this->form_validation->set_rules('message_is_push_message', 'message_is_push_message', 'trim|xss_clean');
		
		//$this->form_validation->set_rules('message_send_now', 'message_send_now', 'trim|xss_clean');
		
		
		$message_created_by_user_id= $this->common_model->get_login_user_id();
		$message_created_date_time = date("Y-m-d H:i:s");
		$message_edited_date_time  = date("Y-m-d H:i:s");
		
		$ref_message_message_from_id=$this->session->userdata('user_type');
		$pharmacy_id=$this->session->userdata('pharmacy_id');

		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->vars($data);
			$this->load->view('layout/switchy_main');
			$this->load->view('message/add_message_form_js');
		} 
		else 
		{
			
		$query_data=array(
			'ref_message_message_type_id' =>MSG_TYPE_NORMAL_ID,
			'ref_message_message_from_id' =>$ref_message_message_from_id,
			'ref_message_pharmacy_id'=>$ref_message_message_from_id==USER_TYPE_SUPER_ADMIN?NULL:$pharmacy_id,
			'message_title' =>$this->input->post('message_title'),
			'message_details' =>$this->input->post('message_details'),
			'message_any_ending_date' =>0,//0 means no
			'message_is_push_message' =>$this->input->post('message_is_push_message'),
			'message_created_date_time' =>$message_created_date_time,
			'message_edited_date_time' =>$message_edited_date_time,
			'message_send_now' =>1,//$this->input->post('message_send_now'),
			'message_send_later' =>0,//$this->input->post('message_send_now'),
			'message_send_later_date_time' =>NULL,//$this->input->post('message_send_now')==0?$this->input->post('message_send_later_date_time'):NULL,
			'message_is_already_sent' =>1,//$this->input->post('message_send_now'),
			'message_sending_date_time' =>$message_created_date_time,//$this->input->post('message_send_now')==0?NULL:$message_created_date_time,
			
				);
			
			//Transfering data to Model
			$message_id=$this->message_model->message_insert($query_data);
			if($message_id>0)
			{
				$data['message'] = SUCCESSFULLY_DONE;
				if($this->input->post('message_is_push_message')==1 && $this->input->post('message_send_now')==1)
				{
					$this->push_common_message_to_android_users($message_id);
					$this->push_common_message_to_ios_users($message_id);
				}
				
				redirect('view_message/'.$message_id);
				
			}
			else
			{
				$data['message'] = SUCCESSFULLY_NOT_DONE;
				$this->load->vars($data);
			    $this->load->view('layout/switchy_main');
			    $this->load->view('message/add_message_form_js');
			}
			
			
			
		}
		
		
	}
	
	public function create_group_message()
	{
		$data['content'] = 'message/add_message_form';
		$data['general_active_tab'] = '  ';
		$data['group_active_tab'] = ' active ';
		$data['personal_active_tab'] = '  ';
		
		$this->form_validation->set_message('required', $this->lang->line('required'));
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('message_title', 'message_title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('message_details', 'message_details', 'trim|required|xss_clean');
		
		$this->form_validation->set_rules('message_is_push_message', 'message_is_push_message', 'trim|xss_clean');
		
		$this->form_validation->set_rules('message_send_now', 'message_send_now', 'trim|xss_clean');
		
		$this->form_validation->set_rules('message_conditions', 'message_conditions_test', 'trim|required|xss_clean');
		
		$message_created_by_user_id= $this->common_model->get_login_user_id();
		$message_created_date_time = date("Y-m-d H:i:s");
		$message_edited_date_time  = date("Y-m-d H:i:s");

		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->vars($data);
			$this->load->view('layout/switchy_main');
			$this->load->view('message/add_message_form_js');
		} 
		else 
		{
			$sex_type=-1;
			$is_condition_sex=0;
			if($this->input->post('sex_type'))
			{
				$sex_type= $this->input->post('sex_type');
				$is_condition_sex=1;
			}
			
			$birth_year=0;
			$is_condition_birth_year=0;
			if($this->input->post('send_by_birth_year') )
			{
				$birth_year=$this->input->post('message_send_by_birth_year');
				$is_condition_birth_year=1;
			}
			
			$birth_month=0;
			$is_condition_birth_month=0;
			if($this->input->post('send_by_birth_month'))
			{
				$birth_month=$this->input->post('message_send_by_birth_month');
				$is_condition_birth_month=1;
			}
			
			$age_from=0;
			$age_to=0;
			$is_condition_age_range=0;
			
			
			if($this->input->post('send_by_age_limit'))
			{
				$age_from=$this->input->post('age_from');
				$age_to=$this->input->post('age_to');
				$is_condition_age_range=1;
			}
			
			$city_name=NULL;
			$is_condition_city=0;
			
			if($this->input->post('send_by_city'))
			{
				$city_name=trim($this->input->post('message_send_city_name'));
				$is_condition_city=1;
			}
			
			$region_name=NULL;
			$is_condition_region=0;
			if($this->input->post('send_by_region'))
			{
				$region_name=trim($this->input->post('message_send_region_name'));
				$is_condition_region=1;
			}
			
			$post_code=NULL;
			$is_condition_post_code=0;
			
			if($this->input->post('send_by_post_code'))
			{
				$post_code=trim($this->input->post('message_send_post_code'));
				$is_condition_post_code=1;
			}
			
			$is_condition_or_gate=0;
			$is_condition_and_gate=0;
			
			if($this->input->post('message_conditions')==MESSAGE_CONDITION_OR_GATE)
			{
				$is_condition_or_gate=1;
				$is_condition_and_gate=0;
			}
			else
			{
				$is_condition_or_gate=0;
			    $is_condition_and_gate=1;
			}
			
		$query_data=array(
			'ref_message_message_type_id' =>MSG_TYPE_GROUP_ID,
			'message_title' =>$this->input->post('message_title'),
			'message_details' =>$this->input->post('message_details'),
			'message_any_ending_date' =>0,//0 means no
			
			'message_is_push_message' =>$this->input->post('message_is_push_message'),
			'message_created_by_user_id'=> $message_created_by_user_id,
			'message_created_date_time' =>$message_created_date_time,
			'message_edited_date_time' =>$message_edited_date_time,
			'message_send_now' =>$this->input->post('message_send_now'),
			'message_send_later' =>$this->input->post('message_send_now'),
			'message_send_later_date_time' =>$this->input->post('message_send_now')==0?$this->input->post('message_send_later_date_time'):NULL,
			'message_is_already_sent' =>$this->input->post('message_send_now'),
			'message_sending_date_time' =>$this->input->post('message_send_now')==0?NULL:$message_created_date_time,
			
				);
			
			//Transfering data to Model
			$message_id=$this->message_model->message_insert($query_data);
			if($message_id>0)
			{
				$data_query_group_message=array(
			     'ref_group_message_message_id'=>$message_id,
				 'is_condition_birth_year'=>$is_condition_birth_year,
				 'condition_birth_year'=>$birth_year,
				 'is_condition_birth_month'=>$is_condition_birth_month,
				 'condition_birth_month'=>$birth_month,
				 'is_condition_age_range'=>$is_condition_age_range,
				 'condition_age_starting_range'=>$age_from,
				 'condition_age_ending_range'=>$age_to,
				 'is_condition_sex'=>$is_condition_sex,
				 'condition_sex'=>$sex_type,
				 'is_condition_region'=>$is_condition_region,
				 'condition_region_name'=>$region_name,
				 'is_condition_city'=>$is_condition_city,
				 'condition_city_name'=>$city_name,
				 'is_condition_post_code'=>$is_condition_post_code,
				 'condition_post_code'=>$post_code,
				 'is_condition_or_gate'=>$is_condition_or_gate,
				 'is_condition_and_gate'=>$is_condition_and_gate);
				 $group_message_id=$this->message_model->group_message_insert($data_query_group_message);
				 
				 if($group_message_id>0)
				 {
					// $data['message'] = SUCCESSFULLY_DONE;
					 if($this->input->post('message_is_push_message')==1 && $this->input->post('message_send_now')==1)
					 {
						 $this->push_group_message_to_android_users($group_message_id,$message_id);
						 $this->push_group_message_to_ios_users($group_message_id,$message_id);
					 }
					 redirect('view_message/'.$message_id);
				 }
				 else
				 {
					 $data['message'] = SUCCESSFULLY_NOT_DONE;
					 $this->load->vars($data);
					 $this->load->view('layout/switchy_main');
					 $this->load->view('message/add_message_form_js');
				 }
			
			}
			else
			{
				$data['message'] = SUCCESSFULLY_NOT_DONE;
				
				$this->load->vars($data);
				$this->load->view('layout/switchy_main');
				$this->load->view('message/add_message_form_js');
			}
			
			
			
			
			
			
		}
		
		
	}
	
	
	
	public function create_personal_message()
	{
		$data['content'] = 'message/add_message_form';
		$data['general_active_tab'] = '  ';
		$data['group_active_tab'] = '  ';
		$data['personal_active_tab'] = ' active ';
                
		$this->form_validation->set_message('required', $this->lang->line('required'));
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('app_user_name_text_field', 'App User', 'trim|required|xss_clean');
		$this->form_validation->set_rules('app_user_hidden_id', 'App User', 'trim|required|xss_clean');
		$this->form_validation->set_rules('message_title', 'message_title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('message_details', 'message_details', 'trim|required|xss_clean');
		
		$this->form_validation->set_rules('message_is_push_message', 'message_is_push_message', 'trim|xss_clean');
		
		$this->form_validation->set_rules('message_send_now', 'message_send_now', 'trim|xss_clean');
		
		
		$message_created_by_user_id= $this->common_model->get_login_user_id();
		$message_created_date_time = date("Y-m-d H:i:s");
		$message_edited_date_time  = date("Y-m-d H:i:s");

		
		if ($this->form_validation->run() == FALSE && !( $this->input->post('app_user_hidden_id'))) 
		{
			$this->load->vars($data);
			$this->load->view('layout/switchy_main');
			$this->load->view('message/add_message_form_js');
		} 
		else 
		{
			
		$query_data=array(
			'ref_message_message_type_id' =>MSG_TYPE_PERSONAL_ID,
			'message_title' =>$this->input->post('message_title'),
			'message_details' =>$this->input->post('message_details'),
			'message_any_ending_date' =>0,//0 means no
			'message_is_push_message' =>$this->input->post('message_is_push_message'),
			'message_created_by_user_id'=> $message_created_by_user_id,
			'message_created_date_time' =>$message_created_date_time,
			'message_edited_date_time' =>$message_edited_date_time,
			'message_send_now' =>$this->input->post('message_send_now'),
			'message_send_later' =>$this->input->post('message_send_now'),
			'message_send_later_date_time' =>$this->input->post('message_send_now')==0?$this->input->post('message_send_later_date_time'):NULL,
			'message_is_already_sent' =>$this->input->post('message_send_now'),
			'message_sending_date_time' =>$this->input->post('message_send_now')==0?NULL:$message_created_date_time,
			
				);
			
			//Transfering data to Model
			$message_id=$this->message_model->message_insert($query_data);
			if($message_id>0)
			{
				$data_query_personal_message=array(
			     'ref_personal_message_message_id'=>$message_id,
				 'ref_personal_message_app_user_id' =>$this->input->post('app_user_hidden_id'));
				 $personal_message_id=$this->message_model->personal_message_insert($data_query_personal_message);
				 echo $personal_message_id;
				 if($personal_message_id>0)
				 {
					 $data['message'] = SUCCESSFULLY_DONE;
					 if($this->input->post('message_is_push_message')==1 && $this->input->post('message_send_now')==1)
					 {
						 $this->push_personal_message_to_android_users($this->input->post('app_user_hidden_id'),$message_id);
						 $this->push_personal_message_to_ios_users($this->input->post('app_user_hidden_id'),$message_id);
					 }
					 redirect('view_message/'.$message_id);
				 }
				 else
				 {
					 $data['message'] = SUCCESSFULLY_NOT_DONE;
					 $this->load->vars($data);
					 $this->load->view('layout/switchy_main');
					 $this->load->view('message/add_message_form_js');
				 }
			
			}
			else
			{
				$data['message'] = SUCCESSFULLY_NOT_DONE;
				
				$this->load->vars($data);
				$this->load->view('layout/switchy_main');
				$this->load->view('message/add_message_form_js');
			}
			
			
		}
		
		
	}
	
		

	public function admin_message($limit=null)
	{
		$data['content'] = 'message/all_message_view';
		//$data['title'] = 'Message';
		$data['controller']=$this->router->fetch_class(); 	// class = controller
		$data['method']=$this->router->fetch_method();		// method
		$per_page=POST_PER_PAGE;
		$limit=$this->uri->segment(3, 1);
		$data['query_result']=$this->message_model->get_all_message_list($limit,$per_page);	/* for view all data to admin */
		$total_rows=$this->message_model->no_of_rows_message_list();	/* get the total rows from the query */
		$url=base_url()."message/page/";
		$data['paging']=$this->common_model->custom_pager($url,$per_page,$total_rows);

		$this->load->vars($data);
		$this->load->view('layout/switchy_main');
	}
	
	
	
	
	
	
	
			
	public function edit_message($id)
	{
	
		$data['content'] = 'message/edit_message_form';
		$data['title'] = "Edit Message";
		
		$this->form_validation->set_rules('ref_message_message_type_id', 'ref_message_message_type_id', 'trim|required|xss_clean');
		$this->form_validation->set_rules('message_title', 'message_title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('message_details', 'message_details', 'trim|required|xss_clean');
		$this->form_validation->set_rules('message_any_ending_date', 'message_any_ending_date', 'trim|xss_clean');
		$this->form_validation->set_rules('message_ending_date', 'message_ending_date', 'trim|xss_clean');
		$this->form_validation->set_rules('message_ending_time', 'message_ending_time', 'trim|xss_clean');
		$this->form_validation->set_rules('message_is_push_message', 'message_is_push_message', 'trim|xss_clean');
		/* $this->form_validation->set_rules('message_created_by_user_id', 'message_created_by_user_id', 'trim|required|xss_clean');
		$this->form_validation->set_rules('message_created_date_time', 'message_created_date_time', 'trim|required|xss_clean');
		$this->form_validation->set_rules('message_edited_by_user_id', 'message_edited_by_user_id', 'trim|xss_clean');
		$this->form_validation->set_rules('message_edited_date_time', 'message_edited_date_time', 'trim|required|xss_clean'); */
		$this->form_validation->set_rules('message_send_now', 'message_send_now', 'trim|xss_clean');
		$this->form_validation->set_rules('message_send_later', 'message_send_later', 'trim|xss_clean');
		$this->form_validation->set_rules('message_send_later_date_time', 'message_send_later_date_time', 'trim|xss_clean');
		$this->form_validation->set_rules('message_is_already_sent', 'message_is_already_sent', 'trim|xss_clean');
		$this->form_validation->set_rules('message_sending_date_time', 'message_sending_date_time', 'trim|xss_clean');
		$this->form_validation->set_rules('message_any_attached_file', 'message_any_attached_file', 'trim|xss_clean');
		$this->form_validation->set_rules('message_active', 'message_active', 'trim|xss_clean');
		
		$message_edited_by_user_id= $this->common_model->get_login_user_id();
		$message_edited_date_time  = date("Y-m-d H:i:s");
		
			$edit_query_result=$this->message_model->get_message_by_id($id);
			$edit_query_result= $edit_query_result->result();
			$data['edit_query_result'] = $edit_query_result[0];
			$data['message_type_query']=$this->message_model->get_message_type($data['edit_query_result']->ref_message_message_type_id);
			
		
		if ($this->form_validation->run() == FALSE) 
		{
		
			$this->load->vars($data);
			$this->load->view('layout/switchy_main');
		} 
		else 
		{
			$query_data=array(
			'ref_message_message_type_id' =>$this->input->post('ref_message_message_type_id'),
			'message_title' =>$this->input->post('message_title'),
			'message_details' =>$this->input->post('message_details'),
			'message_any_ending_date' =>$this->input->post('message_any_ending_date'),
			'message_ending_date' =>$this->input->post('message_ending_date'),
			'message_ending_time' =>$this->input->post('message_ending_time'),
			'message_is_push_message' =>$this->input->post('message_is_push_message'),
			'message_edited_by_user_id' =>$message_edited_by_user_id,
			'message_edited_date_time' =>$message_edited_date_time ,
			'message_send_now' =>$this->input->post('message_send_now'),
			'message_send_later' =>$this->input->post('message_send_later'),
			'message_send_later_date_time' =>$this->input->post('message_send_later_date_time'),
			'message_is_already_sent' =>$this->input->post('message_is_already_sent'),
			'message_sending_date_time' =>$this->input->post('message_sending_date_time'),
			'message_any_attached_file' =>$this->input->post('message_any_attached_file'),
			'message_active' =>$this->input->post('message_active'),
				);
			
		
			//Transfering data to Model
			$this->message_model->message_update($query_data,$id);
			$msg = 'Data Edited Successfully';
			$this->session->set_flashdata('msg', $msg);
			redirect("edit_message/".$id);
		}
		
	}
	
	public function view_message($id=0)
	{
	
		$data['content'] = 'message/single_message_view';
		//$data['title'] = 'View Message';
		//$query_result=$this->message_model->get_message_by_id($id);
		//$query_result= $query_result->result();
		//$data['query_result'] = $query_result[0];
		
		$data['msg_details']=$this->message_model->get_message_details_view_page_by_id($id);
		$this->load->vars($data);
		$this->load->view('layout/switchy_main');
	}
	
	public function delete_message($id,$url)
	{
		
		$result=$this->message_model->delete_message_by_id($id);
		$msg=$result>0?"Message deleted":"Message not delete";
		$this->session->set_flashdata('msg', $msg);
		redirect($url);
			
	}
	
	
	function ajax_find_app_user()
	{
		if(isset($_POST['search']))
		{
			$q=$_POST['search'];
		}
		
		if (!$q) return;
		
		$app_users=$this->common_model->get_all_app_user_list_by_name_keyword($q);
		
		foreach($app_users as $app_user)
		{
		?>
        <div class="show" align="left">
            <span class="name"><?php echo $app_user['app_user_first_name']." ".$app_user['app_user_last_name']; ?></span>&nbsp;<br/><?php echo $this->lang->line('birth_date');?> :<?php echo $app_user['app_user_birth_date']; ?><br/><?php echo $this->lang->line('city');?> :<?php echo $app_user['app_user_city']; ?><span class="client_id" style="display:none;"><?php echo $app_user['ref_app_user_details_app_user_id'];?></span>
            </div>
        <?php
		}
	}
	
	/*
	FUNCTION NAME : push_common_message_to_android_users($message_id)
	it will send push message to all anddroid user for normal message*/
	public function push_common_message_to_android_users($message_id)
	{
		$push_notification=$this->common_model->get_android_ios_push_information();
		
		$message_details=$this->message_model->get_message_by_id($message_id)->row_array();
		
		$message_details['push_type']=PUSH_MESSAGE_TYPE;
		$message_details['push_message_normal']=1;
		$message_details['push_message_group']=0;
		 
		// Message to be sent
		$gcm_api_key=trim($push_notification['push_information_android_gcm_api_key']);
			
		//Get All GCM Registration_ID
		$gcm_reg_ids=$this->common_model->get_all_gcm_device_registration_ids();
			
		$it =  new RecursiveIteratorIterator(new RecursiveArrayIterator($gcm_reg_ids));
		$l = iterator_to_array($it, false);
		//var_dump($l); // one Dimensional 
		
		// Set POST variables
		$url = trim($push_notification['push_information_android_server_url']);
		$fields = array(
                'registration_ids'  => $l,
                'data'              => $message_details,
                );
				//print_r($fields);
				
		$headers = array( 
                    'Authorization: key=' . $gcm_api_key,
                    'Content-Type: application/json'
                );
		// Open connection
		$ch = curl_init();
				
		// Set the url, number of POST vars, POST data
		curl_setopt( $ch, CURLOPT_URL, $url );
				
		curl_setopt( $ch, CURLOPT_POST, true );
		curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );
				
		// Execute post
		$result = curl_exec($ch);
		// Close connection
		curl_close($ch);
				
		
	}
 
	
/*
	FUNCTION NAME : push_group_message_to_android_users($message_id)
	it will send push message to all anddroid user for normal message*/
	public function push_group_message_to_android_users($group_message_id,$message_id)
	{
		
		$push_notification=$this->common_model->get_android_ios_push_information();
		
		$message_details=$this->message_model->get_message_by_id($message_id)->row_array();
		   
		$message_details['push_type']=PUSH_MESSAGE_TYPE;
		$message_details['push_message_normal']=0;
		$message_details['push_message_group']=1;
		   
		   
		
		// Message to be sent
		$gcm_api_key=trim($push_notification['push_information_android_gcm_api_key']);
			
		//Get All GCM Registration_ID
		$gcm_reg_ids=$this->message_model->get_app_user_id_for_group_message($group_message_id);
		
		$it =  new RecursiveIteratorIterator(new RecursiveArrayIterator($gcm_reg_ids));
		$l = iterator_to_array($it, false);
		
		// Set POST variables
		$url = trim($push_notification['push_information_android_server_url']);
		$fields = array(
                'registration_ids'  => $l,
                'data'              => $message_details,
                );
				//print_r($fields);
				
		$headers = array( 
                    'Authorization: key=' . $gcm_api_key,
                    'Content-Type: application/json'
                );
		// Open connection
		$ch = curl_init();
				
	   // Set the url, number of POST vars, POST data
		curl_setopt( $ch, CURLOPT_URL, $url );
				
		curl_setopt( $ch, CURLOPT_POST, true );
		curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );
				
		// Execute post
		$result = curl_exec($ch);
		// Close connection
		curl_close($ch);
	}
 
 
 /*
	FUNCTION NAME :push_personal_message_to_android_users($app_user_id,$message_id)
	it will send push message to android device for a fixed user*/
	public function push_personal_message_to_android_users($app_user_id,$message_id)
	{
		$push_notification=$this->common_model->get_android_ios_push_information();
		
		$message_details=$this->message_model->get_message_by_id($message_id)->row_array();
		$message_details['push_type']=PUSH_MESSAGE_TYPE;
		$message_details['push_message_normal']=0;
		$message_details['push_message_group']=1;
		   
		   
		
		// Message to be sent
		$gcm_api_key=trim($push_notification['push_information_android_gcm_api_key']);
			
		//Get All GCM Registration_ID
		$gcm_reg_ids=$this->common_model->get_android_device_id_by_app_user_id($app_user_id);
		$it =  new RecursiveIteratorIterator(new RecursiveArrayIterator($gcm_reg_ids));
		$l = iterator_to_array($it, false);
		
		// Set POST variables
		$url = trim($push_notification['push_information_android_server_url']);
		$fields = array(
                'registration_ids'  => $l,
                'data'              => $message_details,
                );
				//print_r($fields);
				
		$headers = array( 
                    'Authorization: key=' . $gcm_api_key,
                    'Content-Type: application/json'
                );
		// Open connection
		$ch = curl_init();
				
		// Set the url, number of POST vars, POST data
		curl_setopt( $ch, CURLOPT_URL, $url );
				
		curl_setopt( $ch, CURLOPT_POST, true );
		curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );
				
		// Execute post
		$result = curl_exec($ch);
		// Close connection
		curl_close($ch);
				
				
	}
 
	
	/*
	FUNCTION NAME : push_common_message_to_ios_users($message_id)
	It will send common messages to all ios users.
	*/
	
	
	public function push_common_message_to_ios_users($message_id)
	{
		$push_notification=$this->common_model->get_android_ios_push_information();
		
		$deviceToken_array=$this->common_model->get_all_ios_device_registration_ids();
		$passphrase = trim($push_notification['push_information_ios_passphrase']);
		
		// Put your alert message here:
		
		$message_details=$this->message_model->get_message_by_id($message_id)->row_array();
		$message_details['push_type']=PUSH_MESSAGE_TYPE;
		$message_details['push_message_normal']=1;
		$message_details['push_message_group']=0;
		$message_details['alert']=$this->lang->line('message_push_title');
		$message_details['sound']='default';
		
		$ck_pem_path="ios_push/".trim($push_notification['push_information_ios_local_cert_pem_file_name']);
		
		$ctx = stream_context_create();
		stream_context_set_option($ctx, 'ssl', 'local_cert', $ck_pem_path);
		stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
		
		// Open a connection to the APNS server
		$fp = stream_socket_client(
		trim($push_notification['push_information_ios_current_gateway_ssl']), $err,
		$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
/*
     if (!$fp)
	 {
		 //exit("Failed to connect: $err $errstr" . PHP_EOL);
	 }
	 else
	 {
		// echo 'Connected to APNS' . PHP_EOL;
	 }
	 
*/
     

       // Create the payload body
       $body['aps'] =  $message_details;
       
     

      // Encode the payload as JSON
      $payload = json_encode($body);

      foreach($deviceToken_array as $deviceToken)
	  {
       // Build the binary notification
      $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken['ios_device_token']) . pack('n', strlen($payload)) . $payload;

     // $msg = chr(0) . pack('n', 32) . pack('H*', '35f53ebe9570f3b821b2ce45108475d41ac380a5aa261cc0912ddfca90dc3ec5') . pack('n', strlen($payload)) . $payload;
      // Send it to the server
      $result = fwrite($fp, $msg, strlen($msg));
	  
	  /*
      if (!$result)
	  {
	    //echo 'Message not delivered' . PHP_EOL;
	  }
      else
	  {
	  
	    //echo 'Message successfully delivered' . PHP_EOL;
	  }
	  */

    }
	// Close the connection to the server
    fclose($fp);
  }
  
  
  
  /*
	FUNCTION NAME : push_group_message_to_ios_users($group_message_id,$message_id)
	It will send group messages to all ios users.
	*/
	
	
	public function push_group_message_to_ios_users($group_message_id,$message_id)
	{
		$push_notification=$this->common_model->get_android_ios_push_information();
		
		$deviceToken_array=$this->message_model->get_app_user_id_for_ios_group_message($group_message_id);
		$passphrase = trim($push_notification['push_information_ios_passphrase']);
		
		// Put your alert message here:
		
		$message_details=$this->message_model->get_message_by_id($message_id)->row_array();
		   
		
		
		$message_details=$this->message_model->get_message_by_id($message_id)->row_array();
		$message_details['push_type']=PUSH_MESSAGE_TYPE;
		$message_details['push_message_normal']=0;
		$message_details['push_message_group']=1;
		$message_details['alert']=$this->lang->line('message_push_title');
		$message_details['sound']='default';
		
		$ck_pem_path="ios_push/".trim($push_notification['push_information_ios_local_cert_pem_file_name']);
		
		$ctx = stream_context_create();
		stream_context_set_option($ctx, 'ssl', 'local_cert', $ck_pem_path);
		stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
		
		// Open a connection to the APNS server
		$fp = stream_socket_client(
		trim($push_notification['push_information_ios_current_gateway_ssl']), $err,
		$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
/*
     if (!$fp)
	 {
		 //exit("Failed to connect: $err $errstr" . PHP_EOL);
	 }
	 else
	 {
		// echo 'Connected to APNS' . PHP_EOL;
	 }
	 
*/
     

       // Create the payload body
       $body['aps'] =  $message_details;
       
     

      // Encode the payload as JSON
      $payload = json_encode($body);

      foreach($deviceToken_array as $deviceToken)
	  {
       // Build the binary notification
       $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

     // $msg = chr(0) . pack('n', 32) . pack('H*', '35f53ebe9570f3b821b2ce45108475d41ac380a5aa261cc0912ddfca90dc3ec5') . pack('n', strlen($payload)) . $payload;
      // Send it to the server
      $result = fwrite($fp, $msg, strlen($msg));
	  
	  /*
      if (!$result)
	  {
	    echo 'Message not delivered' . PHP_EOL;
	  }
      else
	  {
	  
	    echo 'Message successfully delivered' . PHP_EOL;
	  }*/

    }
	// Close the connection to the server
    fclose($fp);
  }
	
	
	
	
	/*
	FUNCTION NAME : push_personal_message_to_ios_users($app_user_id,$message_id)
	It will send group messages to all ios users.
	*/
	
	
	public function push_personal_message_to_ios_users($app_user_id,$message_id)
	{
		$push_notification=$this->common_model->get_android_ios_push_information();
		
		$deviceToken=$this->common_model->get_ios_device_id_by_app_user_id($app_user_id);
		$passphrase = trim($push_notification['push_information_ios_passphrase']);
		
		// Put your alert message here:
		
		$message_details=$this->message_model->get_message_by_id($message_id)->row_array();
		   
		
		
		$message_details=$this->message_model->get_message_by_id($message_id)->row_array();
		$message_details['push_type']=PUSH_MESSAGE_TYPE;
		$message_details['push_message_normal']=0;
		$message_details['push_message_group']=1;
		$message_details['alert']=$this->lang->line('message_push_title');
		$message_details['sound']='default';
		
		$ck_pem_path="ios_push/".trim($push_notification['push_information_ios_local_cert_pem_file_name']);
		
		$ctx = stream_context_create();
		stream_context_set_option($ctx, 'ssl', 'local_cert', $ck_pem_path);
		stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
		
		// Open a connection to the APNS server
		$fp = stream_socket_client(
		trim($push_notification['push_information_ios_current_gateway_ssl']), $err,
		$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
/*
     if (!$fp)
	 {
		 //exit("Failed to connect: $err $errstr" . PHP_EOL);
	 }
	 else
	 {
		// echo 'Connected to APNS' . PHP_EOL;
	 }
	 
*/
     

       // Create the payload body
       $body['aps'] =  $message_details;
       
     

      // Encode the payload as JSON
      $payload = json_encode($body);
       // Build the binary notification
      $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

     
      $result = fwrite($fp, $msg, strlen($msg));
	  
	  /*
      if (!$result)
	  {
	    //echo 'Message not delivered' . PHP_EOL;
	  }
      else
	  {
	  
	    //echo 'Message successfully delivered' . PHP_EOL;
	  }
	  */

	// Close the connection to the server
    fclose($fp);
  }
	
	
	
}
	
	

	
	
	