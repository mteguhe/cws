<!DOCTYPE html>
<html>
  <head>
    <title> Jadwal Mahasiswa </title>
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
    
    <h1 align="center"> Jadwal Mahasiswa </h1><hr><br>

    <table id="example" class="display" cellspacing="0" width="100%">
    <?php
      if(count($jadwal) == 0){
        echo "Belum ada Jadwal Mahasiwa<br /><br />";
    } else {
    ?>
    <thead>
    <tr bgcolor="#00FFFF">
      <th> No </th>
      <th> NPM </th>
      <th> Mata Kuliah </th>
      <th> Kelas </th>
    </tr>  
    </thead>

    <tfoot>
    <tr>
      <th> No </th>
      <th> NPM </th>
      <th> Mata Kuliah </th>
      <th> Kelas </th>
    </tr>
    </tfoot>

    <tbody>
    <?php $no = 1;
        foreach($jadwal as $j): ?>
    <tr align="center">
      <td> <?php echo $no ?></td>
      <td> <?php echo $j->NPM ?></td>
      <td> <?php echo $j->matkul ?></td>
      <td> <?php echo $j->kelas ?></td>
      <?php $no++;
        endforeach; ?>
    </tr>
    </tbody>

    </table>
    <?php } ?>
    <br><br>
  </body>
</html>
