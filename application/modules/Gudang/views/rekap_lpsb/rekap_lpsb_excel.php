<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=Rekap_Laporan_persediaan_barang".$this->session->userdata('tahun')."-".$this->session->userdata('bulan').".xls");

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
</style>  <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title"> 
                    <h4><center>Rekap Laporan Persediaan Barang </center></h4><h5><center>                    <?php
$date=date_create($this->session->userdata('tahun')."-".$this->session->userdata('bulan')."-01");
echo "Periode ".date_format($date,"F Y");
?><br></center></h5>
    <div class="pull-right">             
                <div class="btn-group">
                <?php echo anchor(site_url('gudang/rekap_lpsb/rekap_lpsb_excel/'), '<i class="fa fa-file-excel-o"></i>  ', 'class="btn btn-success btn-sm"'); 
                ?>
                </div>                
            </div>                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table id="example2" class=" table table-striped table-bordered" width="100%" border="1">
                      <thead>
                        <tr>
                          <th style="text-align: center ; vertical-align: middle " rowspan="2">No</th>
                          <th style="text-align: center ; vertical-align: middle  " rowspan="2" >Kategori</th>
                          <th style="text-align: center ; " >Stock Awal</th>
                          <th style="text-align: center ; " >Masuk</th>
                          <th style="text-align: center ; " >Keluar</th>
                          <th style="text-align: center ; " >Stock Akhir</th>
                        </tr>
                        <tr>
                          <th style="text-align: center ; ">Total Harga</th>
                          <th style="text-align: center ; ">Total Harga</th>
                          <th style="text-align: center ; ">Total Harga</th>
                          <th style="text-align: center ; ">Total Harga</th>
                        </tr>
                      </thead>
<tbody>
<?php         $bulantahuns=date('m-Y', strtotime('-1 months', strtotime($tahun."-".$bulan))); 
        $bulans=substr($bulantahuns,0,2);
        $tahuns=substr($bulantahuns,3,4);
        $no=1;
        $data= $this->db->query("SELECT nm_kategori,SUM(tot_awal) as t_awal,SUM(tot_m) as m,SUM(tot_k) as k,SUM(tot_akhir) as t_akhir
FROM ref_kategori a 
JOIN (SELECT a.kd_kategori,a.kd_barang,a.nm_barang,a.harga,IFNULL(masuk_a.jumlah*a.harga,0)-IFNULL(keluar_a.jumlah*a.harga,0) AS tot_awal,IFNULL(masuk.jumlah ,0)AS jml_m,IFNULL(masuk.jumlah*a.harga,0) AS tot_m,IFNULL(keluar.jumlah,0) AS jml_k,
IFNULL(keluar.jumlah*a.harga,0) AS tot_k,IFNULL(masuk_a.jumlah*a.harga,0)-IFNULL(keluar_a.jumlah*a.harga,0)+IFNULL(masuk.jumlah*a.harga,0)-IFNULL(keluar.jumlah*a.harga,0) AS tot_akhir
FROM ref_barang a 

LEFT JOIN (SELECT kd_barang,nm_barang,SUM(jumlah) AS jumlah FROM tr_barang_masuk
WHERE DATE_FORMAT(tanggal,'%Y-%m') BETWEEN '2016-01' AND '$tahuns-$bulans'
GROUP BY kd_barang,nm_barang) masuk_a ON a.kd_barang=masuk_a.kd_barang
LEFT JOIN (SELECT kd_barang,nm_barang,SUM(jumlah) AS jumlah FROM tr_barang_keluar
WHERE DATE_FORMAT(tanggal,'%Y-%m') BETWEEN '2016-01' AND '$tahuns-$bulans'
GROUP BY kd_barang,nm_barang) keluar_a ON  a.kd_barang=keluar_a.kd_barang

LEFT JOIN (SELECT kd_barang,nm_barang,SUM(jumlah) AS jumlah FROM tr_barang_masuk
WHERE YEAR(tanggal) ='$tahun' AND MONTH(tanggal) ='$bulan'
GROUP BY kd_barang,nm_barang) masuk ON a.kd_barang=masuk.kd_barang
LEFT JOIN (SELECT kd_barang,nm_barang,SUM(jumlah) AS jumlah FROM tr_barang_keluar
WHERE YEAR(tanggal) ='$tahun' AND MONTH(tanggal) ='$bulan'
GROUP BY kd_barang,nm_barang) keluar ON  a.kd_barang=keluar.kd_barang
GROUP BY a.kd_barang,a.nm_barang,a.harga) b ON a.kd_kategori=b.kd_kategori
GROUP BY a.kd_kategori")->result();   $t_awal=0;$t_akhir=0;$k=0;$m=0;
foreach ($data as $data) { ?>
  <tr>
    <td align="center"><?php echo $no++; ?></td>
    <td><?php echo $data->nm_kategori; ?></td>
    <td align="right"><?php echo number_format($data->t_awal,'0','','.'); ?></td>
    <td align="right"><?php echo number_format($data->m,'0','','.'); ?></td>
    <td align="right"><?php echo number_format($data->k,'0','','.'); ?></td>
    <td align="right"><?php echo number_format($data->t_akhir,'0','','.'); ?></td>
  </tr>
<?php $t_awal+=$data->t_awal;$t_akhir+=$data->t_akhir;$m+=$data->m;$k+=$data->k;}?>

    <tr>
      <td></td>
      <td>Total</td>
      <td align="right"><?php echo number_format($t_awal,'0','','.');; ?></td>
      <td align="right"><?php echo number_format($m,'0','','.');; ?></td>
      <td align="right"><?php echo number_format($k,'0','','.');; ?></td>
      <td align="right"><?php echo number_format($t_akhir,'0','','.');; ?></td>
    </tr>  
</tbody>

                      
                    </table>
</div>
                  </div>
                </div>
              </div>



            </div>

<script>

      $("#datepicker").datepicker( {
    format: "mm/yyyy",
    startView: "months", 
    minViewMode: "months",
      autoclose: true,
});
</script>

