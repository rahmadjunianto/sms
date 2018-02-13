<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=Rekap_Pemakaian_Barang".$this->session->userdata('tahun')."-".$this->session->userdata('bulan').".xls");

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
                    <h4><center>Rekap Pemakaian Barang</center></h4><h5><center>              <?php if ($kd_kategori!="all") {
                     $row= $this->db->query("select * from ref_kategori where kd_kategori='$kd_kategori'")->row();  echo $row->nm_kategori;
                   } else {echo "Semua Kategori";}?> <br>         <?php
$date=date_create($this->session->userdata('tahun')."-".$this->session->userdata('bulan')."-01");
echo "Periode ".date_format($date,"F Y");
?><br></center></h5>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content"><div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered" width="100%" border="1">
                      <thead>
                        <tr>
                          <th style="text-align: center ;font-size: 10px; ">No</th>
                          <th style="text-align: center ;font-size: 10px; " >Tanggal</th>
                          <th style="text-align: center;font-size: 10px; ; " >Kat</th>
                          <th style="text-align: center;font-size: 10px; ; " >Kode Barang</th>
                          <th style="text-align: center;font-size: 10px; ; " >Nama Barang</th>
                          <th style="text-align: center;font-size: 10px; ; " >Spek</th>
                          <th style="text-align: center;font-size: 10px; ; " >Qty</th>
                          <th style="text-align: center;font-size: 10px; ; " >Sat</th>
                          <th style="text-align: center;font-size: 10px; ; " >Harga</th>
                          <th style="text-align: center;font-size: 10px; ; " >Total Harga</th>
                          <th style="text-align: center ;font-size: 10px; " >Divisi</th>
                          <th style="text-align: center ;font-size: 10px; " >Alokasi P</th>
                          <th style="text-align: center ;font-size: 10px; " >Alokasi B</th>
                          <th style="text-align: center ;font-size: 10px; " >Penerima</th>
                        </tr>
                      </thead>
<tbody>
<?php $no=1; foreach ($rk as $rk) { ?>

  <tr>
    <td align="center"><?php echo $no++; ?></td>
    <td><?php echo $rk->tanggal; ?></td>
    <td><?php echo $rk->inisial; ?></td>
    <td><?php echo $rk->kd_barang; ?></td>
    <td><?php echo $rk->nm_barang; ?></td>
    <td><?php echo $rk->spesifikasi; ?></td>
    <td align="right"><?php echo $rk->jumlah; ?></td>
    <td><?php echo $rk->satuan; ?></td>
    <td align="right"><?php echo $rk->harga; ?></td>
    <td align="right"><?php echo $rk->tot; ?></td>
    <td><?php echo $rk->nm_divisi; ?></td>
    <td ><?php echo $rk->nm_alok_p; ?></td>
    <td ><?php echo $rk->nm_alok_b; ?></td>
    <td><?php echo $rk->penerima; ?></td>
  </tr>
<?php } ?>
</tbody>

                      
                    </table>
</div>
                  </div>
                </div>
              </div>



            </div>


