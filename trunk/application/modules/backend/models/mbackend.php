<?php
class Mbackend extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	
	function cek_menu($employee_ID){
		
		$querynya = "SELECT * FROM menu 
			INNER JOIN access
			ON menu.menu_ID = access.menu_ID
			WHERE access.employee_ID = '$employee_ID'";
			
		$query = $this->db->query($querynya);

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	}
	
	function get_user($employee_ID){
		
		$this->db->where('employee_ID',$employee_ID);
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
}
	
?>