<?php
class M_test extends CI_Model
{
	private $_table_jlm_data = "dt_jlm_training";
	private $_table_test = "dt_test";
	private $_table_sub_test = "sub_data_test";

	function m_GetJlmData()
	{
		$this->db->select('*');
		$query = $this->db->get($this->_table_jlm_data);
		$result = $query->result_array();
		$arr_result = [];
		$j = 0;
		foreach ($result as $value) {
			if (450 - $value["jumlah_training"] != 0) {
				array_push(
					$arr_result,
					array(
						'id' => $value["id"],
						'jumlah_data' => 450 - $value["jumlah_training"]
					)
				);
			}
		}
		return $arr_result;
	}

	function m_GetData($id_jlm_data)
	{
		$this->db->select('tb_data.dt1,tb_data.dt2,tb_data.dt3,tb_data.dt4,tb_data.dt5,tb_data.dt6,tb_data.dt7,tb_data.dt8,tb_data.dt9,tb_data.kelas as kelas, dt_test.kelas as hasil');    
		$this->db->join('tb_data', 'dt_test.id_training = tb_data.id');
		$this->db->where('id_jumlah_test ',$id_jlm_data);
		$query = $this->db->get($this->_table_test);
		return $query->result_array();
	}

	function m_GetDataKe($id_jlm_data){
		$this->db->select('id');
		$this->db->where('id_jumlah_test',$id_jlm_data);
		$query = $this->db->get($this->_table_test);
		return $query->result_array();
	}

	// data perhitnungan = sub data perhitungan
	function m_GetDataPerhitungan($id_data){
		$this->db->select('*');
		$this->db->where('id_data',$id_data);
		$query = $this->db->get($this->_table_sub_test);
		return $query->result_array();
	}
	
}
