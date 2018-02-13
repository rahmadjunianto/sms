
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
</style>
<?php  ?>
 <table class=" table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="text-align: center ;vertical-align: middle !important;
} " width="" rowspan="3">No</th>
                          <th style="text-align: center ;vertical-align: middle !important;
} " width="" rowspan="3">Tangal Masuk Pabrik</th>
                          <th style="text-align: center ;vertical-align: middle !important;
} " width="" rowspan="3">Tanggal BAP</th>
                          <th style="text-align: center ;vertical-align: middle !important;
} " width="" rowspan="3">No BAP</th>
                          <th style="text-align: center ;vertical-align: middle !important;
} " width="" rowspan="3">Jenis Kayu</th>
                          <th style="text-align: center;vertical-align: middle !important;
} ; " width="" rowspan="3">Nomor Mobil</th>
                          <th style="text-align: center;vertical-align: middle !important;
} ; " width="" colspan="3">Asal Kayu</th>
                          <th style="text-align: center;vertical-align: middle !important;
} ; " width="" rowspan="3">Supplier</th>
                          <th style="text-align: center;vertical-align: middle !important;
} ; " width="" rowspan="3">Kode Grader</th>
                          <th style="text-align: center;vertical-align: middle !important;
} ; " width="" rowspan="3">Nama Grader</th>
<!-- menampilkan panjang kayu -->
                          <?php $arr_p=array();$arr_kd=array();foreach ($panjang_kayu as $panjang_kayu) {$jml_kd=0;
        $kd=$this->db->query("SELECT DISTINCT panjang_kayu,kd_bawah,kd_atas FROM ref_panjang_kayu WHERE panjang_kayu='$panjang_kayu->panjang_kayu' GROUP BY panjang_kayu,kd_atas,kd_bawah")->result();
foreach ($kd as $kd) {
	$jml_kd++;
 array_push($arr_kd,$kd->kd_bawah."-".$kd->kd_atas." Cm");}
                          	?>

                          <th colspan="<?php echo $jml_kd*3+3; ?>"><?php echo "Log(Panjang ".$panjang_kayu->panjang_kayu." cm) " ?></th>
                          <?php array_push($arr_p,$kd->panjang_kayu); } ?>
<!-- menampilkan panjang kayu -->
                          <th colspan="<?php echo ($jml_p->jml_p*3)+3 ?>">Total</th>
                        </tr>
                        <tr>
                          <th rowspan="2">Kode Asal</th>
                          <th rowspan="2">Kabupaten</th>
                          <th rowspan="2">Kecamatan  </th>
<!-- menampilkan kelas diameter-->
<?php $sumcase=""; for ($i=0; $i < count($arr_p) ; $i++) {
        $k_d=$this->db->query("SELECT DISTINCT panjang_kayu,kd_bawah,kd_atas FROM ref_panjang_kayu WHERE panjang_kayu='$arr_p[$i]' GROUP BY panjang_kayu,kd_atas,kd_bawah")->result();
        foreach ($k_d as $k_d) { $sumcase.="
SUM(CASE WHEN e.panjang_kayu = '$k_d->panjang_kayu' AND e.kd_bawah='$k_d->kd_bawah' AND e.kd_atas='$k_d->kd_atas' THEN e.batang  ELSE 0 END) AS b".$k_d->panjang_kayu.$k_d->kd_bawah.$k_d->kd_atas.",
SUM(CASE WHEN e.panjang_kayu = '$k_d->panjang_kayu' AND e.kd_bawah='$k_d->kd_bawah' AND e.kd_atas='$k_d->kd_atas' THEN e.volume  ELSE 0 END) AS v".$k_d->panjang_kayu.$k_d->kd_bawah.$k_d->kd_atas.",
SUM(CASE WHEN e.panjang_kayu = '$k_d->panjang_kayu' AND e.kd_bawah='$k_d->kd_bawah' AND e.kd_atas='$k_d->kd_atas' THEN e.harga  ELSE 0 END) AS h".$k_d->panjang_kayu.$k_d->kd_bawah.$k_d->kd_atas.",";?>

<th colspan="3"><?php echo $k_d->kd_bawah."-".$k_d->kd_atas." Cm" ?></th>

<?php } ?>

<th colspan="3">SubTotal</th>

<?php }?>	
<!-- menampilkan kelas diameter-->				
<!-- total panjang kayu -->
<?php for ($i=0; $i < count($arr_p) ; $i++) { ?>

                          <th colspan="3"><?php echo "P.".$arr_p[$i]."" ?></th>
                          <?php } ?> 
<!-- total panjang kayu -->
							<th colspan="3">Total</th>
                        </tr>
                        <tr>
                        <!-- juumlah kd + jumlah panjang kayu -->	
                        	<?php for ($i=0; $i < (count($arr_kd))+$jml_p->jml_p ; $i++) { ?>
                        	<td>Pcs</td>
                        	<td>M <sup>3</sup></td>
                        	<td>Rp </td>
                        <?php	} ?>
						<!-- juumlah kd + jumlah panjang kayu -->
						<!-- total jumlah panjang kayu +1 -->
						<?php for ($i=0; $i < $jml_p->jml_p+1 ; $i++) { ?>
						<td>Pcs</td>
						<td>M <sup>3</sup></td>
						<td>Rp </td>
						                        <?php	} ?>
						<!-- total jumlah panjang kayu +1 -->

                        </tr>

                      </thead>

                      <tbody>
                      	<?php $no=1; foreach ($rk as $rk) { ?>
                      	<tr>
                      		<td><?php echo $no++; ?></td>
                      		<td><?php echo $rk->tanggal; ?></td>
                      		<td><?php echo $rk->tanggal; ?></td>
                      		<td><?php echo $rk->kd_siklus; ?></td>
                      		<td><?php echo $rk->jenis_kayu; ?></td>
                      		<td><?php echo $rk->plat_nomor; ?></td>
                      		<td><?php echo $rk->kd_asal; ?></td>
                      		<td><?php echo $rk->kabupaten; ?></td>
                      		<td><?php echo $rk->kecamatan; ?></td>
                      		<td><?php echo $rk->nama_supplier; ?></td>
                      		<td><?php echo $rk->kd_siklus; ?></td>
                      		<td><?php echo $rk->nm_grader; ?></td>
                      	</tr>
                      	<?php } ?>
                      </tbody>
</table>
<?php echo $sumcase; ?>