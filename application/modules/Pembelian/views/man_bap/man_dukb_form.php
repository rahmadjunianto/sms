<div class="page-title">

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo $button; ?></h2> 
            <div class="pull-right">             
                <div class="btn-group">
<button  form="myform" type="submit" name="submittemp" class="btn btn-primary">Simpan</button>
                </div>
            </div>                                       
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
<form id="myform" data-parsley-validate class="form-horizontal form-label-left"  action="<?php echo $action; ?>" method="post">
 
<div class="col-md-4">
                        <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <select style="height:10px"  class="grader form-control input-sm" name="nama_grader"  >
                    <option></option>
                    <?php foreach($grader as $grader){?>
                    <option <?php if($kd_grader==$grader->kd_grader){echo "selected";}?> value="<?php echo $grader->kd_grader?>" ><?php echo $grader->nm_grader?></option>
                    <?php }?>
                          </select>                         
                        </div>
                      </div>
<?php
$kabupaten = "var kab = new Array();\n";
$kecamatan = "var kec = new Array();\n";
$nama = "var nama = new Array();\n";
?>                       
                      <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <select class="supplier form-control input-sm" id="kode_supplier" onchange="changeValue(this.value)">
                    <option></option>
                    <?php foreach($supplier as $supplier){?>
                    <option <?php if($kode_supplier==$supplier->nama_supplier){echo "selected";}?> value="<?php echo $supplier->kode_harga_kayu?>"><?php echo $supplier->nama_supplier."-".$supplier->kabupaten."-".$supplier->kecamatan?></option>
                    <?php 
           $kabupaten .= "kab['" . $supplier->kode_harga_kayu . "'] = {kab:'".addslashes($supplier->kabupaten)."'};\n";
           $kecamatan .= "kec['" . $supplier->kode_harga_kayu . "'] = {kec:'".addslashes($supplier->kecamatan)."'};\n";
           $nama .= "nama['" . $supplier->kode_harga_kayu . "'] = {n:'".addslashes($supplier->kode_supplier)."'};\n";
         }?>
                          </select>  
<script type="text/javascript">  
<?php echo $kabupaten; echo $kecamatan;echo $nama;?>
function changeValue(id){
document.getElementById('kabupaten').value = kab[id].kab;
document.getElementById('kecamatan').value = kec[id].kec;
document.getElementById('nama').value = nama[id].n;
  var n= document.getElementById("nama").value;
  var nm_kabupaten= document.getElementById("kabupaten").value;
  var nm_kecamatan= document.getElementById("kecamatan").value;
      $.ajax({
         type: "POST",
        url: "<?php echo base_url().'Pembelian/man_dukb/getpanjang'?>",
        data: { nm_kabupaten: nm_kabupaten,n:n,nm_kecamatan: nm_kecamatan},
        cache: false,
        success: function(msga){
            //alert(msga);
            $("#panjang").html(msga);
        }
    }); 

}; 
</script>                                                    
                        </div>
                      </div>                       <div class="form-group">
      <div class="col-sm-12">
       <div class="input-group">
        <div class="input-group-addon">
         <i class="fa fa-calendar">
         </i>
        </div>
        <input class=" input-m form-control col-xs-6" id="date" name="date" value="<?php echo DATE('d/m/Y') ?>" type="text" style="size: 100px"/>
       </div>
      </div>
                      </div> <div class="ln_solid"></div>                       <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <select class="p select2_single form-control" name="panjang" id="panjang">
                    <option></option>                                   
                          </select>              
                        </div>
                      </div> <div id="list_panjang">
<hr>

 </div>                    
</div>
<div class="col-md-4">
                      <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input  style="height:43px" type="text" id="last-name" name="plat_nomor"  placeholder="No Mobil" class="form-control col-md-7 col-xs-12" value="<?php echo $plat_nomor; ?>">                     
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" id="kabupaten" readonly="" name="kabupaten" placeholder="Kabupaten" class="form-control col-md-7 col-xs-12"> 
                          <input type="hidden" id="nama" name="nama_supplier" required="required" placeholder="Kabupaten" class="form-control col-md-7 col-xs-12" >                                                
                        </div>
                      </div>
<div class="ln_solid"></div>                      
                      <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                         <button  class="btn btn-primary add_project_file"><i class="fa fa-plus"></i> Tambah</button>                    
                        </div>
                      </div>                        

</div>
<div class="col-md-4">
                      <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input style="height:43px"  type="text" id="kecamatan" readonly="" name="kecamatan"  placeholder="Kecamatan" class="form-control col-md-7 col-xs-12" value="<?php echo $nm_kecamatan; ?>">            
                        </div>
                      </div>                                             
                      <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" id="last-name" name="jenis_kayu"  placeholder="Jenis Kayu" class="form-control col-md-7 col-xs-12" value="<?php echo $jenis_kayu; ?>">                     
                        </div>
                      </div><div class="ln_solid"></div> 
</div>

</div><hr>

                           

                    </form>
                  </div>
                </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title"> 
                    <h2>List Kayu</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="example2" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="5%">No</th>
                          <th width="15%">Panjang Kayu</th>
                          <th width="15%">Diamater</th>
                          <th width="15%">Batang</th>
                          <th width="10%">Volume</th>
                          <th width="7%">Aksi</th>
                        </tr>
                      </thead>


                      
                    </table>
                  </div>
                </div>
              </div>



            </div>                
              </div>




            </div>

<script type="text/javascript">

function getval(sel)
{
    var kab = sel.value;
    $.ajax({
         type: "POST",
        url: "<?php echo base_url().'Pembelian/man_dukb/getkec'?>",
        data: "kab="+kab,
        cache: false,
        success: function(msga){
           // alert(msga);
            $("#kelas_diameter").html(msga);
        }
    });    
}   
</script>
    <script>
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
        $(".grader").select2({
          placeholder: "Grader",
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
        $("#panjang").select2({
          placeholder: "Panjang Kayu",
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
<script type="text/javascript">
$('.add_project_file').click(function(e) {
    e.preventDefault();
    var p= document.getElementById("panjang").value;var nama= document.getElementById("nama").value;
    var kabupaten= document.getElementById("kabupaten").value;var kecamatan= document.getElementById("kecamatan").value;
    //alert(p+nama+kabupaten+kecamatan);
    $.ajax({
         type: "POST",
        url: "<?php echo base_url().'Pembelian/man_dukb/getdiameter'?>",
        data: { kabupaten: kabupaten,kecamatan:kecamatan,p:p,nama:nama},
        cache: false,
        success: function(msga){
            //alert(msga);
            $("#list_panjang").html(msga);
        }
    }); 
   /* $(".list_panjang").append(
       '<div class="asd "><div class="col-md-4 col-sm-4 col-xs-12 remove_project_file">'
      + '<h2>Panjang '+ p + ' cm <a href="#" class="remove_project_file" border="2"><img src="images/delete.gif" /></h2>'
      + '<table class="table table-bordered" width="100%">'
      + '<thead>'
      + '<tr>'
      + '<th width="10%">Diameter</th>'
      + '<th width="10%">Batang</th>'
      + '<th width="20%">Volume</th>'
      + '</tr>'
      + '</thead>'
      + '<tbody><tr>'
      + '<td ><input type="hidden" name="panjang_kayu'+ p +'[]" value="'+ p +'" id="panjang'+ p +'15" ><input type="text" id="diameter'+ p +'15" name="diameter'+ p +'[]" readonly="" class="form-control " value="15"></td>'
      + '<td><input type="text" id="batang'+p+'15" name="batang'+p+'[]"  class="form-control " placeholder="0" onchange="get'+p+'15(this);"></td>'
      + '<td><input type="text" name="v'+p+'[]" readonly=""  class="form-control " placeholder="0"  id="v'+p+'15"></td>'
      + '<tr></tbody>'
      + '</table>'
      + '</div></div>');*/
});
/*function get13015(sel)
{  
  var btg= document.getElementById("batang13015").value;
  var diameter= document.getElementById("diameter13015").value;
  var panjang_kayu= document.getElementById("panjang13015").value;
  var r= diameter/2;
  var v = 3.14*r*r*panjang_kayu/1000000;
  var volume = v*btg;
  var totalv= volume.toFixed(4)
  $('#v13015').val(totalv);
  //alert(btg);    
}*/
// Remove parent of 'remove' link when link is clicked.
$('.list_panjang').on('click', '.remove_project_file', function(e) {
    e.preventDefault();

    $(this).parent().remove();
});
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
                    ajax: {"url": "<?php echo base_url()?>Pembelian/man_dukb/json_dukb_detail_temp", "type": "POST"},
                    columns: [
                        {
                            "data": "id_dukb_detail",
                            "orderable": false,
                            "className" : "text-center",
                        },{"data":"panjang_kayu"},{"data": "diameter"},{"data": "batang"},{"data": "volume"},
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
