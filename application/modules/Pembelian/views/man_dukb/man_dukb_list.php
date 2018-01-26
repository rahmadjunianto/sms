<?php echo $this->session->flashdata('message')?><br>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title"> 
                    <h2>Transaksi DUKB  </h2>
<?php if ($this->session->userdata('kg')==5) {?>
            <div class="pull-right">             
                <div class="btn-group">
                <?php echo anchor(site_url('Pembelian/man_dukb/create'), '<i class="fa fa-plus"></i> Tambah', 'class="btn btn-success btn-sm"'); 
                ?>
                </div>
            </div> 
<?php } ?>                    
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
        <form id="myform" data-parsley-validate  action=""<?php echo base_url().'pembelian/man_dukb'?>" method="post">
                <div class="row">
                  <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                          <select   class="grader form-control input-sm" name="nama_grader" required="" >
                    <option></option>
                    <?php foreach($grader as $grader){?>
                    <option <?php if($grader->kd_grader==$nama_grader){echo "selected";}?>  value="<?php echo $grader->kd_grader?>" ><?php echo $grader->nm_grader?></option>
                    <?php }?>
                          </select>  
                  </div>

                  <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                          <select   class="supplier form-control input-sm" name="supplier" required="" >
                    <option></option>
                    <?php foreach($supplier as $supplier){?>
                    <option <?php if($supplier->kode_supplier==$nm_supplier){echo "selected";}?> value="<?php echo $supplier->kode_supplier?>"><?php echo $supplier->nama_supplier ?></option>
                    <?php }?>
                          </select>                   
                  </div>

                  <div class="col-md-2 col-sm-12 col-xs-12 form-group">
       <div class="input-group">
        <div class="input-group-addon">
         <i class="fa fa-calendar">
         </i>
        </div>
        <input class="form-control tanggal" id="date" name="date" value="<?php echo $date ?>" type="text"/>
       </div></div>
                <div class="col-md-2 col-sm-12 col-xs-12"> <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Tampilkan</button></div>   </div>                                                          

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
               case 'Belum Tervalidasi' : return "<div class='btn-group'><a href='<?php echo base_url()?>/pembelian/man_dukb/detail/"+row['id_dukb']+".html' class='btn btn-xs btn-success'><i class='fa fa-binoculars'></i></a></div><div class='btn-group' ><a href='<?php echo base_url()?>/pembelian/man_dukb/delete_dukb/"+row['id_dukb']+".html' class='btn btn-xs btn-danger' onclick='return deleteConfirmation()' ><i class='fa fa-trash'></i></a></div>"; break;<?php } elseif ($this->session->userdata('kg')!=5) { ?>
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
      $(document).ready(function() {
        $(".grader").select2({
          placeholder: "Grader",
          allowClear: true,    dropdownAutoWidth : true,
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
      });function deleteConfirmation() {  
return confirm("Apakah Anda Yakin?");


}               
        </script>

