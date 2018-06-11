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
            'script'=>'',
            'list' => $this->M_penjualan->list_penjualan(),
        );
        $this->load->view('template/wrapper-admin', $data);
    }

    public function formtambah(){
        $data = array(
            'page' => 'penjualan/tambahpenjualan',
            'link' => 'penjualan',
            'script'=>'script/penjualan',
            'listpelanggan'=>$this->M_pelanggan->list_pelanggan(),
            'kodepenjualan'=>$this->M_penjualan->kode_penjualan()
        );
        $this->load->view('template/wrapper-admin', $data);
    }

    public function tambahpenjualan1(){
        $kodepelanggan=$this->input->post('pnjlPlgnKode',true);
        $jumlahpiutang=$this->M_pelanggan->ambil_pelanggan('plgnKode',$kodepelanggan)->row();
        $jumlah=$jumlahpiutang->plgnPiutang;
        if($jumlah==0){
            $data = array(
                'page' => 'penjualan/tambahpenjualan1',
                'link' => 'penjualan', 
                'script'=>'script/penjualan', 
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

    public function tambahpenjualan2(){
        $createdby=$this->session->userdata('userNama');
        $createdby='ega';
        $kodepelanggan=$this->input->post('plgnKode',true);
        $kodepenjualan=$this->M_penjualan->kode_penjualan();
        $tanggal=date('Y-m-d');
        $jatuhtempo=date('Y-m-d',strtotime('+30 days'));
        $totalpenjualan=$this->M_penjualan->totalpenjualan($createdby)->total;
        
        if($totalpenjualan==0){
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Warning!</strong> Simpan Data Gagal Karena Data Kosong </div>'
            );
            redirect(base_url().'c_penjualan'); //location
        }
        else{
            $datapenjualan=array(
                'pnjlPlgnKode'=>$kodepelanggan,
                'pnjlKode'=>$kodepenjualan,
                'pnjlTanggal'=>$tanggal,
                'pnjlJatuhTempo'=>$jatuhtempo,
                'pnjlTotalPenjualan'=>$totalpenjualan,
                'pnjlTotalBayar'=>$totalpenjualan,
                'pnjlCreatedBy'=>$createdby,
            );  

            $penjualan_temp=$this->M_penjualan->list_penjualan_detail_temp($createdby);
            $i=0;
            foreach ($penjualan_temp as $row) {
                $ins[$i]['detpPnjlKode']        = $kodepenjualan;
                $ins[$i]['detpBrngKode']        = $row->detpBrngKode;
                $ins[$i]['detpJumlah']          = $row->detpJumlah;
                $ins[$i]['detpHarga']           = $row->detpHarga;
                $i++;  
            } 

            $simpanpenjualan=$this->M_penjualan->simpan_penjualan($datapenjualan);
            $simpandetaipenjualan=$this->M_penjualan->simpan_batch_penjualan_detail($ins);
            $hapustemp=$this->M_penjualan->hapus_penjualan_detail_temp('detpCreatedBy',$createdby);

            if($simpanpenjualan && $simpandetaipenjualan){
                $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Succes</strong> Simpan Data Penjualan Berhasil </div>'
                );
                redirect(base_url().'c_penjualan'); //location
            }
            else{
                $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Warning!</strong> Simpan Data Penjualan Gagal </div>'
                );
                redirect(base_url().'c_penjualan'); //location
            }
        }   
    }

    public function tambahpenjualandetailtemp(){
        $detpBrngKode=$this->input->post('detpBrngKode',true);
        $detpJumlah=$this->input->post('detpJumlah',true);  
        $detpHarga=$this->input->post('detpHarga',true); 
        $createdby=$this->session->userdata('userNama');
        $createdby='ega';
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
    $createdby=$this->session->userdata('userNama');
    $createdby='ega';
    $data = array(
        'listbarang' =>$this->M_penjualan->list_penjualan_detail_temp($createdby),
        'script'=>'script/penjualan',
    );
    $this->load->view('penjualan/detailtemp',$data);
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

    public function hapuspenjualan($kodepenjualan){
        $hapuspenjualana=$this->M_penjualan->hapus_penjualan('pnjlKode',$kodepenjualan);
        if($hapuspenjualana){
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Warning!</strong> Hapus Data Penjualan Berhasil </div>'
            );
            redirect(base_url().'c_penjualan'); //location
        }
        else{
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-waning"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Warning!</strong> Hapus Data Penjualan Gagal </div>'
            );
            redirect(base_url().'c_penjualan'); //location
        }
    }

    public function detailpenjualan($kodepenjualan){
        $data=array(
            'page' => 'penjualan/detailpenjualan',
            'link' => 'penjualan', 
            'script'=>'script/penjualan', 
            'listdetail'=>$this->M_penjualan->list_penjualan_detail($kodepenjualan),
        );  
        $this->load->view('template/wrapper-admin', $data); 
    }

    public function ambilpenjualan($id){
        $data=$this->M_penjualan->list_view_penjualan_1baris($id);
        echo json_encode($data);
    }
}