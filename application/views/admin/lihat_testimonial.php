<div class="clear"></div>
<div id="content-outer">
<!-- start content -->
<div id="content">
	<div id="page-heading">
	
		<h1><?php echo $judul; ?></h1><br>
		<table width="98%" cellpadding="10">
		<tr><td valign="top">
		<fieldset style="border:1px dashed #666666; width:98%; padding:10px;">
<legend align="left"><strong>Tampilkan Semua Testimonial :</strong></legend>
<table width="100%" border="1" cellspacing="0">
	<tr style="border:1px solid #333333; background-color:#333333; color:#FFFFFF;">
		<td width="120" style="padding:5px;">Kode Testimonial</td>
		<td style="padding:5px;">Nama Pengirim</td><td style="padding:5px;">Email</td>
		<td style="padding:5px;">Pesan</td><td style="padding:5px;">Waktu</td><td style="padding:5px;">Status</td>
		<td style="padding:5px;">Edit</td><td style="padding:5px;">Hapus</td></tr>
	<?php
	foreach($ls->result_array() as $tp)
	{
	$st="Tidak Aktif";
	if($tp['status']==1)$st="Aktif";
	echo '<tr>
		<td width="120" style="padding:5px;">THGS-'.$tp['id_testi'].'</td><td style="padding:5px;">'.$tp['nama'].'</td>
		<td style="padding:5px;">'.$tp['email'].'</td>
		<td style="padding:5px;">'.substr($tp['pesan'],0,40).'....</td>
		<td style="padding:5px;">'.$tp['waktu'].'</td>
		<td style="padding:5px;">'.$st.'</td>
		<td style="padding:5px;"><a href="'.base_url().'index.php/admin/edit_testi/'.$tp['id_testi'].'">
									<img src="'.base_url().'asset/images/edit-icon.gif" border=0> Edit</a></td><td style="padding:5px;">
								<a href="'.base_url().'index.php/admin/hapus_testi/'.$tp['id_testi'].'" onClick=\'return confirm("Anda yakin ingin menghapus konten ini???")\'>
									<img src="'.base_url().'asset/images/hapus.png" border=0> Hapus</a></td>
	</tr>';
	}
	?>
</table>
<table align="center"><tr><td colspan="8" align="center"><?php echo $paginator; ?></td></tr></table>
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

