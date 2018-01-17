<section class="content-header">
            <h1>
              Form Ms_role
            </h1>
          </section>
        <section class="content">
            <div class="box box-green">
                <div class="box-body">
        <form class="form-horizontal" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data"> 
	    <div class="form-group">
            <label class="control-label col-md-2" for="varchar">Nama Role <small>*</small></label>
            <div class="col-md-4">
            <input type="text" class="form-control" name="nama_role" id="nama_role"  value="<?php echo $nama_role; ?>" />
            <?php echo form_error('nama_role') ?>
            </div>
        </div>
	   <div class="form-group">
	    <div class="col-md-4 col-md-offset-2">
	   <div class="btn-group">
	    <input type="hidden" name="id_inc" value="<?php echo $id_inc; ?>" /> 
	    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('role') ?>" class="btn  btn-sm btn-default"><i class="fa fa-close"></i> Batal</a>
	      </div >
	     </div >
	   </div >
	</form>
                </div>
            </div>
        </section>
    