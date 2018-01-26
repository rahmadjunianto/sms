            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo $button; ?></h2>                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">

<input type="hidden" name="kode_harga_kayu" value="<?php echo $kode_harga_kayu; ?>" />   
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" >Kabupaten 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" name="kabupaten" onchange="getkec(this);" id="kabupaten">
                    <option></option>
                    <?php foreach($kabupaten as $kabupaten){?>
                    <option <?php if($nm_kabupaten==$kabupaten->kabupaten){echo "selected";}?> value="<?php echo $kabupaten->kabupaten?>"><?php echo $kabupaten->kabupaten?></option>
                    <?php }?>
                          </select>                
                        </div>
                      </div>  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" > Kecamatan
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" name="kecamatan" id="kecamatan">
                    <option></option>  
                      <?php if (isset($kecamatan)) 
                      {foreach ($kecamatan as $kecamatan) {?>
                        <option <?php if($kecamatan->kecamatan==$nm_kecamatan){echo "selected";}?> value="<?php echo $kecamatan->kecamatan ?>"><?php echo $kecamatan->kecamatan ?></option>
                      
                        
                      <?php }} ?>                                     
                          </select>              
                        </div>
                      </div>                       
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"  >Nama Supplier
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" name="kode_supplier">
                    <option></option>
                    <?php foreach($supplier as $supplier){?>
                    <option <?php if($kode_supplier==$supplier->kode_supplier){echo "selected";}?> value="<?php echo $supplier->kode_supplier?>"><?php echo $supplier->nama_supplier?></option>
                    <?php }?>
                          </select>                          
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" >Panjang Kayu
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" name="panjang_kayu" onchange="getval(this);" id="panjang_kayu">
                    <option></option>
                    <?php foreach($panjang as $panjang){?>
                    <option <?php if($panjang_kayu==$panjang->panjang_kayu){echo "selected";}?> value="<?php echo $panjang->panjang_kayu?>"><?php echo $panjang->panjang_kayu?></option>
                    <?php }?>
                          </select>                
                        </div>
                      </div>  

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" > Kelas Diameter
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" name="kelas_diameter" id="kelas_diameter">
                    <option></option>
                      <?php if (isset($kDiameter)) 
                      {foreach ($kDiameter as $kDiameter) {?>
                        <option <?php if($kDiameter->kd==$k){echo "selected";}?> value="<?php echo $kDiameter->kd ?>"><?php echo $kDiameter->kd ?></option>
                      
                        
                      <?php }} ?>                    
                          </select>              
                        </div>
                      </div>  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"  >Harga
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="harga" required="required" placeholder="Harga" class="form-control col-md-7 col-xs-12" value="<?php echo $harga; ?>">                     
                        </div>
                      </div>                                                                                                                 
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?php echo site_url('Pembelian/man_harga_kayu') ?>" class="btn btn-warning"><i class="fa fa-close"></i> Cancel</a>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>



            </div>

<script type="text/javascript">

function getval(sel)
{
 $( "#kelas_diameter" ).empty();
    var panjang_kayu = sel.value;
    $.ajax({
         type: "POST",
        url: "<?php echo base_url().'Pembelian/man_harga_kayu/getkelas'?>",
        data: "panjang_kayu="+panjang_kayu,
        cache: false,
        success: function(msga){
            //alert(msga);
            $("#kelas_diameter").html(msga);
        }
    });    
} 
function getkec(sel)
{
    var kabupaten = sel.value;
    $.ajax({
         type: "POST",
        url: "<?php echo base_url().'Pembelian/man_harga_kayu/getkecamatan'?>",
        data: { kabupaten: kabupaten},
        cache: false,
        success: function(msga){
            //alert(msga);
            $("#kecamatan").html(msga);
        }
    });    
}      
</script>