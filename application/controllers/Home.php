<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('home_model');
		
		// if(!isset($_SESSION["level"]) || $_SESSION["level"] != 1){
		// 	$_SESSION['deletex'] = "Anda tidak bisa mengakses halaman Admin...";
		// 	$_SESSION['jadwal_err'] = true;
		// 	redirect('/');
		// }
	}

	public function index()
	{
		// if (isset($_SESSION['go-email']) && isset($_SESSION['go-password']) && isset($_SESSION['go-level'])) {
		// 	redirect(base_url()."admin/");
		// }

		$data = array(
            'title'=> 'GasnetGo! - Login',
            'nav' => 'nav.php',
            'isi' => 'pages/home',
            'nav_active' => ''
        );
        $this->load->view('layout/wrapper',$data);
	}

	public function login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$data = array(
			'email' => $email,
			'password' => $password,
			'title'=> 'My Karamel - Beranda',
			'nav' => 'nav.php',
			'isi' => 'pages/beranda',
			'nav_active' => 'beranda'
		);

		$whereS = array(
		    'email' => $email
        );

        if($email == "" || $password == ""){
        	$this->session->set_userdata('login_error', 'Harap masukkan semua input...');
        	redirect(base_url()."home/");
        }else{
            $login = $this->home_model->get_users($data);

            if($login != "not_registered"){
                $status = $this->home_model->get_usersStatus($whereS)->status;
            }

            if( $login == "not_registered"){
            	$this->session->set_userdata('login_error', 'Email belum terdaftar....');
            	redirect(base_url()."home/");
            }elseif ($status != "aktif"){
            	$this->session->set_userdata('login_error', 'Akun anda sudah di nonaktifkan....');
            	redirect(base_url()."home/");
            }else{
                $db_pass = $this->home_model->get_users_pass($email)->password;
                $level = $this->home_model->get_users_level($email);

                if(password_verify($password, $db_pass)){
                    $this->session->set_userdata('go_email', $email);
                    $this->session->set_userdata('go_password', $password);
                    $this->session->set_userdata('go_level', $level);
                    if ($level == 1) {
                    	redirect(base_url()."permohonan/");
                    } else if ($level == 2 || $level == 3 || $level == 0) {
                    	redirect(base_url()."admin/");
                    }
                }else{
                	$this->session->set_userdata('login_error', 'Password yang dimasukkan salah....');
                	redirect(base_url()."home/");
                }
            }
        }

	}

	function logout()
    {   
        if( $this->session->has_userdata('go_email')){
            unset(
                $_SESSION['go_email'],
                $_SESSION['go_password'],
                $_SESSION['go_level']
            );
            $this->session->sess_destroy();
       }
       redirect(base_url());
    }

    public function bulan_to_romawi($val)
    {
    	$romawi = ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
    	return $romawi[$val+1];
    }
}
