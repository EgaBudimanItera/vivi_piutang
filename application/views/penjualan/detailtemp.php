<div id="info-alert1">
    <?=@$this->session->flashdata('msg')?>
</div>
<table id="dataTables1" class="data-table table table-bordered table-striped" >
	<thead>
	  <tr>
	    <th class="col-md-1">No</th>
	    <th class="col-md-1">Kode Barang</th>
	    <th class="col-md-2">Nama Barang</th>
	    <th class="col-md-2">Jumlah </th>
	    <th class="col-md-2">Harga Jual (Rp)</th>
	    <th class="col-md-3">Subtotal (Rp)</th>
	    <th class="col-md-2">Aksi</th>
	  </tr>
	</thead>

	<tbody>
	  <?php
	  	$no=1;
	  	$total=0;
	  	foreach ($listbarang as $br ) {
	  ?>

	  <tr>
	    <td><?=$no++;?></td>
	    <td><?=$br->detpBrngKode?></td>
	    <td><?=$br->brngNama?></td>
	    <td><?=$br->detpJumlah?></td>
	    <td align="right"><?php echo number_format($br->detpHarga)?></td>
	    <td align="right"><?php echo number_format($br->subtotal)?></td>
	    <td> 
	    	<center>
	    		<a href="#" style="color:#DAA520; text-decoration:none;" onclick="if(confirm('Apakah anda yakin?')) hapustemp('<?=$br->detpId?>');">
	    			<button type="button" class="btn btn-danger btn-xs">
                        <i class="fa fa-trash-o"></i>                      
                      </button>
                 </a>	
	    	</center> 
	    	           
	    </td>
	  </tr>
	  <?php	
	  	$total=$total+$br->subtotal;
	  	}
	  ?>
	  <tr>
	  	<td colspan="5" ><center><b>Total (Rp)</b></center></td>
	  	<td align="right"><?php echo number_format($total)?></td>
	  	<td></td>	
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