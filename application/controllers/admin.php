<?php

class admin extends CI_Controller {
	
	
	function __construct(){
		parent::__construct();
		$this->load->model('m_awal');
		$this->load->helper(array('form', 'url','captcha','date','text_helper'));
	}

	public function index(){
		if($this->session->userdata('masuk')){	
				
				$data["judul"] = "Semua Produk - Suang Gown";
				
				$this->load->view('admin/header_admin');
				$this->load->view('admin/dashbord',$data);
				$this->load->view('admin/footer_admin');
		
		} else {
			if($_POST) {
				echo $this->m_login->ceklogin();
				redirect(base_url('login'));
			} else {
				$this->load->view('verifikasi');
			}
		}
	}

	public function produk(){
		if($this->session->userdata('masuk')){	
				$page=$this->uri->segment(3);
				$limit=15;
				if(!$page):
				$offset = 0;
				else:
				$offset = $page;
				endif;	
				
				$data["judul"] = "Semua Produk - Suang Gown";
				$data["tampil"] = $this->m_awal->tampil_semua_produk($limit,$offset);
				$tot_hal = $this->m_awal->hitung_isi_1tabel('tbl_produk','');
				
				$config['base_url'] = base_url() . 'admin/index/';
					$config['total_rows'] = $tot_hal->num_rows();
					$config['per_page'] = $limit;
					$config['uri_segment'] = 3;
					$config['first_link'] = 'Awal';
					$config['last_link'] = 'Akhir';
					$config['next_link'] = 'Selanjutnya';
					$config['prev_link'] = 'Sebelumnya';
					$this->pagination->initialize($config);
				$data["paginator"] =$this->pagination->create_links();
				
				$this->load->view('admin/header_admin');
				$this->load->view('admin/lihat_produk',$data);
				$this->load->view('admin/footer_admin');
		
		} else {
			if($_POST) {
				echo $this->m_login->ceklogin();
				redirect(base_url('login'));
			} else {
				$this->load->view('verifikasi');
			}
		}
	}
		
	
	public function tambah_produk(){
		if($this->session->userdata('masuk')){	
				$data["digit_akhir"] = "";
				$data['scriptmce'] = $this->scripttiny_mce();
				$data["kat"] = $this->m_awal->tampil_semua_kategori();
				$q = $this->m_awal->jalankan_query_manual_select("select MAX(substring(kode_produk,4,6)) as akhir from tbl_produk");
				foreach($q->result() as $a)
				{
					if($a->akhir==NULL){
						$data["digit_akhir"] = "100001";
					}
					else{
						$data["digit_akhir"] = $a->akhir+1;
					}
				}
				$data["judul"] = "Tambah Produk - CWS";
				
				$this->load->view('admin/header_admin');
				$this->load->view('admin/tambah',$data);
				$this->load->view('admin/footer_admin');
		} else {
			if($_POST) {
				echo $this->m_login->ceklogin();
				redirect(base_url('login'));
			} else {
				$this->load->view('verifikasi');
			}
		}
	}
	
	function produk_baru(){
		if($this->session->userdata('masuk')){

			$kategori = mysql_real_escape_string($this->input->post('kategori'));
			$nama = mysql_real_escape_string($this->input->post('nama'));
			$harga = mysql_real_escape_string($this->input->post('harga'));
			$stok = mysql_real_escape_string($this->input->post('stok'));
			$dibeli = mysql_real_escape_string($this->input->post('dibeli'));
			$deskripsi = mysql_real_escape_string($this->input->post('deskripsi'));
			$tipe = mysql_real_escape_string($this->input->post('tipe'));
			$kd_maks = $this->input->post('digit');
			$kode = 'CWS'.$kd_maks;
				
			if ($_FILES['imagefile']['type'] == "image/jpeg"){
				$ori_src="asset/produk/imgoriginal/".strtolower( str_replace(' ','_',$_FILES['imagefile']['name']) );
				if(move_uploaded_file ($_FILES['imagefile']['tmp_name'],$ori_src))
				{
					chmod("$ori_src",0777);
				}else{
					echo "Gagal melakukan proses upload file.";
					exit;
				}
					$thumb_src="asset/produk/".strtolower( str_replace(' ','_',$_FILES['imagefile']['name']) );
					
				$n_width = 150;
				$n_height = 150;
			
				if(($_FILES['imagefile']['type']=="image/jpeg") || ($_FILES['imagefile']['type']=="image/png") ||($_FILES['imagefile']['type']=="image/gif"))
				{
					$im = @ImageCreateFromJPEG ($ori_src) or // Read JPEG Image
					$im = @ImageCreateFromPNG ($ori_src) or // or PNG Image
					$im = @ImageCreateFromGIF ($ori_src) or // or GIF Image
					$im = false; // If image is not JPEG, PNG, or GIF
					
						//$im=ImageCreateFromJPEG($ori_src); 
					$width=ImageSx($im);              // Original picture width is stored
					$height=ImageSy($im);             // Original picture height is stored
					if(($n_height==0) && ($n_width==0)) {
						$n_height = $height;
						$n_width = $width;
					}	
		
					if(!$im) {
						echo '<p>Gagal membuat thumnail</p>';
						exit;
					}
					else {				
						$newimage=@imagecreatetruecolor($n_width,$n_height);                 
						@imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
						@ImageJpeg($newimage,$thumb_src);
						chmod("$thumb_src",0777);
					}
				}

				//foto kedua
				
				if ($_FILES['imagefile2']['type'] == "image/jpeg"){
				$ori_src="asset/produk/imgoriginal/".strtolower( str_replace(' ','_',$_FILES['imagefile2']['name']) );
				if(move_uploaded_file ($_FILES['imagefile2']['tmp_name'],$ori_src))
				{
					chmod("$ori_src",0777);
				}else{
					echo "Gagal melakukan proses upload file.";
					exit;
				}
					$thumb_src="asset/produk/".strtolower( str_replace(' ','_',$_FILES['imagefile2']['name']) );
					
				$n_width = 150;
				$n_height = 150;
			
				if(($_FILES['imagefile2']['type']=="image/jpeg") || ($_FILES['imagefile2']['type']=="image/png") ||($_FILES['imagefile2']['type']=="image/gif"))
				{
					$im = @ImageCreateFromJPEG ($ori_src) or // Read JPEG Image
					$im = @ImageCreateFromPNG ($ori_src) or // or PNG Image
					$im = @ImageCreateFromGIF ($ori_src) or // or GIF Image
					$im = false; // If image is not JPEG, PNG, or GIF
					
						//$im=ImageCreateFromJPEG($ori_src); 
					$width=ImageSx($im);              // Original picture width is stored
					$height=ImageSy($im);             // Original picture height is stored
					if(($n_height==0) && ($n_width==0)) {
						$n_height = $height;
						$n_width = $width;
					}	
		
					if(!$im) {
						echo '<p>Gagal membuat thumnail</p>';
						exit;
					}
					else {				
						$newimage=@imagecreatetruecolor($n_width,$n_height);                 
						@imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
						@ImageJpeg($newimage,$thumb_src);
						chmod("$thumb_src",0777);
					}
				}
				}

				$this->m_awal->jalankan_query_manual("insert into tbl_produk 
				(kode_produk,id_kategori,nama_produk,harga,stok,dibeli,gbr_kecil,gbr_besar,deskripsi,tipe_produk,gbr_kecil2,gbr_besar2) 
				values('".$kode."','".$kategori."','".$nama."','".$harga."','".$stok."','".$dibeli."','".$_FILES['imagefile']['name']."'
				,'".$_FILES['imagefile']['name']."','".$deskripsi."','".$tipe."','".$_FILES['imagefile2']['name']."'
				,'".$_FILES['imagefile2']['name']."')");
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin'>";
			}
			else
			{
				echo "Hayooo,,,mau upload file apaan tuh...??? Upload yang berjenis gambar aja mas brow, gak usah macam-macam...!!! OKOK";
			}

		} else {
			if($_POST) {
				echo $this->m_login->ceklogin();
				redirect(base_url('login'));
			} else {
				$this->load->view('verifikasi');
			}
		}
	}
	
	
	function edit_produk()	{
		if($this->session->userdata('masuk')){	
			
			$kode='';		
			if ($this->uri->segment(3) === FALSE)
			{
	    			$kode='';
			}
			else
			{
	    			$kode = $this->uri->segment(3);
			}
			
		   			
					$data["ls"] = $this->m_awal->tampil_detail_produk($kode);
					$data["kat"] = $this->m_awal->tampil_semua_kategori();
					$data["judul"] = "Edit Produk - Suang Gown";
					
					$this->load->view('admin/header_admin');
					$this->load->view('admin/edit_produk',$data);
					$this->load->view('admin/footer_admin');
			
		} else {
			if($_POST) {
				echo $this->m_login->ceklogin();
				redirect(base_url('login'));
			} else {
				$this->load->view('verifikasi');
			}
		}				
	}
		
	
	
	function update_produk(){
		if($this->session->userdata('masuk')){	
		
				$kategori = mysql_real_escape_string($this->input->post('kategori'));
				$nama = mysql_real_escape_string($this->input->post('nama'));
				$harga = mysql_real_escape_string($this->input->post('harga'));
				$stok = mysql_real_escape_string($this->input->post('stok'));
				$dibeli = mysql_real_escape_string($this->input->post('dibeli'));
				$deskripsi = mysql_real_escape_string($this->input->post('deskripsi'));
				$tipe = mysql_real_escape_string($this->input->post('tipe'));
				$kode = $this->input->post('id');
				$gbr = $this->input->post('gbr');
				$gbr2 = $this->input->post('gbr2');
				
				if(empty($_FILES['imagefile']['name']))
				{

				//gambar 2 edit mulai
				if(empty($_FILES['imagefile2']['name']))
				{
					$this->m_awal->jalankan_query_manual("update tbl_produk set id_kategori='".$kategori."', nama_produk='".$nama."', harga='".$harga."', 
					stok='".$stok."', dibeli='".$dibeli."', deskripsi='".$deskripsi."', tipe_produk='".$tipe."' where kode_produk='".$kode."'");;
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin'>";
				}
				else
				{
					if ($_FILES['imagefile2']['type'] == "image/jpeg"){
						$ori_src="asset/produk/imgoriginal/".strtolower( str_replace(' ','_',$_FILES['imagefile2']['name']) );
						if(move_uploaded_file ($_FILES['imagefile2']['tmp_name'],$ori_src))
						{
							chmod("$ori_src",0777);
						}else{
							echo "Gagal melakukan proses upload file.";
							exit;
						}
	
						$thumb_src="asset/produk/".strtolower( str_replace(' ','_',$_FILES['imagefile2']['name']) );
						
						$n_width = 150;
						$n_height = 150;
					
						if(($_FILES['imagefile2']['type']=="image/jpeg") || ($_FILES['imagefile2']['type']=="image/png") ||($_FILES['imagefile2']['type']=="image/gif"))
						{
							$im = @ImageCreateFromJPEG ($ori_src) or // Read JPEG Image
							$im = @ImageCreateFromPNG ($ori_src) or // or PNG Image
							$im = @ImageCreateFromGIF ($ori_src) or // or GIF Image
							$im = false; // If image is not JPEG, PNG, or GIF
							
							//$im=ImageCreateFromJPEG($ori_src); 
							$width=ImageSx($im);              // Original picture width is stored
							$height=ImageSy($im);             // Original picture height is stored
							if(($n_height==0) && ($n_width==0)) {
								$n_height = $height;
								$n_width = $width;
							}	
			
							if(!$im) {
								echo '<p>Gagal membuat thumnail</p>';
								exit;
							}
							else {				
								$newimage=@imagecreatetruecolor($n_width,$n_height);                 
								@imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
								@ImageJpeg($newimage,$thumb_src);
								chmod("$thumb_src",0777);
							}
						}
						$this->m_awal->jalankan_query_manual("update tbl_produk set id_kategori='".$kategori."', nama_produk='".$nama."', harga='".$harga."', 
						stok='".$stok."', dibeli='".$dibeli."', gbr_kecil2='".$_FILES['imagefile2']['name']."', gbr_besar2='".$_FILES['imagefile2']['name']."', 
						deskripsi='".$deskripsi."', tipe_produk='".$tipe."' where kode_produk='".$kode."'");
						$file_kcl = './asset/produk/'.$gbr2;
						$file_bsr = './asset/produk/imgoriginal/'.$gbr2;
						unlink($file_kcl);
						unlink($file_bsr);
						echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin'>";
						}
						else
						{
							echo "Hayooo,,,mau upload file apaan tuh...??? Upload yang berjenis gambar aja mas brow, gak usah macam-macam...!!! OKOK";
						}	
							//gambar 2 edit selssai
					}
				}
				else
				{

					if(empty($_FILES['imagefile2']['name']))
					{
					

					if ($_FILES['imagefile']['type'] == "image/jpeg"){
						$ori_src="asset/produk/imgoriginal/".strtolower( str_replace(' ','_',$_FILES['imagefile']['name']) );
						if(move_uploaded_file ($_FILES['imagefile']['tmp_name'],$ori_src))
						{
							chmod("$ori_src",0777);
						}else{
							echo "Gagal melakukan proses upload file.";
							exit;
						}
	
						$thumb_src="asset/produk/".strtolower( str_replace(' ','_',$_FILES['imagefile']['name']) );
						
						$n_width = 150;
						$n_height = 150;
					
						if(($_FILES['imagefile']['type']=="image/jpeg") || ($_FILES['imagefile']['type']=="image/png") ||($_FILES['imagefile']['type']=="image/gif"))
						{
							$im = @ImageCreateFromJPEG ($ori_src) or // Read JPEG Image
							$im = @ImageCreateFromPNG ($ori_src) or // or PNG Image
							$im = @ImageCreateFromGIF ($ori_src) or // or GIF Image
							$im = false; // If image is not JPEG, PNG, or GIF
							
							//$im=ImageCreateFromJPEG($ori_src); 
							$width=ImageSx($im);              // Original picture width is stored
							$height=ImageSy($im);             // Original picture height is stored
							if(($n_height==0) && ($n_width==0)) {
								$n_height = $height;
								$n_width = $width;
							}	
			
							if(!$im) {
								echo '<p>Gagal membuat thumnail</p>';
								exit;
							}
							else {				
								$newimage=@imagecreatetruecolor($n_width,$n_height);                 
								@imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
								@ImageJpeg($newimage,$thumb_src);
								chmod("$thumb_src",0777);
							}
						}



						$this->m_awal->jalankan_query_manual("update tbl_produk set id_kategori='".$kategori."', nama_produk='".$nama."', harga='".$harga."', 
						stok='".$stok."', dibeli='".$dibeli."', gbr_kecil='".$_FILES['imagefile']['name']."', gbr_besar='".$_FILES['imagefile']['name']."', 
						deskripsi='".$deskripsi."', tipe_produk='".$tipe."' where kode_produk='".$kode."'");
						$file_kcl = './asset/produk/'.$gbr;
						$file_bsr = './asset/produk/imgoriginal/'.$gbr;
						unlink($file_kcl);
						unlink($file_bsr);
						echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin'>";
					}
					else
					{
						echo "Hayooo,,,mau upload file apaan tuh...??? Upload yang berjenis gambar aja mas brow, gak usah macam-macam...!!! OKOK";
					}
				
				}

				// 2 gambar upload

				else
				{
					if ($_FILES['imagefile2']['type'] == "image/jpeg"){
						$ori_src="asset/produk/imgoriginal/".strtolower( str_replace(' ','_',$_FILES['imagefile2']['name']) );
						if(move_uploaded_file ($_FILES['imagefile2']['tmp_name'],$ori_src))
						{
							chmod("$ori_src",0777);
						}else{
							echo "Gagal melakukan proses upload file.";
							exit;
						}
	
						$thumb_src="asset/produk/".strtolower( str_replace(' ','_',$_FILES['imagefile2']['name']) );
						
						$n_width = 150;
						$n_height = 150;
					
						if(($_FILES['imagefile2']['type']=="image/jpeg") || ($_FILES['imagefile2']['type']=="image/png") ||($_FILES['imagefile2']['type']=="image/gif"))
						{
							$im = @ImageCreateFromJPEG ($ori_src) or // Read JPEG Image
							$im = @ImageCreateFromPNG ($ori_src) or // or PNG Image
							$im = @ImageCreateFromGIF ($ori_src) or // or GIF Image
							$im = false; // If image is not JPEG, PNG, or GIF
							
							//$im=ImageCreateFromJPEG($ori_src); 
							$width=ImageSx($im);              // Original picture width is stored
							$height=ImageSy($im);             // Original picture height is stored
							if(($n_height==0) && ($n_width==0)) {
								$n_height = $height;
								$n_width = $width;
							}	
			
							if(!$im) {
								echo '<p>Gagal membuat thumnail</p>';
								exit;
							}
							else {				
								$newimage=@imagecreatetruecolor($n_width,$n_height);                 
								@imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
								@ImageJpeg($newimage,$thumb_src);
								chmod("$thumb_src",0777);
							}
						}
						$this->m_awal->jalankan_query_manual("update tbl_produk set id_kategori='".$kategori."', nama_produk='".$nama."', harga='".$harga."', 
						stok='".$stok."', dibeli='".$dibeli."', 
						gbr_kecil2='".$_FILES['imagefile2']['name']."', gbr_besar2='".$_FILES['imagefile2']['name']."', 
						gbr_kecil='".$_FILES['imagefile']['name']."', gbr_besar='".$_FILES['imagefile']['name']."',
						deskripsi='".$deskripsi."', tipe_produk='".$tipe."' where kode_produk='".$kode."'");
						$file_kcl = './asset/produk/'.$gbr;
						$file_bsr = './asset/produk/imgoriginal/'.$gbr;
						unlink($file_kcl);
						unlink($file_bsr);
						$file_kcl2 = './asset/produk/'.$gbr2;
						$file_bsr2 = './asset/produk/imgoriginal/'.$gbr2;
						unlink($file_kcl2);
						unlink($file_bsr2);
						echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin'>";
						}
						else
						{
							echo "Hayooo,,,mau upload file apaan tuh...??? Upload yang berjenis gambar aja mas brow, gak usah macam-macam...!!! OKOK";
						}	
							//gambar 2 edit selssai
					}

			}

		} else {
			if($_POST) {
				echo $this->m_login->ceklogin();
				redirect(base_url('login'));
			} else {
				$this->load->view('verifikasi');
			}
		}
	}
	
	
	function hapus_produk()	{
		if($this->session->userdata('masuk')){	
			$kode='';		
			if ($this->uri->segment(3) === FALSE)
			{
	    			$kode='';
			}
			else
			{
	    			$kode = $this->uri->segment(3);
			}
			$gb='';		
			if ($this->uri->segment(4) === FALSE)
			{
	    			$gb='';
			}
			else
			{
	    			$gb = $this->uri->segment(4);
			}
			
					$file_kcl = './asset/produk/'.$gb;
					$file_bsr = './asset/produk/imgoriginal/'.$gb;
					unlink($file_kcl);
					unlink($file_bsr);
					$data["upd"] = $this->m_awal->hapus_konten($kode,"kode_produk","tbl_produk");
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin'>";
		} else {
			if($_POST) {
				echo $this->m_login->ceklogin();
				redirect(base_url('login'));
			} else {
				$this->load->view('verifikasi');
			}
		}
	}

	//Kategori

	function lihat_kategori_produk(){
		if($this->session->userdata('masuk')){	
		
				$data["judul"] = "Semua Kategori Produk - Harmonis Grosir Sandal Online";
				$data["kat_level"] = $this->m_awal->menu_kategori(0,0);
				
				$this->load->view('admin/header_admin');
				$this->load->view('admin/lihat_kategori_produk',$data);
				$this->load->view('admin/footer_admin');
		} else {
			if($_POST) {
				echo $this->m_login->ceklogin();
				redirect(base_url('login'));
			} else {
				$this->load->view('verifikasi');
			}
		}
	}

	function edit_kategori(){
		if($this->session->userdata('masuk')){	
			$kode='';		
			if ($this->uri->segment(3) === FALSE)
			{
	    			$kode='';
			}
			else
			{
	    			$kode = $this->uri->segment(3);
			}
			

		   			$data['scriptmce'] = $this->scripttiny_mce();
					$data["ls"] = $this->m_awal->jalankan_query_manual_select("select * from tbl_kategori where id_kategori='$kode'");
					$data["kat"] = $this->m_awal->jalankan_query_manual_select("select * from tbl_kategori where id_kategori!='$kode'");
					$data["judul"] = "Edit Produk - Harmonis Grosir Sandal Online";
					$this->load->view('admin/header_admin');
					$this->load->view('admin/edit_kategori_produk',$data);
					$this->load->view('admin/footer_admin');
		} else {
			if($_POST) {
				echo $this->m_login->ceklogin();
				redirect(base_url('login'));
			} else {
				$this->load->view('verifikasi');
			}
		}	
	}

	function update_kategori(){
		if($this->session->userdata('masuk')){	
		
				$id = $this->input->post('id');
				$nama = mysql_real_escape_string($this->input->post('nama'));
				$prnt = $this->input->post('prnt');
				$lvl = $this->input->post('lvl');
				$q = "update tbl_kategori set nama_kategori='".$nama."', kode_level='".$lvl."', kode_parent='".$prnt."' where id_kategori = 
				'".$id."'";
				$data["upd"] = $this->m_awal->jalankan_query_manual($q);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/lihat_kategori_produk'>";
		} else {
			if($_POST) {
				echo $this->m_login->ceklogin();
				redirect(base_url('login'));
			} else {
				$this->load->view('verifikasi');
			}
		}	
	}

	function hapus_kategori(){
		if($this->session->userdata('masuk')){	
			$kode='';		
			if ($this->uri->segment(3) === FALSE)
			{
	    			$kode='';
			}
			else
			{
	    			$kode = $this->uri->segment(3);
			}
			
					$data["upd"] = $this->m_awal->hapus_konten($kode,"id_kategori","tbl_kategori");
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/lihat_kategori_produk'>";
		} else {
			if($_POST) {
				echo $this->m_login->ceklogin();
				redirect(base_url('login'));
			} else {
				$this->load->view('verifikasi');
			}
		}	
	}


	function tambah_kategori_produk(){
		if($this->session->userdata('masuk')){	
			$kode='';		
			if ($this->uri->segment(3) === FALSE)
			{
	    			$kode='';
			}
			else
			{
	    			$kode = $this->uri->segment(3);
			}
			
		   			$data['scriptmce'] = $this->scripttiny_mce();
					$data["kat"] = $this->m_awal->tampil_semua_kategori();
					$data["judul"] = "Tambah Kategori Produk - Harmonis Grosir Sandal Online";
					$this->load->view('admin/header_admin');
					$this->load->view('admin/tambah_kategori_produk',$data);
					$this->load->view('admin/footer_admin');
		} else {
			if($_POST) {
				echo $this->m_login->ceklogin();
				redirect(base_url('login'));
			} else {
				$this->load->view('verifikasi');
			}
		}	
	}

	function tambah_kategori_verif(){
		if($this->session->userdata('masuk')){	
		
				$nama = mysql_real_escape_string($this->input->post('nama'));
				$kategori = $this->input->post('kategori');
				$tingkat = $this->input->post('tingkat');
				$q = "insert into tbl_kategori (nama_kategori,kode_level,kode_parent) values('".$nama."','".$tingkat."','".$kategori."')";
				$data["upd"] = $this->m_awal->jalankan_query_manual($q);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/lihat_kategori_produk'>";
		} else {
			if($_POST) {
				echo $this->m_login->ceklogin();
				redirect(base_url('login'));
			} else {
				$this->load->view('verifikasi');
			}
		}
	}


	//Testimonial




	function lihat_semua_testimonial(){
		if($this->session->userdata('masuk')){	
				
				
				$page=$this->uri->segment(3);
				$limit=15;
				if(!$page):
				$offset = 0;
				else:
				$offset = $page;
				endif;

				$data["judul"] = "Semua Testimonial - Harmonis Grosir Sandal Online";
				$data["ls"] = $this->m_awal->tampil_testimonial_admin($limit,$offset);
				$tot_hal = $this->m_help_page->hitung_isi_1tabel('tbl_testimonial','');
				
				$config['base_url'] = base_url() . 'admin/lihat_semua_testimonial/';
					$config['total_rows'] = $tot_hal->num_rows();
					$config['per_page'] = $limit;
					$config['uri_segment'] = 3;
					$config['first_link'] = 'Awal';
					$config['last_link'] = 'Akhir';
					$config['next_link'] = 'Selanjutnya';
					$config['prev_link'] = 'Sebelumnya';
					$this->pagination->initialize($config);
				$data["paginator"] =$this->pagination->create_links();
				
				$this->load->view('admin/header_admin');
				$this->load->view('admin/lihat_testimonial',$data);
				$this->load->view('admin/footer_admin');
		} else {
			if($_POST) {
				echo $this->m_login->ceklogin();
				redirect(base_url('login'));
			} else {
				$this->load->view('verifikasi');
			}
		}
	}

	function edit_testi(){
		if($this->session->userdata('masuk')){	
			$kode='';		
			if ($this->uri->segment(3) === FALSE)
			{
	    			$kode='';
			}
			else
			{
	    			$kode = $this->uri->segment(3);
			}
			
		   			$data['scriptmce'] = $this->scripttiny_mce();
					$data["kat"] = $this->m_awal->jalankan_query_manual_select("select * from tbl_testimonial where id_testi='$kode'");
					$data["judul"] = "Edit Testimonial - Harmonis Grosir Sandal Online";
					$this->load->view('admin/header_admin');
					$this->load->view('admin/edit_testi',$data);
					$this->load->view('admin/footer_admin');
		} else {
			if($_POST) {
				echo $this->m_login->ceklogin();
				redirect(base_url('login'));
			} else {
				$this->load->view('verifikasi');
			}
		}
	}

	function hapus_testi(){
		if($this->session->userdata('masuk')){	
			$kode='';		
			if ($this->uri->segment(3) === FALSE)
			{
	    			$kode='';
			}
			else
			{
	    			$kode = $this->uri->segment(3);
			}
			
					$data["upd"] = $this->m_awal->hapus_konten($kode,"id_testi","tbl_testimonial");
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/lihat_semua_testimonial'>";
		} else {
			if($_POST) {
				echo $this->m_login->ceklogin();
				redirect(base_url('login'));
			} else {
				$this->load->view('verifikasi');
			}
		}	
	}

	function update_testi()	{
		if($this->session->userdata('masuk')){	
		
				$id = $this->input->post('id');
				$nama = mysql_real_escape_string($this->input->post('nama'));
				$email = mysql_real_escape_string($this->input->post('email'));
				$pesan = mysql_real_escape_string($this->input->post('pesan'));
				$status = $this->input->post('stts');
				$waktu = mysql_real_escape_string($this->input->post('waktu'));
				$q = "update tbl_testimonial set nama='".$nama."', email='".$email."', pesan='".$pesan."', status='".$status."', waktu='".$waktu."' 
				where id_testi = '".$id."'";
				$data["upd"] = $this->m_awal->jalankan_query_manual($q);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/lihat_semua_testimonial'>";
		} else {
			if($_POST) {
				echo $this->m_login->ceklogin();
				redirect(base_url('login'));
			} else {
				$this->load->view('verifikasi');
			}
		}	
	}



	//contact
	function lihat_semua_contact()	{
		if($this->session->userdata('masuk')){	
				
				
				$page=$this->uri->segment(3);
				$limit=15;
				if(!$page):
				$offset = 0;
				else:
				$offset = $page;
				endif;

				$data["judul"] = "Semua Testimonial - Harmonis Grosir Sandal Online";
				$data["ls"] = $this->m_awal->tampil_contact_admin($limit,$offset);
				$tot_hal = $this->m_help_page->hitung_isi_1tabel('tbl_testimonial','');
				
				$config['base_url'] = base_url() . 'admin/lihat_semua_contact/';
					$config['total_rows'] = $tot_hal->num_rows();
					$config['per_page'] = $limit;
					$config['uri_segment'] = 3;
					$config['first_link'] = 'Awal';
					$config['last_link'] = 'Akhir';
					$config['next_link'] = 'Selanjutnya';
					$config['prev_link'] = 'Sebelumnya';
					$this->pagination->initialize($config);
				$data["paginator"] =$this->pagination->create_links();
				
				$this->load->view('admin/header_admin');
				$this->load->view('admin/lihat_contact',$data);
				$this->load->view('admin/footer_admin');

		} else {
			if($_POST) {
				echo $this->m_login->ceklogin();
				redirect(base_url('login'));
			} else {
				$this->load->view('verifikasi');
			}
		}
	}




	//trend

	function lihat_trend(){
		if($this->session->userdata('masuk')){	
		
				$page=$this->uri->segment(3);
				$limit=15;
				if(!$page):
				$offset = 0;
				else:
				$offset = $page;
				endif;	
				
				$data["judul"] = "Semua Intermezzo - Harmonis Grosir Sandal Online";
				$data["tampil"] = $this->m_awal->tampil_semua_trend($limit,$offset);
				$tot_hal = $this->m_help_page->hitung_isi_1tabel('tbl_intermezzo','');
				
				$config['base_url'] = base_url() . 'admin/lihat_trend/';
					$config['total_rows'] = $tot_hal->num_rows();
					$config['per_page'] = $limit;
					$config['uri_segment'] = 3;
					$config['first_link'] = 'Awal';
					$config['last_link'] = 'Akhir';
					$config['next_link'] = 'Selanjutnya';
					$config['prev_link'] = 'Sebelumnya';
					$this->pagination->initialize($config);
				$data["paginator"] =$this->pagination->create_links();
				
				$this->load->view('admin/header_admin');
				$this->load->view('admin/lihat_trend',$data);
				$this->load->view('admin/footer_admin');
		} else {
			if($_POST) {
				echo $this->m_login->ceklogin();
				redirect(base_url('login'));
			} else {
				$this->load->view('verifikasi');
			}
		}
			
	}
	
	function edit_trend(){
		if($this->session->userdata('masuk')){	
			$kode='';		
			if ($this->uri->segment(3) === FALSE)
			{
	    			$kode='';
			}
			else
			{
	    			$kode = $this->uri->segment(3);
			}
			
		   			$data['scriptmce'] = $this->scripttiny_mce();
					$data["kat"] = $this->m_awal->jalankan_query_manual_select("select * from tbl_intermezzo where id_berita='$kode'");
					$data["judul"] = "Edit Intermezzo - Harmonis Grosir Sandal Online";
					$this->load->view('admin/header_admin');
					$this->load->view('admin/edit_trend',$data);
					$this->load->view('admin/footer_admin');
		} else {
			if($_POST) {
				echo $this->m_login->ceklogin();
				redirect(base_url('login'));
			} else {
				$this->load->view('verifikasi');
			}
		}
			
	}

	function update_trend()	{
		if($this->session->userdata('masuk')){	
		
				$judul = mysql_real_escape_string($this->input->post('judul'));
				$isi = mysql_real_escape_string($this->input->post('isi'));
				$gbr = $this->input->post('gbr');
				$id = $this->input->post('id');
				
				
				if(empty($_FILES['userfile']['name']))
				{
					$this->m_awal->jalankan_query_manual("update tbl_intermezzo set judul='".$judul."',isi_berita='".$isi."' where 
					id_berita='".$id."'");
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/lihat_trend'>";
				}
				else
				{
					$acak=rand(00000000000,99999999999);
					$bersih=$_FILES['userfile']['name'];
					$nm=str_replace(" ","_","$bersih");
					$pisah=explode(".",$nm);
					$nama_murni=$pisah[0];
					$ubah=$acak.$nama_murni; //tanpa ekstensi
					$config["file_name"]=$ubah; //dengan eekstensi
					$nama_fl=$acak.$nm; //simpan nama ini k database
					$config['upload_path'] = './asset/intermezzo/';
					$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
					$config['max_size'] = '500';
					$config['max_width'] = '300';
					$config['max_height'] = '300';					
					$this->load->library('upload', $config);
				
					if(!$this->upload->do_upload())
					{
						echo $this->upload->display_errors();
					}
					else {
						$file = './asset/intermezzo/'.$gbr;
						unlink($file);
						$this->m_awal->jalankan_query_manual("update tbl_intermezzo set judul='".$judul."', isi_berita='".$isi."', 
						gambar='".$nama_fl."' where id_berita='".$id."'");
						echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/lihat_trend'>";
					}
				}
		} else {
			if($_POST) {
				echo $this->m_login->ceklogin();
				redirect(base_url('login'));
			} else {
				$this->load->view('verifikasi');
			}
		}
			
	}

	function hapus_trend()	{
		if($this->session->userdata('masuk')){	
			$kode='';		
			if ($this->uri->segment(3) === FALSE)
			{
	    			$kode='';
			}
			else
			{
	    			$kode = $this->uri->segment(3);
			}
			$gb='';		
			if ($this->uri->segment(4) === FALSE)
			{
	    			$gb='';
			}
			else
			{
	    			$gb = $this->uri->segment(4);
			}
			
					$file = './asset/intermezzo/'.$gb;
					unlink($file);
					$data["upd"] = $this->m_awal->hapus_konten($kode,"id_berita","tbl_intermezzo");
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/lihat_trend'>";
		} else {
			if($_POST) {
				echo $this->m_login->ceklogin();
				redirect(base_url('login'));
			} else {
				$this->load->view('verifikasi');
			}
		}
			
	}


	function tambah_trend()	{
		if($this->session->userdata('masuk')){	
			$kode='';		
			if ($this->uri->segment(3) === FALSE)
			{
	    			$kode='';
			}
			else
			{
	    			$kode = $this->uri->segment(3);
			}
			
		   			$data['scriptmce'] = $this->scripttiny_mce();
					$data["judul"] = "Tambah Intermezzo - Harmonis Grosir Sandal Online";
					
					$this->load->view('admin/header_admin');
					$this->load->view('admin/tambah_trend',$data);
					$this->load->view('admin/footer_admin');
		} else {
			if($_POST) {
				echo $this->m_login->ceklogin();
				redirect(base_url('login'));
			} else {
				$this->load->view('verifikasi');
			}
		}
		
	}

	function tambah_trend_verif(){
		if($this->session->userdata('masuk')){	
		
				$tgl = " %Y-%m-%d";
				$jam = "%h:%i:%a";
				$time = time();
				$judul = mysql_real_escape_string($this->input->post('judul'));
				$isi = mysql_real_escape_string($this->input->post('isi'));
				$tgl_posting = mdate($tgl,$time);
				$jam_posting = mdate($jam,$time);
				
				$acak=rand(00000000000,99999999999);
				$bersih=$_FILES['userfile']['name'];
				$nm=str_replace(" ","_","$bersih");
				$pisah=explode(".",$nm);
				$nama_murni=$pisah[0];
				$ubah=$acak.$nama_murni; //tanpa ekstensi
				$config["file_name"]=$ubah; //dengan eekstensi
				$nama_fl=$acak.$nm; //simpan nama ini k database
				$config['upload_path'] = './asset/intermezzo/';
				$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
				$config['max_size'] = '500';
				$config['max_width'] = '300';
				$config['max_height'] = '300';					
				$this->load->library('upload', $config);
			
				if(!$this->upload->do_upload())
				{
					echo $this->upload->display_errors();
				}
				else {
					$this->m_awal->jalankan_query_manual("insert into tbl_intermezzo (judul,isi_berita,tanggal,jam,gambar,dibaca) 
					values('".$judul."','".$isi."','".$tgl_posting."','".$jam_posting."','".$nama_fl."','1')");
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/lihat_trend'>";
				}
		} else {
			if($_POST) {
				echo $this->m_login->ceklogin();
				redirect(base_url('login'));
			} else {
				$this->load->view('verifikasi');
			}
		}
	}


	//Promo

	function lihat_promo(){
		if($this->session->userdata('masuk')){	
		
				$page=$this->uri->segment(3);
				$limit=15;
				if(!$page):
				$offset = 0;
				else:
				$offset = $page;
				endif;	
				
				$data["judul"] = "Semua Intermezzo - Harmonis Grosir Sandal Online";
				$data["tampil"] = $this->m_awal->tampil_semua_promo($limit,$offset);
				$tot_hal = $this->m_help_page->hitung_isi_1tabel('tbl_promo','');
				
				$config['base_url'] = base_url() . 'admin/lihat_promo/';
					$config['total_rows'] = $tot_hal->num_rows();
					$config['per_page'] = $limit;
					$config['uri_segment'] = 3;
					$config['first_link'] = 'Awal';
					$config['last_link'] = 'Akhir';
					$config['next_link'] = 'Selanjutnya';
					$config['prev_link'] = 'Sebelumnya';
					$this->pagination->initialize($config);
				$data["paginator"] =$this->pagination->create_links();
				
				$this->load->view('admin/header_admin');
				$this->load->view('admin/lihat_promo',$data);
				$this->load->view('admin/footer_admin');
		} else {
			if($_POST) {
				echo $this->m_login->ceklogin();
				redirect(base_url('login'));
			} else {
				$this->load->view('verifikasi');
			}
		}
			
	}
	
	function edit_promo(){
		if($this->session->userdata('masuk')){	
			$kode='';		
			if ($this->uri->segment(3) === FALSE)
			{
	    			$kode='';
			}
			else
			{
	    			$kode = $this->uri->segment(3);
			}
			
		   			$data['scriptmce'] = $this->scripttiny_mce();
					$data["kat"] = $this->m_awal->jalankan_query_manual_select("select * from tbl_promo where id_berita='$kode'");
					$data["judul"] = "Edit Intermezzo - Harmonis Grosir Sandal Online";
					$this->load->view('admin/header_admin');
					$this->load->view('admin/edit_promo',$data);
					$this->load->view('admin/footer_admin');
		} else {
			if($_POST) {
				echo $this->m_login->ceklogin();
				redirect(base_url('login'));
			} else {
				$this->load->view('verifikasi');
			}
		}
			
	}

	function update_promo()	{
		if($this->session->userdata('masuk')){	
				$judul = mysql_real_escape_string($this->input->post('judul'));
				$isi = mysql_real_escape_string($this->input->post('isi'));
				$gbr = $this->input->post('gbr');
				$id = $this->input->post('id');
				
				
				if(empty($_FILES['userfile']['name']))
				{
					$this->m_awal->jalankan_query_manual("update tbl_promo set judul='".$judul."',isi_berita='".$isi."' where 
					id_berita='".$id."'");
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/lihat_promo'>";
				}
				else
				{
					$acak=rand(00000000000,99999999999);
					$bersih=$_FILES['userfile']['name'];
					$nm=str_replace(" ","_","$bersih");
					$pisah=explode(".",$nm);
					$nama_murni=$pisah[0];
					$ubah=$acak.$nama_murni; //tanpa ekstensi
					$config["file_name"]=$ubah; //dengan eekstensi
					$nama_fl=$acak.$nm; //simpan nama ini k database
					$config['upload_path'] = './asset/promo/';
					$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
					$config['max_size'] = '500';
					$config['max_width'] = '300';
					$config['max_height'] = '300';					
					$this->load->library('upload', $config);
				
					if(!$this->upload->do_upload())
					{
						echo $this->upload->display_errors();
					}
					else {
						$file = './asset/promo/'.$gbr;
						unlink($file);
						$this->m_awal->jalankan_query_manual("update tbl_promo set judul='".$judul."', isi_berita='".$isi."', 
						gambar='".$nama_fl."' where id_berita='".$id."'");
						echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/lihat_promo'>";
					}
				}
		} else {
			if($_POST) {
				echo $this->m_login->ceklogin();
				redirect(base_url('login'));
			} else {
				$this->load->view('verifikasi');
			}
		}
			
	}

	function hapus_promo(){
		if($this->session->userdata('masuk')){	
			$kode='';		
			if ($this->uri->segment(3) === FALSE)
			{
	    			$kode='';
			}
			else
			{
	    			$kode = $this->uri->segment(3);
			}
			$gb='';		
			if ($this->uri->segment(4) === FALSE)
			{
	    			$gb='';
			}
			else
			{
	    			$gb = $this->uri->segment(4);
			}
			
					$file = './asset/promo/'.$gb;
					unlink($file);
					$data["upd"] = $this->m_awal->hapus_konten($kode,"id_berita","tbl_promo");
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/lihat_promo'>";
		} else {
			if($_POST) {
				echo $this->m_login->ceklogin();
				redirect(base_url('login'));
			} else {
				$this->load->view('verifikasi');
			}
		}
			
	}


	function tambah_promo()	{
		if($this->session->userdata('masuk')){	
			$kode='';		
			if ($this->uri->segment(3) === FALSE)
			{
	    			$kode='';
			}
			else
			{
	    			$kode = $this->uri->segment(3);
			}
			
		   			$data['scriptmce'] = $this->scripttiny_mce();
					$data["judul"] = "Tambah Intermezzo - Harmonis Grosir Sandal Online";
					
					$this->load->view('admin/header_admin');
					$this->load->view('admin/tambah_promo',$data);
					$this->load->view('admin/footer_admin');
		} else {
			if($_POST) {
				echo $this->m_login->ceklogin();
				redirect(base_url('login'));
			} else {
				$this->load->view('verifikasi');
			}
		}
		
	}

	function tambah_promo_verif(){
		if($this->session->userdata('masuk')){	
		
				$tgl = " %Y-%m-%d";
				$jam = "%h:%i:%a";
				$time = time();
				$judul = mysql_real_escape_string($this->input->post('judul'));
				$isi = mysql_real_escape_string($this->input->post('isi'));
				$tgl_posting = mdate($tgl,$time);
				$jam_posting = mdate($jam,$time);
				
				$acak=rand(00000000000,99999999999);
				$bersih=$_FILES['userfile']['name'];
				$nm=str_replace(" ","_","$bersih");
				$pisah=explode(".",$nm);
				$nama_murni=$pisah[0];
				$ubah=$acak.$nama_murni; //tanpa ekstensi
				$config["file_name"]=$ubah; //dengan eekstensi
				$nama_fl=$acak.$nm; //simpan nama ini k database
				$config['upload_path'] = './asset/promo/';
				$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
				$config['max_size'] = '500';
				$config['max_width'] = '300';
				$config['max_height'] = '300';					
				$this->load->library('upload', $config);
			
				if(!$this->upload->do_upload())
				{
					echo $this->upload->display_errors();
				}
				else {
					$this->m_awal->jalankan_query_manual("insert into tbl_promo (judul,isi_berita,tanggal,jam,gambar,dibaca) 
					values('".$judul."','".$isi."','".$tgl_posting."','".$jam_posting."','".$nama_fl."','1')");
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/lihat_promo'>";
				}
		} else {
			if($_POST) {
				echo $this->m_login->ceklogin();
				redirect(base_url('login'));
			} else {
				$this->load->view('verifikasi');
			}
		}
	}


	public function jadwal(){
		$data['jadwal'] = $this->m_awal->show_table("jadwal");
		$this->load->view('admin/jadwal',$data);
	}

	public function tambah(){
		$this->load->view('admin/form_tambah_mhs');
	}

	public function tambah_siswa(){
		$npm = $this->input->post("NPM");
		$nama = $this->input->post("Nama");
		$data = array("NPM"=>$npm,
					  "Nama"=>$nama);
		$this->m_awal->insert("mahasiswa", $data);
		redirect('admin');
	}

	function ubah_siswa($id){
		if($_POST == null){
			$data['id'] = $this->m_awal->select($id, "mahasiswa", "NPM");
			$this->load->view('admin/form_ubah_mhs',$data);
		}else {
			$this->m_awal->update($id, "mahasiswa", "NPM");
			redirect('admin');
		}
	}

	function hapus_siswa($id){
		$this->m_awal->delete($id, "mahasiswa", "NPM");
		redirect('admin');
	}




//====================Tiny MCE===============================//

//Function TinyMce------------------------------------------------------------------
		private function scripttiny_mce() {
		return '
		<!-- TinyMCE -->
		<script type="text/javascript" src="'.base_url().'jscripts/tiny_mce/tiny_mce_src.js"></script>
		<script type="text/javascript">
		tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "'.base_url().'system/application/views/themes/css/BrightSide.css",

		// Drop lists for link/image/media/template dialogs
		//"'.base_url().'media/lists/image_list.js"
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "'.base_url().'index.php/adminweb/image_list/",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : \'Bold text\', inline : \'b\'},
			{title : \'Red text\', inline : \'span\', styles : {color : \'#ff0000\'}},
			{title : \'Red header\', block : \'h1\', styles : {color : \'#ff0000\'}},
			{title : \'Example 1\', inline : \'span\', classes : \'example1\'},
			{title : \'Example 2\', inline : \'span\', classes : \'example2\'},
			{title : \'Table styles\'},
			{title : \'Table row 1\', selector : \'tr\', classes : \'tablerow1\'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>';	
	}
}

?>