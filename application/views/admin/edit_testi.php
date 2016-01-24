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
<legend align="left"><strong>Form Edit Member :</strong></legend>
<form method="post" action="<?php echo base_url(); ?>index.php/admin/update_testi" enctype="multipart/form-data">
<?php
foreach($kat->result_array() as $k)
{
?>
<input type="hidden" name="id" value="<?php echo $k['id_testi']; ?>" />
<table width="100%">
	<tr><td width="150">Nama Pengirim</td><td>:</td><td><input type="text" name="nama" class="login-inp" size="60" value="<?php echo $k['nama']; ?>"> </td></tr>
	<tr><td width="150">Email</td><td>:</td><td><input type="text" name="email" class="login-inp" size="60" value="<?php echo $k['email']; ?>"> </td></tr>
	<tr><td width="150">Waktu</td><td>:</td><td><input type="text" name="waktu" class="login-inp" size="60" value="<?php echo $k['waktu']; ?>"> </td></tr>
	<tr><td width="150" valign="top">Isi Pesan</td><td valign="top">:</td>
	<td><textarea name="pesan" rows="10" cols="60"><?php echo $k['pesan']; ?></textarea></td></tr>
	<tr><td width="150">Status</td><td>:</td><td>
	<select name="stts" class="login-inp">
	<?php
		if($k['status']==0)
		{
			echo '<option value=0 selected>Tidak Aktif</option><option value=1>Aktif</option>';
		}
		else if($k['status']==1)
		{
			echo '<option value=0>Tidak Aktif</option><option value=1 selected>Aktif</option>';
		}
	?>
	</select>
	</td></tr>
	<tr><td width="120"></td><td></td><td><input type="submit" class="input-tombol" value="Simpan Data"> </td></tr>
</table>
<?php
}
?>
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

