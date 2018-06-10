<?php


class M_pelanggan extends CI_Model {
	
	function simpan_pelanggan($data){
        $this->db->insert('pelanggan', $data);
        return true;
    }

    function ubah_pelanggan($param_kode, $kode, $data){       
        $this->db->where($param_kode, $kode);
        $this->db->update('pelanggan', $data); 
        return true;
    }

    function hapus_pelanggan($param_kode, $kode){
        $this->db->delete('pelanggan', array($param_kode => $kode)); 
        return true;
    }

    function list_pelanggan(){
         return $query = $this->db->get('pelanggan')->result();  
    }

    
    function ambil_pelanggan($param_kode, $kode){
       return $this->db->get_where('pelanggan', array($param_kode => $kode));
    }

    function kode_pelanggan(){
    	//K002
    	$this->db->select('Right(plgnKode,3) as kode',false);
    	
    	$this->db->order_by('plgnKode','desc');
    	$this->db->limit(1);
    	$query = $this->db->get('pelanggan');

    	if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;

        }
        $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
        $kodejadi  = "P".$kodemax;
        return $kodejadi;
   	}
}