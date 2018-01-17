
<?php $var="<option value=''</option>"; 
foreach($kc as $kc){
$var.="<option value='".$kc->kecamatan."'>".$kc->kecamatan."</option>";
 } ?>

 <script type="text/javascript">
 	   $('#kecamatan').empty(); //remove all child nodes
        var newOption = $("<?php echo $var?>");
        $('#kecamatan').append(newOption);
        $('#kecamatan').trigger("chosen:updated");
 </script>