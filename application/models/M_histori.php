<?php


class M_histori extends CI_Model {
	function listhistori_saldoawal($kodepelanggan,$tglawal){
    	$this->db->select('*');
    	$this->db->from('vw_histori');
    	$this->db->where(array('histPlgnKode'=>$kodepelanggan,'histTanggal<'=>$tglawal));
    	$this->db->order_by("histKode","desc");
    	$this->db->limit(1);
    	return $query=$this->db->get();
    }
    function listhistori_saldoakhir($kodepelanggan){
    	$this->db->select('*');
    	$this->db->from('vw_histori');
    	$this->db->where(array('histPlgnKode'=>$kodepelanggan));
    	$this->db->order_by("histKode","desc");
    	$this->db->limit(1);
    	return $query=$this->db->get();
    }
    function listhistori_isi($kodepelanggan,$tglawal,$tglakhir){
        $result=$this->db->query("SELECT * FROM vw_histori where histPlgnKode='$kodepelanggan' AND histTanggal between '$tglawal' AND '$tglakhir' ORDER BY histkode asc");
    	return $result;
    }
    function listanalisa(){
        $this->db->select('*');
        $this->db->from('vw_analisa_umur_piutang1');
        return $query=$this->db->get();
    }
    function listanalisa2(){
        $this->db->select('*');
        $this->db->from('vw_analisa_umur_piutang2');
        return $query=$this->db->get();
    }
    
}