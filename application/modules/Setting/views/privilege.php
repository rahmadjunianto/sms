

      <div class="page-title">

            </div>

            <div class="clearfix"></div>
<?php echo $this->session->flashdata('message')?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title"> 
                    <h2>Privilege</h2>                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="5%">No</th>
                          <th>Grup</th>
                          <th align="center" width="10%" >Aksi</th>
                        </tr>
                      </thead>

<tbody>
                                    <?php $no=1; foreach($data as $row){?>
                                    <tr>
                                        <td align="center"><?php echo $no;?></td>
                                        <td><?php echo ucwords($row['NAMA_GROUP']);?></td>
                                        <td align="center"> <?php echo anchor('setting/sistem/settingPrivilege/'.$row['KODE_GROUP'],'<i class="btn btn-primary btn-xs fa fa-cog"></i>');?></td>
                                    </tr>

                                    <?php $no++;}?>
</tbody>
                      
                    </table>
                  </div>
                </div>
              </div>



            </div>



