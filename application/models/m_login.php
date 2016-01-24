<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_login extends CI_Model {
	// cek login
	public function ceklogin(){
		$query = $this->db->get_where('admin', array(
					'username'=>$this->input->post('username'),
					'password'=>$this->input->post('password')
				));
		$user = $query->row();
		
		if(count($user) != 0){
			//setting isi session
			$sesi = array(
						'username'=>$user->username,
						'masuk'=>true,
			);
			
			$this->session->set_userdata($sesi);
			
		}else{
			$data = array('masuk'=>false);
		}
		
		//return json_encode($data);
	}
}

?>