        <section class="content-header">
            <h1>
              Portal Terpadu
              <small>Beta 1.0</small>
            </h1>
            <!-- <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Dashboard</li>
            </ol> -->
          </section>

          <!-- Main content -->
          <section class="content">
              <div class="row">
              <?php foreach($list as $rl){?>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                  <a href="<?= $rl->LINK_MENU?>">
                    <div class="info-box">
                      <span class="info-box-icon bg-aqua"><i class="<?= $rl->ICON_MENU?>"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text"></span>
                        <span class="info-box-number"><?= $rl->NAMA_MENU?></span>
                      </div>
                    </div>
                    </a>
                  </div>
                  <?php }?>
              </div>
          </section><!-- /.content -->