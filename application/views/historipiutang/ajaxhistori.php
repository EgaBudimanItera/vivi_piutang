
<div id="info-alert1">
    <?=@$this->session->flashdata('msg')?>
</div>
<table class="data-table table table-bordered table-striped" >
	<thead>
	  <tr>
	    <th class="col-md-2">Nama Toko</th>
	    <th class="col-md-2">Tanggal</th>
	    <th class="col-md-2">Keterangan </th>
	    <th class="col-md-2">Debet</th>
	    <th class="col-md-2">Kredit</th>
	    <th class="col-md-2">Saldo</th>
	  </tr>
	</thead>

	<tbody>
	  <tr>
	  	
	    <td colspan="5">Saldo Awal</td>
	    
	    <td align="right"><?php echo number_format($listsaldoawal)?></td>
	  </tr>
	  <?php
	  	foreach ($listisi as $l) {
	  ?>

	  <tr> 
	    <td><?=$l->plgnNama?></td>
	    <td><?=$l->histTanggal?></td>
	    <td><?=$l->histKeterangan?></td>
	    <td align="right"><?php echo number_format($l->histDebet)?></td>
	    <td align="right"><?php echo number_format($l->histKredit)?></td>
	    <td align="right"><?php echo number_format($l->histSaldo)?></td>
	  </tr>
	   <?php
	  	}
	  ?>
	  <tr>
	  	<td colspan="5"></td>
	    
	    <td align="right"> <?php echo number_format($listsaldoakhir)?></td>
	  </tr>
	</tbody>
</table>

<script type="text/javascript">
	$(document).ready(function(){
		$("#info-alert1").fadeTo(2000,50).slideUp(50,function(){
          $("#info-alert1").slideUp(50);
      });
	});
</script>