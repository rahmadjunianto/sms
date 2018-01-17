<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=Laporan Depo Supplier.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>
<style type="text/css">
  table{
    border-collapse:collapse;
    border: 1px solid black !important;;
  }
  table td{
    border: 1px solid black !important;;
  }
  table tr{
    border: 1px solid black !important;;
  } 
  table th{
    border: 1px solid black !important;;
  }    
  table tbody{
    border: 1px solid black !important;;
  }      
</style>  <div class="page-title">

            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">                   
                   <center> <h4>Laporan Depo Supplier</h4>      </center>             
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
 <br>                   
                    <table id="example2" border="1" width="100%" class="table table-striped table-bordered" style="font-size: 12px">
                          <th width="5%">No</th>
                          <th width="8%">Tanggal</th>
                          <th width="13%">Tanggal Validasi</th>
                          <th width="12%">Kode Siklus</th>
                          <th width="15%">Nama Supplier</th>
                          <th width="10%">Kabupaten</th>
                          <th width="10%">Kecamatan</th>
                          <th width="10%">Volume</th>
                          <th width="10%">Nominal</th>                      
                      <tbody><?php $no=1; foreach ($rk as $rk) {
                        ?>
                        <tr>
                          <td widtd="5%"><?php echo $no++; ?></td>
                          <td widtd="8%"><?php echo $rk->tanggal; ?></td>
                          <td widtd="13%"><?php echo $rk->tanggal_val; ?></td>
                          <td widtd="12%"><?php echo $rk->kd_siklus; ?></td>
                          <td widtd="15%"><?php echo $rk->nama_supplier; ?></td>
                          <td widtd="10%"><?php echo $rk->kabupaten; ?></td>
                          <td widtd="10%"><?php echo $rk->kecamatan; ?></td>
                          <td widtd="10%"><?php echo $rk->volume; ?></td>
                          <td align="right" widtd="10%"><?php echo $rk->harga ?></td>
                        </tr><?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
</div>


            </div>


