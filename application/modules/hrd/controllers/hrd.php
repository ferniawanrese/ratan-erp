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
		$this->load->library('parser');
		$this->load->library('dompdf_gen');
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
		
		$output['data']['menu_active'] = "Main";
		
		$output['data']['submenu_active'] = "hrd";
		
		$output['data']['parent'] = $this->Mhrd->department_parent();
		if($output['data']['parent']){
			foreach($output['data']['parent'] as $pr){
				 $output['depparent'][$pr['department_ID']] = $pr['department_name'];
			}
		}
		$output['data']['department_data'] = $this->Mhrd->department_data();
		
		$output['content'] = "hrd/hrd";
		
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
		
	}
	
	function employee_cat()
	{
		
		$output['data']['module_name'] = "Human Resources";
		
		$output['data']['menu_name'] = "HRD";
		
		$output['data']['menu_active'] = "Configuration"; 
		
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
	 
	function hrd_employe_data($page=1){
	
		$data['limit'] = $this->input->post('limit');
		
		$data['page'] = $page;

		$data['employee_data'] = $this->Mhrd->employee_data($this->input->post(),$data['page'],$data['limit']);		
		
		$data['countdata'] = $this->Mhrd->employee_data_count($this->input->post());	

		$this->load->view('hrd_employee_data', $data);

	}
	
	function hrd_employe_data_export($page=1){
	 
		$data['limit'] = $this->input->get('limit');
		
		$data['page'] = $page;

		$data['employee_data'] = $this->Mhrd->employee_data($this->input->get(),$data['page'],$data['limit']);		
		
		$data['countdata'] = $this->Mhrd->employee_data_count($this->input->get());	
 
		//pass retrieved data into template and return as a string
        $stringData = $this->parser->parse('excelfile/hrd_employee_data_excel', $data, true);
		
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		
		header('Content-type: application/ms-excel');
		header("Expires: 0");
		header('Content-Disposition: attachment; filename=hrd_employe_data_export.xls');
		header("Content-Description: File Transfer");
  
		echo $stringData;
		exit;
		 
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
		
		if(isset($data['file_name'])){
		$img = $config['upload_path'].$data['file_name'];
		}else{
		$img = null;
		}
		 
		$this->Mhrd->save_employee($this->input->post(),$img);
		
		redirect('hrd');
	}
		
	function hrd_addemployee($employee_ID= null){
	
		$data['parent'] = $this->Mhrd->department_parent();
		
		if($data['parent']){
			foreach($data['parent'] as $pr){
				 $data['depparent'][$pr['department_ID']] = $pr['department_name'];
			}
		}
		
		$data['currency'] = $this->Mhrd->currency();	
		
		$data['badge'] = $this->Mhrd->badge_inc($this->session->userdata('current_companyID'));		
		 
		if($data['badge']){ 
			$data['final_badge'] = "exist";
		}else{ 
			$data['final_badge'] = $data['badge'][0]['badge']."-".$data['badge'][0]['employee_badge_int'];
		}
		
		$data['final_badge'] = "exist";
		 
		$data['department_data'] = $this->Mhrd->department_data( );		
	
		$data['data_detail'] = $this->Mhrd->employee_data_detail($employee_ID);
		
		if($data['data_detail']==""){
		$currency_ID = $this->session->userdata('default_currencyID');
		}else{
		$currency_ID = $data['data_detail'][0]['currency_ID'];
		}
		 
		$data['currency_detail'] = $this->Mhrd->currency_detail($currency_ID);	
		  
		if($data['data_detail']){
			$data['final_badge'] = $data['data_detail'][0]['employee_badge'];
		}else{
		
				$data['badge'] = $this->Mhrd->badge_inc($this->session->userdata('current_companyID'));		
				 
			if($data['badge']){ 
			 
				$i = sprintf('%0'.$data['badge'][0]['badge_leadingzeros'].'d',$data['badge'][0]['employee_badge_int']+1);
			 
				$data['final_badge'] = $data['badge'][0]['badge'].$i;
				
			}else{ 
			 
				$data['company'] = $this->Mhrd->company_detail();	
				$i = sprintf('%0'.$data['company'][0]['badge_leadingzeros'].'d',$data['company'][0]['badge_inc']);
				
				$data['final_badge'] = $data['company'][0]['badge'].$i;
			} 
		}
		
		$data['manager_name']  = $this->Mhrd->get_employee_detail($data['data_detail'][0]['manager_ID']);
		 
		$data['country'] = $this->Mhrd->get_country();
				
		$this->load->view('hrd_addemployee', $data);
		
	}
	
	function hrd_employe_print($employee_ID = null){
	
		// Load all views as normal
		$data['data_detail'] = $this->Mhrd->employee_data_detail($employee_ID);
		 
		$this->load->view('pdffile/employee_detail',$data);
		// Get output html
		$html = $this->output->get_output();
		  
		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream($data['data_detail'][0]['employee_name'].".pdf");
	
	}
 
	function hrd_delete_employee($employee_ID){

		$this->Mhrd->employee_delete($employee_ID);
		
	}
 
	function department(){
	 
		$output['data']['module_name'] = "Human Resources";
		
		$output['data']['menu_name'] = "HRD";
		 
		$output['data']['menu_active'] = "Configuration";
		 
		$output['content'] = "hrd/department";
		
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
	
	}
	
	function department_data($page=1){
	
		$data['limit'] = 10;
		
		$data['page'] = $page;
		  
		$data['parent'] = $this->Mhrd->department_parent();
		 
		if($data['parent']){
			foreach($data['parent'] as $pr){
				 $data['depparent'][$pr['department_ID']] = $pr['department_name'];
			}
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
		
		$output['data']['menu_active'] = "Configuration";
		
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
		
		$data['parent'] = $this->Mhrd->department_parent();
		
		if($data['parent']){ 
			foreach($data['parent'] as $pr){
				 $data['depparent'][$pr['department_ID']] = $pr['department_name'];
			} 
		}
		
		$data['countdata'] = $this->Mhrd->job_data_count($this->input->post());	

		$this->load->view('job_position_data', $data);

	}
	
	function get_position($department_ID=null){
		
		$json['positionnya']  = $this->Mhrd->get_position($department_ID);
		 
		 echo json_encode($json);
		
	}
	
	function get_department(){
	
		$json['parent'] = $this->Mhrd->department_parent();
		foreach($json['parent'] as $pr){
			 $json['depparent'][$pr['department_ID']] = $pr['department_name'];
		}
		 
		$json['departmentnya'] = $this->Mhrd->department_data( );	 
		 
		 echo json_encode($json);
		
	}
	
	function get_employee_name(){
		 
		$data['employee_name']  = $this->Mhrd->get_employee_name($this->input->get('term'));
		 
		echo json_encode($data['employee_name']);
			
	}
	
	function get_employee_department($department_ID=null,$timetracking_ID=null){
		  
		$json['employee_name']  =  $this->Mhrd->get_employee_department($department_ID,$timetracking_ID);
		 	 
		echo json_encode($json);
			
	}
	
	function job_position_add($job_ID=null){
	
	$data['dat'] = $this->Mhrd->job_data_detail($job_ID);
	 
	$data['parent'] = $this->Mhrd->department_parent();
	
	if($data['parent'] ){
		foreach($data['parent'] as $pr){
			 $data['depparent'][$pr['department_ID']] = $pr['department_name'];
		}
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
		
		$output['data']['menu_active'] = "Main";
		
		$output['content'] = "hrd/timesheet_register";
		
		$output['parent'] = $this->Mhrd->department_parent();
		 
		foreach($output['parent'] as $pr){
			 $output['depparent'][$pr['department_ID']] = $pr['department_name'];
		}

		$output['department_data'] = $this->Mhrd->department_data();	
		  
		$output['filterplus'] = $this->core->filterplus('timetracking');
		
		$this->load->view('template', $output);
	
	}
	
	function timesheet_registerdata($page=1){
	 
		$data['limit'] = $this->input->post('limit');
		
		$data['page'] = $page;
	 
		$data['timesheet_data'] = $this->Mhrd->timesheet_registerdata($this->input->post(),$data['page'],$data['limit']);	
		
		$data['parent'] = $this->Mhrd->department_parent();
		 
		foreach($data['parent'] as $pr){
			 $data['depparent'][$pr['department_ID']] = $pr['department_name'];
		}
 
		$data['status'] = array( 
			'active' => 'Active',
			'pause' => 'Pause',
			'close' => 'Close'
		);
		
		$data['countdata'] = $this->Mhrd->timesheet_registerdata_count($this->input->post());	

		$this->load->view('timesheet_registerdata', $data);
	
	}
	
	function timesheet_registerdata_excel($page=1){
	 
		$data['limit'] = $this->input->get('limit');
		
		$data['page'] = $page;
	 
		$data['timesheet_data'] = $this->Mhrd->timesheet_registerdata($this->input->get(),$data['page'],$data['limit']);	
		
		foreach($data['timesheet_data'] as $key){
		
			$data['employeelist'][$key['timetracking_ID']] = $this->Mhrd->employee_task($key['timetracking_ID']);	
			 
		}
		 
		$data['parent'] = $this->Mhrd->department_parent();
		 
		foreach($data['parent'] as $pr){
			 $data['depparent'][$pr['department_ID']] = $pr['department_name'];
		}
  
		$data['countdata'] = $this->Mhrd->timesheet_registerdata_count($this->input->post());	

		//pass retrieved data into template and return as a string
        $stringData = $this->parser->parse('excelfile/timesheet_registerdata_excel', $data, true);
		
		
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		
		header('Content-type: application/ms-excel');
		header("Expires: 0");
		header('Content-Disposition: attachment; filename=timesheet_registerdata_excel.xls');
		header("Content-Description: File Transfer");
		
		
		echo $stringData;
		exit;
		 
	}
	
	function timesheet(){
	
		$output['data']['module_name'] = "Human Resources";
		
		$output['data']['menu_name'] = "HRD";
		
		$output['data']['menu_active'] = "Main";
		
		$output['content'] = "hrd/timesheet";
		 
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
	
	}
	
	function timesheet_data($page=1){
	 
		$data['limit'] = 10;
		
		$data['page'] = $page;
		
		$data['status'] = array( 
			'active' => 'Active',
			'pause' => 'Pause',
			'close' => 'Close'
		);
		
		$data['parent'] = $this->Mhrd->department_parent();
		 
		foreach($data['parent'] as $pr){
			 $data['depparent'][$pr['department_ID']] = $pr['department_name'];
		}
	 
		$data['timesheet_data'] = $this->Mhrd->timesheet_mapdata($this->input->post(),$data['page'],$data['limit']);		
		
		$data['countdata'] = $this->Mhrd->timesheet_mapdata_count($this->input->post());	

		$this->load->view('timesheet_data', $data);
	
	}
	
	function timesheet_data_excel($page=1){
	 
		$data['limit'] = 10;
		
		$data['page'] = $page;
		
		$data['status'] = array( 
			'active' => 'Active',
			'pause' => 'Pause',
			'close' => 'Close'
		);
		
		$data['parent'] = $this->Mhrd->department_parent();
		 
		foreach($data['parent'] as $pr){
			 $data['depparent'][$pr['department_ID']] = $pr['department_name'];
		}
	 
		$data['timesheet_data'] = $this->Mhrd->timesheet_mapdata($this->input->get(),$data['page'],$data['limit']);		
		
		$data['countdata'] = $this->Mhrd->timesheet_mapdata_count($this->input->get());	
 
		//pass retrieved data into template and return as a string
        $stringData = $this->parser->parse('excelfile/timesheet_data_excel', $data, true);
		
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		
		header('Content-type: application/ms-excel');
		header("Expires: 0");
		header('Content-Disposition: attachment; filename=timesheet_data_excel.xls');
		header("Content-Description: File Transfer");
		
		echo $stringData;
		exit;
	
	}
	
	function timesheet_line(){
	
		$output['data']['module_name'] = "Human Resources";
		
		$output['data']['menu_name'] = "HRD";
		
		$output['data']['menu_active'] = "Main";
		
		$output['content'] = "hrd/timesheet_line";
		
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
	
	}
	
	function timeregister_employeelist($timetracking_ID){
	
	$data['employee'] = $this->Mhrd->employee_task($timetracking_ID); 
	
	$data['status'] = array( 
			'active' => 'Active',
			'pause' => 'Pause',
			'close' => 'Close'
		);
	
	$this->load->view('timesheet_register_employee', $data);
		
	}
	
	function timesheet_add($timetracking_ID=null){
	
		$data['parent'] = $this->Mhrd->department_parent();
			foreach($data['parent'] as $pr){
				 $data['depparent'][$pr['department_ID']] = $pr['department_name'];
			}
		  
		$data['department_data'] = $this->Mhrd->department_data();	
		 
		$data['timesheet_detail'] = $this->Mhrd->timeheet_data_detail($timetracking_ID);
		
		$data['currency'] = $this->Mhrd->currency();	
		
		if($data['timesheet_detail']==""){
		$currency_ID = $this->session->userdata('default_currencyID');
		}else{
		$currency_ID = $data['timesheet_detail'][0]['currency_ID'];
		}
		 
		$data['currency_detail'] = $this->Mhrd->currency_detail($currency_ID);	
	 				
		$this->load->view('timesheet_registeradd', $data);
	 
	}
	
	function timesheet_deleted($timetracking_ID){
	
		$this->Mhrd->timesheet_deleted($timetracking_ID);
	
	}
	
	function get_project_detail($department_ID=null){
	
		$json['projectnya']  =  $this->Mhrd->get_project_detail($department_ID);
	 
		echo json_encode($json);
	
	}
	
	function timesheet_addaction(){
	
		if($this->input->post('timetracking_ID')){
		
		$data['timesheetmap'] = $this->Mhrd->get_timesheetmap($this->input->post('timetracking_ID'));
		 
		}else{
		$data['timesheetmap'] = null;
		}
	
		$this->Mhrd->timesheet_add($this->input->post(),$data['timesheetmap'] );
	 
	}	
	
	function get_task_detail($project_ID){
		
		$json['tasknya']  =  $this->Mhrd->get_task_detail($project_ID);
	 
		echo json_encode($json);
	
	}
	
  
	function opt_employee(){
	
		$json['statenya']  = $this->Mhrd->get_state();
		echo json_encode($json);
	
	}
	
	function project(){
	 
		$output['data']['module_name'] = "Human Resources";
		
		$output['data']['menu_name'] = "HRD";
		
		$output['data']['menu_active'] = "Configuration";
		
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
	 
	$data['parent'] = $this->Mhrd->department_parent();
		foreach($data['parent'] as $pr){
			 $data['depparent'][$pr['department_ID']] = $pr['department_name'];
		}
	  
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
		
		$data['parent'] = $this->Mhrd->department_parent();
		 
		foreach($data['parent'] as $pr){
			 $data['depparent'][$pr['department_ID']] = $pr['department_name'];
		}
		
		$data['countdata'] = $this->Mhrd->project_data_count($this->input->post());	

		$this->load->view('project_data', $data);

	}
	
	function task(){
	 
		$output['data']['module_name'] = "Human Resources";
		
		$output['data']['menu_name'] = "HRD";
		
		$output['data']['menu_active'] = "Configuration";
		
		$output['content'] = "hrd/task";		  
		 
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
	
	}
	
	function task_add($task_detail=null){
	
	$data['parent'] = $this->Mhrd->department_parent();
		foreach($data['parent'] as $pr){
			 $data['depparent'][$pr['department_ID']] = $pr['department_name'];
		}
	
	$data['department_data'] = $this->Mhrd->department_data();
	 
	$data['dat'] = $this->Mhrd->task_detail($task_detail);
	  
	$data['project_data'] = $this->Mhrd->project_data();	
	  
	$this->load->view('task_add', $data);
		
	}
	
	function task_add_direct($project_ID=null){
	
		$data['project_ID'] = $project_ID;	
	 
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
	
	function update_taskstatus($timetracking_ID,$status){
	
	 $this->Mhrd->update_taskstatus($timetracking_ID,$status);		
	
	}
	 
	
	function update_taskstatus_map($timetrackingmapID,$status){
	
	 $this->Mhrd->update_taskstatus_map($timetrackingmapID,$status);		
	
	}
	
	function update_taskstatusmap($timetrackingmapID,$status){
	
	$this->Mhrd->update_taskstatusmap($timetrackingmapID,$status);		
	
	}
	
	function timetrackingmap_del($employee_ID,$timetracking_ID){
	
	$this->Mhrd->timetrackingmap_del($employee_ID,$timetracking_ID);		
	
	}
	
	function signin(){
	
		$output['data']['module_name'] = "Sign In/Sign Out";
		
		$output['data']['menu_name'] = "HRD";
		
		$output['data']['menu_active'] = "Main";
		
		$output['content'] = "hrd/signin";
		
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
	
	}
	function signin_upload(){
	
		$this->load->library('excel_reader'); 
	
		// upload file/image
				
		$config['file_name'] 		= $this->generate_code->getUID();
		$config['upload_path'] 	= './upload/temp_upload/'.$config['file_name'].'/';
		$config['allowed_types'] 	= 'gif|jpg|png|xls|csv';
		
		@mkdir($config['upload_path'], 0777);
		
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());	 
		}
		else
		{
			$data = $this->upload->data();		 
		}
		
			$file =  $data['full_path'];
			
			$this->excel_reader->read($file);
			
			$datax = $this->excel_reader->sheets[0] ;
			 
			if($datax['numRows']>0){
			 
				foreach($datax['cells'] as $key) {
				
					$date = ($key['2'] - 25569) * 86400;
					 					 
					$newdate = gmdate("Y-m-d", $date)."</br>";  
					
					$date_signin = ($key['4'] - 25569) * 86400;
					 					 
					$newdate_signin = gmdate("Y-m-d H:i:s", $date_signin)."</br>";  
					
					$date_signout = ($key['5'] - 25569) * 86400;
					 					 
					$newdate_signout = gmdate("Y-m-d H:i:s", $date_signout)."</br>";  
				 
					$uid = $this->generate_code->getUID();
					$keys[$uid]['attendance_ID']= $uid;
					$keys[$uid]['employee_badge']= $key['1'];
					$keys[$uid]['date']=  $newdate;
					$keys[$uid]['status']=  $key['3'];
					$keys[$uid]['signin']=  $newdate_signin;
					$keys[$uid]['signout']= $newdate_signout;
					$keys[$uid]['overtime']= $key['6'];
					$keys[$uid]['late']= $key['7'];
					$keys[$uid]['goback_early']= $key['8'];
					
					$this->db->insert('attendance',$keys[$uid]);
					 
				}
			
			}
			  
		  redirect(base_url('hrd/signin/success'));
	}
	
	function attendances(){
	
		$output['data']['module_name'] = "Attendances";
		
		$output['data']['menu_name'] = "HRD";
		
		$output['data']['menu_active'] = "Main";
		
		$output['content'] = "hrd/attendances";
		
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
	
	}
	
	function attendances_data($page=1){
	
		$data['limit'] = 10;
		
		$data['page'] = $page;
	 
		$data['attandances_data'] = $this->Mhrd->attendances_data($this->input->post(),$data['page'],$data['limit']);		
		
		$data['countdata'] = $this->Mhrd->attendances_data_count($this->input->post());	

		$this->load->view('attendances_data', $data);
	
	}
	
	function appraisal(){
	
		$output['data']['module_name'] = "Appraisal";
		
		$output['data']['menu_name'] = "HRD";
		
		$output['data']['menu_active'] = "Main";
		
		$output['content'] = "hrd/appraisal";
		
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
	
	}
	
	function add_appraisal(){
	
		$data['asd'] = 'asd';
		 
		$this->load->view('appraisal_add', $data);
	
	}
	
	function appraisal_data($page = 1){
	
		$data['limit'] = 10;
		
		$data['page'] = $page;
	 
		$data['attandances_data'] = $this->Mhrd->appraisal_data($this->input->post(),$data['page'],$data['limit']);		
		
		$data['countdata'] = $this->Mhrd->appraisal_data_count($this->input->post());	

		$this->load->view('appraisal_data', $data);
	
	}
	
	function appraisal_datac($page = 1){
	
		$data['limit'] = 10;
		
		$data['page'] = $page;
	 
		$data['appraisal_datac'] = $this->Mhrd->appraisal_datac($this->input->post(),$data['page'],$data['limit']);		
		
		$data['countdata'] = $this->Mhrd->appraisal_data_count($this->input->post());	

		$this->load->view('appraisal_datac', $data);
	
	}
	
	function interview_req(){
	
		$output['data']['module_name'] = "Interview Request";
		
		$output['data']['menu_name'] = "HRD";
		
		$output['data']['menu_active'] = "Main";
		
		$output['content'] = "hrd/interview_req";
		
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
	
	}
	
	function add_interview_req(){
	
		$data['asd'] = 'asd';
		 
		$this->load->view('appraisal_add', $data);
	
	}
	
	function interview_req_data($page = 1){
	
		$data['limit'] = 10;
		
		$data['page'] = $page;
	 
		$data['attandances_data'] = $this->Mhrd->appraisal_data($this->input->post(),$data['page'],$data['limit']);		
		
		$data['countdata'] = $this->Mhrd->appraisal_data_count($this->input->post());	

		$this->load->view('interview_req_data', $data);
	
	}
	
		
	function  interview_add(){
	 
		$data['parent'] = $this->Mhrd->department_parent();
		 
		$data['country'] = $this->Mhrd->get_country();
				
		$this->load->view('interview_req_add', $data);
		
	}
	
	function autobadge(){
		
		if($_POST){
		
		$this->Mhrd->autobadge($this->input->post());	
		
		}
	 
		$output['data']['module_name'] = "Human Resources";
		
		$output['data']['menu_name'] = "HRD";
		 
		$output['data']['menu_active'] = "Configuration";
		 
		$output['content'] = "hrd/autobadge";
		
		$output['autobadge_data'] =  $this->Mhrd->autobadge_data();
		
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
	
	}
	
	function badge_cek($badge_code){
	
	$json['badge_cek']  = $this->Mhrd->badge_cek($badge_code);
	
	if(!$json['badge_cek']){
	$json['badge_cek'][] = array("employee_badge" => "");
	}
	 
		 echo json_encode($json);
	
	}
	
	function leaves(){
	
		$output['data']['module_name'] = "Leaves";
		
		$output['data']['menu_name'] = "HRD";
		
		$output['data']['menu_active'] = "Main";
		
		$output['content'] = "hrd/leaves";
		
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
	
	}
	
	function add_leaves(){
	
		$data['asd'] = 'asd';
		 
		$this->load->view('add_leaves', $data);
	
	}
	
	function expends(){
	
		$output['data']['module_name'] = "Expends";
		
		$output['data']['menu_name'] = "HRD";
		
		$output['data']['menu_active'] = "Main";
		
		$output['content'] = "hrd/expends";
		
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
	
	}
	  
	function expends_data($page=1){
	 
		$data['limit'] = $this->input->post('limit');
		
		$data['page'] = $page;
		 
		$data['expends_data'] = $this->Mhrd->expends_data($this->input->post(),$data['page'],$data['limit']);	
		 
		$data['countdata'] = $this->Mhrd->expends_data_count($this->input->post());	

		$this->load->view('expends_data', $data);
	
	}
	
	function expends_data_excel($page=1){
	 
		$data['limit'] = $this->input->get('limit');
		
		$data['page'] = $page;
		 
		$data['expends_data'] = $this->Mhrd->expends_data($this->input->get(),$data['page'],$data['limit']);	
		 
		$data['countdata'] = $this->Mhrd->expends_data_count($this->input->get());	
 
		
		
		if($data['expends_data']){ 
			foreach($data['expends_data']  as $key){ 
				$data['expends_data_detail'][$key['expense_ID']] = $this->Mhrd->get_expends_data_detail($key['expense_ID']);
			}
		}
		
		$stringData = $this->parser->parse('excelfile/expends_data_excel', $data, true);
		  
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		
		header('Content-type: application/ms-excel');
		header("Expires: 0");
		header('Content-Disposition: attachment; filename=expends_data_excel.xls');
		header("Content-Description: File Transfer");
  
		echo $stringData;
		exit;
	
	}
	 
	
	function expends_add($expend_ID=null){
	
		$data['expends_data'] = $this->Mhrd->get_expends_data($expend_ID);	
		
		$data['expends_detail'] = $this->Mhrd->get_expends_data_detail($expend_ID);	
	 
		$data['currency'] = $this->Mhrd->currency();	
		
		$data['currency_detail'] = $this->Mhrd->currency_detail($data['expends_data'][0]['currency_ID']);	
		
		$data['parent'] = $this->Mhrd->department_parent();
			foreach($data['parent'] as $pr){
				 $data['depparent'][$pr['department_ID']] = $pr['department_name'];
			}
		  
		$data['department_data'] = $this->Mhrd->department_data();	
		  
		$this->load->view('expends_add', $data);
	 
	}
	
	function expends_detail_add($expend_detailID=null){
	
		$data['expends_detail'] = $this->Mhrd->get_expends_detail($expend_detailID);	
	 
		$data['uom'] = $this->Mhrd->uom();	
		  
		$this->load->view('expends_detail_add', $data);
	 
	}
	
	function expends_detail_pdf($expend_detailID=null){
		// Load all views as normal
		$data['expends_detail'] = $this->Mhrd->get_expends_detail($expend_detailID);	
		 
		$this->load->view('pdffile/expend_detail', $data);
		// Get output html
		$html = $this->output->get_output();
		  
		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("asd.pdf");
	}
	
	function expends_detail_add_action($draft_stat=null){
	
			$data['draft_stat'] = $draft_stat;
			
			if($draft_stat==""){
			
			$data['id'] = $this->generate_code->getUID();
			 
			}else{
			  
			$data['id'] = $data['draft_stat'];
			 
			}
			
			$data['datanya'] =  $this->input->post(); 
 
			$this->load->view('expends_detail_draft', $data);
			
	}
	
	function expends_approval($stat,$expense_ID){
	
		$this->Mhrd->expends_approval($stat,$expense_ID);
	
	}
	
	function expends_delete($expense_ID){
		$this->Mhrd->expends_delete($expense_ID);
	}
	
	function get_product_name(){
		 
		$data['product_name']  = $this->Mhrd->get_product_name($this->input->get('term'));
		 
		echo json_encode($data['product_name']);
			
	}
	 
	function expends_add_action(){
	
		$data['datanya'] =  $this->input->post(); 	 
		 
		$this->Mhrd->expends_add_action($data['datanya']);
	
	}
	
	function expends_detail_data(){
	
	}
	
	function product(){
	
		$output['data']['module_name'] = "Human Resources";
		
		$output['data']['menu_name'] = "HRD";
		 
		$output['data']['menu_active'] = "Configuration";
		 
		$output['content'] = "hrd/product";
		
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
	
	}
	 
	function product_data($page=1){
	
		$data['limit'] = 10;
		
		$data['page'] = $page;
		   
		$data['product_data'] = $this->Mhrd->product_data($this->input->post(),$data['page'],$data['limit']);		
		 
		$data['countdata'] = $this->Mhrd->product_data_count($this->input->post());	

		$this->load->view('product_data', $data);

	}
	
	 
	function product_add_action(){
	
		$this->Mhrd->product_add($this->input->post());
	
	}
	
	function product_add($product_ID=null){
	
		$data['uom'] = $this->Mhrd->uom();	
	 
		$data['product_data'] = $this->Mhrd->product_data_detail($product_ID);	
		 
		$this->load->view('product_add', $data);
	
	}
	
	function product_delete($product_ID){
	
		$this->Mhrd->product_delete($product_ID);
	
	}
	
	function uom(){
	
		$output['data']['module_name'] = "Human Resources";
		
		$output['data']['menu_name'] = "HRD";
		 
		$output['data']['menu_active'] = "Configuration";
		 
		$output['content'] = "hrd/uom";
		
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
	
	}
	
	function uom_data($page=1){
	
		$data['limit'] = 10;
		
		$data['page'] = $page;
		   
		$data['uom_data'] = $this->Mhrd->uom_data($this->input->post(),$data['page'],$data['limit']);		
		 
		$data['countdata'] = $this->Mhrd->uom_data_count($this->input->post());	

		$this->load->view('uom_data', $data);

	}
	
	function uom_add($UoM_ID=null){
	
		$data['uom_data'] = $this->Mhrd->uom_data_detail($UoM_ID);	
	  
		$this->load->view('uom_add', $data);
	
	}
	
	function uom_add_action(){
	
		$this->Mhrd->uom_add($this->input->post());
	
	}
	
	function uom_delete($UoM_ID=null){
	
		$this->Mhrd->uom_delete($UoM_ID);
	
	}
	
	function currency(){
	
		$output['data']['module_name'] = "Human Resources";
		
		$output['data']['menu_name'] = "HRD";
		 
		$output['data']['menu_active'] = "Configuration";
		 
		$output['content'] = "hrd/currency";
		
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
	
	}
	
	function currency_data($page=1){
	
		$data['limit'] = 10;
		
		$data['page'] = $page;
		   
		$data['currency_data'] = $this->Mhrd->currency_data($this->input->post(),$data['page'],$data['limit']);		
		 
		$data['countdata'] = $this->Mhrd->currency_data_count($this->input->post());	

		$this->load->view('currency_data', $data);
	
	}
	
	function currency_add($currency_ID=null){
	
		$data['currency_add'] = $this->Mhrd->currency_data_detail($currency_ID);	
	  
		$this->load->view('currency_add', $data);
	
	}
	
	function currency_add_action(){
	
		$this->Mhrd->currency_add($this->input->post());
	
	}
	
	function currency_delete($currency_ID){
	
		$this->Mhrd->currency_delete($currency_ID);
	
	}
	
	function get_currency(){
	 
		$json['currencynya'] = $this->Mhrd->get_currency();	 
		 
		 echo json_encode($json);
		
	}
	
	function expense_state($expense_ID){
	
		$this->Mhrd->expense_state($expense_ID);
	
	}
	
	function leave_type(){
	
		$output['data']['module_name'] = "Human Resources";
		
		$output['data']['menu_name'] = "HRD";
		 
		$output['data']['menu_active'] = "Configuration";
		 
		$output['content'] = "hrd/leave_type";
		
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
	
	}
	
	function leave_type_data($page=1){
	
		$data['limit'] = 10;
		
		$data['page'] = $page;
		   
		$data['leave_type_data'] = $this->Mhrd->leave_type_data($this->input->post(),$data['page'],$data['limit']);		
		 
		$data['countdata'] = $this->Mhrd->leave_type_data_count($this->input->post());	

		$this->load->view('leave_type_data', $data);
	
	}
	
	function leave_type_add($leave_typeID=null){
	
		$data['leave_date'] = $this->Mhrd->leave_type_data_detail($leave_typeID);	
		
		$data['date_detail'] = $this->Mhrd->date_detail($leave_typeID);	
	  
		$this->load->view('leave_type_add', $data);
		
	}
	
	function leave_type_add_action(){
	
		$this->Mhrd->leave_type_add($this->input->post());
	
	}
	
	function leave_type_delete($leave_typeID){
	
		$this->Mhrd->leave_type_delete($leave_typeID);
	
	}
	 
	function leave_type_datedetail($leave_type_dateID=null){
	
		$data['leave_type_date'] = $this->Mhrd->leave_type_datedetail($leave_type_dateID);	
	  
		$this->load->view('leave_type_datedetail', $data);
	 
	}
	
	function leave_type_datedetail_action(){
	
			$data['id'] = $this->generate_code->getUID();
		
			$data['datanya'] =  $this->input->post(); 	 
			
			$this->load->view('leave_type_datedraft', $data);
	
	}
	
	function leave_type_datedetail_update(){
	 
			$data['datanya'] =  $this->input->post(); 	 
			
			$this->Mhrd->leave_type_datedetail_update($data['datanya']);	
			 
	}
	
	function leaves_calendar_json(){
	  
		$date_start = gmdate("Y-m-d h:i:s",$this->input->GET('start'));
		
		$date_end = gmdate("Y-m-d h:i:s",$this->input->GET('end'));
		
		$data['events'] = $this->Mhrd->get_leave_month($date_start,$date_end);
		 
		if($data['events']){
			foreach ($data['events'] as $record) {
			
				if($record['date_color'] == "red"){
				$color = "rgba(255, 0, 0, 0.7)";
				$textColor = '#fffff';
				$icon = "<i class = 'icon-calendar'></i> ";
				} 
				
				if($record['date_color'] == "yellow"){
				$color = "rgba(255, 255, 0, 0.7)";
				$textColor = '#000000';
				$icon = "<i class = 'icon-calendar'></i> ";
				} 
				
				if($record['date_color'] == "green"){
				$color = "rgba(0, 153, 0, 0.7)";
				$textColor = '#000000';
				$icon = "<i class = 'icon-calendar'></i> ";
				} 
				
				$event_array[] = array(
					'title' => '<font style="font-family:arial ;font-size:13px;" >'.$icon.$record['note'].'</font>',
					'start' => $record['date_allow'],
					'end' => $record['date_allow'],
					'allDay' => true,
					'color' => $color,
					'textColor' => $textColor,
					'holiday' => True, 
					'url' => base_url('entertainment/entertainment_detail/'.$record['leave_type_dateID'])
				);
			}
		}
		  
		echo json_encode($event_array);
		exit;
	 
	}
	
	function leaves_add($leave_ID=null){
	
		$data['leave_type'] = $this->Mhrd->get_leave_type(); 	

		$data['leave_detail'] = $this->Mhrd->leave_detail($leave_ID); 
		
		$data['signature_name'] = $this->Mhrd->get_employee_detail($data['leave_detail'][0]['signature_byID']);
		 
		$this->load->view('leave_add', $data);
	
	}
	
	function leave_approval_pdf($leave_ID){
	
	$data['leave_detail'] = $this->Mhrd->leave_detail($leave_ID); 
	
	$data['signature_name'] = $this->Mhrd->get_employee_detail($data['leave_detail'][0]['signature_byID']);
	
	$this->load->view('pdffile/leave_approval', $data);
	 
	// Get output html
	$html = $this->output->get_output();
	  
	// Convert to PDF
	$this->dompdf->load_html($html);
	$this->dompdf->render();
	$this->dompdf->stream("asd.pdf");
	
	}
	
	function leaves_add_action(){
	 
		$total_leaves = $this->Mhrd->total_leaves($this->input->post()); 	
 
		$this->Mhrd->leaves_add($this->input->post(),$total_leaves); 	
		 
	}
	
	function leave_approval(){
	
		$output['data']['module_name'] = "Human Resources";
		
		$output['data']['menu_name'] = "HRD";
		 
		$output['data']['menu_active'] = "Main";
		 
		$output['content'] = "hrd/leave_approval";
		
		$output['leave_type'] = $this->Mhrd->get_leave_type(); 	
		 
		$this->load->view('template', $output);
	
	
	}
	
	function leave_approval_data($page=1){
	
		$data['limit'] = $this->input->post('limit');
		
		$data['page'] = $page;
		   
		$data['leave_data'] = $this->Mhrd->leave_approval_data($this->input->post(),$data['page'],$data['limit']);		
		 
		$data['countdata'] = $this->Mhrd->leave_approval_data_count($this->input->post());	

		$this->load->view('leave_approval_data', $data);
	
	}
	
	function leave_approval_data_excel($page=1){
	 
		$data['limit'] = $this->input->get('limit');
		
		$data['page'] = $page;
		   
		$data['leave_data'] = $this->Mhrd->leave_approval_data($this->input->get(),$data['page'],$data['limit']);		
		 
		$data['countdata'] = $this->Mhrd->leave_approval_data_count($this->input->get());	
 
		$stringData = $this->parser->parse('excelfile/leave_approval_data_excel', $data, true);
		 
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		
		header('Content-type: application/ms-excel');
		header("Expires: 0");
		header('Content-Disposition: attachment; filename=leave_approval_data_excel.xls');
		header("Content-Description: File Transfer");
  
		echo $stringData;
		exit;
	
	}
	
	function leaves_allowed(){
	
	//count available or not / tot leaves
	
	$ouput['total_leaves'] = $this->Mhrd->total_leaves($this->input->post()); 	
	
	//remaining user 
	
	$ouput['leaves_taken'] = $this->Mhrd->total_leaves_taken($this->input->post()); 
	  
	echo json_encode($ouput);
	 
	}
	
	function leaves_approval($stat, $leave_ID){
	
		// leave allow limit days
		$totallowed = $this->Mhrd->get_leave_type_detail($leave_ID); 	 
		 
		$this->Mhrd->leaves_approval_stat($leave_ID, $stat); 	 
	
	}
	
	function leave_approval_delete($leave_ID){
	
		$this->Mhrd->leave_approval_delete($leave_ID); 	 
	
	}
	
	function barcode_check($barcode){
	
	$json['barcode_check']  = $this->Mhrd->barcode_check($barcode);
	
	if(!$json['barcode_check']){
	$json['barcode_check'][] = array("product_code" => "");
	}
	 
		 echo json_encode($json);
	
	}
	
	function allowance(){
	 
		$output['data']['module_name'] = "Human Resources";
		
		$output['data']['menu_name'] = "HRD";
		
		$output['data']['menu_active'] = "Configuration";
		
		$output['content'] = "hrd/allowance";
		 
		$output['department_data'] = $this->Mhrd->department_data( );		
		 
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
	
	}
	
	function allowance_data($page=1){
	
		$data['limit'] = 10;
		
		$data['page'] = $page;
	 
		$data['allowance_data'] = $this->Mhrd->allowance_data($this->input->post(),$data['page'],$data['limit']);		
		 
		$data['countdata'] = $this->Mhrd->allowance_data_count($this->input->post());	

		$this->load->view('allowance_data', $data);
	
	}
	
	function allowance_add($allowance_ID=null){
	
		$data['dat'] = $this->Mhrd->allowance_detail($allowance_ID);
	   
		$this->load->view('allowance_add', $data);
	
	}
	
	function allowance_add_action(){
	
		$this->Mhrd->allowance_add($this->input->post());
	
	}
	
	function allowance_deleted($allowance_ID){
	
		$this->Mhrd->allowance_deleted($allowance_ID);
	
	}
	
	function tax(){
	 
		$output['data']['module_name'] = "Human Resources";
		
		$output['data']['menu_name'] = "HRD";
		
		$output['data']['menu_active'] = "Configuration";
		
		$output['content'] = "hrd/tax";
		  
		$this->load->view('template', $output);
	
	}
	
	function tax_data($page=1){
	
		$data['limit'] = 10;
		
		$data['page'] = $page;
	 
		$data['tax_data'] = $this->Mhrd->tax_data($this->input->post(),$data['page'],$data['limit']);		
		 
		$data['countdata'] = $this->Mhrd->tax_data_count($this->input->post());	

		$this->load->view('tax_data', $data);
	
	}
	
	function tax_add($tax_ID=null){
	
		$data['dat'] = $this->Mhrd->tax_detail($tax_ID);
	   
		$this->load->view('tax_add', $data);
	
	}
	
	function tax_add_action(){
	
		$this->Mhrd->tax_add($this->input->post());
		
	}
	
	function tax_delete($tax_ID){
	
		$this->Mhrd->tax_delete($tax_ID);
	
	}
	
	function payslip(){
	
		$output['data']['module_name'] = "Payslip";
		
		$output['data']['menu_name'] = "HRD";
		
		$output['data']['menu_active'] = "Main";
		
		$output['content'] = "hrd/payslip";
		 
		$this->load->view('template', $output);
	
	}
	
	function payslip_data($page=1){
	
		$data['limit'] = $this->input->post('limit');
		
		$data['page'] = $page;

		$data['employee_data'] = $this->Mhrd->payslip_data($this->input->post(),$data['page'],$data['limit']);		
		
		$data['countdata'] = $this->Mhrd->payslip_data_count($this->input->post());	

		$this->load->view('payslip_data', $data);

	}
	
	function payslip_add($employee_ID){
	
		$data['dat'] = $this->Mhrd->payslip_detail($employee_ID); 
	   
		$this->load->view('payslip_add', $data);
	
	}
	 
	function generate_payroll($employee_ID,$date_start,$date_end){
	 
		$data['datnya'] = $this->Mhrd->payslip_detail($employee_ID); 
		
		$salary = $data['datnya'][0]['employee_salary'];
		
		$marriedstat = $data['datnya'][0]['employee_maritalstat'];
		    
		$data['weekend'] = $this->Mhrd->get_weekend($this->input->post());
		 
		// ------------------------------------- atendance
		 
			$data['total_inout'] = $this->Mhrd->total_in($data['datnya'],$date_start,$date_end);
			 
			$x = 0;
			$in = 0;
			$out = 0;
			 
			
			if($data['total_inout']){
			
				foreach($data['total_inout'] as $keyinouit){
				 
					foreach($data['weekend'] as $keyweekend){
					
						if(date("l", strtotime($keyinouit['date'])) == $keyweekend['weekend_day']){
						
							unset($data['total_inout'][$x]);
							 
						}
					
					}
					
					$x++;
				
				}
				
				foreach($data['total_inout'] as $keyinouit){
				
					if($keyinouit['status']=="masuk"){
						$in = $in +1;
					}else{
						$out = $out+1;
					}
				
				}
			
			}
			 
			$data['in'] = $in;
			
			$data['out'] = $out;
			 
			$total_inout = $in + $out;
			
			if($total_inout == 0){
			$total_inout = 1;
			}
			
			$data['deduction_attendance'] = ($salary / $total_inout) * $out;
			 
		 
		// ------------------------------------------ cek allowance
		
			$data['allowance'] = $this->Mhrd->deduction_stat(0);
			
			$data['total_allowance'] = 24000;
		
		// ------------------------------------------ cek deduction
		
			$data['deduction'] = $this->Mhrd->deduction_stat(1);
			
			$data['total_deduction'] = 261200;
			
		
		// ------------------------------------------ cek tax
		
			$data['taxs'] = $this->Mhrd->tax();
			
			$data['wp'] = 0 ;
			
			if($data['taxs']){
			
				foreach($data['taxs'] as $keytax){
				
					if($keytax['taxable_annually'] == 1){
					
						if($keytax['grossnetto']=="netto"){
						
							if($marriedstat=="Married"){
							$marriedval = $keytax['taxable_addmarried_year'];
							}else{
							$marriedval = 0;
							}
							
							$salary = $salary - $data['total_deduction'] + $data['total_allowance'];
						
							$wp = ($keytax['tax_persentage']*0.01) * (($salary * 12) - ($keytax['taxable_min_year'] + $marriedval));
							 
						}
						
						if($keytax['grossnetto']=="gross"){
						
							if($marriedstat=="Married"){
							$marriedval = $keytax['taxable_addmarried_year'];
							}else{
							$marriedval = 0;
							}
							
							$salary = $salary + $data['total_allowance'];
						
							$wp = ($keytax['tax_persentage']*0.01) * (($salary * 12) - ($keytax['taxable_min_year'] + $marriedval));
							 
						}
						
						if($keytax['grossnetto']=="salary"){
						
							if($marriedstat=="Married"){
							$marriedval = $keytax['taxable_addmarried_year'];
							}else{
							$marriedval = 0;
							}
						
							$wp = ($keytax['tax_persentage']*0.01) * (($salary * 12) - ($keytax['taxable_min_year'] + $marriedval));
							 
						}
					
					}
					
					if($keytax['taxable_annually'] == 0){
					 
					}
				
				}
			
			}
			
			$data['wp'] = $wp;
			
			$data['wp_montly'] = $wp / 12;
			
		
		// ------------------------------------------ summary
		  
			$data['totaltax'] = $data['wp'];
		
			$data['takehome'] = $salary;
		
			$this->load->view('payslip_generate', $data);
	
	}
	
	function weekend(){
	
		
		$output['data']['module_name'] = "Human Resources";
		
		$output['data']['menu_name'] = "HRD";
		
		$output['data']['menu_active'] = "Configuration";
		
		$output['content'] = "hrd/weekend";
		   
		$this->load->view('template', $output);
	
	}
	
	function weekend_data($page=1){
	
		$data['limit'] = 10;
		
		$data['page'] = $page;
	 
		$data['weekend_data'] = $this->Mhrd->weekend_data($this->input->post(),$data['page'],$data['limit']);		
		 
		$data['countdata'] = $this->Mhrd->weekend_data_count($this->input->post());	

		$this->load->view('weekend_data', $data);
	
	}
	
	function weekend_add(){
	
		$data['weekend_data'] = $this->Mhrd->weekend_data();		
	 
		$this->load->view('weekend_add',$data);
	
	}
	
	function weekend_add_action(){
	
		$this->Mhrd->weekend_add($this->input->post());
	
	}
	
	function applicant(){
	
		$output['data']['module_name'] = "Applicant";
		
		$output['data']['menu_name'] = "HRD";
		
		$output['data']['menu_active'] = "Main";
		
		$output['data']['parent'] = $this->Mhrd->department_parent();
		if($output['data']['parent']){
			foreach($output['data']['parent'] as $pr){
				 $output['depparent'][$pr['department_ID']] = $pr['department_name'];
			}
		}
		$output['data']['department_data'] = $this->Mhrd->department_data();
		
		$output['content'] = "hrd/applicant";
		 
		$this->load->view('template', $output);
	
	}
	
	function add_applicant($applicant_ID=null){
	
		$data['parent'] = $this->Mhrd->department_parent();
		
		if($data['parent']){
			foreach($data['parent'] as $pr){
				 $data['depparent'][$pr['department_ID']] = $pr['department_name'];
			}
		}
		 
		$data['department_data'] = $this->Mhrd->department_data();
		
		$data['applicant_detail'] = $this->Mhrd->applicant_detail($applicant_ID);
		 
		$this->load->view('applicant_add', $data);
	
	}
	
	
	
	function applicant_add_action(){
		$this->Mhrd->applicant_add($this->input->post());
	}
	
	 
	function applicant_data($page=1){
	
		$data['limit'] = $this->input->post('limit');
		
		$data['page'] = $page;
	 
		$data['applicant_data'] = $this->Mhrd->applicant_data($this->input->post(),$data['page'],$data['limit']);		
		 
		$data['countdata'] = $this->Mhrd->applicant_data_count($this->input->post());	

		$this->load->view('applicant_data', $data);
	
	}
	
	function applicant_data_excel($page=1){
	
		$data['limit'] = $this->input->get('limit');
		
		$data['page'] = $page;
	 
		$data['applicant_data'] = $this->Mhrd->applicant_data($this->input->get(),$data['page'],$data['limit']);		
		 
		$data['countdata'] = $this->Mhrd->applicant_data_count($this->input->get());	
 
		$stringData = $this->parser->parse('excelfile/applicant_data_excel', $data, true);
		
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		
		header('Content-type: application/ms-excel');
		header("Expires: 0");
		header('Content-Disposition: attachment; filename=applicant_data_excel.xls');
		header("Content-Description: File Transfer");
  
		
		echo $stringData;
		exit;
		 
	
	}
	
	function jobspace(){
	
		$output['data']['module_name'] = "Job Space";
		
		$output['data']['menu_name'] = "HRD";
		
		$output['data']['menu_active'] = "Main";
		
		$output['content'] = "hrd/jobspace";
		 
		$this->load->view('template', $output);
	
	}
	
	function jobspace_data($page=1){
	
		$data['limit'] = 10;
		
		$data['page'] = $page;
	 
		$data['jobspace_data'] = $this->Mhrd->jobspace_data($this->input->post(),$data['page'],$data['limit']);	
		 
		if($data['jobspace_data']){
			$i=0;
			foreach($data['jobspace_data'] as $keys){

				$employee_num = $this->Mhrd->employee_num($keys['job_ID']);	
				
				$data['jobspace_data'][$i]['employee_num'] = $employee_num[0]['totdata'];
				
				$i++;
				 
			}
		}
		 
		$data['countdata'] = $this->Mhrd->jobspace_data_count($this->input->post());	

		$this->load->view('jobspace_data', $data);
		
	}
	
	function jobspace_data_excel($page=1){
	
		$data['limit'] = 10;
		
		$data['page'] = $page;
	 
		$data['jobspace_data'] = $this->Mhrd->jobspace_data($this->input->get(),$data['page'],$data['limit']);	
		 
		if($data['jobspace_data']){
			$i=0;
			foreach($data['jobspace_data'] as $keys){

				$employee_num = $this->Mhrd->employee_num($keys['job_ID']);	
				
				$data['jobspace_data'][$i]['employee_num'] = $employee_num[0]['totdata'];
				
				$i++;
				 
			}
		}
		 
		$data['countdata'] = $this->Mhrd->jobspace_data_count($this->input->get());	
 
		$stringData = $this->parser->parse('excelfile/jobspace_data_excel', $data, true);
		 
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		
		header('Content-type: application/ms-excel');
		header("Expires: 0");
		header('Content-Disposition: attachment; filename=jobspace_data_excel.xls');
		header("Content-Description: File Transfer");
  
		echo $stringData;
		exit;
		
	}
	
	function file_manager(){
	
		$output['data']['module_name'] = "File Manager";
		
		$output['data']['menu_name'] = "HRD";
		
		$output['data']['menu_active'] = "Main";
		
		$output['content'] = "hrd/file_manager";
		 
		$this->load->view('template', $output);
	
	}
	
	function leave_summary(){
	
		$output['data']['module_name'] = "Leave Summary";
		
		$output['data']['menu_name'] = "HRD";
		
		$output['data']['menu_active'] = "Main";
		
		$output['content'] = "hrd/leave_summary";
		 
		$this->load->view('template', $output);
	
	}
	
	function leave_summary_data($page=1){
	
		$data['limit'] = $this->input->post('limit');
		
		$data['page'] = $page;
		
		//$data['totallowed'] = $this->Mhrd->leave_allowed();	
		 
		$data['leave_data'] = $this->Mhrd->leave_summary_data($this->input->post(),$data['page'],$data['limit']);		
		 
		$data['countdata'] = $this->Mhrd->leave_summary_data_count($this->input->post());	

		$this->load->view('leave_summary_data', $data);
	
	}
	
	function leave_summary_data_excel($page=1){
	
		$data['limit'] = $this->input->get('limit');
		
		$data['page'] = $page; 
		 
		$data['leave_data'] = $this->Mhrd->leave_summary_data($this->input->get(),$data['page'],$data['limit']);		
		 
		$data['countdata'] = $this->Mhrd->leave_summary_data_count($this->input->get());	

		$this->load->view('leave_summary_data', $data);
		
		$stringData = $this->parser->parse('excelfile/leave_summary_data_excel', $data, true);
		 
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		
		header('Content-type: application/ms-excel');
		header("Expires: 0");
		header('Content-Disposition: attachment; filename=leave_summary_data_excel.xls');
		header("Content-Description: File Transfer");
  
		echo $stringData;
		exit;
	
	}
	 
	function expense_chart(){
	
		$output['data']['module_name'] = "Expense Chart";
		
		$output['data']['menu_name'] = "HRD";
		 
		$output['data']['menu_active'] = "Report";
		 
		$output['content'] = "hrd/chart/expense_chart";
		 
		$this->load->view('template', $output);
	
	}
	
	function expense_chart_json(){
	
		$jsonx['rows']    = $this->Mhrd->expense_chart_json(); 
	
		$json['cols'][]  =  array(
			"id" => "", 
			"label" => "Date", 
			"pattern" => "", 
			"type" => "string", 
		);
		$json['cols'][]  =   array(
			"id" => "", 
			"label" => "Ammount ", 
			"pattern" => "", 
			"type" => "number", 
		);
		  
		foreach($jsonx['rows'] as $key){
		
			$json['rows'][]['c'] = array(
			array('v' => $key['expense_ID']),
			array('v' => $key['total_amount'])
			);
		}
		 
		 echo json_encode($json);
	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */