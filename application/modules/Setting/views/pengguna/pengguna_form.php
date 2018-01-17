<div class="page-title">

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo $button;?></h2>                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">



                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" >Username
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="USERNAME" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $USERNAME ?>">                         <input type="hidden" id="last-name" name="KODE_PENGGUNA" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $KODE_PENGGUNA ?>">
                        </div>
                      </div>
        <?php if($button!='Update Pengguna'){?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Password
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="PASSWORD" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $PASSWORD ?>">
                        </div>
                      </div>  
        <?php }?>                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="NAMA_PENGGUNA" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $NAMA_PENGGUNA ?>">
                        </div>
                      </div>     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Grup</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" name="KODE_GROUP">
                            <option></option>
                    <option></option>
                    <?php foreach($group as $group){?>
                    <option <?php if($KODE_GROUP==$group->KODE_GROUP){echo "selected";}?> value="<?php echo $group->KODE_GROUP?>"> <?php echo $group->NAMA_GROUP?></option>
                    <?php }?>
                          </select>
                        </div>
                      </div>                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?php echo site_url('Setting/Msmenu') ?>" class="btn btn-warning"><i class="fa fa-close"></i> Cancel</a>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>



            </div>

