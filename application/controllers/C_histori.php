<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_histori extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_histori');
        $this->load->model('M_pelanggan');
	}
    //pages

    public function index(){
        
        $data = array(
            'page' => 'historipiutang/datahistori',
            'link' => 'historipiutang',
            'script'=>'script/historipiutang',
            // 'listsaldoawal' => $saldoawal,
            // 'listsaldoakhir'=>$saldoakhir,
            // 'listisi'=>$this->M_histori->listhistori_isi('P003','2018-06-11','2018-06-12')->result(),
            'listpelanggan'=>$this->M_pelanggan->list_pelanggan(),
        );
        $this->load->view('template/wrapper-admin', $data);
    }
    public function pencarian(){
        // $listsaldoawal=$this->M_histori->listhistori_saldoawal('P003','2018-06-11')->row();
        // $jumlahdata=$listsaldoawal->jumlah;
        // if($jumlahdata==0){
        //     $saldoawal=0;
        // }else{
        //     $saldoawal=$listsaldoawal->histSaldo;
        // }

        // $listsaldoakhir=$this->M_histori->listhistori_saldoakhir('P003')->row();
        
        // $jumlahdataak=$listsaldoakhir->jumlah;
        // if($jumlahdataak==0){
        //     $saldoakhir=0;
        // }else{
        //     $saldoakhir=$listsaldoakhir->histSaldo;
        // }   
    }
}