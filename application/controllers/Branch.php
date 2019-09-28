<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Branch extends CI_Controller {
	

	
	public $branch_type_array=array();
	
	public $branch_country_array=array('0'=>"Italy");
	
	public $views_folder_name;

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('branch_model');
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
				$this->lang->load('branch_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('branch_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('branch_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
			$this->lang->load('branch_it','italian');
		}
		
		
	}
	
	public function index()
	{	
	}
	
	public function create_branch()
	{
		$data['content'] = 'branch/add_new_branch';
	
		
		$created_by_user_id= $this->common_model->get_login_user_id();
		$created_date_time = date("Y-m-d H:i:s");
		
		if($this->branch_model->has_it_main_branch()>0)
		{
			$this->branch_type_array[0]=$this->lang->line('branch_office_branch_label');
		}
		else
		{
			$this->branch_type_array[1]=$this->lang->line('branch_head_branch_label');
		}
       
	    $this->form_validation->set_message('required', 'Required');
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('branch_name', 'branch_name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('branch_type', 'branch_type', 'trim|required|xss_clean');
		$this->form_validation->set_rules('branch_address', 'branch_address', 'trim|xss_clean');
		$this->form_validation->set_rules('branch_city', 'branch_city', 'trim|xss_clean');
		$this->form_validation->set_rules('branch_post_code', 'branch_post_code', 'trim|xss_clean');
		
		
		$message_created_by_user_id= $this->common_model->get_login_user_id();
		$message_created_date_time = date("Y-m-d H:i:s");
		$message_edited_date_time  = date("Y-m-d H:i:s");

		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->vars($data);
			$this->load->view('layout/switchy_main');
		} 
		else 
		{
			$address=trim($this->input->post('branch_address'));
			$city=trim($this->input->post('branch_city'));
			$post_code=trim($this->input->post('branch_post_code'));
			$region=trim($this->input->post('branch_region'));
			$country=$this->branch_country_array[trim($this->input->post('branch_country'))];
			$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.urlencode($address).',+'.urlencode($city).',+'.urlencode($post_code).',+'.urlencode($region).',+'.urlencode($country).'&sensor=false');
			$output= json_decode($geocode); //Store values in variableù
			if($output->status == 'OK')
			{
				$lat = $output->results[0]->geometry->location->lat; //Returns Latitude
			    $long = $output->results[0]->geometry->location->lng; // Returns Longitude
			    $full_address=$output->results[0]->formatted_address;
				$query_data=array(
				'branch_name' =>trim($this->input->post('branch_name')),
			    'is_main_branch' =>$this->input->post('branch_type'),
			    'branch_address' =>$address,
			    'branch_city' =>$city,
			    'branch_post_code' =>$post_code,
			    'branch_region' =>$region,
			    'branch_country' =>$country,
			    'branch_full_address'=>$full_address ,
			    'branch_cell_number' =>NULL,
			    'branch_land_phone_number' =>NULL,
			    'branch_fax_number' =>NULL,
			    'branch_email_address' =>trim($this->input->post('branch_email_address')),
			    'branch_web_site_link' =>trim($this->input->post('branch_web_site')),
			    'branch_lat_value' =>$lat,
			    'branch_long_value' =>$long,
			    'branch_about_us' =>trim($this->input->post('branch_about_us')),
			    'ref_branch_created_user_id' =>$created_by_user_id,
			    'branch_created_date_time' =>$created_date_time,
				);
				//Transfering data to Model
			    $branch_id=$this->branch_model->branch_insert($query_data);
			    if($branch_id>0)
				{
					//Insert Branch Customer Care table
					$query_branch_customer_care=array(
					'ref_branch_customer_care_branch_id'=>$branch_id,
					'branch_customer_care_email_address'=>trim($this->input->post('branch_email_address')),
					'branch_customer_care_call_us_number'=>trim($this->input->post('branch_contact_number')),
					'branch_customer_care_send_message_number'=>NULL,
					'branch_customer_care_facebook_page'=>trim($this->input->post('branch_facebook_page'))
					);
					
					$branch_customer_care_id=$this->branch_model->branch_customer_care_insert($query_branch_customer_care);
					
					$mon_morning_time=$this->input->post('mon_morning_starting_hour').":".$this->input->post('mon_morning_starting_minute')."-".$this->input->post('mon_morning_ending_hour').":".$this->input->post('mon_morning_ending_minute');
                    $mon_afternoon_time=$this->input->post('mon_afternoon_starting_hour').":".$this->input->post('mon_afternoon_starting_minute')."-".$this->input->post('mon_afternoon_ending_hour').":".$this->input->post('mon_afternoon_ending_minute');
                    $tues_morning_time=$this->input->post('tues_morning_starting_hour').":".$this->input->post('tues_morning_starting_minute')."-".$this->input->post('tues_morning_ending_hour').":".$this->input->post('tues_morning_ending_minute');
                    $tues_afternoon_time=$this->input->post('tues_afternoon_starting_hour').":".$this->input->post('tues_afternoon_starting_minute')."-".$this->input->post('tues_afternoon_ending_hour').":".$this->input->post('tues_afternoon_ending_minute');
                    $wed_morning_time=$this->input->post('wed_morning_starting_hour').":".$this->input->post('wed_morning_starting_minute')."-".$this->input->post('wed_morning_ending_hour').":".$this->input->post('wed_morning_ending_minute');
                    $wed_afternoon_time=$this->input->post('wed_afternoon_starting_hour').":".$this->input->post('wed_afternoon_starting_minute')."-".$this->input->post('wed_afternoon_ending_hour').":".$this->input->post('wed_afternoon_ending_minute');
                    $thurs_morning_time=$this->input->post('thurs_morning_starting_hour').":".$this->input->post('thurs_morning_starting_minute')."-".$this->input->post('thurs_morning_ending_hour').":".$this->input->post('thurs_morning_ending_minute');
                    $thurs_afternoon_time=$this->input->post('thurs_afternoon_starting_hour').":".$this->input->post('thurs_afternoon_starting_minute')."-".$this->input->post('thurs_afternoon_ending_hour').":".$this->input->post('thurs_afternoon_ending_minute');
                    $fri_morning_time=$this->input->post('fri_morning_starting_hour').":".$this->input->post('fri_morning_starting_minute')."-".$this->input->post('fri_morning_ending_hour').":".$this->input->post('fri_morning_ending_minute');
                    $fri_afternoon_time=$this->input->post('fri_afternoon_starting_hour').":".$this->input->post('fri_afternoon_starting_minute')."-".$this->input->post('fri_afternoon_ending_hour').":".$this->input->post('fri_afternoon_ending_minute');
                    $sat_morning_time=$this->input->post('sat_morning_starting_hour').":".$this->input->post('sat_morning_starting_minute')."-".$this->input->post('sat_morning_ending_hour').":".$this->input->post('sat_morning_ending_minute');
                    $sat_afternoon_time=$this->input->post('sat_afternoon_starting_hour').":".$this->input->post('sat_afternoon_starting_minute')."-".$this->input->post('sat_afternoon_ending_hour').":".$this->input->post('sat_afternoon_ending_minute');
                    $sun_morning_time=$this->input->post('sun_morning_starting_hour').":".$this->input->post('sun_morning_starting_minute')."-".$this->input->post('sun_morning_ending_hour').":".$this->input->post('sun_morning_ending_minute');
                    $sun_afternoon_time=$this->input->post('sun_afternoon_starting_hour').":".$this->input->post('sun_afternoon_starting_minute')."-".$this->input->post('sun_afternoon_ending_hour').":".$this->input->post('sun_afternoon_ending_minute');

					//insert branch_timetable
					$query_branch_timetable=array(
					'ref_branch_timetable_branch_id'=>$branch_id,
					'sat_is_open'=>$this->input->post('sat_closed')?0:1,
					'sat_morning_time'=>$sat_morning_time,
					'sat_afternoon_time'=>$sat_afternoon_time,
					'sun_is_open'=>$this->input->post('sun_closed')?0:1,
					'sun_morning_time'=>$sun_morning_time,
					'sun_afternoon_time'=>$sun_afternoon_time,
					'mon_is_open'=>$this->input->post('mon_closed')?0:1,
					'mon_morning_time'=>$mon_morning_time,
					'mon_afternoon_time'=>$mon_afternoon_time,
					'tues_is_open'=>$this->input->post('tues_closed')?0:1,
					'tues_morning_time'=>$tues_morning_time,
					'tues_afternoon_time'=>$tues_afternoon_time,
					'wed_is_open'=>$this->input->post('wed_closed')?0:1,
					'wed_morning_time'=>$wed_morning_time,
					'wed_afternoon_time'=>$wed_afternoon_time,
					'thurs_is_open'=>$this->input->post('thurs_closed')?0:1,
					'thurs_morning_time'=>$thurs_morning_time,
					'thurs_afternoon_time'=>$thurs_afternoon_time,
					'fri_is_open'=>$this->input->post('fri_closed')?0:1,
					'fri_morning_time'=>$fri_morning_time,
					'fri_afternoon_time'=>$fri_afternoon_time);
					
					$branch_timetable_id=$this->branch_model->branch_timetable_insert($query_branch_timetable);
					
					
					
					
					$data['message'] =$this->lang->line('successfully_done');
				}
				else
				{
					$data['message'] = $this->lang->line('successfully_not_done');
				}
			}
			else
			{
				$data['message'] = $this->lang->line('successfully_not_done');
			}
		
			$this->load->vars($data);
			$this->load->view('layout/switchy_main');
			
		}
		
		
	}
	
	/*
	FUNCTION NAME :all_branch($limit=null)
	it is for showing all branch list*/
	public function all_branch($limit=null)
	{
		$data['content'] = 'branch/all_branch';
		
		$data['all_branch_list']=$this->branch_model->get_all_branch_list();

		$this->load->vars($data);
		$this->load->view('layout/switchy_main');
	}
	
	public function view_branch($branch_id=0)
	{
		$data['content'] = 'branch/single_branch_view';
		
		$data['branch_details']=$this->branch_model->get_single_branch_by_id($branch_id);

		$this->load->vars($data);
		$this->load->view('layout/switchy_main');
	}
	
	public function edit_branch($branch_id=0)
	{
		$data['content'] = 'branch/edit_branch';
		
		$data['branch_details']=$this->branch_model->get_single_branch_by_id($branch_id);
		
		$b_details=$data['branch_details'];
		
		//Get Time table
		//Sat
		$sat_morning_time=explode("-", $b_details['sat_morning_time']==NULL?"0:0-0:0":$b_details['sat_morning_time']);
		
		$sat_morning_starting_time=explode(":", $sat_morning_time[0]);
		$data['sat_morning_starting_hour']=$sat_morning_starting_time[0];
		$data['sat_morning_starting_minute']=$sat_morning_starting_time[1];
		$sat_morning_ending_time=explode(":", $sat_morning_time[1]);
		$data['sat_morning_ending_hour']=$sat_morning_ending_time[0];
		$data['sat_morning_ending_minute']=$sat_morning_ending_time[1];
		
		
		$sat_afternoon_time=explode("-", $b_details['sat_afternoon_time']==NULL?"0:0-0:0":$b_details['sat_afternoon_time']);
		
		$sat_afternoon_starting_time=explode(":", $sat_afternoon_time[0]);
		$data['sat_afternoon_starting_hour']=$sat_afternoon_starting_time[0];
		$data['sat_afternoon_starting_minute']=$sat_afternoon_starting_time[1];
		$sat_afternoon_ending_time=explode(":", $sat_afternoon_time[1]);
		$data['sat_afternoon_ending_hour']=$sat_afternoon_ending_time[0];
		$data['sat_afternoon_ending_minute']=$sat_afternoon_ending_time[1];
		
		//sun
		$sun_morning_time=explode("-", $b_details['sun_morning_time']==NULL?"0:0-0:0":$b_details['sun_morning_time']);
		
		$sun_morning_starting_time=explode(":", $sun_morning_time[0]);
		$data['sun_morning_starting_hour']=$sun_morning_starting_time[0];
		$data['sun_morning_starting_minute']=$sun_morning_starting_time[1];
		$sun_morning_ending_time=explode(":", $sun_morning_time[1]);
		$data['sun_morning_ending_hour']=$sun_morning_ending_time[0];
		$data['sun_morning_ending_minute']=$sun_morning_ending_time[1];
		
		
		$sun_afternoon_time=explode("-", $b_details['sun_afternoon_time']==NULL?"0:0-0:0":$b_details['sun_afternoon_time']);
		
		$sun_afternoon_starting_time=explode(":", $sun_afternoon_time[0]);
		$data['sun_afternoon_starting_hour']=$sun_afternoon_starting_time[0];
		$data['sun_afternoon_starting_minute']=$sun_afternoon_starting_time[1];
		$sun_afternoon_ending_time=explode(":", $sun_afternoon_time[1]);
		$data['sun_afternoon_ending_hour']=$sun_afternoon_ending_time[0];
		$data['sun_afternoon_ending_minute']=$sun_afternoon_ending_time[1];
		
		//mon
		$mon_morning_time=explode("-", $b_details['mon_morning_time']==NULL?"0:0-0:0":$b_details['mon_morning_time']);
		
		$mon_morning_starting_time=explode(":", $mon_morning_time[0]);
		$data['mon_morning_starting_hour']=$mon_morning_starting_time[0];
		$data['mon_morning_starting_minute']=$mon_morning_starting_time[1];
		$mon_morning_ending_time=explode(":", $mon_morning_time[1]);
		$data['mon_morning_ending_hour']=$mon_morning_ending_time[0];
		$data['mon_morning_ending_minute']=$mon_morning_ending_time[1];
		
		
		$mon_afternoon_time=explode("-", $b_details['mon_afternoon_time']==NULL?"0:0-0:0":$b_details['mon_afternoon_time']);
		
		$mon_afternoon_starting_time=explode(":", $mon_afternoon_time[0]);
		$data['mon_afternoon_starting_hour']=$mon_afternoon_starting_time[0];
		$data['mon_afternoon_starting_minute']=$mon_afternoon_starting_time[1];
		$mon_afternoon_ending_time=explode(":", $mon_afternoon_time[1]);
		$data['mon_afternoon_ending_hour']=$mon_afternoon_ending_time[0];
		$data['mon_afternoon_ending_minute']=$mon_afternoon_ending_time[1];
		
		
		//tues
		$tues_morning_time=explode("-", $b_details['tues_morning_time']==NULL?"0:0-0:0":$b_details['tues_morning_time']);
		
		$tues_morning_starting_time=explode(":", $tues_morning_time[0]);
		$data['tues_morning_starting_hour']=$tues_morning_starting_time[0];
		$data['tues_morning_starting_minute']=$tues_morning_starting_time[1];
		$tues_morning_ending_time=explode(":", $tues_morning_time[1]);
		$data['tues_morning_ending_hour']=$tues_morning_ending_time[0];
		$data['tues_morning_ending_minute']=$tues_morning_ending_time[1];
		
		
		$tues_afternoon_time=explode("-", $b_details['tues_afternoon_time']==NULL?"0:0-0:0":$b_details['tues_afternoon_time']);
		
		$tues_afternoon_starting_time=explode(":", $tues_afternoon_time[0]);
		$data['tues_afternoon_starting_hour']=$tues_afternoon_starting_time[0];
		$data['tues_afternoon_starting_minute']=$tues_afternoon_starting_time[1];
		$tues_afternoon_ending_time=explode(":", $tues_afternoon_time[1]);
		$data['tues_afternoon_ending_hour']=$tues_afternoon_ending_time[0];
		$data['tues_afternoon_ending_minute']=$tues_afternoon_ending_time[1];
		
		
		//wed
		$wed_morning_time=explode("-", $b_details['wed_morning_time']==NULL?"0:0-0:0":$b_details['wed_morning_time']);
		
		$wed_morning_starting_time=explode(":", $wed_morning_time[0]);
		$data['wed_morning_starting_hour']=$wed_morning_starting_time[0];
		$data['wed_morning_starting_minute']=$wed_morning_starting_time[1];
		$wed_morning_ending_time=explode(":", $wed_morning_time[1]);
		$data['wed_morning_ending_hour']=$wed_morning_ending_time[0];
		$data['wed_morning_ending_minute']=$wed_morning_ending_time[1];
		
		
		$wed_afternoon_time=explode("-", $b_details['wed_afternoon_time']==NULL?"0:0-0:0":$b_details['wed_afternoon_time']);
		
		$wed_afternoon_starting_time=explode(":", $wed_afternoon_time[0]);
		$data['wed_afternoon_starting_hour']=$wed_afternoon_starting_time[0];
		$data['wed_afternoon_starting_minute']=$wed_afternoon_starting_time[1];
		$wed_afternoon_ending_time=explode(":", $wed_afternoon_time[1]);
		$data['wed_afternoon_ending_hour']=$wed_afternoon_ending_time[0];
		$data['wed_afternoon_ending_minute']=$wed_afternoon_ending_time[1];
		
		
		//thurs
		$thurs_morning_time=explode("-", $b_details['thurs_morning_time']==NULL?"0:0-0:0":$b_details['thurs_morning_time']);
		
		$thurs_morning_starting_time=explode(":", $thurs_morning_time[0]);
		$data['thurs_morning_starting_hour']=$thurs_morning_starting_time[0];
		$data['thurs_morning_starting_minute']=$thurs_morning_starting_time[1];
		$thurs_morning_ending_time=explode(":", $thurs_morning_time[1]);
		$data['thurs_morning_ending_hour']=$thurs_morning_ending_time[0];
		$data['thurs_morning_ending_minute']=$thurs_morning_ending_time[1];
		
		
		$thurs_afternoon_time=explode("-", $b_details['thurs_afternoon_time']==NULL?"0:0-0:0":$b_details['thurs_afternoon_time']);
		
		$thurs_afternoon_starting_time=explode(":", $thurs_afternoon_time[0]);
		$data['thurs_afternoon_starting_hour']=$thurs_afternoon_starting_time[0];
		$data['thurs_afternoon_starting_minute']=$thurs_afternoon_starting_time[1];
		$thurs_afternoon_ending_time=explode(":", $thurs_afternoon_time[1]);
		$data['thurs_afternoon_ending_hour']=$thurs_afternoon_ending_time[0];
		$data['thurs_afternoon_ending_minute']=$thurs_afternoon_ending_time[1];
		
		
		//fri
		$fri_morning_time=explode("-", $b_details['fri_morning_time']==NULL?"0:0-0:0":$b_details['fri_morning_time']);
		
		$fri_morning_starting_time=explode(":", $fri_morning_time[0]);
		$data['fri_morning_starting_hour']=$fri_morning_starting_time[0];
		$data['fri_morning_starting_minute']=$fri_morning_starting_time[1];
		$fri_morning_ending_time=explode(":", $fri_morning_time[1]);
		$data['fri_morning_ending_hour']=$fri_morning_ending_time[0];
		$data['fri_morning_ending_minute']=$fri_morning_ending_time[1];
		
		
		$fri_afternoon_time=explode("-", $b_details['fri_afternoon_time']==NULL?"0:0-0:0":$b_details['fri_afternoon_time']);
		
		$fri_afternoon_starting_time=explode(":", $fri_afternoon_time[0]);
		$data['fri_afternoon_starting_hour']=$fri_afternoon_starting_time[0];
		$data['fri_afternoon_starting_minute']=$fri_afternoon_starting_time[1];
		$fri_afternoon_ending_time=explode(":", $fri_afternoon_time[1]);
		$data['fri_afternoon_ending_hour']=$fri_afternoon_ending_time[0];
		$data['fri_afternoon_ending_minute']=$fri_afternoon_ending_time[1];
		
		
		
		$created_by_user_id= $this->common_model->get_login_user_id();
		$created_date_time = date("Y-m-d H:i:s");
		
		if($this->branch_model->has_it_main_branch()>0)
		{
			$this->branch_type_array[0]=$this->lang->line('branch_office_branch_label');
		}
		else
		{
			$this->branch_type_array[1]=$this->lang->line('branch_head_branch_label');
		}
       
	    $this->form_validation->set_message('required', 'Required');
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('branch_name', 'branch_name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('branch_type', 'branch_type', 'trim|required|xss_clean');
		$this->form_validation->set_rules('branch_address', 'branch_address', 'trim|xss_clean');
		$this->form_validation->set_rules('branch_city', 'branch_city', 'trim|xss_clean');
		$this->form_validation->set_rules('branch_post_code', 'branch_post_code', 'trim|xss_clean');
		
		
		$message_created_by_user_id= $this->common_model->get_login_user_id();
		$message_created_date_time = date("Y-m-d H:i:s");
		$message_edited_date_time  = date("Y-m-d H:i:s");

		
		if ($this->form_validation->run() == FALSE && trim($this->input->post('hidden_branch_id'))!=$branch_id) 
		{
			$this->load->vars($data);
			$this->load->view('layout/switchy_main');
		} 
		else 
		{
			$address=trim($this->input->post('branch_address'));
			$city=trim($this->input->post('branch_city'));
			$post_code=trim($this->input->post('branch_post_code'));
			$region=trim($this->input->post('branch_region'));
			$country=$this->branch_country_array[trim($this->input->post('branch_country'))];
			$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.urlencode($address).',+'.urlencode($city).',+'.urlencode($post_code).',+'.urlencode($region).',+'.urlencode($country).'&sensor=false');
			$output= json_decode($geocode); //Store values in variableù
			if($output->status == 'OK')
			{
				$lat = $output->results[0]->geometry->location->lat; //Returns Latitude
			    $long = $output->results[0]->geometry->location->lng; // Returns Longitude
			    $full_address=$output->results[0]->formatted_address;
				$query_branch_data=array(
				'branch_name' =>trim($this->input->post('branch_name')),
			    //'is_main_branch' =>$this->input->post('branch_type'),
			    'branch_address' =>$address,
			    'branch_city' =>$city,
			    'branch_post_code' =>$post_code,
			    'branch_region' =>$region,
			    'branch_country' =>$country,
			    'branch_full_address'=>$full_address ,
			    'branch_cell_number' =>NULL,
			    'branch_land_phone_number' =>NULL,
			    'branch_fax_number' =>NULL,
			    'branch_email_address' =>trim($this->input->post('branch_email_address')),
			    'branch_web_site_link' =>trim($this->input->post('branch_web_site')),
			    'branch_lat_value' =>$lat,
			    'branch_long_value' =>$long,
			    'branch_about_us' =>trim($this->input->post('branch_about_us')),
			    'ref_branch_created_user_id' =>$created_by_user_id,
			    'branch_created_date_time' =>$created_date_time,
				);
				//Insert Branch Customer Care table
					$query_branch_customer_care=array(
					'ref_branch_customer_care_branch_id'=>$branch_id,
					'branch_customer_care_email_address'=>trim($this->input->post('branch_email_address')),
					'branch_customer_care_call_us_number'=>trim($this->input->post('branch_contact_number')),
					'branch_customer_care_send_message_number'=>NULL,
					'branch_customer_care_facebook_page'=>trim($this->input->post('branch_facebook_page'))
					);
				$mon_morning_time=$this->input->post('mon_morning_starting_hour').":".$this->input->post('mon_morning_starting_minute')."-".$this->input->post('mon_morning_ending_hour').":".$this->input->post('mon_morning_ending_minute');
                    $mon_afternoon_time=$this->input->post('mon_afternoon_starting_hour').":".$this->input->post('mon_afternoon_starting_minute')."-".$this->input->post('mon_afternoon_ending_hour').":".$this->input->post('mon_afternoon_ending_minute');
                    $tues_morning_time=$this->input->post('tues_morning_starting_hour').":".$this->input->post('tues_morning_starting_minute')."-".$this->input->post('tues_morning_ending_hour').":".$this->input->post('tues_morning_ending_minute');
                    $tues_afternoon_time=$this->input->post('tues_afternoon_starting_hour').":".$this->input->post('tues_afternoon_starting_minute')."-".$this->input->post('tues_afternoon_ending_hour').":".$this->input->post('tues_afternoon_ending_minute');
                    $wed_morning_time=$this->input->post('wed_morning_starting_hour').":".$this->input->post('wed_morning_starting_minute')."-".$this->input->post('wed_morning_ending_hour').":".$this->input->post('wed_morning_ending_minute');
                    $wed_afternoon_time=$this->input->post('wed_afternoon_starting_hour').":".$this->input->post('wed_afternoon_starting_minute')."-".$this->input->post('wed_afternoon_ending_hour').":".$this->input->post('wed_afternoon_ending_minute');
                    $thurs_morning_time=$this->input->post('thurs_morning_starting_hour').":".$this->input->post('thurs_morning_starting_minute')."-".$this->input->post('thurs_morning_ending_hour').":".$this->input->post('thurs_morning_ending_minute');
                    $thurs_afternoon_time=$this->input->post('thurs_afternoon_starting_hour').":".$this->input->post('thurs_afternoon_starting_minute')."-".$this->input->post('thurs_afternoon_ending_hour').":".$this->input->post('thurs_afternoon_ending_minute');
                    $fri_morning_time=$this->input->post('fri_morning_starting_hour').":".$this->input->post('fri_morning_starting_minute')."-".$this->input->post('fri_morning_ending_hour').":".$this->input->post('fri_morning_ending_minute');
                    $fri_afternoon_time=$this->input->post('fri_afternoon_starting_hour').":".$this->input->post('fri_afternoon_starting_minute')."-".$this->input->post('fri_afternoon_ending_hour').":".$this->input->post('fri_afternoon_ending_minute');
                    $sat_morning_time=$this->input->post('sat_morning_starting_hour').":".$this->input->post('sat_morning_starting_minute')."-".$this->input->post('sat_morning_ending_hour').":".$this->input->post('sat_morning_ending_minute');
                    $sat_afternoon_time=$this->input->post('sat_afternoon_starting_hour').":".$this->input->post('sat_afternoon_starting_minute')."-".$this->input->post('sat_afternoon_ending_hour').":".$this->input->post('sat_afternoon_ending_minute');
                    $sun_morning_time=$this->input->post('sun_morning_starting_hour').":".$this->input->post('sun_morning_starting_minute')."-".$this->input->post('sun_morning_ending_hour').":".$this->input->post('sun_morning_ending_minute');
                    $sun_afternoon_time=$this->input->post('sun_afternoon_starting_hour').":".$this->input->post('sun_afternoon_starting_minute')."-".$this->input->post('sun_afternoon_ending_hour').":".$this->input->post('sun_afternoon_ending_minute');

					//insert branch_timetable
					$query_branch_timetable=array(
					'ref_branch_timetable_branch_id'=>$branch_id,
					'sat_is_open'=>$this->input->post('sat_closed')?0:1,
					'sat_morning_time'=>$sat_morning_time,
					'sat_afternoon_time'=>$sat_afternoon_time,
					'sun_is_open'=>$this->input->post('sun_closed')?0:1,
					'sun_morning_time'=>$sun_morning_time,
					'sun_afternoon_time'=>$sun_afternoon_time,
					'mon_is_open'=>$this->input->post('mon_closed')?0:1,
					'mon_morning_time'=>$mon_morning_time,
					'mon_afternoon_time'=>$mon_afternoon_time,
					'tues_is_open'=>$this->input->post('tues_closed')?0:1,
					'tues_morning_time'=>$tues_morning_time,
					'tues_afternoon_time'=>$tues_afternoon_time,
					'wed_is_open'=>$this->input->post('wed_closed')?0:1,
					'wed_morning_time'=>$wed_morning_time,
					'wed_afternoon_time'=>$wed_afternoon_time,
					'thurs_is_open'=>$this->input->post('thurs_closed')?0:1,
					'thurs_morning_time'=>$thurs_morning_time,
					'thurs_afternoon_time'=>$thurs_afternoon_time,
					'fri_is_open'=>$this->input->post('fri_closed')?0:1,
					'fri_morning_time'=>$fri_morning_time,
					'fri_afternoon_time'=>$fri_afternoon_time);
					
					$status=$this->branch_model->update_all_table_branch($query_branch_data,$query_branch_customer_care,$query_branch_timetable,$branch_id);
					
					if($status==1)
					{
						$data['message'] = $this->lang->line('successfully_done');
					}
					else
					{
						$data['message'] = $this->lang->line('successfully_not_done');
					}
				
				
			    
			}
			else
			{
				$data['message'] = $this->lang->line('successfully_not_done');
			}
		redirect('view_branch/'.$branch_id);
			$this->load->vars($data);
			$this->load->view('layout/switchy_main');
			
		}
		
		
	}
	
	public function delete_branch()
	{
		
		
		$this->branch_model-> delete_branch_by_id(trim($this->input->post('delete_branch_id')));

		redirect(site_url('all_branch'));
	}
	
	
}
	
	