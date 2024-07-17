    <?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    /*
    | -------------------------------------------------------------------------
    | URI ROUTING
    | -------------------------------------------------------------------------
    | This file lets you re-map URI requests to specific controller functions.
    |
    | Typically there is a one-to-one relationship between a URL string
    | and its corresponding controller class/method. The segments in a
    | URL normally follow this pattern:
    |
    |	example.com/class/method/id/
    |
    | In some instances, however, you may want to remap this relationship
    | so that a different class/function is called than the one
    | corresponding to the URL.
    |
    | Please see the user guide for complete details:
    |
    |	http://codeigniter.com/user_guide/general/routing.html
    |
    | -------------------------------------------------------------------------
    | RESERVED ROUTES
    | -------------------------------------------------------------------------
    |
    | There area two reserved routes:
    |
    |	$route['default_controller'] = 'welcome';
    |
    | This route indicates which controller class should be loaded if the
    | URI contains no data. In the above example, the "welcome" class
    | would be loaded. 
    |
    |	$route['404_override'] = 'errors/page_missing';
    |
    | This route will tell the Router what URI segments to use if those provided
    | in the URL cannot be matched to a valid route.
    |
    */

    //////////////				USER REGISTRATION SECTION			/////////////////
    $route['registration'] 										= 	"login/userregistration";
    $route['login'] 											= 	"login/userlogin";
    if($_SERVER['QUERY_STRING'] != '/login/captcha_refresh'):
            $route['login/(:any)'] 									= 	"login/userlogin/$1";
    endif;
    $route['logout'] 											= 	"login/logout";
    $route['forgotpassword'] 									= 	"login/forgotpassword";

    //////////////				USER PROFILE SECTION			/////////////////
    $route['my-account'] 										= 	"users/myaccount";
    $route['change-password'] 									= 	"users/changepassword";
    $route['my-order'] 											= 	"users/myorder";
    $route['view-order/(:any)'] 								= 	"users/vieworder/$1";
    $route['address-list'] 										= 	"users/addresslist";
    $route['address-book'] 										= 	"users/addressbook";
    $route['address-book/(:any)'] 								= 	"users/addressbook/$1";

    //////////////				MENU SECTION			/////////////////
    $route['menu'] 												= 	"menu/allmenu";

    //////////////				CART SECTION			/////////////////
    $route['cart'] 												= 	"cart/index";
    $route['check-out']                                         =   "cart/checkout";
    $route['email-verification']                                =   "cart/emailverification";
    $route['payumoney']                                        	=   "cart/payumoney";
    $route['success']                                        	=   "cart/success";
    $route['failure']                                        	=   "cart/failure";

    //////////////////////////    laundry API START	////////////////////
            $route['laundryapi/register']        					= "appuser/register";
            $route['laundryapi/login'] 								= "appuser/login";
            $route['laundryapi/view-account'] 				= "appuser/view_account";
            $route['laundryapi/edit-account'] 				= "appuser/edit_account";
            $route['laundryapi/sociallogin']        		= "appuser/sociallogin";

            $route['laundryapi/forgotpass']							= "appuser/forgotpass";
            $route['laundryapi/resetpass']							= "appuser/resetpass";
            $route['laundryapi/changepass']							= "appuser/changepass";

            $route['laundryapi/add-edit-address-list'] 				= "appuser/add_edit_address_list";
            $route['laundryapi/delete-address']		 				= "appuser/delete_address";
            $route['laundryapi/verify-registration']		 				= "appuser/verify_registration";
            $route['laundryapi/get-category']		 				= "appuser/get_category";
            $route['laundryapi/get-subcategory']		 				= "appuser/get_subcategory";
            $route['laundryapi/view-menu-list']					= "appuser/view_menu_list";
            $route['laundryapi/get-menu']		 				= "appuser/get_menu";
            $route['laundryapi/get-order-history']		 				= "appuser/get_order_history";
            $route['laundryapi/feedback']		 				= "appuser/feedback";
            $route['laundryapi/managecart']		 				= "appuser/managecart";
            $route['laundryapi/checkcouponcode']		 		         = "appuser/checkcouponcode";
            $route['laundryapi/checkout']		 		         = "appuser/checkout";
            $route['laundryapi/get_cart_data']		 		         = "appuser/get_cart_data";
            $route['laundryapi/order']		 		         = "appuser/order";
            $route['laundryapi/generate-social-otp']		 		         = "appuser/generate_social_otp";
             $route['laundryapi/verify-social-login']		 		         = "appuser/verify_social_login";
              
    $route['default_controller'] 								= 	"welcome/index";
    $route['siteadmin'] 										= 	"siteadmin/index";
    $route['404_override'] 										= 	'';

    //echo "<pre>"; print_r($route); die;
    /* End of file routes.php */
    /* Location: ./application/config/routes.php */