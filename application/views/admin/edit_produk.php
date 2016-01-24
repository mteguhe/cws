
    


<div class="clear"></div>
<div id="content-outer">
<!-- start content -->
<div id="content">
	<div id="page-heading">
	
		<h1><?php echo $judul; ?></h1><br>		<table width="98%" cellpadding="10">
		<tr><td valign="top">
		<fieldset style="border:1px dashed #666666; width:98%; padding:10px;">
<legend align="left"><strong>Form Edit Produk :</strong></legend>
<form method="post" action="<?php echo base_url(); ?>index.php/admin/update_produk" enctype="multipart/form-data">
<?php
foreach($ls->result_array() as $e)
{
?>
<input type="hidden" name="id" value="<?php echo $e['kode_produk']; ?>" />
<input type="hidden" name="gbr" value="<?php echo $e['gbr_kecil']; ?>" />
<input type="hidden" name="gbr2" value="<?php echo $e['gbr_kecil2']; ?>" />
<table width="100%">
	<tr><td width="120">Kode Produk</td><td width="10">:</td><td><input type="text" name="kd" readonly="readonly" class="login-inp" size="40" value="<?php echo $e['kode_produk']; ?>"> </td></tr>
	<tr><td width="150">Nama Produk</td><td>:</td><td><input type="text" name="nama" class="login-inp" size="60" value="<?php echo $e['nama_produk']; ?>"> </td></tr>
	<tr><td width="150">Kategori Produk</td><td>:</td><td>
	<select name="kategori" class="login-inp">
	<?php
		foreach($kat->result_array() as $k)
		{
			if($e['id_kategori']==$k['id_kategori'])
			{
				echo '<option value="'.$k['id_kategori'].'" selected>'.$k['nama_kategori'].'</option>';
			}
			else
			{
				echo '<option value="'.$k['id_kategori'].'">'.$k['nama_kategori'].'</option>';
			}
		}
	?>
	</select>
	</td></tr>
	<tr><td width="150">Tipe Produk</td><td>:</td><td>
	<select name="tipe" class="login-inp">
	<?php
		if($e['tipe_produk']=="pria"){
	?>
		<option value="pria" selected="selected">Pria</option>
		<option value="wanita">Wanita</option>
		<option value="tanggung">Tanggung</option>
		<option value="anak">Anak</option>
		<option value="baby">Baby</option>
	<?php
		}elseif($e['tipe_produk']=="wanita"){
	?>
		<option value="pria">Pria</option>
		<option value="wanita" selected="selected">Wanita</option>
		<option value="tanggung">Tanggung</option>
		<option value="anak">Anak</option>
		<option value="baby">Baby</option>
	<?php
		}elseif($e['tipe_produk']=="tanggung"){
	?>
		<option value="pria">Pria</option>
		<option value="wanita">Wanita</option>
		<option value="tanggung" selected="selected">Tanggung</option>
		<option value="anak">Anak</option>
		<option value="baby">Baby</option>
	<?php
		}elseif($e['tipe_produk']=="anak"){
	?>
		<option value="pria">Pria</option>
		<option value="wanita">Wanita</option>
		<option value="tanggung">Tanggung</option>
		<option value="anak" selected="selected">Anak</option>
		<option value="baby">Baby</option>
	<?php
		}elseif($e['tipe_produk']=="baby"){
	?>
		<option value="pria">Pria</option>
		<option value="wanita">Wanita</option>
		<option value="tanggung">Tanggung</option>
		<option value="anak">Anak</option>
		<option value="baby" selected="selected">Baby</option>
	<?php
		}
	?>
	</select>
	</td></tr>
	<tr><td width="120">Harga</td><td>:</td><td><input type="text" name="harga" class="login-inp" size="60" value="<?php echo $e['harga']; ?>"> </td></tr>
	<tr><td width="120">Stok Barang</td><td>:</td><td><input type="text" name="stok" class="login-inp" size="60" value="<?php echo $e['stok']; ?>"> </td></tr>
	<tr><td width="120">Dibeli</td><td>:</td><td><input type="text" name="dibeli" class="login-inp" size="20" value="<?php echo $e['dibeli']; ?>"> </td></tr>
	<tr><td width="120" valign="top">Deskripsi Produk</td><td valign="top">:</td><td><textarea name="deskripsi" class="login-inp" cols="70" rows="8"><?php echo $e['deskripsi']; ?></textarea></td></tr>
	<tr><td width="120" valign="top">Gambar</td><td valign="top">:</td><td><img src="<?php echo base_url(); ?>asset/produk/<?php echo $e['gbr_kecil']; ?>"</td></tr>
	<tr><td width="120">Ganti Gambar</td><td>:</td><td><input type="file" size="40" name="imagefile" class="login-inp"> * Gambar maksimal ukuran 400px</td></tr>
	<tr><td width="120" valign="top">Gambar</td><td valign="top">:</td><td><img src="<?php echo base_url(); ?>asset/produk/<?php echo $e['gbr_kecil2']; ?>"</td></tr>
	<tr><td width="120">Ganti Gambar</td><td>:</td><td><input type="file" size="40" name="imagefile2" class="login-inp"> * Gambar maksimal ukuran 400px</td></tr>
	<tr><td width="120"></td><td></td><td><input type="submit" class="input-tombol" value="Simpan Data"> </td></tr>
</table>
</form>
	</fieldset>
		</td></tr>
		</table>
<?php
}
?>
	</div>
	<div class="clear">&nbsp;</div>
</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>


</td></tr></tbody></table>
</div></div>
    
