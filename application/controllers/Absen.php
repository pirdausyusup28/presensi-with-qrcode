<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mabsen');
    }

    public function index()
    {
        $this->load->view('viewloginabsen');
    }

	public function home()
    {
        $this->load->view('viewhomeabsen');
    }

	public function sqanqrcode()
    {
		$data["presensi"] = $this->Mabsen->getdatapresensi();
        $this->load->view('viewsqanqrcode',$data);
    }

    public function cek_login() {
        $data = array('nip' => $this->input->post('nip', TRUE)
            );
        $hasil = $this->Mabsen->cek_user($data);
        // var_dump($hasil);
        // die;
        if ($hasil->num_rows() == 1) {
            foreach ($hasil->result() as $sess) {
                $sess_data['logged_in'] = 'Sudah Loggin';
                $sess_data['id'] = $sess->id;
                $sess_data['nip'] = $sess->nip;
                $sess_data['nama_guru'] = $sess->nama_guru;
                $this->session->set_userdata($sess_data);
            }
            redirect('Absen/home');      
        }
        else {
            echo "<script>alert('Gagal login: Cek nip');history.go(-1);</script>";
        }
    }

    public function logout() {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        session_destroy();
        redirect('login','refresh');
    }

	function cek_id()
	{
		date_default_timezone_set('Asia/Jakarta');
		// $user = $this->user;
		$result_code = $this->input->post('nip');
		$tgl = date('Y-m-d');
		$jam_masuk = date('H:i:s');		
		$jam_keluar = date('H:i:s');
		$cek_id = $this->Mabsen->cek_id($result_code);

		$cek_kehadiran = $this->Mabsen->cek_kehadiran($result_code, $tgl);
		$cek_kehadiran_durasi = $this->Mabsen->cek_kehadiran_durasi($result_code, $tgl);

		foreach($cek_kehadiran_durasi as $a){
		}

		if (!$cek_id) {
			$this->session->set_flashdata('messageAlert', '<p style="color:red; font-weight:bold;">Absen gagal, data tidak ditemukan!....</p>');
			redirect('Absen/sqanqrcode','refresh');
		} elseif ($cek_kehadiran & $cek_kehadiran->jam_masuk != '00:00:00' && $cek_kehadiran->jam_keluar == '00:00:00' && $a->hournya < 2) {
			$this->session->set_flashdata('messageAlert', '<p style="color:red; font-weight:bold;">Sudah absen Masuk!....! </p>');
			redirect('Absen/sqanqrcode','refresh');
			return false;
		}elseif ($cek_kehadiran && $cek_kehadiran->jam_masuk != '00:00:00' && $cek_kehadiran->jam_keluar == '00:00:00') {
			$data = array(
				'jam_keluar' => $jam_keluar
			);
			$this->Mabsen->absen_pulang($result_code, $data);
			$this->session->set_flashdata('messageAlert', '<p style="color:red; font-weight:bold;">Absen pulang! berhasil....</p>');
			redirect('Absen/sqanqrcode','refresh');
		} elseif ($cek_kehadiran && $cek_kehadiran->jam_masuk != '00:00:00' && $cek_kehadiran->jam_keluar != '00:00:00') {
			$this->session->set_flashdata('messageAlert', '<p style="color:red; font-weight:bold;">Sudah absen!....!</p>');
			redirect('Absen/sqanqrcode','refresh');
			return false;
		} else {
			$data = array(
				'nip' => $result_code,
				'tanggal' => $tgl,
				'jam_masuk' => $jam_masuk,
				'flag' => 0
			);
			$this->Mabsen->absen_masuk($data);
			$this->session->set_flashdata('messageAlert', '<p style="color:green; font-weight:bold;">Absen masuk berhasil....!</p>');
			redirect('Absen/sqanqrcode','refresh');
		}
	}


}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
