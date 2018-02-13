            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title"> 
                    <h2>Laporan Persediaan Stock Barang </h2>              <div class="pull-right">             
                <div class="btn-group">
                <?php echo anchor(site_url('gudang/ref_barang/stock_gudang_excel/'.$bulan.'/'.$tahun.'/'.$kd_kategori.''), '<i class="fa fa-file-excel-o"></i>  ', 'class="btn btn-success btn-sm"'); 
                ?>
                </div>                
            </div>               
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
        <form id="myform" data-parsley-validate   action=""<?php echo base_url().'gudang/laporan/lap_per_divisi'?>" method="post">
                <div class="row">

                  <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                          <select   class="kategori form-control input-sm" name="kategori" required="" >
                    <option <?php if("all"==$kd_kategori){echo "selected";}?> value="all">Semua Kategori</option>
                    <option></option>
                    <?php foreach($kategori as $kategori){?>
                    <option <?php if($kategori->kd_kategori==$kd_kategori){echo "selected";}?> value="<?php echo $kategori->kd_kategori?>"><?php echo $kategori->nm_kategori ?></option>
                    <?php }?>
                          </select>                   
                  </div> 
                  <div class="col-md-2 col-sm-12 col-xs-12 form-group">
       <div class="input-group">
        <div class="input-group-addon">
         <i class="fa fa-calendar">
         </i>
        </div>
        <input class="form-control datepicker" id="datepicker" name="date" value="<?php echo $date ?>" type="text"/>
       </div></div>      
                <div class="col-md-2 col-sm-12 col-xs-12"> <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Tampilkan</button></div>   </div>
              </form>
                    <?php if ( $rk=="tampil") { ?><div class="table-responsive">
                    <table id="datatable-keytable" class="table table-striped table-bordered "  style="font-size: 10px">
                      <thead>
                        <tr>
                          <th class="text-center" rowspan="2"  style="text-align: center ;vertical-align: middle !important; "  >No</th>
                          <th class="text-center" rowspan="2"  style="text-align: center ;vertical-align: middle !important; " >Kode Barang</th>
                          <th class="text-center" rowspan="2" style="text-align: center ;vertical-align: middle !important; "  width="300">Nama Barang</th>
                          <th class="text-center" rowspan="2" style="text-align: center ;vertical-align: middle !important; "  >Spek</th>
                          <th class="text-center" rowspan="2" style="text-align: center ;vertical-align: middle !important; "  >Sat</th>
                          <th class="text-center" rowspan="2" style="text-align: center ;vertical-align: middle !important; "  >Kat</th>
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
                    </table></div><?php } ?>
                  </div>
                </div>
              </div>



            </div>

<script type="text/javascript">
$(document).ready(function() {
    $('#datatable-keytable').DataTable();
} );</script>
       <script type="text/javascript">
/*            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#example2").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    
                        
                    
                    'oLanguage':
                    {
                      "sProcessing":   "Sedang memproses...",
                      "sLengthMenu":   "Tampilkan _MENU_ entri",
                      "sZeroRecords":  "Tidak ditemukan data yang sesuai",
                      "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                      "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
                      "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                      "sInfoPostFix":  "",
                      "sSearch":       "Cari:",
                      "sUrl":          "",
                      "oPaginate": {
                        "sFirst":    "Pertama",
                        "sPrevious": "Sebelumnya",
                        "sNext":     "Selanjutnya",
                        "sLast":     "Terakhir"
                      }
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "<?php echo base_url()?>gudang/ref_barang/json_stock_barang", "type": "POST"},
                    columns: [
                        {
                            "data": "kd_barang",
                            "orderable": false,
                            "className" : "text-center",
                        },{"data": "nm_barang"},{"data": "nm_kategori"},{"data": "stock_b",
                          "className" : "text-right"},{"data": "stock_min",
                          "className" : "text-right"},{"data": "stock_max",
                          "className" : "text-right"},{"data": "harga",
                          "render": $.fn.dataTable.render.number( '.', '.', 0, '' ),
                          "className" : "text-right"},
                        {
                            "data" : "nominal",
                          "render": $.fn.dataTable.render.number( '.', '.', 0, '' ),
                          "className" : "text-right"
                        }
                    ],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                        var stock = parseFloat(data['stock']);
                        var stock_min= parseFloat(data['stock_min']);
                        
                    if ( stock < stock_min )
                    {
                        $('td', row).css('background-color', '#FC8168');
                    }
                    else 
                    {
                        $('td', row).css('background-color', '#EFF8FB');
                    }
                    }// row color based on colomn value
                    
                });
            });*/
      $(document).ready(function() {
        $(".grader").select2({
          placeholder: "Grader",
          allowClear: true,    dropdownAutoWidth : true,
        });
        $(".kategori").select2({
          placeholder: "Kategori",
          allowClear: true,    dropdownAutoWidth : true,height: '100%',,width: '240px'
        });        
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });    $("#datepicker").datepicker( {
    format: "mm/yyyy",
    startView: "months", 
    minViewMode: "months",
      autoclose: true,
});
        </script>
