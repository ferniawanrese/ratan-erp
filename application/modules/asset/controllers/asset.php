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
	 
		$output['data']['module_name'] = "Asset";
		
		$output['data']['menu_name'] = "Asset";
		
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
		  
		//$data['department_data'] = $this->Masset->department_data($this->input->post(),$data['page'],$data['limit']);		
		
		//$data['countdata'] = $this->Masset->department_data_count($this->input->post());	

		$this->load->view('asset_data', $data);
	
	}
	
	function add_asset(){
	 
		//$data['manager_name']  = $this->Mhrd->get_employee_detail($data['data_detail'][0]['manager_ID']);
		 
		$data['country'] = $this->Mhrd->get_country();
		
		$data['parent'] = $this->Mhrd->department_parent();
		
		if($data['parent']){
			foreach($data['parent'] as $pr){
				 $data['depparent'][$pr['department_ID']] = $pr['department_name'];
			}
		}
		 
		$data['department_data'] = $this->Mhrd->department_data();
				
		$this->load->view('asset_add', $data);
	
	}
	
	function asset_group(){
	
		$output['data']['module_name'] = "Asset";
		
		$output['data']['menu_name'] = "Asset";
		
		$output['data']['menu_active'] = "Configuration";
		 
		$output['content'] = "asset/asset_group";
		
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
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
		
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
	}
	
	function asset_state_data($page=1){
	
		$data['limit'] = 10;
		
		$data['page'] = $page;
		  
		$data['asset_data'] = $this->Masset->asset_group_data($this->input->post(),$data['page'], $data['limit']);
		
		$data['countdata'] = $this->Masset->asset_group_data_count($this->input->post());
		 
		$this->load->view('asset_state_data', $data);
	
	}
	
	
	 
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */