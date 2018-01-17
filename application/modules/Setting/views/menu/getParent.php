
<?php $var="<option value='".$parent."'>Parent</option>"; 
foreach($rk as $rk){
$var.="<option value='".$rk->KODE_MENU."'>".$rk->NAMA_MENU."</option>";
 } ?>

 <script type="text/javascript">
 		$('#parent_menu').chosen();
 	   $('#parent_menu').empty(); //remove all child nodes
        var newOption = $("<?php echo $var?>");
        $('#parent_menu').append(newOption);
        $('#parent_menu').trigger("chosen:updated");
 </script>