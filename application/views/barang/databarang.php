<!-- BEGIN CONTENT HEADER -->
<section class="content-header">
  <h3> 
    <i class="fa fa-list-alt"></i>
    <span>Data Barang</span>
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
            <a href="<?=base_url()?>c_barang/formtambah">
              <h6>
                <button type="button" class="btn btn-primary ">
                  <i class="fa fa-plus"></i> Tambahkan Barang
                </button>
              </h6>
            </a>  
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
                <th class="col-md-2">Kode</th>
                <th class="col-md-4">Nama Barang</th>
                <th class="col-md-2">Satuan</th>
                <th class="col-md-2">Harga Jual (Rp)</th>
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
                <td><?=$l->brngKode?></td>
                <td><?=$l->brngNama?></td>
                <td><?=$l->stunNama?></td>
                <td align="right"><?php echo number_format($l->brngHargaJual)?></td>
                <td>
                  <center>
                    <a href="<?=base_url()?>c_barang/formubah/<?=$l->brngKode?>">
                      <button type="button" class="btn btn-primary btn-xs">
                        <i class="fa fa-edit"></i>
                      </button>
                    </a>
                    <a href="<?=base_url()?>c_barang/hapusbarang/<?=$l->brngKode?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')">
                      <button type="button" class="btn btn-danger btn-xs">
                        <i class="fa fa-trash-o"></i>                      
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
