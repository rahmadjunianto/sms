
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- This is what you need -->
  <script src="<?php echo base_url().'gentelella/'?>build/swal/dist/sweetalert2.all.js"></script>
  <script src="<?php echo base_url().'gentelella/'?>build/swal/dist/sweetalert2.js"></script>
  <link rel="stylesheet" href="<?php echo base_url().'gentelella/'?>build/swal/dist/sweetalert2.css">
  <!--.......................-->
    <title>PT Sukses Mitra Sejahtera </title>
<script src="<?php echo base_url().'gentelella/'?>vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link href="<?php echo base_url().'gentelella/'?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url().'gentelella/'?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
    <!-- iCheck -->
    <link href="<?php echo base_url().'gentelella/'?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url().'gentelella/'?>/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <script src="<?php echo base_url().'adminlte/'?>plugins/chosen/chosen.jquery.js" type="text/javascript"></script>    
       <!-- Select2 -->
    <link href="<?php echo base_url().'gentelella/'?>vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>    
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url().'gentelella/'?>build/css/custom.min.css" rel="stylesheet">
    <script src="<?php echo base_url().'gentelella/'?>datetimepicker/jquery.datetimepicker.full.js" type="text/javascript"></script>
    <script src="<?php echo base_url().'gentelella/'?>datetimepicker/jquery.datetimepicker.full.min.js" type="text/javascript"></script>
    <link href="<?php echo base_url().'gentelella/'?>datetimepicker/jquery.datetimepicker.min.css" rel="stylesheet" type="text/css" />    <script type="text/javascript" src="<?php echo base_url().'gentelella/datepicker/'?>bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url().'gentelella/datepicker/'?>bootstrap-datepicker3.css"/>
    <!-- Datatables -->
    <link href="<?php echo base_url().'gentelella/'?>/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url().'gentelella/'?>/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url().'gentelella/'?>/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url().'gentelella/'?>/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url().'gentelella/'?>/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
<script>
  $(document).ready(function(){
    var date_input=$('input[name="date1"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    $('.tanggal').datepicker({
      format: 'dd/mm/yyyy',
      container: container,
      todayHighlight: true,
      autoclose: true,
    })
  })
</script>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col footer_fixed">
          <div class="left_col scroll-view">
            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="<?php echo base_url().'gentelella/'?>production/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Selamat Datang</span>
                <h2><?= $this->session->userdata('nama')?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Main Navigation</h3>
                <ul class="nav side-menu">
                  <?php  
                      $kode_group=$this->session->userdata('kg');
                      $qmenu0  =$this->db->query("SELECT a.*
                                                  FROM menu a
                                                  JOIN role b ON a.KODE_MENU=b.KODE_MENU
                                                  WHERE kode_group='$kode_group' AND status_role='1'  AND active='1' and parent_menu='0' order by sort_menu asc")->result_array();
                      foreach ($qmenu0 as $row0) {
                        $parent  =$row0['kode_menu'];
                        $qmenu1  =$this->db->query("SELECT a.*
                                                  FROM menu a
                                                  JOIN role b ON a.KODE_MENU=b.KODE_MENU
                                                  WHERE kode_group='$kode_group' AND status_role='1'  AND active='1' and parent_menu='$parent' order by sort_menu asc");
                        $cekmenu =$qmenu1->num_rows();
                        $dmenu1  =$qmenu1->result_array();  
                          if($cekmenu>0){
                            echo  "<li><a><i class='".$row0['icon_menu']."'></i> ".$row0['nama_menu']." <span class='fa fa-chevron-down'></span></a>";
                                echo "<ul class='nav child_menu'>";
                                  foreach($dmenu1 as $row1){
                                      echo "<li>".anchor($row1['link_menu'],'</i>'.ucwords($row1['nama_menu']))."</li>";
                                  }
                              echo "</ul>
                              </li>";
                              }else{
                               echo "<li><a><i class='".$row0['icon_menu']."'></i> ".$row0['nama_menu']."</a>
                  </li>";
                            }}                                        ?>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?= $this->session->userdata('ng')?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo base_url('Auth/logout')?>"><i class="fa fa-sign-out pull-right"></i> Keluar</a></li>
                  </ul>
                </li>

                
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
          <?php echo $contents; ?> 
          </div>
          </div> 
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Copyright © 2017 All rights reserved</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <!-- Select2 -->
    <script src="<?php echo base_url().'gentelella/'?>vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- jQuery -->
   <!-- <script src="<?php echo base_url().'gentelella/'?>vendors/jquery/dist/jquery.min.js"></script>-->
    <!-- Bootstrap -->
    <script src="<?php echo base_url().'gentelella/'?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url().'gentelella/'?>vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url().'gentelella/'?>vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?php echo base_url().'gentelella/'?>vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url().'gentelella/'?>vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url().'gentelella/'?>vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?php echo base_url().'gentelella/'?>vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?php echo base_url().'gentelella/'?>vendors/Flot/jquery.flot.js"></script>
    <script src="<?php echo base_url().'gentelella/'?>vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url().'gentelella/'?>vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url().'gentelella/'?>vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url().'gentelella/'?>vendors/Flot/jquery.flot.resize.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url().'gentelella/'?>/build/js/custom.min.js"></script>
    <!-- Select2 -->
    <script>
      $(document).ready(function() {
        $(".select2_single").select2({
          placeholder: "Silahkan Pilih",
          allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });
    </script>
    <!-- /Select2 -->
    <!-- Flot -->
    <script>
      $(document).ready(function() {
        var data1 = [
          [gd(2012, 1, 1), 17],
          [gd(2012, 1, 2), 74],
          [gd(2012, 1, 3), 6],
          [gd(2012, 1, 4), 39],
          [gd(2012, 1, 5), 20],
          [gd(2012, 1, 6), 85],
          [gd(2012, 1, 7), 7]
        ];

        var data2 = [
          [gd(2012, 1, 1), 82],
          [gd(2012, 1, 2), 23],
          [gd(2012, 1, 3), 66],
          [gd(2012, 1, 4), 9],
          [gd(2012, 1, 5), 119],
          [gd(2012, 1, 6), 6],
          [gd(2012, 1, 7), 9]
        ];
        $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
          data1, data2
        ], {
          series: {
            lines: {
              show: false,
              fill: true
            },
            splines: {
              show: true,
              tension: 0.4,
              lineWidth: 1,
              fill: 0.4
            },
            points: {
              radius: 0,
              show: true
            },
            shadowSize: 2
          },
          grid: {
            verticalLines: true,
            hoverable: true,
            clickable: true,
            tickColor: "#d5d5d5",
            borderWidth: 1,
            color: '#fff'
          },
          colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
          xaxis: {
            tickColor: "rgba(51, 51, 51, 0.06)",
            mode: "time",
            tickSize: [1, "day"],
            //tickLength: 10,
            axisLabel: "Date",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial',
            axisLabelPadding: 10
          },
          yaxis: {
            ticks: 8,
            tickColor: "rgba(51, 51, 51, 0.06)",
          },
          tooltip: false
        });

        function gd(year, month, day) {
          return new Date(year, month - 1, day).getTime();
        }
      });
    </script>
    <!-- /Flot -->


    <!-- /jVectorMap -->
  <!-- Datatables -->
    <script src="<?php echo base_url().'gentelella/'?>/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url().'gentelella/'?>/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url().'gentelella/'?>/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url().'gentelella/'?>/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url().'gentelella/'?>/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url().'gentelella/'?>/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url().'gentelella/'?>/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url().'gentelella/'?>/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url().'gentelella/'?>/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url().'gentelella/'?>/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url().'gentelella/'?>/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo base_url().'gentelella/'?>/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?php echo base_url().'gentelella/'?>/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo base_url().'gentelella/'?>/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url().'gentelella/'?>/vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- Skycons -->
    <script>

      $(document).ready(function() {
        var icons = new Skycons({
            "color": "#73879C"
          }),
          list = [
            "clear-day", "clear-night", "partly-cloudy-day",
            "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
            "fog"
          ],
          i;

        for (i = list.length; i--;)
          icons.set(list[i], list[i]);

        icons.play();
      });
    </script>
    <!-- /Skycons -->


    
    
  </body>
</html>