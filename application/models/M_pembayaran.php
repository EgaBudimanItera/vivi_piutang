<?php


class M_pembayaran extends CI_Model {
	

	function simpan_pembayaran($data){
        $this->db->insert('pembayaran', $data);
        return true;
    }


    function hapus_pembayaran($param_kode, $kode){
        $this->db->delete('pembayaran', array($param_kode => $kode)); 
        return true;
    }

    function list_pembayaran(){
         $this->db->select('*');
         $this->db->from('vw_pembayaran');
         return $query=$this->db->get()->result();
    }

    function kode_pembayaran(){
    	//K002
    	$this->db->select('Right(pybrKode,5) as kode',false);
    	
    	$this->db->order_by('pybrKode','desc');
    	$this->db->limit(1);
    	$query = $this->db->get('pembayaran');

    	if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;

        }
        $kodemax = str_pad($kode,5,"0",STR_PAD_LEFT);
        $kodejadi  = "R-".date("my")."-".$kodemax;
        return $kodejadi;
   	}
}