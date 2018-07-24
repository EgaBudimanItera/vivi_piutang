<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_histori extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_histori');
        $this->load->model('M_pelanggan');
        $this->load->model('M_userlogin');
        if($this->session->userdata('status') != "login"){
            echo '<script>alert("Maaf, anda harus login terlebih dahulu")</script>';
            echo'<script>window.location.href="'.base_url().'";</script>';
        }else{
            $userNama = $this->session->userdata('userNama');
            $cek = $this->M_userlogin->ambil_user('userNama', $userNama)->num_rows();

            if($cek == 0){
                echo '<script>alert("User tidak ditemukan di database")</script>';
                echo'<script>window.location.href="'.base_url().'";</script>';
            }
        }     
	}
    //pages

    public function index(){
        $data = array(
            'page' => 'historipiutang/datahistori',
            'link' => 'historipiutang',
            'script'=>'script/historipiutang',
            'listpelanggan'=>$this->M_pelanggan->list_pelanggan(),
        );
        $this->load->view('template/wrapper-admin', $data);
    }

    public function analisa(){
        $data = array(
            'page' => 'historipiutang/dataanalisa',
            'link' => 'analisa',
            'script'=>'',
            'listanalisa'=>$this->M_histori->listanalisa()->result(),
            'listanalisa2'=>$this->M_histori->listanalisa2()->result(),
        );
        $this->load->view('template/wrapper-admin', $data);
    }

    public function caripiutang(){
        $kodepelanggan=$this->input->post('pnjlPlgnKode',true);
        $tglawal=$this->input->post('daritanggal',true);
        $tglakhir=$this->input->post('hinggatanggal',true);
        $jumlahdataawal=$this->M_histori->listhistori_saldoawal($kodepelanggan,$tglawal)->num_rows();
        if($jumlahdataawal==0){
            $saldoawal=0;
        }
        else{
            $saldoawal=$this->M_histori->listhistori_saldoawal($kodepelanggan,$tglawal)->row()->histSaldo;
        }
        $jumlahdataakhir=$this->M_histori->listhistori_saldoakhir($kodepelanggan)->num_rows();
        if($jumlahdataakhir==0){
            $saldoakhir=0;
        }
        else{
            $saldoakhir=$this->M_histori->listhistori_saldoakhir($kodepelanggan)->row()->histSaldo;   
        }
        $data=array(
            'page' => 'historipiutang/datahistori1',
            'link' => 'historipiutang',
            'script'=>'',
            'listhistoriisi'=>$this->M_histori->listhistori_isi($kodepelanggan,$tglawal,$tglakhir)->result(),
            'listsaldoawal'=>$saldoawal,
            'listsaldoakhir'=>$saldoakhir,
            'kodepelanggan'=>$kodepelanggan,
            'tglawal'=>$tglawal,
            'tglakhir'=>$tglakhir,
            'namapelanggan'=>$this->M_pelanggan->ambil_pelanggan('plgnKode',$kodepelanggan)->row(),
        );
        $this->load->view('template/wrapper-admin', $data);

    }
    public function cetakkartu($kodepelanggan,$tglawal,$tglakhir){
        $jumlahdataawal=$this->M_histori->listhistori_saldoawal($kodepelanggan,$tglawal)->num_rows();
        if($jumlahdataawal==0){
            $saldoawal=0;
        }
        else{
            $saldoawal=$this->M_histori->listhistori_saldoawal($kodepelanggan,$tglawal)->row()->histSaldo;
        }
        $jumlahdataakhir=$this->M_histori->listhistori_saldoakhir($kodepelanggan)->num_rows();
        if($jumlahdataakhir==0){
            $saldoakhir=0;
        }
        else{
            $saldoakhir=$this->M_histori->listhistori_saldoakhir($kodepelanggan)->row()->histSaldo;   
        }
        $data=array(
            'link'=>'historipiutang',
            'tglawal'=>$tglawal,
            'tglakhir'=>$tglakhir,
            'listpelanggan'=>$this->M_pelanggan->ambil_pelanggan('plgnKode',$kodepelanggan)->row(),
            'listhistoriisi'=>$this->M_histori->listhistori_isi($kodepelanggan,$tglawal,$tglakhir)->result(),
            'listsaldoawal'=>$saldoawal,
            'listsaldoakhir'=>$saldoakhir,
        );
        $this->load->view('historipiutang/kartupiutang', $data);
    }

    public function cetakanalisis(){
        $data=array(
            'listanalisa2'=>$this->M_histori->listanalisa2()->result(),
            'listanalisa'=>$this->M_histori->listanalisa()->result(),     
        );
        $this->load->view('historipiutang/laporanpiutang', $data);
    }
    
}