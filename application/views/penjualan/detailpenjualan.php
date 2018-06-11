<!-- BEGIN CONTENT HEADER -->
<section class="content-header">
  <h3> 
    <i class="fa fa-list-alt"></i>
    <span>Detail Data Penjualan</span>
  </h3>
</section>
<!-- END CONTENT HEADER -->
<section class="content">
  <div class="row">
    <!-- BEGIN BASIC DATATABLES -->
    <div class="col-md-12">
      <div class="grid no-border">
         <div class="grid-header">
          <!-- <i class="fa fa-perusahaan"></i>
          <span class="grid-title">
            <a href="<?=base_url()?>c_penjualan/formtambah">
              <h6>
                <button type="button" class="btn btn-primary ">
                  <i class="fa fa-plus"></i> Tambahkan Penjualan
                </button>
              </h6>
            </a>  
          </span>
          <div class="pull-right grid-tools">
            <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
            <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
            <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
          </div> -->
          <span class="grid-title">
            <h6>
              <button type="button" class="btn btn-primary" onclick="self.history.back()">
                  <i class="fa fa-arrow-left"></i> Kembali
              </button>
            </h6>
          </span>
        </div>

        <div id="info-alert">
          <?=@$this->session->flashdata('msg')?>
        </div>  
        <div class="grid-body">
          <table class="data-table table table-bordered table-striped" >
            <thead>
              <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-2">Kode Barang</th>
                <th class="col-md-2">Nama Barang</th>
                <th class="col-md-2">Jumlah </th>
                <th class="col-md-2">Harga Jual (Rp)</th>
                <th class="col-md-3">Subtotal (Rp)</th>
              </tr>
            </thead>

            <tbody>
              <?php
                $no=1;
                $total=0;
                foreach ($listdetail as $br) {
              ?>

              <tr>
                <td><?=$no++;?></td>
                <td><?=$br->detpBrngKode?></td>
                <td><?=$br->brngNama?></td>
                <td><?=$br->detpJumlah?></td>
                <td align="right"><?php echo number_format($br->detpHarga)?></td>
                <td align="right"><?php echo number_format($br->subtotal)?></td>
              </tr>
              <?php
              $total=$total+$br->subtotal;
                }
              ?>
             <tr>
              <td colspan="5" ><center><b>Total (Rp)</b></center></td>
              <td align="right"><?php echo number_format($total)?></td>
               
            </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- END BASIC DATATABLES -->
  </div>
</section>
