<?php
  		$hakakses=$this->session->userdata('userHakAkses');
  		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Laporan Piutang</title>
</head>
<body onload="window.print()" background="<?=base_url()?>/assets/bgh.jpg" >
	<table width="100%">
		<tr>
			<td>
				<center>
					<h4>CV BUMI INDAH<br/><br>Laporan Estimasi Cadangan Kerugian Piutang Pelanggan<br>Metode Analisa Umr Piutang</h4>
				</center>
			</td>
		</tr>
	</table>
	<br>
	<br>
	
  	<?php
  		if($hakakses=="Pimpinan"){
  	?>
  	<!--isi tabel laporan list2-->
  	<table border="1" width="100%" cellpadding="2" cellspacing="0">
	    <thead>
	      <tr>
	        <td rowspan="2"><div style="width: 30px;"><b><center>No</center></b></div></td>
	        <td rowspan="2"><div style="width: 300px;"><b><center>Kelompok Umur Piutang</center></b></div></td>
	        <td rowspan="2"><div style="width: 150px;"><b><center>Saldo (Rp)</center></b></div></td>
	        <td colspan="2"><div style="width: 300px;"><b><center>Estimasi Tidak Tertagih</center></b></div></td>
	        
	      </tr>
	      <tr>
	        <td ><div style="width: 150px;"><b><center>%</center></b></div></td>
	        <td ><div style="width: 150px;"><b><center>Rp</center></b></td>
	      </tr>
	    </thead>

	    <tbody>
	      <?php
	        $no=1;
	        $saldo=0;
	        $estimasi=0;
	        foreach ($listanalisa2 as $l) {
	      ?>
	      <tr>
	        <td><center><?=$no++?></center></td>
	        <td><?=$l->kelompok_umur?></td>
	        <td align="right"><?php echo number_format($l->saldo)?></td>
	        <td><center><?php echo number_format(($l->persen*100))?></center></td>
	        <td align="right"><?php echo number_format($l->estimasi)?></td>
	      </tr>
	       <?php   
	        $saldo=$saldo+$l->saldo;
	        $estimasi=$estimasi+$l->estimasi;
	        }
	       ?>

	      <tr>
	        <td colspan="2">Total</td>
	        
	        <td align="right"><?php echo number_format($saldo)?></td>
	        <td align="right"></td>
	        <td align="right"><?php echo number_format($estimasi)?></td>
	      </tr>
	    </tbody>
	 </table>

  	<?php
  		}elseif ($hakakses=="ADM") {
  	?>
  	<table border="1" width="100%" cellpadding="2" cellspacing="0" >
        <thead>
          <tr>
            <td width="5%" rowspan="2"><b><center>No</center></b></td>
            <td width="15%" rowspan="2"><b><center>Nama Toko</center></b></td>
            <td width="15%" rowspan="2"><b><center>Belum Jatuh Tempo(Rp)</center></b></td>
            <td width="60%" colspan="6"><b><center>Menunggak (Rp)</center></b></td>
            
          </tr>
          <tr>
            
            <td width="10%"><center>1-30 Hari</center></td>
            <td width="10%"><center>31-60 Hari</center></td>
            <td width="10%"><center>61-90 Hari</center></td>
            <td width="10%"><center>91-180 Hari</center></td>
            <td width="10%"><center>181-365 Hari</center></td>
            <td width="10%"><center>>365 Hari</center></td>
          </tr>
        </thead>

        <tbody>
          <?php
            $no=1;
            $blm_jatuh_tempo=0;
            $telat_1_30_hari=0;
            $telat_31_60_hari=0;
            $telat_61_90_hari=0;
            $telat_91_180_hari=0;
            $telat_181_365_hari=0;
            $telat_lebih_366_hari=0;
            foreach ($listanalisa as $l) {
          ?>

          <tr>
            <td><center><?=$no++?></center></td>
            <td><?=$l->plgnNama?></td>
            <td align="right"><?php echo number_format($l->blm_jatuh_tempo)?></td>
            <td align="right"><?php echo number_format($l->telat_1_30_hari)?></td>
            <td align="right"><?php echo number_format($l->telat_31_60_hari)?></td>
            <td align="right"><?php echo number_format($l->telat_61_90_hari)?></td>
            <td align="right"><?php echo number_format($l->telat_91_180_hari)?></td>
            <td align="right"><?php echo number_format($l->telat_181_365_hari)?></td>
            <td align="right"><?php echo number_format($l->telat_lebih_366_hari)?></td>
          </tr>
           <?php 
           	$blm_jatuh_tempo=$blm_jatuh_tempo+$l->blm_jatuh_tempo;
            $telat_1_30_hari=$telat_1_30_hari+$l->telat_1_30_hari;
            $telat_31_60_hari=$telat_31_60_hari+$l->telat_31_60_hari;
            $telat_61_90_hari=$telat_61_90_hari+$l->telat_61_90_hari;
            $telat_91_180_hari=$telat_91_180_hari+$l->telat_91_180_hari;
            $telat_181_365_hari=$telat_181_365_hari+$l->telat_181_365_hari;
            $telat_lebih_366_hari=$telat_lebih_366_hari+$l->telat_lebih_366_hari;  
            }
          ?>

          <tr>
            <td colspan="2">TOTAL</td>
            <td align="right"><?php echo number_format($blm_jatuh_tempo)?></td>
            <td align="right"><?php echo number_format($telat_1_30_hari)?></td>
            <td align="right"><?php echo number_format($telat_31_60_hari)?></td>
            <td align="right"><?php echo number_format($telat_61_90_hari)?></td>
            <td align="right"><?php echo number_format($telat_91_180_hari)?></td>
            <td align="right"><?php echo number_format($telat_181_365_hari)?></td>
            <td align="right"><?php echo number_format($telat_lebih_366_hari)?></td>
          </tr>
          <tr>
            <td colspan="2">Estimasi Kerugian (%)</td>
            <td align="right"><center><?php echo number_format(2)?></center></td>
            <td align="right"><center><?php echo number_format(5)?></center></td>
            <td align="right"><center><?php echo number_format(10)?></center></td>
            <td align="right"><center><?php echo number_format(20)?></center></td>
            <td align="right"><center><?php echo number_format(30)?></center></td>
            <td align="right"><center><?php echo number_format(50)?></center></td>
            <td align="right"><center><?php echo number_format(80)?></center></td>
          </tr>
          <tr>
            <td colspan="2">Estimasi Kerugian (Rp)</td>
            <td align="right"><center><?php echo number_format(2*$blm_jatuh_tempo/100)?></center></td>
            <td align="right"><center><?php echo number_format(5*$telat_1_30_hari/100)?></center></td>
            <td align="right"><center><?php echo number_format(10*$telat_31_60_hari/100)?></center></td>
            <td align="right"><center><?php echo number_format(20*$telat_61_90_hari/100)?></center></td>
            <td align="right"><center><?php echo number_format(30*$telat_91_180_hari/100)?></center></td>
            <td align="right"><center><?php echo number_format(50*$telat_181_365_hari/100)?></center></td>
            <td align="right"><center><?php echo number_format(80*$telat_lebih_366_hari/100)?></center></td>
          </tr>
          <tr>
            <td colspan="2">Total Estimasi Kerugian (Rp)</td>
            <td align="right" colspan="7"><center><?php echo number_format((2*$blm_jatuh_tempo/100)+(5*$telat_1_30_hari/100)+(10*$telat_31_60_hari/100)+(20*$telat_61_90_hari/100)+(30*$telat_91_180_hari/100)+(50*$telat_181_365_hari/100)+(80*$telat_lebih_366_hari/100))?></center></td>
            
          </tr>
        </tbody>
    </table>
  	<?php		
  		}
  	?>
  	
</body>
</html>


