<?php $var="<div class='asd '><div class='col-md-12 col-sm-12 col-xs-12 remove_project_file'><center><h2>Panjang ".$panjang." cm <a href='#' class='remove_project_file' border='2'></h2></center><table class='table table-bordered' width='100%'><thead><tr><th width='10%'>Diameter</th><th width='10%'>Batang</th><th width='20%'>Volume</th></tr></thead>";	
foreach($rk as $rk){

$var.="<tr>";
$var.="<td height='10' ><input type='hidden' name='kd_atas[]' value='".$rk->kd_atas."' ><input type='hidden' name='kd_bawah[]' value='".$rk->kd_bawah."' ><input type='hidden' name='panjang_kayu[]' value='".$rk->panjang_kayu."'  id='panjang".$rk->panjang_kayu.$rk->diameter."' ><input type='text' id='diameter".$rk->panjang_kayu.$rk->diameter."' name='diameter[]' readonly='' class='form-control' value='".$rk->diameter."'></td>";
$var.="<td><input type='text' id='batang".$rk->panjang_kayu.$rk->diameter."' name='batang[]' autocomplete='off'  class='form-control arrow-togglable' placeholder='0' onchange='get".$rk->panjang_kayu.$rk->diameter."(this);'></td>";
$var.="<td><input type='text' name='v[]' readonly=''  class='form-control' placeholder='0'  id='v".$rk->panjang_kayu.$rk->diameter."'></td>";
$var.="<tr>";

 } ?>
<?php $var.="</tbody></table><button type=submit name=simpantemp class=btn btn-primary>Tambah</button></div></div> "; ?>
 <script type="text/javascript">
 	   //$('.list_panjang').empty(); //remove all child nodes
        var newOption = $("<?php echo $var?>");
        $('#list_panjang').append(newOption);
        //$('.list_panjang').trigger("chosen:updated");
<?php foreach ($r as $r) { ?>
	

function get<?php echo $r->panjang_kayu.$r->diameter;?>(sel)
{  
  var btg<?php echo $r->panjang_kayu.$r->diameter;?>= document.getElementById("batang<?php echo $r->panjang_kayu.$r->diameter;?>").value;
  var diameter<?php echo $r->panjang_kayu.$r->diameter;?>= document.getElementById("diameter<?php echo $r->panjang_kayu.$r->diameter;?>").value;
  var panjang_kayu<?php echo $r->panjang_kayu.$r->diameter;?>= document.getElementById("panjang<?php echo $r->panjang_kayu.$r->diameter;?>").value;
  var r<?php echo $r->panjang_kayu.$r->diameter;?>= diameter<?php echo $r->panjang_kayu.$r->diameter;?>/2;
  var v<?php echo $r->panjang_kayu.$r->diameter;?> = (3.14*r<?php echo $r->panjang_kayu.$r->diameter;?>*r<?php echo $r->panjang_kayu.$r->diameter;?>*panjang_kayu<?php echo $r->panjang_kayu.$r->diameter;?>)/1000000;
  var volume<?php echo $r->panjang_kayu.$r->diameter;?> = v<?php echo $r->panjang_kayu.$r->diameter;?>*btg<?php echo $r->panjang_kayu.$r->diameter;?>;
  var totalv<?php echo $r->panjang_kayu.$r->diameter;?>= volume<?php echo $r->panjang_kayu.$r->diameter;?>.toFixed(4)
  $('#v<?php echo $r->panjang_kayu.$r->diameter;?>').val(totalv<?php echo $r->panjang_kayu.$r->diameter;?>);
 // alert(v<?php echo $r->panjang_kayu.$r->diameter;?>);    
}<?php } ?>  
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