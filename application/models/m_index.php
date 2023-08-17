<?php
class M_index extends CI_Model
{
	private $_table_output = "tb_output";

	function m_Getoutput(){
		$this->db->select('v_dinamis,hasil,insert_at')->limit(12)->order_by("id", "DESC");
		$query=$this->db->get($this->_table_output);
		return $query->result_array();
	}
}
