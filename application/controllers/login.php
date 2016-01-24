<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
	}
	
	public function index()
	{
		if($this->session->userdata('masuk')){
			return redirect(base_url("admin"));
		} else {
			if($_POST) {
				echo $this->m_login->ceklogin();
				redirect(base_url('login'));
			} else {
				$this->load->view('verifikasi');
			}
		}
	}
	
	function logout(){
		if(!$this->session->userdata('masuk'))
			redirect(base_url());

		$this->session->sess_destroy();
		redirect(base_url("index.php/awal"));
	}
}