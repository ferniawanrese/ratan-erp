<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class crm extends CI_Controller {

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
		$this->load->model('Mcrm');  
		$this->load->model('hrd/Mhrd');  
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
	 
		$output['data']['module_name'] = "Customer Relationship Manager";
		
		$output['data']['menu_name'] = "CRM";
		
		$output['data']['menu_active'] = "Main";
		
		$output['data']['submenu_active'] = "hrd";
		  
		$output['content'] = "crm/crm";
		
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
		
	}
	
	function crm_data($page=1){
	
		$data['limit'] = 10;
		
		$data['page'] = $page;
		  
		$data['crm_data'] = $this->Mcrm->crm_data($this->input->post(),$data['page'], $data['limit']);
		  
		$data['countdata'] = $this->Mcrm->crm_data_count($this->input->post());	
		 
		$this->load->view('crm_data', $data);
	
	}
	
	function add_crm($crm_ID=null){
	 
		$data['crm']  = $this->Mcrm->crm_detail($crm_ID);
		  
		$this->load->view('crm_add', $data);
	
	}
	
	function customer_add_action(){
	  
		$this->Mcrm->customer_add($this->input->post());
		 
	}
	
	function crm_delete($customer_ID){
	
		$this->db->where('customer_ID',$customer_ID);
		
		$this->db->set('deleted',1);
	
		$this->db->update('customer');
	
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */