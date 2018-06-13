<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_userlogin extends CI_Controller {

	public function __construct(){
		parent::__construct();
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
        $userId=$this->session->userdata('userId');
        $data = array(
            'page' => 'userlogin/datauserlogin',
            'link' => 'userlogin',
            'script'=>'',
            'list' => $this->M_userlogin->list_userlogin($userId),
        );
        $this->load->view('template/wrapper-admin', $data);
    }

    public function formtambah(){
        $data = array(
            'page' => 'userlogin/tambahuserlogin',
            'link' => 'userlogin',
            'script'=>'',
        );
        $this->load->view('template/wrapper-admin', $data);
    }

    public function ubahpassword(){
        $data=array(
            'page'=>'userlogin/ubahpassword',
            'link'=>'ubahpassword',
            'script'=>'',
            'userNama'=>$this->session->userdata('userNama'),
        );
        $this->load->view('template/wrapper-admin', $data);
    }
    
    //crud
    public function tambahuserlogin(){
        $userNama=$this->input->post('userNama', true);
        $jumlahnama=$this->M_userlogin->ambil_jumlahuser($userNama);

        if($jumlahnama!=0){
           $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Nama User ini Sudah Tersedia !</div>'
            );  
           redirect(base_url().'c_userlogin/formtambah');
        }
        else{
            
            $data = array(
                'userNama' => $userNama,
                'userPassword'=>md5($this->input->post('userPassword', true)),
                'userHakAkses'=>$this->input->post('userHakAkses', true)
             );

             $simpanuserlogin = $this->M_userlogin->simpan_userlogin($data);
             if($simpanuserlogin){
                $this->session->set_flashdata(
                    'msg', 
                    '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil disimpan !</div>'
                );
                redirect(base_url().'c_userlogin'); //location
             }else{
               $this->session->set_flashdata(
                    'msg', 
                    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal disimpan !</div>'
                );
               redirect(base_url().'c_userlogin/formtambah');
             }
            // print_r($data);
            // exit();  
        }
        
    }


    public function hapususerlogin(){
     $userId =$this->uri->segment(3);
     $hapususerlogin = $this->M_userlogin->hapus_userlogin('userId',$userId);
     if($hapususerlogin){
        $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil dihapus !</div>'
        );
        redirect(base_url().'c_userlogin'); //location
     }else{
       $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal dihapus !</div>'
        );
       redirect(base_url().'c_userlogin'); //location
     }
    }

    
    public function prosesubahpassword(){
        $userId=$this->session->userdata('userId');
        $userNama=$this->session->userdata('userNama');//ambil dari session
        
        $userPasswordBaru=md5($this->input->post('userPasswordBaru',true));
        
        $data=array(
            'userPassword'=>$userPasswordBaru,
        );
        $ubah=$this->M_userlogin->ubah_userlogin('userId',$userId,$data);
        if($ubah){
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil diubah !</div>'
            );
            echo '<script>alert("Berhasil Ubah Password !! Silahkan Login Kembali")</script>';
            $this->M_userlogin->logout();
            echo'<script>window.location.href="'.base_url().'";</script>';
            
         }else{
           $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal diubah !</div>'
            );
           redirect(base_url().'c_userlogin/ubahpassword'); //location
         }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
    //etc 


}