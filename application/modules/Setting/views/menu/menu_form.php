<div class="page-title">

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tambah Menu</h2>                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Parent Menu</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" name="parent_menu">
                    <option></option>
                    <option value="0">Parent</option>
                    <?php foreach($parent as $parent){?>
                    <option <?php if($kd_parent==$parent->kode_menu){echo "selected";}?> value="<?php echo $parent->kode_menu?>"><?php echo $parent->nama_menu?></option>
                    <?php }?>
                          </select>
                        </div>
                      </div> 

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" >Nama Menu
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="nama_menu" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Link Menu
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="link_menu" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Sort Menu
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="sort_menu" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Icon</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" name="icon_menu">
                            <option></option>
                    <option></option>
                    <?php foreach($icon as $icon){?>
                    <option <?php if($icon_menu==$icon->icon){echo "selected";}?> value="<?php echo $icon->icon?>"><i class="<?php echo $icon->icon?>"></i> <?php echo strtolower(str_replace('fa fa-','', $icon->icon))?></option>
                    <?php }?>
                          </select>
                        </div>
                      </div>
 
                      <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">Active</label>

                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <div class="radio">
                            <label>
                              <input type="radio" checked="" value="1" id="optionsRadios1" name="active" <?php if($active=='1'){echo "checked";}?>>  Aktif
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" value="1" id="optionsRadios2" name="active" <?php if($active=='0'){echo "checked";}?>> Non Aktif
                            </label>
                          </div>
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

