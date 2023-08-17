<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Training extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_training');
	}
	public function index()
	{
		$data['jlm_data'] = $this->m_training->m_GetJlmData();
		$this->load->view('layout/meta');
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar_training');
		$this->load->view('training/index', $data);
		$this->load->view('layout/footer');
	}
	public function getIterasi()
	{
		$jlm_data = $this->input->post("jlm_training");
		$data = $this->m_training->m_GetIterasi($jlm_data);
		echo json_encode($data);
	}
	public function getDataIterasi()
	{
		$id_iterasi = $this->input->post("id_iterasi");
		$data = $this->m_training->m_GetDataIterasi($id_iterasi);
		echo json_encode($data);
	}
	public function getIterasiData()
	{
		$id_iterasi = $this->input->post("id_iterasi");
		$data = $this->m_training->m_GetIterasiData($id_iterasi);
		echo json_encode($data);
	}
	public function getData()
	{
		$jlm_data = $this->input->post("jlm_training");
		$data = $this->m_training->m_GetDataTraining($jlm_data);
		echo json_encode($data);
	}
}
