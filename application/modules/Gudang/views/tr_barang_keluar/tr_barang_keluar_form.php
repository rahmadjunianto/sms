<div class="page-title">

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo $button; ?></h2>                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                      <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" >Nama Unit 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" name="kd_unit"  id="kd_unit" >
                    <option></option>
                    <?php foreach($unit as $unit){?>
                    <option <?php if($kd_unit==$unit->kd_unit){echo "selected";}?> value="<?php echo $unit->kd_unit?>"><?php echo $unit->nm_unit?></option>
                    <?php                     
           }?>

</select>                
                        </div>
                      </div>  
                      <div class="form-group">
<?php
$nm_barang = "var nama = new Array();\n";
?>                         
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" >Nama Barang 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" name="barang"  id="barang" onchange="changeValue(this.value)">
                    <option></option>
                    <?php foreach($barang as $barang){?>
                    <option <?php if($kd_barang==$barang->kd_barang){echo "selected";}?> value="<?php echo $barang->kd_barang?>"><?php echo $barang->nm_barang?></option>
                    <?php                     
          $nm_barang .= "nama['" . $barang->kd_barang . "'] = {nama:'".addslashes($barang->nm_barang)."'};\n";
           }?>
<script type="text/javascript">  
<?php echo $nm_barang;?>
function changeValue(id){
document.getElementById('nm_barang').value = nama[id].nama;
}; 
</script>
</select>                
                        </div>
                      </div>  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"  >Tanggal
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
       <div class="input-group">
        <div class="input-group-addon">
         <i class="fa fa-calendar">
         </i>
        </div>
        <input class="form-control tanggal" id="date" name="date" value="<?php echo $date ?>" type="text"/>
       </div>                          
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"  >Jumlah
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="jumlah" placeholder="Jumlah" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $jumlah; ?>">
<input type="hidden" name="kd_barang_keluar" value="<?php echo $kd_barang_keluar; ?>" />
<input type="hidden" name="nm_barang" id="nm_barang" value="<?php echo $nama_barang; ?>" />                             
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" >Harga
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="harga" required="required" placeholder="Harga" class="form-control col-md-7 col-xs-12" value="<?php echo $harga; ?>">                     
                        </div>
                      </div> 
                                                                                               
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?php echo site_url('gudang/tr_barang_keluar/') ?>" class="btn btn-warning"><i class="fa fa-close"></i> Cancel</a>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>



            </div>

