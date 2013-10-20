<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Demo extends My_Module
{
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('id_user')){
		redirect('/admin/auth/login');
	}
	}

	function index()
	{	
	
		$this->template['title'] = 'Demo module title';
		$this->template['asik']="asik";
		$this->output('demo');
		
	}

	public function ceklog()
	{
		$this->template['title'] = 'Demo module title';
		$this->output('cek');
	}
	function alert()
	{
		$this->output('alert');
	}
	function breadcrumb()
	{
		$this->output('breadcrumb');
	}
	function left_menu()
	{
		$this->output('left_menu');
	}
	function data()
	{
		$this->output('data');
	}
	function tabs_right()
	{
		$this->output('tabs_right');
	}
}
