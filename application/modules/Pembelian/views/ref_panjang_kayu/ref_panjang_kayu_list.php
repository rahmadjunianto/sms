<?php echo $this->session->flashdata('message')?><br>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title"> 
                    <h2>Referensi Panjang Kayu</h2>
  <?php if ($this->session->userdata('kg')==5) {?>          <div class="pull-right">
                <div class="btn-group">
                <?php echo anchor(site_url('Pembelian/ref_panjang_kayu/create'), '<i class="fa fa-plus"></i> Tambah', 'class="btn btn-success btn-sm"'); 
                ?>
                </div>
            </div>  <?php }?>                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

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
            url: '<?php echo base_url()?>pembelian/ref_panjang_kayu/hapus',
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
    $('.x_content').load('ref_panjang_kayu/table'); 
  }
</script>