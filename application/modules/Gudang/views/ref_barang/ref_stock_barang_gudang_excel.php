<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=Laporan_Stock_Barang_Gudang.xls");

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
                   <center>  Laporan Persediaan Stock Barang <br> <?php if ($kd_kategori!="all") {
                     $row= $this->db->query("select * from ref_kategori where kd_kategori='$kd_kategori'")->row();  echo $row->nm_kategori;
                   } else {echo "Semua Kategori";}?> <br>  
                    <?php
$date=date_create($tahun."-".$bulan."-01");
echo "Periode ".date_format($date,"F Y");
?>
                    </center>             
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
 <br>                   
                    <table id="example2" border="1" width="100%" class="table table-striped table-bordered" style="font-size: 12px">
                      <thead>
                        <tr>
                          <th class="text-center" rowspan="2"  style="text-align: center ;vertical-align: middle !important; "  >No</th>
                          <th class="text-center" rowspan="2"  style="text-align: center ;vertical-align: middle !important; " >Kode Barang</th>
                          <th class="text-center" rowspan="2" style="text-align: center ;vertical-align: middle !important; "  width="300">Nama Barang</th>
                          <th class="text-center" rowspan="2" style="text-align: center ;vertical-align: middle !important; "  >Spesifikasi</th>
                          <th class="text-center" rowspan="2" style="text-align: center ;vertical-align: middle !important; "  >Satuan</th>
                          <th class="text-center" rowspan="2" style="text-align: center ;vertical-align: middle !important; "  >Kategori</th>
                          <th class="text-center" colspan="3" >Stock awal</th>
                          <th class="text-center" colspan="3" >Masuk</th>
                          <th class="text-center" colspan="3" >Keluar</th>
                          <th class="text-center" colspan="3" >Stok Akhir</th>
                        </tr>
                        <tr>
                          <td>Qty</td>
                          <td>Harga</td>
                          <td>Total Harga</td>
                          <td>Qty</td>
                          <td>Harga</td>
                          <td>Total Harga</td>
                          <td>Qty</td>
                          <td>Harga</td>
                          <td>Total Harga</td>
                          <td>Qty</td>
                          <td>Harga</td>
                          <td>Total Harga</td>
                        </tr>
                      </thead>                 
<tbody>
<?php 
        $bulantahuns=date('m-Y', strtotime('-1 months', strtotime($tahun."-".$bulan))); 
        $bulans=substr($bulantahuns,0,2);
        $tahuns=substr($bulantahuns,3,4);
        $no=1;
        if($kd_kategori!="all"){
$data= $this->db->query("SELECT a.kd_kategori,a.kd_barang,a.nm_barang,a.spesifikasi,a.satuan,b.inisial,a.harga,IFNULL(masuk_a.jumlah ,0)-IFNULL(keluar_a.jumlah ,0)AS jml_awal,IFNULL(masuk_a.jumlah*a.harga,0)-IFNULL(keluar_a.jumlah*a.harga,0) AS tot_awal,IFNULL(masuk.jumlah ,0)AS jml_m,IFNULL(masuk.jumlah*a.harga,0) AS tot_m,IFNULL(keluar.jumlah,0) AS jml_k,
IFNULL(keluar.jumlah*a.harga,0) AS tot_k,IFNULL(masuk_a.jumlah*a.harga,0)-IFNULL(keluar_a.jumlah*a.harga,0)+IFNULL(masuk.jumlah*a.harga,0)-IFNULL(keluar.jumlah*a.harga,0) AS tot_akhir
FROM ref_barang a 


LEFT JOIN (SELECT kd_barang,nm_barang,SUM(jumlah) AS jumlah FROM tr_barang_masuk
WHERE DATE_FORMAT(tanggal,'%Y-%m') BETWEEN '2016-01' AND '$tahuns-$bulans' AND SUBSTRING(kd_barang,1,2)='$kd_kategori'
GROUP BY kd_barang,nm_barang) masuk_a ON a.kd_barang=masuk_a.kd_barang
LEFT JOIN (SELECT kd_barang,nm_barang,SUM(jumlah) AS jumlah FROM tr_barang_keluar
WHERE DATE_FORMAT(tanggal,'%Y-%m') BETWEEN '2016-01' AND '$tahuns-$bulans' AND SUBSTRING(kd_barang,1,2)='$kd_kategori'
GROUP BY kd_barang,nm_barang) keluar_a ON  a.kd_barang=keluar_a.kd_barang

LEFT JOIN (SELECT kd_barang,nm_barang,SUM(jumlah) AS jumlah FROM tr_barang_masuk
WHERE YEAR(tanggal)='$tahun' AND MONTH(tanggal)='$bulan' AND SUBSTRING(kd_barang,1,2)='$kd_kategori'
GROUP BY kd_barang,nm_barang) masuk ON a.kd_barang=masuk.kd_barang
LEFT JOIN (SELECT kd_barang,nm_barang,SUM(jumlah) AS jumlah FROM tr_barang_keluar
WHERE YEAR(tanggal)='$tahun' AND MONTH(tanggal)='$bulan' AND SUBSTRING(kd_barang,1,2)='$kd_kategori'
GROUP BY kd_barang,nm_barang) keluar ON  a.kd_barang=keluar.kd_barang
JOIN ref_kategori b ON a.kd_kategori=b.kd_kategori where  SUBSTRING(a.kd_barang,1,2)='$kd_kategori'
GROUP BY a.kd_barang,a.nm_barang,a.harga")->result();}
else {

$data= $this->db->query("SELECT a.kd_kategori,a.kd_barang,a.nm_barang,a.spesifikasi,a.satuan,b.inisial,a.harga,IFNULL(masuk_a.jumlah ,0)-IFNULL(keluar_a.jumlah ,0)AS jml_awal,IFNULL(masuk_a.jumlah*a.harga,0)-IFNULL(keluar_a.jumlah*a.harga,0) AS tot_awal,IFNULL(masuk.jumlah ,0)AS jml_m,IFNULL(masuk.jumlah*a.harga,0) AS tot_m,IFNULL(keluar.jumlah,0) AS jml_k,
IFNULL(keluar.jumlah*a.harga,0) AS tot_k,IFNULL(masuk_a.jumlah*a.harga,0)-IFNULL(keluar_a.jumlah*a.harga,0)+IFNULL(masuk.jumlah*a.harga,0)-IFNULL(keluar.jumlah*a.harga,0) AS tot_akhir
FROM ref_barang a 


LEFT JOIN (SELECT kd_barang,nm_barang,SUM(jumlah) AS jumlah FROM tr_barang_masuk
WHERE DATE_FORMAT(tanggal,'%Y-%m') BETWEEN '2016-01' AND '$tahuns-$bulans'
GROUP BY kd_barang,nm_barang) masuk_a ON a.kd_barang=masuk_a.kd_barang
LEFT JOIN (SELECT kd_barang,nm_barang,SUM(jumlah) AS jumlah FROM tr_barang_keluar
WHERE DATE_FORMAT(tanggal,'%Y-%m') BETWEEN '2016-01' AND '$tahuns-$bulans'
GROUP BY kd_barang,nm_barang) keluar_a ON  a.kd_barang=keluar_a.kd_barang

LEFT JOIN (SELECT kd_barang,nm_barang,SUM(jumlah) AS jumlah FROM tr_barang_masuk
WHERE YEAR(tanggal)='$tahun' AND MONTH(tanggal)='$bulan'
GROUP BY kd_barang,nm_barang) masuk ON a.kd_barang=masuk.kd_barang
LEFT JOIN (SELECT kd_barang,nm_barang,SUM(jumlah) AS jumlah FROM tr_barang_keluar
WHERE YEAR(tanggal)='$tahun' AND MONTH(tanggal)='$bulan'
GROUP BY kd_barang,nm_barang) keluar ON  a.kd_barang=keluar.kd_barang
JOIN ref_kategori b ON a.kd_kategori=b.kd_kategori
GROUP BY a.kd_barang,a.nm_barang,a.harga")->result();

}
foreach ($data as $data) {
?>
<tr>
  <td align="center"><?php echo $no++; ?></td>
  <td><?php echo $data->kd_barang; ?></td>
  <td><?php echo $data->nm_barang; ?></td>
  <td><?php echo $data->spesifikasi; ?></td>
  <td><?php echo $data->satuan; ?></td>
  <td><?php echo $data->inisial; ?></td>
  <td><?php echo number_format($data->jml_awal,0,",","."); ?></td>
  <td align="right"><?php echo number_format($data->harga,'0','','.'); ?></td>
  <td align="right"><?php echo number_format($data->jml_awal*$data->harga,'0','','.'); ?></td>
  <td align="right"><?php echo number_format($data->jml_m,0,",","."); ?></td>
  <td align="right"><?php echo number_format($data->harga,'0','','.'); ?></td>
  <td align="right"><?php echo number_format($data->jml_m*$data->harga,'0','','.'); ?></td>
  <td align="right"><?php echo number_format($data->jml_k,0,",","."); ?></td>
  <td align="right"><?php echo number_format($data->harga,'0','','.'); ?></td>
  <td align="right"><?php echo number_format($data->harga*$data->jml_k,'0','','.'); ?></td>
  <td align="right"><?php echo number_format($data->jml_m+$data->jml_awal-$data->jml_k,0,",","."); ?></td>
  <td align="right"><?php echo number_format($data->harga,'0','','.'); ?></td>
  <td align="right"><?php echo number_format(($data->jml_awal*$data->harga)+($data->jml_m*$data->harga)-($data->harga*$data->jml_k),'0','','.'); ?></td>
</tr>
<?php } ?>                        
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
</div>


            </div>


