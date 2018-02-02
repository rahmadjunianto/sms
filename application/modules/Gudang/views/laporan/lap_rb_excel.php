<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=Laporan_Riwayat_barang.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>
<style type="text/css">
  .tablee {
    border-collapse:collapse;
    border: 1px solid black !important;;
  }
  .tablee  td{
    border: 1px solid black !important;;
  }
  .tablee  tr{
    border: 1px solid black !important;;
  } 
  .tablee  th{
    border: 1px solid black !important;;
  }    
  .tablee  tbody{
    border: 1px solid black !important;;
  }      
</style>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">    
                    <h2 style="text-align: center;">Laporan Riwayat Barang <?php echo $nm_barang; ?> </h2>                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="example2" class="tablee table-bordered" width="100%">
                      <thead>
                        <tr>
                          <th style="text-align: center ; border: 1px solid black !important; " width="5%">No</th>
                          <th style="text-align: center ; border: 1px solid black !important; " width="10%">Tanggal</th>
                          <th style="text-align: center ; border: 1px solid black !important; " width="10%">Activity</th>
                          <th style="text-align: center ; border: 1px solid black !important; " width="10%">Unit/Supplier</th>
                          <th style="text-align: center ; border: 1px solid black !important; " width="10%">Jumlah</th>
                        </tr>
                      </thead>
<?php if (isset($rb)) $no=1; { foreach ($rb as $rb) { ?>
<tr>
  <td align="center" <?php if ($rb->kd_unit==0) {echo "style='background-color: #E6E6E6 ;border: 1px solid black !important;';";  } else {echo "style='background-color: #EFF8FB ;border: 1px solid black !important;';";} ?>><?php echo $no++; ?></td>
  <td align="left" <?php if ($rb->kd_unit==0) {echo "style='background-color: #E6E6E6 ;border: 1px solid black !important;';";  } else {echo "style='background-color: #EFF8FB ;border: 1px solid black !important;';";} ?> ><?php echo $rb->tgl; ?></td>
  <td align="center" <?php if ($rb->kd_unit==0) {echo "style='background-color: #E6E6E6 ;border: 1px solid black !important;';";  } else {echo "style='background-color: #EFF8FB ;border: 1px solid black !important;';";} ?> ><?php if ($rb->kd_unit==0) {echo "Masuk";  } else { echo "Keluar";} ?></td>
  <td align="left" <?php if ($rb->kd_unit==0) {echo "style='background-color: #E6E6E6 ;border: 1px solid black !important;';";  } else {echo "style='background-color: #EFF8FB ;border: 1px solid black !important;';";} ?> ><?php echo $rb->nm_unit; ?></td>
  <td align="center" <?php if ($rb->kd_unit==0) {echo "style='background-color: #E6E6E6 ;border: 1px solid black !important;';";  } else {echo "style='background-color: #EFF8FB ;border: 1px solid black !important;';";} ?>  align="right"><?php echo $rb->jumlah; ?></td>
</tr>
<?php } }?>
                    </table>
                  </div>
                </div>
              </div>



            </div>