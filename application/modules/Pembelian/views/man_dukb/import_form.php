<div class="page-title">

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Import Form</h2>                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
 
                     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"  >File
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="harga" required="required" placeholder="Harga" class="form-control col-md-7 col-xs-12" value="<?php echo $harga; ?>">                     
                        </div>
                      </div>                                                                                                                 
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?php echo site_url('Setting/Msmenu') ?>" class="btn btn-warning"><i class="fa fa-close"></i> Cancel</a>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>



            </div>

<script type="text/javascript">

function getval(sel)
{
 $( "#kelas_diameter" ).empty();
    var panjang_kayu = sel.value;
    $.ajax({
         type: "POST",
        url: "<?php echo base_url().'Pembelian/man_harga_kayu/getkelas'?>",
        data: "panjang_kayu="+panjang_kayu,
        cache: false,
        success: function(msga){
            //alert(msga);
            $("#kelas_diameter").html(msga);
        }
    });    
}    
</script>