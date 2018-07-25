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
        $pybrPnjlKode=$this->input->post('pybrPnjlKode',0);
        $pybrJumlahBayar=$this->input->post('pybrJumlahBayar',0);
        $pnjlTotalBayar=$this->M_penjualan->list_view_penjualan_1baris($pybrPnjlKode)->pnjlTotalBayar;
        if($pybrJumlahBayar>$pnjlTotalBayar){
            $pybrJumlahBayar=$pnjlTotalBayar;
        }
        else{
            $pybrJumlahBayar=$pybrJumlahBayar;
        }
        $pybrKode=$this->M_pembayaran->kode_pembayaran();
        $tanggal=$this->input->post('pybrTanggal',true);

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

    public function hapuspembayaran($pybrKode){
        $createdby=$this->session->userdata('userNama');
        $data=array(
            'pybrCreatedBy'=>$createdby,
        ); 
        $updatecreated=$this->M_pembayaran->update_pembayaran('pybrKode',$pybrKode,$data);
        $hapuspembayaran=$this->M_pembayaran->hapus_pembayaran('pybrKode',$pybrKode);
        if($hapuspembayaran){
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Warning!</strong> Hapus Data Pembayaran Berhasil </div>'
            );
            redirect(base_url().'c_pembayaran'); //location
        }
        else{
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-waning"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Warning!</strong> Hapus Data Pembayaran Gagal </div>'
            );
            redirect(base_url().'c_pembayaran'); //location
        }   
    }
    //etc
}