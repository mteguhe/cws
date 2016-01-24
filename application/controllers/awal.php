<?php

class awal extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_awal');
	}

	public function index(){
		$this->load->view('headerindex');
		$this->load->view('index');
		$this->load->view('footer');
	}

	public function about(){
		$this->load->view('header1');
		$this->load->view('about');
		$this->load->view('footer');
	}
	
	public function collection(){
		$data['menu'] = $this->m_help_page->menu_kategori('0','0');
		$data['judul'] = "Keranjang Belanja - Grosir Sandal Online, Toko Sandal Online Termurah dan Terlengkap di Indonesia - Harmonis Grosir Sandal";
		$data['slide_atas'] = $this->m_help_page->tampil_slide_produk(10);
		$data['slide_laris'] = $this->m_help_page->tampil_slide_produk_terlaris_kiri(5);
		$data['slide_baru'] = $this->m_help_page->tampil_produk(5);
		$data['slide_rekomendasi'] = $this->m_help_page->tampil_slide_produk(6);
		$data['intermezzo'] = $this->m_help_page->tampil_semua_berita(5,0);
		$data['testimonial'] = $this->m_help_page->tampil_testimonial(10,0);
		$data['banner'] = $this->m_help_page->tampil_banner();
		
		$session=isset($_SESSION['username_grosir_sandal']) ? $_SESSION['username_grosir_sandal']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["nama"]=$pecah[1];
		}
		
		$page=$this->uri->segment(3);
      	$limit=12;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
		
		$data['produk'] = $this->m_help_page->tampil_semua_produk($limit,$offset);
		$tot_hal = $this->m_help_page->hitung_isi_1tabel('tbl_produk','');
		
		$config['base_url'] = base_url() . 'awal/collection/';
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
		$this->load->view('collection');
		$this->load->view('footer');
		
	}
	
	function detail()
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
		$data['detail_produk'] = $this->m_help_page->tampil_detail_produk($p_kode[0]);
		$judul = "";
		$kd_kategori = "";
		foreach($data['detail_produk']->result() as $dp)
		{
			$judul = $dp->nama_produk.' - Kategori '.$dp->nama_kategori;
			$kd_kategori = $dp->id_kategori;
			$data['nama_kategori'] = $dp->nama_kategori;
			$data['nama_produk'] = $dp->nama_produk;
			$link_mentah = str_replace(' ','-',$data['nama_kategori']);
			$data['link'] = strtolower($kd_kategori.'-'.$link_mentah);
		}
		$data['menu'] = $this->m_help_page->menu_kategori('0','0');
		$data['judul'] = $judul."- Grosir Sandal Online, Toko Sandal Online Termurah dan Terlengkap di Indonesia - Harmonis Grosir Sandal";
		$data['slide_atas'] = $this->m_help_page->tampil_slide_produk(10);
		$data['slide_laris'] = $this->m_help_page->tampil_slide_produk_terlaris_kiri(5);
		$data['slide_baru'] = $this->m_help_page->tampil_produk(5);
		$data['slide_rekomendasi'] = $this->m_help_page->tampil_slide_produk(6);
		$data['slide_produk_sejenis'] = $this->m_help_page->tampil_produk_sejenis($kd_kategori,$p_kode[0],6);
		$data['intermezzo'] = $this->m_help_page->tampil_semua_berita(5,0);
		$data['testimonial'] = $this->m_help_page->tampil_testimonial(10,0);
		$data['banner'] = $this->m_help_page->tampil_banner();
		
		$session=isset($_SESSION['username_grosir_sandal']) ? $_SESSION['username_grosir_sandal']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["nama"]=$pecah[1];
		}
		$this->load->view('header1');
		$this->load->view('bg_left',$data);
		$this->load->view('detail_produk');
		$this->load->view('footer');
		
	}
	
	public function testimonial(){
		$data['menu'] = $this->m_help_page->menu_kategori('0','0');
		$data['judul'] = "Testimonial Pelanggan - Grosir Sandal Online, Toko Sandal Online Termurah dan Terlengkap di Indonesia - Harmonis Grosir Sandal";
		$data['slide_atas'] = $this->m_help_page->tampil_slide_produk(10);
		$data['slide_laris'] = $this->m_help_page->tampil_slide_produk_terlaris_kiri(5);
		$data['slide_baru'] = $this->m_help_page->tampil_produk(5);
		$data['slide_rekomendasi'] = $this->m_help_page->tampil_slide_produk(6);
		$data['intermezzo'] = $this->m_help_page->tampil_semua_berita(5,0);
		$data['testimonial'] = $this->m_help_page->tampil_testimonial(10,0);
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
		
		$data['testi'] = $this->m_help_page->tampil_testimonial($limit,$offset);
		$tot_hal = $this->m_help_page->hitung_isi_1tabel('tbl_testimonial','');
		
		$config['base_url'] = base_url() . 'testimonial/cari/';
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
		$this->load->view('testimonial');
		$this->load->view('footer');
	}
	
	public function how_to_buy(){
		$this->load->view('header1');
		$this->load->view('how_to_buy');
		$this->load->view('footer');
	}
	
	public function article(){
		$this->load->view('article');
	}
	
	public function faq(){
		$this->load->view('faq');
	}
	
	public function contact(){
		$this->load->view('header1');
		$this->load->view('contact');
		$this->load->view('footer');
	}
	
	

	public function AdMIn(){
		redirect(base_url("login"));
	}
}

?>