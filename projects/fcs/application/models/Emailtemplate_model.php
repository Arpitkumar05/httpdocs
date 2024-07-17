<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Emailtemplate_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct(); 
		$this->load->database();
	}
	
	/***********************************************************************
	** Function name : get_admin_data
	** Developed By : Manoj Kumar
	** Purpose  : This is get admin data.
	** Date : 25 NOVEMBER 2017
	************************************************************************/
	function get_admin_data() {  
		$this->db->select('name,email');
		$this->db->from('admin');
		$this->db->where("id ='1'");
		$query = $this->db->get();
		if($query->num_rows()>0):
			return $query->row_array();
		else:
			return false;
		endif;
	}
}	
?>