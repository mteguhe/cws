<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
<meta name="author" content="Gede Lumbung" /> 
<meta name="keywords" content="sandal online, jual sandal, sandal murah, sandal online murah, toko sandal online"> 
<meta name="description" content="Selamat datang di grosirsandalonline.com. kami menyediakan berbagai sandal dari anak-anak hingga dewasa. Dengan minimal pembelian 5 pasang berseri. Nikmati kemudahan dan berbagai keuntungan yang kami berikan disetiap kesempatannya. Kami tidak membebani anda dengan barang yag tidak laku atau cacat. Anda bisa tukar kembali dengan syarat barang masih utuh dan cacat bukan karena disengaja tapi murni dari kesalahan pabrik. Komitmen kami ingin menjadi mitra bisnis Anda."> 
<title><?php echo $judul; ?></title>
<link href="<?php echo base_url(); ?>asset/images/icon.png" rel="shortcut icon" />
<link href="<?php echo base_url(); ?>asset/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>asset/css/ddsmoothmenu.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>asset/css/jquery.simpledialog.0.1.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/jquery.fancybox-1.3.4.css" media="screen" />
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery-1.4.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.jcarousel.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/vtip.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/skrip.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/flexdropdown.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.treeview.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/demo.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.simpledialog.0.1.js"></script>

<script type="text/javascript">
		$(document).ready(function() {
			$("a[rel=example_group]").fancybox({
			
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});
		});
</script>
<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "smoothmenu1", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})
</script>
<script type="text/javascript"> 
$(document).ready( function()
	{	
		$('#lofslidecontent45').lofJSidernews( { interval:4000,
												 easing:'easeInOutQuad',
												duration:1000,
												auto:true } );						
	});
	function slidePordukBaru()
	{
	    akhir = $('ul#produkbaru li:last').hide().remove();
	    $('ul#produkbaru').prepend(akhir);
        $('ul#produkbaru li:first').slideDown("slow");
	}
	function slidePordukLaris()
	{
	    akhir = $('ul#produklaris li:last').hide().remove();
	    $('ul#produklaris').prepend(akhir);
        $('ul#produklaris li:first').slideDown("slow");
	}
	setInterval(slidePordukBaru, 5000);
	setInterval(slidePordukLaris, 7000);
	
	
</script>

</head>

<body onLoad="goforit()">
<div class="cleaner_h5"></div>
<div id="logo">

<div id="inner-logo">
<div id="welcome">
<?php if(empty($_SESSION['username_grosir_sandal'])){ ?>
<?php
}
else{
?>
Selamat Datang, <b><?php echo $nama; ?></b> - <a href="<?php echo base_url(); ?>member/logout">Log Out</a>
<?php } ?>

</div><a href="<?php echo base_url(); ?>katalog">Download Katalog</a> | <a href="<?php echo base_url(); ?>member">Member Area</a> | <script src="<?php echo base_url(); ?>asset/js/clock.js" type="text/javascript"></script><span id="clock"></span><p style="padding-top:5px; margin:0px auto;"></p></div>
</div>
<div id="menu">
<div id="menu-kiri">
<ul>
<a href="<?php echo $this->config->item('site_url');?>web" title="Beranda - Grosir Sandal Online"><li><img src="<?php echo base_url(); ?>asset/images/icon-home.png" class="menu-img" border="0" />Beranda</li></a>

<a href="<?php echo $this->config->item('site_url');?>profil_sandal_online" title="Profil Kami | Grosir Sandal Online"><li><img src="<?php echo base_url(); ?>asset/images/icon-about.png" class="menu-img" border="0" />Tentang Kami</li></a>

<a href="<?php echo $this->config->item('site_url');?>cara_belanja" title="Cara Belanja | Grosir Sandal Online"><li><img src="<?php echo base_url(); ?>asset/images/icon-how-to.png" class="menu-img" border="0" />Cara Belanja</li></a>

<a href="<?php echo $this->config->item('site_url');?>hubungi_kami" title="Hubungi Kami | Grosir Sandal Online"><li><img src="<?php echo base_url(); ?>asset/images/icon-contact.png" class="menu-img" border="0" />Hubungi Kami</li></a>

<a href="<?php echo $this->config->item('site_url');?>site_map" title="Site Map Website | Grosir Sandal Online"><li><img src="<?php echo base_url(); ?>asset/images/icon-sitemap.png" class="menu-img" border="0" />Site Map Produk</li></a>

<a href="<?php echo $this->config->item('site_url');?>keranjang" title="Keranjang Belanja | Grosir Sandal Onlinee"><li><img src="<?php echo base_url(); ?>asset/images/icon-shopcart.png" class="menu-img" border="0" />Keranjang Belanja</li></a>
</ul>
</div>
<div id="menu-kanan"><form method="post" action="<?php echo base_url(); ?>cari/lihat">
<input type="text" class="input-teks" size="16" value="Cari Produk..." onblur="if(this.value=='') this.value='Cari Produk...';" onfocus="if(this.value=='Cari Produk...') this.value='';" name="cari"  /> <input type="submit" value="Cari" class="input-tombol" /></form>
</div>
</div>
<div id="banner">

<div id="lofslidecontent45" class="lof-slidecontent"> 
<div  class="preload"><div></div></div> 
 <!-- MAIN CONTENT --> 
<div class="lof-main-outer"> 
  	<ul class="lof-main-wapper"> 
	<?php
		foreach($banner->result_array() as $bn)
		{
	?>
		<li><img src="<?php echo base_url(); ?>asset/banner/<?php echo $bn['gambar']; ?>" /></li>
	<?php
		}
	?>
    
	
	</ul> 
    </div>          
    <div class="lof-navigator-outer"> 
	
  	<ul class="lof-navigator"> 
		<?php
		foreach($banner->result_array() as $bn2)
		{
	?>
		<li> 
        <div><img src="<?php echo base_url(); ?>asset/banner/<?php echo $bn2['gambar']; ?>" height="20"/>
        <h3><?php echo strip_tags(substr($bn2['judul'],0,25)); ?>...</h3> 
		<span class=tanggal><?php echo strip_tags(substr($bn2['deskripsi'],0,70)); ?>...</span> 
        </div> 
    </li>
	<?php
		}
	?>
	</ul> 
    </div> 
</div> 



</div>
<div id="menu-bawah">
<div id="smoothmenu1" class="ddsmoothmenu">
	<ul>
	<?php
		foreach($menu->result_array() as $m1)
		{
			$nm_link1 = $m1['id_kategori'].'-'.$m1['nama_kategori'];
			$ld1 = strtolower(str_replace(" ","-",$nm_link1));
			$sub1 = $this->m_awal->menu_kategori('1',$m1['id_kategori']);
			//if(count($sub1->result_array())>0){
				//echo '<li><a href="#">'.$m1['nama_kategori'].'</a><ul>';
			//}
			//else{
				echo '<li><a href="'.$this->config->item('site_url').'kategori/produk/'.$ld1.'">'.$m1['nama_kategori'].'</a><ul>';
			//}
			
			foreach($sub1->result() as $sm1)
			{
				$gbr = "";
				$nm_link2 = $sm1->id_kategori.'-'.$sm1->nama_kategori;
				$ld2 = strtolower(str_replace(" ","-",$nm_link2));
				$sub2 = $this->m_awal->menu_kategori('2',$sm1->id_kategori);
				if(count($sub2->result())>0) 
				{
					$gbr='<img src="'.base_url().'asset/images/right.gif" border="0" align="right">';
					//echo '<li><a href="#">'.$sm1->nama_kategori.''.$gbr.'</a><ul>';
					echo '<li><a href="'.$this->config->item('site_url').'kategori/produk/'.$ld2.'">'.$sm1->nama_kategori.' '.$gbr.'</a><ul>';
				}
				else
				{
					echo '<li><a href="'.$this->config->item('site_url').'kategori/produk/'.$ld2.'">'.$sm1->nama_kategori.'</a><ul>';
				}
				
				foreach($sub2->result() as $sm2)
				{
					$nm_link3 = $sm2->id_kategori.'-'.$sm2->nama_kategori;
					$ld3 = strtolower(str_replace(" ","-",$nm_link3));
					echo '<li><a href="'.$this->config->item('site_url').'kategori/produk/'.$ld3.'">'.$sm2->nama_kategori.'</a></li>';
				}
				
				echo '</ul>';
				echo '</li>';
				
			}
			echo '</ul>';
			echo '</li>';
		}
	?>
	</ul>
</div>
</div>
</div>

<script type="text/javascript">
function mycarousel_initCallback(carousel)
{ 
carousel.buttonNext.bind('click', function() {
carousel.startAuto(0);
});
carousel.buttonPrev.bind('click', function() {
carousel.startAuto(0);
});
carousel.clip.hover(function() {
carousel.stopAuto();
}, function() {
carousel.startAuto();
});
};

jQuery(document).ready(function() {
jQuery('#hs').jcarousel({
visible: 7,
scroll: 1,
wrap: 'circular',
auto: 2,
animation: 1000,
initCallback: mycarousel_initCallback
 });
});
</script>


<div id="slider-banner">
	<div id="wrap"> 
		<ul id="hs" class="jcarousel-skin-tango-hs"> 
<?php
foreach($slide_atas->result_array() as $sa)
{

			$c = array (' ');
    		$d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
			$s = strtolower(str_replace($d,"",$sa['nama_produk']));
			$link = strtolower(str_replace($c, '-', $s));
	echo '<li><a href="'.base_url().'produk/detail/'.strtolower($sa['kode_produk']).'-'.$link.'" class="vtip" title="'.$sa['nama_produk'].' - Harga Rp.'.number_format($sa['harga'],2,',','.').'"><img src="'.base_url().'asset/produk/'.$sa['gbr_kecil'].'" alt="'.$sa['nama_produk'].'"><br />'.$sa['nama_produk'].'<br>Harga Rp.'.number_format($sa['harga'],2,',','.').'</a></li> ';
}
?>
		</ul> 
	</div> 
</div>
<div class="cleaner_h0"></div>
