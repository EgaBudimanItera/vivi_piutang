<!-- BEGIN SCROLL TO TOP -->
    <div class="scroll-to-top"></div>
</div>

	 <!-- BEGIN JS FRAMEWORK -->
  <script src="<?=base_url()?>assets/back-end/assets/plugins/jquery.js"></script>
  <script src="<?=base_url()?>assets/back-end/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
  

  <script src="<?=base_url()?>assets/back-end/assets/plugins/jquery-flot/jquery.flot.min.js"></script>
  <script src="<?=base_url()?>assets/back-end/assets/plugins/jquery-flot/jquery.flot.pie.min.js"></script>

  <!-- END JS FRAMEWORK -->
  
  <!-- BEGIN JS PLUGIN -->
  <script src="<?=base_url()?>assets/back-end/assets/plugins/pace/pace.min.js"></script>
  <script src="<?=base_url()?>assets/back-end/assets/plugins/jquery-totemticker/jquery.totemticker.min.js"></script>
  <script src="<?=base_url()?>assets/back-end/assets/plugins/jquery-resize/jquery.ba-resize.min.js"></script>
  <script src="<?=base_url()?>assets/back-end/assets/plugins/jquery-blockui/jquery.blockUI.min.js"></script>
  <script src="<?=base_url()?>assets/back-end/assets/plugins/icheck/icheck.min.js"></script>
  <script src="<?=base_url()?>assets/back-end/assets/plugins/switchery/switchery.min.js"></script>
  <script src="<?=base_url()?>assets/back-end/assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
  <script src="<?=base_url()?>assets/back-end/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
  <script src="<?=base_url()?>assets/back-end/assets/plugins/select2/select2.js"></script>
  <script src="<?=base_url()?>assets/back-end/assets/plugins/bootstrap-slider/js/bootstrap-slider.js"></script>
  <script src="<?=base_url()?>assets/back-end/assets/js/form.js"></script>
  <script src="<?=base_url()?>assets/back-end/assets/plugins/jquery-datatables/js/jquery.dataTables.min.js"></script>
  <script src="<?=base_url()?>assets/back-end/assets/plugins/jquery-datatables/js/dataTables.bootstrap.js"></script>
  <script src="<?=base_url()?>assets/back-end/assets/js/datatables.js"></script>
  <!-- END JS PLUGIN -->

  <!-- BEGIN JS TEMPLATE -->
  <script src="<?=base_url()?>assets/back-end/assets/js/main.js"></script>
  <!-- END JS TEMPLATE -->
</body>

<!-- Mirrored from vergo-kertas.herokuapp.com/tables-datatables.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 May 2016 18:30:30 GMT -->
</html>

<script type="text/javascript">
  $(document).ready(function(){
      
      $("#info-alert").fadeTo(2000,50).slideUp(50,function(){
          $("#info-alert").slideUp(50);
      });
      $("#kodepelanggan").select2();

      function format(item) {
      var originalOption = item.element;
      var originalText = item.text;
      var s = '<span style="font-weight:bold">' + originalText+ '</span><br/>' +
              '<span style="color:#888">' + $(originalOption).data('satuan') +'</span><br/>'+
              '<span style="color:#888">' + $(originalOption).data('harga') +'</span><br/>';
      return s;
      };
      $('#kodebarang').select2({
        
        formatResult: format,
        formatSelection: format,
        escapeMarkup: function(m) { return m; }
      });

      $("#kodebarang").change(function () {     
            var kode = $(this).val()
        $.ajax({
            url: "<?=base_url()?>c_barang/getbarang/"+kode,
            type: 'GET',
            success: function(res) {
                var res_ = JSON.parse(res);
                $('#detpHarga').val(res_.brngHargaJual);
            }
        })
      });

      

      loadTable();
    })
    
    function simpan(){
        var detpBrngKode=$('#kodebarang').val();
        var detpJumlah=$('#detpJumlah').val();
        var detpHarga=$('#detpHarga').val();
        $modal = $('#detailbarangModal');
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>c_penjualan/tambahpenjualandetailtemp',
            data: 'detpBrngKode='+detpBrngKode+'&detpJumlah='+detpJumlah+'&detpHarga='+detpHarga,
            dataType: 'JSON',
            success: function(msg){
                if(msg.status == 'success'){
                    
                    loadTable();
                    $('#detailbarangModal').modal('hide');
                    $('#formTambahBarang')[0].reset();
                    
                }else if(msg.status == 'fail'){
                   
                   loadTable();
                   alert('gagal tambah data')
                    $('#detailbarangModal').modal('hide');
                    $('#formTambahBarang')[0].reset();
                }
            }
          });
      };
      function loadTable() {
          $('#tampilpenjualan').load('<?=base_url()?>c_penjualan/formdetailtemp',function(){})
      };

      function hapustemp(id) {
        $.ajax({
            url: "<?=base_url()?>c_penjualan/hapusdetail/"+id,
            type: "GET",
            dataType: 'JSON',
            success: function(msg) {
                if(msg.status == 'success'){
                    loadTable();                    
                }else if(msg.status == 'fail'){
                   loadTable();
                   alert('gagal hapus data');
                }
            }
        })

    } 
</script>