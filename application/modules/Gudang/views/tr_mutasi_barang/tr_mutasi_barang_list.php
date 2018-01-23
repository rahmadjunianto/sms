<div class="page-title">

            </div>

            <div class="clearfix"></div>
<?php echo $this->session->flashdata('message')?><br>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title"> 
                    <h2>Mutasi Barang</h2>
            <div class="pull-right">
                <div class="btn-group">
                <?php echo anchor(site_url('gudang/tr_mutasi_barang/create'), '<i class="fa fa-plus"></i> Tambah', 'class="btn btn-success btn-sm"'); 
                ?>
                </div>
            </div>                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">        <form id="myform" data-parsley-validate   action=""<?php echo base_url().'gudang/laporan/lap_per_divisi'?>" method="post">
                <div class="row">

                  <div class="col-md-2 col-sm-12 col-xs-12 form-group">
       <div class="input-group">
        <div class="input-group-addon">
         <i class="fa fa-calendar">
         </i>
        </div>
        <input class="form-control datepicker" id="datepicker" name="date" value="<?php echo $date ?>" type="text"/>
       </div></div> 
      
                <div class="pull-right col-md-2 col-sm-12 col-xs-12"> <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Tampilkan</button></div>   </div>                                                      

              </form><?php if($rk=="tampil"){?>
                    <table id="example2" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th rowspan="2" class="text-center" width="5%">No</th>
                          <th rowspan="2" class="text-center" width="15%">Nama barang</th>
                          <th colspan="2" class="text-center" width="20%"> Awal</th>
                          <th colspan="2" class="text-center" width="20%">Masuk</th>
                          <th colspan="2" class="text-center" width="20%">Keluar</th>
                          <th colspan="2" class="text-center" width="20%">Stock Akhir </th>
                        </tr>
                        <tr>
                          
                          <th class="text-center" width="10%">Qty</th>
                          <th class="text-center" width="15%">Nominal</th>                          
                          <th class="text-center" width="10%">Qty</th>
                          <th class="text-center" width="15%">Nominal</th>                          
                          <th class="text-center" width="10%">Qty</th>
                          <th class="text-center" width="15%">Nominal</th>                          
                          <th class="text-center" width="10%">Qty</th>
                          <th class="text-center" width="15%">Nominal</th>
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
                    ajax: {"url": "<?php echo base_url()?>gudang/tr_mutasi_barang/json", "type": "POST"},
                    columns: [
                        {
                            "data": "kd_mutasi",
                            "orderable": false,
                            "className" : "text-center",
                        },
                        {
                          "data": "nm_barang"
                        },
                        {"data": "qty_a"},
                        {
                          "data": "stok_awal",
                          "render": $.fn.dataTable.render.number( '.', '.', 0, '' ),
                          "className" : "text-right"
                        },
                        {"data": "qty_m"},
                        {
                          "data": "masuk",
                          "render": $.fn.dataTable.render.number( '.', '.', 0, '' ),
                          "className" : "text-right"
                        },
                        {"data": "qty_k"},
                        {
                          "data": "keluar",
                          "render": $.fn.dataTable.render.number( '.', '.', 0, '' ),
                           "className" : "text-right"
                        },
                        {"data": "qty"},
                        {
                          "data": "saldo",
                          "render": $.fn.dataTable.render.number( '.', '.', 0, '' ),
                          "className" : "text-right"},
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
      $(document).ready(function() {
        $(".barang").select2({
          placeholder: "Barang",
          allowClear: true,    dropdownAutoWidth : true,
        });
        $(".kategori").select2({
          placeholder: "Kategori",
          allowClear: true,    dropdownAutoWidth : true,height: '100%',
        });        
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });      $("#datepicker").datepicker( {
    format: "mm/yyyy",
    startView: "months", 
    minViewMode: "months",
      autoclose: true,
});
        </script>
