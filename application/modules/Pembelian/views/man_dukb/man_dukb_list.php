<?php echo $this->session->flashdata('message')?><br>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title"> 
                    <h2>Transaksi DUKB  </h2>
<?php if ($this->session->userdata('kg')==5) {?>
            <div class="pull-right">             
                <div class="btn-group">
                <?php echo anchor(site_url('Pembelian/man_dukb/create'), '<i class="fa fa-plus"></i> Tambah', 'class="btn btn-success btn-sm"'); 
                ?>
                </div>
            </div> 
<?php } ?>                    
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
        <form id="myform" data-parsley-validate  action=""<?php echo base_url().'pembelian/man_dukb'?>" method="post">
                <div class="row">
                  <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                          <select   class="grader form-control input-sm" name="nama_grader" required="" >
                    <option></option>
                    <?php foreach($grader as $grader){?>
                    <option <?php if($grader->kd_grader==$nama_grader){echo "selected";}?>  value="<?php echo $grader->kd_grader?>" ><?php echo $grader->nm_grader?></option>
                    <?php }?>
                          </select>  
                  </div>

                  <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                          <select   class="supplier form-control input-sm" name="supplier" required="" >
                    <option></option>
                    <?php foreach($supplier as $supplier){?>
                    <option <?php if($supplier->kode_supplier==$nm_supplier){echo "selected";}?> value="<?php echo $supplier->kode_supplier?>"><?php echo $supplier->nama_supplier ?></option>
                    <?php }?>
                          </select>                   
                  </div>

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
            url: '<?php echo base_url()?>pembelian/man_dukb/hapus',
            type: 'POST',
              data: 'delete='+productId,
              dataType: 'json'
           })
           .done(function(response){
            swal('Deleted!', response.message, response.status);
          readProducts();
           })
           .fail(function(response){
            swal('Oops...', 'Something went wrong with ajax !', 'error');
           });
        });
        },
      allowOutsideClick: false        
    }); 
    
  }
  <?php if($rk=="tampil"){?>
    function readProducts(){
    $('.tabel').load('man_dukb/table/tampil'); 
  }
  <?php } else { ?> 
    function readProducts(){
    $('.tabel').load('man_dukb/table/tdktampil'); 
  }
    <?php } ?>
</script>
                         <script type="text/javascript">

      $(document).ready(function() {
        $(".grader").select2({
          placeholder: "Grader",
          allowClear: true,    dropdownAutoWidth : true,
        });
        $(".supplier").select2({
          placeholder: "Supllier",
          allowClear: true,    dropdownAutoWidth : true,height: '100%',
        });        
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });function deleteConfirmation() {  
return confirm("Apakah Anda Yakin?");


}               
        </script>