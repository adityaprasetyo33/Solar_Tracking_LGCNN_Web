<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_test');
	}
	public function index()
	{
		$data['jlm_data'] = $this->m_test->m_GetJlmData();
		$this->load->view('layout/meta');
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar_test');
		$this->load->view('test_dt/index', $data);
		$this->load->view('layout/footer');
	}
	public function getJlmData()
	{
		$jlm_data = $this->input->post("jlm_data");
		$data = $this->m_test->m_GetDataKe($jlm_data);
		echo json_encode($data);
	}

	public function getDataPerhitungan()
	{
		$id_data = $this->input->post("id_data");
		$data = $this->m_test->m_GetDataPerhitungan($id_data);
		echo json_encode($data);
	}

	public function getData()
	{
		$jlm_data = $this->input->post("jlm_data");
		$data = $this->m_test->m_GetData($jlm_data);
		echo json_encode($data);
	}
}
