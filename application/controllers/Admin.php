<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('admin_model');
		
		// if(!isset($_SESSION["go-level"]) || $_SESSION["go-level"] != 2 || $_SESSION["go-level"] != 3){
		// 	$_SESSION['login_error'] = "Anda tidak bisa mengakses halaman Admin...";
		// 	redirect(base_url()."home/");
		// }
	}

	public function index()
	{
		if (!isset($_SESSION['go_email']) || ($_SESSION['go_level'] == 1)) {
			$_SESSION['login_error'] = 'Anda belum melakukan login';
			redirect(base_url()."home/");
		}

		$data = array(
            'title'=> 'GasnetGo! - Data permohonan kendaraan operasional',
            'nav' => 'nav.php',
            'isi' => 'pages/data_permohonan',
            'permohonan' => $this->admin_model->get_permohonan(),
            'nav_active' => 'permohonan'
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
		redirect(base_url().'/home/inventaris');
	}

	public function edit_permohonan()
	{
		if (!isset($_SESSION['email']) || !isset($_SESSION['password'])) {
			$_SESSION['login_error'] = 'Anda belum melakukan login';
			redirect(base_url());
		}

		$IDinventaris = $this->input->post('IDinventaris');
		$kodeBarang = $this->input->post('editkodeBarang');
		$jenisAset = $this->input->post('editjenisAset');
		$namaBarang = $this->input->post('editnamaBarang');
		$merk = $this->input->post('editmerk');
		$harga = $this->input->post('edithargBarang');
		$noMesin = $this->input->post('editnoMesin');
		$lokasi = $this->input->post('editlokasi');
		$bahan = $this->input->post('editbahan');
		$bulan = $this->input->post('editbulan');
		$tahun = $this->input->post('edittahun');
		$fileImage = $this->input->post('namaFile');

		// check if barang is not exist on table barang
		$check = $this->home_model->get_barang_where(array('namaBarang'=>$namaBarang));
		if ($check == false) {
			$this->db->insert('barang', array('namaBarang' => $namaBarang));
			$IDbarang = $this->home_model->get_barang_where(array('namaBarang'=>$namaBarang))['IDbarang'];
		} else {
			$IDbarang = $check['IDbarang'];
		}
		
		$fileImageName = array(null, null);

		$config['upload_path']          = 'assets/img/inventaris/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 0;
		$config['max_width']            = 0;
		$config['max_height']           = 0;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('editfileImage')){
			$error = array('error' => $this->upload->display_errors());			
		}else{
			$data = array('upload_data' => $this->upload->data());
			$fileImageName = array('success', $this->upload->data()['file_name']);
		}

		if ($fileImageName[1] == null) {
			$fileImageName = array('success', $fileImage);
		}

		$data = array(
			'kodeBarang' => $kodeBarang,
			'jenisAset' => $jenisAset,
			'IDbarang' => $IDbarang,
			'merk' => $merk,
			'harga' => $harga,
			'noMesin' => $noMesin,
			'lokasi' => $lokasi,
			'bahan' => $bahan,
			'bulan' => $bulan,
			'tahun' => $tahun,
			'noInventaris' => $kodeBarang.'/'.$IDinventaris.'/'.$this->bulan_to_romawi($bulan).'/'.$tahun,
			'fileImage' => $fileImageName[1]
		);
		$this->db->set($data);
		$this->db->where('IDinventaris', $IDinventaris);
		$this->db->update('inventaris');

		$_SESSION['success'] = 'Inventaris berhasil diupdate :)';
		redirect(base_url().'/home/inventaris');
	}

	public function hapus_permohonan($id)
	{	
		$file = $this->home_model->get_inventaris($id)['fileImage'];
		unlink(FCPATH.'assets/img/inventaris/'.$file);
		$this->db->delete('inventaris', array('IDinventaris' => $id));

		$_SESSION['success'] = 'Anda berhasil menghapus data inventaris!';
		redirect(base_url());
	}
}