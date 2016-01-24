
	<div class="container">
		<div class="about-main">


<?php
foreach($detail->result_array() as $in)
{
	echo "<h2>".$in['judul']."</h2>";
	echo "<h5>Diposting pada : ".$in['tanggal']." | ".$in['jam']." - Oleh : Admin - Dibaca : ".$in['dibaca']." kali</h5>";
	//echo '<img src="'.base_url().'asset/intermezzo/'.$in['gambar'].'">'.nl2br($in['isi_berita']); //aktifkan jika admin sudah tersedia
	echo '<div class="cleaner_h5"></div>';
	echo '<img src="'.base_url().'asset/intermezzo/'.$in['gambar'].'" width="260" class="gambar" title="'.$in['judul'].'">'.$in['isi_berita'];
}
?>
<div class="cleaner_h20"></div>
<br>
<h1>Baca Juga Promo Menarik Lainnya</h1>
<ul>
	<?php
		foreach($intermezzo_acak->result_array() as $in)
		{
			$c = array (' ');
    		$d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
			$s = strtolower(str_replace($d,"",$in['judul']));
			$link = strtolower(str_replace($c, '-', $s));
			echo '<li><a href="'.base_url().'trend/baca/'.$in['id_berita'].'-'.$link.'">'.$in['judul'].'</a></li>';
		}
	?>
</ul>
<br>
</div>
</div>
	</div>

