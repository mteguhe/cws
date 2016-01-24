<!--services start here-->
<div class="services">
	<div class="container">
		<div class="services-main">
			<div class="services-top">
				<h3>Trend Mode</h3>
				<p>berikut asfklj fjla fajknh gjgaj</p>
			</div>
			<div class="services-bottom">
				<div class="main-serv">
					
					<?php
					if(count($berita->result_array())>0){
					foreach($berita->result_array() as $in)
					{
						$c = array (' ');
					    $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
						$s = strtolower(str_replace($d,"",$in['judul']));
						$link = strtolower(str_replace($c, '-', $s));

					echo "<div class='col-md-3 main-serv-grid'>";
					echo	'<a href="single.html"><img src="'.base_url().'asset/intermezzo/'.$in['gambar'].'" alt="" class="img-responsive"></a>';
					echo	"<h4><a href='".base_url()."trend/baca/".$in['id_berita']."-".$link."'>".$in['judul']."</a></h4>";
					echo 	"<h5>Diposting pada : ".$in['tanggal']." | ".$in['jam']." - Oleh : Admin - Dibaca : ".$in['dibaca']." kali</h5>";
					echo	"<p>'".substr($in['isi_berita'],0,100)."...
							<a href='".base_url()."trend/baca/".$in['id_berita']."-".$link."'>[Baca Selengkapnya]</a></p>";
					echo "</div>";
				  

					}
					}
					else{
					echo "Maaf, belum ada berita. <br>Silahkan mengisi berita dan Pengalaman anda selama berbelanja di website kami.";
					}
					?>

				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--services end here-->

<div id="content-center">

<div class="cleaner_h10"></div>


<div class="cleaner_h5"></div>
<table align="center"><tr><td><?php echo $paginator; ?></td></tr></table>
</div>
