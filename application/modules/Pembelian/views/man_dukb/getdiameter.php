<?php $var="<div class='asd '><div  style='font-size:14px;' class='col-md-12 col-sm-12 col-xs-12 remove_project_file'><center><h2>Panjang ".$panjang." cm <a href='#' class='remove_project_file' border='2'></h2></center><table class='table table-bordered' width='100%'><thead><tr align='center'><th width='10%'>Diameter</th><th width='10%'>Batang</th><th width='25%'>Volume</th><th>Harga </th><th> Sub Total</th></thead>"; 
foreach($rk as $rk){

$var.="<tr style='height: 16px'>";
$var.="<td height='10' ><input type='hidden' name='kd_atas[]' value='".$rk->kd_atas."' ><input type='hidden' name='kd_bawah[]' value='".$rk->kd_bawah."' ><input type='hidden' name='panjang_kayu[]' value='".$rk->panjang_kayu."'  id='panjang".$rk->panjang_kayu.$rk->diameter."' ><input  style='height: 25px' type='text' id='diameter".$rk->panjang_kayu.$rk->diameter."' name='diameter[]' readonly='' class='form-control' value='".$rk->diameter."'></td>";
$var.="<td><input  style='height: 25px' type='text' id='batang".$rk->panjang_kayu.$rk->diameter."' name='batang[]' autocomplete='off'  class='form-control arrow-togglable' placeholder='0'  onchange='get(this);'></td>";
$var.="<td><input  style='height: 25px' type='text' name='v[]' readonly=''  class='form-control' placeholder='0'  id='vol".$rk->panjang_kayu.$rk->diameter."'></td>";
$var.="<td><input  style='height: 25px' type='text'  readonly=''  class='form-control' placeholder='0' value=".number_format($rk->harga,'0','','.')."></td>";
$var.="<td><input  style='height: 25px' type='hidden' id='h".$rk->panjang_kayu.$rk->diameter."' readonly='' class='form-control' value='".$rk->harga."'><input style='height: 25px' type='text' name='harga[]' readonly=''  class='form-control' placeholder='0'  id='harga".$rk->panjang_kayu.$rk->diameter."'></td>";
$var.="<tr>";

 }
//echo $sql;
 $var.="<tr >";
 $var.="<td class='text-center' style='vertical-align:middle;font-size:15px'>Total</td>";
 $var.="<td height='10'><input style='height: 25px' id='tb' class='form-control' readonly type='text' height='10'></td>";
 $var.="<td height='10'><input style='height: 25px' id='tv' class='form-control' readonly type='text' height='10'></td><td></td>";
 $var.="<td height='10'><input style='height: 25px' id='th' class='form-control' readonly type='text' height='10'></td>";
 $var.="</tr"; ?>
<?php $var.="</tbody></table><button  type=submit name=simpantemp class=btn btn-primary>Tambah</button></div></div> "; ?>
 <script type="text/javascript">
     //$('.list_panjang').empty(); //remove all child nodes
        var newOption = $("<?php echo $var?>");
        $('#list_panjang').append(newOption);
        //$('.list_panjang').trigger("chosen:updated");

  

function get(sel)
{  <?php $bt="";$vt="";$ht="";foreach ($r as $r) { ?>

  var btg<?php echo $r->panjang_kayu.$r->diameter;?>= parseInt(document.getElementById("batang<?php echo $r->panjang_kayu.$r->diameter;?>").value)|| 0;
  var diameter<?php echo $r->panjang_kayu.$r->diameter;?>= document.getElementById("diameter<?php echo $r->panjang_kayu.$r->diameter;?>").value;
  var panjang_kayu<?php echo $r->panjang_kayu.$r->diameter;?>= document.getElementById("panjang<?php echo $r->panjang_kayu.$r->diameter;?>").value;
  var h<?php echo $r->panjang_kayu.$r->diameter;?>= document.getElementById("h<?php echo $r->panjang_kayu.$r->diameter;?>").value;  
  var r<?php echo $r->panjang_kayu.$r->diameter;?>= diameter<?php echo $r->panjang_kayu.$r->diameter;?>/2;
  var v<?php echo $r->panjang_kayu.$r->diameter;?> = (3.14*r<?php echo $r->panjang_kayu.$r->diameter;?>*r<?php echo $r->panjang_kayu.$r->diameter;?>*panjang_kayu<?php echo $r->panjang_kayu.$r->diameter;?>)/1000000;
  var volume<?php echo $r->panjang_kayu.$r->diameter;?> = v<?php echo $r->panjang_kayu.$r->diameter;?>*btg<?php echo $r->panjang_kayu.$r->diameter;?>;
  var subharga<?php echo $r->panjang_kayu.$r->diameter;?>=h<?php echo $r->panjang_kayu.$r->diameter;?>* volume<?php echo $r->panjang_kayu.$r->diameter;?>.toFixed(4);
  var totalv<?php echo $r->panjang_kayu.$r->diameter;?>= parseFloat(volume<?php echo $r->panjang_kayu.$r->diameter;?>)|| 0;
  $('#vol<?php echo $r->panjang_kayu.$r->diameter;?>').val(totalv<?php echo $r->panjang_kayu.$r->diameter;?>.toFixed(4).replace(".", ","));
  $('#harga<?php echo $r->panjang_kayu.$r->diameter;?>').val(subharga<?php echo $r->panjang_kayu.$r->diameter;?>.toFixed(0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
 // alert(v<?php echo $r->panjang_kayu.$r->diameter;?>);  
 <?php $bt.="btg".$r->panjang_kayu.$r->diameter."+";$vt.="parseFloat(totalv".$r->panjang_kayu.$r->diameter.".toFixed(4))+"; $ht.="subharga".$r->panjang_kayu.$r->diameter."+";} $res=substr($bt, 0,-1);$rs=substr($vt, 0,-1);$s=substr($ht, 0,-1);?>  

 var tb=<?php echo $res; ?>;
 var tv=<?php echo $rs; ?>;
  var th=<?php echo $s; ?>;
 $('#tb').val(tb);
 $('#tv').val(tv.toFixed(4));
 $('#th').val(th.toFixed(0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
 //alert(h);
} 
function gettotal(sel) {
  var btg10010= parseInt(document.getElementById("batang10010").value);
  var btg10011= parseInt(document.getElementById("batang10011").value);
  var totalb= btg10010+btg10011;
  alert(btg10010);
  $('#tb').val(totalb); 
}
    var elements = document.getElementsByClassName("arrow-togglable");
    var currentIndex = 0;

    document.onkeydown = function(e) {
      switch (e.keyCode) {
        case 38:
          currentIndex = (currentIndex == 0) ? elements.length - 1 : --currentIndex;
          elements[currentIndex].focus();
          break;
        case 40:
          currentIndex = ((currentIndex + 1) == elements.length) ? 0 : ++currentIndex;
          elements[currentIndex].focus();
          break;
      }
    };      
 </script>