<?php 

class MY_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }
    
    public function is_logged_in() 
    {
		if($this->session->userdata('logged_in'))
		{
			return 'Logout';
		} 
		else 
		{
			return 'LOGIN';
		}
    }
	
	public function view($view, $data)
	{
		$title = '';
		$data['loginLogout'] = $this->is_logged_in();
		
		if (isset( $data['metaTitle'] ) && ($data['metaTitle'] == '')) 
		{
			$title = "Advertisedon.com";
		}
		$data['metaTitle'] = $title;
		$this->load->view('includes/header_inc', $data);
		$this->load->view($view, $data);
		$this->load->view('includes/footer_inc');	
	}
	
}

?>