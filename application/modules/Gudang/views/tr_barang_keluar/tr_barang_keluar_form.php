            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo $button; ?></h2>                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"  >Tanggal
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
       <div class="input-group">
        <div class="input-group-addon">
         <i class="fa fa-calendar">
         </i>
        </div>
        <input class="form-control tanggal" id="date" name="date" value="<?php echo $date ?>" type="text"/>
       </div>                          
                        </div>
                      </div>
                      <div class="form-group">
<?php
$nm_barang = "var nama = new Array();\n";
$harga_barang = "var harga = new Array();\n";
$spesifikasi = "var spek = new Array();\n";
?>                         
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" >Nama Barang 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" name="barang"  id="barang" onchange="changeValue(this.value)">
                    <option></option>
                    <?php foreach($barang as $barang){?>
                    <option <?php if($kd_barang==$barang->kd_barang){echo "selected";}?> value="<?php echo $barang->kd_barang?>"><?php echo $barang->nm_barang." ( ".$barang->spesifikasi." ) "." Stock : ".$barang->stock?></option>
                    <?php                     
          $nm_barang .= "nama['" . $barang->kd_barang . "'] = {nama:'".addslashes($barang->nm_barang)."'};\n";
          $harga_barang .= "harga['" . $barang->kd_barang . "'] = {harga:'".addslashes($barang->harga)."'};\n";
          $spesifikasi .= "spek['" . $barang->kd_barang . "'] = {spek:'".addslashes($barang->spesifikasi)."'};\n";
           }?>
<script type="text/javascript">  
<?php echo $nm_barang; echo $harga_barang; echo $spesifikasi;?>
function changeValue(id){
document.getElementById('nm_barang').value = nama[id].nama;
document.getElementById('harga_barang').value = harga[id].harga;
document.getElementById('spesifikasi').value = spek[id].spek;
}; 
</script>
</select>                
                        </div>
                      </div> 
                      <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" >Nama Divisi 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" name="kd_divisi"  id="kd_divisi"  onchange="getsubdiv(this);">
                    <option></option>
                    <?php foreach($divisi as $divisi){?>
                    <option <?php if($kd_divisi==$divisi->kd_divisi){echo "selected";}?> value="<?php echo $divisi->kd_divisi?>"><?php echo $divisi->nm_divisi?></option>
                    <?php                     
           }?>

</select>                
                        </div>
                      </div>  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" > Nama Sub Divisi
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" name="subdiv" id="subdiv">
                    <option></option>  
                      <?php if (isset($kd_sub_div)) 
                      {foreach ($subdiv as $subdiv) {?>
                        <option <?php if($subdiv->kd_sub_div==$kd_sub_div){echo "selected";}?> value="<?php echo $subdiv->kd_sub_div ?>"><?php echo $subdiv->nm_sub_div ?></option>
                      
                        
                      <?php }} ?>                                     
                          </select>              
                        </div>
                      </div> 
                      <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" >Nama Alokasi Pemakaian 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" name="kd_alok_p"  id="kd_alok_p" >
                    <option></option>
                    <?php foreach($alok_p as $alok_p){?>
                    <option <?php if($kd_alok_p==$alok_p->kd_alok_p){echo "selected";}?> value="<?php echo $alok_p->kd_alok_p?>"><?php echo $alok_p->nm_alok_p?></option>
                    <?php                     
           }?>

</select>                
                        </div>
                      </div> 
                      <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" >Nama Alokasi Biaya
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" name="kd_alok_b"  id="kd_alok_b" >
                    <option></option>
                    <?php foreach($alok_b as $alok_b){?>
                    <option <?php if($kd_alok_b==$alok_b->kd_alok_b){echo "selected";}?> value="<?php echo $alok_b->kd_alok_b?>"><?php echo $alok_b->nm_alok_b?></option>
                    <?php                     
           }?>

</select>                
                        </div>
                      </div> 
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"  >Jumlah
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="jumlah" placeholder="Jumlah" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $jumlah; ?>">
<input type="hidden" name="kd_barang_keluar" value="<?php echo $kd_barang_keluar; ?>" />
<input type="hidden" name="nm_barang" id="nm_barang" value="<?php echo $nama_barang; ?>" />
<input type="hidden" name="spesifikasi" id="spesifikasi" value="<?php echo $spesifikasi; ?>" />                             
                        </div>
                      </div>  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"  >Penerima
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="penerima" placeholder="Penerima" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $penerima; ?>">                             
                        </div>
                      </div>
                          <input type="hidden" id="harga_barang" name="harga" required="required" placeholder="Harga" class="form-control col-md-7 col-xs-12" value="<?php echo $harga; ?>">
                                                                                               
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?php echo site_url('gudang/tr_barang_keluar/') ?>" class="btn btn-warning"><i class="fa fa-close"></i> Cancel</a>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>



            </div>


<script type="text/javascript">

function getsubdiv(sel)
{
    var divisi = sel.value;
    $.ajax({
         type: "POST",
        url: "<?php echo base_url().'gudang/tr_barang_keluar/getsubdiv'?>",
        data: { divisi: divisi},
        cache: false,
        success: function(msga){
            //alert(msga);
            $("#subdiv").html(msga);
        }
    });    
}      
</script>