<?php
  $hakakses=$this->session->userdata('userHakAkses');
?>
<!-- BEGIN CONTENT HEADER -->
<section class="content-header">
  <h3> 
    <i class="fa fa-list-alt"></i>
    <span>Data Analisa Kerugian Piutang</span>
  </h3>
</section>
<!-- END CONTENT HEADER -->
<section class="content">
  <?php
    if($hakakses=="ADM"){
      ?>
  <div class="row">
    <!-- BEGIN BASIC DATATABLES -->
    <div class="col-md-12">
      <div class="grid no-border">
        <div class="grid-header">

          <span class="grid-title">
            <h6>
              <a href="<?=base_url()?>c_histori/cetakanalisis" target="_blank">
                <button type="button" class="btn btn-success" >
                    <i class="fa fa-print"></i> Cetak
                </button>
              </a>
            </h6>
          </span>
          <div class="pull-right grid-tools">
            <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
            <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
            <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div id="info-alert">
          <?=@$this->session->flashdata('msg')?>
        </div>  
        <div class="grid-body">
          <table id="dataTables1" class="data-table table table-bordered table-striped" >
            <thead>
              <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-2">Nama Toko</th>
                <th class="col-md-2">Belum Jatuh Tempo(Rp)</th>
                <th class="col-md-2">Telat 1-30 Hari(Rp)</th>
                <th class="col-md-2">Telat 31-60 Hari(Rp)</th>
                <th class="col-md-2">Telat 61-90 Hari(Rp)</th>
                <th class="col-md-2">Telat 91-180 Hari(Rp)</th>
                <th class="col-md-2">Telat 181-365 Hari(Rp)</th>
                <th class="col-md-2">Telat >365 Hari(Rp)</th>
              </tr>
            </thead>

            <tbody>
              <?php
                $no=1;
                foreach ($listanalisa as $l) {
              ?>

              <tr>
                <td><?=$no++?></td>
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
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- END BASIC DATATABLES -->
  </div>
  <?php
    }elseif($hakakses=="Pimpinan"){
  ?>
  <div class="row">
    <!-- BEGIN BASIC DATATABLES -->
    <div class="col-md-12">
      <div class="grid no-border">
        <div class="grid-header">
          <span class="grid-title">
            <h6>
              <a href="<?=base_url()?>c_histori/cetakanalisis" target="_blank">
                <button type="button" class="btn btn-success" >
                    <i class="fa fa-print"></i> Cetak
                </button>
              </a>
            </h6>
          </span>
          <div class="pull-right grid-tools">
            <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
            <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
            <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div id="info-alert">
          <?=@$this->session->flashdata('msg')?>
        </div>  
        <div class="grid-body">
          <table class="data-table table table-bordered table-striped" >
            <thead>
              <tr>
                <td class="col-md-1" rowspan="2"><center>No</center></td>
                <td class="col-md-2" rowspan="2"><center>Kelompok Umur Piutang</center></td>
                <td class="col-md-2" rowspan="2"><center>Saldo</center></td>
                <td class="col-md-2" colspan="2"><center>Estimasi Tidak Tertagih</center></td>
                
              </tr>
              <tr>
                
                <td class="col-md-2"><center>%</center></td>
                <td class="col-md-2"><center>Rp</center></td>
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
                <td><?=$no++?></td>
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
        </div>
      </div>
    </div>
    <!-- END BASIC DATATABLES -->
  </div>
  <?php
    }
  ?>
</section>
