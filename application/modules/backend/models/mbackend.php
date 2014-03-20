<?php
class Mbackend extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	
	function cek_menu($employee_hexaID){
		
		$querynya = "SELECT * FROM menu 
			INNER JOIN access
			ON menu.menu_hexaID = access.menu_hexaID
			WHERE access.employee_hexaID = '$employee_hexaID'";
			
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
	
	function get_user($employee_hexaID){
		
		$this->db->where('employee_hexaID',$employee_hexaID);
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