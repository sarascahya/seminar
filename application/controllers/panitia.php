<?php
class panitia extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('m_panitia');
        $this->load->model('m_seminar');
        $this->load->model('m_peserta_seminar');
        $this->load->library('template');
        $this->load->library('dateconverter');
        $this->load->library('converter');
    }
    
    function index(){
        $data['title']="Home";

        if (!$this->session->userdata('username')) {
            redirect('panitia/loginPanitia','refresh');
        }
        
        $id = $this->session->userdata('id_panitia');

        $data['seminar'] = $this->m_seminar->allSeminarbyId($id)->result();
        $data['jml_data'] = count($data['seminar']);

        $this->template->display('panitia/index',$data);
    }

    function loginPanitia(){
        $data['title']="Login Panitia";

        $this->load->view('panitia/login_panitia');
    }

    function logoutPanitia(){
        $this->session->sess_destroy();
        $this->session->unset_userdata('username');
        redirect('panitia/loginPanitia');
    }

    function cekLoginPanitia(){
        $this->load->model('m_panitia');
        $userpanitia = $this->input->post('email');
        $passpanitia = $this->input->post('password');
        
        $cekpanitia = $this->m_panitia->cekPanitia($userpanitia, $passpanitia);
        
        if ($cekpanitia->num_rows()>0) {
            $datapanitia = $cekpanitia->result();
            $nama = $datapanitia[0]->nama_depan;
            $nama_panitia = $datapanitia[0]->nama_belakang;
            $id_panitia = $datapanitia[0]->id;
            $foto = $datapanitia[0]->foto;

            $this->session->set_userdata('nama', $nama);
            $this->session->set_userdata('username', $nama_panitia);
            $this->session->set_userdata('id_panitia', $id_panitia);
            $this->session->set_userdata('foto', $foto);

            redirect('panitia','refresh');

        } else {

            $message = "<div class='callout callout-danger'>
                    <h4>Gagal!</h4>
                    <p>Terjadi kesalahan pada email atau password anda.</p>
                  </div>";

            $this->session->set_flashdata('notification', $message);
            $this->session->set_flashdata('bounce', 'animated bounceIn');
            redirect('panitia/loginPanitia','refresh');
        }
    }

    function daftarPanitia(){
        $data['title']="Daftar Panitia";

        $this->load->view('panitia/daftar_panitia');
    }

    function prosesDaftarPanitia(){
        $data['id'] = NULL;
        $data['nama_depan'] = $this->input->post('nama_depan');
        $data['nama_belakang'] = $this->input->post('nama_belakang');
        $data['jk'] = $this->input->post('jk');
        $data['no_telp'] = $this->input->post('no_telp');
        $data['email'] = $this->input->post('email');
        $data['password'] = $this->input->post('password');
        $data['foto'] = "panitia.jpg";

        $cek = $this->m_panitia->tambahPanitia($data);

        if ($cek->num_rows()>0) {
            $message = "<div class='callout callout-danger'>
                    <h4>Gagal!</h4>
                    <p>Email sudah dipergunakan sebelumnya. <br>Silahkan pergunakan email yang lain</p>
                  </div>";

            $this->session->set_flashdata('notification', $message);
            $this->session->set_flashdata('bounce', 'animated bounceIn');

            redirect('panitia/daftarPanitia','refresh');
        } else {
            $this->db->insert('panitia', $data);
            $message = "<script>swal('Berhasil!', 'Anda sudah terdaftar', 'success')</script>";
            $this->session->set_flashdata('notification', $message);
            redirect('panitia/loginPanitia');
        }

    }

    function profilPanitia(){
        $data['title']="Profil Saya";

        $id = $this->session->userdata('id_panitia');
        $data['biodata'] = $this->m_panitia->selectPanitaById($id)->result();

        $this->template->display('panitia/profil_panitia',$data);
    }

    function editProfil(){
        $data['title']="Edit Profil Panitia";

        $id = $this->session->userdata('id_panitia');
        $data['biodata'] = $this->m_panitia->selectPanitaById($id)->result();

        $this->template->display('panitia/form_edit_profil',$data);
    }

    function prosesEditProfil(){
        $data['id'] = $this->input->post('id');
        $data['nama_depan'] = $this->input->post('nama_depan');
        $data['nama_belakang'] = $this->input->post('nama_belakang');
        $data['jk'] = $this->input->post('jk');
        $data['no_telp'] = $this->input->post('no_telp');
        $data['instansi'] = $this->input->post('instansi');
        $data['alamat'] = $this->input->post('alamat');
        $data['email'] = $this->input->post('email');
        $data['password'] = $this->input->post('password');
        $nama_gambar = $this->input->post('nama_gambar');

        //upload foto
        $config['upload_path'] = 'uploads/panitia';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']  = '99999999';
        $config['max_width']  = '99999999';
        $config['max_height']  = '99999999';
        $config['file_name'] = $data['id'];
        $config['overwrite'] = TRUE;
            
        $this->load->library('upload', $config);

        $cekPics = $_FILES['gambar']['name'];

        if($cekPics != ""){
            //echo "gambar isi";
            if(!$this->upload->do_upload('gambar')){
                echo "gg mau ke upload :(";
            } else {
                $data['foto'] = $this->upload->data('file_name');
            }
        } else {
            $data['foto'] = $nama_gambar;
        }
        $this->session->set_userdata('foto', $data['foto']);
        $this->m_panitia->updateProfil($data);
            
    }
    
    
    function lihatSeminarById(){
        $data['title']="Seminar Saya";
        $id = $this->session->userdata('id_panitia');
        $data['seminar'] = $this->m_seminar->allSeminarbyId($id)->result();

        $data['jml_data'] = count($data['seminar']);
        for ($i=0; $i < $data['jml_data']; $i++) { 
            $data['seminar'][$i]->harga = $this->converter->convert(intval($data['seminar'][$i]->harga));
        }

        for ($i=0; $i < $data['jml_data']; $i++) { 
            $data['seminar'][$i]->tanggal = $this->dateconverter->dbToView($data['seminar'][$i]->tanggal);
        }

        for ($i=0; $i < $data['jml_data']; $i++) { 
            $data['seminar'][$i]->peserta = intval($data['seminar'][$i]->peserta);

            $data['semua_peserta_bayar'][$i] = $this->m_peserta_seminar->semuaPesertaLunas($data['seminar'][$i]->id)->result();

            $data['jml_lunas'][$i] = intval(count($data['semua_peserta_bayar'][$i]));

            $data['kuota_peserta'][$i] = intval(($data['jml_lunas'][$i] / $data['seminar'][$i]->peserta)*100);

        }
        
        $this->template->display('panitia/seminar', $data);
    }
    
    function tambahSeminar(){
        $data['title']="Tambah Seminar";
        $this->template->display('panitia/form_tambah_seminar', $data);
    }

    
    function editSeminar($id_seminar){
        $data['title']="Edit Seminar";
        $data['seminar'] = $this->m_seminar->allSeminar($id_seminar)->result();
        $this->template->display('panitia/form_edit_seminar', $data);

    }

    function hapusSeminar(){
        $id = $this->uri->segment(3);
        $data = $this->m_seminar->allSeminar($id)->result();
        $path = 'uploads/seminar/'.$data[0]->foto;
        unlink($path);

        $this->m_seminar->deleteSeminar($id);
        $this->m_peserta_seminar->deletePesertaSeminar($id);

        $message = "swal('Terhapus!', 'Data seminar berhasil dihapus', 'success');";
        $this->session->set_flashdata('notification', $message);

        redirect('panitia/lihatSeminarById','refresh');
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

        for ($i=0; $i < $data['jml_data']; $i++) { 
            $data['seminar'][$i]->tanggal = $this->dateconverter->dbToView($data['seminar'][$i]->tanggal);
        }

        for ($i=0; $i < $data['jml_data']; $i++) { 
            $data['seminar'][$i]->peserta = intval($data['seminar'][$i]->peserta);

            $data['semua_peserta_bayar'][$i] = $this->m_peserta_seminar->semuaPesertaLunas($data['seminar'][$i]->id)->result();

            $data['jml_lunas'][$i] = intval(count($data['semua_peserta_bayar'][$i]));

            $data['kuota_peserta'][$i] = intval(($data['jml_lunas'][$i] / $data['seminar'][$i]->peserta)*100);

        }

        $this->template->display('panitia/seminar', $data);
    }

    function lihatDetailSeminar($id_seminar){
        $data['title'] = 'Detail Seminar';
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
        
        $data['semua_peserta_blm_bayar'] = $this->m_peserta_seminar->semuaPesertaBlmLunas($id_seminar)->result();
        $data['jml_peserta_blm_bayar'] = count($data['semua_peserta_blm_bayar']);
        for ($i=0; $i < $data['jml_peserta_blm_bayar']; $i++) { 
            $data['semua_peserta_blm_bayar'][$i]->tgl_daftar = $this->dateconverter->dbTimeStampToView($data['semua_peserta_blm_bayar'][$i]->tgl_daftar);
        }

        $peserta_bayar = intval($data['jml_peserta_bayar']);
        $target_peserta = intval($data['seminar'][0]->peserta);
        $data['kuota_peserta'] = $peserta_bayar/$target_peserta*100;
       
        $this->template->display('seminar/detail_seminar', $data);

    }

    function formInputTglBayar(){
        $data['title'] = "Input Tanggal Bayar";
        $data['id_peserta_seminar'] = $this->uri->segment(3);
        $data['id_seminar'] = $this->uri->segment(4);
        $this->template->display('seminar/input_tgl_bayar', $data);
    }

    function ubahStatusBayar(){
        $data['id_peserta_seminar'] = $this->input->post('id_peserta_seminar');
        $data['status_bayar'] = 1;
        $data['tgl_bayar'] = $this->input->post('tgl_bayar');

        $this->m_peserta_seminar->ubahStatusBayar($data);
        $id_seminar = $this->input->post('id_seminar');
        //echo "sukses";
        $message = "swal('Berhasil!', 'Status Pembayaran peserta LUNAS', 'success');";
        $this->session->set_flashdata('notification', $message);

        redirect('panitia/managePesertaById/'.$id_seminar,'refresh');
    }

    function lihatLaporanSeminar(){
        $data['title'] = "Laporan Seminar";

        $id_seminar = $this->uri->segment(3);

        $data['seminar'] = $this->m_seminar->allSeminar($id_seminar)->result();
        $data['seminar'][0]->harga = $this->converter->convert(intval($data['seminar'][0]->harga));
        $data['seminar'][0]->tanggal = $this->dateconverter->dbToView($data['seminar'][0]->tanggal);
        

        $data['semua_peserta'] = $this->m_peserta_seminar->selectSemuaPeserta($id_seminar)->result();
        $data['jml_peserta'] = count($data['semua_peserta']);
        

        $data['semua_peserta_bayar'] = $this->m_peserta_seminar->semuaPesertaLunas($id_seminar)->result();
        $data['jml_peserta_bayar'] = count($data['semua_peserta_bayar']);

        for ($i=0; $i < $data['jml_peserta_bayar']; $i++) { 
            $data['semua_peserta_bayar'][$i]->tgl_daftar = $this->dateconverter->dbTimeStampToView($data['semua_peserta_bayar'][$i]->tgl_daftar);
             $data['semua_peserta_bayar'][$i]->tgl_bayar = $this->dateconverter->dbTimeStampToView($data['semua_peserta_bayar'][$i]->tgl_bayar);
        }
        
        $peserta_bayar = intval($data['jml_peserta_bayar']);
        $target_peserta = intval($data['seminar'][0]->peserta);
        $data['kuota_peserta'] = $peserta_bayar/$target_peserta*100;

        $this->template->display('seminar/laporan_seminar', $data);
    }

    function cetakLaporan(){
        $data['title'] = "Laporan Seminar";

        $id_seminar = $this->uri->segment(3);

        $data['seminar'] = $this->m_seminar->allSeminar($id_seminar)->result();
        $data['seminar'][0]->harga = $this->converter->convert(intval($data['seminar'][0]->harga));
        $data['seminar'][0]->tanggal = $this->dateconverter->dbToView($data['seminar'][0]->tanggal);
        

        $data['semua_peserta'] = $this->m_peserta_seminar->selectSemuaPeserta($id_seminar)->result();
        $data['jml_peserta'] = count($data['semua_peserta']);
        

        $data['semua_peserta_bayar'] = $this->m_peserta_seminar->semuaPesertaLunas($id_seminar)->result();
        $data['jml_peserta_bayar'] = count($data['semua_peserta_bayar']);
        for ($i=0; $i < $data['jml_peserta_bayar']; $i++) { 
            $data['semua_peserta_bayar'][$i]->tgl_daftar = $this->dateconverter->dbTimeStampToView($data['semua_peserta_bayar'][$i]->tgl_daftar);
             $data['semua_peserta_bayar'][$i]->tgl_bayar = $this->dateconverter->dbTimeStampToView($data['semua_peserta_bayar'][$i]->tgl_bayar);
        }
        
        $data['semua_peserta_blm_bayar'] = $this->m_peserta_seminar->semuaPesertaBlmLunas($id_seminar)->result();
        $data['jml_peserta_blm_bayar'] = count($data['semua_peserta_blm_bayar']);
        

        $peserta_bayar = intval($data['jml_peserta_bayar']);
        $target_peserta = intval($data['seminar'][0]->peserta);
        $data['kuota_peserta'] = $peserta_bayar/$target_peserta*100;

        $this->load->view('seminar/laporan_seminar_cetak', $data);

    }

    function managePesertaById(){
        $data['title'] = 'Manage Peserta Seminar';
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
        
        $data['semua_peserta_blm_bayar'] = $this->m_peserta_seminar->semuaPesertaBlmLunas($id_seminar)->result();
        $data['jml_peserta_blm_bayar'] = count($data['semua_peserta_blm_bayar']);
        for ($i=0; $i < $data['jml_peserta_blm_bayar']; $i++) { 
            $data['semua_peserta_blm_bayar'][$i]->tgl_daftar = $this->dateconverter->dbTimeStampToView($data['semua_peserta_blm_bayar'][$i]->tgl_daftar);
        }

        $peserta_bayar = intval($data['jml_peserta_bayar']);
        $target_peserta = intval($data['seminar'][0]->peserta);
        $data['kuota_peserta'] = $peserta_bayar/$target_peserta*100;
       
        $this->template->display('seminar/manage_peserta_seminar', $data);

    }

    function ubahStatusHadirPeserta(){
        
    }
}