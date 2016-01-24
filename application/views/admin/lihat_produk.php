
 

<td height="450" align="justify">

<div class="clear"></div>
<div id="content-outer">
<!-- start content -->
<div id="content">
	<div id="page-heading">
		<h1><?php echo $judul; ?></h1><br>
		<table width="98%" cellpadding="10">
		<tr><td valign="top">
		<fieldset style="border:1px dashed #666666; width:98%; padding:10px;">
<legend align="left"><strong>Tampilkan Semua Produk :</strong></legend>
<table width="100%" border="1" cellspacing="0">
	<tr style="border:1px solid #333333; background-color:#333333; color:#FFFFFF;"><td width="120" style="padding:5px;">Kode Produk</td><td style="padding:5px;">Nama Produk</td><td style="padding:5px;">Kategori</td><td style="padding:5px;">Stok</td><td style="padding:5px;">Harga</td><td style="padding:5px;">Tipe Produk</td><td style="padding:5px;">Edit</td><td style="padding:5px;">Hapus</td></tr>
	<?php
	foreach($tampil->result_array() as $tp)
	{
	echo '<tr><td width="120" style="padding:5px;">'.$tp['kode_produk'].'</td><td style="padding:5px;">'.$tp['nama_produk'].'</td><td style="padding:5px;">'.$tp['nama_kategori'].'</td><td style="padding:5px;">'.$tp['stok'].'</td><td style="padding:5px;">'.$tp['harga'].'</td><td style="padding:5px;">'.$tp['tipe_produk'].'</td><td style="padding:5px;"><a href="'.base_url().'index.php/admin/edit_produk/'.$tp['kode_produk'].'"><img src="'.base_url().'asset/images/edit-icon.gif" border=0> Edit</a></td><td style="padding:5px;"><a href="'.base_url().'index.php/admin/hapus_produk/'.$tp['kode_produk'].'/'.$tp['gbr_kecil'].'" onClick=\'return confirm("Anda yakin ingin menghapus konten ini???")\'><img src="'.base_url().'asset/images/hapus.png" border=0> Hapus</a></td></tr>';
	}
	?>
</table>
<a href="<?php echo base_url();?>index.php/admin/tambah_produk"><button class="btn" type="submit" style="margin-left:1%;"> Tambah </button></a>
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



</td></tr></tbody></table>
</div></div>
    
