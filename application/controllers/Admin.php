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
		$this->load->view('admin/header_new');
		$this->load->view('admin/admin/viewdatapesanan');
		$this->load->view('admin/footer_new');
	}

	public function dashboard()
	{
		$data['hadir'] = $this->Madmin->gethadirguru();
		$data['ijin'] = $this->Madmin->getijinguru();
		$data['telat'] = $this->Madmin->gettelatguru();
		$data['hadirs'] = $this->Madmin->gethadirsiswa();
		$data['ijins'] = $this->Madmin->getijinsiswa();
		$data['telats'] = $this->Madmin->gettelatsiswa();
		$data['libur'] = $this->Madmin->getdatalibur();
		$this->load->view('admin/header_new');
		$this->load->view('admin/viewdashboard',$data);
		$this->load->view('admin/footer_new');
	}

/////////////////////////// USER //////////////////////////////////////////////	

	public function datauser()
	{
		if($this->session->userdata('username') != '' ){
			$data['user'] = $this->Muser->getdata();
			$this->load->view('admin/header_new');
			$this->load->view('admin/viewdatauser',$data);
			$this->load->view('admin/footer_new');
		}else{
			$this->session->sess_destroy();
			redirect('Admin/login','refresh');
		}
		
	}

	public function formtambahuser()
	{
		$this->load->view('admin/header_new');
		$this->load->view('admin/viewtambahuser');
		$this->load->view('admin/footer_new');
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
		$this->load->view('admin/header_new');
		$this->load->view('admin/viewedituser',$data);
		$this->load->view('admin/footer_new');
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
		$this->load->view('admin/header_new');
		$this->load->view('admin/datapresensi',$data);
		$this->load->view('admin/footer_new');
	}

	public function laporanpresensi(){
		$data['nip'] = $this->Madmin->getdatagurulist();
		$this->load->view('admin/header_new');
		$this->load->view('admin/laporanpresensi',$data);
		$this->load->view('admin/footer_new');
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
	$this->load->view('admin/header_new');
	$this->load->view('admin/viewdataguru',$data);
	$this->load->view('admin/footer_new');
}

public function formtambahguru()
{
	$data['kelas'] = $this->Madmin->getdatakelas();
	$this->load->view('admin/header_new');
	$this->load->view('admin/viewtambahguru',$data);
	$this->load->view('admin/footer_new');
}

public function savedataguru()
{
	/*Check submit button */
	if($this->input->post('save'))
	{
		$data['nip']=$this->input->post('nip');
		$data['nama_guru']=$this->input->post('nama_guru');
		$data['jenis_kelamin']=$this->input->post('jenis_kelamin');
		$data['walikelas']=$this->input->post('walikelas');
		$response=$this->Madmin->saverecords($data);
		if($response==true){
				$response=$this->Madmin->simpanuserguru($data);
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
	$data['kelas'] = $this->Madmin->getdatakelas();
	$this->load->view('admin/header_new');
	$this->load->view('admin/vieweditguru',$data);
	$this->load->view('admin/footer_new');
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
		$walikelas =$this->input->post('walikelas');
		$response=$this->Madmin->updaterecords($id,$nip,$nama_guru,$jenis_kelamin,$walikelas);
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
		$this->load->view('admin/header_new');
		$this->load->view('admin/viewgenerateqrcode',$data);
		$this->load->view('admin/footer_new');
	}

	public function formtambahqrcode()
	{
		$this->load->view('admin/header_new');
		$this->load->view('admin/viewtambahgenerateqrcode');
		$this->load->view('admin/footer_new');
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
	$this->load->view('admin/header_new');
	$this->load->view('admin/viewberanda',$data);
	$this->load->view('admin/footer_new');
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
				$sess_data['role'] = $sess->role;
				$sess_data['walikelas'] = $sess->walikelas;
				$this->session->set_userdata($sess_data);
			}
			if($this->session->userdata('username') == ''){
				redirect('Admin/login');
			}else{
				redirect('Admin/dashboard');
			}
				
		}
		else {
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
	}

	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		//session_destroy();
		$this->session->sess_destroy();
		//echo $this->session->userdata('username');
			//die();
		redirect('Admin/login','refresh');
	}

/////////////////////////// BATAS LOGIN LOGOUT //////////////////////////////////////////////


public function datakalender()
{
	$data['kalender'] = $this->Madmin->getdatakalender();
	$this->load->view('admin/header_new');
	$this->load->view('admin/viewdatakalender',$data);
	$this->load->view('admin/footer_new');
}

public function formtambahkalender()
{
	$this->load->view('admin/header_new');
	$this->load->view('admin/viewtambahkalender');
	$this->load->view('admin/footer_new');
}

public function savedatakalender()
{
	/*Check submit button */
	if($this->input->post('save'))
	{
		$data['tgl_kalender']=$this->input->post('tgl_kalender');
		$data['deskripsi']=$this->input->post('deskripsi');
		$response=$this->Madmin->simpankalender($data);
		if($response==true){
				echo "<script>alert('Records Saved Successfully');</script>";
				redirect('Admin/datakalender','refresh');
		}
		else{
				echo "<script>alert('Records Saved Failed');</script>";
				redirect('Admin/datakalender','refresh');
		}
	}
}

public function editkalender($id)
{
	$data['kalender'] = $this->Madmin->editkalender($id);
	$this->load->view('admin/header_new');
	$this->load->view('admin/vieweditkalender',$data);
	$this->load->view('admin/footer_new');
}

public function updatedatakalender()
{
	/*Check submit button */
	if($this->input->post('update'))
	{
		$id = $this->input->post('id');
		$tgl_kalender = $this->input->post('tgl_kalender');
		$deskripsi = $this->input->post('deskripsi');
		$response=$this->Madmin->updatekalender($id,$tgl_kalender,$deskripsi);
		if($response==true){
				echo "<script>alert('Records Update Failed');</script>";
				redirect('Admin/datakalender','refresh');
		}
		else{
				echo "<script>alert('Records Update Successfully');</script>";
				redirect('Admin/datakalender','refresh');
		}
	}
}

public function hapusdatakalender($id)
{
	$response=$this->Madmin->hapuskalender($id);
	if($response==true){
			echo "<script>alert('Records Delete Failed');</script>";
			redirect('Admin/datakalender','refresh');
	}
	else{
			echo "<script>alert('Records Delete Successfully');</script>";
			redirect('Admin/datakalender','refresh');
	}
}

public function datakelas()
{
	$data['kelas'] = $this->Madmin->getdatakelas();
	$this->load->view('admin/header_new');
	$this->load->view('admin/viewdatakelas',$data);
	$this->load->view('admin/footer_new');
}

public function formtambahkelas()
{
	$this->load->view('admin/header_new');
	$this->load->view('admin/viewtambahkelas');
	$this->load->view('admin/footer_new');
}

public function savedatakelas()
{
	/*Check submit button */
	if($this->input->post('save'))
	{
		$data['nama_kelas']=$this->input->post('nama_kelas');
		$response=$this->Madmin->simpankelas($data);
		if($response==true){
				echo "<script>alert('Records Saved Successfully');</script>";
				redirect('Admin/datakelas','refresh');
		}
		else{
				echo "<script>alert('Records Saved Failed');</script>";
				redirect('Admin/datakelas','refresh');
		}
	}
}

public function editkelas($id)
{
	$data['kelas'] = $this->Madmin->editkelas($id);
	$this->load->view('admin/header_new');
	$this->load->view('admin/vieweditkelas',$data);
	$this->load->view('admin/footer_new');
}

public function updatedatakelas()
{
	/*Check submit button */
	if($this->input->post('update'))
	{
		$id = $this->input->post('id');
		$nama_kelas = $this->input->post('nama_kelas');
		$response=$this->Madmin->updatekelas($id,$nama_kelas);
		if($response==true){
				echo "<script>alert('Records Update Failed');</script>";
				redirect('Admin/datakelas','refresh');
		}
		else{
				echo "<script>alert('Records Update Successfully');</script>";
				redirect('Admin/datakelas','refresh');
		}
	}
}

public function hapusdatakelas($id)
{
	$response=$this->Madmin->hapuskelas($id);
	if($response==true){
			echo "<script>alert('Records Delete Failed');</script>";
			redirect('Admin/datakelas','refresh');
	}
	else{
			echo "<script>alert('Records Delete Successfully');</script>";
			redirect('Admin/datakelas','refresh');
	}
}


public function datasiswa()
{
	$data['siswa'] = $this->Madmin->getdatasiswa();
	$this->load->view('admin/header_new');
	$this->load->view('admin/viewdatasiswa',$data);
	$this->load->view('admin/footer_new');
}

public function formtambahsiswa()
{
	$data['kelas'] = $this->Madmin->getdatakelas();
	$this->load->view('admin/header_new');
	$this->load->view('admin/viewtambahsiswa',$data);
	$this->load->view('admin/footer_new');
}

public function savedatasiswa()
{
	/*Check submit button */
	if($this->input->post('save'))
	{
		$data['nisn']=$this->input->post('nisn');
		$data['nama_siswa']=$this->input->post('nama_siswa');
		$data['kelas']=$this->input->post('kelas');
		$data['orangtua_siswa']=$this->input->post('orangtua_siswa');
		$data['alamat_siswa']=$this->input->post('alamat_siswa');
		$data['status']=$this->input->post('status');
		$response=$this->Madmin->simpansiswa($data);
		if($response==true){
				$response=$this->Madmin->simpanusersiswa($data);
				echo "<script>alert('Records Saved Successfully');</script>";
				redirect('Admin/datasiswa','refresh');
		}
		else{
				echo "<script>alert('Records Saved Failed');</script>";
				redirect('Admin/datasiswa','refresh');
		}
	}
}

public function editsiswa($id)
{
	$data['siswa'] = $this->Madmin->getdataeditsiswa($id);
	$data['kelas'] = $this->Madmin->getdatakelas();
	$this->load->view('admin/header_new');
	$this->load->view('admin/vieweditsiswa',$data);
	$this->load->view('admin/footer_new');
}

public function updatedatasiswa()
{
	/*Check submit button */
	if($this->input->post('update'))
	{
		$id = $this->input->post('id_siswa');
		$nisn = $this->input->post('nisn');
		$nama_siswa = $this->input->post('nama_siswa');
		$kelas = $this->input->post('kelas');
		$orangtua_siswa = $this->input->post('orangtua_siswa');
		$alamat_siswa = $this->input->post('alamat_siswa');
		$status = $this->input->post('status');
		$response=$this->Madmin->updatesiswa($id,$nisn,$nama_siswa,$kelas,$orangtua_siswa,$alamat_siswa,$status);
		if($response==true){
				echo "<script>alert('Records Update Failed');</script>";
				redirect('Admin/datasiswa','refresh');
		}
		else{
				echo "<script>alert('Records Update Successfully');</script>";
				redirect('Admin/datasiswa','refresh');
		}
	}
}

public function hapusdatasiswa($id)
{
	$response=$this->Madmin->hapussiswa($id);
	if($response==true){
			echo "<script>alert('Records Delete Failed');</script>";
			redirect('Admin/datasiswa','refresh');
	}
	else{
			echo "<script>alert('Records Delete Successfully');</script>";
			redirect('Admin/datasiswa','refresh');
	}
}

public function generateqrcodesiswa(){
	$data['qrcodesiswa'] = $this->Madmin->getdataqrcodesiswa();
	$this->load->view('admin/header_new');
	$this->load->view('admin/viewgenerateqrcodesiswa',$data);
	$this->load->view('admin/footer_new');
}

public function formtambahqrcodesiswa()
{
	$this->load->view('admin/header_new');
	$this->load->view('admin/viewtambahgenerateqrcodesiswa');
	$this->load->view('admin/footer_new');
}

public function simpanqrcodesiswa()
{
	if($this->input->post('save'))
	{
	$nisn = $this->input->post('nisn');
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

	$image_name=$nisn.'.png'; //buat name dari qr code sesuai dengan nim

	$params['data'] = $nisn; //data yang akan di jadikan QR CODE
	$params['level'] = 'H'; //H=High
	$params['size'] = 10;
	$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
	$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

	$this->Madmin->simpanqrcodesiswa($nisn,$image_name); //simpan ke database
	redirect('Admin/generateqrcodesiswa'); //redirect ke mahasiswa usai simpan data
	}
}

public function hapusqrcodesiswa($id)
{
	$response=$this->Madmin->deleteqrcodesiswa($id);
	if($response==true){
			echo "<script>alert('Records Delete Failed');</script>";
			redirect('Admin/generateqrcodesiswa','refresh');
	}
	else{
			echo "<script>alert('Records Delete Successfully');</script>";
			redirect('Admin/generateqrcodesiswa','refresh');
	}
}

public function cetakqrcodesiswa($id)
{
	$this->load->library('pdfgenerator');
	$data['qr'] = $this->Madmin->cetakqrcodesiswa($id);
	$file_pdf = 'qrcodesiswa';
	$paper = 'A4';
	$orientation = "portait";
	$html = $this->load->view('admin/qrcodepdfsiswa',$data, true);	    
	$this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
}

public function presensisiswa(){
	$data['presensi'] = $this->Madmin->getpresensisiswa();
	$data['presensi_ap'] = $this->Madmin->getpresensisiswa_ap();
	$this->load->view('admin/header_new');
	$this->load->view('admin/datapresensisiswa',$data);
	$this->load->view('admin/footer_new');
}

public function laporanpresensisiswa(){
	$data['nisn'] = $this->Madmin->getdatasiswa();
	$this->load->view('admin/header_new');
	$this->load->view('admin/laporanpresensisiswa',$data);
	$this->load->view('admin/footer_new');
}

public function approveabsensiswa($nisn){
	$datenya = date("Y-m-d");

	$response=$this->Madmin->updateflagabsensiswa($datenya,$nisn);
	if($response==true){
			echo "<script>alert('Approve Successfully');</script>";
			redirect('Admin/presensi','refresh');
	}
	else{
			echo "<script>alert('Approve Failed');</script>";
			redirect('Admin/presensi','refresh');
	}
}

public function cetakpresensisiswa()
{ 
	$tglawal = $this->input->post('tglawal');
	$tglakhir = $this->input->post('tglakhir');
	$nisn = $this->input->post('nisn');
	$this->load->library('pdfgenerator');
	$data['presensi'] = $this->Madmin->cetakpresensisiswa($tglawal, $tglakhir,$nisn);
	$data['tglawal'] = $this->input->post('tglawal');
	$data['tglakhir'] = $this->input->post('tglakhir');
	$file_pdf = 'Laporan Presensi';
	$paper = 'A4';
	$orientation = "portait";
	$html = $this->load->view('admin/presensipdfsiswa',$data, true);	    
	$this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
}

public function inputkehadiran()
{
	$data['guru'] = $this->Madmin->getdataguru();
	$this->load->view('admin/header_new');
	$this->load->view('admin/viewtambahkehadiran',$data);
	$this->load->view('admin/footer_new');
}

public function savedatakehadiran()
{
	/*Check submit button */
	if($this->input->post('save'))
	{
		date_default_timezone_set("Asia/Bangkok");
		$data['nip']=$this->input->post('nip');
		$data['tanggal']= date('Y-m-d');
		$data['flag']=$this->input->post('flag');
		$response=$this->Madmin->savedatakehadiran($data);
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

public function inputkehadiransiswa()
{
	$data['siswa'] = $this->Madmin->getdatasiswa();
	$this->load->view('admin/header_new');
	$this->load->view('admin/viewtambahkehadiransiswa',$data);
	$this->load->view('admin/footer_new');
}

public function savedatakehadiransiswa()
{
	/*Check submit button */
	if($this->input->post('save'))
	{
		date_default_timezone_set("Asia/Bangkok");
		$data['nisn']=$this->input->post('nisn');
		$data['tanggal']= date('Y-m-d');
		$data['flag']=$this->input->post('flag');
		$response=$this->Madmin->savedatakehadiransiswa($data);
		if($response==true){
				echo "<script>alert('Records Saved Successfully');</script>";
				redirect('Admin/datasiswa','refresh');
		}
		else{
				echo "<script>alert('Records Saved Failed');</script>";
				redirect('Admin/datasiswa','refresh');
		}
	}
}


}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
