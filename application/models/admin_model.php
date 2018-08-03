<?php
class Admin_model extends CI_Model{

	public function get_permohonan($where=null)
	{
		if ($where == null) {
			$this->db->join('users', 'users.email = permohonan_kendaraan.email');
			$query = $this->db->get('permohonan_kendaraan');
			return $query->result();
			
		} else {
			$this->db->join('users', 'users.email = permohonan_kendaraan.email');
			$query = $this->db->get_where('permohonan_kendaraan',$where);
			return $query->result();
		}
	}

}