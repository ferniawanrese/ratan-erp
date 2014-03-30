<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class backend extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->model('Mbackend');
		$this->load->helper('form');
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('url');  
		$this->load->library('core');
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
		
		$output['data']['main_menu'] = $this->Mbackend->cek_menu($this->session->userdata('employee_hexaID'));
		
		$output['content'] = "backend/backend";
		
		$this->load->view('template', $output);
		
	}
	
	
	
	
}
