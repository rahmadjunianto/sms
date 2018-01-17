
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>SIKOI</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url().'AdminLTE/'?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'AdminLTE/'?>/fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'AdminLTE/'?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'AdminLTE/'?>dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
    <script src="<?php echo base_url().'AdminLTE/'?>plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <script src="<?php echo base_url().'AdminLTE/'?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url().'AdminLTE/'?>plugins/slimScroll/jquery.slimScroll.min.js" type="text/javascript"></script>
    <script src='<?php echo base_url().'AdminLTE/'?>plugins/fastclick/fastclick.min.js'></script>
    <script src="<?php echo base_url().'AdminLTE/'?>dist/js/app.min.js" type="text/javascript"></script>
    
    
    <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <style>
            .dataTables_wrapper {
                min-height: 500px
            }
            
            .dataTables_processing {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 100%;
                margin-left: -50%;
                margin-top: -25px;
                padding-top: 20px;
                text-align: center;
                font-size: 1.2em;
                color:grey;
            }
           
        </style>

  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="skin-purple layout-top-nav">
    <div class="wrapper">
      
      <header class="main-header">               
        <nav class="navbar navbar-static-top">
          <div class="container-fluid">
          <div class="navbar-header">
            <a href="<?php echo base_url().'AdminLTE/'?>index2.html" class="navbar-brand"><b>Admin</b>LTE</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="navbar-collapse">
              <?php $this->menu->load(1);?>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i>
                  <span class="hidden-xs">Alexander Pierce</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <p>
                      Nama Role
                      <small><?php echo date('d F Y');?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Keluar</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container-fluid">

          <!-- Content Header (Page header) -->
          <?php 
          

          echo $contents; ?>      


        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="container-fluid">
          <div class="pull-right hidden-xs">
            <b>Version</b> beta
          </div>
          <strong>Copyright &copy; 2017</strong> All rights reserved.
        </div><!-- /.container -->
      </footer>
    </div><!-- ./wrapper -->

    
  </body>
</html>
