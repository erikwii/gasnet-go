<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permohonan extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('admin_model');
	}

	public function index()
	{
		$this->auth();

		$data = array(
            'title'=> 'GasnetGo! - Permohonan Kendaraan Operasional',
            'nav' => 'nav.php',
            'isi' => 'pages/permohonan',
            'nav_active' => 'permohonan'
        );
        $this->load->view('layout/wrapper',$data);
	}

	public function data()
	{
		$this->auth();

		$data = array(
            'title'=> 'GasnetGo! - Permohonan Kendaraan Operasional',
            'nav' => 'nav.php',
            'isi' => 'pages/data_permohonan',
            'permohonan' => $this->admin_model->get_permohonan(array('permohonan_kendaraan.email' => $_SESSION['go_email'])),
            'nav_active' => 'data'
        );
        $this->load->view('layout/wrapper',$data);
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
		$tanggalPermohonan = date('Y-m-d');
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

		$_SESSION['success'] = 'Permohonan kendaraan berhasil dikirim. Silahkan cek data Persetujuan 1x24 jam';
		redirect(base_url().'permohonan/');
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
			'pengemudi' => $pengemudi
		);
		$this->db->set($data);
		$this->db->where('IDpermohonan',$IDpermohonan);
		$this->db->update('permohonan_kendaraan');

		$_SESSION['success'] = 'Permohonan kendaraan berhasil diupdate!';
		redirect(base_url().'permohonan/data/');
	}

	public function hapus_permohonan($id)
	{	
		$this->auth();

		if (!isset($_SESSION['go_email']) || !isset($_SESSION['go_password'])) {
			$_SESSION['login_error'] = 'Anda belum melakukan login';
			redirect(base_url());
		}

		$this->db->delete('permohonan_kendaraan', array('IDpermohonan' => $id));

		$_SESSION['success'] = 'Anda berhasil menghapus data permohonan!';
		redirect(base_url()."permohonan/");
	}

	public function auth()
	{
		if (!isset($_SESSION['go_email'])) {
			$_SESSION['login_error'] = 'Anda belum melakukan login ke halaman Admin'.$_SESSION['go_level'];
			redirect(base_url()."home/");
		}
	}
}
