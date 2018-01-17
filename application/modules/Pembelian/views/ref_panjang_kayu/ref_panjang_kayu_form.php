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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"  >Panjang Kayu
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="panjang_kayu" name="panjang_kayu" placeholder="Panjang Kayu" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $panjang_kayu; ?>">
<input type="hidden" name="kode_panjang_kayu" value="<?php echo $kode_panjang_kayu; ?>" />                           
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" >Kelas Diameter Bawah
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="kelas_diameter_bawah" required="required" placeholder="Kelas Diameter Bawah" class="form-control col-md-7 col-xs-12" value="<?php echo $kelas_diameter_bawah; ?>">                     
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" >Kelas Diameter Atas
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="kelas_diameter_atas" required="required" placeholder="Kelas Diameter Atas" class="form-control col-md-7 col-xs-12" value="<?php echo $kelas_diameter_atas; ?>">                     
                        </div>
                      </div>                                            
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" >Diameter
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="diameter" name="diameter" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $diameter; ?>"  placeholder="Diameter"  onchange="getval();">                     
                        </div>
                      </div>  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" > M<sup>3</sup> / Btg
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="volume" name="v" required="required" placeholder="M&sup3; / Btg" class="form-control col-md-7 col-xs-12" value="<?php echo $v; ?>" readonly="">                     
                        </div>
                      </div>                                                                                                                
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?php echo site_url('Pembelian/ref_panjang_kayu') ?>" class="btn btn-warning"><i class="fa fa-close"></i> Cancel</a>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>



            </div>

<script>
  function getval()
{
  var diameter= document.getElementById("diameter").value;
  var panjang_kayu= document.getElementById("panjang_kayu").value;
  var r= diameter/2;
  var v = 3.14*r*r*panjang_kayu/1000000;
  var volume = v.toFixed(4);
  $('#volume').val(volume);
 /// alert(volume);
} 
</script>