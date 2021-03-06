<section class="content-header">
            <h1>
              Daftar Menu
                <div class="pull-right">
                    <?php echo anchor(site_url('msmenu/create'), '<i class="fa fa-plus"></i> Tambah', 'class="btn btn-sm btn-primary"'); ?>
                </div>
            </h1>
          </section>
        <section class="content">
            <div class="box box-green">
            <div class="box-body">
        <table class="table table-bordered table-hover table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Nama Menu</th>
                    <th>Parent</th>
                    <th>Sort</th>
                    <th width="10%">Aksi</th>
                </tr>
            </thead>
	    
        </table>
            </div>
        </div>
        </section>
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

                var t = $("#mytable").dataTable({
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
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "<?php echo base_url()?>msmenu/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id_inc",
                            "orderable": false,
                            "className" : "text-center"
                        },{"data": "nama_menu"},{"data": "parent"},{"data": "sort"},
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    order: [],
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
    