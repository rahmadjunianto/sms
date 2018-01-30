<div class="page-title">

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo $button; ?> </h2> 
            <div class="pull-right">             
                <div class="btn-group">
<button  form="myform" type="submit" name="submittemp" class="btn btn-primary">Simpan</button>
                </div>
            </div>                                       
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
<form id="myform" data-parsley-validate class="form-horizontal form-label-left"  action="<?php echo $action; ?>" method="post">
 
<div class="col-md-4">
                        <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <select style="height:10px"  class="grader form-control input-sm" name="nama_grader"  >
                    <option></option>
                    <?php foreach($grader as $grader){?>
                    <option <?php if ($this->session->userdata('kd_grader')!=null) {if($this->session->userdata('kd_grader')==$grader->kd_grader){echo "selected";}}?> value="<?php echo $grader->kd_grader?>" ><?php echo $grader->nm_grader?></option>
                    <?php }?>
                          </select>                         
                        </div>
                      </div>
<?php
$kabupaten = "var kab = new Array();\n";
$kecamatan = "var kec = new Array();\n";
$nama = "var nama = new Array();\n";
?>                       
                      <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <select class="supplier form-control input-sm" id="kode_supplier" onchange="changeValue(this.value)" name="kode_harga_kayu">
                    <option></option>
                    <?php foreach($supplier as $supplier){?>
                    <option <?php if ($this->session->userdata('kode_harga_kayu')!=null){ if($this->session->userdata('kode_harga_kayu')==$supplier->kode_harga_kayu){echo "selected";}}?> value="<?php echo $supplier->kode_harga_kayu?>"><?php echo $supplier->nama_supplier."-".$supplier->kabupaten."-".$supplier->kecamatan?></option>
                    <?php 
           $kabupaten .= "kab['" . $supplier->kode_harga_kayu . "'] = {kab:'".addslashes($supplier->kabupaten)."'};\n";
           $kecamatan .= "kec['" . $supplier->kode_harga_kayu . "'] = {kec:'".addslashes($supplier->kecamatan)."'};\n";
           $nama .= "nama['" . $supplier->kode_harga_kayu . "'] = {n:'".addslashes($supplier->kode_supplier)."'};\n";
         }?>
                          </select>  
<script type="text/javascript">  
<?php echo $kabupaten; echo $kecamatan;echo $nama;?>
function changeValue(id){
document.getElementById('kabupaten').value = kab[id].kab;
document.getElementById('kecamatan').value = kec[id].kec;
document.getElementById('nama').value = nama[id].n;
  var n= document.getElementById("nama").value;
  var nm_kabupaten= document.getElementById("kabupaten").value;
  var nm_kecamatan= document.getElementById("kecamatan").value;
      $.ajax({
         type: "POST",
        url: "<?php echo base_url().'Pembelian/man_dukb/getpanjang'?>",
        data: { nm_kabupaten: nm_kabupaten,n:n,nm_kecamatan: nm_kecamatan},
        cache: false,
        success: function(msga){
            //alert(msga);
            $("#panjang").html(msga);
        }
    }); 

}; 
</script>                                                    
                        </div>
                      </div>                       <div class="form-group">
      <div class="col-sm-12">
       <div class="input-group">
        <div class="input-group-addon">
         <i class="fa fa-calendar">
         </i>
        </div>
        <input class=" input-m form-control col-xs-6 tanggal" id="date" name="date" value="<?php if ($this->session->userdata('tanggal')!=null){echo $this->session->userdata('tanggal');} else {echo DATE('d/m/Y'); } ?>" type="text" style="size: 100px"/>
       </div>
      </div>
                      </div> <div class="ln_solid"></div>                       <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <select class="p select2_single form-control" name="panjang" id="panjang">
                    <option></option>  
                    <?php if(isset($panjang)) {foreach($panjang as $panjang){?>
                    <option  value="<?php echo $panjang->panjang_kayu?>" ><?php echo $panjang->panjang_kayu?></option>
                    <?php }}?>                                                     
                          </select>              
                        </div>
                      </div>                    
</div>
<div class="col-md-4">
                      <div class="form-group">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input  style="height:43px" type="text" id="last-name" name="plat_nomor"  placeholder="No Mobil" class="form-control col-md-7 col-xs-12" value="<?php if ($this->session->userdata('plat_nomor')!=null){echo $this->session->userdata('plat_nomor');} ?>">                     
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" id="kabupaten" readonly="" name="kabupaten" placeholder="Kabupaten" class="form-control col-md-7 col-xs-12" value="<?php if ($this->session->userdata('nm_kabupaten')!=null){echo $this->session->userdata('nm_kabupaten');} ?>"> 
                          <input type="hidden" id="nama" name="nama_supplier" required="required" placeholder="Kabupaten" class="form-control col-md-7 col-xs-12" value="<?php if ($this->session->userdata('nama_supplier')!=null){echo $this->session->userdata('nama_supplier');} ?>">                                                
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input  style="height:43px" type="text" id="last-name" name="asal_kayu"  placeholder="Asal Kayu" class="form-control col-md-7 col-xs-12" value="<?php if ($this->session->userdata('asal_kayu')!=null){echo $this->session->userdata('asal_kayu');} ?>">                     
                        </div>
                      </div>                      
<div class="ln_solid"></div>                      
                      <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                         <button  class="btn btn-primary add_project_file"><i class="fa fa-plus"></i></button>                    
                        </div>
                      </div>                        

</div>
<div class="col-md-4">
                      <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input style="height:43px"  type="text" id="kecamatan" readonly="" name="kecamatan"  placeholder="Kecamatan" class="form-control col-md-7 col-xs-12" value="<?php if ($this->session->userdata('nm_kecamatan')!=null){echo $this->session->userdata('nm_kecamatan');} ?>">            
                        </div>
                      </div>                                             
                      <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" id="last-name" name="jenis_kayu"  placeholder="Jenis Kayu" class="form-control col-md-7 col-xs-12" value="<?php if ($this->session->userdata('jk')!=null){echo $this->session->userdata('jk');}; ?>">                     
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input  style="height:43px" type="text" id="last-name" name="kd_siklus"  placeholder="Kode Siklus" class="form-control col-md-7 col-xs-12" value="<?php if ($this->session->userdata('kd_siklus')!=null){echo $this->session->userdata('kd_siklus');} ?>">                     
                        </div>
                      </div>                      <div class="ln_solid"></div> 
</div>
<div class="col-md-6 col-sm-6 col-xs-12" id="list_panjang"></div> 
</div>

                           

                    
                  </div>
                </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title"> 
                    <h2>List Kayu</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="detail_dukb_temp">


                  </div>
                </div>
              </div>



            </div>                
              </div>




            </div>

<script type="text/javascript">
$(document).ready(function() {
    $('#datatable-keytable').DataTable();
} );
function getval(sel)
{
    var kab = sel.value;
    $.ajax({
         type: "POST",
        url: "<?php echo base_url().'Pembelian/man_dukb/getkec'?>",
        data: "kab="+kab,
        cache: false,
        success: function(msga){
           // alert(msga);
            $("#kelas_diameter").html(msga);
        }
    });    
}   
</script>
    <script>
      $(document).ready(function() {
        $(".supplier").select2({
          placeholder: "Supplier",
          allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });
      $(document).ready(function() {
        $(".grader").select2({
          placeholder: "Grader",
          allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      }); 
                      $(document).ready(function() {
        $("#panjang").select2({
          placeholder: "Panjang Kayu",
          allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });
    </script>
<script type="text/javascript">
$('.add_project_file').click(function(e) {
    e.preventDefault();
    var p= document.getElementById("panjang").value;var nama= document.getElementById("nama").value;
    var kabupaten= document.getElementById("kabupaten").value;var kecamatan= document.getElementById("kecamatan").value;
    //alert(p+nama+kabupaten+kecamatan);
    $.ajax({
         type: "POST",
        url: "<?php echo base_url().'Pembelian/man_dukb/getdiameter'?>",
        data: { kabupaten: kabupaten,kecamatan:kecamatan,p:p,nama:nama},
        cache: false,
        success: function(msga){
            //alert(msga);
            $("#list_panjang").html(msga);
        }
    }); 
   /* $(".list_panjang").append(
       '<div class="asd "><div class="col-md-4 col-sm-4 col-xs-12 remove_project_file">'
      + '<h2>Panjang '+ p + ' cm <a href="#" class="remove_project_file" border="2"><img src="images/delete.gif" /></h2>'
      + '<table class="table table-bordered" width="100%">'
      + '<thead>'
      + '<tr>'
      + '<th width="10%">Diameter</th>'
      + '<th width="10%">Batang</th>'
      + '<th width="20%">Volume</th>'
      + '</tr>'
      + '</thead>'
      + '<tbody><tr>'
      + '<td ><input type="hidden" name="panjang_kayu'+ p +'[]" value="'+ p +'" id="panjang'+ p +'15" ><input type="text" id="diameter'+ p +'15" name="diameter'+ p +'[]" readonly="" class="form-control " value="15"></td>'
      + '<td><input type="text" id="batang'+p+'15" name="batang'+p+'[]"  class="form-control " placeholder="0" onchange="get'+p+'15(this);"></td>'
      + '<td><input type="text" name="v'+p+'[]" readonly=""  class="form-control " placeholder="0"  id="v'+p+'15"></td>'
      + '<tr></tbody>'
      + '</table>'
      + '</div></div>');*/
});
/*function get13015(sel)
{  
  var btg= document.getElementById("batang13015").value;
  var diameter= document.getElementById("diameter13015").value;
  var panjang_kayu= document.getElementById("panjang13015").value;
  var r= diameter/2;
  var v = 3.14*r*r*panjang_kayu/1000000;
  var volume = v*btg;
  var totalv= volume.toFixed(4)
  $('#v13015').val(totalv);
  //alert(btg);    
}*/
// Remove parent of 'remove' link when link is clicked.
$('.list_panjang').on('click', '.remove_project_file', function(e) {
    e.preventDefault();

    $(this).parent().remove();
});</script>
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
            url: '<?php echo base_url()?>pembelian/man_dukb/hapus_detail_dukb_temp',
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
    $('.detail_dukb_temp').load('detail_dukb_temp'); 
  }
</script>
