<!DOCTYPE html>
<html>
  <head>
	    <title> Tambah Data Mahasiswa </title>
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css">
  </head>

  <body>
    <div id="navmenu">
      <ul>
          <li><a href="<?php echo base_url();?>index.php/admin">Batal</a></li>
      </ul>
    </div>

	<h3 align="center"> Data Mahasiwa Baru </h3>

	<div id="input" align="center">
	 	<form method="post" action="<?php echo base_url();?>index.php/admin/tambah_siswa">
			<input type="text" name="NPM" placeholder="NPM" autocomplete="off" autofocus required> <br>
			<input type="text" name="Nama" placeholder="Nama" required><br>
			<button class="btn" type="submit" style="margin-left:25%;"> Simpan </button> <br> <br>
		</form>
	</div>
  </body>
</html>