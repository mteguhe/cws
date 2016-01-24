<div class="clear"></div>
<div id="content-outer">
<!-- start content -->
<div id="content">
	<div id="page-heading">
	
		<h1><?php echo $judul; ?></h1><br>
		<table width="98%" cellpadding="10">
		<tr><td valign="top">
		<fieldset style="border:1px dashed #666666; width:98%; padding:10px;">
<legend align="left"><strong>Tampilkan Semua Intermezzo :</strong></legend>
<table width="100%" border="1" cellspacing="0">
	<tr style="border:1px solid #333333; background-color:#333333; color:#FFFFFF;" align="center">
		<td width="120" style="padding:5px;">Kode Intermezzo</td><td style="padding:5px;">Judul</td>
		<td style="padding:5px;">Tanggal</td>
		<td style="padding:5px;">Jam</td>
		<td style="padding:5px;">Gambar</td>
		<td style="padding:5px;">Dibaca</td>
		<td style="padding:5px;">Edit</td>
		<td style="padding:5px;">Hapus</td></tr>
	<?php
	foreach($tampil->result_array() as $tp)
	{
	echo '<tr>
				<td width="120" style="padding:5px;">IHGS-'.$tp['id_berita'].'</td><td style="padding:5px;">'.$tp['judul'].'</td>
				<td style="padding:5px;">'.$tp['tanggal'].'</td>
				<td style="padding:5px;">'.$tp['jam'].'</td>
				<td style="padding:5px;">'.$tp['gambar'].'</td>
				<td style="padding:5px;">'.$tp['dibaca'].'</td>
				<td style="padding:5px;"><a href="'.base_url().'admin/edit_promo/'.$tp['id_berita'].'">
					<img src="'.base_url().'asset/images/edit-icon.gif" border=0> Edit</a></td>
				<td style="padding:5px;">
					<a href="'.base_url().'admin/hapus_promo/'.$tp['id_berita'].'/'.$tp['gambar'].'" onClick=\'return confirm("Anda yakin ingin menghapus konten ini???")\'>
						<img src="'.base_url().'asset/images/hapus.png" border=0> Hapus</a></td></tr>';
	}
	?>
</table>
<table align="center">
	<tr>
		<td colspan="8" align="center"><?php echo $paginator; ?></td>
	</tr>
</table>

	</fieldset>
		</td>
		</tr>
		</table>
	</div>
	<div class="clear">&nbsp;</div>
</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>

