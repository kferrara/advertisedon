<?php
class Advertisements_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function getParentCategories()
	{		
		$data = array();		
		$q = $this->db->get('categoryParent');
		return $q;
	}	
	
	public function getAds($category)
	{		
		$data = array();		
		$this->db->select('advertisements.*, categoryParent.code as adCode, business.name as company');
		$this->db->from('advertisements');
		$this->db->join('categoryParent', 'categoryParent.id = advertisements.parentCategoryId'); 	
		$this->db->join('business', 'business.id = advertisements.businessId'); 
		$this->db->limit(4, 0);
		$this->db->order_by("title", "random");
		$this->db->where('categoryParent.code', $category);
		$q = $this->db->get();
	
		if ($q->num_rows() > 0) {
			foreach ($q->result_array() as $row) {
				$data[] = $row;
			}
		}
		$q->free_result();
		return $data;
	}	
	
	public function get_listings($category) {
		$data = array();
		
		if ($category) {
			$options = array('category' => $category);
			$this->db->order_by('id', 'desc');
			$q = $this->db->get_where('jobs', $options);
		}
		else {
			$this->db->order_by('id', 'desc');
			$q = $this->db->get('jobs');
		}
		
		if ($q->num_rows() > 0) {
			foreach ($q->result_array() as $row) {
				$data[] = $row;
			}
		}
		
		$q->free_result();
		return $data;
	}
	
	public function getCount()
	{	
		return $this->db->count_all_results('advertisements');
	}
	
	
	public function getAd($id)
	{	
		$data = array();
		$q = $this->db->get_where('advertisements', array('id' => $id));
		if ($q->num_rows() > 0) {
			foreach ($q->result_array() as $row) {
				$data[] = $row;
			}
		}
		$q->free_result();
		return $data;
	}
	

	
	public function get_current_bis_ads($id)
	{		
		$data = array();		
		$this->db->select('*');
		$this->db->from('advertisements');
		$this->db->where('advertisements.businessId', $id); 	
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
	Get Advertisements by Businesses Customer ID
	**/
	public function get_ads_by_businesses_customer_id($customerId) {		
		$data = array();		
		$this->db->select('advertisements.*');
		$this->db->distinct();
		$this->db->from('advertisements');
		$this->db->join('business', 'business.id = advertisements.businessId');
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
}