<div id="content">
<div id="content-left">
<div id="sub-content-title">Produk Terlaris Bulan Ini</div>

<div id="sub-content-center-privat">
<ul id="produklaris">
<?php
foreach($slide_laris->result_array() as $sl)
{
$tss = "";
$mati = "";
if($sl['stok']>0)
{
	$tss = '<span style="margin:0px auto; padding:0px; font-size:12px;"><b>Ada</b></span>';
	$mati = "";
}
else
{
	$tss = '<span style="margin:0px auto; padding:0px; font-size:12px; color:red;"><b>Habis</b></span>';
	$mati = "disabled";
}
			$c = array (' ');
    		$d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
			$s = strtolower(str_replace($d,"",$sl['nama_produk']));
			$link = strtolower(str_replace($c, '-', $s));
	echo '<li><form method="post" action="'.base_url().'keranjang/tambah_barang"><div id="list-produk">
<input type="hidden" name="kode_produk" value="'.$sl['kode_produk'].'">
<input type="hidden" name="banyak" value="5">
<input type="hidden" name="harga" value="'.$sl['harga'].'">
<input type="hidden" name="nama_produk" value="'.$sl['nama_produk'].'">
<p style="text-align:center; margin:0px auto; height:35px;"><strong>'.$sl['nama_produk'].'</strong></p><p style="text-align:center; margin:0px auto;"><img src="'.base_url().'asset/produk/'.$sl['gbr_kecil'].'" width="100" class="vtip" title="'.$sl['nama_produk'].' - Harga Rp.'.number_format($sl['harga'],2,',','.').'" /><br />Rp. '.number_format($sl['harga'],2,',','.').' | Stok : '.$tss.'<br /><div style="width:152px; margin:0px auto; padding:0px;"><input type="submit" class="tombol-beli" value="" '.$mati.'><a href="'.base_url().'produk/detail/'.strtolower($sl['kode_produk']).'-'.$link.'" class="vtip" title="'.$sl['nama_produk'].' - Harga Rp.'.number_format($sl['harga'],2,',','.').'"><img src="'.base_url().'asset/images/bar-detail.png" border=0 style="float:right;" /></a></div>
</p></div></form></li>';
}
?>
</ul>
</div>
<div id="sub-content-footer"></div>

<div class="cleaner_h10"></div>
<div id="sub-content-title">Belanja Berdasarkan Harga</div>
<div id="sub-content-center">
<ul>
	<li><a href="<?php echo base_url(); ?>produk/belanja/-5000">Kurang dari <strong>&le; Rp. 5.000</strong></a></li>
	<li><a href="<?php echo base_url(); ?>produk/belanja/5001-10000"><strong>Rp. 5.001 - Rp. 10.000</strong></a></li>
	<li><a href="<?php echo base_url(); ?>produk/belanja/10001-15000"><strong>Rp. 10.001 - Rp. 15.000</strong></a></li>
	<li><a href="<?php echo base_url(); ?>produk/belanja/15001-20000"><strong>Rp. 15.001 - Rp. 20.000</strong></a></li>
	<li><a href="<?php echo base_url(); ?>produk/belanja/20001-30000"><strong>Rp. 20.001 - Rp. 30.000</strong></a></li>
	<li><a href="<?php echo base_url(); ?>produk/belanja/30001-">Lebih dari <strong>&ge; Rp. 30.001</strong></a></li>
</ul>
</div>
<div id="sub-content-footer"></div>

<div class="cleaner_h10"></div>
<div id="sub-content-title">Intermezzo</div>
<div id="sub-content-center">
<ul>
	<?php
		foreach($intermezzo->result_array() as $in)
		{
			$c = array (' ');
    		$d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
			$s = strtolower(str_replace($d,"",$in['judul']));
			$link = strtolower(str_replace($c, '-', $s));
			echo '<li><a href="'.base_url().'intermezzo/baca/'.$in['id_berita'].'-'.$link.'">'.$in['judul'].'</a></li>';
		}
	?>
</ul>
</div>
<div id="sub-content-footer"></div>
<div class="cleaner_h10"></div>
<div id="sub-content-title">Online Support (YM)</div>
<div id="sub-content-center">
<ul>
<table>
<tr><td width="90"><li>M. Nasirin</li></td><td><a href = 'ymsgr:sendim?mnasirin73'><img src="http://opi.yahoo.com/online?u=mnasirin73&amp;m=g&amp;t=1" border=0></a></td></tr>
<tr><td width="90"><li>Ridho</li></td><td><a href = 'ymsgr:sendim?zridho77'><img src="http://opi.yahoo.com/online?u=zridho77&amp;m=g&amp;t=1" border=0></a></td></tr>
<tr><td width="90"><li>Ristanto</li></td><td><a href = 'ymsgr:sendim?juan_mata89'><img src="http://opi.yahoo.com/online?u=juan_mata89&amp;m=g&amp;t=1" border=0></a></td></tr>
<tr><td width="90"><li>Owner</li></td><td><a href = 'ymsgr:sendim?konkrit_68'><img src="http://opi.yahoo.com/online?u=konkrit_68&amp;m=g&amp;t=1" border=0></a></td></tr>

</table>
</ul>
</div>
<div id="sub-content-footer"></div>


<div class="cleaner_h10"></div>
<div id="sub-content-title">Hot Line Service</div>
<div id="sub-content-center">
	<p align="center" style="margin:0px auto; padding:3px;"><img src="<?php echo base_url(); ?>asset/images/hot-line-contact.png" /></p>
	<p align="center" style="margin:0px auto; padding:3px;"><img src="<?php echo base_url(); ?>asset/images/hot-line-email.png" /></p>
</div>
<div id="sub-content-footer"></div>

</div>
