<div class="page-title">

            </div>

            <div class="clearfix"></div>
<?php echo $this->session->flashdata('message')?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title"> 
                    <h2>Data Grup</h2>
            <div class="pull-right">
                <div class="btn-group">
                <?php echo anchor(site_url('Setting/Group/create'), '<i class="fa fa-plus"></i> Tambah', 'class="btn btn-success btn-sm"'); 
                ?>
                </div>
            </div>                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="example2" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="5%">No</th>
                          <th>Nama Grup</th>
                          <th width="10%">Aksi</th>
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
                $.fn.dataTable.ext.errMode = 'throw';
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
                    ajax: {"url": "group/json", "type": "POST"},
                    columns: [
                        {
                            "data": "KODE_GROUP",
                            "orderable": false
                        },{"data": "NAMA_GROUP"},
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
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
        </script>
