<?php

class Login extends CI_Model {
	
	
	function __construct()
	{
		parent::__construct();

		
	}
	
	function cek_login($username,$pass){
	
		$this->db->where('employee_email',$username);
		
		$this->db->where('employee_password',$pass);
	
		$query = $this->db->get('employee');

			if ($query->num_rows())
			{
				return $query->row_array();
			}
			else
			{
				return FALSE;
			}		
	
	}
	
}
	
?>