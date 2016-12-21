<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_seminar extends CI_Model {

	function semuaSeminar(){
		$this->db->select('*');
		$this->db->from('seminar');

		return $this->db->get();
	}

	function allSeminar($id_seminar){
		$this->db->select('*');
		$this->db->from('seminar');
		$this->db->where('id', $id_seminar);

		return $this->db->get();

	}
	
	function allSeminarById($id){
		$this->db->select('*');
		$this->db->from('seminar');
		$this->db->where('id_panitia', $id);

		return $this->db->get();
	}

	function insertSeminar($data){
		$tmpjudul = $data['judul'];
		//$tmptgl = $data['tanggal'];

		$this->db->select('*');
		$this->db->from('seminar');
		$this->db->where('judul', $tmpjudul);
		//$this->db->where('tanggal', $tmptgl);
		
		return $this->db->get();
	}

	function insertSeminarTgl($data){
		//$tmpjudul = $data['judul'];
		$tmptgl = $data['tanggal'];

		$this->db->select('*');
		$this->db->from('seminar');
		//$this->db->where('judul', $tmpjudul);
		$this->db->where('tanggal', $tmptgl);
		
		return $this->db->get();
	}

	function updateSeminar($data){
		$this->db->where('id', $data['id']);
		$this->db->from('seminar');
		$this->db->update('seminar', $data);

		//echo $data['id'];
		$message = "swal('Berhasil!', 'Data seminar berhasil diedit', 'success');";
		$this->session->set_flashdata('notification', $message);

		redirect('panitia/lihatSeminarById','refresh');
	}

	function deleteSeminar($id_seminar){
		$this->db->where('id', $id_seminar);
  		$this->db->delete('seminar');

  		//$message = "swal('Terhapus!', 'Data seminar berhasil dihapus', 'success');";
		//$this->session->set_flashdata('notification', $message);
  		//redirect('panitia/lihatSeminarById','refresh');
	}

	public function cariSeminar($Value){
		$this->db->select('*');
		$this->db->from('seminar');
		$this->db->like('judul',$Value);
		
		return $this->db->get();
	}

}

/* End of file m_seminar.php */
/* Location: ./application/models/m_seminar.php */