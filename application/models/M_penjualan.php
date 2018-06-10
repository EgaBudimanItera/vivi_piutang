<?php


class M_penjualan extends CI_Model {
	
    //simpan
	function simpan_penjualan_detail_temp($data){
        $this->db->insert('penjualan_detail_temp', $data);
        return true;
    }

    function simpan_penjualan($data){
        $this->db->insert('penjualan', $data);
        return true;
    }

    function simpan_penjualan_detail($data){
        $this->db->insert('penjualan_detail', $data);
        return true;
    }

    //hapus 
    function hapus_penjualan_detail_temp($param_kode, $kode){
        $this->db->delete('penjualan_detail_temp', array($param_kode => $kode)); 
        return true;
    }

    function hapus_penjualan($param_kode, $kode){
        $this->db->delete('penjualan', array($param_kode => $kode)); 
        return true;
    }

    function hapus_penjualan_detail($param_kode, $kode){
        $this->db->delete('penjualan_detail', array($param_kode => $kode)); 
        return true;
    }

    //list
    function list_penjualan_detail_temp(){
        // $createdby=$this->session->userdata('userNama');
        $createdby="ega";
        $query=$this->db->get_where('vw_detailtemp',array('detpCreatedBy' => $createdby)); 
        return $query->result();
    }

    function list_penjualan(){
        $this->db->select('*');
        $this->db->from('penjualan');
        $this->db->join('pelanggan','pnjlPlgnKode=plgnKode');
        $query=$this->db->get()->result();
        return $query;

    }

    function list_penjualan_detail($kodepenjualan){
        $query=$this->db->get_where('penjualan_detail',array('detpPenjKode' => $kodepenjualan)); 
        return $query->result(); 
    }

    //kode penjualan
    function kode_penjualan(){
    	//P 0618 00001
    	$this->db->select('Right(pnjlKode,5) as kode',false);
    	
    	$this->db->order_by('pnjlKode','desc');
    	$this->db->limit(1);
    	$query = $this->db->get('penjualan');

    	if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;

        }
        $kodemax = str_pad($kode,5,"0",STR_PAD_LEFT);
        $kodejadi  = "P-".date("my")."-".$kodemax;
        return $kodejadi;
   	}
}