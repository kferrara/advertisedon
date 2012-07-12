<?php
class Business extends MY_Controller {

	public $data = array();	


	public function __construct()
	{ 
		parent::__construct();
		$this->load->model('business_model');		 
		$this->load->model('category_model');
		$this->load->model('advertisements_model');		
		$this->load->library('pagination');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="alert-box error">', '</div>');
	}
	
	public function create_ad() 
	{	
		$data[] = array();
		if ($this->form_validation->run() === FALSE)
		{   
			$data['metaTitle'] = 'Create an Ad';
			$data['categories'] = $this->advertisements_model->getParentCategories();
			$this->view('signup/create_advertisement.php', $data);
		} 
		else 
		{
			// insert into database with customer ID
			
			redirect('auth/edit_account');
			//$this->view('login/update_account.php', $data);
		}			
	}
	
	public function add_business() 
	{
		$data[] = array();
		$data['metaTitle'] = 'Add your Business';
		if ($this->form_validation->run() === FALSE)
		{   
			$this->view('signup/add_business.php', $data);					
		}
		else
		{
			$zip = $this->input->post('zip');
			$zipId = $this->business_model->retrieve_zipId($zip);
			
			if ( isset($zipId)) {
				//$this->business_model->create_business($zipId);
				redirect('auth/edit_account');
			} else {
				$this->view('signup/add_business.php', $data);
			}
		}			
	}
		
	public function header_search($category, $limit, $offset) 
	{
		// get the post results
		$business = trim($this->input->post('whatBis'));
		$city = trim($this->input->post('whatCity'));

		if ( $category == 'null' ) {
			//echo "category is null<br/>";
		}
			
		if ( $business == '') {
			$business = $category;
		} else {
			
		}
		// variable setting
		$data['title'] = 'Business Listings';
		$data['city1'] = $city;		
		$data['business1'] = trim($this->input->post('whatBis'));
		//echo $category;
		
		// load the model and get results	
		//$data['biz'] = $this->business_model->get_businesses_by_bis_cat_name_and_city($limit, $offset, $business, $this->input->post('whatCity')	);
		
		// load pagination class
		//$offset = $limit + $offset;
		//$this->load->library('pagination');
		//$config['base_url'] = base_url().'index.php/business/header_search/' . $category . '/' . $limit . '/' . $offset;
		//$config['total_rows'] = $this->business_model->header_search_count( $business, $city );
		//$config['num_links'] = 3;
		//$config['full_tag_open'] = '<p>';
		//$config['full_tag_close'] = '</p>';
		//$this->pagination->initialize($config);		
				
		// load the view
		$data['ads1'] = $this->advertisements_model->getAds($category);
		$data['ads2'] = $this->advertisements_model->getAds($category);
		$data['ads3'] = $this->advertisements_model->getAds($category);
		$data['metaTitle'] = 'Advertisement Listings';
		$this->view('businesses_view', $data);
	}
	
	public function id($id) 
	{
		$data['biz'] = $this->business_model->get_business($id);
		$data['title'] = 'Business Listing';
		$data['city'] = "Business Listing";
		$data['ads'] = $this->advertisements_model->get_current_bis_ads($id);
		$data['address'] = $this->business_model->get_address($id);
		$data['metaTitle'] = 'Advertisement Info';
		$this->view('bis_detail_page', $data );
	}
	
	/**
	
	public function all() 
	{
		echo "hello";
		$data['ads'] = $this->advertisements_model->get_ads();
		$data['title'] = 'Ads Listings';
		$this->view('ads_view', $data);
	}
	
	public function category()
	{
		$data['ads'] = $this->advertisements_model->get_ads_by_category();
		$data['title'] = 'Ads Listings';
		$this->load->view('ads_by_category_view', $data);
	}
	

	public function view($slug)
	{
		$data['ads_item'] = $this->advertisements_model->get_ads($slug);
	
		if (empty($data['ads_item']))
		{
			show_404();
		}
	
		$data['title'] = $data['ads_item']['title'];
	
		$this->load->view('ads_view', $data);
	}
	
	public function all() 
	{
		$data['biz'] = $this->business_model->get_all();
		$data['title'] = 'All Business Listings';
		$data['city'] = 'All';	
		$this->view($data, 'businesses_view', '');
	}
	
	public function city() 
	{
		$city = $this->input->post('city');
		$data['biz'] = $this->business_model->businesses_by_city($city);
		$data['city'] = ucwords($city);
		$this->view($data, 'businesses_view', 'Business Listings');
	}
	
	public function cityId($cityId) 
	{
		$data['biz'] = $this->category_model->businesses_by_cityId($cityId);
		$data['city'] = '';
		$this->view($data, 'businesses_view', 'Business Listings');
	}
	
	public function zipcode($zipcode) 
	{
		$data['biz'] = $this->business_model->businesses_by_zipcode($zipcode);
		$data['city'] = $zipcode;
		$this->view($data, 'businesses_view', 'Business Listings');
	}
	
	public function childCategory($childCatId, $city) 
	{
		$data['city'] = $city;
		$data['biz'] = $this->business_model->get_businesses_by_child_category_and_city($childCatId, $city);
		$data['title'] = 'Business Listings';
		
		$data['childCategories'] = $this->category_model->get_child_category_by_Id($childCatId);
		
		$data['category'] = "food"; 
		$this->view($data, 'businesses_view', '');
	}
	
	public function category($childCatId) 
	{
		$data['biz'] = $this->business_model->get_category($childCatId);
		$data['title'] = 'Business Listings';
		$data['city'] = $this->category_model->get_category_name($childCatId);
		$this->view($data, 'businesses_view', '');
	}
	
	public function parentCategory($parentCatId, $city) 
	{
		$base_url = site_url('business/parentCategory');
		$config['base_url'] = $base_url;
		$config['total_rows'] = 3;
		
		// amount of posts we want per page
		$config['per_page'] = 2; 
   		$config['uri_segment'] = '3';
		$this->pagination->initialize($config); 
		
		$data['city'] = $city;
		$data['biz'] = $this->business_model->get_businesses_by_parent_category_and_city($parentCatId, $city);
		$data['title'] = 'Business Listings';
		$data['category'] = $this->category_model->get_parent_cat_name($parentCatId);
		$data['childCategories'] = $this->category_model->get_child_categories_by_parent($parentCatId);
		$this->view($data, 'businesses_view', '');
	}
	**/
}