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
		$this->load->library('generate_code'); 
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
	
		$output['data']['module_name'] = "Dasboard";
		
		$output['data']['main_menu'] = $this->Mbackend->cek_menu($this->session->userdata('employee_ID'));
		
		$output['content'] = "backend/backend";
		
		$this->load->view('template', $output);
		
	}
	
	
	public function company()
	{
	
		$output['data']['module_name'] = "Dasboard";
		
		$output['data']['main_menu'] = $this->Mbackend->cek_menu($this->session->userdata('employee_ID'));
		
		$output['content'] = "backend/company";
		
		$this->load->view('template', $output);
		
	}
	
	public function company_data($page = 1)
	{
	
		$data['limit'] = "10";
		
		$data['page'] = $page;
		
		$search = $this->input->post('search');
	
		$data['companies'] = $this->Mbackend->companies($data['limit'],$data['page'],$search);
		
		$data['countdata'] = $this->Mbackend->companies_count($search);
		 
		$this->load->view('company_data', $data);
		
	}
	
	public function add_company($company_ID=null){
	
	$data['companies'] = $this->Mbackend->companies_det($company_ID);
	
	$data['currency'] = $this->Mbackend->currency();
	 
	$this->load->view('company_add',$data);
	
	}
	
	function company_add_action(){
	
	$this->Mbackend->company_add($this->input->post());
	
	}
	
	function edit_company($company_ID=null){
	
	$data['companies'] = $this->Mbackend->companies_det($company_ID);
	
	$data['currency'] = $this->Mbackend->currency();
	
	$this->load->view('company_add', $data);
	 
	}
	
	function delete_company($company_ID){
	
	$this->Mbackend->delete_company($company_ID);
	 
	}
	
	function changecompany($company_ID){
	
	$data['companies'] = $this->Mbackend->companies_det($company_ID);
	 
	$this->session->set_userdata('current_companyID', $company_ID);
	$this->session->set_userdata('current_companyName', $data['companies'][0]['company_name']);
	$this->session->set_userdata('default_currencyID', $data['companies'][0]['default_currencyID']);
	
	redirect('backend');
	
	}
	
}
