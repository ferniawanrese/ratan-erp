<?php
class Mcrm extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	  
	 
	function crm_data($data,$page,$limit){
	
		$a = ($page-1) * $limit;
		$limitnya = ",".$a.",".$limit;
		
		$this->db->like('partner_name',$data['search']);
		
		$this->db->where('deleted', '0');
		
		$this->db->where('vendor_stat', '0');
	 
		$query = $this->db->get('partner',$limit,$a);

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	
	}
	
	function crm_data_count($data){
	
		$this->db->select('count(*) as totdata'); 
		 
		$this->db->where('deleted', '0');
		
		$this->db->where('vendor_stat', '0');
		
		$this->db->like('partner_name', $data['search']);
	
		$query = $this->db->get('partner');
		 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	 
	}
	
 
	function crm_detail($customer_ID){
	 
		$this->db->where('partner.deleted', '0');
		
		$this->db->where('partner_ID', $customer_ID);
		 
		$query = $this->db->get('partner');

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	
	}
	
	function customer_add($data){
	
		if($data['partner_ID']!=""){ 
			
				$this->db->where('partner_ID',$data['partner_ID']); 
				$this->db->update('partner',$data); 
				
			}else{
				unset($data['partner_ID']);
				$id  = $this->generate_code->getUID(); 
				$this->db->set('partner_ID',$id);
				$this->db->insert('partner',$data);
				
			}
	
	}
	
	function get_partner_name($name){ 
	  
		 $querynya = "select partner_name AS label,
								partner_name as value, partner_ID
								from partner where partner_name like '%".$name."%' and deleted = '0' limit 10 " ;
								 
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
	
	function meeting_add($data){
	
		//$this->core->print_rr($data);
		
		$detail = $data['invitation_detail'];
		
		unset ($data['invitation_detail']);
		
		$data['start_date'] = date("Y-m-d", strtotime($data['start_date']));
		
		$data['end_date'] = date("Y-m-d", strtotime($data['end_date']));
		
		$data['meeting_ID'] = $this->generate_code->getUID(); 
		 
		$this->db->insert('meeting',$data);
		
	
	}
	
	 
}
	
?>