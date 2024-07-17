<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Layouts
{
	// hold CI intance
	private $CI;
	//hold layout title
	private $layout_title = NULL;
	//hold layout discription
	private $layout_description = NULL;
	
	private $head_js_list = array(), $foot_js_list = array(), $css_list = array();

	public function __construct()
	{
		$this->CI = & get_instance();
	}

	public function admin_view($view_name, $layouts=array(), $params=array(),$viewtype='')
	{	
		$this->CI->load->library('parser');
		if(is_array($layouts) && count($layouts) >=1):
			foreach($layouts as $layout_key => $layout):
				$params[$layout_key] = $this->CI->parser->parse($layout, $params, true);
			endforeach;
		endif;
		
		$params['BASE_URL']			= 	base_url();
		$params['ASSET_URL']		= 	base_url().'assets/';
		$params['ASSET_ADMIN_URL']	= 	base_url().'assets/siteadmin/';
		$params['CURRENT_CLASS']	= 	$this->CI->router->fetch_class();
		$params['CURRENT_METHOD']	= 	$this->CI->router->fetch_method();
		
		$pagedata['title'] 			= 	$this->layout_title?$this->layout_title:'Administrator';
		$pagedata['description']	= 	$this->layout_description;
		$pagedata['keyword'] 		= 	$this->keyword;
		
		if($viewtype == 'onlyview'):
			$this->CI->parser->parse($view_name, $params);
		else:
                                     
			$pagedata['head'] 		= 	$this->CI->parser->parse("layouts/siteadmin/head",$params,true);
			$pagedata['navigation'] = 	$this->CI->parser->parse("layouts/siteadmin/navigation",$params,true);
			$pagedata['menu'] 		= 	$this->CI->parser->parse("layouts/siteadmin/menu",$params,true);
			
			$params['alert_message']= 	$this->CI->parser->parse("layouts/siteadmin/alert_message",$params,true);
			
			$pagedata['layoutcontent']= 	$this->CI->parser->parse($view_name,$params,true);
			
			$pagedata['footer_js'] 	= 	$this->CI->parser->parse("layouts/siteadmin/footer_js",$params,true);
			
			$this->CI->parser->parse("layouts/siteadmin", $pagedata);
		endif;
	}
	
	public function front_view($view_name, $layouts=array(), $params=array(),$viewtype='')
	{
		$this->CI->load->library('parser');
		if(is_array($layouts) && count($layouts) >=1):
			foreach($layouts as $layout_key => $layout):
				$params[$layout_key] = $this->CI->parser->parse($layout, $params, true);
			endforeach;
		endif;
		
		$params['BASE_URL']			= 	base_url();
		$params['ASSET_URL']		= 	base_url().'assets/';
		$params['ASSET_FRONT_URL']	= 	base_url().'assets/front/';
		$params['CURRENT_CLASS']	= 	$this->CI->router->fetch_class();
		$params['CURRENT_METHOD']	= 	$this->CI->router->fetch_method();
		
		$pagedata['title'] 			= 	$this->layout_title?stripslashes($this->layout_title):'FCS';
		$pagedata['description']	= 	stripslashes($this->layout_description);
		$pagedata['keyword'] 		= 	stripslashes($this->layout_keyword);
		  
		$loginarray					=	array('login','login_guest','signup','forgot_password','signup_second','signup_thanks','howitwork','repair','repairaddress','repairinfo','payment','dashboard','contact','privacypolicy','termscondition','testimonial','faq');
		
		if($viewtype == 'onlyview'):
                  
			$this->CI->parser->parse($view_name, $params);
                
		elseif($params['CURRENT_CLASS'] == 'welcome' && $params['CURRENT_METHOD'] == 'index'): 
		 
			/*$pagedata['head'] 			= 	$this->CI->parser->parse("layouts/front/head",$params,true);
			$pagedata['layoutcontent']	= 	$this->CI->parser->parse($view_name,$params,true);
			$pagedata['footer_script'] 	= 	$this->CI->parser->parse("layouts/front/footer_script",$params,true); */
			
			$pagedata['head'] 			= 	$this->CI->parser->parse("layouts/front/head",$params,true);
			$pagedata['header'] 		= 	$this->CI->parser->parse("layouts/front/header",$params,true);
			$pagedata['layoutcontent']	= 	$this->CI->parser->parse($view_name,$params,true);
			$pagedata['footer'] 		= 	$this->CI->parser->parse("layouts/front/footer",$params,true);
			$pagedata['footer_script'] 	= 	$this->CI->parser->parse("layouts/front/footer_script",$params,true);

			$this->CI->parser->parse("layouts/front", $pagedata);
			
		elseif($params['CURRENT_CLASS'] == 'welcome' && in_array($params['CURRENT_METHOD'],$loginarray)):  
			
			$pagedata['head'] 			= 	$this->CI->parser->parse("layouts/front/head",$params,true);
			//$pagedata['header'] 		= 	$this->CI->parser->parse("layouts/front/login_header",$params,true);
			$pagedata['header'] 		= 	$this->CI->parser->parse("layouts/front/header",$params,true);
			$pagedata['layoutcontent']	= 	$this->CI->parser->parse($view_name,$params,true);
			$pagedata['footer'] 		= 	$this->CI->parser->parse("layouts/front/footer",$params,true);
			$pagedata['footer_script'] 	= 	$this->CI->parser->parse("layouts/front/footer_script",$params,true);
			
			//$this->CI->parser->parse("layouts/front_login", $pagedata);
			$this->CI->parser->parse("layouts/front", $pagedata);
		
		elseif($viewtype == 'wraperfulllwidth'): 
		
			$pagedata['head'] 			= 	$this->CI->parser->parse("layouts/front/head",$params,true);
			$pagedata['header'] 		= 	$this->CI->parser->parse("layouts/front/header",$params,true);
			
			$pagedata['layoutcontent']	= 	$this->CI->parser->parse($view_name,$params,true);
			
			$pagedata['footer'] 		= 	$this->CI->parser->parse("layouts/front/footer",$params,true);
			$pagedata['footer_script'] 	= 	$this->CI->parser->parse("layouts/front/footer_script",$params,true);
			
			$this->CI->parser->parse("layouts/front_full_width", $pagedata);
			
		else:  
		
			$pagedata['head'] 			= 	$this->CI->parser->parse("layouts/front/head",$params,true);
			$pagedata['header'] 		= 	$this->CI->parser->parse("layouts/front/header",$params,true);
			
			
			$pagedata['layoutcontent']	= 	$this->CI->parser->parse($view_name,$params,true);
			
			$pagedata['footer'] 		= 	$this->CI->parser->parse("layouts/front/footer",$params,true);
			$pagedata['footer_script'] 	= 	$this->CI->parser->parse("layouts/front/footer_script",$params,true);
			
			$this->CI->parser->parse("layouts/front", $pagedata);
			
		endif;
	}	
	
	/**
     * Set page title
     *
     * @param $title
     */
    public function set_title($title)
	{
		$this->layout_title = $title;
		return $this;
	}
	
	/**
     * Set page description
     *
     * @param $description
     */
    public function set_description($description)
	{
		$this->layout_description = $description;
		return $this;
	}
	
	/**
     * Set page keyword
     *
     * @param $keyword
     */
    public function set_keyword($keyword)
	{
		$this->layout_keyword = $keyword;
		return $this;
	}
 
    /**
     * Adds Javascript resource to current page
     * @param $item
     */
    public function set_head_js($item) {
        $this->head_js_list[] = $item;
		return $this;
    }
	
	/**
     * Adds CSS resource to current page
     * @param $item
     */
    public function set_css($item) {
        $this->css_list[] = $item;
		return $this;
    }
	
	/**
     * Adds Javascript resource to current page
     * @param $item
     */
    public function set_foot_js($item) {
        $this->foot_js_list[] = $item;
		return $this;
    }
}
