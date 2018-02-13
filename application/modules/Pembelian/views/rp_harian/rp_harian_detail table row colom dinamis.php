
<div class="page-title">

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class=" text-center">
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

                    <h2 class="text-center">Rekap Terima Pembayaran Log</h2>
 <div class="clearfix"></div>

                  </div>
                  <div class="x_content">
<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                    <!--<table  width="100%">
                      <thead align="center">
                        <tr>
                          <th class="text-left" width="10%">Tanggal</th>
                          <td class="text-left" width="30%"><b>:</b> <?php echo date_format(date_create($tanggal),"d-M-Y");; ?></td>

                          <th class="text-left" width="10%">No Kendaraan</th>
                          <td class="text-left" ><b>:</b> <?php echo $plat_nomor; ?></td>                          
                          <th class="text-left" width="10%">Kecamatan</th>
                          <td class="text-left" ><b>:</b> <?php echo $kecamatann; ?></td>                          
                        </tr>
                        <tr>
                          <th class="text-left" width="10%">Nama Supplier</th>
                          <td class="text-left" ><b>:</b> <?php echo $nama_supplier; ?></td>

                          <th class="text-left" width="10%">Jenis Kayu</th>
                          <td class="text-left" ><b>:</b> <?php echo $jenis_kayu; ?></td>                           
                          <th class="text-left" width="10%">Kabupaten</th>
                          <td class="text-left" ><b>:</b> <?php echo $kabupatenn; ?></td>                          
                        </tr>
                        <tr>
                          <th class="text-left" width="10%">Kode Siklus</th>
                          <td class="text-left" ><b>:</b> <?php echo $kd_siklus; ?></td>                        
                        </tr>                        

                      </thead>


                      
                    </table>-->

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
                    <table  style='font-size:12px' id="example2" class="table  table-bordered">
                      <thead >
                        <tr >
                          <th height="30" style='vertical-align:middle;height: 25px' rowspan="2" class="text-center" width="8%">Tanggal</th>                          <?php  $arr=array(); $sumcase=""; $r=0; foreach ($p as $p) {
                            $sumcase.="
SUM(CASE WHEN b.panjang_kayu = '".$p->panjang_kayu."' THEN b.batang  ELSE 0 END) AS b".$p->panjang_kayu.",
SUM(CASE WHEN b.panjang_kayu = '".$p->panjang_kayu."' THEN ROUND(b.volume,4)  ELSE 0 END) AS v".$p->panjang_kayu.",
SUM(CASE WHEN b.panjang_kayu = '".$p->panjang_kayu."' THEN b.harga  ELSE 0 END) AS h".$p->panjang_kayu.",";
                             ?>
                            <th height="10" colspan="3" class="text-center" width="15%">Jumlah <?php echo $p->panjang_kayu; ?></th>
                          <?php array_push($arr,$p->panjang_kayu); $r++;} ?>
                          <th style='vertical-align:middle;height: 25px' rowspan="2" class="text-center"  width="15%">Jumlah Harga</th>
                        </tr>
                        <tr>

                          <?php for ($i=0; $i < $r ; $i++) { ?>
                           <th height="15" class="text-center" width="10%">Batang <?php echo $arr[$i] ?></th>
                          <th height="15" class="text-center"  width="10%">M <sup>3</sup></th>
                          <th height="15" class="text-center"  width="10%">Rp</th>                                                                          
                          <?php } ?>
                        </tr>

                      </thead>
                     <tbody>
                     <?php $sql=$this->db->query("SELECT a.id_dukb,tanggal, $sumcase SUM(b.harga) AS harga
FROM tr_dukb a JOIN tr_dukb_detail b ON a.id_dukb=b.tr_dukb_id
WHERE a.kode_supplier =$id AND tanggal='$tgl' AND a.status='Tervalidasi' GROUP BY a.id_dukb")->result(); 
foreach ($sql as $sql) {  ?>


                       <tr >
                         <td class="text-center"><?php echo $sql->tanggal; ?></td>

                         <?php for ($a=0; $a < $r ; $a++) { $eb='b'.$arr[$a];$ev='v'.$arr[$a];$eh='h'.$arr[$a] /*if(is_array($p2)){ foreach ($p2 as $p2) {*/   ?>
                         <td><?php echo $sql->$eb ?></td>
                         <td><?php echo $sql->$ev ?></td>
                         <td align="right"><?php echo $sql->$eh ?></td>
                         <?php }   ?>

                         <td align="right"><?php echo number_format($sql->harga,'0','','.'); ?></td>
                       </tr> <?php  } ?>                       
                     </tbody>  
                  
                      
                    </table><?php foreach ($p2 as $p2) {
                      echo $p2->panjang_kayu;
                    } ?>
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
