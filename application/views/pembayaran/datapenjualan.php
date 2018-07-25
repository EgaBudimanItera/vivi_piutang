<!-- BEGIN CONTENT HEADER -->
<section class="content-header">
  <h3> 
    <i class="fa fa-list-alt"></i>
    <span>Data Penjualan</span>
  </h3>
</section>
<!-- END CONTENT HEADER -->
<section class="content">
  <div class="row">
    <!-- BEGIN BASIC DATATABLES -->
    <div class="col-md-12">
      <div class="grid no-border">
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
          <table id="dataTables1" class="data-table table table-bordered table-striped" >
            <thead>
              <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-2">Kode Penjualan</th>
                <th class="col-md-2">Tanggal</th>
                <th class="col-md-2">Nama Toko</th>
                <th class="col-md-2">Total Penjualan</th>
                <th class="col-md-2">Aksi</th>
              </tr>
            </thead>

            <tbody>
              <?php
                $no=1;
                foreach ($list as $l) {
              ?>

              <tr>
                <td><?=$no++;?></td>
                <td><?=$l->pnjlKode?></td>
                <td><?=$l->pnjlTanggal?></td>
                <td><?=$l->plgnNama?></td>
                <td align="right"><?php echo number_format($l->pnjlTotalPenjualan)?></td>
                <td>
                  <center>
                    <a href="#" class="pembayaran" id="<?=$l->pnjlKode?>">
                      <button type="button" class="btn btn-primary btn-sm">
                        <i class="fa fa-dollar"></i>Bayar Penjualan                      
                      </button>
                    </a>       
                  </center>                 
                </td>
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
</section>

<div class="modal fade" id="pembayaranModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-wrapper">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-blue">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel1">Pembayaran Piutang</h4>
        </div>
        <div class="modal-body">
          <!--id="formTambahBarang"-->
          <form class="form-horizontal" id="formpembayaran" role="form" method="post">
            <div class="form-group">
              <label class="col-sm-4 control-label">Kode Penjualan</label>
              <div class="col-sm-6">
                 <input name="pnjlKode" id="pnjlKode" type="text" class="form-control" " maxlength="3" readonly>  
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">Tanggal Pembayaran</label>
              <div class="col-sm-6">
                <div class="input-group date form_date" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1">
                <input type="text" class="form-control" name="pybrTanggal" required="" id="pybrTanggal">
                   <span class="input-group-addon"><i class="fa fa-th"></i></span>
                </div>
                <input type="hidden" id="dtp_input" value="" required="" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">Total Penjualan (Rp)</label>
              <div class="col-sm-6">
                <input name="pnjlTotalPenjualan" id="pnjlTotalPenjualan" type="number" class="form-control" " maxlength="12" readonly>
              </div>
            </div> 
             <div class="form-group">
              <label class="col-sm-4 control-label">Total Pembayaran (Rp)</label>
              <div class="col-sm-6">
                <input name="pybrJumlahBayar" type="number" class="form-control" id="pybrJumlahBayar" maxlength="12" required="">
              </div>
            </div> 
        </div>
        <div class="modal-footer">
          <div class="btn-group">
            
            <button type="button" class="btn btn-warning" onclick="simpan()">Simpan Pembayaran</button>
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
