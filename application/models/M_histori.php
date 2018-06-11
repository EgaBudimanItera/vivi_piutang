<?php


class M_histori extends CI_Model {
	function listhistori_saldoawal($kodepelanggan,$tglawal){
    	$this->db->select('*,count(*)as jumlah');
    	$this->db->from('vw_histori');
    	$this->db->where(array('histPlgnKode'=>$kodepelanggan,'histTanggal<'=>$tglawal));
    	$this->db->order_by("histKode","desc");
    	$this->db->limit(1);
    	return $query=$this->db->get();
    }
    function listhistori_saldoakhir($kodepelanggan){
    	$this->db->select('*,count(*)as jumlah');
    	$this->db->from('vw_histori');
    	$this->db->where(array('histPlgnKode'=>$kodepelanggan));
    	$this->db->order_by("histKode","desc");
    	$this->db->limit(1);
    	return $query=$this->db->get();
    }
    function listhistori_isi($kodepelanggan,$tglawal,$tglakhir){
    	$this->db->select('*,count(*)as jumlah');
    	$this->db->from('vw_histori');
    	$this->db->where(array('histPlgnKode'=>$kodepelanggan,'histTanggal>='=>$tglawal,'histTanggal<='=>$tglakhir));
    	$this->db->order_by("histKode","desc");
    	return $query=$this->db->get();
    }
}