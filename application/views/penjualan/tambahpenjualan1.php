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
              <div class="col-sm-offset-2 col-sm-10">
                <div class="btn-group">
                  
                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#detailbarangModal">Tambahkan Barang
                  </a>
                  <button class="btn btn-success">Simpan Semua Barang</button>
                </div>
              </div>
            </div>

            <div id="tampilpenjualan">

            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- END HORIZONTAL FORM -->
  </div>
</section>
<!-- END MAIN CONTENT -->


<div class="modal fade" id="detailbarangModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-wrapper">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-blue">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel1">Tambahkan Barang</h4>
        </div>
        <div class="modal-body">
          <!--id="formTambahBarang"-->
          <form class="form-horizontal" id="formTambahBarang" role="form" method="post">
            <div class="form-group">
              <label class="col-sm-4 control-label">Nama Barang</label>
              <div class="col-sm-6">
                <select name="detpBrngKode" id="kodebarang" class="select2-containerpopulate" style="width: 300px"required="">
                  <option value="" data-harga="" data-satuan="">Pilih</option>
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
              <label class="col-sm-4 control-label">Jumlah Barang</label>
              <div class="col-sm-3">
                <input name="detpJumlah" type="number" class="form-control" id="detpJumlah" maxlength="3" required="">
              </div>
            </div> 
            <div class="form-group">
              <label class="col-sm-4 control-label">Harga Barang Satuan (Rp)</label>
              <div class="col-sm-5">
                <input name="detpHarga" id="detpHarga" type="number" class="form-control" " maxlength="3" required="">
              </div>
            </div> 
          
        </div>
        <div class="modal-footer">
          <div class="btn-group">
            
            <button type="button" class="btn btn-warning" onclick="simpan()">Save changes</button>
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>

