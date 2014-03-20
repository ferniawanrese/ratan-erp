<?php
class Mhrd extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	
	function employee_data(){

		
		$this->db->where('deleted', '0');
			
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

	function employee_data_detail($employee_hexaID){

		
		$this->db->where('employee_hexaID', $employee_hexaID);
		
		$this->db->where('deleted', '0');
			
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

	function employee_delete($employee_hexaID){
		
		$data = array(
               'deleted' => '1'              
            );

		$this->db->where('employee_hexaID', $employee_hexaID);
		$this->db->update('employee', $data); 


	}

	function save_employee($employee_data,$data){

				$datanya = array_merge($employee_data,$data);

				$this->db->insert('employee', $datanya); 

	}
}
	
?>