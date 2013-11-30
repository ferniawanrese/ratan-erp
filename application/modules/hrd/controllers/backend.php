<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class backend extends CI_Controller {

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
		$this->load->library('parser');
		$this->load->helper('form');
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('url');  
		$this->load->library('encrypt');
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
		$this->parser->parse('backend', $data);
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */