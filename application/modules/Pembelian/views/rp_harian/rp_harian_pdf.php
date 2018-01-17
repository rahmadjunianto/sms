<div class="page-title">
<style type="text/css">
  .tablee{
    border-collapse:collapse;
    border: 1px solid black !important;;
  }
  .tablee td{
    border: 1px solid black !important;;
  }
  .tablee tr{
    border: 1px solid black !important;;
  } 
  .tablee th{
    border: 1px solid black !important;;
  }    
  .tablee tbody{
    border: 1px solid black !important;;
  }      
</style>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class=" text-center">
            <div class="pull-right">             
                <div class="btn-group">
                <?php echo anchor(site_url('Pembelian/rp_harian'), '<i class="fa fa-chevron-left"></i>  ', 'class="btn btn-success btn-sm"'); 
                ?>
                </div>
                <div class="btn-group">
                <?php echo anchor(site_url('Pembelian/rp_harian/pdfrp_harian'), '<i class="fa fa-file-pdf-o"></i>  ', 'class="btn btn-danger btn-sm"'); 
                ?>
                </div>                
            </div>                                       

                                      <h3 style="text-align: center;"><b>  <center><u>REKAP TERIMA PEMBAYARAN LOG</u> </center></h3></b>   
 <div class="clearfix"></div>

                  </div>
                  <div class="x_content">
                    <table  width="100%" style='font-size:12px'>
                      <thead align="center">
                        <tr><?php $row=$this->db->query("select nama_supplier from ref_supplier where kode_supplier='".$id."'")->row();$nama=$row->nama_supplier;
                         ?>
                          <th align="left" width="10%">Nama Supplier</th>
                          <td class="text-left" width="85%"><b>:</b> <?php echo $nama; ?></td>                         
                        </tr>
                        <tr>
                          <th align="left" width="10%">Jenis Kayu</th>
                          <td class="text-left" ><b>:</b> <?php echo $this->session->userdata('jenis_kayu') ?></td>                         
                        </tr>                      

                      </thead>


                      
                    </table>
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
                    <table  style='font-size:12px' width="100%" id="example2" class="table tablee  table-bordered">
                      <thead >
                        <tr >
                          <th height="30" style='vertical-align:middle;height: 25px' rowspan="2" class="text-center" width="8%">Tanggal</th>                         
                            <th height="10" colspan="3" class="text-center" width="15%">Jumlah <?php $p1=$this->session->userdata('p1');echo $p1 ?> </th>
                            <th height="10" colspan="3" class="text-center" width="15%">Jumlah <?php $p2=$this->session->userdata('p2');echo $p2; ?></th>
                          <th style='vertical-align:middle;height: 25px' rowspan="2" class="text-center"  width="15%">Jumlah Harga</th>
                        </tr>
                        <tr>

                           <th height="15" class="text-center" width="10%">Batang </th>
                          <th height="15" class="text-center"  width="10%">M <sup>3</sup></th>
                          <th height="15" class="text-center"  width="10%">Rp</th>
                           <th height="15" class="text-center" width="10%">Batang </th>
                          <th height="15" class="text-center"  width="10%">M <sup>3</sup></th>
                          <th height="15" class="text-center"  width="10%">Rp</th>                                                                 
                        </tr>

                      </thead>
                     <tbody>
<?php $sql=$this->db->query("SELECT a.id_dukb,tanggal,
SUM(CASE WHEN b.panjang_kayu = '".$p1."' THEN b.batang  ELSE 0 END) AS b1,
SUM(CASE WHEN b.panjang_kayu = '".$p1."' THEN ROUND(b.volume,4)  ELSE 0 END) AS v1,
SUM(CASE WHEN b.panjang_kayu = '".$p1."' THEN b.harga  ELSE 0 END) AS h1,

SUM(CASE WHEN b.panjang_kayu = '".$p2."' THEN b.batang  ELSE 0 END) AS b2,
SUM(CASE WHEN b.panjang_kayu = '".$p2."' THEN ROUND(b.volume,4)  ELSE 0 END) AS v2,
SUM(CASE WHEN b.panjang_kayu = '".$p2."' THEN b.harga  ELSE 0 END) AS h2,

 SUM(b.harga) AS harga
FROM tr_dukb a JOIN tr_dukb_detail b ON a.id_dukb=b.tr_dukb_id
WHERE (b.panjang_kayu=".$p1." OR b.panjang_kayu=".$p2.") AND kode_supplier='".$id."' and tanggal='".$this->session->userdata('date')."' AND a.status='Tervalidasi' AND jenis_kayu='".$this->session->userdata('jenis_kayu')."' GROUP BY a.id_dukb")->result(); foreach ($sql as $sql) { $total+=$sql->harga;
  ?>
                     <tr>
                       <td><?php echo date_format(date_create("$sql->tanggal"),"d/m/Y"); ?></td>
                       <td align="right"><?php echo $sql->b1; ?></td>
                       <td align="right"><?php echo $sql->v1; ?></td>
                       <td align="right"><?php echo number_format($sql->h1,'0','','.'); ?></td>
                       <td align="right"><?php echo $sql->b2; ?></td>
                       <td align="right"><?php echo $sql->v2; ?></td>
                       <td align="right"><?php echo number_format($sql->h2,'0','','.'); ?></td>
                       <td align="right"><?php echo number_format($sql->harga,'0','','.'); ?></td>
  <?php  } ?>                   </tr>
                     <tr>
                       <td colspan="6"></td>
                       <td align="right">Total</td>
                       <td align="right"><?php echo number_format($total,'0','','.'); ?></td>
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
