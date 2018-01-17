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
        <form id="myform" data-parsley-validate   action=""<?php echo base_url().'pembelian/rp'?>" method="post">

                <div class="row">


                  <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                          <input type="text" id="last-name" name="jenis_kayu"  placeholder="Jenis Kayu" class="form-control col-md-4 col-xs-4" value="<?php echo $jenis_kayu; ?>"> 
                  </div>

                  <div class="col-md-2 col-sm-12 col-xs-12 form-group">
       <div class="input-group">
        <div class="input-group-addon">
         <i class="fa fa-calendar">
         </i>
        </div>
        <input class="form-control tanggal" id="date" name="date1" value="<?php echo $date1 ?>" type="text"/>
       </div>
                  </div>
                  <div class="col-md-2 col-sm-12 col-xs-12 form-group">
       <div class="input-group">
        <div class="input-group-addon">
         <i class="fa fa-calendar">
         </i>
        </div>
        <input class="form-control tanggal" id="date" name="date2" value="<?php echo $date2 ?>" type="text"/>
       </div>
                  </div>
                  <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                 <select   class="p form-control input-sm" name="p1" required="" >
                    <option></option>
                    <?php foreach($panjang1 as $panjang1){?>
                    <option <?php if($panjang1->panjang_kayu==$p1){echo "selected";}?> value="<?php echo $panjang1->panjang_kayu?>"><?php echo $panjang1->panjang_kayu ?></option>
                    <?php }?>
                          </select>  
                  </div>

                  <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                 <select   class="pp form-control input-sm" name="p2" required="" >
                    <option></option>
                    <?php foreach($panjang2 as $panjang2){?>
                    <option <?php if($panjang2->panjang_kayu==$p2){echo "selected";}?> value="<?php echo $panjang2->panjang_kayu?>"><?php echo $panjang2->panjang_kayu ?></option>
                    <?php }?>
                          </select> 
                  </div>

                  <div class="col-md-2 col-sm-12 col-xs-12 form-group pull-right">
<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Tampilkan</button>
                  </div>
              </div>                                                        

              </form>
 <br>                   <?php if($rk=="tampil"){?>
                    <table id="example2" class="table table-striped table-bordered" style="font-size: 12px" >
                      <thead>
                        <tr>
                          <th class="text-center" style="width: 10px">No</th>
                          <th class="text-center" style="width: 30px">Tanggal</th>
                          <th class="text-center" style="width: 150px">Tanggal Validasi</th>
                          <th class="text-center" style="width: 250px">Nama Supplier</th>
                          <th class="text-center" style="width: 250px">Volume</th>
                          <th class="text-center" style="width: 250px">Nominal</th>
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
                        },{"data":"tgl"},{"data":"tgl_val"},{"data":"nama_supplier"},{"data":"volume"},{"data":"harga","render": $.fn.dataTable.render.number( '.', '.', 0, '' ),"className" : "text-right",},
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
        $(".supplier").select2({
          placeholder: "Supllier",
          allowClear: true,    dropdownAutoWidth : true,height: '100%',
        });
        $(".p").select2({
          placeholder: "Panjang 1",
          allowClear: true,    dropdownAutoWidth : true,height: '100%',
        });    
        $(".pp").select2({
          placeholder: "Panjang 2",
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

