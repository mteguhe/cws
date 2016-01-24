<script type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- format penulisan '+nm+' salah...!\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' harus angka.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' harus angka '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' masih kosong...!\n'; }
  } if (errors) { alert('Oooopppzzz,,,,ada sedikit kesalahan pada :\n'+errors);
  document.MM_returnValue = (errors == ''); }
  else { document.MM_returnValue = (errors == ''); }
}
</script>


<div id="content-center">
<div style="padding:5px; border:1px solid #ccc; margin-bottom:10px;"><a href="<?php echo base_url(); ?>">Beranda</a> > <a href="<?php echo base_url(); ?>testimonial">Testimonial Pengunjung</a> > Isi Testimonial</div>
<iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo base_url(); ?>testimonial/isi
&layout=standard&show_faces=false&width=500&action=recommend&colorscheme=light&height=40" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:500px; height:40px; color:#FFFFFF;" allowTransparency="true"></iframe> 
<h1>Isi Testimonial - Harmonis Grosir Sandal Online</h1>
Silahkan mengisi Testimonial dan Pengalaman anda selama berbelanja di website kami.
<div class="cleaner_h10"></div>

<form method="post" action="<?php echo base_url(); ?>index.php/testimonial/kirim_pesan">
<table width="100%">
<tr>
  <td width="100">Nama</td><td width="20">:</td><td><input name="nama" type="text" class="input-teks" id="nama" size="50" />
  <div id="alertnama" style="display:none; background-color:#999999; color:#FFFFFF; padding:5px;">Nama tidak diijinkan kosong</div></td>
</tr>
<tr><td width="100">Email</td><td>:</td><td><input name="email" type="text" class="input-teks" id="email" size="50" /></td></tr>
<tr><td width="100" valign="top">Pesan</td><td valign="top">:</td><td><textarea name="pesan" cols="60" rows="6" class="input-teks" id="pesan"></textarea></td></tr>
<tr><td width="100"></td><td></td><td><?php echo $gbr_captcha; ?></td></tr>
<tr><td width="100">Kode Captcha</td><td>:</td><td><input name="captcha" type="text" class="input-teks" id="captcha" size="50" /></td></tr>
<tr><td width="100"></td><td></td><td><input type="submit" class="input-tombol" onclick="MM_validateForm('nama','','R','email','','RisEmail','captcha','','R','pesan','','R');return document.MM_returnValue" value="Kirim Testimonial" />
<input type="reset" class="input-tombol" value="Kosongkan Form" /></td></tr>
</table>
</form>
</div>
