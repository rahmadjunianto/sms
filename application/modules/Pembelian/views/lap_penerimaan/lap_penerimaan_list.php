
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">  <?php if ( $rk=="tampil") { ?>
                  
            <div class="pull-right">             
                <div class="btn-group">
                <?php echo anchor(site_url('gudang/laporan/laporan_per_bulan_excel'), '<i class="fa fa-file-excel-o"></i>  ', 'class="btn btn-success btn-sm"'); 
                ?>
                </div>                
            </div><?php } ?>  
                    <h2>Laporan Penerimaa <?php echo $this->session->userdata('date'); ?>
                     </h2>                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
        <form id="myform" data-parsley-validate   action=""<?php echo base_url().'gudang/laporan/lap_per_bulan'?>" method="post">
                <div class="row">
                  <div class="col-md-2 col-sm-12 col-xs-12 form-group">
       <div class="input-group">
        <div class="input-group-addon">
         <i class="fa fa-calendar">
         </i>
        </div>
        <input class="form-control datepicker" id="datepicker" name="date" value="<?php echo $date ?>" type="text"/>
       </div></div>    
                <div class="col-md-2 col-sm-12 col-xs-12"> <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Tampilkan</button></div>   </div>                                                      

              </form><?php if($rk=="tampil"){?>
                    <table id="example2" class=" table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="text-align: center ;vertical-align: middle !important;
} " width="4%" rowspan="2">No</th>
                          <th style="text-align: center ;vertical-align: middle !important;
} " width="10%" rowspan="2">Tangal Masuk Pabrik</th>
                          <th style="text-align: center ;vertical-align: middle !important;
} " width="8%" rowspan="2">Tanggal BAP</th>
                          <th style="text-align: center ;vertical-align: middle !important;
} " width="8%" rowspan="2">No BAP</th>
                          <th style="text-align: center ;vertical-align: middle !important;
} " width="7%" rowspan="2">Jenis Kayu</th>
                          <th style="text-align: center;vertical-align: middle !important;
} ; " width="10%" rowspan="2">Nomor Mobil</th>
                          <th style="text-align: center;vertical-align: middle !important;
} ; " width="10%" colspan="3">Asal Kayu</th>
                          <th style="text-align: center;vertical-align: middle !important;
} ; " width="10%" rowspan="2">Supplier</th>
                        </tr>
                        <tr>
                          <th>Kode Asal</th>
                          <th>Kabupaten</th>
                          <th>Kecamatan</th>
                        </tr>
                      </thead>


                      
                    </table><?php } ?>
                  </div>
                </div>
              </div>



            </div>


       <script type="text/javascript">
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
                    ajax: {"url": "<?php echo base_url()?>pembelian/lap_penerimaan/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id_dukb",
                            "orderable": false,
                            "className" : "text-center",
                        },{"data": "tanggal"},{"data": "tanggal"},{"data": "kd_siklus"},{"data": "jenis_kayu"},{"data": "plat_nomor"},{"data": "plat_nomor"},{"data": "kabupaten"},{"data": "kecamatan"},{"data": "nama_supplier"}
                    ],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });

      $("#datepicker").datepicker( {
    format: "mm/yyyy",
    startView: "months", 
    minViewMode: "months",
      autoclose: true,
});
        </script>
