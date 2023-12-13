<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mabsen extends CI_Model {

	function getdata()
	{
		$query=$this->db->get("tbluser");
		return $query->result();
	}

	function getdatapresensi()
	{
		$query=$this->db->query("select a.nip,b.nama_guru,b.guru_mapel,a.tanggal, DATE_FORMAT(a.jam_masuk, '%H:%i') AS jam_masuk,DATE_FORMAT(a.jam_keluar, '%H:%i') AS jam_keluar from tbl_presensi a left join tbl_guru b on a.nip = b.nip where flag = 0 and tanggal = curdate()");
		return $query->result();
	}
	function getdatapresensisiswa()
	{
		$query=$this->db->query("select a.nisn,b.nama_siswa,a.tanggal, DATE_FORMAT(a.jam_masuk, '%H:%i') AS jam_masuk,DATE_FORMAT(a.jam_keluar, '%H:%i') AS jam_keluar from tbl_presensi_siswa a left join tbl_siswa b on a.nisn = b.nisn where flag = 0 and tanggal = curdate()");
		return $query->result();
	}
	public function cek_user($data) {
			$query = $this->db->get_where('tbl_guru', $data);
			return $query;
	}

	public function cek_users($data) {
			$query = $this->db->get_where('tbl_guru', $data);
			return $query;
	}

	function saveregistrasi($data)
	{
        $this->db->insert('tblregistrasionline',$data);
        return true;
	}



	function getdataedit($id)
	{
		$this->db->where('id', $id);
		$query=$this->db->get("tbluser");
		return $query->result();
	}


	function saverecords($data)
	{
        $this->db->insert('tbluser',$data);
        return true;
	}

	function updaterecords($id,$username,$email,$password)
	{
		$query=" UPDATE tbluser SET username = '".$username."',email = '".$email."',password = '".$password."' WHERE id = '".$id."' ";
		$this->db->query($query);
	}

	// function deleterecords($id)
	// {
	// 	$query=" DELETE FROM `tbluser` WHERE id = '".$id."' ";
	// 	$this->db->query($query);
	// }

	function deleterecords($id)
	{
		$query="DELETE from tbluser WHERE id = '".$id."' ";
		$this->db->query($query);
	}

	public function cek_id($nip)
    {
        $query_str_1 = $this->db->where('nip', $nip)->get('tbl_guru');

        if ($query_str_1->num_rows() > 0) {
            return $query_str_1->row();
        }
    }

	public function cek_id_siswa($nisn)
    {
        $query_str_1 = $this->db->where('nisn', $nisn)->get('tbl_siswa');

        if ($query_str_1->num_rows() > 0) {
            return $query_str_1->row();
        }
    }

	public function cek_kehadiran($nip, $tgl)
    {
		// $this->db->select('jam_masuk, CURTIME() as jam_sekarang, TIMEDIFF(CURTIME(),jam_masuk) as jam_menit_detik, hour(TIMEDIFF(CURTIME(),jam_masuk)) as hournya');
        $query_str = $this->db->where('nip', $nip)->where('tanggal', $tgl)->get('tbl_presensi');

        if ($query_str->num_rows() > 0) {
            return $query_str->row();
        } else {
            return false;
        }
    }

	public function cek_kehadiran_siswa($nisn, $tgl)
    {
		// $this->db->select('jam_masuk, CURTIME() as jam_sekarang, TIMEDIFF(CURTIME(),jam_masuk) as jam_menit_detik, hour(TIMEDIFF(CURTIME(),jam_masuk)) as hournya');
        $query_str = $this->db->where('nisn', $nisn)->where('tanggal', $tgl)->get('tbl_presensi_siswa');

        if ($query_str->num_rows() > 0) {
            return $query_str->row();
        } else {
            return false;
        }
    }

	public function cek_kehadiran_durasi($nip, $tgl)
    {
        $query_str = $this->db->query("SELECT jam_masuk, CURTIME() as jam_sekarang, TIMEDIFF(CURTIME(),jam_masuk) as jam_menit_detik, hour(TIMEDIFF(CURTIME(),jam_masuk)) as hournya from tbl_presensi where nip = '$nip' and tanggal = '$tgl'");

		return $query_str->result();
    }

	public function cek_kehadiran_durasi_siswa($nisn, $tgl)
    {
        $query_str = $this->db->query("SELECT jam_masuk, CURTIME() as jam_sekarang, TIMEDIFF(CURTIME(),jam_masuk) as jam_menit_detik, hour(TIMEDIFF(CURTIME(),jam_masuk)) as hournya from tbl_presensi_siswa where nisn = '$nisn' and tanggal = '$tgl'");

		return $query_str->result();
    }

	public function absen_masuk($data)
    {
        return $this->db->insert('tbl_presensi', $data);
    }

	public function absen_masuk_siswa($data)
    {
        return $this->db->insert('tbl_presensi_siswa', $data);
    }

	public function absen_pulang($nip, $data)
    {
        $tgl = date('Y-m-d');
        return $this->db->where('nip', $nip)
            ->where('tanggal', $tgl)
            ->update('tbl_presensi', $data);
    }

	public function absen_pulang_siswa($nisn, $data)
    {
        $tgl = date('Y-m-d');
        return $this->db->where('nisn', $nisn)
            ->where('tanggal', $tgl)
            ->update('tbl_presensi_siswa', $data);
    }

}

/* End of file Mabsen.php */
/* Location: ./application/models/Mabsen.php */
