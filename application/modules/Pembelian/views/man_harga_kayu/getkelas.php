
<?php $var="<option value=''</option>"; 
foreach($rk as $rk){
$var.="<option value='".$rk->kd_bawah."-".$rk->kd_atas."'>".$rk->kd_bawah."-".$rk->kd_atas."</option>";
 } ?>

 <script type="text/javascript">
 	   $('#kelas_diameter').empty(); //remove all child nodes
        var newOption = $("<?php echo $var?>");
        $('#kelas_diameter').append(newOption);
        $('#kelas_diameter').trigger("chosen:updated");
 </script>