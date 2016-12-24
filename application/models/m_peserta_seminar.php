<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_peserta_seminar extends CI_Model {

	function cekAkunSaya($id_seminar){
		$id_peserta = $this->session->userdata('id_peserta');
		$this->db->select('*');
		$this->db->from('peserta_seminar');
		$this->db->where('id_seminar', $id_seminar);
		$this->db->where('id_peserta', $id_peserta);

		return $this->db->get();
	}

	function tambahPesertaSeminar($data){
		$this->db->insert('peserta_seminar', $data);

		//return $this->db->get();
	}
	
	function deletePesertaSeminar($id_seminar){
		$this->db->where('id_seminar', $id_seminar);
  		$this->db->delete('peserta_seminar');
	}

	public function deletePeserta($id_seminar)
	{
		$id_peserta = $this->session->userdata('id_peserta');
		
		$this->db->where('id_seminar', $id_seminar);
        $this->db->where('id_peserta', $id_peserta);
        $this->db->delete('peserta_seminar');
		
	}

	function seminarSaya(){
		$id_peserta = $this->session->userdata('id_peserta');
		$this->db->select('a.id_peserta, a.status_bayar, a.id_seminar, b.id, c.id as idTabelSeminar, c.judul, c.tanggal, c.status, c.harga, c.foto');
		$this->db->where('a.id_peserta', $id_peserta);

		$this->db->from('peserta_seminar as a');

		$this->db->join('peserta as b', 'a.id_peserta = b.id');
		$this->db->join('seminar as c', 'a.id_seminar = c.id');

		return $this->db->get();
	}


	function detailSeminarSaya($id_seminar){
		$id_peserta = $this->session->userdata('id_peserta');
		$this->db->select('a.id_peserta, a.status_bayar, a.id_seminar, a.tgl_daftar, a.tgl_bayar, b.id, b.nama_lengkap, c.id as idTabelSeminar, c.judul, c.tanggal, c.status, c.harga, c.foto, c.deskripsi,');
		$this->db->where('a.id_peserta', $id_peserta);
		$this->db->where('a.id_seminar', $id_seminar);
		$this->db->from('peserta_seminar as a');

		$this->db->join('peserta as b', 'a.id_peserta = b.id');
		$this->db->join('seminar as c', 'a.id_seminar = c.id');

		return $this->db->get();
	}

	function selectSemuaPeserta($id_seminar){
		$this->db->select('a.id_peserta, a.status_bayar, a.id_seminar, a.tgl_daftar, a.tgl_bayar, b.id, b.nama_lengkap, b.instansi, b.email,b.no_telp, c.id as idTabelSeminar, c.harga');
		$this->db->from('peserta_seminar as a');
		//$this->db->select('*');
		//$this->db->from('peserta_seminar');
		$this->db->where('id_seminar', $id_seminar);

		$this->db->join('peserta as b', 'a.id_peserta = b.id');
		$this->db->join('seminar as c', 'a.id_seminar = c.id');

		return $this->db->get();
	}

	function semuaPesertaLunas($id_seminar){
		$this->db->select('a.id_peserta_seminar, a.id_peserta, a.status_bayar, a.id_seminar, a.tgl_daftar, a.tgl_bayar, b.id, b.nama_lengkap, b.instansi, b.email,b.no_telp, c.id as idTabelSeminar, c.harga');
		$this->db->from('peserta_seminar as a');
		//$this->db->select('*');
		//$this->db->from('peserta_seminar');
		$this->db->where('id_seminar', $id_seminar);
		$this->db->where('status_bayar', 1);
		$this->db->where('status_hadir', 0);

		$this->db->join('peserta as b', 'a.id_peserta = b.id');
		$this->db->join('seminar as c', 'a.id_seminar = c.id');

		return $this->db->get();
	}

	function semuaPesertaBlmLunas($id_seminar){
		$this->db->select('a.id_peserta_seminar, a.id_peserta, a.status_bayar, a.id_seminar, a.tgl_daftar, a.tgl_bayar, b.id, b.nama_lengkap, b.instansi, b.email,b.no_telp, c.id as idTabelSeminar, c.harga');
		$this->db->from('peserta_seminar as a');
		//$this->db->select('*');
		//$this->db->from('peserta_seminar');
		$this->db->where('id_seminar', $id_seminar);
		$this->db->where('status_bayar', 0);

		$this->db->join('peserta as b', 'a.id_peserta = b.id');
		$this->db->join('seminar as c', 'a.id_seminar = c.id');

		return $this->db->get();
	}

	function semuaPesertaHadir($id_seminar){
		$this->db->select('a.id_peserta_seminar, a.id_peserta, a.status_bayar, a.id_seminar, a.tgl_daftar, a.tgl_bayar, b.id, b.nama_lengkap, b.instansi, b.email,b.no_telp, c.id as idTabelSeminar, c.harga');
		$this->db->from('peserta_seminar as a');
		//$this->db->select('*');
		//$this->db->from('peserta_seminar');
		$this->db->where('id_seminar', $id_seminar);
		$this->db->where('status_bayar', 1);
		$this->db->where('status_hadir', 1);

		$this->db->join('peserta as b', 'a.id_peserta = b.id');
		$this->db->join('seminar as c', 'a.id_seminar = c.id');

		return $this->db->get();
	}

	function ubahStatusBayar($data){
		$this->db->where('id_peserta_seminar', $data['id_peserta_seminar']);
		$this->db->from('peserta_seminar');
		$this->db->update('peserta_seminar', $data);
	}

	function ubahStatusHadir($data){
		$this->db->where('id_peserta_seminar', $data['id_peserta_seminar']);
		$this->db->from('peserta_seminar');
		$this->db->update('peserta_seminar', $data);
	}
}

/* End of file m_peserta_seminar.php */
/* Location: ./application/models/m_peserta_seminar.php */