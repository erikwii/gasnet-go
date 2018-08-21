<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model{
    
	function get_users($data){
		if($this->home_model->is_UserExist($data['email']) == 0 ){
			return "not_registered";
		}else{
			$where = "email =" . "'" . $data['email'] . "'";
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where($where);
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
				return "success";
			} else {
				return "failed";
			}
		}
	} 
	
	function get_users_level($email){
        $query = "select level from users where email = '".$email."'";
        return $this->db->query($query)->row_array()['level'];
    }

    function get_users_pass($email){
        $query = "select password from users where email = '".$email."'";
        return $this->db->query($query)->row();
    }

    function get_users_data($email){
        $query = "select * from users where email = '".$email."'";
        return $this->db->query($query)->row();
    }

	function is_UserExist($email){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email', $email);
		return $query = $this->db->get()->num_rows();
	}
	
	public function get_inventaris($IDinventaris=null)
	{
		if (isset($IDinventaris)) {
			$this->db->join('barang', 'inventaris.IDbarang = barang.IDbarang');
			return $this->db->get_where('inventaris', array('IDinventaris'=>$IDinventaris))->result();
		}else{
			$this->db->join('barang', 'inventaris.IDbarang = barang.IDbarang');
			return $this->db->get('inventaris')->result();
		}
	}

	public function get_inventaris_where($where)
	{
		$this->db->join('barang', 'inventaris.IDbarang = barang.IDbarang');
		return $this->db->get_where('inventaris', $where)->row_array();
	}

	public function get_barang($IDbarang=null)
	{
		if (isset($IDbarang)) {
			return $this->db->get_where('barang', array('IDbarang'=>$IDbarang))->result();
		}else{
			return $this->db->get('barang')->result();
		}
	}

	public function get_barang_where($where)
	{
		$query = $this->db->get_where('barang', $where);
		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return false;
		}
	}
	
	public function read_date($tanggal){
		$arrTgl = explode("-", $tanggal);
		$th = $arrTgl[0];
		$tbln = $arrTgl[1];
		$tgl = $arrTgl[2];

		$bulan = array(
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember'
		);

		return $tgl." ".$bulan[$tbln]." ".$th;
	}
	
	public function tranlate_day_to_indo($day)
	{
		$arrday = array(
			'Sun' => 'Minggu',
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => 'Jumat',
			'Sat' => 'Sabtu'
		);

		return $arrday[$day];
	}

	public function month_indo($month){
		$bulan = "";
		switch($month){
			case"01":
				$bulan="Januari";
				break;
			case"02":
				$bulan="Februari";
				break;
			case"03":
				$bulan="Maret";
				break;
			case"04":
				$bulan="April";
				break;
			case"05":
				$bulan="Mei";
				break;
			case"06":
				$bulan="Juni";
				break;
			case"07":
				$bulan="Juli";
				break;
			case"08":
				$bulan="Agustus";
				break;
			case"09":
				$bulan="September";
				break;
			case"10":
				$bulan="Oktober";
				break;
			case"11":
				$bulan="November";
				break;
			case"12":
				$bulan="Desember";
				break;
		}
		return $bulan;
	}


    public function get_usersStatus($where){
        $this->db->from('users');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->row();
    }

}