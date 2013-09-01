<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends My_Module
{
	public function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->template['title'] = 'Login module title';
		$this->output('login');
	}

	public function test1()
	{
		echo 'coucou';
	}

	public function test2()
	{
		echo 'caca';
	}
}
