
<section class="content-header">
  <h3> 
    <i class="fa fa-list-alt"></i>
    <span>Kartu Piutang</span>
  </h3>
</section>

<section class="content">
  <div class="row">
  	<div class="col-md-12">
      <div class="grid no-border">
        <div class="grid-header">
          <span class="grid-title">
            <h6>
              <button type="button" class="btn btn-primary" onclick="self.history.back()">
                  <i class="fa fa-arrow-left"></i> Kembali
              </button>
              <a href="<?=base_url()?>c_histori/cetakkartu/<?=$kodepelanggan?>/<?=$tglawal?>/<?=$tglakhir?>" target="_blank">
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
        <div class="grid-body">
          
          <table class="data-table table table-bordered table-striped" >
            <thead>
              <tr>
                <td colspan="5"><strong>Nama Toko : <?=$namapelanggan->plgnNama?></strong></td>
              <tr>
              <tr>
                <td colspan="5"><strong>Nama Pemilik : <?=$namapelanggan->plgnOwner?></strong></td>
              <tr>
                <tr>
                  <td colspan="5"></td>
                <tr>
              <tr>
                
                <th class="col-md-2">Tanggal</th>
                <th class="col-md-2">Keterangan </th>
                <th class="col-md-2">Debet</th>
                <th class="col-md-2">Kredit</th>
                <th class="col-md-2">Saldo</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                
                <td colspan="4">Saldo Awal</td>
                
                <td align="right"><?php echo number_format($listsaldoawal)?></td>
              </tr>
              <?php
                foreach ($listhistoriisi as $l) {
              ?>

              <tr> 
                
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
                <td colspan="4"></td>
                
                <td align="right"> <?php echo number_format($listsaldoakhir)?></td>
              </tr>
            </tbody>
          </table>
        </div>
       </div>
      </div>
  </div>
 </section>