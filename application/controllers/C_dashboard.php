
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pelanggan');
        $this->load->model('M_penjualan');
        $this->load->model('M_userlogin');
        $this->load->model('M_histori');
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
            'page' => 'dashboard/data',
            'link' => 'dashboard',
            'script'=>'',
            'list' => $this->M_penjualan->list_untuk_dashboard()->result(),
            
        );
        $this->load->view('template/wrapper-admin', $data);
    }
}