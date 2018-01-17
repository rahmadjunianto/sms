<div class="page-title">

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo $button; ?> <?php echo $kd_siklus; ?></h2>  
            <div class="pull-right">             
                <div class="btn-group">
                <?php if ($this->session->userdata('kg')!=2) {
                  echo anchor(site_url('Pembelian/man_dukb'), '<i class="fa fa-chevron-left"></i> ', 'class="btn btn-success btn-sm"'); 
                } else {
                  echo anchor(site_url('Pembelian/man_dukb/validasi'), '<i class="fa fa-chevron-left"></i>  ', 'class="btn btn-success btn-sm"'); } ?>
                </div>
            </div>                                       
                    <div class="clearfix"></div>

                  </div>
                  <div class="x_content">
<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                    <table  width="100%">
                      <thead align="center">
                        <tr>
                          <th class="text-left" width="10%">Nama Grader</th>
                          <td class="text-left" width="30%"><b>:</b> <?php echo $nama_grader; ?></td>

                          <th class="text-left" width="10%">No Mobil</th>
                          <td class="text-left" ><b>:</b> <?php echo $plat_nomor; ?></td>                          
                          <th class="text-left" width="10%">Kecamatan</th>
                          <td class="text-left" ><b>:</b> <?php echo $kecamatann; ?></td>                          
                        </tr>
                        <tr>
                          <th class="text-left" width="10%">Nama Supplier</th>
                          <td class="text-left" ><b>:</b> <?php echo $nama_supplier; ?></td>

                          <th class="text-left" width="10%">Jenis Kayu</th>
                          <td class="text-left" ><b>:</b> <?php echo $jenis_kayu; ?></td>                           
                          <th class="text-left" width="10%">Kabupaten</th>
                          <td class="text-left" ><b>:</b> <?php echo $kabupatenn; ?></td>                          
                        </tr>
                        <tr>                         
                        </tr>

                      </thead>


                      
                    </table>


                    </form>
                  </div>
                </div>

              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title"> 
                    <h2>List Kayu</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

<table id="datatable-keytable" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                        <tr>
                          <th class="text-center" width="5%">No</th>
                          <th class="text-center" width="15%">Panjang Kayu</th>
                          <th class="text-center" width="15%">Diamater</th>
                          <th class="text-center" width="15%">Batang</th>
                          <th class="text-center" width="10%">Volume</th>
                        </tr>
                              </tr>
                            </thead>
                            <tbody>
<?php $ku=$id;
$dt=$this->db->query("SELECT id_dukb_detail,batang,panjang_kayu,diameter, (CASE WHEN (LENGTH(volume) = 5) THEN REPLACE(CONCAT(volume,'0'),'.',',') WHEN (LENGTH(volume) = 4) THEN REPLACE(CONCAT(volume,'00 '),'.',',') ELSE REPLACE(CONCAT(volume,' '),'.',',') END) AS volume from tr_dukb_detail where tr_dukb_id=$ku")->result(); $no=1;

$warna='#E6E6E6';
$last=null;
foreach ($dt as $dt) { if($last!==$dt->panjang_kayu){ $last=$dt->panjang_kayu; if($warna=='#E6E6E6'){$warna= "#EFF8FB";}else{$warna= "#E6E6E6";} } ?>
                              
                              <tr style="background-color:<?php echo $warna?>">
                                <td align="center"><?php echo $no++; ?></td>
                                <td><?php echo $dt->panjang_kayu; ?></td>
                                <td><?php echo $dt->diameter; ?></td>
                                <td><?php echo $dt->batang; ?></td>
                                <td><?php echo $dt->volume; ?></td>
                              </tr>
<?php   } ?>                              
                            </tbody>
                          </table>                    
                  </div>
                </div>
              </div>


            </div>


    <script>
$(document).ready(function() {
    $('#datatable-keytable').DataTable();
} );      
      $(document).ready(function() {
        $(".supplier").select2({
          placeholder: "Supplier",
          allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });
      $(document).ready(function() {
        $(".kabupaten").select2({
          placeholder: "Kabupaten",
          allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      }); 
      $(document).ready(function() {
        $(".kecamatan").select2({
          placeholder: "Kecamatan",
          allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });            
    </script>
    </script>  
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
                    ajax: {"url": "<?php echo base_url()?>Pembelian/man_dukb/json_dukb_detail", "type": "POST"},
                    columns: [
                        {
                            "data": "id_dukb_detail",
                            "orderable": false,
                            "className" : "text-center",
                        },{"data":"panjang_kayu"},{"data": "diameter"},{"data": "batang"},{"data": "volume"}
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