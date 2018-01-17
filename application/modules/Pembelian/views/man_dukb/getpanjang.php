
<?php $var="<option value=''</option>"; 
foreach($rk as $rk){
$var.="<option value='".$rk->panjang_kayu."'>".$rk->panjang_kayu."</option>";
 } ?>

 <script type="text/javascript">
 	   $('#panjang').empty(); //remove all child nodes
        var newOption = $("<?php echo $var?>");
        $('#panjang').append(newOption);
        $('#panjang').trigger("chosen:updated");
 </script>