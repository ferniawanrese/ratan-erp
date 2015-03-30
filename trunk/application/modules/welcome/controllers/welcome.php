<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		
		$this->load->model('login');
		$this->load->helper('form');
		$this->load->database();
		$this->load->library('core');
		$this->load->library('session');
		$this->load->helper('url');  
		$this->load->library('encrypt');
	}

	public function index()
	{
		$this->session->sess_destroy();
		$this->load->view('welcome_message');
	}
	
	function ceklog(){
	
		if($this->input->post()){
			
				$username = $this->input->post('username');
				$pass = md5(md5($this->input->post('pass')));
				$output['data'] = $this->login->cek_login($username,$pass);
				 
				$output['company']['company'] = $this->login->company($output['data']['company_groupID']);
				
				
				 
				if($output['data']){
				
				$sessian_all = array_merge($output['data'],$output['company']);
				
				$this->session->set_userdata($sessian_all);
				$this->session->set_userdata('current_companyID', $output['data']['company_ID']);
				$this->session->set_userdata('current_companygroupID', $output['data']['company_groupID']);
				$this->session->set_userdata('current_companyName', $output['data']['company_name']);
				$this->session->set_userdata('default_currencyID', $output['data']['default_currencyID']);
				
				redirect(base_url('backend'));
				
				}else{
				$this->session->sess_destroy();
				redirect(base_url(''));
				$output['alert'] = 'failed';
				}
			}
	
	}
	
	function logout(){
	
				$this->session->sess_destroy();
				$this->load->view('welcome_message');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */