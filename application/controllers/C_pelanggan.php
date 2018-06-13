<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_pelanggan extends CI_Controller {

	public function __construct(){
		parent::__construct();
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
            'page' => 'pelanggan/datapelanggan',
            'link' => 'pelanggan',
            'script'=>'',
            'list' => $this->M_pelanggan->list_pelanggan(),
        );
        $this->load->view('template/wrapper-admin', $data);
    }

    public function formtambah(){
        $data = array(
            'page' => 'pelanggan/tambahpelanggan',
            'link' => 'pelanggan',
            'script'=>'',
            'list' => $this->M_pelanggan->kode_pelanggan(),
        );
        $this->load->view('template/wrapper-admin', $data);
    }

    public function formubah(){
        $plgnKode =$this->uri->segment(3);
        $data = array(
            'page' => 'pelanggan/ubahpelanggan',
            'link' => 'pelanggan',
            'script'=>'',
            'list' => $this->M_pelanggan->ambil_pelanggan('plgnKode',$plgnKode)->row(),
        );
        $this->load->view('template/wrapper-admin', $data);
    }
    //crud
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
           redirect(base_url().'c_pelanggan/formtambah'); 
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
           redirect(base_url().'c_pelanggan/formubah'.$plgnKode);
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
       redirect(base_url().'c_pelanggan');
     }
    }
    //etc
    

    
}