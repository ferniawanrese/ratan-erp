<?php
class Masset extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	  
	function employee_cat($data,$page,$limit){
	
		$a = ($page-1) * $limit;
		$limitnya = ",".$a.",".$limit;
		
		$this->db->where('deleted', '0');
		
		$this->db->like('employee_catName', $data['search']);
		 
		$query = $this->db->get('employee_cat',$limit,$a);

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	}
	
	function asset_data($data,$page,$limit){
	
		$a = ($page-1) * $limit;
		$limitnya = ",".$a.",".$limit;
		
		$this->db->select('asset.*, product.product_name, asset_state.state_name, asset_group.group_name, employee.employee_name, 
		employee.employee_badge,department.department_parentID,department.department_name');
		
		$this->db->where('asset.deleted', '0');
		
		$this->db->like('asset_name', $data['search']);
		
		$this->db->join('product','asset.product_ID = product.product_ID');
		
		$this->db->join('asset_state','asset.asset_stateID = asset_state.asset_stateID');
		
		$this->db->join('asset_group','asset.asset_groupID = asset_group.asset_groupID');
		
		$this->db->join('employee','asset.employee_ID = employee.employee_ID');
		
		$this->db->join('department','department.department_ID = asset.department_ID');
		 
		$query = $this->db->get('asset',$limit,$a);

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	
	}
	
	function asset_data_count($data){
	
		$this->db->select('count(*) as totdata'); 
		
		$this->db->where('deleted', '0');
		
		$this->db->like('asset_name', $data['search']);
		 
		$query = $this->db->get('asset');

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	
	
	}
	
	function asset_detail($asset_ID){
	
		$this->db->select('asset.*, employee.employee_name,employee.employee_badge,product.product_name,product.product_code');
	 
		$this->db->where('asset.deleted', '0');
		
		$this->db->where('asset_ID', $asset_ID);
		
		$this->db->join('employee', 'employee.employee_ID = asset.employee_ID');
		
		$this->db->join('product', 'product.product_ID = asset.product_ID');
		 
		$query = $this->db->get('asset');

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	
	}
	
	function asset_add($data){
	
		if($data['asset_ID']!=""){ 
			
				$this->db->where('asset_ID',$data['asset_ID']); 
				$this->db->update('asset',$data); 
				
			}else{
				unset($data['asset_ID']);
				$id  = $this->generate_code->getUID(); 
				$this->db->set('asset_ID',$id);
				$this->db->insert('asset',$data);
				
			}
	
	}
	
	function asset_group_data($data,$page,$limit){
	
		$a = ($page-1) * $limit;
		$limitnya = ",".$a.",".$limit;
		
		$this->db->where('deleted', '0');
		
		$this->db->like('description', $data['search']);
		 
		$query = $this->db->get('asset_group',$limit,$a);

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	
	}
	
	function get_asset_group(){
	 
		$this->db->where('deleted', '0');
		 
		$query = $this->db->get('asset_group');

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	
	}
	
	function asset_state_data($data,$page,$limit){
	
		$a = ($page-1) * $limit;
		$limitnya = ",".$a.",".$limit;
		
		$this->db->where('deleted', '0');
		
		$this->db->like('description', $data['search']);
		 
		$query = $this->db->get('asset_state',$limit,$a);

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	
	}
	
	function get_asset_state(){
	 
		$this->db->where('deleted', '0');
		 
		$query = $this->db->get('asset_state');

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	
	}
	
	function asset_delete($asset_ID){
		
		$this->db->where('asset_ID',$asset_ID);
		
		$this->db->set('deleted',1);
	
		$this->db->update('asset');
	
	}
	
	function asset_group_detail($asset_groupID){
	 
		$this->db->where('deleted', '0');
		
		$this->db->where('asset_groupID', $asset_groupID);
		 
		$query = $this->db->get('asset_group');

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	
	}
	
	function asset_group_add($data){
	
		if($data['asset_groupID']!=""){ 
			
				$this->db->where('asset_groupID',$data['asset_groupID']); 
				$this->db->update('asset_group',$data); 
				
			}else{
				unset($data['asset_groupID']);
				$id  = $this->generate_code->getUID(); 
				$this->db->set('asset_groupID',$id);
				$this->db->insert('asset_group',$data);
				
			}
	
	}
	
	function asset_group_delete($asset_groupID){
		
		$this->db->where('asset_groupID',$asset_groupID);
		
		$this->db->set('deleted',1);
	
		$this->db->update('asset_group');
	
	}
	
	function asset_group_data_count($data){
	
		$this->db->select('count(*) as totdata'); 
		
		$this->db->where('deleted', '0');
		
		$this->db->like('description', $data['search']);
		 
		$query = $this->db->get('asset_group');

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	
	}
	
	 function asset_state_data_count($data){
	
		$this->db->select('count(*) as totdata'); 
		
		$this->db->where('deleted', '0');
		
		$this->db->like('description', $data['search']);
		 
		$query = $this->db->get('asset_state');

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	
	}
	
	function asset_state_detail($asset_stateID){
	 
		$this->db->where('deleted', '0');
		
		$this->db->where('asset_stateID', $asset_stateID);
		 
		$query = $this->db->get('asset_state');

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	
	}
	
	function asset_state_add($data){
	
		if($data['asset_stateID']!=""){ 
			
				$this->db->where('asset_stateID',$data['asset_stateID']); 
				$this->db->update('asset_state',$data); 
				
			}else{
				unset($data['asset_stateID']);
				$id  = $this->generate_code->getUID(); 
				$this->db->set('asset_stateID',$id);
				$this->db->insert('asset_state',$data);
				
			}
	
	}
	
	
	function asset_state_delete($asset_stateID){
		
		$this->db->where('asset_groupID',$asset_stateID);
		
		$this->db->set('deleted',1);
	
		$this->db->update('asset_state');
	
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