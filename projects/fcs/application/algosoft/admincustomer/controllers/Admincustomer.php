<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admincustomer extends CI_Controller {

	public function  __construct() 
	{ 
		parent:: __construct();
		$this->load->helper(array('form','url','html','path','form','cookie'));
		$this->load->library(array('email','session','form_validation','pagination','parser','encrypt'));
		error_reporting(E_ALL ^ E_NOTICE);
		$this->load->library("layouts");
		$this->load->model(array('admindata_model','front_model','email_model', 'Sms_model'));
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
		
			$this->layouts->set_title('Manage Customer');
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
		$tbl_name 							= 	'customer';
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
	** Function name : get_view_data
	** Developed By : Manoj Kumar
	** Purpose  : This function used for get view data.
	** Date : 25 NOVEMBER 2017
	************************************************************************/
	function get_view_data()
	{
		$html					=	'';
		if($this->input->post('viewid')):
			$viewid				=	$this->input->post('viewid'); 
			$viewdata			= 	$this->admindata_model->get_view_data_by_id($viewid);
               
			if($viewdata <> ""):
				$html			.=	'<table class="table border-none">
									  <tbody>
									  	<tr>
										  <td align="left"><strong>Name:</strong></td>
										  <td align="left">'.stripslashes($viewdata['name']).'</td>
										</tr>
										
										
										<tr>
										  <td align="left"><strong>Email:</strong></td>
										  <td align="left">'.stripslashes($viewdata['email']).'</td>
										</tr>
										<tr>
										  <td align="left"><strong>Phone:</strong></td>
										  <td align="left">'.stripslashes($viewdata['mobile']).'</td>
										</tr>
										
										<tr>
										  <td align="left"><strong>Address:</strong></td>
										  <td align="left">'.stripslashes($viewdata['address']).' , '.stripslashes($viewdata['city']).' ,'.stripslashes($viewdata['pincode']).' ,'.stripslashes($viewdata['state']).' ,'.stripslashes($viewdata['country']).'</td>
										</tr>
                                                                                
										
										
									  </tbody>
									</table>';
			endif;
		endif;
		echo $html; die;
	} 

	

// END OF FUNCTION
}
/* End of file Adminestateagent.php */
/* Location: ./application/algosoft/adminestateagent/controllers/Adminestateagent.php */