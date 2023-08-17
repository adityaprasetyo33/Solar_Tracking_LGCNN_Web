<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_monitoring');
	}
	public function index()
	{
		$this->load->view('layout/meta');
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar_monitoring');
		$this->load->view('monitoring/index');
		$this->load->view('layout/footer');
	}
	public function getDay()
	{
		$data = $this->m_monitoring->m_GetDay();
		echo json_encode($data);
	}
	public function getDatabyDay()
	{
		$tanggal = $this->input->post("tanggal");
		$data = $this->m_monitoring->m_GetData($tanggal);
		echo json_encode($data);
	}
	public function insertHasil()
	{
		$data = array(
			"sensor1"    => $this->input->post("sensor1"),
			"sensor2"    => $this->input->post("sensor2"),
			"sensor3"    => $this->input->post("sensor3"),
			"sensor4"    => $this->input->post("sensor4"),
			"sensor5"    => $this->input->post("sensor5"),
			"sensor6"    => $this->input->post("sensor6"),
			"sensor7"    => $this->input->post("sensor7"),
			"sensor8"    => $this->input->post("sensor8"),
			"sensor9"    => $this->input->post("sensor9"),
			"hasil"    => $this->input->post("hasil"),
			"v_dinamis"    => $this->input->post("v_dinamis"),
			"v_statis"    => $this->input->post("v_statis")
		);

		$insert = $this->m_monitoring->m_addData($data);

		if ($insert) {
			return json_encode(array('status' => 'ok', 201));
		} else {
			return json_encode(array('status' => 'fail', 502));
		}
	}
}
