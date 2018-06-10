
<!-- BEGIN CONTENT HEADER -->
<section class="content-header">
  <h3> 
    <i class="fa fa-file-text-o"></i>
    <span>Ubah Data barang</span>
  </h3>
</section>
<!-- END CONTENT HEADER -->
      
<!-- BEGIN MAIN CONTENT -->
<section class="content">
  <div class="row">
    
    <!-- BEGIN HORIZONTAL FORM -->
    <div class="col-md-12">
      <div class="grid">
        <div class="grid-header">
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
        </div>
        <div id="info-alert">
          <?=@$this->session->flashdata('msg')?>
        </div>
        <div class="grid-body">
          <form class="form-horizontal" role="form" action="<?=base_url()?>c_barang/ubahbarang" method="post">

            <div class="form-group">
              <label class="col-sm-2 control-label">Kode barang</label>
              <div class="col-sm-3">
                <input name="brngKode" type="text" class="form-control" value="<?=$list->brngKode?>" maxlength="10" readonly="">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Barang</label>
              <div class="col-sm-3">
                <input name="brngNamaBaca" type="text" class="form-control" value="<?=$list->brngNama?>" maxlength="30" readonly>
                <small id="passwordHelpBlock" class="form-text text-muted">
                        Nama Barang Sebelum Perubahan
                </small>
              </div>
              <div class="col-sm-3">
                <input name="brngNama" type="text" class="form-control" value="<?=$list->brngNama?>" maxlength="30" required="">
                <small id="passwordHelpBlock" class="form-text text-muted">
                  Nama Barang Perubahan
                </small>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">barang</label>
              <div class="col-sm-3">
                <input name="brngStunKodeBaca" type="text" class="form-control" value="<?=$list->stunNama?>" maxlength="30" readonly>
                <small id="passwordHelpBlock" class="form-text text-muted">
                        barang Sebelum Perubahan
                </small>
              </div>
              <div class="col-sm-3">
                <select name="brngStunKode" class="form-control" required="">
                
                  <?php    
                    foreach($listsatuan as $ld ){
                  ?>
                      <option value="<?=$ld->stunKode?>" <?php if($list->brngStunKode==$ld->stunKode){echo 'selected="selected"';} ?>><?=$ld->stunNama?></option>
                  <?php
                        }
                  ?>
                </select>
                <small id="passwordHelpBlock" class="form-text text-muted">
                  barang Perubahan
                </small>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">Harga Jual (Rp)</label>
              <div class="col-sm-3">
                <input name="brngHargaJualBaca" type="text" class="form-control" value="<?php echo number_format($list->brngHargaJual)?>" maxlength="30" readonly>
                <small id="passwordHelpBlock" class="form-text text-muted">
                        Harga Jual Sebelum Perubahan
                </small>
              </div>
              <div class="col-sm-3">
                <input name="brngHargaJual" type="text" class="form-control" value="<?=$list->brngHargaJual?>" maxlength="30" required="">
                <small id="passwordHelpBlock" class="form-text text-muted">
                  Harga Jual Perubahan
                </small>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="btn-group">
                  <button type="submit" class="btn btn-primary">Simpan</button>
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
   