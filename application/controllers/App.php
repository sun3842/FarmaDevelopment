<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('app_model');
	}
	
	
	public function app_pharmacy_search()
	{
		$search_string=$_REQUEST['search_string'];
		
		$flag['pharmacy']=$this->app_model->search_pharmacy_by_address($search_string);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($flag));
	
	}
	
	
	public function app_product_list()
	{
		
		$flag['product']=$this->app_model->get_all_product_list();
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($flag));
	}
	
	
	public function app_product_list_by_limit($app_user_id=0,$starting_limit=0)
	{
		//$flag['product']=$this->app_model->get_all_product_list_by_limit($app_user_id,$starting_limit);
		$flag['product']=$this->app_model->get_all_product_list_by_limit_app_user_id($app_user_id,$starting_limit);
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($flag));
	}
	
	
	public function app_category_product_list_by_limit($app_user_id=0,$category_id=0,$starting_limit=0)
	{
		$flag['product']=$this->app_model->get_all_category_product_list_by_limit_app_user_id_category_id($app_user_id,$category_id,$starting_limit);
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($flag));
	}
	
	
	public function app_associate_pharmacy_user()
	{
		$pharmacy_id=trim($_REQUEST['pharmacy_id']);
		$app_user_id=trim($_REQUEST['app_user_id']);
		
		$flag=$this->app_model->associate_pharmacy_with_app_user($app_user_id,$pharmacy_id);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($flag));
	}
	
	
	
	
	/*
	FUNCTION NAME :function app_all_news_by_limit($user_details_id=0,$starting_limit=0)
	it will return news after checking user activation status
	*/
	public function app_all_news_by_limit($starting_limit=0)
	{
		$flag['news']=$this->app_model->get_news_list($starting_limit);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($flag));
	}
	
	public function app_message_list_by_app_user_id_limit($app_user_id=0,$starting_limit=0)
	{
		$flag['message']=$this->app_model->get_message_list($app_user_id,$starting_limit);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($flag));
	}
	
	
	public function app_gallery_images($app_user_id=0,$starting_limit=0)
	{
		$flag['images']=$this->app_model->get_image_list($app_user_id,$starting_limit);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($flag));
	}
	
	public function app_all_events_by_limit($app_user_id=0,$starting_limit=0)
	{
		$flag['event']=$this->app_model->get_event_list($app_user_id,$starting_limit);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($flag));
	}
	
	
	public function app_farma_about_us()
	{
		$flag=$this->app_model->get_about_us_text();
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($flag));
		
		
	}
	
	
	public function app_all_categories()
	{
		$flag=$this->app_model->get_all_categories();
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($flag));
	}
	
	
	public function app_get_pharmacy_details_by_pharmacy_id()
	{
		$pharmacy_id=trim($_REQUEST['pharmacy_id']);
		
		$flag=$this->app_model->get_pharmacy_details($pharmacy_id);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($flag));
	}
	
	
	
	public function app_search_products_by_app_user_id($app_user_id)
	{
		$product_name=$_REQUEST['product_name'];
		$codice_ministeriale=$_REQUEST['codice_ministeriale'];
		$categoria_merciologica=$_REQUEST['categoria_merciologica'];
		
		$flag['product']=$this->app_model->search_products_by_app_user_id($product_name,$codice_ministeriale,$categoria_merciologica,$app_user_id);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($flag));
	}
	
	
	public function app_all_offer_pdf_list($app_user_id)
	{
		$flag['offer_pdf']=$this->app_model->get_offer_pdf_list($app_user_id);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($flag));
	}
	
	public function app_offer_pdf_products($offer_pdf_id)
	{
		$flag['offer_pdf_products']=$this->app_model->app_offer_pdf_products($offer_pdf_id);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($flag));
	}
	
	
	public function app_all_offer_products($app_user_id)
	{
		$flag['all_offer_products']=$this->app_model->all_offer_products($app_user_id);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($flag));
	}
	
	public function app_category_offer_products($app_user_id,$category_id)
	{
		$flag['all_offer_products']=$this->app_model->category_offer_products($app_user_id,$category_id);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($flag));
	}
	
	public function app_pharmacist_list($app_user_id)
	{
		
		$flag['pharmacists']=$this->app_model->get_all_pharmacist_list_by_app_user_id($app_user_id);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($flag));
	}
	
	
	public function app_get_pharmacy_details_by_app_user_id($app_user_id)
	{
		$flag=$this->app_model->get_pharmacy_details_by_app_user_id($app_user_id);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($flag));
	}
	
	public function app_search_offer_products($app_user_id)
	{
		$product_name=$_REQUEST['product_name'];
		$codice_ministeriale=$_REQUEST['codice_ministeriale'];
		$categoria_merciologica=$_REQUEST['categoria_merciologica'];
		
		$flag['product']=$this->app_model->search_products($product_name,$codice_ministeriale,$categoria_merciologica);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($flag));
	}
	
	public function search_near_by_pharmacy()
	{
		$lat=$_REQUEST['lat'];
		$lng=$_REQUEST['lng'];
		
		$flag['pharmacy_list']=$this->app_model->search_near_by_function($lat,$lng);
		
		header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
		
		print(json_encode($flag));
	}
}