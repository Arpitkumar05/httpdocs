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
	** Date : 20 DECEMBER 2016
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
				return $query->result();
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
	** Date : 20 DECEMBER 2016
	************************************************************************/
	function get_data_by_id($id='')
	{
		$this->db->select('*');
		$this->db->from('inner_page');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row_array();
	}
	
	/***********************************************************************
	** Function name : add_data
	** Developed By : Manoj Kumar
	** Purpose  : This function used for add data
	** Date : 20 DECEMBER 2016
	************************************************************************/
	public function add_data($params=array())
	{
		$this->db->insert('inner_page',$params);
              //  echo $this->db->last_query(); die;
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
		$this->db->update('inner_page',$params);
                 // echo $this->db->last_query(); die;
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
		$this->db->delete('inner_page', array('id' => $id));
		return true;
	}
        
       /***********************************************************************
	** Function name : get_parent
	** Developed By : yogesh dixit
	** Purpose  : This function used for get data by id
	** Date : 08 OCTOBER 2016
	************************************************************************/
	function get_parent($parentid='',$curid='')
	{
		$this->db->select('id,name,slug');
		$this->db->from('inner_page');
		$this->db->where('parent_id',$parentid);
		$this->db->where("status = 'Y'");
		$query = $this->db->get();
		if($query->num_rows() > 0):
			$data	=	$query->result();
			foreach($data as $info):
				if($info->lable < 2):
					$labels	=	'';
					for($i=0; $i<$info->lable; $i++):	$labels	.=	'&nbsp;&nbsp;&nbsp;&nbsp;'; endfor;
					if($curid == $info->id): $select = 'selected="selected"'; else: $select = ''; endif;
					$lable = $info->lable+1;
					$html	.=	'<option value="'.$info->id.'_____'.$lable.'" '.$select.'>'.$labels.$info->name.'</option>';
					$html	.=	$this->get_parent($info->id,$curid);
				endif;
			endforeach;
		endif;
		return $html;
	} 
        
}	
?>