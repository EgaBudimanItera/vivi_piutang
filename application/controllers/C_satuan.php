<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_satuan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_satuan');
	}
    //pages
    public function index(){
        $data = array(
            'page' => 'satuan/datasatuan',
            'link' => 'satuan',
            'script'=>'',
            'list' => $this->M_satuan->list_satuan(),
        );
        $this->load->view('template/wrapper-admin', $data);
    }

    public function formtambah(){
        $data = array(
            'page' => 'satuan/tambahsatuan',
            'link' => 'satuan',
            'script'=>'',
            'list' => $this->M_satuan->kode_satuan(),
        );
        $this->load->view('template/wrapper-admin', $data);
    }

    public function formubah(){
        $stunKode =$this->uri->segment(3);
        $data = array(
            'page' => 'satuan/ubahsatuan',
            'link' => 'satuan',
            'script'=>'',
            'list' => $this->M_satuan->ambil_satuan('stunKode',$stunKode)->row(),
        );
        $this->load->view('template/wrapper-admin', $data);
    }
    //crud
    public function tambahsatuan(){
        $data = array(
            'stunKode' => $this->M_satuan->kode_satuan(),
            'stunNama' => $this->input->post('stunNama', true),
         );
         $simpansatuan = $this->M_satuan->simpan_satuan($data);
         if($simpansatuan){
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil disimpan !</div>'
            );
            redirect(base_url().'c_satuan'); //location
         }else{
           $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal disimpan !</div>'
            );
         }
    }

    public function ubahsatuan(){
        $stunKode=$this->input->post('stunKode', true);
        $data = array(
            'stunKode' => $stunKode,
            'stunNama' => $this->input->post('stunNama', true),
         );
         $ubahsatuan = $this->M_satuan->ubah_satuan('stunKode',$stunKode,$data);
         if($ubahsatuan){
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil diubah !</div>'
            );
            redirect(base_url().'c_satuan'); //location
         }else{
           $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal diubah !</div>'
            );
         }
    }

    public function hapussatuan(){
     $stunKode =$this->uri->segment(3);
     $hapussatuan = $this->M_satuan->hapus_satuan('stunKode',$stunKode);
     if($hapussatuan){
        $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil dihapus !</div>'
        );
        redirect(base_url().'c_satuan'); //location
     }else{
       $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal dihapus !</div>'
        );
     }
    }
    //etc   
}