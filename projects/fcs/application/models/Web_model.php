<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Web_model extends CI_Model {

    public
            function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /*     * *********************************************************************
     * * Function name: get_general_data
     * * Developed By: Manoj Kumar
     * * Purpose: This function used for get general data
     * * Date: 22 DECEMBER 2016
     * ********************************************************************** */

    function get_general_data(&$data = array()) {
        $data['page_seo']     = $this->web_model->get_page_seo();
        $data['header_menu']  = $this->web_model->get_header_menu();
        $data['page_heading'] = $this->web_model->get_page_heading($data['page_seo']['id']);

        $data['general_data'] = $this->web_model->get_general_datas();
        return true;
    }

    /*     * *********************************************************************
     * * Function name: get_page_seo
     * * Developed By: Manoj Kumar
     * * Purpose: This function used for get seo data
     * * Date: 22 DECEMBER 2016
     * ********************************************************************** */

    function get_page_seo() {
        if (uri_string()): $cururl = uri_string();
        else: $cururl = '';
        endif;

        $this->db->select('id,title,keyword,description');
        $this->db->from('inner_page');
        $this->db->where('slug', $cururl);
        $this->db->where("status  = 'Y'");
        $query = $this->db->get();
        if ($query->num_rows() > 0):
            return $query->row_array();
        else:
            return false;
        endif;
    }

    /*     * *********************************************************************
     * * Function name: get_header_menu
     * * Developed By: Manoj Kumar
     * * Purpose: This function used for header menu
     * * Date: 22 DECEMBER 2016
     * ********************************************************************** */

    public
            function get_header_menu() {
        $this->db->select('id,name,slug');
        $this->db->from('inner_page');
        $this->db->where("show_header = 'Y'");
        $this->db->where("status = 'Y'");
        $query = $this->db->get();
        if ($query->num_rows() > 0):
            return $query->result_array();
        else:
            return false;
        endif;
    }

    /*     * *********************************************************************
     * * Function name: get_page_heading
     * * Developed By: Manoj Kumar
     * * Purpose: This function used for get page heading
     * * Date: 22 DECEMBER 2016
     * ********************************************************************** */

    function get_page_heading($pageid = '') {
        $this->db->select('heading');
        $this->db->from('page_heading');
        $this->db->where('page_id', $pageid);
        $this->db->where("status  = 'Y'");
        $query = $this->db->get();
        if ($query->num_rows() > 0):
            return $query->result_array();
        else:
            return false;
        endif;
    }

    /*     * *********************************************************************
     * * Function name: get_general_datas
     * * Developed By: Manoj Kumar
     * * Purpose: This function used for get general datas
     * * Date: 22 DECEMBER 2016
     * ********************************************************************** */

    function get_general_datas() {
        $dataarray = array();
        $this->db->select('content, type');
        $this->db->from('general_data');
        $this->db->where("status  = 'Y'");
        $query     = $this->db->get();
        if ($query->num_rows() > 0):
            $data = $query->result_array();
            foreach ($data as $info):
                $dataarray[$info['type']] = $this->replace_p_tags(stripslashes($info['content']));
            endforeach;
        endif;
        return $dataarray;
    }

    /*     * *********************************************************************
     * * Function name: get_slider
     * * Developed By: yogesh dixit
     * * Purpose: This function used for get home page slider
     * * Date: 24 DECEMBER 2016
     * ********************************************************************** */

    function get_slider() {
        $this->db->select('title,image');
        $this->db->from('slider');
        $this->db->where("status  = 'Y'");
        $this->db->order_by("orders ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0):
            return $query->result_array();
        else:
            return false;
        endif;
    }

    /*     * *********************************************************************
     * * Function name: get_home_about_content
     * * Developed By: Manoj Kumar
     * * Purpose: This function used for get about us
     * * Date: 23 DECEMBER 2016
     * ********************************************************************** */

    function get_home_about_content() {
        $this->db->select("content,image");
        $this->db->from('home_about');
        $this->db->where("status  = 'Y'");
        $query = $this->db->get();
        if ($query->num_rows() > 0):
            return $query->row_array();
        else:
            return false;
        endif;
    }

    /*     * *********************************************************************
     * * Function name: get_services content
     * * Developed By: yogesh dixit
     * * Purpose: This function used for get service
     * * Date: 24 DECEMBER 2016
     * ********************************************************************** */

    function get_home_services_content() {
        $this->db->select('name,home_page_content,image');
        $this->db->from('services');
        $this->db->where("status  = 'Y'");

        $this->db->order_by("id ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0):
            return $query->result_array();
        else:
            return false;
        endif;
    }

    /*     * *********************************************************************
     * * Function name: get_services content
     * * Developed By: yogesh dixit
     * * Purpose: This function used for get service
     * * Date: 24 DECEMBER 2016
     * ********************************************************************** */

    function get_home_product_content() {
        $this->db->select('name,content,image');
        $this->db->from('products');
        $this->db->where("status  = 'Y'");

        $this->db->order_by("id ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0):
            return $query->result_array();
        else:
            return false;
        endif;
    }

    /*     * *********************************************************************
     * * Function name: get_testimonial
     * * Developed By: Manoj Kumar
     * * Purpose: This function used for get testimonial
     * * Date: 22 DECEMBER 2016
     * ********************************************************************** */

    function get_testimonial() {
        $this->db->select('name,designation,content,image');
        $this->db->from('testimonial');
        $this->db->where("status  = 'Y'");
        $query = $this->db->get();
        if ($query->num_rows() > 0):
            return $query->result_array();
        else:
            return false;
        endif;
    }

    /*     * *********************************************************************
     * * Function name: get_testimonial
     * * Developed By: Manoj Kumar
     * * Purpose: This function used for get testimonial
     * * Date: 22 DECEMBER 2016
     * ********************************************************************** */

    function get_home_page_partner() {
        $this->db->select('image');
        $this->db->from('partners');
        $this->db->where("show_on  !='partner' ");
        $this->db->where("status  = 'Y'");

        $query = $this->db->get();

        if ($query->num_rows() > 0):
            return $query->result_array();
        else:
            return false;
        endif;
    }

    /*     * *********************************************************************
     * * Function name: get_testimonial
     * * Developed By: Manoj Kumar
     * * Purpose: This function used for get testimonial
     * * Date: 22 DECEMBER 2016
     * ********************************************************************** */

    function get_footer_company() {
        $query = "SELECT * FROM (SELECT  f.id , f.title   , f.link_type  ,  p.slug  FROM `fcs_footer`  AS f  
LEFT JOIN  `fcs_inner_page` AS p  ON    f.link = p.id    WHERE (f.link_type = 'page_id') AND (f.status = 'Y') AND (f.section = 'company')    
UNION ALL
SELECT  f.id , f.title  , f.link_type  , f.link AS slug FROM `fcs_footer` AS f
WHERE (f.link_type = 'manual') AND (f.status = 'Y') AND (f.section = 'company')     )  b
ORDER BY id ";

        $query = $this->db->query($query);

        if ($query->num_rows() > 0):
            return $query->result_array();
        else:
            return false;
        endif;
    }

    /*     * *********************************************************************
     * * Function name: get_testimonial
     * * Developed By: Manoj Kumar
     * * Purpose: This function used for get testimonial
     * * Date: 22 DECEMBER 2016
     * ********************************************************************** */

    function get_footer_services() {
        $query = "SELECT * FROM (SELECT  f.id , f.title   , f.link_type  ,  p.slug  FROM `fcs_footer`  AS f  
LEFT JOIN  `fcs_inner_page` AS p  ON    f.link = p.id    WHERE (f.link_type = 'page_id') AND (f.status = 'Y') AND (f.section = 'services')    
UNION ALL
SELECT  f.id , f.title  , f.link_type  , f.link AS slug FROM `fcs_footer` AS f
WHERE (f.link_type = 'manual') AND (f.status = 'Y') AND (f.section = 'services')     )  b
ORDER BY id ";

        $query = $this->db->query($query);

        if ($query->num_rows() > 0):
            return $query->result_array();
        else:
            return false;
        endif;
    }
    
    
     /*     * *********************************************************************
     * * Function name: get_testimonial
     * * Developed By: Manoj Kumar
     * * Purpose: This function used for get testimonial
     * * Date: 22 DECEMBER 2016
     * ********************************************************************** */

    function get_banner() {
        if (uri_string()): $cururl = uri_string();
        else: $cururl = '';
        endif;
        
        
        $query = "SELECT   b.title , b.image , p.slug 
FROM fcs_banner   AS b   
LEFT JOIN  `fcs_inner_page`  AS p   
ON   p.id = b.page_id 
WHERE (p.slug='".$cururl."') AND  (b.status='Y')  ";

        $query = $this->db->query($query);

        if ($query->num_rows() > 0):
          return $query->row_array();
        else:
            return false;
        endif;
    }

    
    
     /*     * *********************************************************************
     * * Function name: get_testimonial
     * * Developed By: Manoj Kumar
     * * Purpose: This function used for get testimonial
     * * Date: 22 DECEMBER 2016
     * ********************************************************************** */

    function get_client() {
        
        $query = "SELECT    NAME ,content FROM  `fcs_clients`  WHERE STATUS ='Y'";

        $query = $this->db->query($query);

        if ($query->num_rows() > 0):
          return $query->result_array();
        else:
            return false;
        endif;
    }
    
    
    /*     * *********************************************************************
     * * Function name: get_testimonial
     * * Developed By: Manoj Kumar
     * * Purpose: This function used for get testimonial
     * * Date: 22 DECEMBER 2016
     * ********************************************************************** */

    function get_service() {
        
        $query = "SELECT    NAME ,content FROM  `fcs_services`  WHERE STATUS ='Y'";

        $query = $this->db->query($query);

        if ($query->num_rows() > 0):
          return $query->result_array();
        else:
            return false;
        endif;
    }
    
    
    /*     * *********************************************************************
     * * Function name: get_testimonial
     * * Developed By: Manoj Kumar
     * * Purpose: This function used for get testimonial
     * * Date: 22 DECEMBER 2016
     * ********************************************************************** */

    function get_consulting() {
        
        $query = "SELECT c.name , c.content  FROM `fcs_consulting` AS c WHERE STATUS='Y';";

        $query = $this->db->query($query);

        if ($query->num_rows() > 0):
          return $query->result_array();
        else:
            return false;
        endif;
    }
    
    /*     * *********************************************************************
     * * Function name: get_testimonial
     * * Developed By: Manoj Kumar
     * * Purpose: This function used for get testimonial
     * * Date: 22 DECEMBER 2016
     * ********************************************************************** */

    function get_about() {
        
        $query = "SELECT image,content FROM `fcs_about` WHERE STATUS ='Y' ";

        $query = $this->db->query($query);

        if ($query->num_rows() > 0):
          return $query->result_array();
        else:
            return false;
        endif;
    }
    
    
     /*     * *********************************************************************
     * * Function name: get_partners
     * * Developed By: Manoj Kumar
     * * Purpose: This function used for get testimonial
     * * Date: 22 DECEMBER 2016
     * ********************************************************************** */

    function get_partners() {
        
        $query = "SELECT p.name,  p.content  , p.image ,p.show_on FROM `fcs_partners` AS p WHERE ( p.status ='Y') AND  (p.show_on != 'home' )  ";

        $query = $this->db->query($query);

        if ($query->num_rows() > 0):
          return $query->result_array();
        else:
            return false;
        endif;
    }
    
    
    
    /***********************************************************************
	** Function name : add_footer_contact_data
	** Developed By : Jitendra Chaudhari
	** Purpose  : This function used for add data
	** Date : 31 MAY 2017
	************************************************************************/
	public function add_footer_contact_data($params=array())
	{
		$this->db->insert('footer_contact',$params);
		return $this->db->insert_id();
	}
    
    
    
    
    
    
    
    
    
    
    
    
    
    /*     * *********************************************************************
     * * Function name: get_service_image
     * * Developed By: Manoj Kumar
     * * Purpose: This function used for get service image
     * * Date: 24 DECEMBER 2016
     * ********************************************************************** */

    function get_service_image() {
        $this->db->select('images');
        $this->db->from('services_image');
        $this->db->where("status  = 'Y'");
        $query = $this->db->get();
        if ($query->num_rows() > 0):
            return $query->row_array();
        else:
            return false;
        endif;
    }

    /*     * *********************************************************************
     * * Function name: get_aboutus_section
     * * Developed By: Manoj Kumar
     * * Purpose: This function used for get about us section data
     * * Date: 22 DECEMBER 2016
     * ********************************************************************** */

    function get_aboutus_section() {
        $this->db->select('title,content,image,show_type');
        $this->db->from('aboutus_section');
        $this->db->where("status  = 'Y'");
        $query = $this->db->get();
        if ($query->num_rows() > 0):
            return $query->result_array();
        else:
            return false;
        endif;
    }

    /*     * *********************************************************************
     * * Function name: get_our_clients
     * * Developed By: Manoj Kumar
     * * Purpose: This function used for get our clients
     * * Date: 23 DECEMBER 2016
     * ********************************************************************** */

    function get_our_clients($select = '*') {
        $this->db->select($select);
        $this->db->from('clients');
        $this->db->where("status  = 'Y'");
        $query = $this->db->get();
        if ($query->num_rows() > 0):
            return $query->result_array();
        else:
            return false;
        endif;
    }

    /*     * *********************************************************************
     * * Function name: get_client_content
     * * Developed By: Manoj Kumar
     * * Purpose: This function used for get about us
     * * Date: 23 DECEMBER 2016
     * ********************************************************************** */

    function get_client_content() {
        $this->db->select("upper_content,lower_content");
        $this->db->from('client_content');
        $this->db->where("status  = 'Y'");
        $query = $this->db->get();
        if ($query->num_rows() > 0):
            return $query->result_array();
        else:
            return false;
        endif;
    }

    /*     * *********************************************************************
     * * Function name: get_about_us
     * * Developed By: Manoj Kumar
     * * Purpose: This function used for get about us
     * * Date: 23 DECEMBER 2016
     * ********************************************************************** */

    function get_about_us() {
        $this->db->select("left_content,right_content");
        $this->db->from('aboutus_content');
        $this->db->where("status  = 'Y'");
        $query = $this->db->get();
        if ($query->num_rows() > 0):
            return $query->result_array();
        else:
            return false;
        endif;
    }

    /*     * *********************************************************************
     * * Function name: get_home_portfolio_image
     * * Developed By: yogesh dixit
     * * Purpose: This function used for get home page pportfolio images
     * * Date: 24 DECEMBER 2016
     * ********************************************************************** */

    function get_home_portfolio_image() {
        $this->db->select('image');
        $this->db->from('home_page_portfolio');
        $this->db->where("status  = 'Y'");
        $this->db->order_by("orders ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0):
            return $query->result_array();
        else:
            return false;
        endif;
    }

    /*     * *********************************************************************
     * * Function name: get_testimonial_content
     * * Developed By: Manoj Kumar
     * * Purpose: This function used for get testimonial content
     * * Date: 23 DECEMBER 2016
     * ********************************************************************** */

    function get_testimonial_content() {
        $this->db->select('left_content,right_content');
        $this->db->from('testimonial_content');
        $this->db->where("status  = 'Y'");
        $query = $this->db->get();
        if ($query->num_rows() > 0):
            return $query->row_array();
        else:
            return false;
        endif;
    }

    /*     * *********************************************************************
     * * Function name: get_portfolio_category
     * * Developed By: Manoj Kumar
     * * Purpose: This function used for get portfolio category
     * * Date: 23 DECEMBER 2016
     * ********************************************************************** */

    function get_services_category() {
        $this->db->select('id,name,images');
        $this->db->from('services_category');
        $this->db->where("status  = 'Y'");
        $query = $this->db->get();
        if ($query->num_rows() > 0):
            return $query->result_array();
        else:
            return false;
        endif;
    }

    /*     * *********************************************************************
     * * Function name: get_portfolio_content
     * * Developed By: Manoj Kumar
     * * Purpose: This function used for get portfolio content
     * * Date: 23 DECEMBER 2016
     * ********************************************************************** */

    function get_portfolio_content() {
        $this->db->select('contents');
        $this->db->from('portfolio_content');
        $this->db->where("status  = 'Y'");
        $query = $this->db->get();
        if ($query->num_rows() > 0):
            return $query->row_array();
        else:
            return false;
        endif;
    }

    /*     * *********************************************************************
     * * Function name: get_portfolio_category
     * * Developed By: Manoj Kumar
     * * Purpose: This function used for get portfolio category
     * * Date: 23 DECEMBER 2016
     * ********************************************************************** */

    function get_portfolio_category() {
        $this->db->select('name,images');
        $this->db->from('portfolio_category');
        $this->db->where("status  = 'Y'");
        $query = $this->db->get();
        if ($query->num_rows() > 0):
            return $query->result_array();
        else:
            return false;
        endif;
    }

    /*     * *********************************************************************
     * * Function name: get_portfolio
     * * Developed By: Manoj Kumar
     * * Purpose: This function used for get portfolio
     * * Date: 23 DECEMBER 2016
     * ********************************************************************** */

    function get_portfolio() {
        $this->db->select('id,category_id,name,image,description');
        $this->db->from('portfolio');
        $this->db->where("status  = 'Y'");
        $query = $this->db->get();
        if ($query->num_rows() > 0):
            return $query->result_array();
        else:
            return false;
        endif;
    }

    /*     * *********************************************************************
     * * Function name: get_portfolio_image
     * * Developed By: Manoj Kumar
     * * Purpose: This function used for get portfolio
     * * Date: 23 DECEMBER 2016
     * ********************************************************************** */

    function get_portfolio_image($id = '') {
        $this->db->select('*');
        $this->db->from('portfolio_details');
        $this->db->where("status  = 'Y'");
        $this->db->where("portfolio_id", $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0):
            return $query->result_array();
        else:
            return false;
        endif;
    }

    /*     * *********************************************************************
     * * Function name: get_portfolio_details
     * * Developed By: Manoj Kumar
     * * Purpose: This function used for get portfolio details
     * * Date: 23 DECEMBER 2016
     * ********************************************************************** */

    function get_portfolio_details($siteslug = '') {
        $this->db->select('*');
        $this->db->from('portfolio');
        $this->db->where("slug", $siteslug);
        $this->db->where("status  = 'Y'");
        $query = $this->db->get();
        if ($query->num_rows() > 0):
            return $query->row_array();
        else:
            return false;
        endif;
    }

    /*     * *********************************************************************
     * * Function name: get_casestudy
     * * Developed By: yogesh dixit
     * * Purpose: This function used for get portfolio category
     * * Date: 23 DECEMBER 2016
     * ********************************************************************** */

    function get_casestudy() {
        $this->db->select('*');
        $this->db->from('casestudy');
        $this->db->where("status  = 'Y'");
        $query = $this->db->get();
        if ($query->num_rows() > 0):
            return $query->result_array();
        else:
            return false;
        endif;
    }

    /*     * *********************************************************************
     * * Function name: get_product_detail
     * * Developed By: yogesh dixit
     * * Purpose: This function used for get product
     * * Date: 23 DECEMBER 2016
     * ********************************************************************** */

    function get_casestudysection_details() {
        $this->db->select('*');
        $this->db->from('casestudy_details');
        $this->db->where("status  = 'Y'");
        $query = $this->db->get();
        if ($query->num_rows() > 0):
            return $query->result_array();
        else:
            return false;
        endif;
    }

    /*     * *********************************************************************
     * * Function name: get_product
     * * Developed By: Manoj Kumar
     * * Purpose: This function used for get product
     * * Date: 23 DECEMBER 2016
     * ********************************************************************** */

    function get_product() {
        $this->db->select('id,product,subheading,image,content');
        $this->db->from('product');
        $this->db->where("status  = 'Y'");
        $query = $this->db->get();
        if ($query->num_rows() > 0):
            return $query->result_array();
        else:
            return false;
        endif;
    }

    /*     * *********************************************************************
     * * Function name: get_product_detail
     * * Developed By: yogesh dixit
     * * Purpose: This function used for get product
     * * Date: 23 DECEMBER 2016
     * ********************************************************************** */

    function get_product_details() {
        $this->db->select('id,product_id,heading,content');
        $this->db->from('product_details');
        $this->db->where("status  = 'Y'");
        $query = $this->db->get();
        if ($query->num_rows() > 0):
            return $query->result_array();
        else:
            return false;
        endif;
    }

    /*     * *********************************************************************
     * * Function name: get_contact_us
     * * Developed By: Manoj Kumar
     * * Purpose: This function used for get contact us
     * * Date: 23 DECEMBER 2016
     * ********************************************************************** */

    function get_contact_us() {
        $this->db->select('*');
        $this->db->from('contactus_content');
        $this->db->where("status  = 'Y'");
        $query = $this->db->get();
        if ($query->num_rows() > 0):
            return $query->row_array();
        else:
            return false;
        endif;
    }

    /*     * *********************************************************************
     * * Function name: get_contact_us
     * * Developed By: Manoj Kumar
     * * Purpose: This function used for get contact us Details
     * * Date: 23 DECEMBER 2016
     * ********************************************************************** */

    function get_contact_us_Details() {
        $this->db->select('id,contents,image');
        $this->db->from('contactus_details');
        $this->db->where("status  = 'Y'");
        $query = $this->db->get();
        if ($query->num_rows() > 0):
            return $query->result_array();
        else:
            return false;
        endif;
    }

    /*     * *********************************************************************
     * * Function name : add_data
     * * Developed By : Manoj Kumar
     * * Purpose  : This function used for add data
     * * Date : 26 DECEMBER 2016
     * ********************************************************************** */

    public
            function add_data($tablename = '', $params = array()) {
        $this->db->insert($tablename, $params);
        return $this->db->insert_id();
    }

    /*     * *********************************************************************
     * * Function name: substrign
     * * Developed By: Manoj Kumar
     * * Purpose: This function used for substring
     * * Date: 20 SEPTEMBER 2016
     * ********************************************************************** */

    public
            function SubString($str, $length, $minword = 3) {
        $str = preg_replace("/<img[^>]+\>/i", '', $str);
        $str = $this->strip_html_tags($str);
        if (strlen($str) > $length)
            $len = '...';
        return substr($str, 0, $length) . $len;
    }

    public
            function strip_html_tags($text) {
        $text = preg_replace(
                array(
            // Remove invisible content
            '@<head[^>]*?>.*?</head>@siu',
            '@<style[^>]*?>.*?</style>@siu',
            '@<script[^>]*?.*?</script>@siu',
            '@<object[^>]*?.*?</object>@siu',
            '@<embed[^>]*?.*?</embed>@siu',
            '@<applet[^>]*?.*?</applet>@siu',
            '@<noframes[^>]*?.*?</noframes>@siu',
            '@<noscript[^>]*?.*?</noscript>@siu',
            '@<noembed[^>]*?.*?</noembed>@siu',
            // Add line breaks before and after blocks
            '@</?((address)|(blockquote)|(center)|(del))@iu',
            '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
            '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
            '@</?((table)|(th)|(td)|(caption))@iu',
            '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
            '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
            '@</?((frameset)|(frame)|(iframe))@iu',
                ), array(
            ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
            "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
            "\n\$0", "\n\$0",
                ), $text);
        return strip_tags($text);
    }

    public
            function replace_p_tags($text = '') {
        $prearray = array('<p>', '</p>');
        $posarray = array('', '');
        return str_replace($prearray, $posarray, $text);
    }

    /*     * *********************************************************************
     * * Function name: get_portfolio_page_slug
     * * Developed By: Manoj Kumar
     * * Purpose: This function used for get portfolio page slug
     * * Date: 22 DECEMBER 2016
     * ********************************************************************** */

    public
            function get_page_slug($pageid = '') {
        $this->db->select('slug');
        $this->db->from('inner_page');
        $this->db->where("id", $pageid);
        $this->db->where("status = 'Y'");
        $query = $this->db->get();
        if ($query->num_rows() > 0):
            return $query->row_array();
        else:
            return false;
        endif;
    }

}

?>