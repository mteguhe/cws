<!DOCTYPE html>
<html>
  <head>
	<title> Tambah Data </title>
  </head>

  <body>
    <h1> Data Mahasiwa Baru </h1>
    <form method="post" action="<?php echo base_url();?>index.php/awal/tambah_siswa">
    <table cellpadding="4">
    <tr>
      <td> NPM </td>
      <td> <input type="text" name="NPM" autocomplete="off" placeholder="NPM" maxlength="9" autofocus required/> </td>
    </tr>
    <tr>
      <td> Nama </td>
      <td> <input type="text" name="Nama" autocomplete="off" placeholder="Nama" maxlength="80" required/> </td>
    </tr>
    </table>
    <br>
    <button type="submit">Tambah</button>
    </form>
  </body>
</html>
