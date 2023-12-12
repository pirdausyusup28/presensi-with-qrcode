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

	function cetakqrcode($id){
		$query=$this->db->query("select a.*,b.* FROM tbl_generate_barcode a inner join tbl_guru b on a.nip = b.nip where a.id_barcode = '".$id."'");
		return $query->result();
	}

	function deleteqrcode($id)
	{
		$query="DELETE from tbl_generate_barcode WHERE id_barcode  = '".$id."' ";
		$this->db->query($query);
	}

	function getdataguru(){
		$query=$this->db->get("tbl_guru");
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

	function simpankalender($data)
	{
        $this->db->insert('tbl_kalender',$data);
        return true;
	}

	function getdataedit($id)
	{
		$this->db->where('id_guru', $id);
		$query=$this->db->get("tbl_guru");
		return $query->result();
	}

	function editkalender($id)
	{
		$this->db->where('id', $id);
		$query=$this->db->get("tbl_kalender");
		return $query->result();
	}

	function updaterecords($id,$nip,$nama_guru,$jenis_kelamin,$guru_mapel)
	{
		$query=" UPDATE tbl_guru SET nip = '".$nip."',nama_guru = '".$nama_guru."',jenis_kelamin = '".$jenis_kelamin."' ,guru_mapel = '".$guru_mapel."' WHERE id_guru = '".$id."'";
		$this->db->query($query);
	}

	function updatekalender($id,$tgl_kalender,$deskripsi)
	{
		$query=" UPDATE tbl_kalender SET tgl_kalender = '".$tgl_kalender."',deskripsi = '".$deskripsi."' WHERE id = '".$id."'";
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
	

	function simpanqrcode($nip,$image_name){
        $data = array(
            'nip'  	=> $nip, 
            'gambar'   		=> $image_name
        );
        $this->db->insert('tbl_generate_barcode',$data);
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
	

}

/* End of file Madmin.php */
/* Location: ./application/models/Madmin.php */
