<?php
class m_admin extends CI_Model{
    //private $table="admin";
    

    /*function cek($email,$password){
        $this->db->where("email",$email);
        $this->db->where("password",$password);
        return $this->db->get("admin");
    }*/
    
    function cekAdmin($email,$password){
        $this->db->from('admin');
        $this->db->where('email',$email);
        $this->db->where('password',$password);

        return $this->db->get();
    }

    function semua(){
        return $this->db->get("admin");
    }
    /*
    function cekKode($kode){
        $this->db->where("user",$kode);
        return $this->db->get("petugas");
    }
    
    function cekId($kode){
        $this->db->where("id_petugas",$kode);
        return $this->db->get("petugas");
    }
    
    function update($id,$info){
        $this->db->where("id_petugas",$id);
        $this->db->update("petugas",$info);
    }
    
    function simpan($info){
        $this->db->insert("petugas",$info);
    }
    
    function hapus($kode){
        $this->db->where("id_petugas",$kode);
        $this->db->delete("petugas");
    }
    */
}