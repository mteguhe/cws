<?php
foreach($slide_laris->result_array() as $sl)
{
$tss = "";
$mati = "";
if($sl['stok']>0)
{
	$tss = '';
	$mati = "";
}
else
{
	$tss = '';
	$mati = "disabled";
}
			$c = array (' ');
    		$d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
			$s = strtolower(str_replace($d,"",$sl['nama_produk']));
			$link = strtolower(str_replace($c, '-', $s));
	echo '';
}
?>

	
