<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_berandauser extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}
    //pages
    public function index(){
        $data = array(
            'page' => 'user/beranda',
            'link' => 'beranda',
            'script'=>'',
            
        );
        $this->load->view('template/wrapper', $data);
    }
}