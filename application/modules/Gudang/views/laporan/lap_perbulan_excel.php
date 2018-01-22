<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=Laporan Pengeluaran per Bulan.xls");

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
                   <center> <h4>Laporan Pengeluaran Barang Per Bulan</h4>      </center>             
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
 <br>                   
                    <table id="example2" border="1" width="100%" class="table table-striped table-bordered" style="font-size: 12px">
                          <th align="center" width="5%">No</th>
                          <th width="8%">Tanggal</th>
                          <th width="13%">Tanggal Validasi</th>
                          <th width="12%">Kode Siklus</th>
                          <th width="15%">Nama Supplier</th>
                          <th width="10%">Kabupaten</th>
                          <th width="10%">Kecamatan</th>                  
                      <tbody><?php  $no=1; foreach ($rk as $rk) {
                        ?>
                        <tr>
                          <td align="center" widtd="5%"><?php echo $no++; ?></td>
                          <td widtd="8%"><?php echo $rk->nm_barang; ?></td>
                          <td widtd="13%"><?php echo $rk->satuan; ?></td>
                          <td widtd="12%"><?php echo $rk->nm_kategori; ?></td>
                          <td widtd="15%"><?php echo $rk->jumlah; ?></td>
                          <td widtd="10%"><?php echo $rk->harga; ?></td>
                          <td widtd="10%"><?php echo $rk->total; ?></td>
                        </tr><?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
</div>


            </div>


