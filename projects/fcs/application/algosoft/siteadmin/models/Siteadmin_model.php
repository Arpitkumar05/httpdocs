<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Siteadmin_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct(); 
		$this->load->database();
	}
	
	/* * *********************************************************************
	 * * Function name : Authenticate
	 * * Developed By : Manoj Kumar
	 * * Purpose  : This function used for Admin Login Page
	 * * Date : 25 NOVEMBER 2017
	 * * **********************************************************************/
	public function Authenticate($useremail='')
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('email',$useremail);
		$query	=	$this->db->get();
		if($query->num_rows() >0):
			return $query->row_array();
		else:
			return false;
		endif;
	}	// END OF FUNCTION
	
	/***********************************************************************
	** Function name : SelectAdminData
	** Developed By : Manoj Kumar
	** Purpose  : This function used for select seo data
	** Date : 25 NOVEMBER 2017
	************************************************************************/
	function SelectAdminData($action='',$tbl_name='',$wherecon='',$shortField='',$num_page='',$cnt='')
	{ 
		$this->db->select('adm.*');
		$this->db->from($tbl_name);
		if($wherecon):		$this->db->where($wherecon);					endif;
		if($shortField):	$this->db->order_by($shortField);				endif;
		if($num_page):		$this->db->limit($num_page,$cnt);				endif;
		$query = $this->db->get();
		if($action == 'data'):
			if($query->num_rows() > 0):
				return $query->result_array();
			else:
				return false;
			endif;
		elseif($action == 'count'):
			return $query->num_rows();
		endif;
	}
	
	/* * *********************************************************************
	 * * Function name : getAdminDataByID  
	 * * Developed By : Manoj Kumar
	 * * Purpose  : This is get admin detail by ID.
	 * * Date : 25 NOVEMBER 2017
	 * * **********************************************************************/
	function getAdminDataByID($id='')
	{ 	
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('id',$id);
		$query = $this->db->get();
		if($query->num_rows() > 0):
			return $query->row_array();
		else:
			return false;
		endif;
	}	// END OF FUNCTION
	
	/* * *********************************************************************
	 * * Function name : addeditAdminLoginData
	 * * Developed By : Manoj Kumar
	 * * Purpose  : This is get admin detail by ID.
	 * * Date : 25 NOVEMBER 2017
	 * * **********************************************************************/
	function EditAdminLoginData($param='',$id='')
	{ 
		$this->db->where('id',$id);
		$this->db->update('admin',$param);
		return true;
	}	
	
	
	/***********************************************************************
	** Function name : add_particular_data
	** Developed By : Manoj Kumar
	** Purpose  : This function used for add particular data
	** Date : 27 NOVEMBER 2017
	************************************************************************/
	public function add_particular_data($tablename='',$params=array())
	{
		$this->db->insert($tablename,$params);
		return $this->db->insert_id();
	}
	
	
}	
?>