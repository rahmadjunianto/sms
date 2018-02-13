<?php if( $this->session->userdata('berhasil')!=0){?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel"><?php echo $this->session->flashdata('notifs');?> 
                  <div class="x_title">
            <h2>
              Data Barang Keluar Sukses Import

            </h2>                            
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="example" class="table table-striped table-bordered" style="font-size: 10px">
                      <thead>
                        <tr>
                          <th class="text-center"  width="5%">No</th>
                          <th class="text-center"  width="5%">Tanggal</th>
                          <th class="text-center"  width="5%">Kat</th>
                          <th class="text-center"  width="10%">Nama Barang</th>
                          <th class="text-center"  width="10%">Spesifikasi</th>
                          <th class="text-center"  width="8%">Divisi</th>
                          <th class="text-center"  width="3%">Qty</th>
                          <th class="text-center"  width="3%">Sat</th>
                          <th class="text-center"  width="5%">Harga</th>
                          <th class="text-center"  width="5%">Total Harga</th>
                          <th class="text-center"  width="5%">Alokasi P</th>
                          <th class="text-center"  width="5%">Alokasi B</th>
                          <th class="text-center"  width="5%">Penerima</th>
                        </tr>
                      </thead>


                      
                    </table>
                  </div>
                </div>
              </div>
            </div><?php }  ?>
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

                var t = $("#example").dataTable({
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
                    ajax: {"url": "<?php echo base_url()?>gudang/tr_barang_Keluar/jsonsukses", "type": "POST"},
                    columns: [
                        {
                            "data": "kd_barang_keluar",
                            "orderable": false,
                            "className" : "text-center",
                        },{"data": "tanggal"},{"data": "inisial"},{"data": "nm_barang"},{"data": "spesifikasi"},{"data": "nm_divisi"},{"data": "jumlah","className" : "text-right",},{"data": "satuan"},{"data": "harga","render": $.fn.dataTable.render.number( '.', '.', 0, '' ),"className" : "text-right",},{"data": "tot","render": $.fn.dataTable.render.number( '.', '.', 0, '' ),"className" : "text-right",},{"data": "nm_alok_p"},{"data": "nm_alok_b"},{"data": "penerima"}
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