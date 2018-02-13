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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"  >Nama Sub Divisi
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="nm_sub_div" placeholder="Nama Sub Divisi" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nm_sub_div; ?>">
<input type="hidden" name="kd_sub_div" value="<?php echo $kd_sub_div; ?>" />                           
                        </div>
                      </div>           
                                 <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" >Divisi  
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" name="divisi"  id="divisi">
                    <option></option>
                    <?php foreach($divisi as $divisi){?>
                    <option <?php if($kd_divisi==$divisi->kd_divisi){echo "selected";}?> value="<?php echo $divisi->kd_divisi?>"><?php echo $divisi->nm_divisi?></option>
                    <?php }?>
                          </select>                
                        </div>
                      </div> 
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?php echo site_url('gudang/ref_divisi/') ?>" class="btn btn-warning"><i class="fa fa-close"></i> Cancel</a>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>



            </div>

