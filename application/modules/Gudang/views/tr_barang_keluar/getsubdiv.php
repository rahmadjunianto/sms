
<?php $var="<option value=''</option>"; 
foreach($kc as $kc){
$var.="<option value='".$kc->kd_sub_div."'>".$kc->nm_sub_div."</option>";
 } ?>

 <script type="text/javascript">
 	   $('#subdiv').empty(); //remove all child nodes
        var newOption = $("<?php echo $var?>");
        $('#subdiv').append(newOption);
        $('#subdiv').trigger("chosen:updated");
 </script>