<?php 
$string = "<section class=\"content-header\">
            <h1>
              ".ucfirst($table_name)."
                <div class=\"pull-right\">
                    <?php echo anchor(site_url('".$c_url."/create'), '<i class=\"fa fa-plus\"></i> Tambah', 'class=\"btn btn-sm btn-primary\"'); ?>
                </div>
            </h1>
          </section>
        <section class=\"content\">
            <div class=\"box box-green\">
            <div class=\"box-body\">
        <table class=\"table table-bordered table-hover table-striped\" id=\"mytable\">
            <thead>
                <tr>
                    <th width=\"5%\">No</th>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t    <th>" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t    <th width=\"10%\">Aksi</th>
                </tr>
            </thead>";

$column_non_pk = array();
foreach ($non_pk as $row) {
    $column_non_pk[] .= "{\"data\": \"".$row['column_name']."\"}";
}
$col_non_pk = implode(',', $column_non_pk);

$string .= "\n\t    
        </table>
            </div>
        </div>
        </section>
        <script type=\"text/javascript\">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        \"iStart\": oSettings._iDisplayStart,
                        \"iEnd\": oSettings.fnDisplayEnd(),
                        \"iLength\": oSettings._iDisplayLength,
                        \"iTotal\": oSettings.fnRecordsTotal(),
                        \"iFilteredTotal\": oSettings.fnRecordsDisplay(),
                        \"iPage\": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        \"iTotalPages\": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $(\"#mytable\").dataTable({
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
                        sProcessing: \"loading...\"
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {\"url\": \"<?php echo base_url()?>".$c_url."/json\", \"type\": \"POST\"},
                    columns: [
                        {
                            \"data\": \"$pk\",
                            \"orderable\": false,
                            \"className\" : \"text-center\"
                        },".$col_non_pk.",
                        {
                            \"data\" : \"action\",
                            \"orderable\": false,
                            \"className\" : \"text-center\"
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
    ";


$hasil_view_list = createFile($string, $target."views/" . $c_url . "/" . $v_list_file);

?>