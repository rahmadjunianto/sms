                    <table id="example2" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th  class="text-center" width="5%">No</th>
                          <th  class="text-center" width="15%">Nama Supplier</th>
                          <th  class="text-center" width="15%">Email</th>
                          <th  class="text-center" width="10%">No HP</th>
                          <th  class="text-center" width="10%">Kecamatan</th>
                          <th  class="text-center" width="10%">Kabupaten</th>
                          <th class="text-center" >Alamat</th><?php if ($this->session->userdata('kg')==5) {?>
                          <th  class="text-center" width="7%">Aksi</th><?php }?>
                        </tr>
                      </thead>
                    </table>


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
                    ajax: {"url": "<?php echo base_url()?>Pembelian/ref_supplier/json", "type": "POST"},
                    columns: [
                        {
                            "data": "kode_supplier",
                            "orderable": false,
                            "className" : "text-center",
                        },{"data": "nama_supplier"},{"data": "email"},{"data": "hp"},{"data": "kecamatan"},{"data": "kabupaten"},{"data": "alamat"}<?php if ($this->session->userdata('kg')==5) {?>,
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }<?php }?>
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
