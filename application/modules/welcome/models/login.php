<?php

class Login extends CI_Model {
	
	
	function __construct()
	{
		parent::__construct();

		
	}
	
	function cek_login($username,$pass){
	
		$this->db->select('employee.*,company.company_name as company_name');
	 
		$this->db->where('employee_email',$username);
		
		$this->db->where('employee_password',$pass);
		
		$this->db->join('company','employee.company_ID = company.company_ID');
	
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
	
	function company($company_groupID){
	 
		$this->db->where('company_groupID',$company_groupID);
		
		$this->db->where('deleted',0);
		
		$this->db->order_by('company_name','asc');
	
		$query = $this->db->get('company');

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}			
	
	}
	
}
	
?>