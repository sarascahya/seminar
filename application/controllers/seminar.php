<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seminar extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('m_seminar');
    }

	public function index()
	{
		
	}

	function prosesTambahSeminar(){
		$data['id'] = NULL;
        $data['judul'] = $this->input->post('judul');
        $data['deskripsi'] = $this->input->post('deskripsi');
        $data['id_panitia'] = $this->session->userdata('id_panitia');
        $data['peserta'] = $this->input->post('peserta');
        //$data['pembicara'] = $this->input->post('pembicara');
        $data['harga'] = $this->input->post('harga');
        $data['tanggal'] = $this->input->post('tanggal');

        $config['upload_path'] = 'uploads/seminar';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']  = '100000';
        $config['max_width']  = '100000';
        $config['max_height']  = '100000';
        $config['file_name'] = $data['id_panitia'].'_'.$data['tanggal'];
        
        $this->load->library('upload', $config);
      
        if ( ! $this->upload->do_upload('foto')){
        	$error = array('error' => $this->upload->display_errors());
        	/*foreach ($error as $key) {
                echo $key;
            }*/
        }
        else{
        	$data['foto'] = $this->upload->data('file_name');
        	echo "success";
        }

		$cek = $this->m_seminar->insertSeminar($data);
        $cek2 = $this->m_seminar->insertSeminarTgl($data);

        if ($cek->num_rows()>0){
            if ($cek2->num_rows()>0) {
                //echo "judul dan tgl sudah ada";
                $message = "<div class='callout callout-danger'>
                    <h4>Gagal!</h4>
                    <p>Judul dan tanggal seminar sudah terdaftar. Silahkan daftarkan dengan judul yang lain.</p>
                  </div>";
                $this->session->set_flashdata('notification', $message);
                redirect('panitia/tambahSeminar');
            } else {
                //echo "judul sudah ada";
                $message = "<div class='callout callout-danger'>
                    <h4>Gagal!</h4>
                    <p>Judul seminar sudah terdaftar. Silahkan daftarkan dengan judul yang lain.</p>
                  </div>";
                $this->session->set_flashdata('notification', $message);
                redirect('panitia/tambahSeminar');
            }
        } else if ($cek->num_rows()==0) {
            if ($cek2->num_rows()>0) {
                //echo "sudah ada kegiatan di tanggal tersebut";
                $message = "<div class='callout callout-danger'>
                    <h4>Gagal!</h4>
                    <p>Sudah ada seminar di tanggal tersebut. Silahkan pergunakan tanggal yang lain.</p>
                  </div>";
                $this->session->set_flashdata('notification', $message);
                redirect('panitia/tambahSeminar');
            } else {
            //echo "tambah data";
            $this->db->insert('seminar', $data);

            $message = "swal('Berhasil!', 'Menambahkan 1 seminar', 'success')";
            $this->session->set_flashdata('notification', $message);
            $this->session->set_flashdata('bounce', 'animated bounceIn');
            redirect('panitia/lihatSeminarById');
        }
    }
        
        /*
        if ($cek->num_rows()>0) {
            //echo "judul udah ada";
            $message = "<div class='callout callout-danger'>
                    <h4>Gagal!</h4>
                    <p>Judul atau tanggal seminar sudah terdaftar. Silahkan daftarkan dengan judul yang lain.</p>
                  </div>";

            $this->session->set_flashdata('notification', $message);
            redirect('panitia/tambahSeminar');
        } else {
            //echo "judul belum ada";
            $this->db->insert('seminar', $data);

            $message = "swal('Berhasil!', 'Menambahkan 1 seminar', 'success')";
            $this->session->set_flashdata('notification', $message);
            $this->session->set_flashdata('bounce', 'animated bounceIn');
            redirect('panitia/lihatSeminarById');
        }*/
		    
	}

    function prosesEditSeminar(){
        $data['id'] = $this->input->post('id');
        $data['judul'] = $this->input->post('judul');
        $data['deskripsi'] = $this->input->post('deskripsi');
        $data['id_panitia'] = $this->session->userdata('id_panitia');
        $data['peserta'] = $this->input->post('peserta');
        //$data['pembicara'] = $this->input->post('pembicara');
        $data['harga'] = $this->input->post('harga');
        $data['tanggal'] = $this->input->post('tanggal');

        $nama_gambar = $this->input->post('nama_gambar');

        //upload foto
        $config['upload_path'] = 'uploads/seminar';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']  = '99999999';
        $config['max_width']  = '99999999';
        $config['max_height']  = '99999999';
        $config['file_name'] = $data['id_panitia'].'_'.$data['tanggal'];
        //$config['overwrite'] = FALSE;
            
        $this->load->library('upload', $config);

        $cekPics = $_FILES['foto']['name'];

        if($cekPics != ""){
            //echo "gambar isi";
            if(!$this->upload->do_upload('foto')){
                echo "gg mau ke upload :(";
            } else {
                $path = 'uploads/seminar/'.$nama_gambar;
                unlink($path);
                $data['foto'] = $this->upload->data('file_name');
            }
        } else {
            $data['foto'] = $nama_gambar;
        }

        //echo $nama_gambar;
        $this->m_seminar->updateSeminar($data);
    }

}

/* End of file seminar.php */
/* Location: ./application/controllers/seminar.php */
