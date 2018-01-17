        <section class="content-header">
            <h1>
              <i class="fa fa-cogs"></i> Setting
              <!-- <small>Example 2.0</small> -->
            </h1>
          </section>

          <!-- Main content -->
          <section class="content">
             <div class="row">
              <?php foreach($list as $rl){?>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                  <a href="<?= $rl->link_menu?>">
                    <div class="info-box">
                      <span class="info-box-icon bg-aqua"><i class="<?= $rl->icon_menu?>"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text"></span>
                        <span class="info-box-number"><?= $rl->nama_menu?></span>
                      </div>
                    </div>
                    </a>
                  </div>
                  <?php }?>
              </div>
          </section><!-- /.content -->