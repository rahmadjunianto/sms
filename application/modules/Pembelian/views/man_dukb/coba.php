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
<span class="inputname">
    Project Images:
    <a href="#" class="add_project_file">
        <img src="images/add_small.gif" border="0" />
    </a>
</span>

<ul class="project_images">
    <li><input name="upload_project_images[]" type="file" /></li>
</ul>
                  </div>
                </div>
              </div>



            </div>

<script type="text/javascript">
$('.add_project_file').click(function(e) {
    e.preventDefault();

    $(".project_images").append(
        '<li>'
      + '<input name="upload_project_images[]" type="file" class="new_project_image" /> '
      + '<a href="#" class="remove_project_file" border="2"><img src="images/delete.gif" /></a>'
      + '</li>');
});

// Remove parent of 'remove' link when link is clicked.
$('.project_images').on('click', '.remove_project_file', function(e) {
    e.preventDefault();

    $(this).parent().remove();
});
</script>