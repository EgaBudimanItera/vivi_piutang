<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_loginuser extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->model('M_userlogin');
	}
    //pages
    public function index(){
        $data = array(
        );
        $this->load->view('user/loginpage', $data);
    }
    public function auth(){
        $userNama=$this->input->post('userNama',true);
        $userPassword=md5($this->input->post('userPassword',true));
        $where=array(
            'userNama'=>$userNama,
            'userPassword'=>$userPassword,
        );
        $cek=$this->M_userlogin->cek_login($where)->num_rows();
        // print_r($cek);
        // exit();
        if($cek!=0){
            $data_session = array(
                'userNama' => $userNama,
                'userHakAkses'=>$this->M_userlogin->cek_login($where)->row()->userHakAkses,
                'status' => "login",
                'userId'=>$this->M_userlogin->cek_login($where)->row()->userId,
            );
 
            $this->session->set_userdata($data_session);
            echo '<script>alert("Selamat Datang "'.$userNama.')</script>';
            echo'<script>window.location.href="'.base_url().'c_dashboard";</script>';
        }
        else{
            echo '<script>alert("Maaf, Nama User / Password Anda Salah")</script>';
            echo'<script>window.location.href="'.base_url().'";</script>';
        }
    }
}