<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Admindata_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct(); 
		$this->load->database();
	}

	/***********************************************************************
	** Function name : get_all_data
	** Developed By : Manoj Kumar
	** Purpose  : This function used for get all data
	** Date : 27 NOVEMBER 2017
	************************************************************************/
	function get_all_data($action='',$tbl_name='',$wcon='',$shortField='',$num_page='',$cnt='')
	{	
		$this->db->select('page_heading.*,innp.name as page_name');
		$this->db->from($tbl_name);
                $this->db->join("inner_page as innp","page_heading.page_id=innp.id","LEFT");
		if($wcon['where']):	$this->db->where($wcon['where']);	 		endif;
		if($wcon['like']):  $this->db->where($wcon['like']); 			endif;
		if($shortField):	$this->db->order_by($shortField);			endif;
                $this->db->group_by('page_heading.page_id');
		if($num_page):		$this->db->limit($num_page,$cnt);			endif;
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
	
	function get_data_by_id($id='')
	{
		$this->db->select('*');
		$this->db->from('page_heading');
		$this->db->where('page_id',$id);
		$query = $this->db->get();
		if($query->num_rows() > 0):
			return $query->result();
		else:
			return false;
		endif;
	}
	
	/***********************************************************************
	** Function name : add_data
	** Developed By : Manoj Kumar
	** Purpose  : This function used for add data
	** Date : 20 DECEMBER 2016
	************************************************************************/
	public function add_data($params=array())
	{
		$this->db->insert('page_heading',$params);
		return $this->db->insert_id();
	}
	
	/***********************************************************************
	** Function name : update_data
	** Developed By : Manoj Kumar
	** Purpose  : This function used for updatq data
	** Date : 20 DECEMBER 2016
	************************************************************************/
	function update_data($params=array(),$id='')
	{ 
		$this->db->where('id',$id);
		$this->db->update('page_heading',$params);
		return true;
	}
	
	/***********************************************************************
	** Function name : delete_data
	** Developed By : Manoj Kumar
	** Purpose  : This function used for delete data
	** Date : 20 DECEMBER 2016
	************************************************************************/
	function delete_data($id='')
	{
		$this->db->delete('page_heading', array('page_id' => $id));
		return true;
	}
	
	
        /***********************************************************************
	** Function name : get_page_data
	** Developed By : Manoj Kumar
	** Purpose  : This function used for get page data
	** Date : 20 DECEMBER 2016
	************************************************************************/
	function get_page_data()
	{
		$this->db->select('*');
		$this->db->from('inner_page');
		$this->db->where("status = 'Y'");
		$query = $this->db->get();
		if($query->num_rows() > 0):
			return $query->result();
		else:
			return false;
		endif;
	}
}	


?>