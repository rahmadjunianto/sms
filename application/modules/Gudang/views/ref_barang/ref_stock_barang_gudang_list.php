            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title"> 
                    <h2>Stock Barang Gudang</h2>              <div class="pull-right">             
                <div class="btn-group">
                <?php echo anchor(site_url('gudang/ref_barang/stock_gudang_excel'), '<i class="fa fa-file-excel-o"></i>  ', 'class="btn btn-success btn-sm"'); 
                ?>
                </div>                
            </div>               
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
        <form id="myform" data-parsley-validate   action=""<?php echo base_url().'gudang/laporan/lap_per_divisi'?>" method="post">
                <div class="row">

                  <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                          <select   class="kategori form-control input-sm" name="kategori" required="" >
                    <option></option>
                    <option <?php if("all"==$kd_kategori){echo "selected";}?> value="all">Semua Kategori</option>
                    <?php foreach($kategori as $kategori){?>
                    <option <?php if($kategori->kd_kategori==$kd_kategori){echo "selected";}?> value="<?php echo $kategori->kd_kategori?>"><?php echo $kategori->nm_kategori ?></option>
                    <?php }?>
                          </select>                   
                  </div>      
                <div class="col-md-2 col-sm-12 col-xs-12"> <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Tampilkan</button></div>   </div>                                                      

              </form>
                    <table id="example2" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center" width="5%">No</th>
                          <th class="text-center" width="15%">Nama Barang</th>
                          <th class="text-center" width="10%">Kategori</th>
                          <th class="text-center" width="10%">Stock</th>
                          <th class="text-center" width="10%">Stock Minimum</th>
                          <th class="text-center" width="10%">Stock Maksimum</th>
                          <th class="text-center" width="10%">Harga</th>
                          <th class="text-center" width="7%">Nominal</th>
                        </tr>
                      </thead>
                    </table>
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
            });
      $(document).ready(function() {
        $(".grader").select2({
          placeholder: "Grader",
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
      });
        </script>
