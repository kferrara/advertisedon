<?php
class History_model extends CI_Model {

	/**
	Constructor
	**/
	public function __construct()
	{
		$this->load->database();
	}
	
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
}

?>