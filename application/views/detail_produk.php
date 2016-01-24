<div class="about">
	<div class="container">
		<div class="about-main">
			<div class="col-md-4 about-left">
			<?php
				foreach($detail_produk->result_array() as $dp)
					{
						$c = array (' ');
			    		$d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
						$s = strtolower(str_replace($d,"",$dp['nama_produk']));
						$link = strtolower(str_replace($c, '-', $s));	
				
				echo '<h3>'.$dp['nama_produk'].'</h3>'?>
				<div class="col-md-4zzz gallery-grid">
					<div class="project-eff">
						<div id="nivo-lightbox-demo"> <p> <a href="<?php echo base_url(); ?>asset/produk/imgoriginal/<?php echo strtolower($dp['gbr_besar']) ?>"data-lightbox-gallery="gallery1" id="nivo-lightbox-demo"> <span class="rollover1"> </span></a> </p></div>     
							<img class="img-responsive" src="<?php echo base_url(); ?>asset/produk/imgoriginal/<?php echo strtolower($dp['gbr_besar']) ?>" alt="" >
					</div>
				</div>
				
				<?php if ($dp['gbr_besar2'] != ''){ ?>
				<div class="col-md-4zzz gallery-grid">
					<div class="project-eff">
						<div id="nivo-lightbox-demo"> <p> <a href="<?php echo base_url(); ?>asset/produk/imgoriginal/<?php echo strtolower($dp['gbr_besar2']) ?>"data-lightbox-gallery="gallery1" id="nivo-lightbox-demo"> <span class="rollover1"> </span></a> </p></div>     
							<img class="img-responsive" src="<?php echo base_url(); ?>asset/produk/imgoriginal/<?php echo strtolower($dp['gbr_besar2']) ?>" alt="" >
					</div>
				</div>
				<?php } ?>


			</div>
			<div class="col-md-4zzz about-left">
				<h3> <br> </h3>
				<h4><?php echo '<b>'.$dp['nama_produk'].'</b>' ?></h4>
				<h4><?php echo '<b>Harga : Rp.'.number_format($dp['harga'],2,',','.').'</b>' ?></h4>
				<?php
					$ts = "";
					$tmati = "";
					if($dp['stok']>0)
					{
						$ts = 'Tersedia';
						$tmati = "";
					}
					else
					{
						$ts = 'Preorder';
						$tmati = "disabled";
					}
				?>
				<p>Since the 1500s, when an unknown printer a galley of type and scrambled specimen book.</p>
			    <h4>Stok Barang : <?php echo $ts ?></h4>
			    <p> Deskripsi : <?php if($dp['deskripsi']==null)
					{ 
						echo "Deskripsi produk masih kosong."; 
					} 
					else 
					{ 
						echo $dp['deskripsi']; 
					} ?>
				</p>
			</div>
			<?php 
			}
			?>
		  <div class="clearfix"> </div>
		</div>
	</div>
</div>
		
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/magnific-popup.css">
			<script type="text/javascript" src="<?php echo base_url(); ?>js/nivo-lightbox.min.js"></script>
				<script type="text/javascript">
				$(document).ready(function(){
				    $('#nivo-lightbox-demo a').nivoLightbox({ effect: 'fade' });
				});
				</script>

