<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=laporan_Rekapitulasi_Biaya_Pemakaian_Barang".$this->session->userdata('tahun')."-".$this->session->userdata('bulan').".xls");

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
                    <h4><center>Laporan Rekapitulasi Biaya Pemakaian Barang </center></h4><h5><center>                    <?php
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
<?php $select="";$selectsum=""; $sumcase="";$kat= $this->db->query("select * from ref_kategori order by kd_kategori asc")->result(); foreach ($kat as $kat) { $string = preg_replace('/[^\p{L}\p{N}\s]/u', '', $kat->inisial);

                            $sumcase.="
SUM(CASE WHEN SUBSTRING(kd_barang,1,2)='".$kat->kd_kategori."' THEN (harga*jumlah)  ELSE 0 END) AS ".$string.",";
                            $select.="IFNULL(".$string.", 0) AS ".$string.",";
                            $selectsum.="IFNULL(SUM(".$string."), 0) AS ".$string.",";

  }?>              
              <?php $div= $this->db->query("select * from ref_divisi order by kd_divisi asc")->result(); 
              foreach ($div as $div) { ?><br>
              Biaya Divisi <?php echo $div->nm_divisi; ?>
                    <table id="example2" class=" table table-striped table-bordered" width="100%" border="1">
                      <thead>
                        <tr>
                          <th style="text-align: center ; vertical-align: middle " >No</th>
                          <th style="text-align: center ; vertical-align: middle  " >Divisi</th>
<?php  $kat= $this->db->query("select * from ref_kategori order by kd_kategori asc")->result(); foreach ($kat as $kat) { ?>
                          <th style="text-align: center ; " ><?php echo $kat->inisial; ?></th>
<?php } ?>
                          <th style="text-align: center ; " >Total</th>
                        </tr>
                      </thead>
<tbody>
<?php $no=1;
$rk= $this->db->query("
SELECT nm_divisi,nm_sub_div,$select total
FROM ref_sub_div a 
LEFT JOIN ref_divisi b ON a.kd_divisi=b.kd_divisi
LEFT JOIN (
SELECT kd_divisi,kd_sub_div, $sumcase
IFNULL(SUM(harga*jumlah),0) AS total
FROM tr_barang_keluar
WHERE kd_divisi='$div->kd_divisi' AND YEAR(tanggal)='$tahun' AND MONTH(tanggal)='$bulan'

GROUP BY kd_divisi,kd_sub_div
) c ON  a.kd_sub_div=c.kd_sub_div AND c.kd_divisi=b.kd_divisi WHERE a.kd_divisi='$div->kd_divisi'")->result();
foreach ($rk as $rk) {
  ?>
  <tr>
    <td align="center"><?php echo $no++; ?></td>
    <td><?php echo $rk->nm_sub_div; ?></td>
<?php  $kat= $this->db->query("select * from ref_kategori order by kd_kategori asc")->result(); foreach ($kat as $kat) { $string = preg_replace('/[^\p{L}\p{N}\s]/u', '', $kat->inisial);?>
                          <td style="text-align: right ; " ><?php echo number_format($rk->$string,'0','','.'); ?></td>
<?php } ?>
    <td align="right"><?php echo number_format($rk->total,'0','','.'); ?></td>
  </tr>
<?php } ?> 

<!-- total -->
  <tr>
    <td colspan="2" style="text-align: center ; vertical-align: middle " >Total</td>
<?php  
$t= $this->db->query("
SELECT nm_divisi,nm_sub_div,$selectsum sum(total) as total
FROM ref_sub_div a 
LEFT JOIN ref_divisi b ON a.kd_divisi=b.kd_divisi
LEFT JOIN (
SELECT kd_divisi,kd_sub_div, $sumcase
IFNULL(SUM(harga*jumlah),0) AS total
FROM tr_barang_keluar
WHERE kd_divisi='$div->kd_divisi' AND YEAR(tanggal)='$tahun' AND MONTH(tanggal)='$bulan'

GROUP BY kd_divisi,kd_sub_div
) c ON  a.kd_sub_div=c.kd_sub_div AND c.kd_divisi=b.kd_divisi WHERE a.kd_divisi='$div->kd_divisi'
GROUP BY a.kd_divisi")->result();
foreach ($t as $t) {
?>
<?php  $kat= $this->db->query("select * from ref_kategori order by kd_kategori asc")->result(); foreach ($kat as $kat) { $string = preg_replace('/[^\p{L}\p{N}\s]/u', '', $kat->inisial);?>
                          <td style="text-align: right ; " ><?php echo number_format($t->$string,'0','','.'); ?></td>
<?php } ?>
<?php } ?>
<td align="right"><?php echo number_format($t->total,'0','','.'); ?></td>

  </tr>
</tbody>
                    </table><?php } ?>
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

