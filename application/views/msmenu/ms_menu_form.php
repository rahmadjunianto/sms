<section class="content-header">
            <h1>
              Form Menu
            </h1>
          </section>
        <section class="content">
            <div class="box box-green">
                <div class="box-body">
                    <form class="form-horizontal" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data"> 
                	    <div class="form-group">
                            <label class="control-label col-md-2" for="varchar">Nama Menu <small>*</small></label>
                            <div class="col-md-4">
                            <input type="text" class="form-control" name="nama_menu" id="nama_menu"  value="<?php echo $nama_menu; ?>" />
                            <?php echo form_error('nama_menu') ?>
                            </div>
                        </div>
                	    <div class="form-group">
                            <label class="control-label col-md-2" for="varchar">Link Menu <small>*</small></label>
                            <div class="col-md-4">
                            <input type="text" class="form-control" name="link_menu" id="link_menu"  value="<?php echo $link_menu; ?>" />
                            <?php echo form_error('link_menu') ?>
                            </div>
                        </div>
                	    <div class="form-group">
                            <label class="control-label col-md-2" for="int">Parent <small>*</small></label>
                            <div class="col-md-4">
                            <select class="form-control" name="parent" id="parent">
                                <?php foreach($list as $pp){?>
                                <option <?php if($pp->id_inc==$parent){echo "selected";}?> value="<?php echo $pp->id_inc?>"><?php echo $pp->nama_menu?></option>
                                <?php }?>
                            </select>                            
                            <?php echo form_error('parent') ?>
                            </div>
                        </div>
                	    <div class="form-group">
                            <label class="control-label col-md-2" for="int">Sort <small>*</small></label>
                            <div class="col-md-4">
                            <input type="number" class="form-control" name="sort" id="sort"  value="<?php echo $sort; ?>" />
                            <?php echo form_error('sort') ?>
                            </div>
                        </div>
                	   <div class="form-group">
                	    <div class="col-md-4 col-md-offset-2">
                	   <div class="btn-group">
                	    <input type="hidden" name="id_inc" value="<?php echo $id_inc; ?>" /> 
                	    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> <?php echo $button ?></button> 
                	    <a href="<?php echo site_url('msmenu') ?>" class="btn  btn-sm btn-default"><i class="fa fa-close"></i> Batal</a>
                	      </div >
                	     </div >
                	   </div >
                	</form>
                </div>
            </div>
        </section>
    