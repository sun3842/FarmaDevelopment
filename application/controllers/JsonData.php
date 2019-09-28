
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class JsonData extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		
		$this->load->model('json_model');
		
		/*
		if($this->session->userdata('login')==1)
		{
			redirect(site_url('home'));
		}
		
		*/
			
	}
	
	public function insert_pharmacy_data()
	{
		$szWSKEY = 'accentosaluteApp';
$szPresharedKey = 'XSV7Lj4rhO56OR4IcKiIX51GNXZ1JC5pxAPP';

$a = new stdClass();
$a->num = rand();


$szJSON = json_encode($a);


$sign = base64_encode(hash_hmac('sha1',$szPresharedKey.$szJSON, $szWSKEY));

echo "http://www.accentosalute.it/api/listafarmacie?api=2016.001&wskey=$szWSKEY&wssign=$sign&json=".urlencode($szJSON);

$url = "http://www.accentosalute.it/api/listafarmacie?api=2016.001&wskey=$szWSKEY&wssign=$sign&json=".urlencode($szJSON);
$content = file_get_contents($url);
$json = json_decode($content, true);

$status=$this->json_model->insert_pharmacy($json['farmacie']);

if($status==1)
{
	echo "Pharmacy list is updated successfully";
}
else
{
	echo "Pharmacy list is not updated successfully";
}
	
	}
	
	public function insert_category_data()
	{
		$szWSKEY = 'accentosaluteApp';
$szPresharedKey = 'XSV7Lj4rhO56OR4IcKiIX51GNXZ1JC5pxAPP';

$a = new stdClass();
$a->num = rand();


$szJSON = json_encode($a);


$sign = base64_encode(hash_hmac('sha1',$szPresharedKey.$szJSON, $szWSKEY));

echo "http://www.accentosalute.it/api/listacategorie?api=2016.001&wskey=$szWSKEY&wssign=$sign&json=".urlencode($szJSON);

$url = "http://www.accentosalute.it/api/listacategorie?api=2016.001&wskey=$szWSKEY&wssign=$sign&json=".urlencode($szJSON);
$content = file_get_contents($url);
$json = json_decode($content, true);

$status=$this->json_model->insert_category($json['categorie']);

if($status==1)
{
	echo "categorie list is updated successfully";
}
else
{
	echo "categorie list is not updated successfully";
}
	
	}
	
	public function insert_product_data()
	{
		$status=$this->json_model->insert_product();
		if($status==1)
{
	echo "product list is updated successfully";
}
else
{
	echo "product list is not updated successfully";
}
	}
	
	
	
	public function auto_pharmacy_user_creation()
	{
		$this->json_model->auto_pharmacy_user_creation();
	}
}
	
	