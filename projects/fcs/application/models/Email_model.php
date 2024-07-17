<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Email_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct(); 
                $this->load->model(array('appuser_model'));
	}
	
	
	/***********************************************************************
	** Function name : new_registration_password_mail
	** Developed By : yogesh dixit
	** Purpose  : This function used for send new registration password mail
	** Date : 12 JULY 2017
	************************************************************************/
	function new_registration_password_mail( $password='' ,$email='',$name='')
	{    
		if($email != '' && $name != ''):
			$tomail  		= 	$email;
			$frommail  		= 	'algosoft.apps@gmail.com';
			$subject 		= 	'Welcome to FCSmills Dhamaka App';
			$sitefullurl	= 	base_url();
			$sitefullname	=	'FCSmills Dhamaka App';
			
			$mailtext		=	'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
								<html xmlns="http://www.w3.org/1999/xhtml">
								<head>
								<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
								<title>'.$sitefullname.'</title>
								</head>
								
								<body><p>Hi '.$name.',</p>
                                                                    <p>Greetings!,</p>
                                                                    <p> You are just a step away from login to FCSmills Dhamaka App </p>
								 <p>Welcome on '.$sitefullname.'.Please use  your credential to  login in app </p>
                                                                   <p>please use your registered Mobile Number as Username  .</p> 
                                                                   </br>
                                                                  <p>   Your Password: '.$password.' </p>
                                                                 
								 <p>Kind Regards,<br />
								 <a href="" target="_blank">FCSmills Dhamaka App</a></p>
								</body>
								</html>
								'; 

			//echo $mailtext; die;
			$this->email->from($frommail,$sitefullname);
			$this->email->to($tomail); 
			$this->email->subject($subject);
			$this->email->set_mailtype('html');
			$this->email->message($mailtext);	
			$this->email->send();
		
		endif;
	}
	/***********************************************************************
	** Function name : forgot_password_mail
	** Developed By : yogesh dixit
	** Purpose  : This function used for send forgot password mail
	** Date : 12 JULY 2017
	************************************************************************/
	function forgot_password_mail($password='',$email='',$name='')
	{
		if($password != '' && $email != '' && $name != ''):
			$tomail  		= 	$email;
			$frommail  		= 	'algosoft.apps@gmail.com';
			$subject 		= 	'Forgot Password';
			$sitefullurl	= 	base_url();
			$sitefullname	=	'FCSmills Dhamaka App';
                        
			
			$mailtext		=	'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
								<html xmlns="http://www.w3.org/1999/xhtml">
								<head>
								<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
								<title>'.$sitefullname.'</title>
								</head>
								
								<body><p>Hi '.$name.',</p>
								 <p>Please use '.$password.' OTP to set your new password on '.$sitefullname.'.</p>
								 <p>Kind Regards,<br />
									 <a href="" target="_blank">FCSmills Dhamaka App</a></p>
								</body>
								</html>
								'; 

			//echo $mailtext; die;
			$this->email->from($frommail,$sitefullname);
			$this->email->to($tomail); 
			$this->email->subject($subject);
			$this->email->set_mailtype('html');
			$this->email->message($mailtext);	
			$this->email->send();
		
		endif;
	}
	
	/***********************************************************************
	** Function name : reset_password_mail
	** Developed By : yogesh dixit
	** Purpose  : This function used for send reset password mail
	** Date : 12 JULY 2017
	************************************************************************/
	function reset_password_mail($password='',$email='',$name='')
	{
		if($password != '' && $email != '' && $name != ''):
			$tomail  		= 	$email;
			$frommail  		= 	'algosoft.apps@gmail.com';
			$subject 		= 	'Reset password';
			$sitefullurl	= 	base_url();
			$sitefullname	=	'FCSmills Dhamaka App';
			
			$mailtext		=	'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
								<html xmlns="http://www.w3.org/1999/xhtml">
								<head>
								<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
								<title>'.$sitefullname.'</title>
								</head>
								
								<body><p>Hi '.$name.',</p>
								 <p>Please use '.$password.' password to login on '.$sitefullname.'.</p>
								 <p>Kind Regards,<br />
								 <a href="" target="_blank">FCSmills Dhamaka App</a></p>
								</body>
								</html>
								'; 

			//echo $mailtext; die;
			$this->email->from($frommail,$sitefullname);
			$this->email->to($tomail); 
			$this->email->subject($subject);
			$this->email->set_mailtype('html');
			$this->email->message($mailtext);	
			$this->email->send();
		
		endif;
	}

	/***********************************************************************
	** Function name : change_password_mail
	** Developed By : yogesh dixit
	** Purpose  : This function used for send change password mail
	** Date : 12 JULY 2017
	************************************************************************/
	function change_password_mail($newpassword='',$email='',$name='')
	{
		if($newpassword != '' && $email != '' && $name != ''):
			$tomail  		= 	$email;
			$frommail  		= 	'algosoft.apps@gmail.com';
			$subject 		= 	'Change Password';
			$sitefullurl	= 	base_url();
			$sitefullname	=	'FCSmills Dhamaka App';
			
			$mailtext		=	'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
								<html xmlns="http://www.w3.org/1999/xhtml">
								<head>
								<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
								<title>'.$sitefullname.'</title>
								</head>
								
								<body><p>Hi '.$name.',</p>
								 <p>Your password changed successfully on '.$sitefullname.'.</p>
								 <p>Kind Regards,<br />
								 <a href="" target="_blank">FCSmills Dhamaka App</a></p>
								</body>
								</html>
								';

			//echo $MHtml; die;
			$this->email->from($frommail,$sitefullname);
			$this->email->to($tomail); 
			$this->email->subject($subject);
			$this->email->set_mailtype('html');
			$this->email->message($mailtext);	
			$this->email->send();
		
		endif;
	}
	
	
	
	
	
	/***********************************************************************
	** Function name : contact_us_for_user_mail
	** Developed By : yogesh dixit
	** Purpose  : This function used for send contact us for user mail
	** Date : 17 MAY 2017
	************************************************************************/
	function contact_us_for_user_mail($email='',$name='')
	{
		if($email != '' && $name != ''):
			$tomail  		= 	$email;
			$frommail  		= 	'algosoft.apps@gmail.com';
			$subject 		= 	'Thanks for Contact us dear '.$name;
			$sitefullurl	= 	base_url();
			$sitefullname	=	'Handyman App';
			
			$mailtext		=	'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
								<html xmlns="http://www.w3.org/1999/xhtml">
								<head>
								<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
								<title>'.$sitefullname.'</title>
								</head>
								
								<body><p>Dear '.$name.',</p>
								<p>We get your query, contact you shortly. </p>
								<p>Welcome on '.$sitefullname.'.</p>
								<p>Kind Regards,<br />
								<a href="" target="_blank">Handyman App</a></p>
								</body>
								</html>
								'; 

			//echo $mailtext; die;
			$this->email->from($frommail,$sitefullname);
			$this->email->to($tomail); 
			$this->email->subject($subject);
			$this->email->set_mailtype('html');
			$this->email->message($mailtext);	
			$this->email->send();
		
		endif;
	}
	
	/***********************************************************************
	** Function name : new_registration_password_mail
	** Developed By : yogesh dixit
	** Purpose  : This function used for send new registration password mail
	** Date : 12 JULY 2017
	************************************************************************/
	function new_customer_registration_password_mail( $password='' ,$email='',$name='')
	{    
		if($email != '' && $name != ''):
			$tomail  		= 	$email;
			$frommail  		= 	'algosoft.apps@gmail.com';
			$subject 		= 	'Welcome to FCSmills ';
			$sitefullurl	= 	base_url();
			$sitefullname	=	'FCSmills ';
			
			$mailtext		=	'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
								<html xmlns="http://www.w3.org/1999/xhtml">
								<head>
								<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
								<title>'.$sitefullname.'</title>
								</head>
								
								<body><p>Hi '.$name.',</p>
                                                                    <p>Greetings!,</p>
                                                                    <p> You are just a step away  to become FCSmills proud customer </p>
								
                                                                   <p>please share below mention    One time Password to salesman</p> 
                                                                   </br>
                                                                  <p>   Your OTP: '.$password.' </p>
                                                                 
								 <p>Kind Regards,<br />
								 <a href="" target="_blank">FCSmills Dhamaka App</a></p>
								</body>
								</html>
								'; 

			//echo $mailtext; die;
			$this->email->from($frommail,$sitefullname);
			$this->email->to($tomail); 
			$this->email->subject($subject);
			$this->email->set_mailtype('html');
			$this->email->message($mailtext);	
			$this->email->send();
		
		endif;
	}
        
        
        /***********************************************************************
	** Function name : sale_customer_mail
	** Developed By : yogesh dixit
	** Purpose  : This function used for send new registration password mail
	** Date : 12 JULY 2017
	************************************************************************/
	function sale_customer_mail( $sales_id='' ,$email='',$name='')
	{    
		if($email != '' && $name != '' && $sales_id != ''):
			$tomail  		= 	$email;
			$frommail  		= 	'algosoft.apps@gmail.com';
			$subject 		= 	'Your FCSmills Dhamaka Bill';
			$sitefullurl	= 	base_url();
			$sitefullname	=	'FCSmills Dhamaka App';
			  $detailSales = $this->appusers_model->view_product_quantity($sales_id);
                          $sales = $this->appusers_model->get_data_by_condition('sales', $sales_id, 'id');
                          $logo = $this->appusers_model->get_data_by_condition('admin','1', 'id',$param='image');
                          
			$mailtext		=	'<body style="margin:0;">
<table cellpadding="0" cellspacing="0" align="center" bgcolor="#ffffff" style="max-width:710px;min-width:320px;width:100%;font-family:Arial, Helvetica, sans-serif;border:1px solid #e0e0e0">
  <tbody>
  	  <tr>
      	<td>
        	<div style="font-size:12px;">
              <table width="100%" border="0" cellspacing="0" cellpadding="0" align="left">
                <tbody>
                  <tr> <td align="center" height="102" bgcolor="#a2c37c"><a href="#" target="_blank"><img src="'.correct_image($logo->image,'original').'" width="109" height="116"  hspace="0" vspace="0" border="0" alt="Shriyam.com" style="font:bold 20px Segoe UI,arial;color:#000000" class="CToWUd"></a></td></tr>
                </tbody>
              </table>
            </div>
        </td>
       </tr>
      <tr>
      	<td>
        	<div valign="top" style="padding:2%;">
                 <h1 style="font-size:16px;letter-spacing:1px;font-weight:100;line-height:22px;margin:0px 0px 11px;color:#1d1928">Hello,</h1>
                 <p style="font-size:12px;line-height:22px;margin:0px 0px 10px"> Thank you for Buy from<a style="color:#4b921c"> FCSmills</a> . Thanks for providing us the opportunity to sale our products to you.<br>
         
                 <p style="font-size:12px;line-height:16px;margin:0px">Following are the shopping details for your reference. Thank you again for your business.</p>
             </div>
        	<div style="padding-left:2%;padding-right:2%;font-size:12px;display: block;overflow: hidden;">
              <table width="100%" border="0" cellspacing="0" cellpadding="0" align="left">
                <tbody>
                
                  
                </tbody>
              </table>
        	</div>
         
        	
            <div style="padding-left:2%;padding-right:2%;font-size:12px;">
              <table width="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="background-color: #d8f9b2;padding: 15px;padding-bottom:0;">
                <tbody>
                  <tr>
                    <td width="13%" style="background-color: #6ab13a; color: #fff; padding: 5px 0;  text-align: center; font-size: 13px; font-weight: 100; letter-spacing: 0.5px;"></td>
                    <td width="25%" style="background-color: #6ab13a; color: #fff; padding: 5px 0;  text-align: center; font-size: 13px; font-weight: 100; letter-spacing: 0.5px;"><div style="text-align:center;">Item(s)</div></td>
                    <td width="20%" style="background-color: #6ab13a; color: #fff; padding: 5px 0;  text-align: center; font-size: 13px; font-weight: 100; letter-spacing: 0.5px;"><div style="text-align:center;">Unit Price</div></td>
                    <td width="6%" style="background-color: #6ab13a; color: #fff; padding: 5px 0;  text-align: center; font-size: 13px; font-weight: 100; letter-spacing: 0.5px;"><div style="text-align:center;"></div></td>
                    <td width="18%" style="background-color: #6ab13a; color: #fff; padding: 5px 0;  text-align: center; font-size: 13px; font-weight: 100; letter-spacing: 0.5px;"><div style="text-align:center;">Qty</div></td>
                    <td width="18%" style="background-color: #6ab13a; color: #fff; padding: 5px 0;  text-align: center; font-size: 13px; font-weight: 100; letter-spacing: 0.5px;"><div style="text-align:center;">Total Price</div></td>
                  </tr>';
                        
                  foreach($detailSales as $DS) :
                     $mailtext		.=
                
                 ' <tr>
                    <td width="15%">
                        
                    </td>
                    <td width="25%">
                        <div style="margin: 15px 5px;text-align: center;">
                            <h6 style="margin-top: 0; margin-bottom: 3px; color: #204e00; font-size: 12px; display: block; padding: 3px 0; line-height: 16px;  letter-spacing: 0.1px; text-align: left; font-weight: 400;;">'.$DS->product.'</h6>
                            

                        </div>
                    </td>
                    <td width="20%"><div style="margin: 15px 5px;text-align: center;color: #4e4e4e; font-size: 12px; display: block; line-height: 17px;letter-spacing: 0.1px;">'.$DS->price.'</div></td>
                    <td width="4%"><div style="margin: 15px 5px;text-align: center;color: #4e4e4e; font-size: 12px; display: block; line-height: 17px;letter-spacing: 0.1px;"></div></td>
                    <td width="18%"><div style="margin: 15px 5px;text-align: center;color: #4e4e4e; font-size: 12px; display: block; line-height: 17px;letter-spacing: 0.1px;">'.$DS->quantity.'</div></td>
                    <td width="18%"><div style="margin: 15px 5px;text-align: center;color: #4e4e4e; font-size: 12px; display: block; line-height: 17px;letter-spacing: 0.1px;">'.$DS->net_amount.'</div></td>
                  </tr>';
                       endforeach;     
                '</tbody>
              </table>
        </div>
        	<div style="padding:15px;overflow:hidden;padding-top:0;">
             <table width="100%" border="0" cellspacing="0" cellpadding="0" align="right" style="text-align:right;background-color: #d8f9b2;border-top:2px dashed #6ab13a;border-bottom:2px dashed #6ab13a;  padding: 15px;">
              <tbody>
                <tr>
                  <td width="80%"><div style="font-weight:bold;font-size:12px;color:#525151;">Item(s) :</div></td>
                  <td width="20%" style="text-align: right;padding: 0 2%;font-size:12px;color:#525151;"> 1 </td>
                </tr>
                <tr>
                  <td height="10"></td>
                </tr>
                <tr>
                  <td width="80%"><div style="font-weight:bold;font-size:12px;color:#525151;">Subtotal :</div></td>
                  <td width="20%" style="text-align: right;padding: 0 2%;font-size:12px;color:#525151;">Rs '.$sales->total_amount.'</td>
                </tr>
              
              
                <tr>
                  <td height="10"></td>
                </tr>
                <tr>
                  <td width="80%"><div style="font-weight:bold;font-size:12px;color:#525151;">Tax :</div></td>
                  <td width="20%" style="text-align: right;padding: 0 2%;font-size:12px;color:#525151;"> Rs.'.$sales->total_GST. '</td>
                </tr>
                
                <tr>
                  <td height="10"></td>
                </tr>
                <tr style="background-color:#6ab13a;height:30px;">
                  <td width="70%"><div style="font-weight:600;font-size:14px;color:#fff;"> Total Amount:</div></td>
                  <td width="30%" style="text-align: right;padding: 0 2%;font-size:14px;color:#fff;font-weight:200;"> Rs. 6760.36 </td>
                </tr>
              </tbody>
            </table>
          </div>
        </td>
      </tr>
      <tr>
      	<td>
        	<div style="padding-left:2%;padding-right:2%;font-size:12px;display: block;overflow: hidden;">
               <p style="font-family:Roboto,Arial;font-size:13px;padding-top:5px;padding-left:10px"></p>
                
                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                  <tbody>
                    <tr>
                      <td align="center" style="font-family:arial,Roboto;font-size:14px;padding:20px 10px 5px 10px">Connect with us</td>
                    </tr>
                    <tr>
                      <td align="center" height="60"><a href="#" target="_blank"><img src="facebook.png" width="49" height="49" border="0" hspace="0" vspace="0" class="CToWUd"></a><a href="#" target="_blank"><img src="twitter.png" width="49" height="49" border="0" hspace="0" vspace="0" class="CToWUd"></a><a href="#" target="_blank"><img src="googleplus.png" width="49" height="49" border="0" hspace="0" vspace="0" class="CToWUd"></a> <a href="#" target="_blank"><img src="pintIcon.png" width="49" height="49" border="0" hspace="0" vspace="0" class="CToWUd"></a><a href="#" target="_blank"><img src="insta.png" width="49" height="49" border="0" hspace="0" vspace="0" class="CToWUd"></a></td>
                    </tr>
                  </tbody>
                </table>
            </div>
        </td>
      </tr>
      </tr>
  </tbody>'; 

			//echo $mailtext; die;
			$this->email->from($frommail,$sitefullname);
			$this->email->to($tomail); 
			$this->email->subject($subject);
			$this->email->set_mailtype('html');
			$this->email->message($mailtext);	
			$this->email->send();
		
		endif;
	}
}	
?>