<div id="content-right">
<div id="sub-content-title">Keranjang Belanja Anda</div>
<div id="sub-content-center">
<img src="<?php echo base_url(); ?>asset/images/beli.png" class="img-right" />
<strong><?php echo $this->cart->total_items(); ?> item produk</strong>
<div style="border-bottom:1px dashed #666666; width:80%"></div>
Total: <strong>Rp. <?php echo number_format($this->cart->total(),2,',','.'); ?></strong>
<?php
if($this->cart->total_items()>0)
{
?>
<a href="<?php echo base_url(); ?>keranjang"><div class="lihat-keranjang-kiri">Lihat Keranjang</div></a>
<a href="<?php echo base_url(); ?>checkout"><div class="selesai-belanja-kanan">Selesai Belanja</div></a>
<?php
} else { }
?>
<div class="cleaner_h0"></div>
</div>
<div id="sub-content-footer"></div>
<div class="cleaner_h10"></div>
<div id="sub-content-title">Produk Terbaru Bulan Ini</div>
<div id="sub-content-center-privat">
<ul id="produkbaru">
<?php
foreach($slide_baru->result_array() as $sb)
{
$tss = "";
$mati = "";
if($sb['stok']>0)
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
			$s = strtolower(str_replace($d,"",$sb['nama_produk']));
			$link = strtolower(str_replace($c, '-', $s));
	echo '<li><form method="post" action="'.base_url().'keranjang/tambah_barang"><div id="list-produk">
<input type="hidden" name="kode_produk" value="'.$sb['kode_produk'].'">
<input type="hidden" name="banyak" value="5">
<input type="hidden" name="harga" value="'.$sb['harga'].'">
<input type="hidden" name="nama_produk" value="'.$sb['nama_produk'].'">
<p style="text-align:center; margin:0px auto; height:35px;"><strong>'.$sb['nama_produk'].'</strong></p><p style="text-align:center; margin:0px auto;"><img src="'.base_url().'asset/produk/'.$sb['gbr_kecil'].'" width="100" class="vtip" title="'.$sb['nama_produk'].' - Harga Rp.'.number_format($sb['harga'],2,',','.').'" /><br />Rp. '.number_format($sb['harga'],2,',','.').' | Stok : '.$tss.'<br /><div style="width:152px; margin:0px auto; padding:0px;"><input type="submit" class="tombol-beli" value="" '.$mati.'><a href="'.base_url().'produk/detail/'.strtolower($sb['kode_produk']).'-'.$link.'" class="vtip" title="'.$sb['nama_produk'].' - Harga Rp.'.number_format($sb['harga'],2,',','.').'"><img src="'.base_url().'asset/images/bar-detail.png" border=0 style="float:right;" /></a></div>
</p></div></form></li>';
}
?>
</ul>
</div>
<div id="sub-content-footer"></div>
<div class="cleaner_h10"></div>
<div id="sub-content-title">Testimonial Pengunjung</div>
    <script type="text/javascript">
	  $(function() {
		var ticker = $("#ticker");
		ticker.children().filter("dt").each(function() {
		  var dt = $(this),
		    container = $("<div>");
		  dt.next().appendTo(container);
		  dt.prependTo(container);
		  container.appendTo(ticker);
		});
				
		ticker.css("overflow", "hidden");
		function animator(currentItem) {
		  var distance = currentItem.height();
			duration = (distance + parseInt(currentItem.css("marginTop"))) / 0.025;
		  currentItem.animate({ marginTop: -distance }, duration, "linear", function() {
			currentItem.appendTo(currentItem.parent()).css("marginTop", 0);
			animator(currentItem.parent().children(":first"));
		  }); 
		};
		
		animator(ticker.children(":first"));
		ticker.mouseenter(function() {
		  ticker.children().stop();
		});
		
		ticker.mouseleave(function() {
		  animator(ticker.children(":first"));
		});
	  });
    </script>
<script type="text/javascript">
$(document).ready(function () {
<?php
for($i=1;$i<=count($testimonial->result_array());$i++)
{
?>
  $('#dialg<?php echo $i; ?>').simpleDialog();
<?php
  }
?>
});
</script>
<div id="sub-content-center" style="height:480px;">
	<div id="tickerContainer">
      <dl id="ticker">

            <?php
			$no = 1;
			foreach($testimonial->result_array() as $ts)
			{
				$komen = substr($ts['pesan'],0,100);
				echo '<dt class="heading"><b><a href="mailto:'.$ts['email'].'">'.$ts['nama'].'</a></b></dt><dd class="text"><span class="komen-testi">'.$komen.'...<b><a href="'.base_url().'testimonial/baca/'.$ts['id_testi'].'/" id="dialg'.$no.'">[baca]</a></b></span></dd>';
				$no++;
			}
            ?>
          </ul>
      </dl>
    </div>
<p align="center" style="margin:0px auto; padding:0px;"><a href="<?php echo base_url(); ?>testimonial/isi"><img src="<?php echo base_url(); ?>asset/images/isi-testi.png" border="0"/></a></p>
<p align="center" style="margin:0px auto; padding:0px;"><a href="<?php echo base_url(); ?>testimonial"><img src="<?php echo base_url(); ?>asset/images/baca-testimonial.png" border="0"/></a></p>
</div>
<div id="sub-content-footer"></div>

<div class="cleaner_h10"></div>
<div id="sub-content-title">Jasa Pengiriman Barang</div>
<div id="sub-content-center">
	<p align="center" style="margin:0px auto; padding:3px;"><a href="http://www.tiki-online.com/" target="_blank"><img src="<?php echo base_url(); ?>asset/images/tiki.png" border="0" /></a></p>
	<p align="center" style="margin:0px auto; padding:3px;"><a href="http://www.esl-express.com/" target="_blank"><img src="<?php echo base_url(); ?>asset/images/sl.png" border="0" /></a></p>
	<p align="center" style="margin:0px auto; padding:3px;"><a href="http://www.jne.co.id/" target="_blank"><img src="<?php echo base_url(); ?>asset/images/jne.png" border="0" /></a></p>
</div>
<div id="sub-content-footer"></div>



</div>
</div>
