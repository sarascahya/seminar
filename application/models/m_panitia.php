<?php
class m_panitia extends CI_Model
{
	
	function cekPanitia($email,$password){
		$this->db->select('*');
		$this->db->from('panitia');
		$this->db->where('email', $email);
		$this->db->where('password', $password);

		return $this->db->get();
	}

	function tambahPanitia($data){
		$tmpemail = $data['email'];

		$this->db->select('*');
		$this->db->from('panitia');
		$this->db->where('email', $tmpemail);

		return $this->db->get();
	}

	function selectPanitaById($id){
		$this->db->select('*');
		$this->db->from('panitia');
		$this->db->where('id', $id);

		return $this->db->get();
	}

	function updateProfil($data){
		$this->db->where('id', $data['id']);
		$this->db->from('panitia');
		$this->db->update('panitia', $data);

		redirect('panitia/profilPanitia');
	}
}
?>