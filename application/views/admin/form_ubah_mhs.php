<!DOCTYPE html>
<html>
  <head>
	<title> Ubah Data Mahasiswa </title>
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css">
  </head>

  <body>
    <!--h1> Edit Data Mahasiwa </h1>
    <form method="post" action="">
    <table cellpadding="4">
    <tr>
      <td> NPM </td>
      <td> <input type="text" name="NPM" autocomplete="off" placeholder="NPM" maxlength="9" autofocus required value="<?php echo $id->NPM ?>"/> </td>
    </tr>
    <tr>
      <td> Nama </td>
      <td> <input type="text" name="Nama" autocomplete="off" placeholder="Nama" maxlength="80" required/ value="<?php echo $id->Nama ?>"> </td>
    </tr>
    </table>
    <br>
    <button type="submit">Simpan</button>
    </form-->

    <div id="navmenu">
      <ul>
          <li><a href="<?php echo base_url();?>index.php/admin">Batal</a></li>
      </ul>
    </div>

    <h3 align="center"> Edit Mahasiwa </h3>

    <div id="input" align="center">
      <form method="post" action="">
        <input type="text" name="NPM" placeholder="NPM" autocomplete="off" autofocus required value="<?php echo $id->NPM ?>" /> <br>
        <input type="text" name="Nama" placeholder="Nama" required value="<?php echo $id->Nama ?>" /><br>
        <button class="btn" type="submit" style="margin-left:25%;"> Simpan </button> <br> <br>
      </form>
    </div>
  </body>
</html>