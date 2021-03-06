
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">  <?php if ( $rk=="tampil") { ?>
                  
            <div class="pull-right">             
                <div class="btn-group">
                <?php echo anchor(site_url('gudang/laporan/lap_rb_excel'), '<i class="fa fa-file-excel-o"></i>  ', 'class="btn btn-success btn-sm"'); 
                ?>
                </div>                
            </div><?php } ?>  
                    <h2>Laporan Riwayat Barang </h2>                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
        <form id="myform" data-parsley-validate   action=""<?php echo base_url().'gudang/laporan/lap_per_bulan'?>" method="post">
                <div class="row">
                  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                          <select   class="barang form-control input-sm" name="barang" required="" >
                    <option></option>
                    <?php foreach($barang as $barang){?>
                    <option <?php if($barang->kd_barang==$kd_barang){echo "selected";}?> value="<?php echo $barang->kd_barang?>"><?php echo $barang->nm_barang." ( ".$barang->spesifikasi." ) "." (".$barang->satuan.")" ?></option>
                    <?php }?>
                          </select>                   
                  </div>     
                <div class="col-md-2 col-sm-12 col-xs-12"> <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Tampilkan</button></div>   </div>                                                      

              </form><?php if($rk=="tampil"){?>
                    <table id="example2" class=" table  table-bordered">
                      <thead>
                        <tr>
                          <th style="text-align: center ; " width="5%">No</th>
                          <th style="text-align: center ; " width="10%">Tanggal</th>
                          <th style="text-align: center ; " width="10%">Activity</th>
                          <th style="text-align: center ; " width="10%">Divisi/Supplier</th>
                          <th style="text-align: center ; " width="10%">Jumlah</th>
                        </tr>
                      </thead>
<?php if (isset($rb)) $no=1; { foreach ($rb as $rb) { ?>
<tr>
  <td align="center" <?php if ($rb->kd_divisi==0) {echo "style='background-color: #E6E6E6 '";  } else {echo "style='background-color: #EFF8FB '";} ?>><?php echo $no++; ?></td>
  <td <?php if ($rb->kd_divisi==0) {echo "style='background-color: #E6E6E6 '";  } else {echo "style='background-color: #EFF8FB '";} ?> ><?php echo $rb->tgl; ?></td>
  <td <?php if ($rb->kd_divisi==0) {echo "style='background-color: #E6E6E6 '";  } else {echo "style='background-color: #EFF8FB '";} ?> ><?php if ($rb->kd_divisi==0) {echo "Masuk";  } else { echo "Keluar";} ?></td>
  <td <?php if ($rb->kd_divisi==0) {echo "style='background-color: #E6E6E6 '";  } else {echo "style='background-color: #EFF8FB '";} ?> ><?php echo $rb->nm_divisi; ?></td>
  <td <?php if ($rb->kd_divisi==0) {echo "style='background-color: #E6E6E6 '";  } else {echo "style='background-color: #EFF8FB '";} ?>  align="right"><?php echo $rb->jumlah; ?></td>
</tr>
<?php } }?>

                      
                    </table><?php } ?>
                  </div>
                </div>
              </div>



            </div>
<script type="text/javascript">
$(document).ready(function() {
    $('#example2').DataTable();
} );</script>

       <script type="text/javascript">
/*
            $(document).ready(function() {
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
                    ajax: {"url": "<?php echo base_url()?>gudang/laporan/json_rb", "type": "POST"},
                    columns: [
                        {
                            "data": "tanggal",
                            "orderable": false,
                            "className" : "text-center",
                        },{"data": "tanggal"},         {
    "data": "kd_divisi",
    "render": function ( data, type, row, meta ) {
                  switch(data) {
               case '0' :  return "Masuk" ; break;
               default  : return 'Keluar';
            }
    }
  },{"data": "nm_divisi"},{"data": "jumlah","className" : "text-right",},
                    ],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                        var divisi = data['kd_divisi'];
                    if ( divisi == 0 )
                    {
                        $('td', row).css('background-color', '#E6E6E6');
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
          allowClear: true,    dropdownAutoWidth : true,width: '200px'
        });
        $(".barang").select2({
          placeholder: "Barang",
          allowClear: true,    dropdownAutoWidth : true,height: '100%',width: '340px'
        });        
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });
      $("#datepicker").datepicker( {
    format: "mm/yyyy",
    startView: "months", 
    minViewMode: "months",
      autoclose: true,
});
        </script>
