<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->database();
		$this->load->helper('url');
		/* ------------------ */	
		
		$this->load->library('grocery_CRUD');	
	}
	
	function _example_output($output = null)
	{
		$this->load->view('admin/index',$output);	
	}
	
	function offices()
	{
		$output = $this->grocery_crud->render();
		$this->_example_output($output);
	}
	
	function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}	
		
	/**
	THIS IS THE BIG ONE 
	**/
	function business_management()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('business');
		$crud->columns('name', 'categories', 'address', 'zipId', 'phone', 'logoImage', 'website', 'phoneExt',  'desc', 'customerId', 'businessEmail');
		$crud->set_relation_n_n('categories', 'business_categoryChild', 'categoryChild', 'businessId', 'categoryChildId', 'name');     
		$crud->fields('name', 'categories', 'address', 'zipId', 'phone', 'logoImage', 'website', 'phoneExt', 'desc', 'businessEmail', 'customerId');
		$crud->set_relation('customerId','customers','email');	
		$crud->set_field_upload('logoImage','assets/uploads/files');	
		$crud->set_relation('zipId','zipc','zip');
		$crud->unset_columns('phoneExt',  'businessEmail', 'desc');
		$this->grocery_crud->required_fields('name');
		$this->grocery_crud->set_rules('zip','Zipcode','integer');
					
		$crud->display_as('name','Business Name')
			 ->display_as('desc', 'Business Description')
			 ->display_as('zipId', 'Zipcode')
			 ->display_as('customerId', 'Owner')
			 ->display_as('address','Address');
		$crud->set_subject('Business');		
		
		$crud->unset_delete();
		$output = $crud->render();			
		$this->_example_output($output);
	}	
	
	function customers_management()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('customers');
		$crud->columns('username', 'email', 'firstName', 'lastName','phone', 'addressLine1', 'cityId', 'postalCode');
		$crud->set_relation('stateId','state','name');
		$crud->set_relation('cityId', 'city', 'name');
		$crud->display_as('firstName','First Name')
			 ->display_as('lastName','Last Name');
		$crud->set_subject('Customer');		
		
		$crud->unset_delete();			
		$output = $crud->render();			
		$this->_example_output($output);
	}	
	
	function child_category_management()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('categoryChild');
		$crud->columns('id', 'name', 'parentId');
		// this tables column, foreign table, foreign table ID
		$crud->set_relation('parentId','categoryParent','name');
		$crud->display_as('parentId','Parent Category');
		$crud->set_subject('Child Category');		
		
		$crud->unset_delete();			
		$output = $crud->render();			
		$this->_example_output($output);
	}	
	
	function parent_category_management()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('categoryParent');
		$crud->columns('id', 'code', 'name');
		$crud->set_subject('Parent Category');	
		
		$crud->unset_delete();			
		$output = $crud->render();			
		$this->_example_output($output);
	}	
	
	function zipc()
	{
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		
		$crud->set_table('zipc');
		$crud->columns('id', 'zip', 'lat', 'lng');
		$crud->fields('id', 'zip', 'town', 'cityId', 'lat', 'lng');
		// this tables column, foreign table, foreign table ID
		$crud->set_relation('cityId','city','name');
		$crud->display_as('cityId','City');
		$crud->set_subject('Zipcodes');	
		$crud->unset_delete();	
				
		$output = $crud->render();			
		$this->_example_output($output);
	}	
	
	function city()
	{
		try {
			$crud = new grocery_CRUD();
			$crud->set_theme('datatables');
			 
			$crud->set_table('city');
			$crud->columns('id', 'name', 'lat', 'lng');
			//$crud->set_relation_n_n('Nearby Cities', 'city_to_city', 'advertisements', 'localCity', 'nearbyCity', 'title');
			$crud->set_subject('City');	
			$crud->unset_delete();	
					
			$output = $crud->render();			
			$this->_example_output($output);
		} catch ( Exception $e ) {
			show_error ( $e->getMessage () . ' --- ' . $e->getTraceAsString () );
		}
	}
	
	function business_categoryChild()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('business_categoryChild');
		$crud->columns('bisCatId', 'businessId', 'categoryChildId');
		$crud->set_relation('businessId','business','name');
		$crud->set_relation('categoryChildId','categoryChild','name');
		$crud->set_subject('Business Category Group');	
		$crud->display_as('businessId','Business Name');
		$crud->display_as('categoryChildId','Category Type');	
		
		$crud->unset_delete();			
		$output = $crud->render();			
		$this->_example_output($output);
	}	
	
	function advertisements()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('advertisements');		
		$crud->set_subject('Advertisements');	
		$crud->columns('id', 'title', 'desc', 'adImage', 'enteredOn', 'expiresOn', 'businessId');
		$crud->set_relation('parentCategoryId','categoryParent','name');
		$crud->display_as('parentCategoryId','Parent Category');
		$crud->set_field_upload('adImage','assets/uploads/files');
		$crud->set_relation('businessId','business','name');
		$crud->display_as('businessId','Business Name');
		
		$crud->unset_delete();			
		$output = $crud->render();			
		$this->_example_output($output);
	}	
	
	
		
}