<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Muser');
		$this->load->model('Madmin');
	}

	public function index()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/admin/viewdatapesanan');
		$this->load->view('admin/footer');
	}

/////////////////////////// USER //////////////////////////////////////////////	

	public function datauser()
	{
		$data['user'] = $this->Muser->getdata();
		$this->load->view('admin/header');
		$this->load->view('admin/viewdatauser',$data);
		$this->load->view('admin/footer');
	}

	public function formtambahuser()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/viewtambahuser');
		$this->load->view('admin/footer');
	}

	public function savedatauser()
	{
		/*Check submit button */
		if($this->input->post('save'))
		{
		    $data['username']=$this->input->post('username');
			$data['email']=$this->input->post('email');
			$data['password']=$this->input->post('password');
			$response=$this->Muser->saverecords($data);
			if($response==true){
			        echo "<script>alert('Records Saved Successfully');</script>";
			        redirect('Admin/datauser','refresh');
			}
			else{
					echo "<script>alert('Records Saved Failed');</script>";
			        redirect('Admin/datauser','refresh');
			}
		}
	}

	public function edituser($id)
	{
		$data['user'] = $this->Muser->getdataedit($id);
		$this->load->view('admin/header');
		$this->load->view('admin/viewedituser',$data);
		$this->load->view('admin/footer');
	}

	public function updatedatauser()
	{
		/*Check submit button */
		if($this->input->post('update'))
		{
		    $id = $this->input->post('id');
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$response=$this->Muser->updaterecords($id,$username,$email,$password);
			if($response==true){
					echo "<script>alert('Records Update Failed');</script>";
			        redirect('Admin/datauser','refresh');
			}
			else{
			        echo "<script>alert('Records Update Successfully');</script>";
			        redirect('Admin/datauser','refresh');
			}
		}
	}

	public function hapusdatauser($id)
	{
		$response=$this->Muser->deleterecords($id);
		if($response==true){
				echo "<script>alert('Records Delete Failed');</script>";
		        redirect('Admin/datauser','refresh');
		}
		else{
		        echo "<script>alert('Records Delete Successfully');</script>";
		        redirect('Admin/datauser','refresh');
		}
	}

/////////////////////////// BATAS USER //////////////////////////////////////////////


/////////////////////////// PRESENSI //////////////////////////////////////////////
	public function presensi(){
		$data['presensi'] = $this->Madmin->getpresensi();
		$data['presensi_ap'] = $this->Madmin->getpresensi_ap();
		$this->load->view('admin/header');
		$this->load->view('admin/datapresensi',$data);
		$this->load->view('admin/footer');
	}

	public function laporanpresensi(){
		$data['nip'] = $this->Madmin->getdataguru();
		$this->load->view('admin/header');
		$this->load->view('admin/laporanpresensi',$data);
		$this->load->view('admin/footer');
	}

	public function approve($nip){
		$datenya = date("Y-m-d");
		// $query = $this->db->query("UPDATE tbl_presensi SET flag = 1 where tanggal = curdate() and nip = '".$nip."' ")->result();

		$response=$this->Madmin->updateflag($datenya,$nip);
		if($response==true){
				echo "<script>alert('Approve Successfully');</script>";
				redirect('Admin/presensi','refresh');
		}
		else{
				echo "<script>alert('Approve Failed');</script>";
				redirect('Admin/presensi','refresh');
		}
	}

	public function cetakpresensi()
	{ 
		$tglawal = $this->input->post('tglawal');
		$tglakhir = $this->input->post('tglakhir');
		$nip = $this->input->post('nip');
		// echo $tglawal." ".$nip." ".$tglakhir." ";
		// die();
		$this->load->library('pdfgenerator');
        $data['presensi'] = $this->Madmin->cetakpresensi($tglawal, $tglakhir,$nip);
		// var_dump($data);
		// die();
        $data['tglawal'] = $this->input->post('tglawal');
        $data['tglakhir'] = $this->input->post('tglakhir');
        $file_pdf = 'Laporan Presensi';
        $paper = 'A4';
        $orientation = "portait";
		$html = $this->load->view('admin/presensipdf',$data, true);	    
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
	}
//////////////////////////////////////// BATAS PRESENSI //////////////////////////


/////////////////////////// GURU //////////////////////////////////////////////	

public function dataguru()
{
	$data['guru'] = $this->Madmin->getdataguru();
	$this->load->view('admin/header');
	$this->load->view('admin/viewdataguru',$data);
	$this->load->view('admin/footer');
}

public function formtambahguru()
{
	$this->load->view('admin/header');
	$this->load->view('admin/viewtambahguru');
	$this->load->view('admin/footer');
}

public function savedataguru()
{
	/*Check submit button */
	if($this->input->post('save'))
	{
		$data['nip']=$this->input->post('nip');
		$data['nama_guru']=$this->input->post('nama_guru');
		$data['jenis_kelamin']=$this->input->post('jenis_kelamin');
		$data['guru_mapel']=$this->input->post('guru_mapel');
		$response=$this->Madmin->saverecords($data);
		if($response==true){
				echo "<script>alert('Records Saved Successfully');</script>";
				redirect('Admin/dataguru','refresh');
		}
		else{
				echo "<script>alert('Records Saved Failed');</script>";
				redirect('Admin/dataguru','refresh');
		}
	}
}

public function editguru($id)
{
	$data['guru'] = $this->Madmin->getdataedit($id);
	$this->load->view('admin/header');
	$this->load->view('admin/vieweditguru',$data);
	$this->load->view('admin/footer');
}

public function updatedataguru()
{
	/*Check submit button */
	if($this->input->post('update'))
	{
		$id = $this->input->post('id_guru');
		$nip = $this->input->post('nip');
		$nama_guru = $this->input->post('nama_guru');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$guru_mapel =$this->input->post('guru_mapel');
		$response=$this->Madmin->updaterecords($id,$nip,$nama_guru,$jenis_kelamin,$guru_mapel);
		if($response==true){
				echo "<script>alert('Records Update Failed');</script>";
				redirect('Admin/dataguru','refresh');
		}
		else{
				echo "<script>alert('Records Update Successfully');</script>";
				redirect('Admin/dataguru','refresh');
		}
	}
}

public function hapusdataguru($id)
{
	$response=$this->Madmin->deleterecords($id);
	if($response==true){
			echo "<script>alert('Records Delete Failed');</script>";
			redirect('Admin/dataguru','refresh');
	}
	else{
			echo "<script>alert('Records Delete Successfully');</script>";
			redirect('Admin/dataguru','refresh');
	}
}

/////////////////////////// BATAS GURU //////////////////////////////////////////////

/////////////////////////// GENERATE QR CODE //////////////////////////////////
	public function generateqrcode(){
		$data['qrcode'] = $this->Madmin->getdataqrcode();
		$this->load->view('admin/header');
		$this->load->view('admin/viewgenerateqrcode',$data);
		$this->load->view('admin/footer');
	}

	public function formtambahqrcode()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/viewtambahgenerateqrcode');
		$this->load->view('admin/footer');
	}

	public function simpanqrcode()
	{
		if($this->input->post('save'))
		{
		$nip = $this->input->post('nip');
        $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 
        $image_name=$nip.'.png'; //buat name dari qr code sesuai dengan nim
 
        $params['data'] = $nip; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
 
        $this->Madmin->simpanqrcode($nip,$image_name); //simpan ke database
        redirect('Admin/generateqrcode'); //redirect ke mahasiswa usai simpan data
		}
	}

	public function hapusqrcode($id)
	{
		$response=$this->Madmin->deleteqrcode($id);
		if($response==true){
				echo "<script>alert('Records Delete Failed');</script>";
		        redirect('Admin/generateqrcode','refresh');
		}
		else{
		        echo "<script>alert('Records Delete Successfully');</script>";
		        redirect('Admin/generateqrcode','refresh');
		}
	}

	public function cetakqrcode($id)
	{ 
		$this->load->library('pdfgenerator');
        $data['qr'] = $this->Madmin->cetakqrcode($id);
        $file_pdf = 'qrcode';
        $paper = 'A4';
        $orientation = "portait";
		$html = $this->load->view('admin/qrcodepdf',$data, true);	    
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
	}
/////////////////////////// BATAS GENERATE QR CODE //////////////////////////////////


/////////////////////////// BERANDA  ///////////////////////////////////////////////////
function beranda() {
	$data["pres"] = $data['presensi'] = $this->Madmin->getpresensiapprove();
	$this->load->view('admin/header');
	$this->load->view('admin/viewberanda',$data);
	$this->load->view('admin/footer');
}
/////////////////////////// BATAS BERANDA  //////////////////////////////////////////////

/////////////////////////// LOGIN LOGOUT //////////////////////////////////////////////

	public function login()
    {
        $this->load->view('admin/viewlogin');
    }

     public function cek_login() {
		$data = array('username' => $this->input->post('username', TRUE),
					'password' => $this->input->post('password', TRUE)
			);
		$hasil = $this->Muser->cek_user($data);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['logged_in'] = 'Sudah Loggin';
				$sess_data['id'] = $sess->id;
				$sess_data['username'] = $sess->username;
				$sess_data['level'] = $sess->level;
				$this->session->set_userdata($sess_data);
			}
			redirect('Admin/datauser');	
		}
		else {
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
	}

	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('Admin/login','refresh');
	}

/////////////////////////// BATAS LOGIN LOGOUT //////////////////////////////////////////////

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
