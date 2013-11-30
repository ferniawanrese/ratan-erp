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
				if($output['data']){
				$this->session->set_userdata($output['data']);
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