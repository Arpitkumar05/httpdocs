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
		$this->db->select('*');
		$this->db->from($tbl_name);
               
		if($wcon['where']):	$this->db->where($wcon['where']);	 		endif;
		if($wcon['like']):  $this->db->where($wcon['like']); 			endif;
		if($shortField):	$this->db->order_by($shortField);			endif;
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
	
	/***********************************************************************
	** Function name : get_data_by_id
	** Developed By : Manoj Kumar
	** Purpose  : This function used for get data by id
	** Date : 27 NOVEMBER 2017
	************************************************************************/
	function get_data_by_id($id='')
	{
		$this->db->select('*');
                   if($_SESSION['product_id'])  : 
		$this->db->from('product_section');
                   $this->db->where('product_id',$id);
                   else:
                    $this->db->from('products');
                   $this->db->where('id',$id);
                   endif;
		
		$query = $this->db->get();
		if($query->num_rows() > 0):
			return $query->row_array();
		else:
			return false;
		endif;
	}
	
	/***********************************************************************
	** Function name : add_data
	** Developed By : Manoj Kumar
	** Purpose  : This function used for add data
	** Date : 27 NOVEMBER 2017
	************************************************************************/
	public function add_data($params=array())
	{     if($_SESSION['product_id'])  : 
            $this->db->insert('product_section',$params);
		
                   else:
                  $this->db->insert('products',$params);  
                   endif;
		
		return $this->db->insert_id();
	}
	
	/***********************************************************************
	** Function name : update_data
	** Developed By : Manoj Kumar
	** Purpose  : This function used for updatq data
	** Date : 27 NOVEMBER 2017
	************************************************************************/
	function update_data($params=array(),$id='')
	{     $this->db->where('id',$id);
              if($_SESSION['product_id'])  : 
              $this->db->update('product_section',$params); 
                   else:
                  $this->db->update('products',$params);
                   endif;
		
		
		return true;
	}
	
	/***********************************************************************
	** Function name : delete_data
	** Developed By : Manoj Kumar
	** Purpose  : This function used for delete data
	** Date : 27 NOVEMBER 2017
	************************************************************************/
	function delete_data($id='')
	{      if($_SESSION['product_id'])  : 
		$this->db->delete('product_section', array('id' => $id));
          else:
              	$this->db->delete('products', array('id' => $id));
               endif;
        
		return true;
	}
        
        
        
}	



?>