   
	<!--banner start here-->
<div class="">
</div>
<!--banner end here-->
<!--gallery start here-->
<div class="gallery">
	<div class="container">
		
	
    
<table width="95%" class="content_table" align="center"><tbody><tr valign="top"><td>


	<div class="left_menu">    
    <?php include('kategori_produk.php'); ?>
    </div>
</td><td>


<table width="710" border="0" align="center"><tbody><tr align="center">



<td><div>
<?php
if(count($produk->result_array())>0){
foreach($produk->result_array() as $kt)
{
$tss = "";
$mati = "";
if($kt['stok']>0)
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
			$s = strtolower(str_replace($d,"",$kt['nama_produk']));
			$link = strtolower(str_replace($c, '-', $s));
	echo '
<form method="post" action="'.base_url().'keranjang/tambah_barang">
<input type="hidden" name="kode_produk" value="'.$kt['kode_produk'].'">
<input type="hidden" name="banyak" value="5">
<input type="hidden" name="harga" value="'.$kt['harga'].'">
<input type="hidden" name="nama_produk" value="'.$kt['nama_produk'].'">
<div style="border:1px solid #CCCCCC; margin-bottom:10px; padding:5px; width:165px; float:left; margin-right:6px; -moz-border-radius: 5px; -webkit-border-radius: 5px; z-index: 6666669 ;">
<p style="text-align:center; height:40px; margin:0px auto;"><strong>'.$kt['nama_produk'].'</strong></p>
<p style="text-align:center; margin:0px auto;"><img src="'.base_url().'asset/produk/'.strtolower ($kt['gbr_kecil']).'" width="100" /><br />
Rp. '.number_format($kt['harga'],2,',','.').' <br> 
Stok : '.$tss.'<div style="width:152px; margin:0px auto; padding:0px;"><a href="'.base_url().'index.php/awal/detail/'.$kt['kode_produk'].'-'.$link.'" class="vtip" title="'.$kt['nama_produk'].' - Harga Rp.'.number_format($kt['harga'],2,',','.').'"><img src="'.base_url().'asset/images/bar-detail.png" border=0 style="float:right;" /></a></div></p></div></form>';
}
}
else{
echo "Maaf, belum ada produk pada kategori ini. <br>Silahkan melihat-lihat koleksi produk kami pada kategori yang lainnya.";
}
?>
<div class="cleaner_h20"></div>
<table align="center"><tr><td><?php echo $paginator; ?></td></tr></table>



            </tr>
            
            </tbody></table><br></td></tr></tbody></table>
</div></div>