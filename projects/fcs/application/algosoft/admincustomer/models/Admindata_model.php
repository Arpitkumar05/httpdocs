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
	** Developed By : Jitendra Chaudhari
	** Purpose  : This function used for get all data
	** Date : 10 AUG 2017
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
	** Developed By : Jitendra Chaudhari
	** Purpose  : This function used for get data by id
	** Date : 10 AUG 2017
	************************************************************************/
	function get_data_by_id($id='')
	{
		$this->db->select('*');
		$this->db->from('customer');
		$this->db->where('id',$id);
		$query = $this->db->get();
		if($query->num_rows() > 0):
			return $query->row_array();
		else:
			return false;
		endif;
	}
	
	/***********************************************************************
	** Function name : add_data
	** Developed By : Jitendra Chaudhari
	** Purpose  : This function used for add data
	** Date : 10 AUG 2017
	************************************************************************/
	public function add_data($params=array())
	{
		$this->db->insert('customer',$params);
		return $this->db->insert_id();
	}
	
	/***********************************************************************
	** Function name : update_data
	** Developed By : Jitendra Chaudhari
	** Purpose  : This function used for updatq data
	** Date : 10 AUG 2017
	************************************************************************/
	function update_data($params=array(),$id='')
	{ 
		$this->db->where('id',$id);
		$this->db->update('customer',$params);
		return true;
	}
	
	/***********************************************************************
	** Function name : delete_data
	** Developed By : Jitendra Chaudhari
	** Purpose  : This function used for delete data
	** Date : 10 AUG 2017
	************************************************************************/
	function delete_data($id='')
	{
		$this->db->delete('customer', array('id' => $id));
		return true;
	}

	/***********************************************************************
	** Function name : get_view_data_by_id
	** Developed By : Jitendra Chaudhari
	** Purpose  : This function used for get view data by id
	** Date : 3 AUG 2017
	************************************************************************/
	function get_view_data_by_id($id='')
	{
		$this->db->select('customer.*,c.name as city');
		$this->db->from('customer');
                $this->db->join('city as c','customer.city_id=c.id','LEFT');
		$this->db->where('customer.id',$id);
		$query = $this->db->get();
		if($query->num_rows() > 0):
			return $query->row_array();
		else:
			return false;
		endif;
	}

        /***********************************************************************
	** Function name : generate_random_password
	** Developed By : yogesh dixit
	** Purpose  : This function used for generate random password
	** Date : 3 AUG 2017
	************************************************************************/
        
	 function generate_random_password($length = 8) {
            $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++):
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            endfor;
            return $randomString;
        }
        
        
        /***********************************************************************
	** Function name : get_sunscription_type
	** Developed By : Manoj Kumar
	** Purpose  : This function used for get sunscription type
	** Date : 25 NOVEMBER 2017
	************************************************************************/
	function get__id_proof_type()
	{
		$this->db->select('*');
		$this->db->from('identity_proof');
		$this->db->where("status ='Y'");
		$query = $this->db->get();
		if($query->num_rows() > 0):
			return $query->result_array();
		else:
			return false;
		endif;
	}
        
}	
?>