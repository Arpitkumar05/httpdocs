<?php
/**
 * FacebookService class
 *
 * @package default
 * @author William Catlin
 **/
class FacebookService {
	// private properties
	private $app_id = '1115136928623294'; // facebook app setting
	private $api_key = '1115136928623294'; // facebook app setting
	private $app_secret = '04974215081142d31f1f0ba08bfa8b51'; // facebook app setting
	private $page_access_token;
	
	public $return_auth_url = 'http://rimus-tech.com/_oauth/facebook';
	public $page_id; // page slug that you want to update
	public $user_access_token; // access token for user initiating posts
	public $user_access_code; // auth code from Facebook, used to retreive access token
	public $message;
	public $link;
	public $picture;
	
	public function __construct($page_id, $message, $link = null, $picture = null) {
		$this->page_id = $page_id;
		$this->message = $message;
		$this->link = $link;
		$this->picture = $picture;
	}
	
	/**
	 * publish function
	 *
	 * This function handles the publishing of a message
	 *
	 * @return void
	 * @author William Catlin
	 **/
	public function publish() {
		$this->get_page_access_tokens(); // set our page's access tokens
		
		// attempt facebook publishing
		if(isset($this->page_access_token))
			$this->post_to_wall($this->page_id, $this->page_access_token, $this->message, $this->link, $this->picture);

	}
	
	/**
	 * request_user_access_token function
	 *
	 * Send user to facebook and ask user for "manage_pages" permission for our app.  Returns access_token querystring.
 	 *
	 * @return void
	 * @author William Catlin
	 **/
	public function request_user_access_code() {
		header('Location: https://www.facebook.com/dialog/oauth?client_id=' . $this->app_id . '&redirect_uri=' . $this->return_auth_url . '&scope=manage_pages,publish_stream&response_type=code');
	}
	
	/**
	 * post_to_wall function
	 *
	 * Publish to page feed using specific page id and access token
	 *
	 * @return void
	 * @author William Catlin
	 **/
	private function post_to_wall($page_id, $access_token, $message, $link, $picture = null) {
		$params = array(
			'access_token' => $access_token, 
			'message' => $message,
			'link' => $link
		);
		
		if(isset($picture))
			$params['picture'] = $picture;
		
		$result = $this->post_request_via_post($params, 'https://graph.facebook.com/' . $page_id . '/feed');
		
		return strpos($result, 'error') === false ? true : false;
	}
	
	/**
	 * get_page_access_tokens function
	 *
	 * Retrieve user account JSON for current user.  Then set our center and shopstar page access tokens.
	 *
	 * @return void
	 * @author William Catlin
	 **/
	private function get_page_access_tokens() {
		$this->user_access_token = $this->request_user_access_token();
		
		$accounts = json_decode(file_get_contents('https://graph.facebook.com/me/accounts?access_token=' . $this->user_access_token));
		
		if(!empty($accounts)) {
			foreach($accounts->data as $account) {
				// if account is our page
		    	if($account->id == $this->page_id)
		        	$this->page_access_token = $account->access_token;
		   	}
		}
	}
	
	private function get_json_encoded_action_links() {
		$a = array($this->reward_title => $this->reward_link);

		return json_encode($a);
	}
	
	private function request_user_access_token() {
		$params = array(
			'client_id' => $this->app_id, 
			'redirect_uri' => urlencode($this->return_auth_url),
			'client_secret' => $this->app_secret,
			'code' => $this->user_access_code);
		
		$token_url = "https://graph.facebook.com/oauth/access_token?client_id="
		        . $this->app_id . "&redirect_uri=" . urlencode($this->return_auth_url) . "&client_secret="
		        . $this->app_secret . "&code=" . $this->user_access_code;

		$result = file_get_contents($token_url);
		
		parse_str($result);
		
		return $access_token;
	}
	
	private function post_request($params, $server_addr) {
		$result = "";
	    $get_string = $this->create_url_string($params);
	    $url_with_get = $server_addr . '?' . $get_string;
		
	    if (function_exists('curl_init')) {
	    	$useragent = 'Facebook API PHP5 Client 1.1 (curl) ' . phpversion();
			
	      	$ch = curl_init();
	      	curl_setopt($ch, CURLOPT_URL, $url_with_get);
	      	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	      	curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
	      	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	      	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			
	      	$result = curl_exec($ch);
	
	      	curl_close($ch);
	    } 
	
	    return $result;
	}
	
	private function post_request_via_post($fields, $url) {
		$result = "";
		
	    if (function_exists('curl_init')) {
			//url-ify the data for the POST
			foreach($fields as $key => $value) { $fields_string .= $key.'='.$value.'&'; }
			
			rtrim($fields_string,'&');

			//open connection
			$ch = curl_init();

			//set the url, number of POST vars, POST data
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, count($fields));
			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			//execute post
			$result = curl_exec($ch);
	
	      	curl_close($ch);
	    } 
	
	    return $result;
	}
	
	private function create_url_string($params) {
	    $post_params = array();
	
	    foreach ($params as $key => &$val)
	    	$post_params[] = $key.'='.urlencode($val);
	   
	    return implode('&', $post_params);
	}	
} // END class FacebookService
?>