<!DOCTYPE html>
<html>
  <head>
	<title> Ubah Data </title>
  </head>

  <body>
    <h1> Edit Data Mahasiwa </h1>
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
    </form>
  </body>
</html>