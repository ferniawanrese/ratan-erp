<?php
class Mpurchase extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	function shipping_data($data,$page,$limit){
	
		$a = ($page-1) * $limit;
		$limitnya = ",".$a.",".$limit;
		
		$this->db->where('deleted', '0');
		
		$this->db->like('shipping_name', $data['search']);
		 
		$query = $this->db->get('shipping',$limit,$a);

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	
	}
	
	function shipping_data_count($data){
	
		$this->db->select('count(*) as totdata'); 
		
		$this->db->where('deleted', '0');
		
		$this->db->like('shipping_name', $data['search']);
		 
		$query = $this->db->get('shipping');

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	
	}
	
	function shipping_detail($shipping_ID){
	 
		$this->db->where('deleted', '0');
		
		$this->db->where('shipping_ID', $shipping_ID);
		 
		$query = $this->db->get('shipping');

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	
	}
	
	function shipping_add($data){
	
		if($data['shipping_ID']!=""){ 
			
				$this->db->where('shipping_ID',$data['shipping_ID']); 
				$this->db->update('shipping',$data); 
				
			}else{
				unset($data['shipping_ID']);
				$id  = $this->generate_code->getUID(); 
				$this->db->set('shipping_ID',$id);
				$this->db->insert('shipping',$data);
				
			}
	
	}
	  
	function vendor_data($data,$page,$limit){
	
		$a = ($page-1) * $limit;
		$limitnya = ",".$a.",".$limit;
		
		$this->db->where('deleted', '0');
		
		$this->db->like('vendor_name', $data['search']);
		 
		$query = $this->db->get('vendor',$limit,$a);

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	
	}
	
	 function vendor_data_count($data){
	
		$this->db->select('count(*) as totdata'); 
		
		$this->db->where('deleted', '0');
		
		$this->db->like('description', $data['search']);
		 
		$query = $this->db->get('vendor');

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	
	}
	
	function vendor_detail($vendor_ID){
	 
		$this->db->where('deleted', '0');
		
		$this->db->where('vendor_ID', $vendor_ID);
		 
		$query = $this->db->get('vendor');

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	
	}
	
	function vendor_add($data){
	
		if($data['vendor_ID']!=""){ 
			
				$this->db->where('vendor_ID',$data['vendor_ID']); 
				$this->db->update('vendor',$data); 
				
			}else{
				unset($data['vendor_ID']);
				$id  = $this->generate_code->getUID(); 
				$this->db->set('vendor_ID',$id);
				$this->db->insert('vendor',$data);
				
			}
	
	}
	
	function vendor_delete($vendor_ID){
		
		$this->db->where('vendor_ID',$vendor_ID);
		
		$this->db->set('deleted',1);
	
		$this->db->update('vendor');
	
	}
}
	
?>