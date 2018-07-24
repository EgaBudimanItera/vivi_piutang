
<!-- BEGIN CONTENT HEADER -->
<section class="content-header">
  <h3> 
    <i class="fa fa-list-alt"></i>
    <span>DASHBOARD</span>
  </h3>
</section>
<!-- END CONTENT HEADER -->
<section class="content">
  <div class="row">
    <!-- BEGIN BASIC DATATABLES -->
    <div class="col-md-12">
      <div class="grid no-border">
        <div class="grid-header">
          <i class="fa fa-perusahaan"></i>
          <span class="grid-title">
            Data Penjualan Jatuh Tempo 
          </span>
         
        </div>
        <div id="info-alert">
          <?=@$this->session->flashdata('msg')?>
        </div>  
        <div class="grid-body">
          <table id="dataTables1" class="data-table table table-hover table-bordered " >
            <thead>
              <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-3">Nama Toko</th>
                <th class="col-md-3">Kode Penjualan</th>
                <th class="col-md-3">Tanggal Jatuh Tempo</th>
                <th class="col-md-2" >Total Piutang (Rp)</th>
               <!--  <th class="col-md-2" >beda waktu</th> -->
              </tr>
            </thead>

            <tbody>
              <?php
                $no=1;
                $a=date('Y-m-d');
                $skr=new DateTime($a);
                foreach ($list as $l) {
                  $tempo=new DateTime($l->pnjlJatuhTempo);
                  $beda  = $tempo->diff($skr)->format('%a');
                  if($skr>$l->pnjlJatuhTempo){
                    $beda=$beda;
                  }
                  else{
                    $beda=$beda*-1;
                  }
                  if($beda<=0){
                    $warna='info';
                  }else if($beda>0 && $beda<=7){
                    $warna='success';
                  }else{
                    $warna='danger';
                  }
              ?>

              <tr class="<?=$warna?>">
                <td><?=$no++;?></td>
                
                <td><?=$l->plgnNama?></td>
                <td><?=$l->pnjlKode?></td>
                <td><?=$l->pnjlJatuhTempo?></td>
                
                <td align="right"><?php echo number_format($l->pnjlTotalBayar)?></td>
                <!-- <td><?=$beda?></td> -->
              </tr>
              <?php
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- END BASIC DATATABLES -->
  </div>
  <!--aaaa-->
 


</section>
