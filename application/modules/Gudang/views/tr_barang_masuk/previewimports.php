<div class="page-title">

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
            <h2>
              Unggah Data Sinkronisai Harga Barang

            </h2> 
                <div class="pull-right">
                    <div class="btn-group">
                    <!-- <button type="submit" name="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Submit</button> -->
                    <?php echo anchor(site_url('gudang/tr_barang_masuk/prosesinsertimports/'.$this->session->userdata('ku')), '<i class="fa fa-save"></i> submit', 'class="btn btn-sm btn-primary"'); ?>
                    <?php echo anchor(site_url('gudang/tr_barang_masuk/importactions'), '<i class="fa fa-close"></i> batal', 'class="btn btn-sm btn-warning"'); ?>
                    </div>
                </div>                             
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
Jumlah Record yang telah anda Upload <?php echo $record?> Anda Yakin Mengunggah Data ?
                  </div>
                </div>
              </div>



            </div>
