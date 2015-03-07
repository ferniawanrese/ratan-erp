<?php
class Mhrd extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	 
	function employee_data($data,$page,$limit){
	
		$a = ($page-1) * $limit;
		$limitnya = ",".$a.",".$limit;
		
		$this->db->where('employee.deleted', '0');
		
		$this->db->where('employee.company_ID', $this->session->userdata('current_companyID'));
		
		//orderby
		if($data['orderby']!=""){
		$this->db->order_by($data['orderby'],$data['ascdsc']);
		}else{
		$this->db->order_by('employee.dateCreated','DESC');
		}
		
		if(isset($data['filterplus'])){
		$this->db->like($data['filterplus']);
		}
		
		if($data['sdepartment_ID'] != "-1"){
		$this->db->join('job','employee.job_ID = job.job_ID');
		$this->db->join('department','job.department_ID = department.department_ID ');
		$this->db->where('department.department_ID',$data['sdepartment_ID']);
		}
		
		if($data['semployee_positionID'] != "-1"){
		$this->db->where('employee.job_ID',$data['semployee_positionID']);
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
	
	function employee_cat_detail($employee_catID){
	 
		$this->db->where('employee_catID',$employee_catID);
		 
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
	
	function employee_cat_deleted($employee_catID){
	$this->db->set("deleted",1);
	$this->db->where('employee_catID',$employee_catID);
	$this->db->update("employee_cat");
	
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
		$this->db->where('employee.deleted', '0');
		$this->db->where('employee.company_ID', $this->session->userdata('current_companyID'));
		
		if($data['sdepartment_ID'] != "-1"){
		$this->db->join('job','employee.job_ID = job.job_ID');
		$this->db->join('department','job.department_ID = department.department_ID ');
		$this->db->where('department.department_ID',$data['sdepartment_ID']);
		}
		
		if($data['semployee_positionID'] != "-1"){
		$this->db->where('employee.job_ID',$data['semployee_positionID']);
		}	
		
		$this->db->order_by('employee.datecreated','desc');	
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
	
	function get_employee_detail($employee_ID){
	
		$this->db->select('employee_badge, employee_name, employee_ID');
	
		$this->db->where('employee_ID', $employee_ID);
		  
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
		 

	function employee_data_detail($employee_ID){
	
		$this->db->select('employee.*,job.job_ID,job.job_name');
	
		$this->db->where('employee_ID', $employee_ID);
		
		$this->db->where('employee.deleted', '0');
		
		$this->db->join('job', 'job.job_ID = employee.job_ID'); 
			
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
	
		$this->db->order_by('countryName','ASC');
		
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

	function employee_delete($employee_ID){
		
		$data = array(
               'deleted' => '1'              
            );

		$this->db->where('employee_ID', $employee_ID);
		$this->db->update('employee', $data); 


	}

	function save_employee($data,$img){
	 
			unset($data['employee_managerName']);
		if ($data['employee_ID']==""){
			unset($data['employee_ID']);
			
			if($img!= null){
			$this->db->set('employee_photo', $img);	
			}
			
			$this->db->set('employee_ID', $this->generate_code->getUID());	
			$this->db->set('employee_dateofbirth',date("Y-m-d", strtotime($data['employee_dateofbirth'])));
			unset($data['employee_dateofbirth']);
			
			if($data['employee_badge']){
			
			$badgeint =  preg_replace('/\D/', '', $data['employee_badge']) *1;
			
			$this->db->set('employee_badge_int',$badgeint);
			
			}
			
			$this->db->set('company_ID',  $this->session->userdata('current_companyID'));	
			
			$this->db->set('company_groupID',  $this->session->userdata('current_companygroupID'));
			
			$this->db->insert('employee', $data); 
			
		}else{
			
			if($img!= null){
			$this->db->set('employee_photo', $img);	
			}
			$this->db->set('employee_dateofbirth',date("Y-m-d", strtotime($data['employee_dateofbirth'])));
			
			if($data['employee_badge']){
			
			$badgeint =  preg_replace('/\D/', '', $data['employee_badge']) *1;
			
			$this->db->set('employee_badge_int',$badgeint);
			
			}
			
			unset($data['employee_dateofbirth']);
			$this->db->where('employee_ID',$data['employee_ID']);
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
	
	function employee_cat_update($data){
	
		 $this->db->where('employee_catID',$data['employee_catID'] );
		 $this->db->update("employee_cat",$data);
		 
	}
	
	function department_parent(){
	$this->db->where('department.company_ID',  $this->session->userdata('current_companyID'));
	$this->db->where('department.deleted','0');
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
		
		$this->db->select('department.*, employee.employee_name');
		
		$this->db->where('department.deleted', '0');
		
		$this->db->where('department.company_ID',  $this->session->userdata('current_companyID'));
		
		if($data['manager_ID']!=""){
		$this->db->where('manager_ID', $data['manager_ID']);
		}
		
		$this->db->like('department_name', $data['search']);
		
		$this->db->join('employee','employee.employee_ID =  department.manager_ID');
		
		$this->db->order_by('department.dateCreated','desc');
		  
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
		$this->db->where('department.company_ID',  $this->session->userdata('current_companyID'));
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
		$this->db->set('manager_ID',$data['manager_ID']);
		$this->db->set('company_ID', $this->session->userdata('current_companyID'));
		$this->db->insert('department');
		
			if($data['child']){
				$this->db->set('department_ID', $this->generate_code->getUID());	
				$this->db->set('department_name',$data['child']);
				$this->db->set('department_parentID',$idparent);
				$this->db->set('manager_ID',$data['manager_ID']);
				$this->db->set('company_ID', $this->session->userdata('current_companyID'));
				$this->db->insert('department');
			}
		}
		 
		if($data['parent'] != '-1' && $data['child'] !=""){
		
				$this->db->set('department_ID', $this->generate_code->getUID());	
				$this->db->set('department_name',$data['child']);
				$this->db->set('department_parentID',$data['parent']);
				$this->db->set('manager_ID',$data['manager_ID']);
				$this->db->set('company_ID', $this->session->userdata('current_companyID'));
				$this->db->insert('department');
		
		}
		 
	}
	
	function department_update($data){
		unset($data['employee_managerName']);
		$this->db->where('department_ID',$data['department_ID']);
		$this->db->update('department',$data);
	
	}
	
	function job_data($data=null,$page=null,$limit=null){
	
		$a = ($page-1) * $limit;
		$limitnya = ",".$a.",".$limit;
		
		$this->db->where('department.company_ID', $this->session->userdata('current_companyID'));
		
		$this->db->join('department','department.department_ID = job.department_ID');
		
		$this->db->where('job.deleted', '0');
		
		if($data['department_ID']!=""){
		$this->db->where('job.department_ID',$data['department_ID']);
		}
		
		$this->db->like('job_name', $data['search']);
		
		$this->db->order_by('job.datecreated', 'desc');
		   
		if($page==null){
			$query = $this->db->get('job');
		}else{
			$query = $this->db->get('job',$limit,$a);
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
	
	function job_data_count($data){
	
		$this->db->select('count(*) as totdata');
		$this->db->where('job.deleted', '0');
		$this->db->where('department.company_ID', $this->session->userdata('current_companyID'));
		
		$this->db->join('department','department.department_ID = job.department_ID');
		
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
	
		$this->db->where('deleted','0'); 
		
		if($department_ID != null){
	
			$this->db->where('department_ID',$department_ID); 
		
		}
		
		$this->db->order_by('datecreated','desc');
		
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
	  
		 $querynya = "select CONCAT ( employee.employee_name, '/', employee.employee_badge ) AS label,
								CONCAT ( employee.employee_name, '/', employee.employee_badge ) as value, employee_ID
								from employee where employee_name like '%".$name."%' limit 10" ;
								 
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
	
	function get_product_name($name){ 
	
		$this->db->select('product_name as label, product_name as value, product_ID, product_code as barcode');
		
		$this->db->where('deleted',0);
	  
		$this->db->like('product_name',$name);
		
		$query = $this->db->get('product');

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	 
			
	}
	
	function job_add($data){
	
			if($data['job_ID']!=""){ 
			
				$this->db->where('job_ID',$data['job_ID']); 
				$this->db->update('job',$data); 
				
			}else{
				unset($data['job_ID']);
				$id  = $this->generate_code->getUID(); 
				$this->db->set('job_ID',$id);
				$this->db->insert('job',$data);
				
			}
				
		 
	}
	
	function job_data_detail($job_ID){
		
		$this->db->where('job_ID',$job_ID);
		
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
	
	function job_position_deleted($job_ID){
		$this->db->set('deleted',1);
		$this->db->where('job_ID',$job_ID);
		$this->db->update('job');
		 
	}
	
	function department_detail($department_ID){
	
		$this->db->select('department.*,employee.employee_ID,employee.employee_name,employee.employee_badge');
		
		$this->db->where('department.department_ID',$department_ID);
		
		$this->db->join('employee' , 'employee.employee_ID = department.manager_ID');
		
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
	
	function department_delete($department_ID){
	
		$this->db->where('department_ID',$department_ID);
		$this->db->set('deleted',1);
		$this->db->update('department');
	
	}
	
	function timesheet_mapdata($data,$page,$limit){
	
	$a = ($page-1) * $limit;
	
	$this->db->join('timetracking', 'timetracking.timetracking_ID = timetrackingmap.timetracking_ID');
	 
	$this->db->join('task', 'timetracking.task_ID = task.task_ID');
	
	$this->db->join('project', 'task.project_ID = project.project_ID');
	
	$this->db->join('department', 'department.department_ID = project.department_ID');
	
	$this->db->where('timetrackingmap.employee_ID',$this->session->userdata('employee_ID'));
	
	if(isset($data['filter'])){
	$this->db->like($data['filter']);
	}
		 
	$this->db->order_by('timetracking.dateCreated','desc');
	 
	$query = $this->db->get('timetrackingmap',$limit,$a);

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function timesheet_mapdata_count($data){
	
	$this->db->select('count(*) as totdata');
	
	$this->db->join('timetracking', 'timetracking.timetracking_ID = timetrackingmap.timetracking_ID');
	 
	$this->db->join('task', 'timetracking.task_ID = task.task_ID');
	
	$this->db->join('project', 'task.project_ID = project.project_ID');
	
	$this->db->join('department', 'department.department_ID = project.department_ID');
	
	$this->db->where('timetrackingmap.employee_ID',$this->session->userdata('employee_ID'));
	
	if(isset($data['filter'])){
	$this->db->like($data['filter']);
	}
		 
	$this->db->order_by('timetracking.dateCreated','desc');
	 
	$query = $this->db->get('timetrackingmap');

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function timesheet_registerdata($data,$page,$limit){
	
	$a = ($page-1) * $limit;
	 
	$this->db->join('task', 'timetracking.task_ID = task.task_ID');
	
	$this->db->join('project', 'task.project_ID = project.project_ID');
	
	$this->db->join('department', 'department.department_ID = project.department_ID');
	
	$this->db->where('department.company_ID',  $this->session->userdata('current_companyID'));
	
	if(isset($data['filter'])){
	$this->db->like($data['filter']);
	}
	
	if(isset($data['filterplus'])){
		$this->db->like($data['filterplus']);
	}
	
	$this->db->where('timetracking.deleted','0');
	 
	$this->db->order_by('timetracking.dateCreated','desc');
	 
	$query = $this->db->get('timetracking', $limit,$a);

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function timeheet_data_detail($timetracking_ID){
	
	$this->db->where('timetracking_ID',$timetracking_ID);
	 
	$this->db->join('task', 'timetracking.task_ID = task.task_ID');
	
	$this->db->join('project', 'task.project_ID = project.project_ID');
	
	$this->db->join('department', 'department.department_ID = project.department_ID');
	 
	$this->db->order_by('timetracking.dateCreated','desc');
	 
	$query = $this->db->get('timetracking');

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function timesheet_registerdata_count($data){
	
	$this->db->select('count(*) as totdata');
	
	$this->db->join('task', 'timetracking.task_ID = task.task_ID');
	
	$this->db->join('project', 'task.project_ID = project.project_ID');
	
	$this->db->join('department', 'department.department_ID = project.department_ID');
	
	$this->db->where('department.company_ID',  $this->session->userdata('current_companyID'));
	
	if(isset($data['filter'])){
	$this->db->like($data['filter']);
	}
	
	if(isset($data['filterplus'])){
		$this->db->like($data['filterplus']);
	}
	 
	$this->db->order_by('timetracking.dateCreated','desc');
	
	$this->db->where('timetracking.deleted','0');
	 
	$query = $this->db->get('timetracking');

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function timesheet_add($data,$original_update){
	
		//add
		if($data['timetracking_ID']==''){
	
			unset($data['timetracking_ID']);
			unset($data['employee_name']);
			unset($data['project_ID']);
			unset($data['department_ID']);
			$datax = $data['employee_name_opt'];
			unset($data['employee_name_opt']);		
			
			$timetracking_ID = $this->generate_code->getUID();
			
		 
			 $this->db->set('deadline',  date("Y-m-d H:i:s", strtotime($data['deadline']))); 
			unset($data['deadline']);
			$this->db->set('register_date',  date("Y-m-d H:i:s", strtotime($data['register_date']))); 
			unset($data['register_date']);
			
			$this->db->set('timetracking_ID',$timetracking_ID);	
			$this->db->insert('timetracking',$data);
			 
			foreach($datax as $dat){
				$this->db->set('timetracking_ID',$timetracking_ID);
				$this->db->set('timetrackingmapID',$this->generate_code->getUID());
				$this->db->set('employee_ID',$dat);
				$this->db->insert('timetrackingmap');
			
			}
		
		}
		//update
		else{
		 
			unset($data['employee_name']);
			unset($data['project_ID']);
			unset($data['department_ID']);
			$datax = $data['employee_name_opt'];
			unset($data['employee_name_opt']);	
		
			$this->db->set('deadline',  date("Y-m-d H:i:s", strtotime($data['deadline']))); 
			unset($data['deadline']);
			$this->db->set('register_date',  date("Y-m-d H:i:s", strtotime($data['register_date']))); 
			unset($data['register_date']);
			
			$this->db->where('timetracking_ID',$data['timetracking_ID']);	
			$this->db->update('timetracking',$data);
			 
			foreach($datax as $dat){
			
				$pieces = explode("|", $dat);
				
				if($pieces[1] != "selected"){
				
				$this->db->set('timetracking_ID',$data['timetracking_ID']);
				$this->db->set('timetrackingmapID',$this->generate_code->getUID());
				$this->db->set('employee_ID',$dat);
				$this->db->insert('timetrackingmap');
				 
				}
				 
				unset($original_update[$pieces[0]]); 
				 
			}
			 
			foreach($original_update as $key){
			
				$this->db->where('timetracking_ID',$data['timetracking_ID']);
				$this->db->where('employee_ID',$key);
				$this->db->delete('timetrackingmap');
			
			}		
			
			 
		}
  
	}
	
	function get_project(){
	 
		$query = $this->db->get('project');

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
		function get_task(){
	 
		$query = $this->db->get('task');

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function get_task_detail($project_ID){
	
		$this->db->where('project_ID',$project_ID);
		
		$this->db->where('deleted','0');
		
		$this->db->order_by('datecreated','desc');
		
		$query = $this->db->get('task');

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function project_data($data=null,$page=null,$limit=null){
		
		if($data){
		$a = ($page-1) * $limit;
		$limitnya = ",".$a.",".$limit;
		}
		
		$this->db->join('department','department.department_ID = project.department_ID');
		
		$this->db->where('department.company_ID',  $this->session->userdata('current_companyID'));
		
		$this->db->where('project.deleted', '0');
		 		
		$this->db->like('project.project_name', $data['search']);
		
		
		if($data){   
		$query = $this->db->get('project',$limit,$a);
		}else{
		$query = $this->db->get('project');
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
	
	function get_project_detail($department_ID){
	
		$this->db->where('project.deleted','0');
		 
		$this->db->join('department','department.department_ID = project.department_ID');
		
		$this->db->where('department.department_ID', $department_ID);
		 		  
		$query = $this->db->get('project');
		  
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
		
	}
	
	function project_data_count($data){
	
		$this->db->select('count(*) as totdata');
		 
		$this->db->join('department','department.department_ID = project.department_ID');
		
		$this->db->where('department.company_ID',  $this->session->userdata('current_companyID'));
				
		$this->db->where('project.deleted', '0');
		 		
		$this->db->like('project.project_name', $data['search']);
		   
		$query = $this->db->get('project');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
		
	}
	
	function project_add($data){
		 
		if ($data['project_ID']==""){
			unset($data['project_ID']);
			 
			$this->db->set('project_ID',$this->generate_code->getUID());
			$this->db->insert('project',$data);
		}else{
			 
			$this->db->where('project_ID',$data['project_ID']);
			$this->db->update('project', $data); 			
		}
	
	}
	
	function project_detail($project_ID){
	
		$this->db->where('project_ID',$project_ID);
	 
		$this->db->join('department','department.department_ID = project.department_ID');
		
		$this->db->where('project.deleted', '0');
		 		 
		$query = $this->db->get('project');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
		
	}
	
	function project_deleted($project_ID){
	
		$this->db->where('project_ID',$project_ID);
		$this->db->set('deleted','1');
		$this->db->update('project');
	
	}
	
	function task_data($data,$page,$limit){
		
		$a = ($page-1) * $limit;
		$limitnya = ",".$a.",".$limit;
		
		$this->db->join('project','project.project_ID = task.project_ID');
		
		$this->db->join('department','department.department_ID = project.department_ID');
		
		$this->db->where('department.company_ID',  $this->session->userdata('current_companyID'));
		
		$this->db->where('task.deleted', '0');
		 		
		$this->db->like('task.task_name', $data['search']);
		
		$this->db->order_by('task.datecreated', 'desc');
		   
		$query = $this->db->get('task',$limit,$a);
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
		
	}
	
	function task_data_count($data){
	
		$this->db->select('count(*) as totdata');
		 
		$this->db->join('project','project.project_ID = task.project_ID');
		
		$this->db->join('department','department.department_ID = project.department_ID');
		
		$this->db->where('department.company_ID',  $this->session->userdata('current_companyID'));
		
		$this->db->where('task.deleted', '0');
		 		
		$this->db->like('task.task_name', $data['search']);
		   
		$query = $this->db->get('task');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
		
	}
	
	function task_add($data){
		 unset($data['department_ID']);
		if ($data['task_ID']==""){
			unset($data['task_ID']);
			 
			$this->db->set('task_ID',$this->generate_code->getUID());
			$this->db->insert('task',$data);
		}else{
			 
			$this->db->where('task_ID',$data['task_ID']);
			$this->db->update('task', $data); 			
		}
	
	}
	
	
	function task_detail($task_detail){
	
		$this->db->where('task_ID',$task_detail);
	 
		$this->db->join('project','project.project_ID = task.project_ID');
		
		$this->db->where('task.deleted', '0');
		 		 
		$query = $this->db->get('task');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
		
	}
	 
	
	function task_deleted($task_ID){
	
		$this->db->where('task_ID',$task_ID);
		$this->db->set('deleted','1');
		$this->db->update('task');
	
	}
	
	function timesheet_deleted($timetracking_ID){
	
	$this->db->where('timetracking_ID',$timetracking_ID);
		$this->db->set('deleted','1');
		$this->db->update('timetracking');
	
	}
	
	function get_employee_department($department_ID,$timetracking_ID){ 
	 
		 $querynya = "
			SELECT distinct employee.employee_ID,
			CONCAT ( employee.employee_name, '/', employee.employee_badge ) AS label,
			CONCAT ( employee.employee_name, '/', employee.employee_badge ) AS VALUE,
			employee.employee_ID,timetrackingmap.timetracking_ID,
			IF(timetrackingmap.timetracking_ID != '' , 'selected', '') AS selectnya
			FROM employee
			LEFT JOIN timetrackingmap
			ON employee.employee_ID = timetrackingmap.employee_ID
			AND timetrackingmap.timetracking_ID = '".$timetracking_ID."' 
				" ;
				 
								
		 $querynyax = "select CONCAT ( employee.employee_name, '/', employee.employee_badge ) AS label,
								CONCAT ( employee.employee_name, '/', employee.employee_badge ) as value, employee.employee_ID
								from employee left join timetrackingmap on  employee.employee_ID = timetrackingmap.employee_ID
								where timetrackingmap.timetracking_ID = '".$timetracking_ID."'
							 " ;
							 
							// echo  $querynya;
								 
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
	
	function employee_task($timetracking_ID){
	
		$this->db->join('employee','timetrackingmap.employee_ID = employee.employee_ID ');
		
		$this->db->where('timetrackingmap.timetracking_ID',$timetracking_ID);
		 
		$query = $this->db->get('timetrackingmap');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
		
	
	}
	
	function update_taskstatus($timetracking_ID,$status){
	
		$this->db->where('timetracking_ID',$timetracking_ID);
		$this->db->set('status_task',$status);
		$this->db->update('timetracking');
	
	}
	
	function update_taskstatus_map($timetrackingmapID,$status){
	
		$this->db->where('timetrackingmapID',$timetrackingmapID);
		$this->db->set('status_taskmap',$status);
		$this->db->update('timetrackingmap');
	
	}
	
	function update_taskstatusmap($timetrackingmapID,$status){
	
		$this->db->where('timetrackingmapID',$timetrackingmapID);
		$this->db->set('status_taskmap',$status);
		$this->db->update('timetrackingmap');
	
	}
	
	function timetrackingmap_del($employee_ID,$timetracking_ID){ 
		$this->db->where('employee_ID',$employee_ID);
		$this->db->where('timetracking_ID',$timetracking_ID); 
		$this->db->delete('timetrackingmap');
	
	}
	
	function get_timesheetmap($timetracking_ID){
	
	$this->db->select('employee_ID');
	
	$this->db->where('timetrackingmap.timetracking_ID',$timetracking_ID);
	
	$query = $this->db->get('timetrackingmap');
	 
			if ($query->num_rows() )
			{
				 foreach ($query->result() as $row)
						   {
							  $dataemployee[$row->employee_ID] =  $row->employee_ID; 
						   }
						   
						   return $dataemployee;
			}
			else
			{
				return FALSE;
			}		
	
	}
	
	function attendances_data($data,$page,$limit){
		
		$a = ($page-1) * $limit;
		$limitnya = ",".$a.",".$limit;
		 
		$this->db->join('employee','employee.employee_badge = attendance.employee_badge');
		
		$this->db->order_by('attendance.date','desc');
		 
		$query = $this->db->get('attendance',$limit,$a);
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
		
	}
	
	function attendances_data_count($data){
	
		$this->db->select('count(*) as totdata');
		
		$this->db->join('employee','employee.employee_badge = attendance.employee_badge');
		  
		$query = $this->db->get('attendance');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
		
	}
	
	function appraisal_data($data,$page,$limit){
		
		$a = ($page-1) * $limit;
		$limitnya = ",".$a.",".$limit;
		 
		$this->db->join('employee','employee.employee_ID = appraisal.employee_ID');
		 
		$query = $this->db->get('appraisal',$limit,$a);
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
		
	}
	
		function appraisal_datac($data,$page,$limit){
		
		$a = ($page-1) * $limit;
		$limitnya = ",".$a.",".$limit;
		 
		$this->db->join('employee','employee.employee_ID = interview.employee_ID');
		 
		$query = $this->db->get('interview',$limit,$a);
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
		
	}
	
	function appraisal_data_count($data){
	
		$this->db->select('count(*) as totdata');
		
		$this->db->join('employee','employee.employee_ID = appraisal.employee_ID');
		  
		$query = $this->db->get('appraisal');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
		
	}
	
	function autobadge($data){
	
	$this->db->where('company_ID', $this->session->userdata('current_companyID'));
	$this->db->update('company',$data);
	
	}
	
	function autobadge_data(){
	
		$this->db->where('company_ID', $this->session->userdata('current_companyID'));
	 
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
	
	function badge_inc(){
	
	$this->db->select("employee.employee_badge_int, company.badge,company.badge_leadingzeros");
	 
	$this->db->where("employee.company_ID", $this->session->userdata('current_companyID'));
	
	$this->db->join("company", "employee.company_ID = company.company_ID");
	
	$this->db->order_by("employee_badge_int","desc");
	
	$this->db->limit("1");
	
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
	
	function company_detail(){
	
	$this->db->where("company.company_ID", $this->session->userdata('current_companyID'));
	
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
	
	function badge_cek($badge_code){
	
	/*$querynya = "SELECT IF( EXISTS(
             SELECT *
             FROM employee
             WHERE employee_badge=  '".$badge_code."'), 1, 0) as exist";
	*/
	
	$querynya = " 
             SELECT employee_badge
             FROM employee
             WHERE employee_badge=  '".$badge_code."'";	 
	
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
	
	function barcode_check($barcode){
	
	$querynya = " 
             SELECT *
             FROM product
             WHERE product_code=  '".$barcode."'";	 
	
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
	
	function expends_data(){
	
			$this->db->select('expense.*,employee.employee_name, currency.currency_code ');
			
			$this->db->join("currency", "currency.currency_ID = expense.currency_ID");
	
			$this->db->join("employee", "employee.employee_ID = expense.employee_ID");

			$this->db->order_by('expense.dateCreated', 'desc');
			
			$this->db->where('expense.deleted',0);
	
			$query = $this->db->get('expense');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function expends_data_count(){
	
			$this->db->select('count(*) as totdata');
			
			$this->db->join("currency", "currency.currency_ID = expense.currency_ID");
	
			$this->db->join("employee", "employee.employee_ID = expense.employee_ID");

			
			$this->db->where('expense.deleted',0);
	
			$query = $this->db->get('expense');
	 
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
	
	
	function uom(){
	
			$this->db->where('deleted',0);
	 
			$query = $this->db->get('uom');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function expends_add_action($data){
		 
			$expends_detail = $data['expends_detail'];
			
			unset($data['expends_detail']);
	
		if($data['expense_ID']==""){
		
			// insert new expend
	
			$expense_ID = $this->generate_code->getUID();	
			 
			unset($data['expense_ID']);
			
			unset($data['expense']);
			
			unset($data['employee']);
			 
			$this->db->set('date',date('y-m-d',strtotime($data['date'])));
			
			unset($data['date']);
			
			$this->db->set('expense_ID',$expense_ID);
			 
			$this->db->insert('expense',$data);
			 
		} else {
		
			// update expenses
			
			$expense_ID = $data['expense_ID'];
			  
			unset($data['expense']);
			
			unset($data['employee']);
			 
			$this->db->set('date',date('y-m-d',strtotime($data['date'])));
			
			unset($data['date']);
			
			$this->db->where('expense_ID', $expense_ID);
			
			$this->db->update('expense',$data);
			
			  
		}
		 
		// expense detail update
		
			$total=0;
			foreach($expends_detail as $det){
			
				if($det['expense_detaiID'] == ""){
				
				$total = $det['sub_total'] + $total;
				 
				$this->db->set('expense_detaiID',$this->generate_code->getUID());
				
				$this->db->set('expense_ID', $expense_ID);
				  
				$this->db->insert('expense_detail',$det);
				 
				} else{
				
				$total = $det['sub_total'] + $total;
				
				$this->db->where('expense_detaiID', $det['expense_detaiID']);
				
				$this->db->update('expense_detail',$det);
				
				}
			
			}
		
			
		
			$this->db->where('expense_ID',$expense_ID);
			
			$this->db->set('total_amount',$total);
			
			$this->db->update('expense');
	  
	}
	
	function get_expends_data($expense_ID){
	
		$this->db->select('expense.*,employee.employee_name');
	
		$this->db->where('expense_ID',$expense_ID);
		
		$this->db->join('employee','expense.employee_ID = employee.employee_ID');
		
		$this->db->order_by('dateCreated', 'desc');
	
		$query = $this->db->get('expense');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function get_expends_data_detail($expense_ID){
	
		$this->db->where('expense_ID',$expense_ID);
		
		$this->db->join('product', 'expense_detail.product_ID = product.product_ID');
		
		$this->db->order_by('expense_detail.dateCreated', 'asc');
		
		$this->db->where('expense_detail.deleted',0);
	
		$query = $this->db->get('expense_detail');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function get_expends_detail($expense_detailID){
	
		$this->db->where('expense_detaiID',$expense_detailID);
		
		$this->db->join('product', 'expense_detail.product_ID = product.product_ID');
		
		$this->db->where('expense_detail.deleted',0);
		 
		$query = $this->db->get('expense_detail');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function product_data($data,$page,$limit){
	
		$a = ($page-1) * $limit;
		$limitnya = ",".$a.",".$limit;
		
		$this->db->like('product.product_name',$data['search']);
	
		$this->db->join('uom','product.UoM_ID = uom.UoM_ID');
		
		$this->db->where('product.deleted',0);
		
		$this->db->order_by('product.dateCreated','desc');
	
		$query = $this->db->get('product',$limit,$a);
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function product_data_count($data){
	
		$this->db->select('count(*) as totdata');
		
		$this->db->like('product.product_name',$data['search']);
		
		$this->db->where('product.deleted',0);
	
		$query = $this->db->get('product');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function product_add($data){
	
		if($data['product_ID']==""){
		
		unset($data['product_ID']);
		
		if($data['product_code']==""){
		
		unset($data['product_code']);
		
		$code = date('Ymdhis').rand(10,100);
		
		$this->db->set('product_code',$code);	
		
		}
	
		$this->db->set('product_ID',$this->generate_code->getUID());	
	
		$this->db->insert('product',$data);
		
		}else{
		
		$this->db->where('product_ID',$data['product_ID']);
		
		$this->db->update('product',$data);
		
		}
	
	}
	
	function product_data_detail($product_ID){
		
		$this->db->where('product_ID',$product_ID);
	
		$query = $this->db->get('product');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function product_delete($product_ID){
	
		$this->db->where('product_ID',$product_ID);
	
		$this->db->set('deleted','1');
	
		$this->db->update('product');
	
	}
	
	function uom_data($data,$page,$limit){
	
		$a = ($page-1) * $limit;
		$limitnya = ",".$a.",".$limit;
		
		$this->db->like('uom.uom_name',$data['search']);
		
		$this->db->where('uom.deleted',0);
		
		$this->db->order_by('uom.dateCreated','desc');
	
		$query = $this->db->get('uom',$limit,$a);
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function uom_data_count($data){
	
		$this->db->select('count(*) as totdata');
		
		$this->db->like('uom.uom_name',$data['search']);
		
		$this->db->where('uom.deleted',0);
	
		$query = $this->db->get('uom');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function uom_data_detail($UoM_ID){
	
		$this->db->where('UoM_ID',$UoM_ID);
	
		$query = $this->db->get('uom');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function uom_add($data){
	
		if($data['UoM_ID']==""){
		
		unset($data['UoM_ID']);
		  
		$this->db->set('UoM_ID',$this->generate_code->getUID());	
	
		$this->db->insert('uom',$data);
		
		}else{
		
		$this->db->where('UoM_ID',$data['UoM_ID']);
		
		$this->db->update('uom',$data);
		
		}
	
	}
	
	function uom_delete($UoM_ID){
	
		$this->db->where('UoM_ID',$UoM_ID);
	
		$this->db->set('deleted','1');
	
		$this->db->update('uom');
	
	}
	
	function currency_data($data,$page,$limit){
	
		$a = ($page-1) * $limit;
		$limitnya = ",".$a.",".$limit;
		
		$this->db->like('currency.currency_name',$data['search']);
		
		$this->db->where('currency.deleted',0);
		
		$this->db->order_by('currency.dateCreated','desc');
	
		$query = $this->db->get('currency',$limit,$a);
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function currency_data_count($data){
	
		$this->db->select('count(*) as totdata');
		
		$this->db->like('currency.currency_name',$data['search']);
		
		$this->db->where('currency.deleted',0);
	
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
	
	function currency_data_detail($currency_ID){
	
		$this->db->where('currency_ID',$currency_ID);
	
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
	
	function currency_add($data){
	
		if($data['currency_ID']==""){
		
		unset($data['currency_ID']);
		  
		$this->db->set('currency_ID',$this->generate_code->getUID());	
	
		$this->db->insert('currency',$data);
		
		}else{
		
		$this->db->where('currency_ID',$data['currency_ID']);
		
		$this->db->update('currency',$data);
		
		}
	
	}
	
	function currency_delete($currency_ID){
	
		$this->db->where('currency_ID',$currency_ID);
	
		$this->db->set('deleted','1');
	
		$this->db->update('currency');
	
	}
	
	function get_currency(){
	
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
	
	function expends_approval($stat,$expense_ID){
	
		$this->db->where('expense_ID',$expense_ID);
	
		$this->db->set('approved	',$stat);
		
		if($stat==1){
		
		$this->db->set('state','Approved');
		
		}
		
		if($stat==0){
		
		$this->db->set('state','Refused');
		
		}
	
		$this->db->update('expense');
	
	}
	
	function expense_state($expense_ID){
	
		$this->db->where('expense_ID',$expense_ID);
	 
		$this->db->set('state','Invoiced');
		 
		$this->db->update('expense');
	
	}
	
	function leave_type_data($data,$page,$limit){
	
		$a = ($page-1) * $limit;
		$limitnya = ",".$a.",".$limit;
	
		$this->db->like('leave_type.leave_type_name',$data['search']);
	
		$this->db->where('deleted',0);
		
		$this->db->order_by('dateCreated','desc');
	
		$query = $this->db->get('leave_type',$limit,$a);
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function leave_type_data_count($data){
	
		$this->db->select('count(*) as totdata');
		
		$this->db->like('leave_type.leave_type_name',$data['search']);
	
		$this->db->where('deleted',0);
	
		$query = $this->db->get('leave_type');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function leave_type_data_detail($leave_typeID){
	
		$this->db->where('leave_typeID',$leave_typeID);
	
		$this->db->where('deleted',0);
	
		$query = $this->db->get('leave_type');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	
	}
	
	function leave_type_add($data){
	 
		if($data['leave_typeID']==""){
		
			$data_detail = $data['date_detail'];
			
			unset($data['date_detail']);
			
			unset($data['leave_typeID']);
			
			$leave_typeID = $this->generate_code->getUID();
			  
			$this->db->set('leave_typeID',$leave_typeID);	
		
			$this->db->insert('leave_type',$data);
			
			//--detail
			
			foreach($data_detail as $det){
			
			$this->db->set('leave_typeID',$leave_typeID);	
			
			$this->db->set('leave_type_dateID',$this->generate_code->getUID());	
			
			$this->db->set('date_allow',date("Y-m-d", strtotime($det['date_allow']))); 
			
			unset($det['date_allow']);
			
			unset($det['leave_type_dateID']);
			
			$this->db->insert('leave_type_date',$det);
			
			}
			
		}else{
		
			$data_detail = $data['date_detail'];
			
			unset($data['date_detail']);
		
			$this->db->where('leave_typeID',$data['leave_typeID']);
		
			$this->db->update('leave_type',$data);
			
			
			foreach($data_detail as $det){
			
				if($det['leave_type_dateID'] == ""){
				
				unset($det['leave_type_dateID']);
			 
				$this->db->set('leave_type_dateID',$this->generate_code->getUID());	
				
				$this->db->set('leave_typeID',$data['leave_typeID']);
				
				$this->db->set('date_allow',date("Y-m-d", strtotime($det['date_allow']))); 
				
				unset($det['date_allow']);
				 
				$this->db->insert('leave_type_date',$det);
				
				}
				
				else if($det['leave_type_dateID'] != ""){
			
				$this->db->where('leave_type_dateID',$det['leave_type_dateID']);	
				 
				$this->db->set('date_allow',date("Y-m-d", strtotime($det['date_allow']))); 
				
				unset($det['date_allow']);
				
				$this->db->update('leave_type_date',$det);
				
				}
			
			}
		
		}
		
		
	
	}
	
	function leave_type_delete($leave_typeID){
	
		$this->db->where('leave_typeID',$leave_typeID);
	
		$this->db->set('deleted','1');
	
		$this->db->update('leave_type');
	
	}
	
	function date_detail($leave_typeID){
	
		$this->db->where('leave_type_date.leave_typeID',$leave_typeID);
	
		$this->db->where('deleted',0);
		
		$this->db->order_by('dateCreated','ASC');
	
		$query = $this->db->get('leave_type_date');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	
	}
	
	function leave_type_datedetail($leave_type_dateID){
	
		$this->db->where('leave_type_date.leave_type_dateID',$leave_type_dateID);
	
		$this->db->where('deleted',0);
	
		$query = $this->db->get('leave_type_date');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	
	}
	
	function leave_type_datedetail_update($data){
	
		$this->db->where('leave_type_dateID',$data['leave_type_dateID']);
	 
		$this->db->update('leave_type_date',$data);
	
	}
	
	function expends_delete($expense_ID){
	
		$this->db->where('expense_ID',$expense_ID);
	
		$this->db->set('deleted','1');
	
		$this->db->update('expense');
	
	}
	
	function get_leave_month($date_start,$date_end){
	
		$this->db->where('leave_type_date.date_allow >=',$date_start);
		
		$this->db->where('leave_type_date.date_allow <=',$date_end);
	
		$this->db->join('leave_type','leave_type.leave_typeID =  leave_type_date.leave_typeID ');
	
		$query = $this->db->get('leave_type_date');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function get_leave_type(){
	
		$this->db->where('deleted',0);
	
		$query = $this->db->get('leave_type');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function leaves_add($data){
	 
		unset($data['employee']);
		 
		if($data['leave_ID']==""){
		
		unset($data['leave_ID']);
	 
		$this->db->set('leave_ID',$this->generate_code->getUID());
		
		$this->db->set('date_start',date("Y-m-d", strtotime($data['date_start'])));
		
		$this->db->set('date_end',date("Y-m-d", strtotime($data['date_end'])));
		
		unset($data['date_end']);
		
		unset($data['date_start']);
	
		$this->db->insert('leave',$data);
		
		}else{
		
		$this->db->set('date_start',date("Y-m-d", strtotime($data['date_start'])));
		
		$this->db->set('date_end',date("Y-m-d", strtotime($data['date_end'])));
		
		unset($data['date_end']);
		
		unset($data['date_start']);
		
		$this->db->where('leave_ID',$data['leave_ID']);
		 
		$this->db->update('leave',$data);
		
		}
	
	}
	
	function leave_approval_data($data,$page,$limit){
	
		$a = ($page-1) * $limit;
		$limitnya = ",".$a.",".$limit;
	
		$this->db->select('leave.*,employee.employee_name, leave_type.leave_type_name');
		
		$this->db->like('employee.employee_name',$data['search']);
	
		$this->db->join('employee','leave.employee_ID = employee.employee_ID');
		
		$this->db->join('leave_type','leave_type.leave_typeID = leave.leave_typeID');
		
		$this->db->order_by('leave.dateCreated','desc');
		
		$this->db->where('leave.deleted','0');
	
		$query = $this->db->get('leave',$limit,$a);
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function leave_approval_data_count($data){
		
		$this->db->select('count(*) as totdata');
		
		$this->db->like('employee.employee_name',$data['search']);
	
		$this->db->join('employee','leave.employee_ID = employee.employee_ID');
		
		$this->db->join('leave_type','leave_type.leave_typeID = leave.leave_typeID');
		
		$this->db->where('leave.deleted','0');
	 
		$query = $this->db->get('leave');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function leaves_approval_stat($leave_ID, $stat){
	
		$this->db->where('leave_ID',$leave_ID);
	
		$this->db->set('approved',$stat);
	
		$this->db->update('leave');
	
	}
	
	function leave_approval_delete($leave_ID){
	
		$this->db->where('leave_ID',$leave_ID);
	
		$this->db->set('deleted','1');
	
		$this->db->update('leave');
	
	}
	
	function leave_detail($leave_ID){
	
		$this->db->select('leave.*,employee.employee_name,employee.employee_ID');
	
		$this->db->where('leave_ID',$leave_ID);
		
		$this->db->join('employee','leave.employee_ID = employee.employee_ID');
	
		$query = $this->db->get('leave');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function allowance_data($data,$page,$limit){
	
		$a = ($page-1) * $limit;
		$limitnya = ",".$a.",".$limit;
		
		$this->db->like('allowance_name',$data['search']);
		
		$this->db->where('deleted',0);
		
		$this->db->order_by('dateCreated','desc');
	
		$query = $this->db->get('allowance',$limit,$a);
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function allowance_data_count($data){
	
		$this->db->select('count(*) as totdata');
		
		$this->db->where('deleted',0);
	
		$query = $this->db->get('allowance');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function allowance_deleted($allowance_ID){
		
		$this->db->where('allowance_ID',$allowance_ID);
		
		$this->db->set('deleted',1);
	
		$this->db->update('allowance');
	
	}
	
	function allowance_detail($allowance_ID){
	
		$this->db->where('allowance_ID',$allowance_ID);
	
		$query = $this->db->get('allowance');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function allowance_add($data){
	
		if($data['allowance_ID']!=""){ 
			
				$this->db->where('allowance_ID',$data['allowance_ID']); 
				$this->db->update('allowance',$data); 
				
			}else{
				unset($data['allowance_ID']);
				$id  = $this->generate_code->getUID(); 
				$this->db->set('allowance_ID',$id);
				$this->db->insert('allowance',$data);
				
			}
	}
	
	function tax_data($data,$page,$limit){
	
		$a = ($page-1) * $limit;
		$limitnya = ",".$a.",".$limit;
		
		$this->db->like('tax_name',$data['search']);
		
		$this->db->where('deleted',0);
		
		$this->db->order_by('dateCreated','desc');
	
		$query = $this->db->get('tax',$limit,$a);
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function tax_data_count($data){
	
		$this->db->like('tax_name',$data['search']);
	
		$this->db->select('count(*) as totdata');
		
		$this->db->where('deleted',0);
	
		$query = $this->db->get('tax');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function tax_detail($tax_ID){
	
		$this->db->where('tax_ID',$tax_ID);
	
		$query = $this->db->get('tax');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function tax_add($data){
	
		if($data['tax_ID']!=""){ 
			
				$this->db->where('tax_ID',$data['tax_ID']); 
				$this->db->update('tax',$data); 
				
			}else{
				unset($data['tax_ID']);
				$id  = $this->generate_code->getUID(); 
				$this->db->set('tax_ID',$id);
				$this->db->insert('tax',$data);
				
			}
	
	}
	
	function tax_delete($tax_ID){
	
		$this->db->where('tax_ID',$tax_ID);
		
		$this->db->set('deleted',1);
	
		$this->db->update('tax');
	
	}
	
	function payslip_data(){
	
		$this->db->where('deleted',0);
		
		$this->db->where('employee.company_ID', $this->session->userdata('current_companyID'));
		 
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
	
	function payslip_data_count($data){
	
		 
		$this->db->select('count(*) as totdata');
		
		$this->db->where('employee.company_ID', $this->session->userdata('current_companyID'));
		 
		$this->db->where('deleted',0);
	
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
	
	function payslip_detail($employee_ID){
	
		$this->db->select('employee.employee_name,employee.employee_salary,employee.employee_maritalstat, employee.employee_badge,employee.employee_ID');
		
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
	
	function deduction_stat($stat){
	
		$this->db->where('deduction_stat',$stat);
		
		$this->db->where('deleted',0);
	
		$query = $this->db->get('allowance');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function tax(){
	 
		$this->db->where('deleted',0);
	
		$query = $this->db->get('tax');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function weekend_data(){
	
		$this->db->where('deleted',0);
	
		$query = $this->db->get('weekend');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function weekend_data_count(){
	
		$this->db->select('count(*) as totdata');
		
		$this->db->where('deleted',0);
	
		$query = $this->db->get('weekend');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function weekend_add($data){
	
		
		$id  = $this->generate_code->getUID(); 
		$this->db->set('weekend_ID',$id);
		$this->db->insert('weekend',$data);
	
	}
	
	function total_in($data,$date_start,$date_end){
	
		$date_start =  date("Y-M-d", strtotime($date_start));
		
		$date_end =  date("Y-M-d", strtotime($date_end));
	  
		$this->db->where('employee_badge',$data[0]['employee_badge']);
		
		$this->db->where('date >=',date("Y-m-d", strtotime($date_start)));
		
		$this->db->where('date <=',date("Y-m-d", strtotime($date_end)));
	
		$query = $this->db->get('attendance');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function get_weekend(){
	
	$this->db->where('company_ID', $this->session->userdata('current_companyID'));
	
	$query = $this->db->get('weekend');
	 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function applicant_add($data){
	 
		$applicant_ID  = $this->generate_code->getUID(); 		
		$this->db->set('applicant_ID',$applicant_ID);
		$this->db->set('date_closed',date("Y-m-d", strtotime($data['date_closed'])));
		unset($data[date_closed]);
		$this->db->insert('applicant',$data);
	
	}
	
	function applicant_data($data){
	
	$this->db->select('applicant.*,department.department_name,job.job_name');
	
	$this->db->where('applicant.deleted',0);
	
	$this->db->join('department','department.department_ID = applicant.department_ID');
	
	$this->db->join('job','job.job_ID = applicant.job_ID');
  
	$query = $this->db->get('applicant');
		 
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	
	}
	
	function applicant_data_count($data){
	
	$this->db->select('count(*) as totdata');
		 
	$this->db->where('deleted',0);
 
	$query = $this->db->get('applicant');
	 
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