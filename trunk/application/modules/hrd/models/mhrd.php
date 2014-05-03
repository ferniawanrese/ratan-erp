<?php
class Mhrd extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	
	function employee_data($data){
	
		$this->db->where('deleted', '0');
		$this->db->order_by('datecreated','desc');	
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

	function save_employee($data){
	
		if ($data['employee_hexaID']==""){
			unset($data['employee_hexaID']);
			$this->db->set('employee_hexaID', $this->generate_code->getUID());			
			$this->db->insert('employee', $data); 
		}else{
			$this->db->where('employee_hexaID',$data['employee_hexaID']);
			$this->db->update('employee', $data); 			
		}
	
		

	}
	
	function employee_colum(){
	
	}
}
	
?>