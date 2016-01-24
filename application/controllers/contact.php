<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('captcha','url','date','text_helper'));
		$this->load->database();
		session_start();
	}

	function index()
	{
		
		$this->load->view('header1');
		$this->load->view('contact');
		$this->load->view('footer');
	
	}

	function cari()
	{
		$data['menu'] = $this->m_help_page->menu_kategori('0','0');
		$data['judul'] = "contact Pelanggan - Grosir Sandal Online, Toko Sandal Online Termurah dan Terlengkap di Indonesia - Harmonis Grosir Sandal";
		$data['slide_atas'] = $this->m_help_page->tampil_slide_produk(10);
		$data['slide_laris'] = $this->m_help_page->tampil_slide_produk_terlaris_kiri(5);
		$data['slide_baru'] = $this->m_help_page->tampil_produk(5);
		$data['slide_rekomendasi'] = $this->m_help_page->tampil_slide_produk(6);
		$data['intermezzo'] = $this->m_help_page->tampil_semua_berita(5,0);
		$data['contact'] = $this->m_help_page->tampil_contact(10,0);
		$data['banner'] = $this->m_help_page->tampil_banner();
		
		$session=isset($_SESSION['username_grosir_sandal']) ? $_SESSION['username_grosir_sandal']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["nama"]=$pecah[1];
		}
		
		$page=$this->uri->segment(3);
      	$limit=6;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
		
		$data['testi'] = $this->m_help_page->tampil_contact($limit,$offset);
		$tot_hal = $this->m_help_page->hitung_isi_1tabel('tbl_contact','');
		
		$config['base_url'] = base_url() . 'contact/cari/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
       		$this->pagination->initialize($config);
		$data["paginator"] =$this->pagination->create_links();
		
		$this->load->view('header1');
		$this->load->view('bg_left',$data);
		$this->load->view('contact');
		$this->load->view('footer');
	}

	function isi()
	{
		$data['menu'] = $this->m_help_page->menu_kategori('0','0');
		$data['judul'] = "contact Pengunjung - Grosir Sandal Online, Toko Sandal Online Termurah dan Terlengkap di Indonesia - Harmonis Grosir Sandal";
		$data['slide_atas'] = $this->m_help_page->tampil_slide_produk(10);
		$data['slide_laris'] = $this->m_help_page->tampil_slide_produk_terlaris_kiri(5);
		$data['slide_baru'] = $this->m_help_page->tampil_produk(5);
		$data['slide_rekomendasi'] = $this->m_help_page->tampil_slide_produk(6);
		$data['intermezzo'] = $this->m_help_page->tampil_semua_berita(5,0);
		$data['contact'] = $this->m_help_page->tampil_contact(10,0);
		$data['banner'] = $this->m_help_page->tampil_banner();
		
		
		
		$vals = array(
		'img_path' => './captcha/',
		'img_url' => base_url().'captcha/',
		'font_path' => './system/fonts/impact.ttf',
		'img_width' => '200',
		'img_height' => 60,
		'expiration' => 90
		);
		$cap = create_captcha($vals);
	 
		$datamasuk = array(
			'captcha_time' => $cap['time'],
			'ip_address' => $this->input->ip_address(),
			'word' => $cap['word']
			);
		$expiration = time()-900;
		$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);
		$query = $this->db->insert_string('captcha', $datamasuk);
		$this->db->query($query);
		$data['gbr_captcha'] = $cap['image'];
		
		$this->load->view('header1');
		$this->load->view('bg_left',$data);
		$this->load->view('bg_contact');
		$this->load->view('footer');
	}

	function baca()
	{
		$kode='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$kode='';
		}
		else
		{
    			$kode = $this->uri->segment(3);
		}
		$data['menu'] = $this->m_help_page->menu_kategori('0','0');
		$data['judul'] = "contact Pengunjung - Grosir Sandal Online, Toko Sandal Online Termurah dan Terlengkap di Indonesia - Harmonis Grosir Sandal";
		$data['slide_atas'] = $this->m_help_page->tampil_slide_produk(10);
		$data['slide_laris'] = $this->m_help_page->tampil_slide_produk_terlaris_kiri(5);
		$data['slide_baru'] = $this->m_help_page->tampil_produk(5);
		$data['slide_rekomendasi'] = $this->m_help_page->tampil_slide_produk(6);
		$data['intermezzo'] = $this->m_help_page->tampil_semua_berita(5,0);
		$data['contact'] = $this->m_help_page->tampil_contact(10,0);
		$data['det'] = $this->m_help_page->tampil_detail_contact($kode);
		$data['banner'] = $this->m_help_page->tampil_banner();
		$this->load->view('web/bg_detail_testi',$data);
		
	}

	function kirim_pesan()
	{
		$data['menu'] = $this->m_help_page->menu_kategori('0','0');
		$data['judul'] = "contact Pengunjung - Grosir Sandal Online, Toko Sandal Online Termurah dan Terlengkap di Indonesia - Harmonis Grosir Sandal";
		$data['slide_atas'] = $this->m_help_page->tampil_slide_produk(10);
		$data['slide_laris'] = $this->m_help_page->tampil_slide_produk_terlaris_kiri(5);
		$data['slide_produk_home'] = $this->m_help_page->tampil_produk(12);
		$data['slide_baru'] = $this->m_help_page->tampil_produk(5);
		$data['intermezzo'] = $this->m_help_page->tampil_semua_berita(5,0);
		$data['contact'] = $this->m_help_page->tampil_testimonial(10,0);
		$data['banner'] = $this->m_help_page->tampil_banner();
		
		
		
		$datestring = "%d-%m-%Y | %h:%i:%a";
		$time = time();
		$input=array();
		
		$datapesan['nama'] = mysql_real_escape_string(strip_tags($this->input->post('nama')));
		$datapesan['email'] = mysql_real_escape_string(strip_tags($this->input->post('email')));
		$datapesan['pesan'] = mysql_real_escape_string(strip_tags($this->input->post('pesan')));
		$datapesan['telp'] = mysql_real_escape_string(strip_tags($this->input->post('telp')));
		$datapesan['status'] = '0';
		$datapesan['waktu']=mdate($datestring,$time);		
		
		
		if($datapesan['nama']=="" && $datapesan['email']=="" && $datapesan['pesan']=="")
		{
			$data['pesan'] = "Field belum lengkap. Mohon diisi dengan selengkap-lengkapnya.";
		}
		else
		{
			
			//$format_pesan = "Nama : ".$datapesan['nama']."".$this->email->clear()." Email : ".$datapesan['email']."".$this->email->clear()." Telpon : ".$datapesan['telpon']."".$this->email->clear()." Alamat : ".$datapesan['alamat']."".$this->email->clear()."  
			//Kota : ".$datapesan['kota']."".$this->email->clear()." Negara : ".$datapesan['negara']."".$this->email->clear()." Pesan : ".$datapesan['pesan'];
			$data['pesan'] = "Pesan Berhasil dikirim dan akan kami moderisasi terlebih dahulu.";
			$this->m_help_page->simpan_contact($datapesan);
			?>
			<script>
			alert('contact anda telah berhasil dikirim. Terima Kasih telah mengirimkan contact di website kami.\n Pesan Berhasil dikirim dan akan kami moderisasi terlebih dahulu.');
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
		}
		
			
		$this->load->view('header1');
		$this->load->view('bg_left',$data);
		$this->load->view('contact');
		$this->load->view('footer');
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
}