<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class promo extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		session_start();
	}
	
	function index()
	{
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."promo/cari'>";
	}

	function cari()
	{
		$data['menu'] = $this->m_help_page->menu_kategori('0','0');
		$data['judul'] = "Intermezzo - Tips dan Trik - Grosir Sandal Online, Toko Sandal Online Termurah dan Terlengkap di Indonesia - Harmonis Grosir Sandal";
		$data['slide_atas'] = $this->m_help_page->tampil_slide_produk(10);
		$data['slide_laris'] = $this->m_help_page->tampil_slide_produk_terlaris_kiri(5);
		$data['slide_baru'] = $this->m_help_page->tampil_produk(5);
		$data['slide_rekomendasi'] = $this->m_help_page->tampil_slide_produk(6);
		$data['promo'] = $this->m_help_page->tampil_semua_promo(5,0);
		$data['testimonial'] = $this->m_help_page->tampil_testimonial(10,0);
		$data['banner'] = $this->m_help_page->tampil_banner();
		
		$session=isset($_SESSION['username_grosir_sandal']) ? $_SESSION['username_grosir_sandal']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["nama"]=$pecah[1];
		}
		
		$page=$this->uri->segment(3);
      	$limit=8;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
		
		$data['berita'] = $this->m_help_page->tampil_semua_promo($limit,$offset);
		$tot_hal = $this->m_help_page->hitung_isi_1tabel('tbl_promo','');
		
		$config['base_url'] = base_url() . 'promo/cari/';
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
		$this->load->view('promo');
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
		$p_kode = explode("-",$kode);
		$data['detail'] = $this->m_help_page->tampil_detail_berita($p_kode[0]);
		$judul = "";
		$kd_kategori = "";
		foreach($data['detail']->result() as $dp)
		{
			$c = array (' ');
    		$d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
			$s = strtolower(str_replace($d,"",$dp->judul));
			$data['link'] = strtolower(str_replace($c, '-', $s));
			$data['baca'] = $dp->judul;
			$data['id'] = $dp->id_berita;
		}
		$data['menu'] = $this->m_help_page->menu_kategori('0','0');
		$data['judul'] = $data['baca']."- Central Wedding Store";
		$data['slide_atas'] = $this->m_help_page->tampil_slide_produk(10);
		$data['slide_laris'] = $this->m_help_page->tampil_slide_produk_terlaris_kiri(5);
		$data['slide_baru'] = $this->m_help_page->tampil_produk(5);
		$data['slide_rekomendasi'] = $this->m_help_page->tampil_slide_produk(6);
		$data['slide_produk_sejenis'] = $this->m_help_page->tampil_produk_sejenis($kd_kategori,$p_kode[0],6);
		$data['intermezzo'] = $this->m_help_page->tampil_semua_berita(5,0);
		$data['banner'] = $this->m_help_page->tampil_banner();
		
		$session=isset($_SESSION['username_grosir_sandal']) ? $_SESSION['username_grosir_sandal']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["nama"]=$pecah[1];
		}
		
		$this->m_help_page->update_counter_berita($p_kode[0]);
		$data['intermezzo_acak'] = $this->m_help_page->tampil_berita_lain(5);
		$data['testimonial'] = $this->m_help_page->tampil_testimonial(10,0);
		$this->load->view('header1');
		$this->load->view('bg_left',$data);
		$this->load->view('promo_baca');
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
