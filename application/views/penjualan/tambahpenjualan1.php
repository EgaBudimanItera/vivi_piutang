<!-- <?php
  var_dump($listbarang);
?> -->
<!-- BEGIN CONTENT HEADER -->
<section class="content-header">
  <h3> 
    <i class="fa fa-file-text-o"></i>
    <span>Tambah Data Penjualan (Step 2) </span>
  </h3>
</section>
<!-- END CONTENT HEADER -->
      
<!-- BEGIN MAIN CONTENT -->
<section class="content">
  <div class="row">
    
    <!-- BEGIN HORIZONTAL FORM -->
    <div class="col-md-12">
      <div class="grid">
        <!-- <div class="grid-header">
          <span class="grid-title">
            <h6>
              <button type="button" class="btn btn-primary" onclick="self.history.back()">
                  <i class="fa fa-arrow-left"></i> Kembali
              </button>
            </h6>
          </span>
          <div class="pull-right grid-tools">
            <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
            <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
            <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
          </div>
        </div> -->
        <div id="info-alert">
          <?=@$this->session->flashdata('msg')?>
        </div>
        <div class="grid-body">
          <form class="form-horizontal" role="form" action="<?=base_url()?>c_penjualan/tambahpenjualan1" method="post">

            <div class="form-group">
              <label class="col-sm-2 control-label">Kode Pelanggan</label>
              <div class="col-sm-3">
                <input name="plgnKode" type="text" class="form-control" value="<?=$kodepelanggan?>" maxlength="10" readonly="">
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Toko</label>
              <div class="col-sm-3">
                <input name="plgnNama" type="text" class="form-control" value="<?=$listpelanggan->plgnNama?>" maxlength="30" readonly="">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Barang</label>
              <div class="col-sm-6">
                <select name="detpBrngKode" id="kodebarang" class="select2-containerpopulate" style="width: 300px"required="">
                  <option value=""></option>
                  <?php    
                    foreach($listbarang as $ld ){
                  ?>
                      <option value="<?=$ld->brngKode?>" data-harga=<?php echo number_format($ld->brngHargaJual)?> data-satuan="<?=$ld->stunNama?>"><?=$ld->brngNama?></option>
                  <?php
                        }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Jumlah Barang</label>
              <div class="col-sm-3">
                <input name="detpHarga" type="number" class="form-control" " maxlength="3" required="">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="btn-group">
                  <button type="submit" class="btn btn-primary">Next</button>
                  <button type="reset" class="btn btn-default">Bersih</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- END HORIZONTAL FORM -->
  </div>
</section>
<!-- END MAIN CONTENT -->
