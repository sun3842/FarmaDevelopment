<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pharmacists extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('pharmacists_model');
        $this->load->model('common_model');
        $this->load->library('form_validation');
        $this->load->library('session');

        if ($this->session->userdata('login') != 1) {
            redirect(base_url());
        }

        if ($this->session->userdata('language')) {
            if ($this->session->userdata('language') == LANG_EN) {
                $this->lang->load('menu_en', 'english');
                $this->lang->load('pharmacists_en', 'english');
            } else if ($this->session->userdata('language') == LANG_IT) {
                $this->lang->load('menu_it', 'italian');
                $this->lang->load('pharmacists_it', 'italian');
            } else {
                $this->lang->load('menu_it', 'italian');
                $this->lang->load('pharmacists_it', 'italian');
            }
        } else {
            $this->lang->load('menu_it', 'italian');
            $this->lang->load('pharmacists_it', 'italian');
        }
    }

    public function index()
    {

    }

    public function create_pharmacist()
    {
        $data['content'] = 'pharmacists/add_pharmacists';
        $this->form_validation->set_message('required', $this->lang->line('required'));
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $this->form_validation->set_rules('first_name', 'first_name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('last_name', 'last_name', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->vars($data);
            $this->load->view('layout/switchy_main');
            $this->load->view('pharmacists/add_pharmacists_js');
        } else {
            $image_details = $this->save_image();
            $has_image = 0;
            if ($image_details['status'] == 1) {
                $image_info = $image_details['image_data'];
                $has_image = 1;
            }

            $current_date = date('Y-m-d h:i:sa');
            $query_data = array(
                'ref_farmacisti_pharmacy_id' => $this->session->userdata('pharmacy_id'),
                'farmacisti_first_name	' => $this->input->post('first_name'),
                'farmacisti_last_name' => $this->input->post('last_name'),
                'farmacisti_job_position' => $this->input->post('job_position'),
                'farmacisti_photo_location' => $has_image == 1 ? "all_images/image_pharmacist/original_image/" . $image_info['file_name'] : NULL,
                'farmacisti_created_edited_date_time' => $current_date,
                'farmacisti_active' => 1

            );
            $pharmacist_id = $this->pharmacists_model->pharmacist_insert($query_data);

            if ($pharmacist_id > 0) {
                $data['message'] = SUCCESSFULLY_DONE;


                //$this->push_common_message_to_android_users($message_id);
                //$this->push_common_message_to_ios_users($message_id);


                redirect(base_url('all_pharmacists'));

            } else {
                $data['message'] = SUCCESSFULLY_NOT_DONE;
                $this->load->vars($data);

                $this->load->view('layout/switchy_main');
            }
            // print_r($_POST);die();
        }

    }

    public function save_image()
    {

        $return_array = array();


        $config = array(
            'upload_path' => dirname($_SERVER["SCRIPT_FILENAME"]) . '/all_images/image_pharmacist/original_image/',
            'upload_url' => base_url() . "files/",
            'allowed_types' => "gif|jpg|jpeg|png",


        );
        $this->load->library('upload', $config);

        $uploading_file_info = array();


        if ($this->upload->do_upload()) {
            $data = $this->upload->data();

            $return_array['image_data'] = $data;
            $return_array['status'] = 1;
            $target_fileName_with_folder = "all_images/image_pharmacist/original_image/" . $data['file_name'];
            $rename_fileName = $data['file_name'];
        } else {
            $errors = $this->upload->display_errors();
            $return_array['status'] = 0;
            echo $errors;
        }


        return $return_array;
    }

    public function all_pharmacists_page()
    {
        $data['content'] = "pharmacists/all_pharmacists";
        $data['pharmacists'] = $this->pharmacists_model->get_all_pharmacists();

        $this->load->vars($data);
        $this->load->view('layout/switchy_main');
        $this->load->view('pharmacists/all_pharmacists_js');


    }

    public function delete_pharmacist($id)
    {
        $this->pharmacists_model->delete_pharmacist_by_id($id);
        redirect(base_url('all_pharmacists'));
    }

    public function edit_pharmacist($id)
    {
        $data['content'] = "pharmacists/edit_pharmacist";
        $this->form_validation->set_message('required', $this->lang->line('required'));
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $this->form_validation->set_rules('first_name', 'first_name', 'required');
        $this->form_validation->set_rules('last_name', 'last_name', 'required');

        if ($this->form_validation->run() == FALSE) {
            //print_r('valid failed');die();
            $data['pharmacist'] = $this->pharmacists_model->get_pharmacist_by_id($id);
            $this->load->vars($data);
            $this->load->view('layout/switchy_main');
            $this->load->view('pharmacists/add_pharmacists_js');
        }
        else {
            //print_r('valid success');die();
            $image_details = $this->save_image();
            $has_image = 0;
            if ($image_details['status'] == 1) {
                $image_info = $image_details['image_data'];
                $has_image = 1;
            }

            $current_date = date('Y-m-d h:i:sa');
            $query_data = array(
                'farmacisti_first_name	' => $this->input->post('first_name'),
                'farmacisti_last_name' => $this->input->post('last_name'),
                'farmacisti_job_position' => $this->input->post('job_position'),
                'farmacisti_created_edited_date_time' => $current_date,
                'farmacisti_active' => 1

            );
            if ($has_image == 1) {
                $query_data['farmacisti_photo_location'] = 'all_images/image_pharmacist/original_image/'.$image_info['file_name'];
            }
            //print_r($query_data);die();
            $this->pharmacists_model->update_pharmacist_by_id($query_data, $id);
            redirect(base_url('all_pharmacists'));


        }

    }
}