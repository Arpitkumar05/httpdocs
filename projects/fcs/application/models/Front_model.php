<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Front_model extends CI_Model
{
	public function __construct()
	{
         
		parent::__construct(); 
		$this->load->database(); 
	}
	
	/***********************************************************************
	** Function name: get_permission_type
	** Developed By: Manoj Kumar
	** Purpose: This function used for get permission type
	** Date: 25 NOVEMBER 2017
	************************************************************************/
	public function get_permission_type(&$data)
	{  
		$classarray		=	array('adminpagesheading','adminslider','adminbanner','adminfooter','admingeneraldata','adminpartners','admintestimonial','adminhomeabout','adminservices','adminconsulting','adminclients','adminproducts','adminproductsection','adminabout');
		if($this->session->userdata('FCS_ADMIN_TYPE') == 'superadmin'):
			if(in_array($this->router->fetch_class(),$classarray)):
				$data['view_data']			=	'Y';
				$data['add_data']			=	'Y';
				$data['edit_data']			=	'Y';
				$data['delete_data']		=	'Y';
			else:
				$data['view_data']			=	'Y';
				$data['add_data']			=	'N';
				$data['edit_data']			=	'N';
				$data['delete_data']		=	'N';
			endif;
		else:
			if(in_array($this->router->fetch_class(),$classarray)):
				$data['view_data']			=	'N';
				$data['add_data']			=	'N';
				$data['edit_data']			=	'N';
				$data['delete_data']		=	'N';
			else:
				$data['view_data']			=	'Y';
				$data['add_data']			=	'Y';
				$data['edit_data']			=	'Y';
				$data['delete_data']		=	'Y';
			endif;
		endif;
	}
	
	/***********************************************************************
	** Function name: auth_check
	** Developed By: Manoj Kumar
	** Purpose: This function used for auth check
	** Date: 25 NOVEMBER 2017
	************************************************************************/
	public function auth_check($dtype='')
	{  
		if($this->session->userdata('FCS_ADMIN_ID') == ""):
			setcookie('FCS_REFERENCEPAGES', uri_string(), time() + 60*60*24*5, '/');
			redirect(base_url().'siteadmin');
		else:
			if($this->check_permission($dtype)):	
				return true;
			else:	
				$this->session->set_flashdata('alert_warning',lang('accessdenied'));
				redirect(base_url().'siteadmin/homes');
			endif;
		endif;
	}
	
	/***********************************************************************
	** Function name: check_permission
	** Developed By: Manoj Kumar
	** Purpose: This function used for check permission
	** Date: 25 NOVEMBER 2017
	************************************************************************/
	public function check_permission($dtype='')
	{  
		if($this->session->userdata('FCS_ADMIN_TYPE') == 'superadmin'):
			return true;
		else:
			$classarray		=	array('adminpagesheading','adminslider','adminbanner','adminfooter','admingeneraldata','adminpartners','admintestimonial','adminhomeabout','adminservices','adminconsulting','adminclients','adminproductsection','adminabout');
			if(in_array($this->router->fetch_class(),$classarray)):
				return false;
			else:
				return true;
			endif;
		endif;
	}

	/***********************************************************************
	** Function name: get_current_date_time 'super stockist','stockist','distributor'
	** Developed By: Manoj Kumar
	** Purpose: This function used for get current date time
	** Date: 25 NOVEMBER 2017
	************************************************************************/
	public function get_current_date_time()
	{  
		date_default_timezone_set('Asia/Calcutta');
		//$current =  date("Y-m-d h:i:sA"); 
		return date("Y-m-d H:i:s");
	}
	
	/***********************************************************************
	** Function name: get_current_ip
	** Developed By: Manoj Kumar
	** Purpose: This function used for get current ip
	** Date: 25 NOVEMBER 2017
	************************************************************************/
	public function get_current_ip()
	{  
		return $_SERVER['REMOTE_ADDR']=='::1'?'192.168.1.100':$_SERVER['REMOTE_ADDR'];
	}
	
	/***********************************************************************
	** Function name : substring
	** Developed By : Manoj Kumar
	** Purpose  : This function used for substring
	** Date : 25 NOVEMBER 2017
	************************************************************************/
	public function SubString($str, $length, $minword = 3)
	{  
		$str = preg_replace("/<img[^>]+\>/i", '', $str);
		
		 $str = $this->strip_html_tags($str);
		if(strlen($str)>$length) $len = '...';
		return substr($str,0,$length).$len;
	}
	
	public function strip_html_tags( $text )
	{
		$text = preg_replace(
			array(
			  // Remove invisible content
				'@<head[^>]*?>.*?</head>@siu',
				'@<style[^>]*?>.*?</style>@siu',
				'@<script[^>]*?.*?</script>@siu',
				'@<object[^>]*?.*?</object>@siu',
				'@<embed[^>]*?.*?</embed>@siu',
				'@<applet[^>]*?.*?</applet>@siu',
				'@<noframes[^>]*?.*?</noframes>@siu',
				'@<noscript[^>]*?.*?</noscript>@siu',
				'@<noembed[^>]*?.*?</noembed>@siu',
			  // Add line breaks before and after blocks
				'@</?((address)|(blockquote)|(center)|(del))@iu',
				'@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
				'@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
				'@</?((table)|(th)|(td)|(caption))@iu',
				'@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
				'@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
				'@</?((frameset)|(frame)|(iframe))@iu',
			),
			array(
				' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
				"\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
				"\n\$0", "\n\$0",
			),
			$text );
		return strip_tags( $text );
	}
	
	/***********************************************************************
	** Function name : replaceFrromString
	** Developed By : Manoj Kumar
	** Purpose  : This function used for replace particular in string
	** Date : 25 NOVEMBER 2017
	************************************************************************/
	function replaceFromString($repstring='',$string='')
	{
		if($repstring == 'PTAG' && $string !=''):
			$reparray = array('<p>','</p>');
			return str_replace($reparray,'',$string);
		endif;
	}
}	
?>