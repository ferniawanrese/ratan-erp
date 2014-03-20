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
		$this->load->library('image_lib');
		$this->load->library('parser');
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
		
		$data['employee_name'] = $this->session->userdata('employee_name');
		
		$this->parser->parse('hrd', $data);
		
	}

	function hrd_employe_viewall(){

		$data['employee_data'] = $this->Mhrd->employee_data();

		$this->parser->parse('hrd_employee_data', $data);

	}

	function hrd_save_employee ($action){

		//check update or insert

		if($action == "insert"){

		$employee_hexaID = $this->generate_code->getUID();

		}

		if($action == "update"){

		$employee_hexaID = $this->input->post('employee_hexaID');

		}

		//upload if image change or new image

		if($this->input->post('employee_photo')==""){

			$config['file_name'] 		= $this->generate_code->getUID();
			$config['upload_path'] 		= './upload/employee_photo/'.$employee_hexaID.'/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size'] 		= '1024000';
			$config['max_width']  		= '1024000';
			$config['max_height']  		= '768000';
			
			$this->load->library('upload', $config);

			$create = mkdir($config['upload_path'], 0777);

		}

		//---

		

		$this->Mhrd->save_employee($this->input->post(),$additional_data);
		
	}

	
	function hrd_addemployee($employee_hexaID= null){

		$data['employee_data_detail'] = $this->Mhrd->employee_data_detail($employee_hexaID);
		
		$data['country'] = $this->Mhrd->get_country();

		if($employee_hexaID == null ){

			$data['action'] = "insert";

		}else{

			$data['action'] = "update";
		}

		
		$this->parser->parse('hrd_addemployee', $data);

	}


	function hrd_delete_employee($employee_hexaID){

		$this->Mhrd->employee_delete($employee_hexaID);
		
	}

	function do_upload()
	{
		
		$config['upload_path'] = './upload/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '1000000';
		$config['max_width']  = '1024000';
		$config['max_height']  = '768000';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */