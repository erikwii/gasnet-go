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
		$posisi = $this->home_model->get_users_data($_SESSION['go_email'])->posisi;
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

		$_SESSION['success'] = ['Berhaisl!','Anda berhasil menghapus data permohonan!'];
		redirect(base_url()."spv/");
	}

	public function setuju($id)
	{
		$_SESSION['goto'] = base_url().'spv/setuju/'.$id;

		$data = array(
			'approval' => 'Disetujui Supervisor'
		);
		$this->db->set($data);
		$this->db->where('IDpermohonan',$id);
		$this->db->update('permohonan_kendaraan');

		$permohonan = $this->admin_model->get_permohonan_data(array('IDpermohonan'=>$id));
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

        $adminEmail = $this->admin_model->get_akun(array('level'=>3))['email'];
        $this->email->from('gasnet.dummy@gmail.com', 'Gasnet-doNotReply');
        $this->email->reply_to('gasnet.dummy@gmail.com', 'Gasnet-doNotReply');
        $this->email->to($adminEmail);
        $this->email->bcc($permohonan['email']);


        $content = array(
        	'title' => 'Permohonan Kendaraan Operasional',
        	'preheader' => 'Persetujuan Permohonan Kendaraan Operasional.',
        	'main' => 'permohonan kendaraan <b>disetujui</b> oleh Supervisor.',
        	'nama' => $permohonan['nama']
        );
        $msg = $this->load->view('pages/email_approval',$content,true);
        $this->email->subject('[GasnetGo] Persetujuan dari Supervisor');
        $this->email->message($msg);

        if ($this->email->send()) {
            $_SESSION['success'] = ['Berhasil!','Permohonan berhasil disetujui.'];
        }else{
            $_SESSION['error'] = 'gagal Mengirim email';
        }
        $this->auth();
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
		$_SESSION['goto'] = base_url().'spv/tidak_setuju/'.$id;

		$data = array(
			'approval' => 'Tidak disetujui Supervisor'
		);
		$this->db->set($data);
		$this->db->where('IDpermohonan',$id);
		$this->db->update('permohonan_kendaraan');

		$_SESSION['success'] = ['Berhasil!','Permohonan tidak disetujui.'];
		$this->auth();
		redirect(base_url().'spv/');
	}

	public function auth()
	{
		if (!isset($_SESSION['go_email']) || ($_SESSION['go_level'] != 2)) // check session of user
		{
			if (isset($_SESSION['goto'])) // check if session goto is set
			{ 
				if (strpos($_SESSION['goto'], 'spv/setuju/'))
				{
					$_SESSION['login_error'] = 'Anda berhasil menyetujui permohonan. Silahkan Login untuk mengakses data permohonan.';
				}
				else
				{
					$_SESSION['login_error'] = 'Anda berhasil menolak permohonan. Silahkan Login untuk mengakses data permohonan.';
				}

			}
			else
			{
				$_SESSION['login_error'] = 'Anda belum melakukan login ke halaman supervisor';
			}

			redirect(base_url()."home/");
		}
	}
}