<?php
echo $scriptmce;
?>
<div class="clear"></div>
<div id="content-outer">
<!-- start content -->
<div id="content">
	<div id="page-heading">
	
		<h1><?php echo $judul; ?></h1><br>		<table width="98%" cellpadding="10">
		<tr><td valign="top">
		<fieldset style="border:1px dashed #666666; width:98%; padding:10px;">
<legend align="left"><strong>Form Tambah Kategori Produk :</strong></legend>
<form method="post" action="<?php echo base_url(); ?>admin/tambah_kategori_verif">
<table width="100%">
	<tr><td width="150">Nama Kategori Produk</td><td>:</td><td><input type="text" name="nama" class="login-inp" size="60"> </td></tr>
	<tr><td width="150">Kategori Produk</td><td>:</td><td>
	<select name="kategori" class="login-inp">
	<option value="0">Induk</option>
	<?php
		foreach($kat->result_array() as $k)
		{
			echo '<option value="'.$k['id_kategori'].'">'.$k['nama_kategori'].'</option>';
		}
	?>
	</select>
	</td></tr>
	<tr><td width="150">Tingkatan Level</td><td>:</td><td>
	<select name="tingkat" class="login-inp">
	<option value="0">Tingkat Induk</option>
	<option value="1">Tingkat 1</option>
	<option value="2">Tingkat 2</option>
	</select>
	</td></tr>
	<tr><td width="120"></td><td></td><td><input type="submit" class="input-tombol" value="Simpan Data"> </td></tr>
</table>
</form>
	</fieldset>
		</td></tr>
		</table>
	</div>
	<div class="clear">&nbsp;</div>
</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>

