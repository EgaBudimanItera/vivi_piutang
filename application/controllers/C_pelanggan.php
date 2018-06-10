<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_pelanggan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pelanggan');
	}

    public function index(){
        $data = array(
            'page' => 'pelanggan/datapelanggan',
            'link' => 'pelanggan',
            'list' => $this->M_pelanggan->list_pelanggan(),
        );
        $this->load->view('template/wrapper-admin', $data);
    }

    public function formtambah(){
        $data = array(
            'page' => 'pelanggan/tambahpelanggan',
            'link' => 'pelanggan',
            'list' => $this->M_pelanggan->kode_pelanggan(),
        );
        $this->load->view('template/wrapper-admin', $data);
    }

    public function formubah(){
        $plgnKode =$this->uri->segment(3);
        $data = array(
            'page' => 'pelanggan/ubahpelanggan',
            'link' => 'pelanggan',
            'list' => $this->M_pelanggan->ambil_pelanggan('plgnKode',$plgnKode)->row(),
        );
        $this->load->view('template/wrapper-admin', $data);
    }

    public function tambahpelanggan(){
        $data = array(
            'plgnKode' => $this->M_pelanggan->kode_pelanggan(),
            'plgnNama' => $this->input->post('plgnNama', true),
            'plgnOwner' => $this->input->post('plgnOwner', true),
            'plgnAlamat' => $this->input->post('plgnAlamat', true),
            'plgnTelp' => $this->input->post('plgnTelp', true),
         );
         $simpanpelanggan = $this->M_pelanggan->simpan_pelanggan($data);
         if($simpanpelanggan){
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil disimpan !</div>'
            );
            redirect(base_url().'c_pelanggan'); //location
         }else{
           $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal disimpan !</div>'
            );
         }
    }

    public function ubahpelanggan(){
        $plgnKode=$this->input->post('plgnKode', true);
        $data = array(
            'plgnNama' => $this->input->post('plgnNama', true),
            'plgnOwner' => $this->input->post('plgnOwner', true),
            'plgnAlamat' => $this->input->post('plgnAlamat', true),
            'plgnTelp' => $this->input->post('plgnTelp', true),
         );
         $ubahpelanggan = $this->M_pelanggan->ubah_pelanggan('plgnKode',$plgnKode,$data);
         if($ubahpelanggan){
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil diubah !</div>'
            );
            redirect(base_url().'c_pelanggan'); //location
         }else{
           $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal diubah !</div>'
            );
         }
    }

    public function hapuspelanggan(){
     $plgnKode =$this->uri->segment(3);
     $hapuspelanggan = $this->M_pelanggan->hapus_pelanggan('plgnKode',$plgnKode);
     if($hapuspelanggan){
        $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil dihapus !</div>'
        );
        redirect(base_url().'c_pelanggan'); //location
     }else{
       $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal dihapus !</div>'
        );
     }
    }
}