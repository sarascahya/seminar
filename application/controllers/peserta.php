<?php
class peserta extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('m_peserta');
        $this->load->model('m_seminar');
        $this->load->model('m_peserta_seminar');
        $this->load->library('template');
        $this->load->library('converter');
        $this->load->library('dateconverter');
    }
    
    function index(){
        $data['title']="Seminar Saya";
        if (!$this->session->userdata('nama_panggilan')) {
            # code...
            redirect('peserta/loginPeserta','refresh');
        }

        //$this->m_peserta_seminar->seminarSaya();
        //$id_peserta = $this->session->userdata('id_peserta');
        $data['seminar_saya']= $this->m_peserta_seminar->seminarSaya()->result();

        $data['jml_data'] = count($data['seminar_saya']);
        for ($i=0; $i < $data['jml_data']; $i++) { 
            $data['seminar_saya'][$i]->harga = $this->converter->convert(intval($data['seminar_saya'][$i]->harga));
        }

        

        for ($i=0; $i < $data['jml_data']; $i++) { 
            $data['seminar_saya'][$i]->tanggal = $this->dateconverter->dbToView($data['seminar_saya'][$i]->tanggal);
        }

        
        //echo "id_peserta ".$id_peserta;
        $this->template->display2('peserta/index',$data);
    }

    function lihatSemuaSeminar(){
        $data['title']="Semua Seminar";
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

        $this->template->display2('peserta/seminar',$data);
    }

    public function loginPeserta(){
        $this->load->view('peserta/login_peserta');
    }

    public function cekLoginPeserta(){
        $userpeserta = $this->input->post('email');
        $passpeserta = $this->input->post('password');

        $cekpeserta = $this->m_peserta->cekPeserta($userpeserta, $passpeserta);
        
        if ($cekpeserta->num_rows()>0) {            
            $datapeserta = $cekpeserta->result();

            $nama1 = $datapeserta[0]->nama_lengkap;
            $nama2 = $datapeserta[0]->nama_panggilan;
            $id_peserta = $datapeserta[0]->id;
            $foto = $datapeserta[0]->foto;

            $this->session->set_userdata('nama_lengkap', $nama1);
            $this->session->set_userdata('nama_panggilan', $nama2);
            $this->session->set_userdata('id_peserta', $id_peserta);
            $this->session->set_userdata('foto', $foto);
            redirect('peserta');
            

        } else {
            $message = "<div class='callout callout-danger'>
                    <h4>Gagal!</h4>
                    <p>Terjadi kesalahan pada email atau password anda.</p>
                  </div>";

            $this->session->set_flashdata('notification', $message);
            redirect('peserta/loginPeserta','refresh');
            
        }
        
        
    }

    function logoutPeserta(){
        $this->session->sess_destroy();
        $this->session->unset_userdata('username');
        redirect('peserta/loginPeserta');
    }

    function daftarPeserta(){
        $this->load->view('peserta/daftar_peserta');
    }

    function prosesDaftarPeserta(){
        $data['nama_lengkap'] = $this->input->post('nama_lengkap');
        $data['nama_panggilan'] = $this->input->post('nama_panggilan');
        $data['jk'] = $this->input->post('jk');
        $data['no_telp'] = $this->input->post('password');
        $data['email'] = $this->input->post('email');
        $data['password'] = $this->input->post('password');
        $data['foto'] = "peserta.jpg";

        $cek = $this->m_peserta->tambahPeserta($data);
        if ($cek->num_rows()>0) {
            //echo "email sudah dipakai";
            $message = "<div class='callout callout-danger'>
                    <h4>Gagal!</h4>
                    <p>Email sudah dipergunakan sebelumnya. <br>Silahkan pergunakan email yang lain</p>
                  </div>";
            $this->session->set_flashdata('notification', $message);
            $this->session->set_flashdata('bounce', 'animated bounceIn');
            redirect('peserta/daftarPeserta','refresh');
        } else {
            //echo "email belum dipakai";
            $this->db->insert('peserta', $data);
            $message = "<script>swal('Berhasil!', 'Anda sudah terdaftar', 'success')</script>";
            $this->session->set_flashdata('notification', $message);
            redirect('peserta/loginPeserta');

            //flashdata jangan pake refresh
        }
    }

    function profilPeserta(){
        $data['title'] = 'Profil Peserta';
        $id = $this->session->userdata('id_peserta');
        $data['biodata'] = $this->m_peserta->selectPesertaById($id)-> result();
        $this->template->display2('peserta/profil_peserta', $data);
    }

    function editProfil(){
        $data['title']="Edit Profil Peserta";
        $id = $this->session->userdata('id_peserta');
        $data['biodata'] = $this->m_peserta->selectPesertaById($id)->result();
        $this->template->display2('peserta/form_edit_profil',$data);
    }

    function prosesEditProfil(){
        $data['id'] = $this->input->post('id');
        $data['nama_lengkap'] = $this->input->post('nama_lengkap');
        $data['nama_panggilan'] = $this->input->post('nama_panggilan');
        $data['jk'] = $this->input->post('jk');
        $data['no_telp'] = $this->input->post('no_telp');
        $data['instansi'] = $this->input->post('instansi');
        $data['alamat'] = $this->input->post('alamat');
        $data['email'] = $this->input->post('email');
        $data['password'] = $this->input->post('password');
        $nama_gambar = $this->input->post('nama_gambar');

        //upload foto
        $config['upload_path'] = 'uploads/peserta';
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
        $this->m_peserta->updateProfil($data);

    }


    function detailSeminarPeserta($id_seminar){
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

        $peserta_bayar = intval($data['jml_peserta_bayar']);
        $target_peserta = intval($data['seminar'][0]->peserta);
        $data['kuota_peserta'] = $peserta_bayar/$target_peserta*100;

        $this->template->display2('seminar/detail_seminar_public', $data);

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

        $this->template->display2('peserta/seminar', $data);
    }

    function ikutiseminar($id_seminar){
        $data['id_peserta_seminar'] = NULL;
        $data['id_peserta'] = $this->session->userdata('id_peserta');
        $data['id_seminar'] = $id_seminar;
        $data['tgl_daftar'] = NULL;
        $data['status_bayar'] = 0;

        //$this->m_peserta_seminar->tambahPesertaSeminar($data);
        //redirect('peserta','refresh');
        $cek = $this->m_peserta_seminar->cekAkunSaya($id_seminar);

        if ($cek->num_rows()>0) {
            //echo "gagal";
            $message = "swal('Gagal!', 'Anda sudah mengikuti seminar ini', 'error');";
            $this->session->set_flashdata('notification', $message);
            
            redirect('peserta/lihatSemuaSeminar');
        } else {
            $this->m_peserta_seminar->tambahPesertaSeminar($data);
            $message = "swal('Berhasil!', 'Anda sudah terdaftar', 'success');";
            $this->session->set_flashdata('notification', $message);
            redirect('peserta','refresh');
        }
    }

    function detailSeminarSayaPeserta($id_seminar){
        $data['title'] = 'Detail Seminar';
        $data['seminar_saya']= $this->m_peserta_seminar->detailSeminarSaya($id_seminar)->result();
        $data['seminar_saya'][0]->harga = $this->converter->convert(intval($data['seminar_saya'][0]->harga));
        $data['seminar_saya'][0]->tanggal = $this->dateconverter->dbToView($data['seminar_saya'][0]->tanggal);
        $data['seminar_saya'][0]->tgl_daftar = $this->dateconverter->dbTimeStampToView($data['seminar_saya'][0]->tgl_daftar);

        if ($data['seminar_saya'][0]->tgl_bayar == "0000-00-00") {
            $data['seminar_saya'][0]->tgl_bayar = "-";
        } else {
            $data['seminar_saya'][0]->tgl_bayar = $this->dateconverter->dbTimeStampToView($data['seminar_saya'][0]->tgl_bayar);
        }

        $data['semua_peserta'] = $this->m_peserta_seminar->selectSemuaPeserta($id_seminar)->result();
        $data['jml_peserta'] = count($data['semua_peserta']);
        for ($i=0; $i < $data['jml_peserta']; $i++) { 
            $data['semua_peserta'][$i]->tgl_daftar = $this->dateconverter->dbTimeStampToView($data['semua_peserta'][$i]->tgl_daftar);
        }

        $this->template->display2('seminar/detail_seminarsaya_peserta',$data);

    }

    public function batalIkutSeminar()
    {
        $id_seminar = $this->uri->segment(3);
        //echo "id_seminar : ".$id_seminar;
        //echo "<br>id_peserta : ".$id_peserta;

        $this->m_peserta_seminar->deletePeserta($id_seminar);
        $message = "swal('Berhasil!', 'Anda membatalkan mengikuti seminar tersebut', 'success')";
        $this->session->set_flashdata('notification', $message);
        redirect('peserta');
    }
    
}