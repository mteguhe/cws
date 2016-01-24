<?php
echo $scriptmce;
?>
<div class="clear"></div>
<div id="content-outer">
<!-- start content -->
<div id="content">
	<div id="page-heading">
	
		<h1><?php echo $judul; ?></h1><br>		<table width="98%" cellpadding="10">
		<?php
			foreach($kat->result_array() as $et)
			{
		?>
		<tr><td valign="top">
		<fieldset style="border:1px dashed #666666; width:98%; padding:10px;">
<legend align="left"><strong>Form Tambah Intermezzo :</strong></legend>
<form method="post" action="<?php echo base_url(); ?>admin/update_trend" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $et['id_berita']; ?>" />
<input type="hidden" name="gbr" value="<?php echo $et['gambar']; ?>" />
<table width="100%">
	<tr><td width="150">Judul Intermezzo</td><td>:</td><td><input type="text" name="judul" class="login-inp" size="90" value="<?php echo $et['judul']; ?>"> </td></tr>
	<tr><td width="150" valign="top">Isi</td><td valign="top">:</td><td><textarea name="isi" cols="60" rows="10"><?php echo $et['isi_berita']; ?></textarea></td></tr>
	<tr><td width="150" valign="top">Gambar</td><td valign="top">:</td><td><img src="<?php echo base_url(); ?>asset/intermezzo/<?php echo $et['gambar']; ?>"  width="300"/></td></tr>
	<tr><td width="150">Upload Gambar</td><td>:</td><td><input type="file" name="userfile" class="login-inp" size="30"> * Resolusi gambar maksimal 300 x 300 px</td></tr>
	<tr><td width="120"></td><td></td><td><input type="submit" class="input-tombol" value="Simpan Data"> </td></tr>
</table>
</form>
	</fieldset>
		</td></tr>
		<?php
		}
		?>
		</table>
	</div>
	<div class="clear">&nbsp;</div>
</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>

