<?php
class M_training extends CI_Model
{
	private $_table_jlm_data = "dt_jlm_training";
	private $_table_data_training = "variant_div";
	private $_table_data = "tb_data";
	private $_table_iterasi = "tb_iterasi";
	private $_table_sub_iterasi = "sub_iterasi";
	
	function m_GetJlmData(){
		$this->db->select('*');    
		$query = $this->db->get($this->_table_jlm_data);
		return $query->result_array();
	}

	function m_GetDataTraining($id_jlm_training){
		$this->db->select('*');    
		$this->db->join('sub_data_training', 'sub_data_training.id_training = tb_data.id');
		$this->db->where('sub_data_training.id_jlm_training',$id_jlm_training);
		$query = $this->db->get($this->_table_data);
		return $query->result_array();
	}

	function m_GetIterasi($id_jlm_training){
		$this->db->select('id,iterasi_ke');
		$this->db->where('id_jlm_training ',$id_jlm_training); 	
		$query = $this->db->get($this->_table_iterasi);
		return $query->result_array();
	}

	function m_GetDataIterasi($id_iterasi){
		$this->db->select('*');
		$this->db->where('id ',$id_iterasi); 	
		$query = $this->db->get($this->_table_iterasi);
		return $query->result_array();
	}

	function m_GetIterasiData($id_iterasi){
		$this->db->select('*');
		$this->db->where('id_iterasi ',$id_iterasi); 	
		$query = $this->db->get($this->_table_sub_iterasi);
		return $query->result_array();
	}
}
