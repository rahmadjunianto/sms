              </form>
 <br>                   <?php if($rk=="tampil"){?>
                    <table id="example2" class="table table-striped table-bordered" style="font-size: 12px">
                      <thead>
                        <tr>
                          <th class="text-center"  width="5%">No</th>
                          <th class="text-center"  width="8%">Tanggal</th>
                          <th class="text-center"  width="10%">Kode Siklus</th>
                          <th class="text-center"  width="11%">Nama Grader</th>
                          <th class="text-center"  width="13%">Nama Supplier</th>
                          <th class="text-center"  width="10%">Kabupaten</th>
                          <th class="text-center"  width="10%">Kecamatan</th>
                          <th class="text-center"  width="10%">Status</th>
                          <th class="text-center"  width="10%">Aksi</th>
                        </tr>
                      </thead>
                    </table><?php } ?>
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
                    ajax: {"url": "<?php echo base_url()?>Pembelian/man_dukb/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id_dukb",
                            "orderable": false,
                            "className" : "text-center",
                        },{"data": "tanggal"},{"data": "kd_siklus"},{"data": "nm_grader"},{"data":"nama_supplier"},{"data": "kabupaten"},{"data": "kecamatan"},{"data": "status"},
         {
    "data": "status","className" : "text-center",
    "render": function ( data, type, row, meta ) {
                  switch(data) {
               case 'Tervalidasi' : return "<div class='btn-group'><a href='<?php echo base_url()?>/pembelian/man_dukb/detail/"+row['id_dukb']+".html' class='btn btn-xs btn-success'><i class='fa fa-binoculars'></i></a></div>"; break;
               <?php if ($this->session->userdata('kg')==5) {?>
               case 'Belum Tervalidasi' : return "<div class='btn-group'><a href='<?php echo base_url()?>/pembelian/man_dukb/detail/"+row['id_dukb']+".html' class='btn btn-xs btn-success'><i class='fa fa-binoculars'></i></a></div><div class='btn-group' ><a href='<?php echo base_url()?>/pembelian/man_dukb/delete_dukb/"+row['id_dukb']+".html' class='btn btn-xs btn-danger' id='delete' data-id="+row['id_dukb']+" href='javascript:void(0)' ><i class='fa fa-trash'></i></a></div>"; break;<?php } elseif ($this->session->userdata('kg')!=5) { ?>
               case 'Belum Tervalidasi' : return "<div class='btn-group'><a href='<?php echo base_url()?>/pembelian/man_dukb/detail/"+row['id_dukb']+".html' class='btn btn-xs btn-success'><i class='fa fa-binoculars'></i></a></div>"; break                
                <?php }?>
               default  : return 'N/A';
            }
    }
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