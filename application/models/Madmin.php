<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin extends CI_Model {

	function getdataregis()
	{
		$query=$this->db->get("tblregistrasionline");
		return $query->result();
	}

	function getpresensi(){
		$query=$this->db->query("select a.nip,b.nama_guru,b.guru_mapel,a.tanggal, DATE_FORMAT(a.jam_masuk, '%H:%i') AS jam_masuk,DATE_FORMAT(a.jam_keluar, '%H:%i') AS jam_keluar from tbl_presensi a left join tbl_guru b on a.nip = b.nip where flag = 0 and tanggal = curdate() ");
		return $query->result();
	}

	function getpresensi_ap(){
		$query=$this->db->query("select a.nip,b.nama_guru,b.guru_mapel,a.tanggal, DATE_FORMAT(a.jam_masuk, '%H:%i') AS jam_masuk,DATE_FORMAT(a.jam_keluar, '%H:%i') AS jam_keluar from tbl_presensi a left join tbl_guru b on a.nip = b.nip where flag = 1 and tanggal = curdate() ");
		return $query->result();
	}

	function getpresensiapprove(){
		$query=$this->db->query("select a.nip,b.nama_guru,a.tanggal, DATE_FORMAT(a.jam_masuk, '%H:%i') AS jam_masuk,DATE_FORMAT(a.jam_keluar, '%H:%i') AS jam_keluar from tbl_presensi a left join tbl_guru b on a.nip = b.nip where flag = 1 and tanggal = curdate() ");
		return $query->result();
	}

	function updateflag($datenya,$nip){
		$this->db->set('flag', '1');
		$this->db->where('tanggal', $datenya);
		$this->db->where('nip', $nip);
		$this->db->update('tbl_presensi');
		return true;
	}

	function cetakpresensi($tglawal, $tglakhir,$nip){
		$query=$this->db->query("select a.nip,b.nama_guru,b.guru_mapel,a.tanggal,a.jam_masuk,a.jam_keluar from tbl_presensi a inner join tbl_guru b on a.nip = b.nip where flag = 1  and a.tanggal between '".$tglawal."' and '".$tglakhir."' and a.nip = '".$nip."' group by a.nip,
		b.nama_guru,
		a.tanggal order by a.tanggal asc");
		return $query->result();
	}

	function getdataqrcode(){
		$query = $this->db->query("SELECT a.*,b.* FROM tbl_generate_barcode a inner join tbl_guru b on a.nip = b.nip");
		// $query=$this->db->get("tbl_generate_barcode");
		return $query->result();
	}

	function getdataqrcodesiswa(){
		$query = $this->db->query("SELECT a.*,b.* FROM tbl_generate_barcode_siswa a left join tbl_siswa b on a.nisn = b.nisn");
		return $query->result();
	}

	function cetakqrcode($id){
		$query=$this->db->query("select a.*,b.* FROM tbl_generate_barcode a inner join tbl_guru b on a.nip = b.nip where a.id_barcode = '".$id."'");
		return $query->result();
	}

	function cetakqrcodesiswa($id){
		$query=$this->db->query("select a.*,b.* FROM tbl_generate_barcode_siswa a left join tbl_siswa b on a.nisn = b.nisn where a.id_barcode_siswa = '".$id."'");
		return $query->result();
	}

	function deleteqrcode($id)
	{
		$query="DELETE from tbl_generate_barcode WHERE id_barcode  = '".$id."' ";
		$this->db->query($query);
	}

	function getdataguru(){
		$this->db->select('a.*,b.*');
		$this->db->join('tbl_kelas b', 'a.walikelas = b.id_kelas', 'left');
		$query=$this->db->get("tbl_guru a");
		return $query->result();
	}

	function getdatasiswa(){
		$this->db->select('a.*,b.*');
		$this->db->join('tbl_kelas b', 'a.kelas = b.id_kelas', 'left');
		$query=$this->db->get("tbl_siswa a");
		return $query->result();
	}

	function getdatakelas(){
		$query=$this->db->get("tbl_kelas");
		return $query->result();
	}

	function getdatakalender(){
		$query=$this->db->get("tbl_kalender");
		return $query->result();
	}

	function saverecords($data)
	{
        $this->db->insert('tbl_guru',$data);
        return true;
	}

	function simpanuserguru($data)
	{
		// Use prepared statements to prevent SQL injection
		$query = "INSERT INTO tbl_user (username, password,role) VALUES (?, ?, ?)";
		$this->db->query($query, array($data['nip'], 'PwdGuru','guru'));
	
		// Check if the query was successful (optional)
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false; // or handle the error as needed
		}
	}

	function simpanusersiswa($data)
	{
		// Use prepared statements to prevent SQL injection
		$query = "INSERT INTO tbl_user (username, password,role) VALUES (?, ?, ?)";
		$this->db->query($query, array($data['nisn'], 'Pwdorangtuasiswa','ots'));
	
		// Check if the query was successful (optional)
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false; // or handle the error as needed
		}
	}

	

	function simpankalender($data)
	{
        $this->db->insert('tbl_kalender',$data);
        return true;
	}

	function simpansiswa($data)
	{
        $this->db->insert('tbl_siswa',$data);
        return true;
	}

	function simpankelas($data)
	{
        $this->db->insert('tbl_kelas',$data);
        return true;
	}

	function getdataedit($id)
	{
		$this->db->where('id_guru', $id);
		$query=$this->db->get("tbl_guru");
		return $query->result();
	}

	function getdataeditsiswa($id)
	{
		$this->db->where('id_siswa', $id);
		$query=$this->db->get("tbl_siswa");
		return $query->result();
	}

	function editkalender($id)
	{
		$this->db->where('id', $id);
		$query=$this->db->get("tbl_kalender");
		return $query->result();
	}

	function editkelas($id)
	{
		$this->db->where('id_kelas', $id);
		$query=$this->db->get("tbl_kelas");
		return $query->result();
	}

	function updaterecords($id,$nip,$nama_guru,$jenis_kelamin,$walikelas)
	{
		$query=" UPDATE tbl_guru SET nip = '".$nip."',nama_guru = '".$nama_guru."',jenis_kelamin = '".$jenis_kelamin."' ,walikelas = '".$walikelas."' WHERE id_guru = '".$id."'";
		$this->db->query($query);
	}

	function updatekalender($id,$tgl_kalender,$deskripsi)
	{
		$query=" UPDATE tbl_kalender SET tgl_kalender = '".$tgl_kalender."',deskripsi = '".$deskripsi."' WHERE id = '".$id."'";
		$this->db->query($query);
	}

	function updatekelas($id,$nama_kelas)
	{
		$query=" UPDATE tbl_kelas SET nama_kelas = '".$nama_kelas."' WHERE id_kelas = '".$id."'";
		$this->db->query($query);
	}

	function updatesiswa($id,$nisn,$nama_siswa,$kelas,$orangtua_siswa,$alamat_siswa,$status)
	{
		$query=" UPDATE tbl_siswa SET nisn = '".$nisn."',nama_siswa = '".$nama_siswa."',kelas = '".$kelas."',orangtua_siswa = '".$orangtua_siswa."',alamat_siswa = '".$alamat_siswa."',status = '".$status."' WHERE id_siswa = '".$id."'";
		$this->db->query($query);
	}

	function deleterecords($id)
	{
		$query="DELETE from tbl_guru WHERE id_guru = '".$id."' ";
		$this->db->query($query);
	}

	function hapuskalender($id)
	{
		$query="DELETE from tbl_kalender WHERE id = '".$id."' ";
		$this->db->query($query);
	}


	function hapussiswa($id)
	{
		$query="DELETE from tbl_siswa WHERE id_siswa = '".$id."' ";
		$this->db->query($query);
	}

	function hapuskelas($id)
	{
		$query="DELETE from tbl_kelas WHERE id_kelas = '".$id."' ";
		$this->db->query($query);
	}
	

	function simpanqrcode($nip,$image_name){
        $data = array(
            'nip'  	=> $nip, 
            'gambar'   		=> $image_name
        );
        $this->db->insert('tbl_generate_barcode',$data);
    }

	function simpanqrcodesiswa($nisn,$image_name){
        $data = array(
            'nisn'  	=> $nisn, 
            'gambar'   		=> $image_name
        );
        $this->db->insert('tbl_generate_barcode_siswa',$data);
    }

	function getdatatentang()
	{
		$query=$this->db->get("tbltentang");
		return $query->result();
	}

	function getdatakontak()
	{
		$query=$this->db->get("tblkontak");
		return $query->result();
	}

	function getproduk()
	{
		$query=$this->db->get("tblproduk");
		return $query->result();
	}

	function insert($data){
		$this->db->insert('tblproduk',$data);
	}


	function saverecordstentang($data)
	{
        $this->db->insert('tbltentang',$data);
        return true;
	}

	function saverecordskontak($data)
	{
		// var_dump($data);
        $this->db->insert('tblkontak',$data);
        return true;
	}


	function getdataedittentang($id)
	{
		$this->db->where('id', $id);
		$query=$this->db->get("tbltentang");
		return $query->result();
	}

	function lihatprodukid($id)
	{
		$this->db->where('id', $id);
		$query=$this->db->get("tblproduk");
		return $query->result();
	}

	function getpesananid($idpesanan)
	{
		$this->db->where('idpesanan', $idpesanan);
		$query=$this->db->get("tblpesanan");
		return $query->result();
	}

	


	function getdataeditkontak($id)
	{
		$this->db->where('id', $id);
		$query=$this->db->get("tblkontak");
		return $query->result();
	}


	function updaterecordstentang($id,$deskripsi)
	{
		$query=" UPDATE tbltentang SET deskripsi = '".$deskripsi."' WHERE id = '".$id."' ";
		$this->db->query($query);
	}

	function updaterecordskontak($id,$alamatkantor,$kontakperson)
	{
		$query=" UPDATE tblkontak SET alamatkantor = '".$alamatkantor."',kontakperson = '".$kontakperson."' WHERE id = '".$id."' ";
		$this->db->query($query);
	}
	

	function deleterecordstentang($id)
	{
		$query="DELETE from tbltentang WHERE id = '".$id."' ";
		$this->db->query($query);
	}

	function deleterecordskontak($id)
	{
		$query="DELETE from tblkontak WHERE id = '".$id."' ";
		$this->db->query($query);
	}

	function deleterecordsproduk($id)
	{
		$query="DELETE from tblproduk WHERE id = '".$id."' ";
		$this->db->query($query);
	}


	function update($data){
		$where = $this->input->post('id',true);
		$this->db->where('id', $where);
		$this->db->update('tblproduk', $data);
	}

	function updatestatus($idpesanan){
		$query=" UPDATE tblpesanan SET statuspesanan = 'Sedang Di Proses' WHERE idpesanan = '".$idpesanan."' ";
		$this->db->query($query);
	}

	function updatestatusselesai($idpesanan){
		$query=" UPDATE tblpesanan SET statuspesanan = 'Pesanan Selesai' WHERE idpesanan = '".$idpesanan."' ";
		$this->db->query($query);
	}

	

	

	function getpesanan()
	{
		$query=$this->db->get("tblpesanan");
		return $query->result();
	}

	function getdetailpesanan($id)
	{
		$this->db->where('idpesanan', $id);
		$query=$this->db->get("tblpesanan");
		return $query->result();
	}	







	function getpresensisiswa(){
		$query=$this->db->query("select a.nisn,b.nama_siswa,b.kelas,a.tanggal, DATE_FORMAT(a.jam_masuk, '%H:%i') AS jam_masuk,DATE_FORMAT(a.jam_keluar, '%H:%i') AS jam_keluar,c.nama_kelas from tbl_presensi_siswa a left join tbl_siswa b on a.nisn = b.nisn left join tbl_kelas c on b.kelas = c.id_kelas where flag = 0 and tanggal = curdate() ");
		return $query->result();
	}

	function getpresensisiswa_ap(){
		$query=$this->db->query("select a.nisn,b.nama_siswa,b.kelas,a.tanggal, DATE_FORMAT(a.jam_masuk, '%H:%i') AS jam_masuk,DATE_FORMAT(a.jam_keluar, '%H:%i') AS jam_keluar ,c.nama_kelas from tbl_presensi_siswa a left join tbl_siswa b on a.nisn = b.nisn left join tbl_kelas c on b.kelas = c.id_kelas where flag = 1 and tanggal = curdate() ");
		return $query->result();
	}

	function getpresensiapprovesiswa(){
		$query=$this->db->query("select a.nisn,b.nama_siswa,a.tanggal, DATE_FORMAT(a.jam_masuk, '%H:%i') AS jam_masuk,DATE_FORMAT(a.jam_keluar, '%H:%i') AS jam_keluar,c.nama_kelas from tbl_presensi_siswa a left join tbl_siswa b on a.nisn = b.nisn left join tbl_kelas c on b.kelas = c.id_kelas where flag = 1 and tanggal = curdate() ");
		return $query->result();
	}

	function updateflagabsensiswa($datenya,$nisn){
		$this->db->set('flag', '1');
		$this->db->where('tanggal', $datenya);
		$this->db->where('nisn', $nisn);
		$this->db->update('tbl_presensi_siswa');
		return true;
	}

	function cetakpresensisiswa($tglawal, $tglakhir,$nisn){
		$query=$this->db->query("select a.nisn,b.nama_siswa,b.kelas,a.tanggal,a.jam_masuk,a.jam_keluar,c.nama_kelas from tbl_presensi_siswa a left join tbl_siswa b on a.nisn = b.nisn left join tbl_kelas c on b.kelas = c.id_kelas where flag = 1  and a.tanggal between '".$tglawal."' and '".$tglakhir."' and a.nisn = '".$nisn."' group by a.nisn,
		b.nama_siswa,c.nama_kelas,
		a.tanggal order by a.tanggal asc");
		return $query->result();
	}
	

}

/* End of file Madmin.php */
/* Location: ./application/models/Madmin.php */
