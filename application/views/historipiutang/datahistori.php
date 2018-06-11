
<section class="content-header">
  <h3> 
    <i class="fa fa-list-alt"></i>
    <span>Data Histori</span>
  </h3>
</section>

<section class="content">
  <div class="row">
  	<div class="col-md-9">
      <div class="grid no-border">
        <div class="grid-header">

        </div>
        <div class="grid-body">
        	<form class="form-horizontal" role="form" action="#" method="post">
            <div class="form-group">
              <label class="col-sm-4 control-label">Nama Pelanggan</label>
              <div class="col-sm-5">
                <select name="pnjlPlgnKode" id="kodepelanggan" class="select2-containerpopulate" style="width: 300px"required="">
                  
                  <?php    
                    foreach($listpelanggan as $ld ){
                  ?>
                      <option value="<?=$ld->plgnKode?>"><?=$ld->plgnNama?></option>
                  <?php
                        }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">Dari Tanggal</label>
              <div class="col-sm-5">
                <div class="input-group date form_date" data-date="2017-01-01T05:25:07Z" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1">
                <input type="text" class="form-control" name="daritanggal" required="">
                   <span class="input-group-addon"><i class="fa fa-th"></i></span>
                </div>
                <input type="hidden" id="dtp_input" value="" required="" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">Hingga Tanggal</label>
              <div class="col-sm-5">
               	<div class="input-group date form_date" data-date="2017-01-01T05:25:07Z" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1">
                <input type="text" class="form-control" name="hinggatanggal" required="">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                </div>
                <input type="hidden" id="dtp_input" value="" required="" /> 
              </div>
            </div>
            
            <div class="form-group">
              <div class="col-sm-offset-4 col-sm-10">
                <div class="btn-group">
                  <button type="submit" class="btn btn-primary">Lihat Data Histori Piutang</button>
                  <button type="reset" class="btn btn-default">Bersih</button>
                </div>
              </div>
            </div>
          </form>
        </div>
       </div>
      </div>
  </div>
  <div class="row">
  	<div class="col-md-12">
      <div class="grid no-border">
        <div class="grid-header">
        	
        </div>
        <div class="grid-body">
        	<div id="tabelhistori">
        	</div>
        </div>
       </div>
      </div>
  </div>
 </section>