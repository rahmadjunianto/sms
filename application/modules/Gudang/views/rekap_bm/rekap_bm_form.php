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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"  >Nama Supplier
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="nama_supplier" placeholder="Nama Supplier" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nama_supplier; ?>">
<input type="hidden" name="kode_supplier" value="<?php echo $kode_supplier; ?>" />                           
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" >Email
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="email" required="required" placeholder="Email" class="form-control col-md-7 col-xs-12" value="<?php echo $email; ?>">                     
                        </div>
                      </div> 
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" >No HP
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="hp" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $hp; ?>"  placeholder="No HP">                     
                        </div>
                      </div>  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" > Kecamatan
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="kecamatan" required="required" placeholder="Kecamatan" class="form-control col-md-7 col-xs-12" value="<?php echo $kecamatan; ?>">                     
                        </div>
                      </div>  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"  >Kabupaten
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="kabupaten" required="required" placeholder="Kabupaten"class="form-control col-md-7 col-xs-12" value="<?php echo $kabupaten; ?>">                     
                        </div>
                      </div>  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" > Alamat
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                      <textarea rows="4" class="resizable_textarea form-control" placeholder="Alamat" name="alamat"><?php echo $alamat; ?></textarea>                
                        </div>
                      </div>                                                                                                               
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?php echo site_url('gudang/ref_supplier/') ?>" class="btn btn-warning"><i class="fa fa-close"></i> Cancel</a>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>



            </div>

