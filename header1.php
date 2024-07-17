
	•	+91-981-017-8508       
	•	
	•	
	•	
	•	
Toggle Navigation 
	•	About Us
	◦	Company
	◦	Management
	◦	Our USP
	◦	Mission & Philosphy
	◦	Careers
	•	Services
	◦	
	◦	Development
	◦	Support
	◦	Testing
	◦	Consultancy
	•	Products
	◦	baiMobile Smartcard Reader
	◦	MBX-ID
	◦	TheLawAssist.com
	◦	Cred Secure
	◦	pEye
	◦	ShareARoom
	◦	essets
	◦	CardPAY
	•	Resources
	◦	Downloads
	◦	Case Studies
	◦	Articles
	◦	Blog
	◦	Gallery
	•	Contact Us
Hello Rimus Team!
You have got a Quote Request with Email id : '.$from. '
'; $send = mail($mailto, $subject, $body, $headers); if($send) { echo '
Thank you for contacting us! RIMUS sales team will get back to you within next 24 hrs.
'; } else { echo '
We encountered an error sending your mail, please notify contactus@rimus-tech.com
'; } } function sendMailToOwner($postData) { $to = "contactus@rimus-tech.com" ; $from = $postData['email'] ; $services = $postData['service']; if ('Cyber Security' === $services) { $mobileUrl = $_POST['mobileUrl']; } $message = $postData['message']; $subject = 'Service Request to Rimus'; $headers = "From: $from\nMIME-Version: 1.0\nContent-Type: text/html; charset=utf-8\n"; $phone_consultancy = $postData['phone']; $body = ' You have got a Service Request with Details : 

Email Id: '.$from.'
Services Requested : '.$services.'
'; if (!empty($mobileUrl)){ $body .= 'URL requested: '.$mobileUrl.'
'; } $body .= 'Contact info: '.$phone_consultancy.'
Requirement : '.$message.'






'; $headers2 = "From: contactus@rimus-tech.com\nMIME-Version: 1.0\nContent-Type: text/html; charset=utf-8\n"; $subject2 = "Thank you for contacting us"; $autoreply = ' 
Thanks and Regards,
RIMUS Team
'. $to. '
Thank you for contacting us! RIMUS sales team will get back to you within next 24 hrs.

'; $send = mail($to, $subject, $body, $headers); $send2 = mail($from, $subject2, $autoreply, $headers2); if($send && $send2) { echo '
Thank you for contacting us! RIMUS sales team will get back to you within next 24 hrs.
'; } else { echo '
We encountered an error sending your mail, please notify contactus@rimus-tech.com
'; } } function requestContact($postData) { $mailto="contactus@rimus-tech.com"; $subject = "Quote request for RIMUS"; $from = $postData['email']; $headers = "From: $from\nMIME-Version: 1.0\nContent-Type: text/html; charset=utf-8\n"; $name = $postData['name']; $phone = $postData['phone']; $message = $postData['message']; $body = ' You have got a Quote Request with Details : 

Name :'.$name.'
Email Id :'.$from.'
Phone :'.$phone.'
Requirement :'.$message.'
Hello Rimus Team!





'; $send = mail($mailto, $subject, $body, $headers); if($send) { echo '
Thank you for contacting us! RIMUS sales team will get back to you within next 24 hrs.
'; } else { echo '
We encountered an error sending your mail, please notify contactus@rimus-tech.com
'; } } ?>