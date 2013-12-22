<?php
class Mhrd extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	
	function employee_data(){
		
		
			
		$query = $this->db->get('employee');

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	}
	function get_country(){
		
		$query = $this->db->get('countries');

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	}

	function add_employee($employee_data){
		
			$this->db->insert('employee', $employee_data); 
	}
}
	
?>