<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Muser extends CI_Model {

	function getdata()
	{
		$query=$this->db->get("tbl_user");
		return $query->result();
	}
	public function cek_user($data) {
			$query = $this->db->query("select
			a.*,
			b.nip,
			b.nama_guru,
			b.walikelas
		from
			tbl_user a
		left join tbl_guru b on a.username = b.nip where a.username = '".$data['username']."' and a.password = '".$data['password']."'");
			return $query;
	}



	function getdataedit($id)
	{
		$this->db->where('id', $id);
		$query=$this->db->get("tbl_user");
		return $query->result();
	}


	function saverecords($data)
	{
        $this->db->insert('tbl_user',$data);
        return true;
	}

	function updaterecords($id,$username,$email,$password)
	{
		$query=" UPDATE tbl_user SET username = '".$username."',email = '".$email."',password = '".$password."' WHERE id = '".$id."' ";
		$this->db->query($query);
	}

	function deleterecords($id)
	{
		$query="DELETE from tbl_user WHERE id = '".$id."' ";
		$this->db->query($query);
	}

}

/* End of file Muser.php */
/* Location: ./application/models/Muser.php */