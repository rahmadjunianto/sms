<div class="page-title">
<style type="text/css">
    
</style>  
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <h3 style="text-align: center;"><b>  <center> BERITA ACARA SERAH TERIMA KAYU BULAT  <br>                            
<?php echo $kd_siklus."/".substr($tanggal,0,2)."/".substr($tanggal,3,2)."/".substr($tanggal,6,4); ?>  </center></h3></b>     
 <div class="clearfix"></div>
                  <div class="x_content">
<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                    <table  width="100%" style="font-size: 12px">
                      <thead  >
                        <tr>
                          <th align="left" width="20%">Nama Grader</th>
                          <td class="text-left" width="20%"><b>:</b> <?php echo $nama_grader; ?></td>

                          <th align="left" width="20%">No Mobil</th>
                          <td class="text-left" ><b>:</b> <?php echo $plat_nomor; ?></td>                          
                          <th align="left" width="10%">Kecamatan</th>
                          <td class="text-left" ><b>:</b> <?php echo $kecamatann; ?></td>                          
                        </tr>
                        <tr>
                          <th align="left" width="10%">Nama Supplier</th>
                          <td class="text-left" ><b>:</b> <?php echo $nama_supplier; ?></td>

                          <th align="left" width="10%">Jenis Kayu</th>
                          <td class="text-left" ><b>:</b> <?php echo $jenis_kayu; ?></td>                           
                          <th align="left" width="10%">Kabupaten</th>
                          <td class="text-left" ><b>:</b> <?php echo $kabupatenn; ?></td>                          
                        </tr>
                        <tr> 
                          <th align="left" width="10%">Asal Kayu</th>
                          <td class="text-left" ><b>:</b> <?php echo $asal_kayu; ?></td><td></td><td></td><td></td><td></td>
                        </tr>

                      </thead>


                      
                    </table>
<!--<div class="col-md-12 col-sm-12 col-xs-12">  
<div class="col-md-4">
                        <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" id="last-name" readonly="" name="nama_grader" required="required" placeholder="Nama Grader" class="form-control col-md-7 col-xs-12" value="<?php echo $nama_grader; ?>">                     
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" id="last-name" readonly="" name="nama_grader" required="required" placeholder="Nama Grader" class="form-control col-md-7 col-xs-12" value="<?php echo $nama_supplier; ?>">                           
                        </div>
                      </div>                      
</div>
<div class="col-md-4">
                      <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" id="last-name" readonly="" name="plat_nomor" required="required" placeholder="No Mobil" class="form-control col-md-7 col-xs-12" value="<?php echo $plat_nomor; ?>">                     
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" id="last-name" name="kabupaten" required="required" readonly="" placeholder="No Mobil" class="form-control col-md-7 col-xs-12" value="<?php echo $kabupatenn; ?>">                     
                        </div>
                      </div>                    
</div>
<div class="col-md-4">
                      <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" id="last-name" readonly="" name="jenis_kayu" required="required" placeholder="Jenis Kayu" class="form-control col-md-7 col-xs-12" value="<?php echo $kecamatann; ?>">              
                        </div>
                      </div>                                             
                      <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" id="last-name" readonly="" name="jenis_kayu" required="required" placeholder="Jenis Kayu" class="form-control col-md-7 col-xs-12" value="<?php echo $jenis_kayu; ?>">                     
                        </div>
                      </div> 
</div>


</div>-->

                    </form>
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
                    <table id="example2" class="table table-striped table-bordered" width="100%" style="border-collapse:collapse;
    border: 1px solid black;">
                      <thead >
                        <tr style="border-collapse:collapse;
    border: 1px solid black;">
                          <th style="border-collapse:collapse;
    border: 1px solid black;" class="text-center" width="5%">No</th>
                          <th style="border-collapse:collapse;
    border: 1px solid black;" class="text-center" width="15%">Kelas Diamater</th>
                          <th style="border-collapse:collapse;
    border: 1px solid black;" class="text-center" width="15%">Batang</th>
                          <th style="border-collapse:collapse;
    border: 1px solid black;" class="text-center"  width="15%">Volume</th>
                          <th style="border-collapse:collapse;
    border: 1px solid black;" class="text-center" width="10%">Presentase</th>
                          <th style="border-collapse:collapse;
    border: 1px solid black;" class="text-center" width="10%">Keterangan</th>
                        </tr>
                      </thead>
                     <tbody>
                      <?php $vol='';$btg=0;$no='1'; foreach ($jml_p as $jml_p) { ?>
                      
                     
                       <tr style="border-collapse:collapse;
    border: 1px solid black;">
                         <td  style="border-collapse:collapse;
    border: 1px solid black;"class="text-center"><?php echo $no++; ?></td>
                         <td style="border-collapse:collapse;
    border: 1px solid black;">Panjang <?php echo $jml_p->panjang_kayu; ?></td>
                         <td style="border-collapse:collapse;
    border: 1px solid black;"></td>
                         <td style="border-collapse:collapse;
    border: 1px solid black;"></td>
                         <td style="border-collapse:collapse;
    border: 1px solid black;"></td>
                         <td style="border-collapse:collapse;
    border: 1px solid black;"></td>
                       </tr>
                       <?php $kd=$this->db->query("SELECT panjang_kayu, CONCAT(kd_bawah,'-',kd_atas,' cm') AS kd , SUM(batang) batang, SUM(volume) AS volume FROM tr_dukb_detail WHERE tr_dukb_id=$id and panjang_kayu=$jml_p->panjang_kayu GROUP BY kd")->result();
                        foreach ($kd as $kd) { $vol +=$kd->volume;?>
                       
                       <tr style="border-collapse:collapse;
    border: 1px solid black;">
                         <td style="border-collapse:collapse;
    border: 1px solid black;"></td>
                         <td style="border-collapse:collapse;
    border: 1px solid black;" align="center"><?php echo $kd->kd; ?></td>
                         <td style="border-collapse:collapse;
    border: 1px solid black;" align="center"><?php echo $kd->batang; ?> Btg</td>
                         <td style="border-collapse:collapse;
    border: 1px solid black;" align="center"><?php echo round($kd->volume,4); ?> m<sup>3</sup></td>
                         <td style="border-collapse:collapse;
    border: 1px solid black;"></td>
                         <td style="border-collapse:collapse;
    border: 1px solid black;"></td>
                       </tr>                       
                       <?php $btg+=$kd->batang;}?>
                       <?php  $s=$this->db->query("SELECT panjang_kayu, SUM(batang) batang, SUM(volume) AS volume FROM tr_dukb_detail WHERE tr_dukb_id=$id AND panjang_kayu=$jml_p->panjang_kayu GROUP BY panjang_kayu")->result(); foreach ($s as $s) {?>
                       <tr style="border-collapse:collapse;
    border: 1px solid black;">
                         <td style="border-collapse:collapse;
    border: 1px solid black;" colspan="2" align="center"> Subtotal </td>
                         <td style="border-collapse:collapse;
    border: 1px solid black;" align="center"><?php echo $s->batang;  ?> Btg</td>
                         <td style="border-collapse:collapse;
    border: 1px solid black;" align="center"><?php echo round($s->volume,4); ?> m<sup>3</sup></td>
                         <td style="border-collapse:collapse;
    border: 1px solid black;"></td>
                         <td style="border-collapse:collapse;
    border: 1px solid black;"></td>
                       </tr>
                       <?php } ?>

                       <?php } ?>
                       <tr style="border-collapse:collapse;
    border: 1px solid black;">
                         <td style="border-collapse:collapse;
    border: 1px solid black;" colspan="2" align="center"> Total </td>
                         <td style="border-collapse:collapse;
    border: 1px solid black;" align="center"><?php echo $btg; ?> Btg</td>
                         <td style="border-collapse:collapse;
    border: 1px solid black;" align="center"><?php echo round($vol,4); ?> m<sup>3</sup></td>
                         <td style="border-collapse:collapse;
    border: 1px solid black;"></td>
                         <td style="border-collapse:collapse;
    border: 1px solid black;"></td>
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
