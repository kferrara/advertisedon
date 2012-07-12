<?php
class Business_model extends CI_Model {

	/**
	Constructor
	**/
	public function __construct()
	{
		$this->load->database();
	}
		
	/**
		MAIN SEARCH BAR AND TABS
		3/9/12 - business view
	**/
	public function get_businesses_by_bis_cat_name_and_city($num, $offset, $bis_catName, $cityName) {	
	
		$data = array();		
		$this->db->select('business.*, zipc.zip as zipcode, city.name as cityName, categoryParent.code as iconCode'); 
		$this->db->distinct();
		$this->db->from('business');
		$this->db->join('business_categoryChild', 'business.id = business_categoryChild.businessId');
		$this->db->join('categoryChild', 'categoryChild.id = business_categoryChild.categoryChildId');
		$this->db->join('categoryParent', 'categoryParent.id = categoryChild.parentId');
		$this->db->join('zipc', 'business.zipId = zipc.id');
		$this->db->join('city', 'zipc.cityId = city.id');
		
		if (( $bis_catName == "What") || ($bis_catName == '')) {			
		} else if ( isset($bis_catName)) {
			$this->db->like('business.name', $bis_catName); 
			$this->db->or_like('categoryChild.name', $bis_catName);
		}
					
		if (( $cityName == "Where") || ($cityName == '')) {	
		} else if ( isset($cityName)) {
			$this->db->where('city.name', $cityName);
		}
		
		$this->db->limit($num, $offset);
		$q = $this->db->get();
		
		
		if ($q->num_rows() > 0) {
			foreach ($q->result_array() as $row) {
				$data[] = $row;
			}
		}		
		$q->free_result();
		return $data;
	}
	
	/**
		COUNT for MAIN SEARCH
		3/9/12 - business view
	**/
	public function header_search_count($bis_catName, $cityName) {	
	
		$data = array();		
		$this->db->select('business.id'); 
		$this->db->distinct();
		$this->db->from('business');
		$this->db->join('business_categoryChild', 'business.id = business_categoryChild.businessId');
		$this->db->join('categoryChild', 'categoryChild.id = business_categoryChild.categoryChildId');
		$this->db->join('zipc', 'business.zipId = zipc.id');
		$this->db->join('city', 'zipc.cityId = city.id');
		
		if (( $bis_catName == "What") || ($bis_catName == '')) {				
		} else if ( isset($bis_catName)) {
			$this->db->like('business.name', $bis_catName); 
			$this->db->or_like('categoryChild.name', $bis_catName);
		}
					
		if (( $cityName == "Where") || ($cityName == '')) {	
		} else if ( isset($cityName)) {
			$this->db->where('city.name', $cityName);
		}
		
		$q = $this->db->get();
		$num = $q->num_rows();
		$q->free_result();
		return $num;
	}	
	
	/**
	Get Business Record
	**/
	public function get_business($id) {	
		
		$data = array();
		$this->db->select('business.*, zipc.town as cityName, zipc.zip as zipcode, categoryParent.code as iconCode'); 
		$this->db->distinct();
		$this->db->from('business');
		$this->db->join('zipc', 'business.zipId = zipc.id');
		$this->db->join('business_categoryChild', 'business.id = business_categoryChild.businessId');
		$this->db->join('categoryChild', 'categoryChild.id = business_categoryChild.categoryChildId');
		$this->db->join('categoryParent', 'categoryParent.id = categoryChild.parentId', 'left');
		$this->db->where('business.id', $id); 
		$this->db->limit(1);	
		$q = $this->db->get();

		if ($q->num_rows() > 0) {
			foreach ($q->result_array() as $row) {
				$data[] = $row;
			}
		}
		$q->free_result();
		return $data;
	}	
	
	/**
	Get Business Address
	**/
	public function get_address($id) {	
		$data = array();
		$this->db->select('business.*, zipc.town as cityName, zipc.zip as zipcode'); 
		$this->db->distinct();
		$this->db->from('business');
		$this->db->join('zipc', 'business.zipId = zipc.id');
		$this->db->where('business.id', $id); 	
		$q = $this->db->get();

		if ( $q->num_rows() > 0 ) {
			$row = $q->row();
			$address = $row->address . " " . $row->cityName . " MA";
		}
		return $address;
	}	
	
	/**
	Get Businesses by Customer ID
	**/
	public function get_businesses_customer_id($customerId) {	
		
		$data = array();
		$this->db->select('business.*, zipc.town as cityName, zipc.zip as zipcode'); 
		$this->db->distinct();
		$this->db->from('business');
		$this->db->join('zipc', 'business.zipId = zipc.id');
		$this->db->where('business.customerId', $customerId); 	
		$q = $this->db->get();

		if ($q->num_rows() > 0) {
			foreach ($q->result_array() as $row) {
				$data[] = $row;
			}
		}
		$q->free_result();
		return $data;
	}	
	
	/**
	Creates business
	Created 5/16/2012
	**/
	function create_business($zipId)
	{				
		$session_data = $this->session->userdata('logged_in');
		$id = $session_data['id'];
				
		$new_business_insert_data = array(
			'name' => $this->input->post('name'),
			'address' => $this->input->post('address'),
			'zipId' => $zipId,			
			'phone' => $this->input->post('phone'),
			'desc' => $this->input->post('desc'),
			'website' => $this->input->post('website'),
			'customerId' => $id	
		);
	
		return $this->db->insert('business', $new_business_insert_data);
	}
	
	/**
	Retrieves Zipcode Id based on 5 digit zipcode
	Returns -1 if unsuccessful
	Created 5/16/2012
	**/	
	function retrieve_zipId($zipcode)
	{				
		$zipId = -1;
		$data = array();		
		$this->db->select('id');
		$this->db->from('zipc');
		$this->db->where('zipc.zip', $zipcode); 
		$this->db->limit(1);	
		$q = $this->db->get();
		
		if ($q->num_rows() > 0) {
			foreach ($q->result_array() as $row) {
				$zipId = $row['id'];	
			}
		}		
		$q->free_result();
		return $zipId;
	}

	/**
		Get Businesses by Child Category ID
	
	public function get_category($parentCatNum) {	
		$data = array();		
		$this->db->select('business.*');
		$this->db->from('business');
		$this->db->join('categoryChild', 'categoryChild.id = business.categoryChildId');
		$this->db->join('categoryParent', 'categoryParent.id = categoryChild.parentId');

		$this->db->where('categoryParent.id', $parentCatNum); 	
		
		$q = $this->db->get();
		if ($q->num_rows() > 0) {
			foreach ($q->result_array() as $row) {
				$data[] = $row;
			}
		}		
		$q->free_result();
		return $data;
	}
	**/
	
	/**
	Get All Businesses
	
	public function get_all() {
		$data = array();
		$this->db->order_by('id', 'name');
		$q = $this->db->get('business');
		
		if ($q->num_rows() > 0) {
			foreach ($q->result_array() as $row) {
				$data[] = $row;
			}
		}
		$q->free_result();
		return $data;
	}
	**/
	
	/**
	Get Businesses by Child Category ID
	business_view
	
	public function get_businesses_by_child_category_and_city($categoryChildId, $cityName) {	
		$data = array();		
		$this->db->select('business.*'); 
		$this->db->distinct();
		$this->db->from('business');
		$this->db->join('business_categoryChild', 'business.id = business_categoryChild.businessId');
		$this->db->join('categoryChild', 'categoryChild.id = business_categoryChild.categoryChildId');
		$this->db->join('zipc', 'business.zipId = zipc.id');
		$this->db->join('city', 'zipc.cityId = city.id');
		$this->db->where('categoryChild.id', $categoryChildId); 	
		$this->db->where('city.name', $cityName);
		
		$q = $this->db->get();
		if ($q->num_rows() > 0) {
			foreach ($q->result_array() as $row) {
				$data[] = $row;
			}
		}		
		$q->free_result();
		return $data;
	}
	
	/**
	Get Businesses by City ID
	
	public function businesses_by_cityId($cityId) {	

		$data = array();		
		$this->db->select('business.*');
		$this->db->from('business');
		$this->db->join('zipc', 'zipc.id = business.zipId');
		$this->db->join('city', 'city.id = zipc.cityId');
		$this->db->where('city.id', $cityId); 	
		
		$q = $this->db->get();
		if ($q->num_rows() > 0) {
			foreach ($q->result_array() as $row) {
				$data[] = $row;
			}
		}		
		$q->free_result();
		return $data;	
	}
	
	/**
	Get Businesses by City Name
	
	public function businesses_by_city($city) {	

		$data = array();		
		$this->db->select('business.*');
		$this->db->from('business');
		$this->db->join('zipc', 'zipc.id = business.zipId');
		$this->db->join('city', 'city.id = zipc.cityId');
		$this->db->where('city.name', $city); 	
		
		$q = $this->db->get();
		if ($q->num_rows() > 0) {
			foreach ($q->result_array() as $row) {
				$data[] = $row;
			}
		}		
		$q->free_result();
		return $data;	
	}
	
	/**
	Get Businesses by Zipcode
	
	public function businesses_by_zipcode($zipcode) {	

		$data = array();		
		$this->db->select('business.*');
		$this->db->from('business');
		$this->db->join('zipc', 'zipc.id = business.zipId');
		$this->db->where('zipc.zip', $zipcode); 	
		
		$q = $this->db->get();
		if ($q->num_rows() > 0) {
			foreach ($q->result_array() as $row) {
				$data[] = $row;
			}
		}		
		$q->free_result();
		return $data;	
	}	
	
	
	
	/**
	Get Businesses by Cities
	
	public function get_cities($cities) {	
		$data = array();
		$this->db->where_in('city', $cities);
		$q = $this->db->get('business');
		
		if ($q->num_rows() > 0) {
			foreach ($q->result_array() as $row) {
				$data[] = $row;
			}
		}		
		$q->free_result();
		return $data;
	}
	
	/**
	Get Businesses by Child Category ID
	
	public function get_businesses_by_child_category($categoryChildId) {	
		$data = array();		
		$this->db->select('business.*'); 
		$this->db->from('business');
		$this->db->join('business_categoryChild', 'business.id = business_categoryChild.businessId');
		$this->db->where('business_categoryChild.categoryChildId', $categoryChildId); 	
		
		$q = $this->db->get();
		if ($q->num_rows() > 0) {
			foreach ($q->result_array() as $row) {
				$data[] = $row;
			}
		}		
		$q->free_result();
		return $data;
	}
	
	/**
	Get Businesses by Parent Category ID
	3/9/12 - business view
	
	public function get_businesses_by_parent_category_and_city($categoryParentId, $cityName) {	
		$data = array();		
		$this->db->select('business.*, zipc.zip, city.name as cityName'); 
		$this->db->distinct();
		$this->db->from('business');
		$this->db->join('business_categoryChild', 'business.id = business_categoryChild.businessId');
		$this->db->join('categoryChild', 'categoryChild.id = business_categoryChild.categoryChildId');
		$this->db->join('zipc', 'business.zipId = zipc.id');
		$this->db->join('city', 'zipc.cityId = city.id');
		$this->db->where('categoryChild.parentId', $categoryParentId); 	
		$this->db->where('city.name', $cityName);
		
		$q = $this->db->get();
		if ($q->num_rows() > 0) {
			foreach ($q->result_array() as $row) {
				$data[] = $row;
			}
		}		
		$q->free_result();
		return $data;
	}
	
	
**/
	
}