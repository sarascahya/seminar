<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class web extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('m_peserta');
        $this->load->model('m_seminar');
        $this->load->model('m_peserta_seminar');
        $this->load->library('converter');
        $this->load->library('dateconverter');
    }

	public function index()
	{
		$this->load->view('web/public');
	}

	public function pilihanLogin()
	{
		$this->load->view('web/pilihan_login');
	}

	public function pilihanDaftar(){
		$this->load->view('web/pilihan_daftar');
	}

	function lihatSeminar(){
		$data['seminar'] = $this->m_seminar->semuaSeminar()->result();

        $data['jml_data'] = count($data['seminar']);
        for ($i=0; $i < $data['jml_data']; $i++) { 
            $data['seminar'][$i]->harga = $this->converter->convert(intval($data['seminar'][$i]->harga));
        }
        //$data['tanggal'] = $this->dateconverter->dbToView($data['seminar'][0]->tanggal);
        

        for ($i=0; $i < $data['jml_data']; $i++) { 
            $data['seminar'][$i]->tanggal = $this->dateconverter->dbToView($data['seminar'][$i]->tanggal);
        }
        for ($i=0; $i < $data['jml_data']; $i++) { 
            $data['seminar'][$i]->peserta = intval($data['seminar'][$i]->peserta);

            //echo $data['seminar'][$i]->id;
            $data['semua_peserta_bayar'][$i] = $this->m_peserta_seminar->semuaPesertaLunas($data['seminar'][$i]->id)->result();

            $data['jml_lunas'][$i] = intval(count($data['semua_peserta_bayar'][$i]));

            $data['kuota_peserta'][$i] = intval(($data['jml_lunas'][$i] / $data['seminar'][$i]->peserta)*100);
        }

		$this->load->view('web/seminar', $data);
	}

	function detailSeminar(){
		$data['title'] = 'Detail Seminar';
		$id_seminar = $this->uri->segment(3);
        $data['seminar'] = $this->m_seminar->allSeminar($id_seminar)->result();

        $data['seminar'][0]->harga = $this->converter->convert(intval($data['seminar'][0]->harga));
        $data['seminar'][0]->tanggal = $this->dateconverter->dbToView($data['seminar'][0]->tanggal);

        $data['semua_peserta'] = $this->m_peserta_seminar->selectSemuaPeserta($id_seminar)->result();
        $data['jml_peserta'] = count($data['semua_peserta']);
        for ($i=0; $i < $data['jml_peserta']; $i++) { 
            $data['semua_peserta'][$i]->tgl_daftar = $this->dateconverter->dbTimeStampToView($data['semua_peserta'][$i]->tgl_daftar);
        }

        $data['semua_peserta_bayar'] = $this->m_peserta_seminar->semuaPesertaLunas($id_seminar)->result();
        $data['jml_peserta_bayar'] = count($data['semua_peserta_bayar']);
        for ($i=0; $i < $data['jml_peserta_bayar']; $i++) { 
            $data['semua_peserta_bayar'][$i]->tgl_daftar = $this->dateconverter->dbTimeStampToView($data['semua_peserta_bayar'][$i]->tgl_daftar);
        }

        $peserta_bayar = intval($data['jml_peserta_bayar']);
        $target_peserta = intval($data['seminar'][0]->peserta);
        $data['kuota_peserta'] = $peserta_bayar/$target_peserta*100;

        $this->load->view('web/detail_seminar', $data);
	}

	function cariSeminar(){
		$value = $this->input->post('cari');
        $data['seminar'] = $this->m_seminar->cariSeminar($value)->result();
        $data['title'] = 'Data Seminar';
        $this->session->set_flashdata('cari', $value);

        $data['jml_data'] = count($data['seminar']);
        for ($i=0; $i < $data['jml_data']; $i++) { 
            $data['seminar'][$i]->harga = $this->converter->convert(intval($data['seminar'][$i]->harga));
        }
        //$data['tanggal'] = $this->dateconverter->dbToView($data['seminar'][0]->tanggal);
        

        for ($i=0; $i < $data['jml_data']; $i++) { 
            $data['seminar'][$i]->tanggal = $this->dateconverter->dbToView($data['seminar'][$i]->tanggal);
        }
        for ($i=0; $i < $data['jml_data']; $i++) { 
            $data['seminar'][$i]->peserta = intval($data['seminar'][$i]->peserta);

            //echo $data['seminar'][$i]->id;
            $data['semua_peserta_bayar'][$i] = $this->m_peserta_seminar->semuaPesertaLunas($data['seminar'][$i]->id)->result();

            $data['jml_lunas'][$i] = intval(count($data['semua_peserta_bayar'][$i]));

            $data['kuota_peserta'][$i] = intval(($data['jml_lunas'][$i] / $data['seminar'][$i]->peserta)*100);
        }

        $this->load->view('web/seminar', $data);
	}

	function daftarSeminar(){
		$this->load->view('web/daftar_seminar');
	}
	
}
