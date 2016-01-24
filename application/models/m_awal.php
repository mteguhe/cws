<?php
class m_awal extends CI_Model{
	function show_table($id){
		$query = $this->db->query("select * from ".$id."");
		return $query->result();
	}
	
	function insert($id, $data = array()){
		$this->db->insert($id, $data);
	}
	
	function add_image($data){
		$this->db->insert('collection',$data);
	}
	
	//Buat select masih bingung gue za klo cuma di buat satu function aja hehe
	function select($id, $a, $b){
		$sql = $this->db->query("select * from ".$a." where ".$b." = ".$id."");
		return $sql->row();
	}
	
	function update($id, $a, $b){
		$this->db->where($b, $id)->update($a, $_POST);
	}
	
	function delete($id, $a, $b){
		$this->db->delete($a,array($b=>$id));
	}
	
	function tampil_semua_kategori()
	{
		$q = $this->db->query("SELECT * from tbl_kategori");
		return $q;
	}
	function jalankan_query_manual_select($datainput)
	{
		$q = $this->db->query($datainput);
		return $q;
	}
	
	function tampil_produk($limit)
	{
		$q = $this->db->query("SELECT * from tbl_produk left join tbl_kategori on tbl_produk.id_kategori=tbl_kategori.id_kategori 
		order by kode_produk DESC LIMIT $limit");
		return $q;
	}
	
	function tampil_semua_produk($limit,$offset)
	{
		$q = $this->db->query("SELECT * from tbl_produk left join tbl_kategori on tbl_produk.id_kategori=tbl_kategori.id_kategori order by 
		kode_produk DESC LIMIT $offset,$limit");
		return $q;
	}
	function hitung_isi_1tabel($tabel,$seleksi)
	{
		$q = $this->db->query("SELECT * from $tabel $seleksi");
		return $q;
	}
	
	function jalankan_query_manual($datainput)
	{
		$q = $this->db->query($datainput);
	}
	
	function tampil_detail_produk($kode)
	{
		$q = $this->db->query("SELECT * from tbl_produk left join tbl_kategori on tbl_produk.id_kategori=tbl_kategori.id_kategori where
		kode_produk='$kode'");
		return $q;
	}
	
	function hapus_konten($id,$seleksi,$tabel)
	{
		$this->db->where($seleksi,$id);
		$this->db->delete($tabel);
	}
	
	function tampil_slide_produk($limit)
	{
		$q = $this->db->query("SELECT * from tbl_produk left join tbl_kategori on tbl_produk.id_kategori=tbl_kategori.id_kategori 
		order by RAND() LIMIT $limit");
		return $q;
	}
	
	function tampil_semua_produk_luar($limit,$offset)
	{
		$q = $this->db->query("SELECT * from tbl_produk left join tbl_kategori on tbl_produk.id_kategori=tbl_kategori.id_kategori order by 
		kode_produk DESC LIMIT $offset,$limit");
		return $q;
	}
	function tampil_produk_luar($limit)
	{
		$q = $this->db->query("SELECT * from tbl_produk left join tbl_kategori on tbl_produk.id_kategori=tbl_kategori.id_kategori 
		order by kode_produk DESC LIMIT $limit");
		return $q;
	}
	function tampil_slide_produk_luar($limit)
	{
		$q = $this->db->query("SELECT * from tbl_produk left join tbl_kategori on tbl_produk.id_kategori=tbl_kategori.id_kategori 
		order by RAND() LIMIT $limit");
		return $q;
	}
	
	function hitung_isi_1tabel_luar($tabel,$seleksi)
	{
		$q = $this->db->query("SELECT * from $tabel $seleksi");
		return $q;
	}
	
	function menu_kategori($kd_level,$kd_parent)
	{
		$q = $this->db->query("SELECT * from tbl_kategori where kode_level=".$kd_level." and kode_parent=".$kd_parent."");
		return $q;
	}
	
	function tampil_banner()
	{
		$q = $this->db->query("SELECT * from tbl_banner where stts='1' order by kode_banner DESC");
		return $q;
	}
	
	function tampil_slide_produk_terlaris_kiri($limit)
	{
		$q = $this->db->query("SELECT * from tbl_produk left join tbl_kategori on tbl_produk.id_kategori=tbl_kategori.id_kategori 
		order by dibeli DESC LIMIT $limit");
		return $q;
	}
	
	function tampil_semua_berita($limit,$offset)
	{
		$q = $this->db->query("SELECT * from tbl_intermezzo order by id_berita DESC LIMIT $offset,$limit");
		return $q;
	}
	
	function tampil_testimonial($limit,$offset)
	{
		$q = $this->db->query("SELECT * from tbl_testimonial where status='1' order by id_testi DESC LIMIT $offset,$limit");
		return $q;
	}

	function ambil_id($kd_parent)
	{
		$q = $this->db->query("SELECT * from tbl_kategori where kode_parent=".$kd_parent."");
		return $q;
	}

	function tampil_testimonial_admin($limit,$offset)
	{
		$q = $this->db->query("SELECT * from tbl_testimonial order by id_testi,status DESC LIMIT $offset,$limit");
		return $q;
	}

	function tampil_contact_admin($limit,$offset)
	{
		$q = $this->db->query("SELECT * from tbl_contact  ORDER BY id_testi DESC, status ASC LIMIT $offset,$limit");
		return $q;
	}

	function tampil_semua_trend($limit,$offset)
	{
		$q = $this->db->query("SELECT * from tbl_intermezzo order by id_berita DESC LIMIT $offset,$limit");
		return $q;
	}
	
	function tampil_semua_promo($limit,$offset)
	{
		$q = $this->db->query("SELECT * from tbl_promo order by id_berita DESC LIMIT $offset,$limit");
		return $q;
	}


}
?>