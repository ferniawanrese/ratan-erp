<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class purchase extends CI_Controller {

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
		$this->load->model('Mpurchase');  
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
	 
		$output['data']['module_name'] = "Purchase";
		
		$output['data']['menu_name'] = "Purchase";
		
		$output['data']['menu_active'] = "Main";
		
		$output['data']['submenu_active'] = "hrd";
		  
		$output['content'] = "purchase/purchase";
		
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
		
	}
	 
	function vendor(){
	
		$output['data']['module_name'] = "Asset";
		
		$output['data']['menu_name'] = "Asset";
		
		$output['data']['menu_active'] = "Configuration";
		 
		$output['content'] = "asset/vendor";
		 
		$this->load->view('template', $output);
	
	}
	 
	function vendor_data($page = 1){
	
		$data['limit'] = 10;
		
		$data['page'] = $page;
		  
		$data['vendor_data'] = $this->Masset->vendor_data($this->input->post(),$data['page'], $data['limit']);
		
		$data['countdata'] = $this->Masset->vendor_data_count($this->input->post());
		 
		$this->load->view('vendor_data', $data);
	
	}
	
	function vendor_add($vendor_ID=null){
	  
		$data['dat'] = $this->Masset->vendor_detail($vendor_ID);
		
		$data['currency'] = $this->Mhrd->currency();	
	   
		$this->load->view('vendor_add', $data);
	 
	}
	
	function vendor_add_action(){
	  
		$this->Masset->vendor_add($this->input->post());
		 
	}
	
	function vendor_delete($vendor_ID){
	
		$this->Masset->vendor_delete($vendor_ID);
	
	}
	
	function shipping(){
	
		$output['data']['module_name'] = "Purchase";
		
		$output['data']['menu_name'] = "Purchase";
		
		$output['data']['menu_active'] = "Configuration";
		 
		$output['content'] = "Purchase/shipping";
		 
		$this->load->view('template', $output);
	
	}
	
	function shipping_data($page = 1){
	
		$data['limit'] = 10;
		
		$data['page'] = $page;
		  
		$data['shipping_data'] = $this->Mpurchase->shipping_data($this->input->post(),$data['page'], $data['limit']);
		
		$data['countdata'] = $this->Mpurchase->shipping_data_count($this->input->post());
		 
		$this->load->view('shipping_data', $data);
	
	}
	
	function shipping_add($shipping_ID=null){
	  
		$data['dat'] = $this->Mpurchase->shipping_detail($shipping_ID);
		 
		$this->load->view('shipping_add', $data);
	 
	}
	
	function shipping_add_action(){
	  
		$this->Mpurchase->shipping_add($this->input->post());
		 
	}
	
	function billing(){
	
		$output['data']['module_name'] = "Purchase";
		
		$output['data']['menu_name'] = "Purchase";
		
		$output['data']['menu_active'] = "Configuration";
		 
		$output['content'] = "Purchase/billing";
		 
		$this->load->view('template', $output);
	
	}
	
	function billing_data($page = 1){
	
		$data['limit'] = 10;
		
		$data['page'] = $page;
		  
		$data['billing_data'] = $this->Mpurchase->billing_data($this->input->post(),$data['page'], $data['limit']);
		
		$data['countdata'] = $this->Mpurchase->billing_data_count($this->input->post());
		 
		$this->load->view('billing_data', $data);
	
	}
	
	function billing_add($billing_ID=null){
	  
		$data['dat'] = $this->Mpurchase->billing_detail($billing_ID);
		 
		$this->load->view('billing_add', $data);
	 
	}
	
	function billing_add_action(){
	  
		$this->Mpurchase->billing_add($this->input->post());
		 
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */