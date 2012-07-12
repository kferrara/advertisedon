<?php
Class Auth_model extends CI_Model
{	
	 function login($email, $password)
	 {
	   $this -> db -> select('id, email, password');
	   $this -> db -> from('customers');
	   $this -> db -> where('email = ' . "'" . $email . "'");
	   $this -> db -> where('password = ' . "'" . MD5($password) . "'");
	   $this -> db -> limit(1);
	
	   $query = $this -> db -> get();
	
	   if($query -> num_rows() == 1)
	   {
		 return $query->result();
	   }
	   else 
	   {
		 return false;
	   }
	 }
	
	function get_password($email)
	{
		$this -> db -> from('customers');
		$this -> db -> where('email = ' . "'" . $email . "'");
		$this -> db -> limit(1);
	
		$query = $this -> db -> get();
	
		if($query -> num_rows() == 1)
		{
			return $query->row_array();
		}
		else
		{
			return false;
		}
	}
	 
	function update_password($id, $new_password) 
	{
		$data = array('password' => md5($new_password));
		$this->db->where('id', $id);
		$this->db->update('customers', $data); 	 
	} 
}
?>