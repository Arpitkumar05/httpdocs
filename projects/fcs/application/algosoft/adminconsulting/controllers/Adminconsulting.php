<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminconsulting extends CI_Controller {

	public function  __construct() 
	{ 
		parent:: __construct();
		$this->load->helper(array('form','url','html','path','cookie'));
		$this->load->library(array('email','session','form_validation','pagination','parser','encrypt'));
		error_reporting(E_ALL ^ E_NOTICE);
		$this->load->library("layouts");
		$this->load->model(array('admindata_model','front_model'));
		$this->load->helper('language');
		$this->lang->load('statictext', 'siteadmin');
	} 

	/***********************************************************************
	** Function name : managedata
	** Developed By : Manoj Kumar
	** Purpose  : This function used for manage data
	** Date : 25 NOVEMBER 2017
	************************************************************************/
	public function managedata() 
	{
		
			$data['error'] 				= 	'';
                $this->front_model->get_permission_type($data);
		$this->front_model->auth_check('view_data');
		
			$this->layouts->set_title('Manage consulting');
			$this->layouts->admin_view('managedata',array(),$data);
		
			
	
	}
	
	/***********************************************************************
	** Function name : getalldatalist
	** Developed By : Manoj Kumar
	** Purpose  : This function used for get all data list
	** Date : 25 NOVEMBER 2017
	************************************************************************/
	function getalldatalist()
	{  
		$data['error'] 						= 	'';
		
		$this->front_model->get_permission_type($data);
		if($this->input->post('showalldata') == 'Yes'):
			$this->session->set_userdata(array('data_searchfield'=>'','data_searchvalue'=>''));
			$this->session->set_userdata('data_perpage',10); 
			$this->session->set_userdata('data_page',1);
		endif;
		
		if($this->input->post('searchfield') && $this->input->post('searchvalue')):
			$this->session->set_userdata(array('data_searchfield'=>$this->input->post('searchfield'),'data_searchvalue'=>$this->input->post('searchvalue')));
			$this->session->set_userdata('data_perpage',10); 
			$this->session->set_userdata('data_page',1);
		endif;
		
		if($this->session->userdata('data_searchfield') && $this->session->userdata('data_searchvalue')):
			$wherecon['like']			 	= 	$this->session->userdata('data_searchfield')." LIKE '%".$this->session->userdata('data_searchvalue')."%'";
			$data['searchfield'] 			= 	$this->session->userdata('data_searchfield');
			$data['searchvalue'] 			= 	$this->session->userdata('data_searchvalue');
		else:
			$data['searchfield'] 			= 	'';
			$data['searchvalue'] 			= 	'';
		endif;

		$shortField		 					= 	"id ASC";
		
		$this->load->library('pagination');
		$config['base_url'] 				= 	base_url().$this->router->fetch_class().'/getalldatalist/';
		$tbl_name 							= 	'consulting';
		$con 								= 	'';
		$config['total_rows'] 				= 	$this->admindata_model->get_all_data('count',$tbl_name,$wherecon,$shortField,'0','0');
		
		if($this->input->post('perpage') == 'All'):
			$this->session->set_userdata('data_perpage',$config['total_rows']); 
			$this->session->set_userdata('data_page',1);
		elseif($this->input->post('perpage')):
			$this->session->set_userdata('data_perpage',$this->input->post('perpage')); 
			$this->session->set_userdata('data_page',1);
		endif;
		
		if($this->session->userdata('data_perpage')):
			$config['per_page']	 			= 	$this->session->userdata('data_perpage'); 
		else:
			$config['per_page']	 			= 	10;
		endif;
		
		$config['uri_segment']				= 	3;
		$this->pagination->initialize($config);
		
		if($this->uri->segment(3)):
			$page = $this->uri->segment(3);
		else:
			$page =0;
		endif;
		
		$data['perpage'] 					= 	$config['per_page'];
		$data['total_rows'] 				= 	$config['total_rows'];
		
		if($config['total_rows']):
			$first							=	($page)+1;
			$last							=	(($page)+$data['perpage'])>$config['total_rows']?$config['total_rows']:(($page)+$data['perpage']);
			$data['recordcontent']			=	'Showing '.$first.' to '.$last.' of '.$config['total_rows'].' entries';
		else:
			$data['recordcontent']			=	'';
		endif;
		
		$data['ALLDATA'] 					= 	$this->admindata_model->get_all_data('data',$tbl_name,$wherecon,$shortField,$config['per_page'],$page); 
		
		$this->layouts->admin_view('getalldatalist',array(),$data,'onlyview');
	}
	/***********************************************************************
	** Function name : changestatus
	** Developed By : Manoj Kumar
	** Purpose  : This function used for change status
	** Date : 25 NOVEMBER 2017
	************************************************************************/
	function changestatus()
	{  
		$this->front_model->auth_check('edit_data');
		$id		=	manoj_decript($this->input->post('curid'));
		$type	=	$this->input->post('type');
		if($type == "N"):
			$params = array('status'=>'N');
			$this->admindata_model->update_data($params,$id);
		elseif($type == "Y"):
			$params = array('status'=>'Y');
			$this->admindata_model->update_data($params,$id);
		endif;
		echo 'SUCCESS_____success'; die;
	}
	
	/***********************************************************************
	** Function name : deletedata
	** Developed By : Manoj Kumar
	** Purpose  : This function used for delete data.
	** Date : 25 NOVEMBER 2017
	************************************************************************/
	function deletedata()
	{
		$this->front_model->auth_check('delete_data');
		$id		=	manoj_decript($this->input->post('curid'));
		$this->admindata_model->delete_data($id);
		echo 'SUCCESS_____<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button><a href="javascript:void(0);" class="alert-link">Success! </a>'.lang('deletesuccess').'</div>'; die;	
	}

	/***********************************************************************
	** Function name : addeditdata
	** Developed By : Manoj Kumar
	** Purpose  : This function used for add edit data
	** Date : 27 NOVEMBER 2017
	************************************************************************/
	public function addeditdata($editid='') 
	{	
		$data['error'] 					= 	'';
		$editid							=	manoj_decript($editid);
              
                
		if($editid):
			$this->front_model->auth_check('edit_data');
			$data['EDITDATA'] 			= 	$this->admindata_model->get_data_by_id($editid); 
		else:
			$this->front_model->auth_check('add_data');
		endif;
               
		if($this->input->post('SaveChanges')):
			
		//	$this->form_validation->set_rules('uploadimage0', 'Image', 'trim|required');
		   
                        $this->form_validation->set_rules('name', 'lang:Partner Name', 'trim|required');
                       
			$this->form_validation->set_rules('content', 'lang:Content', 'trim|required');
                      
			
             
                    

			if($this->form_validation->run()): 
				
				
				//$param['image']			= 	addslashes($this->input->post('uploadimage0'));
				$param['name']			= 	addslashes($this->input->post('name'));
                               
				$param['content']			=	addslashes($this->input->post('content'));
			
				
                                
                                
                                
		
				if($this->input->post('CurrentDataID') ==''):
					$param['status']		=	'Y';
					$param['created_date']	=	$this->front_model->get_current_date_time();
					$param['created_by']	=	$this->session->userdata('FCS_ADMIN_ID');
					$categoriesids			=	$this->admindata_model->add_data($param);
					$this->session->set_flashdata('alert_success',lang('addsuccess'));
				else:
					/*  if($data['EDITDATA']['image'] && $param['image'] && $data['EDITDATA']['image'] != $param['image']):
						$this->load->library("upload_crop_img");
						$this->upload_crop_img->_delete_image($data['EDITDATA']['image']); 
					endif;
					*/
					$param['updated_date']	=	$this->front_model->get_current_date_time();
					$param['updated_by']	=	$this->session->userdata('FCS_ADMIN_ID');
					$categoriesids			=	$this->input->post('CurrentDataID');
					$this->admindata_model->update_data($param,$categoriesids);
					$this->session->set_flashdata('alert_success',lang('updatesuccess'));
				endif;

				redirect(base_url().$this->router->fetch_class().'/managedata/');
			endif;
		endif;

		$this->layouts->set_title('Add/edit consulting');
		$this->layouts->admin_view('addeditdata',array(),$data);
	}
	
	/***********************************************************************
	** Function name : UplodeImage
	** Developed By : Manoj Kumar
	** Purpose  : This function used uplode image
	** Date : 27 NOVEMBER 2017
	************************************************************************/
	function UplodeImage()
	{ 
		$file_name					= 	$_FILES['uploadfile']['name'];
		if($file_name): 
			$tmp_name				= 	$_FILES['uploadfile']['tmp_name'];
			//$imageInformation 		= 	getimagesize($_FILES['uploadfile']['tmp_name']);
			//if($imageInformation[0] >= 1200 && $imageInformation[1] >= 900):
				$this->load->library("upload_crop_img");
				$return_file_name	=	$this->upload_crop_img->_upload_image($file_name,$tmp_name,'consulting');
				echo $return_file_name; die;
			//else:
			//	echo 'ERROR_____Please follow image ratio.'; die;
			//endif; 
		else:
			echo 'UPLODEERROR'; die;
		endif;
	}
	
	/***********************************************************************
	** Function name : DeleteImage
 	** Developed By : Manoj Kumar
	** Purpose  : This function used for delete image by ajax.
	** Date : 27 NOVEMBER 2017
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
}
/* End of file Admindfconsulting.php */
/* Location: ./application/algosoft/admindfsericecate/controllers/Admindfsericecate.php */