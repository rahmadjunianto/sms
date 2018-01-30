<?php echo $this->session->flashdata('message')?><br>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title"> 
                    <h2>Transaksi Barang Keluar</h2>
            <div class="pull-right">
                <div class="btn-group">
                <?php echo anchor(site_url('gudang/tr_barang_keluar/import'), '<i class="fa fa-cloud-upload"></i> Import', 'class="btn btn-primary btn-sm"'); 
                ?>
                </div>                
                <div class="btn-group">
                <?php echo anchor(site_url('gudang/tr_barang_keluar/create'), '<i class="fa fa-plus"></i> Tambah', 'class="btn btn-success btn-sm"'); 
                ?>
                </div>
            </div>                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content"> <form id="myform" data-parsley-validate   action=""<?php echo base_url().'gudang/tr_barang_keluar'?>" method="post">
                <div class="row">
                  <div class="col-md-2 col-sm-12 col-xs-12 form-group">
       <div class="input-group">
        <div class="input-group-addon">
         <i class="fa fa-calendar">
         </i>
        </div>
        <input class="form-control tanggal" id="date" name="date" value="<?php echo $date ?>" type="text"/>
       </div></div>      
                <div class="col-md-2 col-sm-12 col-xs-12"> <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Tampilkan</button></div>   </div>                                                      
  </form><div class="tabel"> </div>
                  </div>
                </div>
              </div>



            </div>


              <script>
  $(document).ready(function(){
    
   readProducts(); /* it will load products when document loads */
    
    $(document).on('click', '#delete', function(e){
      
      var productId = $(this).data('id');
      SwalDelete(productId);
      e.preventDefault();
    });
    
  });
  
  function SwalDelete(productId){
    
    swal({
      title: 'Apakah Anda Yakin?',
      text: "Data Akan dihapus Permanen!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus Data!',
      showLoaderOnConfirm: true,
        
      preConfirm: function() {
        return new Promise(function(resolve) {
             
           $.ajax({
            url: '<?php echo base_url()?>gudang/tr_barang_keluar/hapus',
            type: 'POST',
              data: 'delete='+productId,
              dataType: 'json'
           })
           .done(function(response){
            swal('Deleted!', response.message, response.status);
          readProducts();
           })
           .fail(function(){
            swal('Oops...', 'Something went wrong with ajax !', 'error');
           });
        });
        },
      allowOutsideClick: false        
    }); 
    
  }
    function readProducts(){
    $('.tabel').load('tr_barang_keluar/table'); 
  }
</script>