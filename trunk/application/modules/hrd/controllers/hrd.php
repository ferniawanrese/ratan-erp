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
		
		$output['content'] = "hrd/hrd";
		
		$output['filterplus'] = $this->core->filterplus('employee');
		
		$this->load->view('template', $output);
		
	}

	function hrd_employe_data($page=1){
	
		$data['limit'] = $this->input->post('limit');
		
		$data['page'] = $page;

		$data['employee_data'] = $this->Mhrd->employee_data($this->input->post(),$data['page'],$data['limit']);		
		
		$data['countdata'] = $this->Mhrd->employee_data_count($this->input->post());	

		$this->load->view('hrd_employee_data', $data);

	}
	
	function hrd_employe_data_export(){
	
		header("Content-type: application/vnd-ms-excel");
 
		header("Content-Disposition: attachment; filename=employee-export.xls");
 
		$content = "

		<table>

		<tr><td>nama</td><td>bimosaurus</td></tr><tr><td>alamat</td><td>wonosobo</td></tr><tr><td>nohp</td><td>080808080</td></tr>

		</table>

		";
		
		print $content;

	}

	function hrd_save_employee (){
		
		$this->Mhrd->save_employee($this->input->post());
				
		$config['file_name'] 		= $this->generate_code->getUID();
		$config['upload_path'] 	= './upload/employee_photo/'.$config['file_name'].'/';
		$config['allowed_types'] 	= 'gif|jpg|png';
		
		mkdir($config['upload_path'], 0777);
		
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			 $this->core->resize_im($config);
		}
		
	}

	
	function hrd_addemployee($employee_hexaID= null){
	
		$data['data_detail'] = $this->Mhrd->employee_data_detail($employee_hexaID);
				
		$data['country'] = $this->Mhrd->get_country();
				
		$this->load->view('hrd_addemployee', $data);
		
	}


	function hrd_delete_employee($employee_hexaID){

		$this->Mhrd->employee_delete($employee_hexaID);
		
	}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */