<?php


class M_userlogin extends CI_Model {
	
	function simpan_userlogin($data){
        $this->db->insert('userlogin', $data);
        return true;
    }

    function ubah_userlogin($param_kode, $kode, $data){       
        $this->db->where($param_kode, $kode);
        $this->db->update('userlogin', $data); 
        return true;
    }

    function hapus_userlogin($param_kode, $kode){
        $this->db->delete('userlogin', array($param_kode => $kode)); 
        return true;
    }

    function list_userlogin($userId){
         $query=$this->db->query("SELECT * FROM userlogin where userId!='$userId' order by userId asc"); 
         return $query->result(); 
    }

    function ambil_jumlahuser($kode){
        $query=$this->db->query("SELECT * FROM userlogin where userNama='$kode'");
        return $query->num_rows();
    }

    function ambil_user($param_kode, $kode){
       return $this->db->get_where('userlogin', array($param_kode => $kode));
    }

    function cek_login($where){      
        return $this->db->get_where('userlogin',$where);
    }
    function logout(){
        $this->session->sess_destroy();
    }   
}