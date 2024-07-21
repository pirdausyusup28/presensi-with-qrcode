<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin extends CI_Model {

	function getdataregis()
	{
		$query=$this->db->get("tblregistrasionline");
		return $query->result();
	}

	function getpresensi(){
		if($this->session->userdata('role') == 'guru'){
			$where = "and a.nip = '".$this->session->userdata('username')."'";
		}else{
			$where = "";
		}
		$query=$this->db->query("select a.nip,b.nama_guru,b.guru_mapel,a.tanggal, DATE_FORMAT(a.jam_masuk, '%H:%i') AS jam_masuk,DATE_FORMAT(a.jam_keluar, '%H:%i') AS jam_keluar from tbl_presensi a left join tbl_guru b on a.nip = b.nip where flag = 0 and tanggal = curdate() $where");
		return $query->result();
	}

	function getpresensi_ap(){
		$query=$this->db->query("select a.nip,a.flag,b.nama_guru,b.guru_mapel,a.tanggal, DATE_FORMAT(a.jam_masuk, '%H:%i') AS jam_masuk,DATE_FORMAT(a.jam_keluar, '%H:%i') AS jam_keluar from tbl_presensi a left join tbl_guru b on a.nip = b.nip where flag IN ('1','2','3') and tanggal = curdate() ");
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

	function updateflagsiswa($datenya,$nisn){
		// $this->db->set('flag', '1');
		$this->db->set('flag_2', '1');
		$this->db->where('tanggal', $datenya);
		$this->db->where('nisn', $nisn);
		$this->db->update('tbl_presensi_siswa');
		return true;
	}

	function cetakpresensi($tglawal, $tglakhir,$nip){
		$query=$this->db->query("SELECT
		a.nip,
		b.nama_guru,
		b.walikelas ,
		a.tanggal,
		a.jam_masuk,
		a.jam_keluar,
		c.tgl_kalender ,
		c.deskripsi,
		d.nama_kelas 
	from
		tbl_presensi a
	left join tbl_guru b on
		a.nip = b.nip
	LEFT JOIN tbl_kelas d on 
		b.walikelas = d.id_kelas 
	LEFT join tbl_kalender c on
		a.tanggal = c.tgl_kalender where flag = 1  and a.tanggal between '".$tglawal."' and '".$tglakhir."' and a.nip = '".$nip."' group by a.nip,
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
		if($this->session->userdata('role') == 'guru'){
			$this->db->select('a.*,b.*');
			$this->db->join('tbl_kelas b', 'a.walikelas = b.id_kelas', 'left');
			$this->db->where('a.nip', $this->session->userdata('username'));
		}else{
			$this->db->select('a.*,b.*');
			$this->db->join('tbl_kelas b', 'a.walikelas = b.id_kelas', 'left');
		}
		$query=$this->db->get("tbl_guru a");
		return $query->result();
	}

	function getdatagurulist(){
		if($this->session->userdata('role') == 'guru'){
			$this->db->select('a.*');
			$this->db->where('a.nip', $this->session->userdata('username'));
		}else{
			$this->db->select('a.*');
		}
		$query=$this->db->get("tbl_guru a");
		return $query->result();
	}

	function getdatasiswa(){
		if($this->session->userdata('role') == 'ots'){
			$this->db->select('a.*,b.*');
			$this->db->join('tbl_kelas b', 'a.kelas = b.id_kelas', 'left');
			$this->db->where('a.nisn', $this->session->userdata('username'));
			$query=$this->db->get("tbl_siswa a");
		}else if($this->session->userdata('role') == 'guru'){
			$query = $this->db->query("select
			a.id_siswa,
				a.nisn,
				a.nama_siswa,
				a.kelas,
				b.nip,
				b.walikelas
			from
				tbl_siswa a
			left join tbl_guru b on a.kelas = b.walikelas where b.nip = '".$this->session->userdata('username')."'");
		}else{
			$this->db->select('a.*,b.*');
			$this->db->join('tbl_kelas b', 'a.kelas = b.id_kelas', 'left');
			$query=$this->db->get("tbl_siswa a");
		}
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

	function getdatalibur(){
		$query=$this->db->get("tbl_kalender");
		return $query->result();
	}

	public function ceknip($data)
    {
		$this->db->where($data);
        $query = $this->db->get('tbl_guru');
        return $query->num_rows() > 0;
    }

	function saverecords($data)
	{
		if (!$this->ceknip($data)) {
            $this->db->insert('tbl_guru', $data);
            return true;
        } else {
            return false;
        }
	}

	function simpanuserguru($data)
	{
		$pass = $data['nip'].'ruhama';
		// Use prepared statements to prevent SQL injection
		$query = "INSERT INTO tbl_user (username, password,role) VALUES (?, ?, ?)";
		$this->db->query($query, array($data['nip'], $pass,'guru'));
	
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
		$pass = $data['nisn'].'ruhama';
		$query = "INSERT INTO tbl_user (username, password,role) VALUES (?, ?, ?)";
		$this->db->query($query, array($data['nisn'], $pass,'ots'));
	
		// Check if the query was successful (optional)
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false; // or handle the error as needed
		}
	}

	public function cekkalender($data)
    {
		$this->db->where($data);
        $query = $this->db->get('tbl_kalender');
        return $query->num_rows() > 0;
    }

	function simpankalender($data)
	{
        if (!$this->cekkalender($data)) {
            $this->db->insert('tbl_kalender', $data);
            return true;
        } else {
            return false;
        }
	}

	public function ceknisn($data)
    {
		$this->db->where($data);
        $query = $this->db->get('tbl_siswa');
        return $query->num_rows() > 0;
    }

	function simpansiswa($data)
	{
		if (!$this->ceknisn($data)) {
            $this->db->insert('tbl_siswa', $data);
            return true;
        } else {
            return false;
        }
	}

	public function cekkelas($data)
    {
		$this->db->where($data);
        $query = $this->db->get('tbl_kelas');
        return $query->num_rows() > 0;
    }

	function simpankelas($data)
	{
		if (!$this->cekkelas($data)) {
            $this->db->insert('tbl_kelas', $data);
            return true;
        } else {
            return false;
        }
	}

	function savedatakehadiran($data)
	{
        $this->db->insert('tbl_presensi',$data);
        return true;
	}

	function savedatakehadiransiswa($data)
	{
        $this->db->insert('tbl_presensi_siswa',$data);
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
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false; // or handle the error as needed
		}
	}

	function updatekalender($id,$tgl_kalender,$deskripsi)
	{
		$query=" UPDATE tbl_kalender SET tgl_kalender = '".$tgl_kalender."',deskripsi = '".$deskripsi."' WHERE id = '".$id."'";
		$this->db->query($query);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false; // or handle the error as needed
		}
	}

	function updatekelas($id,$nama_kelas)
	{
		$query=" UPDATE tbl_kelas SET nama_kelas = '".$nama_kelas."' WHERE id_kelas = '".$id."'";
		$this->db->query($query);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false; // or handle the error as needed
		}
	}

	function updatesiswa($id,$nisn,$nama_siswa,$kelas,$orangtua_siswa,$alamat_siswa,$status)
	{
		$query=" UPDATE tbl_siswa SET nisn = '".$nisn."',nama_siswa = '".$nama_siswa."',kelas = '".$kelas."',orangtua_siswa = '".$orangtua_siswa."',alamat_siswa = '".$alamat_siswa."',status = '".$status."' WHERE id_siswa = '".$id."'";
		$this->db->query($query);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false; // or handle the error as needed
		}
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

	function hapusguru($id)
	{
		$query="DELETE from tbl_guru WHERE id_guru = '".$id."' ";
		$this->db->query($query);
	}

	function deleteqrcodesiswa($id)
	{
		$query="DELETE from tbl_generate_barcode_siswa WHERE id_barcode_siswa  = '".$id."' ";
		$this->db->query($query);
	}

	

	function resetpasswordguru($nip)
	{
		$pass = $nip.'ruhama';
		$query="UPDATE tbl_user SET password = '".$pass."' WHERE username = '".$nip."' ";
		$this->db->query($query);
	}

	function resetpasswordsiswa($nisn)
	{
		$pass = $nisn.'ruhama';
		$query="UPDATE tbl_user SET password = '".$pass."' WHERE username = '".$nisn."' ";
		$this->db->query($query);
	}

	
	public function cekqrcode($data)
    {
		$this->db->where($data);
        $query = $this->db->get('tbl_generate_barcode');
        return $query->num_rows() > 0;
    }

	function simpanqrcode($nip,$image_name){
        $data = array(
            'nip'  	=> $nip, 
            'gambar'   		=> $image_name
        );

		if (!$this->cekqrcode($data)) {
            $this->db->insert('tbl_generate_barcode', $data);
            return true;
        } else {
            return false;
        }
    }

	public function cekqrcodesiswa($data)
    {
		$this->db->where($data);
        $query = $this->db->get('tbl_generate_barcode_siswa');
        return $query->num_rows() > 0;
    }

	function simpanqrcodesiswa($nisn,$image_name){
        $data = array(
            'nisn'  	=> $nisn, 
            'gambar'   		=> $image_name
        );

		if (!$this->cekqrcodesiswa($data)) {
            $this->db->insert('tbl_generate_barcode_siswa', $data);
            return true;
        } else {
            return false;
        }
    }

	
	function getpresensisiswa(){
		if($this->session->userdata('role') == 'ots'){
			$where = "and a.nisn = '".$this->session->userdata('username')."'";
		}else if($this->session->userdata('role') == 'guru'){
			$where = "and b.kelas = '".$this->session->userdata('walikelas')."'";
		}else{
			$where = "";
		}
		$query=$this->db->query("select a.nisn,a.gambar,a.flag,b.nama_siswa,b.kelas,a.tanggal, DATE_FORMAT(a.jam_masuk, '%H:%i') AS jam_masuk,DATE_FORMAT(a.jam_keluar, '%H:%i') AS jam_keluar,c.nama_kelas from tbl_presensi_siswa a left join tbl_siswa b on a.nisn = b.nisn left join tbl_kelas c on b.kelas = c.id_kelas where flag_2 = '0' and tanggal = curdate() $where ");
		return $query->result();
	}

	function getpresensisiswa_ap(){
		if($this->session->userdata('role') == 'ots'){
			$where = "and a.nisn = '".$this->session->userdata('username')."'";
		}else{
			$where = "";
		}
		$query=$this->db->query("select a.nisn,a.flag,b.nama_siswa,b.kelas,a.tanggal, DATE_FORMAT(a.jam_masuk, '%H:%i') AS jam_masuk,DATE_FORMAT(a.jam_keluar, '%H:%i') AS jam_keluar ,c.nama_kelas from tbl_presensi_siswa a left join tbl_siswa b on a.nisn = b.nisn left join tbl_kelas c on b.kelas = c.id_kelas where flag_2 = '1' and tanggal = curdate() $where");
		return $query->result();
	}

	function getpresensiapprovesiswa(){
		$query=$this->db->query("select a.nisn,b.nama_siswa,a.tanggal, DATE_FORMAT(a.jam_masuk, '%H:%i') AS jam_masuk,DATE_FORMAT(a.jam_keluar, '%H:%i') AS jam_keluar,c.nama_kelas from tbl_presensi_siswa a left join tbl_siswa b on a.nisn = b.nisn left join tbl_kelas c on b.kelas = c.id_kelas where flag_2 = 1 and tanggal = curdate() ");
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


	function gethadirguru()
	{
		if ($this->session->userdata('role') == 'admin') {
			$query=$this->db->query("select count(*) totalhadirguru from tbl_presensi where MONTH(tanggal) = MONTH(CURRENT_DATE()) and flag !='2'");	
		}elseif ($this->session->userdata('role') == 'guru') {
			$query=$this->db->query("select count(*) totalhadirguru from tbl_presensi where MONTH(tanggal) = MONTH(CURRENT_DATE()) and nip='".$this->session->userdata('username')."' and flag !='2'");	
		}else{
			$query=$this->db->query("select count(*) totalhadirguru from tbl_presensi where MONTH(tanggal) = MONTH(CURRENT_DATE()) and nip='".$this->session->userdata('username')."' and flag !='2'");	
		}
		
		return $query->result();
	}	

	function getijinguru()
	{
		if ($this->session->userdata('role') == 'admin') {
			$query=$this->db->query("select count(*) totalijinguru from tbl_presensi where MONTH(tanggal) = MONTH(CURRENT_DATE()) and flag = '2'");
		}elseif ($this->session->userdata('role') == 'guru') {
			$query=$this->db->query("select count(*) totalijinguru from tbl_presensi where MONTH(tanggal) = MONTH(CURRENT_DATE()) and nip='".$this->session->userdata('username')."' and flag = '2'");
		}else{
			$query=$this->db->query("select count(*) totalijinguru from tbl_presensi where MONTH(tanggal) = MONTH(CURRENT_DATE()) and nip='".$this->session->userdata('username')."' and flag = '2'");
		}
		return $query->result();
	}	

	function gettelatguru()
	{
		if ($this->session->userdata('role') == 'admin') {
			$query=$this->db->query("select count(*) totaltelatguru from tbl_presensi where MONTH(tanggal) = MONTH(CURRENT_DATE()) and jam_masuk > '08:00:00' and flag !='2'");
		}elseif ($this->session->userdata('role') == 'guru') {
			$query=$this->db->query("select count(*) totaltelatguru from tbl_presensi where MONTH(tanggal) = MONTH(CURRENT_DATE()) and jam_masuk > '08:00:00' and nip='".$this->session->userdata('username')."' and flag !='2'");
		}else{
			$query=$this->db->query("select count(*) totaltelatguru from tbl_presensi where MONTH(tanggal) = MONTH(CURRENT_DATE()) and jam_masuk > '08:00:00' and nip='".$this->session->userdata('username')."' and flag !='2'");
		}
		return $query->result();
	}	

	function gethadirsiswa()
	{
		if ($this->session->userdata('role') == 'admin') {
			$query=$this->db->query("SELECT
			COUNT(a.nisn) as totalhadirsiswa
			from
				tbl_presensi_siswa a
			left join tbl_siswa b on
				a.nisn = b.nisn
			left join tbl_guru c on b.kelas = c.walikelas
			where MONTH(a.tanggal) = MONTH(CURRENT_DATE()) and a.flag !='2'");
		}elseif ($this->session->userdata('role') == 'guru') {
			$query=$this->db->query("SELECT
			COUNT(a.nisn) as totalhadirsiswa
			from
				tbl_presensi_siswa a
			left join tbl_siswa b on
				a.nisn = b.nisn
			left join tbl_guru c on b.kelas = c.walikelas
			where c.nip='".$this->session->userdata('username')."' and MONTH(a.tanggal) = MONTH(CURRENT_DATE()) and a.flag !='2'
			GROUP by c.nip");
		}elseif ($this->session->userdata('role') == 'ots'){
			$query=$this->db->query("SELECT
			COUNT(a.nisn) as totalhadirsiswa
			from
				tbl_presensi_siswa a
			left join tbl_siswa b on
				a.nisn = b.nisn
			left join tbl_guru c on b.kelas = c.walikelas
			where a.nisn='".$this->session->userdata('username')."' and MONTH(a.tanggal) = MONTH(CURRENT_DATE()) and a.flag !='2'
			GROUP by a.nisn");
		}
		return $query->result();
	}	

	function getijinsiswa()
	{
		if ($this->session->userdata('role') == 'admin') {
			$query=$this->db->query("SELECT
				COUNT(a.nisn) as totalijinsiswa
				from
					tbl_presensi_siswa a
				left join tbl_siswa b on
					a.nisn = b.nisn
				left join tbl_guru c on b.kelas = c.walikelas
				where MONTH(a.tanggal) = MONTH(CURRENT_DATE()) and a.flag ='2'");
		}elseif ($this->session->userdata('role') == 'guru') {
			$query=$this->db->query("SELECT
				COUNT(a.nisn) as totalijinsiswa
				from
					tbl_presensi_siswa a
				left join tbl_siswa b on
					a.nisn = b.nisn
				left join tbl_guru c on b.kelas = c.walikelas
				where c.nip='".$this->session->userdata('username')."' and MONTH(a.tanggal) = MONTH(CURRENT_DATE()) and a.flag ='2'
				GROUP by c.nip");
		}elseif ($this->session->userdata('role') == 'ots'){
			$query=$this->db->query("SELECT
				COUNT(a.nisn) as totalijinsiswa
				from
					tbl_presensi_siswa a
				left join tbl_siswa b on
					a.nisn = b.nisn
				left join tbl_guru c on b.kelas = c.walikelas
				where a.nisn='".$this->session->userdata('username')."' and MONTH(a.tanggal) = MONTH(CURRENT_DATE()) and a.flag ='2'
				GROUP by a.nisn");
		}
		return $query->result();
	}	

	function gettelatsiswa()
	{
		if ($this->session->userdata('role') == 'admin') {
			$query=$this->db->query("SELECT
				COUNT(a.nisn) as totaltelatsiswa
				from
					tbl_presensi_siswa a
				left join tbl_siswa b on
					a.nisn = b.nisn
				left join tbl_guru c on b.kelas = c.walikelas
				where MONTH(a.tanggal) = MONTH(CURRENT_DATE()) and a.jam_masuk > '08:00:00' and a.flag !='2'");
		}elseif ($this->session->userdata('role') == 'guru') {
			$query=$this->db->query("SELECT
				COUNT(a.nisn) as totaltelatsiswa
				from
					tbl_presensi_siswa a
				left join tbl_siswa b on
					a.nisn = b.nisn
				left join tbl_guru c on b.kelas = c.walikelas
				where c.nip='".$this->session->userdata('username')."' and MONTH(a.tanggal) = MONTH(CURRENT_DATE()) and a.jam_masuk > '08:00:00' and a.flag !='2'
				GROUP by c.nip");
		}elseif ($this->session->userdata('role') == 'ots'){
			$query=$this->db->query("SELECT
				COUNT(a.nisn) as totaltelatsiswa
				from
					tbl_presensi_siswa a
				left join tbl_siswa b on
					a.nisn = b.nisn
				left join tbl_guru c on b.kelas = c.walikelas
				where a.nisn='".$this->session->userdata('username')."' and MONTH(a.tanggal) = MONTH(CURRENT_DATE()) and a.jam_masuk > '08:00:00' and a.flag !='2'
				GROUP by a.nisn");
		}
		return $query->result();
	}	

	function laporandataguru(){
		$query=$this->db->query("select a.*, b.* from tbl_guru a left join tbl_kelas b on a.walikelas = b.id_kelas");
		return $query->result();
	}

	function laporandatasiswa(){
		$query=$this->db->query("select a.*, b.* from tbl_siswa a left join tbl_kelas b on a.kelas = b.id_kelas");
		return $query->result();
	}
	

}

/* End of file Madmin.php */
/* Location: ./application/models/Madmin.php */
