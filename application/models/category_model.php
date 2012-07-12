<?php
class Category_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	/**
	Get Category Name
	**/	
	public function get_category_name($categoryNum) {	
		$query = $this->db->get_where('categoryParent', array('id' =>$categoryNum), 1);
		$row = $query->row(); 
		return $row->name;
	}
	
	/**
	Get Category Name
	**/	
	public function get_parent_cat_name($categoryNum) {	
		$query = $this->db->get_where('categoryParent', array('id' =>$categoryNum), 1);
		$row = $query->row(); 
		return $row->name;
	}
	
	/**
	Get Child Categories by Parent Category ID
	**/
	public function get_child_categories_by_parent($parentCategoryId) {	

		$data = array();		
		$this->db->select('categoryChild.*');
		$this->db->from('categoryChild');
		$this->db->join('categoryParent', 'categoryChild.parentId = categoryParent.id');
		$this->db->where('categoryParent.id', $parentCategoryId); 	
		
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
	Get Child Category by ID
	**/
	public function get_child_category_by_Id($childCategoryId) {	

		$data = array();				
		$q = $this->db->get_where('categoryChild', array('id' => $childCategoryId), 1);
		
		if ($q->num_rows() > 0) {
			foreach ($q->result_array() as $row) {
				$data[] = $row;
			}
		}		
		$q->free_result();
		return $data;	
	}
	
	
	
	
	/**
	DEPRECATED
	**/
	public function get_categories() {
		$data = array();
		
		$this->db->order_by('id', 'asc');
		$query = $this->db->get('categories');
		return $query->result_array();
	}
	
	/**
	DEPRECATED
	**/
	public function get_ads($slug = FALSE)
	{
		if ($slug === FALSE)
		{
			$query = $this->db->get('advertisements');
			return $query->result_array();
		}
		
		$query = $this->db->get_where('advertisements', array('slug' => $slug));
		return $query->row_array();
	}
	
	
}