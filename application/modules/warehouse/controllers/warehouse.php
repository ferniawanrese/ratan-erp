<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class warehouse extends CI_Controller {

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
		$this->load->model('Mwarehouse');  
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
	 
		$output['data']['module_name'] = "Warehouse";
		
		$output['data']['menu_name'] = "Warehouse";
		
		$output['data']['menu_active'] = "Main";
		
		$output['data']['submenu_active'] = "hrd";
		  
		$output['content'] = "asset/asset";
		
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
		
	}
	
	function asset_data($page=1){
	
		$data['limit'] = 10;
		
		$data['page'] = $page;
		  
		$data['asset_data'] = $this->Masset->asset_data($this->input->post(),$data['page'], $data['limit']);
		 
		$data['parent'] = $this->Mhrd->department_parent();
		 
		foreach($data['parent'] as $pr){
			 $data['depparent'][$pr['department_ID']] = $pr['department_name'];
		}
		   
		$data['countdata'] = $this->Masset->asset_data_count($this->input->post());	

		$this->load->view('asset_data', $data);
	
	}
	
	function add_asset($asset_ID=null){
	 
		$data['asset']  = $this->Masset->asset_detail($asset_ID);
		
		$data['asset_group'] = $this->Masset->get_asset_group();
		
		$data['asset_state'] = $this->Masset->get_asset_state();
		  
		$data['parent'] = $this->Mhrd->department_parent();
		
		if($data['parent']){
			foreach($data['parent'] as $pr){
				 $data['depparent'][$pr['department_ID']] = $pr['department_name'];
			}
		}
		 
		$data['department_data'] = $this->Mhrd->department_data();
				
		$this->load->view('asset_add', $data);
	
	}
	
	function asset_add_action(){
	  
		$this->Masset->asset_add($this->input->post());
		 
	}
	
	function asset_delete($asset_ID){
	
		$this->Masset->asset_delete($asset_ID);
	
	}
	
	function asset_group(){
	
		$output['data']['module_name'] = "Asset";
		
		$output['data']['menu_name'] = "Asset";
		
		$output['data']['menu_active'] = "Configuration";
		 
		$output['content'] = "asset/asset_group";
		
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
	}
	
	function get_asset_group($data=null){
	
		$json['dat'] = $this->Masset->asset_group_data($data,$limit=null,$page=null);
		
		 echo json_encode($json);
		 
	}
	
	function asset_group_data($page=1){
	
		$data['limit'] = 10;
		
		$data['page'] = $page;
		  
		$data['asset_data'] = $this->Masset->asset_group_data($this->input->post(),$data['page'], $data['limit']);
		
		$data['countdata'] = $this->Masset->asset_group_data_count($this->input->post());
		 
		$this->load->view('asset_group_data', $data);
	
	}
	
	function asset_group_add($asset_groupID=null){
	  
		$data['dat'] = $this->Masset->asset_group_detail($asset_groupID);
	   
		$this->load->view('asset_group_add', $data);
	 
	}
	
	function asset_group_add_action(){
	  
		$this->Masset->asset_group_add($this->input->post());
		 
	}
	 
	function asset_group_delete($asset_groupID){
	
		$this->Masset->asset_group_delete($asset_groupID);
	
	}
	
	function asset_state(){
	
		$output['data']['module_name'] = "Asset";
		
		$output['data']['menu_name'] = "Asset";
		
		$output['data']['menu_active'] = "Configuration";
		 
		$output['content'] = "asset/asset_state";
		 
		$this->load->view('template', $output);
	}
	
	function get_asset_state($data=null){
	
		$json['dat'] = $this->Masset->asset_state_data($data,$limit=null,$page=null);
		
		 echo json_encode($json);
		 
	}
	
	function asset_state_data($page=1){
	
		$data['limit'] = 10;
		
		$data['page'] = $page;
		  
		$data['asset_data'] = $this->Masset->asset_state_data($this->input->post(),$data['page'], $data['limit']);
		
		$data['countdata'] = $this->Masset->asset_state_data_count($this->input->post());
		 
		$this->load->view('asset_state_data', $data);
	
	}
	
	function asset_state_add($asset_stateID=null){
	  
		$data['dat'] = $this->Masset->asset_state_detail($asset_stateID);
	   
		$this->load->view('asset_state_add', $data);
	 
	}
	
	function asset_state_add_action(){
	  
		$this->Masset->asset_state_add($this->input->post());
		 
	}
	
	function asset_state_delete($asset_stateID){
	
		$this->Masset->asset_state_delete($asset_stateID);
	
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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */