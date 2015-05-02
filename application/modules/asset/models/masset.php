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
		
		$this->db->where('deleted', '0');
		
		$this->db->like('note', $data['note']);
		 
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
}
	
?>