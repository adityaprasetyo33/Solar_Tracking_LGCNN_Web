<?php
class M_monitoring extends CI_Model
{
	private $_table_output = "tb_output";

	function m_Getoutput()
	{
		$this->db->select('*')->limit(12)->order_by("id", "DESC");
		$query = $this->db->get($this->_table_output);
		return $query->result_array();
	}
	function m_GetDay()
	{
		$this->db->select("DISTINCT DATE(insert_at) AS tanggal");
		$query = $this->db->get($this->_table_output);
		return $query->result_array();
	}
	function m_GetData($tanggal)
	{
		$this->db->select('*,DATE_FORMAT(insert_at, "%H:%i:%s") AS waktu');
		$this->db->where('DATE(insert_at)', $tanggal);
		$query = $this->db->get($this->_table_output);
		return $query->result_array();
	}
	function m_addData($data)
	{
		extract($data);
		return $this->db->insert(
			$this->_table_output,
			array(
				"sensor1"    => $sensor1,
				"sensor2"    => $sensor2,
				"sensor3"    => $sensor3,
				"sensor4"    => $sensor4,
				"sensor5"    => $sensor5,
				"sensor6"    => $sensor6,
				"sensor7"    => $sensor7,
				"sensor8"    => $sensor8,
				"sensor9"    => $sensor9,
				"hasil"    => $hasil,
				"v_dinamis"    => $v_dinamis,
				"v_statis"    => $v_statis
			)
		);
	}
}
