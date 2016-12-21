<?php
/**
* 
*/
class m_peserta extends CI_Model
{
	
	function cekPeserta($email,$password)
	{
		$this->db->select('*');
		$this->db->from('peserta');
		$this->db->where('email', $email);
		$this->db->where('password', $password);

		//echo "berhasil ke model";
		return $this->db->get();
	}

	function tambahPeserta($data){
		$tmpemail = $data['email'];

		$this->db->select('*');
		$this->db->from('peserta');
		$this->db->where('email', $tmpemail);

		return $this->db->get();
	}

	function selectPesertaById($id){
		$this->db->select('*');
		$this->db->from('peserta');
		$this->db->where('id', $id);

		return $this->db->get();
	}

	function updateProfil($data){
		$this->db->where('id', $data['id']);
		$this->db->from('peserta');
		$this->db->update('peserta', $data);

		redirect('peserta/profilPeserta');
	}
}
?>