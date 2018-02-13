<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=Rekap_Barang_Masuk".$this->session->userdata('tahun')."-".$this->session->userdata('bulan').".xls");

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
</style> <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title"> 
                    <h4><center>Rekap Barang Masuk</center></h4><h5><center>                    <?php
$date=date_create($this->session->userdata('tahun')."-".$this->session->userdata('bulan')."-01");
echo "Periode ".date_format($date,"F Y");
?><br></center></h5>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content"><div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered" width="100%" border="1">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th width="100">Tanggal</th>
                          <th width="60" >No TTB</th>
                          <th width="60" >No SPP</th>
                          <th >Purchase</th>
                          <th  >Kategori</th>
                          <th  width="100" >Kode Barang</th>
                          <th  >Nama Barang</th>
                          <th  >Spesifikasi</th>
                          <th  >Jumlah</th>
                          <th style="text-align: center; ; " >Satuan</th>
                          <th  >Harga</th>
                          <th  width="140" >Total Harga</th>
                        </tr>
                      </thead>
<tbody>
<?php $no=1; foreach ($rk as $rk) { ?>

  <tr>
    <td align="center"><?php echo $no++; ?></td>
    <td><?php echo $rk->tgl; ?></td>
    <td><?php echo $rk->no_ttb; ?></td>
    <td><?php echo $rk->no_spp; ?></td>
    <td><?php echo $rk->purchase; ?></td>
    <td><?php echo $rk->inisial; ?></td>
    <td><?php echo $rk->kd_barang; ?></td>
    <td><?php echo $rk->nm_barang; ?></td>
    <td><?php echo $rk->spesifikasi; ?></td>
    <td align="right"><?php echo $rk->jumlah; ?></td>
    <td><?php echo $rk->satuan; ?></td>
    <td align="right"><?php echo $rk->harga; ?></td>
    <td align="right"><?php echo $rk->total; ?></td>
  </tr>
<?php } ?>
</tbody>

                      
                    </table>
</div>
                  </div>
                </div>
              </div>



            </div>


