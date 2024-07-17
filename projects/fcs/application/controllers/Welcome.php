<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public
            function __construct() {
        parent:: __construct();
        $this->load->helper(array('form', 'url', 'html', 'path', 'form', 'cookie'));
        $this->load->library(array('email', 'session', 'form_validation', 'pagination', 'parser', 'encrypt'));
        error_reporting(E_ALL ^ E_NOTICE);
        $this->load->library("layouts");
        $this->load->model(array('front_model', 'web_model', 'emailtemplate_model'));
        $this->load->helper('language');
        $this->lang->load('statictext', 'front');
    }

    /*     * *********************************************************************
     * * Function name: index
     * * Developed By: Jitendra Chaudhari
     * * Purpose: This function used for Home page
     * * Date: 30 MAY 2017
     * ********************************************************************** */

    public function index() {

        $data['error']           = '';
        $this->web_model->get_general_data($data);
        $data['slider']          = $this->web_model->get_slider();
        $data['home_about']      = $this->web_model->get_home_about_content();
        $data['partner']         = $this->web_model->get_home_page_partner();
        $data['home_service']    = $this->web_model->get_home_services_content();
        $data['home_product']    = $this->web_model->get_home_product_content();
        $data['testimonial']     = $this->web_model->get_testimonial();
        $data['footer_company']  = $this->web_model->get_footer_company();
        $data['footer_services'] = $this->web_model->get_footer_services();
        
        
       
        $this->layouts->set_title($data['page_seo']['title']);
        $this->layouts->set_description($data['page_seo']['description']);
        $this->layouts->set_keyword($data['page_seo']['keyword']);
        $this->layouts->front_view('welcome/index', array(), $data);
    }

    /*     * *********************************************************************
     * * Function name: clients
     * * Developed By: Jitendra Chaudhari
     * * Purpose: This function used for Home page
     * * Date: 30 MAY 2017
     * ********************************************************************** */

    public function clients() {
        $data['error'] = '';

        $this->web_model->get_general_data($data);
        $data['banner']          = $this->web_model->get_banner();
        $data['client']          = $this->web_model->get_client();
        $data['footer_company']  = $this->web_model->get_footer_company();
        $data['footer_services'] = $this->web_model->get_footer_services();
        $this->layouts->set_title($data['page_seo']['title']);
        $this->layouts->set_description($data['page_seo']['description']);
        $this->layouts->set_keyword($data['page_seo']['keyword']);
        $this->layouts->front_view('welcome/clients', array(), $data);
    }
    
      /*     * *********************************************************************
     * * Function name: clients
     * * Developed By: Jitendra Chaudhari
     * * Purpose: This function used for Home page
     * * Date: 30 MAY 2017
     * ********************************************************************** */
     public function services() {
        $data['error'] = '';

        $this->web_model->get_general_data($data);
        $data['banner']          = $this->web_model->get_banner();
        $data['client']          = $this->web_model->get_client();
         $data['service']          = $this->web_model->get_service();
        $data['footer_company']  = $this->web_model->get_footer_company();
        $data['footer_services'] = $this->web_model->get_footer_services();
        $this->layouts->set_title($data['page_seo']['title']);
        $this->layouts->set_description($data['page_seo']['description']);
        $this->layouts->set_keyword($data['page_seo']['keyword']);
        $this->layouts->front_view('welcome/service', array(), $data);
    }
    
     /*     * *********************************************************************
     * * Function name: clients
     * * Developed By: Jitendra Chaudhari
     * * Purpose: This function used for Home page
     * * Date: 30 MAY 2017
     * ********************************************************************** */
     public function consulting() {
        $data['error'] = '';

        $this->web_model->get_general_data($data);
        $data['banner']          = $this->web_model->get_banner();
        $data['client']          = $this->web_model->get_client();
         $data['consulting']          = $this->web_model->get_consulting();
        $data['footer_company']  = $this->web_model->get_footer_company();
        $data['footer_services'] = $this->web_model->get_footer_services();
        $this->layouts->set_title($data['page_seo']['title']);
        $this->layouts->set_description($data['page_seo']['description']);
        $this->layouts->set_keyword($data['page_seo']['keyword']);
        $this->layouts->front_view('welcome/consulting', array(), $data);
    }
    
    /*     * *********************************************************************
     * * Function name: about_us
     * * Developed By: Jitendra Chaudhari
     * * Purpose: This function used for Home page
     * * Date: 30 MAY 2017
     * ********************************************************************** */
     public function about_us() {

        $data['error'] = '';

        $this->web_model->get_general_data($data);
        $data['banner']          = $this->web_model->get_banner();
        $data['about']          = $this->web_model->get_about();
        
        $data['footer_company']  = $this->web_model->get_footer_company();
        $data['footer_services'] = $this->web_model->get_footer_services();
        $this->layouts->set_title($data['page_seo']['title']);
        $this->layouts->set_description($data['page_seo']['description']);
        $this->layouts->set_keyword($data['page_seo']['keyword']);
        $this->layouts->front_view('welcome/about', array(), $data);
    }
    
    
    /*     * *********************************************************************
     * * Function name: partners
     * * Developed By: Jitendra Chaudhari
     * * Purpose: This function used for Home page
     * * Date: 30 MAY 2017
     * ********************************************************************** */
     public function partners() {
        $data['error'] = '';

        $this->web_model->get_general_data($data);
        $data['banner']          = $this->web_model->get_banner();
        $data['partner']          = $this->web_model->get_partners();
        
        $data['footer_company']  = $this->web_model->get_footer_company();
        $data['footer_services'] = $this->web_model->get_footer_services();
        $this->layouts->set_title($data['page_seo']['title']);
        $this->layouts->set_description($data['page_seo']['description']);
        $this->layouts->set_keyword($data['page_seo']['keyword']);
        $this->layouts->front_view('welcome/partners', array(), $data);
    }
    
    /*     * *********************************************************************
     * * Function name: partners
     * * Developed By: Jitendra Chaudhari
     * * Purpose: This function used for Home page
     * * Date: 30 MAY 2017
     * ********************************************************************** */
     public function fcontact() {
        $data['error'] = '';
 if($this->input->post('SaveChanges')):
        $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
		
			
			$this->form_validation->set_rules('email', 'email', 'trim|required');
			
			$this->form_validation->set_rules('message', 'message', 'trim');
			
			if($this->form_validation->run()):	
				
				$param['fname']				= 	addslashes($this->input->post('fname'));
				$param['email']				= 	addslashes($this->input->post('email'));
				$param['message']			= 	addslashes($this->input->post('message'));
				$param['status']			=	'Y';
				$param['created_date']		=	$this->front_model->get_current_date_time();
				$this->web_model->add_footer_contact_data($param);
				//$this->emailtemplate_model->contactus_mail_to_admin($param);
				//$this->emailtemplate_model->contactus_mail_to_customer($param);
				
			endif;
                        
                         die;
       endif ;
}   
     /*     * *********************************************************************
     * * Function name: contact
     * * Developed By: Jitendra Chaudhari
     * * Purpose: This function used for Home page
     * * Date: 30 MAY 2017
     * ********************************************************************** */
 public function contact_us() {

        $data['error'] = '';
        
        $this->web_model->get_general_data($data);
        $data['banner']          = $this->web_model->get_banner();
       
        $data['footer_company']  = $this->web_model->get_footer_company();
        $data['footer_services'] = $this->web_model->get_footer_services();
 if($this->input->post('SaveChanges')):
        $this->form_validation->set_rules('fname', 'Name', 'trim|required');
		
			
			$this->form_validation->set_rules('email', 'email', 'trim|required');
			
			$this->form_validation->set_rules('message', 'message', 'trim|required');
			
			if($this->form_validation->run()):	
				
				$param['fname']				= 	addslashes($this->input->post('fname'));
				$param['email']				= 	addslashes($this->input->post('email'));
				$param['message']			= 	addslashes($this->input->post('message'));
				$param['status']			=	'Y';
				$param['created_date']		=	$this->front_model->get_current_date_time();
				$this->web_model->add_footer_contact_data($param);
				//$this->emailtemplate_model->contactus_mail_to_admin($param);
				//$this->emailtemplate_model->contactus_mail_to_customer($param);
				
			endif;
                        
                       
       endif ;
        $this->layouts->set_title($data['page_seo']['title']);
        $this->layouts->set_description($data['page_seo']['description']);
        $this->layouts->set_keyword($data['page_seo']['keyword']);
        $this->layouts->front_view('welcome/contact', array(), $data);
}   
    
    
    

}
