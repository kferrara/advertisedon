<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends MY_Controller {
	
	public $data = array();	

	function __construct()
	{
	   parent::__construct();
	   $this->load->model('auth_model');
	   $this->load->model('advertisements_model');
	   $this->load->model('business_model');
	   $this->load->model('customer_model');
	   $this->load->model('membership_model');
	   $this->form_validation->set_error_delimiters('<div class="error">', '</div>');   
	   //$this->output->enable_profiler(TRUE);
	}
	
	/**
	STARTING FUNCTION
	**/
	function welcome()
	{	
		$data['metaTitle'] = 'Welcome!';	
		$data['ad'] = $this->advertisements_model->getAds("all");		
	    $this->view('index', $data);
	}
	
	/**
	LOGIN 
	**/
	function login()
	{	
		$data['metaTitle'] = 'Login!';
	    $this->view('login/login_view', $data);
	}
	
	/**
	LOGOUT 
	**/
	function logout()
	{
		session_start();
		$this->session->unset_userdata('logged_in');
		session_destroy(); 
		$this->login();
	}
	
	/**
	JOIN NOW - SIGN UP 
	**/	 
	function signup()
	{
		$data['metaTitle'] = 'Create a new user';			
		$this->view('signup/signup_form', $data);
	}
	
	/**
	JOIN NOW VALIDATION - REGISTRATION
	**/	
	function signup_completion()
	{				 	
		$data = array();
		
		if ($this->form_validation->run() === FALSE)
		{   
			$data['metaTitle'] = 'Create a new user';
			$this->view('signup/signup_form', $data);						
		}
		else
		{
			$data['metaTitle'] = 'User created successfully';
			$this->membership_model->create_member();			
			$this->view('signup/signup_successful', $data);
		}	
	}
	
	/**
	LOST PASSWORD 
	**/
	function lost_password () 
	{		
		$data['metaTitle'] = 'Forgotten Password';
		$data = array();
		$this->view('login/forgot_password', $data);
	}
	
	/**
	PROCESS LOST PASSWORD
	**/
	function send_password () 
	{	
		$data = array();
		$this->form_validation->set_rules('email', 'field', 'required|valid_email');
		if ($this->form_validation->run() == false) 
		{
			// email not formatted correctly;
			$data['metaTitle'] = 'Password';	
		} 
	
		// check the database for email
		$email = $this->input->post('email');
  		$result = $this->auth_model->get_password($email);
		 
	    if($result)
	    {
			// create new password
			$this->load->helper('string');
			$new_password = random_string('alnum', 6);
			
			// update database with temporary password
			$this->auth_model->update_password($result['id'], $new_password);
			
			//$session_data = $this->session->userdata('logged_in');
			//$email = $session_data['email'];			
			
			// html email setup
			$this->load->library('email');			
			$config['charset'] = 'utf-8';
			$config['mailtype'] = 'html';
			$config['wordwrap'] = TRUE;
			$config['protocol'] = 'sendmail';
			$this->email->initialize($config);
						
			// email settings
			$this->email->from('support@advertisedon.com', 'Customer Support');
			$this->email->to($email);			
			$this->email->subject('Your password has been reset for Advertisedon.com');
			$this->email->message('<html><head></head><body>
				<table rules="all" style="border-color: #000;" width="500px" style="font-family: Arial;font-size: 
				20px; line-height: 40px;" cellpadding="15px">
				<tr><td colspan="2" style="font-size: 24px; background-color: #cccccc; color: 
				#ffffff;">AdvertisedOn.com Forgotten Password<br /></span></td></tr>
				<tr style="font-size: 18px;"><td>Your new password: </td><td><b> ' . $new_password . ' </b></td></tr>
				</table></body></html>');											
			$this->email->send();
			
			$data['metaTitle'] = 'Password Sent';	
			$this->view( 'login/forgot_password_sent', $data);
	    }
	    else
	    {
			$data['metaTitle'] = 'Forgotten Password';
			$this->form_validation->set_message('send_password', 'Email does not exist in database');			
			$this->view('login/forgot_password', $data );
	   	}	
	}
	
	/**
	PASSWORD PORTAL
	**/
	function change_password() 
	{			
		$data = array();
		$data['metaTitle'] = 'Update Password';
		$this->view( 'login/change_password', $data);		
	}
	
	/**
	UPDATES PASSWORD
	**/	
	function update_password () 
	{				
		if ($this->form_validation->run() == false) 
		{
			$this->load->view('login/change_password');
		}		
		// get the id from the session
		$password = $this->input->post('password');		
		$session_data = $this->session->userdata('logged_in');
		$id = $session_data['id'];				
		$this->auth_model->update_password($id, $password);
		
		$data['metaTitle'] = 'Password Updated';
		$this->view('login/change_password_done', $data);
	}
	
	/**
	EDIT ACCOUNT
	**/
	function edit_account () 
	{						
		$data = array();		
		$session_data = $this->session->userdata('logged_in');
		$id = $session_data['id'];
		
		$data['cust'] = $this->customer_model->get_customer($id);
		$data['biz'] = $this->business_model->get_businesses_customer_id($id);
		$data['ads'] = $this->advertisements_model->get_ads_by_businesses_customer_id($id);
				
		if ($this->form_validation->run() === FALSE) {  
			$data['metaTitle'] = 'Edit Account'; 
			$this->view('login/update_account', $data );					
		} 
		else 
		{
			$data['metaTitle'] = 'Edit Account';
			$this->membership_model->update_member($id);
			$data['cust'] = $this->customer_model->get_customer($id);
			$this->view('login/update_account', $data);	
		}		
	}
	
	/**
	LOGIN FUNCTION
	**/
	function verifylogin()
	{
		$data = array();	
	    $this->load->library('form_validation');
	
     	$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
	    $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
	
	    if($this->form_validation->run() == FALSE)
		{		 
			$data['metaTitle'] = 'Welcome To AdvertisedOn.com';
		    $this->view('login/login_view', $data);
		}
	    else
	    {
		 	$this->home();
	   	}
	}
	
	/**
	CALLED BY VERIFY LOGIN AFTER SUCCESS
	**/
	function home() 
	{			
		$data = array();
		// if logged in, send them to the member homepage
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['email'] = $session_data['email'];		
			$data['ad'] = $this->advertisements_model->getAds("all");		
			$this->view('index', $data);			
		}
		else
		{
			$this->view('login/login_view', $data);
		}
	}
	
	/**
		CHECKS DATABASE
	**/
	function check_database($password)
	{
	   	//Field validation succeeded.&nbsp; Validate against database
	   	$email = $this->input->post('email');
	
		//query the database
	   	$result = $this->auth_model->login($email, $password);
	
	   	if($result)
	   	{
			$sess_array = array();
		 	foreach($result as $row)
		 	{
		   		$sess_array = array(
			 	'id' => $row->id,
			 	'email' => $row->email);
		   		$this->session->set_userdata('logged_in', $sess_array);
			}
			return TRUE;
	   	}
	   	else
	    {
		 	$this->form_validation->set_message('check_database', 'Invalid email or password');
			return false;
	    }
	}
	
}

?>