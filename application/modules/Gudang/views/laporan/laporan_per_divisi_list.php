
<?php echo $this->session->flashdata('message')?><br>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">  <?php if ( $rk=="tampil") { ?>
                  
            <div class="pull-right">             
                <div class="btn-group">
                <?php echo anchor(site_url('gudang/laporan/laporan_per_divisi_excel'), '<i class="fa fa-file-excel-o"></i>  ', 'class="btn btn-success btn-sm"'); 
                ?>
                </div>                
            </div><?php } ?>  
                    <h2>Laporan Pengeluaran Barang Per Divisi</h2>                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
        <form id="myform" data-parsley-validate   action=""<?php echo base_url().'gudang/laporan/lap_per_divisi'?>" method="post">
                <div class="row">

                  <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                          <select   class="unit form-control input-sm" name="unit" required="" >
                    <option></option>
                    <option <?php if("all"==$kd_unit){echo "selected";}?> value="all">Semua Unit</option>
                    <?php foreach($unit as $unit){?>
                    <option <?php if($unit->kd_unit==$kd_unit){echo "selected";}?> value="<?php echo $unit->kd_unit?>"><?php echo $unit->nm_unit ?></option>
                    <?php }?>
                          </select>                   
                  </div>

                  <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                          <select   class="kategori form-control input-sm" name="kategori" required="" >
                    <option></option>
                    <option <?php if("all"==$kd_kategori){echo "selected";}?> value="all">Semua Kategori</option>
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
        <input class="form-control tanggal" id="date" name="date1" value="<?php echo $date1 ?>" type="text"/>
       </div></div>
                  <div class="col-md-2 col-sm-12 col-xs-12 form-group">
       <div class="input-group">
        <div class="input-group-addon">
         <i class="fa fa-calendar">
         </i>
        </div>
        <input class="form-control tanggal" id="date" name="date2" value="<?php echo $date2 ?>" type="text"/>
       </div></div>       
                <div class="pull-right col-md-2 col-sm-12 col-xs-12"> <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Tampilkan</button></div>   </div>                                                      

              </form><?php if($rk=="tampil"){?>
                    <table id="example2" class=" table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="text-align: center ; " width="5%">No</th>
                          <th style="text-align: center ; " width="15%">Nama Barang</th>
                          <th style="text-align: center ; " width="10%">Satuan</th>
                          <th style="text-align: center ; " width="10%">Kategori</th>
                          <th style="text-align: center ; " width="10%">Jumlah</th>
                          <th style="text-align: center; ; " width="10%">Harga</th>
                          <th style="text-align: center; ; " width="10%">Total Harga</th>
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
                    ajax: {"url": "<?php echo base_url()?>gudang/laporan/json", "type": "POST"},
                    columns: [
                        {
                            "data": "kd_barang",
                            "orderable": false,
                            "className" : "text-center",
                        },{"data": "nm_barang"},{"data": "satuan"},{"data": "nm_kategori"},{"data": "jumlah"},{"data": "harga","render": $.fn.dataTable.render.number( '.', '.', 0, '' ),"className" : "text-right"},{"data": "total","render": $.fn.dataTable.render.number( '.', '.', 0, '' ),"className" : "text-right"}
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
        $(".kategori").select2({
          placeholder: "Kategori",
          allowClear: true,    dropdownAutoWidth : true,
        });
        $(".unit").select2({
          placeholder: "Unit",
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
