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
	
	function currency(){
		
		$this->db->where('deleted',0);
		$query = $this->db->get('currency');
			
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	}
	
	function companies_det($company_ID){
	
		$this->db->select("company.*,employee.employee_name,employee.employee_badge");
	  
		$this->db->where("company.company_ID",$company_ID);
		
		$this->db->join("employee","company.employee_ID = employee.employee_ID","left");
		 
		$this->db->where('company.deleted',0);
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
	
	function companies($limit,$page,$search){
	
		$a = ($page-1) * $limit;
		$limitnya = ",".$a.",".$limit;
		
		$this->db->like('company_name',$search);
	   
		$this->db->where('deleted',0);
		
		$this->db->where('company_groupID', $this->session->userdata('company_groupID'));	
		
		$query = $this->db->get('company',$limit,$a);
	
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function companies_count($search){
	
		$this->db->select("count(*) as totdata");
		
		$this->db->like('company_name',$search);
	   
		$this->db->where('deleted',0);
		
		$this->db->where('company_groupID', $this->session->userdata('company_groupID'));	
		
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
	
	function company_add($data,$img){
	
	unset($data['employee_IDx']);
	
	$this->db->set('company_logo', $img);	
	
	if($data['company_ID']==""){
	
		$this->db->set('company_ID', $this->generate_code->getUID());	
	
		$this->db->set('company_groupID', $this->session->userdata('company_groupID'));	
	
	unset($data['company_ID']);
	 
		$this->db->insert('company',$data);
	
	}else{
	
		$this->db->where('company_ID', $data['company_ID']);
	
		$this->db->update('company',$data);
	
	}
	
	}
	
	function delete_company($company_ID){
	
	$this->db->set("deleted",1);
	
	$this->db->where('company_ID',$company_ID);
	
	$this->db->update('company');
	
	}
	
}
	
?>