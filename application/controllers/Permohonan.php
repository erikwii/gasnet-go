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
            'permohonan' => $this->admin_model->get_permohonan(),
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
			'permohonan_kendaraan.email' => $email
		);
		$this->db->insert('permohonan_kendaraan',$data);

		$IDpermohonan = $this->admin_model->get_permohonan_data($data)['IDpermohonan'];
		$SPVemail = $this->input->post('emailspv');

		$config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'gasnet.dummy@gmail.com',
            'smtp_pass' => 'passwordgasnet',
            'mailtype'  => 'html', 
            'charset'   => 'utf-8'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        $this->email->from('no-reply@go.gasnet.id', 'Gasnet-doNotReply');
        $this->email->reply_to('no-reply@go.gasnet.id', 'Gasnet-doNotReply');
        $this->email->to($SPVemail);

        $user = $this->home_model->get_users_data($email);
        $content = array(
        	'title' => 'Permohonan Kendaraan Operasional',
        	'preheader' => $user->nama.' dari bagian '.$user->posisi.' mengirimkan permohonan kendaraan operasional.',
        	'nama' => $user->nama,
        	'data' => $data,
        	'IDpermohonan' => $IDpermohonan
        );
        $msg = $this->load->view('pages/email',$content,true);
        $this->email->subject('[GasnetGo] Permohonan kendaraan operasional');
        $this->email->message($msg);

        if ($this->email->send()) {
            $_SESSION['success'] = ['Berhasil!','Permohonan dan email berhasil dikirim ke supervisor.'];
        }else{
            $_SESSION['error'] = 'gagal Mengirim email';
        }
        
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

		$_SESSION['success'] = ['Berhasil!','Permohonan kendaraan berhasil diupdate!'];
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

		$_SESSION['success'] = ['Berhasil Dihapus!','Anda berhasil menghapus data permohonan!'];
		redirect(base_url()."permohonan/data");
	}

	public function cetakform($id)
	{	
		$this->auth();
		
		$permohonan = $this->admin_model->get_permohonan_data(array('IDpermohonan'=>$id));

		if ($permohonan['approval'] == 'Belum ada persetujuan') {
			redirect(base_url()."permohonan/data");
		}

		$data = array(
            'title'=> 'GasnetGo! - Permohonan Kendaraan Operasional',
            'nav' => 'nav.php',
            'isi' => 'pages/cetak_form',
            'nav_active' => 'permohonan',
            'permohonan' => $permohonan
        );
        $this->load->view('pages/cetak_form',$data);
	}

	public function auth()
	{
		if (!isset($_SESSION['go_email'])) {
			$_SESSION['login_error'] = 'Anda belum melakukan login ke halaman Admin'.$_SESSION['go_level'];
			redirect(base_url()."home/");
		}
	}
}
