
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cetak Nota Penjualan</title>
</head>
<body onload="window.print()" background="<?=base_url()?>/assets/bgh.jpg" >
	<center>
	<table width="50%">
		<tr>
			<td>
			  <table>
			  	<tr>
			  	  <td>
			  	  	<h4>CV BUMI INDAH</h4>
			  	  </td>
			  	</tr>
			  	<tr>
			  	 <td>
			  	 	Jl. Ikan Kakap No 52B
			  	 </td>
			  	</tr>
			  	<tr>
			  	  <td>
			  	  	Toko Telp.(0721)484250	
			  	  </td>
			  	 
			  	</tr>
			  	<tr>
			  	  <td>
			  	  	Gudang Telp.(0721)31322	
			  	  </td>
			  	 
			  	</tr>
			  	<tr>
			  	  <td>
			  	  	Teluk Betung	
			  	  </td>
			  	 
			  	</tr>
			  	<tr>
			  	  <td>
			  	  	Bandar Lampung
			  	  </td>
			  	 
			  	</tr>
			  	<tr>
			  	<td>
			  		&nbsp;
			  	</td>
			  	</tr>
			  	<tr>
			  	  <td>
			  	  	<b>Kode Penjualan </b> <?=$listpelanggan->pnjlKode?>	
			  	  </td>
			  	 
			  	</tr>
			  </table>
			</td>
			<td>
				<?php
					$tanggal=$listpelanggan->pnjlTanggal;
				?>
			  <table>
			  	<tr>
			  	 <td>
			  	 	Telukbetung, <?=date("d M Y", strtotime($listpelanggan->pnjlTanggal))?>
			  	 </td>
			  	</tr>
			  	<tr>
			  		<td>
			  			Kepada Yth,
			  		</td>
			  	</tr>
			  	<tr>
			  		<td>
			  			<?=$listpelanggan->plgnNama?>
			  		</td>
			  	</tr>
			  	<tr>
			  		<td>
			  			<?=$listpelanggan->plgnAlamat?>
			  		</td>
			  	</tr>
			  </table>	
			</td>
		</tr>
	</table>
	
    <br>        
	<table border="1" width="50%" cellpadding="2" cellspacing="0">
	    <tr >
	        <td ><div style="width: 100px;"><b>Banyaknya</b></div></td>
	        <td ><div style="width: 100px;"><b>Nama Barang</b></div></td>
	        <td ><div style="width: 100px;"><b>Satuan</b></div></td>
	        <td ><div style="width: 100px;"><b>Harga Satuan (Rp)</b></div></td>
	        <td ><div style="width: 100px;"><b>Jumlah (Rp)</b></div></td>
	       
	    </tr> 
	    
	   
	    
	    <?php
            foreach ($listnota as $l) {
        ?>
	    <tr >
	        <td><?=$l->detpJumlah?></td>
            <td><?=$l->brngNama?></td>
            <td><?=$l->stunNama?></td>
            <td align="right"><?php echo number_format($l->detpHarga)?></td>
            <td align="right"><?php echo number_format($l->detpHarga*$l->detpJumlah)?></td>
            
	    </tr>
	   	<?php
	   	}
	   	?>
	</table> 
</center>
</body>
</html>

