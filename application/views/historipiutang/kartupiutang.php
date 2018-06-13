<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cetak Kartu Piutang</title>
</head>
<body onload="window.print()" background="<?=base_url()?>/assets/bgh.jpg" >
	<table width="100%">
		<tr>
			<td>
				<center>
					<h4>CV BUMI INDAH<br/>Periode <?=date("d F Y", strtotime($tglawal));?> - <?=date("d F Y", strtotime($tglakhir));?><br><br>Kartu Piutang Pelanggan</h4>
				</center>
			</td>
		</tr>
	</table>
	<br>
	<br>
	<table border="0" >
        <tr>
            <td style="200px;"><div style="width: 200px;">Kode Pelanggan</div></td>
            <td style="300px;"><div style="width: 300px;"><?=$listpelanggan->plgnKode?></div></td>
        </tr>
        <tr >
            <td >Nama Pelanggan</td>
            <td ><?=$listpelanggan->plgnNama?></td>
        </tr>
        <tr >
            <td >Nama Pemilik</td>
            <td ><?=$listpelanggan->plgnOwner?></td>
        </tr>
    </table>
    <br>        
	<table border="1" width="100%" cellpadding="2" cellspacing="0">
	    <tr >
	        <td ><div style="width: 100px;"><b>Tanggal</b></div></td>
	        <td ><div style="width: 100px;"><b>Keterangan</b></div></td>
	        <td ><div style="width: 100px;"><b>Debet (Rp)</b></div></td>
	        <td ><div style="width: 100px;"><b>Kredit (Rp)</b></div></td>
	        <td ><div style="width: 100px;"><b>Saldo (Rp)</b></div></td>
	    </tr> 
	    
	    <tr >
	         <td colspan="4">Saldo Awal</td>
             <td align="right"><?php echo number_format($listsaldoawal)?></td>
	    </tr>
	    
	    <?php
            foreach ($listhistoriisi as $l) {
        ?>
	    <tr >
	        <td><?=date("d-m-Y", strtotime($l->histTanggal))?></td>
            <td><?=$l->histKeterangan?></td>
            <td align="right"><?php echo number_format($l->histDebet)?></td>
            <td align="right"><?php echo number_format($l->histKredit)?></td>
            <td align="right"><?php echo number_format($l->histSaldo)?></td>
	    </tr>
	    <?php
            }
        ?>
	  
	    <tr >
	        <td colspan="4"></td>
            <td align="right"> <?php echo number_format($listsaldoakhir)?></td>
	    </tr>
	     
	</table> 
</body>
</html>

