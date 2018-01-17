<div class="page-title">

            </div>

            <div class="clearfix"></div>
<?php echo $this->session->flashdata('message')?><br>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title"> 
                    <h2>Rekap Pembayaran </h2>                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
        <form id="myform" data-parsley-validate class="form-label-left form-inline"  action=""<?php echo base_url().'pembelian/rp'?>" method="post">
                <div class="row">


                  <div class="col-md-3 col-sm-6 col-xs-12 form-group">
                  <div class="form-group">
       <div class="input-group">
        <div class="input-group-addon">
         <i class="fa fa-calendar">
         </i>
        </div>
        <input class="form-control tanggal" id="date" name="date1" value="<?php echo $date1 ?>" type="text"/>
       </div></div></div>
                         <div class="col-md-3 col-sm-6 col-xs-12 form-group">
                  <div class="form-group">
       <div class="input-group">
        <div class="input-group-addon">
         <i class="fa fa-calendar">
         </i>
        </div>
        <input class="form-control tanggal" id="date" name="date2" value="<?php echo $date2 ?>" type="text"/>
       </div></div></div>
                <div class="pull-right col-md-2 col-sm-12 col-xs-12"> <button type="submit" class="btn btn-default"><i class="fa fa-search"></i> Tampilkan</button></div>                                                          

              </form>
 <br>                   <?php if($rk=="tampil"){?>
                    <table id="example2" class="table table-striped table-bordered" style="font-size: 12px" >
                      <thead>
                        <tr>
                          <th class="text-center" style="width: 10px">No</th>
                          <th class="text-center" style="width: 300px">Nama Supplier</th>
                          <th class="text-center" style="width: 10px">Aksi</th>
                        </tr>
                      </thead>
                    </table><?php } ?>
                  </div>
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
                    ajax: {"url": "<?php echo base_url()?>Pembelian/rp/json", "type": "POST"},
                    columns: [
                        {
                            "data": "kode_supplier",
                            "orderable": false,
                            "className" : "text-center",
                        },{"data":"nama_supplier"},
                        {
                            "data": "action",
                            "orderable": false,
                            "className" : "text-center",
                        }
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
    width: '200%',height: '100%',
        });
        $(".supplier").select2({
          placeholder: "Supllier",
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

