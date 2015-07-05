<?php
class Mcrm extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	  
	 
	function crm_data($data,$page,$limit){
	
		$a = ($page-1) * $limit;
		$limitnya = ",".$a.",".$limit;
		
		$this->db->like('customer_name',$data['search']);
		
		$this->db->where('deleted', '0');
	 
		$query = $this->db->get('customer',$limit,$a);

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
		
		$this->db->like('customer_name',$data['search']);
		 
		$this->db->where('deleted', '0');
		
		$this->db->like('customer_name', $data['search']);
	
		$query = $this->db->get('customer');
		 
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
	 
		$this->db->where('customer.deleted', '0');
		
		$this->db->where('customer_ID', $customer_ID);
		 
		$query = $this->db->get('customer');

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
	
		if($data['customer_ID']!=""){ 
			
				$this->db->where('customer_ID',$data['customer_ID']); 
				$this->db->update('customer',$data); 
				
			}else{
				unset($data['customer_ID']);
				$id  = $this->generate_code->getUID(); 
				$this->db->set('customer_ID',$id);
				$this->db->insert('customer',$data);
				
			}
	
	}
	
	
	
	 
}
	
?>