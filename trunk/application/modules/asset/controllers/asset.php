<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class asset extends CI_Controller {

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
		$this->load->model('Masset');  
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
		
		$output['data']['menu_active'] = "Main";
		
		$output['data']['submenu_active'] = "hrd";
		
		$output['data']['parent'] = $this->Masset->department_parent();
		if($output['data']['parent']){
			foreach($output['data']['parent'] as $pr){
				 $output['depparent'][$pr['department_ID']] = $pr['department_name'];
			}
		}
		$output['data']['department_data'] = $this->Masset->department_data();
		
		$output['content'] = "hrd/hrd";
		
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
		
	}
	 
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */