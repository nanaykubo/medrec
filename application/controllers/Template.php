<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('template/index');
	}

	public function icons()
	{
		$this->load->view('template/examples/icons');		
	}
	public function login()
	{
		$this->load->view('template/examples/custom');		
	}
	public function maps()
	{
		$this->load->view('template/examples/maps');		
	}
	public function profile()
	{
		$this->load->view('template/examples/profile');		
	}
	public function register()
	{
		$this->load->view('template/examples/register');		
	}
	public function table()
	{
		$this->load->view('template/examples/table');		
	}
	public function sample()
	{
		$this->load->view('template/examples/table');		
	}
}
