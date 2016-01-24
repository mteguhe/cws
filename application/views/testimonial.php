<div class="typrography">
	<div class="container">
  <div class="services-top">
        <h3>Testimonial</h3>
        <p>Terima kasih telah ........... ....... ........ ....... selanjutnya</p>
  </div>
      <div class="row">
       
      	<?php
if(count($testi->result_array())>0){
foreach($testi->result_array() as $tst)
{
	echo '
        
        <div class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">'.$tst['nama'].' ( '.$tst['email'].' ) <br> '.$tst['waktu'].'</h3>
            </div>
            <div class="panel-body">
              '.$tst['pesan'].'
            </div>
          </div>
        </div><!-- /.col-sm-4 -->
        
        ';
}
}
else{
echo "Maaf, belum ada Testimonial. <br>Silahkan mengisi Testimonial dan Pengalaman anda selama berbelanja di website kami.";
}
?>


      </div>
       <!--//Panels-->
       
	</div>
	</div>
</div>
<!--typo end here-->

<br> 
<p align="center" style="margin:0px auto; padding:0px;"><a href="<?php echo base_url(); ?>index.php/testimonial/isi"><img src="<?php echo base_url(); ?>asset/images/kirim-testimonial.png" border="0"/></a></p>

	
<table align="center"><tr><td><?php echo $paginator; ?></td></tr></table>
<br>





	
