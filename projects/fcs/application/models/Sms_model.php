<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Sms_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct(); 
		$this->load->database();
	}
	
	/***********************************************************************
	** Function name : send_transactional_sms
	** Developed By : Manoj Kumar
	** Purpose  : This function used for send transactional sms
	** Date : 25 NOVEMBER 2017
	************************************************************************/
	public function send_transactional_sms($mobileno='',$templateId='',$password=''){
		if($mobileno !='' && $templateId !=''):
			   $url = "http://123.63.33.43/blank/sms/user/urlsmstemp.php?username=VaibhavJ&pass=va_b5JH@&senderid=Myfete&dest_mobileno=91" . $mobileno . "&tempid=" . $templateId . "&F1=" . $password . "&response=Y";
			 // create a new cURL resource
			$ch = curl_init();
			// set URL and other appropriate options
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			// grab URL and pass it to the browser
			curl_exec($ch);
			// close cURL resource, and free up system resources
			curl_close($ch);
			
			return true;
		else:
			return false;
		endif;
	}
}	
?>