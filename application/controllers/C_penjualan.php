<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_penjualan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_barang');
        $this->load->model('M_pelanggan');
        $this->load->model('M_penjualan');
        $this->load->model('M_satuan');
	}

    public function index(){
        $data = array(
            'page' => 'penjualan/datapenjualan',
            'link' => 'penjualan',
            'list' => $this->M_penjualan->list_penjualan(),
        );
        $this->load->view('template/wrapper-admin', $data);
    }

    public function formtambah(){
        $data = array(
            'page' => 'penjualan/tambahpenjualan',
            'link' => 'penjualan',
            'listpelanggan'=>$this->M_pelanggan->list_pelanggan(),
            'kodepenjualan'=>$this->M_penjualan->kode_penjualan()
        );
        $this->load->view('template/wrapper-admin', $data);
    }

   public function tambahpenjualandetailtemp(){
        $detpBrngKode=$this->input->post('detpBrngKode',true);
        $detpJumlah=$this->input->post('detpJumlah',true);  
        $detpHarga=$this->input->post('detpHarga',true); 
        // $createdby=$this->session->userdata('userNama');
        
        $createdby="Ega";
        $data=array(
            'detpBrngKode'=>$detpBrngKode,
            'detpJumlah'=>$detpJumlah,
            'detpHarga'=>$detpHarga,
            'detpCreatedBy'=>$createdby,
        );
        $simpandetailtemp=$this->M_penjualan->simpan_penjualan_detail_temp($data);
        if($simpandetailtemp){
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil ditambah !</div>'
            );
            echo json_encode(array('status'=>'success'));
         }else{
           $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal ditambah !</div>'
            );
           echo json_encode(array('status'=>'fail'));
         }
   }
   public function formdetailtemp(){
    $data = array(
        'listbarang' =>$this->M_penjualan->list_penjualan_detail_temp(),
    );
    $this->load->view('penjualan/detailtemp',$data);
   }
    public function tambahpenjualan1(){
        $kodepelanggan=$this->input->post('pnjlPlgnKode',true);
        $jumlahpiutang=$this->M_pelanggan->ambil_pelanggan('plgnKode',$kodepelanggan)->row();
        $jumlah=$jumlahpiutang->plgnPiutang;
        if($jumlah==0){
            $data = array(
                'page' => 'penjualan/tambahpenjualan1',
                'link' => 'penjualan',  
                'kodepelanggan'=>$kodepelanggan,
                'listbarang'=>$this->M_barang->list_barang(),
                'listpelanggan'=>$jumlahpiutang,
            );
            $this->load->view('template/wrapper-admin', $data);
        }
        else{
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Warning!</strong> Pelanggan ini Masih Memiliki Piutang Sebesar Rp'.$jumlah.' </div>'
            );
            redirect(base_url().'c_penjualan/formtambah'); //location
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

    public function hapusdetail($id){
        $hapusdetailtemp=$this->M_penjualan->hapus_penjualan_detail_temp('detpId',$id);
        if($hapusdetailtemp){
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil dihapus !</div>'
            );
            echo json_encode(array('status'=>'success'));
         }else{
           $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal dihapus !</div>'
            );
           echo json_encode(array('status'=>'fail'));
         }
    }
}