<?php


class M_satuan extends CI_Model {
	
	function simpan_satuan($data){
        $this->db->insert('satuan', $data);
        return true;
    }

    function ubah_satuan($param_kode, $kode, $data){       
        $this->db->where($param_kode, $kode);
        $this->db->update('satuan', $data); 
        return true;
    }

    function hapus_satuan($param_kode, $kode){
        $this->db->delete('satuan', array($param_kode => $kode)); 
        return true;
    }

    function list_satuan(){
         return $query = $this->db->get('satuan')->result();  
    }

    function ambil_satuan($param_kode, $kode){
       return $this->db->get_where('satuan', array($param_kode => $kode));
    }

    function kode_satuan(){
    	//K002
    	$this->db->select('Right(stunKode,3) as kode',false);
    	
    	$this->db->order_by('stunKode','desc');
    	$this->db->limit(1);
    	$query = $this->db->get('satuan');

    	if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;

        }
        $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
        $kodejadi  = "S".$kodemax;
        return $kodejadi;
   	}
}