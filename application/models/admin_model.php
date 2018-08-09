<?php
class Admin_model extends CI_Model{

	public function get_permohonan($where=null)
	{
		if ($where == null) {
			$this->db->order_by('IDpermohonan', 'DESC');
			$this->db->join('users', 'users.email = permohonan_kendaraan.email');
			$query = $this->db->get('permohonan_kendaraan');
			return $query->result();
			
		} else {
			$this->db->order_by('IDpermohonan', 'DESC');
			$this->db->join('users', 'users.email = permohonan_kendaraan.email');
			$query = $this->db->get_where('permohonan_kendaraan',$where);
			return $query->result();
		}
	}

	public function get_permohonan_data($where)
	{
		$this->db->order_by('IDpermohonan', 'DESC');
			$this->db->join('users', 'users.email = permohonan_kendaraan.email');
			$query = $this->db->get_where('permohonan_kendaraan',$where);
			return $query->row_array();
	}

	public function get_akun_role($role=null)
	{
		if ($role == null) {
			return $this->db->get('users')->result();
		} else {
			if ($role == 'admin') {
				return $this->db->get_where('users', array('level'=>3))->result();
			} elseif($role == 'spv') {
				return $this->db->get_where('users', array('level'=>2))->result();
			} else {
				return $this->db->get_where('users', array('level'=>1))->result();
			}
		}
	}

	public function get_akun($where)
	{
		if ($where == null) {
			return $this->db->get('users')->result();
		} else {
			return $this->db->get_where('users',$where)->row_array();
		}
	}
}