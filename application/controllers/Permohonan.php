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
		if (!isset($_SESSION['go_email'])) {
			$_SESSION['login_error'] = 'Anda belum melakukan login';
			redirect(base_url()."home/");
		}

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
		if (!isset($_SESSION['go_email'])) {
			$_SESSION['login_error'] = 'Anda belum melakukan login';
			redirect(base_url()."home/");
		}

		$data = array(
            'title'=> 'GasnetGo! - Permohonan Kendaraan Operasional',
            'nav' => 'nav.php',
            'isi' => 'pages/data_permohonan',
            'permohonan' => $this->admin_model->get_permohonan(array('permohonan_kendaraan.email' => $_SESSION['go_email'])),
            'nav_active' => 'data_permohonan'
        );
        $this->load->view('layout/wrapper',$data);
	}

	public function tambah_permohonan()
	{
		if (!isset($_SESSION['go_email']) || !isset($_SESSION['go_password'])) {
			$_SESSION['login_error'] = 'Anda belum melakukan login';
			redirect(base_url());
		}

		$tanggalBerangkat = $this->input->post('tanggalBerangkat');
		$namaPengguna = $this->input->post('namaPengguna');
		$satuanKerja = $this->input->post('satuanKerja');
		$tujuan = $this->input->post('tujuan');
		$jamBerangkat = $this->input->post('jamBerangkat');
		$jamKembali = $this->input->post('jamKembali');
		$noPol = $this->input->post('noPol');
		$pengemudi = $this->input->post('pengemudi');
		$tanggalPermohonan = date('d-M-Y');
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
}