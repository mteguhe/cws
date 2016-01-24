<!DOCTYPE html>
<html>
  <head>
	<title> Show Database </title>
	<!--link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css"-->
  </head>

  <body>
  <h1> Data Mahasiswa </h1>
  <?php
	if(count($siswa) == 0){
		echo "Belum ada data Mahasiwa<br /><br />";
	} else {
  ?>
  <table border="1px" cellpadding="10px" width="40%">
  <tr>
    <th width="1%"> No </th>
    <th> NPM </th>
    <th> Nama </th>
    <th> Aksi </th>
  </tr>
  <?php $no = 1;
  		foreach($siswa as $s): ?>
  <tr align="center">
    <td> <?php echo $no ?></td>
    <td> <?php echo $s->NPM ?></td>
    <td> <?php echo $s->Nama ?></td>
    <td> <?php echo anchor('awal/ubah_siswa/'.$s->NPM, 'Ubah ') ?> ||
         <?php echo anchor('awal/hapus_siswa/'.$s->NPM, 'Hapus') ?> </td>
  </tr>

  <?php $no++;
  		endforeach ?>
  </table>
  <?php } ?>
  <br><br>
  <a href ="<?php echo base_url();?>index.php/awal/tambah" class="btn"> Tambah </a>
  </body>
</html>
