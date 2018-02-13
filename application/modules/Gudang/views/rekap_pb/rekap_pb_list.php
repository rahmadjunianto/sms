 <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title"> 
                    <h2>Rekap Pemakaian Barang</h2>
    <div class="pull-right">             
                <div class="btn-group">
                <?php echo anchor(site_url('gudang/rekap_pb/rekap_pb_excel/'), '<i class="fa fa-file-excel-o"></i>  ', 'class="btn btn-success btn-sm"'); 
                ?>
                </div>                
            </div>                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
        <form id="myform" data-parsley-validate   action=""<?php echo base_url().'gudang/laporan/lap_per_bulan'?>" method="post">
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                          <select   class="kategori form-control input-sm" name="kategori" required="" >
                    <option <?php if("all"==$kd_kategori){echo "selected";}?> value="all">Semua Kategori</option>
                    <option></option>
                    <?php foreach($kategori as $kategori){?>
                    <option <?php if($kategori->kd_kategori==$kd_kategori){echo "selected";}?> value="<?php echo $kategori->kd_kategori?>"><?php echo $kategori->nm_kategori ?></option>
                    <?php }?>
                          </select>                   
                  </div> 
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

              </form><div class="table-responsive">
              <?php if($rk=="tampil"){?>
                    <table id="example2" class=" table table-striped table-bordered" style="font-size: 11px">
                      <thead>
                        <tr>
                          <th style="text-align: center ;font-size: 10px; ">No</th>
                          <th style="text-align: center ;font-size: 10px; " >Tanggal</th>
                          <th style="text-align: center;font-size: 10px; ; " >Kat</th>
                          <th style="text-align: center;font-size: 10px; ; " >Kode Barang</th>
                          <th style="text-align: center;font-size: 10px; ; " >Nama Barang</th>
                          <th style="text-align: center;font-size: 10px; ; " >Spek</th>
                          <th style="text-align: center;font-size: 10px; ; " >Qty</th>
                          <th style="text-align: center;font-size: 10px; ; " >Sat</th>
                          <th style="text-align: center;font-size: 10px; ; " >Harga</th>
                          <th style="text-align: center;font-size: 10px; ; " >Total Harga</th>
                          <th style="text-align: center ;font-size: 10px; " >Divisi</th>
                          <th style="text-align: center ;font-size: 10px; " >Alokasi P</th>
                          <th style="text-align: center ;font-size: 10px; " >Alokasi B</th>
                          <th style="text-align: center ;font-size: 10px; " >Penerima</th>
                        </tr>
                      </thead>


                      
                    </table><?php } ?>
</div>
                  </div>
                </div>
              </div>



            </div>

<script>
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
                  responsive: true,
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
                    ajax: {"url": "<?php echo base_url()?>gudang/rekap_pb/json", "type": "POST"},
                    columns: [
                        {
                            "data": "kd_barang_keluar",
                            "orderable": false,
                            "className" : "text-center",
                        },{"data": "tanggal"},{"data": "inisial"},{"data": "kd_barang"},{"data": "nm_barang"},{"data": "spesifikasi"},{"data": "jumlah","className" : "text-right",},{"data": "satuan"},{"data": "harga","render": $.fn.dataTable.render.number( '.', '.', 0, '' ),"className" : "text-right",},{"data": "tot","render": $.fn.dataTable.render.number( '.', '.', 0, '' ),"className" : "text-right",},{"data": "nm_divisi"},{"data": "nm_alok_p"},{"data": "nm_alok_b"},{"data": "penerima"},
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
        $(".grader").select2({
          placeholder: "Grader",
          allowClear: true,    dropdownAutoWidth : true,
        });
        $(".kategori").select2({
          placeholder: "Kategori",
          allowClear: true,    dropdownAutoWidth : true,height: '100%',width: '240px'
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

