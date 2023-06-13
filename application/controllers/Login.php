<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Muser');
    }

    public function index()
    {
        $this->load->view('menu');
        $this->load->view('viewlogin');
    }

    public function cek_login() {
        $data = array('username' => $this->input->post('username', TRUE),
                    'password' => $this->input->post('password', TRUE)
            );
        $hasil = $this->Muser->cek_usercs($data);
        // var_dump($data);
        // die;
        if ($hasil->num_rows() == 1) {
            foreach ($hasil->result() as $sess) {
                $sess_data['logged_in'] = 'Sudah Loggin';
                $sess_data['id'] = $sess->id;
                $sess_data['username'] = $sess->username;
                $sess_data['level'] = $sess->level;
                $this->session->set_userdata($sess_data);
            }
            redirect('Home');      
        }
        else {
            echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
        }
    }

    public function logout() {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        session_destroy();
        redirect('login','refresh');
    }


}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
