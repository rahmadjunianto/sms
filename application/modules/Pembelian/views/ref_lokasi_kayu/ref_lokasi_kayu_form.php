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


<input type="hidden" name="kode_lokasi" value="<?php echo $kode_lokasi; ?>" />        
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"  >Kabupaten
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="kabupaten" required="required" placeholder="Kabupaten"class="form-control col-md-7 col-xs-12" value="<?php echo $kabupaten; ?>">                     
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" > Kecamatan
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="kecamatan" required="required" placeholder="Kecamatan" class="form-control col-md-7 col-xs-12" value="<?php echo $kecamatan; ?>">                     
                        </div>
                      </div>  
                                                                                                                
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?php echo site_url('Pembelian/ref_lokasi_kayu') ?>" class="btn btn-warning"><i class="fa fa-close"></i> Cancel</a>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>



            </div>

