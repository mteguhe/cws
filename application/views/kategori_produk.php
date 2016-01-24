	<ul class="res">
	<?php
		foreach($menu->result_array() as $m1)
		{
			$ambil = "";
			$ambil_kat = $this->m_help_page->ambil_id($m1['id_kategori']);
			foreach($ambil_kat->result() as $ak1)
			{
				$ambil .= "-".$ak1->id_kategori;
				$ambil_kat2 = $this->m_help_page->ambil_id($ak1->id_kategori);
				foreach($ambil_kat2->result() as $ak2)
				{
					$ambil .= "-".$ak2->id_kategori;
				}
			}
			$nm_link1 = $m1['id_kategori'].''.$ambil;
			$ld1 = strtolower(str_replace(" ","-",$nm_link1));
			$sub1 = $this->m_help_page->menu_kategori('1',$m1['id_kategori']);

			//if(count($sub1->result_array())>0){
				//echo '<li><a href="#">'.$m1['nama_kategori'].'</a><ul>';
			//}
			//else{
				echo '<li><a href="'.$this->config->item('base_url').'kategori/produk/'.$ld1.'">'.$m1['nama_kategori'].'</a><ul>';
			//}
			
			foreach($sub1->result() as $sm1)
			{
				$gbr = "";
				$ambil2 = "";
				$ambil2_kat = $this->m_help_page->ambil_id($sm1->id_kategori);
				foreach($ambil2_kat->result() as $ak1_2)
				{
					$ambil2 .= "-".$ak1_2->id_kategori;
					$ambil2_kat2 = $this->m_help_page->ambil_id($ak1_2->id_kategori);
					foreach($ambil2_kat2->result() as $ak2_2)
					{
						$ambil2 .= "-".$ak2_2->id_kategori;
					}
				}
				
				$nm_link2 = $sm1->id_kategori.''.$ambil2;

				$ld2 = strtolower(str_replace(" ","-",$nm_link2));
				$sub2 = $this->m_help_page->menu_kategori('2',$sm1->id_kategori);
				if(count($sub2->result())>0) 
				{
					$gbr='<img src="'.base_url().'asset/images/right.gif" border="0" align="right">';
					//echo '<li><a href="#">'.$sm1->nama_kategori.''.$gbr.'</a><ul>';
					echo '<li><a href="'.$this->config->item('base_url').'index.php/kategori/produk/'.$ld2.'">'.$sm1->nama_kategori.' '.$gbr.'</a><ul>';
				}
				else
				{
					echo '<li><a href="'.$this->config->item('base_url').'index.php/kategori/produk/'.$ld2.'">'.$sm1->nama_kategori.'</a><ul>';
				}
				
				foreach($sub2->result() as $sm2)
				{
					$nm_link3 = $sm2->id_kategori;
					$ld3 = strtolower(str_replace(" ","-",$nm_link3));
					echo '<li><a href="'.$this->config->item('base_url').'index.php/kategori/produk/'.$ld3.'">'.$sm2->nama_kategori.'</a></li>';
				}
				
				echo '</ul>';
				echo '</li>';
				
			}
			echo '</ul>';
			echo '</li>';
		}
	?>
	</ul>