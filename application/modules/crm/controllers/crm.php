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
	
	function meeting()
	{
		
		$output['data']['module_name'] = "Customer Relationship Manager";
		
		$output['data']['menu_name'] = "CRM";
		
		$output['data']['menu_active'] = "Main";
		
		$output['data']['submenu_active'] = "hrd";
		
		$output['content'] = "crm/meeting";
		
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
		
	}
	
	function add_meeting($meeting_ID=null){
	 
		$data['crm']  = $this->Mcrm->crm_detail($meeting_ID);
		  
		$this->load->view('meeting_add', $data);
	
	}
	
	function invitation_detail_add($expend_detailID=null){
	
		//$data['expends_detail'] = $this->Mhrd->get_expends_detail($expend_detailID);	
	 
		//$data['uom'] = $this->Mhrd->uom();	
		  
		$this->load->view('invitation_detail_add');
	 
	}
	
	function meeting_add_action(){
	
	}
	
	function get_partner_name(){
		 
		$data['employee_name']  = $this->Mcrm->get_partner_name($this->input->get('term'));
		 
		echo json_encode($data['employee_name']);
			
	}
	
	function invitation_detail_add_action($draft_stat=null){
	
			$data['draft_stat'] = $draft_stat;
			
			if($draft_stat==""){
			
			$data['id'] = $this->generate_code->getUID();
			 
			}else{
			  
			$data['id'] = $data['draft_stat'];
			 
			}
			
			$data['datanya'] =  $this->input->post(); 
 
			$this->load->view('invitation_detail_draft', $data);
			
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */