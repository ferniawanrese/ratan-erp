<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class hrd extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		
		//$this->load->model('login');
		
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');  
		$this->load->model('Mhrd');  
		$this->load->library('encrypt');
		$this->load->library('generate_code');
		$this->load->library('core');
		$this->load->library('image_lib');
		$this->load->library('session');
		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
		$this->output->set_header('Pragma: no-cache');
		if($this->session->userdata('employee_access')!='1'){
			redirect(base_url(''));
		}
	} 
	
	public function index()
	{
		
		$output['data']['module_name'] = "Human Resources";
		
		$output['data']['menu_name'] = "HRD";
		
		$output['content'] = "hrd/hrd";
		
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
		
	}
	
	function employee_cat()
	{
		
		$output['data']['module_name'] = "Human Resources";
		
		$output['data']['menu_name'] = "HRD";
		
		$output['content'] = "hrd/employee_cat";
		
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
		
	}
	
	function employee_cat_data($page=1){
	
		$data['limit'] = 10;
		
		$data['page'] = $page;
		  
		$data['parent'] = $this->Mhrd->employeecat_parent();
		 
		foreach($data['parent'] as $pr){
			 $data['catparent'][$pr['employee_catID']] = $pr['employee_catName'];
		}
		  
		$data['employee_cat'] = $this->Mhrd->employee_cat($this->input->post(),$data['page'],$data['limit']);		
		
		$data['countdata'] = $this->Mhrd->employee_cat_count($this->input->post());	

		$this->load->view('employee_cat_data', $data);

	}
	
	function employee_cat_add($employee_catID=null){
	 
		$data['parent'] = $this->Mhrd->employeecat_parent();
		  
		$this->load->view('employee_cat_add', $data);
		
	}
	
	function employee_cat_update($employee_catID){
	
		$data['cat_detail'] = $this->Mhrd->employee_cat_detail($employee_catID);
	 
		$data['parent'] = $this->Mhrd->employeecat_parent();
		  
		$this->load->view('employee_cat_update', $data);
		
	}
	
	function employee_cat_deleted($employee_catID){
	
	$this->Mhrd->employee_cat_deleted($employee_catID);
	
	}
	
	function employee_cat_add_action(){
	
		$this->Mhrd->employee_cat_add($this->input->post());
		 
	}
	
	function employee_cat_update_action(){

		$this->Mhrd->employee_cat_update($this->input->post());
	 
	}
	
	function employee_structure()
	{
		
		$output['data']['module_name'] = "Human Resources";
		
		$output['data']['menu_name'] = "HRD";
		
		$output['content'] = "hrd/employee_structure";
		
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
		
	}

	function hrd_employe_data($page=1){
	
		$data['limit'] = $this->input->post('limit');
		
		$data['page'] = $page;

		$data['employee_data'] = $this->Mhrd->employee_data($this->input->post(),$data['page'],$data['limit']);		
		
		$data['countdata'] = $this->Mhrd->employee_data_count($this->input->post());	

		$this->load->view('hrd_employee_data', $data);

	}
	
	function hrd_employe_data_export(){
	
		header("Content-type: application/vnd-ms-excel");
 
		header("Content-Disposition: attachment; filename=employee-export.xls");
 
		$content = "

		<table>

		<tr><td>nama</td><td>bimosaurus</td></tr><tr><td>alamat</td><td>wonosobo</td></tr><tr><td>nohp</td><td>080808080</td></tr>

		</table>

		";
		
		print $content;

	}

	function hrd_save_employee (){
		
		// upload file/image
				
		$config['file_name'] 		= $this->generate_code->getUID();
		$config['upload_path'] 	= './upload/employee_photo/'.$config['file_name'].'/';
		$config['allowed_types'] 	= 'gif|jpg|png';
		
		@mkdir($config['upload_path'], 0777);
		
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());			
		}
		else
		{
			$data = $this->upload->data();			
			$this->core->resize_im(array_merge($config,$data));
		}
		
		if($data['file_name']){
		$img = $config['upload_path'].$data['file_name'];
		}else{
		$img = null;
		}
		
		$this->Mhrd->save_employee($this->input->post(),$img);
		
		redirect('hrd');
	}
		
	function hrd_addemployee($employee_ID= null){
	
		$data['parent'] = $this->Mhrd->department_parent();
		foreach($data['parent'] as $pr){
			 $data['depparent'][$pr['department_ID']] = $pr['department_name'];
		}
		
		$data['department_data'] = $this->Mhrd->department_data( );		
	
		$data['data_detail'] = $this->Mhrd->employee_data_detail($employee_ID);
		
		$data['manager_name']  = $this->Mhrd->get_employee_detail($data['data_detail'][0]['employee_managerID']);
		   
		$data['country'] = $this->Mhrd->get_country();
				
		$this->load->view('hrd_addemployee', $data);
		
	}
 
	function hrd_delete_employee($employee_ID){

		$this->Mhrd->employee_delete($employee_ID);
		
	}
 
	function department(){
	 
		$output['data']['module_name'] = "Human Resources";
		
		$output['data']['menu_name'] = "HRD";
		
		$output['content'] = "hrd/department";
		
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
	
	}
	
	function department_data($page=1){
	
		$data['limit'] = 10;
		
		$data['page'] = $page;
		  
		$data['parent'] = $this->Mhrd->department_parent();
		 
		foreach($data['parent'] as $pr){
			 $data['depparent'][$pr['department_ID']] = $pr['department_name'];
		}
		 
		$data['department_data'] = $this->Mhrd->department_data($this->input->post(),$data['page'],$data['limit']);		
		
		$data['countdata'] = $this->Mhrd->department_data_count($this->input->post());	

		$this->load->view('department_data', $data);

	}
	
	
	function department_add(){
	 
		$data['parent'] = $this->Mhrd->department_parent();
		 
		$data['country'] = $this->Mhrd->get_country();
				
		$this->load->view('department_add', $data);
		
	}
	
	function department_update($department_ID){
	
		$data['dat'] = $this->Mhrd->department_detail($department_ID);
		 
		$data['parent'] = $this->Mhrd->department_parent();
		 
		$data['country'] = $this->Mhrd->get_country();
				
		$this->load->view('department_update', $data);
		
	}
	
	function department_add_action(){
	
		$this->Mhrd->department_add($this->input->post());
		 
	}
	
	function department_update_action(){
	
		$this->Mhrd->department_update($this->input->post());
		 
	}
	
	function job_position(){
	 
		$output['data']['module_name'] = "Human Resources";
		
		$output['data']['menu_name'] = "HRD";
		
		$output['content'] = "hrd/job_position";
		
		$output['parent'] = $this->Mhrd->department_parent();
		 
		foreach($output['parent'] as $pr){
			 $output['depparent'][$pr['department_ID']] = $pr['department_name'];
		}
		
		$output['department_data'] = $this->Mhrd->department_data( );		
		 
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
	
	}
	
	function job_position_data($page=1){
	
		$data['limit'] = 10;
		
		$data['page'] = $page;
	 
		$data['job_data'] = $this->Mhrd->job_data($this->input->post(),$data['page'],$data['limit']);		
		
		$data['countdata'] = $this->Mhrd->job_data_count($this->input->post());	

		$this->load->view('job_position_data', $data);

	}
	
	function get_position($department_ID){
		
		$json['positionnya']  = $this->Mhrd->get_position($department_ID);
		 
		 echo json_encode($json, JSON_UNESCAPED_SLASHES);
		
	}
	
	function get_employee_name(){
		 
		$data['employee_name']  = $this->Mhrd->get_employee_name($this->input->get('term'));
		 
		echo json_encode($data['employee_name']);
			
	}
	
	function job_position_add($job_ID=null){
	
	$data['dat'] = $this->Mhrd->job_data_detail($job_ID);
	 
	$data['parent'] = $this->Mhrd->department_parent();
		foreach($data['parent'] as $pr){
			 $data['depparent'][$pr['department_ID']] = $pr['department_name'];
		}
		
	$data['department_data'] = $this->Mhrd->department_data();	
	 
	$this->load->view('job_position_add', $data);
		
	}
	
	function job_position_add_action(){
	 
		$this->Mhrd->job_add($this->input->post());
		 
	}
	
	function job_position_deleted($job_ID){
	
		$this->Mhrd->job_position_deleted($job_ID);
	
	}
		 
	function department_delete($department_ID){
		
		$this->Mhrd->department_delete($department_ID);
		
	}
	
	function register_time(){
	
		$output['data']['module_name'] = "Human Resources";
		
		$output['data']['menu_name'] = "HRD";
		
		$output['content'] = "hrd/timesheet_register";
		 
		$output['project'] = $this->Mhrd->get_project();	
		
		$output['task'] = $this->Mhrd->get_task();	
		
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
	
	}
	
	function timesheet_registerdata($page=1){
	 
		$data['limit'] = 10;
		
		$data['page'] = $page;
	 
		$data['timesheet_data'] = $this->Mhrd->timesheet_registerdata($this->input->post(),$data['page'],$data['limit']);		
		
		$data['countdata'] = $this->Mhrd->timesheet_registerdata_count($this->input->post());	

		$this->load->view('timesheet_registerdata', $data);
	
	}
	
	function timesheet(){
	
		$output['data']['module_name'] = "Human Resources";
		
		$output['data']['menu_name'] = "HRD";
		
		$output['content'] = "hrd/timesheet";
		 
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
	
	}
	
	function timesheet_data($page=1){
	 
		$data['limit'] = 10;
		
		$data['page'] = $page;
	 
		$data['timesheet_data'] = $this->Mhrd->timesheet_registerdata($this->input->post(),$data['page'],$data['limit']);		
		
		$data['countdata'] = $this->Mhrd->timesheet_registerdata_count($this->input->post());	

		$this->load->view('timesheet_data', $data);
	
	}
	
	function timesheet_line(){
	
		$output['data']['module_name'] = "Human Resources";
		
		$output['data']['menu_name'] = "HRD";
		
		$output['content'] = "hrd/timesheet_line";
		
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
	
	}
	
	function timesheet_add(){
	
		$this->Mhrd->timesheet_add($this->input->post());
	
	}
	
	function opt_employee(){
	
		$json['statenya']  = $this->Mhrd->get_state();
		echo json_encode($json, JSON_UNESCAPED_SLASHES);
	
	}
	
	function project(){
	 
		$output['data']['module_name'] = "Human Resources";
		
		$output['data']['menu_name'] = "HRD";
		
		$output['content'] = "hrd/project";
		
		$output['parent'] = $this->Mhrd->department_parent();
		 
		foreach($output['parent'] as $pr){
			 $output['depparent'][$pr['department_ID']] = $pr['department_name'];
		}
		
		$output['department_data'] = $this->Mhrd->department_data( );		
		 
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
	
	}
	
	function project_add($project_ID=null){
	
	$data['dat'] = $this->Mhrd->project_detail($project_ID);
	  
	$data['department_data'] = $this->Mhrd->department_data();	
	 
	$this->load->view('project_add', $data);
		
	}
	
	function project_add_action(){
	 
		$this->Mhrd->project_add($this->input->post());
		 
	}
	
	function project_deleted($project_ID){
	
		$this->Mhrd->project_deleted($project_ID);
	
	}
	
	function project_data($page=1){
	
		$data['limit'] = 10;
		
		$data['page'] = $page;
	 
		$data['project_data'] = $this->Mhrd->project_data($this->input->post(),$data['page'],$data['limit']);		
		
		$data['countdata'] = $this->Mhrd->project_data_count($this->input->post());	

		$this->load->view('project_data', $data);

	}
	
	function task(){
	 
		$output['data']['module_name'] = "Human Resources";
		
		$output['data']['menu_name'] = "HRD";
		
		$output['content'] = "hrd/task";
		
		$output['parent'] = $this->Mhrd->department_parent();
		 
		foreach($output['parent'] as $pr){
			 $output['depparent'][$pr['department_ID']] = $pr['department_name'];
		}
		
		$output['department_data'] = $this->Mhrd->department_data( );		
		 
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
	
	}
	
	function task_add($task_detail=null){
	
	$data['dat'] = $this->Mhrd->task_detail($task_detail);
	  
	$data['job_data'] = $this->Mhrd->job_data();	
	 
	$this->load->view('task_add', $data);
		
	}
	
	function task_add_action(){
	 
		$this->Mhrd->task_add($this->input->post());
		 
	}
	
	function task_deleted($project_ID){
	
		$this->Mhrd->task_deleted($project_ID);
	
	}
	
	function task_data($page=1){
	
		$data['limit'] = 10;
		
		$data['page'] = $page;
	 
		$data['task_data'] = $this->Mhrd->task_data($this->input->post(),$data['page'],$data['limit']);		
		
		$data['countdata'] = $this->Mhrd->task_data_count($this->input->post());	

		$this->load->view('task_data', $data);

	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */