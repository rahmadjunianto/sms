<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=Laporan Mutasi Barang.xls");

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
                   <center> <h4>Laporan Mutasi Barang</h4>      </center>             
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
 <br>                   
                    <table id="example2" border="1" width="100%" class="table table-striped table-bordered" style="font-size: 12px">
                      <thead>
                        <tr>
                          <th rowspan="2" class="text-center" width="5%">No</th>
                          <th rowspan="2" class="text-center" width="15%">Nama barang</th>
                          <th colspan="2" class="text-center" width="20%"> Awal</th>
                          <th colspan="2" class="text-center" width="20%">Masuk</th>
                          <th colspan="2" class="text-center" width="20%">Keluar</th>
                          <th colspan="2" class="text-center" width="20%">Stock Akhir </th>
                        </tr>
                        <tr>
                          
                          <th class="text-center" width="10%">Qty</th>
                          <th class="text-center" width="15%">Nominal</th>                          
                          <th class="text-center" width="10%">Qty</th>
                          <th class="text-center" width="15%">Nominal</th>                          
                          <th class="text-center" width="10%">Qty</th>
                          <th class="text-center" width="15%">Nominal</th>                          
                          <th class="text-center" width="10%">Qty</th>
                          <th class="text-center" width="15%">Nominal</th>
                        </tr>
                      </thead>
                      <tbody><?php  $no=1; foreach ($rk as $rk) {
                        ?>
                        <tr>
                          <td align="center" widtd="5%"><?php echo $no++; ?></td>
                          <td widtd="8%"><?php echo $rk->nm_barang; ?></td>
                          <td widtd="13%"><?php echo $rk->qty_a; ?></td>
                          <td widtd="12%"><?php echo $rk->stok_awal; ?></td>
                          <td widtd="15%"><?php echo $rk->qty_m; ?></td>
                          <td widtd="10%"><?php echo $rk->masuk; ?></td>
                          <td widtd="10%"><?php echo $rk->qty_k; ?></td>
                          <td widtd="10%"><?php echo $rk->keluar; ?></td>
                          <td widtd="10%"><?php echo $rk->qty; ?></td>
                          <td widtd="10%"><?php echo $rk->saldo; ?></td>
                        </tr><?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
</div>


            </div>


