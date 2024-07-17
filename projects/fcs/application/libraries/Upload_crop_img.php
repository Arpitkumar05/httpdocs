<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload_crop_img
{
	// hold CI intance
	private $CI;
	 
	public function __construct()
	{
		//parent::__construct();
		//$this->CI = & get_instance();
	}
	
	function _upload_image($file_name='',$tmp_name='',$type='',$newfilename='',$subfolder='')
	{ 
		$img_properties			=	$this->_get_image_path_by_referance_and_id($type,$subfolder);
		if(!is_array($img_properties)) die("please set image properties for upload_path ,allowed_types ,max_size etc. in array form");
		
		if($newfilename):
			$file_name	 		= 	$newfilename;
		else:
			$file_name	 		= 	time().sanitized_filename($file_name);
		endif;

		if(move_uploaded_file($tmp_name, $img_properties['original']['path'].$file_name)): 

			//For creating original nails perfect size Start,.......
			if($img_properties['original']['perfect']):
				$this->_create_resized_image($file_name,$img_properties['perfect']);
			endif;
			
			//For creating original nails medium size Start,...
			if($img_properties['original']['medium']):
				$this->_create_resized_image($file_name,$img_properties['medium']);
			endif;
			
			//For creating thumb nails Start,.......
			if($img_properties['original']['thumb']):
				$this->_create_resized_image($file_name,$img_properties['thumb']);
			endif;
			
			$imagefolder   = $img_properties['thumb']['path']?$img_properties['thumb']['path']:$img_properties['original']['path'];
			return base_url().$imagefolder.$file_name;
		else:
			return 'UPLODEERROR';
		endif;
	}
	
	function _create_resized_image($fileName,$img_properties) {
			
			$CI =& get_instance();
			$CI->load->library('image_lib');
			
			$config['image_library'] 				= 	'gd2';
			$config['source_image'] 				= 	$img_properties['source_path'].$fileName;       
			$config['create_thumb'] 				= 	TRUE;
			$config['maintain_ratio'] 				= 	TRUE;
			$config['width'] 						= 	$img_properties['max_width'];
			$config['height'] 						= 	$img_properties['max_height'];
			$config['new_image'] 					= 	$img_properties['path'].$fileName;
			
			$CI->image_lib->initialize($config);
			if(!$CI->image_lib->resize()):
				echo $CI->image_lib->display_errors();
			endif;
	}
	
	function _delete_image($imagename='')
	{  
		if(!strpos($imagename,'logo.png') && !strpos($imagename,'com-soon.jpg')):
			$thumbpath		=	str_replace(base_url(),FCPATH,$imagename);
			$originalpath	=	str_replace('thumb/','',$thumbpath);
			$perfectpath	=	str_replace('thumb/','perfect/',$thumbpath);
			$mediumpath		=	str_replace('thumb/','medium/',$thumbpath);
			if(file_exists($originalpath)):
				@unlink($originalpath);
			endif;
			if(file_exists($perfectpath)):
				@unlink($perfectpath);
			endif;
			if(file_exists($mediumpath)):
				@unlink($mediumpath);
			endif;
			if(file_exists($thumbpath)):
				@unlink($thumbpath);
			endif;
		endif;
	}
	
	function _get_image_path_by_referance_and_id($type='',$subfolder='')
	{	
		$data	=	'';
		switch($type):
			case 'sitelogo':
				$data['original']	= array("path"=>"./assets/sitelogo/","allowed_types"=>"gif|jpg|png","max_size"=>"20000","max_width"=>"","max_height"=>"" ,"thumb"=>TRUE);//Original
				$data['thumb']		= array("path"=>"./assets/sitelogo/thumb/","allowed_types"=>"gif|jpg|png","source_path"=>"./assets/sitelogo/","max_width"=>"100","max_height"=>"100");//Thumb
				$this->_check_directory($data['thumb']['path']);
			break;
                   
                    
                    
                      case 'slider':
				$data['original']	= array("path"=>"./assets/slider/","allowed_types"=>"gif|jpg|png","max_size"=>"20000","max_width"=>"","max_height"=>"" ,"thumb"=>TRUE);//Original
				$data['thumb']		= array("path"=>"./assets/slider/thumb/","allowed_types"=>"gif|jpg|png","source_path"=>"./assets/slider/","max_width"=>"100","max_height"=>"100");//Thumb
				$this->_check_directory($data['thumb']['path']);
			break;
                    
                    case 'banner':
				$data['original']	= array("path"=>"./assets/banner/","allowed_types"=>"gif|jpg|png","max_size"=>"20000","max_width"=>"","max_height"=>"" ,"thumb"=>TRUE);//Original
				$data['thumb']		= array("path"=>"./assets/banner/thumb/","allowed_types"=>"gif|jpg|png","source_path"=>"./assets/banner/","max_width"=>"100","max_height"=>"100");//Thumb
				$this->_check_directory($data['thumb']['path']);
			break;
                    
                     case 'partners':
				$data['original']	= array("path"=>"./assets/partners/","allowed_types"=>"gif|jpg|png","max_size"=>"20000","max_width"=>"","max_height"=>"" ,"thumb"=>TRUE);//Original
				$data['thumb']		= array("path"=>"./assets/partners/thumb/","allowed_types"=>"gif|jpg|png","source_path"=>"./assets/partners/","max_width"=>"100","max_height"=>"100");//Thumb
				$this->_check_directory($data['thumb']['path']);
			break;
                     case 'about':
				$data['original']	= array("path"=>"./assets/about/","allowed_types"=>"gif|jpg|png","max_size"=>"20000","max_width"=>"","max_height"=>"" ,"thumb"=>TRUE);//Original
				$data['thumb']		= array("path"=>"./assets/about/thumb/","allowed_types"=>"gif|jpg|png","source_path"=>"./assets/about/","max_width"=>"100","max_height"=>"100");//Thumb
				$this->_check_directory($data['thumb']['path']);
			break;
                    case 'testimonial':
				$data['original']	= array("path"=>"./assets/testimonial/","allowed_types"=>"gif|jpg|png","max_size"=>"20000","max_width"=>"","max_height"=>"" ,"thumb"=>TRUE);//Original
				$data['thumb']		= array("path"=>"./assets/testimonial/thumb/","allowed_types"=>"gif|jpg|png","source_path"=>"./assets/testimonial/","max_width"=>"100","max_height"=>"100");//Thumb
				$this->_check_directory($data['thumb']['path']);
			break;
                     case 'home_about':
				$data['original']	= array("path"=>"./assets/home_about/","allowed_types"=>"gif|jpg|png","max_size"=>"20000","max_width"=>"","max_height"=>"" ,"thumb"=>TRUE);//Original
				$data['thumb']		= array("path"=>"./assets/home_about/thumb/","allowed_types"=>"gif|jpg|png","source_path"=>"./assets/home_about/","max_width"=>"100","max_height"=>"100");//Thumb
				$this->_check_directory($data['thumb']['path']);
			break;
                    
                      case 'services':
				$data['original']	= array("path"=>"./assets/services/","allowed_types"=>"gif|jpg|png","max_size"=>"20000","max_width"=>"","max_height"=>"" ,"thumb"=>TRUE);//Original
				$data['thumb']		= array("path"=>"./assets/services/thumb/","allowed_types"=>"gif|jpg|png","source_path"=>"./assets/services/","max_width"=>"100","max_height"=>"100");//Thumb
				$this->_check_directory($data['thumb']['path']);
			break;
                    case 'consulting':
				$data['original']	= array("path"=>"./assets/consulting/","allowed_types"=>"gif|jpg|png","max_size"=>"20000","max_width"=>"","max_height"=>"" ,"thumb"=>TRUE);//Original
				$data['thumb']		= array("path"=>"./assets/consulting/thumb/","allowed_types"=>"gif|jpg|png","source_path"=>"./assets/consulting/","max_width"=>"100","max_height"=>"100");//Thumb
				$this->_check_directory($data['thumb']['path']);
			break;
                    
                      case 'products':
				$data['original']	= array("path"=>"./assets/products/","allowed_types"=>"gif|jpg|png","max_size"=>"20000","max_width"=>"","max_height"=>"" ,"thumb"=>TRUE);//Original
				$data['thumb']		= array("path"=>"./assets/products/thumb/","allowed_types"=>"gif|jpg|png","source_path"=>"./assets/products/","max_width"=>"100","max_height"=>"100");//Thumb
				$this->_check_directory($data['thumb']['path']);
			break;
			
		endswitch;
		return $data;
	}
	
	function _check_directory($path='')
	{
		$patharray	=	explode('/',$path);
		$dirpath	=	"./assets";
		for($i=2; $i < count($patharray); $i++):
			$dirpath	=	$dirpath.'/'.$patharray[$i];
			if (!file_exists(FCPATH.$dirpath)):
				@mkdir(FCPATH.$dirpath, 0777, true);
			endif;
		endfor;
		return true;
	}
}