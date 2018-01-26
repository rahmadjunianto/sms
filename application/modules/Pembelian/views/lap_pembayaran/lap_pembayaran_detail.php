            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title text-center">
            <div class="pull-right">             
                <div class="btn-group">
                <?php echo anchor(site_url('Pembelian/lap_pembayaran'), '<i class="fa fa-chevron-left"></i>  ', 'class="btn btn-success btn-sm"'); 
                ?>
                </div>
                <div class="btn-group">
                <?php echo anchor(site_url('Pembelian/lap_pembayaran/pdfbap'), '<i class="fa fa-file-pdf-o"></i>  ', 'class="btn btn-danger btn-sm"'); 
                ?>
                </div>                
            </div>                                       

                    <h2 class="text-center">Laporan Pembayaran</h2>
 <div class="clearfix"></div>

                  </div>
                  <div class="x_content">
                  </div>
                </div>

              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class=""> 
                    <h2></h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table  width="100%">
                      <thead align="center">
                        <tr>
                          <th class="text-left" width="10%">Nama Supplier</th>
                          <td class="text-left" ><b>:</b> <?php echo $nama_supplier; ?></td>  
                                                  
                          <th class="text-left" width="10%">Tanggal</th>
                          <td class="text-left" width="30%"><b>:</b> <?php echo date_format(date_create($tanggal),"d-M-Y");; ?></td>

                       
                    
                        </tr>
                        <tr>

                          <th class="text-left" width="10%">Kabupaten</th>
                          <td class="text-left" ><b>:</b> <?php echo $kabupatenn; ?></td>  
                          <th class="text-left" width="10%">Jenis Kayu</th>
                          <td class="text-left" ><b>:</b> <?php echo $jenis_kayu; ?></td>                           
                        
                        </tr>
                        <tr>
                          <th class="text-left" width="10%">Kecamatan</th>
                          <td class="text-left" ><b>:</b> <?php echo $kecamatann; ?></td>                           
                          <th class="text-left" width="10%">Kode Siklus</th>
                          <td class="text-left" ><b>:</b> <?php echo $kd_siklus; ?></td>                        
                        </tr>                        
                        <tr>
                          <th class="text-left" width="10%">No Kendaraan</th>
                          <td class="text-left" ><b>:</b> <?php echo $plat_nomor; ?></td>                             
                        </tr>
                      </thead>
                      
                    </table><br>                    
                    <table  style='font-size:12px' id="example2" class="table  table-bordered">
                      <thead >
                        <tr >
                          <th height="30" style='vertical-align:middle;height: 25px' rowspan="2" class="text-center" width="10%">Diamater</th>
                          <th height="10" colspan="2" class="text-center" width="15%">BSTKB</th>
                          <th style='vertical-align:middle;height: 25px' rowspan="2" class="text-center"  width="15%">Harga Rp / M <sup>3</sup></th>
                          <th style='vertical-align:middle;height: 25px' rowspan="2" class="text-center" width="10%">Jumlah Harga</th>
                        </tr>
                        <tr>
                          <th height="15" class="text-center" width="15%">Batang</th>
                          <th height="15" class="text-center"  width="15%">Volume</th>
                        </tr>                        
                      </thead>
                     <tbody>
                      <?php $warna='#E0ECF8';
$last=null; $vol='';$btg=0;$total=0;$no='1'; foreach ($jml_p as $jml_p) { if($last!==$jml_p->panjang_kayu){ $last=$dt->panjang_kayu; if($warna=='#E0ECF8'){$warna= "#EFF8FB";}else{$warna= "#E0ECF8";} } ?>
                      
                     
                       <tr style="background-color:<?php echo $warna?>">
                         <td class="text-center">Panjang <?php echo $jml_p->panjang_kayu; ?></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                       </tr>
                       <?php $kd=$this->db->query("SELECT a.panjang_kayu, CONCAT(a.kd_bawah,'-',a.kd_atas,' cm') AS kd , SUM(a.batang) batang, SUM(a.volume) AS volume,c.harga,
(SUM(a.volume) * c.harga) AS total
FROM tr_dukb_detail a JOIN tr_dukb b ON a.tr_dukb_id=b.id_dukb
JOIN man_harga_kayu c ON a.panjang_kayu=c.panjang_kayu AND a.kd_atas=c.kd_atas AND a.kd_bawah=c.kd_bawah 
AND b.kode_supplier=c.kode_supplier
AND b.kabupaten=c.kabupaten AND b.kecamatan=c.kecamatan
WHERE a.tr_dukb_id=$id AND a.panjang_kayu=$jml_p->panjang_kayu  GROUP BY kd")->result();
                        foreach ($kd as $kd) { $vol +=$kd->volume;?>
                       
                       <tr style="background-color:<?php echo $warna?>">
                         <td align="center"><?php echo $kd->kd; ?></td>
                         <td align="center"><?php echo $kd->batang; ?> Btg</td>
                         <td align="center" id="v<?php echo $kd->panjang_kayu ?> "><?php echo round($kd->volume,4); ?> m<sup>3</sup></td>
                         <td align="right"><?php echo number_format($kd->harga,'0','','.') ?></td>
                         <td align="right"><?php echo number_format($kd->total,'0','','.'); ?></td>
                       </tr>                       
                       <?php $btg+=$kd->batang;$total+=$kd->total;}?>
                       <?php  $s=$this->db->query("SELECT SUM(batang) AS batang,SUM(volume)AS volume, SUM(total) AS total
FROM(
SELECT a.panjang_kayu, CONCAT(a.kd_bawah,'-',a.kd_atas,' cm') AS kd , SUM(a.batang) batang, SUM(a.volume) AS volume,c.harga,
(SUM(a.volume) * c.harga) AS total
FROM tr_dukb_detail a JOIN tr_dukb b ON a.tr_dukb_id=b.id_dukb
JOIN man_harga_kayu c ON a.panjang_kayu=c.panjang_kayu AND a.kd_atas=c.kd_atas AND a.kd_bawah=c.kd_bawah 
AND b.kode_supplier=c.kode_supplier
AND b.kabupaten=c.kabupaten AND b.kecamatan=c.kecamatan
WHERE a.tr_dukb_id=$id AND a.panjang_kayu=$jml_p->panjang_kayu GROUP BY kd )a")->result(); foreach ($s as $s) {?>
                       <tr style="background-color:<?php echo $warna?>">
                         <td style="font-weight: bold;" align="center"> Jumlah </td>
                         <td style="font-weight: bold;" align="center"><?php echo $s->batang;  ?> Btg</td>
                         <td style="font-weight: bold;" align="center"><?php echo round($s->volume,4); ?> m<sup>3</sup></td>
                         <td></td><td style="font-weight: bold;" align="right"><?php echo number_format($s->total,'0','','.'); ?></td>
                       </tr>                     
                       <?php } ?>

                       <?php } ?>
                       <tr style="background-color:#A9D0F5">
                         <td style="font-weight: bold;" align="center"> Total </td>
                         <td style="font-weight: bold;" align="center"><?php echo $btg; ?> Btg</td>
                         <td style="font-weight: bold;" align="center"><?php echo round($vol,4); ?> m<sup>3</sup></td>
                         <td></td>
                         <td style="font-weight: bold;" align="right"><?php echo number_format($total,'0','','.'); ?></td>
                       </tr>                         
                     </tbody>  
                  
                      
                    </table>
                  </div>
                </div>
              </div>


            </div>


    <script>
      $(document).ready(function() {
        $(".supplier").select2({
          placeholder: "Supplier",
          allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });
      $(document).ready(function() {
        $(".kabupaten").select2({
          placeholder: "Kabupaten",
          allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      }); 
      $(document).ready(function() {
        $(".kecamatan").select2({
          placeholder: "Kecamatan",
          allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });            
    </script>
    </script>  
