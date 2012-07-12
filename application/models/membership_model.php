<?php

class Membership_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	function validate()
	{
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		$query = $this->db->get('membership');
		
		if($query->num_rows == 1)
		{
			return true;
		}
	}
	
	function create_member()
	{		
		$new_member_insert_data = array(
			'firstName' => $this->input->post('firstName'),
			//'lastName' => $this->input->post('lastName'),
			'email' => $this->input->post('email'),			
			//'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))						
		);
		
		return $this->db->insert('customers', $new_member_insert_data);
	}
	
	function update_member($id)
	{		
		$update_data = array(
			'firstName' => $this->input->post('firstName'),
			//'lastName' => $this->input->post('lastName'),
			'email' => $this->input->post('email')
			//'addressLine1' => $this->input->post('addressLine1')
			//'username' => $this->input->post('username')						
		);
		$this->db->where('id', $id);
		return $this->db->update('customers', $update_data);
	}
}