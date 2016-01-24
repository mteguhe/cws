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
<legend align="left"><strong>Form Tambah Intermezzo :</strong></legend>
<form method="post" action="<?php echo base_url(); ?>admin/tambah_trend_verif" enctype="multipart/form-data">
<table width="100%">
	<tr><td width="150">Judul Intermezzo</td><td>:</td><td><input type="text" name="judul" class="login-inp" size="90"> </td></tr>
	<tr><td width="150" valign="top">Isi</td><td valign="top">:</td><td><textarea name="isi" cols="60" rows="10"></textarea></td></tr>
	<tr><td width="150">Gambar</td><td>:</td><td><input type="file" name="userfile" class="login-inp" size="30"> * Resolusi gambar maksimal 300 x 300 px</td></tr>
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

