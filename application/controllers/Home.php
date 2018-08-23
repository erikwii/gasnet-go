<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('home_model');
	}

	public function index()
	{
		$this->check_auth();
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
			'password' => $password			
		);

		$whereS = array(
		    'email' => $email
        );

        if($email == "" || $password == ""){
        	$this->session->set_userdata('login_error', 'Harap masukkan semua input...');
        	redirect(base_url());
        }else{
            $login = $this->home_model->get_users($data);

            if($login != "not_registered"){
                $status = $this->home_model->get_usersStatus($whereS)->status;
            }

            if($login == "not_registered") {
            	$this->session->set_userdata('login_error', 'Email belum terdaftar....');
            	redirect(base_url());
            } elseif($status != "aktif") {
            	$this->session->set_userdata('login_error', 'Akun anda sudah di nonaktifkan....');
            	redirect(base_url());
            } else {
                $db_pass = $this->home_model->get_users_pass($email)->password;
                $name = $this->home_model->get_users_data($email)->nama;
                $level = $this->home_model->get_users_level($email);

                if(password_verify($password, $db_pass)){
                    $this->session->set_userdata('go_email', $email);
                    $this->session->set_userdata('go_password', $password);
                    $this->session->set_userdata('go_level', $level);

                    $_SESSION['success'] = ["Berhasil Login!","Selamat datang kembali di GasnetGo, ".$name];

                    if (isset($_SESSION['goto'])) {
                        $goto = $_SESSION['goto']; // value transfer to new variable
                        unset($_SESSION['goto']); // unset session

                        redirect($goto);
                    } else {
                        if ($_SESSION['go_level'] == 0 || $_SESSION['go_level'] == 3)
                        {
                            redirect(base_url()."admin");
                        }
                        elseif ($_SESSION['go_level'] == 1)
                        {
                            redirect(base_url()."permohonan");
                        }
                        elseif ($_SESSION['go_level'] == 2)
                        {
                            redirect(base_url()."spv");
                        }
                    }
                } else {
                	$this->session->set_userdata('login_error', 'Password yang dimasukkan salah....');
                	redirect(base_url());
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
        $_SESSION['login_success'] = "Anda berhasil logout";
        redirect(base_url());
    }

    // user authentication based on session 'go_level'
    public function check_auth()
    {
        if (isset($_SESSION['go_level'])) {
            if ($_SESSION['go_level'] == 0 || $_SESSION['go_level'] == 3) {
                redirect(base_url()."admin/");
            }elseif($_SESSION['go_level'] == 2){
                redirect(base_url()."spv/");
            }else{
                redirect(base_url()."permohonan/");
            }
        }
    }

    // function for convert month number to romawi
    public function bulan_to_romawi($val)
    {
    	$romawi = ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
    	return $romawi[$val+1];
    }

    // dummy function for sending email
    public function send_mail($email)
    {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'gasnet.dummy@gmail.com',
            'smtp_pass' => 'passwordgasnet',
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        $this->email->from('gasnet.dummy@gmail.com', 'DoNotReply');
        $this->email->to($email);

        $this->email->subject('Email Test');
        $this->email->message('Cobain euy');

        if ($this->email->send()) {
            echo "success";
        }else{
            echo $this->email->print_debugger();
        }
    }

    // dummy function for cek view of email body
    public function cekemail()
    {
        $this->load->view('pages/email');
    }
}
