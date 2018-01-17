<?php 

$string = "<section class=\"content-header\">
            <h1>
              Form ".ucfirst($table_name)."
            </h1>
          </section>
        <section class=\"content\">
            <div class=\"box box-green\">
                <div class=\"box-body\">
        <form class=\"form-horizontal\" action=\"<?php echo \$action; ?>\" method=\"post\" enctype=\"multipart/form-data\"> ";
foreach ($non_pk as $row) {
    if ($row["data_type"] == 'text')
    {
    $string .= "\n\t    <div class=\"form-group\">
            <label class=\"control-label col-md-2\" for=\"".$row["column_name"]."\">".label($row["column_name"])." <small>*</small></label>
            <div class=\"col-md-4\">
                <textarea class=\"form-control\" rows=\"3\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" ><?php echo $".$row["column_name"]."; ?></textarea>
                <?php echo form_error('".$row["column_name"]."') ?>
            </div>
        </div>";
    } else
    {
    $string .= "\n\t    <div class=\"form-group\">
            <label class=\"control-label col-md-2\" for=\"".$row["data_type"]."\">".label($row["column_name"])." <small>*</small></label>
            <div class=\"col-md-4\">
            <input type=\"text\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\"  value=\"<?php echo $".$row["column_name"]."; ?>\" />
            <?php echo form_error('".$row["column_name"]."') ?>
            </div>
        </div>";
    }
}
$string .= "\n\t   <div class=\"form-group\">";
$string .= "\n\t    <div class=\"col-md-4 col-md-offset-2\">";
$string .= "\n\t   <div class=\"btn-group\">";
$string .= "\n\t    <input type=\"hidden\" name=\"".$pk."\" value=\"<?php echo $".$pk."; ?>\" /> ";
$string .= "\n\t    <button type=\"submit\" class=\"btn btn-sm btn-primary\"><i class=\"fa fa-save\"></i> <?php echo \$button ?></button> ";
$string .= "\n\t    <a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn  btn-sm btn-default\"><i class=\"fa fa-close\"></i> Batal</a>";
$string .= "\n\t      </div >";
$string .= "\n\t     </div >";
$string .= "\n\t   </div >";
$string .= "\n\t</form>
                </div>
            </div>
        </section>
    ";

$hasil_view_form = createFile($string, $target."views/" . $c_url . "/" . $v_form_file);

?>