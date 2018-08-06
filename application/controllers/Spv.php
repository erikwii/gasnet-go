<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spv extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('admin_model');
	}

	public function index()
	{
		$this->auth();
		$data = array(
            'title'=> 'GasnetGo! - Data permohonan kendaraan operasional',
            'nav' => 'nav.php',
            'isi' => 'pages/data_permohonan',
            'permohonan' => $this->admin_model->get_permohonan(),
            'nav_active' => 'data'
        );
        $this->load->view('layout/wrapper',$data);
	}

	public function data_permohonan($IDpermohonan)
	{
		$data = $this->admin_model->get_permohonan(array('IDpermohonan' => $IDpermohonan));
		echo json_encode($data);
	}

	public function tambah_permohonan()
	{
		$this->auth();

		$tanggalBerangkat = $this->input->post('tanggalBerangkat');
		$namaPengguna = $this->input->post('namaPengguna');
		$satuanKerja = $this->input->post('satuanKerja');
		$tujuan = $this->input->post('tujuan');
		$jamBerangkat = $this->input->post('jamBerangkat');
		$jamKembali = $this->input->post('jamKembali');
		$noPol = $this->input->post('noPol');
		$pengemudi = $this->input->post('pengemudi');
		$tanggalPermohonan = date('d-m-Y');
		$email = $_SESSION['go_email'];
		
		$data = array(
			'tanggalBerangkat' => $tanggalBerangkat,
			'namaPengguna' => $namaPengguna,
			'satuanKerja' => $satuanKerja,
			'tujuan' => $tujuan,
			'jamBerangkat' => $jamBerangkat,
			'jamKembali' => $jamKembali,
			'noPol' => $noPol,
			'pengemudi' => $pengemudi,
			'tanggalPermohonan' => $tanggalPermohonan,
			'email' => $email
		);
		$this->db->insert('permohonan_kendaraan',$data);

		$_SESSION['success'] = 'Permohonan kendaraan berhasil ditambahkan :)';
		redirect(base_url().'spv/');
	}

	public function edit_permohonan()
	{
		$this->auth();

		$IDpermohonan = $this->input->post('IDpermohonan');
		$tanggalBerangkat = $this->input->post('edittanggalBerangkat');
		$namaPengguna = $this->input->post('editnamaPengguna');
		$satuanKerja = $this->input->post('editsatuanKerja');
		$tujuan = $this->input->post('edittujuan');
		$jamBerangkat = $this->input->post('editjamBerangkat');
		$jamKembali = $this->input->post('editjamKembali');
		$noPol = $this->input->post('editnoPol');
		$pengemudi = $this->input->post('editpengemudi');
		
		$data = array(
			'tanggalBerangkat' => $tanggalBerangkat,
			'namaPengguna' => $namaPengguna,
			'satuanKerja' => $satuanKerja,
			'tujuan' => $tujuan,
			'jamBerangkat' => $jamBerangkat,
			'jamKembali' => $jamKembali,
			'noPol' => $noPol,
			'pengemudi' => $pengemudi,
		);
		$this->db->set($data);
		$this->db->where('IDpermohonan',$IDpermohonan);
		$this->db->update('permohonan_kendaraan');

		$_SESSION['success'] = 'Permohonan kendaraan berhasil diupdate!';
		redirect(base_url().'spv/');
	}

	public function hapus_permohonan($id)
	{	
		$this->auth();

		$this->db->delete('permohonan_kendaraan', array('IDpermohonan' => $id));

		$_SESSION['success'] = 'Anda berhasil menghapus data permohonan!';
		redirect(base_url()."spv/");
	}

	public function setuju($id)
	{
		$this->auth();

		$data = array(
			'approval' => 'Disetujui Supervisor'
		);
		$this->db->set($data);
		$this->db->where('IDpermohonan',$id);
		$this->db->update('permohonan_kendaraan');
		redirect(base_url()."spv/");
	}

	public function batal_setuju($id)
	{
		$this->auth();

		$data = array(
			'approval' => 'Belum ada persetujuan'
		);
		$this->db->set($data);
		$this->db->where('IDpermohonan',$id);
		$this->db->update('permohonan_kendaraan');
		redirect(base_url()."spv/");
	}

	public function tidak_setuju($id)
	{
		$this->auth();

		$data = array(
			'approval' => 'Tidak disetujui Supervisor'
		);
		$this->db->set($data);
		$this->db->where('IDpermohonan',$id);
		$this->db->update('permohonan_kendaraan');
		redirect(base_url().'spv/');
	}

	public function auth()
	{
		if (!isset($_SESSION['go_email']) || ($_SESSION['go_level'] != 2)) {
			$_SESSION['login_error'] = 'Anda belum melakukan login ke halaman supervisor';
			redirect(base_url()."home/");
		}
	}
}