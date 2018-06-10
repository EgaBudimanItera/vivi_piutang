<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_barang extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_barang');
        $this->load->model('M_satuan');
	}

    public function index(){
        $data = array(
            'page' => 'barang/databarang',
            'link' => 'barang',
            'list' => $this->M_barang->list_barang(),
        );
        $this->load->view('template/wrapper-admin', $data);
    }

    public function formtambah(){
        $data = array(
            'page' => 'barang/tambahbarang',
            'link' => 'barang',
            'list' => $this->M_barang->kode_barang(),
            'listsatuan'=>$this->M_satuan->list_satuan(),
        );
        $this->load->view('template/wrapper-admin', $data);
    }

    public function formubah(){
        $brngKode =$this->uri->segment(3);
        $data = array(
            'page' => 'barang/ubahbarang',
            'link' => 'barang',
            'list' => $this->M_barang->ambil_barang('brngKode',$brngKode)->row(),
            'listsatuan'=>$this->M_satuan->list_satuan(),
        );
        $this->load->view('template/wrapper-admin', $data);
    }

    public function tambahbarang(){
        $data = array(
            'brngKode' => $this->M_barang->kode_barang(),
            'brngNama' => $this->input->post('brngNama', true),
            'brngStunKode' => $this->input->post('brngStunKode', true),
            'brngHargaJual' => $this->input->post('brngHargaJual', true),
         );
         $simpanbarang = $this->M_barang->simpan_barang($data);
         if($simpanbarang){
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil disimpan !</div>'
            );
            redirect(base_url().'c_barang'); //location
         }else{
           $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal disimpan !</div>'
            );
         }
    }

    public function ubahbarang(){
        $brngKode=$this->input->post('brngKode', true);
        $data = array(
            'brngNama' => $this->input->post('brngNama', true),
            'brngStunKode' => $this->input->post('brngStunKode', true),
            'brngHargaJual' => $this->input->post('brngHargaJual', true),
         );
         $ubahbarang = $this->M_barang->ubah_barang('brngKode',$brngKode,$data);
         if($ubahbarang){
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil diubah !</div>'
            );
            redirect(base_url().'c_barang'); //location
         }else{
           $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal diubah !</div>'
            );
         }
    }

    public function hapusbarang(){
     $brngKode =$this->uri->segment(3);
     $hapusbarang = $this->M_barang->hapus_barang('brngKode',$brngKode);
     if($hapusbarang){
        $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil dihapus !</div>'
        );
        redirect(base_url().'c_barang'); //location
     }else{
       $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal dihapus !</div>'
        );
     }
    }
}