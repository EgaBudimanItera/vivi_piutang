<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_pembayaran extends CI_Controller {
    
	public function __construct(){
		parent::__construct();
		$this->load->model('M_barang');
        $this->load->model('M_pelanggan');
        $this->load->model('M_penjualan');
        $this->load->model('M_satuan');
        $this->load->model('M_pembayaran');
	}
    //pages

    public function index(){
        $data = array(
            'page' => 'pembayaran/datapembayaran',
            'link' => 'pembayaran',
            'script'=>'',
            'list' => $this->M_pembayaran->list_pembayaran(),
        );
        $this->load->view('template/wrapper-admin', $data);
    }

    public function formtambah(){
        $data = array(
            'page' => 'pembayaran/datapenjualan',
            'link' => 'pembayaran',
            'script'=>'script/pembayaran',
            'list' => $this->M_penjualan->list_view_penjualan(),
        );
        $this->load->view('template/wrapper-admin', $data); 
    }

    //crud
    public function simpanpembayaran(){
        $createdby=$this->session->userdata('userNama');
        $createdby="ega";
        $pybrPnjlKode=$this->input->post('pybrPnjlKode',0);
        $pybrJumlahBayar=$this->input->post('pybrJumlahBayar',0);
        $pybrKode=$this->M_pembayaran->kode_pembayaran();
        $tanggal=date('Y-m-d');

        $data=array(
            'pybrKode'=>$pybrKode,
            'pybrTanggal'=>$tanggal,
            'pybrPnjlKode'=>$pybrPnjlKode,
            'pybrJumlahBayar'=>$pybrJumlahBayar,
            'pybrCreatedBy'=>$createdby,
        );
        // print_r($data);
        // exit();
        $simpan=$this->M_pembayaran->simpan_pembayaran($data);
        if($simpan){
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil ditambah !</div>'
            );
            echo json_encode(array('status'=>'success'));
        }
        else{
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal ditambah !</div>'
            );
           echo json_encode(array('status'=>'fail'));
        }

    }
    //etc
}