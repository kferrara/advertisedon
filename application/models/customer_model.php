<?php
class Customer_model extends CI_Model {

	/**
	Constructor
	**/
	public function __construct()
	{
		$this->load->database();
	}
	
	/**
	Get Business Record
	**/
	public function get_customer($id) {	
		
		$this->db->select('*'); 
		$this->db->distinct();
		$this->db->from('customers');
		$this->db->where('id', $id); 	
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