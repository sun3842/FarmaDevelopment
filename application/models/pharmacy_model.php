<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : Sajed Amed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

class Pharmacy_Model extends CI_Model
{
	public function __construct()
	{
		$this->load->database(); 
	}
	/*******************LOGIN RELATED******************************/
	
	public function get_pharmacy_list()
	{
		$query=$this->db->get('pharmacy');
		
		return $query->result_array();
	}
    function get_pharmacy($pharmacy_id)
    {
        return $this->db->get_where('pharmacy',array('pharmacy_id'=>$pharmacy_id))->row_array();
    }
	
	function get_password_reset_link($user_id,$email)
	{
		$this->db->trans_start();
		
		$valid_chars="AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz1234567890";
		$length=100;
		$random_String=$this->get_random_string($valid_chars, $length);
		
		$data=array(
		'ref_forgot_password_data_user_details_id'=>$user_id,
		'forgot_password_data_random_string'=>$random_String);
		
		$this->db->insert('forgot_password_data',$data);
		
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)
		{
			return 0;
		}
		else
		{
			//SEND EMAIL To User email Address
			$this->send_email($random_String,$email);
			return 1;
		}
	}
	
	function send_email($random_String,$email)
	{
			//<p><a href=$password_link>CLICK HERE</a></p>

		$mailacc = "anwar.hossain.suman@gmail.com";//$email;
		$password_link=base_url()."/".$random_String;
		$subject = "SWITCHY PASSWORD";
		$message = "
		<html>
		<head>
		<title>Password</title>
		</head>
		<body>
		</body>
		</html>
		";
		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: Noreply <noreply@switchyapp.com>' . "\r\n";
		
		$mail = mail($mailacc, $subject, $message, $headers);
	}

    function update_pharmacy($pharmacy_id,$params)
    {
        $this->db->where('pharmacy_id',$pharmacy_id);
        return $this->db->update('pharmacy',$params);
    }
	
}
	
	