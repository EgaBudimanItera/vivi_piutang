<!-- BEGIN CONTENT HEADER -->
<section class="content-header">
  <h3> 
    <i class="fa fa-list-alt"></i>
    <span>Data Login User</span>
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
            <a href="<?=base_url()?>c_userlogin/formtambah">
              <h6>
                <button type="button" class="btn btn-primary ">
                  <i class="fa fa-plus"></i> Tambahkan User
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
                <th class="col-md-2">Nama User</th>
                <th class="col-md-2">Password</th>
                <th class="col-md-2">Hak Akses</th>
                <th class="col-md-1">Aksi</th>
              </tr>
            </thead>

            <tbody>
              <?php
                $no=1;
                foreach ($list as $l) {
              ?>

              <tr>
                <td><?=$no++;?></td>
                <td><?=$l->userNama?></td>
                <td><?=$l->userPassword?></td>
                <td><?=$l->userHakAkses?></td>
                <td>
                  <center>
                    <!-- <a href="<?=base_url()?>c_userlogin/formubah/<?=$l->userId?>">
                      <button type="button" class="btn btn-primary btn-xs">
                        <i class="fa fa-edit"></i>
                      </button>
                    </a> -->
                    <a href="<?=base_url()?>c_userlogin/hapususerlogin/<?=$l->userId?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')">
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
