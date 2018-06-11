<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pelanggan');
	}
    //pages
    public function index(){
        $data = array(
            'page' => 'dashboard/datapelanggan',
            'link' => 'dashboard',
            'script'=>'',
            'list' => $this->M_pelanggan->list_pelanggan(),
        );
        $this->load->view('template/wrapper-admin', $data);
    }
}