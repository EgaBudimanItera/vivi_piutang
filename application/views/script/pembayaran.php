<script type="text/javascript">
	var base_url = '<?=base_url()?>';
	$(document).ready(function() {
	  $(document).on('click', '.pembayaran', function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        $('#pembayaranModal').modal();
        
        $.ajax({
            url: base_url+'c_penjualan/ambilpenjualan/'+id,
            type: 'POST',
            dataType: 'JSON',
            success: function(data){
                $('#pnjlTotalPenjualan').val(data.pnjlTotalBayar);
                $('#pnjlKode').val(data.pnjlKode);
                $('#pybrJumlahBayar').val(data.pnjlTotalBayar);
            }
        });
      });

	});
    function simpan(){
        var pybrPnjlKode=$('#pnjlKode').val();
        var pybrJumlahBayar=$('#pybrJumlahBayar').val();
        
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>c_pembayaran/simpanpembayaran',
            data: 'pybrPnjlKode='+pybrPnjlKode+'&pybrJumlahBayar='+pybrJumlahBayar,
            dataType: 'JSON',
            success: function(msg){
                if(msg.status == 'success'){ 
                    location.reload();
                    $('#pembayaranModal').modal('hide');
                    $('#formpembayaran')[0].reset();
                    
                }else if(msg.status == 'fail'){
                   location.reload();
                   alert('gagal tambah data')
                    $('#pembayaranModal').modal('hide');
                    $('#formpembayaran')[0].reset();
                }
            }
        });
    };
</script>