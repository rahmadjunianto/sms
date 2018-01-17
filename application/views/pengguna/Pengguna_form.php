<section class="content-header">
            <h1>
              Form Ms_pengguna
            </h1>
          </section>
        <section class="content">
            <div class="box box-green">
                <div class="box-body">
        <form class="form-horizontal" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data"> 
	    <div class="form-group">
            <label class="control-label col-md-2" for="varchar">Nama <small>*</small></label>
            <div class="col-md-4">
            <input type="text" class="form-control" name="nama" id="nama"  value="<?php echo $nama; ?>" />
            <?php echo form_error('nama') ?>
            </div>
        </div>
	    <div class="form-group">
            <label class="control-label col-md-2" for="varchar">Username <small>*</small></label>
            <div class="col-md-4">
            <input type="text" class="form-control" name="username" id="username"  value="<?php echo $username; ?>" />
            <?php echo form_error('username') ?>
            </div>
        </div>
	    <div class="form-group">
            <label class="control-label col-md-2" for="varchar">Password <small>*</small></label>
            <div class="col-md-4">
            <input type="text" class="form-control" name="password" id="password"  value="<?php echo $password; ?>" />
            <?php echo form_error('password') ?>
            </div>
        </div>
	    <div class="form-group">
            <label class="control-label col-md-2" for="timestamp">Tanggal Insert <small>*</small></label>
            <div class="col-md-4">
            <input type="text" class="form-control" name="tanggal_insert" id="tanggal_insert"  value="<?php echo $tanggal_insert; ?>" />
            <?php echo form_error('tanggal_insert') ?>
            </div>
        </div>
	    <div class="form-group">
            <label class="control-label col-md-2" for="int">Deleted <small>*</small></label>
            <div class="col-md-4">
            <input type="text" class="form-control" name="deleted" id="deleted"  value="<?php echo $deleted; ?>" />
            <?php echo form_error('deleted') ?>
            </div>
        </div>
	    <div class="form-group">
            <label class="control-label col-md-2" for="datetime">Tanggal Delete <small>*</small></label>
            <div class="col-md-4">
            <input type="text" class="form-control" name="tanggal_delete" id="tanggal_delete"  value="<?php echo $tanggal_delete; ?>" />
            <?php echo form_error('tanggal_delete') ?>
            </div>
        </div>
	   <div class="form-group">
	    <div class="col-md-4 col-md-offset-2">
	   <div class="btn-group">
	    <input type="hidden" name="id_inc" value="<?php echo $id_inc; ?>" /> 
	    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('pengguna') ?>" class="btn  btn-sm btn-default"><i class="fa fa-close"></i> Batal</a>
	      </div >
	     </div >
	   </div >
	</form>
                </div>
            </div>
        </section>
    