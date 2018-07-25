<script type="text/javascript">
	$(document).ready(function(){
		//select 2 untuk combox pelanggan
		$("#kodepelanggan").select2();

		//untuk mengubah format select2
		$('#kodebarang').select2({
      formatResult: format,
      formatSelection: format,
      escapeMarkup: function(m) { return m; }
    });	

  	//untuk event onclick barang
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

  	//load ajax table
  	loadTable();
	});

	//function simpan data
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
                   $('#kodebarang').val(null).trigger('change');
                    
                }else if(msg.status == 'fail'){
                   
                   loadTable();
                   alert('gagal tambah data');
                    $('#detailbarangModal').modal('hide');
                    $('#formTambahBarang')[0].reset();
                    $('#kodebarang').val(null).trigger('change');
                }
            }
          });
      };


	//function untuk format combox
	function format(item) {
      var originalOption = item.element;
      var originalText = item.text;
      var s = '<span style="font-weight:bold">' + originalText+ '</span><br/>' +
              '<span style="color:#888">' + $(originalOption).data('satuan') +'</span><br/>'+
              '<span style="color:#888">' + $(originalOption).data('harga') +'</span><br/>';
      return s;
     };


     //function untuk load table
    function loadTable() {
          $('#tampilpenjualan').load('<?=base_url()?>c_penjualan/formdetailtemp',function(){})
    };

    //function untuk hapus temporary
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
    } ;  
</script>