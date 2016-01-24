<!DOCTYPE html>
<html>
  <head>
    <title> Data Mahasiswa </title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery.dataTables.min.css" type="text/css">
	  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css">

    <script src="<?php echo base_url();?>assets/js/jquery-1.11.3.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>

    <script>
      $(document).ready(function() {
          $('#example').DataTable( {
              "pagingType": "full_numbers"
          } );
      } );
    </script>
  </head>

  <body>
    <div id="navmenu">
      <ul>
          <li><a href="<?php echo base_url();?>index.php/admin">Mahasiswa</a></li>
        <li><a href="<?php echo base_url();?>index.php/admin/jadwal">Jadwal</a></li>
        <li><a href="<?php echo base_url();?>index.php/admin/user">Admin</a></li>
        <li><a href="<?php echo base_url();?>index.php/login/logout">LogOut</a></li>
      </ul>
    </div>
    
    <h1 align="center"> Data Mahasiswa </h1><hr><br>

    <h2> Hai, <?php echo $this->session->userdata("username");?> </h2>

    <table id="example" class="display" cellspacing="0" width="100%">
    <?php
      if(count($siswa) == 0){
        echo "Belum ada data Mahasiwa<br /><br />";
    } else {
    ?>
    <thead>
    <tr bgcolor="#00FFFF">
      <th> No </th>
      <th> NPM </th>
      <th> Nama </th>
      <th> Aksi </th>
    </tr>  
    </thead>

    <!--tfoot>
    <tr>
      <th> No </th>
      <th> NPM </th>
      <th> Nama </th>
    </tr>
    </tfoot-->

    <tbody>
    <?php $no = 1;
        foreach($siswa as $s): ?>
    <tr align="center">
      <td> <?php echo $no ?></td>
      <td> <?php echo $s->NPM ?></td>
      <td> <?php echo $s->Nama ?></td>
      <td> <?php echo anchor('admin/ubah_siswa/'.$s->NPM, 'Ubah ') ?> ||
           <?php echo anchor('admin/hapus_siswa/'.$s->NPM, 'Hapus') ?> </td-->
      <?php $no++;
        endforeach; ?>
    </tr>
    </tbody>

    </table>
    <?php } ?>
    <br><br>
    <a href="<?php echo base_url();?>index.php/admin/tambah" class="btn"> Tambah Data </a>
  </body>
</html>
