<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pharmacy extends CI_Controller {
	
	public $views_folder_name;

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('common_model');
		$this->load->model('pharmacy_model');
		$this->load->library('session');
        $this->load->library('form_validation');
		
		/*
		if($this->session->userdata('login')!=1 && $this->session->userdata('user_type')!=USER_TYPE_SUPER_ADMIN)
		{
			redirect(base_url());
		}
		*/
		if($this->session->userdata('login')!=1)
		{
			redirect(base_url());
		}
		
		if($this->session->userdata('language'))
		{
			if($this->session->userdata('language')==LANG_EN)
			{
				$this->lang->load('menu_en','english');
				
				$this->lang->load('pharmacy_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				
				$this->lang->load('pharmacy_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				
				$this->lang->load('pharmacy_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
				
			$this->lang->load('pharmacy_it','italian');
		}
	}


    public function save_image()
    {

        $return_array = array();


        $config = array(
            'upload_path' => dirname($_SERVER["SCRIPT_FILENAME"]) . '/all_images/image_pharmacy/original_image/logo/',
            'upload_url' => base_url() . "files/",
            'allowed_types' => "gif|jpg|jpeg|png",


        );
        $this->load->library('upload', $config);
//print_r($config);die();
        $uploading_file_info = array();


        if ($this->upload->do_upload()) {
            $data = $this->upload->data();

            $return_array['image_data'] = $data;
            $return_array['status'] = 1;
            $target_fileName_with_folder = "/all_images/image_pharmacy/original_image/logo/". $data['file_name'];
            $rename_fileName = $data['file_name'];
        } else {
            $errors = $this->upload->display_errors();
            $return_array['status'] = 0;
            echo $errors;
        }


        return $return_array;
    }
	
	public function pharmacy_list_page()
	{
		
		
		$data['content'] = 'pharmacy/pharmacy_list';
		
		$data['pharmacy_list']=$this->pharmacy_model->get_pharmacy_list();
		
		$this->load->vars($data);
		$this->load->view('layout/switchy_main');
		$this->load->view('pharmacy/pharmacy_list_js');
	}

    public function about_pharmacy($id)
    {
        $data['content'] = 'pharmacy/about_pharmacy';

        $data['pharmacy']=$this->pharmacy_model->get_pharmacy($id);
        $this->load->vars($data);
        $this->load->view('layout/switchy_main');
        $this->load->view('pharmacy/about_pharmacy_js');

    }

    function edit_pharmacy($pharmacy_id)
    {
        // check if the pharmacy exists before trying to edit it
        $data['pharmacy'] = $this->pharmacy_model->get_pharmacy($pharmacy_id);

        if(isset($data['pharmacy']['pharmacy_id']))
        {

            $this->form_validation->set_rules('pharmacy_facebook_url', 'Facebook url', 'required');


            if($this->form_validation->run() == true)
            {
                $image_details = $this->save_image();
                $has_image = 0;
                if ($image_details['status'] == 1) {
                    $image_info = $image_details['image_data'];
                    $has_image = 1;
                }

                $current_date = date('Y-m-d h:i:sa');
                $params = array(

                    'pharmacy_facebook_url' => $this->input->post('pharmacy_facebook_url'),
                    'pharmacy_updated_date_time' => $current_date,

                );

                if ($has_image == 1) {
                    $params['pharmacy_logo_storage_path'] = '/all_images/image_pharmacy/original_image/logo/'.$image_info['file_name'];
                }



                $this->pharmacy_model->update_pharmacy($pharmacy_id,$params);
                $this->session->set_flashdata('message', 'UPDATED');
                redirect('about_pharmacy/'.$pharmacy_id);
            }
            else
            {
                $data['content'] = 'pharmacy/pharmacy_edit_form';
                $this->load->vars($data);
                $this->load->view('layout/switchy_main');
                $this->load->view('pharmacy/pharmacy_edit_form_js');
            }
        }
        else
            show_error('The pharmacy you are trying to edit does not exist.');
    }

}
	
	