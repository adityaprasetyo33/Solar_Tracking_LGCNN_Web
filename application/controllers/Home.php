<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_index');
	}
	public function index()
	{
		$data['output']=$this->m_index->m_Getoutput();
		$this->load->view('layout/meta');
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar_home');
		$this->load->view('dashboard/index',$data);
		$this->load->view('layout/footer');
	}
}
