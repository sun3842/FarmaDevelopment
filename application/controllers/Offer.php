 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Offer extends CI_Controller {
	
	


	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('offer_model');
		$this->load->model('products_model');
		$this->load->model('common_model');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('image_lib');
		$this->load->library('upload');

		if($this->session->userdata('login')!=1)
		{
			redirect(base_url());
		}
		
		
		
		if($this->session->userdata('language'))
		{
			if($this->session->userdata('language')==LANG_EN)
			{
				$this->lang->load('menu_en','english');
				$this->lang->load('offer_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('offer_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('offer_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
			$this->lang->load('offer_it','italian');
		}
	}
	
	public function index()
	{	
	}




//    public function create_offer()
//    {
//        if ($this->input->post('offer_type') == 3) {
//            $data['content'] = 'offer/add_offer_form';
//            $data['add_pdf'] = '  ';
//            $data['add_product_from_network'] = ' active ';
//            $data['free_text'] = '  ';
//            $created_date_time = date("Y-m-d H:i:s");
//            $edited_date_time = date("Y-m-d H:i:s");
//
//            $this->form_validation->set_message('required', 'Required');
//
//            $this->form_validation->set_rules('offer_products_offer_price', 'Offer Price', 'required');
//
//            if ($this->form_validation->run()) {
//
//                $product_id = $this->input->post('product_id');
//                $startDate = $this->input->post('offer_products_starting_date_time');
//                $endDate = $this->input->post('offer_products_ending_date_time');
//                $normalPrice = $this->input->post('normal_price');
//                $offerPrice = $this->input->post('offer_products_offer_price');
//                $pharmacy_id = NULL;
//                $product_free_text_form_farma = 1;
//                if ($this->session->userdata('pharmacy_id') != NULL) {
//                    $pharmacy_id = $this->session->userdata('pharmacy_id');
//                    $product_free_text_form_farma = 0;
//                }
//                foreach ($product_id as $key => $t) {
//                    $params = array(
//                        'offer_products_from_farma' => $product_free_text_form_farma,
//                        'offer_products_type' => 0,
//                        'ref_offer_products_final_product_id' => $product_id[$key],
//                        'ref_offer_products_pharmacy_id' => $pharmacy_id,
//                        'offer_products_starting_date_time' => $startDate[$key],
//                        'offer_products_ending_date_time' => $endDate[$key],
//                        'offer_products_creating_editing_date_time' => $created_date_time,
//                        'offer_products_normal_price' => $normalPrice[$key],
//                        'offer_products_offer_price' => $offerPrice[$key],
//                    );
//
//                    $offer_product_id = $this->offer_model->add_offer_product($params);
//
//
//                }
//                $data['message'] = $this->lang->line('done_status');
//                redirect(site_url('offer'));
//
//
//            } else {
//                $this->load->vars($data);
//                $this->load->view('layout/switchy_main');
//                $this->load->view('offer/add_offer_form_js');
//
//
//            }
//
//        }
//        elseif ($this->input->post('offer_type') == 2) {
//
//            if (count($_POST) > 0 && $this->input->post('product_title'))  {
//                $this->form_validation->set_message('required', $this->lang->line('required'));
//                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
//                $this->form_validation->set_rules('product_title', 'product_title', 'required');
//                $this->form_validation->set_rules('product_description', 'product_description', 'required');
//
//                if ($this->form_validation->run()) {
//
//                    $product_title = $this->input->post('product_title');
//                    $product_details = $this->input->post('product_description');
//                    $image = $this->input->post('product_free_text_image_storage_path');
//                    $normalPrice = $this->input->post('normalPriceFreeText');
//                    $offer_products_offer_price = $this->input->post('offer_products_offer_price');
//                    $offer_products_start_date_time = $this->input->post('offer_products_start_date_time');
//                    $offer_products_ending_date_time = $this->input->post('offer_products_ending_date_time');
//                    foreach ($product_title as $key => $t) {
//
//                        $img = $image[$key];
//                        list($type, $img) = explode(';', $img);
//                        list(, $img) = explode(',', $img);
//                        $imgExt = explode('/', $type);
//                        $ext = end($imgExt);
//                        $img = base64_decode($img);
//                        $dir = 'all_images/image_offer/original_image/' . rand(11111, 99999999) . "." . $ext;
//
//
//                        file_put_contents($dir, $img);
//
//                        $current_date = date('Y-m-d h:i:sa');
//                        if ($this->session->userdata('pharmacy_id') != NULL) {
//                            $pharmacy_id = $this->session->userdata('pharmacy_id');
//                            $product_free_text_form_farma = 0;
//                        }
//                        $params = array(
//                            'product_free_text_from_farma' => $product_free_text_form_farma,
//                            'ref_product_free_text_pharmacy_id' => $pharmacy_id,
//                            'product_free_text_created_edited_date_time' => $current_date,
//                            'product_free_text_active' => 1,
//                            'product_free_text_name' => $product_title[$key],
//                            'product_free_text_description' => $product_details[$key],
//                            'product_free_text_image_storage_path' => $dir,
//                            'product_free_text_price' => $normalPrice[$key],
//
//                        );
//                        $product_free_text_id = $this->products_model->add_product_free_text($params);
//
//                        $params2 = array(
//                            'offer_products_from_farma' => $product_free_text_form_farma,
//                            'offer_products_type' => 2,
//                            'ref_offer_products_pharmacy_id' => $pharmacy_id,
//                            'offer_products_starting_date_time' => $offer_products_start_date_time[$key],
//                            'offer_products_ending_date_time' => $offer_products_ending_date_time[$key],
//                            'offer_products_creating_editing_date_time' => $current_date,
//                            'offer_products_normal_price' => $normalPrice[$key],
//                            'offer_products_offer_price' => $offer_products_offer_price[$key],
//                            'ref_offer_products_final_product_id' => $product_free_text_id,
//
//
//                        );
//
//                        $offer_product_id = $this->offer_model->add_offer_product($params2);
//
//
//                    }
//                    $data['message'] = $this->lang->line('done_status');
//                    redirect(site_url('offer' ));
//                }
//            }
//            else
//            {
//               redirect(uri_string());
//            }
//
//
//        }
//
//        else {
//
//
//            $data['content'] = 'offer/add_offer_form';
//            $data['add_pdf'] = ' active ';
//            $data['add_product_from_network'] = '  ';
//            $data['free_text'] = '  ';
//
//
////            $this->load->library('form_validation');
////
////            $this->form_validation->set_rules('offer_pdf_title', 'Offer Title', 'required');
//////            $this->form_validation->set_rules('offer_starting_date', 'Start Date', 'required');
//////            $this->form_validation->set_rules('offer_ending_date', 'End Date', 'required');
//
////
////            if ($this->form_validation->run()) {
//
//           if (count($_POST)>0) {
//
//
//               if ($_FILES['filepdf']['name'] != '') {
//                   if (!is_dir('./all_images/image_offer/original_image/pdf/')) {
//                       mkdir('./all_images/image_offer/original_image/pdf/');
//                   }
//                   $file_name = explode('.', $_FILES["filepdf"]["name"]);
//                   $file_extension = end($file_name);
//                   $temp_name = rand(1, 5000) . rand(5000, 100000) . "." . $file_extension;
//                   $config['upload_path'] = './all_images/image_offer/original_image/pdf/';
//                   $config['allowed_types'] = "pdf";
//                   $config['file_name'] = $temp_name;
//                   $this->upload->initialize($config);
//                   if (!$this->upload->do_upload('filepdf')) {
//                       $error = array('error' => $this->upload->display_errors());
//                       print_r($error);
//
//                       redirect(uri_string());
//
//                   } else {
//                       $current_date = date('Y-m-d h:i:sa');
//
//                       if ($this->session->userdata('pharmacy_id') != NULL) {
//                           $pharmacy_id = $this->session->userdata('pharmacy_id');
//                           $product_free_text_form_farma = 0;
//                       }
//
//
//                       $params = array(
//                           'offer_pdf_from_farma' => $product_free_text_form_farma,
//                           'ref_offer_pdf_pharmacy_id' => $pharmacy_id,
//                           'offer_pdf_starting_date_time' => $this->input->post('offer_starting_date_pdf'),
//                           'offer_pdf_ending_date_time' => $this->input->post('offer_ending_date_pdf'),
//                           'offer_pdf_uploading_date_time' => $current_date,
//                           'offer_pdf_active' => 1,
//                           'offer_pdf_title' => $this->input->post('offer_pdf_title'),
//                           'offer_pdf_storage' => base_url() . "all_images/image_offer/original_image/pdf/" . $temp_name,
//
//                       );
//
//                       $offer_pdf_id = $this->offer_model->add_offer_pdf($params);
//                       $params2 = array(
//                           'offer_products_from_farma' => $product_free_text_form_farma,
//                           'offer_products_type' => 1,
//                           'ref_offer_products_pharmacy_id' => $pharmacy_id,
//                           'offer_products_starting_date_time' => $this->input->post('offer_starting_date_pdf'),
//                           'offer_products_ending_date_time' => $this->input->post('offer_ending_date_pdf'),
//                           'offer_products_creating_editing_date_time' => $current_date,
////
//                           'ref_offer_products_offerr_pdf_id' => $offer_pdf_id,
//
//
//                       );
//
//                       $offer_product_id = $this->offer_model->add_offer_product($params2);
//
//
//                       $product_id = $this->input->post('product_id');
//                       $startDate = $this->input->post('offer_products_starting_date_time');
//                       $endDate = $this->input->post('offer_products_ending_date_time');
//                       $normalPrice = $this->input->post('normal_price');
//                       $offerPrice = $this->input->post('offer_products_offer_price');
//                       $pharmacy_id = NULL;
//                       $product_free_text_form_farma = 1;
//                       if ($this->session->userdata('pharmacy_id') != NULL) {
//                           $pharmacy_id = $this->session->userdata('pharmacy_id');
//                           $product_free_text_form_farma = 0;
//                       }
//                       foreach ($product_id as $key => $t) {
//                           $params3 = array(
//                               'offer_products_from_farma' => $product_free_text_form_farma,
//                               'offer_products_type' => 1,
//                               'ref_offer_products_final_product_id' => $product_id[$key],
//                               'ref_offer_products_pharmacy_id' => $pharmacy_id,
//                               'offer_products_starting_date_time' => $startDate[$key],
//                               'offer_products_ending_date_time' => $endDate[$key],
//                               'offer_products_creating_editing_date_time' => $current_date,
//                               'offer_products_normal_price' => $normalPrice[$key],
//                               'offer_products_offer_price' => $offerPrice[$key],
//                           );
//
//                           $offer_product_id = $this->offer_model->add_offer_product($params3);
//
//
//                       }
//
//                       $product_title = $this->input->post('product_title');
//                       $product_details = $this->input->post('product_description');
//                       $image = $this->input->post('product_free_text_image_storage_path');
//                       $normalPrice = $this->input->post('normalPriceFreeText');
//                       $offer_products_offer_price = $this->input->post('offer_products_offer_price');
//                       $offer_products_start_date_time = $this->input->post('offer_products_start_date_time');
//                       $offer_products_ending_date_time = $this->input->post('offer_products_ending_date_time');
//                       foreach ($product_title as $key => $t) {
//
//                           $img = $image[$key];
//                           list($type, $img) = explode(';', $img);
//                           list(, $img) = explode(',', $img);
//                           $imgExt = explode('/', $type);
//                           $ext = end($imgExt);
//                           $img = base64_decode($img);
//                           $dir = 'all_images/image_offer/original_image/' . rand(11111, 99999999) . "." . $ext;
//
//
//                           file_put_contents($dir, $img);
//
//                           $current_date = date('Y-m-d h:i:sa');
//                           if ($this->session->userdata('pharmacy_id') != NULL) {
//                               $pharmacy_id = $this->session->userdata('pharmacy_id');
//                               $product_free_text_form_farma = 0;
//                           }
//                           $params4 = array(
//                               'product_free_text_from_farma' => $product_free_text_form_farma,
//                               'ref_product_free_text_pharmacy_id' => $pharmacy_id,
//                               'product_free_text_created_edited_date_time' => $current_date,
//                               'product_free_text_active' => 1,
//                               'product_free_text_name' => $product_title[$key],
//                               'product_free_text_description' => $product_details[$key],
//                               'product_free_text_image_storage_path' => $dir,
//                               'product_free_text_price' => $normalPrice[$key],
//
//                           );
//                           $product_free_text_id = $this->products_model->add_product_free_text($params4);
//
//                           $params5 = array(
//                               'offer_products_from_farma' => $product_free_text_form_farma,
//                               'offer_products_type' => 1,
//                               'ref_offer_products_pharmacy_id' => $pharmacy_id,
//                               'offer_products_starting_date_time' => $offer_products_start_date_time[$key],
//                               'offer_products_ending_date_time' => $offer_products_ending_date_time[$key],
//                               'offer_products_creating_editing_date_time' => $current_date,
//                               'offer_products_normal_price' => $normalPrice[$key],
//                               'offer_products_offer_price' => $offer_products_offer_price[$key],
//                               'ref_offer_products_final_product_id' => $product_free_text_id,
//
//
//                           );
//
//                           $offer_product_id = $this->offer_model->add_offer_product($params5);
//
//
//                       }
//                       redirect('offer');
//                   }
//
//
//               }
//           }
//             else {
//                $this->load->vars($data);
//                $this->load->view('layout/switchy_main');
//                $this->load->view('offer/add_offer_form_js');
//            }
//
//
//        }
//    }




     public function create_offer()
     {
         //print_r($_POST);die();
         if ($this->input->post('offer_type') == 3) {
             $data['content'] = 'offer/add_offer_form';
             $data['add_pdf'] = '  ';
             $data['add_product_from_network'] = ' active ';
             $data['free_text'] = '  ';
             $created_date_time = date("Y-m-d H:i:s");
             $edited_date_time = date("Y-m-d H:i:s");

             $this->form_validation->set_message('required', 'Required');

             $this->form_validation->set_rules('offer_products_offer_price', 'Offer Price', 'required');

             if ($this->form_validation->run()) {

                 $product_id = $this->input->post('product_id');
                 $startDate = $this->input->post('offer_products_starting_date_time');
                 $endDate = $this->input->post('offer_products_ending_date_time');
                 $normalPrice = $this->input->post('normal_price');
                 $offerPrice = $this->input->post('offer_products_offer_price');
                 $pharmacy_id = NULL;
                 $product_free_text_form_farma = 1;
                 if ($this->session->userdata('pharmacy_id') != NULL) {
                     $pharmacy_id = $this->session->userdata('pharmacy_id');
                     $product_free_text_form_farma = 0;
                 }
                 foreach ($product_id as $key => $t) {
                     $params = array(
                         'offer_products_from_farma' => $product_free_text_form_farma,
                         'offer_products_type' => 0,
                         'ref_offer_products_final_product_id' => $product_id[$key],
                         'ref_offer_products_pharmacy_id' => $pharmacy_id,
                         'offer_products_starting_date_time' => $startDate[$key],
                         'offer_products_ending_date_time' => $endDate[$key],
                         'offer_products_creating_editing_date_time' => $created_date_time,
                         'offer_products_normal_price' => $normalPrice[$key],
                         'offer_products_offer_price' => $offerPrice[$key],
                     );

                     $offer_product_id = $this->offer_model->add_offer_product($params);


                 }
                 $this->session->set_flashdata('message', 'DONE');
                 redirect(site_url('offer'));


             } else {
                 $this->load->vars($data);
                 $this->load->view('layout/switchy_main');
                 $this->load->view('offer/add_offer_form_js');


             }

         }
         elseif ($this->input->post('offer_type') == 2) {

             if (count($_POST) > 0 && $this->input->post('product_title'))  {
                 $this->form_validation->set_message('required', $this->lang->line('required'));
                 $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                 $this->form_validation->set_rules('product_title', 'product_title', 'required');
                 $this->form_validation->set_rules('product_description', 'product_description', 'required');

                 if ($this->form_validation->run()) {

                     $product_title = $this->input->post('product_title');
                     $product_details = $this->input->post('product_description');
                     $image = $this->input->post('product_free_text_image_storage_path');
                     $normalPrice = $this->input->post('normalPriceFreeText');
                     $offer_products_offer_price = $this->input->post('offer_products_offer_price');
                     $offer_products_start_date_time = $this->input->post('offer_products_start_date_time');
                     $offer_products_ending_date_time = $this->input->post('offer_products_ending_date_time');

                     foreach ($product_title as $key => $t) {

                         $img = $image[$key];
                         list($type, $img) = explode(';', $img);
                         list(, $img) = explode(',', $img);
                         $imgExt = explode('/', $type);
                         $ext = end($imgExt);
                         $img = base64_decode($img);
                         $dir = 'all_images/image_offer/original_image/' . rand(11111, 99999999) . "." . $ext;


                         file_put_contents($dir, $img);
                         $product_free_text_form_farma = 1;
                         $current_date = date('Y-m-d h:i:sa');
                         if ($this->session->userdata('pharmacy_id') != NULL) {
                             $pharmacy_id = $this->session->userdata('pharmacy_id');
                             $product_free_text_form_farma = 0;
                         }
                         $params = array(
                             'product_free_text_from_farma' => $product_free_text_form_farma,
                             'ref_product_free_text_pharmacy_id' => $pharmacy_id,
                             'product_free_text_created_edited_date_time' => $current_date,
                             'product_free_text_active' => 1,
                             'product_free_text_name' => $product_title[$key],
                             'product_free_text_description' => $product_details[$key],
                             'product_free_text_image_storage_path' => $dir,
                             'product_free_text_price' => $normalPrice[$key],

                         );
                         $product_free_text_id = $this->products_model->add_product_free_text($params);
                         $params=array(
                             'ref_final_product_product_free_text_id'=>$product_free_text_id,
                             'final_product_created_edited_date_time'=>$current_date
                         );
                         $final_product_id=$this->products_model->add_final_product($params);
                         if ($this->session->userdata('pharmacy_id') != NULL) {
                             $pharmacy_id = $this->session->userdata('pharmacy_id');
                             $product_free_text_form_farma = 0;
                         }
                         $params2 = array(
                             'offer_products_from_farma' => $product_free_text_form_farma,
                             'offer_products_type' => 2,
                             'ref_offer_products_pharmacy_id' => $pharmacy_id,
                             'offer_products_starting_date_time' => $offer_products_start_date_time[$key],
                             'offer_products_ending_date_time' => $offer_products_ending_date_time[$key],
                             'offer_products_creating_editing_date_time' => $current_date,
                             'offer_products_normal_price' => $normalPrice[$key],
                             'offer_products_offer_price' => $offer_products_offer_price[$key],
                             'ref_offer_products_final_product_id' => $final_product_id,


                         );

                         $offer_product_id = $this->offer_model->add_offer_product($params2);


                     }
                     $this->session->set_flashdata('message', 'DONE');
                     redirect(site_url('offer' ));
                 }
             }
             else
             {
                 redirect(uri_string());
             }


         }

         else {


             $data['content'] = 'offer/add_offer_form';
             $data['add_pdf'] = ' active ';
             $data['add_product_from_network'] = '  ';
             $data['free_text'] = '  ';


//            $this->load->library('form_validation');
//
//            $this->form_validation->set_rules('offer_pdf_title', 'Offer Title', 'required');
////            $this->form_validation->set_rules('offer_starting_date', 'Start Date', 'required');
////            $this->form_validation->set_rules('offer_ending_date', 'End Date', 'required');

//
//            if ($this->form_validation->run()) {
//             print_r($_FILES);die();

//             print_r(sizeof($_POST));die();
             if (count($_POST)>12 || $this->input->post('offer_pdf_title')!= '' ) {


                 if ($_FILES['filepdf']['name'] != '') {
                     if (!is_dir('./all_images/image_offer/original_image/pdf/')) {
                         mkdir('./all_images/image_offer/original_image/pdf/');
                     }
                     $file_name = explode('.', $_FILES["filepdf"]["name"]);
                     $file_extension = end($file_name);
                     $temp_name = rand(1, 5000) . rand(5000, 100000) . "." . $file_extension;
                     $config['upload_path'] = './all_images/image_offer/original_image/pdf/';
                     $config['allowed_types'] = "pdf";
                     $config['file_name'] = $temp_name;
                     $this->upload->initialize($config);
                     if (!$this->upload->do_upload('filepdf')) {
                         $error = array('error' => $this->upload->display_errors());
                         print_r($error);

                         redirect(uri_string());

                     } else {
                         $current_date = date('Y-m-d h:i:sa');

                         $pharmacy_id = NULL;
                         $product_free_text_form_farma = 1;
                         if ($this->session->userdata('pharmacy_id') != NULL) {
                             $pharmacy_id = $this->session->userdata('pharmacy_id');
                             $product_free_text_form_farma = 0;
                         }


                         $params = array(
                             'offer_pdf_from_farma' => $product_free_text_form_farma,
                             'ref_offer_pdf_pharmacy_id' => $pharmacy_id,
                             'offer_pdf_starting_date_time' => $this->input->post('offer_starting_date_pdf'),
                             'offer_pdf_ending_date_time' => $this->input->post('offer_ending_date_pdf'),
                             'offer_pdf_uploading_date_time' => $current_date,
                             'offer_pdf_active' => 1,
                             'offer_pdf_title' => $this->input->post('offer_pdf_title'),
                             'offer_pdf_storage' =>  "all_images/image_offer/original_image/pdf/" . $temp_name,

                         );

                         $offer_pdf_id = $this->offer_model->add_offer_pdf($params);

                     }}


//                         $params2 = array(
//                             'offer_products_from_farma' => $product_free_text_form_farma,
//                             'offer_products_type' => 1,
//                             'ref_offer_products_pharmacy_id' => $pharmacy_id,
//                             'offer_products_starting_date_time' => $this->input->post('offer_starting_date_pdf'),
//                             'offer_products_ending_date_time' => $this->input->post('offer_ending_date_pdf'),
//                             'offer_products_creating_editing_date_time' => $current_date,
//                             'ref_offer_products_offerr_pdf_id' => $offer_pdf_id,
//
//
//                         );
//
//                         $offer_product_id = $this->offer_model->add_offer_product($params2);


                         $product_id = $this->input->post('product_id');
                         $startDate = $this->input->post('offer_products_starting_date_time');
                         $endDate = $this->input->post('offer_products_ending_date_time');
                         $normalPrice = $this->input->post('normal_price');
                         $offerPrice = $this->input->post('offer_products_offer_price');
                         $pharmacy_id = NULL;
                         $product_free_text_form_farma = 1;
                         if ($this->session->userdata('pharmacy_id') != NULL) {
                             $pharmacy_id = $this->session->userdata('pharmacy_id');
                             $product_free_text_form_farma = 0;
                         }
                         foreach ($product_id as $key => $t) {
                             $params3 = array(
                                 'offer_products_from_farma' => $product_free_text_form_farma,
                                 'offer_products_type' => 1,
                                 'ref_offer_products_offerr_pdf_id' => $offer_pdf_id,
                                 'ref_offer_products_final_product_id' => $product_id[$key],
                                 'ref_offer_products_pharmacy_id' => $pharmacy_id,
                                 'offer_products_starting_date_time' => $startDate[$key],
                                 'offer_products_ending_date_time' => $endDate[$key],
                                 'offer_products_creating_editing_date_time' => $current_date,
                                 'offer_products_normal_price' => $normalPrice[$key],
                                 'offer_products_offer_price' => $offerPrice[$key],
                             );

                             $offer_product_id = $this->offer_model->add_offer_product($params3);


                         }

                         $product_title = $this->input->post('product_title');
                         $product_details = $this->input->post('product_description');
                         $image = $this->input->post('product_free_text_image_storage_path');
                         $normalPrice = $this->input->post('normalPriceFreeText');
                         $offer_products_offer_price = $this->input->post('offer_products_offer_price');
                         $offer_products_start_date_time = $this->input->post('offer_products_start_date_time');
                         $offer_products_ending_date_time = $this->input->post('offer_products_ending_date_time');
                         foreach ($product_title as $key => $t) {

                             $img = $image[$key];
                             list($type, $img) = explode(';', $img);
                             list(, $img) = explode(',', $img);
                             $imgExt = explode('/', $type);
                             $ext = end($imgExt);
                             $img = base64_decode($img);
                             $dir = 'all_images/image_offer/original_image/' . rand(11111, 99999999) . "." . $ext;


                             file_put_contents($dir, $img);

                             $current_date = date('Y-m-d h:i:sa');
                             if ($this->session->userdata('pharmacy_id') != NULL) {
                                 $pharmacy_id = $this->session->userdata('pharmacy_id');
                                 $product_free_text_form_farma = 0;
                             }
                             $params4 = array(
                                 'product_free_text_from_farma' => $product_free_text_form_farma,
                                 'ref_product_free_text_pharmacy_id' => $pharmacy_id,
                                 'product_free_text_created_edited_date_time' => $current_date,
                                 'product_free_text_active' => 1,
                                 'product_free_text_name' => $product_title[$key],
                                 'product_free_text_description' => $product_details[$key],
                                 'product_free_text_image_storage_path' => $dir,
                                 'product_free_text_price' => $normalPrice[$key],

                             );
                             $product_free_text_id = $this->products_model->add_product_free_text($params4);
                             $params4=array(
                                 'ref_final_product_product_free_text_id'=>$product_free_text_id,
                                 'final_product_created_edited_date_time'=>$current_date
                             );
                             $final_product_id=$this->products_model->add_final_product($params4);
                             $params5 = array(
                                 'offer_products_from_farma' => $product_free_text_form_farma,
                                 'offer_products_type' => 1,
                                 'ref_offer_products_pharmacy_id' => $pharmacy_id,
                                 'ref_offer_products_offerr_pdf_id' => $offer_pdf_id,
                                 'offer_products_starting_date_time' => $offer_products_start_date_time[$key],
                                 'offer_products_ending_date_time' => $offer_products_ending_date_time[$key],
                                 'offer_products_creating_editing_date_time' => $current_date,
                                 'offer_products_normal_price' => $normalPrice[$key],
                                 'offer_products_offer_price' => $offer_products_offer_price[$key],
                                 'ref_offer_products_final_product_id' => $final_product_id,


                             );

                             $offer_product_id = $this->offer_model->add_offer_product($params5);


                         }
                 $this->session->set_flashdata('message', 'DONE');
                         redirect('offer');
                     }

             else
                 {

                 $this->load->vars($data);
                 $this->load->view('layout/switchy_main');
                 $this->load->view('offer/add_offer_form_js');
             }


         }
     }



	public function view_offer()
	{
		$data['content'] = 'offer/all_offer_view';
        $data['query_result']=$this->offer_model->get_all_offer_pdf();
        $data['all_offer']=$this->offer_model->get_all_offer_products();
        $data['from_network']=$this->offer_model->get_all_offer_from_network();

		$this->load->vars($data);
		$this->load->view('layout/switchy_main');
		$this->load->view('offer/all_offer_view_js');
	}



    public function view_single_offer($id)
    {
        $data['content'] = 'offer/single_offer_view';
        $data['offer']=$this->offer_model->get_offer_product($id);
        $this->load->vars($data);
        $this->load->view('layout/switchy_main');
        $this->load->view('offer/single_offer_view_js');
    }

    public function view_single_pdf_offer($id)
    {

        $data['content'] = 'offer/single_pdf_offer_view';
        $data['offer']=$this->offer_model->get_offer_pdf($id);
        $this->load->vars($data);
        $this->load->view('layout/switchy_main');
        $this->load->view('offer/single_offer_view_js');
    }



	
			

	

	
	public function delete_offer($id)
	{

        $offer_product = $this->offer_model->get_offer_product($id);

        // check if the offer_product exists before trying to delete it
        if(isset($offer_product['offer_products_id']))
        {
//            $this->offer_model->delete_offer_product($id);
//            $this->session->set_flashdata('error', 'DELETED');
//            redirect('offer');


            $created_date_time = date("Y-m-d H:i:s");
            $params = array(

                'offer_products_creating_editing_date_time' => $created_date_time,
                'offer_products_active' =>0,
            );

            $this->offer_model->update_offer_product($id, $params);
            $this->session->set_flashdata('error', 'DELETED');
            redirect('offer');


        }
        else
            show_error('The offer_product you are trying to delete does not exist.');
    }

    public function delete_offer_pdf($id)
	{

        $offer_pdf = $this->offer_model->get_offer_pdf($id);

        // check if the offer_product exists before trying to delete it
        if(isset($offer_pdf['offer_pdf_id']))
        {

            $created_date_time = date("Y-m-d H:i:s");
            $params = array(

                'offer_pdf_uploading_date_time' => $created_date_time,
                'offer_pdf_active' => 0,
            );

            $this->offer_model->update_offer_pdf($id, $params);
            $this->session->set_flashdata('error', 'DELETED');
            redirect('offer');

        }
        else
            show_error('The offer_product you are trying to delete does not exist.');
    }





    function edit($offer_products_id)
    {
//        print_r($_POST);
//        print_r($_FILES);
//        die();

        if ($this->input->post('edit_offer_type') == 1) {


            $this->form_validation->set_rules('offer_starting_date', 'Offer Starting Date', 'required');
            $this->form_validation->set_rules('offer_ending_date', 'Offer Ending Date', 'required');


            if ($this->form_validation->run()) {


                if ($_FILES['filepdf']['name'] != '') {

                    if (!is_dir('./all_images/image_offer/original_image/pdf/')) {
                        mkdir('./all_images/image_offer/original_image/pdf/');
                    }
                    $file_name = explode('.', $_FILES["filepdf"]["name"]);
                    $file_extension = end($file_name);
                    $temp_name = rand(1, 5000) . rand(5000, 100000) . "." . $file_extension;
                    $config['upload_path'] = './all_images/image_offer/original_image/pdf/';
                    $config['allowed_types'] = "pdf";
                    $config['file_name'] = $temp_name;
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('filepdf')) {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);

                        redirect(uri_string());

                    }

                    else {
                        $pdf= "all_images/image_offer/original_image/pdf/" . $temp_name;
                    }

                }

                else
                {
                    $pdf=$this->input->post('offer_pdf');
                }



                $offer_pdf_id=$this->input->post('offer_pdf_id');
                $created_date_time = date("Y-m-d H:i:s");
                $params = array(
                    'offer_pdf_starting_date_time' => $this->input->post('offer_starting_date'),
                    'offer_pdf_ending_date_time' => $this->input->post('offer_ending_date'),
                    'offer_pdf_uploading_date_time' => $created_date_time,
                    'offer_pdf_title' => $this->input->post('offer_pdf_title'),
                    'offer_pdf_storage' => $pdf,
                );

                $this->offer_model->update_offer_pdf($offer_pdf_id, $params);

                $this->session->set_flashdata('message', 'UPDATED');
                redirect('view_single_pdf_offer/' . $offer_products_id);

            }
            else
            {
                redirect('view_single_pdf_offer/' . $offer_products_id);
            }


        }


            else {


                // check if the offer_product exists before trying to edit it
                $data['offer_product'] = $this->offer_model->get_offer_product($offer_products_id);

                if (isset($data['offer_product']['offer_products_id'])) {
                    $this->load->library('form_validation');


                    $this->form_validation->set_rules('offer_starting_date', 'Offer Starting Date', 'required');
                    $this->form_validation->set_rules('offer_ending_date', 'Offer Ending Date', 'required');
                    $this->form_validation->set_rules('offer_price', 'Offer price', 'required');

                    if ($this->form_validation->run()) {
                        $created_date_time = date("Y-m-d H:i:s");
                        $params = array(
                            'offer_products_starting_date_time' => $this->input->post('offer_starting_date'),
                            'offer_products_ending_date_time' => $this->input->post('offer_ending_date'),
                            'offer_products_creating_editing_date_time' => $created_date_time,
                            'offer_products_offer_price' => $this->input->post('offer_price'),
                        );

                        $this->offer_model->update_offer_product($offer_products_id, $params);
                        $this->session->set_flashdata('message', 'UPDATED');
                        redirect('view_offer/' . $offer_products_id);
                    } else {
                        redirect('view_offer/' . $offer_products_id);
                    }
                } else
                    show_error('The offer_product you are trying to edit does not exist.');
            }
        }



    public function change_status($id,$status,$url)
	{
	$status=$status==0?1:0;	
	$data = array(
			'offer_active' => $status,
			);
	$this->offer_model->status_update($id,$data);
	$status=$status==0?"Inactive":"Active";
	$msg = "Id #$id is now $status";
	$this->session->set_flashdata('msg', $msg);
	redirect($url);
	}	
 

   public function save_image()
	{
		
		$return_array=array();
		
		
		$config =  array(
                  'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"]).'/all_images/image_offer/original_image/',
                  'upload_url'      => base_url()."files/",
                  'allowed_types'   => "gif|jpg|jpeg|png",
				  
                   
                );
	    $this->load->library('upload', $config);
		
		$uploading_file_info=array();
		
		
		
		if ($this->upload->do_upload())
				{
					$data = $this->upload->data();
					
					$return_array['image_data']=$data;
					$return_array['status']=1;
					$target_fileName_with_folder="all_images/image_offer/original_image/".$data['file_name'];
					$rename_fileName=$data['file_name'];
					$this->resize_image($target_fileName_with_folder,$rename_fileName );
				}
				else
				{
							$errors = $this->upload->display_errors();
							$return_array['status']=0;
							
				}
		
		
		return $return_array;
	}
	public function resize_image($target_fileName_with_folder,$rename_fileName )
	{
	$path_android="all_images/image_offer/android/";
	//$data = getimagesize($target_fileName_with_folder);
	$width = 220;//(int)$data[0];
	$height = 220;//(int)$data[1];
	$xxxhdpi_width=$width;
	$mdpi_width=(int)($xxxhdpi_width/4);
	$ldpi_width=(int)($mdpi_width * .75);
	$hdpi_width=(int)($mdpi_width * 1.5);
	$xhdpi_width=(int)($mdpi_width * 2);
	$xxhdpi_width=(int)($mdpi_width * 3);
	
	$xxxhdpi_height=$height;
	$mdpi_height=(int)($xxxhdpi_height/4);
	$ldpi_height=(int)($mdpi_height * .75);
	$hdpi_height=(int)($mdpi_height * 1.5);
	$xhdpi_height=(int)($mdpi_height * 2);
	$xxhdpi_height=(int)($mdpi_height * 3);
	

	$this->resizeImgByDevice($target_fileName_with_folder,$path_android.'ldpi/'.$rename_fileName,$ldpi_width,$ldpi_height);
	$this->resizeImgByDevice($target_fileName_with_folder,$path_android.'mdpi/'.$rename_fileName,$mdpi_width,$mdpi_height);
	$this->resizeImgByDevice($target_fileName_with_folder,$path_android.'hdpi/'.$rename_fileName,$hdpi_width,$hdpi_height);
	$this->resizeImgByDevice($target_fileName_with_folder,$path_android.'xhdpi/'.$rename_fileName,$xhdpi_width,$xhdpi_height);
	$this->resizeImgByDevice($target_fileName_with_folder,$path_android.'xxhdpi/'.$rename_fileName,$xxhdpi_width,$xxhdpi_height);
	$this->resizeImgByDevice($target_fileName_with_folder,$path_android.'xxxhdpi/'.$rename_fileName,$xxxhdpi_width,$xxxhdpi_height);
	
	}
	
	
	
   function resizeImgByDevice($source,$target,$width,$height)
   {
   
   //$source_image = base_url().'pic2.jpg';
   $source_image = $source;
   $config['image_library'] = 'gd2';
   $config['source_image']  = $source_image;
   $config['new_image'] = $target;
   $config['maintain_ratio'] = true;
   $config['width']  = $width;
   $config['height']  = $height;
   
  
   $this->image_lib->clear();
   $this->image_lib->initialize($config);
   $this->image_lib->resize();
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
            <span class="name"><?php echo $app_user['app_user_first_name']." ".$app_user['app_user_last_name']; ?></span>&nbsp;<br/>Birthdate :<?php echo $app_user['app_user_birth_date']; ?><br/>City :<?php echo $app_user['app_user_city']; ?><span class="client_id" style="display:none;"><?php echo $app_user['ref_app_user_details_app_user_id'];?></span>
            </div>
        <?php
		}
	}

	
 
}
	
	

	
	
	