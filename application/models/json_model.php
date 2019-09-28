<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : Sajed Amed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

class Json_Model extends CI_Model
{
	public function __construct()
	{
		$this->load->database(); 
	}
	
	
	function insert_pharmacy($data_array)
	{
		$this->db->trans_start();
		$this->db->insert_batch('pharmacy', $data_array); 
		
		
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)
		{
			return 0;
		}
		else
		{
			//SEND EMAIL To User email Address
			
			return 1;
		}
	}
	
	function insert_category($data_array)
	{
		$this->db->trans_start();
		
		$this->db->insert_batch('category', $data_array); 
		
		
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)
		{
			return 0;
		}
		else
		{
			//SEND EMAIL To User email Address
			
			return 1;
		}
	}
	
	function insert_product()
	{
		
		$this->db->trans_start();
		
		$szWSKEY = 'accentosaluteApp';
$szPresharedKey = 'XSV7Lj4rhO56OR4IcKiIX51GNXZ1JC5pxAPP';

$a = new stdClass();
$a->num = rand();


$szJSON = json_encode($a);


$sign = base64_encode(hash_hmac('sha1',$szPresharedKey.$szJSON, $szWSKEY));

echo "http://www.accentosalute.it/api/listaprodotti?api=2016.001&wskey=$szWSKEY&wssign=$sign&json=".urlencode($szJSON);

$url = "http://www.accentosalute.it/api/listaprodotti?api=2016.001&wskey=$szWSKEY&wssign=$sign&json=".urlencode($szJSON);
$content = file_get_contents($url);
$json = json_decode($content, true);
		
		
		
		$i=0;
		foreach($json['prodotti'] as $item) {
			$i++;
			
			$data=array('product_id'=>$i,
				'codice_catena'=>$item['codice_catena'],
			'codice_sito'=>$item['codice_sito'],
			'codinterno'=>$item['codinterno'],
			'codminsan'=>$item['codminsan'],
			'codean'=>$item['codean'],
			'descrizione_ricerca'=>$item['descrizione_ricerca'],
			'descrizione_ecommerce'=>$item['descrizione_ecommerce'],
			'descrizione_h1'=>$item['descrizione_h1'],
			'descrizione_h2'=>$item['descrizione_h2'],
			'descrizione_ditta'=>$item['descrizione_ditta'],
			'prezzo_web_netto'=>$item['prezzo_web_netto'],
			'prezzo_web_lordo'=>$item['prezzo_web_lordo'],
			'sconto_web'=>$item['sconto_web'],
			'iva'=>$item['iva'],
			'visualizzazione_home_page'=>$item['visualizzazione_home_page'],
			'visualizzazione_civetta'=>$item['visualizzazione_civetta'],
			'codice_monografia'=>$item['codice_monografia'],
			'codice_testo_immagine'=>$item['codice_testo_immagine'],
			'linkImmagineProdotto'=>$item['linkImmagineProdotto'],
			'linkPaginaProdotto'=>$item['linkPaginaProdotto'],
			'tree_id_label'=>$item['categorie'][0]['tree_id_label'],
			'tree_label'=>$item['categorie'][0]['tree_label']);
			
			$this->db->insert('product',$data);
		}
	
	

		
		
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)
		{
			return 0;
		}
		else
		{
			//SEND EMAIL To User email Address
			
			return 1;
		}
	}
	
	public function auto_pharmacy_user_creation()
	{
		
		
		$query=$this->db->get('pharmacy');
		
		$pharmacy_list=$query->result_array();
		
		foreach($pharmacy_list as $pharmacy)
		{
			$pharmacy_id=$pharmacy['pharmacy_id'];
			$piva=$pharmacy['piva'];
			echo $pharmacy_id."-".$piva;
			$this->insert_username_password($pharmacy_id,$piva);
			
		}
		
		
	}
	
	public function insert_username_password($pharmacy_id,$piva)
	{
		$this->db->trans_start();
		
		
		$query=$this->db->get_where('admin_user',array('admin_user_name'=>$piva));
		echo $query->num_rows();
		if($query->num_rows()==0)
		{
			//insert username and password
			$password_hash_value=$this->create_hash($piva);
			
			$data=array('admin_user_ref_user_type_id'=>USER_TYPE_PHARMACY,
			'admin_user_ref_pharmacy_id'=>$pharmacy_id,
			'admin_user_piva_position'=>0,
			'admin_user_name'=>$piva,
			'admin_user_password_hash_value'=>$password_hash_value);
			
			print_r($data);
			
			$this->db->insert('admin_user',$data);
		}
		else
		{
			$username=$piva."/".$query->num_rows();
			$password_hash_value=$this->create_hash($username);
			echo $username."<br/>";
			$data=array('admin_user_ref_user_type_id'=>USER_TYPE_PHARMACY,
			'admin_user_ref_pharmacy_id'=>$pharmacy_id,
			'admin_user_piva_position'=>$query->num_rows(),
			'admin_user_name'=>$username,
			'admin_user_password_hash_value'=>$password_hash_value);
			
			$this->db->insert('admin_user',$data);
		}
		
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)
		{
			echo "0"."<br/>";
		}
		else
		{
			//SEND EMAIL To User email Address
			
			echo "1","<br/>";
		}
		
	}
	
	
	
	
	
	/*
	This function is responsible for creating password hash value
	*/
	public  function create_hash($password)
	{
		//$this->config->load('login_authentication_constants');
		 // format: algorithm:iterations:salt:hash
		 
		 $salt = base64_encode(mcrypt_create_iv(PBKDF2_SALT_BYTE_SIZE, MCRYPT_DEV_URANDOM));
		 return PBKDF2_HASH_ALGORITHM . ":" . PBKDF2_ITERATIONS . ":" .  $salt . ":" . 
		 base64_encode($this->pbkdf2(
		 PBKDF2_HASH_ALGORITHM,
		 $password,
		 $salt,
		 PBKDF2_ITERATIONS,
         PBKDF2_HASH_BYTE_SIZE,
         true
		 ));
	}
	/*
	this function is related with login validation.Just compare with posted password hash value with db password hash value
	*/
	private function validate_password($password, $correct_hash)
	{
		//$this->config->load('login_authentication_constants');
		
		$params = explode(":", $correct_hash);
		if(count($params) < HASH_SECTIONS)
		return false; 
		$pbkdf2 = base64_decode($params[HASH_PBKDF2_INDEX]);
		return $this->slow_equals(
		$pbkdf2,
		$this->pbkdf2(
		$params[HASH_ALGORITHM_INDEX],
		$password,
		$params[HASH_SALT_INDEX],
		(int)$params[HASH_ITERATION_INDEX],
		strlen($pbkdf2),
		true
		)
		);
	}
	/*Related with login authentication*/
	private function slow_equals($a, $b)
	{
		$diff = strlen($a) ^ strlen($b);
		for($i = 0; $i < strlen($a) && $i < strlen($b); $i++)
		{
			$diff |= ord($a[$i]) ^ ord($b[$i]);
		}
		return $diff === 0; 
	}
	/*Related with login authentication*/
	private function pbkdf2($algorithm, $password, $salt, $count, $key_length, $raw_output = false)
	{
		//$this->config->load('login_authentication_constants');
		
		$algorithm = strtolower($algorithm);
		
		if(!in_array($algorithm, hash_algos(), true))
		trigger_error('PBKDF2 ERROR: Invalid hash algorithm.', E_USER_ERROR);
		
		if($count <= 0 || $key_length <= 0) 
		trigger_error('PBKDF2 ERROR: Invalid parameters.', E_USER_ERROR);
		
		if (function_exists("hash_pbkdf2")) 
		{
			// The output length is in NIBBLES (4-bits) if $raw_output is false!
			 if (!$raw_output) 
			 {
				 $key_length = $key_length * 2;
			 }
			 return hash_pbkdf2($algorithm, $password, $salt, $count, $key_length, $raw_output);
		}
		
		$hash_length = strlen(hash($algorithm, "", true));
		$block_count = ceil($key_length / $hash_length);
		
		$output = "";
		for($i = 1; $i <= $block_count; $i++) 
		{
			// $i encoded as 4 bytes, big endian.
			$last = $salt . pack("N", $i);
			// first iteration
			$last = $xorsum = hash_hmac($algorithm, $last, $password, true);
			// perform the other $count - 1 iterations
			for ($j = 1; $j < $count; $j++) 
			{
				$xorsum ^= ($last = hash_hmac($algorithm, $last, $password, true));
			}
			$output .= $xorsum;
		}
		
		if($raw_output)
		return substr($output, 0, $key_length);
		else
        return bin2hex(substr($output, 0, $key_length));
	}
	
}