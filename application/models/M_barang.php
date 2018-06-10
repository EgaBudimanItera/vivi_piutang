<?php


class M_barang extends CI_Model {
	
	function simpan_barang($data){
        $this->db->insert('barang', $data);
        return true;
    }

    function ubah_barang($param_kode, $kode, $data){       
        $this->db->where($param_kode, $kode);
        $this->db->update('barang', $data); 
        return true;
    }

    function hapus_barang($param_kode, $kode){
        $this->db->delete('barang', array($param_kode => $kode)); 
        return true;
    }

    function list_barang(){
         $this->db->select('*');
         $this->db->from('barang');
         $this->db->join('satuan','brngStunKode=stunKode');
         return $query=$this->db->get()->result();
    }

    function ambil_barang($param_kode, $kode){
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('satuan','brngStunKode=stunKode');
        $this->db->where($param_kode,$kode);
        return $query=$this->db->get();
    }

    function kode_barang(){
    	//K002
    	$this->db->select('Right(brngKode,3) as kode',false);
    	
    	$this->db->order_by('brngKode','desc');
    	$this->db->limit(1);
    	$query = $this->db->get('barang');

    	if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;

        }
        $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
        $kodejadi  = "B".$kodemax;
        return $kodejadi;
   	}
}