
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">  <?php if ( $rk=="tampil") { ?>
                  
            <div class="pull-right">             
                <div class="btn-group">
                <?php echo anchor(site_url('gudang/laporan/lap_btt_excel'), '<i class="fa fa-file-excel-o"></i>  ', 'class="btn btn-success btn-sm"'); 
                ?>
                </div>                
            </div><?php } ?>  
                    <h2>Laporan Barang Tidak Terpakai</h2>                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
        <form id="myform" data-parsley-validate   action=""<?php echo base_url().'gudang/laporan/lap_per_divisi'?>" method="post">
                <div class="row">

                  <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                          <select   class="tahun form-control input-sm" name="tahun" required="" >
                    <option></option>
                      <?php for($i=1;$i<=10;$i++){?>
                      <option <?php if($i==$tahun){echo "selected";}?> value="<?php echo $i?>"><?php echo $i." Tahun"?></option>
                      <?php }?>                    
                          </select>                   
                  </div>      
                <div class="col-md-2 col-sm-12 col-xs-12"> <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Tampilkan</button></div>   </div>                                                      

              </form><?php if($rk=="tampil"){?>
                    <table id="example2" class=" table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="text-align: center ; " width="5%">No</th>
                          <th style="text-align: center ; " width="80%">Nama Barang</th>
                          <th style="text-align: center ; " width="10%">Tanggal Terakhir</th>
                          <th style="text-align: center ; " width="10%">Stock</th>
                          <th style="text-align: center ; " width="10%">Aksi</th>
                        </tr>
                      </thead>
<?php if (isset($btt)) $no=1; { foreach ($btt as $btt) {
$barang=$this->db->query("SELECT kd_barang, nm_barang, MAX(tanggal) AS tanggal FROM tr_barang_keluar WHERE kd_barang='$btt->kd_barang' GROUP BY kd_barang")->row(); if($barang!=null) {?>
<tr>
  <td><?php echo $no++; ?></td>
  <td><?php echo $btt->nm_barang; ?></td>
  <td><?php echo $barang->tanggal; ?></td>
  <td><?php echo $btt->stock; ?></td>
  <td align="center"><?php echo '<div class="btn-group">'.anchor(site_url('gudang/laporan/detail_btt/'.$btt->kd_barang.''),'<i class="fa fa-binoculars"></i>','class="btn btn-xs btn-success"data-toggle="tooltip" data-placement="bottom" title="Detail" ').'</div>'; ?></td>
</tr>
<?php }} }?>

                      
                    </table><?php } ?>
                  </div>
                </div>
              </div>



            </div>
<script type="text/javascript">
$(document).ready(function() {
    $('#example2').DataTable();
} );
      $(document).ready(function() {

        $(".tahun").select2({
          placeholder: "Tahun",
          allowClear: true,    dropdownAutoWidth : true,height: '100%',
        });        
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });
      $("#datepicker").datepicker( {
    format: "mm/yyyy",
    startView: "months", 
    minViewMode: "months",
      autoclose: true,
});</script>

      