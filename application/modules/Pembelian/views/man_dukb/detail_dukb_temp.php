<table id="datatable-keytable" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                        <tr>
                          <th class="text-center" width="5%">No</th>
                          <th class="text-center" width="15%">Panjang Kayu</th>
                          <th class="text-center" width="15%">Diamater</th>
                          <th class="text-center" width="15%">Batang</th>
                          <th class="text-center" width="10%">Volume</th>
                          <th class="text-center" width="10%">Harga</th>
                          <th class="text-center" width="7%">Aksi</th>
                        </tr>
                              </tr>
                            </thead>
                            <tbody>
<?php $ku=$this->session->userdata('ku');
$dt=$this->db->query("SELECT id_dukb_detail,batang,panjang_kayu,diameter, (CASE WHEN (LENGTH(volume) = 5) THEN REPLACE(CONCAT(volume,'0'),'.',',') WHEN (LENGTH(volume) = 4) THEN REPLACE(CONCAT(volume,'00 '),'.',',') ELSE REPLACE(CONCAT(volume,' '),'.',',') END) AS volume,harga from tr_dukb_detail_temp where kd_pengguna=$ku")->result(); $no=1;

$warna='#E6E6E6';
$last=null;
foreach ($dt as $dt) { if($last!==$dt->panjang_kayu){ $last=$dt->panjang_kayu; if($warna=='#E6E6E6'){$warna= "#EFF8FB";}else{$warna= "#E6E6E6";} } ?>
                              
                              <tr style="background-color:<?php echo $warna?>">
                                <td class="text-center" ><?php echo $no++; ?></td>
                                <td class="text-center" ><?php echo $dt->panjang_kayu; ?></td>
                                <td class="text-center" ><?php echo $dt->diameter; ?></td>
                                <td class="text-center" ><?php echo $dt->batang; ?></td>
                                <td class="text-center" ><?php echo $dt->volume; ?></td>
                                <td class="text-center" ><?php echo number_format($dt->harga,'0','','.'); ?></td>
                                <td align="center" ><?php echo '<div class="btn-group">'.anchor(site_url('pembelian/man_dukb/delete/'.$dt->id_dukb_detail.''),'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger" id="delete" data-id="'.$dt->id_dukb_detail.'" href="javascript:void(0)"').'</div>'; ?></td>
                              </tr>
<?php   } ?>                              
                            </tbody>
                          </table><script type="text/javascript">
$(document).ready(function() {
    $('#datatable-keytable').DataTable();
} );</script>