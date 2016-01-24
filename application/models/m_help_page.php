<?php
Class m_help_page extends CI_Model
{
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}
	
	function menu_kategori($kd_level,$kd_parent)
	{
		$q = $this->db->query("SELECT * from tbl_kategori where kode_level=".$kd_level." and kode_parent=".$kd_parent."");
		return $q;
	}

	function ambil_id($kd_parent)
	{
		$q = $this->db->query("SELECT * from tbl_kategori where kode_parent=".$kd_parent."");
		return $q;
	}
	
	function tampil_slide_produk($limit)
	{
		$q = $this->db->query("SELECT * from tbl_produk left join tbl_kategori on tbl_produk.id_kategori=tbl_kategori.id_kategori 
		order by RAND() LIMIT $limit");
		return $q;
	}
	
	function tampil_slide_produk_terlaris_kiri($limit)
	{
		$q = $this->db->query("SELECT * from tbl_produk left join tbl_kategori on tbl_produk.id_kategori=tbl_kategori.id_kategori 
		order by dibeli DESC LIMIT $limit");
		return $q;
	}
	
	function tampil_produk($limit)
	{
		$q = $this->db->query("SELECT * from tbl_produk left join tbl_kategori on tbl_produk.id_kategori=tbl_kategori.id_kategori 
		order by kode_produk DESC LIMIT $limit");
		return $q;
	}
	
	function tampil_banner()
	{
		$q = $this->db->query("SELECT * from tbl_banner where stts='1' order by kode_banner DESC");
		return $q;
	}
	
	function tampil_semua_produk($limit,$offset)
	{
		$q = $this->db->query("SELECT * from tbl_produk left join tbl_kategori on tbl_produk.id_kategori=tbl_kategori.id_kategori order by 
		kode_produk DESC LIMIT $offset,$limit");
		return $q;
	}
	
	function tampil_detail_produk($kode)
	{
		$q = $this->db->query("SELECT * from tbl_produk left join tbl_kategori on tbl_produk.id_kategori=tbl_kategori.id_kategori where
		kode_produk='$kode'");
		return $q;
	}
	
	function tampil_produk_sejenis($kategori,$kode,$limit)
	{
		$q = $this->db->query("SELECT * from tbl_produk left join tbl_kategori on tbl_produk.id_kategori=tbl_kategori.id_kategori where
		kode_produk not in('$kode') and tbl_produk.id_kategori='$kategori' order by RAND() LIMIT $limit");
		return $q;
	}
	
	function tampil_produk_per_kategori($kategori,$offset,$limit)
	{
		$q = $this->db->query("SELECT * from tbl_produk left join tbl_kategori on tbl_produk.id_kategori=tbl_kategori.id_kategori where
		tbl_produk.id_kategori in ($kategori) order by tbl_produk.id_kategori DESC LIMIT $offset,$limit");
		return $q;
	}
	
	
	function tampil_produk_per_harga($seleksi,$offset,$limit)
	{
		$q = $this->db->query("SELECT * from tbl_produk left join tbl_kategori on tbl_produk.id_kategori=tbl_kategori.id_kategori $seleksi order by tbl_produk.id_kategori DESC LIMIT $offset,$limit");
		return $q;
	}
	
	function hitung_isi_1tabel($tabel,$seleksi)
	{
		$q = $this->db->query("SELECT * from $tabel $seleksi");
		return $q;
	}
	
	function tampil_semua_berita($limit,$offset)
	{
		$q = $this->db->query("SELECT * from tbl_intermezzo order by id_berita DESC LIMIT $offset,$limit");
		return $q;
	}
	
	function tampil_semua_promo($limit,$offset)
	{
		$q = $this->db->query("SELECT * from tbl_promo order by id_berita DESC LIMIT $offset,$limit");
		return $q;
	}

	function tampil_detail_berita($id)
	{
		$q = $this->db->query("SELECT * from tbl_intermezzo where id_berita='$id'");
		return $q;
	}
	
	function update_counter_berita($id)
	{
		$q = $this->db->query("update tbl_intermezzo set dibaca=dibaca+1 where id_berita='$id'");
		return $q;
	}
	function tampil_berita_lain($limit)
	{
		$q = $this->db->query("SELECT * from tbl_intermezzo order by RAND() LIMIT $limit");
		return $q;
	}
	function tampil_testimonial($limit,$offset)
	{
		$q = $this->db->query("SELECT * from tbl_testimonial where status='1' order by id_testi DESC LIMIT $offset,$limit");
		return $q;
	}
	function simpan_testimonial($datainput)
	{
		$this->db->insert('tbl_testimonial',$datainput);
	}

	function simpan_contact($datainput)
	{
		$this->db->insert('tbl_contact',$datainput);
	}
	
	function pencarian($batas,$url,$kata)
	{
	$this->db->select('*');
	$this->db->from('tbl_produk');
	if(!empty($kata)) {
		$this->db->like('nama_produk',$kata);
	}
	   $this->db->order_by('kode_produk','DESC');
	   $getData = $this->db->get('', $batas, $url);

	   if($getData->num_rows() > 0)
		return $getData->result_array();
	   else
		return null;
	  }
	
	function tampil_katalog($limit,$offset)
	{
		$q = $this->db->query("SELECT * from tbl_katalog order by id_katalog DESC LIMIT $offset,$limit");
		return $q;
	}
	
	function tampil_detail_katalog($kode)
	{
		$q = $this->db->query("SELECT * from tbl_katalog where id_katalog='$kode'");
		return $q;
	}
	function data_login_member($user,$pass)
	{
		$user_bersih=mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($user,ENT_QUOTES))));
		$pass_bersih=mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($pass,ENT_QUOTES))));
		$query=$this->db->query("select * from tbl_user where username_user='$user_bersih' and pass_user=md5('$pass_bersih') and stts=1");
		return $query;
	}
	function cek_username($user,$email)
	{
		$query=$this->db->query("select * from tbl_user where username_user='$user' or email='$email'");
		return $query;
	}
	function cek_email($email)
	{
		$query=$this->db->query("select * from tbl_user where email='$email'");
		return $query;
	}
	function register_member($datainput)
	{
		$this->db->insert('tbl_user',$datainput);
	}
	function aktivasi_member($kode)
	{
		$query=$this->db->query("select * from tbl_user where kode_aktivasi='$kode'");
		return $query;
	}
	function update_aktivasi($kode)
	{
		$query=$this->db->query("update tbl_user set stts='1', kode_aktivasi='' where kode_user='$kode'");
	}
	function pilih_member($kode)
	{
		$query=$this->db->query("select * from tbl_user where kode_user='$kode'");
		return $query;
	}
	function update_profil_member($upd)
	{
		$query=$this->db->query($upd);
	}
	
	function tampil_detail_testimonial($kode)
	{
		$q = $this->db->query("SELECT * from tbl_testimonial where id_testi='$kode'");
		return $q;
	}
	function pilih_email($email)
	{
		$query=$this->db->query("select * from tbl_user where email='$email'");
		return $query;
	}
	function kirim_invoice_header($qr)
	{
		$query=$this->db->query($qr);
	}
	function cek_kode($tgl)
	{
		$query=$this->db->query("SELECT MAX(kode_transaksi) as kd FROM tbl_transaksi_header WHERE kode_transaksi like '%$tgl%'");
		return $query;
	}
	function simpan_pesanan($datainput)
	{
		$q = $this->db->query($datainput);
	}
	function update_dibeli($kd,$bl)
	{
		$query=$this->db->query("update tbl_produk set dibeli=dibeli+$bl where kode_produk='$kd'");
	}
	function lihat_histori($kd,$bl)
	{
		$query=$this->db->query("update tbl_produk set dibeli=dibeli+$bl where kode_produk='$kd'");
	}
	function tampil_semua_history($kd,$limit,$offset)
	{
		$query=$this->db->query("SELECT substring(a.kode_transaksi,1,8) as tgl, count(kode_produk) as jm, a.kode_transaksi FROM `tbl_transaksi_header` as a left join tbl_transaksi_detail as b on a.kode_transaksi=b.kode_transaksi where kode_user='$kd' group by tgl LIMIT $offset,$limit");
		return $query;
	}
	function tampil_det_history($kd_usr,$kd,$limit,$offset)
	{
		$query=$this->db->query("SELECT * FROM `tbl_transaksi_header` as a left join tbl_transaksi_detail as b on a.kode_transaksi=b.kode_transaksi where kode_user='$kd_usr' and b.kode_transaksi like '%$kd%' order by b.kode_transaksi ASC LIMIT $offset,$limit");
		return $query;
	}
	
 
}
 
?>
