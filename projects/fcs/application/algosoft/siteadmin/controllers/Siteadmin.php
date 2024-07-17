<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Siteadmin extends CI_Controller {  
 
	public function  __construct() 
	{ 
		parent:: __construct();
		$this->load->helper(array('form','url','html','path','form','cookie'));
		$this->load->library(array('email','session','form_validation','pagination','parser','encrypt'));
		error_reporting(E_ALL ^ E_NOTICE);  
		$this->load->library("layouts");
		$this->load->model(array('siteadmin_model','front_model','emailtemplate_model'));
		$this->load->helper('language');
		$this->lang->load('statictext', 'siteadmin');
	} 
	
	/* * *********************************************************************
	* * Function name : authCheck 
	* * Developed By : Manoj Kumar
	* * Purpose  : To check whether user is loggin or not.
	* * Date : 25 NOVEMBER 2017
	************************************************************************/
	function authCheck()
	{ 
		if($this->session->userdata('FCS_ADMIN_ID') == ""):
			setcookie('FCS_REFERENCEPAGES', uri_string(), time() + 60*60*24*5, '/');
			redirect(base_url().'siteadmin');
		else:
			return $this->session->userdata('FCS_ADMIN_ID');
		endif;
	}	// END OF FUNCTION
	
	/* * *********************************************************************
	 * * Function name : Admin Login Page
	 * * Developed By : Manoj Kumar
	 * * Purpose  : This function used for Admin Login Page
	 * * Date : 25 NOVEMBER 2017
	 * * **********************************************************************/
	public function index()
	{	
		if($this->session->userdata('FCS_ADMIN_ID')) redirect(base_url().'siteadmin/homes');
		$data['error'] 			= 	'';
		$data['Forgateerror']	=	'';
		/*-----------------------------------Login ---------------*/
		if($this->input->post('LoginFormSubmit')):	
			//Set rules
			$this->form_validation->set_rules('useremail', 'lang:User Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'lang:Password', 'trim|required');
			
			if($this->form_validation->run()):	
				$result		=	$this->siteadmin_model->Authenticate($this->input->post('useremail'));
				if($result): 
					if($this->decrypts_password($result['password']) != $this->input->post('password')):
						$data['error'] = lang('invalidpassword');	
					elseif($result['status'] != 'Y'):	
						$data['error'] = lang('accountblock');	
					else:	
							
						$this->session->set_userdata(array('FCS_logged_in'=>true,'FCS_ADMIN_ID'=>$result['id'],'FCS_ADMIN_AGGENT_CODE'=>$result['agent_code'],'FCS_ADMIN_NAME'=>$result['name'],'FCS_ADMIN_DISPLAY_NAME'=>$result['display_name'],'FCS_ADMIN_CONTACT_NAME'=>$result['display_name'],'FCS_ADMIN_EMAIL'=>$result['email'],'FCS_ADMIN_PHONE'=>$result['mobile'],'FCS_ADMIN_SUBSC_TYPE'=>$result['subscription_type'],'FCS_ADMIN_TYPE'=>$result['admin_type'],'FCS_ADMIN_LOGO'=>$result['image'],'FCS_ADMIN_LASTLOGIN'=>$result['last_ip'].' ('.$result['last_login'].')'));
						
						$param['last_login']		=	$this->front_model->get_current_date_time();
						$param['last_ip']			=	$this->front_model->get_current_ip();
				
						$this->siteadmin_model->EditAdminLoginData($param,$result['id']);
						
						if($this->input->post('RememberMe') == 'YES'):
							 setcookie("FCSUserEmail",$this->input->post('useremail'),time()+60*60*24*100,'/');
							 setcookie("FCSUserPass",$this->input->post('password'),time()+60*60*24*100,'/');
							 setcookie("FCSRememberMe",'YES',time()+60*60*24*100,'/');
						else:
							 setcookie("FCSUserEmail",$this->input->post('useremail'),time()-60*60*24*100,'/');
							 setcookie("FCSUserPass",$this->input->post('password'),time()-60*60*24*100,'/');
							 setcookie("FCSRememberMe",'YES',time()-60*60*24*100,'/');
						endif;

						if($_COOKIE['FCS_REFERENCEPAGES']):
							redirect(base_url().$_COOKIE['FCS_REFERENCEPAGES']);
						else:
							redirect(base_url().'siteadmin/homes');
						endif;
					endif;
				else:
					$data['error'] = lang('invalidlogindetails');
				endif;			
			endif;
		endif;

		$this->layouts->admin_view('index',array(),$data,'onlyview');
	}
	
	/* * *********************************************************************
	 * * Function name : home
	 * * Developed By : Manoj Kumar
	 * * Purpose  : This function used for dashboard
	 * * Date : 25 NOVEMBER 2017
	 * * **********************************************************************/
	public function homes()
	{	
		$data['admin_detail'] 				= 	$this->authCheck();
		$data['error'] 						= 	'';
		
		if($this->session->userdata('FCS_ADMIN_TYPE') != 'superadmin'):
			$param['create_date']			=	$this->front_model->get_current_date_time();
			$param['created_by']			=	'1';
			$adminid						=	$this->session->userdata('FCS_ADMIN_ID');
		
		endif;

		$this->layouts->set_title('Dashboard');
		$this->layouts->admin_view('homes',array(),$data);
	}	// END OF FUNCTION
	
	/* * *********************************************************************
	 * * Function name : myaccount
	 * * Developed By : Manoj Kumar
	 * * Purpose  : This function used for myaccount
	 * * Date : 25 NOVEMBER 2017
	 * * **********************************************************************/
	public function myaccount()
	{
		$data['admin_detail'] 				= 	$this->authCheck();
		$data['error'] 						= 	'';
		
		$this->layouts->set_title('My account');
		$this->layouts->admin_view('myaccount',array(),$data);
	}	// END OF FUNCTION 
	
	/***********************************************************************
	** Function name : getalldatalist
	** Developed By : Manoj Kumar
	** Purpose  : This function used for get all data list
	** Date : 25 NOVEMBER 2017
	************************************************************************/
	function getalldatalist()
	{  
		$data['error'] 						= 	'';
		
		$wherecon			 				= 	'adm.id ='.$this->session->userdata('FCS_ADMIN_ID');		
		$shortField 						= 	'adm.id ASC';
		
		$this->load->library('pagination');
		$config['base_url'] 				= 	base_url().$this->router->fetch_class().'/getalldatalist/';
		$tbl_name 							= 	'admin as adm';
		$con 								= 	'';
		$config['total_rows'] 				= 	$this->siteadmin_model->SelectAdminData('count',$tbl_name,$wherecon,$shortField,'0','0');
		$config['per_page']	 				= 	10;
		$config['uri_segment']				= 	3;
		$this->pagination->initialize($config);
		
		if($this->uri->segment(3)):
			$page = $this->uri->segment(3);
		else:
			$page =0;
		endif;
		
		$data['ADMINDATA'] 					= 	$this->siteadmin_model->SelectAdminData('data',$tbl_name,$wherecon,$shortField,$config['per_page'],$page); 

		$this->layouts->admin_view('getalldatalist',array(),$data,'onlyview');
	}
	
	/* * *********************************************************************
	 * * Function name : editmyaccount
	 * * Developed By : Manoj Kumar
	 * * Purpose  : This function used for edit myaccount
	 * * Date : 25 NOVEMBER 2017
	 * * **********************************************************************/
	public function editmyaccount($adminid='')
	{
		$data['admin_detail'] 				= 	$this->authCheck();
		$data['error'] 						= 	'';
		$adminid							=	manoj_decript($adminid);
		
		$data['profileuserdata']			=	$this->siteadmin_model->getAdminDataByID($adminid); 
		if($data['profileuserdata'] == ''):
			redirect(base_url().'siteadmin/homes');
		endif;
		
		if($this->input->post('SaveChanges')):
                
			$error							=	'NO';
			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			
			
			$this->form_validation->set_rules('email', 'E-Mail', 'trim|required|valid_email|is_unique[admin.email]');
			
			$this->form_validation->set_rules('mobile', 'Phone', 'trim|required|min_length[10]|max_length[15]|is_unique[admin.mobile]');
			if($this->input->post('mobile') && !preg_match('/^[0-9-+]+$/',$this->input->post('mobile'))):
				$error						=	'YES';
				$data['mobileerror'] 		= 	'Please eneter correct number';
			endif;
			
			if($this->session->userdata('FCS_ADMIN_TYPE') == 'subadmin'):
				
				$this->form_validation->set_rules('address', 'Address', 'trim|required');
			endif;
			
			if($this->input->post('new_password')!= ''):
				$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|min_length[6]|max_length[25]');
				$this->form_validation->set_rules('conf_password', 'Confirm Password', 'trim|required|min_length[6]|matches[new_password]');
			endif;
			
			$this->form_validation->set_rules('uploadimage0', 'Logo', 'trim');
			
			if($this->form_validation->run() && $error == 'NO'):
			    
				$param['name']						= 	addslashes($this->input->post('name'));
				
					$param['address']				= 	addslashes($this->input->post('address'));
                        
				$param['email']						= 	addslashes($this->input->post('email'));
				$param['mobile']					= 	addslashes($this->input->post('mobile'));
				
				
				if($this->input->post('uploadimage0')):
					$param['image']				= 	addslashes($this->input->post('uploadimage0'));
				else:
					$param['image']				= 	base_url().'./assets/default_image/logo.png';
				endif;
				
				if($this->input->post('new_password')):
					$NewPassword					=	$this->input->post('new_password');
					$param['password']				= 	$this->encript_password($NewPassword);
					if(get_cookie('FCSRememberMe') == 'YES'):
						setcookie("FCSUserEmail",$param['email'],time()+60*60*24*100,'/');
						setcookie("FCSUserPass",$NewPassword,time()+60*60*24*100,'/');
						setcookie("FCSRememberMe",'YES',time()+60*60*24*100,'/');
					endif;
				else:
					if(get_cookie('FCSRememberMe') == 'YES'):
						setcookie("FCSUserEmail",$param['email'],time()+60*60*24*100,'/');
						setcookie("FCSRememberMe",'YES',time()+60*60*24*100,'/');
					endif;
				endif;
				
				$param['update_date']				=	$this->front_model->get_current_date_time();
				 
				$this->siteadmin_model->EditAdminLoginData($param,$this->input->post('CurrentDataID'));
				
				$result		=	$this->siteadmin_model->Authenticate($param['email']);
				if($result):
					
					$this->session->set_userdata(array('FCS_logged_in'=>true,'FCS_ADMIN_ID'=>$result['id'],'FCS_ADMIN_NAME'=>$result['name'],'FCS_ADMIN_EMAIL'=>$result['email'],'FCS_ADMIN_PHONE'=>$result['mobile'],'FCS_ADMIN_TYPE'=>$result['admin_type'],'FCS_ADMIN_LOGO'=>$result['image'],'FCS_ADMIN_LASTLOGIN'=>$result['last_ip'].' ('.$result['last_login'].')'));
				endif;
				
				$this->session->set_flashdata('alert_success',lang('updatesuccess'));
				redirect(base_url().$this->router->fetch_class().'/myaccount');
			endif;
		endif;
		
		$this->layouts->set_title('Edit account');
		$this->layouts->admin_view('editmyaccount',array(),$data);
	}	// END OF FUNCTION	
	
	/* * *********************************************************************
	 * * Function name : encript_password
	 * * Developed By : Manoj Kumar
	 * * Purpose  : This function used for encript_password
	 * * Date : 25 NOVEMBER 2017
	 * * **********************************************************************/
	public function encript_password($password)
	{
		return $this->encrypt->encode($password, $this->config->item('encryption_key'));
	}	// END OF FUNCTION
	
	/* * *********************************************************************
	 * * Function name : encript_password
	 * * Developed By : Manoj Kumar
	 * * Purpose  : This function used for encript_password
	 * * Date : 25 NOVEMBER 2017
	 * * **********************************************************************/
	public function decrypts_password($password)
	{
		return $this->encrypt->decode($password, $this->config->item('encryption_key'));
	}	// END OF FUNCTION
	
	/***********************************************************************
	** Function name : UplodeImage
	** Developed By : Manoj Kumar
	** Purpose  : This function used uplode image
	** Date : 25 NOVEMBER 2017
	************************************************************************/
	function UplodeImage()
	{ 
		$file_name					= 	$_FILES['uploadfile']['name'];
		if($file_name): 
			$tmp_name				= 	$_FILES['uploadfile']['tmp_name'];
			//$imageInformation 	= 	getimagesize($_FILES['uploadfile']['tmp_name']);
			//if($imageInformation[0] <= 1800 && $imageInformation[1] <= 1800):
				$this->load->library("upload_crop_img");
				$return_file_name	=	$this->upload_crop_img->_upload_image($file_name,$tmp_name,'sitelogo');
				echo $return_file_name; die;
			/*else:
				echo 'ERROR_____Image must be width:1800px and height:1800px max.'; die;
			endif; */
		else:
			echo 'UPLODEERROR'; die;
		endif;
	}
	
	/***********************************************************************
	** Function name : DeleteImage
 	** Developed By : Manoj Kumar
	** Purpose  : This function used for delete image by ajax.
	** Date : 25 NOVEMBER 2017
	************************************************************************/
	function DeleteImage()
	{  
		$imagename	=	$this->input->post('imagename'); 
		if($imagename):
			$this->load->library("upload_crop_img");
			$return	=	$this->upload_crop_img->_delete_image($imagename); 
		endif;
		echo '1'; die;
	}
	
	/***********************************************************************
	** Function name : logout
	** Developed By : Manoj Kumar
	** Purpose  : This function used for logout
	** Date : 25 NOVEMBER 2017
	************************************************************************/
	function logout()
	{
		setcookie('FCS_REFERENCEPAGES', '', time() - 60*60*24*5, '/');
		$this->session->unset_userdata(array('FCS_logged_in','FCS_ADMIN_ID','FCS_ADMIN_AGGENT_CODE','FCS_ADMIN_NAME','FCS_ADMIN_DISPLAY_NAME','FCS_ADMIN_CONTACT_NAME','FCS_ADMIN_EMAIL','FCS_ADMIN_PHONE','FCS_ADMIN_SUBSC_TYPE','FCS_ADMIN_TYPE','FCS_ADMIN_LOGO','FCS_ADMIN_LASTLOGIN'));
		redirect(base_url().'siteadmin');
	}	// END OF FUNCTION
	
	/* * *********************************************************************
	* * Function name : authCheckByajax 
	* * Developed By : Manoj Kumar
	* * Purpose  : To check whether user is loggin or not.
	* * Date : 25 NOVEMBER 2017
	************************************************************************/
	function authCheckByajax()
	{  
		if($this->session->userdata('FCS_ADMIN_ID') == ""):
			echo "Deleted";
		else:
			echo "NotDeleted"; 
		endif;
		die;
	}	// END OF FUNCTION
}
/* End of file Siteadmin.php */
/* Location: ./application/algosoft/siteadmin/controllers/Siteadmin.php */