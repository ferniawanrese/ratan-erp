<?php
class Mhrd extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	
	function employee_data($data,$page,$limit){
	
		$a = ($page-1) * $limit;
		$limitnya = ",".$a.",".$limit;
		
		$this->db->where('deleted', '0');
		
		//orderby
		if($data['orderby']!=""){
		$this->db->order_by($data['orderby'],$data['ascdsc']);
		}else{
		$this->db->order_by('dateCreated','DESC');
		}
		
		if(isset($data['filterplus'])){
		$this->db->like($data['filterplus']);
		}
		
		if(isset($data['filter'])){
		$this->db->like($data['filter']);
		}
				
		$query = $this->db->get('employee',$limit,$a);

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
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
	
	function employee_cat_count($data){
	
		$this->db->select('count(*) as totdata');
		$this->db->where('deleted', '0');
		$this->db->like('employee_catName', $data['search']);
		
		$query = $this->db->get('employee_cat');

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	}
	
	function employee_data_count($data){
	
		$this->db->select('count(*) as totdata');
		$this->db->where('deleted', '0');
		$this->db->order_by('datecreated','desc');	
		if(isset($data['filterplus'])){
		$this->db->like($data['filterplus']);
		}
		if(isset($data['filter'])){
		$this->db->like($data['filter']);
		}
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

	function save_employee($data,$img){
	
		if ($data['employee_hexaID']==""){
			unset($data['employee_hexaID']);
			
			if($img!= null){
			$this->db->set('employee_photo', $img);	
			}
			
			$this->db->set('employee_hexaID', $this->generate_code->getUID());	
			$this->db->insert('employee', $data); 
		}else{
			
			if($img!= null){
			$this->db->set('employee_photo', $img);	
			}
			
			$this->db->where('employee_hexaID',$data['employee_hexaID']);
			$this->db->update('employee', $data); 			
		}
	
		

	}
	
	function employeecat_parent(){
	$this->db->where('employee_catParentID','0');
	$query = $this->db->get('employee_cat');
	
	if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	}
	
	function employeecat_child(){
	$this->db->where('employee_catParentID !=','0');
	$query = $this->db->get('employee_cat');
	
	if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	}
	
	function employee_cat_add($data){
	
		$idparent = $this->generate_code->getUID();
		
		if($data['parent'] == '-1' && $data['parent_new'] !=""){
		$this->db->set('employee_catID', $idparent);	
		$this->db->set('employee_catName',$data['parent_new']);
		$this->db->insert('employee_cat');
		
			if($data['child']){
				$this->db->set('employee_catID', $this->generate_code->getUID());	
				$this->db->set('employee_catName',$data['child']);
				$this->db->set('employee_catParentID',$idparent);
				$this->db->insert('employee_cat');
			}
		}
		 
		if($data['parent'] != '-1' && $data['child'] !=""){
		
				$this->db->set('employee_catID', $this->generate_code->getUID());	
				$this->db->set('employee_catName',$data['child']);
				$this->db->set('employee_catParentID',$data['parent']);
				$this->db->insert('employee_cat');
		
		}
		 
	}
	
	
	function department_parent(){
	$this->db->where('department_parentID','0');
	$query = $this->db->get('department');
	
	if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	}
	
	function department_data($data=null,$page=null,$limit=null){
	
		$a = ($page-1) * $limit;
		$limitnya = ",".$a.",".$limit;
		
		$this->db->where('deleted', '0');
		
		$this->db->like('department_name', $data['search']);
		  
		if($page==null){
			$query = $this->db->get('department');
		}else{
			$query = $this->db->get('department',$limit,$a);
		}

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	}
	
	function department_data_count($data){
	
		$this->db->select('count(*) as totdata');
		$this->db->where('deleted', '0');
		$this->db->like('department_name', $data['search']);
		
		$query = $this->db->get('department');

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	}
	
	function department_add($data){
	
		$idparent = $this->generate_code->getUID();
		
		if($data['parent'] == '-1' && $data['parent_new'] !=""){
		$this->db->set('department_ID', $idparent);	
		$this->db->set('department_name',$data['parent_new']);
		$this->db->insert('department');
		
			if($data['child']){
				$this->db->set('department_ID', $this->generate_code->getUID());	
				$this->db->set('department_name',$data['child']);
				$this->db->set('department_parentID',$idparent);
				$this->db->insert('department');
			}
		}
		 
		if($data['parent'] != '-1' && $data['child'] !=""){
		
				$this->db->set('department_ID', $this->generate_code->getUID());	
				$this->db->set('department_name',$data['child']);
				$this->db->set('department_parentID',$data['parent']);
				$this->db->insert('department');
		
		}
		 
	}
	
	function job_data($data=null,$page=null,$limit=null){
	
		$a = ($page-1) * $limit;
		$limitnya = ",".$a.",".$limit;
		
		$this->db->join('department','department.department_ID = job.department_ID');
		
		$this->db->where('job.deleted', '0');
		
		$this->db->like('job_name', $data['search']);
		   
		$query = $this->db->get('job',$limit,$a);
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	}
	
	function job_data_count($data){
	
		$this->db->select('count(*) as totdata');
		$this->db->where('deleted', '0');
		$this->db->like('job_name', $data['search']);
		
		$query = $this->db->get('job');

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	}
	
	function get_position($department_ID){ 
	
		$this->db->where('department_ID',$department_ID); 
		
		$query = $this->db->get('job');

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	}
	
	function get_employee_name($name){ 
	
		$this->db->select('employee_name as label');
		
		$this->db->select('employee_ID as value');
	
		$this->db->like('employee_name',$name); 
		
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