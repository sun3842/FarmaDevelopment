<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {
	
	public $views_folder_name;

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('common_model');
		$this->load->model('products_model');
		$this->load->library('session');
        $this->load->library('form_validation');
		
		if($this->session->userdata('login')!=1 && $this->session->userdata('user_type')!=USER_TYPE_SUPER_ADMIN)
		{
			redirect(base_url());
		}
		
		if($this->session->userdata('language'))
		{
			if($this->session->userdata('language')==LANG_EN)
			{
				$this->lang->load('menu_en','english');
				
				$this->lang->load('products_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				
				$this->lang->load('products_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				
				$this->lang->load('products_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
				
			$this->lang->load('products_it','italian');
		}
	}
	
	public function products_list_page()
	{

		$data['content'] = 'products/products_list_page';
		$data['products_list']=$this->products_model->get_products_list();
		$data['new_product_list']=$this->products_model->get_new_products_list();
		$data['free_product_list']=$this->products_model->get_free_products_list();
		$this->load->vars($data);
		$this->load->view('layout/switchy_main');
		$this->load->view('products/products_list_page_js');
	}
	
	public function single_product_page($product_id=0)
	{
		if($product_id==0 && !ctype_digit($product_id))
		{
			redirect(base_url());
		}
		
		$data['content'] = 'products/single_product_page';
		
		$data['product']=$this->products_model->get_product_details($product_id);
		$this->load->vars($data);
		$this->load->view('layout/switchy_main');
		$this->load->view('products/single_product_page_js');
	}




	public function get_all_product_data_autocomelete()
    {
        $param = $_POST['select_product'];
        $productObj=new Products_Model();
        $productData=$productObj->get_product_details_on_autocomplete($param);
        print_r(json_encode($productData));
    }




    public function save_image()
    {

        $return_array = array();


        $config = array(
            'upload_path' => dirname($_SERVER["SCRIPT_FILENAME"]) . '/all_images/image_products/original_image/',
            'upload_url' => base_url() . "files/",
            'allowed_types' => "gif|jpg|jpeg|png",


        );
        $this->load->library('upload', $config);

        $uploading_file_info = array();


        if ($this->upload->do_upload()) {
            $data = $this->upload->data();

            $return_array['image_data'] = $data;
            $return_array['status'] = 1;
            $target_fileName_with_folder = "all_images/image_products/original_image/" . $data['file_name'];
            $rename_fileName = $data['file_name'];
        } else {
            $errors = $this->upload->display_errors();
            $return_array['status'] = 0;
            echo $errors;
        }


        return $return_array;
    }


    public function add_new_product()
    {
       // print_r($this->session->all_userdata());die();
        if(count($_POST)>0 && $this->input->post('product_title')){
           //print_r($_POST);die();
            $this->form_validation->set_message('required', $this->lang->line('required'));
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_rules('product_title', 'product_title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('product_description', 'product_description', 'trim|required|xss_clean');
            $this->form_validation->set_rules('product_normal_price', 'product_normal_price', 'trim|required|numeric|xss_clean');
            if($this->form_validation->run()){
                $image_details = $this->save_image();
                $has_image = 0;
                if ($image_details['status'] == 1) {
                    $image_info = $image_details['image_data'];
                    $has_image = 1;
                }

                $current_date = date('Y-m-d h:i:sa');
                $pharmacy_id=NULL;
                $product_free_text_form_farma=1;
                if($this->session->userdata('pharmacy_id')!=NULL){
                    $pharmacy_id=$this->session->userdata('pharmacy_id');
                    $product_free_text_form_farma=0;
                }
                $params = array(
                    'product_free_text_from_farma' => $product_free_text_form_farma,
                    'ref_product_free_text_pharmacy_id' => $pharmacy_id,
                    'product_free_text_created_edited_date_time' => $current_date,
                    'product_free_text_active' => 1,
                    'product_free_text_name' => $this->input->post('product_title'),
                    'product_free_text_description' => $this->input->post('product_description'),
                    'product_free_text_price'=>$this->input->post('product_normal_price'),
                    'product_free_text_image_storage_path' => $has_image == 1 ? "all_images/image_products/original_image/" . $image_info['file_name'] : NULL,
                );
                $product_free_text_id=$this->products_model->add_product_free_text($params);
                $params=array(
                   'ref_final_product_product_free_text_id'=>$product_free_text_id,
                    'final_product_created_edited_date_time'=>$current_date,
                );
                $final_product_id=$this->products_model->add_final_product($params);
                $this->session->set_flashdata('message', 'SAVED');
                redirect(base_url('products'));
            }
            else{
               redirect(uri_string());
            }

        }
        else if(sizeof($_POST)>0){
            $current_date=date('Y-m-d h:i:sa');
            $super_admin=1;
            $pharmacy_id=NULL;
            if($this->session->userdata('pharmacy_id')!=NULL){
                $super_admin=0;
                $pharmacy_id=$this->session->userdata('pharmacy_id');
            }
            $params = array(
                'product_new_codice_catena' => $this->input->post('codice_catena'),
                'product_new_codice_sito' => $this->input->post('codice_sito'),
                'product_new_codinterno' => $this->input->post('codinterno'),
                'product_new_codminsan' => $this->input->post('codminsan'),
                'product_new_codean' => $this->input->post('codean'),
                'product_new_descrizione_ricerca' => $this->input->post('descrizione_ricerca'),
                'product_new_descrizione_ecommerce' => $this->input->post('descrizione_ecommerce'),
                'product_new_descrizione_h1' => $this->input->post('descrizione_h1'),
                'product_new_descrizione_h2' => $this->input->post('descrizione_h2'),
                'product_new_descrizione_ditta' => $this->input->post('descrizione_ditta'),
                'product_new_prezzo_web_netto' => $this->input->post('prezzo_web_netto'),
                'product_new_prezzo_web_lordo' => $this->input->post('prezzo_web_lordo'),
                'product_new_sconto_web' => $this->input->post('sconto_web'),
                'product_new_iva' => $this->input->post('iva'),
                'product_new_visualizzazione_home_page' => $this->input->post('visualizzazione_home_page'),
                'product_new_visualizzazione_civetta' => $this->input->post('visualizzazione_civetta'),
                'product_new_codice_monografia' => $this->input->post('codice_monografia'),
                'product_new_codice_testo_immagine' => $this->input->post('codice_testo_immagine'),
                'product_new_linkImmagineProdotto' => $this->input->post('linkImmagineProdotto'),
                'product_new_linkPaginaProdotto' => $this->input->post('linkPaginaProdotto'),
                'product_new_tree_id_label' => $this->input->post('tree_id_label'),
                'product_new_tree_label' => $this->input->post('tree_label'),
                'product_new_added_by_super_admin' => $super_admin,
                'product_new_ref_pharmacy_id' => $pharmacy_id,
                'product_new_active' => 1,
                'product_new_updated_date_time' => $current_date,
            );
            $product_id=$this->products_model->add_product_with_all_info($params);
            $params=array(
                'ref_final_product_product_new_id'=>$product_id,
                'final_product_created_edited_date_time'=>$current_date,
            );
            $final_product_id=$this->products_model->add_final_product($params);
            $this->session->set_flashdata('message', 'SAVED');
            redirect(base_url('products'));
            //print_r($_POST);die();
        }else{
            $data['content'] = 'products/add_new_product';
            $data['categories']=$this->products_model->get_all_category();
            $this->load->vars($data);
            $this->load->view('layout/switchy_main');
            $this->load->view('products/add_new_product_js');
        }

    }

    public function new_product_page($new_product_id){

        $data['content'] = 'products/new_product_details_page';
        $data['product']=$this->products_model->get_new_product_details($new_product_id);
        $this->load->vars($data);
        $this->load->view('layout/switchy_main');
        //$this->load->view('products/single_product_page_js');
    }

    public function edit_new_product($new_product_id){
        if(count($_POST)>0){
            $current_date=date('Y-m-d h:i:sa');
            $params = array(
                'product_new_codice_catena' => $this->input->post('codice_catena'),
                'product_new_codice_sito' => $this->input->post('codice_sito'),
                'product_new_codinterno' => $this->input->post('codinterno'),
                'product_new_codminsan' => $this->input->post('codminsan'),
                'product_new_codean' => $this->input->post('codean'),
                'product_new_descrizione_ricerca' => $this->input->post('descrizione_ricerca'),
                'product_new_descrizione_ecommerce' => $this->input->post('descrizione_ecommerce'),
                'product_new_descrizione_h1' => $this->input->post('descrizione_h1'),
                'product_new_descrizione_h2' => $this->input->post('descrizione_h2'),
                'product_new_descrizione_ditta' => $this->input->post('descrizione_ditta'),
                'product_new_prezzo_web_netto' => $this->input->post('prezzo_web_netto'),
                'product_new_prezzo_web_lordo' => $this->input->post('prezzo_web_lordo'),
                'product_new_sconto_web' => $this->input->post('sconto_web'),
                'product_new_iva' => $this->input->post('iva'),
                'product_new_visualizzazione_home_page' => $this->input->post('visualizzazione_home_page'),
                'product_new_visualizzazione_civetta' => $this->input->post('visualizzazione_civetta'),
                'product_new_codice_monografia' => $this->input->post('codice_monografia'),
                'product_new_codice_testo_immagine' => $this->input->post('codice_testo_immagine'),
                'product_new_linkImmagineProdotto' => $this->input->post('linkImmagineProdotto'),
                'product_new_linkPaginaProdotto' => $this->input->post('linkPaginaProdotto'),
                'product_new_tree_id_label' => $this->input->post('tree_id_label'),
                'product_new_tree_label' => $this->input->post('tree_label'),
                'product_new_active' => 1,
                'product_new_updated_date_time' => $current_date,
            );
            $this->products_model->update_product_with_all_info($params,$new_product_id);
            $this->session->set_flashdata('message', 'UPDATED');
            redirect(base_url('products'));

        }
        else{
            $data['content'] = 'products/new_product_edit_page';
            $data['product']=$this->products_model->get_new_product_details($new_product_id);
            $data['categories']=$this->products_model->get_all_category();
            $this->load->vars($data);
            $this->load->view('layout/switchy_main');
            $this->load->view('products/add_new_product_js');
        }

    }

    function free_text_product_details_page($product_id){
        $data['content'] = 'products/free_text_product_details_page';
        $data['product']=$this->products_model->get_free_text_product_by_id($product_id);
        $this->load->vars($data);
        $this->load->view('layout/switchy_main');
    }

    function free_text_product_edit_page($product_id){
        if(count($_POST)>0){
            //print_r($_POST);die();
            $this->form_validation->set_message('required', $this->lang->line('required'));
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_rules('product_title', 'product_title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('product_description', 'product_description', 'trim|required|xss_clean');
            $this->form_validation->set_rules('product_normal_price', 'product_normal_price', 'trim|required|numeric|xss_clean');
            if($this->form_validation->run()){
                $image_details = $this->save_image();
                $has_image = 0;
                if ($image_details['status'] == 1) {
                    $image_info = $image_details['image_data'];
                    $has_image = 1;
                }

                $current_date = date('Y-m-d h:i:sa');
//                $pharmacy_id=NULL;
//                $product_free_text_form_farma=1;
//                if($this->session->userdata('pharmacy_id')!=NULL){
//                    $pharmacy_id=$this->session->userdata('pharmacy_id');
//                    $product_free_text_form_farma=0;
//                }
                $params = array(
                    'product_free_text_created_edited_date_time' => $current_date,
                    'product_free_text_name' => $this->input->post('product_title'),
                    'product_free_text_description' => $this->input->post('product_description'),
                    'product_free_text_price'=>$this->input->post('product_normal_price'),
                );
                if($has_image==1){
                    $params['product_free_text_image_storage_path']="all_images/image_products/original_image/" . $image_info['file_name'];
                }
                $this->products_model->update_product_free_text($params,$product_id);
                $this->session->set_flashdata('message', 'UPDATED');
                redirect(base_url('products'));
            }
            else{
                redirect(uri_string());
            }
        }
        $data['content'] = 'products/free_text_product_edit_page';
        $data['product']=$this->products_model->get_free_text_product_by_id($product_id);
        $this->load->vars($data);
        $this->load->view('layout/switchy_main');
        $this->load->view('products/add_new_product_js');
    }


    public function delete_new_product($id){

        $order=$this->products_model->get_order_by_new_product_id($id);
        if(sizeof($order)<=0){

            $params=array(
                'product_new_active'=>0
            );

            $this->products_model->delete_new_product_by_id($params,$id);
            $params=array(
                'final_product_active'=>0,
            );
            $this->products_model->delete_final_product_by_new_product_id($params,$id);
            $this->session->set_flashdata('error', 'DELETED');
            redirect('products');
        }
        else{
            $this->session->set_flashdata('message', 'Cant Delete!! Some Orders Are Waiting In Queue..');
            redirect(base_url('products'));
        }

    }
    public function delete_free_text_product($id){
        $order=$this->products_model->get_order_by_free_text_product_id($id);
        if(sizeof($order)<=0){

            $params=array(
                'product_free_text_active'=>0
            );

            $this->products_model->delete_free_text_product_by_id($params,$id);
            $params=array(
                'final_product_active'=>0,
            );
            $this->products_model->delete_final_product_by_free_text_product_id($params,$id);
            $this->session->set_flashdata('error', 'DELETED');
            redirect(base_url('products'));
        }
        else{
            $this->session->set_flashdata('message', 'Cant Delete!! Some Orders Are Waiting In Queue..');
            redirect(base_url('products'));
        }

    }
	
}
	
	